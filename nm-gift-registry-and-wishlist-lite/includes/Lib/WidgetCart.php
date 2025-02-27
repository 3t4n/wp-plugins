<?php

namespace NMGR\Lib;

defined( 'ABSPATH' ) || exit;

class WidgetCart extends \WP_Widget {

	public function __construct() {
		parent::__construct(
			'nmgr_cart',
			nmgr()->is_pro ?
				__( 'NM Gift Registry Cart', 'nm-gift-registry' ) :
				__( 'NM Gift Registry Cart', 'nm-gift-registry-lite' ),
			array(
				'description' => nmgr()->is_pro ?
					__( 'Display a user\'s wishlists like a cart.', 'nm-gift-registry' ) :
					__( 'Display a user\'s wishlists like a cart.', 'nm-gift-registry-lite' ),
			)
		);

		if ( !is_nmgr_enabled( 'gift-registry' ) && !is_nmgr_enabled( 'wishlist' ) ) {
			return;
		}

		add_action( 'widgets_init', function () {
			register_widget( __CLASS__ );
		} );
	}

	public function widget( $args, $instance ) {
		$type = $instance[ 'type' ] ?? 'gift-registry';

		if ( is_nmgr_enabled( $type ) ) {
			echo $args[ 'before_widget' ];
			echo \NMGR\Blocks\Cart::template( [ 'wishlistType' => $type ] );
			echo $args[ 'after_widget' ];
		}
	}

	public function form( $instance ) {
		$key = 'type';
		$value = isset( $instance[ $key ] ) ? $instance[ $key ] : '';
		$setting = array(
			'label' => nmgr()->is_pro ?
			__( 'Wishlist type', 'nm-gift-registry' ) :
			__( 'Wishlist type', 'nm-gift-registry-lite' ),
			'options' => [
				'gift-registry' => nmgr()->is_pro ?
				__( 'Gift Registry', 'nm-gift-registry' ) :
				__( 'Gift Registry', 'nm-gift-registry-lite' ),
				'wishlist' => nmgr()->is_pro ?
				__( 'Wishlist', 'nm-gift-registry' ) :
				__( 'Wishlist', 'nm-gift-registry-lite' ),
			],
		);
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>">
				<?php echo esc_html( $setting[ 'label' ] ); ?>
			</label>
			<select class="widefat"
							id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"
							name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>">
								<?php foreach ( $setting[ 'options' ] as $option_key => $option_value ) : ?>
					<option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $option_key, $value ); ?>>
						<?php echo esc_html( $option_value ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'type' ] = isset( $new_instance[ 'type' ] ) ? sanitize_text_field( $new_instance[ 'type' ] ) : '';
		return $instance;
	}

}
