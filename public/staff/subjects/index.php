<?php require_once('../../../private/initialize.php'); ?>

<?php $subject_set = find_all_subjects(); ?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=visibility" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=visibility_off" />


<?php $page_title = 'Subjects'; ?>
<?php include(SHARED_PATH . '/staff_navigation.php'); ?>

<div class="section_table" id="content">

	<div class="section_table_heading">

		<div class="bread_crumb">
			<a href="<?php echo url_for(script_path: '/staff/index.php')?>">Staff</a>
			<p>/</p>
			<p>Subjects</p>
		</div>
		<h1>Subjects</h1>
		<div class="actions">
			<a class="button_primary action" href="<?php echo url_for('/staff/subjects/new.php');?>">+ Create subject</a>
		</div>

	</div>

	<table class="list">
	<tr>
		<th style="width:5%">ID</th>
		<th style="width:10%">Position</th>
		<th style="width:10%">Visible</th>
		<th style="width:60%">Name</th>
		<th style="width:5%">&nbsp;</th>
		<th style="width:5%">&nbsp;</th>
		<th style="width:5%">&nbsp;</th>
	</tr>

	<?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>
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
