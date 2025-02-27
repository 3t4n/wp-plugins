<table class="form-table">
    <tbody>
    <tr valign="top">
        <th scope="row"><?php _e( 'Popular Offer?', COUPON_PLUGIN_TEXT_DOMAIN ); ?></th>
        <td>
            <fieldset>
                <legend class="screen-reader-text">
                    <span><?php _e( 'Popular Offer?', COUPON_PLUGIN_TEXT_DOMAIN ); ?></span></legend>
                <label for="coupon_plugin_popular">
                    <input name="coupon_plugin_popular" id="coupon_plugin_popular"
                           value="1"<?php checked( get_post_meta( $post->ID, 'coupon_plugin_popular', 'true' ), 1 ); ?>
                           type="checkbox"/>
					<?php _e( 'Tick To Make It Popular', COUPON_PLUGIN_TEXT_DOMAIN ); ?></label>
            </fieldset>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="coupon_plugin_code"><?php _e( 'Coupon Code', COUPON_PLUGIN_TEXT_DOMAIN ); ?>
                <span class="screen-reader-text"><?php _e( 'Coupon Code', COUPON_PLUGIN_TEXT_DOMAIN ); ?></span></label>
        </th>
        <td>
            <input class="large-text code" type="text" name="coupon_plugin_code" id="coupon_plugin_code"
                   value="<?php echo esc_html(get_post_meta( $post->ID, 'coupon_plugin_code', 'true' )); ?>"/>
            <br/><span
                    class="description"><?php echo _e( 'Enter The Coupon Code Or Leave Blank', COUPON_PLUGIN_TEXT_DOMAIN ); ?></span>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label
                    for="coupon_plugin_affiliate_link"><?php _e( 'Affiliate Link', COUPON_PLUGIN_TEXT_DOMAIN ); ?>
                <span class="screen-reader-text"> <?php _e( 'Affiliate Link', COUPON_PLUGIN_TEXT_DOMAIN ); ?></span></label>
        </th>
        <td>
            <input class="large-text code" type="url" name="coupon_plugin_affiliate_link"
                   id="coupon_plugin_affiliate_link"
                   value="<?php echo get_post_meta( $post->ID, 'coupon_plugin_affiliate_link', 'true' ); ?>"/>
            <br/><span
                    class="description"><?php echo _e( 'Enter The Affiliate Link', COUPON_PLUGIN_TEXT_DOMAIN ); ?></span>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label
                    for="coupon_plugin_description"><?php _e( 'Coupon Description', COUPON_PLUGIN_TEXT_DOMAIN ); ?>
                <span class="screen-reader-text"> <?php _e( 'Coupon Description', COUPON_PLUGIN_TEXT_DOMAIN ); ?></span></label>
        </th>
        <td><textarea name="coupon_plugin_description" id="coupon_plugin_description" rows="5" cols="50"
                      class="large-text"><?php echo get_post_meta( $post->ID, 'coupon_plugin_description', 'true' ); ?></textarea>
            <span class="description"><?php _e( 'Write the offer details here', COUPON_PLUGIN_TEXT_DOMAIN ); ?></span>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label
                    for="coupon_plugin_expiry"><?php _e( 'Expiry Date/Time', COUPON_PLUGIN_TEXT_DOMAIN ); ?>
                <span class="screen-reader-text"> <?php _e( 'Expiry Date/Time', COUPON_PLUGIN_TEXT_DOMAIN ); ?></span></label>
        </th>
        <td>
            <input class="regular-text code" type="text" name="coupon_plugin_expiry" id="coupon_plugin_expiry"
                   value="<?php echo get_post_meta( $post->ID, 'coupon_plugin_expiry', 'true' ); ?>"/>
            <br/><span
                    class="description"><?php _e( 'Select The Coupon Expiry Date And Time Or Leave Blank', COUPON_PLUGIN_TEXT_DOMAIN ); ?></span>
        </td>

        <script type="text/javascript">
            jQuery(function ($) {
                $('#coupon_plugin_expiry').datetimepicker({
                    controlType: 'select',
                    oneLine: true,
                    dateFormat: 'dd M yy',
                    timeFormat: 'hh:mm tt'

                });
            });
        </script>
    </tr>
    <?php do_action('add_more_coupon_metabox_fields', $post->ID);?>
    </tbody>
</table>
