#!/bin/sh
set -e
APP_PATH="/opt/app"
sleep 5
php ${APP_PATH}/bin/console doctrine:migrations:migrate -n --allow-no-migration
exec "$@"
