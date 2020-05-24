#!/bin/sh
set -e
APP_PATH="/opt/app"
php ${APP_PATH}/bin/console doctrine:migrations:migrate -n -q --allow-no-migration
exec "$@"
