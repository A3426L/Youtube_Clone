FROM php:8.3-fpm
RUN apt-get update && \
  apt-get -y install --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  docker-php-ext-install intl pdo_mysql zip bcmath

RUN curl -fsSL https://deb.nodesource.com/setup_23.x  | bash - && \
  apt-get install -y nodejs && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/*


COPY ./php.ini /usr/local/etc/php/php.ini
    
COPY --from=composer /usr/bin/composer /usr/bin/composer
