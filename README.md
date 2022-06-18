## Requirements

PHP version/verzia >= 7.25
composer dependency manager installed / nainštalovaný composer https://getcomposer.org/
MySQL version/verzia: 5.7 / 8.

## Installation

Please unzip the application and download it from the repository.

Please open the application folder
`cd sprava-inventura-auto-dielov`

Copy the example env file and make the required configuration changes in the .env file
`cp .env.example .env`

Please create the MySQL database and add the connection parameters to the .env file
e.g.: DB_DATABASE=sprava_inventura_auto_dielov, DB_USERNAME=root DB_PASSWORD=pass

migration, testing commands 
    `php artisan migrate`     // creates database tables
    `php artisan db:seed`, or `php artisan migrate:refresh --seed`    // testing the database, creating testing data in the database
    `php artisan migrate:refresh`    // reset the tables with no values in, remove data in the database tables

command to run the application in the local environment
    `php artisan serve`

base urls: 
`/` - cars, `/parts` - parts


Inštrukcie SK:
Rozbalte aplikáciu alebo ju stiahnite z repozitára.

Vojdite do adresára aplikácie.

skopírujte .env.example do .env 
`cp .env.example .env`

Vytvorte MySQL databázu a parametre zadaje do .env súbora napr.: 
DB_DATABASE=sprava_inventura_auto_dielov, DB_USERNAME=root DB_PASSWORD=heslo

Spustite príkazy
    `composer install`      // inštalácia laravel balíčkov do vendor adresára
    `npm install`           //inštalácia javascriptových balíčkov do node_modules adresára

spustite príkaz 
    `php artisan migrate`     // vytvorenie databázových tabuliek
    `php artisan db:seed` alebo `php artisan migrate:refresh --seed`    // testovanie databázy, vytvorenie testovacích dát v databáze

príkaz na spustenie aplikácie v lokálnom prostredí
   `php artisan serve`

základné url: 
`/` - cars, `/parts` - parts