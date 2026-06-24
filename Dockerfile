FROM php:8.2-apache

# Install extension PHP yang diperlukan oleh CI4
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl gd mysqli pdo pdo_mysql

# Aktifkan mod_rewrite untuk Apache (supaya URL CI4 cantik tanpa index.php)
RUN a2enmod rewrite

# Tukar Apache DocumentRoot ke folder /public milik CI4
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Salin semua fail projek ke dalam container
COPY . /var/www/html

# Beri kebenaran (permission) pada folder writable CI4
RUN chown -R www-data:www-data /var/www/html/writable

WORKDIR /var/www/html

EXPOSE 80