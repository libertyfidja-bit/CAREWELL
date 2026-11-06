FROM php:8.3-apache

# Render tells the container which port to listen on via $PORT (default 10000)
ENV PORT=10000
RUN sed -ri 's/Listen 80/Listen ${PORT}/' /etc/apache2/ports.conf \
 && sed -ri 's/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/' /etc/apache2/sites-available/000-default.conf

# Production PHP settings: no error output to visitors
RUN cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY . /var/www/html/
RUN rm -rf /var/www/html/.git /var/www/html/Dockerfile /var/www/html/render.yaml \
 && chown -R www-data:www-data /var/www/html

EXPOSE 10000
