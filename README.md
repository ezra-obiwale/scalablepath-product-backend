# Scalable Product

## Setup

1. Copy `.env.example` to `.env` and update the values
2. Install dependencies `composer install`
3. Generate app key `php artisan key:generate`
4. Run migration and seeder `php artisan migrate --seed`

## Api

Action | method | path
-------|--------|------
List   | GET    | /api/products
Delete | DELETE | /api/products/{id}

## Tests

Run `phpunit`
