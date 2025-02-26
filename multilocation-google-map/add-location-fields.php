<?php

function mgm_add_metabox()   {
    add_meta_box(
        'mgm_meta',
        'Location',
        'mgm_meta_callback',
        'location',
        'normal',
        'core'
    );
}

add_action('add_meta_boxes', "mgm_add_metabox");

function mgm_meta_callback($post)    {
    wp_nonce_field( basename( __FILE__ ), 'mgm_locations_nonce' );
    $mgm_stored_meta = get_post_meta( $post->ID );
    ?>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="latitude_id" class="mgm-row-title">Latitude - enter here your latitude GPS coordinates.</label>
            </div>
            <div class="meta-td">
                <input type="number" step="any" name="latitude_id" id="latitude-id" style='width: 100%' value="<?php if ( ! empty ( $mgm_stored_meta['latitude_id'] ) ) {
					echo esc_attr( $mgm_stored_meta['latitude_id'][0] );
				} ?>"/>
            </div>
            <?php
            if (!empty($mgm_stored_meta['latitude_id'])) {
                if(preg_match("/[a-z]/i", esc_attr( $mgm_stored_meta['latitude_id'][0] ))){
                    echo '<div style="padding-top: 5px;font-size: 18px;color: red;">(Must be number/float!)</div>';
                }
            }
            ?>
        </div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="longitude_id" class="mgm-row-title">Longitude - enter here your latitude GPS coordinates.</label>
            </div>
            <div class="meta-td">
                <input type="number" step="any" name="longitude_id" id="longitude-id" style='width: 100%' value="<?php if ( ! empty ( $mgm_stored_meta['longitude_id'] ) ) {
                    echo esc_attr( $mgm_stored_meta['longitude_id'][0] );
                } ?>"/>
            </div>
            <?php
            if (!empty($mgm_stored_meta['longitude_id'])) {
                if(preg_match("/[a-z]/i", esc_attr( $mgm_stored_meta['longitude_id'][0] ))){
                    echo '<div style="padding-top: 5px;font-size: 18px;color: red;">(Must be number/float!)</div>';
                }
            }
            ?>
        </div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="description_id" class="mgm-row-title">Description</label>
            </div>
        </div>
        <div class="meta-td">
            <?php
                if ( ! empty ( $mgm_stored_meta['description_id'] ) ) {
                    $content = esc_attr( $mgm_stored_meta['description_id'][0] );
                }else {
                    $content = '';
                }
                $editor_id = 'description_id';

                wp_editor($content, $editor_id, array (
                    'textarea_rows' => 15,
                    'media_buttons' => FALSE,
                    'teeny'         => TRUE,
                    'tinymce'       => TRUE)
                );
            ?>
        </div>
    </div>

    <?php
}

function mgm_meta_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'mgm_locations_nonce' ] ) && wp_verify_nonce( $_POST[ 'mgm_locations_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'latitude_id' ] ) ) {
        update_post_meta( $post_id, 'latitude_id', sanitize_text_field( $_POST[ 'latitude_id' ] ) );
    }
    if ( isset( $_POST[ 'longitude_id' ] ) ) {
        update_post_meta( $post_id, 'longitude_id', sanitize_text_field( $_POST[ 'longitude_id' ] ) );
    }
    if ( isset( $_POST[ 'description_id' ] ) ) {
        update_post_meta( $post_id, 'description_id', sanitize_text_field( $_POST[ 'description_id' ] ) );
    }
}
add_action('save_post', 'mgm_meta_save');