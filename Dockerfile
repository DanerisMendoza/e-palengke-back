# Union file system
# fpm will use linux->nginx
# alpine the most compact or small size version of linux
# install php 8.2
FROM php:8.2-fpm-alpine    

# linux permission
ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

# create folder
RUN mkdir -p /var/www/html
# access folder
WORKDIR /var/www/html

# composer is dependant on php version above
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# To ensure it will run in m version of mac os 
RUN delgroup dialout

# create group named epalengke for grouping of permission
# alpine version using addgroup and apk syntax
# linux version use groupadd and apt syntax
RUN addgroup -g ${GID} --system epalengke
RUN adduser -G epalengke --system -D -s /bin/sh -u ${UID} epalengke


RUN sed -i "s/user = www-data/user = epalengke/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = epalengke/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

# required of laravel and manually being install in linux alpine

RUN docker-php-ext-install pdo pdo_mysql

RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
    docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    docker-php-ext-install -j$(nproc) gd && \
    apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

RUN apk --no-cache add libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip
    
# To ensure everything is installed
ENTRYPOINT ["sh","/var/www/html/entrypoint.sh"]

USER epalengke

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]