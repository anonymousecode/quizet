# Use official PHP 8.2 with Apache
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql zip \
    && a2enmod rewrite

# Set working directory inside container
WORKDIR /var/www/html

# Copy Laravel app files to container
COPY . /var/www/html

# Set Apache DocumentRoot to Laravel's public folder
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Set permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Install Composer from official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Allow Composer to run as root (required inside Docker)
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install PHP dependencies without running scripts (avoids artisan errors during build)
RUN composer install --optimize-autoloader --no-dev --no-scripts

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
