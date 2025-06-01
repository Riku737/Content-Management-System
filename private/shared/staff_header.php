<?php
    if (!isset($page_title)) {
        $page_title = 'Staff Area';
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css')?>"/>
        <title>Admin - <?php echo $page_title; ?></title>
    </head>
    <body>

        <div class="navigation_bar">
            <div class="navigation_left">
                <h3><a class="navigation_name" href="<?php url_for('/staff/index.php');?>">Pokémon Index</a></h3>
            </div>
            <div class="navigation_right">
                <a class="button_menu" href="index.php">Logout</a>
                <a class="link_menu" href="<?php echo url_for('/staff/subjects/index.php'); ?>">Subject</a>
                <a class="link_menu" href="<?php echo url_for('/staff/index.php'); ?>">Home</a>
            </div>
        </div>