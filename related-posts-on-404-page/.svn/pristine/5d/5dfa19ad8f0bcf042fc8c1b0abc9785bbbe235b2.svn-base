<?php
/**
 * This file contains the 
 * helper functions for the plugin
 * 
 * PHP Version 7.4.9
 * 
 * @category   WordPress_Plugin
 * @package    Related_Posts_404
 * @subpackage Related_Posts_404/includes
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://ahmadkarim.com/
 * @since      1.0.0
 */

/**
 * Get the list of post types
 * 
 * @param boolean $builtin_only return only builtin post types
 * 
 * @return void
 */
function Rpp_getPostTypes($builtin_only = false) {

  $args = array(
    'public'   => true,
    '_builtin' => true
  );

  $builtin_types = get_post_types($args, 'objects', 'and');

  if ($builtin_only == false) {

    $args['_builtin'] = false;

    $registered_types = get_post_types($args, 'objects', 'and');

    $post_types = array_merge($builtin_types, $registered_types);

  } else {

    $post_types = $builtin_types;

  }

  $types = array();

  foreach ($post_types as $key => $value) {

    $types[$key] = $value->labels->singular_name;

  }

  return $types;

}

/**
 * Validate the post types that were 
 * saved to be searched related posts from
 */
function Rpp_validate_post_types() {

  $RelatedPosts404 = new Rpp_RelatedPosts404();

  $RelatedPosts404::validatePostTypes();

}

/**
 * Include a template file
 * 
 * @param string $inc file path relative to the plugin base directory
 * @param array  $args Variables to be available on the file
 * 
 * @return null
 */
function Rpp_inc($inc, $args = array()) {

  if( is_array($args) && count($args) > 0 ) {

    extract($args);

  }

  include Rpp_dir($inc);

}

/**
 * Save a log file in plugin logs directory
 * 
 * @param string $filename File name
 * @param string $data Content to be logged
 * 
 * @return void
 */
function Rpp_log($filename, $data) {

  $data = is_array($data) || is_object($data) ? json_encode($data) : $data;

  file_put_contents(Rpp_dir("logs/{$filename}.txt"), $data);

}

function Rpp_buy_coffee() {

  Rpp_inc('admin/partials/buy-coffee-button.php');

}


