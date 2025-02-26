<table class="form-table">
    <tbody>
    <tr valign="top">
        <th scope="row"><?php _e( 'Popular Offer?', 'affiliate-coupon-lite'); ?></th>
        <td>
            <fieldset>
                <legend class="screen-reader-text">
                    <span><?php _e( 'Popular Offer?', 'affiliate-coupon-lite'); ?></span></legend>
                <label for="affiliate_coupon_lite_popular">
                    <input name="affiliate_coupon_lite_popular" id="affiliate_coupon_lite_popular"
                           value="1"<?php checked( get_post_meta( $post->ID, 'affiliate_coupon_lite_popular', 'true' ), 1 ); ?>
                           type="checkbox"/>
					<?php _e( 'Tick To Make It Popular', 'affiliate-coupon-lite'); ?></label>
            </fieldset>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="affiliate_coupon_lite_code"><?php _e( 'Coupon Code', 'affiliate-coupon-lite'); ?>
                <span class="screen-reader-text"><?php _e( 'Coupon Code', 'affiliate-coupon-lite'); ?></span></label>
        </th>
        <td>
            <input class="large-text code" type="text" name="affiliate_coupon_lite_code" id="affiliate_coupon_lite_code"
                   value="<?php echo esc_html(get_post_meta( $post->ID, 'affiliate_coupon_lite_code', 'true' )); ?>"/>
            <br/><span
                    class="description"><?php echo _e( 'Enter The Coupon Code Or Leave Blank', 'affiliate-coupon-lite'); ?></span>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label
                    for="affiliate_coupon_lite_affiliate_link"><?php _e( 'Affiliate Link', 'affiliate-coupon-lite'); ?>
                <span class="screen-reader-text"> <?php _e( 'Affiliate Link', 'affiliate-coupon-lite'); ?></span></label>
        </th>
        <td>
            <input class="large-text code" type="url" name="affiliate_coupon_lite_affiliate_link"
                   id="affiliate_coupon_lite_affiliate_link"
                   value="<?php echo esc_html(get_post_meta( $post->ID, 'affiliate_coupon_lite_affiliate_link', 'true' )); ?>"/>
            <br/><span
                    class="description"><?php echo _e( 'Enter The Affiliate Link', 'affiliate-coupon-lite'); ?></span>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label
                    for="affiliate_coupon_lite_description"><?php _e( 'Coupon Description', 'affiliate-coupon-lite'); ?>
                <span class="screen-reader-text"> <?php _e( 'Coupon Description', 'affiliate-coupon-lite'); ?></span></label>
        </th>
        <td><textarea name="affiliate_coupon_lite_description" id="affiliate_coupon_lite_description" rows="5" cols="50"
                      class="large-text"><?php echo esc_textarea(get_post_meta( $post->ID, 'affiliate_coupon_lite_description', 'true' )); ?></textarea>
            <span class="description"><?php _e( 'Write the offer details here', 'affiliate-coupon-lite'); ?></span>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label
                    for="affiliate_coupon_lite_expiry"><?php _e( 'Expiry Date/Time', 'affiliate-coupon-lite'); ?>
                <span class="screen-reader-text"> <?php _e( 'Expiry Date/Time', 'affiliate-coupon-lite'); ?></span></label>
        </th>
        <td>
            <input class="regular-text code" type="text" name="affiliate_coupon_lite_expiry" id="affiliate_coupon_lite_expiry"
                   value="<?php echo esc_html(get_post_meta( $post->ID, 'affiliate_coupon_lite_expiry', 'true' )); ?>"/>
            <br/><span
                    class="description"><?php _e( 'Select The Coupon Expiry Date And Time Or Leave Blank', 'affiliate-coupon-lite'); ?></span>
        </td>

        <script type="text/javascript">
            jQuery(function ($) {
                $('#affiliate_coupon_lite_expiry').datetimepicker({
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
