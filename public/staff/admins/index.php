<?php 

require_once('../../../private/initialize.php');

$admins_set = find_all_admins();
$page_title = 'Admins';
include(SHARED_PATH . '/staff_navigation.php');

?>

<div class="section_table" id="content">

	<div class="section_table_heading">
		
		<div class="bread_crumb">
			<a href="<?php echo url_for(script_path: '/staff/index.php')?>">Staff</a>
			<p>/</p>
			<p>Admins</p>
		</div>
		<h1>Admins</h1>
		<div class="actions">
			<a class="button_primary action" href="<?php echo url_for('/staff/admins/new.php');?>">+ Add admin</a>
		</div>

	</div>

	<table class="list">
		<tr>
			<th style="width:5%">ID</th>
			<th style="width:20%">First Name</th>
			<th style="width:20%">Last Name</th>
			<th style="width:20%">Email</th>
			<th style="width:20%">Username</th>
			<th style="width:5%">&nbsp;</th>
			<th style="width:5%">&nbsp;</th>
			<th style="width:5%">&nbsp;</th>
		</tr>

		<?php while ($admin = mysqli_fetch_assoc($admins_set)) { ?>
			<tr>
				<td><?php echo h($admin['id']); ?></td>
				<td><?php echo h($admin['first_name']); ?></td>
				<td><?php echo h($admin['last_name']); ?></td>
				<td><?php echo h($admin['email']); ?></td>
                <td><?php echo h($admin['username']); ?></td>
				<td><a class="link_paragraph action" href="<?php echo url_for('/staff/admins/show.php?id=' . h(u($admin['id'])))?>">View</a></td>
				<td><a class="link_paragraph action" href="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($admin['id'])))?>">Edit</a></td>
				<td><a class="link_paragraph action" href="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin['id']))); ?>">Delete</a></td>
			</tr>
        <?php } ?>
	</table>

	<?php mysqli_free_result($admins_set);?>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>