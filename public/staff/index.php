<?php require_once('../../private/initialize.php');?>

<?php $page_title = 'Staff Menu';?>

<?php include(SHARED_PATH . '/staff_header.php');?>

<div class="section_hero">

    <h1>Welcome back, Admin</h1>
    <div class="container_link">
        <div class="item_link">
            <h2>Subjects</h2>
            <p>Access subjects</p>
            <a class="button_primary" href="<?php echo url_for('/staff/subjects/index.php')?>">Subjects</a>
        </div>
        <div class="item_link">
            <h2>Jobs</h2>
            <p>Access jobs</p>
            <a class="button_primary" href="subjects/index.php">Subjects</a>
        </div>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php');?>