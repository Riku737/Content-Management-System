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

    /**
     * Summary of error_500
     * @return never does not return anything
     */
    function error_500() {
        header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
        exit();
    }

    /**
     * Summary of redirect_to
     * @param mixed $location pathway location
     * @return never does not return anything
     */
    function redirect_to($location) {
        header(header: "Location: " . $location);
        exit;
    }

    /**
     * Whether it is a post request
     * @return bool
     */
    function is_post_request() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    /**
     * Whether it is a get request
     * @return bool
     */
    function is_get_request() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    // Welcome prompt on staff home 
    function display_greeting() {
        date_default_timezone_set("America/New_York");
        $time = date("H");
        if ($time < 12) {
            echo "Good Morning";
        } else if ($time < 17) {
            echo "Good Afternoon";
        } else if ($time < 24) {
            echo "Good Evening";
        }
    }

    function display_errors($errors=array()) {
        $output = '';
        if(!empty($errors)) {
            $output .= "<div class=\"errors\">";
            $output .= "<b>Please fix the following errors:</b>";
            foreach($errors as $error) {
                $output .= "<p>" . h($error) . "</p>";
            }
            $output .= "</div>";
        }
        return $output;
    }

    function input_errors($errors=array()) {
        $output = '';
        if(!empty($errors)) {
            $output = "input_short_form_error"; 
        }
        return $output;
    }

    function display_sitemap() {

        

    }

?>