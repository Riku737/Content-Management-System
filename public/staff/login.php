<?php 
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $_SESSION['username'] = $username;

    redirect_to(url_for('/staff/index.php'));
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/public_navigation.php'); ?>

<div class="section_content">

    <h1>Log in</h1>
    <?php echo display_errors($errors);?>

    <form class="section_form_fields" action="login.php" method="post">
        <div>
            <h4>Username</h4>
            <input class="input_short_form" type="text" name="username" value="<?php echo h($username); ?>" />
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