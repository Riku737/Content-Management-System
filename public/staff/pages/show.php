<?php 
// Runs specified file only once during script execution

require_once('../../../private/initialize.php');

require_login();

$page_title = 'Show Pages';
include(SHARED_PATH . '/staff_navigation.php'); 

$id = isset($_GET['id']) ? $_GET['id']: '1';
$page = find_page_by_id($id);

$subject = find_subject_by_id($page['subject_id']);

?>

<div class="section_show">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for(script_path: '/staff/subjects/index.php')?>">Subjects</a>
        <p>/</p>
        <a href="<?php echo url_for(script_path: '/staff/subjects/show.php?id=' . h(u($id)))?>"><?php echo h($subject['menu_name']);?></a>
        <p>/</p>
        <p><?php echo h($page['menu_name']);?></p>
    </div>

    <h1><?php echo h($page['menu_name']); ?></h1>

    <table class="list section_attributes">
        <tr>
            <th style="width: 20%">Subject</th>
            <td style="width: 80%"><?php echo h($subject['menu_name']);?></td>
        </tr>
        <tr>
            <th>Page Name</th>
            <td><?php echo h($page['menu_name']);?></td>
        </tr>
        <tr>
            <th>Position</th>
            <td><?php echo h($page['position']);?></td>
        </tr>
        <tr>
            <th>Visible</th>
            <td><?php echo h($page['visible'] == '1' ? 'true' : 'false');?></td>
        </tr>
        <tr>
            <th>Page Content</th>
            <td><?php echo h($page['content']);?></td>
        </tr>
    </table>

    <div class="preview_box" id="content">
        <?php         
        $allowed_tags = '<h1><h2><p><br><strong><em><ul><li><a>';
        echo strip_tags($page['content'], $allowed_tags);
        ?>
    </div>
    
    <div id="section_button">
        <a class="button_primary" href="<?php echo url_for('/index.php?id=' . h(u($page['id'])) . '&preview=true'); ?>" target="_blank">Preview page</a>
        <a href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id'])));?>" class="button_secondary">Back to subject</a>
    </div>

</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>