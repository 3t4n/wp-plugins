<?php
/**
 *
 * @package oneto-companion
 */	

/* Top header content  */
if ( ! function_exists( 'oneto_theme_top_header_default_content' ) ) :		
    function oneto_theme_top_header_default_content( $wp_customize ){
			$oneto_theme_top_header_content_control = $wp_customize->get_setting( 'oneto_top_header_info_content' );
				if ( ! empty( $oneto_theme_top_header_content_control ) ) {
					$oneto_theme_top_header_content_control->default = json_encode( array(
						array(
						'icon_value' => 'fa fa-clock-o',
						'text'       => esc_html__( 'Mon - Sat 8.00 - 18.00. Sunday CLOSED', 'oneto' ),
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b36',
						),
						array(
						'icon_value' => 'fa fa-phone',
						'text'       => '+14 1-800-1234-567',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b37',
						),
						array(
						'icon_value' => 'fa fa-envelope-o',
						'text'       => esc_html__( 'info@oneto.com', 'oneto' ),
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b38',
						),
						
					) );

				}
	    }
add_action( 'customize_register', 'oneto_theme_top_header_default_content' );
endif; 

/* Top header social icons  */
if ( ! function_exists( 'oneto_theme_header_social_default_content' ) ) :		
    function oneto_theme_header_social_default_content( $wp_customize ){
			$oneto_theme_top_header_social_content_control = $wp_customize->get_setting( 'oneto_top_header_social_content' );
				if ( ! empty( $oneto_theme_top_header_social_content_control ) ) {
					$oneto_theme_top_header_social_content_control->default = json_encode( array(
						array(
						'icon_value' => 'fa fa-facebook',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b55',
						),
						array(
						'icon_value' => 'fa fa-twitter',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b56',
						),
						array(
						'icon_value' => 'fa fa-google-plus',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b57',
						),
						array(
						'icon_value' => 'fa fa-linkedin',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b58',
						),
						array(
						'icon_value' => 'fa fa-instagram',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b59',
						),
                        array(
						'icon_value' => 'fa fa-youtube',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b60',
						),
						
					) );

				}
	    }
add_action( 'customize_register', 'oneto_theme_header_social_default_content' );
endif;

if ( ! function_exists( 'onetocompanion_oneto_main_slider_default_content' ) ) :
		/* Main slider content  */
		function onetocompanion_oneto_main_slider_default_content( $wp_customize ){
			
			$activate_theme_data = wp_get_theme(); // getting current theme data
			$activate_theme = $activate_theme_data->name;
			
				if('Oneto' == $activate_theme){
					// write here for print conditionally data
				}

				$oneto_main_slider_data = $wp_customize->get_setting( 'oneto_main_slider_content' );
					if ( ! empty( $oneto_main_slider_data ) ) {
						
					$oneto_main_slider_data->default = json_encode( array(
						array(
						'title'         => esc_html__( 'A WordPress Theme for Your SAAS Application/Project', 'oneto-companion' ),
						'text'          => esc_html__( 'Make the most out of your email blast with our advanced email marketing tool. Get rid of all complications and grow your business with our easy to use features.', 'oneto-companion' ),
						'button_text'   => esc_html__( 'Getting started', 'oneto-companion' ),
						'link'          => '#',
						'open_new_tab'  => 'no',
						'button_text2'  => esc_html__('See Pricing','oneto-companion'),
						'link2'         => '#',
						'image_url2'    => oneto_companion_plugin_url .'/inc/oneto/assets/img/laptop.png',
						'image_url'     => '',
						'id'            => 'customizer_repeater_56d7ea7f40b10',
						),
						
					) );
					
				}
		}
add_action( 'customize_register', 'onetocompanion_oneto_main_slider_default_content' );
endif;


/* Client Content  */
if ( ! function_exists( 'onetocompanion_oneto_client_default_content' ) ) :
	function onetocompanion_oneto_client_default_content( $wp_customize ) {
		$oneto_client_content_control = $wp_customize->get_setting( 'oneto_clients_content' );
		if ( ! empty( $oneto_client_content_control ) ) {

			$activate_theme_data = wp_get_theme(); // getting current theme data
			$activate_theme = $activate_theme_data->name;

			$oneto_client_content_control->default = json_encode( array(
				array(
				'link'       => '#',
				'image_url'  => oneto_companion_plugin_url .'/inc/oneto/assets/img/client1.png',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b71',
				),
				array(
				'link'       => '#',
				'image_url'  => oneto_companion_plugin_url .'/inc/oneto/assets/img/client2.png',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b72',
				),
				array(
				'link'       => '#',
				'image_url'  => oneto_companion_plugin_url .'/inc/oneto/assets/img/client3.png',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b73',
				),
				array(
				'link'       => '#',
				'image_url'  => oneto_companion_plugin_url .'/inc/oneto/assets/img/client4.png',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b74',
				),
				array(
				'link'       => '#',
				'image_url'  => oneto_companion_plugin_url .'/inc/oneto/assets/img/client5.png',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b75',
				),
				array(		
				'link'       => '#',
				'image_url'  => oneto_companion_plugin_url .'/inc/oneto/assets/img/client6.png',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b76',
				),
			) );
		}
	}
add_action( 'customize_register', 'onetocompanion_oneto_client_default_content' );
endif;


/* Feature Content  */
if ( ! function_exists( 'oneto_theme_feature_default_content' ) ) :		
    function oneto_theme_feature_default_content( $wp_customize ){
		$oneto_theme_feature_content_control = $wp_customize->get_setting( 'oneto_theme_feature_content' );
		if ( ! empty( $oneto_theme_feature_content_control ) ) {
			$oneto_theme_feature_content_control->default = json_encode( array(
				array(
				'image_url'    => oneto_companion_plugin_url .'/inc/oneto/assets/img/feature01.png',
				'title'        => esc_html__( 'Chat tools', 'oneto-companion' ),
				'text'         => esc_html__( 'Get all the tools you need to provide excellent customer support', 'oneto-companion' ),
				'button_text'  => esc_html__('Learn More', 'oneto-companion'),
				'choice'       => 'customizer_repeater_image',
				'link'         => '#',
				'open_new_tab' => 'no',
				'id'           => 'customizer_repeater_56d7ea7f40b21',
				),
				array(
				'image_url'    => oneto_companion_plugin_url .'/inc/oneto/assets/img/feature02.png',
				'title'        => esc_html__( 'LiveChat APIs', 'oneto-companion' ),
				'text'         => esc_html__( 'Use our APIs to automate your work and create custom integrations', 'oneto-companion' ),
				'button_text'  => esc_html__( 'Learn More','oneto-companion' ),
				'choice'       => 'customizer_repeater_image',
				'link'         => '#',
				'open_new_tab' => 'no',
				'id'           => 'customizer_repeater_56d7ea7f40b22',
				),
				array(
				'image_url'    => oneto_companion_plugin_url .'/inc/oneto/assets/img/feature03.png',
				'title'        => esc_html__( 'Message channels', 'oneto-companion' ),
				'text'         => esc_html__( 'Reach your customers wherever they are and discover how we helps them.', 'oneto-companion' ),
				'button_text'  => esc_html__( 'Learn More', 'oneto-companion' ),
				'choice'       => 'customizer_repeater_image',
				'link'         => '#',
				'open_new_tab' => 'no',
				'id'           => 'customizer_repeater_56d7ea7f40b23',
				),						
			) );
		}
    }
add_action( 'customize_register', 'oneto_theme_feature_default_content' );
endif;

/* Testimonial content  */
if ( ! function_exists( 'onetocompanion_oneto_testimonial_default_content' ) ) :		
	function onetocompanion_oneto_testimonial_default_content( $wp_customize ){
				$oneto_testimonial_data = $wp_customize->get_setting( 'oneto_testimonial_content' );
				if ( ! empty( $oneto_testimonial_data ) ) 
				{			
				$activate_theme_data = wp_get_theme(); // getting current theme data
				$activate_theme = $activate_theme_data->name;
				if('Oneto' == $activate_theme){
					$oneto_testimonial_data->default = json_encode( array(
						array(
						'text'      	=> wp_kses_post('<h3 class="font-weight-700">Get Started With Influence Agents !</h3>
						<p class="mt-3">Lorem ipsum dolor sit amet, consect adising elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor.</p>','oneto-companion'),
						'title'        	=> esc_html__('David Miller','oneto-companion'),
						'designation' 	=> esc_html__('Product Manager','oneto-companion'),
						'number'   		=> esc_html__('5','oneto-companion'),
						'link'       	=> '#',
						'image_url'  	=> oneto_companion_plugin_url .'/inc/oneto/assets/img/businessman.png',
						'open_new_tab' 	=> 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b30',
						),				
					) );
                }
				}
        }
add_action( 'customize_register', 'onetocompanion_oneto_testimonial_default_content' );
endif;