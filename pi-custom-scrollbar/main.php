<?php
/*
Plugin Name:  Pi Custom ScrollBar
Plugin URI:   https://theimran.com/pi-custom-scrollbar
Description:  Easy to use custom scrollbar plugins
Version:      1.0.0
Author:       Abdullah Al Imran
Author URI:   http://theimran.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  pi
*/

/**
* Pi Custom Scrollbar Class
*/

define('PI_DIRECTORY', plugin_dir_url(__file__));

if (file_exists(dirname(__file__) . '/inc/class.settings-api.php')) {
    require_once dirname(__file__) . '/inc/class.settings-api.php';
}
if (file_exists(dirname(__file__) . '/inc/oop-example.php')) {
    require_once dirname(__file__) . '/inc/oop-example.php';
}
$pi_settings_api = new Pi_setting_api_options;
function pi_scrollbar_data($option, $section, $default = '')
{

    $options = get_option($section);

    if (isset($options[$option])) {
        return $options[$option];
    }

    return $default;
}

add_action('wp_enqueue_scripts', 'pi_enqueue_scripts');
function pi_enqueue_scripts()
{
    wp_enqueue_script('pi-custom-scrollbar', PI_DIRECTORY . 'inc/js/jquery.nicescroll.js', array('jquery'), ' ', false);
}
add_action('wp_head', 'plgins_customization', 9999);
function plgins_customization()
{
    ?>
<script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery('html').niceScroll({
            zindex: 9999,
            cursoropacitymin:1,
            cursorcolor: "<?php echo esc_attr(pi_scrollbar_data('color_picker', 'pi_custom_scrollbar_options'));?>",
            cursorwidth: "<?php echo esc_attr(pi_scrollbar_data('cursorwidth', 'pi_custom_scrollbar_options')); ?>",
            cursorborder: "<?php echo esc_attr(pi_scrollbar_data('cursorborder', 'pi_custom_scrollbar_options')); ?>",
            cursorborderradius: "<?php echo esc_attr(pi_scrollbar_data('cursorborder_redious', 'pi_custom_scrollbar_options')); ?>",
            scrollspeed: "<?php echo esc_attr(pi_scrollbar_data('scrolling_speed', 'pi_custom_scrollbar_options')); ?>",
        });

    });
</script>
<?php
}
