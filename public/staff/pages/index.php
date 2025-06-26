<?php require_once('../../../private/initialize.php');

require_login();

$pages_set = find_all_pages();

//   $pages = [
//     ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'Globe Bank'],
//     ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
//     ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
//     ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
//   ];

$page_title = 'Pages';

include(SHARED_PATH . '/staff_navigation.php'); 

?>

<div class="section_table" id="content">

	<div class="section_table_heading">
		
		<div class="bread_crumb">
			<a href="<?php echo url_for(script_path: '/staff/index.php')?>">Staff</a>
			<p>/</p>
			<p>Pages</p>
		</div>
		<h1>Pages</h1>
		<div class="actions">
			<a class="button_primary action" href="<?php echo url_for('/staff/pages/new.php');?>">+ Add page</a>
		</div>

	</div>

	<table class="list">
		<tr>
			<th style="width:5%">ID</th>
			<th style="width:30%">Subject</th>
			<th style="width:10%">Position</th>
			<th style="width:10%">Visible</th>
			<th style="width:30%">Name</th>
			<th style="width:5%">&nbsp;</th>
			<th style="width:5%">&nbsp;</th>
			<th style="width:5%">&nbsp;</th>
		</tr>

		<?php while ($page = mysqli_fetch_assoc($pages_set)) { ?>
			<?php $subject = find_subject_by_id( $page['subject_id']); ?>
			<tr>
				<td><?php echo h($page['id']); ?></td>
				<td><?php echo h($subject['menu_name']); ?></td>
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

	<?php mysqli_free_result($pages_set);?>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
