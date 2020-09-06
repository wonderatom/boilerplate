FROM php:7.4-fpm-alpine

RUN apk add --no-cache git icu-dev libzip-dev postgresql-dev

RUN docker-php-ext-install zip pdo pdo_pgsql
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/app

CMD composer install
CMD php-fpm

EXPOSE 9000