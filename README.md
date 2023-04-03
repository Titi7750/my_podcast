<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation

Follow these steps to install and configure the Laravel project :

1. Clone the project from GitHub
```
git clone https://github.com/Titi7750/my_podcast.git
```
## Command Installation

First solution :
```
./install.sh
```
Second solution step by step :

1. Install the required dependencies with Composer :
```
composer install
```

2. Copy the .env.example file and rename it .env :
```
cp .env.example .env
```
Note: If you are on a Windows operating system, use ```copy``` instead of ```cp```.

3. Generate a Laravel application key :
```
php artisan key:generate
````

4. Configure your database details in the .env file :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DATABASE_NAME
DB_USERNAME=DATABASE_USER
DB_PASSWORD=DATABASE_PASSWORD
```
Replace DATABASE_NAME, DATABASE_USER, and DATABASE_PASSWORD with your database details.

5. Go create your database in PHPMyAdmin or another alternative.

6. Run migrations and seeders :
```
php artisan migrate --seed
```

7. Install JavaScript dependencies with :
```
npm install
```

8. Configure the details for the Microsoft connection in your .env file :
```
MICROSOFT_CLIENT_ID=''
MICROSOFT_CLIENT_SECRET=''
MICROSOFT_TENANT_ID=''
MICROSOFT_REDIRECT_URI='http://localhost:8000/auth/callback'
```

9. To link the Storage folder of your application to the Public folder, run the following command :
```
php artisan storage:link
```

## Server startup :

1. To start the Laravel server :
```
php artisan serve
```

2. To start the front-end server :
```
npm run dev
```

Your Laravel application is now available at http://localhost:8000.

Note: If you encounter the following error :
```
cURL error 60: SSL certificate problem: unable to get local issuer certificate
```
Go to the vendor/guzzlehttp/guzzle/src/handler/CurlFactory folder and modify lines 358 and 359 :

Original Version :
```
$conf[\CURLOPT_SSL_VERIFYHOST] = 2;
                $conf[\CURLOPT_SSL_VERIFYPEER] = true;
```

Modified version :
```
$conf[\CURLOPT_SSL_VERIFYHOST] = 0;
                $conf[\CURLOPT_SSL_VERIFYPEER] = false;
```


## Conclusion

Congratulations! You have now installed and configured the Laravel project. Feel free to consult the official Laravel documentation to learn more about developing web applications with Laravel.
