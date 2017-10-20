#!/bin/bash
set -e

cron -f &

env >> /etc/environment
/var/www/messaging/messaging_start >> /var/www/messaging/logs/start.log &
# nohup php -f /var/www/messaging/worker/live_messaging_email.php >> /var/www/messaging/logs/live_log_email.txt &

# Apache gets grumpy about PID files pre-existing
#rm -f /var/run/apache2/apache2.pid
#exec apache2 -DFOREGROUND

exec "$@"
