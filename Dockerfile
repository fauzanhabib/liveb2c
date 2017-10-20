FROM php:7-apache

# CRON
RUN apt-get update -y
RUN apt-get install -y cron wget
RUN apt-get install libmcrypt-dev -y
RUN docker-php-ext-install mysqli
RUN docker-php-ext-configure mcrypt && docker-php-ext-install mcrypt

ADD crons.conf /var/www/crons.conf
RUN crontab /var/www/crons.conf
RUN touch /var/log/cron.log

# Used for debugging, remove when done using.
RUN apt-get install vim -y

# certificate
# ADD ./config/000-default.conf /etc/apache2/sites-enabled/000-default.conf
ADD ./config/default-ssl.conf /etc/apache2/sites-enabled/default-ssl.conf
ADD ./config/php.ini /usr/local/etc/php/
ADD ./certs/ssl.key /etc/ssl/private/ssl.key
ADD ./certs/ssl.pem /etc/ssl/certs/ssl.pem
ADD ./certs/ca.thawte.com.crt /etc/ssl/certs/ca.thawte.com.crt

# Be very careful with adding/copying file to /usr/local/bin/, it will make the "docker-compose up" process take so long. !!!
COPY start.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/start.sh

WORKDIR /var/www/html

RUN a2enmod headers && a2enmod expires && a2enmod rewrite
RUN a2enmod ssl

ADD ./config/php.ini /usr/local/etc/php/
ADD ./live /var/www/html/

# messaging
RUN mkdir -p /var/www/messaging
ADD ./messaging /var/www/messaging/

#EXPOSE 80
#CMD ["start.sh"]
