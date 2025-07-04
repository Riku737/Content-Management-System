<?php require_once('../private/initialize.php'); ?>

<?php

$preview = false;
if(isset($_GET['preview'])) {
    // Previewing require admin to be logged in
    $preview = $_GET['preview'] == 'true' && is_logged_in() ? true : false;
}

$visible = !$preview;

if (isset($_GET['id'])) {
    $page_id = $_GET['id'];
    $page = find_page_by_id($page_id, ['visible' => $visible]);
    if(!$page) {
        redirect_to(url_for('/index.php'));
    }
    
    $subject_id = $page['subject_id'];
    $subject = find_subject_by_id($subject_id);
    if(!$subject) {
        redirect_to(url_for('/index.php'));
    }
}
?>

<?php $page_title = 'Home'; ?>

<?php 
    include(SHARED_PATH . '/public_navigation.php'); 
?>

<div class="section_content">

    <?php
    if (isset($page)) {
        // Show the page from database
        // Safe html escaping methods
        // * Convert symbolic language into html elements (custom syntax like Markdown or HTML Purifier)
        // * Whitelist elements to exclusively permit specific html tags (filiters out bad tags)
        $allowed_tags = '<div><img><h1><h2><p><br><strong><em><ul><li><a>';
        echo strip_tags($page['content'], $allowed_tags);
    } else {
        include(SHARED_PATH . '/static_homepage.php');
    }
    ?>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>