<?php
/**
 * Plugin Name: Autocomplete
 * Plugin URI: https://wordpress.org/plugins/Autocomplete/
 * Description: Autocomplete is a free wordpress plugin for showing autocomplete widget for the post author
 * Version: 1.0
 * Author: aviket
 * License: GPL2
 */
global $pagenow;

define('AUTOCOMPLETEPLUGIN_FILE', __FILE__);
define('AUTOCOMPLETEPLUGIN_PATH', dirname(AUTOCOMPLETEPLUGIN_FILE));
require(AUTOCOMPLETEPLUGIN_PATH . DIRECTORY_SEPARATOR . 'AutocompleteSettings.php');

new AutocompleteSettings();


if (( $pagenow == 'post.php' ) && ($_GET['post_type'] == 'page')) {

    // editing a page
}

if ($pagenow == 'users.php') {

    // user listing page
}

if (($pagenow == 'post-new.php') || ($pagenow == 'post.php')) {

    $resultpluginautocomplete = get_option('Autocomplete-Settings')['words'];
    ?>
    <script>

        var val1 = "<?php echo $resultpluginautocomplete ?>";

    </script>
    <?php
    wp_enqueue_script('jquery');
    wp_enqueue_script('ascript', plugin_dir_url(__FILE__) . '/js/strt.js', array('jquery'), '', true);
    wp_enqueue_script('bscript', plugin_dir_url(__FILE__) . '/js/jquery.textcomplete.js', array('jquery'), '', true);
	wp_enqueue_style('bstyle', plugin_dir_url(__FILE__) . '/css/autocompletestyle.css');
	



    //wp_enqueue_script('bscript');
    //wp_enqueue_script('ascript');
}