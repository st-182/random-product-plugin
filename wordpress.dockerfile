# Install and use latest wordpress
FROM wordpress:latest
ARG UID=1000
ARG GID=1000

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
# RUN php composer-setup.php
# RUN php -r "unlink('composer-setup.php');"



# Install and run composer
# WORKDIR /var/www/html/wp-content/plugins
# COPY  ./composer .
# RUN pwd
# RUN ls && pwd
# FROM composer:latest 
# RUN composer install --no-cache
# RUN mkdir test-dir 