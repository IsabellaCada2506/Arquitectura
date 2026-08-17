# Development of an Online Store Using Laravel

## Description

This project is a basic online store developed using Laravel. It was created as part of Tutorials Laravel 1 and 2 at Universidad EAFIT.

The project demonstrates Laravel's MVC architecture, routes, controllers, Blade views, form validation, database migrations, Eloquent models, factories, seeders, and relationships.

The project also follows the architectural guidelines established for the course, keeping responsibilities separated between controllers, models, data classes, form requests, and views.

## Features

* **Pages:** Home, About, and Contact pages.
* **Products:** Product listing and product detail pages, along with a product creation form.
* **Database Integration:** Product data stored in MySQL using Eloquent and database migrations.
* **Validation:** Robust product validation using `ProductRequest`.
* **Models & Relationships:** Implementation of `Product` and `Comment` models with a One-to-Many relationship (Three comments associated with product ID `1`).
* **Testing Data:** Setup of Factories and database seeders to populate tables.
* **UI/UX:** Redirection when a product does not exist, conditional product display using Blade, reusable Blade layouts, and Bootstrap styling.
* **Code Quality:** Consistent PHP formatting maintained via Laravel Pint.

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
│   ├── Data/
│   │   └── ProductData.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php
│   │   │   ├── HomeController.php
│   │   │   ├── ContactController.php
│   │   │   └── ProductController.php
│   │   └── Requests/
│   │       └── ProductRequest.php
│   └── Models/
│       ├── User.php
│       ├── Product.php
│       └── Comment.php
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
│       ├── layouts/
│       │   └── app.blade.php
│       ├── home/
│       └── product/
│
├── routes/
│   └── web.php
│
├── public/
├── storage/
├── composer.json
├── package.json
└── README.md

```

## Application Flow

The application follows the standard Laravel MVC structure:

```text
User 
  ↓ 
Route 
  ↓ 
Controller 
  ↓ 
Model / Data / Form Request 
  ↓ 
View 
  ↓ 
Browser

```

**Example: Listing all products**

```text
/products
    ↓
ProductController@index
    ↓
Product::all()
    ↓
product/index.blade.php

```

**Example: Viewing a specific product**

```text
/products/1
    ↓
ProductController@show
    ↓
Product::findOrFail($id)
    ↓
product/show.blade.php

```

## Database

The application uses MySQL with the database named `laravelcourse`. The main tables are:

* `users`
* `products`
* `comments`

Products are managed through the `Product` Eloquent model:

```php
Product::all();
Product::findOrFail($id);
Product::create($request->only(["name", "price"]));

```

Comments are associated with products through the `product_id` foreign key, allowing a single product to have multiple comments.

## Validation

Product validation is handled through the dedicated `ProductRequest` class to keep validation logic separated from the controller. For example, the price must be strictly greater than zero:

```text
price → required|gt:0

```

## Factories and Seeders

The project uses Laravel factories and seeders to generate test data quickly. The database can be populated by running:

```bash
php artisan db:seed

```

Product data is generated using `ProductFactory`, while users are generated using Laravel's default `UserFactory`.


## Installation

### Requirements

* PHP 8.3+
* Composer
* Laravel
* MySQL
* Node.js and npm
* phpMyAdmin (MAMP)

### Setup Instructions

1. **Install dependencies:**
```bash
composer install
npm install

```


2. **Create the environment file:**
```bash
cp .env.example .env

```


3. **Generate the application key:**
```bash
php artisan key:generate

```


4. **Configure the MySQL database in `.env`:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=laravelcourse
DB_USERNAME=root
DB_PASSWORD=root

```


5. **Run migrations and seed the database:**
```bash
php artisan migrate
php artisan db:seed

```


6. **Start the local development server:**
```bash
php artisan serve

```



The application will now be available at: `[http://127.0.0.1:8000](http://127.0.0.1:8000)`

---

## Author

**Isabella Cadavid Posada**

Universidad EAFIT

Laravel Tutorials

## Professor

**Daniel Correa Botero**
