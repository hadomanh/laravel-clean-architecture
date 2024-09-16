#!/bin/sh

set -e

cp -run /tmp/vendor ./
php artisan key:generate
php artisan migrate

exec "$@"
