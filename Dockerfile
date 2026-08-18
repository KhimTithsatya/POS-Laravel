FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel project
COPY . .

# Install PHP dependencies
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Laravel permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Laravel production settings
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

# Nginx configuration
COPY docker/nginx/default.conf /etc/nginx/sites-available/default

# Create startup script
RUN printf '#!/bin/sh\n\
php artisan migrate --force\n\
php artisan storage:link || true\n\
php artisan config:cache\n\
php artisan route:cache\n\
php artisan view:cache\n\
php-fpm -D\n\
nginx -g "daemon off;"\n' > /start.sh \
    && chmod +x /start.sh

EXPOSE 10000

CMD ["/start.sh"]