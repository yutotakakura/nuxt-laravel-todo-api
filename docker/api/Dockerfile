FROM php:8.1-fpm

# COPY php.ini
COPY ./docker/api/php.ini /usr/local/etc/php/php.ini

# Composer install
COPY --from=composer:2.5.4 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
    apt-get -y install \
    git \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql bcmath && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

WORKDIR /app

COPY ./src .

RUN composer install && \ 
		php artisan cache:clear && \
		php artisan config:clear && \
		chmod -R 777 storage