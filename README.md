# Laravel Sanctum SPA Authentication

A simple [Laravel](https://laravel.com/) API boilerplate equipped with [Sanctum](https://laravel.com/docs/master/sanctum) SPA authentication.

## Installation

To install the dependencies, navigate to the project's root directory and run:

```bash
composer install
```

Copy the contents of `.env.example` to a `.env` file, or simply run this command:

```bash
# Linux
cp .env.example .env
# Windows
copy .env.example .env
```

Configure the environment variables on the `.env` file then generate the application key by running:

```bash
php artisan key:generate
```

To the run the migrations, execute the `migrate` command:

```bash
php artisan migrate
```

Optionally, you can run the seeder to create test user data using this command:

```bash
php artisan db:seed
```

## API Endpoints 

| Method | Path              | Description                  |
|--------|-------------------|------------------------------|
| POST   | api/auth/register | Register a new account       |
| POST   | api/auth/login    | Login to an existing account |
| GET    | api/auth/user     | Fetch the authenticated user |

## Postman Collection 

There as some prerequisites to emulate a first-party SPA using Postman. `Sanctum` states that your SPA and API must share the same top-level domain so you'll have to serve the app on `localhost`. `Sanctum` also checks the incoming requests if it is stateful or not through the `Referer` header, thus the header should contain the expected URL of the SPA and it should match the defined stateful domains on the `Sanctum` configuration file or the `SANCTUM_STATEFUL_DOMAINS` environment variable.

Published documentation of the Postman collection can be found [here](https://documenter.getpostman.com/view/8446183/TVRec9wE). You can run the collection by clicking the `► Run in Postman` button on the documentation page. The `Development` environment must be set as the active environment.

| Environment Variable | Description                                     |
|----------------------|-------------------------------------------------|
| server               | Must be manually set with the application's URL |
| xsrf-token           | Automatically set through a pre-request script  |
| referer              | Expected address of the SPA                     |