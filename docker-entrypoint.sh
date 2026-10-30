#!/bin/bash
set -e

export PORT="${PORT:-80}"

echo "Configuring Apache to listen on port ${PORT}..."
sed -i "s/Listen [0-9]*/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:[0-9]*>/<VirtualHost \*:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# Ensure .env exists
if [ ! -f /var/www/html/.env ]; then
    echo "Creating .env from .env.example..."
    cp /var/www/html/.env.example /var/www/html/.env
fi

# Clean any stale bootstrap caches
rm -f /var/www/html/bootstrap/cache/*.php

# Create necessary directories
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/storage/app/public
mkdir -p /var/www/html/database
mkdir -p /var/www/html/bootstrap/cache

# Create SQLite database if not exists
if [ ! -f /var/www/html/database/database.sqlite ]; then
    echo "Creating SQLite database..."
    touch /var/www/html/database/database.sqlite
fi

chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Check and generate APP_KEY
php artisan key:generate --force || true

# Run package discovery now that environment is established
echo "Discovering packages..."
php artisan package:discover --ansi || true

# Link public storage
php artisan storage:link || true

# Run database migrations and seeders
echo "Running database migrations and seeders..."
php artisan migrate --force
php artisan db:seed --force

# Optimize Laravel cache
echo "Clearing and caching configuration..."
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

echo "Starting Apache on port ${PORT}..."
exec apache2-foreground