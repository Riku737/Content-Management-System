<?php require_once('../../../private/initialize.php'); ?>

<?php require_login();?>

<?php $subject_set = find_all_subjects(); ?>


<?php $page_title = 'Subjects';?>
<?php include(SHARED_PATH . '/staff_navigation.php');?>

<div class="section_table" id="content">

	<div class="section_table_heading">

		<div class="bread_crumb">
			<a href="<?php echo url_for(script_path: '/staff/index.php')?>">Staff</a>
			<p>/</p>
			<p>Subjects</p>
		</div>
		<h1>Subjects</h1>
		<div class="actions">
			<a class="button_primary action" href="<?php echo url_for('/staff/subjects/new.php');?>">+ Add subject</a>
		</div>

	</div>

	<table class="list">
	<tr>
		<th style="width:5%">ID</th>
		<th style="width:10%">Position</th>
		<th style="width:10%">Visible</th>
		<th style="width:50%">Name</th>
		<th style="width:10%">Pages</th>
		<th style="width:5%">&nbsp;</th>
		<th style="width:5%">&nbsp;</th>
		<th style="width:5%">&nbsp;</th>
	</tr>

	<?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>
		<?php $page_count = count_pages_by_subject_id($subject['id']); ?>
		<tr>
		<td><?php echo h($subject['id']); ?></td>
		<td><?php echo h($subject['position']); ?></td>
		<td>
			<?php
				if(h($subject['visible']) == 1) {
					echo 'Yes';
				} else {
					echo 'No';
				}
			?>
		</td>
		<td><?php echo h($subject['menu_name']); ?></td>
		<td><?php echo $page_count; ?></td>
		<td><a class="link_paragraph action" href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id'])));?>">View</a></td>
		<td><a class="link_paragraph action" href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id'])));?>">Edit</a></td>
		<td><a class="link_paragraph action" href="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id'])));?>">Delete</a></td>
		</tr>
	<?php } ?>
	</table>

	<?php 
		// We know longer need this anymore, free it up
		mysqli_free_result($subject_set);
	?>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
