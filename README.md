# Blog Application

A simple blog application built using **HTML**, **CSS**, **Bootstrap**, **PHP**, and **MySQL**. This application allows users to create, read, update, and delete (CRUD) blog posts. The application also includes user authentication (login and sign-up modules) and a responsive design with Bootstrap.

---

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Getting Started](#getting-started)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Usage](#usage)
- [Folder Structure](#folder-structure)
- [Contributing](#contributing)
- [License](#license)

---

## Features

- User Authentication (Login & Sign Up)
- Create, Read, Update, Delete (CRUD) blog posts
- Responsive design using Bootstrap
- Navigation bar with links to Home, About Us, Contact, Login, and Sign Up
- Simple and clean UI to manage blog content

---

## Technologies Used

**Frontend**: 
- HTML
- CSS
- Bootstrap 4.5

**Backend**: 
- PHP
- MySQL

**Database**: 
- MySQL Database

**Tools**: 
- XAMPP (or any LAMP/WAMP stack)
- phpMyAdmin for database management

---

## Getting Started

To get started with this project, follow the instructions below:

### Prerequisites

Make sure you have the following installed on your local development environment:

- PHP (v7.0 or higher)
- MySQL (v5.7 or higher)
- Apache server (use XAMPP, WAMP, or LAMP)
- Git (for cloning the repository)

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/blog_app.git
   cd blog_app$servername = "localhost";
Start your local web server (XAMPP/WAMP/LAMP) and ensure Apache and MySQL are running.

Move the project folder to your web server's root directory:

For XAMPP: Move to C:/xampp/htdocs/
For WAMP: Move to C:/wamp/www/
Configure the database connection by editing the php/dbconfig.php file:

php
Copy code
$servername = "localhost";
$username = "root"; // Default for XAMPP/WAMP is 'root'
$password = "";     // Leave empty for XAMPP/WAMP default
$dbname = "blog_app";

### Database Setup
Open phpMyAdmin (usually accessible at http://localhost/phpmyadmin).

## Create a new database:
- sql
CREATE DATABASE blog_app;
### Import the provided SQL file (blog_app.sql) located in the project folder:
- In phpMyAdmin, select your database (blog_app).
- Go to the Import tab and upload the blog_app.sql file.
- Ensure that the table posts and users are successfully created.
- Database Tables:
- posts: stores blog post data (title, content, image URL, etc.).
- users: stores user login data (username, email, password).

## Contact
- If you have any questions or need further assistance, feel free to reach out via email at: [rohit302108@gmail.com].

### Uploading to GitHub:
1. Ensure the file is named `README.md`.
2. When you push your changes to GitHub, the `README.md` should automatically be rendered in the correct format.
3. Check if the file is displayed properly by going to your repository's main page.

By using correct Markdown formatting as shown in the example above, your README file will re
