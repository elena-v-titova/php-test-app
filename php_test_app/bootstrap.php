<?php

/*
    This file contains the database configuration and initializates
    Doctrine Entity Manager and Twig for templates.
*/

require_once "vendor/autoload.php";

// use Doctrine
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [__DIR__."/app"];
$isDevMode = false;

// the connection configuration
$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => 'test',
    'password' => 'test',
    'dbname'   => 'testdb',
    'host'     => 'db',
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

// use Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templates');
$twig = new \Twig\Environment($loader);

