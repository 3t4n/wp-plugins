<?php
function mlgm_custom_post_location() {
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
add_action('init', 'mlgm_custom_post_location');

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
    add_meta_box('mlgm-meta-box-id', 'Address Setting', 'mlgm_meta_box', 'mlgm', 'normal', 'high' );
}

function mlgm_meta_box()
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    // We'll use this nonce field later on when saving.
    wp_nonce_field('mlgm_meta_box_nonce', 'meta_box_nonce');
    ?>
    <p>
        <label for="address"><?php _e('Address :','mlgm'); ?></label>
        <input size="60" class="yds-map-input" type="text" name="yds_address" id="yds_address" value="<?php if(get_post_meta($post->ID, 'yds_address', true)){echo get_post_meta($post->ID, 'yds_address', true);} ?>" />
    </p>
 
    <?php    
}

add_action( 'save_post', 'map_meta_box_save' );
function map_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'mlgm_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['yds_address']))
     update_post_meta( $post_id, 'yds_address', wp_kses( $_POST['yds_address'], $allowed ) );
 
}
?>