<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];
$page = find_page_by_id($id);

if(is_post_request()) {
    $result = delete_page($id);
    $_SESSION['message'] = $page['menu_name'] . ' page was deleted successfully.';
    redirect_to(url_for('/staff/subjects/show.php?id=' . h(u($page['subject_id']))));
} 

$subject = find_subject_by_id($page['subject_id']);

$page_title = 'Delete Page';
include(SHARED_PATH . '/staff_navigation.php');

?>

<div class="section_form" id="content">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/subjects/index.php')?>">Subjects</a>
        <p>/</p>
        <a href="<?php echo url_for(script_path: '/staff/subjects/show.php?id=' . h(u($id)))?>"><?php echo h($subject['menu_name']);?></a>
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
            <a href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($page['subject_id'])));?>" class="button_primary">Back to subject</a>
        </div>
        
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
