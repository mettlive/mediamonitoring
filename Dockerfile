FROM php:8.3-fpm


RUN apt-get update && apt-get install -y \
        libldap2-dev \
        curl \
        wget \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
	libpng-dev \
	libonig-dev \
	libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/  \
    && docker-php-ext-install ldap \
    && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd


# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1


WORKDIR /data/application.local

COPY . .
RUN chmod -R ugo+rw storage
RUN composer install && composer dump-autoload
CMD ["php artisan migrate"]
CMD ["php-fpm"]
