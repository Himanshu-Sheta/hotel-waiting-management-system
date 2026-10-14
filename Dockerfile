FROM php:7.4-apache

RUN docker-php-ext-install mysqli pdo_mysql

RUN a2enmod rewrite

# Setup PHP configuration for legacy PHP 7.x app
RUN { \
    echo "error_reporting = E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED"; \
    echo "display_errors = Off"; \
    echo "log_errors = On"; \
    echo "short_open_tag = On"; \
    echo "date.timezone = Europe/Berlin"; \
    echo "mysqli.default_socket = /var/run/mysqld/mysqld.sock"; \
    echo "pdo_mysql.default_socket = /var/run/mysqld/mysqld.sock"; \
} > /usr/local/etc/php/conf.d/bachelor-app.ini

CMD ["apache2-foreground"]
