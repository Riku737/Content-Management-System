<?php

    // Generates a full URL path for application
    // Takes a script path like '/staff/index.php' and ensures it starts with a '/' and then prepends the WWW_ROOT constant
    // Might return: /Content-Management-System/public/staff/index.php
    function url_for($script_path) {
        if($script_path[0] != '/') {
            $script_path = "/" . $script_path;
        }
        return WWW_ROOT . $script_path;
    }

    // SHORTCUT FUNCTIONS

    // Returns URL-encoded version of string (safe for use in URLS)
    // Example: "hello world" → "hello%20world"
    function u($string="") {
        return urlencode($string);
    }

    // Returns the raw URL-decoded version of the string
    // Example: "hello%20world" → "hello world"
    function raw_u($string="") {
        return rawurldecode($string);
    }

    // Returns HTML-escaped version of the string (prevents HTML injection/XSS)
    // Example: "<b>test</b>" → "&lt;b&gt;test&lt;/b&gt;"
    function h($string="") {
        return htmlspecialchars($string);
    }

    function error_404() {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        exit();
    }

    function error_500() {
        header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
        exit();
    }

    function redirect_to($location) {
        header(header: "Location: " . $location);
        exit;
    }
?>