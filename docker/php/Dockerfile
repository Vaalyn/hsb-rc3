FROM php:8.0-fpm

# RUN apt-get update

# Install iconv PHP extension
# RUN docker-php-ext-install -j$(nproc) iconv \
#     && docker-php-ext-enable iconv

# Install other PHP extensions
# RUN docker-php-ext-install mbstring && docker-php-ext-enable mbstring
# RUN docker-php-ext-install intl && docker-php-ext-enable intl

COPY ./php.ini $PHP_INI_DIR/php.ini
