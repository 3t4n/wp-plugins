<?php
if( ! class_exists( 'Nevillex_Widget_Instagram' ) ) {
	/**
	 * Instagram section
	 *
	 * Will display your Instagram photos feed.
	 *
	 * @since 1.0.0
	 */
	class Nevillex_Widget_Instagram extends Nevillex_Widgets_Base {

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
			$this->widget_title = __( 'NEVILLE Instagram' , 'neville-extensions' );
			$this->widget_id    = 'instagram';

			// Settings
			$widget_ops = [
				'classname'   => 'wid-instagram',
				'description' => esc_html__( 'Will display your Instagram photos feed.', 'neville-extensions' ),
				'customize_selective_refresh' => true
			];

			// Control settings
			$idBase = 'neville-wid-' . $this->widget_id;

			$control_ops = [
				'width'   => NULL,
				'height'  => NULL,
				'id_base' => $idBase
			];

			// Create the widget
			parent::__construct( $idBase, $this->widget_title, $widget_ops, $control_ops );

			// Set some widget defaults
			$this->defaults = apply_filters( 'nevillex_wid_instagram___defaults', [
				'title'    => esc_html__( 'Instagram Feed', 'neville-extensions' ),
				'btn_text' => '',
				'btn_link' => '',
				'links'    => true,
				'target'   => '_blank',
				'relattr'  => '',
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
				'widget'   => $this,
				// Header
				'title'    => empty( $instance[ 'title' ] ) ? $instance_defaults[ 'title' ] : $instance[ 'title' ],
				// Overlay title
				'btn_text' => empty( $instance[ 'btn_text' ] ) ? $instance_defaults[ 'btn_text' ] : $instance[ 'btn_text' ],
				'btn_link' => empty( $instance[ 'btn_link' ] ) ? $instance_defaults[ 'btn_link' ] : $instance[ 'btn_link' ],
				// Links
				'links'    => isset( $instance[ 'links' ] ) ? $instance[ 'links' ] : false,
				'target'   => isset( $instance[ 'target' ] ) ? $instance[ 'target' ] : $instance_defaults[ 'target' ],
				'relattr'  => empty( $instance[ 'relattr' ] ) ? $instance_defaults[ 'relattr' ] : $instance[ 'relattr' ],
			];

			// Filter before we add them
			$widget_options = apply_filters( 'nevillex_wid_instagram___options', $widget_options, $this, $instance, $instance_defaults );

			// Widget template output
			echo $args['before_widget'];

				/**
				 * Hooked:
				 * nevillex_widget_instagram_title  - 10
				 * nevillex_widget_instagram_start  - 20
				 * nevillex_widget_instagram_wrap   - 30
				 * nevillex_widget_instagram_end    - 999
				 *
				 * @see ../widgets/instagram/instagram-tmpl.php
				 */
				do_action( 'nevillex__widget_instagram', $widget_options );

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
			$instance[ 'title' ]    = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'btn_text' ] = sanitize_text_field( $new_instance[ 'btn_text' ] );
			$instance[ 'btn_link' ] = esc_url_raw( $new_instance[ 'btn_link' ] );
			$instance[ 'relattr' ]  = sanitize_text_field( $new_instance[ 'relattr' ] );

			// Select
			$instance[ 'target' ]   = nevillex_sanitize_select(
				$new_instance[ 'target' ],
				[ '_blank', '_self' ],
				$this->defaults[ 'target' ],
				false
			);

			// Checkboxes
			$instance[ 'links' ]  = isset( $new_instance[ 'links' ] ) ? (bool) $new_instance[ 'links' ] : false;

			// Filter before we update
			$instance = apply_filters( 'nevillex_wid_instagram___update', $instance, $new_instance );

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

				// Title
				'title'   => [
					'type'     => 'text_field',
					'label'    => __( 'Title:', 'neville-extensions' ),
					'instance' => empty( $instance['title'] ) ? $instance_defaults[ 'title' ] : $instance[ 'title' ],
				],

				// Overlay title
				'button_title' => [
					'type'      => 'title',
					'label'     => __( 'Button title', 'neville-extensions' ),
					'instance'  => 'button_title',
				],

					// Overlay title link text
					'btn_text'   => [
						'type'     => 'text_field',
						'label'    => __( 'Anchor text', 'neville-extensions' ),
						'instance' => empty( $instance['btn_text'] ) ? $instance_defaults[ 'btn_text' ] : $instance[ 'btn_text' ],
					],

					// Overlay title link URL
					'btn_link'   => [
						'type'     => 'text_field',
						'label'    => __( 'Button URL', 'neville-extensions' ),
						'instance' => empty( $instance['btn_link'] ) ? $instance_defaults[ 'btn_link' ] : $instance[ 'btn_link' ],
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
			$fields = apply_filters( 'nevillex_wid_instagram___fields', $fields, $instance, $instance_defaults );

			// Output fields
			parent::_fields( $fields );

		} // form()

	} /* Nevillex_Widget_Instagram class END */

	/**
	 * Register the section
	 */
	register_widget( 'Nevillex_Widget_Instagram' );

} /* Nevillex_Widget_Instagram class_exists END */
