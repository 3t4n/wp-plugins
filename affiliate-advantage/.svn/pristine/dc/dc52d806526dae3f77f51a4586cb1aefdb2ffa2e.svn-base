<?php

use Level_Wp\Affiliate_Advantage\Plugin;

?>
<div class="form-field form-required affiliate-advantage-form-group">
    <input type="hidden" name="<?php echo esc_attr( 'save_' . Plugin::get_instance()->cpt . 'meta' ) ?>" value="1">
    <label for="<?php echo esc_attr( $prefix ) ?>link_url">Affiliate Link</label>
    <input name="<?php echo esc_attr( $prefix ) ?>link_url" id="<?php echo esc_attr( $prefix ) ?>link_url" type="url"
           value="<?php echo esc_attr( get_post_meta( $post->ID, 'link_url', true ) ) ?>" size="40" required>
    <p class="affiliate-advantage-form-help-text">The affiliate link you wish to shorten.</p>
</div>

<div class="form-field form-required">
    <label class="info-label block" style="display: block">Affiliate Link Banner Image</label>
    <button type="button" class="button button-primary" id="affiliate-advantage-upload-link-banner-btn">Upload Image
    </button>
    <input type="hidden" id="affiliate-advantage-link-banner" name="<?php echo esc_attr( $prefix ) ?>link_banner"
           value="<?php echo esc_attr( get_post_meta( $post->ID, 'link_banner', true ) ) ?>">
    <img src="<?php echo esc_attr( get_post_meta( $post->ID, 'link_banner', true ) ) ?>" alt=""
         id="affiliate-advantage-link-banner-img"
         style="display: block; margin-top: 10px">
    <p>The banner image to use for this affiliate link.</p>
</div>
