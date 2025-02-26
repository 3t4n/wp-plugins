<?php
/**
 * Gravity Forms Styler Module
 * 
 * @package GF Styler
 * @author DiviPeople
 * @link https://divipeople.com
 * @since 1.0.0
 */

class GfStyler extends ET_Builder_Module {

	public $slug       = 'daio_gf_styler';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divipeople.com/divi-aio',
		'author'     => 'DiviPeople',
		'author_uri' => 'https://divipeople.com',
	);

	public function init() {

		$this->name 							= esc_html__( ' AiO - Gravity Forms', 'daio' );
		$this->icon_path					=	plugin_dir_path( __FILE__ ) . 'gf.svg';
		$this->main_css_element 	=	'%%order_class%%.daio_gf_styler';
		$this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'general' => esc_html__( 'General', 'daio' ),
				),
			),

			'advanced' => array(
				'toggles' => array(
					'form_field' 			=> esc_html__( 'Form Fields', 'daio' ),
					'labels' 					=> esc_html__( 'Labels', 'daio' ),
					'radio_checkbox' 	=> esc_html__( 'Radio & Checkbox', 'daio' ),
					'submit_button' 	=> esc_html__( 'Submit Button', 'daio' ),
					'suc_err_msg' 	 	=> esc_html__( 'Success / Error Message', 'daio' ),
				),
			)
		);

		$this->custom_css_fields = array(

			'gf_fields' => array(
				'label'    => esc_html__( 'Form Fields', 'daio' ),
				'selector' => '%%order_class%% input',
			),

			'gf_labels' => array(
				'label'    => esc_html__( 'Form Labels', 'daio' ),
				'selector' => '%%order_class%% label',
			),
		);
	}

	/**
	 * Render Gravity Form Script.
	 * @access protected
	 */
	protected function gf_render_script() {

		if ( class_exists( 'GFCommon' ) ) {

			$gf_forms = \RGFormsModel::get_forms( null, 'title' );

			foreach ( $gf_forms as $form ) {

				if ( '0' != $form->id ) {
					gravity_form_enqueue_scripts( $form->id );
				}
			};
		}
	}

	/**
	 * Returns all gravity forms with ids
	 * @access protected
	 */
	protected function get_gravity_forms() {

		$options = array();

		if ( class_exists( 'GFForms' ) ) {
			$forms = \RGFormsModel::get_forms( null, 'title' );
			(int)$options['0'] = 'Select';
			if ( is_array( $forms ) ) {
				foreach ( $forms as $display_form ) {
					(int)$options[ $display_form->id ] = $display_form->title;
				}
			}
		}

		if ( empty( $options ) ) {
			$options = array(
				'-1' => __( 'You have not added any Gravity Forms yet.', 'daio' ),
			);
		}

		return $options;
	}

	/**
	 * Get fields
	 */
	public function get_fields() {

		return array(

			'gf_form_id' => array(
				'label'             => esc_html__( 'Select Form', 'daio' ),
				'type'            	=> 'select',
				'option_category' 	=> 'layout',
				'options'           => $this->get_gravity_forms(),
				'description'       => esc_html__( 'Choose a Gravity Form to display.', 'daio' ),
				'computed_affects' => array(
					'__gfform',
				),
				'toggle_slug'       => 'general'
			),

			'gf_enable_ajax' => array(
				'label'            => esc_html__( 'Enable AJAX Form Submission', 'daio' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'daio' ),
					'off' => esc_html__( 'No', 'daio' ),
				),
				'default'          => 'on',
				'description'      => esc_html__( 'AJAX Form Submission on and off.', 'daio' ),
				'toggle_slug'       => 'general'
			),

			'gf_form_tab_index_option'	=> array(
				'default'           	=> '1',
				'type'              	=> 'text',
				'label'             	=> esc_html__( 'Set Tabindex Value', 'woro-woo-rocket' ),
				'option_category'   	=> 'configuration',
				'toggle_slug'       	=> 'general'
			),

			'gf_form_title_desc_option' => array(
				'label'             => esc_html__( 'Title & Description', 'daio' ),
				'type'            	=> 'select',
				'option_category'   => 'layout',
				'default'         	=> 'yes',
				'options'     			=> array(
					'yes'  => esc_html__( 'From Gravity Form', 'daio' ),
					'no'   => esc_html__( 'Enter Your Own', 'daio' ),
					'none' => esc_html__( 'None', 'daio' ),
				),

				'toggle_slug'       => 'general'

			),

			'form_title' => array(
				'label'             => esc_html__( 'Form Title', 'daio' ),
				'type'              => 'text',
				'option_category' 	=> 'basic_option',

				'show_if'         => array(
					'gf_form_title_desc_option' => 'no',
				),
				
				'toggle_slug'       => 'general',
			),

			'form_desc' => array(
				'label'             => esc_html__( 'Form Description', 'daio' ),
				'type'            	=> 'tiny_mce',
				'option_category' 	=> 'basic_option',
				'show_if'         	=> array(
					'gf_form_title_desc_option' => 'no',
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

			'form_input_desc_color' => array(
				'label'             => esc_html__( 'Field Description Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'default'          	=> '#f5f5f5',
				'toggle_slug'       => 'form_field',
				'tab_slug'          => 'advanced',
			),

			'gf_cr_size' => array(
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

			'gf_cr_background_color' => array(
				'label'             => esc_html__( 'Background Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'radio_checkbox',
			),

			'gf_cr_selected_color' => array(
				'label'             => esc_html__( 'Selected Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'default'          	=> '#222222',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'radio_checkbox',
			),

			'gf_cr_border_color' => array(
				'label'             => esc_html__( 'Border Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'default'          	=> '#222222',
				'toggle_slug'       => 'radio_checkbox',
				'tab_slug'          => 'advanced',
			),

			'gf_cr_border_size' => array(
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

			'gf_cr_label_color' => array(
				'label'             => esc_html__( 'Label Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'radio_checkbox',
			),

			// Success / Error Message
			'gf_message_color' => array(
				'label'             => esc_html__( 'Message Text Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'gf_message_bg_color' => array(
				'label'             => esc_html__( 'Message Background Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'gf_border_highlight_color' => array(
				'label'             => esc_html__( 'Border Highlight Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			// Success
			'gf_success_message_color' => array(
				'label'             => esc_html__( 'Success Message Text Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'gf_success_message_bg_color' => array(
				'label'             => esc_html__( 'Success Message Background Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'gf_success_border_color' => array(
				'label'             => esc_html__( 'Success Border Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),
			
			// Error
			'gf_error_message_color' => array(
				'label'             => esc_html__( 'Error Message Text Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'gf_error_message_bg_color' => array(
				'label'             => esc_html__( 'Error Message Background Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'gf_error_border_color' => array(
				'label'             => esc_html__( 'Error Border Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'suc_err_msg',
			),

			'gf_message_padding' => array(
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


			'gf_message_margin_top' => array(
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
			'__gfform' => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'GfStyler', 'get_gf_shortcode_html' ),
				'computed_depends_on' => array(
					'gf_form_id',
					'gf_enable_ajax',
					'gf_form_tab_index_option',
					'gf_form_title_desc_option',
					'form_title',
					'form_desc'
				),
			),
		);
	}

	/**
	 * Config Advanced Fields
	 */
	public function get_advanced_fields_config() {
		$advanced_fields = array();
		/**
		 * Fonts ( Labels, Placeholer)
		 */
		$advanced_fields['fonts'] = false;
		$advanced_fields['text'] = false;
		$advanced_fields['text_shadow'] = false;
		$advanced_fields['link_options']  = false;

		$advanced_fields['fonts'] = array(
			'form_field_font'		=> array(
				'label'		=> esc_html__( 'Field', 'daio-gf-styler'),

				'css'      => array(
					'main' => implode( ', ', array(
						"{$this->main_css_element} .daio-gf-style .gform_wrapper .gfield input:not([type='radio']):not([type='checkbox']):not([type='submit']):not([type='button']):not([type='image']):not([type='file'])",
							"{$this->main_css_element} .daio-gf-style .ginput_container select",
							"{$this->main_css_element} .daio-gf-style .ginput_container .chosen-single",  
							"{$this->main_css_element} .daio-gf-style .ginput_container textarea",
							"{$this->main_css_element} .daio-gf-style .gform_wrapper .gfield input::placeholder",
							"{$this->main_css_element} .daio-gf-style .ginput_container textarea::placeholder",
							"{$this->main_css_element} .daio-gf-style .gfield_checkbox input[type='checkbox']:checked + label:before",
							"{$this->main_css_element} .daio-gf-style .ginput_container_consent input[type='checkbox'] + label:before",
						) ),
					'important' => array(
						'font',
						'size',
						'letter-spacing',
						'line-height',
						'text-align',
						'all_caps',
					),
				),

				'toggle_slug'	=> 'form_field',
			),
		);

		$advanced_fields['fonts']['suc_err_msg'] = array(
			'form_field_font'		=> array(
				'label'		=> esc_html__( 'Field', 'daio-gf-styler'),

				'css'      => array(
					'main' => "{$this->main_css_element} .daio-gf-style .gform_wrapper .validation_message",
					'important' => array(
						'font',
						'size',
						'letter-spacing',
						'line-height',
						// 'text-align',
						'all_caps',
					),
				),

				'toggle_slug'	=> 'suc_err_msg',
			),
		);

		$advanced_fields['fonts']['labels'] = array(
			'labels'		=> array(
				'label'		=> esc_html__( 'Label', 'daio-gf-styler'),
				'css'			=> array(
					'main'	=> implode( ', ', array( 
						"{$this->main_css_element} .daio-gf-style .gfield_label",
						"{$this->main_css_element} .daio-gf-style .gfield_checkbox li label",
						"{$this->main_css_element} .daio-gf-style .ginput_container_consent label",
						"{$this->main_css_element} .daio-gf-style .gfield_radio li label",
						"{$this->main_css_element} .daio-gf-style .gsection_title",
						"{$this->main_css_element} .daio-gf-style .gfield_html",
						"{$this->main_css_element} .daio-gf-style .ginput_product_price",
						"{$this->main_css_element} .daio-gf-style .ginput_product_price_label",
					) ),

					'important' => 'all'
				),

				'toggle_slug'	=> 'labels',
			),
		);

		$advanced_fields['button'] = array(
			'submit_button' => array(
				'label' => esc_html__( 'Submit Button', 'daio-gf-styler' ),
				'css' => array(
					'main'	=> implode( ', ', array( 
						"{$this->main_css_element} .daio-gf-style input[type=submit]",
						"{$this->main_css_element} .daio-gf-style input[type=button]"
						)
					),
				),
				'no_rel_attr' => true,
				'box_shadow'  => array(
					'css' => array(
						'main' => implode( ', ', array( 
						"{$this->main_css_element} .daio-gf-style input[type=submit]",
						"{$this->main_css_element} .daio-gf-style input[type=button]"
						)
					),
						'important' => true,
					),
				),
			)
		);

		$advanced_fields['borders']['default'] = array();

		$advanced_fields['borders']['field'] = array(
			'label_prefix' => esc_html__( 'Field', 'daio-gf-styler' ),
			'toggle_slug'  => 'form_field',
			'css'          => array(
				'main'      => array(
					'border_radii'  => sprintf('
						%1$s .daio-gf-style input:not([type=submit]),
						%1$s .daio-gf-style .gform_wrapper input[type=email],
						%1$s .daio-gf-style .gform_wrapper input[type=text],
						%1$s .daio-gf-style .gform_wrapper input[type=password],
						%1$s .daio-gf-style .gform_wrapper input[type=url],
						%1$s .daio-gf-style .gform_wrapper input[type=tel],
						%1$s .daio-gf-style .gform_wrapper input[type=number],
						%1$s .daio-gf-style .gform_wrapper input[type=date],
						%1$s .daio-gf-style .gform_wrapper select, 
						%1$s .daio-gf-style .gform_wrapper .chosen-container-single .chosen-single, 
						%1$s .daio-gf-style .gform_wrapper .chosen-container-multi .chosen-choices, 
						%1$s .daio-gf-style .gform_wrapper textarea, 
						%1$s .daio-gf-style .gfield_checkbox input[type="checkbox"] + label:before,
						%1$s .daio-gf-style .gfield_radio input[type="radio"] + label:before', 
						$this->main_css_element 
					),

					'border_styles' => sprintf('
						
						%1$s .daio-gf-style input:not([type=submit]),
						%1$s .daio-gf-style .gform_wrapper input[type=email],
						%1$s .daio-gf-style .gform_wrapper input[type=text],
						%1$s .daio-gf-style .gform_wrapper input[type=password],
						%1$s .daio-gf-style .gform_wrapper input[type=url],
						%1$s .daio-gf-style .gform_wrapper input[type=tel],
						%1$s .daio-gf-style .gform_wrapper input[type=number],
						%1$s .daio-gf-style .gform_wrapper input[type=date],
						%1$s .daio-gf-style .gform_wrapper select, 
						%1$s .daio-gf-style .gform_wrapper .chosen-container-single .chosen-single, 
						%1$s .daio-gf-style .gform_wrapper .chosen-container-multi .chosen-choices, 
						%1$s .daio-gf-style .gform_wrapper textarea, 
						%1$s .daio-gf-style .gfield_checkbox input[type="checkbox"] + label:before,
						%1$s .daio-gf-style .gfield_radio input[type="radio"] + label:before', 
						$this->main_css_element 
					),
				),

				'important' => 'all',
			),
		);

		return $advanced_fields;
	}

	/**
	 * Get Gravity form Shortcode with id
	 */
	public function get_gf_shortcode( $args = array() ) {

		$gf_form_id 							= $this->props['gf_form_id'];
		$enable_ajax 							= $this->props['gf_enable_ajax'];
		$form_tab_index_option 		= $this->props['gf_form_tab_index_option'];
		$form_title_desc_option 	= $this->props['gf_form_title_desc_option'];

		$title       = '';
		$description = '';

		if ( 'yes' === $form_title_desc_option ) {

			if ( class_exists( 'GFAPI' ) ) {
				$form      		=	 GFAPI::get_form( absint( $gf_form_id ) );
				$title     		=	 $form['title'];
				$form_desc 		=	 'true';
			}
		}	elseif ( 'no' === $form_title_desc_option ) {

			$title       		=	 $this->props['form_title'];
			$description 		=	 $this->props['form_desc'];
			$form_desc   		=	 'false';
		} else {
			$title       		=	 '';
			$description 		=	 '';
			$form_desc   		=	 'false';
		}

		ob_start();
		//checking is form selected or not
		if ( '0' == $gf_form_id ) {

			esc_html__( 'Please select a Gravity Form', 'daio-gf-styler');

		} elseif ( $gf_form_id ) {

			$ajax = ( 'on' == $enable_ajax ) ? 'true' : 'false';

			if ( '' !== $title ) { 
				echo '<h2 class="daio-gf-form-title">'. esc_attr( $title ) .'</h2>';
			}

			if ( '' !== $description ) {
				echo '<p class="daio-gf-form-title">'. esc_attr( $description ) .'</p>';
			}

			echo do_shortcode(
				sprintf( '[gravityform id=%1$s title="false" description="%2$s" ajax="%3$s" tabindex="%4$s"]', 
					absint( $gf_form_id ),
					$form_desc,
					$ajax,
					$form_tab_index_option
				)
			);
		}

		$output = ob_get_clean();
		return $output;
	}

	/**
	 * Render html for VB
	 */
	static function get_gf_shortcode_html( $args = array() ) {

		$gf_shortcode = new self();
		$gf_shortcode->props = $args;
		$output = $gf_shortcode->get_gf_shortcode( array() );

		return sprintf( '
			<div class="daio-gf-container">
				<div class="daio-gf daio-gf-style">
					%1$s
				</div>
			</div>',
			$output
		);
	}

	/**
	 * Render Method
	 */
	public function render( $attrs, $content = null, $render_slug ) {

		$gf_form_id 							= $this->props['gf_form_id'];
		$enable_ajax 							= $this->props['gf_enable_ajax'];
		$form_tab_index_option 		= $this->props['gf_form_tab_index_option'];
		$form_title_desc_option 	= $this->props['gf_form_title_desc_option'];

		$this->apply_css( $render_slug );

		/**
		 * Output print
		 * @author DiviPeople
		 * @since 1.0.0
		 */
		return sprintf( '
			<div class="daio-gf-container">
				<div class="daio-gf daio-gf-style">
					%1$s
				</div>
			</div>
			',
			$this->get_gf_shortcode( array() ) 
		);

		$this->gf_render_script();

	}

	/**
	 * Apply CSS
	 */
	public function apply_css( $render_slug ) {

		$form_background_color      	=		$this->props['form_background_color'];
		$form_background_color_hover	=		$this->get_hover_value( 'form_background_color' );
		$form_field_active_color			=		$this->props['form_field_active_color'];
		$form_input_desc_color  			=		$this->props['form_input_desc_color'];
		$gf_cr_size       						=		$this->props['gf_cr_size'];
		$gf_cr_border_size       			=		$this->props['gf_cr_border_size'];
		$gf_cr_background_color       =		$this->props['gf_cr_background_color'];
		$gf_cr_selected_color       	=		$this->props['gf_cr_selected_color'];
		$gf_cr_border_color       		=		$this->props['gf_cr_border_color'];
		$gf_cr_label_color       			=		$this->props['gf_cr_label_color'];
		$gf_message_color       			=		$this->props['gf_message_color'];
		$gf_message_bg_color      		=		$this->props['gf_message_bg_color'];
		$gf_border_highlight_color 		=		$this->props['gf_border_highlight_color'];
		$gf_success_message_color    	=		$this->props['gf_success_message_color'];
		$gf_success_message_bg_color 	=		$this->props['gf_success_message_bg_color'];
		$gf_success_border_color 			=		$this->props['gf_success_border_color'];
		$gf_error_message_color      	=		$this->props['gf_error_message_color'];
		$gf_error_message_bg_color  	=		$this->props['gf_error_message_bg_color'];
		$gf_error_border_color 				=		$this->props['gf_error_border_color'];
		$gf_message_padding						=		$this->props['gf_message_padding'];
		$gf_message_margin_top 				=		$this->props['gf_message_margin_top'];

		if ( '' !== $form_background_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '
					%%order_class%% .daio-gf-style input:not([type=submit]),
					%%order_class%% .daio-gf-style .gform_wrapper input[type=email],
					%%order_class%% .daio-gf-style .gform_wrapper input[type=text],
					%%order_class%% .daio-gf-style .gform_wrapper input[type=password],
					%%order_class%% .daio-gf-style .gform_wrapper input[type=url],
					%%order_class%% .daio-gf-style .gform_wrapper input[type=tel],
					%%order_class%% .daio-gf-style .gform_wrapper input[type=number],
					%%order_class%% .daio-gf-style .gform_wrapper input[type=date],
					%%order_class%% .daio-gf-style .gform_wrapper select, 
					%%order_class%% .daio-gf-style .gform_wrapper .chosen-container-single .chosen-single, 
					%%order_class%% .daio-gf-style .gform_wrapper .chosen-container-multi .chosen-choices, 
					%%order_class%% .daio-gf-style .gform_wrapper textarea, 
					%%order_class%% .daio-gf-style .gfield_checkbox input[type="checkbox"] + label:before,
					%%order_class%% .daio-gf-style .gfield_radio input[type="radio"] + label:before', 
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

		if ( '' !== $form_input_desc_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '
				
				',
				'declaration' => sprintf(
					'border-color: %1$s%2$s;',
					esc_html( $form_input_desc_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		// CHeckbox & radio
		if ( '' !== $gf_cr_size || '' !== $gf_cr_border_size ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector' => '
					%%order_class%% .gfield_checkbox input[type="checkbox"] + label:before,
					%%order_class%% .gfield_radio input[type="radio"] + label:before,
					%%order_class%% .ginput_container_consent input[type="checkbox"] + label:before',
				'declaration' => sprintf(
					'width: %1$s%2$s; height: %1$s%2$s; border-width:%3$s%2$s;',
					esc_html( $gf_cr_size ),
					et_is_builder_plugin_active() ? ' !important' : '',
					esc_html( $gf_cr_border_size )
				),
			) );
		}

		if ( '' !== $gf_cr_size ) {
			$font_size = $gf_cr_size / 1.2;
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '
					%%order_class%% .gfield_checkbox input[type="checkbox"] + label:before,
					%%order_class%% .gfield_radio input[type="radio"] + label:before,
					%%order_class%% .ginput_container_consent input[type="checkbox"] + label:before',
				'declaration' => sprintf(
					'font-size: ',
					esc_html( $font_size ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_cr_background_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '
				%%order_class%% .daio-gf-style .gfield_checkbox input[type="checkbox"] + label:before,
 				%%order_class%% .daio-gf-style .gfield_radio input[type="radio"] + label:before,
 				%%order_class%% .daio-gf-style .ginput_container_consent input[type="checkbox"]',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $gf_cr_background_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_cr_background_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-gf-style .gfield_radio input[type="radio"]:checked + label:before',
				'declaration' => sprintf(
					'box-shadow:inset 0px 0px 0px 4px %1$s%2$s;',
					esc_html( $gf_cr_background_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_cr_selected_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-gf-style .gfield_checkbox input[type=checkbox]:checked + label:before, %%order_class%% .daio-gf-style .ginput_container_consent input[type=checkbox] + label:before',
				'declaration' => sprintf(
					'color: %1$s%2$s;',
					esc_html( $gf_cr_selected_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_cr_selected_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector' => '%%order_class%% .daio-gf-style .gfield_radio input[type=radio]:checked + label:before',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $gf_cr_selected_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_cr_border_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '
					%%order_class%% .daio-gf-style .gfield_checkbox input[type=checkbox] + label:before, 
					%%order_class%% .daio-gf-style .gfield_radio input[type=radio] + label:before, 
					%%order_class%% .daio-gf-style .ginput_container_consent input[type=checkbox] + label:before',
				'declaration' => sprintf(
					'border-color: %1$s%2$s;',
					esc_html( $gf_cr_border_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_cr_label_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '
				%%order_class%% .daio-gf-style .gfield_checkbox li label, 
				%%order_class%% .daio-gf-style .gfield_radio li label, 
				%%order_class%% .daio-gf-style .ginput_container_consent label
				',
				'declaration' => sprintf(
					'color: %1$s%2$s;',
					esc_html( $gf_cr_label_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		// Success/Error Message
		if ( '' !== $gf_message_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-gf-style .gform_wrapper .gfield_description.validation_message',
				'declaration' => sprintf(
					'color: %1$s%2$s;',
					esc_html( $gf_message_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_message_bg_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 span.wpcf7-not-valid-tip',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $gf_message_bg_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_border_highlight_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 span.wpcf7-not-valid-tip',
				'declaration' => sprintf(
					'border-color: %1$s%2$s;',
					esc_html( $gf_border_highlight_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		// Success 
		if ( '' !== $gf_success_message_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-mail-sent-ok',
				'declaration' => sprintf(
					'color: %1$s%2$s;',
					esc_html( $gf_success_message_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_success_message_bg_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-mail-sent-ok',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $gf_success_message_bg_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_success_border_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-cf7 .wpcf7-mail-sent-ok',
				'declaration' => sprintf(
					'border-color: %1$s%2$s;',
					esc_html( $gf_success_border_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		// Error
		if ( '' !== $gf_error_message_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .wpcf7-validation-errors',
				'declaration' => sprintf(
					'color: %1$s%2$s;',
					esc_html( $gf_error_message_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_error_message_bg_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .wpcf7-validation-errors',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $gf_error_message_bg_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_error_border_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .wpcf7-validation-errors',
				'declaration' => sprintf(
					'border-color: %1$s%2$s;',
					esc_html( $gf_error_border_color ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_message_padding ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% span.wpcf7-not-valid-tip',
				'declaration' => sprintf(
					'padding: %1$s%2$s;',
					esc_html( $gf_message_padding ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $gf_message_margin_top ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% span.wpcf7-not-valid-tip',
				'declaration' => sprintf(
					'margin-top: %1$s%2$s;',
					esc_html( $gf_message_margin_top ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}
	}

}

new GfStyler;