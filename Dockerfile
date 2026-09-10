# -------------------------
# Stage 1: Build frontend
# -------------------------
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY resources ./resources
COPY public ./public
COPY vite.config.* ./
COPY postcss.config.* ./
COPY tailwind.config.* ./
COPY --from=frontend /app/public/build ./public/build

RUN npm run build


# -------------------------
# Stage 2: Laravel
# -------------------------
FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    nginx \
    git \
    curl \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
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

WORKDIR /var/www

# Copy Laravel application
COPY . .

# Install PHP dependencies
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Copy built Vite assets
COPY --from=frontend /app/public/build ./public/build

# Permissions
RUN chown -R www-data:www-data \
    /var/www/storage \
    /var/www/bootstrap/cache

# Nginx configuration
COPY docker/nginx/default.conf /etc/nginx/sites-available/default

# Startup script
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