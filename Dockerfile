FROM php:8.2-apache

# Install sambungan (extensions) PHP yang diperlukan oleh CodeIgniter 4
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip \
    zip \
    git \
    && docker-php-ext-install intl pdo pdo_mysql mysqli

# Aktifkan mod_rewrite Apache (Wajib untuk CI4 URL Routing)
RUN a2enmod rewrite

# Tukar Document Root Apache kepada folder /public milik CI4
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

# Muat turun Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Setkan direktori kerja
WORKDIR /var/www/html

# Salin semua fail projek ke dalam container
COPY . .

# Jalankan Composer Install untuk muat turun folder vendor
RUN composer install --no-dev --optimize-autoloader

# Tetapkan kebenaran (permission) folder writable untuk CI4
RUN chown -R www-data:www-data /var/www/html/writable

EXPOSE 80