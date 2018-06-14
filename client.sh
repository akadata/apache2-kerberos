#!/usr/bin/env bash

echo "=== Basic authentication with kerberos ==="
curl -vvv --user bob:bob http://10.5.0.4/

echo "== SPNEGO ==="
export KRB5_TRACE=/dev/stderr
kinit -kt /etc/bob.keytab bob@EXAMPLE.COM
curl -vvv --negotiate -u : -b cookie.txt -c cookie.txt http://10.5.0.4
