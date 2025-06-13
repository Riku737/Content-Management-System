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
    redirect_to(url_for('/staff/pages/show.php?id=' . $id));

} else {
    
    $page = find_page_by_id($id);

    $page_set = find_all_pages();
    $page_count = mysqli_num_rows($page_set);
    mysqli_free_result($page_set);
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
        <a href="<?php echo url_for('/staff/pages/edit.php')?>"><?php echo h($page['menu_name'])?></a>
    </div>

    <div class="Page edit">
        <h1>Edit Page</h1>

        <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id)))?>" method="post">
            <dl>
                <dt>Subject</dt>
                <dd>
                    <select name="subject_id">
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
                </dd>
            </dl>
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" class="input_short_form" name="menu_name" value="<?php echo h($page['menu_name']);?>"/></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
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
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0" />
                    <input type="checkbox" name="visible" value="1"<?php if ($page['visible'] == "1") { echo " checked"; }?> />
                </dd>
            </dl>
            <dl>
                <dt>Content</dt>
                <dt>
                    <textarea class="input_short_form" type="text" name="content"><?php echo h($page['content'])?></textarea>
                </dt>
            </dl>
            <div id="operations">
                <input class="button_primary" type="submit" value="Save Edit" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>