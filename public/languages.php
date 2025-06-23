<?php require_once('../private/initialize.php'); ?>

<?php

if (is_post_request()) {
    // Form was submitted
    $language = $_POST['language'] ?? 'Any';
    $expire = time() + 60*+60*24*365; // Cookie lasts for 1 year
    setcookie('language', $language, $expire);
} else {
    // Read the stored value (if any)
    $language = $_COOKIE['language'] ?? 'Any';
}

?>

<?php include(SHARED_PATH . '/public_navigation.php'); ?>

<div class="section_content">

    <h1>Set Language Preference</h1>

    <form class="section_form_fields" action="<?php echo url_for('/languages.php'); ?>" method="post">

        <div>
            <h4>Select Language</h4>
            <select class="select_custom" name="language">

                <?php
                    $language_choices = ['Any', 'English', 'French', 'Japanese'];
                    foreach($language_choices as $language_choice) {
                        echo "<option value=\"{$language_choice}\"";
                        if ($language == $language_choice) {
                            echo " selected";
                        }
                        echo ">{$language_choice}</option>";
                    }
                ?>

            </select>
        </div>
        
        <div>
            <input class="button_primary" type="submit" value="Set preference" />
        </div>

    </form>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>