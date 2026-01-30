#!/bin/bash
set -e

if [ -f "/var/www/html/composer.json" ]; then
    echo "Checking/Installing Composer dependencies..."
    composer install --no-interaction --prefer-dist
fi

exec "$@"
