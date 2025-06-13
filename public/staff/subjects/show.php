<!-- Runs specified file only once during script execution -->
<?php require_once('../../../private/initialize.php'); ?>

<?php 

    // $id = isset($_GET['id']) ? $_GET['id']: '1'; 
    $id = $_GET['id'] ?? '1'; // PHP > 7.0

    $subject = find_subject_by_id($id);

?>

<?php $page_title = 'Show Subjects'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class="section_show">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/subjects/index.php')?>">Subjects</a>
        <p>/</p>
        <a><?php echo h($subject['menu_name']);?></a>
    </div>

    <h1><?php echo h($subject['menu_name']);?></h1>

    <div class="attributes">
        <p>Menu Name: <?php echo h($subject['menu_name']);?></p>
        <p>Position: <?php echo h($subject['position']);?></p>
        <p>Visible: <?php echo h($subject['visible'] == '1' ? 'true' : 'false');?></p>
    </div>


</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>