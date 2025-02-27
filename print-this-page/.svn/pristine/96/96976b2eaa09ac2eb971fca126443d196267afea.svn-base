<?php
/*
Plugin Name: 🖨 Print
Plugin URI: https://store.devilhunter.net/wordpress-plugin/print-this-page/
Description: Add theme matching “🖨 Print” button in sidebar, footer, page or post. This Plugin will automatically match your Theme's CSS style. Go to Appearance > Widgets, and drag My Widget in sidebar or footer or into any widgetized area. Insert into page or post by Page Builder, or by Shortcode [printthispage_tawhidurrahmandear_widget] 
Version: 3.0
Author: Tawhidur Rahman Dear
Author URI: https://www.tawhidurrahmandear.com
Requires at least: 5.5
Requires PHP: 7.4
License: GPLv2 or later
Text Domain: print-this-page
 */


 // Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}
//

function printthispage_by_tawhidurrahmandear_links($plugin_meta, $plugin_file) {
    if ($plugin_file === plugin_basename(__FILE__)) {
        $new_links = array(
            '<a href="https://store.devilhunter.net/wordpress-plugin/print-this-page" target="_blank">Introduction to Plugin with Documentation</a>',
            '<a href="https://wordpress.org/plugins/print-this-page/#reviews" target="_blank">Rate and Review at WordPress.org</a>',
            '<a href="https://itsolution.devilhunter.net" target="_blank">Hire for WordPress Web Development</a>',
        );

        // Add the new links to the existing array of links
        $plugin_meta = array_merge($plugin_meta, $new_links);
    }
    return $plugin_meta;
}
add_filter('plugin_row_meta', 'printthispage_by_tawhidurrahmandear_links', 10, 2);


// The Plugin
class DSprintthispageByTawhidurRahmanDear extends WP_Widget {
    public function __construct() {
        $plugin_name = $this->get_plugin_name();
        parent::__construct(
            'printthispage_by_tawhidurrahmandear',
            $plugin_name,
            array('description' => sprintf(__('Drag Print button in sidebar or footer or into any widgetized area', 'print-this-page'), $plugin_name))
        );
    }
    private function get_plugin_name() {
        if (!function_exists('get_plugin_data')) {
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        $plugin_data = get_plugin_data(__FILE__);
        return isset($plugin_data['Name']) ? esc_html($plugin_data['Name']) : '';
    }

    // Outputs the widget form in the admin dashboard
    public function form($instance) {
        ?>
        <p>
            <?php esc_html_e('You can also use Shortcode [printthispage_tawhidurrahmandear_widget] or Page Builder', 'print-this-page'); ?>
        </p>
        <?php
    }

    // Output adjustment for front-end
    public function widget($args, $instance) {
        $args['before_widget'] = '';
        $args['after_widget'] = '';
        // Custom HTML
        echo get_printthispage_widget_content();
    }
}

// Shared Content for both Widget and Shortcode
function printthispagetawhidurrahmandear_script() {
    ?>
<!-- Widget Code Begins -->
<center>
<style>
.Print_this_page {
  display: block;
  width: 90%;
  border-radius: 10px;
  padding: 15px 30px;
  text-align: center;
  white-space: normal;
  word-wrap: break-word;
}
</style>
<script>
//from Tawhidur Rahman Dear
var message = "🖨 Print";
function printpage() {
window.print(); 
}
document.write("<form><input type=button class=Print_this_page "
+"value=\""+message+"\" onClick=\"printpage()\"></form>");
</script>
</center>
<!-- Widget Code Ends -->
    <?php
}

// Widget output
function get_printthispage_widget_content() {
    ob_start();
    ?>
	<center>
    <div class="printthispagetawhidurrahmandear">
        <?php printthispagetawhidurrahmandear_script(); ?>
    </div>
	</center>
    <?php
    return ob_get_clean();
}

// Register the widget
function register_printthispage_by_tawhidurrahmandear() {
    register_widget('DSprintthispageByTawhidurRahmanDear');
}
add_action('widgets_init', 'register_printthispage_by_tawhidurrahmandear');

// Inline Shortcode function for inline usage
function printthispagetawhidurrahmandear_shortcode() {
    ob_start();
    printthispagetawhidurrahmandear_script(); 
    return ob_get_clean();
}

// Register the shortcode
add_shortcode('printthispage_tawhidurrahmandear_widget', 'printthispagetawhidurrahmandear_shortcode');