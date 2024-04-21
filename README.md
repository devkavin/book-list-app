<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel Book List App

This project is a CRUD application built with Laravel to manage a list of books, including categories, stock updates on issuance/return, form validation, and routing.

## Features

-   **CRUD Operations for Books**: Create, read, update, and delete books.
-   **Book Categories**: Manage book categories with filtering capabilities.
-   **Stock Management**: Automatic updates on book issuance and return.
-   **Form Validation**: Ensures required fields and valid data for price and stock.
-   **Laravel Ecosystem**: Utilizes Laravel's routing, ORM (Eloquent), and Blade templating.

[Back to Top](#laravel-book-list-app)

## Requirements

-   PHP >= 8.0
-   Composer

[Back to Top](#laravel-book-list-app)

## Installation

1. Clone the repository: (`git clone https://github.com/devkavin/book-list-app.git`)
2. Install dependencies: (`composer install`)
3. Generate an application key: (`php artisan key:generate`)
4. Configure database credentials in `.env` file.
5. Migrate & seed database tables: (`php artisan migrate --seed`)

[Back to Top](#laravel-book-list-app)

## Run Locally

-   Start the development server: (`php artisan serve`)
-   Access the application in your browser: (`http://localhost:8000`) (or your configured port)

[Back to Top](#laravel-book-list-app)

## Functionality Breakdown

### Part 01:

-   **Database Tables**: books, book_categories with defined columns and foreign key - relationship.
-   **Homepage**: Displays a list of all books with details (title, author, price, stock, - category) with optional category filtering.
-   **Create Book Form**: Allows adding new books with title, author, price, stock, and - category selection.
-   **Edit Book**: Enables modifying book details, including stock.
-   **Delete Book**: Removes books from the system.

### Part 02:

-   **User Management**: A table for users has been implemented with appropriate fields (ID, name, email, etc.) and authentication mechanisms.
-   **Borrowing/Returning Books**: A mapping table has been created to track borrowals/returns with user association.
-   **Stock Updates**: Stock is now reduced on issuance and increased on return. Out-of-stock scenarios are handled gracefully.
-   **Form Validation**: Required fields (title, author) and valid numbers (price, stock) are enforced.
-   **Laravel Features**: Routing, Eloquent, and Blade templating have been utilized for efficient development.

### Further Considerations:

-   **Error Handling**: Robust error handling has been implemented to provide clear messages to users.
-   **Authentication/Authorization**: User authentication and authorization have been implemented to restrict access to specific functionalities.

[Back to Top](#laravel-book-list-app)

## Screenshots

All screenshots are available in the `screenshots` folder.

### Book List Page

![App Screenshot](https://github.com/devkavin/book-list-app/blob/main/screenshots/books-page.png)

### Borrowed Books Page

![App Screenshot](https://github.com/devkavin/book-list-app/blob/main/screenshots/borrowd-books.png)

### Book Category Page

![App Screenshot](https://github.com/devkavin/book-list-app/blob/main/screenshots/book-category.png)

### All Users Admin Page

![App Screenshot](https://github.com/devkavin/book-list-app/blob/main/screenshots/all-users-admin-page.png)

### Add New Book Page

![App Screenshot](https://github.com/devkavin/book-list-app/blob/main/screenshots/add-book-page.png)

### Edit Book Page

![App Screenshot](https://github.com/devkavin/book-list-app/blob/main/screenshots/book-edit-page.png)

[Back to Top](#laravel-book-list-app)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

[Back to Top](#laravel-book-list-app)
