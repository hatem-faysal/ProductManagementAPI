run project
<br/>
<br/>
1-cp .env.example .env
<br/>
2-php artisan key:generate
<br/>
3-composer install
<br/>
4-php artisan migrate:fresh --seed
<br/>
5-php artisan test
<br/>
6-php artisan serve
<br/>

<br/>
<br/>
<br/>

Explain the technology:
<br/>
1-use framework laravel
<br/>
2-use (sanctum) to login and register with api 
<br/>
3-use package laravel-permission to make rule and permeation to user
<br/>
<br/>


Documentation:
<br/>
1-make Auth user with login , register , forgot , reset-password , show users , all users.
<br/>
2-use desine patter action is layout database with create data or update data.
<br/>
3-products is crud operation.
<br/>
4-unite test with users and products.
<br/>