To run the application 'php_test_app' using docker you need installed docker
and docker-compose.

Run
    docker-compose up -d
    docker exec phptest-php-apache vendor/bin/doctrine orm:schema-tool:create

In browser run localhost:8000

To run the application 'php_test_app' without docker read php_test_app/readme.txt
