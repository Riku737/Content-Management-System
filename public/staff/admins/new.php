<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {
    $admin = [];
    $admin['first_name'] = $_POST['first_name'] ?? '';
    $admin['last_name'] = $_POST['last_name'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';
    $admin['password'] = $_POST['password'] ?? '';
    $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

    $result = insert_admin($admin);    
    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        $_SESSION['message'] = 'Admin created.';
        redirect_to(url_for('/staff/admins/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }

} else {
    // Display the blank form
    $admin = [];
    $admin['first_name'] = '';
    $admin['last_name'] = '';
    $admin['email'] = '';
    $admin['username'] = '';
    $admin['confirm_password'] = '';
}

$page_title = 'Create Admin';

include(SHARED_PATH . '/staff_navigation.php');

?>

<?php echo display_errors($errors)?>

<div class="section_form">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/admins/index.php')?>">Admins</a>
        <p>/</p>
        <p>Create New Admin</p>
    </div>

    <div class="section_content">
        <h1>Create New Admin</h1>

        <form class="section_form_fields" action="<?php echo url_for('/staff/admins/new.php');?>" method="post">
            <div class="<?php echo input_errors($errors)?>">
                <h4>First Name</h4>
                <input class="input_short_form" type="text" name="first_name" placeholder="Enter first name in here" value="<?php echo h($admin['first_name']); ?>" />
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Last Name</h4>
                <input class="input_short_form" type="text" name="last_name" placeholder="Enter last name in here" value="<?php echo h($admin['last_name']); ?>" />
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Email</h4>
                <input class="input_short_form" type="text" name="email" placeholder="Enter email in here" value="<?php echo h($admin['email']); ?>" />
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Username</h4>
                <input class="input_short_form" type="text" name="username" placeholder="Enter username in here" value="<?php echo h($admin['username']); ?>" />
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Password</h4>
                <input class="input_short_form" type="password" name="password" placeholder="Enter password in here" value="" />
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Confirm Password</h4>
                <input class="input_short_form" type="password" name="confirm_password" placeholder="Enter password in here" value="" />
                <p>Passwords should at least be 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.</p>
            </div>
            <div id="section_button">
                <input class="button_primary" type="submit" value="Create admin" />
                <a href="<?php echo url_for('/staff/admins/index.php');?>" class="button_secondary">Cancel</a>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>