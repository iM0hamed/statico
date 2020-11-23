# Statico - PUBGM Competitive Statistic

Installation
-----------

  1. Run in cmd or bash `git clone https://github.com/borneo-digital-creative/statico.git`
  2. Move into the folder `cd statico`
  3. Install dependencies `composer install`
  4. Create new database named "statico".
  5. Copy `.env.example` to `.env`
  6. Clear the config `php artisan config:clear`
  7. Generate new APP_KEY `php artisan key:generate`
  8. Run the migration `php artisan migrate --seed`
