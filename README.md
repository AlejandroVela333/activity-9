# Activity 9 - Authentication and Email Notifications

Laravel 7 academic project developed for Activity 9 and extended in Homework 8. Both parts are maintained in the same application and repository.

## Activity 9

The first part implements:

- User registration, login and logout with Laravel UI.
- Public Landing Page at `/`.
- Protected Dashboard at `/dashboard`.
- Dynamic navbar for guests and authenticated users.
- Password hashing and guest redirection to the login form.

See [docs/ACTIVIDAD_9.md](docs/ACTIVIDAD_9.md).

## Homework 8

The extension adds:

- Welcome email after a successful registration.
- Login-alert email after every explicit successful login.
- SMTP configuration kept exclusively in `.env`.

See [docs/TAREA_8.md](docs/TAREA_8.md).

The real project and email evidence is stored in [docs/evidencias/](docs/evidencias/).

## Technologies

- PHP 7.4.29
- Laravel 7.30.7
- Laravel UI 2.4
- MySQL/MariaDB
- Blade
- Vue scaffolding and Bootstrap 4
- PHPUnit 9.6.38

## Local installation

1. Install PHP dependencies with `composer install`.
2. Copy `.env.example` to `.env`.
3. Configure the local database and SMTP values in `.env`.
4. Generate the application key with `php artisan key:generate`.
5. Run the migrations with `php artisan migrate`.
6. Install and compile frontend assets with `npm install` and `npm run dev` when necessary.
7. Start the application with `php artisan serve`.

Do not commit `.env`, SMTP passwords, database credentials, `vendor` or `node_modules`.

## Tests

Run the isolated automated suite with:

```bash
vendor/bin/phpunit
```

## Repository

[https://github.com/AlejandroVela333/activity-9](https://github.com/AlejandroVela333/activity-9)
