<?php 

/**
 * Whitespace is not permitted before calling the header() function in PHP
 * because HTTP headers must be sent before any output (including spaces, newlines, or HTML) is sent to the browser
 */
require_once('../../../private/initialize.php');

if(!isset(($_GET['id']))) {
    redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];
$menu_name = '';
$position = '';
$visible = '';

if (is_post_request()) {

    // Handle form vales sent by new.php

    // Read values submitted to this page. 
    // Default to an empty string such that nothing is sent.

    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    // Read the values back and echo
    echo "Form parameters<br/>";
    echo "Menu name: " . $menu_name . "<br/>";
    echo "Position: " . $position . "<br/>";
    echo "Visible: " . $visible . "<br/>";

} else {
    // redirect_to(url_for('/staff/pages/new.php'));
}
?>

<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class="section_form">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/pages/index.php')?>">Pages</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/pages/edit.php')?>">Edit Page</a>
    </div>

    <div class="Page edit">
        <h1>Edit Page</h1>

        <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id)))?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" class="input_short_form" name="menu_name" value="<?php echo h($menu_name);?>" /></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <option value="1">1</option>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0" />
                    <input type="checkbox" name="visible" value="1" />
                </dd>
            </dl>
            <div id="operations">
                <input class="button_primary" type="submit" value="Save Edit" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
