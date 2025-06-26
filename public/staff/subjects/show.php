<?php 
// Runs specified file only once during script execution
require_once('../../../private/initialize.php');

require_login();

// $id = isset($_GET['id']) ? $_GET['id']: '1'; 
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$subject = find_subject_by_id($id);

?>

<?php $page_title = 'Show Subjects'; ?>
<?php include(SHARED_PATH . '/staff_navigation.php'); ?>

<div class="section_show">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/subjects/index.php')?>">Subjects</a>
        <p>/</p>
        <p><?php echo h($subject['menu_name']);?></p>
    </div>

    <h1><?php echo h($subject['menu_name']);?></h1>

    <table class="list section_attributes">
        <tr>
            <th style="width: 20%">Subject Name</th>
            <td style="width: 80%"><?php echo h($subject['menu_name']);?></td>
        </tr>
        <tr>
            <th>Position</th>
            <td><?php echo h($subject['position']);?></td>
        </tr>
        <tr>
            <th>Visible</th>
            <td><?php echo h($subject['visible'] == '1' ? 'true' : 'false');?></td>
        </tr>
    </table>

    <div id="section_button">
        <a href="<?php echo url_for('/staff/pages/index.php');?>" class="button_primary">Go back</a>
    </div>


    <!-- <div class="attributes">
        <p>Subject Name: <?php echo h($subject['menu_name']);?></p>
        <p>Position: <?php echo h($subject['position']);?></p>
        <p>Visible: <?php echo h($subject['visible'] == '1' ? 'true' : 'false');?></p>
    </div> -->


</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>