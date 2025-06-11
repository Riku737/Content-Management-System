<?php require_once('../../../private/initialize.php'); ?>

<?php

	$subject_set = find_all_subjects();

?>

<?php $page_title = 'Subjects'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class="section_table" id="content">
	<div class="pages listing">

  		<div class="section_table_heading">

  			<div class="bread_crumb">
				<a href="<?php echo url_for(script_path: '/staff/index.php')?>">Staff</a>
				<p>/</p>
				<a href="<?php echo url_for(script_path: '/staff/subjects/index.php')?>">Subjects</a>
			</div>
			<h1>Subjects</h1>
			<div class="actions">
				<a class="button_primary action" href="<?php echo url_for('/staff/subjects/new.php');?>">+ Add subject</a>
			</div>

		</div>

		<table class="list">
		<tr>
			<th style="width:10%">ID</th>
			<th style="width:10%">Position</th>
			<th style="width:10%">Visible</th>
			<th style="width:55%">Name</th>
			<th style="width:5%">&nbsp;</th>
			<th style="width:5%">&nbsp;</th>
			<th style="width:5%">&nbsp;</th>
		</tr>

		<?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>
			<tr>
			<td><?php echo h($subject['id']); ?></td>
			<td><?php echo h($subject['position']); ?></td>
			<td><?php echo h($subject['visible']) == 1 ? 'true' : 'false'; ?></td>
			<td><?php echo h($subject['menu_name']); ?></td>
			<td><a class="link_paragraph action" href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id'])))?>">View</a></td>
			<td><a class="link_paragraph action" href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id'])));?>">Edit</a></td>
			<td><a class="link_paragraph action" href="">Delete</a></td>
			</tr>
		<?php } ?>
		</table>

		<?php 
			// We know longer need this anymore, free it up
			mysqli_free_result($subject_set);
		?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
