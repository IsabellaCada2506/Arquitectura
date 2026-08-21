# Development of an Online Store Using Laravel

## Description

This project is a basic online store developed using Laravel. It was created as part of Tutorials Laravel 1, 2, and 3 at Universidad EAFIT.

The project demonstrates Laravel's MVC architecture, routing, controllers, Blade views, form validation, database migrations, Eloquent models, factories, seeders, relationships, session management, and advanced architectural patterns like Dependency Injection.

The project strictly follows the architectural guidelines established for the course (the "dictatorships"), keeping responsibilities completely separated between controllers, models, form requests, and views, ensuring clean, scalable, and typed code.

## Features

* **Pages:** Home, About, and Contact pages.
* **Products:** Product listing and product detail pages, along with a product creation form.
* **Shopping Cart (Session):** Users can add products to a cart. The cart stores product IDs in the session and retrieves real-time data from the database using Eloquent.
* **Image Uploads & Dependency Injection:** Includes a module to upload images to the local storage. This feature was built twice to demonstrate the differences in architecture:
  * **With DI:** Uses an `ImageStorage` interface and a Service Provider to inject the dependency dynamically.
  * **Without DI:** Uses direct class instantiation for comparison purposes.
* **Database Integration:** Product and Comment data stored in MySQL using Eloquent and database migrations.
* **Validation:** Robust validation using dedicated Form Requests (`ProductRequest` and `ImageRequest`).
* **Models & Relationships:** Implementation of `Product` and `Comment` models with a One-to-Many relationship, utilizing Eager Loading to avoid N+1 query problems.
* **Testing Data:** Setup of Factories and database seeders to populate tables.
* **UI/UX:** Redirection when a product does not exist, conditional product display using Blade, reusable Blade layouts, and Bootstrap styling.
* **Code Quality:** Consistent PHP formatting maintained via Laravel Pint. Strict typing and data encapsulation (Getters/Setters) applied across all models and controllers.

## Technologies

* PHP 8.3+
* Laravel 11+
* Blade Templating Engine
* Bootstrap 5
* MySQL & phpMyAdmin (MAMP)
* Composer
* Laravel Pint

## Project Structure

```text
laravelcourse/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── CartController.php
│   │   │   ├── Controller.php
│   │   │   ├── HomeController.php
│   │   │   ├── ImageController.php
│   │   │   ├── ImageNotDIController.php
│   │   │   └── ProductController.php
│   │   └── Requests/
│   │       ├── ImageRequest.php
│   │       └── ProductRequest.php
│   ├── Interfaces/
│   │   └── ImageStorage.php
│   ├── Models/
│   │   ├── Comment.php
│   │   ├── Product.php
│   │   └── User.php
│   ├── Providers/
│   │   ├── AppServiceProvider.php
│   │   └── ImageServiceProvider.php
│   └── Utils/
│       └── ImageLocalStorage.php
│
├── database/
│   ├── factories/
│   │   ├── ProductFactory.php
│   │   └── UserFactory.php
│   ├── migrations/
│   │   ├── create_products_table.php
│   │   └── create_comments_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
│
├── resources/
│   └── views/
│       ├── cart/
│       ├── home/
│       ├── image/
│       ├── imagenotdi/
│       ├── layouts/
│       │   └── app.blade.php
│       └── product/
│
├── routes/
│   └── web.php
│
├── public/
├── storage/
├── bootstrap/
│   └── providers.php
├── composer.json
├── package.json
└── README.md
```

## Application Flow

The application follows the standard Laravel MVC structure, augmented with advanced patterns like Form Requests and Service Providers:

**Example: Viewing a specific product (Eager Loading)**

```text
/products/1
    ↓
ProductController@show
    ↓
Product::with('comments')->findOrFail($id)
    ↓
product/show.blade.php
```

**Example: Uploading an image (Dependency Injection)**

```text
/image/save
    ↓
ImageRequest (Validates file)
    ↓
ImageController@save
    ↓
ImageServiceProvider (Resolves Interface to Utility)
    ↓
ImageLocalStorage (Saves file to disk)
    ↓
Redirect Back
```

## Validation

Validation is handled exclusively through dedicated Request classes to keep controllers clean:

* **ProductRequest:** Ensures products have valid names and prices (`price gt:0`).
* **ImageRequest:** Ensures files uploaded are strictly images.

## Installation

### Requirements

* PHP 8.3+
* Composer
* Laravel
* MySQL
* Node.js and npm
* phpMyAdmin (MAMP)

### Setup Instructions

1. Install dependencies:

   ```bash
   composer install
   npm install
   ```

2. Create the environment file:

   ```bash
   cp .env.example .env
   ```

3. Generate the application key:

   ```bash
   php artisan key:generate
   ```

4. Configure the MySQL database in `.env`:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=8889
   DB_DATABASE=laravelcourse
   DB_USERNAME=root
   DB_PASSWORD=root
   ```

5. Run migrations and seed the database:

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. Create the symbolic link for image storage:

   ```bash
   php artisan storage:link
   ```

7. Format the code with Pint (optional but recommended):

   ```bash
   ./vendor/bin/pint
   ```

8. Start the local development server:

   ```bash
   php artisan serve
   ```

The application will now be available at: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Author

Isabella Cadavid Posada

Universidad EAFIT

Laravel Tutorials

## Professor

Daniel Correa Botero