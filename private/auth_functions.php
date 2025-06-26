<?php

// Actions necessary to lgin
function log_in_admin($admin) {
    session_regenerate_id(); // Regenerating ID protects admin from "session fixation"
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $admin['username'];
    $_SESSION['first_name'] = $admin['first_name'];
    $_SESSION['last_name'] = $admin['last_name'];
    return true;
}

?>