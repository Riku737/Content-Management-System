<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/subjects/index.php'));
}
$id = $_GET['id'];

$subject = find_subject_by_id($id);

if(is_post_request()) {
    $result = delete_subject($id);
    redirect_to(url_for('/staff/subjects/index.php'));
} else {
    $subject = find_subject_by_id($id);
}

?>

<?php $page_title = 'Delete Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class="section_form" id="content">

    <div class="bread_crumb">
        <a href="<?php echo url_for(script_path: '/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for(script_path: '/staff/subjects/index.php')?>">Subjects</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/subjects/delete.php')?>"><?php echo h($subject['menu_name'])?></a>
    </div>

    <div class="delete subject">
        <h1>Delete Subject</h1>
        <p>Are you sure you want to delete subject "<?php echo h($subject['menu_name']); ?>"?</p>

        <div class="section_button">
            <form action="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>" method="post">
                <input class="button_secondary" type="submit" name="commit" value="Delete Subject"/>
            </form>
            <form action="<?php echo url_for('/staff/subjects/index.php'); ?>" method="post">
                <input class="button_primary" type="submit" name="commit" value="Cancel"/>
            </form>
        </div>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
