# JobFinder

JobFinder is a web application designed to help users find and apply for jobs, also for companies to post job offers. This project is built with HTML, CSS, Bootstrap, JavaScript, and PHP, and uses a MySQL database to store job and company information.

## Features

- Browse jobs and companies
- Search for jobs
- View job details
- Apply for jobs
- Post job offers
- Create profiles for companies

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- [XAMPP](https://www.apachefriends.org/index.html) (includes Apache, MySQL, PHP)

## Installation

### Step 1: Clone the Repository

Clone this repository to your local machine using the following command:

```bash
git clone https://github.com/your-username/JobFinder.git
```

### Step 2: Set Up XAMPP

#### For Windows Users
1. Open XAMPP Control Panel and start the Apache and MySQL modules.
2. Copy the cloned repository to the `htdocs` directory, typically located at `C:\xampp\htdocs\`
```bash
cp -r /path/to/JobFinder C:/xampp/htdocs/jobfinder
```

#### For Linux Users
1. Open a terminal and start the XAMPP services.
```bash
sudo /opt/lampp/lampp start
```

2. Copy the cloned repository to the `htdocs` directory, typically located at `/opt/lampp/htdocs/`
```bash
sudo cp -r /path/to/JobFinder /opt/lampp/htdocs/jobfinder
```

### Step 3 : Import Database for testing
1. Open *phpMyAdmin* by navigating to `http://localhost/phpmyadmin` in your web browser.
2. Create a new database named `jobfinder`.
3. Import the SQL file located in the project directory (e.g., `jobfinder.sql`) into the `jobfinder` database.

### Step 4 : Configure the Database Connection (Optional)
1. Open the dbConnect.php file located in the includes directory.
2. Update the database connection parameters to match your setup:

```php
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "jobfinder";
```

### Usage
Access the application by navigating to `http://localhost/jobfinder`.

All your contributions are welcome! Please fork the repo and create a pull request.

