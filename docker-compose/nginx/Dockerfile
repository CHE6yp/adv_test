FROM nginx:1.19.6-alpine

COPY nginx.conf /etc/nginx/
COPY symfony.conf /etc/nginx/conf.d/default.conf

RUN echo "upstream php-upstream { server php-fpm:9001; }" > /etc/nginx/conf.d/upstream.conf

RUN addgroup -g 1000 www \
    && adduser --no-create-home --disabled-password --uid 1000 --home /var/www/backend --shell /bin/sh --ingroup www www

CMD ["nginx"]

EXPOSE 80