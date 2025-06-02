# Content-Management-System

## Setup Instructions

1. **Clone the repository**
   ```sh
   git clone https://github.com/your-username/Content-Management-System.git
   ```

2. **Move the project to your web server directory**
   - For XAMPP, move the folder to `C:\xampp\htdocs\`.

3. **Start Apache and MySQL**
   - Open XAMPP Control Panel and start both Apache and MySQL.

4. **Create the database**
   - Open phpMyAdmin at [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
   - Create a new database (e.g., `cms`).
   - Import the provided SQL file if available.

5. **Configure database connection**
   - Edit the database configuration file (usually in `private/db_credentials.php` or similar).
   - Set your database name, username, and password.

6. **Access the application**
   - Go to [http://localhost/Content-Management-System/public/](http://localhost/Content-Management-System/public/) in your browser.

7. **(Optional) Update environment variables or configuration as needed**

---

**Requirements:**
- PHP 7.x or higher
- MySQL
- XAMPP or similar local server environment