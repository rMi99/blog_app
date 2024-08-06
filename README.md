# Laravel Application Setup for Development

This guide will walk you through setting up a Laravel application for development, including configuring environment variables, creating a storage link, and running the application.

## Prerequisites

Ensure you have the following installed on your development machine:

- PHP (>= 8.1)
- Composer
- Node.js & npm
- Git
- A database system (e.g., MySQL, PostgreSQL)

## Setup Instructions

1. **Clone the Repository**

   Clone the Laravel application repository to your local machine:

   ```sh
   git clone https://github.com/your-username/your-repository.git
   cd your-repository

``` composer install

```APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:your-app-key
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120


```compmoser install

```php artisan key:generate

``` php artisan migrate

``` php artisan storage:link

``` php artisan serve

