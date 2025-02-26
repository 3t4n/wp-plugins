<?php
//exit if directly accessed
if (!defined('ABSPATH')) {
exit;
}?>
<?php
//function to add custom post type named Clients
function spspsp_custom_post_type()
{
  register_post_type('spspsp_client',
  array(
  'labels'      => array(
  'name'          => __('SP Clients'),
  'singular_name' => __('Client'),
  ),
  'public'      => true,
  'has_archive' => true,
  'has_category' => true,
  'taxonomies' => array('category'),
  'supports' => array('title','editor','thumbnail',),
  'rewrite'     => array( 'slug' => 'sp-clients' ), // my custom slug
  )
  );
}
add_action('init', 'spspsp_custom_post_type');
?>