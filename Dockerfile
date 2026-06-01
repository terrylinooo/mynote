FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    curl \
    default-mysql-client \
    git \
    libfreetype6-dev \
    libjpeg-dev \
    libonig-dev \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql zip

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && sed -i 's/;date.timezone =.*/date.timezone = Asia\/Taipei/g' "$PHP_INI_DIR/php.ini" \
    && sed -i 's/upload_max_filesize =.*/upload_max_filesize = 20M/g' "$PHP_INI_DIR/php.ini" \
    && sed -i 's/post_max_size =.*/post_max_size = 20M/g' "$PHP_INI_DIR/php.ini" \
    && sed -i 's/memory_limit =.*/memory_limit = 256M/g' "$PHP_INI_DIR/php.ini" \
    && sed -i 's/max_execution_time =.*/max_execution_time = 60/g' "$PHP_INI_DIR/php.ini" \
    && sed -i 's/expose_php =.*/expose_php = Off/g' "$PHP_INI_DIR/php.ini"

WORKDIR /var/www/html

RUN curl -O https://wordpress.org/latest.zip \
    && unzip latest.zip \
    && mv wordpress/* . \
    && rm -rf wordpress latest.zip

RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN git config --global --add safe.directory /var/www/html/wp-content/themes/mynote

EXPOSE 8000
