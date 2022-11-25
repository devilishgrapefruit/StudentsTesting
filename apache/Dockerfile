
FROM php:7.4-apache
WORKDIR /var/www/html/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN alias composer='php /usr/local/bin/composer'
# RUN curl -sS https://getcomposer.org/installer | php -- \
# --install-dir=/usr/bin --filename=composer && chmod +x /usr/bin/composer
# COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
# COPY --from=composer /usr/bin/composer /usr/bin/composer
# Загрузка mysqli, redis, перезапуск apache
RUN docker-php-ext-install mysqli && \
    # a2enmod authn_dbd && \
    apt-get update && \
    pecl install redis && \
    docker-php-ext-enable redis && \
    # apt-get install -y libaprutil1-dbd-mysql && \
    apt-get install -y zip && \
    service apache2 restart

RUN apt-get update && \
    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install gd

# Загрузка composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN alias composer='php /usr/local/bin/composer'

# Загрузка генератора фикстур
# RUN composer require --dev nelmio/alice 

# # Загрузка pchart
# RUN composer require szymach/c-pchart


