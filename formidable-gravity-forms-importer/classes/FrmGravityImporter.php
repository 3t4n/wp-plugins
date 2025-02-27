<?php

class FrmGravityImporter extends FrmFormMigrator {

	public $slug         = 'gravity-forms';
	public $path         = 'gravityforms/gravityforms.php';
	public $name         = 'Gravity Forms';
	private $post_fields = array();

	protected $fields_map          = array();
	protected $current_source_form = null;
	protected $current_section     = array();

	protected function unsupported_field_types() {
		return array( 'donation', 'repeater' );
	}

	protected function skip_pro_fields() {
		return array(
			'address',
			'creditcard',
			'date',
			'fileupload',
			'list',
			'multiselect',
			'option',
			'page',
			'password',
			'post_category',
			'post_content',
			'post_custom_field',
			'post_excerpt',
			'post_image',
			'post_tags',
			'post_title',
			'product',
			'quantity',
			'section',
			'time',
			'total',
		);
	}

	protected function prepare_field( $field, &$new_field ) {

		// Needed later for e.g. $fields_map.
		$new_field['field_options']['gravity_id'] = isset( $field['id'] ) ? $field['id'] : '';

		$pro_is_installed = FrmAppHelper::pro_is_installed();

		$new_field['required']    = ! empty( $field['isRequired'] );
		$new_field['description'] = empty( $field['description'] ) ? '' : $field['description'];

		$label_pos = empty( $field['labelPlacement'] ) ? $this->current_source_form['labelPlacement'] : $field['labelPlacement'];
		$new_field['field_options']['label'] = $this->prepare_label_position( $label_pos );

		if ( isset( $field['cssClass'] ) && ! empty( $field['cssClass'] ) ) {
			$css_classes = $this->prepare_css_classes();
			$gf_classes  = array_keys( $css_classes );
			$frm_classes = array_values( $css_classes );
			$new_field['field_options']['classes'] = str_replace( $gf_classes, $frm_classes, $field['cssClass'] );
		}

		$this->prep_default_values( $field, $new_field );

		if ( isset( $field['maxLength'] ) && ! empty( $field['maxLength'] ) ) {
			$new_field['field_options']['max'] = $field['maxLength'];
		}

		if ( isset( $field['errorMessage'] ) && ! empty( $field['errorMessage'] ) ) {

			if ( empty( $field['isRequired'] ) ) {

				$new_field['field_options']['invalid'] = $field['errorMessage'];
			} else {

				$new_field['field_options']['blank']   = $field['errorMessage'];
			}
		}

		if ( isset( $field['in_section'] ) && ! empty( $field['in_section'] ) ) {
			// Save the old ID for fields in repeaters.
			$new_field['field_options']['in_section'] = $field['in_section'];
		}

		if ( $pro_is_installed ) {
			$this->prepare_field_for_pro( $field, $new_field );
		}

		switch ( $new_field['original'] ) {

			case 'address':
				$this->prep_address_field( $field, $new_field );
				break;

			case 'captcha':
				$this->prep_captcha_field( $field, $new_field );
				break;

			case 'consent':
				$this->prep_consent_field( $field, $new_field );
				break;

			case 'creditcard':
				$this->prep_credit_card_field( $field, $new_field );
				break;

			case 'date':
				$this->prep_date_field( $field, $new_field );
				break;

			case 'email':
				$this->prep_email_field( $field, $new_field );
				break;

			case 'fileupload':
				$this->prep_file_field( $field, $new_field );
				break;

			case 'multiselect':
				$new_field['field_options']['multiple'] = 1;
				$this->prepare_options_for_select( $field, $new_field );
				break;

			case 'checkbox':
			case 'radio':
			case 'select':
				$this->prepare_options_for_select( $field, $new_field );
				break;

			case 'html':
				$this->prep_html_field( $field, $new_field );
				break;

			case 'list':
				$new_field['field_options']['repeat'] = 1;
				$new_field['field_options']['format'] = 'grid';

				if ( isset( $field['maxRows'] ) && $field['maxRows'] ) {
					$new_field['field_options']['repeat_limit'] = $field['maxRows'];
				}

				break;

			case 'number':
				$this->prep_number_field( $field, $new_field );
				break;

			case 'option':
				$this->prepare_options_for_select( $field, $new_field );
				$new_field['field_options']['data_type']   = $field['inputType'];
				$new_field['field_options']['gf_option']   = true;
				$new_field['field_options']['option_prod'] = (int) $field['productField'];

				break;

			case 'page':
				if ( isset( $field['nextButton']['text'] ) ) {
					$new_field['name'] = $field['nextButton']['text'];
				}

				break;

			case 'password':
				$this->prep_password_field( $field, $new_field );
				break;

			case 'phone':
				$this->prep_phone_field( $field, $new_field );
				break;

			case 'post_content':
				if ( isset( $this->current_source_form['postContentTemplateEnabled'] ) &&
						$this->current_source_form['postContentTemplateEnabled'] ) {

					$this->post_fields['post_content'] = $this->current_source_form['postContentTemplate'];
				} else {
					$this->post_fields['post_content'] = $field['id'];
				}

				$new_field['field_options']['post_field'] = 'post_content';

				break;

			case 'post_excerpt':
				$this->post_fields['post_excerpt'] = $field['id'];
				$new_field['field_options']['post_field'] = 'post_excerpt';

				break;

			case 'post_image':
				$this->prep_post_image_field( $field, $new_field );
				break;

			case 'post_tags':
				if ( ! isset( $this->post_fields['post_category'] ) || ! is_array( $this->post_fields['post_category'] ) ) {
					$this->post_fields['post_category'] = array();
				}

				$index = count( $this->post_fields['post_category'] );
				$this->post_fields['post_category'][ 'post_tag' . $index ] = array(
					'meta_name' => 'post_tag',
					'field_id'  => $field['id'],
				);

				$new_field['field_options']['post_field'] = 'post_category';
				$new_field['field_options']['taxonomy']   = 'post_tag';

				break;

			case 'post_title':
				$this->post_fields['the_post_title'] = $field['id'];
				$new_field['field_options']['post_field'] = 'post_title';

				break;

			case 'post_category':
				if ( ! isset( $this->post_fields['post_category'] ) || ! is_array( $this->post_fields['post_category'] ) ) {
					$this->post_fields['post_category'] = array();
				}

				$index = count( $this->post_fields['post_category'] );
				$this->post_fields['post_category'][ 'category' . $index ] = array(
					'meta_name' => 'category',
					'field_id'  => $field['id'],
				);

				if ( isset( $this->current_source_form['postCategory'] ) && ! empty( $this->current_source_form['postCategory'] ) ) {
					$new_field['field_options']['dyn_default_value'] = $this->current_source_form['postCategory'];
				}

				$new_field['field_options']['post_field'] = 'post_category';

				break;

			case 'post_custom_field':
				if ( ! isset( $this->post_fields['post_custom_fields'] ) || ! is_array( $this->post_fields['post_custom_fields'] ) ) {
					$this->post_fields['post_custom_fields'] = array();
				}

				if ( isset( $field['postCustomFieldName'] ) && ! empty( $field['postCustomFieldName'] ) ) {
					$this->post_fields['post_custom_fields'][ $field['postCustomFieldName'] ] = array(
						'meta_name' => $field['postCustomFieldName'],
						'field_id'  => $field['id'],
					);

					$new_field['field_options']['post_field']   = 'post_custom';
					$new_field['field_options']['custom_field'] = $field['postCustomFieldName'];
				}

				break;

			case 'product':
				$this->prep_product_field( $field, $new_field );
				break;

			case 'quantity':
				$this->prep_quantity_field( $field, $new_field );
				break;

			case 'shipping':
				$this->prep_shipping_field( $field, $new_field );
				break;

			case 'time':
				$this->prep_time_field( $field, $new_field );
				break;
		}
	}

	private function prep_default_values( $field, &$new_field ) {
		if ( FrmAppHelper::pro_is_installed() ) {
			$tags_array = $this->merge_tag_map();
			$gf_tags    = array_keys( $tags_array );
			$frm_tags   = array_values( $tags_array );

			if ( isset( $field['defaultValue'] ) && ! empty( $field['defaultValue'] ) ) {
				$field['defaultValue'] = str_replace( $gf_tags, $frm_tags, $field['defaultValue'] );
			}

			if ( isset( $field['placeholder'] ) && ! empty( $field['placeholder'] ) ) {
				$field['placeholder'] = str_replace( $gf_tags, $frm_tags, $field['placeholder'] );
			}
		}

		if ( isset( $field['defaultValue'] ) && ! empty( $field['defaultValue'] ) ) {
			$new_field['default_value'] = $field['defaultValue'];
		}

		if ( isset( $field['placeholder'] ) && ! empty( $field['placeholder'] ) ) {
			$new_field['field_options']['placeholder']    = $field['placeholder'];
			$new_field['field_options']['clear_on_focus'] = 1;
		}
	}

	private function prep_address_field( $field, &$new_field ) {
		$new_field['field_options']['address_type'] = $this->prepare_address_type( $field['addressType'] );
		$new_field['field_options']['placeholder']  = array();
		$new_field['default_value']                 = array();
		$prepopulate = isset( $field['allowsPrepopulate'] ) && $field['allowsPrepopulate'];

		$map = array(
			'1' => 'line1',
			'2' => 'line2',
			'3' => 'city',
			'4' => 'state',
			'5' => 'zip',
			'6' => 'country',
		);

		foreach ( $field['inputs'] as $input ) {

			$sub_field = str_replace( $field['id'] . '.', '', $input['id'] );
			if ( ! isset( $map[ $sub_field ] ) ) {
				continue;
			}

			$this->set_input_label( $new_field, $input, $map[ $sub_field ] . '_desc' );
			$this->set_input_placeholder( $new_field, $input, $map[ $sub_field ] );

			if ( 'state' === $map[ $sub_field ] ) {
				$default = isset( $input['defaultValue'] ) ? $input['defaultValue'] : $field['defaultState'];
			} elseif ( 'country' === $map[ $sub_field ] ) {
				$default = isset( $input['defaultValue'] ) ? $input['defaultValue'] : $field['defaultCountry'];
			} else {
				$default = isset( $input['defaultValue'] ) ? $input['defaultValue'] : '';
			}

			$this->set_address_default_val( $new_field, $prepopulate, $input['name'], $map[ $sub_field ], $default );
		}
	}

	private function prep_captcha_field( $field, &$new_field ) {
		$new_field['field_options']['label'] = 'none';
		if ( isset( $field['captchaTheme'] ) && ! empty( $field['captchaTheme'] ) ) {
			$new_field['field_options']['captcha_theme'] = $field['captchaTheme'];
		}

		$new_field['required'] = 0;
		$this->save_recaptcha_keys();
	}

	private function prep_consent_field( $field, &$new_field ) {
		$new_field['options'] = array(
			array(
				'label' => $field['checkboxLabel'],
				'value' => $field['checkboxLabel'],
			),
		);
	}

	private function prep_credit_card_field( $field, &$new_field ) {
		$new_field['field_options']['save_cc']     = '4';
		$new_field['field_options']['placeholder'] = array();

		// Gravity always leaves this blank on the front-end, in fact it can't be set at the back-end.
		$new_field['field_options']['year_desc'] = '';

		$map = array(
			'1'       => 'cc',
			'2_month' => 'month',
			'2_year'  => 'year',
			'3'       => 'cvc',
		);

		foreach ( $field['inputs'] as $input ) {

			$sub_field = str_replace( $field['id'] . '.', '', $input['id'] );
			if ( ! isset( $map[ $sub_field ] ) ) {
				continue;
			}

			$this->set_input_placeholder( $new_field, $input, $map[ $sub_field ] );

			if ( '2_month' === $sub_field ) {
				$this->set_input_label( $new_field, $input, $map[ $sub_field ] . '_desc', 'defaultLabel' );
			} elseif ( '2_year' !== $sub_field ) {
				$this->set_input_label( $new_field, $input, $map[ $sub_field ] . '_desc' );
			}
		}
	}

	private function prep_date_field( $field, &$new_field ) {
		$format       = isset( $field['dateFormat'] ) ? $field['dateFormat'] : 'mdy';
		$format       = $this->prepare_date_format( $format );
		$frm_settings = FrmProAppHelper::get_settings();
		if ( ! isset( $frm_settings->date_format ) || $frm_settings->date_format !== $format ) {
			$frm_settings->date_format = $format;
			$frm_settings->store();
		}
	}

	private function prep_email_field( $field, &$new_field ) {
		if ( ! isset( $field['emailConfirmEnabled'] ) || ! $field['emailConfirmEnabled'] ) {
			return;
		}

		if ( ! FrmAppHelper::pro_is_installed() ) {
			return;
		}

		$new_field['field_options']['conf_field'] = 'inline';

		$conf_input = $field['inputs'][1];

		if ( isset( $conf_input['placeholder'] ) ) {
			$new_field['field_options']['conf_input'] = $conf_input['placeholder'];
		}

		$label = isset( $conf_input['customLabel'] ) ? $conf_input['customLabel'] : $conf_input['label'];
		$new_field['field_options']['conf_desc'] = $label;

		$desc = isset( $field['inputs'][0]['customLabel'] ) ? $field['inputs'][0]['customLabel'] : $field['inputs'][0]['label'];
		$new_field['description'] = $desc;

		if ( isset( $field['inputs'][0]['placeholder'] ) ) {
			$new_field['field_options']['placeholder'] = $field['inputs'][0]['placeholder'];
		}
	}

	private function prep_file_field( $field, &$new_field ) {
		$this->get_allowed_file_types( $field, $new_field );

		if ( isset( $field['multipleFiles'] ) && $field['multipleFiles'] ) {
			$new_field['field_options']['multiple'] = 1;
		}

		if ( isset( $field['maxFiles'] ) && $field['maxFiles'] ) {
			$new_field['field_options']['max'] = $field['maxFiles'];
		}

		if ( isset( $field['maxFileSize'] ) && $field['maxFileSize'] ) {
			$new_field['field_options']['size'] = $field['maxFileSize'];
		}

		$this->maybe_attach_file_to_notification( $new_field );
	}

	private function prep_html_field( $field, &$new_field ) {
		$new_field['description'] = empty( $field['content'] ) ? '' : $field['content'];
		if ( empty( $new_field['description'] ) || ! FrmAppHelper::pro_is_installed() ) {
			return;
		}

		$new_field['description'] = $this->replace_smart_tags( $new_field['description'] );
	}

	private function prep_number_field( $field, &$new_field ) {
		if ( isset( $field['rangeMax'] ) ) {
			$new_field['field_options']['maxnum'] = $field['rangeMax'];
		}

		if ( isset( $field['rangeMin'] ) ) {
			$new_field['field_options']['minnum'] = $field['rangeMin'];
		}

		if ( ! isset( $field['enableCalculation'] ) || ! $field['enableCalculation'] || ! FrmAppHelper::pro_is_installed() ) {
			return;
		}

		$no_round = ! isset( $field['calculationRounding'] ) || empty( $field['calculationRounding'] ) || 'norounding' === $field['calculationRounding'];
		$new_field['field_options']['calc_dec'] = $no_round ? '16' : $field['calculationRounding'];

		if ( isset( $field['calculationFormula'] ) && ! empty( $field['calculationFormula'] ) ) {
			$new_field['field_options']['calc'] = $this->shorten_smart_tag( $field['calculationFormula'] );
		}
	}

	private function prep_password_field( $field, &$new_field ) {
		// gf's password always has confirmation.
		$new_field['field_options']['conf_field'] = 'inline';

		$conf_input = $field['inputs'][1];

		if ( isset( $conf_input['placeholder'] ) ) {
			$new_field['field_options']['conf_input'] = $conf_input['placeholder'];
		}

		$label = isset( $conf_input['customLabel'] ) ? $conf_input['customLabel'] : $conf_input['label'];
		$new_field['field_options']['conf_desc'] = $label;

		$desc = isset( $field['inputs'][0]['customLabel'] ) ? $field['inputs'][0]['customLabel'] : $field['inputs'][0]['label'];
		$new_field['description'] = $desc;

		if ( isset( $field['inputs'][0]['placeholder'] ) ) {
			$new_field['field_options']['placeholder'] = $field['inputs'][0]['placeholder'];
		}

		if ( isset( $field['passwordStrengthEnabled'] ) && $field['passwordStrengthEnabled'] &&
			isset( $field['minPasswordStrength'] ) && ! empty( $field['minPasswordStrength'] ) ) {

			$new_field['field_options']['strong_pass']    = 1;
			$new_field['field_options']['strength_meter'] = 1;
		}
	}

	private function prep_phone_field( $field, &$new_field ) {
		if ( isset( $field['phoneFormat'] ) && 'standard' === $field['phoneFormat'] ) {
			$new_field['field_options']['format'] = '(999) 999-9999';
		}
	}

	private function prep_post_image_field( $field, &$new_field ) {
		if ( isset( $field['maxFileSize'] ) && $field['maxFileSize'] ) {
			$new_field['field_options']['size'] = $field['maxFileSize'];
		}

		if ( isset( $field['multipleFiles'] ) && $field['multipleFiles'] ) {
			$new_field['field_options']['multiple'] = 1;
		}

		$this->get_allowed_file_types( $field, $new_field );
		$this->maybe_attach_file_to_notification( $new_field );

		if ( ! isset( $field['postFeaturedImage'] ) || ! $field['postFeaturedImage'] ) {
			return;
		}

		if ( ! isset( $this->post_fields['post_custom_fields'] ) || ! is_array( $this->post_fields['post_custom_fields'] ) ) {
			$this->post_fields['post_custom_fields'] = array();
		}

		$this->post_fields['post_custom_fields']['_thumbnail_id'] = array(
			'meta_name' => '_thumbnail_id',
			'field_id'  => $field['id'],
		);
		$new_field['field_options']['multiple']     = 0;
		$new_field['field_options']['post_field']   = 'post_custom';
		$new_field['field_options']['custom_field'] = '_thumbnail_id';
	}

	private function prep_product_field( $field, &$new_field ) {
		$this->prepare_options_for_select( $field, $new_field );

		$currency   = get_option( 'rg_gforms_currency' );
		$currencies = FrmProCurrencyHelper::get_currencies();

		// only set it when it's in our list of currencies.
		$currency_is_set = isset( $currency ) && ! empty( $currency ) && isset( $currencies[ $currency ] );
		if ( $currency_is_set ) {
			$frm_settings = FrmProAppHelper::get_settings();
			if ( ! isset( $frm_settings->currency ) || $frm_settings->currency !== $currency ) {
				$frm_settings->currency = $currency;
				$frm_settings->store();
			}
		}

		if ( 'calculation' === $field['inputType'] ) {
			// then we're actually using a number field.
			if ( isset( $field['calculationFormula'] ) && ! empty( $field['calculationFormula'] ) ) {
				$new_field['field_options']['calc'] = $this->shorten_smart_tag( $field['calculationFormula'] );
			}
			$new_field['field_options']['calc_dec'] = $currency_is_set ? $currencies[ $currency ]['decimals'] : 2;

			// Would have loved not to make this a per product type thing, but inputTypes like 'select'
			// and 'radio' also have this, set to false, yet they don't have companion quantity fields.
			$this->maybe_add_quantity_field( $new_field, $field );
		} else {
			$new_field['field_options']['data_type'] = $this->prepare_product_type( $field['inputType'] );
		}

		if ( 'singleproduct' === $field['inputType'] || 'hiddenproduct' === $field['inputType'] ) {
			$new_field['options'] = array(
				array(
					'label' => $new_field['name'],
					'price' => $field['basePrice'],
					/* @todo : should we sanitize_text_field() this? maybe not, cos of e.g. logic that might be using it */
					'value' => $field['label'],
				),
			);
		}

		if ( 'singleproduct' === $field['inputType'] ) {
			$this->maybe_add_quantity_field( $new_field, $field );
		}

		if ( 'hiddenproduct' === $field['inputType'] ) {
			$new_field['field_options']['classes'] .= ' frm_hidden';
		}
	}

	private function prep_quantity_field( $field, &$new_field ) {
		if ( isset( $field['rangeMax'] ) && ! empty( $field['rangeMax'] ) ) {
			$new_field['field_options']['maxnum'] = $field['rangeMax'];
		}

		if ( isset( $field['rangeMin'] ) && ! empty( $field['rangeMin'] ) ) {
			$new_field['field_options']['minnum'] = $field['rangeMin'];
		}

		if ( isset( $field['productField'] ) && $field['productField'] ) {
			// cast to int 1st, it's usually int though, but to be double sure,
			// we'll use it with in_array( , , TRUE ) later on - note the TRUE.
			$field['productField'] = (int) $field['productField'];
			$new_field['field_options']['product_field'] = (array) $field['productField'];
		}

		if ( isset( $field['inputType'] ) && 'hidden' === $field['inputType'] ) {
			$new_field['field_options']['classes'] .= 'frm_hidden';
		}

		// For the dropdown type, perhaps we may put in the how-to instructions that they'll
		// need to do custom calc : set up a hidden field to multiply the quantity field with
		// its corresponding product field, then use the hidden field in the calculation of total.
	}

	private function prep_shipping_field( $field, &$new_field ) {
		$new_field['field_options']['data_type'] = 'singleshipping' === $field['inputType'] ? 'single' : $field['inputType'];

		if ( 'singleshipping' === $field['inputType'] ) {
			$new_field['options'] = array(
				array(
					'label' => $new_field['name'],
					'price' => $field['basePrice'],
					// @todo : should we sanitize_text_field() this? maybe not, cos of e.g. logic that might be using it.
					'value' => $field['label'],
				),
			);
		} else {
			$this->prepare_options_for_select( $field, $new_field );
		}
	}

	private function prep_time_field( $field, &$new_field ) {
		if ( isset( $field['timeFormat'] ) && ! empty( $field['timeFormat'] ) ) {
			$new_field['field_options']['clock'] = $field['timeFormat'];
		}

		$new_field['field_options']['step'] = 1;
	}

	private function get_allowed_file_types( $field, &$new_field ) {
		$allowed_extensions = isset( $field['allowedExtensions'] ) ? trim( $field['allowedExtensions'] ) : '';
		if ( $allowed_extensions ) {
			$allowed_extensions = explode( ',', $allowed_extensions );
			$mimes              = get_allowed_mime_types();
			$ftypes             = array();

			foreach ( $allowed_extensions as $allowed ) {

				foreach ( $mimes as $ext => $mime ) {
					if ( false !== strpos( $ext, trim( $allowed ) ) ) {
						$ftypes[ $ext ] = $mime;
						break;
					}
				}
			}

			if ( ! empty( $ftypes ) ) {
				$new_field['field_options']['restrict'] = 1;
				$new_field['field_options']['ftypes']   = $ftypes;
			}
		}
	}

	private function maybe_attach_file_to_notification( &$new_field ) {
		if ( isset( $this->current_source_form['notifications'] ) && is_array( $this->current_source_form['notifications'] ) &&
				! empty( $this->current_source_form['notifications'] ) ) {
			// Check if at least 1 notification has attachments enabled. The Save and
			// Continue notification doesn't have it, so need to check for that here.
			foreach ( $this->current_source_form['notifications'] as $notif ) {
				if ( isset( $notif['isActive'] ) && $notif['isActive'] &&
						isset( $notif['enableAttachments'] ) && $notif['enableAttachments'] ) {

					$new_field['field_options']['attach'] = 1;
					break;
				}
			}
		}
	}

	private function prepare_field_for_pro( $field, &$new_field ) {

		if ( isset( $field['inputMask'] ) && $field['inputMask'] ) {
			$new_field['field_options']['format'] = $field['inputMaskValue'];
		}

		if ( isset( $field['noDuplicates'] ) && $field['noDuplicates'] ) {
			$new_field['field_options']['unique'] = 1;
		}

		if ( isset( $field['visibility'] ) && ! empty( $field['visibility'] ) ) {
			$new_field['field_options']['admin_only'] = $this->prepare_field_visibility( $field['visibility'] );
		}

		if ( isset( $field['conditionalLogic'] ) && is_array( $field['conditionalLogic'] ) && ! empty( $field['conditionalLogic'] ) ) {
			$new_field['field_options']['show_hide'] = $field['conditionalLogic']['actionType'];
			$new_field['field_options']['any_all']   = $field['conditionalLogic']['logicType'];
			$new_field['field_options']              = array_merge( $new_field['field_options'], $this->get_logic_rules( $field['conditionalLogic']['rules'] ) );
		}

		if ( $this->can_prepopulate( $new_field['type'] ) &&
			 isset( $field['allowsPrepopulate'] ) &&
			 $field['allowsPrepopulate'] && isset( $field['inputName'] ) && ! empty( $field['inputName'] ) ) {
			// We've seen from created form samples that dynamically population takes precedence. For
			// now, the only Gravity pre-population type that Formidable supports is the query string.
			$this->get_dynamic_default_value( $new_field, sprintf( '[get param=%s]', $field['inputName'] ) );
		}

		if ( isset( $field['cssClass'] ) && false !== strpos( $field['cssClass'], 'gf_readonly' ) ) {
			$new_field['field_options']['read_only'] = 1;
		}
	}

	private function get_dynamic_default_value( &$new_field, $value ) {
		$field_obj = FrmFieldFactory::get_field_type( $new_field['type'] );
		$display   = $field_obj->display_field_settings();

		if ( isset( $display['default_value'] ) && $display['default_value'] ) {
			$new_field['field_options']['dyn_default_value'] = $value;
		} else {
			$new_field['default_value'] = $value;
		}
		unset( $field_obj );
	}

	/**
	 * Link an option to a quantity.
	 *
	 * @param array $form Form to be imported with its (newly constructed) fields.
	 */
	private function maybe_add_option_field_to_quantity( &$form ) {
		$products   = array();
		$options    = array();
		$quantities = array();
		foreach ( $form['fields'] as $key => $field ) {
			if ( isset( $field['field_options']['gf_option'] ) ) {
				// gf Option field.
				$options[ $key ]    = $field;
			} else if ( 'product' == $field['type'] ) {
				$products[ $key ]   = $field;
			} else if ( 'quantity' == $field['type'] ) {
				$quantities[ $key ] = $field;
			}
		}

		if ( empty( $products ) || empty( $quantities ) || empty( $options ) ) {
			return;
		}

		if ( 1 === count( $products ) && 1 === count( $quantities ) ) {
			// When only one product exists, Option and Quantity will automatically apply to that product.
			$key = array_key_first( $quantities );

			// double check if the quantity field is already mapped to the product, if not, then do it now.
			if ( ! isset( $quantities[ $key ]['field_options']['product_field'] ) ||
				empty( $quantities[ $key ]['field_options']['product_field'] ) ) {

				$pkey = array_key_first( $products );
				$form['fields'][ $key ]['field_options']['product_field']   = array();
				$form['fields'][ $key ]['field_options']['product_field'][] = $products[ $pkey ]['field_options']['gravity_id'];
			}

			if ( 1 === count( $options ) ) {
				$okey = array_key_first( $options );
				$form['fields'][ $key ]['field_options']['product_field'][] = $options[ $okey ]['field_options']['gravity_id'];
			}

			return;
		}

		foreach ( $quantities as $i => $quantity ) {
			foreach ( $options as $option ) {
				if ( $this->is_quantity_matched_to_option_product( $quantity, $option ) ) {
					$form['fields'][ $i ]['field_options']['product_field'][] = $option['field_options']['gravity_id'];
					break;
				}
			}
		}
	}

	private function is_quantity_matched_to_option_product( $quantity, $option ) {
		return isset( $option['field_options']['option_prod'] ) &&
				isset( $quantity['field_options']['product_field'] ) &&
				is_array( $quantity['field_options']['product_field'] ) &&
				in_array( $option['field_options']['option_prod'], $quantity['field_options']['product_field'], true );
	}

	private function prepare_product_type( $type ) {
		$types = array(
			'singleproduct' => 'single',
			'price'         => 'user_def',
			'hiddenproduct' => 'single',
		);
		return isset( $types[ $type ] ) ? $types[ $type ] : $type;
	}

	private function can_prepopulate( $type ) {
		return ! in_array( $type, array( 'divider|repeat', 'divider' ) );
	}

	private function prepare_options_for_select( $field, &$new_field ) {
		if ( 'product' === $field['type'] && ! in_array( $field['inputType'], array( 'radio', 'select' ) ) ) {
			return;
		}

		$new_options = array();
		foreach ( $field['choices'] as $key => $option ) {
			$new_options[ $key ] = array(
				'label' => $option['text'],
				'value' => $option['value'],
			);

			if ( 'product' === $new_field['type'] ) {
				$new_options[ $key ]['price'] = $option['price'];
			}

			if ( ! empty( $option['isSelected'] ) ) {
				if ( is_array( $new_field['default_value'] ) ) {
					$new_field['default_value'][] = $option['value'];
				} else if ( ! empty( $new_field['default_value'] ) ) {
					$new_field['default_value'] = array( $new_field['default_value'] );
					$new_field['default_value'][] = $option['value'];
				} else {
					$new_field['default_value'] = $option['value'];
				}
			}
		}

		if ( isset( $field['enableOtherChoice'] ) && $field['enableOtherChoice'] && FrmAppHelper::pro_is_installed() ) {
			$new_field['field_options']['other'] = 1;
			$new_options[ 'other_' . count( $new_options ) ]  = __( 'Other', 'formidable-pro' );
		}

		$new_field['options'] = $new_options;
		$new_field['field_options']['separate_value'] = isset( $field['enableChoiceValue'] ) && $field['enableChoiceValue'] ? 1 : 0;
	}

	private function prep_sub_field( $field, $input ) {
		$label = isset( $input['customLabel'] ) && ! empty( $input['customLabel'] ) ? $input['customLabel'] : $input['label'];

		$inner_field = array(
			'id'             => isset( $input['id'] ) ? $input['id'] : $field['id'],
			'labelPlacement' => 'empty_label',
			'isRequired'     => false,
			'description'    => $label,
			'label'          => $label,
			'name'           => $label,
			'cssClass'       => 'gf_inline',
			'type'           => 'text',
		);

		$params = array( 'defaultValue', 'placeholder', 'errorMessage', 'allowsPrepopulate', 'conditionalLogic' );
		foreach ( $params as $param ) {
			if ( isset( $input[ $param ] ) ) {
				$inner_field[ $param ] = $input[ $param ];
			}
		}

		if ( isset( $input['name'] ) ) {
			$inner_field['inputName'] = $input['name'];
		}

		return $inner_field;
	}

	private function prepare_quantity_field( $field ) {
		$inner_field = array(
			'id'             => '',
			'labelPlacement' => 'top_label',
		);

		// 'inputs', most likely, will be set though, let's just be more cautious.
		$inner_field['name']       = isset( $field['inputs'] ) && isset( $field['inputs'][2] ) ?
									 $field['inputs'][2]['label'] : __( 'Quantity', 'gravityforms' );
		$inner_field['type']       = 'quantity';
		$inner_field['isRequired'] = false;

		$inner_field['cssClass']   = 'gf_inline';

		// calculation type is converted to number, so they'll have to set up custom calculation.
		// We'll add its companion quantity field, but we won't connect them - to avoid future errors.
		if ( 'calculation' !== $field['inputType'] ) {
			$inner_field['productField'] = $field['id'];
		}

		return $inner_field;
	}

	private function maybe_add_quantity_field( &$new_field, $field ) {
		if ( isset( $field['disableQuantity'] ) && $field['disableQuantity'] ) {
			return;
		}

		$field_order         = $new_field['field_order'];
		$new_field['fields'] = array(); // (inner) fields to be merged into the form
		$inner_field         = $this->prepare_quantity_field( $field );

		// increase field_order by 1, so that it comes after the product field.
		$this->add_quantity_field( $inner_field, $new_field, ++$field_order );

		// update the main form's field_order, ready to be used.
		$new_field['current_order'] = ++$field_order;

		$new_field['field_options']['classes'] .= ' frm_first frm_inline';
	}

	private function add_quantity_field( $inner_field, &$main_new_field, $field_order ) {
		$new_field                = FrmFieldsHelper::setup_new_vars( $inner_field['type'] );
		$new_field['name']        = $inner_field['name'];
		$new_field['field_order'] = $field_order;
		$new_field['original']    = $inner_field['type'];

		$this->prepare_field( $inner_field, $new_field );

		$main_new_field['fields'][] = $new_field;
	}

	private function prepare_label_position( $position ) {
		$positions = array(
			'top_label'    => 'top',
			'left_label'   => 'left',
			'right_label'  => 'right',
			'hidden_label' => 'none',
			/* gf doesn't have this though, it's here for convenience sake as we used this for e.g. name field */
			'empty_label'  => 'hidden',
		);
		return isset( $positions[ $position ] ) ? $positions[ $position ] : '';
	}

	private function prepare_field_visibility( $visibility ) {
		$options = array(
			'visible'        => '',
			'hidden'         => 'administrator',
			'administrative' => 'administrator',
		);
		return isset( $options[ $visibility ] ) ? $options[ $visibility ] : '';
	}

	private function prepare_address_type( $type ) {
		$options = array(
			'international' => 'international',
			'us'            => 'us',
		);
		return isset( $options[ $type ] ) ? $options[ $type ] : 'international';
	}

	private function prepare_date_format( $format ) {
		$formats = array(
			'mdy'       => 'm/d/Y',
			'dmy'       => 'd/m/Y',
			/* Formidable doesn't have d-m-Y. */
			'dmy_dash'  => 'd.m.Y',
			'dmy_dot'   => 'd.m.Y',
			'ymd_slash' => 'Y/m/d',
			'ymd_dash'  => 'Y-m-d',
			/* Formidable doesn't have Y.m.d. */
			'ymd_dot'   => 'Y-m-d',
		);
		return isset( $formats[ $format ] ) ? $formats[ $format ] : 'm/d/Y';
	}

	private function set_input_placeholder( &$new_field, $input, $frm_key ) {
		$new_field['field_options']['placeholder'][ $frm_key ] = isset( $input['placeholder'] ) ? $input['placeholder'] : '';
	}

	private function set_input_label( &$new_field, $input, $frm_key, $label_key = 'label' ) {
		$new_field['field_options'][ $frm_key ] = isset( $input['customLabel'] ) && ! empty( $input['customLabel'] ) ?
													$input['customLabel'] : $input[ $label_key ];
	}

	private function set_address_default_val( &$new_field, $prepopulate, $name, $frm_key, $default_value ) {
		$new_field['default_value'][ $frm_key ] = $prepopulate && ! empty( $name ) ? sprintf( '[get param=%s]', $name ) : $default_value;
	}

	/**
	 * Replace Gravity tags/shortcodes with our own Tags.
	 *
	 * @param string $string String to process the smart tag in.
	 * @param array $fields List of fields for the form.
	 *
	 * @return string
	 */
	protected function replace_smart_tags( $string, $fields = array() ) {
		if ( is_array( $string ) || strpos( $string, '{' ) === false ) {
			return $string;
		}

		$tags_array = $this->merge_tag_map();
		$gf_tags    = array_keys( $tags_array );
		$frm_tags   = array_values( $tags_array );

		$string = $this->shorten_smart_tag( $string );
		$string = str_replace( $gf_tags, $frm_tags, $string );

		$this->replace_field_smart_tags( $string );

		return $string;
	}

	private function merge_tag_map( $merge_tag = '' ) {
		$form = $this->current_source_form;

		$merge_tags = array(
			'{ip}'                    => '[ip]',
			'{embed_post:ID}'         => '[post_id]',
			'{embed_post:post_title}' => '[post_title]',
			'{date_mdy}'              => '[date format="m/d/Y"]',
			'{date_dmy}'              => '[date format="d/m/Y"]',
			'{embed_url}'             => '[server param=REQUEST_URI]',
			'{entry_id}'              => '[id]',
			'{entry_url}'             => '[siteurl]/wp-admin/admin.php?page=formidable-entries&frm_action=edit&id=[id]',
			'{form_id}'               => '',
			'{form_title}'            => $form ? $form['title'] : '',
			'{user_agent}'            => '[server param=HTTP_USER_AGENT]',
			'{referer}'               => '[server param=HTTP_REFERER]',
			'{user:display_name}'     => '[display_name]',
			'{user:user_email}'       => '[email]',
			'{user:user_login}'       => '[login]',
			'{admin_email}'           => '[admin_email]',
		);

		if ( empty( $merge_tag ) ) {
			return $merge_tags;
		}

		return isset( $merge_tags[ $merge_tag ] ) ? $merge_tags[ $merge_tag ] : '';
	}

	private function replace_field_smart_tags( &$string ) {
		$field_tags = $this->field_merge_tag_map( $string );
		$gf_tags    = array_keys( $field_tags );
		$frm_tags   = array_values( $field_tags );

		$string = str_replace( $gf_tags, $frm_tags, $string );

		$this->maybe_clear_field_shortcodes( $string );
	}

	private function field_merge_tag_map() {
		$map = array();
		foreach ( $this->fields_map as $old_id => $new_id ) {
			$map[ '{' . $old_id . '}' ] = '[' . $new_id . ']';
		}
		return $map;
	}

	private function maybe_clear_field_shortcodes( &$string ) {
		if ( is_array( $string ) ) {
			return;
		}

		preg_match_all( '/\{(\d+)\}/', $string, $ids );

		if ( ! isset( $ids[1] ) || empty( $ids[1] ) ) {
			return;
		}

		foreach ( $ids[1] as $id ) {
			if ( ! isset( $this->fields_map[ $id ] ) ) {
				// Better to unset than use a wrong field.
				$string = str_replace( '{' . $id . '}', '', $string );
				$string = preg_replace( '/\,\s*\,/', ',', $string );
			}
		}
	}

	private function shorten_smart_tag( $value ) {
		/**
		 * GF calc field's merge tag is like so : {Field Name:2:modifier}, the modifier being optional.
		 *
		 * @link https://docs.gravityforms.com/number#merge-tags
		 */
		return preg_replace( $this->tag_regex(), '{$1}', $value );
	}

	private function tag_regex() {
		return '/\{\s*[^\}]*\s*:\s*(\d+)(\.\d+)?\s*(:[^\}]*)?\}/';
	}

	private function prepare_css_classes( $class = '' ) {
		$classes = array(
			'gf_left_half'      => 'frm_first frm_half',
			'gf_right_half'     => 'frm_half frm_alignright',
			'gf_left_third'     => 'frm_third frm_first',
			'gf_middle_third'   => 'frm_third',
			'gf_right_third'    => 'frm_third frm_alignright',
			'gf_first_quarter'  => 'frm_first frm_fourth',
			'gf_second_quarter' => 'frm_fourth',
			'gf_third_quarter'  => 'frm_fourth',
			'gf_fourth_quarter' => 'frm_fourth frm_alignright',
			'gf_inline'         => 'frm_inline',
			'gf_list_2col'      => 'frm_two_col',
			'gf_list_3col'      => 'frm_three_col',
			'gf_list_4col'      => 'frm_four_col',
			'gf_scroll_text'    => 'frm_scroll_box',
		);

		if ( empty( $class ) ) {
			return $classes;
		}

		return isset( $classes[ $class ] ) ? $classes[ $class ] : '';
	}

	protected function convert_field_type( $type, $field = array(), $use = '' ) {
		$type = parent::convert_field_type( $type, $field, $use );

		$field_types = array(
			'consent'      => 'checkbox',
			'creditcard'   => 'credit_card',
			'fileupload'   => 'file',
			'list'         => 'divider|repeat',
			'multiselect'  => 'select',
			'name'         => 'text',
			'option'       => 'product',
			'page'         => 'break',
			'post_content' => 'rte',
			'post_excerpt' => 'textarea',
			'post_image'   => 'file',
			'post_tags'    => 'tag',
			'post_title'   => 'text',
			'section'      => 'divider',
			'shipping'     => 'product',
			'username'     => 'text',
			'website'      => 'url',
		);

		if ( isset( $field_types[ $type ] ) ) {
			$type = $field_types[ $type ];

		} else if ( 'text' === $type && isset( $field['enablePasswordInput'] ) && $field['enablePasswordInput'] ) {
			$type = 'password';

		} else if ( 'textarea' === $type && isset( $field['useRichTextEditor'] ) && $field['useRichTextEditor'] ) {
			$type = 'rte';

		} else if ( 'post_category' === $type ) {
			$type = $this->convert_field_type( $field['type'], $field, $field['inputType'] );

		} else if ( 'post_custom_field' === $type ) {
			$type = $this->get_post_custom_field_type( $field );

		} else if ( 'product' === $type && 'calculation' === $field['inputType'] ) {
			$type = 'number';
		}

		return $type;
	}

	private function get_post_custom_field_type( $field ) {
		if ( isset( $field['useRichTextEditor'] ) && $field['useRichTextEditor'] ) {
			return 'rte';
		}

		return $this->convert_field_type( $field['type'], $field, $field['inputType'] );
	}

	protected function prepare_form( $form, &$new_form ) {
		$new_form['description'] = $form['description'];

		if ( isset( $form['notifications'] ) ) {
			$new_form['notifications'] = $form['notifications'];
		}

		$this->get_form_options( $form, $new_form );

		if ( FrmAppHelper::pro_is_installed() ) {
			$this->get_form_pro_options( $form, $new_form );
		}
	}

	protected function get_form_options( $form, &$new_form ) {
		$options = array();

		if ( ! empty( $form['button']['text'] ) ) {
			$options['submit_value'] = $form['button']['text'];
		}

		if ( isset( $form['cssClass'] ) ) {
			$options['form_class'] = $form['cssClass'];
		}

		if ( ! isset( $form['confirmations'] ) || ! is_array( $form['confirmations'] ) || empty( $form['confirmations'] ) ) {
			$new_form['options'] = array_merge( $new_form['options'], $options );
			return;
		}

		foreach ( $form['confirmations'] as $conf ) {
			if ( isset( $conf['isDefault'] ) && $conf['isDefault'] && ! isset( $conf['event'] ) ) {
				$default_conf = $conf;
				break;
			}
		}

		if ( isset( $default_conf ) ) {
			if ( 'message' === $default_conf['type'] ) {
				$options['success_action'] = 'message';
				$options['success_msg']    = $default_conf['message'];

			} else if ( 'page' === $default_conf['type'] && isset( $default_conf['queryString'] ) && ! empty( $default_conf['queryString'] ) ) {
				$qarg = array();
				parse_str( $this->transform_query_string( $default_conf['queryString'] ), $qarg );

				$options['success_action'] = 'redirect';
				$options['success_url']    = add_query_arg( $qarg, @get_page_link( $default_conf['pageId'] ) );

			} else if ( 'page' === $default_conf['type'] ) {
				$options['success_action']  = 'page';
				$options['success_page_id'] = $default_conf['pageId'];

			} else if ( 'redirect' === $default_conf['type'] ) {
				$options['success_action'] = 'redirect';
				$options['success_url']    = $default_conf['url'];

				if ( isset( $default_conf['queryString'] ) && ! empty( $default_conf['queryString'] ) ) {
					$qarg = array();
					parse_str( $this->transform_query_string( $default_conf['queryString'] ), $qarg );

					$options['success_url'] = add_query_arg( $qarg, $options['success_url'] );
				}
			}
		}

		$new_form['options'] = array_merge( $new_form['options'], $options );
	}

	/**
	 * Replace field merge tags in redirect URL.
	 *
	 * @param string $query_string
	 *
	 * @return string
	 */
	private function transform_query_string( $query_string ) {
		$qstr = $this->shorten_smart_tag( $query_string );
		return $this->replace_smart_tags( $qstr );
	}

	protected function get_form_pro_options( $form, &$new_form ) {
		$pro_options = array();

		// Form Scheduling
		$is_schedule_limit = isset( $form['scheduleForm'] ) && $form['scheduleForm'] &&
				isset( $form['limitEntries'] ) && $form['limitEntries'] &&
				// empty 'limitEntriesPeriod' is what we support for now
				isset( $form['limitEntriesPeriod'] ) && empty( trim( $form['limitEntriesPeriod'] ) );

		$is_schedule = isset( $form['scheduleForm'] ) && $form['scheduleForm'];
		$is_limit    = isset( $form['limitEntries'] ) && $form['limitEntries'] &&
						isset( $form['limitEntriesPeriod'] ) && empty( trim( $form['limitEntriesPeriod'] ) );

		if ( $is_schedule_limit ) {
			$pro_options['open_status'] = 'schedule-limit';
			$pro_options['max_entries'] = intval( $form['limitEntriesCount'] );

		} else if ( $is_schedule ) {

			$pro_options['open_status'] = 'schedule';

		} else if ( $is_limit ) {

			$pro_options['closed_msg']  = $form['limitEntriesMessage'];
			$pro_options['open_status'] = 'limit';
			$pro_options['max_entries'] = intval( $form['limitEntriesCount'] );

		}

		if ( $is_schedule_limit || $is_schedule ) {
			$pro_options['open_date']  = $this->get_schedule_date( $form, 'Start' );
			$pro_options['close_date'] = $this->get_schedule_date( $form, 'End' );
			$pro_options['closed_msg'] = $form['scheduleMessage'];
		}

		if ( isset( $form['requireLogin'] ) && $form['requireLogin'] ) {
			$new_form['logged_in'] = true;
		}

		// Submit Button
		if ( isset( $form['button']['conditionalLogic'] ) && is_array( $form['button']['conditionalLogic'] ) && ! empty( $form['button']['conditionalLogic'] ) ) {

			$pro_options['submit_conditions']['show_hide'] = $form['button']['conditionalLogic']['actionType'];
			$pro_options['submit_conditions']['any_all']   = $form['button']['conditionalLogic']['logicType'];
			$pro_options['submit_conditions']              = array_merge( $pro_options['submit_conditions'], $this->get_logic_rules( $form['button']['conditionalLogic']['rules'] ) );
		}

		if ( isset( $form['save'] ) && is_array( $form['save'] ) ) {
			if ( isset( $form['save']['enabled'] ) && $form['save']['enabled'] ) {
				$pro_options['save_draft'] = 1;
			}

			if ( ! empty( $form['save']['button']['text'] ) ) {
				$pro_options['submit_html'] =
					str_replace( '[draft_label]', $form['save']['button']['text'], FrmFormsHelper::get_default_html( 'submit' ) );
			}
		}

		if ( isset( $form['pagination'] ) && is_array( $form['pagination'] ) && ! empty( $form['pagination'] ) ) {
			if ( isset( $form['pagination']['type'] ) && ! empty( $form['pagination']['type'] ) ) {
				$pro_options['rootline'] = $this->prepare_pagination_type( $form['pagination']['type'] );
			}

			if ( isset( $form['pagination']['pages'] )
				 && is_array( $form['pagination']['pages'] )
				 && ! empty( $form['pagination']['pages'] ) ) {

				$page_breaks = array_filter(
					$form['fields'],
					function( $field ) {
						return 'page' === $field['type'];
					}
				);
				// renumber indices from 0.
				$page_breaks = array_values( $page_breaks );

				$pro_options['rootline_titles'] = array();

				foreach ( $form['pagination']['pages'] as $index => $page ) {
					// -1 by the RHS because $page_breaks is one element < the array we're currently looping through
					$key = 0 === $index ? 0 : $page_breaks[ $index - 1 ]['id'];
					$pro_options['rootline_titles'][ $key ] = $page;
				}

				$pro_options['rootline_titles_on'] = 1;
			}
		}

		$new_form['options'] = array_merge( $new_form['options'], $pro_options );
	}

	private function prepare_pagination_type( $type ) {
		$types = array(
			'percentage' => 'progress',
			'steps'      => 'rootline',
			'none'       => '',
		);
		return isset( $types[ $type ] ) ? $types[ $type ] : '';
	}

	private function get_logic_rules( $gf_rules ) {
		$operator = array(
			'is'          => '==',
			'isnot'       => '!=',
			'<'           => '<',
			'>'           => '>',
			'contains'    => 'LIKE',
			/**
			 * Let's just do it this way for now so that e.g. the submit button can be enabled
			 * if it has conditional logic. User may need to adjust this manually.
			 */
			'starts_with' => 'LIKE',
			'ends_with'   => 'LIKE',
		);

		$rules = array(
			'hide_opt'        => array(),
			'hide_field'      => array(),
			'hide_field_cond' => array(),
		);

		foreach ( $gf_rules as $gf_rule ) {
			$rules['hide_opt'][]        = $gf_rule['value'];
			$rules['hide_field'][]      = $gf_rule['fieldId'];
			$rules['hide_field_cond'][] = $operator[ $gf_rule['operator'] ];
		}

		return $rules;
	}

	private function get_schedule_date( $form, $start_end ) {
		if ( ! isset( $form[ 'schedule' . $start_end ] ) ) {
			return '';
		}

		$minute = 1 === $form[ 'schedule' . $start_end . 'Minute' ] ? 0 : $form[ 'schedule' . $start_end . 'Minute' ];

		$_date = sprintf(
			'%s %d:%02d%s',
			$form[ 'schedule' . $start_end ],
			$form[ 'schedule' . $start_end . 'Hour' ],
			$minute,
			$form[ 'schedule' . $start_end . 'Ampm' ]
		);

		if ( false === $_date ) {
			return '';
		}

		$date_format = \DateTime::createFromFormat( 'm/d/Y g:ia', $_date );
		if ( false === $date_format ) {
			return '';
		}

		// Still check for errors - see https://www.php.net/manual/en/datetime.getlasterrors.php#102686
		$errors = $date_format->getLastErrors();
		if ( 0 === $errors['warning_count'] && 0 === $errors['error_count'] ) {
			return $date_format->format( 'Y-m-d H:i' );
		}

		return '';
	}

	private function save_recaptcha_keys() {
		// Support for the v2 Invisible reCaptcha type was introduced in Gravity Forms 2.4.7.
		// Not sure if prior versions used to store the type in the options table - they
		// might not since there was just one supported type.
		$type        = version_compare( get_option( 'rg_form_version' ), '2.4.7', '<' ) ?
						'checkbox' : get_option( 'rg_gforms_captcha_type' );

		$private_key = defined( 'GF_RECAPTCHA_PRIVATE_KEY' ) && ! empty( GF_RECAPTCHA_PRIVATE_KEY ) ?
						GF_RECAPTCHA_PRIVATE_KEY : get_option( 'rg_gforms_captcha_private_key' );

		$public_key  = defined( 'GF_RECAPTCHA_PUBLIC_KEY' ) && ! empty( GF_RECAPTCHA_PUBLIC_KEY ) ?
						GF_RECAPTCHA_PUBLIC_KEY : get_option( 'rg_gforms_captcha_public_key' );

		$has_keys    = ! empty( $private_key ) && ! empty( $public_key );

		if ( ! $has_keys ) {
			return;
		}

		$frm_settings = FrmAppHelper::get_settings();

		// Try to abstract keys from other form builder
		if ( empty( $frm_settings->pubkey ) || empty( $frm_settings->privkey ) ) {
			$frm_settings->pubkey  = $public_key;
			$frm_settings->privkey = $private_key;
			$frm_settings->re_type = ( 'invisible' === $type ) ? 'invisible' : '';
			$frm_settings->store();
		}
	}

	/**
	 * Get ALL THE FORMS.
	 *
	 * @return array[]
	 */
	public function get_forms() {

		$forms_final = array();

		$active   = GFAPI::get_forms();
		$inactive = GFAPI::get_forms( false );
		$forms    = array_merge( $active, $inactive );

		if ( ! empty( $forms ) ) {
			foreach ( $forms as $form ) {

				if ( ! is_array( $form ) ) {
					continue;
				}

				$forms_final[ $form['id'] ] = $form['title'];
			}
		}

		return $forms_final;
	}

	public function get_form( $id ) {

		$form = (array) GFAPI::get_form( $id );
		$form['id'] = $id;

		return $form;
	}

	protected function get_form_name( $form ) {
		return $form['title'];
	}

	/**
	 * Get all fields in the form and expand combo fields.
	 *
	 * @return array The fields in the form.
	 */
	protected function get_form_fields( $form ) {
		$fields = array_map(
			function( $field ) {
				return (array) $field;
			},
			$form['fields']
		);

		$this->maybe_add_sub_fields( $fields );

		return $fields;
	}

	protected function maybe_add_sub_fields( &$fields ) {
		$position = -1;
		$remove   = 1;

		foreach ( $fields as $field ) {
			$position ++;
			$subs = array();

			$has_sub_fields = isset( $field['inputs'] ) && is_array( $field['inputs'] );

			if ( 'name' === $field['type'] && $has_sub_fields ) {
				$subs = $this->split_name_field( $field );
			} elseif ( 'list' === $field['type'] ) {
				$subs = $this->split_list_field( $field );
			}

			if ( ! empty( $subs ) ) {
				$this->insert_fields_in_array( $subs, $position, $remove, $fields );

				// If later fields need to be added, put them in the right position.
				$position = $position + count( $subs ) - $remove;
			}
		}
	}

	private function split_name_field( $field ) {
		$text_found   = false;   // to track if at least a textfield has been found.
		$new_fields   = array(); // (inner) fields to be merged into the form.

		foreach ( $field['inputs'] as $input ) {

			if ( isset( $input['isHidden'] ) && $input['isHidden'] ) {
				continue;
			}

			$inner_field = $this->prep_sub_field( $field, $input );

			if ( $field['id'] . '.2' == $input['id'] ) {
				// The name prefix.
				$inner_field['choices']        = $input['choices'];
				$inner_field['type']           = 'select';
				$inner_field['cssClass']      .= ' frm_first';
				// normally, the prefix should carry the main field's label.
				$inner_field['labelPlacement'] = $field['labelPlacement'];
				$inner_field['name']           = $this->get_field_label( $field );

				// Let's just do this for better UI. If we have only prefix dropdown, then the textfield that
				// the main field was converted to will be block display and will start on a new line.

				$field['field_options']['classes'] = isset( $field['field_options']['classes'] ) ?
														 $field['field_options']['classes'] . ' frm_inline' :
														 'frm_inline';
				$field['field_options']['label']   = 'hidden';

			} else {
				if ( ! $text_found ) {
					// so that if the main 'name' field is required, then the 1st textfield will be required.
					if ( isset( $field['isRequired'] ) ) {
						$inner_field['isRequired'] = $field['isRequired'];
					}

					if ( empty( $new_fields ) ) {
						// now the 1st textfield has to carry the main field's label
						$inner_field['labelPlacement'] = $field['labelPlacement'];
						$inner_field['name']           = $this->get_field_label( $field );
						$inner_field['cssClass']      .= ' frm_first';
					}
				}

				$inner_field['type'] = 'text';

				$text_found = true;
			}

			$new_fields[] = $inner_field;
		}

		return $new_fields;
	}

	private function split_list_field( $field ) {
		$subs = array( $field );
		if ( ! isset( $field['choices'] ) ) {
			$subs[] = array(
				'type' => 'end_divider',
			);
			return $subs;
		}

		if ( empty( $field['choices'] ) || ! is_array( $field['choices'] ) ) {
			$default = array(
				'text'  => '',
				'field' => $field,
			);

			$default['field']['labelPlacement'] = 'none';
			$field['choices'] = array( $default );
		}

		foreach ( $field['choices'] as $key => $choice ) {

			$choice['field'] = array(
				'labelPlacement' => 'top',
			);

			if ( 0 === $key && isset( $field['inputName'] ) ) {
				// when a list has more than 1 field, gravity prepopulates the 1st only
				$choice['field']['inputName'] = $field['inputName'];
			}

			if ( isset( $field['allowsPrepopulate'] ) ) {
				$choice['field']['allowsPrepopulate'] = $field['allowsPrepopulate'];
			}

			$subs[] = $this->add_list_inner_field( $field, $choice );
		}

		// Lists must be closed immediately.
		$subs[] = array(
			'type'   => 'end_divider',
		);

		return $subs;
	}

	private function add_list_inner_field( $field, $choice ) {
		$inner_field             = $choice['field'];
		$inner_field['id']       = '';
		$inner_field['type']     = 'text';
		$inner_field['label']    = $choice['text'];
		$inner_field['original'] = 'text';

		// Will be changed later when the repeater gets its own form.
		$inner_field['form_id']  = $field['id'];
		$inner_field['in_section'] = $field['id'];

		return $inner_field;
	}

	protected function maybe_update_ids_in_form( &$new_form ) {
		if ( 'redirect' === $new_form['options']['success_action'] &&
				false !== strpos( $new_form['options']['success_url'], '?' ) ) {

			$new_form['options']['success_url'] = $this->replace_smart_tags( $new_form['options']['success_url'] );
		}

		if ( ! FrmAppHelper::pro_is_installed() ) {
			return;
		}

		if ( isset( $new_form['options']['rootline_titles'] )
			 && is_array( $new_form['options']['rootline_titles'] )
			 && ! empty( $new_form['options']['rootline_titles'] ) ) {

			$new_titles_array = array();
			foreach ( $new_form['options']['rootline_titles'] as $key => $title ) {
				if ( 0 === $key ) {
					$new_titles_array[0] = $title;
					continue;
				}

				if ( isset( $this->fields_map[ $key ] ) ) {
					$new_titles_array[ $this->fields_map[ $key ] ] = $title;
				}
			}

			$new_form['options']['rootline_titles'] = $new_titles_array;
		}

		if ( isset( $new_form['options']['submit_conditions'] )
			 && is_array( $new_form['options']['submit_conditions'] )
			 && ! empty( $new_form['options']['submit_conditions'] ) ) {

			$new_ids_array = array();
			foreach ( $new_form['options']['submit_conditions']['hide_field'] as $key => $field_id ) {
				if ( isset( $this->fields_map[ $field_id ] ) ) {
					$new_ids_array[ $key ] = $this->fields_map[ $field_id ];
				} else {
					// Better to unset; to avoid a condition that will never be met & therefore
					// prevent submission. Execution should rarely reach this block though.
					unset(
						$new_ids_array[ $key ],
						$new_form['options']['submit_conditions']['hide_opt'][ $key ],
						$new_form['options']['submit_conditions']['hide_cond'][ $key ]
					);
				}
			}

			$new_form['options']['submit_conditions']['hide_field'] = $new_ids_array;
		}
	}

	protected function maybe_update_ids_in_field( &$new_field ) {
		if ( ! FrmAppHelper::pro_is_installed() ) {
			return;
		}

		// conditional logic stuff
		if ( isset( $new_field['field_options']['hide_field'] )
			 && is_array( $new_field['field_options']['hide_field'] )
			 && ! empty( $new_field['field_options']['hide_field'] ) ) {

			$new_ids_array = array();
			foreach ( $new_field['field_options']['hide_field'] as $key => $field_id ) {
				if ( isset( $this->fields_map[ $field_id ] ) ) {
					$new_ids_array[ $key ] = $this->fields_map[ $field_id ];
				} else {
					// Better to unset; to avoid a condition that will never be
					// met. Execution should rarely reach this block though.
					unset(
						$new_ids_array[ $key ],
						$new_field['field_options']['hide_opt'][ $key ],
						$new_field['field_options']['hide_cond'][ $key ]
					);
				}
			}

			$new_field['field_options']['hide_field'] = $new_ids_array;
		}

		if ( isset( $new_field['field_options']['calc'] ) && ! empty( $new_field['field_options']['calc'] ) ) {
			$new_field['field_options']['calc'] = $this->replace_smart_tags( $new_field['field_options']['calc'] );
		}

		if ( isset( $new_field['field_options']['product_field'] ) && ! empty( $new_field['field_options']['product_field'] ) ) {

			foreach ( $new_field['field_options']['product_field'] as $key => $value ) {
				if ( isset( $this->fields_map[ $value ] ) ) {
					$new_field['field_options']['product_field'][ $key ] = $this->fields_map[ $value ];
				} else {
					// So, they should make quantity fields come after the product (& option)
					// fields - which is the usual thing, anyway - so that the latter 2 are saved
					// to the DB & added to the fields_map before the former, else many quantity
					// fields will end up in this block & the user will have to manually map them.

					// unset to avoid clash, in case it points to the ID of a valid & existing field
					unset( $new_field['field_options']['product_field'][ $key ] );
				}
			}
		}
	}

	private function maybe_create_repeater_form( $new_field ) {
		if ( ! $this->is_repeater_field( $new_field ) ) {
			return 0;
		}

		$form = $this->prepare_new_form( 0, $new_field['name'] );

		return $this->create_form( $form );
	}

	private function is_repeater_field( $field ) {
		return 'divider' === $field['type'] && isset( $field['field_options']['repeat'] ) && $field['field_options']['repeat'];
	}

	private function remove_unneeded_options( &$new_field ) {
		unset(
			$new_field['field_options']['gravity_id'],
			$new_field['field_options']['gf_option'],
			$new_field['field_options']['option_prod']
		);
	}

	protected function add_form( $form, $upgrade_omit = array() ) {
		check_ajax_referer( 'frm_ajax', 'nonce' );

		// We create the fields first because of e.g. ID-based shortcodes,
		// ID usage in form actions, etc; since we are now going to have
		// new IDs. This way appears to be easier.

		global $wpdb;

		// clear - necessary in the case of e.g. bulk import i.e. more than a form per request
		$this->fields_map   = array();

		$repeater_forms_map = array();

		// new fields whose form_id need to be updated
		$new_fields         = array();

		$this->maybe_add_option_field_to_quantity( $form );

		foreach ( $form['fields'] as $new_field ) {

			if ( isset( $repeater_forms_map[ $new_field['form_id'] ] ) ) {
				$new_field['form_id'] = $repeater_forms_map[ $new_field['form_id'] ];
			}

			$this->maybe_update_ids_in_field( $new_field );

			$repeater_form_id = $this->maybe_create_repeater_form( $new_field );
			if ( $repeater_form_id ) {
				$repeater_forms_map[ $new_field['field_options']['gravity_id'] ] = $repeater_form_id;
				$new_field['field_options']['form_select']                       = $repeater_form_id;
			}

			if ( isset( $new_field['field_options']['gravity_id'] ) &&
				 ! empty( $new_field['field_options']['gravity_id'] ) ) {

				$gravity_id = $new_field['field_options']['gravity_id'];
			} else {
				$gravity_id = null;
			}

			$in_repeater = isset( $new_field['field_options']['in_section'] ) && ! empty( $new_field['field_options']['in_section'] ) && isset( $repeater_forms_map[ $new_field['field_options']['in_section'] ] );
			if ( $in_repeater ) {
				$new_field['form_id'] = $repeater_forms_map[ $new_field['field_options']['in_section'] ];
				$new_field['field_options']['in_section'] = '';
			}

			$this->remove_unneeded_options( $new_field );

			$new_id = FrmField::create( $new_field );
			if ( $new_id && empty( $new_field['form_id'] ) ) {
				$new_fields[] = $new_id;
			}

			if ( $new_id && null !== $gravity_id ) {
				$this->fields_map[ $gravity_id ] = $new_id;
			}
		}

		$this->maybe_update_ids_in_form( $form );

		$form_id = $this->create_form( $form );
		$where   = array( 'id' => $new_fields );

		if ( empty( $form_id ) ) {
			// delete the previously added fields.
			if ( ! empty( $new_fields ) ) {
				// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
				$wpdb->query( "DELETE FROM {$wpdb->prefix}frm_fields " . FrmDb::prepend_and_or_where( ' WHERE ', $where ) );
			}

			return $this->form_creation_error_response( $form );
		}

		// update form_id for the fields.
		if ( ! empty( $new_fields ) ) {
			$wpdb->query(
				$wpdb->prepare( "UPDATE {$wpdb->prefix}frm_fields SET form_id = %d", $form_id ) .
				FrmDb::prepend_and_or_where( ' WHERE ', $where )
			);
		}

		// update parent_form_id's.
		if ( ! empty( $repeater_forms_map ) ) {
			$where = array( 'id' => $repeater_forms_map );
			$wpdb->query(
				$wpdb->prepare( "UPDATE {$wpdb->prefix}frm_forms SET parent_form_id = %d", $form_id ) .
				FrmDb::prepend_and_or_where( ' WHERE ', $where )
			);
		}

		$pro_is_installed = FrmAppHelper::pro_is_installed();

		$create_admin_user_reg_notif = true;

		if ( isset( $form['notifications'] ) && is_array( $form['notifications'] ) ) {
			foreach ( $form['notifications'] as $action ) {
				// the notification created for their Save and Continue feature.
				$save_and_continue = isset( $action['event'] ) && 'form_save_email_requested' === $action['event'];
				$is_active = ! isset( $action['isActive'] ) || $action['isActive'];
				if ( ! $is_active || $save_and_continue ) {
					continue;
				}

				// only create if there is no existing notification that's not gf's Save & Continue notification
				$create_admin_user_reg_notif = false;

				if ( $pro_is_installed && 'routing' === $action['toType'] ) {
					$this->create_notification_for_routing( $form, $form_id, $action );
				} else {
					$post_content = $this->prepare_action_post_content( $action, 'email', $form_id );
					$this->save_action( $post_content, $form, $form_id );
				}
			}
		}

		if ( $pro_is_installed && isset( $this->post_fields ) && is_array( $this->post_fields ) && ! empty( $this->post_fields ) ) {
			if ( isset( $this->current_source_form['postStatus'] ) && ! empty( $this->current_source_form['postStatus'] ) ) {
				$this->post_fields['post_status'] = $this->get_post_status( $this->current_source_form['postStatus'] );
			}
			$this->prepare_post_fields( $form_id );
			$this->post_fields['type'] = 'wppost';
			$this->save_action( $this->post_fields, $form, $form_id );

			// clear, particularly for bulk import
			$this->post_fields = array();
		}

		if ( $pro_is_installed && self::table_exists( 'gf_addon_feed' ) ) {
			$feeds = GFAPI::get_feeds( null, $this->current_source_form['id'], null );
			if ( ! is_wp_error( $feeds ) && is_array( $feeds ) && ! empty( $feeds ) ) {
				foreach ( $feeds as $feed ) {
					if ( 'gravityformsadvancedpostcreation' === $feed['addon_slug'] ) {
						$post_content = $this->prepare_action_post_content( $feed, 'wppost', $form_id );
						$this->save_action( $post_content, $form, $form_id );

					} else if ( 'gravityformsuserregistration' === $feed['addon_slug'] ) {

						// add userID field
						$this->create_new_field(
							array(
								'type'          => 'user_id',
								'form_id'       => $form_id,
								'name'          => __( 'User ID', 'formidable-pro' ),
							)
						);

						// add action
						if ( ! is_plugin_active( 'formidable-registration/formidable-registration.php' ) ) {
							continue;
						}

						$post_content = $this->prepare_action_post_content( $feed, 'register', $form_id );

						$create_user_notif = $post_content['create_user_notif'];

						if ( $post_content['continue_to_create'] ) {
							unset( $post_content['continue_to_create'], $post_content['create_user_notif'] );
							$post_id = $this->save_action( $post_content, $form, $form_id );

							if ( is_wp_error( $post_id ) || ! $post_id ) {
								continue;
							}
						}

						if ( 'update' === $feed['meta']['feedType'] ) {
							$_form = FrmForm::getOne( $form_id );
							if ( $_form ) {
								$_form = (array) $_form;

								/**
								 * Edit user profile settings.
								 *
								 * @link https://formidableforms.com/knowledgebase/user-registration/#kb-edit-profile-with-separate-form
								 */
								$_form['logged_in']                    = 1;
								$_form['editable']                     = 1;
								$_form['options']['logged_in_role']    = '';
								$_form['options']['single_entry']      = 1;
								$_form['options']['single_entry_type'] = 'user';
								$_form['options']['editable_role']     = '';
								$_form['options']['edit_action']       = $_form['options']['success_action'];
								$_form['options']['edit_url']          = $_form['options']['success_url'];
								$_form['options']['edit_page_id']      = $_form['options']['success_page_id'];

								// the following is for 'logged_in' & 'editable' to be saved, else they won't.
								if ( empty( $_POST ) ) {
									$_POST = array();
								}
								if ( isset( $_POST['frm_action'] ) ) {
									// temporarily save to restore later.
									$_frm_action = FrmAppHelper::get_param( 'frm_action', '', 'post', 'sanitize_text_field' );
								}
								$_POST['frm_action'] = 'update_settings';

								FrmForm::update( $form_id, $_form );

								if ( isset( $_frm_action ) ) {
									// restore.
									$_POST['frm_action'] = $_frm_action;
								} else {
									unset( $_POST['frm_action'] );
								}
							}
						}

						if ( 'update' !== $feed['meta']['feedType'] && $create_admin_user_reg_notif ) {
							$this->add_reg_email_notification( $form_id, 'admin' );
						}

						$send_email = $this->get_action_meta( $feed, 'sendEmailEnable' );
						if ( $send_email && $create_user_notif ) {
							$this->add_reg_email_notification( $form_id, 'user' );
						}
					}
				}
			}
		}

		$this->track_import( $form['import_form_id'], $form_id );

		// Build and send final AJAX response!
		return array(
			'name'         => $form['name'],
			'id'           => $form_id,
			'link'         => esc_url_raw( FrmForm::get_edit_link( $form_id ) ),
			'upgrade_omit' => $this->response['upgrade_omit'],
		);
	}

	public static function table_exists( $table_name ) {
		global $wpdb;

		$table = $wpdb->prefix . $table_name;
		$like  = $wpdb->esc_like( $table );
		$var   = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $like ) );

		return $var === $table;
	}

	private function get_post_status( $status ) {
		if ( 'draft' === $status ) {
			return '';
		}
		$statuses = array( 'pending', 'publish' );
		return in_array( $status, $statuses, true ) ? $status : '';
	}

	private function prepare_post_fields( $form_id ) {
		foreach ( $this->post_fields as $key => $value ) {

			if ( 'post_category' === $key || 'post_custom_fields' === $key ) {

				foreach ( $value as $k => $meta_array ) {

					if ( isset( $this->fields_map[ $meta_array['field_id'] ] ) ) {
						$this->post_fields[ $key ][ $k ]['field_id'] = $this->fields_map[ $meta_array['field_id'] ];
					} else {
						unset( $this->post_fields[ $key ][ $k ] );
					}
				}

				if ( empty( $this->post_fields[ $key ] ) ) {
					unset( $this->post_fields[ $key ] );
				}
			} else {
				if ( 'post_content' === $key && isset( $this->current_source_form['postContentTemplateEnabled'] ) &&
						$this->current_source_form['postContentTemplateEnabled'] ) {

					$this->post_fields[ $key ]       = '';
					$this->post_fields['display_id'] = $this->create_wppost_content_template( $form_id, $value );
					continue;
				}

				if ( isset( $this->fields_map[ $value ] ) ) {
					$this->post_fields[ $key ] = $this->fields_map[ $value ];
				} else {
					unset( $this->post_fields[ $key ] );
				}
			}
		}
	}

	private function create_wppost_content_template( $form_id, $value ) {
		$new_content = $this->replace_smart_tags( $value );

		// Copied from FrmProForm::save_wppost_actions
		// Get form name for View title
		$post_title = sprintf( '%s (Form %d)', $this->current_source_form['title'], (int) $form_id );

		// create new view
		$cd_values = array(
			'post_status'  => 'publish',
			'post_type'    => 'frm_display',
			'post_title'   => $post_title,
			'post_excerpt' => __( 'Used for the single post page', 'formidable-pro' ),
			'post_content' => $new_content,
		);

		$display_id = wp_insert_post( $cd_values );

		unset( $cd_values );

		update_post_meta( $display_id, 'frm_param', 'entry' );
		update_post_meta( $display_id, 'frm_type', 'display_key' );
		update_post_meta( $display_id, 'frm_show_count', 'one' );
		update_post_meta( $display_id, 'frm_form_id', $form_id );

		return $display_id;
	}

	/**
	 * Create each form action. This will be expanded to cover other add-ons.
	 *
	 * @return array
	 */
	private function prepare_action_post_content( $action, $action_type, $form_id = false ) {
		$new_content = array(
			'type'       => $action_type,
			'menu_order' => $form_id,
		);

		switch ( $action_type ) {
			case 'email':
				$this->prep_email_action( $action, $new_content );
				break;

			case 'wppost':
				$this->prep_post_action( $action, $new_content );
				break;

			case 'register':
				$this->prep_register_action( $action, $new_content );
				break;
		}

		return $new_content;
	}

	/**
	 * Convert notifications to form actions.
	 *
	 * @param array $action
	 * @param array $new_content
	 */
	private function prep_email_action( $action, &$new_content ) {
		$new_content['post_title'] = $action['name'];
		$new_content['event']      = $this->map_action_event( $action['event'] );

		if ( ! empty( $action['to'] ) && 'field' === $action['toType'] ) {
			// Switch dropdown value to smart tag.
			$action['to'] = '{' . $action['to'] . '}';
		}

		$filter = array(
			'to'      => 'email_to',
			'cc'      => 'cc',
			'bcc'     => 'bcc',
			'replyTo' => 'reply_to',
			'from'    => 'from',
			'message' => 'email_message',
			'subject' => 'email_subject',
		);

		foreach ( $filter as $gf => $frm ) {
			if ( ! empty( $action[ $gf ] ) ) {
				$new_content[ $frm ] = $this->replace_smart_tags( $action[ $gf ] );
			}
		}

		if ( ! empty( $action['fromName'] ) ) {
			$from_name = $this->replace_smart_tags( $action['fromName'] );

			$new_content['from'] = sprintf( '%s <%s>', $from_name, $new_content['from'] );
		}

		if ( isset( $new_content['email_message'] ) ) {
			// The '{all_fields}' is done separately & not put in the regular map of the 'merge_tag_map' method
			// as the tag may mean something else in other contexts in GF & may therefore not always translate
			// to '[default-message]' at Formidable's side. This precaution is taken for future purpose.
			$new_content['email_message'] = str_replace( '{all_fields}', '[default-message]', $new_content['email_message'] );
		}

		if ( FrmAppHelper::pro_is_installed() ) {
			$conditions = $this->maybe_get_action_conditions( $action );
			if ( ! empty( $conditions ) ) {
				$new_content['conditions'] = $conditions;
			}
		}
	}

	/**
	 * Convert post fields to a form action.
	 *
	 * @param array $action
	 * @param array $new_content
	 */
	private function prep_post_action( $action, &$new_content ) {
		$this->fill_existing_post_action( $action, $new_content );
		$new_content['post_title']  = $this->get_action_meta( $action, 'feedName' );
		$new_content['post_type']   = $this->get_action_meta( $action, 'postType' );
		$new_content['post_status'] = $this->get_post_status( $action['meta']['postStatus'] );
		$new_content['post_category'] = array();

		if ( ! isset( $new_content['post_custom_fields'] ) || ! is_array( $new_content['post_custom_fields'] ) ) {
			$new_content['post_custom_fields'] = array();
		}

		$this->set_post_title( $action, $new_content );
		$this->set_post_content( $action, $new_content );
		$this->set_post_thumbnail( $action, $new_content );
		$this->set_post_meta( $action, $new_content );
		$this->set_post_category( $action, $new_content );
		$this->set_post_tags( $action, $new_content );

		if ( empty( $new_content['post_category'] ) ) {
			unset( $new_content['post_category'] );
		}

		if ( empty( $new_content['post_custom_fields'] ) ) {
			unset( $new_content['post_custom_fields'] );
		}

		$this->fill_feed_action_conditions( $action, $new_content );
	}

	/**
	 * If post fields created a post action, combine instead of create more.
	 */
	private function fill_existing_post_action( $action, &$new_content ) {
		$post_action = FrmFormAction::get_action_for_form( $new_content['menu_order'], $new_content['type'], 1 );
		if ( empty( $post_action ) ) {
			return;
		}

		$new_content = array_merge( $new_content, $post_action->post_content );
		$new_content['the_post_title'] = $new_content['post_title'];
		$new_content['ID'] = $post_action->ID;
	}

	private function set_post_title( $action, &$new_content ) {
		// since Formidable uses field id only, we want to find the first match
		preg_match( $this->tag_regex(), $action['meta']['postTitle'], $match );

		if ( is_array( $match ) && ! empty( $match ) && isset( $match[1] ) && isset( $this->fields_map[ $match[1] ] ) ) {
			$new_content['the_post_title'] = $this->fields_map[ $match[1] ];

			// update post_field field option
			$this->update_post_field(
				$new_content['the_post_title'],
				array( 'post_field' => 'post_title' )
			);
		}
	}

	private function set_post_content( $action, &$new_content ) {
		$post_content = $this->get_action_meta( $action, 'postContent' );
		if ( empty( $post_content ) ) {
			return;
		}

		preg_match( '/^\{\s*[^\}]*\s*:\s*(\d+)(\.\d+)?\s*(:[^\}]*)?\}$/', trim( $post_content ), $match );
		if ( is_array( $match ) && ! empty( $match ) && isset( $match[1] ) && isset( $this->fields_map[ $match[1] ] ) ) {
			// it was mapped to a single field

			$new_content['post_content'] = $this->fields_map[ $match[1] ];
			$new_content['display_id']   = '';

			$this->update_post_field(
				$new_content['post_content'],
				array( 'post_field' => 'post_content' )
			);
		} else {
			$new_content['post_content'] = '';
			$new_content['display_id']   = $this->create_wppost_content_template( $new_content['menu_order'], $action['meta']['postContent'] );
		}
	}

	private function set_post_thumbnail( $action, &$new_content ) {
		$thumbnail_id = $this->get_field_for_setting( $action, 'postThumbnail' );
		if ( empty( $thumbnail_id ) || isset( $new_content['post_custom_fields']['_thumbnail_id'] ) ) {
			return;
		}

		$new_content['post_custom_fields']['_thumbnail_id'] = array(
			'meta_name' => '_thumbnail_id',
			'field_id'  => $thumbnail_id,
		);

		$this->update_post_field(
			$thumbnail_id,
			array(
				'post_field'   => 'post_custom',
				'custom_field' => '_thumbnail_id',
				'multiple'     => 0,
			)
		);
	}

	private function set_post_meta( $action, &$new_content ) {
		$post_meta = $this->get_action_meta( $action, 'postMetaFields' );
		if ( ! is_array( $post_meta ) || empty( $post_meta ) ) {
			return;
		}

		foreach ( $post_meta as $value ) {
			if ( ! is_array( $value ) || empty( $value ) || ! isset( $value['key'] ) || ! isset( $value['value'] ) ) {
				continue;
			}

			if ( 'gf_custom' === $value['key'] ) {
				$value['key'] = $value['custom_key'];
			}

			$field_id = $this->create_hidden_post_field( $value, $new_content );

			if ( empty( $field_id ) ) {
				if ( ! isset( $this->fields_map[ $value['value'] ] ) ) {
					continue;
				}
				$field_id = $this->fields_map[ $value['value'] ];
			}

			$new_content['post_custom_fields'][ $value['key'] ] = array(
				'meta_name' => $value['key'],
				'field_id'  => $field_id,
			);

			if ( 'gf_custom' !== $value['value'] ) {
				// Only update a previously created field.
				$this->update_post_field(
					$field_id,
					array(
						'post_field'   => 'post_custom',
						'custom_field' => $value['key'],
					)
				);
			}
		}
	}

	/**
	 * If the value is static create a hidden field with default value.
	 */
	private function create_hidden_post_field( $value, $new_content ) {
		if ( ! isset( $value['custom_value'] ) || empty( $value['custom_value'] ) ) {
			return 0;
		}

		return $this->create_new_field(
			array(
				'type'          => 'hidden',
				'form_id'       => $new_content['menu_order'],
				'name'          => $value['key'],
				'default_value' => $value['custom_value'],
				'field_options' => array(
					'custom_field' => $value['key'],
					'post_field'   => 'post_custom',
				),
			)
		);
	}

	private function set_post_category( $action, &$new_content ) {
		$tax = $this->get_action_meta( $action, 'postTaxonomy_category' );
		if ( ! is_array( $tax ) || empty( $tax ) ) {
			return;
		}

		$term_ids = array();
		foreach ( $tax as $value ) {
			if ( ! isset( $value['key'] ) || ! isset( $value['value'] ) ) {
				continue;
			}

			if ( 'term' === $value['key'] ) {
				// This is usually the case when there's no field mapped for post_category, so we'll
				// create a field below if $term_ids isn't empty & set visibility to administrator.
				if ( empty( $value['custom_value'] ) ) {
					$term = get_term_by( 'slug', $value['value'], 'category' );
					if ( $term ) {
						$term_ids[] = $term->term_id;
					}
				} else {
					$cat_id = get_cat_ID( esc_attr( $value['custom_value'] ) );
					if ( $cat_id ) {
						$term_ids[] = $cat_id;
					} else {
						$result = wp_insert_term( $value['custom_value'], 'category' );
						if ( ! is_wp_error( $result ) ) {
							$term_ids[] = $result['term_id'];
						}
					}
				}
			} else if ( 'field' === $value['key'] && isset( $this->fields_map[ $value['value'] ] ) ) {

				$index = count( $new_content['post_category'] );
				$new_content['post_category'][ 'category' . $index ] = array(
					'meta_name' => 'category',
					'field_id'  => $this->fields_map[ $value['value'] ],
				);

				$this->update_post_field(
					$this->fields_map[ $value['value'] ],
					array( 'post_field' => 'post_category' )
				);
			}
		}

		if ( empty( $term_ids ) ) {
			return;
		}

		$field_id = $this->create_new_field(
			array(
				'type'          => ( 1 === count( $term_ids ) ? 'select' : 'checkbox' ),
				'form_id'       => $new_content['menu_order'],
				'name'          => __( 'Post Category', 'formidable-pro' ),
				'field_options' => array(
					'admin_only'        => 'administrator',
					'post_field'        => 'post_category',
					'dyn_default_value' => implode( ',', $term_ids ),
				),
			)
		);

		if ( $field_id ) {
			$index = count( $new_content['post_category'] );
			$new_content['post_category'][ 'category' . $index ] = array(
				'meta_name' => 'category',
				'field_id'  => $field_id,
			);
		}
	}

	private function set_post_tags( $action, &$new_content ) {
		$tags = $this->get_action_meta( $action, 'postTaxonomy_post_tag' );
		if ( ! is_array( $tags ) || empty( $tags ) ) {
			return;
		}

		$terms = array();
		foreach ( $tags as $value ) {
			if ( ! isset( $value['key'] ) || ! isset( $value['value'] ) ) {
				continue;
			}

			if ( 'term' === $value['key'] ) {
				// This is usually the case when there's no field mapped for post_category, so we'll
				// create a field below if $terms isn't empty & set visibility to administrator.
				$terms[] = ! empty( $value['custom_value'] ) ? $value['custom_value'] : $value['value'];
			} else if ( 'field' === $value['key'] && isset( $this->fields_map[ $value['value'] ] ) ) {

				$index = count( $new_content['post_category'] );
				$new_content['post_category'][ 'post_tag' . $index ] = array(
					'meta_name' => 'post_tag',
					'field_id'  => $this->fields_map[ $value['value'] ],
				);

				$this->update_post_field(
					$this->fields_map[ $value['value'] ],
					array(
						'post_field' => 'post_category',
						'taxonomy'   => 'post_tag',
					)
				);
			}
		}

		$field_id = $this->create_tags_field( $terms, $new_content );
		if ( $field_id ) {
			$index = count( $new_content['post_category'] );
			$new_content['post_category'][ 'post_tag' . $index ] = array(
				'meta_name' => 'post_tag',
				'field_id'  => $field_id,
			);
		}
	}

	private function update_post_field( $field_id, $options ) {
		$field = FrmField::getOne( $field_id );
		if ( empty( $field ) ) {
			return;
		}

		$field = (array) $field;
		foreach ( $options as $name => $value ) {
			$field['field_options'][ $name ] = $value;
		}

		FrmField::update( $field['id'], $field );
	}

	private function create_tags_field( $terms, $new_content ) {
		if ( empty( $terms ) ) {
			return;
		}

		return $this->create_new_field(
			array(
				'type'          => 'tag',
				'form_id'       => $new_content['menu_order'],
				'name'          => __( 'Tags', 'formidable-pro' ),
				'default_value' => implode( ',', $terms ),
				'field_options' => array(
					'admin_only' => 'administrator',
					'post_field' => 'post_category',
					'taxonomy'   => 'post_tag',
				),
			)
		);
	}

	private function create_new_field( $new_field ) {
		$new_values = FrmFieldsHelper::setup_new_vars( $new_field['type'], $new_field['form_id'] );

		foreach ( $new_field as $option => $value ) {
			if ( is_array( $value ) && 'field_options' === $option ) {
				$value = array_merge( $new_values['field_options'], $value );
			}
			$new_values[ $option ] = $value;
		}

		return FrmField::create( $new_values );
	}

	private function prep_register_action( $action, &$new_content ) {
		$new_content['post_title'] = $action['meta']['feedName'];

		// set flags
		$new_content['continue_to_create'] = true;
		$new_content['create_user_notif']  = true;

		$is_update = 'update' === $action['meta']['feedType'];
		if ( $is_update ) {
			$new_content['event'] = array( 'create', 'update' );
		}

		$is_create = 'create' === $action['meta']['feedType'];
		$mapped_field = $this->get_field_for_setting( $action, 'username' );
		if ( $is_create && $mapped_field ) {

			$new_content['reg_username'] = $mapped_field;

			$field = FrmField::getOne( $new_content['reg_username'] );
			if ( $field ) {
				$field = (array) $field;
				if ( ! isset( $field['field_options']['unique'] ) || ! $field['field_options']['unique'] ) {
					// only 'travel' to the db if not already set
					$field['field_options']['unique'] = 1;
					FrmField::update( $field['id'], $field );
				}
			}
		}

		$user_map = array(
			'first_name' => 'reg_first_name',
			'last_name'  => 'reg_last_name',
			'password'   => 'reg_password',
		);

		foreach ( $user_map as $from => $to ) {
			$mapped_field = $this->get_field_for_setting( $action, $from );
			if ( $mapped_field ) {
				$new_content[ $to ] = $mapped_field;
			}
		}

		$mapped_field = $this->get_field_for_setting( $action, 'email' );
		if ( $mapped_field ) {

			$new_content['reg_email'] = $mapped_field;

			$field = FrmField::getOne( $new_content['reg_email'] );
			if ( $field ) {
				$field = (array) $field;
				$field['field_options']['unique'] = 1;

				// gf too auto-populates email for edit type
				if ( $is_update ) {
					$field['default_value'] = '[email]';
				}

				FrmField::update( $field['id'], $field );
			}
		}

		$role = $this->get_action_meta( $action, 'role' );
		if ( ! $this->should_create_site( $action ) && ! empty( $role ) && 'gfur_preserve_role' !== $role ) {
			$new_content['reg_role'] = $role;
		}

		$display_name = $this->get_action_meta( $action, 'displayname' );
		if ( ! empty( $display_name ) && 'gfur_preserve_display_name' !== $display_name ) {
			$map          = array( 'nickname', 'firstname', 'lastname' );
			$mapped_field = $this->get_field_for_setting( $action, $display_name );

			if ( in_array( $display_name, $map ) && $mapped_field ) {
				$new_content['reg_display_name'] = $mapped_field;
			} else {
				$new_content['reg_display_name'] = $this->map_displayname( $display_name );
			}
		}

		$meta_array = array();

		$this->set_custom_user_meta( $action, $meta_array, $new_content );

		$nickname = $this->get_field_for_setting( $action, 'nickname' );
		if ( $nickname ) {
			$meta_array[] = array(
				'meta_name' => 'nickname',
				'field_id'  => $nickname,
			);
		}

		if ( ! empty( $meta_array ) ) {
			$new_content['reg_usermeta'] = $meta_array;
		}

		$this->fill_feed_action_conditions( $action, $new_content );

		$this->user_activation( $action, $new_content );

		$this->set_mulitsite( $action, $new_content );
	}

	private function get_field_for_setting( $action, $setting ) {
		$value = $this->get_action_meta( $action, $setting );
		if ( ! empty( $value ) && isset( $this->fields_map[ $value ] ) ) {
			return $this->fields_map[ $value ];
		}
		return '';
	}

	private function get_action_meta( $action, $setting ) {
		return isset( $action['meta'][ $setting ] ) ? $action['meta'][ $setting ] : '';
	}

	private function set_custom_user_meta( $action, &$meta_array, &$new_content ) {
		$metas = $this->get_action_meta( $action, 'userMeta' );
		if ( empty( $metas ) || ! is_array( $metas ) ) {
			return;
		}

		foreach ( $metas as $meta ) {
			if ( ! isset( $this->fields_map[ $meta['value'] ] ) ) {
				continue;
			}

			if ( 'user_url' === $meta['key'] ) {
				$new_content['reg_user_url'] = $this->fields_map[ $meta['value'] ];
			} else {

				$use_key = isset( $meta['custom_key'] ) && ! empty( $meta['custom_key'] ) ? $meta['custom_key'] : $meta['key'];
				$meta_array[] = array(
					'meta_name' => $use_key,
					'field_id'  => $this->fields_map[ $meta['value'] ],
				);
			}
		}
	}

	private function user_activation( $action, &$new_content ) {
		$activate = $this->get_action_meta( $action, 'userActivationEnable' );
		if ( ! $activate ) {
			return;
		}

		$activation_type = $this->get_action_meta( $action, 'userActivationValue' );

		// At the Formidable back-end, the 'Email Confirmation' option will only
		// appear if you map the Password setting to a Password field in your form.
		if ( isset( $new_content['reg_password'] ) && ! empty( $new_content['reg_password'] ) &&
			is_numeric( $new_content['reg_password'] ) && 'email' === $activation_type ) {

			$new_content['reg_moderate'] = array( 'email' );
			return;
		}

		if ( 'manual' !== $activation_type ) {
			return;
		}

		// update flag
		$new_content['create_user_notif'] = false;

		/**
		 * Transfer the admin approval setting.
		 *
		 * @link https://formidableforms.com/knowledgebase/user-registration/#kb-admin-approval-before-account-creation
		 */
		$new_content['event'] = array( 'update' );
		$new_content['reg_create_users'] = 'allow';
		$new_content['reg_create_role'] = array( 'administrator' );

		// add a status field
		$new_values = FrmFieldsHelper::setup_new_vars( 'select', $new_content['menu_order'] );
		$new_values['name'] = __( 'Status', 'formidable-pro' );
		$new_values['options'] = array(
			array(
				'label' => 'Pending',
				'value' => 'pending',
			),
			array(
				'label' => 'Approved',
				'value' => 'approved',
			),
		);
		$new_values['field_options']['separate_value'] = 1;
		$new_values['field_options']['admin_only'] = 'administrator';
		$new_values['default_value'] = 'pending';
		$field_id = FrmField::create( $new_values );

		if ( empty( $field_id ) ) {
			return;
		}

		$has_conditions = isset( $new_content['conditions'] ) && is_array( $new_content['conditions'] );

		if ( $has_conditions && isset( $new_content['conditions']['any_all'] ) &&
			'any' === $new_content['conditions']['any_all'] && count( $new_content['conditions'] ) > 2 ) {

			foreach ( $new_content['conditions'] as $key => $cond ) {
				if ( 'send_stop' === $key || 'any_all' === $key ) {
					continue;
				}

				// build from the existing object
				$new_post_content               = $new_content;
				// create new conditions
				$new_post_content['conditions'] = array(
					'send_stop' => 'send',
					'any_all'   => 'all',
					0           => $cond,
					1           => array(
						'hide_opt'        => 'approved',
						'hide_field'      => $field_id,
						'hide_field_cond' => '==',
					),
				);

				$this->save_action( $new_content['menu_order'], $new_post_content, 'register' );
			}

			// update flag
			$new_content['continue_to_create'] = false;
		} else {

			if ( ! $has_conditions ) {
				$new_content['conditions'] = array(
					'send_stop' => 'send',
				);
			}

			// some conditions might be present already, so we use 'all'
			$new_content['conditions']['any_all'] = 'all';
			// append the new rule
			$new_content['conditions'][] = array(
				'hide_opt'        => 'approved',
				'hide_field'      => $field_id,
				'hide_field_cond' => '==',
			);
		}
	}

	private function should_create_site( $action ) {
		$create = 'create' === $action['meta']['feedType'];
		$create_site = $this->get_action_meta( $action, 'createSite' );
		return $create && $create_site;
	}

	private function set_mulitsite( $action, &$new_content ) {
		if ( ! is_multisite() || ! $this->should_create_site( $action ) ) {
			return;
		}

		$new_content['create_subsite'] = 1;
		$new_content['subsite_domain'] = 'username';
		$new_content['subsite_title'] = 'blog_title';

		$map = array(
			'siteAddress' => 'subsite_domain',
			'siteTitle'   => 'subsite_title',
		);

		foreach ( $map as $from => $to ) {
			if ( isset( $action['meta'][ $from ] ) && ! empty( $action['meta'][ $from ] ) &&
				is_numeric( $action['meta'][ $from ] ) && isset( $this->fields_map[ $action['meta'][ $from ] ] ) ) {

				$new_content[ $to ] = $this->fields_map[ $action['meta'][ $from ] ];
			}
		}

		$role = $this->get_action_meta( $action, 'rootRole' );
		if ( ! empty( $role ) ) {
			$new_content['reg_role'] = $role;
		}
	}

	private function add_reg_email_notification( $form_id, $type ) {
		if ( ! is_callable( 'FrmRegActionController::customize_new_email_action' ) ) {
			return;
		}

		check_ajax_referer( 'frm_ajax', 'nonce' );

		// We need to fill $_POST as FrmRegActionController::customize_new_email_action uses it.
		if ( empty( $_POST ) ) {
			$_POST = array();
		}

		if ( isset( $_POST['reg_email_type'] ) ) {
			// temporarily store elsewhere, to be restored later.
			$reg_email_type = FrmAppHelper::get_param( 'reg_email_type', '', 'post', 'sanitize_text_field' );
		}
		$_POST['reg_email_type'] = $type;

		if ( isset( $_POST['form_id'] ) ) {
			// temporarily store elsewhere, to be restored later.
			$old_form_id = FrmAppHelper::get_param( 'form_id', 0, 'post', 'absint' );
		}
		$_POST['form_id'] = $form_id;

		$action_control = FrmFormActionsController::get_form_actions( 'email' );
		$new_action     = $action_control->prepare_new( $form_id );
		$new_action     = FrmRegActionController::customize_new_email_action( $new_action );

		if ( isset( $reg_email_type ) ) {
			$_POST['reg_email_type'] = $reg_email_type;
		} else {
			unset( $_POST['reg_email_type'] );
		}

		if ( isset( $old_form_id ) ) {
			$_POST['form_id'] = $old_form_id;
		} else {
			unset( $_POST['form_id'] );
		}

		$action_control->save_settings( $new_action );
	}

	private function fill_feed_action_conditions( $action, &$new_content ) {
		$has_logic = $this->get_action_meta( $action, 'feed_condition_conditional_logic' );
		$rules     = $this->get_action_meta( $action, 'feed_condition_conditional_logic_object' );
		if ( $has_logic && is_array( $rules ) && ! empty( $rules ) ) {

			$conditions = $this->maybe_get_action_conditions( $rules );
			if ( ! empty( $conditions ) ) {
				$new_content['conditions'] = $conditions;
			}
		}
	}

	/**
	 * Switch form action triggers.
	 *
	 * @param string $event
	 *
	 * @return array
	 */
	private function map_action_event( $event ) {
		$events = array(
			'form_saved'           => 'draft',
			'form_submission'      => 'create',
			'gfur_site_created'    => 'create',
			'gfur_user_activation' => 'create',
			'gfur_user_activated'  => 'update',
			'gfur_user_registered' => 'user_registration',
			'gfur_user_updated'    => 'update',
		);
		$evt = isset( $events[ $event ] ) ? $events[ $event ] : 'create';
		return (array) $evt;
	}

	/**
	 * Set the user registration display name.
	 *
	 * @param string $display
	 *
	 * @return string
	 */
	private function map_displayname( $display ) {
		$displaynames = array(
			'nickname'  => '',
			'username'  => '',
			'firstname' => '',
			'lastname'  => '',
			'firstlast' => 'display_firstlast',
			'lastfirst' => 'display_lastfirst',
		);
		return isset( $displaynames[ $display ] ) ? $displaynames[ $display ] : $display;
	}

	/**
	 * Format GF conditions.
	 *
	 * @param array $action
	 *
	 * @return array
	 */
	private function maybe_get_action_conditions( $action ) {
		$has_logic = isset( $action['conditionalLogic'] ) && is_array( $action['conditionalLogic'] ) && ! empty( $action['conditionalLogic'] );
		if ( ! $has_logic ) {
			return array();
		}

		$conditions = array(
			'send_stop' => 'send',
			'any_all'   => $action['conditionalLogic']['logicType'],
		);

		$new_rules = $this->get_action_condition_rules( $action['conditionalLogic']['rules'] );

		return array_merge( $conditions, $new_rules );
	}

	private function get_action_condition_rules( $rules ) {
		$rules     = $this->get_logic_rules( $rules );
		// use e.g. the 1st element to count how many rules we have
		$count     = count( reset( $rules ) );
		$new_rules = array();

		for ( $i = 0; $i < $count; $i++ ) {
			if ( ! isset( $this->fields_map[ $rules['hide_field'][ $i ] ] ) ) {
				// better not to end up with a wrong field ID
				continue;
			}

			$new_rules[] = array(
				'hide_opt'        => $rules['hide_opt'][ $i ],
				'hide_field'      => $this->fields_map[ $rules['hide_field'][ $i ] ],
				'hide_field_cond' => $rules['hide_field_cond'][ $i ],
			);
		}

		return $new_rules;
	}

	private function create_notification_for_routing( $form, $form_id, $action ) {
		$count = @count( $action['routing'] );

		if ( ! $count ) {
			// unlikely though
			return;
		}

		$post_content        = $this->prepare_action_post_content( $action, 'email', $form_id );
		$new_rules           = $this->get_action_condition_rules( $action['routing'] );
		$original_conditions = isset( $post_content['conditions'] ) ? $post_content['conditions'] : null;
		$gf_email_tags       = array(
			'{admin_email}',
			'{user:user_email}',
		);
		$frm_email_tags      = array(
			'[admin_email]',
			'[email]',
		);

		for ( $i = 0; $i < $count; $i++ ) {
			if ( empty( $action['routing'][ $i ]['email'] ) ) {
				continue;
			}

			$post_content['email_to'] = str_replace( $gf_email_tags, $frm_email_tags, $action['routing'][ $i ]['email'] );

			if ( ! isset( $original_conditions ) || ! is_array( $original_conditions ) || empty( $original_conditions ) ) {
				// no existing conditions, so create
				$new_conditions              = array();
				$new_conditions['send_stop'] = 'send';
				$new_conditions['any_all']   = 'any';
				$new_conditions[]            = $new_rules[ $i ];
				$post_content['conditions']  = $new_conditions;

				$this->save_action( $post_content, $form, $form_id );

			} else if ( is_array( $original_conditions ) && ! empty( $original_conditions ) ) {

				if ( 'any' === $post_content['conditions']['any_all'] ) {

					foreach ( $post_content['conditions'] as $key => $cond ) {
						if ( 'send_stop' === $key || 'any_all' === $key ) {
							continue;
						}

						$new_post_content               = $post_content;
						// create new conditions
						$new_post_content['conditions'] = array(
							'send_stop' => 'send',
							'any_all'   => 'all',
							0           => $cond,
							1           => $new_rules[ $i ],
						);

						$this->save_action( $new_post_content, $form, $form_id );
					}
				} else {
					// it's 'all', so append new rule
					$new_conditions             = $original_conditions;
					$new_conditions[]           = $new_rules[ $i ];
					$post_content['conditions'] = $new_conditions;
					$this->save_action( $post_content, $form, $form_id );
				}
			}
		}
	}
}
