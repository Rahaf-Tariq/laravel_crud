# PeopleDesk - Employee Management System

A clean, minimal employee management web application built with **Laravel** featuring a sidebar layout, department management, employee records, and role-based navigation — all wrapped in a simple and professional UI.

---

## Project Overview

**PeopleDesk** is a **Laravel-based employee management system** designed to help organizations manage their workforce efficiently. It provides a dashboard to view, filter, and manage employees and departments with a fixed sidebar navigation and a clean table-based interface.

---

## Features

- **Sidebar Navigation** — Fixed sidebar with active link highlighting for easy navigation
- **Employee Management** — View, add, edit, and delete employee records
- **Department Management** — Organize employees by department
- **Status Badges** — Visual indicators for Active, Inactive, and On Leave statuses
- **Search & Filter** — Search employees and filter by status
- **Stats Overview** — Quick stats row showing key workforce numbers
- **Authentication** — Login, logout, and profile management built in
- **Responsive Layout** — Sidebar + main content layout that adapts cleanly

---

## Installation

Follow these steps to get the project running locally:

### 1. Clone the Repository

```bash
git clone https://github.com/Rahaf-Tariq/laravel_crud.git
cd laravel_crud
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Dependencies

```bash
npm install
```

### 4. Setup Environment File

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure Your `.env`

Open `.env` and update:

```env
APP_NAME="PeopleDesk"
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=peopledesk
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Run Migrations

```bash
php artisan migrate
```

### 7. (Optional) Seed the Database

```bash
php artisan db:seed
```

### 8. Start the Development Server

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` to access the application.

---

## Folder Structure

```
peopledesk/
│
├── app/
│   └── Http/
│       └── Controllers/
│           ├── EmployeeController.php      # Employee CRUD logic
│           └── DepartmentController.php    # Department CRUD logic
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php              # Main sidebar layout
│       ├── employees/                     # Employee views (index, create, edit)
│       └── departments/                   # Department views (index, create, edit)
│
├── routes/
│   └── web.php                            # All application routes
│
├── database/
│   ├── migrations/                        # Database table definitions
│   └── seeders/                           # Sample data seeders
│
├── .env                                   # Environment configuration
├── composer.json
└── README.md
```

---

## Routes

| Method   | URL                    | Description                 |
| -------- | ---------------------- | --------------------------- |
| `GET`    | `/employees`           | List all employees          |
| `GET`    | `/employees/create`    | Show create employee form   |
| `POST`   | `/employees`           | Store new employee          |
| `GET`    | `/employees/{id}/edit` | Show edit employee form     |
| `PUT`    | `/employees/{id}`      | Update employee record      |
| `DELETE` | `/employees/{id}`      | Delete employee             |
| `GET`    | `/departments`         | List all departments        |
| `GET`    | `/departments/create`  | Show create department form |
| `POST`   | `/departments`         | Store new department        |
| `GET`    | `/profile/edit`        | Edit user profile           |
| `POST`   | `/logout`              | Logout current user         |

---

## Employee Status Types

| Status   | Description                     |
| -------- | ------------------------------- |
| Active   | Currently working employee      |
| Inactive | No longer with the organization |
| On Leave | Temporarily away                |

---

## Tech Stack

| Technology   | Purpose                              |
| ------------ | ------------------------------------ |
| Laravel      | Backend framework & routing          |
| Blade        | Templating engine & layout system    |
| CSS3         | Custom sidebar layout & UI styling   |
| MySQL        | Database for employees & departments |
| Laravel Auth | Authentication & session management  |

---

## License

This project is open-source and available under the [MIT License](LICENSE).
