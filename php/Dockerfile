FROM php:8.2-fpm-alpine

RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN addgroup -g 1000 -S www && \
    adduser -u 1000 -S www -G www

USER www
WORKDIR /var/www/html