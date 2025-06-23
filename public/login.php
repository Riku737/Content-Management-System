<?php 
require_once('../private/initialize.php'); 

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