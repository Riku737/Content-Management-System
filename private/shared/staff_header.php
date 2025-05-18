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
        <link rel="stylesheet" media="all" href="../stylesheets/staff.css"/>
        <title>Admin - <?php echo $page_title; ?></title>
    </head>
    <body>
        
        <header>
            <h1>Staff Area</h1>
        </header>

        <navigation>
            <ul>
                <li><a href="index.php">Menu</a></li>
            </ul>
        </navigation>