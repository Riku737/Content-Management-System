<?php

require_once('../../private/initialize.php');

unset($_SESSION['username']);
// Alternative: $_SESSION['username'] = NULL;
// Unsets current session username value

redirect_to(url_for('/staff/login.php'));

?>