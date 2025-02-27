<?php
if( ! class_exists( 'Nevillex_Section_Instagram' ) ) {
	/**
	 * Instagram section
	 *
	 * Will display your Instagram photos feed.
	 *
	 * @since 1.0.0
	 */
	class Nevillex_Section_Instagram extends Nevillex_Widgets_Base {

		/**
		 * Instagram API
		 *
		 * @var    Nevillex_API_Instagram
		 * @since  1.0.0
		 * @access public
		 */
		public $api;

		/**
		 * Widget defaults
		 *
		 * @var    array
		 * @since  1.0.0
		 * @access protected
		 */
		protected $defaults;

		/**
		 * Widget instance
		 *
		 * @since  1.0.0
		 * @access public
		 */
		function __construct() {
			// Variables
			$this->widget_title = __( 'Instagram' , 'neville-extensions' );
			$this->widget_id    = 'instagram';

			// Settings
			$widget_ops = [
				'classname'   => 'section-instagram',
				'description' => esc_html__( 'Will display your Instagram photos feed.', 'neville-extensions' ),
				'customize_selective_refresh' => true
			];

			// Control settings
			$idBase = 'neville-section-' . $this->widget_id;

			$control_ops = [
				'width'   => NULL,
				'height'  => NULL,
				'id_base' => $idBase
			];

			// Create the widget
			parent::__construct( $idBase, $this->widget_title, $widget_ops, $control_ops );

			// Set some widget defaults
			$this->defaults = apply_filters( 'nevillex_section_instagram___defaults', [
				'title'   => esc_html__( 'Instagram Feed', 'neville-extensions' ),
				'descr'   => '',
				'hr_text' => '',
				'hr_link' => '',
				'header'  => true,
				'qty'     => '12',
				'ot_text' => '',
				'ot_link' => '',
				'links'   => true,
				'target'  => '_blank',
				'relattr' => '',
			], $this );

			// Instagram API
			$this->api = Nevillex_API_Instagram::getInstance();
		}

		/**
		 * Widget output
		 *
		 * @since  1.0.0
		 * @access public
		 */
		public function widget( $args, $instance ) {
			// Turn $args array into variables.
			extract( $args );

			// $instance Defaults
			$instance_defaults = $this->defaults;

			// Parse $instance
			$instance = wp_parse_args( $instance, $instance_defaults );

			// Pass arguments to our template
			$widget_options = [
				// General
				'widget' => $this,
				// Header
				'title'   => empty( $instance[ 'title' ] ) ? $instance_defaults[ 'title' ] : $instance[ 'title' ],
				'descr'   => empty( $instance[ 'descr' ] ) ? $instance_defaults[ 'descr' ] : $instance[ 'descr' ],
				'hr_text' => empty( $instance[ 'hr_text' ] ) ? $instance_defaults[ 'hr_text' ] : $instance[ 'hr_text' ],
				'hr_link' => empty( $instance[ 'hr_link' ] ) ? $instance_defaults[ 'hr_link' ] : $instance[ 'hr_link' ],
				'header'  => isset( $instance[ 'header' ] ) ? $instance[ 'header' ] : false,
				// General options
				'qty'     => isset( $instance[ 'qty' ] ) ? $instance[ 'qty' ] : $instance_defaults[ 'qty' ],
				// Overlay title
				'ot_text' => empty( $instance[ 'ot_text' ] ) ? $instance_defaults[ 'ot_text' ] : $instance[ 'ot_text' ],
				'ot_link' => empty( $instance[ 'ot_link' ] ) ? $instance_defaults[ 'ot_link' ] : $instance[ 'ot_link' ],
				// Links
				'links'   => isset( $instance[ 'links' ] ) ? $instance[ 'links' ] : false,
				'target'  => isset( $instance[ 'target' ] ) ? $instance[ 'target' ] : $instance_defaults[ 'target' ],
				'relattr' => empty( $instance[ 'relattr' ] ) ? $instance_defaults[ 'relattr' ] : $instance[ 'relattr' ],
			];

			// Filter before we add them
			$widget_options = apply_filters( 'nevillex_section_instagram___options', $widget_options, $this, $instance, $instance_defaults );

			// Add some CSS classes
			$before = apply_filters( 'nevillex_section_instagram___before', [
				'bw'   => $args[ 'before_widget' ],
				'type' => 'section_instagram',
				'css'  => [ 'wrap', 'ex-instagram-feed', 'ex-no-styles' ]
			], $instance, $args );

			$before = nevillex_widget_css_classes( $before );

			// Use default if `$before` returns false.
			$args[ 'before_widget' ] = $before !== false ? $before : $args[ 'before_widget' ];

			// Show only where it's allowed
			$not_allowed = apply_filters( 'nevillex_section_instagram___conditions', [
				'funcs' => [
					'is_paged' => null
				]
			] );

			if( parent::_conditioned( $not_allowed ) ) return;

			// Widget template output
			echo $args['before_widget'];

				/**
				 * Hooked:
				 * nevillex_section_instagram_start  - 10
				 * nevillex_section_instagram_header - 20
				 * nevillex_section_instagram_init   - 30
				 * nevillex_section_instagram_end    - 999
				 *
				 * @see ../sections/instagram/instagram-tmpl.php
				 */
				do_action( 'nevillex__section_instagram', $widget_options );

			echo $args['after_widget'];
		}

		/**
		 * Widget update instance
		 *
		 * @since  1.0.0
		 * @access public
		 */
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			// Strings
			$instance[ 'title' ]   = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'descr' ]   = sanitize_text_field( $new_instance[ 'descr' ] );
			$instance[ 'hr_text' ] = sanitize_text_field( $new_instance[ 'hr_text' ] );
			$instance[ 'hr_link' ] = esc_url_raw( $new_instance[ 'hr_link' ] );
			$instance[ 'ot_text' ] = sanitize_text_field( $new_instance[ 'ot_text' ] );
			$instance[ 'ot_link' ] = esc_url_raw( $new_instance[ 'ot_link' ] );
			$instance[ 'relattr' ] = sanitize_text_field( $new_instance[ 'relattr' ] );

			// Select
			$instance[ 'qty' ]  = (int) nevillex_sanitize_select(
				$new_instance[ 'qty' ],
				[ '6', '12' ],
				$this->defaults[ 'qty' ],
				false
			);
			$instance[ 'target' ]  = nevillex_sanitize_select(
				$new_instance[ 'target' ],
				[ '_blank', '_self' ],
				$this->defaults[ 'target' ],
				false
			);

			// Checkboxes
			$instance[ 'header' ] = isset( $new_instance[ 'header' ] ) ? (bool) $new_instance[ 'header' ] : false;
			$instance[ 'links' ]  = isset( $new_instance[ 'links' ] ) ? (bool) $new_instance[ 'links' ] : false;

			// Filter before we update
			$instance = apply_filters( 'nevillex_section_instagram___update', $instance, $new_instance );

			// Return updated instance
			return $instance;
		}

		/**
		 * Widget form
		 *
		 * @since  1.0.0.
		 * @access public
		 */
		public function form( $instance ) {
			// Parse $instance
			$instance_defaults = $this->defaults;
			$instance = wp_parse_args( $instance, $instance_defaults );
			extract( $instance, EXTR_SKIP );

			/**
			 * Form inputs
			 */

			$fields = [

				// Title - header
				'title_header' => [
					'type'      => 'title',
					'label'     => __( 'Header', 'neville-extensions' ),
					'instance'  => 'title_header',
				],

					// Title
					'title'   => [
						'type'     => 'text_field',
						'label'    => __( 'Section title', 'neville-extensions' ),
						'instance' => empty( $instance['title'] ) ? $instance_defaults[ 'title' ] : $instance[ 'title' ],
					],

					// Description
					'descr'   => [
						'type'     => 'text_field',
						'label'    => __( 'Section description', 'neville-extensions' ),
						'instance' => empty( $instance['descr'] ) ? $instance_defaults[ 'descr' ] : $instance[ 'descr' ],
					],

					// Header right link text
					'hr_text'   => [
						'type'     => 'text_field',
						'label'    => __( 'Right side link - text', 'neville-extensions' ),
						'instance' => empty( $instance['hr_text'] ) ? $instance_defaults[ 'hr_text' ] : $instance[ 'hr_text' ],
					],

					// Header right link URL
					'hr_link'   => [
						'type'     => 'text_field',
						'label'    => __( 'Right side link - URL', 'neville-extensions' ),
						'instance' => empty( $instance['hr_link'] ) ? $instance_defaults[ 'hr_link' ] : $instance[ 'hr_link' ],
					],

					// Show header
					'header'   => [
						'type'     => 'checkbox',
						'label'    => __( 'Show section header', 'neville-extensions' ),
						'instance' => isset( $instance[ 'header' ] ) ? (bool) $instance[ 'header' ] : false,
					],

				// Title - header
				'general' => [
					'type'      => 'title',
					'label'     => __( 'General options', 'neville-extensions' ),
					'instance'  => 'general',
				],

					// Display on side
					'qty'   => [
						'type'     => 'select',
						'label'    => __( 'How many photos', 'neville-extensions' ),
						'instance' => $instance[ 'qty' ],
						'options'  => [
							[
								'value' 	=> '6',
								'title' 	=> esc_html_x( '6 photos', 'Instagram section', 'neville-extensions' ),
								'disabled'	=> false
							],
							[
								'value' 	=> '12',
								'title' 	=> esc_html_x( '12 photos', 'Instagram section', 'neville-extensions' ),
								'disabled'	=> false
							]
						]
					],

				// Overlay title
				'overlay_title' => [
					'type'      => 'title',
					'label'     => __( 'Big overlay title', 'neville-extensions' ),
					'instance'  => 'overlay_title',
				],

					// Overlay title link text
					'ot_text'   => [
						'type'     => 'text_field',
						'label'    => __( 'Link text', 'neville-extensions' ),
						'instance' => empty( $instance['ot_text'] ) ? $instance_defaults[ 'ot_text' ] : $instance[ 'ot_text' ],
					],

					// Overlay title link URL
					'ot_link'   => [
						'type'     => 'text_field',
						'label'    => __( 'Link - URL', 'neville-extensions' ),
						'instance' => empty( $instance['ot_link'] ) ? $instance_defaults[ 'ot_link' ] : $instance[ 'ot_link' ],
					],

				// Photos
				'photos' => [
					'type'      => 'title',
					'label'     => __( 'Photos', 'neville-extensions' ),
					'instance'  => 'photos',
				],

					'links'   => [
						'type'     => 'checkbox',
						'label'    => __( 'Display overlay links', 'neville-extensions' ),
						'instance' => isset( $instance[ 'links' ] ) ? (bool) $instance[ 'links' ] : false,
					],

					// Display on side
					'target'   => [
						'type'     => 'select',
						'label'    => __( 'Open photos in:', 'neville-extensions' ),
						'instance' => $instance[ 'target' ],
						'options'  => [
							[
								'value' 	=> '_blank',
								'title' 	=> esc_html_x( 'New window', 'Instagram section', 'neville-extensions' ),
								'disabled'	=> false
							],
							[
								'value' 	=> '_self',
								'title' 	=> esc_html_x( 'Same window', 'Instagram section', 'neville-extensions' ),
								'disabled'	=> false
							]
						]
					],

					// Overlay title link URL
					'relattr'   => [
						'type'     => 'text_field',
						'label'    => __( 'Rel attribute', 'neville-extensions' ),
						'instance' => empty( $instance['relattr'] ) ? $instance_defaults[ 'relattr' ] : $instance[ 'relattr' ],
					],

			]; // $fields

			// Add a filter
			$fields = apply_filters( 'nevillex_section_instagram___fields', $fields, $instance, $instance_defaults );

			// Output fields
			parent::_fields( $fields );

		} // form()

	} /* Nevillex_Section_Instagram class END */

	/**
	 * Register the section
	 */
	register_widget( 'Nevillex_Section_Instagram' );

} /* Nevillex_Section_Instagram class_exists END */
