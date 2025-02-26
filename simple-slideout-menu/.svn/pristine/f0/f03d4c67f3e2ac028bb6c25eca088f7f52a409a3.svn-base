<?php 
namespace simsm\admin;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('simsm\admin\Customizer')){

	class Customizer {


		function __construct(){

			add_action( 'customize_register', array( $this, 'customize_register' ) );

		}


		function customize_register( $wp_customize ) {

			require_once( SIMSM_PATH . 'includes/admin/customizer-controls/alpha-color-picker.php' );

			// Create our panels

			$wp_customize->add_panel( 'slideout_menu', array(
				'title'          => __('Slideout Menu', 'simple-slideout-menu'),
			) );
					
			// Create our sections

			$wp_customize->add_section( 'simsm_panel' , array(
				'title'             => __('Panel', 'simple-slideout-menu'),
				'panel'             => 'slideout_menu',
			) );
					
			$wp_customize->add_section( 'simsm_menu' , array(
				'title'             => __('Menu', 'simple-slideout-menu'),
				'panel'             => 'slideout_menu',
			) );
					
			$wp_customize->add_section( 'simsm_close_icon' , array(
				'title'             => __('Close Icon', 'simple-slideout-menu'),
				'panel'             => 'slideout_menu',
			) );

			$wp_customize->add_section( 'simsm_hamburger_icon' , array(
				'title'             => __('Hamburger Icon', 'simple-slideout-menu'),
				'panel'             => 'slideout_menu',
			) );

			$wp_customize->add_section( 'simsm_visibility' , array(
				'title'             => __('Visibility', 'simple-slideout-menu'),
				'panel'             => 'slideout_menu',
			) );
					
			// Create our settings

			$wp_customize->add_setting( 'simsm_panel_bg' , array(
				'type'          => 'option',
				'transport'     => 'postMessage',
				'default'       => '#ffffff',
			) );
			/*$wp_customize->add_control( 'simsm_panel_bg_control', array(
				'label'      => __('Background', 'simple-slideout-menu'),
				'section'    => 'simsm_panel',
				'settings'   => 'simsm_panel_bg',
				'type'       => 'color',
			) );*/

			$wp_customize->add_control(
				new \Customize_Alpha_Color_Control(
					$wp_customize,
					'simsm_panel_bg_control',
					array(
						'label'         => __( 'Background', 'simple-slideout-menu' ),
						'section'       => 'simsm_panel',
						'settings'      => 'simsm_panel_bg',
						'show_opacity'  => true, // Optional.
					)
				)
			);
					
			$wp_customize->add_setting( 'simsm_panel_position' , array(
				'default'       => 'left',
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_panel_position_control', array(
				'label'      => __('Position', 'simple-slideout-menu'),
				'section'    => 'simsm_panel',
				'settings'   => 'simsm_panel_position',
				'type'       => 'select',
			        'choices'    => array( 
			          'left' => __('Left', 'simple-slideout-menu'),
			          'right' => __('Right', 'simple-slideout-menu'),
			        ),
			) );
					
			$wp_customize->add_setting( 'simsm_panel_width' , array(
				'default'       => '311px',
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_panel_width_control', array(
				'label'      => __('Max Width', 'simple-slideout-menu'),
				'section'    => 'simsm_panel',
				'settings'   => 'simsm_panel_width',
				'type'       => 'text',
			) );
            
            $wp_customize->add_setting( 'simsm_panel_close_on_outside_click' , array(
				'default'       => 0,
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_panel_close_on_outside_click_control', array(
				'label'      => __('Automatically close slideout menu when clicked outside?', 'simple-slideout-menu'),
				'section'    => 'simsm_panel',
				'settings'   => 'simsm_panel_close_on_outside_click',
				'type'       => 'checkbox',
			) );
					
			$wp_customize->add_setting( 'simsm_panel_shadow' , array(
				'default'       => 0,
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_panel_shadow_control', array(
				'label'      => __('Add Box Shadow', 'simple-slideout-menu'),
				'section'    => 'simsm_panel',
				'settings'   => 'simsm_panel_shadow',
				'type'       => 'checkbox'
			) );
            
					
			$wp_customize->add_setting( 'simsm_panel_shadow_color' , array(
				'type'          => 'option',
				'transport'     => 'postMessage',
				'default'       => 'rgba(0,0,0,0.5)',
			) );
			
			$wp_customize->add_control(
				new \Customize_Alpha_Color_Control(
					$wp_customize,
					'simsm_panel_shadow_color_control',
					array(
						'label'         => __( 'Shadow Color', 'simple-slideout-menu' ),
						'section'       => 'simsm_panel',
						'settings'      => 'simsm_panel_shadow_color',
						'show_opacity'  => true, // Optional.
					)
				)
			);
					
			$wp_customize->add_setting( 'simsm_menu_link_color' , array(
				'default'       => '#000000',
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_menu_link_color_control', array(
				'label'      => __('Link Color', 'simple-slideout-menu'),
				'section'    => 'simsm_menu',
				'settings'   => 'simsm_menu_link_color',
				'type'       => 'color',
			) );
					
			$wp_customize->add_setting( 'simsm_menu_link_hover_color' , array(
				'default'       => '#333333',
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_menu_link_hover_color_control', array(
				'label'      => __('Link hover color', 'simple-slideout-menu'),
				'section'    => 'simsm_menu',
				'settings'   => 'simsm_menu_link_hover_color',
				'type'       => 'color',
			) );
					
			$wp_customize->add_setting( 'simsm_menu_link_font_size' , array(
				'default'       => '24',
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_menu_link_font_size_control', array(
				'label'      => __('Link Font Size  (px)', 'simple-slideout-menu'),
				'section'    => 'simsm_menu',
				'settings'   => 'simsm_menu_link_font_size',
				'type'       => 'number',
			        'input_attrs'=> array( 
			          'step' => 1,
			          'min' => 10,
			          'max' => 100,
			        ),
			) );
					
			$wp_customize->add_setting( 'simsm_menu_link_text_decoration' , array(
				'type'          => 'option',
				'transport'     => 'postMessage',
				'default'       => 'none',
			) );
			$wp_customize->add_control( 'simsm_menu_link_text_decoration_control', array(
				'label'      => __('Link Text Decoration', 'simple-slideout-menu'),
				'section'    => 'simsm_menu',
				'settings'   => 'simsm_menu_link_text_decoration',
				'type'       => 'select',
			        'choices'    => array( 
			          'none' => __('None', 'simple-slideout-menu'),
			          'overline' => __('Overline', 'simple-slideout-menu'),
			          'underline' => __('Underline', 'simple-slideout-menu'),
			          'line_through' => __('Line Through', 'simple-slideout-menu'),
			        ),
			) );

			$wp_customize->add_setting( 'simsm_menu_link_text_transformation' , array(
				'type'          => 'option',
				'transport'     => 'postMessage',
				'default'       => 'uppercase',
			) );
			$wp_customize->add_control( 'simsm_menu_link_text_transformation_control', array(
				'label'      => __('Link text transformation', 'simple-slideout-menu'),
				'section'    => 'simsm_menu',
				'settings'   => 'simsm_menu_link_text_transformation',
				'type'       => 'select',
			        'choices'    => array( 
			          'none' => __('None', 'simple-slideout-menu'),
			          'uppercase' => __('Uppercase', 'simple-slideout-menu'),
			          'lowercase' => __('Lowercase', 'simple-slideout-menu'),
			          'capitalize' => __('Capitalize', 'simple-slideout-menu'),
			        ),
			) );
					
			$wp_customize->add_setting( 'simsm_menu_link_font_weight' , array(
				'default'       => '700',
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_menu_link_font_weight_control', array(
				'label'      => __('Link Font Weight', 'simple-slideout-menu'),
				'section'    => 'simsm_menu',
				'settings'   => 'simsm_menu_link_font_weight',
				'type'       => 'number',
			        'input_attrs'=> array( 
			          'step' => 1,
			          'min' => 10,
			          'max' => 100,
			        ),
			) );
					
			$wp_customize->add_setting( 'simsm_close_icon_color' , array(
				'default'       => '#000000',
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_close_icon_color_control', array(
				'label'      => __('Icon Color', 'simple-slideout-menu'),
				'section'    => 'simsm_close_icon',
				'settings'   => 'simsm_close_icon_color',
				'type'       => 'color',
				'input_attrs'=> array( 
			          'data-alpha-enabled=' => true,
			          'class' => 'color-picker'
			        ),
			) );
					
			$wp_customize->add_setting( 'simsm_close_icon_hover_color' , array(
				'default'       => '#ff0000',
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_close_icon_hover_color_control', array(
				'label'      => __('Icon hover color', 'simple-slideout-menu'),
				'section'    => 'simsm_close_icon',
				'settings'   => 'simsm_close_icon_hover_color',
				'type'       => 'color',
			) );
					
			$wp_customize->add_setting( 'simsm_close_icon_font_size' , array(
				'type'          => 'option',
				'transport'     => 'postMessage',
				'default'       => '30',
			) );
			$wp_customize->add_control( 'simsm_close_icon_font_size_control', array(
				'label'      => __('Close icon font size (px)', 'simple-slideout-menu'),
				'section'    => 'simsm_close_icon',
				'settings'   => 'simsm_close_icon_font_size',
				'type'       => 'number',
			        'input_attrs'=> array( 
			          'min' => 10,
			          'max' => 100,
			        ),
			) );




					
			$wp_customize->add_setting( 'simsm_hamburger_icon_color' , array(
				'default'       => '#000000',
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_hamburger_icon_color_control', array(
				'label'      => __('Icon Color', 'simple-slideout-menu'),
				'section'    => 'simsm_hamburger_icon',
				'settings'   => 'simsm_hamburger_icon_color',
				'type'       => 'color',
			) );
					
			$wp_customize->add_setting( 'simsm_hamburger_icon_hover_color' , array(
				'default'       => '#ff0000',
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_hamburger_icon_hover_color_control', array(
				'label'      => __('Icon hover color', 'simple-slideout-menu'),
				'section'    => 'simsm_hamburger_icon',
				'settings'   => 'simsm_hamburger_icon_hover_color',
				'type'       => 'color',
			) );
					
			$wp_customize->add_setting( 'simsm_hamburger_icon_font_size' , array(
				'type'          => 'option',
				'transport'     => 'postMessage',
				'default'       => '30',
			) );
			$wp_customize->add_control( 'simsm_hamburger_icon_font_size_control', array(
				'label'      => __('Icon font size (px)', 'simple-slideout-menu'),
				'section'    => 'simsm_hamburger_icon',
				'settings'   => 'simsm_hamburger_icon_font_size',
				'type'       => 'number',
			        'input_attrs'=> array( 
			          'min' => 10,
			          'max' => 100,
			        ),
			) );

			$wp_customize->add_setting( 'simsm_hide_desktop' , array(
				'default'       => 0,
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_hide_desktop_control', array(
				'label'      => __('Hide on Desktop', 'simple-slideout-menu'),
				'section'    => 'simsm_visibility',
				'settings'   => 'simsm_hide_desktop',
				'type'       => 'checkbox'
			) );
			$wp_customize->add_setting( 'simsm_hide_tablet' , array(
				'default'       => 0,
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_hide_tablet_control', array(
				'label'      => __('Hide on Tablet', 'simple-slideout-menu'),
				'section'    => 'simsm_visibility',
				'settings'   => 'simsm_hide_tablet',
				'type'       => 'checkbox'
			) );
			$wp_customize->add_setting( 'simsm_hide_mobile' , array(
				'default'       => 0,
				'type'          => 'option',
				'transport'     => 'postMessage',
			) );
			$wp_customize->add_control( 'simsm_hide_mobile_control', array(
				'label'      => __('Hide on Mobile', 'simple-slideout-menu'),
				'section'    => 'simsm_visibility',
				'settings'   => 'simsm_hide_mobile',
				'type'       => 'checkbox'
			) );


					
			}




	}

}