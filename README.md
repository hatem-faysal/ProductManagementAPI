run project
<br/>
<br/>
1-cp .env.example .env
2-php artisan key:generate
3-composer install
4-php artisan migrate:fresh --seed
5-php artisan test
6-php artisan serve


Explain the technology:
1-use framework laravel
2-use (sanctum) to login and register with api 
3-use package laravel-permission to make rule and permeation to user


Documentation:
1-make Auth user with login , register , forgot , reset-password , show users , all users.
2-use desine patter action is layout database with create data or update data.
2-products is crud operation.
3-unite test with users and products.