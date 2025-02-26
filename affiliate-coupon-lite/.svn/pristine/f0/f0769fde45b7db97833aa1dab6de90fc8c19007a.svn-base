<div class="coupon-plugin-group">
	<?php if ( $popular_coupon ) {
		echo '<img src=' . esc_url(AFFILIATE_COUPON_LITE_URL) . 'assets/images/ic-popular.svg alt = "ribbon" class="tile-hot-ribbon">';
	} ?>
    <div id="coupon-plugin" class="coupon-box">
        <div class="col col-2 coupon-image-box">
            <div class="coupon-image">
                <img src="<?php echo esc_url($store_img_url); ?>">
            </div>
        </div>

        <div class="col col-6 coupon-body">
            <<?php echo esc_attr($htag); ?> class="coupon-title"><?php echo esc_html($title); ?></<?php echo esc_attr($htag); ?>>
    		<?php if ( $content ) { ?>
                <div class="coupon-description">
    				<?php echo esc_attr($content); ?>
                </div>
    		<?php } ?>
        </div>

        <div class="col col-3">
            <div class="coupon-button<?php echo esc_attr($coupon_link_behaviour); ?>">
                <div class="coupon-code <?php echo esc_attr($deal_class); ?>">
    				<?php do_action( 'cp_code_box', $id, $code, $affiliatelink, $coupon_button_text, $deal_class, $deal_activated_text, $deal_button_text ); ?>
                </div>
            </div>
            <div class="coupon-expiry">
                <span class="dashicons dashicons-clock"></span>
                <span class="coupon-meta-text"><?php echo esc_attr($expiry_msg); ?></span>
            </div>
        </div>
    </div>
    <div class="coupon-meta col col-12">
    	<?php do_action( 'cp_meta_box', $id ); ?>
    </div>
</div>