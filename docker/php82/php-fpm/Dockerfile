FROM phpdockerio/php:8.2-fpm
MAINTAINER NguyenQuocDai <quocdaijr@gmail.com>

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html/octane-example
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY . .

RUN composer install
RUN chmod -R 777 ./storage ./bootstrap/cache

EXPOSE 9000