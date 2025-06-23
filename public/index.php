<?php require_once('../private/initialize.php'); ?>

<?php
if(isset($_GET['preview']) && $_GET['preview'] == 'true') {
    $preview = true;
} else {
    $preview = false;
}

$visible = !$preview;

if (isset($_GET['id'])) {
    $page_id = $_GET['id'];
    $page = find_page_by_id($page_id, ['visible' => $visible]);
    if(!$page) {
        redirect_to(url_for('/index.php'));
    } else {
        // Nothing selected; show home page
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
        // TODO add html escaping back in
        // Safe alternatives
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