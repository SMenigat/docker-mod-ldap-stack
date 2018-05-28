# ldap-server
LDAP Server Docker Stack 👤🐳

### Starting the LDAP Server

Navigate to this directory and execute:

```bash
docker-compose up
```

This will open a local port `306` on which the LDAP Server is listening.

### LDAP Config Frontend

After you started the Server, you can navigate to [http://localhost:8008/](http://localhost:8008/) in your Browser. 

Use the following login credentials:

- User: **cn=admin,dc=softbricks,dc=de**
- Password: **sbtest**

### LDAP Basic Auth

This also incluedes a sample `mod_ldap` configuration of an Apache server. 
Open [http://localhost:8009/](http://localhost:8008/) in your Browser to see it in action.

