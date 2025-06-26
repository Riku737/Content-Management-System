<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset(($_GET['id'])))
{
    redirect_to(url_for('/staff/admins/index.php'));
}

$id = $_GET['id'];

if (is_post_request())
{
    $admin = [];
    $admin['id'] = $id;
    $admin['first_name'] = $_POST['first_name'] ?? '';
    $admin['last_name'] = $_POST['last_name'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';
    $admin['password'] = $_POST['password'] ?? '';
    $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

    $result = update_admin($admin);
    if($result === true) 
    {
        $_SESSION['message'] = 'Admin updated.';
        redirect_to(url_for('/staff/admins/show.php?id=' . $id));
    }
    else 
    {
        $errors = $result;
    }
}
else 
{
    $admin = find_admin_by_id($id);
}

$page_title = 'Edit Admin';

include(SHARED_PATH . '/staff_navigation.php');

echo display_errors($errors);

?>

<div class="section_form">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/admins/index.php')?>">Admins</a>
        <p>/</p>
        <p><?php if (is_blank($admin['username'])) { echo "Edit Admin"; } else { echo h($admin['username']); }?></p>
    </div>

    <div class="section_content">
        <h1>Edit Admin</h1>

        <form class="section_form_fields" action="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($id)))?>" method="post">
            <div class="<?php echo input_errors($errors)?>">
                <h4>First Name</h4>
                <input class="input_short_form" type="text" name="first_name" placeholder="First name" value="<?php echo h($admin['first_name']); ?>" />
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Last Name</h4>
                <input class="input_short_form" type="text" name="last_name" placeholder="Last name" value="<?php echo h($admin['last_name']); ?>" />
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Email</h4>
                <input class="input_short_form" type="text" name="email" placeholder="Email" value="<?php echo h($admin['email']); ?>" />
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Username</h4>
                <input class="input_short_form" type="text" name="username" placeholder="Username" value="<?php echo h($admin['username']); ?>" />
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Password</h4>
                <input class="input_short_form" type="password" name="password" placeholder="Password" value="" />
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Confirm Password</h4>
                <input class="input_short_form" type="password" name="confirm_password" placeholder="Confirm password" value="" />
                <p>Passwords should at least be 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.</p>
            </div>
            <div id="section_button">
                <input class="button_primary" type="submit" value="Save edit" />
                <a href="<?php echo url_for('/staff/admins/index.php');?>" class="button_secondary">Cancel</a>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>