# Tasker (Portfolio)
<!-- Last Sync: 2026-03-22 01:10 -->

A modern, robust Task Management system built with Laravel 11/12, Livewire 3, and Tailwind CSS. Designed for portfolios and professional task tracking.

## Features
- **Authentication**: Powered by Laravel Breeze (Livewire/Volt).
- **Role-based Access Control**: 
  - **Admin**: Can view and manage all tasks from all users.
  - **User**: Can only manage their own tasks.
- **Service Layer**: Business logic encapsulated in `TaskService`.
- **Livewire Components**: 
  - Dynamic task list with status filtering.
  - Inline create/edit via responsive modals.
  - Delete with confirmation dialogs.
- **Modern UI**: Clean Tailwind CSS design with priority and status badges.
- **Automated Testing**: Robust test suite using Pest.

## Tech Stack
- **Framework**: Laravel 12
- **Frontend**: Livewire 3 + Alpine.js
- **Styling**: Tailwind CSS
- **Testing**: Pest PHP
- **Database**: SQLite (default)

## Visuals

> [!NOTE]
> Add your own high-resolution screenshots here once deployed!

### Dashboard Overview
![Dashboard Placeholder](https://via.placeholder.com/1200x600?text=Your+Dashboard+Screenshot+Here)

### Inline Task Management (Modal)
![Modal Placeholder](https://via.placeholder.com/800x500?text=Edit+Modal+Screenshot+Here)

### 1. Clone & Setup
```bash
git clone https://github.com/oliverdev00/pseudocrud.git
cd task-manager
composer install
npm install
```

### 2. Environment Configuration
Copy the `.env.example` to `.env` and generate the app key:
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Database Migration & Seeding
Initialize the SQLite database and seed example data (admin/user and tasks):
```bash
touch database/database.sqlite
php artisan migrate:fresh --seed
```

### 4. Running the Application
Start the development server:
```bash
php artisan serve
npm run dev
```

## Running Tests
Run the Pest test suite to verify the application:
```bash
php artisan test
```

## Troubleshooting

### PowerShell Script Execution (Windows)
If you see a security error when running `npm` or `artisan` scripts in PowerShell:
```powershell
Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
```
This allows locally created scripts to run while maintaining security for downloaded scripts.

## Default Credentials
- **Admin**: `admin@example.com` / `password`
- **User**: `user@example.com` / `password`
