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
        <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/all.css')?>"/>
        <script src="<?php echo url_for('/scripts/staff.js')?>"></script>
        <title>Admin - <?php echo h($page_title); ?></title>
    </head>
    <body>

        <div class="navigation_banner">

            <div class="navigation_banner_content">
                <div class="navigation_left">
                    <h3>Admin</h3>
                </div>
                <div class="navigation_right">
                    <a class="button_menu_primary" href="<?php echo url_for('/staff/logout.php')?>">Logout</a>
                    <p>Welcome <?php echo $_SESSION['username'] ?? ''; ?></p>
                </div>
            </div>

        </div>

        <div class="navigation_background">

            <div class="navigation_bar">
                <div class="navigation_left">
                    <h3><a class="navigation_name" href="<?php echo url_for('/staff/index.php');?>">Riki Bank</a></h3>
                </div>
                <div class="navigation_right">
                    <a class="link_menu" href="<?php echo url_for('/staff/pages/index.php'); ?>">Pages</a>
                    <a class="link_menu" href="<?php echo url_for('/staff/subjects/index.php'); ?>">Subjects</a>
                    <a class="link_menu" href="<?php echo url_for('/staff/index.php'); ?>">Home</a>
                </div>
            </div>
        
        </div>

        <?php echo display_session_message(); ?>