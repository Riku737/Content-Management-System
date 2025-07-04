<?php 

/**
 * Whitespace is not permitted before calling the header() function in PHP
 * because HTTP headers must be sent before any output (including spaces, newlines, or HTML) is sent to the browser
 */
require_once('../../../private/initialize.php');

require_login();

if(!isset(($_GET['id']))) {
    redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {

    // Handle form vales sent by new.php

    // Read values submitted to this page. 
    // Default to an empty string such that nothing is sent.

    $page = [];
    $page['id'] = $id;
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['menu_name'] = $_POST['menu_name'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';
    $page['content'] = $_POST['content'] ?? '';

    /**
     * Note to self:
     * Post Request is secure. Good for sophiscating URL and hiding sensitive information.
     * 
     * Post would not append data to URL after form submitted /index.php/
     * Get would append data to URL data after form submitted e.g. /index.php/username="joe"
     */

    $result = update_page($page);
    if ($result === true) {
        // redirect_to(url_for('/staff/pages/show.php?id=' . $id));
        $_SESSION['message'] = $page['menu_name'] . ' page was edited successfully.';
        redirect_to(url_for('/staff/subjects/show.php?id=' . h(u($page['subject_id']))));
    } else {
        $errors = $result;
    }

} else {
    
    $page = find_page_by_id($id);
    $subject = find_subject_by_id($page['subject_id']);

}

$page_count = count_pages_by_subject_id($page['subject_id']) + 1;

$page_title = 'Edit Page';

include(SHARED_PATH . '/staff_navigation.php');

echo display_errors($errors);

?>

<div class="section_form">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/subjects/index.php')?>">Subjects</a>
        <p>/</p>
        <a href="<?php echo url_for(script_path: '/staff/subjects/show.php?id=' . h(u($id)))?>"><?php echo h($subject['menu_name']);?></a>
        <p>/</p>
        <p><?php if (is_blank($page['menu_name'])) { echo "Edit Page"; } else { echo h($page['menu_name']); }?></p>
    </div>

    <div class="section_content">
        <h1>Edit Page</h1>

        <form class="section_form_fields" action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id)))?>" method="post">
            <div class="<?php echo input_errors($errors)?>">
                <h4>Subject</h4>
                <select class="select_custom" name="subject_id">
                    <?php
                        $subject_set = find_all_subjects();
                        while($subject = mysqli_fetch_assoc($subject_set)) {
                            // echo "<option value=\"" . h($subject['id']) . "\"";
                            if ($page["subject_id"] == $subject['id']) {
                                echo "<option value=\"" . h($subject['id']) . "\"" . " selected >" . h($subject['menu_name']) . "</option>";
                                // echo " selected";
                            }
                            // echo ">" . h($subject['menu_name']) . "</option>";
                        }
                        mysqli_free_result($subject_set);
                    ?>
                </select>
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Page Name</h4>
                <input type="text" class="input_short_form" name="menu_name" value="<?php echo h($page['menu_name']);?>"/>
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Position</h4>
                <select class="select_custom" name="position">
                    <?php
                        for ($i = 1; $i <= $page_count; $i++) {
                            echo "<option value =\"{$i}\"";
                            if ($page['position'] == $i) {
                                echo " selected";
                            }
                            echo ">{$i}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Visible</h4>
                <div>
                    <input type="hidden" name="visible" value="0" />
                    <input type="checkbox" name="visible" value="1"<?php if ($page['visible'] == "1") { echo " checked"; }?> />
                </div>
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Page Content</h4>
                <textarea class="input_short_form" type="text" name="content" style="height: 256px"><?php echo h($page['content'])?></textarea>
            </div>
            <div id="section_button">
                <input class="button_primary" type="submit" value="Save edit" />
                <a href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($page['subject_id'])));?>" class="button_secondary">Back to subject</a>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>