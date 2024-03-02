#FROM ghcr.io/roadrunner-server/roadrunner:2023.3.11 AS roadrunner
FROM phpdockerio/php:8.2-cli
MAINTAINER NguyenQuocDai <quocdaijr@gmail.com>

RUN apt-get update \
    && apt-get -y --no-install-recommends install libmcrypt-dev mysql-client php8.2-redis php8.2-amqp php8.2-intl \
    php8.2-mysql php8.2-pgsql php8.2-bcmath php8.2-gd php8.2-igbinary php8.2-imagick php8.2-intl php8.2-mongodb \
    php8.2-memcached php8.2-xmlrpc php8.2-xsl php8.2-yaml \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN apt-get update \
    && apt-get -y --no-install-recommends install npm git net-tools vim iputils-ping telnet supervisor \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN apt-get update \
    && npm install -g n && n stable \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html/octane-example
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY . .

RUN composer install
RUN npm install
RUN chmod -R 777 ./storage ./bootstrap/cache

## Copy RoadRunner
#COPY --from=roadrunner /usr/bin/rr /usr/bin/rr
#COPY --from=roadrunner /usr/bin/rr ./rr
#
## Copy RoadRunner config
#COPY --from=roadrunner /etc/rr.yaml /etc/rr.yaml
#COPY --from=roadrunner /etc/rr.yaml ./.rr.yam

RUN cp /usr/share/zoneinfo/Asia/Ho_Chi_Minh /etc/localtime

RUN php artisan octane:install --server=roadrunner

CMD ["php", "artisan", "octane:start", "--server=roadrunner"]