<?php 

// Whitespace is not permitted before calling the header() function in PHP
// because HTTP headers must be sent before any output (including spaces, newlines, or HTML) is sent to the browser
require_once('../../../private/initialize.php');

// Verifies whether web request is get or post
// Prevents accidental access to page through modifying URL
// Redirects to former page
if (is_post_request()) {

    // Handle form vales sent by new.php

    // Read values submitted to this page. 
    // Default to an empty string such that nothing is sent.

    $subject = [];
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = insert_subject($subject);
    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }
       
}

$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set) + 1;
mysqli_free_result($subject_set);

$subject = [];
$subject["position"] = $subject_count;

?>

<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class="section_form">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/subjects/index.php')?>">Subjects</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/subjects/edit.php')?>">Create New Subject</a>
    </div>

    <div class="subject new">
        <h1>Create New Subject</h1>

        <?php echo display_errors($errors)?>
        <form action="<?php echo url_for('/staff/subjects/new.php');?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input class="input_short_form <?php echo input_errors($errors)?>" type="text" name="menu_name" value="" /></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <?php
                            for ($i = 1; $i <= $subject_count; $i++) {
                                echo "<option value =\"{$i}\"";
                                if ($subject['position'] == $i) {
                                    echo " selected";
                                }
                                echo ">{$i}</option>";
                            }
                        ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0" />
                    <input type="checkbox" name="visible" value="1"/>
                </dd>
            </dl>
            <div id="section_button">
                <input class="button_primary" type="submit" value="Create Subject" />
                <a href="<?php echo url_for('/staff/subjects/index.php');?>" class="button_secondary">Cancel</a>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
