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

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
