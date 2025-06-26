<?php

/**
 * // Actions necessary to login
 * @param mixed $admin
 * @return bool
 */
function log_in_admin($admin) {
    session_regenerate_id(); // Regenerating ID protects admin from "session fixation"
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $admin['username'];
    $_SESSION['first_name'] = $admin['first_name'];
    $_SESSION['last_name'] = $admin['last_name'];
    return true;
}

/**
 * Performs all actions to log out admin
 * Alternative: $_SESSION['username'] = NULL;
 * Unsets current session username value
 * @return bool
 */
function log_out_admin() {
    unset($_SESSION['admin_id']); // Most important to unset
    unset($_SESSION['last_login']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    // session_destroy(); // Optional: destroys the whole session
    return true;
}

/**
 * Contains all logic for determining if a request should be considered "logged in" request or not.
 * It is te core of require_login) but it can aslo be called on its own in certain contexts (e.g. display one linke
 * if an admin is logged in and display another link if they are not)
 * @return bool
 */
function is_logged_in() {
    // Having an admin_id in the session serves two fold:
    // - Its presence indicates the admin is logged in.
    // - Its value tells which admin for looking up their record.
    return isset($_SESSION['admin_id']);
}

/**
 * Call at the top of any page which needs to require a valid
 * login before granting access to the page
 * @return void
 */
function require_login() {
    if(!is_logged_in()) {
        redirect_to(url_for('/staff/login.php'));
    } else {
        // Do nothing, let the rest of the page proceed
    }
}

?>