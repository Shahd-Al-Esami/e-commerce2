**E-Commerce project**

# Overview
This is a comprehensive E-Commerce application that provides an admin dashboard for managing products, categories, customer orders, and users. The application allows admins to add, edit, and delete products and categories, manage customer orders, and display  sales .
Customers can view products by category, place orders, and manage their orders through the API.

# Features
- ui auth 
- auth sanctum
- php crud operation 
- soft delete & force delete & restore products
- pagination 
- middleware 
- Trait 
- seeder
# Admin Dashboard
- Product Management
Add new products with details (title, price, description, images, etc.)
Edit existing products
Force Delete products
Soft Delete products
Restore products
Show Deleted Products

- Category Management
Create and manage product categories
Edit and delete categories.

- Order Management
View all customers orders
Show order details (customer info, ordered products, status, etc.)
Delete orders

- Sales Reporting
Display  sales (orders with status: completed)

- User Management
- View all registered users
show the details of user
delete users

# Customers:
- Registeration 
- View all products with paginate
- Filter products by categories
-  View all categories
- Order Placement,
- edit order
- delete order
- pay order
- show order
- show his/her orders
- select paymentMethod.




# Requirements
- laravel 10
- xampp 
- postman


# Installation
Clone the repository by commend :git clone  https://github.com/Shahd-Al-Esami/e-commerce.git 
Xampp start  with appach and mysql
Create a database and ensure the connection is configured in the .env file.
run commends : composer install & npm install
run commends : php artisan serv & npm run dev & php artisan db:seed 
Use Postman to test the API endpoints and perform actions such as placing an order, etc.
 Import the collection named e-commerce-api into Postman.




# Api Endpoints:
- postman collection : e-commerce-api
- https://api.postman.com/collections/36486745-d9decce1-4de6-4a64-924b-8533362097e0?access_key=PMAT-01JB9J5D2BNJN1MHGWX14GYGKY
