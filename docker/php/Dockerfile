FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libxml2-dev libzip-dev libonig-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install intl pdo_mysql zip soap opcache \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
