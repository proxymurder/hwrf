FROM php:fpm-alpine

# install dependencies
RUN apk update \
    && apk add --no-cache \
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
    zlib-dev \
    # gd
	&& docker-php-ext-configure gd \
	&& docker-php-ext-install -j$(nproc) gd \
	# pdo
	&& docker-php-ext-install pdo \
	# pdo_mysql
	&& docker-php-ext-install pdo_mysql \
	# zip
	&& docker-php-ext-install zip

# install redis
RUN pecl install redis \
    && printf '%s\n' 'extension=redis.so' > /usr/local/etc/php/conf.d/docker-php-ext-redis.ini

# install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# install artisan
RUN printf '%s\n\n%s' '#!/bin/sh' 'php artisan "$@"' > /usr/local/bin/artisan \
    && chmod +x /usr/local/bin/artisan

RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www