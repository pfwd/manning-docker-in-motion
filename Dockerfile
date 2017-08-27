FROM ubuntu:16.10

LABEL maintainer "Peter Fisher"
LABEL image_type "Nginx Webserver with PHP"

ARG JQUERY_VERSION=3.2.0

ENV DOC_ROOT /var/www/mysite-dev
ENV JQUERY_VERSION ${JQUERY_VERSION}

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y \
    nginx \
    php7.0 \
    && rm -rf /var/lib/apt/lists/*

WORKDIR ${DOC_ROOT}

USER www-data:www-data

COPY code/sites/mysite .
ADD https://code.jquery.com/jquery-${JQUERY_VERSION}.min.js js/