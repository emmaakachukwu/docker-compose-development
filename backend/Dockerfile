FROM php:7.4-fpm-alpine

RUN apk add --no-cache bash

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html/backend

COPY --from=composer /usr/bin/composer /usr/bin/composer
