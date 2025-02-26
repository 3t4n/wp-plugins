<?php

class FancyHeading extends ET_Builder_Module {

	public $slug       = 'daio_fancy_heading';
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
		
		$this->name								=  esc_html__( ' AiO - Fancy Heading', 'daio' );
		$this->icon_path					=  plugin_dir_path( __FILE__ ) . '';
		$this->main_css_element 	= '%%order_class%%.daio_fancy_heading';
		
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'general' 		=>		esc_html__( 'General', 'daio' ),
					'effect' 			=>		esc_html__( 'Effect', 'daio' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'basic'	=>	esc_html__( 'Basic', 'daio' ),
					'text_style'   => array(
						'sub_toggles'		=> array(
							'normal'		=> array(
								'name'		=> 'Normal',
							),
							'fancy'		=> array(
								'name'		=> 'Fancy',
							),
						),
						'tabbed_subtoggles'	=> true,
						'title' 			=> esc_html__( 'Heading Text', 'daio' ),
					),
				),
			),
		);

		$this->custom_css_fields = array(

			'before_text' => array(
				'label'    => esc_html__( 'Before Text', 'daio' ),
				'selector' => '%%order_class%% .daio-before-heading',
			),

			'fancy_text' => array(
				'label'    => esc_html__( 'Fancy Text', 'daio' ),
				'selector' => '%%order_class%% .daio-fancy-heading',
			),

			'after_text' => array(
				'label'    => esc_html__( 'After Text', 'daio' ),
				'selector' => '%%order_class%% .daio-after-heading',
			),

		);
	}

	/**
	 * Get Fields
	 */
	public function get_fields() {

		$et_accent_color = et_builder_accent_color();

		return array(

			'before_text' => array(
				'label'           	=> esc_html__( 'Before Text', 'daio' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'default'  					=> __( 'I am ', 'daio' ),
				'toggle_slug'     	=> 'general',
			),

			'fancy_text' => array(
				'label'           	=> esc_html__( 'Fancy Text', 'daio' ),
				'type'            	=> 'options_list',
				'option_category' 	=> 'basic_option',
				'depends_show_if'		=> 'select',
				'toggle_slug'     	=> 'general'
			),

			'after_text' => array(
				'label'           	=> esc_html__( 'After Text', 'daio' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'default'  					=> __( ' Designer', 'daio' ),
				'toggle_slug'     	=> 'general'
			),

			'effect_type' => array(
				'label'           => esc_html__( 'Select Effect', 'daio' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'type' 		=> __( 'Type', 'daio' )
				),
	      'default'         => 'type',
				'toggle_slug'     => 'effect'
			),

	    'type_loop' => array(
	      'label'          	 => esc_html__( 'Enable Loop', 'daio' ),
	      'type'             => 'yes_no_button',
	      'option_category'  => 'configuration',
	      'options'          => array(
	        'on'  => esc_html__( 'Yes', 'daio' ),
	        'off' => esc_html__( 'No', 'daio' ),
	      ),
	      'default'          => 'on',
	      'show_if'					=> array(
	      	'effect_type' => 'type'
	      ),
				'toggle_slug'     => 'effect',
	    ),

	    'type_show_cursor' => array(
	      'label'          	 => esc_html__( 'Show Cursor', 'daio' ),
	      'type'             => 'yes_no_button',
	      'option_category'  => 'configuration',
	      'options'          => array(
	        'on'  => esc_html__( 'Yes', 'daio' ),
	        'off' => esc_html__( 'No', 'daio' ),
	      ),
	      'default'          => 'off',
	      'show_if'					=> array(
	      	'effect_type' => 'type'
	      ),
				'toggle_slug'     => 'effect',
	    ),

	    'type_cursor_text' => array(
				'default'           => esc_html__( '|', 'daio' ),
				'label'           	=> esc_html__( 'Cursor Text', 'daio' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'show_if'					=> array(
	      	'effect_type' => 'type',
	      	'type_show_cursor'	=> 'on'
	      ),
				'toggle_slug'     	=> 'general',
			),

			'type_cursor_blink' => array(
	      'label'          	 => esc_html__( 'Cursor Blink Effect', 'daio' ),
	      'type'             => 'yes_no_button',
	      'option_category'  => 'configuration',
	      'options'          => array(
	        'on'  => esc_html__( 'Yes', 'daio' ),
	        'off' => esc_html__( 'No', 'daio' ),
	      ),
	      'default'          => 'off',
	      'show_if'					=> array(
	      	'effect_type' => 'type',
	      	'type_show_cursor'	=> 'on'
	      ),
				'toggle_slug'     => 'effect',
	    ),

	    'type_fields' => array(
	      'label'          	 => esc_html__( 'Advanced Settings', 'daio' ),
	      'type'             => 'yes_no_button',
	      'option_category'  => 'configuration',
	      'options'          => array(
	        'on'  => esc_html__( 'Yes', 'daio' ),
	        'off' => esc_html__( 'No', 'daio' ),
	      ),
	      'default'          => 'off',
	      'show_if'					=> array(
	      	'effect_type' => 'type'
	      ),
				'toggle_slug'     => 'effect',
	    ),

	    'type_speed'	=> array(
	      'label'           => esc_html__( 'Typing Speed (ms) ', 'daio' ),
	      'type'            => 'range',
	      'range_settings'  => array(
					'min' => '0',
					'max' => '1000',
	        'step' => '5'
	      ),
	      'default'         => '30',
	      'validate_unit'		=> false,
	      'show_if'					=> array(
	      	'effect_type' => 'type',
	      	'type_fields'	=> 'on'
	      ),
				'toggle_slug'     => 'effect',
	    ),

	    'type_backspeed'	=> array(
	      'label'           => esc_html__( 'Backspeed (ms)', 'daio' ),
	      'type'            => 'range',
	      'range_settings'  => array(
					'min' => '0',
					'max' => '1000',
	        'step' => '5'
	      ),
	      'default'         => '20',
	      'show_if'					=> array(
	      	'effect_type' => 'type',
	      	'type_fields'	=> 'on'
	      ),
				'toggle_slug'     => 'effect',
	    ),

	    'type_start_delay'	=> array(
	      'label'           => esc_html__( 'Start Delay (ms)', 'daio' ),
	      'type'            => 'range',
	      'range_settings'  => array(
					'min' => '0',
					'max' => '5000',
	        'step' => '5'
	      ),
	      'default'         => '1200',
	      'show_if'					=> array(
	      	'effect_type' => 'type',
	      	'type_fields'	=> 'on'
	      ),
				'toggle_slug'     => 'effect',
	    ),

	    'type_back_delay'	=> array(
	      'label'           => esc_html__( 'Back Delay (ms)', 'daio' ),
	      'type'            => 'range',
	      'range_settings'  => array(
					'min' => '0',
					'max' => '5000',
	        'step' => '5'
	      ),
	      'default'         => '500',
	      'show_if'					=> array(
	      	'effect_type' => 'type',
	      	'type_fields'	=> 'on'
	      ),
				'toggle_slug'     => 'effect',
	    ),

			'heading_tag' => array(
				'label'           => esc_html__( 'Heading Level', 'daio' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'		=>[
					'h1'   => __( 'H1', 'daio' ),
					'h2'   => __( 'H2', 'daio' ),
					'h3'   => __( 'H3', 'daio' ),
					'h4'   => __( 'H4', 'daio' ),
					'h5'   => __( 'H5', 'daio' ),
					'h6'   => __( 'H6', 'daio' )
				],
		    'default'         => 'h2',
				'tab_slug'				=> 'advanced',
				'toggle_slug'     => 'basic'
			),

			'heading_align' => array(
				'label'           => esc_html__( 'Alignment', 'daio' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'					=> et_builder_get_text_orientation_options( array( 'justified' ), array( 'justify' => 'Justified' ) ),
	      'default'         => 'center',
				'tab_slug'				=> 'advanced',
				'toggle_slug'     => 'basic',
			),

		);
	}

	/**
	 * Config Advanced Fields
	 */
	public function get_advanced_fields_config() {

		$advanced_fields = array();
		$advanced_fields['text'] 	= false;
		$advanced_fields['link_options']  = false;
		$advanced_fields['button']  = false;

	  $advanced_fields['fonts']['normal'] = array(
	    'css'   => array(
	      'main' => "%%order_class%% .daio-fancy-heading-main .daio-fancy-text-wrap",
	      'important' => 'all',
	    ),
	    'hide_text_align' => true,
			'label'        		=> esc_html__( 'Normal', 'daio' ),
			'tab_slug'				=> 'advanced',
	    'toggle_slug' 		=> 'text_style',
			'sub_toggle'			=> 'normal',
	  );

	  $advanced_fields['fonts']['fancy'] = array(
	    'css'   => array(
	      'main' => "%%order_class%% .daio-fancy-text-main",
	      'important' => 'all',
	    ),
	    'hide_text_align' => true,
	    'hide_font_style' => true,
			'label'        => esc_html__( 'Fancy', 'daio' ),
			'tab_slug'			=> 'advanced',
	    'toggle_slug' 	=> 'text_style',
			'sub_toggle'		=> 'fancy',
	  );

		return $advanced_fields;
	}

	/**
	 * Render Method
	 */
	public function render( $attrs, $content = null, $render_slug ) {

		$before_text 		= $this->props['before_text'];
		$after_text 		= $this->props['after_text'];
		$heading_tag 		= $this->props['heading_tag'];
		$effect_type 		= $this->props['effect_type'];

		$order_class 	  = self::get_module_order_class( $render_slug );
		$order_id	  		= str_replace( '_', '', str_replace( $this->slug,'', $order_class) );

		$order       		= array('&#91', '&#93', ';' );
		$replace     		= array('[', ']');
		$fancy_str      = str_replace( $order, $replace, $this->props['fancy_text'] );
		$fancy_text     = json_decode( $fancy_str );
		
		$data_string 		= '';

		$numItems = count( $fancy_text );
		$i = 0;
		foreach ( $fancy_text as $key => $obj ) {
			if(++$i === $numItems) {
				$data_string  .= $obj->value . '';
		  } else {
				$data_string  .= $obj->value . '|';
		  }
		}

		$data_strings = explode( '|', $data_string );
		$fancy_data   = wp_json_encode( $data_strings );

		if( 'type' === $effect_type ) {
			$type_speed  = ( '' != $this->props['type_speed'] ) ? $this->props['type_speed'] : 30;
			$back_speed  = ( '' != $this->props['type_backspeed'] ) ? $this->props['type_backspeed'] : 20;
			$start_delay = ( '' != $this->props['type_start_delay'] ) ? $this->props['type_start_delay'] : 1200;
			$back_delay  = ( '' != $this->props['type_back_delay'] ) ? $this->props['type_back_delay'] : 500;
			$loop        = ( 'on' == $this->props['type_loop'] ) ? 'true' : 'false';

			if ( 'on' == $this->props['type_show_cursor'] ) {
				$show_cursor = 'true';
				$cursor_char = ( '' != $this->props['type_cursor_text'] ) ? $this->props['type_cursor_text'] : '|';
			} else {
				$show_cursor = 'false';
				$cursor_char = ' ';
			}

			$fancy_effect_options = sprintf(
				'data-type-speed="%1$s"
				 data-animation="%2$s"
				 data-back-speed="%3$s"
				 data-start-delay="%4$s"
				 data-back-delay="%5$s"
				 data-loop="%6$s"
				 data-show-cursor="%7$s"
				 data-cursor-char="%8$s"
				 data-order-id="%9$s"
				 data-strings="%10$s"
				',
				$type_speed,
				$effect_type,
				$back_speed,
				$start_delay,
				$back_delay,
				$loop,
				$show_cursor,
				$cursor_char,
				$order_id,
				htmlspecialchars( $fancy_data, ENT_QUOTES, 'UTF-8')
			);
		} 

		$processed_header_level = et_pb_process_header_level( $heading_tag, 'h2' );
		$processed_header_level = esc_html( $processed_header_level );
		
		ob_start();
	?>

	<<?php echo et_core_esc_previously( $processed_header_level ); ?> class="daio-fancy-text-wrap daio-fancy-text-<?php echo $effect_type; ?>">

		<?php if ( '' != $before_text ) { ?>
			<span class="daio-fancy-heading daio-before-heading"><?php echo $before_text; ?></span>
		<?php } ?>

		<span class="daio-fancy-stack">
		<?php 
		if( 'type' === $effect_type ) {
			?>
			<span class="daio-fancy-heading daio-fancy-text-main daio-type-main-wrap"><span class="daio-fancy-typed-main"></span><span class="daio-fancy-text-holder">.</span></span>
			<?php 
		} ?>
		</span>
		<?php if ( '' != $after_text ) { ?>
			<span class="daio-fancy-heading daio-after-heading"><?php echo $after_text; ?></span>
		<?php } ?>
		<?php echo '</' . et_core_esc_previously( $processed_header_level ) . '>'; ?>

		<?php

		$heading = ob_get_clean();

		/**
		 * Output css
		 */
		$this->apply_css( $render_slug );

		$output = sprintf(
			'<div class="daio-fancy-heading-main" %2$s>
				%1$s
			</div>',
			$heading,
			$fancy_effect_options
		);

		return $output;
	}

	/**
	 * Apply CSS
	 */
	public function apply_css( $render_slug ) {

		$heading_align  = $this->props['heading_align'];

		if ( '' !== $heading_align ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-fancy-heading-main',
				'declaration' => sprintf(
					'text-align: %1$s !important;',
					esc_html( $heading_align )
				),
			));
		}
	}

}

new FancyHeading;
