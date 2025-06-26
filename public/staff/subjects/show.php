<?php 
// Runs specified file only once during script execution
require_once('../../../private/initialize.php');

require_login();

// $id = isset($_GET['id']) ? $_GET['id']: '1'; 
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$subject = find_subject_by_id($id);
$pages_set = find_pages_by_subject_id($id);

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

</div>

<div class="section_show">

    <div class="section_heading_button">
        <div class="section_heading_button_left">
            <h2>Pages</h2>
        </div>  
        <div class="section_heading_button_right">
            <div class="actions">
                <a class="button_primary action" href="<?php echo url_for('/staff/pages/new.php?subject_id=' . h(u($subject['id'])));?>">+ Add page</a>
            </div>
        </div>    
    </div>

    <table class="list section_attributes">
		<tr>
			<th style="width:5%">ID</th>
			<th style="width:10%">Position</th>
			<th style="width:10%">Visible</th>
			<th style="width:40%">Name</th>
			<th style="width:5%">&nbsp;</th>
			<th style="width:5%">&nbsp;</th>
			<th style="width:5%">&nbsp;</th>
		</tr>

		<?php while ($page = mysqli_fetch_assoc($pages_set)) { ?>
			<?php $subject = find_subject_by_id( $page['subject_id']); ?>
			<tr>
				<td><?php echo h($page['id']); ?></td>
				<td><?php echo h($page['position']); ?></td>
				<td>
					<?php 
						if (h($page['visible'] == 1)) {
							echo 'Yes';
						} else {
							echo 'No';
						}
					?>
				</td>
				<td><?php echo h($page['menu_name']); ?></td>
				<td><a class="link_paragraph action" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id'])))?>">View</a></td>
				<td><a class="link_paragraph action" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id'])))?>">Edit</a></td>
				<td><a class="link_paragraph action" href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))); ?>">Delete</a></td>
			</tr>
		<?php } ?>
	</table>

    <div id="section_button">
        <a href="<?php echo url_for('/staff/subjects/index.php');?>" class="button_secondary">Back to list</a>
    </div>


    <!-- <div class="attributes">
        <p>Subject Name: <?php echo h($subject['menu_name']);?></p>
        <p>Position: <?php echo h($subject['position']);?></p>
        <p>Visible: <?php echo h($subject['visible'] == '1' ? 'true' : 'false');?></p>
    </div> -->


</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>