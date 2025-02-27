<?php
/**
 * Prevents direct access to the file
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class FLOATING_LINKS_CUSTOMIZER
 *
 * This class handles the frontend functionalities of the Floating Links plugin in the customizer.
 */

if ( ! class_exists( 'Floating_Links_Customizer' ) ) {
	class Floating_Links_Customizer {

		/**
		 * Floating_Links_Customizer constructor.
		 *
		 * Adds necessary hooks for customizer functionalities of the Floating Links plugin
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			// Enqueues the necessary scripts and styles for the customizer
			add_action( 'customize_register', array( $this, 'customizer_panel_settings' ) );
			// Adds the customizer CSS to the head section
			add_action( 'wp_head', array( $this, 'customizer_css' ) );
			// Adds the customizer JS and CSS to the footer section
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'customizer_scripts' ) );
			// Display the floating links in the preview
			add_action( 'customize_preview_init', array( $this, 'live_preview' ) );
		}

		/**
		 * Add the customizer panel and sections for the Floating Links plugin
		 *
		 * @param $wp_customize
		 * @since 6.3.2
		 */
		public function customizer_panel_settings( $wp_customize ) {
			// Set the option name
			$setting = 'fl_settings';
			// Add the customizer panel
			$wp_customize->add_panel(
				'fl_customizer_panel',
				array(
					'capability'     => null,
					'priority'       => 160,
					'theme_supports' => null,
					'title'          => __( 'Floating Links Settings', 'floating-links' ),
				)
			);
			// Add the customizer section for the icons
			$wp_customize->add_section(
				'fl_icons_section',
				array(
					'title'       => __( 'Change icons ', 'floating-links' ),
					'description' => __( 'Chose any icon from the list below and see the magic live.', 'floating-links' ),
					'priority'    => 160,
					'panel'       => 'fl_customizer_panel',
				)
			);
			// Add the customizer section for the design
			$wp_customize->add_section(
				'fl_design_section',
				array(
					'title'       => __( 'Design', 'floating-links' ),
					'description' => __( 'Customize design of your fancy floating links live.', 'floating-links' ),
					'priority'    => 160,
					'panel'       => 'fl_customizer_panel',
				)
			);
			// Add the customizer section for the position
			$wp_customize->add_section(
				'fl_position_section',
				array(
					'title'       => __( 'Change position', 'floating-links' ),
					'description' => __( 'Show Floating Links on left, right, top and bottom side.', 'floating-links' ),
					'priority'    => 160,
					'panel'       => 'fl_customizer_panel',
				)
			);

			/**
			 * Adding settings and controls for the Floating Links plugin
			 */

			$wp_customize->add_setting(
				'fl_settings[fl_position]',
				array(
					'default'   => 'right',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				'fl_settings[fl_position]',
				array(
					'type'    => 'radio',
					'section' => 'fl_position_section', // Add a default or your own section
					'label'   => __( 'Position', 'floating-links' ),
					'choices' => array(
						'left'         => __( 'Left Center', 'floating-links' ),
						'left_top'     => __( 'Left Top', 'floating-links' ),
						'left_bottom'  => __( 'Left Bottom', 'floating-links' ),
						'right'        => __( 'Right Center', 'floating-links' ),
						'right_top'    => __( 'Right Top', 'floating-links' ),
						'right_bottom' => __( 'Right Bottom', 'floating-links' ),
						'top'          => __( 'Top Center', 'floating-links' ),
						'top_left'     => __( 'Top Left', 'floating-links' ),
						'top_right'    => __( 'Top Right', 'floating-links' ),
						'bottom'       => __( 'Bottom Center', 'floating-links' ),
						'bottom_left'  => __( 'Bottom Left', 'floating-links' ),
						'bottom_right' => __( 'Bottom Right', 'floating-links' ),
					),
				)
			);
			$wp_customize->add_setting(
				'fl_settings[fl_bg_color]',
				array(
					'default'   => '#fff',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'fl_settings[fl_bg_color]',
					$this->cutomizer_values( __( 'Background color', 'floating-links' ), 'fl_design_section', 'fl_settings[fl_bg_color]', null )
				)
			);
			$wp_customize->add_setting(
				'fl_settings[fl_color]',
				array(
					'default'   => '#000',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'fl_settings[fl_color]',
					$this->cutomizer_values( __( 'Icons color', 'floating-links' ), 'fl_design_section', 'fl_settings[fl_color]', null )
				)
			);
			$wp_customize->add_setting(
				'fl_settings[fl_icon_hover_color]',
				array(
					'default'   => '#fff',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'fl_settings[fl_icon_hover_color]',
					$this->cutomizer_values( __( 'Icons hover color', 'floating-links' ), 'fl_design_section', 'fl_settings[fl_icon_hover_color]', null )
				)
			);

			$wp_customize->add_setting(
				'fl_settings[fl_hover_bg_color]',
				array(
					'default'   => '#000',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'fl_settings[fl_hover_bg_color]',
					$this->cutomizer_values( __( 'Icons hover background color.', 'floating-links' ), 'fl_design_section', 'fl_settings[fl_hover_bg_color]', null )
				)
			);

			$wp_customize->add_setting(
				'fl_settings[fl_icon_size]',
				array(
					'default'   => '18',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Range_Control(
					$wp_customize,
					'fl_settings[fl_icon_size]',
					array(
						'label'       => __( 'Icons size.', 'floating-links' ),
						'section'     => 'fl_design_section',
						'settings'    => 'fl_settings[fl_icon_size]',
						'input_attrs' => array(
							'max' => 100,
						),
					)
				)
			);

			$wp_customize->add_setting(
				'fl_settings[fl_seprator_color]',
				array(
					'default'   => '#000',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'fl_settings[fl_seprator_color]',
					$this->cutomizer_values( __( 'Icons separator color.', 'floating-links' ), 'fl_design_section', 'fl_settings[fl_seprator_color]', null )
				)
			);

			$wp_customize->add_setting(
				'fl_settings[fl_shadow]',
				array(
					'default'   => '1',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				'fl_settings[fl_shadow]',
				$this->cutomizer_values( __( 'Enable shadow', 'floating-links' ), 'fl_design_section', 'fl_settings[fl_shadow]', 'checkbox' )
			);

			$wp_customize->add_setting(
				'fl_settings[fl_hover_post_bg_color]',
				array(
					'default'   => '#fff',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'fl_settings[fl_hover_post_bg_color]',
					$this->cutomizer_values( __( 'Hover post data background color.', 'floating-links' ), 'fl_design_section', 'fl_settings[fl_hover_post_bg_color]', null )
				)
			);

			$wp_customize->add_setting(
				'fl_settings[fl_hover_post_headings_color]',
				array(
					'default'   => '#000',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'fl_settings[fl_hover_post_headings_color]',
					$this->cutomizer_values( __( 'Hover post data headings color.', 'floating-links' ), 'fl_design_section', 'fl_settings[fl_hover_post_headings_color]', null )
				)
			);

			$wp_customize->add_setting(
				'fl_settings[fl_hover_post_color]',
				array(
					'default'   => '#000',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'fl_settings[fl_hover_post_color]',
					$this->cutomizer_values( __( 'Hover post data text color.', 'floating-links' ), 'fl_design_section', 'fl_settings[fl_hover_post_color]', null )
				)
			);

			$wp_customize->add_setting(
				'fl_settings[fl_hover_post_seprator_color]',
				array(
					'default'   => '#000',
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'fl_settings[fl_hover_post_seprator_color]',
					$this->cutomizer_values( __( 'Hover post data seprator color.', 'floating-links' ), 'fl_design_section', 'fl_settings[fl_hover_post_seprator_color]', null )
				)
			);

			// list of left icons
			$iconsleft = apply_filters(
				'fl_left_icons',
				array(
					'dashicons dashicons-arrow-left-alt',
					'dashicons dashicons-arrow-left-alt2',
					'angle-left',
					'arrow-circle-left',
					'arrow-circle-o-left',
					'arrow-left',
					'caret-left',
					'caret-square-o-left',
					'chevron-circle-left',
					'chevron-left',
					'hand-o-left',
					'long-arrow-left',
				)
			);

			$wp_customize->add_setting(
				'fl_settings[fl_left_icon]',
				array(
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new Fl_Icons_Control(
					$wp_customize,
					'fl_settings[fl_left_icon]',
					array(
						'section' => 'fl_icons_section',
						'label'   => __( 'Select left icon.', 'floating-links' ),
						'type'    => 'radio',
						'choices' => $iconsleft,
					)
				)
			);

			// list of right icons
			$iconsright = apply_filters(
				'fl_right_icons',
				array(
					'dashicons dashicons-arrow-right-alt',
					'dashicons dashicons-arrow-right-alt2',
					'angle-right',
					'arrow-circle-right',
					'arrow-circle-o-right',
					'arrow-right',
					'caret-right',
					'caret-square-o-right',
					'chevron-circle-right',
					'chevron-right',
					'hand-o-right',
					'long-arrow-right',
				)
			);
			$wp_customize->add_setting(
				'fl_settings[fl_right_icon]',
				array(
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new Fl_Icons_Control(
					$wp_customize,
					'fl_settings[fl_right_icon]',
					array(
						'section'  => 'fl_icons_section',
						'priority' => 180,
						'label'    => __( 'Select right icon.', 'floating-links' ),
						'type'     => 'radio',
						'choices'  => $iconsright,
					)
				)
			);

			// list of random icons
			$iconsrandom = apply_filters( 'fl_random_icons', array( 'dashicons dashicons-randomize', 'random' ) );
			$wp_customize->add_setting(
				'fl_settings[fl_random_icon]',
				array(
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new Fl_Icons_Control(
					$wp_customize,
					'fl_settings[fl_random_icon]',
					array(
						'section'  => 'fl_icons_section',
						'priority' => 180,
						'label'    => __( 'Select Random icon.', 'floating-links' ),
						'type'     => 'radio',
						'choices'  => $iconsrandom,
					)
				)
			);

			// list of up icons
			$iconsup = apply_filters(
				'fl_up_icons',
				array(
					'dashicons dashicons-arrow-up-alt',
					'dashicons dashicons-arrow-up-alt2',
					'angle-up',
					'arrow-circle-up',
					'arrow-circle-o-up',
					'arrow-up',
					'caret-up',
					'caret-square-o-up',
					'chevron-circle-up',
					'chevron-up',
					'hand-o-up',
					'long-arrow-up',
				)
			);
			$wp_customize->add_setting(
				'fl_settings[fl_up_icon]',
				array(
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new Fl_Icons_Control(
					$wp_customize,
					'fl_settings[fl_up_icon]',
					array(
						'section'  => 'fl_icons_section',
						'priority' => 180,
						'label'    => __( 'Select up icon.', 'floating-links' ),
						'type'     => 'radio',
						'choices'  => $iconsup,
					)
				)
			);

			// list of down icons
			$iconsdown = apply_filters(
				'fl_down_icons',
				array(
					'dashicons dashicons-arrow-down-alt',
					'dashicons dashicons-arrow-down-alt2',
					'angle-down',
					'arrow-circle-down',
					'arrow-circle-o-down',
					'arrow-down',
					'caret-down',
					'caret-square-o-down',
					'chevron-circle-down',
					'chevron-down',
					'hand-o-down',
					'long-arrow-down',
				)
			);
			$wp_customize->add_setting(
				'fl_settings[fl_down_icon]',
				array(
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new Fl_Icons_Control(
					$wp_customize,
					'fl_settings[fl_down_icon]',
					array(
						'section'  => 'fl_icons_section',
						'priority' => 180,
						'label'    => __( 'Select down icon.', 'floating-links' ),
						'type'     => 'radio',
						'choices'  => $iconsdown,
					)
				)
			);

			// list of home icons
			$iconshome = apply_filters(
				'fl_home_icons',
				array(
					'dashicons dashicons-admin-home',
					'dashicons dashicons-store',
					'home',
					'h-square',
					'bank',
				)
			);
			$wp_customize->add_setting(
				'fl_settings[fl_home_icon]',
				array(
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new Fl_Icons_Control(
					$wp_customize,
					'fl_settings[fl_home_icon]',
					array(
						'section'  => 'fl_icons_section',
						'priority' => 180,
						'label'    => __( 'Select home icon.', 'floating-links' ),
						'type'     => 'radio',
						'choices'  => $iconshome,
					)
				)
			);

			// list of copy URL icons
			$icons_copy_url = apply_filters(
				'fl_copy_url_icons',
				array(
					'dashicons dashicons-admin-page',
					'files-o',
					'clone',
					'clipboard',
				)
			);
			$wp_customize->add_setting(
				'fl_settings[fl_copy_url_icon]',
				array(
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new Fl_Icons_Control(
					$wp_customize,
					'fl_settings[fl_copy_url_icon]',
					array(
						'section'  => 'fl_icons_section',
						'priority' => 180,
						'label'    => __( 'Select copy URL icon.', 'floating-links' ),
						'type'     => 'radio',
						'choices'  => $icons_copy_url,
					)
				)
			);

			// list of close icons
			$iconsslimmer = apply_filters(
				'fl_slimer_close_icons',
				array(
					'dashicons dashicons-no',
					'dashicons dashicons-no-alt',
					'dashicons dashicons-minus',
					'dashicons dashicons-dismiss',
					'close',
					'minus',
					'minus-circle',
					'minus-square',
					'minus-square-o',
					'search-minus',
				)
			);
			$wp_customize->add_setting(
				'fl_settings[fl_slimer_close_icon]',
				array(
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new Fl_Icons_Control(
					$wp_customize,
					'fl_settings[fl_slimer_close_icon]',
					array(
						'section'  => 'fl_icons_section',
						'priority' => 180,
						'label'    => __( 'Select close icon.', 'floating-links' ),
						'type'     => 'radio',
						'choices'  => $iconsslimmer,
					)
				)
			);

			// list of open icons
			$icons_slimmer_closed = apply_filters(
				'fl_slimer_open_icons',
				array(
					'dashicons dashicons-yes',
					'dashicons dashicons-plus',
					'plus',
					'plus-circle',
					'plus-square',
					'plus-square-o',
					'search-plus',
					'crosshairs',
					'arrows',
					'arrows-alt',
					'check-square',
					'check-square-o',
					'plus-square',
				)
			);
			$wp_customize->add_setting(
				'fl_settings[fl_slimer_open_icon]',
				array(
					'transport' => 'postMessage',
					'type'      => 'option',
				)
			);
			$wp_customize->add_control(
				new Fl_Icons_Control(
					$wp_customize,
					'fl_settings[fl_slimer_open_icon]',
					array(
						'section'  => 'fl_icons_section',
						'priority' => 180,
						'label'    => __( 'Select open icon.', 'floating-links' ),
						'type'     => 'radio',
						'choices'  => $icons_slimmer_closed,
					)
				)
			);
		}

		/**
		 * Get the customizer values
		 *
		 * @param $label
		 * @param $section
		 * @param $settings
		 * @param $type
		 *
		 * @return array
		 */
		public function cutomizer_values( $label, $section, $settings, $type ) {
			return array(
				'label'    => __( $label, 'floating-links' ),
				'section'  => $section,
				'settings' => $settings,
				'type'     => $type,
			);
		}

		/**
		 * Enqueue scripts for customizer live preview.
		 */
		public function live_preview() {
			wp_enqueue_script( 'floating-links-customizer-live', FLOATING_LINKS_URL . 'admin/assets/js/floating-links-customizer-live.js', array( 'jquery', 'customize-preview' ), true );
		}

		/**
		 * Enqueue scripts and styles for customizer.
		 */
		public function customizer_scripts() {
			wp_enqueue_style( 'floating-links-fonts', FLOATING_LINKS_URL . 'admin/assets/css/floating-links-fonts.css' );
			wp_enqueue_style( 'dashicons' );
			wp_enqueue_style( 'floating-links-customizer', FLOATING_LINKS_URL . 'admin/assets/css/floating-links-customizer.css' );
			wp_enqueue_script( 'floating-links-customizer', FLOATING_LINKS_URL . 'admin/assets/js/floating-links-customizer.js', array( 'jquery' ), true );
		}

		/**
		 * Add customizer css
		 */
		function customizer_css() {
			$settings       = get_option( 'fl_settings', false );
			?>
			<style>
				.floating_next_prev_wrap.fl_primary_bar .floating_links a,
				.floating_next_prev_wrap.fl_primary_bar .floating_links .disabled
				{
					<?php if ( isset( $settings['fl_bg_color'] ) && ! empty( $settings['fl_bg_color'] ) ) { ?>
						background-color: <?php echo $settings['fl_bg_color']; ?>;
					<?php } ?>
					<?php if ( isset( $settings['fl_color'] ) && ! empty( $settings['fl_color'] ) ) { ?>
						color: <?php echo $settings['fl_color']; ?>;
					<?php } ?>
					<?php if ( isset( $settings['fl_seprator_color'] ) && ! empty( $settings['fl_seprator_color'] ) ) { ?>
						border-color: <?php echo $settings['fl_seprator_color']; ?> !important;
					<?php } ?>
					<?php if ( isset( $settings['fl_icon_size'] ) && ! empty( $settings['fl_icon_size'] ) ) { ?>
						font-size: <?php echo $settings['fl_icon_size']; ?>px;
					<?php } ?>
				}
                .floating_next_prev_wrap.fl_primary_bar.fl_primary_bar .floating_links .fl_slimer_Wrap
                {
                <?php if ( isset( $settings['fl_bg_color'] ) && ! empty( $settings['fl_bg_color'] ) ) { ?>
                    background-color: <?php echo $settings['fl_bg_color']; ?>;
                <?php } ?>
                <?php if ( isset( $settings['fl_color'] ) && ! empty( $settings['fl_color'] ) ) { ?>
                    color: <?php echo $settings['fl_color']; ?>;
                <?php } ?>
                <?php if ( isset( $settings['fl_seprator_color'] ) && ! empty( $settings['fl_seprator_color'] ) ) { ?>
                    border-color: <?php echo $settings['fl_seprator_color']; ?> !important;
                <?php } ?>
                }

                .floating_next_prev_wrap.fl_primary_bar.fl_primary_bar .floating_links .fl_slimer_Wrap i
                {
                <?php if ( isset( $settings['fl_icon_size'] ) && ! empty( $settings['fl_icon_size'] ) ) { ?>
                    font-size: <?php echo $settings['fl_icon_size']; ?>px;
                <?php } ?>
                }

				.floating_next_prev_wrap.fl_primary_bar .floating_links .disabled {
					color: #ebebe4 !important;
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links a:hover,
				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_slimer_Wrap:hover {
				<?php if ( isset( $settings['fl_hover_bg_color'] ) && ! empty( $settings['fl_hover_bg_color'] ) ) { ?>
					background-color: <?php echo $settings['fl_hover_bg_color']; ?>;
				<?php } ?>
				<?php if ( isset( $settings['fl_icon_hover_color'] ) && ! empty( $settings['fl_icon_hover_color'] ) ) { ?>
					color: <?php echo $settings['fl_icon_hover_color']; ?>;
				<?php } ?>
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details {
				<?php if ( isset( $settings['fl_hover_post_bg_color'] ) && ! empty( $settings['fl_hover_post_bg_color'] ) ) { ?>
					background-color: <?php echo $settings['fl_icon_hover_color']; ?>;
				<?php } ?>
				<?php if ( isset( $settings['fl_hover_post_seprator_color'] ) && ! empty( $settings['fl_hover_post_seprator_color'] ) ) { ?>
					border-color: <?php echo $settings['fl_hover_post_seprator_color']; ?>;
				<?php } ?>
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_title{
				<?php if ( isset( $settings['fl_hover_post_headings_color'] ) && ! empty( $settings['fl_hover_post_headings_color'] ) ) { ?>
					color: <?php echo $settings['fl_hover_post_headings_color']; ?>;
				<?php } ?>
				<?php if ( isset( $settings['fl_hover_post_seprator_color'] ) && ! empty( $settings['fl_hover_post_seprator_color'] ) ) { ?>
					border-color: <?php echo $settings['fl_hover_post_headings_color']; ?>;
				<?php } ?>
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_title,
				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_description h6 {
				<?php if ( isset( $settings['fl_hover_post_headings_color'] ) && ! empty( $settings['fl_hover_post_headings_color'] ) ) { ?>
					color: <?php echo $settings['fl_hover_post_headings_color']; ?>;
				<?php } ?>
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_description p {
				<?php if ( isset( $settings['fl_hover_post_color'] ) && ! empty( $settings['fl_hover_post_color'] ) ) { ?>
					color: <?php echo $settings['fl_hover_post_color']; ?>;
				<?php } ?>
				}

				<?php
				if ( isset( $settings['fl_shadow'] ) && ! $settings['fl_shadow'] ) {
					?>
				.floating_next_prev_wrap.fl_primary_bar .floating_links {
					box-shadow:none;
				}
					<?php
				}
				if ( isset( $settings['fl_post_data'] ) && 'true' == $settings['fl_post_data'] ) {
					?>
				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details {
					display: block;
				}
					<?php
				} else {

					?>
				 .floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details {
					  display: none;
				 }
					<?php
				}

				if ( isset( $settings['fl_position'] ) && ! empty( $settings['fl_position'] ) ) {
					$position = $settings['fl_position'];
				} else {
					$position = 'right';
				}

				switch ( $position ) {
					case 'left':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links {
					left : 0;
					transform : translate(0px, -50%);
					bottom : auto;
					right : auto;
					top : 50%;
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details {
					left: 105%;
				}

						<?php
						break;
					case 'left_top':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links {
					left : 0;
					transform : translate(0, 0);
					bottom : auto;
					right : auto;
					top : 0;
				}


				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details {
					left: 105%;
				}

						<?php
						break;

					case 'left_bottom':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links {
					left : 0;
					transform : translate(0px, 0px);
					top: auto;
					right: auto;
					bottom: 0;
				}


				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details {
					left: 105%;
				}

						<?php
						break;
					case 'right':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links {
					left : auto;
					transform : translate(0px, -50%);
					bottom : auto;
					right : 0;
					top : 50%;
				}


						<?php
						break;

					case 'right_top':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links {
					left : auto;
					transform : translate(0px, 0px);
					bottom : auto;
					right : 0;
					top : 0;
				}

						<?php
						break;
					case 'right_bottom':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links {
					left : auto;
					transform : translate(0px, 0px);
					right : 0;
					top : auto;
					bottom : 0;
				}


						<?php
						break;

					case 'bottom':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links {
					left : 50%;
					display: inline-table;
					transform : translate(-50%, 0);
					bottom : 0;
					right : 0;
					top : auto;
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links a:last-child {
						<?php if ( isset( $settings['fl_seprator_color'] ) && ! empty( $settings['fl_seprator_color'] ) ) { ?>
						border-bottom : 1px solid <?php echo $settings['fl_seprator_color']; ?>;
					<?php } ?>
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details{
					top: -55px;
				}

						<?php
						break;

					case 'bottom_left':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links {
					left : 0;
					display: inline-table;
					transform : translate(0, 0);
					bottom : 0;
					right : auto;
					top : auto;
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links a:last-child{
						<?php if ( isset( $settings['fl_seprator_color'] ) && ! empty( $settings['fl_seprator_color'] ) ) { ?>
						border-bottom : 1px solid <?php echo $settings['fl_seprator_color']; ?>;
					<?php } ?>
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details{
					top: -55px;
					left: 0;
				}

						<?php
						break;

					case 'bottom_right':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links {
					left : auto;
					display: inline-table;
					transform : translate(0, 0);
					bottom : 0;
					right : 0;
					top : auto;
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links a:last-child{
						<?php if ( isset( $settings['fl_seprator_color'] ) && ! empty( $settings['fl_seprator_color'] ) ) { ?>
						border-bottom : 1px solid <?php echo $settings['fl_seprator_color']; ?>;
					<?php } ?>
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details{
					top: -55px;
				}

						<?php
						break;

					/*
					 * If floating links position is top.
					*/
					case 'top':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links{
					left : 50%;
					display: inline-table;
					transform : translate(-50%, 0);
					bottom : auto;
					right : 0;
					top : 0;
				}


				.floating_next_prev_wrap.fl_primary_bar .floating_links a:last-child {
						<?php if ( isset( $settings['fl_seprator_color'] ) && ! empty( $settings['fl_seprator_color'] ) ) { ?>
						border-bottom : 1px solid <?php echo $settings['fl_seprator_color']; ?>;
					<?php } ?>
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_slimer_Wrap {
					float: left;
					margin: 0 auto;
				}
				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details{
					top: 0;
				}

						<?php
						break;

					case 'top_right':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links{
					left : auto;
					display: inline-table;
					transform : translate(0, 0);
					bottom : auto;
					right : 0;
					top : 0;
				}


				.floating_next_prev_wrap.fl_primary_bar .floating_links a:last-child {
						<?php if ( isset( $settings['fl_seprator_color'] ) && ! empty( $settings['fl_seprator_color'] ) ) { ?>
					border-bottom : 1px solid <?php echo $settings['fl_seprator_color']; ?>;
				<?php } ?>
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_slimer_Wrap {
					float: left;
					margin: 0 auto;
				}
				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details{
					top: 0;
				}

						<?php
						break;
					case 'top_left':
						?>

				.floating_next_prev_wrap.fl_primary_bar .floating_links{
					left : 0;
					display: inline-table;
					transform : translate(0, 0);
					bottom : auto;
					right : auto;
					top : 0;
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links a:last-child {
						<?php if ( isset( $settings['fl_seprator_color'] ) && ! empty( $settings['fl_seprator_color'] ) ) { ?>
					border-bottom : 1px solid <?php echo $settings['fl_seprator_color']; ?>;
				<?php } ?>
				}

				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_slimer_Wrap {
					float: left;
					margin: 0 auto;
				}
				.floating_next_prev_wrap.fl_primary_bar .floating_links .fl_inner_wrap .fl_icon_holder .fl_post_details{
					top: 0;
					left: 105%;
				}

						<?php
						break;
					default:
						break;

				}

				if ( ! is_customize_preview() ) {
					/*
					* If floating links position is top and admin bar is showing take some margin.
					*/
					if ( is_admin_bar_showing()
					&& $position == 'top'
					|| $position == 'left_top'
					|| $position == 'top_right'
					|| $position == 'top_left'
					) {
						?>
				.floating_next_prev_wrap.fl_primary_bar .floating_links {
					top : 32px;
				}
						<?php
					}
				}

				if ( ! isset( $settings['fl_minimizer'] ) && 'true' !== $settings['fl_minimizer'] ) {
					?>
				.floating_next_prev_wrap.fl_primary_bar .floating_links a:last-child {
					border: none;
				}
				<?php } ?>

			</style>
			<?php
		}

	}
	new Floating_Links_Customizer();
}
