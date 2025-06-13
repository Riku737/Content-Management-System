<?php 

    // Form processing page

    require_once('../../../private/initialize.php');

    // Verifies whether web request is get or post
    // Prevents accidental access to page through modifying URL
    // Redirects to former page
    if (is_post_request()) {

        // Handle form vales sent by new.php

        // Read values submitted to this page. 
        // Default to an empty string such that nothing is sent.

        $subject = [];
        $subject['menu_name'] = $_POST['menu_name'] ?? '';
        $subject['position'] = $_POST['position'] ?? '';
        $subject['visible'] = $_POST['visible'] ?? '';

        $result = insert_subject($subject);
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
       
    } else {
        redirect_to(url_for('/staff/subjects/new.php'));
    }

?>