FROM php:8.4-apache-bookworm AS base

RUN a2enmod rewrite
COPY apache2/000-default.conf /etc/apache2/sites-available
RUN a2ensite 000-default
