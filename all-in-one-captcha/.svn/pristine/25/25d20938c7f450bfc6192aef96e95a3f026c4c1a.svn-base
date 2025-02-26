<?php
/**
 * Captcha Integration
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return integration fields.
 *
 * @since 1.0.0
 *
 * @return array $form_fields Fields lists.
 */
function aioc_captcha_integrations_fields() {
	$form_fields = array(
		'bbpress'     => array(
			'order_id' => '2',
			'status'   => class_exists( 'bbPress' ),
			'name'     => 'bbPress',
			'type'     => 'checkbox',
			'options'  => array(
				'enable_bbpress_topic' => array(
					'id'      => 'aioc_enable_bbpress_topic',
					'default' => aioc_option( 'aioc_enable_bbpress_topic' ),
					'label'   => 'New Topic Form',
				),
				'enable_bbpress_reply' => array(
					'id'      => 'aioc_enable_bbpress_reply',
					'default' => aioc_option( 'aioc_enable_bbpress_reply' ),
					'label'   => 'Reply Form',
				),
			),
		),
		'buddypress'  => array(
			'order_id' => '3',
			'status'   => class_exists( 'BuddyPress' ),
			'name'     => 'BuddyPress',
			'type'     => 'checkbox',
			'options'  => array(
				'enable_bp_register' => array(
					'id'      => 'aioc_enable_bp_register',
					'default' => aioc_option( 'aioc_enable_bp_register' ),
					'label'   => 'Register Form',
				),
			),
		),
		'cf7'         => array(
			'order_id' => '4',
			'status'   => class_exists( 'WPCF7' ),
			'name'     => 'Contact Form 7',
			'type'     => 'checkbox',
			'options'  => array(
				'enable_cf7' => array(
					'id'      => 'aioc_enable_cf7',
					'default' => aioc_option( 'aioc_enable_cf7' ),
					'label'   => 'CF7 Form',
				),
			),
		),
		'edd'         => array(
			'order_id' => '5',
			'status'   => class_exists( 'Easy_Digital_Downloads' ),
			'name'     => 'Easy Digital Downloads',
			'type'     => 'checkbox',
			'options'  => array(
				'enable_edd_login'         => array(
					'id'      => 'aioc_enable_edd_login',
					'default' => aioc_option( 'aioc_enable_edd_login' ),
					'label'   => 'Login Form',
				),
				'enable_edd_register'      => array(
					'id'      => 'aioc_enable_edd_register',
					'default' => aioc_option( 'aioc_enable_edd_register' ),
					'label'   => 'Register Form',
				),
				'enable_edd_lost_password' => array(
					'id'      => 'aioc_enable_edd_lost_password',
					'default' => aioc_option( 'aioc_enable_edd_lost_password' ),
					'label'   => 'Lost Password Form',
				),
				'enable_edd_checkout'      => array(
					'id'      => 'aioc_enable_edd_checkout',
					'default' => aioc_option( 'aioc_enable_edd_checkout' ),
					'label'   => 'Checkout Form',
				),
			),
		),
		'woocommerce' => array(
			'order_id' => '6',
			'status'   => class_exists( 'WooCommerce' ),
			'name'     => 'WooCommerce',
			'type'     => 'checkbox',
			'options'  => array(
				'enable_woo_login'         => array(
					'id'      => 'aioc_enable_woo_login',
					'default' => aioc_option( 'aioc_enable_woo_login' ),
					'label'   => 'Login Form',
				),
				'enable_woo_register'      => array(
					'id'      => 'aioc_enable_woo_register',
					'default' => aioc_option( 'aioc_enable_woo_register' ),
					'label'   => 'Register Form',
				),
				'enable_woo_lost_password' => array(
					'id'      => 'aioc_enable_woo_lost_password',
					'default' => aioc_option( 'aioc_enable_woo_lost_password' ),
					'label'   => 'Lost Password Form',
				),
				'enable_woo_review'        => array(
					'id'      => 'aioc_enable_woo_review',
					'default' => aioc_option( 'aioc_enable_woo_review' ),
					'label'   => 'Review Form',
				),
				'enable_woo_checkout'      => array(
					'id'      => 'aioc_enable_woo_checkout',
					'default' => aioc_option( 'aioc_enable_woo_checkout' ),
					'label'   => 'Checkout Form',
				),
			),
		),
		'wordpress'   => array(
			'order_id' => '1',
			'status'   => true,
			'is_free'  => true,
			'name'     => 'WordPress',
			'type'     => 'checkbox',
			'options'  => array(
				'enable_login'         => array(
					'id'      => 'aioc_enable_login',
					'default' => aioc_option( 'aioc_enable_login' ),
					'label'   => 'Login Form',
				),
				'enable_register'      => array(
					'id'      => 'aioc_enable_register',
					'default' => aioc_option( 'aioc_enable_register' ),
					'label'   => 'Register Form',
				),
				'enable_lost_password' => array(
					'id'      => 'aioc_enable_lost_password',
					'default' => aioc_option( 'aioc_enable_lost_password' ),
					'label'   => 'Lost Password Form',
				),
				'enable_comment_form'  => array(
					'id'      => 'aioc_enable_comment_form',
					'default' => aioc_option( 'aioc_enable_comment_form' ),
					'label'   => 'Comment Form',
				),
			),
		),
		'wpforms'     => array(
			'order_id' => '7',
			'status'   => class_exists( 'WPForms' ),
			'name'     => 'WPForms',
			'type'     => 'checkbox',
			'options'  => array(
				'enable_wpforms' => array(
					'id'      => 'aioc_enable_wpforms',
					'default' => aioc_option( 'aioc_enable_wpforms' ),
					'label'   => 'Form Auto-Add',
				),
			),
		),

	);

	return $form_fields;
}

/**
 * Get captcha integrations by plugin status.
 *
 * @since 1.0.0
 *
 * @param bool $plugin_status Plugin status .
 */
function aioc_get_captcha_integrations( $plugin_status = null ) {
	$form_fields = aioc_captcha_integrations_fields();
	usort( $form_fields, 'aioc_sort_by_order_id' );

	$plugin_name = basename( AIOC_DIR );
	$field_name  = 'is_free';
	if ( 'all-in-one-captcha-pro' === $plugin_name ) {
		$field_name = 'status';
	}

	foreach ( $form_fields as $field ) {

		if ( 'active-plugin' === $plugin_status && ! empty( $field[ $field_name ] ) ) {
			$disable = false;
			aioc_field_captcha_integrations( $field, $disable );
		} elseif ( 'inactive-plugin' === $plugin_status && empty( $field[ $field_name ] ) ) {
			$disable = true;
			aioc_field_captcha_integrations( $field, $disable );
		}
	}
}

/**
 * Render captcha integrations.
 *
 * @since 1.0.0
 *
 * @param array  $field Integration field.
 * @param string $disable Disable for inactive.
 */
function aioc_field_captcha_integrations( $field, $disable ) {
	?>
	<div class="aioc-integration-inner<?php echo esc_attr( ! empty( $disable ) ? ' aioc-disabled' : '' ); ?>">

		<?php if ( empty( $field['is_free'] ) ) : ?>
			<span class="aioc-integration-pro">Pro</span>
		<?php endif; ?>

		<h3><?php echo esc_html( $field['name'] ); ?></h3>

		<?php foreach ( $field['options'] as $key => $option ) : ?>
			<div class="aioc-integration-fields">
				<label class="aioc-input">

					<?php if ( ! empty( $field['type'] ) && $option['id'] ) : ?>
						<input type="<?php echo esc_attr( $field['type'] ); ?>" name="<?php echo esc_attr( 'aioc_captcha_options[' . $option['id'] . ']' ); ?>" id="<?php echo esc_attr( $option['id'] ); ?>" value="1" <?php checked( 1, $option['default'] ); ?> <?php echo esc_attr( ! empty( $disable ) ? ' disabled' : '' ); ?>/>
						<div class="aioc-input-toggle"><span class="aioc-toggle"></span></div>
					<?php endif; ?>

					<?php if ( ! empty( $option['label'] ) ) : ?>
						<?php echo esc_html( $option['label'] ); ?>
					<?php endif; ?>

				</label>
			</div>
		<?php endforeach; ?>

	</div>
	<?php
}
