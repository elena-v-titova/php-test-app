FROM composer:latest AS composer
FROM php:7-apache

COPY php_test_app/ /var/www/html

RUN a2enmod rewrite

RUN docker-php-ext-install pdo_mysql

# git and zip for composer
RUN apt-get update && \
 apt-get install --assume-yes git && \
 apt-get install --yes zip unzip

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer install
RUN composer dump-autoload -o

