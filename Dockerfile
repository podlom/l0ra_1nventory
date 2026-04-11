FROM php:8.3-cli

# Системні залежності
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Встановлення залежностей
COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --no-scripts --no-progress

COPY . .

# Генерація ключа (можна запускати окремо)
CMD php artisan key:generate && php artisan migrate && php artisan serve --host=0.0.0.0 --port=8000
