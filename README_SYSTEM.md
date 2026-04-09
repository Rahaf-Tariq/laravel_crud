# Employee Management System

A clean and simple employee management application built with Laravel and Breeze.

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js 18 or higher
- Laravel 11.x

## Installation

1. Clone the repository

    ```
    git clone <repository-url>
    cd laravel_crud
    ```

2. Install PHP dependencies

    ```
    composer install
    ```

3. Copy environment file

    ```
    cp .env.example .env
    ```

4. Generate application key

    ```
    php artisan key:generate
    ```

5. Create SQLite database

    ```
    touch database/database.sqlite
    ```

6. Run migrations and seeders

    ```
    php artisan migrate --seed
    ```

7. Install Node dependencies

    ```
    npm install
    ```

8. Build frontend assets

    ```
    npm run build
    ```

9. Start the development server

    ```
    php artisan serve
    ```

10. Access the application
    ```
    http://localhost:8000
    ```

## Login Credentials

Default test account:

- Email: test@example.com
- Password: password

## Features

- User authentication and registration
- Dashboard with statistics
- Employee management (CRUD)
- Department management
- Search functionality
- Soft delete and restore
- Clean and simple UI

## Database Schema

- Users: Authentication
- Departments: Department information
- Employees: Employee records with department relationships

All employee and department records support soft delete for trash functionality.
