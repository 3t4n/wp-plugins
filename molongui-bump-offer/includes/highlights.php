<?php

namespace Molongui\BumpOffer\Includes;
\defined( 'ABSPATH' ) or exit;
class Highlights
{
	public function highlights_plugin()
	{
		ob_start();
		?>
		<p><?php _e( "Molongui Deals, Sales Promotions and Upsells for WooCommerce is probably the most useful marketing tool to dramatically increase your revenue. Choose and promote products to offer to your customers as upselling before paying the order.", 'molongui-bump-offer' ); ?></p>
        <ul>
            <li class="molongui-notice-icon-check"><?php printf( __( "%sSmooth experience%s. Your customers can take the deal with just 1-click. So convenient. That easy!", 'molongui-bump-offer' ), '<strong>', '</strong>' ); ?></li>
            <li class="molongui-notice-icon-check <?php echo ( !did_action( 'mbo_pro/loaded' ) ? 'molongui-notice-only-premium' : '' ); ?>"><span><?php _e( "Pro only", 'molongui-bump-offer' ); ?></span><?php printf( __( "%sDifferent deal types to choose from%s: Price Deal, BOGO, Flash Sale, OTO, Discount, Free Shipping...", 'molongui-bump-offer' ), '<strong>', '</strong>' ); ?></li>
            <li class="molongui-notice-icon-check"><?php printf( __( "%sFully customizable%s. Pick any product, set a price, write an attractive message, upload an image and style the banner to your needs.", 'molongui-bump-offer' ), '<strong>', '</strong>' ); ?></li>
            <li class="molongui-notice-icon-check <?php echo ( !did_action( 'mbo_pro/loaded' ) ? 'molongui-notice-only-premium' : '' ); ?>"><span><?php _e( "Pro only", 'molongui-bump-offer' ); ?></span><?php printf( __( "%sConditional display%s. Make available your deal only if your customer's Cart meets certain criteria: value, product, category, country...", 'molongui-bump-offer' ), '<strong>', '</strong>' ); ?></li>
            <?php if ( !did_action( 'mbo_pro/loaded' ) ) : ?>
                <li class="molongui-notice-icon-check molongui-notice-only-premium"><span><?php _e( "Pro only", 'molongui-bump-offer' ); ?></span><?php printf( __( "%sPremium features%s. Unlimited deals, flash sales, BOGO offers, conditional display, automatic addition, video support and more awesome features are available with the Pro extension of this plugin.", 'molongui-bump-offer' ), '<strong>', '</strong>' ); ?></li>
		    <?php endif; ?>
        </ul>
		<?php
		$message = ob_get_clean();
		$content = array
		(
			'image'   => '',
			'title'   => sprintf( __( "Thanks for choosing %s plugin!", 'molongui-bump-offer' ), MOLONGUI_BUMP_OFFER_TITLE ),
			'message' => $message,
			'buttons' => array
			(
				'customizer' => array
				(
					'hidden' => true,
					'href'   => '',
					'target' => '_self',
					'class'  => 'molongui-notice-button-green',
					'icon'   => '',
					'label'  => __( "Customizer", 'molongui-bump-offer' ),
				),
				'quick-start' => array
				(
					'hidden' => false,
					'href'   => admin_url( 'edit.php?post_type='.MOLONGUI_BUMP_OFFER_CPT ),
					'target' => '_self',
					'class'  => 'molongui-notice-button-green',
					'icon'   => '',
					'label'  => __( "Quick Start", 'molongui-bump-offer' ),
				),
				'settings' => array
				(
					'hidden' => false,
					'href'   => 'admin.php?page=' . MOLONGUI_BUMP_OFFER_NAME,
					'target' => '_self',
					'class'  => '',
					'icon'   => '',
					'label'  => __( "Settings", 'molongui-bump-offer' ),
				),
				'documentation' => array
				(
					'hidden' => false,
					'href'   => 'https://www.molongui.com/docs/order-bump-for-woocommerce/',
					'target' => '_blank',
					'class'  => '',
					'icon'   => '',
					'label'  => __( "Documentation", 'molongui-bump-offer' ),
				),
				'demo' => array
				(
					'hidden' => did_action( 'mbo_pro/loaded' ),
					'href'   => MOLONGUI_BUMP_OFFER_DEMO,
					'target' => '_blank',
					'class'  => 'molongui-notice-button-orange',
					'icon'   => '',
					'label'  => __( "Test Pro", 'molongui-bump-offer' ),
				),
				'premium' => array
				(
					'hidden' => true,//did_action( 'mbo_pro/loaded' ),
					'href'   => MOLONGUI_BUMP_OFFER_WEB,
					'target' => '_blank',
					'class'  => 'molongui-notice-button-orange',
					'icon'   => '',
					'label'  => __( "Go Pro", 'molongui-bump-offer' ),
				),
			),
		);
		return $content;
	}
	public function highlights_release_200()
	{
		ob_start();
		?>
		<p><?php _e( "Molongui Order Bump has been updated and it brings you amazing features:", 'molongui-bump-offer' ); ?></p>
		<ul>
			<li class="molongui-notice-icon-check <?php echo ( !did_action( 'mbo_pro/loaded' ) ? 'molongui-notice-only-premium' : '' ); ?>"><span><?php _e( 'Premium only', 'molongui-bump-offer' ); ?></span><?php printf( __( "%sAutomatic addition:%s Add the offer to your client's Cart. No client action needed!", 'molongui-bump-offer' ), '<strong>', '</strong>' ); ?></li>
			<li class="molongui-notice-icon-check <?php echo ( !did_action( 'mbo_pro/loaded' ) ? 'molongui-notice-only-premium' : '' ); ?>"><span><?php _e( 'Premium only', 'molongui-bump-offer' ); ?></span><?php printf( __( "%sConditional display%s based on Cart contents and value", 'molongui-bump-offer' ), '<strong>', '</strong>' ); ?></li>
			<li class="molongui-notice-icon-check <?php echo ( !did_action( 'mbo_pro/loaded' ) ? 'molongui-notice-only-premium' : '' ); ?>"><span><?php _e( 'Premium only', 'molongui-bump-offer' ); ?></span><?php printf( __( "%sNew Customization Settings:%s custom spacing, transparent backgrounds, checkbox shadow...", 'molongui-bump-offer' ), '<strong>', '</strong>' ); ?></li>
		</ul>
		<?php
		$message = ob_get_clean();
		$content = array
		(
			'image'   => '',
			'title'   => sprintf( __( "What's new on %s %s", 'molongui-bump-offer' ), MOLONGUI_BUMP_OFFER_NAME, MOLONGUI_BUMP_OFFER_VERSION ),
			'message' => $message,
			'buttons' => array
            (
				'premium' => array
				(
					'hidden' => did_action( 'mbo_pro/loaded' ),
					'href'   => MOLONGUI_BUMP_OFFER_WEB,
					'target' => '_blank',
					'class'  => 'molongui-notice-button-orange',
					'icon'   => '',
					'label'  => __( "Go Premium", 'molongui-bump-offer' ),
				),
            ),
		);
		return $content;
	}

} // End of the class.