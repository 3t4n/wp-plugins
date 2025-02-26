<?php

class BaSlider extends ET_Builder_Module {

	public $slug       = 'daio_ba_slider';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divipeople.com/divi-aio',
		'author'     => 'DiviPeople',
		'author_uri' => 'https://divipeople.com',
	);

	/**
	 * Init
	 */
	public function init() {
		$this->name								=  esc_html__( ' AiO - Before After Slider', 'daio' );
		$this->icon_path					=  plugin_dir_path( __FILE__ ) . '';
		$this->main_css_element 	= '%%order_class%%.daio_ba_slider';
		$this->settings_modal_toggles = array(

			'general'  => array(
				'toggles' => array(
					'before' 			 => esc_html__( 'Before', 'daio' ),
					'after' 			 => esc_html__( 'After', 'daio' ),
					'orientation'  => esc_html__( 'Orientation', 'daio' ),
					'handle'  		=> esc_html__( 'Comparison Handle', 'daio' ),
				),
			),

			'advanced' => array(
				'toggles' => array(
					'ba_label' 			=>		esc_html__( 'Before/After Label', 'daio' ),
				),
			),
		);
		$this->custom_css_fields = array(

			'before_img' => array(
				'label'    => esc_html__( 'Before Image', 'daio' ),
				'selector' => '%%order_class%% .twentytwenty-before',
			),

			'after_img' => array(
				'label'    => esc_html__( 'After Image', 'daio' ),
				'selector' => '%%order_class%% .twentytwenty-after',
			),

			'before_label' => array(
				'label'    => esc_html__( 'Before Label', 'daio' ),
				'selector' => '%%order_class%% .twentytwenty-before-label',
			),

			'after_label' => array(
				'label'    => esc_html__( 'After Label', 'daio' ),
				'selector' => '%%order_class%% .twentytwenty-after-label',
			),
		);
	}


	/**
	 * Get Fields
	 */
	public function get_fields() {
		
		$et_accent_color = et_builder_accent_color();

		return array(

			'before_img' => array(
				'label'              => esc_html__( 'Image', 'daio' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'daio' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'daio' ),
				'update_text'        => esc_attr__( 'Set As Image', 'daio' ),
				'description'        => esc_html__( 'Upload an image to display as before image', 'daio' ),
				'hide_metadata'      => true,
				'computed_affects' => array(
					'__baImages',
				),
				'default'            => DIVI_AIO_ASSETS_URI . 'img/placeholder.jpg',
				'toggle_slug'        => 'before',
				'dynamic_content'    => 'image',
			),

			'before_label' => array(
				'default'           => 'Before',
				'label'           	=> esc_html__( 'Before Label', 'daio' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'    	 	=> esc_html__( 'Define the HTML ALT text for your image here.', '' ),
				'computed_affects' 	=> array(
					'__baImages',
				),
				'toggle_slug'     	=> 'before',
			),

			'before_label_bg' 	=>	array(
				'default'           => $et_accent_color,
				'label'             => esc_html__( 'Before Label Background Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'toggle_slug'     	=> 'before',
			),

			'after_img' => array(
				'label'              => esc_html__( 'Image', 'daio' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'daio' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'daio' ),
				'update_text'        => esc_attr__( 'Set As Image', 'daio' ),
				'description'        => esc_html__( 'Upload an image to display at as after image', 'daio' ),
				'hide_metadata'      => true,
				'computed_affects' => array(
					'__baImages',
				),
				'default'            => DIVI_AIO_ASSETS_URI . 'img/placeholder.jpg',
				'toggle_slug'        => 'after',
				'dynamic_content'    => 'image',
			),

			'after_label' => array(
				'default'           => 'After',
				'label'           => esc_html__( 'After Label', 'daio' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'daio' ),
				'computed_affects' => array(
					'__baImages',
				),
				'toggle_slug'     => 'after',
			),

			'after_label_bg' => array(
				'default'           => $et_accent_color,
				'label'             => esc_html__( 'After Label Background Color', 'daio' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'toggle_slug'     	=> 'after',
			),

			'orientation' => array(
				'label'           => esc_html__( 'Before After Slider Orientation', 'daio' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'vertical'   =>  __( 'Vertical', 'daio' ),
					'horizontal' => __( 'Horizontal', 'daio' )
				),
				'computed_affects' => array(
					'__baImages',
				),
	      'default'          => 'horizontal',
				'toggle_slug'     => 'orientation',
			),

			'offset_pct' => array(
				'label'           => esc_html__( 'Initial Offset', 'daio' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'     => array(
					'0.0' => __( '0.0', 'daio' ),
					'0.1' => __( '0.1', 'daio' ),
					'0.2' => __( '0.2', 'daio' ),
					'0.3' => __( '0.3', 'daio' ),
					'0.4' => __( '0.4', 'daio' ),
					'0.5' => __( '0.5', 'daio' ),
					'0.6' => __( '0.6', 'daio' ),
					'0.7' => __( '0.7', 'daio' ),
					'0.8' => __( '0.8', 'daio' ),
					'0.9' => __( '0.9', 'daio' ),
				),
				'computed_affects' => array(
					'__baImages',
				),
	      'default'          => '0.5',
				'toggle_slug'     => 'handle',
			),

			'move_on_hover' => array(
	      'label'          	 => esc_html__( 'Move on Hover', 'daio' ),
	      'type'             => 'yes_no_button',
	      'option_category'  => 'configuration',
	      'options'          => array(
	        'on'  => esc_html__( 'Yes', 'daio' ),
	        'off' => esc_html__( 'No', 'daio' ),
	      ),
				'computed_affects' => array(
					'__baImages',
				),
	      'default'          => 'off',
	      'toggle_slug'      => 'toggle_name',
	    ),

	    '__baImages' => array(
				'type'	=> 'computed',
				'computed_callback' => array( 'BaSlider', 'get_images' ),
				'computed_depends_on' => array(
					'before_img',
					'before_label',
					'after_img',
					'after_label'
				),

				'computed_minimum' => array(
					'before_img',
					'after_img'
				),
			),

		);
	}

	/**
	 * Config Advanced Fields
	 */
	public function get_advanced_fields_config() {

		$advanced_fields = array();

		$advanced_fields['text'] = false;
		$advanced_fields['link_options']  = false;
		// Font
	  $advanced_fields['fonts']['label'] = array(
	    'label'	=> esc_html__( 'Label', 'daio'),
	    'css'   => array(
	      'main' => "%%order_class%% .daio-before-after-slider .twentytwenty-before-label:before, .daio-before-after-slider .twentytwenty-after-label:before",
	      'important' => 'all',
	    ),
	    'toggle_slug' => 'ba_label'
	  );

		return $advanced_fields;
	}

	static function get_images( $args = array() ) {

		$defaults = array(
			'before_img'		=> DIVI_AIO_ASSETS_URI . 'img/placeholder.jpg',
			'after_img' 		=> DIVI_AIO_ASSETS_URI . 'img/placeholder.jpg',
			'before_label' 	=> 'Before',
			'after_label' 	=> 'After',
		);

		$args = wp_parse_args( $args, $defaults );

		$before_img 		=  $args['before_img'];
		$after_img  		=  $args['after_img'];
		$before_label 	=  $args['before_label'];
		$after_label  	=  $args['after_label'];

		$html = sprintf(
			'
			<img class="daio-before-img" style="position: absolute;" src=" %1$s " alt="%3$s"/>
			<img class="daio-after-img" src=" %2$s " alt="%4$s"/>
			',
			esc_attr( $before_img ),
			esc_attr( $after_img ),
			esc_attr( $before_label),
			esc_attr( $after_label )
		);


		return $html;
	}

	public function ba_slider_config( $args = array() ) {
		
		$orientation 		=  ( isset( $args[ 'orientation' ] ) ) ? $args[ 'orientation' ] : '';
		$move_on_hover 	=  ( isset( $args[ 'move_on_hover' ] ) ) ? $args[ 'move_on_hover' ] : '';
		$after_label  	=  ( isset( $args[ 'after_label' ] ) ) ? $args[ 'after_label' ] : '';
		$before_label 	=  ( isset( $args[ 'before_label' ] ) ) ? $args[ 'before_label' ] : '';
		$offset_pct  		=  ( isset( $args[ 'offset_pct' ] ) ) ? $args[ 'offset_pct' ] : '';
		$order_number  		=  ( isset( $args[ 'order_number' ] ) ) ? $args[ 'order_number' ] : '';

		if( 'on' === $move_on_hover ) {
			$move_on_hover = true;
		} else {
			$move_on_hover = false;
		}

		echo '
		<script type="text/javascript">
			jQuery(function($) {
				$(".daio-ba-container-'.$order_number.'" ).twentytwenty({
			    default_offset_pct: "'.$offset_pct.'",
			    move_on_hover: "'.$move_on_hover.'",
			    orientation: "'.$orientation.'",
			    before_label: "'.$before_label.'",
			    after_label: "'.$after_label.'",
			    no_overlay: false,
			    move_slider_on_hover: false,
			    move_with_handle_only: true,
			    click_to_move: true
			  });
			});
		</script>';

	}

	/**
	 * Render Method
	 */
	public function render( $attrs, $content = null, $render_slug ) {

		$before_img 		=		$this->props['before_img'];
		$after_img  		=		$this->props['after_img'];
		$orientation  	=		$this->props['orientation'];
		$before_label 	=		$this->props['before_label'];
		$after_label  	=		$this->props['after_label'];
		$move_on_hover  =		$this->props['move_on_hover'];
		$offset_pct  		=		$this->props['offset_pct'];

		$order_class 		= 	self::get_module_order_class( $render_slug );
		$order_number   = 	str_replace('_','',str_replace( $this->slug,'', $order_class) );

		$this->apply_css( $render_slug );

		$this->ba_slider_config( 
			array(
				'orientation' 	=> $orientation,
				'move_on_hover' => $move_on_hover,
				'before_label' 	=> $before_label,
				'after_label' 	=> $after_label,
				'offset_pct' 		=> $offset_pct,
				'order_number' 	=> $order_number
			)
		);

		ob_start();

		$images = self::get_images(
			array(
				'before_img'		=> $before_img,
				'after_img'			=> $after_img,
				'before_label'	=> $before_label,
				'after_label'		=> $after_label
			)
		);

		$html = sprintf( 
			'<div%3$s class="daio-before-after-slider">
				<div class="daio-ba-container-'.$order_number.'">
				 %1$s
				</div>
			</div>',
			$images,
			$this->module_classname( $render_slug ),
			$this->module_id()
		);

		ob_get_clean();

		return $html;
	}

	public function apply_css( $render_slug ) {

		$before_label_bg 	=		$this->props['before_label_bg'];
		$after_label_bg  	=		$this->props['after_label_bg'];
		
		if ( '' !== $before_label_bg ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .twentytwenty-before-label:before',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $before_label_bg ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		if ( '' !== $after_label_bg ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .twentytwenty-after-label:before',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $after_label_bg ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

	}

}

new BaSlider;
