<?php
/**
 * Plugin Name: Autocorrect
 * Plugin URI: https://wordpress.org/plugins/Autocorrect/
 * Description: Autocorrect is a free wordpress plugin for correcting your typeos as you type.
 * Version: 1.0
 * Author: aviket
 * License: GPL2
 */
global $pagenow;

define('AUTOCORRECTPLUGIN_FILE', __FILE__);
define('AUTOCORRECTPLUGIN_PATH', dirname(AUTOCORRECTPLUGIN_FILE));

include AUTOCORRECTPLUGIN_PATH . DIRECTORY_SEPARATOR . 'AutocorrectSettings.php';
new AutocorrectSettings();





if (( $pagenow == 'post.php' ) && ($_GET['post_type'] == 'page')) {

    // editing a page
}

if ($pagenow == 'users.php') {

    // user listing page
}

if (($pagenow == 'post-new.php') || ($pagenow == 'post.php')) {

    $resultpluginautocorrect = get_option('Autocorrect-Settings');
    ?>
    <script>

        var val1 = "<?php echo $resultpluginautocorrect ?>";

    </script>
    <?php
    wp_enqueue_script('ascript', plugin_dir_url(__FILE__) . '/js/strt.js', array('jquery'), '', true);
    wp_enqueue_script('bscript', plugin_dir_url(__FILE__) . '/js/jquery.correctme.js', array('jquery'), '', true);
}
