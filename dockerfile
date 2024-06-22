# Use an official PHP runtime as a parent image
FROM php:8.2-apache

# Install any required extensions and tools
RUN docker-php-ext-install pdo pdo_mysql

# Copy application files to the container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ensure composer dependencies are installed
RUN composer install

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
