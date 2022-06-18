## Requirements

-   PHP version/verzia >= 7.25
-   MySQL version/verzia: 5.7 / 8.
-   composer dependency manager
-   npm package manager 

## Installation

-   Please download the application from the repository.
`git clone https://github.com/martinfeher/sprava-inventura-auto-dielov.git`

-   Please open the application folder
`cd sprava-inventura-auto-dielov`

-   Copy the example env file and make the required configuration changes in the .env file
`cp .env.example .env`

-   Please create the MySQL database and add the connection parameters to the .env file
e.g.: DB_DATABASE=sprava_inventura_auto_dielov, DB_USERNAME=root DB_PASSWORD=pass

-   Migration, testing commands 
    `php artisan migrate`     // creates database tables
    `php artisan db:seed`, or `php artisan migrate:refresh --seed`    // testing the database, creating testing data in the database
    `php artisan migrate:refresh`    // reset the tables with no values in, remove data in the database tables

-   Please run:
    `composer install`  // installs composer packages to vendor directory
    `npm install`       // installs npm packages to node_modules directory

-   Command to run the application in the local environment
    `php artisan serve`

-   Base urls: 
`/` - cars, `/parts` - parts


## Inštrukcie SK:
-   Stiahnite aplikáciu z repozitára.
`git clone https://github.com/martinfeher/sprava-inventura-auto-dielov.git`

-   Vojdite do adresára aplikácie.

-   Skopírujte .env.example do .env 
`cp .env.example .env`

-   Vytvorte MySQL databázu a parametre zadaje do .env súbora napr.: 
DB_DATABASE=sprava_inventura_auto_dielov, DB_USERNAME=root DB_PASSWORD=heslo
         //inštalácia javascriptových balíčkov do node_modules adresára

-   Spustite príkaz 
    `php artisan migrate`     // vytvorenie databázových tabuliek
    `php artisan db:seed` alebo `php artisan migrate:refresh --seed`    // testovanie databázy, vytvorenie testovacích dát v databáze


-   Spustite príkazy
    `composer install`      // inštalácia laravel balíčkov do vendor adresára
    `npm install`  

-   Príkaz na spustenie aplikácie v lokálnom prostredí
   `php artisan serve`

-   Základné url: 
`/` - cars, `/parts` - parts