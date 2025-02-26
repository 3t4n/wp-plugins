<?php
namespace ElementorFancyNav\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Defines the FancyNav Widget
 */
class FancyNav_Widget extends Widget_Base {

	/** Widget name */
	public function get_name() {
		return 'elementor-fancynav';
	}

    /** Widget title */
	public function get_title() {
		return __( 'FancyNav - Mobile Navigation', 'elem-fancynav' );
	}

    /** Widget icon */
	public function get_icon() {
		return 'fas fa-bars';
	}

    /** Widget category */
	public function get_categories() {
		return [ 'basic' ];
	}

    /** CSS dependency */
    public function get_style_depends() {
        return [ 'fancynav' ];
    }

    /** Javascript dependency */
	public function get_script_depends() {
		return [ 'fancynav-init' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function _register_controls() {

	    // Start the first controls section
        $this->start_controls_section(
            'fnav_section_button',
            [
                'label' => __( 'Hamburger Icon Settings', 'elem-fancynav' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Hamburger button animation effect
        $this->add_control(
            'fnav_button_effect',
            [
                'label' => esc_html__( 'Button Effect', 'elem-fancynav' ),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'hamburger--3dxy'        => esc_html__( 'Turn', 'elem-fancynav' ),
                    'hamburger--3dxy-r'      => esc_html__( 'Turn reverse', 'elem-fancynav' ),
                    'hamburger--arrow'       => esc_html__( 'Arrow left', 'elem-fancynav' ),
                    'hamburger--arrow-r'     => esc_html__( 'Arrow right', 'elem-fancynav' ),
                    'hamburger--arrowturn'   => esc_html__( 'Arrow turn left', 'elem-fancynav' ),
                    'hamburger--arrowturn-r' => esc_html__( 'Arrow turn right', 'elem-fancynav' ),
                    'hamburger--collapse'    => esc_html__( 'Collapse', 'elem-fancynav' ),
                    'hamburger--collapse-r'  => esc_html__( 'Collapse reverse', 'elem-fancynav' ),
                    'hamburger--elastic'     => esc_html__( 'Elastic', 'elem-fancynav' ),
                    'hamburger--elastic-r'   => esc_html__( 'Elastic reverse', 'elem-fancynav' ),
                    'hamburger--emphatic'    => esc_html__( 'Emphatic', 'elem-fancynav' ),
                    'hamburger--emphatic-r'  => esc_html__( 'Emphatic reverse', 'elem-fancynav' ),
                    'hamburger--minus'       => esc_html__( 'Minus', 'elem-fancynav' ),
                    'hamburger--slider'      => esc_html__( 'Slider', 'elem-fancynav' ),
                    'hamburger--slider-r'    => esc_html__( 'Slider reverse', 'elem-fancynav' ),
                    'hamburger--spin'        => esc_html__( 'Spin', 'elem-fancynav' ),
                    'hamburger--spin-r'      => esc_html__( 'Spin reverse', 'elem-fancynav' ),
                    'hamburger--spring'      => esc_html__( 'Spring', 'elem-fancynav' ),
                    'hamburger--spring-r'    => esc_html__( 'Spring reverse', 'elem-fancynav' ),
                    'hamburger--stand'       => esc_html__( 'Stand', 'elem-fancynav' ),
                    'hamburger--stand-r'     => esc_html__( 'Stand reverse', 'elem-fancynav' ),
                    'hamburger--squeeze'     => esc_html__( 'Squeeze', 'elem-fancynav' ),
                    'hamburger--vortex'      => esc_html__( 'Vortex', 'elem-fancynav' ),
                    'hamburger--vortex-r'    => esc_html__( 'Vortex reverse', 'elem-fancynav' )
                ],
                'default' => 'hamburger--3dxy'
            ]
        );

        // Hamburger button color
        $this->add_control(
            'fnav_button_color',
            [
                'label'   => esc_html__( 'Button Color', 'elem-fancynav' ),
                'type'    => \Elementor\Controls_Manager::COLOR,
                'default' => '#000'
            ]
        );

        // End the first controls section
        $this->end_controls_section();

        // Start the second controls section
        $this->start_controls_section(
            'fnav_section_menu',
            [
                'label' => __( 'Menu Settings', 'elem-fancynav' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Additional info for menu settings
        $this->add_control(
            'fnav_info',
            [
                'type'      => \Elementor\Controls_Manager::RAW_HTML,
                'raw'       => __( '<strong>Settings in this section are visible when changes are saved and the Elementor panel is closed.</strong>', 'elem-fancynav' ),
                'separator' => 'after'
            ]
        );

        // Opening CSS selector
        $this->add_control(
            'fnav_menu_open',
            [
                'label'        => esc_html__( 'CSS selector of menu to open with FancyNav', 'elem-fancynav' ),
                'description'  => esc_html__( 'Defaults to the Elementor header template', 'elem-fancynav' ),
                'type'         => \Elementor\Controls_Manager::TEXTAREA,
                'rows'         => 3,
                'default'      => '.elementor-location-header .elementor-nav-menu--main .elementor-nav-menu'
            ]
        );

        // Menu opening/closing animation
        $this->add_control(
            'fnav_menu_anim',
            [
                'label' => esc_html__( 'Menu animation', 'elem-fancynav' ),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'slide-along'    => esc_html__( 'Slide along', 'elem-fancynav' ),
                    'slide-top'      => esc_html__( 'Slide top', 'elem-fancynav' ),
                    'slide-reverse'  => esc_html__( 'Slide reverse', 'elem-fancynav' ),
                    'reveal'         => esc_html__( 'Reveal', 'elem-fancynav' ),
                    'push'           => esc_html__( 'Push', 'elem-fancynav' ),
                    'fall-down'      => esc_html__( 'Fall down', 'elem-fancynav' )
                ],
                'default' => 'slide-along'
            ]
        );

        // Open menu from left or right
        $this->add_control(
            'fnav_menu_right',
            [
                'label'        => esc_html__( 'Open menu from right', 'elem-fancynav' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER
            ]
        );

        // Open submenus horizontally or vertically
        $this->add_control(
            'fnav_submenus_open',
            [
                'label'   => esc_html__( 'Open submenus', 'elem-fancynav' ),
                'type'    => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'slide-side' => [
                        'title' => esc_html__( 'Horizontally', 'elem-fancynav' ),
                        'icon'  => 'fas fa-arrows-alt-h',
                    ],
                    'slide-down'  => [
                        'title' => esc_html__( 'Vertically', 'elem-fancynav' ),
                        'icon'  => 'fas fa-arrows-alt-v',
                    ],
                ],
                'separator' => 'after',
                'default'   => 'slide-side'
            ]
        );

        // Menu background color
        $this->add_control(
            'fnav_menu_bg',
            [
                'label'   => esc_html__( 'Menu background color', 'elem-fancynav' ),
                'type'    => \Elementor\Controls_Manager::COLOR,
                'default' => '#444'
            ]
        );

        // Site overlay background color for opened menu
        $this->add_control(
            'fnav_menu_overlay',
            [
                'label'     => esc_html__( 'Overlay background color', 'elem-fancynav' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'separator' => 'after',
                'default'   => 'rgba(68, 68, 68, 0.3)'
            ]
        );

        // Menu font size
        $this->add_control(
            'fnav_menu_font',
            [
                'label'   => esc_html__( 'Menu font size (in px)', 'elem-fancynav' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 16
            ]
        );

        // Menu font color
        $this->add_control(
            'fnav_menu_color',
            [
                'label'   => esc_html__( 'Menu font color', 'elem-fancynav' ),
                'type'    => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff'
            ]
        );

        // End the second controls section
		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $this->add_render_attribute( 'elementor-fancynav', 'class', 'fancynav-hamburger ' . $settings['fnav_button_effect'] );
        $this->add_render_attribute( 'elementor-fancynav', 'data-fancynav-add', $settings['fnav_menu_open'] );
        $this->add_render_attribute( 'elementor-fancynav', 'data-fancynav-animation', $settings['fnav_menu_anim'] );
        $this->add_render_attribute( 'elementor-fancynav', 'data-fancynav-open', $settings['fnav_menu_right'] ? 'right' : 'left' );
        $this->add_render_attribute( 'elementor-fancynav', 'data-fancynav-subnav-animation', $settings['fnav_submenus_open'] );

        printf(
    '
<style type="text/css">.elementor-element-%1$s .fancynav-hamburger .hamburger-inner,.elementor-element-%1$s .fancynav-hamburger .hamburger-inner::before,.elementor-element-%1$s .fancynav-hamburger .hamburger-inner::after{background-color:%2$s;}[data-fancynav-id="%1$s"] .fancynav-mainnav,[data-fancynav-id="%1$s"] .fancynav-subnav,[data-fancynav-id="%1$s"] .elementor-nav-menu--dropdown{background-color:%3$s;}[data-fancynav-id="%1$s"] .fancynav-overlay{background-color: %4$s;}[data-fancynav-id="%1$s"] .fancynav-mainnav ul>li>a{color:%5$s;font-size:%6$dpx;}</style>
<div %7$s><div class="hamburger-box"><div class="hamburger-inner"></div></div></div>',
            $this->get_id(),
            $settings['fnav_button_color'],
            $settings['fnav_menu_bg'],
            $settings['fnav_menu_overlay'],
            $settings['fnav_menu_color'],
            $settings['fnav_menu_font'],
            $this->get_render_attribute_string( 'elementor-fancynav' )
        );
	}

}
?>