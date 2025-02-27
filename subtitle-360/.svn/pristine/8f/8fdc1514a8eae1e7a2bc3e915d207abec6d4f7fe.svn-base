<?php
/**
 * @package Subtitle 360
 * @version 2.0
 */
/*
Plugin Name: Subtitle 360
Plugin URI: http://wordpress.org/extend/plugins/subtitle-360/
Description: This plugin is used to create subtitle for pages and post. Now ou can use the subtitle on your page. If you have a big tagline for each page here is the solution.
Author: Hasanul Banna
Version: 2.0
Author URI: http://coregenie.com/
*/
?>
<?php    
    add_action( 'admin_menu', 'my_create_post_meta_box' );
    add_action( 'save_post', 'my_save_post_meta_box', 10, 2 );

function my_create_post_meta_box() {
    add_meta_box( 'my-meta-box', 'Post Sub Title', 'my_post_meta_box', 'post', 'normal', 'high' );
    add_meta_box( 'my-meta-box', 'Page Sub Title', 'my_post_meta_box', 'page', 'normal', 'high' );
}

function my_post_meta_box( $object, $box ) { ?>
    <div id="postcustomstuff">
    <p>
    
        <label>Please enter sub title:</label>
        <input name="page_sub_title" id="sw_title" style="width: 97%;" value="<?php echo esc_html( get_post_meta( $object->ID, 'page_sub_title', true ), 1 ); ?>" />
        <input type="hidden" name="my_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
    </p>
    </div>
<?php }

function my_save_post_meta_box( $post_id, $post ) {

    if ( !wp_verify_nonce( $_POST['my_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
        return $post_id;

    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;

    //Saving 1st Data
    
    $meta_value = get_post_meta( $post_id, 'page_sub_title', true );
    $new_meta_value = stripslashes( $_POST['page_sub_title'] );

    if ( $new_meta_value && '' == $meta_value )
        add_post_meta( $post_id, 'page_sub_title', $new_meta_value, true );

    elseif ( $new_meta_value != $meta_value )
        update_post_meta( $post_id, 'page_sub_title', $new_meta_value );

    elseif ( '' == $new_meta_value && $meta_value )
        delete_post_meta( $post_id, 'page_sub_title', $meta_value ); 
}
function the_subtitle() {
		global $post;
		echo '<h4 class="subtitle_head">';
		echo get_post_meta($post->ID, 'page_sub_title', true);
		echo '</h4>';
}
?>