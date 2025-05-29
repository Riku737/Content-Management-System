<?php

    // Library of functions

    // PHP CONSTANTS

    // Sets PRIVATE_PATH to the directory of the current file
    define("PRIVATE_PATH", dirname(__FILE__));
    
    // Sets PROJECT_PATH to the parent directory of PRIVATE_PATH
    define("PROJECT_PATH", dirname(PRIVATE_PATH));

    // Sets PUBLIC_PATH to the public folder inside the project
    define("PUBLIC_PATH", PROJECT_PATH . '/public');

    // Sets SHARED_PATH to the shared folder inside of prvate
    define("SHARED_PATH", PRIVATE_PATH . '/shared');

    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    
    // Sets WWW_ROOT to URL path of the public directory
    define("WWW_ROOT", $doc_root);

    // Runs functions.php only once no matter how many times it is called
    require_once('functions.php');

?>