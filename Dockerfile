FROM php:8.1-apache

# Install only what's needed: mysqli + zip (for file uploads)
RUN docker-php-ext-install mysqli

# Enable Apache mod_rewrite (for clean URLs / .htaccess)
RUN a2enmod rewrite

# Allow .htaccess overrides in document root
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

WORKDIR /var/www/html

# Copy project files into the container
COPY . /var/www/html/

# Set correct permissions for Apache user
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
