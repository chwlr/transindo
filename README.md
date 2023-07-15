<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

RentalCarAPI

<b>Deployment Instructions</b>

<b>Follow this instruction below to deploy this application on the server.</b>

System Requirement
- Basic/Standard Server (xampp)
- MySql or MariaDb latest version
- PHP version ^8.1
- Composer version ^2.1
- laravel/framework: ^10.10

System Setup
- Clone project git clone https://github.com/chwlr/transindoAPI.git
- Install Dependencies Composer install --no-dev
- Copy .env.example file cp .env.example .env
- Generate Secret Key php artisan key:generate
- Run php artisan serve
- API can be tested on POSTMAN (import file "transindoAPI.postman_collection.json" to Postman)

