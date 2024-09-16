# Use the official PHP 8.x FPM image as the base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy Laravel application
COPY . .

# Install Laravel dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN mv vendor /tmp

# Expose port 9000 to communicate with PHP-FPM
EXPOSE 9000

# Grant execute permission to the entrypoint script
RUN chmod +x ./docker/app/entrypoint.sh
ENTRYPOINT [ "./docker/app/entrypoint.sh" ]

# Start PHP-FPM server
CMD ["php-fpm"]
