# README

The goal is to set up proxy kerberos with Apache2 and mod_auth_kerb
module.

Configure your web browser for example firefox:

Go to about:config with `negotiate` filter:

~~~
network.negotiate-auth.allow-non-fqdn: true
network.negotiate-auth.gsslib: 10.5.0.4,http-service.example.com
network.negotiate-auth.gsslib: 10.5.0.4,http-service.example.com
~~~

where 10.5.0.4 is IP of your container of apache2

References:

http://modauthkerb.sourceforge.net

