# This is for full stack / backend web developer test for stealth solutions

# Instructions

1. Run: composer install

-   If composer is missing, you can download in this link: https://getcomposer.org/download/

2. Create .env file and copy the contents in .env.example file.

-   Note: You don't need to change its configuration. Just copy the .env.example content.

3. Generate an application key by running: php artisan key:generate

4. Migrate the database by running: php artisan migrate or php artisan migrate:fresh

-   Note: No need to open XAMPP/WAMPP/LAMP because I use the default Laravel SQLite database.

5. Generate an admin seed account by running: php artisan db:seed --class=UserSeeder

ADMIN CREDENTIALS (Default):

-   Username: stealth@email.com
-   Password: 1234admin

6. Run the Laravel application by: php artisan serve
