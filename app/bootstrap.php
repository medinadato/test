<?php

ini_set('display_errors', 1);

// autoloader
$loader = require __DIR__ . '/vendor/autoload.php';
$loader->add('Demo', __DIR__ . '/lib');

// Define path to application directory
defined('APPLICATION_PATH') || define('APPLICATION_PATH', __DIR__);