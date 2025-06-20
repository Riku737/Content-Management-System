<?php 

// Whitespace is not permitted before calling the header() function in PHP
// because HTTP headers must be sent before any output (including spaces, newlines, or HTML) is sent to the browser
require_once('../../../private/initialize.php');

if (is_post_request()) {
    $page = [];
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['menu_name'] = $_POST['menu_name'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';
    $page['content'] = $_POST['content'] ?? '';

    $result = insert_page($page);
    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }

} else {
    $page = [];
    $page['subject_id'] = '';
    $page['menu_name'] = '';
    $page['position'] = '';
    $page['visible'] = '';
    $page['content'] = '';
}

$page_set = find_all_pages();
$page_count = mysqli_num_rows($page_set) + 1;
mysqli_free_result($page_set);

?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff_navigation.php'); ?>

<div class="section_form">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/pages/index.php')?>">Pages</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/pages/edit.php')?>">Create New Page</a>
    </div>

    <div class="section_content">
        <h1>Create New Page</h1>
        <?php echo display_errors($errors)?>

        <form class="section_form_fields" action="<?php echo url_for('/staff/pages/new.php');?>" method="post">
            <div class="<?php echo input_errors($errors)?>">
                <h4>Subject</h4>
                <select class="select_custom" name="subject_id">
                    <?php
                        $subject_set = find_all_subjects();
                        while($subject = mysqli_fetch_assoc($subject_set)) {
                            echo "<option value=\"" . h($subject['id']) . "\"";
                            if ($page["subject_id"] == $subject['id']) {
                                echo " selected";
                            }
                            echo ">" . h($subject['menu_name']) . "</option>";
                        }
                        mysqli_free_result($subject_set);
                    ?>
                </select>
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Page Name</h4>
                <input class="input_short_form" type="text" name="menu_name" placeholder="Enter page name in here" value="<?php echo h($page['menu_name']); ?>" />
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
                    <input type="checkbox" name="visible" value="1" />
                </div>
            </div>
            <div class="<?php echo input_errors($errors)?>">
                <h4>Page Content</h4>
                <textarea class="input_short_form" type="text" name="content" placeholder="Enter page content in here"><?php echo h($page['content'])?></textarea>
            </div>
            <div id="section_button">
                <input class="button_primary" type="submit" value="Create page" />
                <a href="<?php echo url_for('/staff/pages/index.php');?>" class="button_secondary">Cancel</a>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
