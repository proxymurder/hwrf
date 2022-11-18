FROM php:fpm-alpine as php

USER root

# Install container dependencies
RUN apk update
RUN apk add --no-cache \
    autoconf \ 
    freetype-dev \
    g++ \
    gifsicle \
    git \
    jpegoptim \
    libjpeg-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libzip-dev \
    make \ 
    optipng \
    pcre-dev \
    pngquant \
    unzip \
    zlib-dev

# Install gd
RUN docker-php-ext-configure gd
RUN docker-php-ext-install -j$(nproc) gd

# Install pdo
RUN docker-php-ext-install pdo

# Install pdo_mysql
RUN docker-php-ext-install pdo_mysql

# Install zip
RUN docker-php-ext-install zip

# Install redis
RUN pecl install redis
RUN printf '%s\n' 'extension=redis.so' > /usr/local/etc/php/conf.d/docker-php-ext-redis.ini

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Install artisan
RUN printf '%s\n\n%s' '#!/bin/sh' 'php artisan "$@"' > /usr/local/bin/artisan
RUN chmod +x /usr/local/bin/artisan

RUN addgroup -g 1000 www
RUN adduser -u 1000 -D -S -G www www

RUN mkdir -p /backend
WORKDIR /backend

USER www

# Vite server container
FROM node:alpine as ssr

USER root

# Install dependencies
RUN apk update
RUN apk add --no-cache \
    git 

# Install/Update npm global dependencies
RUN npm install -g npm npm-check-updates

RUN mkdir -p /backend
WORKDIR /backend

CMD ["npm", "run", "dev"]

USER node
