<?php require_once('../../../private/initialize.php'); ?>

<?php
  $subjects = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'Globe Bank'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
  ];
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
				<a class="button_primary action" href="">+ Create New Subject</a>
			</div>

		</div>

		<table class="list">
		<tr>
			<th style="width:10%">ID</th>
			<th style="width:10%">Position</th>
			<th style="width:10%">Visible</th>
			<th style="width:40%">Name</th>
			<th style="width:10%">&nbsp;</th>
			<th style="width:10%">&nbsp;</th>
			<th style="width:10%">&nbsp;</th>
		</tr>

		<?php foreach($subjects as $subject) { ?>
			<tr>
			<td><?php echo h($subject['id']); ?></td>
			<td><?php echo h($subject['position']); ?></td>
			<td><?php echo h($subject['visible']) == 1 ? 'true' : 'false'; ?></td>
			<td><?php echo h($subject['menu_name']); ?></td>
			<td><a class="link_paragraph action" href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id'])))?>">View</a></td>
			<td><a class="link_paragraph action" href="">Edit</a></td>
			<td><a class="link_paragraph action" href="">Delete</a></td>
			</tr>
		<?php } ?>
		</table>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
