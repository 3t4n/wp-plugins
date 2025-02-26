<table class="form-table">
    <tbody>
    <tr class="form-field term-description-wrap">
        <th scope="row"><label for="description"><?php _e( 'Store Image', 'affiliate-coupon-lite'); ?></label></th>
        <td><div class="cp-term-image" id="preview-term-image">
                <img src="<?php echo esc_url(get_term_meta($term->term_id,'cp_store_image', true  ));?>" style="width: 100px;">
            </div></td>
        <td><?php wp_nonce_field( 'coupon-plugin-term-nonce', 'coupon-plugin-term-nonce' );?>
            <input type="button" value="Upload Store Image" id="cp-store-image" class="button button-secondary">
            <input type="hidden" name="cp_store_image" id="cp_store_image" value="<?php echo esc_url(get_term_meta($term->term_id,'cp_store_image', true  ));?>"/>
            <p class="description"><?php _e( 'Upload Store Image Like Image of Amazon.com etc. Please maintain size in 250*100 scale', 'affiliate-coupon-lite'); ?></p>
        </td>
    </tr>
    </tbody>
</table>