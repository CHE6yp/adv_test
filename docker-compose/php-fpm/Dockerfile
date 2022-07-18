FROM php:8.1.7-fpm-alpine

RUN apk add --no-cache coreutils \
    git \
    postgresql-dev \
    icu-dev \
    zlib-dev 

RUN docker-php-ext-install pdo pdo_pgsql


RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl

COPY --from=composer:2.1.3 /usr/bin/composer /usr/bin/composer

RUN addgroup -g 1000 www \
    && adduser --no-create-home --disabled-password --uid 1000 --home /var/www/backend --shell /bin/sh --ingroup www www

COPY symfony.ini /usr/local/etc/php/conf.d/

RUN rm /usr/local/etc/php-fpm.d/*.conf
COPY symfony.pool.conf /usr/local/etc/php-fpm.d/

CMD ["sh", "-c", "php-fpm -F"]

WORKDIR /usr/src/symfony
EXPOSE 9001