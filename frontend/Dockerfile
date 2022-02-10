FROM php:7.4-fpm-alpine

RUN apk add --no-cache bash

WORKDIR /var/www/html/frontend

COPY --from=composer /usr/bin/composer /usr/bin/composer
