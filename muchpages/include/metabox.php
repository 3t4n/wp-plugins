<?php

/**
 * Adds a meta box to the post editing screen
 */
add_action( 'add_meta_boxes', 'muchpages_metabox_3_add' );
function muchpages_metabox_3_add() {
    add_meta_box( 'muchpages_metabox_3', __( 'MuchPages', 'muchpages' ), 'muchpages_metabox_3_callback', 'page', 'side' );
}

/**
 * Outputs the content of the meta box
 */
function muchpages_metabox_3_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
?>
<div class="post_background_div">
    <p>Enter the ID of your page at MuchPages.</p>
    <p><strong>Example:</strong> <span style="color:red">333Y-V07H-NCWU-1GJE</span></p>
    <input type="text" name="muchpages-access-id" id="muchpages-access-id" value="<?php if ( isset ( $prfx_stored_meta['muchpages-access-id'] ) ) { echo $prfx_stored_meta['muchpages-access-id'][0]; } ?>" style="width:100%" />
</div>
<?php
}

/**
 * Saves the custom meta input
 */
add_action( 'save_post', 'muchpages_metabox_3_save' );
function muchpages_metabox_3_save( $post_id ) {
 
    /* Checks save status */
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    /* Exits script depending on save status */
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    /* Checks for input and sanitizes/saves if needed */
    if( isset( $_POST[ 'muchpages-access-id' ] ) ) {
        update_post_meta( $post_id, 'muchpages-access-id', sanitize_text_field( $_POST[ 'muchpages-access-id' ] ) );
    }
    
}