<?php
    if (!isset($page_title)) {
        $page_title = 'Riki Bank';
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css')?>"/>
        <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/all.css')?>"/>
        <title>Riki Bank - <?php echo h($page_title); ?></title>
    </head>
    <body>

            <div class="navigation_background">

            <div class="navigation_bar">
                <div class="navigation_left">
                    <h3><a class="navigation_name" href="<?php echo url_for('/staff/index.php');?>">Riki Bank</a></h3>
                </div>
                <div class="navigation_right">
                    <a class="button_secondary" href="index.php">Sign in</a>
                    <!-- <a class="link_menu" href="<?php echo url_for('/staff/pages/index.php'); ?>">Pages</a> -->
                    <!-- <a class="link_menu" href="<?php echo url_for('/staff/subjects/index.php'); ?>">Subjects</a> -->
                    <a class="link_menu" href="<?php echo url_for('/index.php'); ?>">Home</a>
                </div>
            </div>
        
        </div>

        