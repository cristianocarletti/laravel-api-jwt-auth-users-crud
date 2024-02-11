<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 1 - Update the database data in your .env file, for example:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_api_jwt_auth_users_crud
DB_USERNAME=root
DB_PASSWORD=

## 2 - RUN:
1 - composer install
2 - php artisan migrate
3 - php artisan jwt:secret
4 - php artisan serve --port=80 (you can choose the port or not pass the port parameter then it will run on the default port)

## 3 - ROUTE LIST
to see the list of routes run:
php artisan route:list

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

api/register
BODY:
{
	"email": "your@email.com",
	"name": "Your Name",
	"password": "yourpassword"
}
WILL RETURN A TOKEN
"auth": {
		"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xL2FwaS9sb2dpbiIsImlhdCI6MTcwNzIyNzQ1OSwiZXhwIjoxNzA3MjMxMDU5LCJuYmYiOjE3MDcyMjc0NTksImp0aSI6IldFWkdVV21qczdnS2hnWHciLCJzdWIiOiIzIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.QH6jDiA1m_E01uw2C_gqKi7ivWxll7-ll5XscA-NVHU",
		"type": "bearer"
	}

api/login
BODY:
{
	"email": "your@email.com",
	"password": "yourpassword"
}
WILL RETURN A TOKEN
"auth": {
		"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xL2FwaS9sb2dpbiIsImlhdCI6MTcwNzIyNzQ1OSwiZXhwIjoxNzA3MjMxMDU5LCJuYmYiOjE3MDcyMjc0NTksImp0aSI6IldFWkdVV21qczdnS2hnWHciLCJzdWIiOiIzIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.QH6jDiA1m_E01uw2C_gqKi7ivWxll7-ll5XscA-NVHU",
		"type": "bearer"
	}

FOR ALL OTHER ENDPOINTS, USE THE TOKEN RETURNED AT LOGIN IN THE HEAD:
Bearer Token:
eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xL2FwaS9sb2dpbiIsImlhdCI6MTcwNzIyNzQ1OSwiZXhwIjoxNzA3MjMxMDU5LCJuYmYiOjE3MDcyMjc0NTksImp0aSI6IldFWkdVV21qczdnS2hnWHciLCJzdWIiOiIzIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.QH6jDiA1m_E01uw2C_gqKi7ivWxll7-ll5XscA-NVHU

api/user/store
BODY:
{
	"name": "Your Dog",
	"email": "yourdog@email.com",
	"password" : "yourdogspassword"
}

api/user/update
BODY:
{
	"id": 2,
	"name": "Your Dogs name",
	"email": "yourdogsname@email.com"
}
