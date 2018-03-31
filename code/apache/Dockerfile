FROM ubuntu:16.04

LABEL maintainer "Peter Fisher"
LABEL image_type "Apache Webserver with PHP"

ARG JQUERY_VERSION=3.2.0

ENV DOC_ROOT /var/www/mysite-dev
ENV JQUERY_VERSION ${JQUERY_VERSION}

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y \
    apache2 \
    libapache2-mod-php \
    php7.0 \
    php7.0-mysql \
    && rm -rf /var/lib/apt/lists/*

WORKDIR ${DOC_ROOT}

COPY sites/mysite .

ADD config/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf
ADD https://code.jquery.com/jquery-${JQUERY_VERSION}.min.js js/

EXPOSE 80

CMD apachectl -D FOREGROUND


