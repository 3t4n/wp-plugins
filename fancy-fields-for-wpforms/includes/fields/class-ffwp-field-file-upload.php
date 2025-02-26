<?php
/**
 * URL / Website field.
 *
 * @deprecated 1.0.5 New Field type f-file-upload is introduced. This will be removed since version 1.1.0
 * @package    Fancy Fields For WPForms
 * @author     sanzeeb3
 * @since      1.0.0
 * @license    GPL-2.0+
 */
class FFWP_Field_File extends WPForms_Field {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Define field type information.
		$this->name  = esc_html__( 'File Upload', 'fancy-fields-for-wpforms' );
		$this->type  = 'file-upload';
		$this->icon  = 'fa-upload';
		$this->order = 15;
		$this->group = 'fancy';

	}

	/**
	 * Field options panel inside the builder.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field Field settings.
	 */
	public function field_options( $field ) {

		// Options open markup.
		$this->field_option(
			'basic-options',
			$field,
			array(
				'markup' => 'open',
			)
		);

		// Label.
		$this->field_option( 'label', $field );

		// Description.
		$this->field_option( 'description', $field );

		// Required toggle.
		$this->field_option( 'required', $field );

				// Allowed Extensions.
		$lbl = $this->field_element(
			'label',
			$field,
			array(
				'slug'          => 'allowed_extensions',
				'value'         => esc_html__( 'Allowed Extensions', 'fancy-fields-for-wpforms' ),
				'tooltip'       => esc_html__( 'Enter allowed extensions for file upload. Add extensions separated by comma. For e.g. csv, docx, png, jpeg', 'fancy-fields-for-wpforms' ),
			),
			false
		);

		$fld = $this->field_element(
			'text',
			$field,
			array(
				'slug'  => 'allowed_extensions',
				'value' => ! empty( $field['allowed_extensions'] ) ? esc_attr( $field['allowed_extensions'] ) : '',
			),
			false
		);
		$this->field_element(
			'row',
			$field,
			array(
				'slug'    => 'allowed_extensions',
				'content' => $lbl . $fld,
			)
		);

		// Max File Size.
		$lbl = $this->field_element(
			'label',
			$field,
			array(
				'slug'          => 'max_file_size',
				'value'         => esc_html__( 'Max File Size', 'fancy-fields-for-wpforms' ),
				'tooltip'       => esc_html__( 'Enter maximum file size to upload in kb (kilobytes). 1 mb = 1024 kb.', 'fancy-fields-for-wpforms' ),
			),
			false
		);

		$fld = $this->field_element(
			'text',
			$field,
			array(
				'slug'  => 'max_file_size',
				'value' => ! empty( $field['max_file_size'] ) ? esc_attr( $field['max_file_size'] ) : '',
			),
			false
		);

		$this->field_element(
			'row',
			$field,
			array(
				'slug'    => 'max_file_size',
				'content' => $lbl . $fld,
			)
		);

		// Allow any file type.
		$lbl = $this->field_element(
			'label',
			$field,
			array(
				'slug'          => 'allow_any_file',
				'value'         => esc_html__( 'Allow Any File Type', 'fancy-fields-for-wpforms' ),
				'tooltip'       => esc_html__( 'Check this if you want to allow any file types. WordPress maynot permit those file types, so check this at your own risk.', 'fancy-fields-for-wpforms' ),
			),
			false
		);

		$fld = $this->field_element(
			'checkbox',
			$field,
			array(
				'slug'  => 'allow_any_file',
				'value' => ! empty( $field['allow_any_file'] ) ? esc_attr( $field['allow_any_file'] ) : '',
				'desc'	=> esc_html__( 'Check at your own risk. (Security Reason)', 'fancy-fields-for-wpforms' ),
			),
			false
		);

		$this->field_element(
			'row',
			$field,
			array(
				'slug'    => 'allow_any_file',
				'content' => $lbl . $fld,
			)
		);

		// Options close markup.
		$this->field_option(
			'basic-options',
			$field,
			array(
				'markup' => 'close',
			)
		);

		// Options open markup.
		$this->field_option(
			'advanced-options',
			$field,
			array(
				'markup' => 'open',
			)
		);

		// Hide label.
		$this->field_option( 'label_hide', $field );

		// Options close markup.
		$args = array(
			'markup' => 'close',
		);

		$this->field_option( 'advanced-options', $field, $args );

	}

	/**
	 * Field preview inside the builder.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field Field settings.
	 */
	public function field_preview( $field ) {

		// Define data.
		$placeholder = ! empty( $field['placeholder'] ) ? esc_attr( $field['placeholder'] ) : '';

		// Label.
		$this->field_preview_option( 'label', $field );

		// Primary input.
		echo '<input type="file" placeholder="' . esc_attr( $placeholder ) . '" class="primary-input" disabled>';

		// Description.
		$this->field_preview_option( 'description', $field );
	}

	/**
	 * Field display on the form front-end.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field      Field settings.
	 * @param array $deprecated Deprecated.
	 * @param array $form_data  Form data and settings.
	 */
	public function field_display( $field, $deprecated, $form_data ) {

		// Define data.
		$primary = $field['properties']['inputs']['primary'];

		// Primary field.
		printf(
			'<input type="file" %s %s>',
			wpforms_html_attributes( $primary['id'], $primary['class'], $primary['data'], $primary['attr'] ),
			$primary['required']
		); // WPCS: XSS ok.
	}

	/**
	 * Validates field on form submit.
	 *
	 * @since 1.0.0
	 *
	 * @param int $field_id
	 * @param array $field_submit
	 * @param array $form_data
	 */
	public function validate( $field_id, $field_submit, $form_data ) {

		$field     			= $form_data['fields'][ $field_id ];
		$uploaded_size  	= isset( $_FILES['wpforms']['size']['fields'][$field_id] ) ? $_FILES['wpforms']['size']['fields'][$field_id] : '';
		$error 				= isset( $_FILES['wpforms']['error']['fields'][$field_id] ) ? $_FILES['wpforms']['error']['fields'][$field_id] : '';
		$form_id   			= absint( $form_data['id'] );
		$allowed_extensions = isset( $field['allowed_extensions'] ) ? $field['allowed_extensions'] : '';


		// If the file upload is not required and no file uploaded
		if ( empty( $field['required'] ) && 4 == $error ) {
			return;
		}

		// File upload is a required field.
		if ( ! empty( $field['required'] ) && 4 == $error ) {
			wpforms()->process->errors[ $form_id ][ $field_id ] = sprintf( esc_html__( 'File upload is required.', 'fancy-fields-for-wpforms' ) );
			return;

		}

		$max_file_size = isset( $field['max_file_size'] ) ? absint( $field['max_file_size'] ) : '';

		// Maxmimum file size check.
		if( ! empty( $max_file_size ) ) {
			if( $uploaded_size > $max_file_size*1024 ) {
				wpforms()->process->errors[ $form_id ][ $field_id ] = sprintf( esc_html__( 'Maximum file size exceeded.', 'fancy-fields-for-wpforms' ) );
				return;
			}
		}

		// Allowed extension check.
		if( ! empty( $allowed_extensions ) ) {
			$file = isset( $_FILES['wpforms']['name']['fields'][$field_id] ) ? $_FILES['wpforms']['name']['fields'][$field_id] : '';

			$allowed_extensions = explode( ',', $allowed_extensions );
			$allowed_extensions = array_map( 'trim', $allowed_extensions );
			$extension 			= pathinfo( $file, PATHINFO_EXTENSION );

			if( ! in_array( $extension, $allowed_extensions ) ) {
				wpforms()->process->errors[ $form_id ][ $field_id ] = sprintf( esc_html__( 'File extension not allowed.', 'fancy-fields-for-wpforms' ) );
				return;
			}
		}

		// WordPress doesnot permit check.
		if( isset( $field['allow_any_file'] ) && $field['allow_any_file'] == 1 )  {

			$wp_filetype     = wp_check_filetype_and_ext( $_FILES[ 'wpforms' ]['tmp_name']['fields'][$field_id], $_FILES[ 'wpforms' ]['name']['fields'][$field_id] );
			$ext             = empty( $wp_filetype['ext'] ) ? '' : $wp_filetype['ext'];
			$type            = empty( $wp_filetype['type'] ) ? '' : $wp_filetype['type'];
			$proper_filename = empty( $wp_filetype['proper_filename'] ) ? '' : $wp_filetype['proper_filename'];

			// WordPress doesnot allow.
			if ( $proper_filename || ! $ext || ! $type ) {
				wpforms()->process->errors[ $form_id ][ $field_id ] = sprintf( esc_html__( 'Sorry, this file type is not permitted for security reasons.', 'fancy-fields-for-wpforms' ) );

				return;
			}
		}

		// Something other went wrong.
		if( $error != 0 ) {
			wpforms()->process->errors[ $form_id ][ $field_id ] = sprintf( esc_html__( 'File upload error.', 'fancy-fields-for-wpforms' ) );

			return;
		}
	}

	/**
	 * Formats and sanitizes field.
	 *
	 * @since 1.0.0
	 * @param int $field_id
	 * @param array $field_submit
	 * @param array $form_data
	 */
	public function format( $field_id, $field_submit, $form_data ) {

		// Define data.
		$field     			= $form_data['fields'][ $field_id ];
		$name  				= ! empty( $form_data['fields'][ $field_id ] ['label'] ) ? $form_data['fields'][ $field_id ]['label'] : '';
		$file_name			= isset( $_FILES['wpforms']['name']['fields'][$field_id] ) ?  $_FILES['wpforms']['name']['fields'][$field_id]  : '';
		$error 				= isset( $_FILES['wpforms']['error']['fields'][$field_id] ) ? $_FILES['wpforms']['error']['fields'][$field_id] : '';
		$value				= '';

		if ( ! empty( $file_name ) && $error === 0 ) {
			$upload = wp_upload_bits( $file_name, null, file_get_contents( $_FILES['wpforms']['tmp_name']['fields'][$field_id] ) );

			// Uploaded file link.
			$value = isset( $upload['url'] )? $upload['url'] : '';
		}

		// Set final field details.
		wpforms()->process->fields[ $field_id ] = array(
			'name'  => sanitize_text_field( $name ),
			'value' => esc_url( $value ),
			'id'    => absint( $field_id ),
			'type'  => $this->type,
		);
	}
}

new FFWP_Field_File();
