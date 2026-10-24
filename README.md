# Activity 9 - Laravel Authentication

Academic Laravel 7 project that implements user registration, login, logout, a public Landing Page and a protected Dashboard.

## Activity 9 features

- Public Landing Page at `/`.
- User registration and login with Laravel UI.
- Protected Dashboard at `/dashboard`.
- Dynamic navbar for guests and authenticated users.
- Secure password hashing through Laravel authentication.
- Logout and guest redirection to the login form.

## Technologies

- PHP 7.4
- Laravel 7
- Laravel UI 2.4
- MySQL/MariaDB
- Blade
- Vue scaffolding and Bootstrap 4
- PHPUnit

## Local installation

1. Install PHP dependencies with `composer install`.
2. Copy `.env.example` to `.env`.
3. Configure the local database and mail values in `.env`.
4. Generate the application key with `php artisan key:generate`.
5. Run the migrations with `php artisan migrate`.
6. Install and compile frontend assets with `npm install` and `npm run dev` when necessary.
7. Start the application with `php artisan serve`.

The `.env` file contains local configuration and must never be committed.

## Verification

Run the automated tests with:

```bash
vendor/bin/phpunit
```

## Repository

[https://github.com/AlejandroVela333/activity-9](https://github.com/AlejandroVela333/activity-9)
