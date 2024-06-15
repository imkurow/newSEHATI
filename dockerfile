FROM php:7.3-cli-alpine

# ini adalah variable environtment
ENV \
APP_DIR="/app" \
APP_PORT="8001"

# untuk memindahkan file/folder ke direktori yang di inginkan pada docker
COPY / $APP_DIR
COPY .env.example $APP_DIR/.env

# menginstall kebutuhan yang ingin digunakan
RUN apk add --update \
    curl \
    php \
    php-opcache\
    php-openssl \
    php-pdo \
    php-json \
    php-phar \
    php-dom \
    && rm -rf /var/cache/apk/*

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/bin --filename=composer

# run composer
RUN cd $APP_DIR && composer update
RUN cd $APP_DIR && php artisan key:generate

# entrypoint
WORKDIR $APP_DIR
CMD php artisn serve --host=0.0.0.0 --port=$APP_PORT

EXPOSE $APP_PORT
