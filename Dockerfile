FROM php:7.0-apache

COPY . /var/www/html

COPY ./vhost.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

RUN apt-get update

RUN apt-get install -y libpq-dev

RUN docker-php-source extract \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install -j$(nproc) pdo \
    && docker-php-ext-install -j$(nproc) pdo_pgsql \
    && docker-php-ext-install -j$(nproc) pgsql \
    && docker-php-ext-install -j$(nproc) mbstring \
    && docker-php-source delete

WORKDIR /var/www/html

CMD [ "apache2ctl", "-D", "FOREGROUND" ]