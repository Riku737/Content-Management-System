<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Home'; ?>

<?php include(SHARED_PATH . '/public_navigation.php') ?>

<?php $subject_set = find_all_subjects(); ?>

<div class="section_content">

    <h1>Home</h1>

    <div class="section_sitemap">

        <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>

            <div class="subject_sitemap">

                <h3><?php echo h($subject['menu_name']); ?></h3>

                <?php $page_set = find_pages_by_subject_id($subject['id']); ?>

                <?php if(!has_empty_page_set($subject['id'])) { // Check whether subject has any pages ?>

                    <div class="page_sitemap">
                                            
                        <?php while($page = mysqli_fetch_assoc($page_set)) { ?>
                            <a href="<?php echo url_for('index.php'); ?>">
                                <?php echo h($page['menu_name']); ?>
                            </a>
                        <?php } // while $page_set ?>

                    </div>

                <?php } // if !has_empty_page_set ?>
                    
                <?php mysqli_free_result($page_set); ?>

            </div>

        <?php } // while $subject_set ?>

    </div>

    <?php mysqli_free_result($subject_set); ?>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>