To install CodeIgniter from your own GitHub repository, you'll need to clone your repository to your local development environment or server. Here are the steps:

1. Clone the Repository
First, you'll need to clone your CodeIgniter repository from GitHub to your local machine or server.

Navigate to your desired directory:

cd /var/www/
Clone the repository:

git clone https://github.com/rizkiRuhimat/monitoring-app.git
Replace https://github.com/your-username/your-codeigniter-repo.git with the actual URL of your GitHub repository.

2. Configure the Project
After cloning the repository, you may need to configure the CodeIgniter project to suit your environment.

Navigate to the project directory:

cd your-codeigniter-repo
Set up your environment configuration:
CodeIgniter uses an .env file to manage environment-specific configurations. You can create or update this file as needed.

3. Set Up Database Configuration
If your project requires a database, you will need to set up the database configuration.

Open the application/config/database.php file:

nano application/config/database.php
Update the database settings to match your database credentials:

php
Copy code
$db['default'] = array(
    'dsn'    => '',
    'hostname' => 'localhost',
    'username' => 'your-db-username',
    'password' => 'your-db-password',
    'database' => 'your-db-name',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
4. Install Dependencies
If your CodeIgniter project has any dependencies managed by Composer, you need to install them.

Ensure Composer is installed on your system. You can check this by running:
composer --version

Install the dependencies:
composer install

5. Set Permissions (if necessary)
Ensure the necessary directories have the correct permissions. For example, the writable directory may need to be writable by the web server:

chmod -R 775 /path/to/your/codeigniter-repo/writable
chown -R www-data:www-data /path/to/your/codeigniter-repo/writable

6. Run the Application
Finally, you can run your CodeIgniter application. If you are using a local development server, you can use the built-in PHP server:
php -S localhost:8000 -t public
If you are deploying on a web server, make sure your web server is configured to serve the CodeIgniter application.

Full Example Workflow
cd /var/www
git clone https://github.com/rizkiRuhimat/monitoring-app.git
cd your-codeigniter-repo
nano application/config/database.php  # Update database configuration
composer install  # Install dependencies
chmod -R 775 writable
chown -R www-data:www-data writable
php -S localhost:8000 -t public  # Run the application locally
By following these steps, you should be able to install and run CodeIgniter from your own GitHub repository. If you have any questions or encounter any issues, feel free to ask!
