<?php 

function cyber_slider_admin_footer_cb(){
?>
<div id="dialog-confirm" title="Delete Slider?" style = "display : none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><?php _e('Are you sure?You Want To Delete This Slider.');?></p>
</div>
<?php
}

add_action('admin_footer','cyber_slider_admin_footer_cb');

function cyber_slider_media() {
    $mode = get_user_option( 'media_library_mode', get_current_user_id() ) ? get_user_option( 'media_library_mode', get_current_user_id() ) : 'grid';
    $modes = array( 'grid', 'list' );
    if ( isset( $_GET['mode'] ) && in_array( $_GET['mode'], $modes ) ) {
        $mode = $_GET['mode'];
        update_user_option( get_current_user_id(), 'media_library_mode', $mode );
    }
    if( ! empty ( $_SERVER['PHP_SELF'] ) && 'upload.php' === basename( $_SERVER['PHP_SELF'] ) && 'grid' !== $mode ) {
        wp_enqueue_script( 'media' );
    }
        wp_enqueue_media();
    }
add_action('admin_enqueue_scripts', 'cyber_slider_media');