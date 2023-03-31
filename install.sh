composer install
cp .env.example .env
php artisan key:generate
npm install
php artisan storage:link