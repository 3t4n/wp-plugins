<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

if ( ! class_exists( 'amem_field_user_password' ) ) :

class amem_field_user_password extends amem_field_password {

	function initialize() {
		// vars
		$this->name       = 'user_password';
		$this->label      = __( 'User Password (Members)', 'advanced-members' );
		$this->category = 'Members';
		$this->description = __( 'Login password of user. Synced to `user_pass` user data.', 'advanced-members' );
		$this->preview_image = amem_get_url('/assets/images/field-type-previews/field-preview-password.png');
		$this->defaults   = array(
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'force_edit'        => 0,
			'password_strength' => '3',
			'show_pass_confirm' => 0,
		);

		add_filter( 'acf/load_field/type=password', array( $this, 'load_user_password_field' ) );
		add_filter( 'acf/update_value/type=' . $this->name, array( $this, 'pre_update_value' ), 9, 3 );
	}

	function load_user_password_field( $field ) {
		if ( ! empty( $field['custom_password'] ) ) {
			$field['type'] = 'user_password';
		}
		return $field;
	}

	function prepare_field( $field ) {
		$field['required'] = 1;
		if ( isset( $field['wrapper']['class'] ) ) {
			$field['wrapper']['class'] .= ' amem-password-main amem-pwd';
		} else {
			$field['wrapper']['class'] = 'amem-password-main amem-pwd';
		}

		if ( ! $field['value'] ) {
			return $field;
		}

		// if ( empty( $field['force_edit'] ) ) {
		// 	$field['required']           = false;
		// 	$field['wrapper']['class']  .= ' edit_password';
		// 	$field['edit_user_password'] = true;
		// }

		$form = amem()->form;
		if ( isset( $form['approval'] ) ) {
			return false;
		} else {
			$field['value'] = '';
		}
		return $field;
	}

	public function load_value( $value, $post_id = false, $field = false ) {
		if ( $user_id = $this->_user_id($post_id) ) {
			$edit_user = get_user_by( 'ID', $user_id );
			if ( $edit_user instanceof \WP_User ) {
				$value = 'i';
			}
		}
		return $value;
	}

	function validate_value( $is_valid, $value, $field, $input ) {
		// if ( is_numeric( $_POST['_acf_user'] ) && ! isset( $_POST['edit_user_password'] ) ) {
		// 	return $is_valid;
		// }

		if ( $this->mode() == 'login' ) {
			return $is_valid;
		}

		if ( $field['show_pass_confirm'] && amem()->is_amem() ) {
			$ps_confirm_field = sanitize_key( $_POST['custom_password_confirm'] ); // phpcs:disable WordPress.Security.NonceVerification -- already verified by ACF
			if ( !isset($_POST[ $ps_confirm_field ]) || sanitize_text_field($_POST[ $ps_confirm_field ]) != $value ) { // phpcs:disable WordPress.Security.NonceVerification -- already verified by ACF
				return __( 'The passwords do not match', 'advanced-members' );
			}
		}
		if ( isset( $_POST['password-strength'] ) && isset( $_POST['required-strength'] ) ) { // phpcs:disable WordPress.Security.NonceVerification -- already verified by ACF
			if( absint( $_POST['password-strength'] ) < absint( $_POST['required-strength'] ) ) { // phpcs:disable WordPress.Security.NonceVerification -- already verified by ACF
				// if ( ! $field['required'] && $value == '' && ! isset( $_POST['edit_user_password'] ) ) {
				// 	return $is_valid;
				// }
				return __( 'The password is too weak. Please make it stronger.', 'advanced-members' );
			}
		}

		return $is_valid;
	}

	function pre_update_value( $value, $post_id = false, $field = false ) {
		// if ( empty( $_POST['edit_user_password'] ) ) {
		// 	return null;
		// }

		if ( $user_id = $this->_user_id($post_id) ) {
			if ( !$this->_can_edit($user_id) )
				return null;
			remove_action( 'acf/save_post', '_acf_do_save_post' );
			wp_update_user(
				array(
					'ID'        => $user_id,
					'user_pass' => $value,
				)
			);
			add_action( 'acf/save_post', '_acf_do_save_post' );
		}
		return null;
	}

	function update_value( $field ) {
		return null;
	}

	function render_field( $field ) {
		$field['type'] = 'password';

		parent::render_field( $field );
		if ( $this->mode() == 'login' ) {
			return;
		}
		wp_enqueue_script( 'password-strength-meter' );
		wp_enqueue_script( 'amem-password-strength' );
		echo '<input type="hidden" name="custom_password" value="' . esc_attr( $field['key'] ) . '"/>';
		if ( isset( $field['password_strength'] ) ) {
			echo '<div class="pass-strength-result weak"></div>';
			echo '<input type="hidden" value="' . esc_attr( $field['password_strength'] ) . '" name="required-strength"/>';
			echo '<input class="password-strength" type="hidden" value="" name="password-strength"/>';
		}

		// if ( empty( $field['force_edit'] ) ) {
		// 	if ( ! empty( $field['edit_user_password'] ) ) {
		// 		$edit_text   = empty( $field['edit_password'] ) ? __( 'Edit Password', 'advanced-members' ) : $field['edit_password'];
		// 		$cancel_text = empty( $field['cancel_edit_password'] ) ? __( 'Cancel', 'advanced-members' ) : $field['cancel_edit_password'];
		// 		echo '<button class="cancel-edit" type="button">' . esc_html( $cancel_text ) . '</button><button class="acf-button button button-primary edit-password" type="button">' . esc_html( $edit_text ) . '</button>';
		// 	}
		// }

		if ( $field['show_pass_confirm'] ) {
			add_action( 'amem/field/after_field/key=' . $field['key'], [$this, 'print_confirm_field'], 10, 3 );
		}
	}

	function print_confirm_field($field, $form, $args) {
		acf_add_local_field( [
			'key' => 'user_password_confirm',
			'label' => __( 'Password Confirm', 'advanced-members' ),
			'name' => 'user_password_confirm',
			'type' => 'user_password_confirm',
    	'required' => true,
    	'_amem_local' => true,
		] );

		$confirm = acf_get_local_field('user_password_confirm');

		amem()->render->render_field( $confirm, $form, $args );

		remove_action( 'amem/field/after_field/key=' . $field['key'], [$this, 'print_confirm_field'] );
	}

	function render_field_settings( $field ) {
		parent::render_field_settings( $field );
		acf_render_field_setting(
			$field,
			array(
				'label'         => __( 'Password Strength', 'advanced-members' ),
				'name'          => 'password_strength',
				'type'          => 'select',
				'default_value' => '3',
				'choices'       => array(
					'1' => __( 'Very Weak', 'advanced-members' ),
					'2' => __( 'Weak', 'advanced-members' ),
					'3' => __( 'Medium', 'advanced-members' ),
					'4' => __( 'Strong', 'advanced-members' ),
				),
			)
		);
		acf_render_field_setting(
			$field,
			array(
				'label'        => __( 'Show password confirm', 'advanced-members' ),
				'instructions' => __( 'Show password confirm field for users to check password is not mistyped. (Only works with Advanced Members for ACF Forms)', 'advanced-members' ),
				'name'         => 'show_pass_confirm',
				'type'         => 'true_false',
				'ui'           => 1,
			)
		);
		// acf_render_field_setting(
		// 	$field,
		// 	array(
		// 		'label'        => __( 'Force Edit', 'advanced-members' ),
		// 		'instructions' => __( 'Force User to edit the password when editing their account.', 'advanced-members' ),
		// 		'name'         => 'force_edit',
		// 		'type'         => 'true_false',
		// 		'ui'           => 1,
		// 	)
		// );
		// acf_render_field_setting(
		// 	$field,
		// 	array(
		// 		'label'         => __( 'Edit Password Button', 'advanced-members' ),
		// 		'name'          => 'edit_password',
		// 		'type'          => 'text',
		// 		'default_value' => __( 'Edit Password Button', 'advanced-members' ),
		// 		'conditions'    => array(
		// 			array(
		// 				'field'    => 'force_edit',
		// 				'operator' => '!=',
		// 				'value'    => '1',
		// 			),
		// 		),
		// 	)
		// );
		// acf_render_field_setting(
		// 	$field,
		// 	array(
		// 		'label'         => __( 'Cancel Button', 'advanced-members' ),
		// 		'name'          => 'cancel_edit_password',
		// 		'type'          => 'text',
		// 		'default_value' => __( 'Cancel', 'advanced-members' ),
		// 		'conditions'    => array(
		// 			array(
		// 				'field'    => 'force_edit',
		// 				'operator' => '!=',
		// 				'value'    => '1',
		// 			),
		// 		),
		// 	)
		// );
	}
}


// initialize
acf_register_field_type( 'amem_field_user_password' );

endif;


