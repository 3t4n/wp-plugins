<?php
    $variation_key = ! is_null( get_post( $variation_id ) ) ? $variation_id : $loop;
?>
<tr>
    <td class="file_name">
        <div class="control">
            <input type="text" class="input_text" placeholder="<?php esc_attr_e( 'File name', 'wc-vendors' ); ?>"
                    name="_wc_variation_file_names[<?php echo esc_attr( $variation_key ); ?>][]"
                    value="<?php echo esc_attr( $file['name'] ); ?>"/>
        </div>
    </td>
    <td class="file_url">
        <div class="control">
            <input type="text" class="file_url" name="_wc_variation_file_urls[<?php echo esc_attr( $variation_key ); ?>][]"
                    value="<?php echo esc_attr( $file['file'] ); ?>"/>
            <input type="hidden" class="file_id" name="_wc_variation_file_ids[<?php echo esc_attr( $variation_key ); ?>][]"
                    value="<?php echo esc_attr( $file_id ); ?>"/>
        </div>
    </td>

    <td class="file_url_choose" width="1%">
        <a href="#" class="button upload_file_button"
                    data-choose="<?php esc_attr_e( 'Choose file', 'wc-vendors' ); ?>"
                    data-update="<?php esc_attr_e( 'Insert file URL', 'wc-vendors' ); ?>">
                    <?php echo esc_attr( str_replace( ' ', '&nbsp;', __( 'Choose file', 'wc-vendors' ) ) ); ?>
        </a>
    </td>
    <td width="1%">
        <a href="#" class="delete">
            <svg class="wcv-icon wcv-icon-md">
                <use xlink:href="<?php echo WCV_ASSETS_URL; //phpcs:ignore ?>svg/wcv-icons.svg#wcv-icon-times"></use>
            </svg>
        </a>
    </td>
</tr>
