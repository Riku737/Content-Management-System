<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
    $result = delete_page($id);
    $_SESSION['message'] = 'The page was deleted successfully.';
    redirect_to(url_for('/staff/pages/index.php'));
} else {
    $page = find_page_by_id($id);
}

$page_title = 'Delete Page';
include(SHARED_PATH . '/staff_navigation.php');

?>

<div class="section_form" id="content">

    <div class="bread_crumb">
        <a href="<?php echo url_for(script_path: '/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for(script_path: '/staff/pages/index.php')?>">Pages</a>
        <p>/</p>
        <p><?php echo h($page['menu_name'])?></p>
    </div>

    <div class="section_content delete">
        <h1>Delete Page</h1>
        <p>Are you sure you want to delete <a href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id'])));?>"><?php echo h($page['menu_name']); ?></a>?</p>

        <div class="section_button">
            <form action="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))); ?>" method="post">
                <input class="button_secondary" type="submit" name="commit" value="Delete page" />
            </form>
            <a href="<?php echo url_for('/staff/pages/index.php');?>" class="button_primary">Cancel</a>
        </div>
        
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
