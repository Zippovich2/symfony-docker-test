FROM php:8.1-fpm

# Server Installs
RUN apt-get update && apt-get install -y \
    zip unzip git curl wget nano rsync inotify-tools \
    libmagickwand-dev zlib1g-dev libicu-dev libxslt-dev g++ libsodium-dev librabbitmq-dev \
    --no-install-recommends

#<-- START PHP Installs -->#

# Install Redis
RUN pecl install redis && \
    docker-php-ext-enable redis

# Install imagick
RUN pecl install imagick && \
    docker-php-ext-enable imagick

# Install PDO MySql
RUN docker-php-ext-install pdo_mysql

# Install intl extension
RUN docker-php-ext-configure intl && \
    docker-php-ext-install intl

# Install xsl extension
RUN docker-php-ext-install xsl

# Install sodium extension
RUN docker-php-ext-install sodium

RUN pecl install amqp && \
    docker-php-ext-enable amqp

#<-- END PHP Installs -->#

# Composer Install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php -- --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

# php.ini settings
COPY ./php.ini $PHP_INI_DIR

RUN mkdir /.composer && \
    chown 1000:1000 /.composer

WORKDIR /var/www
