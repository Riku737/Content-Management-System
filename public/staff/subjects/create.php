<?php 

require_once('../../../private/initialize.php');

// Verifies whether web request is get or post
// Prevents accidental access to page through modifying URL
// Redirects to former page
if (is_post_request()) {

    // Handle form vales sent by new.php

    // Read values submitted to this page. 
    // Default to an empty string such that nothing is sent.

    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    // Read the values back and echo
    echo "Form parameters<br/>";
    echo "Menu name: " . $menu_name . "<br/>";
    echo "Position: " . $position . "<br/>";
    echo "Visible: " . $visible . "<br/>";

} else {
    redirect_to(url_for('/staff/subjects/new.php'));
}
?>