# Install and use latest wordpress
FROM wordpress:latest
ARG UID=1000
ARG GID=1000
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
