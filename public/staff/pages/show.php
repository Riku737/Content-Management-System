<!-- Runs specified file only once during script execution -->
<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = 'Show Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<?php $id = isset($_GET['id']) ? $_GET['id']: '1'; // Default value ?>

<div class="section_show">

    <div class="bread_crumb">
        <a href="<?php echo url_for('/staff/index.php')?>">Staff</a>
        <p>/</p>
        <a href="<?php echo url_for('/staff/pages/index.php')?>">Pages</a>
        <p>/</p>
        <a><?php echo $id;?></a>
    </div>

    <h1>Page ID: <?php echo h($id);?></h1>

    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>

    <!-- <a href="show.php?name=<?php echo u('John Doe'); ?>">Link</a><br>
    <a href="show.php?name=<?php echo u('Widgets&More'); ?>">Link</a><br>
    <a href="show.php?name=<?php echo u('!#*?'); ?>">Link</a> -->

</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>