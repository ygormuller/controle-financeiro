FROM php:8.2-fpm

# Instala extensões e dependências
RUN apt-get update && apt-get install -y \
    git unzip zip curl libicu-dev libpq-dev libzip-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Symfony CLI (opcional, para comandos como "symfony serve")
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

WORKDIR /var/www/html
