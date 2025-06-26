<?php 
// PHP statement runs the specified file only once during script executation. If the file has already been included
require_once('../../private/initialize.php');

?>

<?php require_login(); ?>

<?php $page_title = 'Staff Menu';?>

<?php include(SHARED_PATH . '/staff_navigation.php');?>

<div class="section_hero">

    <div class="bread_crumb">
        <p>Staff</p>
    </div>
    <h1><?php display_greeting(); ?></h1>
    <nav class="container_link">
        <div class="item_link">
            <h2>Subjects</h2>
            <p>Access subjects</p>
            <a class="button_primary" href="<?php echo url_for('/staff/subjects/index.php')?>">Manage</a>
        </div>
        <div class="item_link">
            <h2>Pages</h2>
            <p>Access pages</p>
            <a class="button_primary" href="<?php echo url_for('/staff/pages/index.php')?>">Manage</a>
        </div>
        <div class="item_link">
            <h2>Admins</h2>
            <p>Access admins</p>
            <a class="button_primary" href="<?php echo url_for('/staff/admins/index.php')?>">Manage</a>
        </div>
    </nav>

</div>

<?php include(SHARED_PATH . '/staff_footer.php');?>