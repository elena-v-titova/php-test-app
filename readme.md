# Setup with Docker

To run the application **php_test_app** using docker you need installed *docker*
and *docker-compose*.

1. Start containers

		docker-compose up -d

2. Install dependent packages via composer and update the autoloader

    	docker exec phptest-php-apache composer install
    	docker exec phptest-php-apache composer dump-autoload -o

3. In browser run [localhost:8000](http://localhost:8000).

# Setup without Docker

To run this application you need installed

    - php7
    - apache with enabled rewrite
    - composer
    - pdo_mysql
    - mysql

The application uses *Doctrine*, *Twig*, *fast-route* which are installed by composer.

1. Create database. The database configuration is contained in bootstrap.php.

2. Copy files *php_test_app/* in */var/www/html*

3. In the root directory run

    	composer install
    	composer dump-autoload -o

    	phptest-php-apache vendor/bin/doctrine orm:schema-tool:create

4. In browser run [localhost](http://localhost/index.php).

