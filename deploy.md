# base

## Deployment zu Local

git pull
composer install
npm install
php artisan app:reset

php artisan serve
npm run dev
->Browser öffnen und einloggen

### Erst-Deployment zu Production

chmod -R 755 storage
.env kopieren und anpassen

## Deployment zu Production

git pull
composer install --optimize-autoloader --no-dev
npm install --omit=dev
artisan vendor:publish --tag=livewire:assets # Kann gepushed werden
php artisan optimize

### Fehlerbehebung wenn Daten auf dem Production geändert wurden

git restore .

## Testing

### Redis

composer show | grep redis
php artisan test --filter RedisConnectionTest

## Deploy result

https://laracasts.com/discuss/channels/livewire/has-anyone-got-livewire-3-running-in-production-on-a-nginx-server

"post-update-cmd": [
"@php artisan vendor:publish --tag=laravel-assets --ansi",
"@php artisan vendor:publish --tag=livewire:assets --ansi"
],

"post-install-cmd": [
"@php artisan vendor:publish --tag=livewire:assets --ansi"
]
