# Portfolio Projects - Laravel CRUD Implementation Guide

This guide explains how to implement this Portfolio Projects CRUD application step by step.

## Step 1: Project Setup

```bash
# Create a new Laravel project
laravel new taskProject

# Navigate to the project directory
cd taskProject
```

## Step 2: Database Configuration

1. Open `.env` file and configure your MySQL database settings:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Step 3: Create Model, Controller, and Migration

```bash
# Create Project model with migration and resource controller
php artisan make:model Project -mcr
```

## Step 4: Configure the Migration

Edit the `database/migrations/xxxx_xx_xx_xxxxxx_create_projects_table.php` file to define the projects table schema with the required fields.

## Step 5: Configure the Model

Edit the `app/Models/Project.php` file to define fillable fields for mass assignment.

## Step 6: Implement the Controller

Edit the `app/Http/Controllers/ProjectController.php` file to implement all CRUD methods.

## Step 7: Create View Files

1. Create the layout file:
```bash
mkdir -p resources/views/layouts
```
Create `resources/views/layouts/app.blade.php`

2. Create project views:
```bash
mkdir -p resources/views/projects
```
Create the following files:
- `resources/views/projects/index.blade.php`
- `resources/views/projects/create.blade.php`
- `resources/views/projects/edit.blade.php`
- `resources/views/projects/show.blade.php`

## Step 8: Configure Routes

Edit the `routes/web.php` file to define resource routes for the projects.

## Step 9: Create Storage Link

```bash
# Create a symbolic link to make uploaded files accessible
php artisan storage:link
```

## Step 10: Run Migrations

```bash
# Run database migrations
php artisan migrate
```

## Step 11: Start the Development Server

```bash
# Start the Laravel development server
php artisan serve
```

## File Structure Overview

```
app/
  Http/
    Controllers/
      ProjectController.php  # Handles CRUD operations
  Models/
    Project.php              # Project model definition
    
database/
  migrations/
    xxxx_create_projects_table.php  # Database schema
    
resources/
  views/
    layouts/
      app.blade.php          # Main layout template
    projects/
      index.blade.php        # List all projects
      create.blade.php       # Create new project form
      edit.blade.php         # Edit project form
      show.blade.php         # Show project details
      
routes/
  web.php                    # Route definitions
  
public/
  storage/                   # Symbolic link to storage
    projects/                # Where project images are stored
```

## Git Usage

Initialize a Git repository and make regular commits:

```bash
# Initialize Git repository
git init

# Add all files
git add .

# Make initial commit
git commit -m "Initial commit: Set up Laravel CRUD for portfolio projects"

# Make specific feature commits (examples)
git commit -m "Add Project model and migration"
git commit -m "Implement ProjectController with CRUD methods"
git commit -m "Create project views"
git commit -m "Add image upload functionality"
```