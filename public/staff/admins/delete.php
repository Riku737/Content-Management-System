<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/admins/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
    $result = delete_admin($id);
    $_SESSION['message'] = 'Admin deleted.';
    redirect_to(url_for('/staff/admins/index.php'));
} else {
    $admin = find_admin_by_id($id);
}

$page_title = 'Delete Admin';
include(SHARED_PATH . '/staff_navigation.php');

?>

<div class="section_form" id="content">

    <div class="bread_crumb">
        <a href="<?php echo url_for(script_path: '/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for(script_path: '/staff/admins/index.php')?>">Admins</a>
        <p>/</p>
        <p><?php echo h($admin['username'])?></p>
    </div>

    <div class="section_content delete">
        <h1>Delete Admin</h1>
        <p>Are you sure you want to delete <a href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($admin['id'])));?>"><?php echo h($admin['username']); ?></a>?</p>

        <div class="section_button">
            <form action="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin['id']))); ?>" method="post">
                <input class="button_secondary" type="submit" name="commit" value="Delete page" />
            </form>
            <a href="<?php echo url_for('/staff/admins/index.php');?>" class="button_primary">Cancel</a>
        </div>
        
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
