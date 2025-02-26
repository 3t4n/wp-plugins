<?php
/*
 * Plugin Name: Auto Image Description Generator
 * Plugin URI:  https://wordpress.org/plugins/auto-image-description-generator/
 * Description: This plugin provides a feature to generate the Alt, Title, Caption, and Description of the images dynamically.
 * Version:     2.4
 * Author:      Galaxy Weblinks
 * Author URI:  https://www.galaxyweblinks.com/
 * Text Domain: autoimage
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if (!defined('ABSPATH')) {
  exit; // disable direct access
}

/**
 * Add Plugin links on Plugin page
 * @staticvar type $plugin
 * @param array $actions
 * @param array $plugin_file
 * @return array
 */
function gwl_autoimage_add_action_plugin_links($actions, $plugin_file) {   
    if (!isset($plugin))
        $plugin = plugin_basename(__FILE__);
    if ($plugin == $plugin_file) {
        $settings = array('settings' => '<a href="' . esc_url(admin_url('admin.php?page=gwl-autoimage-settingpage')) . '">' . __('Settings', 'autoimage') . '</a>');
        $actions = array_merge($actions, $settings);
    }
    return $actions;
}

add_filter( 'plugin_action_links', 'gwl_autoimage_add_action_plugin_links', 15, 6 );


/**
 * Enqueue Scripts for the Admin Area
 *
 * This function enqueues scripts for the WordPress admin area, specifically for the post edit screens.
 * It checks the current admin page hook to determine if the scripts should be enqueued.
 * It also localizes script data to pass PHP variables to JavaScript.
 *
 * @param string $hook The current admin page hook.
 * @since 1.0.0
 */
if (!function_exists('gwl_autoimage_editor_enqueue_script')) {
  function gwl_autoimage_editor_enqueue_script($hook)
  {
    $screen = get_current_screen();
    if ( 'toplevel_page_gwl-autoimage-settingpage' === $screen->base){
      wp_enqueue_style('gwl_autoimage-admin-style', plugin_dir_url(__FILE__) . 'admin/assets/css/auto-image-description-admin-styles.css', array(), '1.0', 'all');
    }
  }
}
add_action('admin_enqueue_scripts', 'gwl_autoimage_editor_enqueue_script');


/**
 * You can use these filters to add custom links to your plugin row in the plugin list.
 * @param $links, $file
 * @return $links [array]
 * @since 1.0.0
 */
if (! function_exists('gwl_autoimage_add_custom_plugin_links')) {
  function gwl_autoimage_add_custom_plugin_links($links, $file)
  {
      if (!isset($plugin)){
          $plugin = plugin_basename(__FILE__);
      }

      if ($plugin == $file) {
          $links[] = '<a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/auto-image-description-generator/doc/" target="_blank">Documentation</a>';
          $links[] = '<a href="https://wp-plugins.galaxyweblinks.com/contact/" target="_blank">Contact Support</a>';
      }
      return $links;
  }
}
add_filter('plugin_row_meta', 'gwl_autoimage_add_custom_plugin_links', 10, 2);

/**
 * Adding backend option pages
 *
 * @return void
 */
function gwl_autoimage_admin_option_page() {
  $page_title = __('Auto Image Description Generator', 'autoimage');
  $menu_title = __('Auto Image Description Generator', 'autoimage');
  $capability = 'manage_options';
  $menu_slug = 'gwl-autoimage-settingpage';
  $function = 'gwl_autoimage_option_page_display';
  $icon_url = '';
  $position = 40;
  add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
}

add_action('admin_menu', 'gwl_autoimage_admin_option_page');

/**
 * Display the gwl auto image description setting page
 * @return void
 */
function gwl_autoimage_option_page_display() {
  // check user capabilities
  if (!current_user_can('manage_options')) {
    return;
  }
  include('admin/includes/auto-image-description-option-page.php');
}

/**
 * Print the Section text
 */
function gwl_autoimage_print_section_info() { ?>
  <h4>Choose the desire option as below:</h4>
<?php }

/**
 * Initializing the settings
 *
 * @return void
 */
function gwl_autoimage_setting_init() {

  $setting_page = 'gwl-autoimage-settingpage';
  $section_id = 'gwl_autoimage_setting_section_id';
  $args = array(
    'type' => '',
    'description' => '',
    'sanitize_callback' => 'gwl_autoimage_sanitize',
    // 'show_in_rest' => null 
  );
  register_setting(
    'gwl_autoimage_option_group', // Option group
    'gwl_autoimage_settings', // Option name
    'gwl_autoimage_sanitize'  // Sanitize
  );
  add_settings_section(
    'gwl_autoimage_setting_section_id', // ID
    __('Auto Image Description Generator Section', 'autoimage'), // Title
    'gwl_autoimage_print_section_info', // Callback
    'gwl-autoimage-settingpage' // Page
  );

  add_settings_field(
    'caption', // ID
    __('Disable Caption?', 'autoimage'), // Title 
    'gwl_autoimage_caption_callback', // Callback
    'gwl-autoimage-settingpage', // Page
    'gwl_autoimage_setting_section_id'  // Section           
  );

  add_settings_field(
    'description', // ID
    __('Disable Description?', 'autoimage'), // Title 
    'gwl_autoimage_description_callback', // Callback
    'gwl-autoimage-settingpage', // Page
    'gwl_autoimage_setting_section_id'  // Section           
  );
}

add_action('admin_init', 'gwl_autoimage_setting_init');

/**
 * Sanitize the input data of settings 
 *
 * @param  array $input
 * @return array $gwl_autoimage_input
 */
function gwl_autoimage_sanitize($input) {
  $gwl_autoimage_input = array();
  
  if (isset($input['caption'])) {
    $gwl_autoimage_input['caption'] = sanitize_text_field($input['caption']);
  }

  if (isset($input['description'])) {
    $gwl_autoimage_input['description'] = sanitize_text_field($input['description']);
  }

  return $gwl_autoimage_input;
}


/**
 * Caption field html callback
 *
 * @return void
 */
function gwl_autoimage_caption_callback() {
  $options = get_option('gwl_autoimage_settings');
  $caption = isset($options['caption']) ? $options['caption'] : ''; ?>

  <select id="caption" name="gwl_autoimage_settings[caption]">
      <option  value="no" <?php selected( esc_attr($caption), 'no' ); ?>><?php esc_html_e('No', 'autoimage'); ?></option>
      <option value="yes" <?php selected( esc_attr($caption), 'yes' ); ?>><?php esc_html_e('Yes', 'autoimage'); ?></option>
  </select>

<?php
}

/**
 * Description html callback
 *
 * @return void
 */
function gwl_autoimage_description_callback() {
  $options = get_option('gwl_autoimage_settings'); 
  $description = isset($options['description']) ? $options['description'] : ''; ?>

  <select id="description" name="gwl_autoimage_settings[description]">
    <option  value="no" <?php selected( esc_attr($description), 'no' ); ?>><?php esc_html_e('No', 'autoimage'); ?></option>
      <option value="yes" <?php selected( esc_attr($description), 'yes' ); ?>><?php esc_html_e('Yes', 'autoimage'); ?></option>
  </select>

<?php }

/**
 * Set the Image description
 *
 * @param  int $post_ID
 * @return void
 */
function gwl_set_image_meta_upon_image_upload($post_ID) {

  // Get the options value
  $autoimage_options = get_option('gwl_autoimage_settings');

  // Check if uploaded file is an image, else do nothing
  if (wp_attachment_is_image($post_ID)) {
    $gwl_image_title = get_post($post_ID)->post_title;

    // Sanitize the title:  remove hyphens, underscores & extra spaces:
    $gwl_image_title = preg_replace('%\s*[-_\s]+\s*%', ' ',  $gwl_image_title);

    // Sanitize the title:  capitalize first letter of every word (other letters lower case):
    $gwl_image_title = ucwords(strtolower($gwl_image_title));

    // Create an array with the image meta (Title, Caption, Description) to be updated

    $gwl_image_meta = array(
      'ID'    => $post_ID,      // Specify the image (ID) to be updated
      'post_title'  => $gwl_image_title,    // Set image Title to sanitized title      
    );

    (isset($autoimage_options['caption']) && ($autoimage_options['caption'] !== 'yes')) ? $gwl_image_meta['post_excerpt'] = $gwl_image_title : ''; // Set image Caption (Excerpt) to sanitized title

    (isset($autoimage_options['description']) && ($autoimage_options['description'] !== 'yes')) ? $gwl_image_meta['post_content'] = $gwl_image_title : ''; // Set image Description (Content) to sanitized title

    // Set the image Alt-Text
    update_post_meta($post_ID, '_wp_attachment_image_alt', $gwl_image_title);       

    // Set the image meta (e.g. Title, Excerpt, Content)
    wp_update_post($gwl_image_meta);
  }
}
add_action('add_attachment', 'gwl_set_image_meta_upon_image_upload');
