FROM bitnami/php-fpm:7.4
WORKDIR /opt/app
COPY --chown=www-data:www-data composer.json composer.lock ./
RUN composer install --optimize-autoloader --no-scripts

COPY docker/php/entrypoint.sh ./docker/php/entrypoint.sh
RUN chmod +x ./docker/php/entrypoint.sh

CMD ["docker/php/entrypoint.sh", "php-fpm", "-F"]

