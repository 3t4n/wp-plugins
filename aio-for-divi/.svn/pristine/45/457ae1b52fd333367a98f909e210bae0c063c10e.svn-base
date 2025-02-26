<?php

class Daio_CfStyler extends ET_Builder_Module {

	public $slug       = 'daio_cf7_styler';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divipeople.com/divi-aio',
		'author'     => 'DiviPeople',
		'author_uri' => 'https://divipeople.com',
	);

	public function init() {

		$this->name								=  esc_html__( ' AiO - Contact Form 7', 'daio' );
		$this->icon_path					=  plugin_dir_path( __FILE__ ) . 'cf7.svg';
		$this->main_css_element 	= '%%order_class%%.daio_cf7_styler';

		$this->settings_modal_toggles = array(

			'general'  => array(
				'toggles' => array(
					'general' 			=>		esc_html__( 'General', 'daio' ),
				),
			),

			'advanced' => array(
				'toggles' => array(
					'form_field' 			=>		esc_html__( 'Form Fields', 'daio' ),
					'labels' 					=>		esc_html__( 'Form Label', 'daio' ),
					'radio_checkbox' 	=>		esc_html__( 'Radio & Checkbox', 'daio' ),
					'submit_button' 	=>		esc_html__( 'Submit Button', 'daio' ),
					'suc_err_msg' 	  =>		esc_html__( 'Success / Error Message', 'daio' ),
				),
			),
		);

		$this->custom_css_fields = array(

			'cf7_fields' => array(
				'label'    => esc_html__( 'Form Fields', 'daio' ),
				'selector' => '%%order_class%% .daio-cf7-styler input',
			),

			'cf7_labels' => array(
				'label'    => esc_html__( 'Form Labels', 'daio' ),
				'selector' => '%%order_class%% .daio-cf7-styler label',
			),
		);

	}

	/**
	* Contact form 7
	*/
	public static function select_wpcf7() {

		if ( function_exists( 'wpcf7' ) ) {
			
			$options = array();

			$args = array(
				'post_type'         => 'wpcf7_contact_form',
				'posts_per_page'    => -1
			);

			$contact_forms = get_posts( $args );

			if ( ! empty( $contact_forms ) && ! is_wp_error( $contact_forms ) ) {

				$i = 0;

				foreach ( $contact_forms as $post ) {	
					if ( $i == 0 ) {
						(int)$options[0] = esc_html__( 'Select a Contact form', 'daio' );
					}
					(int)$options[ $post->ID ] = $post->post_title;
					$i++;
				}
			}

		} else {
			$options = array();
		}

		return $options;

	}

	/**
	 * Get Fields
	 */
	public function get_fields() {

		return array(

			'cf7' => array(
				'label'             => esc_html__( 'Select Form', 'daio' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'           => self::select_wpcf7(),
				'description'       => esc_html__( 'Choose a contact form to display.', 'daio' ),
				
				'computed_affects' => array(
					'__cf7form',
				),

				'toggle_slug'       => 'general',
			),

			'form_background_color' => array(
				'label'             => esc_html__( 'Form Field Background Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'default'          	=> '#f5f5f5',
				'toggle_slug'       => 'form_field',
				'tab_slug'          => 'advanced',
			),

			'form_field_active_color' => array(
				'label'             => esc_html__( 'Form Field Active Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'form_field',
			),

			'cf7_cr_size' => array(
				'label'           => esc_html__( 'Size', 'daio' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'radio_checkbox',
				'default_unit'    => 'px',
				'default'         => '20',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '50',
					'step' => '1',
				),
			),

			'cf7_cr_background_color' => array(
				'label'             => esc_html__( 'Background Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'radio_checkbox',
			),

			'cf7_cr_selected_color' => array(
				'label'             => esc_html__( 'Selected Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'default'          	=> '#222222',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'radio_checkbox',
			),

			'cf7_cr_border_color' => array(
				'label'             => esc_html__( 'Border Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'default'          	=> '#222222',
				'toggle_slug'       => 'radio_checkbox',
				'tab_slug'          => 'advanced',
			),

			'cf7_cr_border_size' => array(
				'label'           => esc_html__( 'Border Size', 'daio' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'radio_checkbox',
				'default_unit'    => 'px',
				'default'         => '1',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '5',
					'step' => '1',
				),
			),

			'cf7_cr_label_color' => array(
				'label'             => esc_html__( 'Label Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'radio_checkbox',
			),

			// Success or Error Message
			'cf7_message_color' => array(
				'label'             => esc_html__( 'Message Text Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'cf7_message_bg_color' => array(
				'label'             => esc_html__( 'Message Background Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'cf7_border_highlight_color' => array(
				'label'             => esc_html__( 'Border Highlight Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			// Success
			'cf7_success_message_color' => array(
				'label'             => esc_html__( 'Success Message Text Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'cf7_success_message_bg_color' => array(
				'label'             => esc_html__( 'Success Message Background Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'cf7_success_border_color' => array(
				'label'             => esc_html__( 'Success Border Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),
			
			// Error
			'cf7_error_message_color' => array(
				'label'             => esc_html__( 'Error Message Text Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'cf7_error_message_bg_color' => array(
				'label'             => esc_html__( 'Error Message Background Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'cf7_error_border_color' => array(
				'label'             => esc_html__( 'Error Border Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'cf7_message_padding' => array(
				'label'           => esc_html__( 'Message Padding', 'daio' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'suc_err_msg',
				'default_unit'    => 'px',
				'default'         => '0',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '50',
					'step' => '1',
				),
			),


			'cf7_message_margin_top' => array(
				'label'           => esc_html__( 'Message Margin Top', 'daio' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'suc_err_msg',
				'default_unit'    => 'px',
				'default'         => '0',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '50',
					'step' => '1',
				),
			),
			
			/**
			 * Computed
			 */
			'__cf7form' => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'Daio_CfStyler', 'get_cf7_shortcode_html' ),
				'computed_depends_on' => array(
					'cf7',
				),
			),

		);
	}

	/**
	 * Config Advanced Fields
	 */
	public function get_advanced_fields_config() {

		$advanced_fields = array();
		$advanced_fields['fonts'] = false;
		$advanced_fields['text_shadow'] = false;
		$advanced_fields['link_options']  = false;

		$advanced_fields['fonts']['form_field_font'] = array(
			'label'	=> esc_html__( 'Field', 'daio'),
			'css'	=> array(
				'main' => "%%order_class%% .daio-cf7 .wpcf7 input:not([type=submit]), %%order_class%% .daio-cf7 .wpcf7 input::placeholder, %%order_class%% .daio-cf7 .wpcf7 select, %%order_class%% .daio-cf7 .wpcf7 textarea, %%order_class%% .daio-cf7 .wpcf7 textarea::placeholder",
			),
			'important' => 'all',
			'tab_slug'  			=> 'advanced',
			'toggle_slug'			=> 'form_field'
		);

		$advanced_fields['fonts']['labels'] = array(
			'label'		=> esc_html__( 'Label', 'daio'),
			'css'			=> array(
				'main'	=> "%%order_class%% .wpcf7-form label",
			),
	    'hide_text_align' => true,
			'important' => 'all',
			'tab_slug'  => 'advanced',
			'toggle_slug'	=> 'labels',
		);

		$advanced_fields['fonts']['suc_err_msg'] = array(
			'label'		=> esc_html__( 'Success Error Message', 'daio'),
			'css'			=> array(
				'main'		=> " %%order_class%% .wpcf7-mail-sent-ok, %%order_class%% .wpcf7-validation-errors, %%order_class%% .wpcf7-not-valid-tip",
			),
	    'hide_text_align' => true,
			'important' => 'all',
			'tab_slug'  => 'advanced',
			'toggle_slug'	=> 'suc_err_msg',
		);

		$advanced_fields['button']['submit_button'] = array(
			'label' => esc_html__( 'Submit Button', 'daio' ),
			'css' => array(
				'main'	=> "%%order_class%% .wpcf7-form-control.wpcf7-submit",
			),
			'no_rel_attr' => true,
			'box_shadow'  => array(
				'css' => array(
					'main' => "%%order_class%% .wpcf7-form-control.wpcf7-submit",
				'important' => true,
				),
			),
		);

		$advanced_fields['borders'] = array(
			'default' => array(),
			'field_border'	=> array(
				'label_prefix' => esc_html__( 'Field', 'daio' ),
				'css' => array(
					'main'	=> array(
						'border_radii'  => "%%order_class%% .daio-cf7 input:not([type=submit]), %%order_class%% .daio-cf7 select, %%order_class%% .daio-cf7 textarea, %%order_class%% .daio-cf7 .wpcf7-checkbox input[type='checkbox'] + span:before, %%order_class%% .daio-cf7 .wpcf7-acceptance input[type='checkbox'] + span:before, %%order_class%% .daio-cf7 .wpcf7-radio input[type='radio']:not(:checked) + span:before",
						'border_styles' => "%%order_class%% .daio-cf7 input:not([type=submit]), %%order_class%% .daio-cf7 select, %%order_class%% .daio-cf7 textarea, %%order_class%% .daio-cf7 .wpcf7-checkbox input[type='checkbox'] + span:before, %%order_class%% .daio-cf7 .wpcf7-acceptance input[type='checkbox'] + span:before, %%order_class%% .daio-cf7 .wpcf7-radio input[type='radio']:not(:checked) + span:before",
					),
				'important' => 'all',
				),
				'tab_slug'   	 => 'advanced',
				'toggle_slug'  => 'form_field',
			)
		);

		return $advanced_fields;
	}

	/**
	 * Get Contact form 7 Shortcode with id
	 */
	function get_cf7_shortcode( $args = array() ) {
		
		$cf7_id = $this->props['cf7'];
		$cf7_shortcode = '';
		if( 0 == $cf7_id ) {
			$cf7_shortcode = 'Please select a Contact Form 7.';
		} else {
			$cf7_shortcode = do_shortcode( sprintf( '[contact-form-7 id="%1$s" ]', $cf7_id ) );
		}

		return $cf7_shortcode;
	}

	/**
	 * Contact form 7 shortcode convert to html for using in VB
	 */
	static function get_cf7_shortcode_html( $args = array() ) {

		$cf7_shortcode = new self();
		$cf7_shortcode->props = $args;
		$output = $cf7_shortcode->get_cf7_shortcode( array() );

		return sprintf('
			<div class="daio-cf7-container">
				<div class="daio-cf7 daio-cf7-styler">
					%1$s
				</div>
			</div>',
			$output 
		);
	}

	/**
	 * Render Method
	 * 
	 * @param  $attrs
	 * @param  $content
	 * @param  $render_slug
	 */
	public function render( $attrs, $content = null, $render_slug ) {
		$cf7_fields 									=		$this->props['cf7'];
		$form_background_color      	=		$this->props['form_background_color'];
		$form_background_color_hover	=		$this->get_hover_value( 'form_background_color' );
		$form_field_active_color			=		$this->props['form_field_active_color'];
		$cf7_cr_size       						=		$this->props['cf7_cr_size'];
		$cf7_cr_border_size       		=		$this->props['cf7_cr_border_size'];
		$cf7_cr_background_color      =		$this->props['cf7_cr_background_color'];
		$cf7_cr_selected_color       	=		$this->props['cf7_cr_selected_color'];
		$cf7_cr_border_color       		=		$this->props['cf7_cr_border_color'];
		$cf7_cr_label_color       		=		$this->props['cf7_cr_label_color'];
		$cf7_message_color       			=		$this->props['cf7_message_color'];
		$cf7_message_bg_color      		=		$this->props['cf7_message_bg_color'];
		$cf7_border_highlight_color 	=		$this->props['cf7_border_highlight_color'];
		$cf7_success_message_color    =		$this->props['cf7_success_message_color'];
		$cf7_success_message_bg_color =		$this->props['cf7_success_message_bg_color'];
		$cf7_success_border_color 		=		$this->props['cf7_success_border_color'];
		$cf7_error_message_color      =		$this->props['cf7_error_message_color'];
		$cf7_error_message_bg_color   =		$this->props['cf7_error_message_bg_color'];
		$cf7_error_border_color 			=		$this->props['cf7_error_border_color'];
		$cf7_message_padding					=		$this->props['cf7_message_padding'];
		$cf7_message_margin_top 			=		$this->props['cf7_message_margin_top'];
		$submit_button_icon           = 	$this->props['submit_button_icon'];
		$border_style_all_field    		=		$this->props['border_style_all_field_border'];

		if ( $border_style_all_field === '' ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 input:not([type=submit]), %%order_class%% .daio-cf7 select, %%order_class%% .daio-cf7 textarea, %%order_class%% .daio-cf7 .wpcf7-checkbox input[type="checkbox"] + span:before, %%order_class%% .daio-cf7 .wpcf7-acceptance input[type="checkbox"] + span:before, %%order_class%% .daio-cf7 .wpcf7-radio input[type="radio"]:not(:checked) + span:before',
				'declaration' => sprintf(
					'border-style: %1$s !important;',
					esc_html( 'solid' )
				),
			) );
		}

		if ( '' !== $form_background_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 input:not([type=submit]), %%order_class%% .daio-cf7 select, %%order_class%% .daio-cf7 textarea, %%order_class%% .daio-cf7 .wpcf7-checkbox input[type="checkbox"] + span:before, %%order_class%% .daio-cf7 .wpcf7-acceptance input[type="checkbox"] + span:before, %%order_class%% .daio-cf7 .wpcf7-radio input[type="radio"]:not(:checked) + span:before',

				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $form_background_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $form_field_active_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7 input:not([type=submit]):focus, %%order_class%% .daio-cf7 .wpcf7 select:focus, %%order_class%% .daio-cf7 .wpcf7 textarea:focus',
				'declaration' => sprintf(
					'border-color: %1$s%2$s;',
					esc_html( $form_field_active_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_cr_size || '' !== $cf7_cr_border_size ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-checkbox input[type="checkbox"] + span:before, %%order_class%% .daio-cf7 .wpcf7-acceptance input[type="checkbox"] + span:before, %%order_class%% .daio-cf7 .wpcf7-radio input[type="radio"] + span:before',
				'declaration' => sprintf(
					'width: %1$s%2$s; height: %1$s%2$s; border-width:%3$s%2$s;',
					esc_html( $cf7_cr_size ),
					et_is_builder_plugin_active() ? ' !important' : '',
					esc_html( $cf7_cr_border_size )
				),
			) );
		}

		if ( '' !== $cf7_cr_size ) {
			$font_size = $cf7_cr_size / 1.2;
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-acceptance input[type=checkbox]:checked + span:before, %%order_class%% .daio-cf7 .wpcf7-checkbox input[type=checkbox]:checked + span:before',
				'declaration' => sprintf(
					'font-size: ',
					esc_html( $font_size ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_cr_background_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-checkbox input[type="checkbox"] + span:before, %%order_class%% .daio-cf7 .wpcf7-acceptance input[type="checkbox"] + span:before, %%order_class%% .daio-cf7 .wpcf7-radio input[type="radio"]:not(:checked) + span:before',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $cf7_cr_background_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_cr_background_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-radio input[type="radio"]:checked + span:before',
				'declaration' => sprintf(
					'box-shadow:inset 0px 0px 0px 4px %1$s%2$s;',
					esc_html( $cf7_cr_background_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_cr_selected_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-checkbox input[type="checkbox"]:checked + span:before, %%order_class%% .daio-cf7 .wpcf7-acceptance input[type="checkbox"]:checked + span:before',
				'declaration' => sprintf(
					'color: %1$s%2$s;',
					esc_html( $cf7_cr_selected_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_cr_selected_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-radio input[type="radio"]:checked + span:before',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $cf7_cr_selected_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_cr_border_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-checkbox input[type=radio] + span:before, %%order_class%% .daio-cf7 .wpcf7-radio input[type=checkbox] + span:before, %%order_class%% .daio-cf7 .wpcf7-acceptance input[type="checkbox"] + span:before',
				'declaration' => sprintf(
					'border-color: %1$s%2$s;',
					esc_html( $cf7_cr_border_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_cr_label_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-checkbox label, %%order_class%% .wpcf7-radio label',
				'declaration' => sprintf(
					'color: %1$s%2$s;',
					esc_html( $cf7_cr_label_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_message_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 span.wpcf7-not-valid-tip',
				'declaration' => sprintf(
					'color: %1$s%2$s;',
					esc_html( $cf7_message_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_message_bg_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 span.wpcf7-not-valid-tip',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $cf7_message_bg_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_border_highlight_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 span.wpcf7-not-valid-tip',
				'declaration' => sprintf(
					'border-color: %1$s%2$s;',
					esc_html( $cf7_border_highlight_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		// Success 
		if ( '' !== $cf7_success_message_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-mail-sent-ok',
				'declaration' => sprintf(
					'color: %1$s%2$s;',
					esc_html( $cf7_success_message_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_success_message_bg_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-mail-sent-ok',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $cf7_success_message_bg_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_success_border_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-mail-sent-ok',
				'declaration' => sprintf(
					'border-color: %1$s%2$s;',
					esc_html( $cf7_success_border_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		// Error
		if ( '' !== $cf7_error_message_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .wpcf7-validation-errors',
				'declaration' => sprintf(
					'color: %1$s%2$s;',
					esc_html( $cf7_error_message_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_error_message_bg_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .wpcf7-validation-errors',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $cf7_error_message_bg_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_error_border_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .wpcf7-validation-errors',
				'declaration' => sprintf(
					'border-color: %1$s%2$s;',
					esc_html( $cf7_error_border_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_message_padding ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% span.wpcf7-not-valid-tip',
				'declaration' => sprintf(
					'padding: %1$s%2$s;',
					esc_html( $cf7_message_padding ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $cf7_message_margin_top ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% span.wpcf7-not-valid-tip',
				'declaration' => sprintf(
					'margin-top: %1$s%2$s;',
					esc_html( $cf7_message_margin_top ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		$data_icon = '' !== $submit_button_icon
			? sprintf(
				' data-icon="%1$s"',
				esc_attr( et_pb_process_font_icon( $submit_button_icon ) )
			) : '';

		/**
		 * Output
		 */
		return sprintf( '
			<div class="daio-cf7-container" %2$s>
				<div class="daio-cf7 daio-cf7-styler">
					%1$s
				</div>
			</div>
			',
			$this->get_cf7_shortcode( array() ),
			$data_icon
		);
	}
}

new Daio_CfStyler;
