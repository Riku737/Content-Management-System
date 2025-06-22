<!-- Runs specified file only once during script execution -->
<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = 'Show Pages'; ?>
<?php include(SHARED_PATH . '/staff_navigation.php'); ?>

<?php
    
    $id = isset($_GET['id']) ? $_GET['id']: '1';
    $page = find_page_by_id($id);
    $subject = find_subject_by_id($page['subject_id']);

?>

<div class="section_show">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/pages/index.php')?>">Pages</a>
        <p>/</p>
        <a><?php echo h($page['menu_name']);?></a>
    </div>

    <h1><?php echo h($page['menu_name']); ?></h1>

    <div class="attributes">
        <p>Subject: <?php echo h($subject['menu_name']);?></p>
        <p>Page Name: <?php echo h($page['menu_name']);?></p>
        <p>Position: <?php echo h($page['position']);?></p>
        <p>Visible: <?php echo h($page['visible'] == '1' ? 'true' : 'false');?></p>
        <p>Page Content: <?php echo h(string: $page['content']);?></p>
    </div>
    
    <a href="<?php echo url_for('/index.php?id=' . h(u($page['id'])) . '&preview=true'); ?>" target="_blank">Preview Page</a>

    <!-- <a href="show.php?name=<?php echo u('John Doe'); ?>">Link</a><br>
    <a href="show.php?name=<?php echo u('Widgets&More'); ?>">Link</a><br>
    <a href="show.php?name=<?php echo u('!#*?'); ?>">Link</a> -->

</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>