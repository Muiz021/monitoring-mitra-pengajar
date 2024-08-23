# Menggunakan image PHP 8.1 Alpine sebagai base image
FROM php:8.1-alpine

# Menetapkan variabel lingkungan
ENV APP_DIR="/app" \
    APP_PORT="8000"

# Membuat direktori aplikasi
WORKDIR $APP_DIR

# Menyalin semua file ke dalam container
COPY . .

# Menyalin file .env.example menjadi .env
COPY .env.example .env

# Menginstall dependensi dan tools yang diperlukan
RUN apk add --update --no-cache \
    curl \
    php \
    php-opcache \
    php-openssl \
    php-pdo \
    php-json \
    php-phar \
    php-dom

# Menginstall Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Menginstall dependensi aplikasi menggunakan Composer
RUN composer install --no-scripts --no-interaction

# Men-generate key aplikasi
RUN php artisan key:generate

# Expose port yang digunakan oleh aplikasi
EXPOSE $APP_PORT

# Perintah yang akan dijalankan ketika container dijalankan
CMD php artisan serve --host=0.0.0.0 --port=$APP_PORT
