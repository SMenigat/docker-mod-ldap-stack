FROM centos/httpd:latest
RUN \
  yum install mod_ldap -y &&\
  chmod 777 /run -R &&\
  chmod 777 /var/log -R 
EXPOSE 80
ADD ldap.conf /etc/httpd/conf.d/ldap.conf
ADD index.html /var/www/html/index.html