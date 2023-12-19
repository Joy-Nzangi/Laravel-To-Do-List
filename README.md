# Laravel TO DO LIST

A to-do list app made with Laravel. Filter your items by oldest, newest, complete, and incomplete. The list items have a title, description, due date, and created date and time. Moreover, a user is able to edit/update, change the status (complete or incomplete), and lastly, delete an item.

Users have to log in or register to use the app.

## Table of Contents

-   [1. Prerequisites](#1-prerequisites)
-   [2. Installation](#2-installation)
    -   [2.1. Install Node and npm](#21-install-node-and-npm)
    -   [2.2. Install Node Dependencies](#22-install-node-dependencies)
    -   [2.3. Install PHP](#23-install-php)
    -   [2.4. Install Composer](#24-install-composer)
    -   [2.5. Install PostgreSQL](#25-install-postgresql)
    -   [2.6. Create an Empty Database in PostgreSQL](#26-create-an-empty-database-in-postgresql)
    -   [2.7. Run Laravel Migrations](#27-run-laravel-migrations)
-   [3. Usage](#3-usage)
    -   [3.1. Run npm run dev](#31-run-npm-run-dev)
    -   [3.2. Run php artisan serve](#32-run-php-artisan-serve)

## 1. Prerequisites

Before you begin, ensure you have the following installed on your machine:

-   Node.js and npm

-   PHP

-   Composer

-   PostgreSQL

## 2. Installation

### 2.1. Install Node and npm

Install Node.js and npm by visiting [https://nodejs.org/](https://nodejs.org/) and following the installation instructions for your operating system.

### 2.2. Install Node Dependencies

Run the following command to install project dependencies:

```bash

npm install

```

### 2.3. Install PHP

Install PHP by visiting [https://www.php.net/](https://www.php.net/) and following the installation instructions for your operating system.

### 2.4. Install Composer

Install Composer by visiting [https://getcomposer.org/](https://getcomposer.org/) and following the installation instructions for your operating system.

### 2.5. Install PostgreSQL

Install PostgreSQL by visiting [https://www.postgresql.org/](https://www.postgresql.org/) and following the installation instructions for your operating system.

### 2.6. Create an Empty Database in PostgreSQL

Create an empty database in PostgreSQL, either using a database management tool or the following SQL command:

```sql

CREATE DATABASE your_database_name;

```

Replace `your_database_name` with the desired name for your database in this case LaravelToDo_DB.

### 2.7. Run Laravel Migrations

Run the following command to migrate Laravel database definitions to the PostgreSQL database:

```bash

php artisan migrate

```

## 3. Usage

### 3.1. Run npm run dev

Run the following command to build frontend assets:

```bash

npm run dev

```

This command compiles and minifies assets, preparing them for production. It's typically used during development to generate the necessary files for your application.

### 3.2. Run php artisan serve

Run the following command to start the Laravel development server:

```bash

php artisan serve

```

This command starts a development server at `http://localhost:8000` (or another available port). Visit this URL in your browser to view the Laravel To Do List application. The development server is suitable for testing and development purposes.
