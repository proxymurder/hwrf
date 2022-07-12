FROM php:fpm-alpine

# install dependencies
RUN apk update \
    && apk add --no-cache --virtual \
	# gd
    freetype-dev \
    git \
    gifsicle \
    libjpeg-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libzip-dev \
    jpegoptim \
    optipng \
    pngquant \
    # pdo \
    # pdo_mysql \
    unzip \
    zlib-dev \
	&& docker-php-ext-configure gd \
	&& docker-php-ext-install -j$(nproc) gd \
	# pdo_mysql
	&& docker-php-ext-install pdo_mysql\
	# pdo
	&& docker-php-ext-install pdo \
	# zip
	&& docker-php-ext-install zip

# install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# install artisan
RUN echo '#!/bin/bash\nphp artisan "$@"' > /usr/local/bin/artisan \
    && chmod +x /usr/local/bin/artisan
   
RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www