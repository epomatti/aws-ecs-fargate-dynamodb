FROM php

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN composer install --no-interaction --no-dev

CMD [ "php", "./public/index.php" ]