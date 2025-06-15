<?php 

/**
 * Whitespace is not permitted before calling the header() function in PHP
 * because HTTP headers must be sent before any output (including spaces, newlines, or HTML) is sent to the browser
 */
require_once('../../../private/initialize.php');

if(!isset(($_GET['id']))) {
    redirect_to(url_for('/staff/subjects/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {


    // Handle form vales sent by new.php
    // Read values submitted to this page. 
    // Default to an empty string such that nothing is sent.
    $subject = [];
    $subject['id'] = $id;
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    /**
     * Note to self:
     * 
     * $_GET (SECURITY DOESN'T MATTER)
     * Data is appended to the URL
     * NOT SECURE
     * char limit
     * Bookmark is possible w/ values
     * GET requests can be cached
     * Better for a search page
     * 
     * $_POST (SECURITY MATTERS)
     * Data is packaged inside the body of the HTTP request
     * MORE SECURE
     * No data limit
     * Cannot bookmark
     * Requests are not cached
     * Better for submitting credentials
     */

    $result = update_subject($subject);
    if ($result === true) {
        // redirect_to(url_for('/staff/subjects/show.php?id=' . $id));
        redirect_to(url_for('/staff/subjects/index.php'));
    } else {
        $errors = $result;
        // var_dump($errors); // Debugging
    }

} else {
    $subject = find_subject_by_id($id);
}
$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set);
mysqli_free_result($subject_set);
?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class="section_form">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/subjects/index.php')?>">Subjects</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/subjects/edit.php')?>"><?php if (is_blank($subject['menu_name'])) { echo "Edit Subject"; } else { echo h($subject['menu_name']); }?></a>
    </div>

    <div class="section_content">
        <h1>Edit Subject</h1>

        <?php echo display_errors($errors); ?>

        <form class="section_form_fields" action="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($id)))?>" method="post">
            <div>
                <h4>Subject Name</h4>
                <input type="text" class="input_short_form <?php echo input_errors($errors); ?>" name="menu_name" value="<?php echo h($subject['menu_name']);?>" />
            </div>
            <div>
                <h4>Position</h4>
                <select name="position"  class="select_custom">
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
            </div>
            <div>
                <h4>Visible</h4>
                <div>
                    <input type="hidden" name="visible" value="0" />
                    <input type="checkbox" name="visible" value="1"<?php if ($subject['visible'] == "1") { echo " checked"; }?> />
                </div>
            </div>
            <div id="section_button">
                <input class="button_primary" type="submit" value="Save edit" />
                <a href="<?php echo url_for('/staff/subjects/index.php');?>" class="button_secondary">Cancel</a>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
