FROM debian

WORKDIR /var/www/html/

RUN echo "UTC" > /etc/timezone
RUN apt-get install --only-upgrade bash
RUN sed -i 's/bin\/ash/bin\/bash/g' /etc/passwd
RUN apt-get update && apt-get -y upgrade
RUN apt-get install -y php php-common
RUN apt-get -y install php-cli php-fpm php-json php-pdo php-mysql php-zip php-gd  php-mbstring php-curl php-xml php-pear php-bcmath
RUN apt-get install -y zip unzip curl sqlite nginx supervisor
RUN curl -sL https://deb.nodesource.com/setup_12.x
RUN apt-get install -y nodejs

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php

# Configure supervisor
RUN mkdir -p /etc/supervisor.d/
COPY docker/supervisord.ini /etc/supervisor.d/supervisord.ini

# Configure php-fpm
RUN mkdir -p /run/php/
RUN touch /run/php/php7.4-fpm.pid
RUN touch /run/php/php7.4-fpm.sock

COPY docker/php-fpm.conf /etc/php7/php-fpm.conf

# Configure nginx
RUN echo "daemon off;" >> /etc/nginx/nginx.conf
COPY docker/default.conf /etc/nginx/conf.d/default.conf
COPY docker/fastcgi-php.conf /etc/nginx/fastcgi-php.conf

RUN mkdir -p /run/nginx/
RUN touch /run/nginx/nginx.pid

RUN ln -sf /dev/stdout /var/log/nginx/access.log
RUN ln -sf /dev/stderr /var/log/nginx/error.log

# Build process
COPY . /var/www/html/

RUN composer update -n
RUN php artisan key:generate --force
RUN php artisan migrate:fresh --force
RUN php artisan db:seed --force
RUN php artisan passport:install --force

# Container execution
EXPOSE 3000
CMD [ "php", "artisan", "serve", "--host=0.0.0.0" ]
