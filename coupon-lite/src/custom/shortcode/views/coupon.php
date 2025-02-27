<div class="coupon-plugin-group">
	<?php if ( $popular_coupon ) {
		echo '<img src=' . COUPON_PLUGIN_URL . 'assets/images/ic-popular.svg alt = "ribbon" class="tile-hot-ribbon">';
	} ?>
    <div id="coupon-plugin" class="coupon-box">
        <div class="col col-2 coupon-image-box">
            <div class="coupon-image">
                <img src="<?php echo $store_img_url; ?>">
            </div>
        </div>

        <div class="col col-6 coupon-body">
            <<?php echo $htag; ?> class="coupon-title"><?php echo $title; ?></<?php echo $htag; ?>>
		<?php if ( $content ) { ?>
            <div class="coupon-description">
				<?php echo $content; ?>
            </div>
		<?php } ?>
    </div>

    <div class="col col-3">
        <div class="coupon-button<?php echo $coupon_link_behaviour; ?>">
            <div class="coupon-code <?php echo $deal_class; ?>">
				<?php do_action( 'cp_code_box', $id, $code, $affiliatelink, $coupon_button_text, $deal_class, $deal_activated_text, $deal_button_text ); ?>
            </div>
        </div>
        <div class="coupon-expiry">
            <span class="dashicons dashicons-clock"></span>
            <span class="coupon-meta-text"><?php echo $expiry_msg; ?></span>
        </div>
    </div>
</div>
<div class="coupon-meta col col-12">
	<?php do_action( 'cp_meta_box', $id ); ?>
</div>
</div>