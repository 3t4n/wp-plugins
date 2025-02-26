<?php

/**
 * Plugin Name: Add Template for Contact Form 7
 * Plugin URI: https://matorel.com/?p=1255
 * Description: This plugin adds a template function to "Contact Form 7" using a template file.
 * Version: 1.0.3
 * Author: matorel
 * License: GPL2
 * Text Domain: add-template-for-contact-form-7
 * Domain Path: /languages/
 *
 */


/* Copyright 2021- matorel (email: info@matorel.com)
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.


*/

defined('ABSPATH') || exit;

define('ATCF7_VERSION', '1.0.3');
define('ATCF7_PATH', plugin_dir_path(__FILE__));
define('ATCF7_URL', plugins_url('/', __FILE__));

// require_once ATCF7_PATH . 'plugin-update-checker/plugin-update-checker.php';
// $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
//     'https://wp-avenue.com/plugin_file/add-template-for-contact-form-7/plugin.json',
//     __FILE__,
//     'add-template-for-contact-form-7'
// );



function myplugin_load_textdomain()
{
  load_plugin_textdomain(
    'add-template-for-contact-form-7',
    false,
    dirname(plugin_basename(__FILE__)) . '/languages'
  );
}

add_action('plugins_loaded', 'myplugin_load_textdomain', 11);

if (!class_exists('ATCF7')) {
  exit;
}

class ATCF7
{

  function __construct()
  {
    add_action('wp_enqueue_scripts', array($this, 'load_scripts_and_styles'));
    add_filter('wpcf7_contact_form_property_form',  array($this, 'replace_front_to_template'), 90, 2);
    add_filter('wpcf7_editor_panels', array($this, 'add_wpcf7_panel'));
    add_action('save_post', array($this, 'save_wpcf7_custom_fields'));
  }

  function load_wpcf7_template($path)
  {
    ob_start();
    include $path;
    return ob_get_clean();
  }

  function replace_front_to_template($propertie, $cp7)
  {
    $templateFile = get_post_meta($cp7->id(), 'custom_template_file', true);

    if ($templateFile) {
      if ($templateFile === "atcf7-default-template") {
        $templatePath = ATCF7_PATH . "atcf7-sample-template.php";
      } else {
        $templatePath = get_stylesheet_directory() . '/atcf7/' . $templateFile;
      }
      if (file_exists($templatePath)) {
        $template = $this->load_wpcf7_template($templatePath);
        $propertie = $template;
      }
    }
    return $propertie;
  }


  function add_wpcf7_panel($panels)
  {
    echo "<p>" . esc_html_e('If you have set a template file, you cannot change the form from the management screen.', 'add-template-for-contact-form-7') . "</p>";
    $panels['custom-fields'] = array(
      'title' => __('Template file', 'add-template-for-contact-form-7'),
      'callback' => 'atcf7_add_wpcf7_panel_content',
    );
    return $panels;
  }

  function save_wpcf7_custom_fields($post_id)
  {
    if (array_key_exists('wpcf7-template-file', $_POST)) {
      update_post_meta(
        $post_id,
        'custom_template_file',
        sanitize_text_field($_POST['wpcf7-template-file'])
      );
    }
  }

  function load_scripts_and_styles()
  {
    /** JS */
    // wp_enqueue_script(
    //   'atcf7-script',
    //   ATCF7_URL . 'assets/index.js',
    //   array('wp-element'),
    //   ATCF7_VERSION,
    //   true
    // );

    /** CSS */
    wp_enqueue_style(
      'atcf7-style',
      ATCF7_URL . 'assets/style.css',
      array(),
      ATCF7_VERSION
    );
  }
}

$ATCF7 = new ATCF7;


function atcf7_get_file_description($file)
{
  global $wp_file_descriptions, $allowed_files;

  $dirname   = pathinfo($file, PATHINFO_DIRNAME);
  if (isset($wp_file_descriptions[basename($file)]) && '.' === $dirname) {
    return $wp_file_descriptions[basename($file)];
  } elseif (file_exists($file) && is_file($file)) {
    $template_data = implode('', file($file));
    if (preg_match('|Template Name:(.*)$|mi', $template_data, $name)) {
      return _cleanup_header_comment($name[1]);
    }
  }

  return trim(basename($file));
}

function atcf7_add_wpcf7_panel_content($cp7)
{
  $value = get_post_meta($cp7->id(), 'custom_template_file', true);
  $files = glob(get_stylesheet_directory() . '/atcf7/*.php');

  $fileList = array();
  foreach ($files as $file) {
    $fileList[] = array(
      "file" => $file,
      "name" => atcf7_get_file_description($file)
    );
  }
  array_unshift($fileList,  array(
    "file" => "atcf7-default-template",
    "name" => atcf7_get_file_description(ATCF7_PATH . "sample.php")
  ));
?>
  <h2><?php echo esc_html_e('Template selection', 'add-template-for-contact-form-7'); ?></h2>
  <fieldset>
    <p><?php echo esc_html_e('Select if your theme contains a template file (PHP file in the atcf7 directory).', 'add-template-for-contact-form-7'); ?><br><strong><?php echo esc_html_e('The contents of the current form will be overwritten.', 'add-template-for-contact-form-7'); ?></strong></p>
    <select name="wpcf7-template-file" id="wpcf7-template-file" class="postbox">
      <option value=""><?php echo esc_html_e('File selection', 'add-template-for-contact-form-7'); ?></option>
      <?php
      foreach ($fileList as $file) : ?>
        <option value="<?php echo esc_html(basename($file["file"])); ?>" <?php selected($value, basename($file["file"])); ?>><?php echo esc_html(basename($file["name"])); ?></option>
      <?php endforeach; ?>
    </select>
  </fieldset>
<?php
}
