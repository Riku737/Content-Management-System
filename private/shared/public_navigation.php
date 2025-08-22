<?php
if (!isset($page_title)) {
    $page_title = 'Public';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css') ?>" />
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/all.css') ?>" />
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/smallscreen.css') ?>" />
    <title>Techno1ogy - <?php echo h($page_title); ?> <?php if (isset($preview) && $preview) {
                                                            echo ' [PREVIEW]';
                                                        } ?></title>
</head>

<body>

    <div class="navigation_background">

        <div class="navigation_bar">
            <div class="navigation_left">
                <h3><a class="navigation_name" href="<?php echo url_for('/index.php'); ?>">Techno1ogy</a></h3>
            </div>
            <div class="navigation_right">
                <a class="button_secondary" href="<?php echo url_for('/staff/login.php'); ?>">Log in</a>
                <a class="link_menu" href="<?php echo url_for('/index.php'); ?>">Home</a>
            </div>
        </div>

    </div>