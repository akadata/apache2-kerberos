# README

The goal is to set up proxy kerberos with Apache2 and mod_auth_kerb module.

Configure your web browser for example `firefox`:

Go to about:config with `negotiate` filter:

~~~
network.negotiate-auth.allow-non-fqdn: true
network.negotiate-auth.using-native-gsslib: true
network.negotiate-auth.delegation-uris: 10.5.0.4,http-service.example.com
network.negotiate-auth.trusted-uris: 10.5.0.4,http-service.example.com
network.negotiate-auth.gsslib: 10.5.0.4,http-service.example.com
~~~

where 10.5.0.4 is IP of your container of apache2

# Version

~~~
$ firefox --version
Mozilla Firefox 60.0.2
~~~

~~~
$ google-chrome --version
Google Chrome 67.0.3396.87 
~~~

## References

http://modauthkerb.sourceforge.net

