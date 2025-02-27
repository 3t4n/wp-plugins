<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly
}
//Roll & Capability
if(!get_role('multiple-location-google-map')){
	add_role('multiple-location-google-map', 'Support Agent');
}
$role = get_role('multiple-location-google-map' );
$role->add_cap('read' );
$role = get_role('administrator' );
$role->add_cap('manage_location_google_map');

function mlgm_address_location_mark(){
  $labels = array(
    'name'               => _x( 'Multiple Location Google Map', 'post type general name','mlgm'),
    'singular_name'      => _x( 'Location', 'post type singular name','mlgm'),
    'add_new'            => _x( 'Add New', 'location','mlgm'),
    'add_new_item'       => __( 'Add New Location','mlgm'),
    'edit_item'          => __( 'Edit Location','mlgm'),
    'new_item'           => __( 'New Location','mlgm'),
    'all_items'          => __( 'All Location','mlgm'),
    'view_item'          => __( 'View Location','mlgm'),
    'search_items'       => __( 'Search Multiple Location Google Map','mlgm'),
    'not_found'          => __( 'No Multiple Location Google Map found','mlgm'),
    'not_found_in_trash' => __( 'No Multiple Location Google Map found in the Trash','mlgm'), 
    'menu_name'          => 'MLGM'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Holds your Multiple Location Google Map and Location specific data',
    'public' => true,
    'menu_position' => 5,
	'menu_icon' => 'dashicons-location-alt',
    'supports' => array('title', 'editor', 'thumbnail'),
    'has_archive' => true,
	
  );
  register_post_type('mlgm', $args); 
}
add_action('init', 'mlgm_address_location_mark');

add_action('add_meta_boxes', 'mlgm_extra_fields_add');
function mlgm_extra_fields_add()
{
    add_meta_box('mlgm-extra-fields-id', 'Address Setting', 'mlgm_extra_fields', 'mlgm', 'normal', 'high');
}

function mlgm_extra_fields()
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    // We'll use this nonce field later on when saving.
    wp_nonce_field('mlgm_extra_fields_nonce', 'mlgm_extra_nonce');
    ?>
    <p>
        <label for="address"><?php _e('Address :','mlgm'); ?></label>
        <input size="60" class="mlgm-map-input" type="text" name="mlgm_address" id="mlgm_address" value="<?php if(get_post_meta($post->ID, 'mlgm_address', true)){echo get_post_meta($post->ID, 'mlgm_address', true);} ?>" />
    </p>
 
    <?php    
}

add_action('save_post', 'mlgm_fields_values_save');
function mlgm_fields_values_save($post_id)
{
    // Bail if we're doing an auto save
    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['mlgm_extra_nonce'] ) || !wp_verify_nonce( $_POST['mlgm_extra_nonce'], 'mlgm_extra_fields_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['mlgm_address']))
     update_post_meta( $post_id, 'mlgm_address', wp_kses( $_POST['mlgm_address'], $allowed ) );
 
}
?>