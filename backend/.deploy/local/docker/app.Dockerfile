ARG VERSION
ARG COMPOSER_VERSION

FROM composer:${COMPOSER_VERSION} as composer
FROM php:${VERSION}-fpm-alpine

RUN apk update \
    && apk upgrade \
    && apk add --no-cache gcc make g++ wget icu-dev zlib-dev autoconf \
    && rm -rf /var/cache/apk/*

# fix timezone
ARG TIMEZONE
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo ${TIMEZONE} > /etc/timezone \
    && date

COPY .deploy/local/docker/etc/php/conf.d/custom.ini /usr/local/etc/php/conf.d/
COPY .deploy/local/docker/etc/php/php-fpm.d/custom.conf /usr/local/etc/php/php-fpm.d/
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install extensions
RUN docker-php-ext-install intl zip pcntl pdo pdo_mysql bcmath opcache \
    && pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug

# Boost installing process
RUN composer global require hirak/prestissimo
ENV PATH="${PATH}:/root/.composer/vendor/bin"

ARG DOCKER_PROJECT_DIR
WORKDIR ${DOCKER_PROJECT_DIR}

ADD . /app
RUN composer install --no-dev
RUN chown -R www-data:www-data /app
RUN touch /tmp/xdebug.log && chown www-data:www-data /tmp/xdebug.log
