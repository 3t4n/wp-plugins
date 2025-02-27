<?php

/**
 * @package Delay Redirect
 * @version 1
 */

/*

Plugin Name: Delay Redirect

Plugin URI: http://www.webcraft.gr/delay

Description: This plugin helps you to redirect a page to another within a custom delay.

Author: Vasilis Triantafyllou

Version: 1

Author URI: http://www.webcraft.gr

*/


// Run the plugin
add_action('wp_footer', 'webcraft_delay');
add_action( 'admin_menu', 'webdelay' );


function webdelay() { 

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'webdelay_red_setup' );
add_action( 'load-post-new.php', 'webdelay_red_setup' );


function webdelay_red_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'webdelay_add_post_meta_boxes' );
}


/* Create one or more meta boxes to be displayed on the post editor screen. */
function webdelay_add_post_meta_boxes() {

  add_meta_box(
    'webdelay-post-class',      // Unique ID
    esc_html__( 'Delay Redirect', 'example' ),    // Title
    'webdelay_post_class_meta_box',   // Callback function
    'post',         // Admin page (or post type)
    'side',         // Context
    'high'         // Priority
  );
  
  
   add_meta_box(
    'webdelay-post-class',      // Unique ID
    esc_html__( 'Delay Redirect', 'example' ),    // Title
    'webdelay_post_class_meta_box',   // Callback function
    'page',         // Admin page (or post type)
    'side',         // Context
    'high'         // Priority
  );
  
   
}



/* Display the post meta box. */
function webdelay_post_class_meta_box( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'webdelay_post_class_nonce' ); ?>

  <p>
   
	<p>Redirect me to<input type="url" id = "wdr_durl3" name="wdr_durl3" value="<?php echo esc_attr( get_post_meta( $object->ID, 'wdr_durl3', true ) ); ?>" size="35">
with delay of <br><input type="number"  max="9999" id = "wdr_dtime3" name="wdr_dtime3" value="<?php echo esc_attr( get_post_meta( $object->ID, 'wdr_dtime3', true ) ); ?>" size="3"> second(s)</p>
   
  </p>
<?php }



/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'webdelay_save_post_class_meta', 10, 2 );

/* Meta box setup function. */
function webdelay_post_meta_boxes_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'webdelay_add_post_meta_boxes' );

  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'webdelay_save_post_class_meta', 10, 2 );
}


/* Save the meta box's post metadata. */
function webdelay_save_post_class_meta( $wdr_post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['webdelay_post_class_nonce'] ) || !wp_verify_nonce( $_POST['webdelay_post_class_nonce'], basename( __FILE__ ) ) )
    return $wdr_post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $wdr_post_id ) )
    return $wdr_post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
 
   $new_meta_value2 = sanitize_text_field( $_POST['wdr_durl3']);
    $new_meta_value3 = sanitize_text_field( $_POST['wdr_dtime3']);

  /* Get the meta key. */
 
   $meta_key2 = 'wdr_durl3';
    $meta_key3 = 'wdr_dtime3';

  /* Get the meta value of the custom field key. */
  
   $meta_value2 = get_post_meta( $wdr_post_id, $meta_key2, true );
    $meta_value3 = get_post_meta( $wdr_post_id, $meta_key3, true );

 

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value2 && '' == $meta_value2 )
    add_post_meta( $wdr_post_id, $meta_key2, $new_meta_value2, true );


  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value2 && $new_meta_value2 != $meta_value2 )
    update_post_meta( $wdr_post_id, $meta_key2, $new_meta_value2 );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value2 && $meta_value2 )
    delete_post_meta( $wdr_post_id, $meta_key2, $meta_value2 );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value3 && '' == $meta_value3 )
    add_post_meta( $wdr_post_id, $meta_key3, $new_meta_value3, true );


  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value3 && $new_meta_value3 != $meta_value3 )
    update_post_meta( $wdr_post_id, $meta_key3, $new_meta_value3 );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value3 && $meta_value3 )
    delete_post_meta( $wdr_post_id, $meta_key3, $meta_value3 );
}





}





function webcraft_delay() {
	


  /* Get the current post ID. */
  $wdr_post_id = get_the_ID();
  $wdr_post_class2 = get_post_meta( $wdr_post_id, 'wdr_durl3', true );
  $wdr_post_class3 = get_post_meta( $wdr_post_id, 'wdr_dtime3', true );
  

if (is_singular('post')) {

   
    if ( !empty( $wdr_post_class2 ) ) {
     ?> 
<script>
setTimeout(function () {
   window.location = ( '<?php echo $wdr_post_class2; ?>'); // the redirect goes here

},<?php echo $wdr_post_class3; ?>000); // 1 seconds
</script>



<?php
  
}
}

if ( is_page())  { 
		if ( !empty( $wdr_post_class2 ) ) {
     ?> 
<script>
setTimeout(function () {
   window.location = ( '<?php echo $wdr_post_class2; ?>'); // the redirect goes here

},<?php echo $wdr_post_class3; ?>000); // 1 seconds
</script>



<?php
  
}
	} 



} ?>