#!/usr/bin/env bash

cd "$(dirname "$0")"

set -e

container_id=$(docker ps -a -q -f name=http-service)
if [[ -n "${container_id}" ]]; then
    echo "INFO: Remove http-service container"
    docker rm --force "${container_id}"
fi

docker run -d -it \
  --network=example.com --name=http-service --hostname=http-service.example.com \
  minimal-ubuntu:latest bash

docker exec krb5-kdc-server-example-com /bin/bash -c "
cat << EOF  | kadmin.local
add_principal -randkey HTTP/http-service.example.com@EXAMPLE.COM
ktadd -k /tmp/http-service.keytab -norandkey HTTP/http-service.example.com@EXAMPLE.COM
quit
EOF
"

docker exec http-service /bin/bash -c "
apt-get update
apt-get install -y ntp krb5-config krb5-user
apt-get install -y apache2
apt-get install -y libapache2-mod-auth-kerb
apt-get install -y libapache2-mod-auth-gssapi
mkdir -p /var/www/http-service
"

# Copy krb5 conf
docker cp krb5.conf http-service:/etc/krb5.conf

# Copy keytab
docker cp krb5-kdc-server-example-com:/tmp/http-service.keytab /tmp/http-service.keytab
docker cp /tmp/http-service.keytab http-service:/etc/http-service.keytab

# Copy site content
docker cp index.html http-service:/var/www/http-service/index.html

# Copy site conf
docker cp http-service-auth-gssapi.conf http-service:/etc/apache2/sites-available/http-service-auth-gssapi.conf
docker cp http-service-auth-kerb.conf http-service:/etc/apache2/sites-available/http-service-auth-kerb.conf

docker exec http-service /bin/bash -c "
chown www-data:www-data /etc/http-service.keytab
chmod 400 /etc/http-service.keytab
a2dissite 000-default
a2ensite http-service-auth-kerb
service apache2 start
"

docker exec -it http-service bash
