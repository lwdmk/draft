ARG CACHE_CHECKSUM
FROM registry.skyeng.tv/ddd/ddd-cache:${CACHE_CHECKSUM} as php

COPY --chown=www-data:www-data . ./

RUN composer dump-autoload -o --no-scripts

COPY --chown=www-data:www-data .env /opt/app/.env
RUN source-env-file .env > /tmp/.env && . /tmp/.env && rm /tmp/.env \
    && for dir in $(find config/packages -mindepth 1 -maxdepth 1 -type d); do php -d memory_limit=-1 bin/console cache:warmup --no-debug --env=$(basename $dir); done \
    && rm .env* && touch .env && chown www-data:www-data .env

# шаг для сборки ассетов
FROM php as assets
COPY --chown=www-data:www-data .env /opt/app/.env
RUN source-env-file .env > /tmp/.env && . /tmp/.env && rm /tmp/.env \
    && container-config-prepare \
    && bin/console assets:install

# шаг сборки nginx, ассеты берутся из шага assets
FROM registry.skyeng.tv/base/nginx1.17:1.6.13 as nginx
COPY --from=assets --chown=nginx:nginx /opt/app/public /opt/app/public
COPY ./deploy/templates/app-nginx.conf.erb /etc/nginx/sites-templates/app-nginx.conf.erb
