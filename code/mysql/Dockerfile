# Dockerfile for MYSQL image
FROM mysql

LABEL maintainer "Peter Fisher"
LABEL image_type "MYSQL database server"

# Copy over the schema files
COPY /schemas /schemas

# Replace mysql config file with one that includes native password support
COPY /config/my.cnf /etc/mysql/my.cnf
