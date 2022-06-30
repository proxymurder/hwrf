FROM php:fpm


RUN docker-php-ext-install pdo pdo_mysql sockets

RUN apt-get update && apt-get install -y \
    git \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    zlib1g-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd zip

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt-get install -y \
    nodejs \
    npm 

RUN echo '#!/bin/bash\nphp artisan "$@"' > /usr/local/bin/artisan \
    && chmod +x /usr/local/bin/artisan

ENV PATH=${PATH}:vendor/bin
   
RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www