# Content Management System

A simple content management system (CMS) built with **PHP**, **MySQL**, **HTML**, and **CSS**.

## Features

- User authentication and session management
- Admin dashboard for managing content
- CRUD (Create, Read, Update, Delete) operations for subjects and pages
- Dynamic navigation menus based on database content
- Flash messaging for user feedback (success/error notifications)
- Form validation and error handling
- Responsive design with custom CSS
- Language preference selection with cookies
- Database-driven content using MySQL
- Secure database queries with input escaping
- Organized code structure with reusable PHP functions

## Setup Instructions

1. **Clone the repository**
   ```sh
   git clone https://github.com/your-username/Content-Management-System.git
   ```

2. **Move the project to your web server directory**
   - For XAMPP, move the folder to `C:\xampp\htdocs\`.

3. **Start Apache and MySQL**
   - Open the XAMPP Control Panel and start both **Apache** and **MySQL** modules.

4. **Create and Import the Database**
   - Open phpMyAdmin at [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
   - Create a new database (e.g., `cms`).
   - Import the provided example SQL file from the repository to set up tables and sample data.

5. **Configure Database Credentials**
   - Edit the database configuration file (in `private/db_credentials.php`).
   - Set your database name, username, and password:
     ```php
     define("DB_SERVER", "");
     define("DB_USER", "");
     define("DB_PASS", "");
     define("DB_NAME", "");
     ```

6. **Access the Application**
   - Go to [http://localhost/Content-Management-System/public/](http://localhost/Content-Management-System/public/) in your browser.

7. **(Optional) Update environment variables or configuration as needed**

## Requirements

- PHP 7.x or higher
- MySQL (included with XAMPP)
- XAMPP or similar local server environment
- Web browser

## Notes

- This project is designed for use with XAMPP. It may work with other local server environments, but configuration steps (such as file locations and database setup) may differ.
- All project files **must** be inside the `htdocs` folder for XAMPP to serve them.
- Make sure Apache and MySQL are running in XAMPP before accessing the site.
- You can manage your database using phpMyAdmin, which comes with XAMPP.

## Technologies Used

- **PHP** — Server-side scripting
- **MySQL** — Database
- **HTML/CSS** — Front-end structure and styling
- **JavaScript** — Front-end interactivity
