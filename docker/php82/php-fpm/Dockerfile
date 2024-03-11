FROM phpdockerio/php:8.2-fpm
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

RUN cp /usr/share/zoneinfo/Asia/Ho_Chi_Minh /etc/localtime

CMD ["/usr/sbin/php-fpm8.2", "-O"]

EXPOSE 9000