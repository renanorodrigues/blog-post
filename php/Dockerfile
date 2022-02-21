FROM php:8.0-apache

RUN a2enmod rewrite

RUN apt update && apt install -y zlib1g-dev g++ libicu-dev zip libzip-dev zip libpq-dev \
    && docker-php-ext-install intl opcache pdo pgsql pdo_pgsql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /var/www/blog

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN addgroup --gid 1000 appuser; \
    adduser --uid 1000 --gid 1000 --disabled-password appuser; \
    adduser www-data appuser; \
    sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf; \
    service apache2 restart;