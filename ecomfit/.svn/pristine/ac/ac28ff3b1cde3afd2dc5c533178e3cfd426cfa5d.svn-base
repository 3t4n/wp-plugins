<div class="ecomfit-wrapper ecomfit-wrapper-login">
    <div class="ecomfit-container">
		<?php if ( get_option( ECOMFIT_STATUS_WOOCOMMERCE ) ) { ?>
            <div class="ecomfit-header ecomfit-text-center">
                <div class="ecomfit-img-wrapper">
                    <img src="<?php echo plugins_url( 'view/img/ecomfit.jpg', ECOMFIT_WOOCOMMERCE_PLUGIN_DIRNAME ); ?>"/>
                </div>
            </div>
            <div class="ecomfit-content ecomfit-text-center">
                <div class="ecomfit-title ecomfit-text-white">
                    Hi <?php global $current_user;
					get_currentuserinfo();
					echo $current_user->user_login; ?>, Welcome to Ecomfit!
                </div>
                <p class="ecomfit-text-white ecomfit-text-bold" style="font-size: 1.2em;">
                    Let's connect your online stores and join with over 50,000+ merchants are
                    using Ecomfit to skyrocket their sales right now!
                </p>
                <br><br>
                <button href="javascript:;" onClick="ecomfitOpenChildWindow('<?php echo ECOMFIT_URL; ?>')"
                        class="ecomfit-btn ecomfit-btn-lg ecomfit-btn-primary">
					<?php if ( ECOMFIT_LOGIN_FAIL == get_option( ECOMFIT_LOGIN_CURRENT_STATUS ) ) {
						echo "Let Connect Again";
					} else {
						echo "Let Connect Now";
					}
					?>
                </button>
                <p class="ecomfit-text-white">
                    No credit cards required. Integration takes seconds.
                </p>
            </div>

		<?php } else { ?>
            <div class="ecomfit-text-center">
                <h3>Ecomfit plugin requires <a href="<?php _e( $wooCommercePluginUrl ); ?>"
                                               target="_blank">WooCommerce</a>
                    to work because it helps to convert visitors into subscribers and sales for WooCommerce online
                    stores.
                </h3>
                <p>
                    <a class="button button-primary" href="<?php _e( $wooCommercePluginUrl ); ?>" target="_blank">
                        Install WooCommerce</a>
                </p>
                </p>
            </div>
		<?php } ?>
    </div>
</div>
