FROM php:8.3.8-fpm

RUN apt-get update && apt-get install -y \
        && docker-php-ext-install mysqli pdo pdo_mysql
