
FROM php:7.4-apache
WORKDIR /var/www/html/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install mysqli && \
    # a2enmod authn_dbd && \
    apt-get update && \
    pecl install redis && \
    docker-php-ext-enable redis && \
    apt-get install -y zip && \
    service apache2 restart

RUN apt-get update && \
    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install gd



