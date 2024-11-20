# base

## Deployment zu Local

git pull
composer install
npm install
php artisan app:reset

php artisan serve
npm run dev
->Browser öffnen und einloggen

## Deployment zu Production

git pull
composer install --optimize-autoloader --no-dev
npm install --omit=dev
npm run prod
chmod -R 755 storage
.env kopieren und

php artisan optimize

### Fehlerbehebung wenn Daten auf dem Production geändert wurden

git restore .

## Testing

### Redis

composer show | grep redis
php artisan test --filter RedisConnectionTest
