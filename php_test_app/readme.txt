To run this application you need installed
    php7
    apache with enabled rewrite
    composer
    pdo_mysql
    mysql

The application uses Doctrine, Twig, fast-route which are installed by composer.

Create database. The database configuration is contained in bootstrap.php.

Copy files php_test_app in /var/www/html

In the root directory run
    composer install
    composer dump-autoload -o

    phptest-php-apache vendor/bin/doctrine orm:schema-tool:create

In browser run localhost/index.php.
