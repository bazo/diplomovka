<?php
error_reporting(E_ALL);
// absolute filesystem path to the web root
define('WWW_DIR', dirname(__FILE__));
// absolute filesystem path to the application root
define('DATA_DIR', dirname(__FILE__).'/..');
define('APP_DIR', DATA_DIR.'/app');

// absolute filesystem path to the libraries
define('LIBS_DIR', DATA_DIR . '/libs');
// load bootstrap file
require_once APP_DIR . '/bootstrap.php';
