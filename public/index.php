<?php require_once('../private/initialize.php'); ?>

<?php
if (isset($_GET['id'])) {
    $page_id = $_GET['id'];
    $page = find_page_by_id($page_id);
    if(!$page) {
        redirect_to(url_for('/index.php'));
    } else {
        // Nothing selected; show home page
    }
}
?>

<?php $page_title = 'Home'; ?>

<?php include(SHARED_PATH . '/public_navigation.php'); ?>

<div class="section_content">

    <?php
    if (isset($page)) {
        // Show the page from database
        // TODO add html escaping back in
        echo $page['content'];
    } else {
        include(SHARED_PATH . '/static_homepage.php');
    }
    ?>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>