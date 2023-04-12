FROM php:apache

# Define a variável de ambiente DEBIAN_FRONTEND como noninteractive
ENV DEBIAN_FRONTEND noninteractive

# Instala extensao necessarias do PHP
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install pdo

# Habilita o módulo rewrite
RUN a2enmod rewrite

