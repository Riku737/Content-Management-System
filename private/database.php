<?php

    require_once('db_credentials.php');

    // Connect to database using database credentials
    function db_connect() {
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        confirm_db_connect();
        return $connection;
    }

    // Disconnect from database
    function db_disconnect($connection) {
        if (isset($connection)) {
            mysqli_close($connection);
        }
    }

    // Validation of database connection
    function confirm_db_connect() {
        if (mysqli_connect_errno()) {
            $msg = "Database connection failed: ";
            $msg .= mysqli_connect_error();
            $msg .= " (" . mysqli_connect_errno() . ")";
            exit($msg);
        }
    }

    // Error checking
    function confirm_result_set($result_set) {
        if (!$result_set) {
            exit("Database query failed");
        }
    }

    // Alternative: addslashes($string) for php
    function db_escape($connection, $string) {
        return mysqli_real_escape_string($connection, $string);
    }
?>