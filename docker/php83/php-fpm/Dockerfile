FROM php:8.3-fpm-alpine
MAINTAINER NguyenQuocDai <quocdaijr@gmail.com>

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN install-php-extensions pcntl sockets

COPY . /var/www/html/octane-example
COPY .env.example /var/www/html/octane-example/.env
WORKDIR /var/www/html/octane-example

RUN composer install --no-dev
RUN chmod -R 777 ./storage ./bootstrap/cache

ENTRYPOINT ["sh","-c", "php-fpm"]

EXPOSE 9000