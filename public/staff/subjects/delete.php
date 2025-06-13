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
        <a href="<?php echo url_for('/staff/subjects/delete.php')?>">Delete</a>
    </div>

    <div class="subject delete">
        <h1>Delete <?php echo $subject['menu_name'];?></h1>
        <p>Are you sure you want to delete this subject?</p>
        <p class="item"><?php echo h($subject['menu_name']); ?></p>

        <form action="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>" method="post">
            <div id="operations">
                <input class="button_primary" type="submit" name="commit" value="Delete Subject" />
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
