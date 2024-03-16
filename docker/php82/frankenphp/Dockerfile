FROM phpdockerio/php:8.2-cli
MAINTAINER NguyenQuocDai <quocdaijr@gmail.com>


#RUN apt-get update \
#    && apt-get -y --no-install-recommends install jq wget\
#    && apt-get clean \
#    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

#RUN wget -O/usr/local/bin/frankenphp $(wget -O- https://api.github.com/repos/dunglas/frankenphp/releases/latest \
#    | jq '.assets[] | select(.name=="frankenphp-linux-x86_64") | .browser_download_url' -r) \
#    && chmod +x /usr/local/bin/frankenphp

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html/octane-example
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY . .

RUN composer install
RUN chmod -R 777 ./storage ./bootstrap/cache

RUN php artisan octane:install --server=frankenphp