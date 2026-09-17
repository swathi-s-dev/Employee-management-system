# Employee Management System — Laravel Web Application

A web-based Employee Management System built with Laravel, MySQL, Bootstrap, HTML, CSS, and JavaScript.

The project includes admin authentication, dashboard, employee management, department management, attendance tracking, payroll management, CRUD operations, employee status management, department assignment, and salary management.

## Tech Stack

- PHP 8.3.33
- Laravel 13.31.0
- MySQL
- Bootstrap
- HTML5
- CSS3
- JavaScript
- XAMPP
- Git & GitHub

## Requirements

- PHP 8.3+
- Composer
- MySQL
- XAMPP
- Node.js / npm
## Features

- Admin Login / Logout
- Dashboard
- Employee CRUD
- Department CRUD
- Attendance Management
- Payroll Management
- Employee REST API
- Employee status management

## REST API
GET `/api/employees`
GET `/api/employees/{id}`
POST `/api/employees`
PUT `/api/employees/{id}`
DELETE `/api/employees/{id}`

## 1. Install

```bash
composer install

copy .env.example .env

php artisan key:generate

npm install
