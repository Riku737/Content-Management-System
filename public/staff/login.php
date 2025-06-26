<?php 
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Validations
    if (is_blank($username)) {
        $errors[] = "Username cannot be blank.";
    }
    if (is_blank($password)) {
        $errors[] = "Password cannot be blank.";
    }

    // If no errors, try to login
    if (empty($errors)) {
        
        $login_failure_message = "Log in was unsuccessful.";
        $admin = find_admin_by_username($username);
        
        if ($admin) { // If find_admin_by_username returns a set
            if (password_verify($password, $admin['hashed_password'])) {
                // builtin php function does all the heavy lifting
                // password matches
                log_in_admin($admin);
                redirect_to(url_for('/staff/index.php'));
            } else {
                // no username found, but password doesn't match
                $errors[] = $login_failure_message;
            }

        } else {
            // No username found
            $errors[] = $login_failure_message;
        }

    }

}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/public_navigation.php'); ?>
<?php echo display_errors($errors);?>

<div class="section_content">

    <h1>Log in</h1>

    <form class="section_form_fields" action="login.php" method="post">
        <div>
            <h4>Username</h4>
            <input class="input_short_form" type="text" name="username" value="" />
        </div>
        <div>
            <h4>Password</h4>
            <input class="input_short_form" type="password" name="password" value="" />
        </div>
        <div>
            <input class="button_primary" type="submit" name="submit" value="Log in" />
        </div>
    </form>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>