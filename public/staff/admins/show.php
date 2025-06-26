<?php

require_once('../../../private/initialize.php');

require_login();

$id = $_GET['id'] ?? '1'; // PHP > 7.0
$admin = find_admin_by_id($id);

$page_title = 'Show Admin';
include(SHARED_PATH . '/staff_navigation.php');

?>

<div class="section_show">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/admins/index.php')?>">Admins</a>
        <p>/</p>
        <p><?php echo h(string: $admin['username']);?></p>
    </div>

    <h1><?php echo h($admin['username']);?></h1>

    <table class="list section_attributes">
        <tr>
            <th style="width: 20%">First Name</th>
            <td style="width: 80%"><?php echo h($admin['first_name']);?></td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td><?php echo h($admin['last_name']);?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo h($admin['email']);?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?php echo h($admin['username']);?></td>
        </tr>
    </table>

    <div id="section_button">
        <a href="<?php echo url_for('/staff/admins/index.php');?>" class="button_primary">Back to list</a>
    </div>


    <!-- <div class="attributes">
        <p>Subject Name: <?php echo h($subject['menu_name']);?></p>
        <p>Position: <?php echo h($subject['position']);?></p>
        <p>Visible: <?php echo h($subject['visible'] == '1' ? 'true' : 'false');?></p>
    </div> -->


</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>