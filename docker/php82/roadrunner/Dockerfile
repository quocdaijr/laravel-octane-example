#FROM ghcr.io/roadrunner-server/roadrunner:2023.3.11 AS roadrunner
FROM phpdockerio/php:8.2-cli
MAINTAINER NguyenQuocDai <quocdaijr@gmail.com>

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html/octane-example
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY . .

RUN composer install
RUN chmod -R 777 ./storage ./bootstrap/cache

## Copy RoadRunner
#COPY --from=roadrunner /usr/bin/rr /usr/bin/rr
#COPY --from=roadrunner /usr/bin/rr ./rr
#
## Copy RoadRunner config
#COPY --from=roadrunner /etc/rr.yaml /etc/rr.yaml
#COPY --from=roadrunner /etc/rr.yaml ./.rr.yam

RUN php artisan octane:install --server=roadrunner