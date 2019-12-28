<?php

/*
    This file is needed for a command-line interface of Doctrine.
    More details are in the Doctrine documentation.
 */

require_once "bootstrap.php";

use Doctrine\ORM\Tools\Console\ConsoleRunner;

return ConsoleRunner::createHelperSet($entityManager);

