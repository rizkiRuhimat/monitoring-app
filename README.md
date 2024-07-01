1. Clone the Repository
Navigate to your desired directory:
cd /var/www/

Clone the repository:
git clone https://github.com/rizkiRuhimat/monitoring-app.gitwith the actual URL of your GitHub repository.

2. Configure the Project
Navigate to the project directory:

cd monitoring-app
Set up your environment configuration:
this app uses an .env file to manage environment-specific configurations. You can create or update this file as needed.

3. Set Up Database Configuration
If your project requires a database, you will need to set up the database configuration.

Open the application/config/database.php file:
nano application/config/database.php
Update the database settings to match your database credentials:

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
Ensure Composer is installed on your system. You can check this by running:
composer --version

Install the dependencies:
composer install

5. Set Permissions (if necessary)

chmod -R 775 /path/to/your/monitoring-app/writable
chown -R www-data:www-data /path/to/your/monitoring-app/writable

6. Run the Application
php -S localhost:8000 -t public

Full Example Workflow
cd /var/www
git clone https://github.com/rizkiRuhimat/monitoring-app.git
cd /var/www/monitoring-app
nano application/config/database.php  # Update database configuration
composer install  # Install dependencies
chmod -R 775 writable
chown -R www-data:www-data writable
php -S localhost:8000 -t public  # Run the application locally
