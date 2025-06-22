<?php $subject_set = find_all_subjects(['visible' => true]); ?>

<div class="bread_crumb">
    <a href="<?php echo url_for('/index.php')?>">Public</a>
</div>

<h1>Home</h1>

<div class="section_sitemap">

    <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>

        <?php // if(!$subject['visible']) { continue; }?>

        <div class="subject_sitemap">

            <h3><?php echo h($subject['menu_name']); ?></h3>

            <?php $page_set = find_pages_by_subject_id($subject['id'], ['visible' => true]); ?>

            <?php if(!has_empty_page_set($subject['id'])) { // Check whether subject has any pages ?>

                <div class="page_sitemap">
                                        
                    <?php while($page = mysqli_fetch_assoc($page_set)) { ?>
                        <?php // if (!$page['visible']) { continue; } ?>
                        <a href="<?php echo url_for('index.php?id=' . h(u($page['id']))); ?>"><?php echo h($page['menu_name']); ?></a>
                    <?php } // while $page_set ?>

                </div>

            <?php } // if !has_empty_page_set ?>
                
            <?php mysqli_free_result($page_set); ?>

        </div>

    <?php } // while $subject_set ?>

</div>

<?php mysqli_free_result($subject_set); ?>