# docker-mod-ldap-stack

Proof of concept implementation of Apache's `mod_ldap`. 

This project comes with:
- [openLDAP](https://www.openldap.org/)
- [phpLDAPadmin](http://phpldapadmin.sourceforge.net/wiki/index.php/Main_Page)
- Seperate Apache server with configured [mod_ldap](https://httpd.apache.org/docs/2.4/mod/mod_ldap.html)
- Another Apache PHP server that comes with implemented auth checks in PHP

## Starting the LDAP Server

Navigate to this directory and execute:

```bash
docker-compose up
```

This will open a local port `306` on which the LDAP Server is listening.

## LDAP Config Frontend

After you started the Server, you can navigate to [http://localhost:8008/](http://localhost:8008/) in your Browser. 

Use the following login credentials:

- User: **cn=admin,dc=softbricks,dc=de**
- Password: **sbtest**

## LDAP Basic Auth

This also incluedes a sample `mod_ldap` configuration of an Apache server. 
Open [http://localhost:8009/](http://localhost:8008/) in your Browser to see it in action.

There are two preconfigured users that can be used for authentication:

- smenigat:sbtest
- lsporrer:sbtest

## PHP Auth Checks

There is a sample implementation in the `./php-auth-test` directory. Open [http://localhost:8010/](http://localhost:8010/) in your Browser to see it in action.