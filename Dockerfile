FROM dyned/apache2-php7

# Used for debugging, remove when done using.
RUN apt-get install vim -y

# CRON
RUN apt-get update && apt-get install -y cron wget
ADD crons.conf /var/www/crons.conf
RUN crontab /var/www/crons.conf
# Create the log file
RUN touch /var/log/cron.log

COPY apache2-foreground-cron /usr/local/bin/

WORKDIR /var/www/html

RUN a2enmod headers && a2enmod expires && a2enmod rewrite

ADD ./config/php.ini /usr/local/etc/php/
ADD ./live /var/www/html/

# messaging
RUN mkdir -p /var/www/messaging
ADD ./messaging /var/www/messaging/

EXPOSE 80
CMD ["apache2-foreground-cron"]
