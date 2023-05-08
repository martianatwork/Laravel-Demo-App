### Requirements
1. PHP >= 8.1

### Run the code
To run the project simply run following commands
```shell
cp .env.example .env
composer install
php artisan migrate --force
php artisan import:coin-gecko-markets
php artisan show:coins
```

### Overview
`app/Service/CoinGecko.php` has a public static `request` method to reuse the same base url,
 
We can make a singleton & facade for it if we want to add support for pro and free api.

Files created
1. app/Service/CoinGecko.php
2. app/Console/Commands/ImportCoinGeckoMarketsCommand.php
3. app/Console/Commands/ShowCoins.php
4. app/Models/Coin.php
5. app/Models/Platform.php
6. database/factories/CoinFactory.php
7. database/factories/PlatformFactory.php
8. database/migrations/2023_05_05_214328_create_coins_table.php
9. database/migrations/2023_05_05_214445_create_platforms_table.php
