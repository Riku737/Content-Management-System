<?php

ob_start(); // Output buffering is turned on

session_start(); // Turn on sessions

// PHP CONSTANTS FOR PATHS

// Sets PRIVATE_PATH to the directory of the current file (private/)
define("PRIVATE_PATH", dirname(__FILE__));

// Sets PROJECT_PATH to the parent directory of PRIVATE_PATH (project root)
define("PROJECT_PATH", dirname(PRIVATE_PATH));

// Sets PUBLIC_PATH to the public folder inside the project
define("PUBLIC_PATH", PROJECT_PATH . '/public');

// Sets SHARED_PATH to the shared folder inside of private
define("SHARED_PATH", PRIVATE_PATH . '/shared');

// Find the position after '/public' in the current script's path
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;

// Get the URL path up to and including '/public'
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);

// Sets WWW_ROOT to URL path of the public directory (used for generating URLs)
define("WWW_ROOT", $doc_root);


// FUNCTION INCLUSION

// Runs functions.php only once no matter how many times it is called
require_once('functions.php');
require_once('database.php');
require_once('query_functions.php');
require_once('validation_functions.php');

$db = db_connect(); // Database connection key
$errors = [];

?>