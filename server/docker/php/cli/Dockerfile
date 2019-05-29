FROM php:7.0-cli

RUN apt-get update && \
    apt-get install -y \
    curl \
    git \
    unzip

RUN curl -sS https://getcomposer.org/installer | php && \ 
    chmod +x composer.phar && \
    mv composer.phar /usr/local/bin/composer
