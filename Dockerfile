# syntax=docker/dockerfile:1
FROM php:8.0.12-apache-bullseye

RUN apt-get -q update && apt-get install -y --no-install-recommends ca-certificates wget git vim dstat
RUN apt-get install -y libpq-dev libzip-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev zip libxml2-dev libgraphicsmagick1-dev

RUN docker-php-ext-install pdo_pgsql pgsql
RUN docker-php-ext-install gd
RUN docker-php-ext-install zip
RUN docker-php-ext-install soap
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install gettext

RUN pecl install gmagick-2.0.6RC1 && docker-php-ext-enable gmagick

WORKDIR /var/www/api/v1/rest-seadoc

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/api/v1/rest-seadoc

COPY composer.json composer.json
RUN composer install
RUN composer update

RUN mkdir -p /var/www/sites/seadoc/tmp/logs
RUN chown -R www-data.www-data /var/www/api/v1/rest-seadoc/tmp

RUN a2enmod rewrite

RUN make setup_for_client CLIENT=All

RUN git config --global core.autocrlf true

RUN echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

EXPOSE 80