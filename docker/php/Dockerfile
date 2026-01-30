FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git unzip \
    libicu-dev libxml2-dev libzip-dev libonig-dev \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libxslt-dev \
    && docker-php-ext-install intl pdo_mysql zip soap opcache bcmath ftp xsl sockets \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

COPY php.ini /usr/local/etc/php/conf.d/magento.ini

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY auth.json /root/.composer/auth.json

RUN composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition=2.4.8 .