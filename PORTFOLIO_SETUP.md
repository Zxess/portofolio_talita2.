# portofolio Website Setup Guide

## Overview
This is a Laravel-based portofolio website with the following features:
- Responsive design with Tailwind CSS
- Project showcase with featured projects
- Individual project detail pages
- Skills and about sections
- Social sharing capabilities
- Contact form ready for implementation

## Setup Instructions

### 1. Run Database Migrations
```bash
php artisan migrate
```

### 2. Seed the Database with Sample Data
```bash
php artisan db:seed
```

Or seed only projects:
```bash
php artisan db:seed --class=ProjectSeeder
```

### 3. Serve the Application
```bash
php artisan serve
```

Then open: http://localhost:8000

## Project Structure

### Files Created/Modified:
- `database/migrations/2026_02_15_000003_create_projects_table.php` - Projects table schema
- `app/Models/Project.php` - Project model
- `app/Http/Controllers/portofolioController.php` - Main controller
- `database/seeders/ProjectSeeder.php` - Sample project data
- `database/seeders/DatabaseSeeder.php` - Updated to call ProjectSeeder
- `routes/web.php` - Updated routes
- `resources/views/layout.blade.php` - Base layout
- `resources/views/portofolio/index.blade.php` - portofolio homepage
- `resources/views/portofolio/show.blade.php` - Project detail page

## Routes

- `/` - portofolio homepage (lists all projects)
- `/projects/{slug}` - Individual project details

## Database Schema

### Projects Table Columns:
- `id` - Primary key
- `title` - Project title
- `slug` - URL-friendly identifier
- `description` - Short description
- `long_description` - Detailed description
- `image` - Project image URL
- `link` - Live project link
- `github_link` - GitHub repository link
- `technologies` - JSON array of technologies used
- `order` - Display order
- `featured` - Boolean for featured projects
- `created_at`, `updated_at` - Timestamps

## Customization

### Add New Projects:
1. Add to database via admin panel or manually insert
2. Visit `/` to see new projects auto-display

### Modify Sample Data:
Edit `database/seeders/ProjectSeeder.php` with your projects before seeding

### Styling:
- Uses Tailwind CSS (via CDN)
- Update colors and spacing in view files

### Add Contact Form Handler:
In `portofolioController`, add:
```php
public function storeContact(Request $request) {
    // Handle contact form submission
}
```

## Features
✓ Responsive design (mobile, tablet, desktop)
✓ Featured projects highlight
✓ Technology tags
✓ Social sharing buttons
✓ Related projects sidebar
✓ Beautiful UI/UX with gradients and transitions

## Next Steps
1. Add your own projects to the database
2. Replace placeholder images
3. Update profile information in views
4. Implement contact form functionality
5. Add authentication if needed
6. Deploy to your hosting

