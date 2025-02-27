<?php
defined( 'ABSPATH' ) || exit;

class NMGR_Templates {

	public static function run() {
		// Single wishlist page content
		add_action( 'nmgr_wishlist', array( __CLASS__, 'single_show_title' ), 20 );
		add_action( 'nmgr_wishlist', array( __CLASS__, 'single_show_display_name' ), 30 );
		add_action( 'nmgr_wishlist', array( __CLASS__, 'single_show_event_date' ), 40 );
		add_action( 'nmgr_wishlist', array( __CLASS__, 'single_show_description' ), 50 );
		add_action( 'nmgr_wishlist', array( __CLASS__, 'single_show_notices' ), 60 );
		add_action( 'nmgr_wishlist', array( __CLASS__, 'single_show_items' ), 70 );
		add_action( 'nmgr_wishlist', array( __CLASS__, 'single_show_share_links' ), 80 );
		add_action( 'nmgr_wishlist', array( __CLASS__, 'single_show_copy_link' ), 90 );

		// Account page content
		add_action( 'woocommerce_account_dashboard', array( __CLASS__, 'show_wishlist_dashboard_text' ), 10 );

		add_filter( 'nmgr_delete_item_notice', array( __CLASS__, 'notify_of_item_purchased_status' ), 10, 2 );
	}

	public static function single_show_copy_link( $wishlist ) {
		if ( 'publish' !== $wishlist->get_status() ) {
			return;
		}
		?>
		<div class="nmgr-copy-wrapper nmgr-tip"
				 title="<?php
		printf(
			/* translators: %s: wishlist type title */
			nmgr()->is_pro ? esc_attr__( 'Copy your %s url', 'nm-gift-registry' ) : esc_attr__( 'Copy your %s url', 'nm-gift-registry-lite' ),
			esc_html( nmgr_get_type_title( '', 0, $wishlist->get_type() ) )
		);
		?>">
			<svg width="1.2em" height="1.2em" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m6 18h-3c-.48 0-1-.379-1-1v-14c0-.481.38-1 1-1h14c.621 0 1 .522 1 1v3h3c.621 0 1 .522 1 1v14c0 .621-.522 1-1 1h-14c-.48 0-1-.379-1-1zm1.5-10.5v13h13v-13zm9-1.5v-2.5h-13v13h2.5v-9.5c0-.481.38-1 1-1z" fill-rule="nonzero"/></svg>
			<div class="nmgr-link nmgr-copy"><?php echo esc_html( $wishlist->get_permalink() ); ?> </div>
		</div>
		<?php
	}

	/**
	 * Show the wishlist title on the single wishlist page
	 *
	 * @param NMGR_Wishlist $wishlist
	 */
	public static function single_show_title( $wishlist ) {
		printf( '<h2 class="nmgr-title nmgr-text-center entry-title">%s</h2>', esc_html( $wishlist->get_title() ) );
	}

	/**
	 * Show the wishlist display name on the single wishlist page
	 *
	 * @param NMGR_Wishlist $wishlist
	 */
	public static function single_show_display_name( $wishlist ) {
		if ( $wishlist->get_display_name() ) {
			printf( '<h3 class="nmgr-display-name nmgr-text-center">%s</h3>', esc_html( $wishlist->get_display_name() ) );
		}
	}

	/**
	 * Show the wishlist event date on the single wishlist page
	 *
	 * @param NMGR_Wishlist $wishlist
	 */
	public static function single_show_event_date( $wishlist ) {
		if ( $wishlist->is_type( 'wishlist' ) ) {
			return;
		}

		$date = nmgr_format_date( $wishlist->get_event_date() );
		if ( $date ) :

			if ( nmgr_user_has_wishlist( $wishlist ) ) {
				$expiry_days = $wishlist->get_expiry_days();
				$abs_days = absint( $expiry_days );
				$days_notice = '';

				if ( $expiry_days > 0 ) {
					$days_notice = sprintf(
						/* translators: %d: wishlist event days */
						nmgr()->is_pro ? _n( '%d day to your event', '%d days to your event', $abs_days, 'nm-gift-registry' ) : _n( '%d day to your event', '%d days to your event', $abs_days, 'nm-gift-registry-lite' ),
						$abs_days
					);
					$expiry_days = "+$expiry_days";
				} elseif ( $expiry_days < 0 ) {
					$days_notice = sprintf(
						/* translators: %d: wishlist event days */
						nmgr()->is_pro ? _n( '%d day after your event', '%d days after your event', $abs_days, 'nm-gift-registry' ) : _n( '%d day after your event', '%d days after your event', $abs_days, 'nm-gift-registry-lite' ),
						$abs_days
					);
				} else {
					$days_notice = nmgr()->is_pro ?
						__( 'Your event is today', 'nm-gift-registry' ) :
						__( 'Your event is today', 'nm-gift-registry-lite' );
					$expiry_days = $days_notice;
				}
			}
			?>

			<p class="nmgr-event-date nmgr-text-center">
				<span class="nmgr-date-text">
					<?php
					echo esc_html( nmgr()->is_pro ?
							__( 'Event date', 'nm-gift-registry' ) :
							__( 'Event date', 'nm-gift-registry-lite' )
					);

					echo ': ' . esc_html( $date );
					?>
				</span>
				<?php if ( nmgr_user_has_wishlist( $wishlist ) ) : ?>
					<span class="nmgr-badge nmgr-tip"
								style="vertical-align: text-top; margin-left: 5px;"
								title="<?php esc_attr_e( $days_notice ); ?>"><?php echo esc_html( $expiry_days ); ?></span>
							<?php endif; ?>
			</p>

			<?php
		endif;
	}

	/**
	 * Show the wishlist description on the single wishlist page
	 *
	 * @param NMGR_Wishlist $wishlist
	 */
	public static function single_show_description( $wishlist ) {
		if ( $wishlist->get_description() ) {
			printf( '<div class="nmgr-description nmgr-text-center">%s</div>', wp_kses_post( wpautop( $wishlist->get_description() ) ) );
		}
	}

	/**
	 * Show woocommerce notices if available
	 */
	public static function single_show_notices() {
		/**
		 * We first check if the functions exists to prevent fatal error for
		 * 'wc_print_notices()' not found when saving a page with the shortcode
		 * in the admin area
		 */
		if ( function_exists( 'woocommerce_output_all_notices' ) && function_exists( 'wc_print_notices' ) ) {
			woocommerce_output_all_notices();
		}
	}

	/**
	 * Show the wishlist items on the single wishlist page
	 *
	 * @param NMGR_Wishlist $wishlist
	 */
	public static function single_show_items( $wishlist ) {
		if ( $wishlist->is_type( 'gift-registry' ) && $wishlist->is_fulfilled() &&
			nmgr_get_type_option( $wishlist->get_type(), 'hide_fulfilled_items' ) ) {
			return;
		}

		echo nmgr_get_account_section( 'items', $wishlist );
	}

	/**
	 * Show share links on the single wishlist page
	 */
	public static function single_show_share_links( $wishlist ) {
		echo \NMGR\Lib\Single::get_share_template( $wishlist );
	}

	/**
	 * Show link to wishlist endpoint url on woocommerce account dashboard
	 */
	public static function show_wishlist_dashboard_text() {
		foreach ( [ 'gift-registry', 'wishlist' ] as $type ) {
			if ( is_nmgr_enabled( $type ) ) {
				printf(
					/* translators: 1: wishlist module account url, 2: wishlist type title */
					nmgr()->is_pro ? wp_kses_post( __( '<p>You can also manage your <a href="%1$s">%2$s</a>.</p>', 'nm-gift-registry' ) ) : wp_kses_post( __( '<p>You can also manage your <a href="%1$s">%2$s</a>.</p>', 'nm-gift-registry-lite' ) ),
					esc_url( nmgr_get_url( $type, 'home' ) ),
					esc_html( nmgr_get_type_title( '', '', $type ) )
				);
			}
		}
	}

	public static function notify_of_item_purchased_status( $notice, $item ) {
		if ( $item->get_purchased_quantity() ) {
			$notice .= ' ' . (nmgr()->is_pro ?
				__( 'This item has purchases that may be lost if deleted.', 'nm-gift-registry' ) :
				__( 'This item has purchases that may be lost if deleted.', 'nm-gift-registry-lite' ));
		}
		return $notice;
	}

	public static function get_purchase_refund_template( $item_id ) {
		ob_start();
		$item = nmgr_get_wishlist_item( $item_id );
		$purchased_quantity = $item->get_purchased_quantity();
		?>

		<style>
			#nmgr-purchase-refund-form {
				display: flex;
				flex-flow: column;
				align-items: center;
			}

			#nmgr-purchase-refund-form .nmgr-title {
				font-size: 1.675em;
			}

			#nmgr-purchase-refund-form input.nmgr-quantity {
				width: 5em;
			}

			#nmgr-purchase-refund-form .nmgr-options {
				border: 1px grey dashed;
				padding: .7em;
				margin-top: 1.5em;
			}
		</style>

		<form id="nmgr-purchase-refund-form">
			<div class="nmgr-title-wrap">
				<span class="nmgr-title"><?php echo esc_html( $item->get_product()->get_name() ); ?></span>
				<?php
				$desired_qty_title = nmgr()->is_pro ?
					__( 'Desired quantity', 'nm-gift-registry' ) :
					__( 'Desired quantity', 'nm-gift-registry-lite' );
				?>
				<span class="nmgr-tip nmgr-badge" style="vertical-align:text-bottom;"
							title="<?php esc_attr_e( $desired_qty_title ); ?>">
								<?php echo ( int ) $item->get_quantity(); ?>
				</span>
			</div>
			<br>
				<label class="nmgr-new-qty">
					<span>
						<?php
						echo esc_html( nmgr()->is_pro ?
								__( 'Purchased quantity', 'nm-gift-registry' ) :
								__( 'Purchased quantity', 'nm-gift-registry-lite' )
						);
						?>
					</span>
					<input type="number"
								 step="1"
								 placeholder="0"
								 autocomplete="off"
								 size="4"
								 class="nmgr-quantity"
								 value="<?php echo esc_attr( $purchased_quantity ); ?>"
								 data-qty="<?php echo esc_attr( $purchased_quantity ); ?>"
								 name="quantity"
								 min="0"
								 max="<?php echo esc_attr( $item->get_quantity() ); ?>"
								 />
				</label>

				<div class="nmgr-options">
					<div>
						<?php
						$args = [
							'input_id' => 'nmgr_create_order_switch',
							'input_name' => 'create_order',
							'checked' => true,
							'label_text' => (nmgr()->is_pro ?
							__( 'Create order', 'nm-gift-registry' ) :
							__( 'Create order', 'nm-gift-registry-lite' )) .
							nmgr_get_help_tip( nmgr()->is_pro ?
								__( 'Create an order to reflect the purchase of the item.', 'nm-gift-registry' ) :
								__( 'Create an order to reflect the purchase of the item.', 'nm-gift-registry-lite' ) ),
						];
						echo nmgr_get_checkbox_switch( $args );
						?>
					</div>
					<div>
						<?php
						$args2 = [
							'input_id' => 'nmgr_apply_price_switch',
							'input_name' => 'apply_price',
							'checked' => true,
							'label_text' => (nmgr()->is_pro ?
							__( 'Apply price', 'nm-gift-registry' ) :
							__( 'Apply price', 'nm-gift-registry-lite' )) .
							nmgr_get_help_tip( nmgr()->is_pro ?
								__( 'Include the price of the item in the order total.', 'nm-gift-registry' ) :
								__( 'Include the price of the item in the order total.', 'nm-gift-registry-lite' ) ),
						];
						echo nmgr_get_checkbox_switch( $args2 );
						?>
					</div>
				</div>

				<input type="hidden" name="wishlist_item_id" value="<?php echo esc_attr( $item->get_id() ); ?>">
					</form>
					<?php
					return ob_get_clean();
				}

			}
