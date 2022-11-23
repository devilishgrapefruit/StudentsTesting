FROM php:7.4-apache
WORKDIR /var/www/html/
RUN docker-php-ext-install mysqli && \
    a2enmod authn_dbd && \
    apt-get update && \
    pecl install redis && \
    docker-php-ext-enable redis && \
    apt-get install -y libaprutil1-dbd-mysql && \
    service apache2 restart
