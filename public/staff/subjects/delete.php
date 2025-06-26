<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/subjects/index.php'));
}
$id = $_GET['id'];

$subject = find_subject_by_id($id);

if(is_post_request()) {
    $result = delete_subject($id);
    $result = delete_subject_pages($id);
    $_SESSION['message'] = 'The subject was deleted successfully.';
    redirect_to(url_for('/staff/subjects/index.php'));
} else {
    $subject = find_subject_by_id($id);
}
?>

<?php $page_title = 'Delete Subject'; ?>
<?php include(SHARED_PATH . '/staff_navigation.php'); ?>

<div class="section_form" id="content">

    <div class="bread_crumb">
        <a href="<?php echo url_for(script_path: '/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for(script_path: '/staff/subjects/index.php')?>">Subjects</a>
        <p>/</p>
        <p><?php echo h($subject['menu_name'])?></p>
    </div>

    <div class="section_content delete">
        <h1>Delete Subject</h1>
        <p>Are you sure you want to delete <a href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id'])));?>"><?php echo h($subject['menu_name']); ?></a> and its related pages?</p>
        <div class="section_button">
            <form action="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>" method="post">
                <input class="button_secondary" type="submit" name="commit" value="Delete subject"/>
            </form>
            <a href="<?php echo url_for('/staff/subjects/index.php');?>" class="button_primary">Cancel</a>
        </div>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
