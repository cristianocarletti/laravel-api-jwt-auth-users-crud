<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 1 - Update the database data in your .env file, for example:

DB_CONNECTION=mysql<BR>
DB_HOST=127.0.0.1<BR>
DB_PORT=3306<BR>
DB_DATABASE=laravel_api_jwt_auth_users_crud<BR>
DB_USERNAME=root<BR>
DB_PASSWORD=<BR>

## 2 - RUN:
1 - composer install<BR>
2 - php artisan migrate<BR>
3 - php artisan jwt:secret<BR>
4 - php artisan serve --port=80 (you can choose the port or not pass the port parameter then it will run on the default port)<BR>

## 3 - ROUTE LIST
to see the list of routes run:<BR>
php artisan route:list<BR>
<code>
| Domain | Method   | URI                   | Name | Action                                                     | Middleware            
               |
+--------+----------+-----------------------+------+------------------------------------------------------------+--------------------------------------+
|        | GET|HEAD | /                     |      | Closure                                                    | web                   
               |
|        | POST     | api/login             |      | App\Http\Controllers\AuthController@login                  | api                   
               |
|        | POST     | api/logout            |      | App\Http\Controllers\AuthController@logout                 | api                   
               |
|        |          |                       |      |                                                            | App\Http\Middleware\Authenticate:api |
|        | POST     | api/refresh           |      | App\Http\Controllers\AuthController@refresh                | api                   
               |
|        |          |                       |      |                                                            | App\Http\Middleware\Authenticate:api |
|        | POST     | api/register          |      | App\Http\Controllers\AuthController@register               | api                   
               |
|        | DELETE   | api/user/destroy/{id} |      | App\Http\Controllers\UserController@destroy                | api                   
               |
|        |          |                       |      |                                                            | App\Http\Middleware\Authenticate:api |
|        | GET|HEAD | api/user/index        |      | App\Http\Controllers\UserController@index                  | api                                  |
|        |          |                       |      |                                                            | App\Http\Middleware\Authenticate:api |
|        | GET|HEAD | api/user/show/{id}    |      | App\Http\Controllers\UserController@show                   | api                                  |
|        |          |                       |      |                                                            | App\Http\Middleware\Authenticate:api |
|        | POST     | api/user/store        |      | App\Http\Controllers\UserController@store                  | api                                  |
|        |          |                       |      |                                                            | App\Http\Middleware\Authenticate:api |
|        | POST     | api/user/update       |      | App\Http\Controllers\UserController@update                 | api                                  |
|        |          |                       |      |                                                            | App\Http\Middleware\Authenticate:api |
|        | GET|HEAD | sanctum/csrf-cookie   |      | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show | web                                  |
+--------+----------+-----------------------+------+------------------------------------------------------------+--------------------------------------+
</code>
<BR>
api/register<BR>
BODY:<BR>
{<BR>
	"email": "your@email.com",<BR>
	"name": "Your Name",<BR>
	"password": "yourpassword"<BR>
}<BR>
WILL RETURN A TOKEN<BR>
"auth": {<BR>
		"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",<BR>
		"type": "bearer"<BR>
	}<BR>
<BR>
api/login<BR>
BODY:<BR>
{<BR>
	"email": "your@email.com",<BR>
	"password": "yourpassword"<BR>
}<BR>
WILL RETURN A TOKEN<BR>
"auth": {<BR>
		"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",<BR>
		"type": "bearer"<BR>
	}<BR>
<BR>
FOR ALL OTHER ENDPOINTS, USE THE TOKEN RETURNED AT LOGIN IN THE HEAD:<BR>
Bearer Token:<BR>
eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9....<BR>
<BR>
api/user/store<BR>
BODY:<BR>
{<BR>
	"name": "Your Dog",<BR>
	"email": "yourdog@email.com",<BR>
	"password" : "yourdogspassword"<BR>
}<BR>
<BR>
api/user/update<BR>
BODY:<BR>
{<BR>
	"id": 2,<BR>
	"name": "Your Dogs name",<BR>
	"email": "yourdogsname@email.com"<BR>
}
