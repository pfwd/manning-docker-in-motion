FROM ubuntu:16.04

LABEL maintainer "Peter Fisher"

ARG JQUERY_VERSION=3.2.0

ENV DOC_ROOT /var/www/mysite-dev
ENV JQUERY_VERSION ${JQUERY_VERSION}

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y \
    nginx \
    php7.0 \
    && rm -rf /var/lib/apt/lists/*

COPY code/sites/mysite ${DOC_ROOT}
ADD https://code.jquery.com/jquery-${JQUERY_VERSION}.min.js ${DOC_ROOT}/js/