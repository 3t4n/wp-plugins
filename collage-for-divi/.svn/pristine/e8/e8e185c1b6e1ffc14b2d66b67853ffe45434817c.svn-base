<?php

class CWPDC_CollageForDiviModule extends ET_Builder_Module {
	function init() {
		$this->name       = esc_html__( 'Divi Collage', 'collage-for-divi' );
		$this->plural     = esc_html__( 'Texts', 'collage-for-divi' );
		$this->slug       = 'cwp_photo_collage';
		$this->vb_support = 'on';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'collage-for-divi' ),

					'dc_images' => array(
						'title'    => esc_html__( 'Images', 'collage-for-divi' ),
						'priority' => 45,
						'tabbed_subtoggles' => true,
						//'bb_icons_support' => true,
						'sub_toggles' => array(
							'i_one'     => array(
								'name' => '1',
							
							),
							'i_two'     => array(
								'name' => '2',
							
							),
							'i_three'    => array(
								'name' => '3',
								
							),
							'i_four'    => array(
								'name' => '4',
								
							),
							
						),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
				
					'width' => array(
						'title'    => esc_html__( 'Sizing', 'collage-for-divi' ),
						'priority' => 65,
					),
				),
			),
		);

		$this->advanced_fields = array(
			               	
			'background'            => array(
				'settings' => array(
					'color' => 'alpha',
				),
			),
			'margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
			'fonts' => false,  
			'text'          => false,
			'button'        => false,
			'height'        => false,
		);

		$this->help_videos = array(
			array(
				'id'   => esc_html( 'oL00RjEKZaU' ),
				'name' => esc_html__( 'An introduction to the Text module', 'collage-for-divi' ),
			),
		);
	}

	function get_fields() {
		$fields = array(
			
			'num_image' => array(
				'label'           => esc_html__( 'Number Of Images', 'collage-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'unitless'        => true,
				'default'         => '2',
				'default_unit'    => '',
				'range_settings'  => array(
					'min'  => '2',
					'max'  => '4',
					'step' => '1',
				),
				'description'     => esc_html__( 'Do not enter value more than 4, it will not work', 'collage-for-divi' ),
			),

			'two_style' => array(
				'label'           => esc_html__( 'Collage Style', 'collage-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'one',
				'options'         => array(
					'one' => esc_html__( 'Style 1', 'collage-for-divi' ),
					'two'  => esc_html__( 'Style 2', 'collage-for-divi' ),
				),
				'tab_slug'      => 'general',
				'toggle_slug'   => 'main_content',
				'description'   => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'collage-for-divi' ),

				'show_if' => array(
					'num_image' => '2',     
				)	
			),

			'three_style' => array(
				'label'           => esc_html__( 'Collage Style', 'collage-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'one',
				'options'         => array(
					'one' => esc_html__( 'Style 1', 'collage-for-divi' ),
					'two'  => esc_html__( 'Style 2', 'collage-for-divi' ),
					'three' => esc_html__( 'Style 3', 'collage-for-divi' ),
					'four'  => esc_html__( 'Style 4', 'collage-for-divi' ),
					'five' => esc_html__( 'Style 5', 'collage-for-divi' ),
					'six' => esc_html__( 'Style 6', 'collage-for-divi' ),
					
				),
				'tab_slug'     => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'collage-for-divi' ),
				
				'show_if' => array(
					'num_image' => '3',     
				)
			),

			'four_style' => array(
				'label'           => esc_html__( 'Collage Style', 'collage-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'one',
				'options'         => array(
					'one' => esc_html__( 'Style 1', 'collage-for-divi' ),
					'two'  => esc_html__( 'Style 2', 'collage-for-divi' ),
					'three' => esc_html__( 'Style 3', 'collage-for-divi' ),
					'four'  => esc_html__( 'Style 4', 'collage-for-divi' ),
					'five' => esc_html__( 'Style 5', 'collage-for-divi' ),
					'six' => esc_html__( 'Style 6', 'collage-for-divi' ),
					'seven' => esc_html__( 'Style 7', 'collage-for-divi' ),
					'eight' => esc_html__( 'Style 8', 'collage-for-divi' ),
					'nine' => esc_html__( 'Style 9', 'collage-for-divi' ),
					'ten' => esc_html__( 'Style 10', 'collage-for-divi' ),
					'eleven' => esc_html__( 'Style 11', 'collage-for-divi' ),
					'twelve' => esc_html__( 'Style 12', 'collage-for-divi' ),
					'thirteen' => esc_html__( 'Style 13', 'collage-for-divi' ),
					'fourteen' => esc_html__( 'Style 14', 'collage-for-divi' ),
					'fivteen' => esc_html__( 'Style 15', 'collage-for-divi' ),
					
				),
				'tab_slug'     => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'collage-for-divi' ),
				  
					'show_if' => array(
						'num_image' => '4',     
					)
				),

				'st_src_one' => array(
					'label'              => esc_html__( 'Image 1', 'collage-for-divi' ),
					'type'               => 'upload',
					'option_category'    => 'basic_option',
					'default'            => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==',
					'upload_button_text' => esc_attr__( 'Upload an image', 'collage-for-divi' ),
					'choose_text'        => esc_attr__( 'Choose an Image', 'collage-for-divi' ),
					'update_text'        => esc_attr__( 'Set As Image', 'collage-for-divi' ),
					'hide_metadata'      => true,
					'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'collage-for-divi' ),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_one',
						
				),

				'src_one_h_pos' => array(
					'label'           => esc_html__( 'Image 1 Horizontal Position', 'collage-for-divi' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_one',
					'mobile_options'  => true,
					'validate_unit'   => true,
					'responsive'      => true,
					'default'         => '50%',
					'default_unit'    => '%',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '100',
						'step' => '1',
					),	
				),

				'src_one_v_pos' => array(
					'label'           => esc_html__( 'Image 1 Vertical Position', 'collage-for-divi' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'tab_slug'        => 'general',
					'sub_toggle'      => 'i_one',
					'toggle_slug'     => 'dc_images',
					'mobile_options'  => true,
					'validate_unit'   => true,
					'responsive'      => true,
					'default'         => '50%',
					'default_unit'    => '%',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '100',
						'step' => '1',
					),	
				),

				'st_src_two' => array(
					'label'              => esc_html__( 'Image 2', 'collage-for-divi' ),
					'type'               => 'upload',
					'option_category'    => 'basic_option',
					'default'            => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==',
					'upload_button_text' => esc_attr__( 'Upload an image', 'collage-for-divi' ),
					'choose_text'        => esc_attr__( 'Choose an Image', 'collage-for-divi' ),
					'update_text'        => esc_attr__( 'Set As Image', 'collage-for-divi' ),
					'hide_metadata'      => true,
					'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'collage-for-divi' ),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_two',
					
				),

				'src_two_h_pos' => array(
					'label'           => esc_html__( 'Image 2 Horizontal Position', 'collage-for-divi' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_two',
					'mobile_options'  => true,
					'validate_unit'   => true,
					'responsive'      => true,
					'default'         => '50%',
					'default_unit'    => '%',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '100',
						'step' => '1',
					),	
				),

				'src_two_v_pos' => array(
					'label'           => esc_html__( 'Image 2 Vertical Position', 'collage-for-divi' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_two',
					'mobile_options'  => true,
					'validate_unit'   => true,
					'responsive'      => true,
					'default'         => '50%',
					'default_unit'    => '%',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '100',
						'step' => '1',
					),	
				),

				'notice_three'   => array(
					'label'           => 'Notice',
					'type'            => 'warning',
					'value'           => true,
					'display_if'      => true,
					'message'         => esc_html__( 'No Options Available Here', 'collage-for-divi' ),
					'option_category' => 'configuration',
					'show_if'     => array(
						'num_image'   => '1',
						'num_image'   => '2',
					),
					
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_three',
				),

				'notice_four'   => array(
					'label'           => 'Notice',
					'type'            => 'warning',
					'value'           => true,
					'display_if'      => true,
					'message'         => esc_html__( 'No Options Available Here', 'collage-for-divi' ),
					'option_category' => 'configuration',
					'show_if_not'     => array(
						'num_image'   => '4',
							
					),
					
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_four',
				),

				'st_src_three' => array(
					'label'              => esc_html__( 'Image 3', 'collage-for-divi' ),
					'type'               => 'upload',
					'option_category'    => 'basic_option',
					'default'            => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==',
					'upload_button_text' => esc_attr__( 'Upload an image', 'collage-for-divi' ),
					'choose_text'        => esc_attr__( 'Choose an Image', 'collage-for-divi' ),
					'update_text'        => esc_attr__( 'Set As Image', 'collage-for-divi' ),
					'hide_metadata'      => true,
					'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'collage-for-divi' ),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_three',
					
					'show_if_not' => array(
						'num_image' => '1',
						'num_image' => '2',	   
					)
				),

				'src_three_h_pos' => array(
					'label'           => esc_html__( 'Image 3 Horizontal Position', 'collage-for-divi' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_three',
					'mobile_options'  => true,
					'validate_unit'   => true,
					'responsive'      => true,
					'default'         => '50%',
					'default_unit'    => '%',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '100',
						'step' => '1',
					),
					
					'show_if_not' => array(
						'num_image' => '1',
						'num_image' => '2',	   
					)
				),

				'src_three_v_pos' => array(
					'label'           => esc_html__( 'Image 3 Vertical Position', 'collage-for-divi' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'tab_slug'        => 'general',
					'sub_toggle'      => 'i_three',
					'toggle_slug'     => 'dc_images',
					'mobile_options'  => true,
					'validate_unit'   => true,
					'responsive'      => true,
					'default'         => '50%',
					'default_unit'    => '%',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '100',
						'step' => '1',
					),

					'show_if_not' => array(
						'num_image' => '1',
						'num_image' => '2',	   
					)	
				),

				'st_src_four' => array(
					'label'              => esc_html__( 'Image 4', 'collage-for-divi' ),
					'type'               => 'upload',
					'option_category'    => 'basic_option',
					'default'            => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==',
					'upload_button_text' => esc_attr__( 'Upload an image', 'collage-for-divi' ),
					'choose_text'        => esc_attr__( 'Choose an Image', 'collage-for-divi' ),
					'update_text'        => esc_attr__( 'Set As Image', 'collage-for-divi' ),
					'hide_metadata'      => true,
					'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'collage-for-divi' ),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_four',
					
					'show_if' => array(
						'num_image' => '4',	   
					)
				),

				'src_four_h_pos' => array(
					'label'           => esc_html__( 'Image 4 Horizontal Position', 'collage-for-divi' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_four',
					'mobile_options'  => true,
					'validate_unit'   => true,
					'responsive'      => true,
					'default'         => '50%',
					'default_unit'    => '%',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '100',
						'step' => '1',
					),
					
					'show_if' => array(
						'num_image' => '4',	   
					)
				),

				'src_four_v_pos' => array(
					'label'           => esc_html__( 'Image 4 Vertical Position', 'collage-for-divi' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'dc_images',
					'sub_toggle'      => 'i_four',
					'mobile_options'  => true,
					'validate_unit'   => true,
					'responsive'      => true,
					'default'         => '50%',
					'default_unit'    => '%',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '100',
						'step' => '1',
					),

					'show_if' => array(
						'num_image' => '4',	   
					)		
				),

				'height_pc' => array(
					'label'           => esc_html__( 'Height', 'collage-for-divi' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'width',
					'mobile_options'  => true,
					'validate_unit'   => true,
					'default'         => '500px',
					'default_unit'    => 'px',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '1000',
						'step' => '1',
					),
					'responsive'      => true,
				),

				'cwp_gw' => array(
					'label'           => esc_html__( 'Gutter Width', 'collage-for-divi' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'main_content',
					'mobile_options'  => true,
					'validate_unit'   => true,
					'responsive'      => true,
					'default'         => '10px',
					'default_unit'    => 'px',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '100',
						'step' => '1',
					),	
				),

				'pc_radius' => array(
					'label'           => esc_html__( 'Image Border Radius', 'collage-for-divi' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'main_content',
					'mobile_options'  => true,
					'validate_unit'   => true,
					'responsive'      => true,
					'default'         => '0px',
					'default_unit'    => 'px',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '100',
						'step' => '1',
					),
					'description'     => esc_html__( 'Do not enter value more than 4, it will not work', 'collage-for-divi' ),
				),

			'pc_mobile_layout' => array(
				'label'           => esc_html__( 'Mobile Layout', 'collage-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'same',
				'options'         => array(
					'same' => esc_html__( 'Same As Desktop', 'collage-for-divi' ),
					'stack'  => esc_html__( 'Stack', 'collage-for-divi' ),	
				),
				'tab_slug'     => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'collage-for-divi' ),
			),

			'mobile_height' => array(
				'label'           => esc_html__( 'Mobile Height', 'collage-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '200px',
				'default_unit'    => 'px',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '1000',
					'step' => '1',
				),
				'responsive'      => true,

				'show_if' => array(
					'pc_mobile_layout' => 'stack',	   
				)
			),
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		$num_image                   = $this->props['num_image'];
		$two_style                   = $this->props['two_style'];
		$three_style                 = $this->props['three_style'];
		$four_style                  = $this->props['four_style'];
		$st_src_one                  = $this->props['st_src_one'];
		$st_src_two                  = $this->props['st_src_two'];
		$st_src_three                = $this->props['st_src_three'];
		$st_src_four                 = $this->props['st_src_four'];
		$src_one_h_pos               = $this->props['src_one_h_pos'];
		$src_one_v_pos               = $this->props['src_one_v_pos'];
		$src_two_h_pos               = $this->props['src_two_h_pos'];
		$src_two_v_pos               = $this->props['src_two_v_pos'];
		$src_three_h_pos             = $this->props['src_three_h_pos'];
		$src_three_v_pos             = $this->props['src_three_v_pos'];
		$src_four_h_pos              = $this->props['src_four_h_pos'];
		$src_four_v_pos              = $this->props['src_four_v_pos'];
		$cwp_gw                      = $this->props['cwp_gw'];
		$pc_mobile_layout            = $this->props['pc_mobile_layout'];
		$mobile_height               = $this->props['mobile_height'];
		$height_pc                   = $this->props['height_pc'];
		$pc_radius                   = $this->props['pc_radius'];
		$notice_three               = $this->props['notice_three'];
		$notice_four                 = $this->props['notice_four'];
	


		// Image Border Radius

		$mobile_enabled = et_pb_get_responsive_status($this->props["pc_radius_last_edited"]);

		$height_pc_values = array ( 
		'desktop' => $this->props["pc_radius"],
		'tablet'  => $mobile_enabled ? $this->props["pc_radius_tablet"] : '',
		'phone'  => $mobile_enabled ? $this->props["pc_radius_phone"] : '', 
		);

		et_pb_generate_responsive_css($height_pc_values, '%%order_class%% .cwp_griditem', 'border-radius', $render_slug);

         // Gutter Width

		$mobile_enabled = et_pb_get_responsive_status($this->props["cwp_gw_last_edited"]);

		$height_pc_values = array ( 
		'desktop' => $this->props["cwp_gw"],
		'tablet'  => $mobile_enabled ? $this->props["cwp_gw_tablet"] : '',
		'phone'  => $mobile_enabled ? $this->props["cwp_gw_phone"] : '', 
		);

		et_pb_generate_responsive_css($height_pc_values, '%%order_class%% .cwp_pc', 'grid-gap', $render_slug);


		// height responsive work

        $mobile_enabled = et_pb_get_responsive_status($this->props["height_pc_last_edited"]);

		$height_pc_values = array ( 
		'desktop' => $this->props["height_pc"],
		'tablet'  => $mobile_enabled ? $this->props["height_pc_tablet"] : '',
		'phone'  => $mobile_enabled ? $this->props["height_pc_phone"] : '', 
		);

		et_pb_generate_responsive_css($height_pc_values, '%%order_class%% .cwp_pc', 'height', $render_slug);

		// image 1 Horizontal position responsive work

        $mobile_enabled = et_pb_get_responsive_status($this->props["src_one_h_pos_last_edited"]);

		$src_one_h_pos_values = array ( 
		'desktop' => $this->props["src_one_h_pos"],
		'tablet'  => $mobile_enabled ? $this->props["src_one_h_pos_tablet"] : '',
		'phone'  => $mobile_enabled ? $this->props["src_one_h_pos_phone"] : '', 
		);

		et_pb_generate_responsive_css($src_one_h_pos_values, '%%order_class%% .cwp_pc_griditem_1', 'background-position-x', $render_slug);

		// image 1 Vertical position responsive work
		
		$mobile_enabled = et_pb_get_responsive_status($this->props["src_one_v_pos_last_edited"]);

		$src_one_v_pos_values = array ( 
		'desktop' => $this->props["src_one_v_pos"],
		'tablet'  => $mobile_enabled ? $this->props["src_one_v_pos_tablet"] : '',
		'phone'  => $mobile_enabled ? $this->props["src_one_v_pos_phone"] : '', 
		);

		et_pb_generate_responsive_css($src_one_v_pos_values, '%%order_class%% .cwp_pc_griditem_1', 'background-position-y', $render_slug);

		 // image 2 Horizontal position responsive work
		 
		$mobile_enabled = et_pb_get_responsive_status($this->props["src_two_h_pos_last_edited"]);

		$src_two_h_pos_values = array ( 
		'desktop' => $this->props["src_two_h_pos"],
		'tablet'  => $mobile_enabled ? $this->props["src_two_h_pos_tablet"] : '',
		'phone'  => $mobile_enabled ? $this->props["src_two_h_pos_phone"] : '', 
		);

		et_pb_generate_responsive_css($src_two_h_pos_values, '%%order_class%% .cwp_pc_griditem_2', 'background-position-x', $render_slug);

		// image 2 Vertical position responsive work

		$mobile_enabled = et_pb_get_responsive_status($this->props["src_two_v_pos_last_edited"]);

		$src_two_v_pos_values = array ( 
		'desktop' => $this->props["src_two_v_pos"],
		'tablet'  => $mobile_enabled ? $this->props["src_two_v_pos_tablet"] : '',
		'phone'  => $mobile_enabled ? $this->props["src_two_v_pos_phone"] : '', 
		);

		et_pb_generate_responsive_css($src_two_v_pos_values, '%%order_class%% .cwp_pc_griditem_2', 'background-position-y', $render_slug);

		// image 3 Horizontal position responsive work

		$mobile_enabled = et_pb_get_responsive_status($this->props["src_three_h_pos_last_edited"]);

		$src_three_h_pos_values = array ( 
		'desktop' => $this->props["src_three_h_pos"],
		'tablet'  => $mobile_enabled ? $this->props["src_three_h_pos_tablet"] : '',
		'phone'  => $mobile_enabled ? $this->props["src_three_h_pos_phone"] : '', 
		);

		et_pb_generate_responsive_css($src_three_h_pos_values, '%%order_class%% .cwp_pc_griditem_3', 'background-position-x', $render_slug);


		// image 3 Vertical position responsive work

		$mobile_enabled = et_pb_get_responsive_status($this->props["src_three_v_pos_last_edited"]);

		$src_three_v_pos_values = array ( 
		'desktop' => $this->props["src_three_v_pos"],
		'tablet'  => $mobile_enabled ? $this->props["src_three_v_pos_tablet"] : '',
		'phone'  => $mobile_enabled ? $this->props["src_three_v_pos_phone"] : '', 
		);

		et_pb_generate_responsive_css($src_three_v_pos_values, '%%order_class%% .cwp_pc_griditem_3', 'background-position-y', $render_slug);

		// image 4 Horizontal position responsive work

		$mobile_enabled = et_pb_get_responsive_status($this->props["src_four_h_pos_last_edited"]);

		$src_four_h_pos_values = array ( 
		'desktop' => $this->props["src_four_h_pos"],
		'tablet'  => $mobile_enabled ? $this->props["src_four_h_pos_tablet"] : '',
		'phone'  => $mobile_enabled ? $this->props["src_four_h_pos_phone"] : '', 
		);

		et_pb_generate_responsive_css($src_four_h_pos_values, '%%order_class%% .cwp_pc_griditem_4', 'background-position-x', $render_slug);


		// image 4 Vertical position responsive work

		$mobile_enabled = et_pb_get_responsive_status($this->props["src_four_v_pos_last_edited"]);

		$src_four_v_pos_values = array ( 
		'desktop' => $this->props["src_four_v_pos"],
		'tablet'  => $mobile_enabled ? $this->props["src_four_v_pos_tablet"] : '',
		'phone'  => $mobile_enabled ? $this->props["src_four_v_pos_phone"] : '', 
		);

		et_pb_generate_responsive_css($src_four_v_pos_values, '%%order_class%% .cwp_pc_griditem_4', 'background-position-y', $render_slug);

		if ( 'stack' === $pc_mobile_layout && $mobile_height ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .cwp_griditem',
				'declaration' =>  sprintf('height: %1$s;', $mobile_height),
				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			));
		}

		if ( 'stack' === $pc_mobile_layout ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .display-style',
				'declaration' =>  'display: block;',
				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			));
		}

		if  ('stack' === $pc_mobile_layout ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .cwp_griditem',
				'declaration' =>  'margin-bottom: 10px !important;',
				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			));
		}

		if  ('stack' === $pc_mobile_layout && $height_pc ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .cwp_pc',
				'declaration' =>  'height: auto !important;',
				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			));
		}

		 // Layout markup

		 // Grid Image 2 Style 1 
		$grid_two_style_one_output = sprintf(
				'<div class="two-grid-style-one display-style cwp_pc">
					 <div class="one cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
					 <div class="two cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
				</div>',
				$st_src_one,
				$st_src_two
		);
	
		 // Grid Image 2 Style 2
		$grid_two_style_two_output = sprintf(
				'<div class="two-grid-style-two display-style cwp_pc">
					<div class="one cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
					<div class="two cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
				</div>',
				$st_src_one,
				$st_src_two
		);

		// three grid style

		 // Grid Image 3 Style 1
		$grid_three_style_one_output = sprintf(
			'<div class="three-grid-style-one display-style cwp_pc">
				<div class="one cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
				<div class="innerone cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
				<div class="innertwo cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
   			</div>',
			$st_src_one,
			$st_src_two,
			$st_src_three
		);
		// Grid Image 3 Style 2
		$grid_three_style_two_output = sprintf(
			'<div class="three-grid-style-two display-style cwp_pc">
			<div class="innerone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			<div class="innertwo cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			<div class="two cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
		    </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three
		);
		// Grid Image 3 Style 3
		$grid_three_style_three_output = sprintf(
			'<div class="three-grid-style-three display-style cwp_pc">
			<div class="one cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			<div class="innerone cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			<div class="innertwo cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
		    </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three
		);
		// Grid Image 3 Style 4
		$grid_three_style_four_output = sprintf(
			'<div class="three-grid-style-four display-style cwp_pc">
			  <div class="leftone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			  <div class="lefttwo cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			  <div class="rightone cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
		    </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three
		);
		// Grid Image 3 Style 5
		$grid_three_style_five_output = sprintf(
			'<div class="three-grid-style-five display-style cwp_pc">
			<div class="top cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			<div class="center cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			<div class="bottom cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
		    </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three
		);
		// Grid Image 3 Style 6
		$grid_three_style_six_output = sprintf(
			'<div class="three-grid-style-six display-style cwp_pc">
			<div class="left cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			<div class="center cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			<div class="right cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
		  </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three
		);
		// Grid Image 4 Style 1
		$grid_four_style_one_output = sprintf(
			'<div class="four-grid-style-one display-style cwp_pc">
			  <div class="one cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			  <div class="two cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			  <div class="three cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			  <div class="four cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		    </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three,
			$st_src_four
		);

		// Grid Image 4 Style 2
		$grid_four_style_two_output = sprintf(
			'<div class="four-grid-style-two display-style cwp_pc">
			   <div class="one cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			   <div class="two cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			   <div class="three cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			   <div class="four cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		    </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three,
			$st_src_four
		);

		
		// Grid Image 4 Style 3
		$grid_four_style_three_output = sprintf(
			'<div class="four-grid-style-three display-style cwp_pc">
			   <div class="topone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			   <div class="bottomone cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			   <div class="bottomtwo cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			   <div class="bottomthree cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		     </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three,
			$st_src_four
		);

		// Grid Image 4 Style 4
		$grid_four_style_four_output = sprintf(
			'<div class="four-grid-style-four display-style cwp_pc">
			   <div class="topone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			   <div class="toptwo cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			   <div class="topthree cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			   <div class="bottomone cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		    </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three,
			$st_src_four
		);

		// Grid Image 4 Style 5
		$grid_four_style_five_output = sprintf(
		    '<div class="four-grid-style-five display-style cwp_pc">
				<div class="leftone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
				<div class="rightone cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
				<div class="righttwo cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
				<div class="rightthree cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
			</div>',
			$st_src_one,
			$st_src_two,
			$st_src_three,
			$st_src_four
		);

		// Grid Image 4 Style 6
		$grid_four_style_six_output = sprintf(
		    '<div class="four-grid-style-six display-style cwp_pc">
			   <div class="leftone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			   <div class="lefttwo cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			   <div class="leftthree cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			   <div class="righttone cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		   </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three,
			$st_src_four
		);

		// Grid Image 4 Style 7
		$grid_four_style_seven_output = sprintf(
		    '<div class="four-grid-style-seven display-style cwp_pc">
			  <div class="topone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			  <div class="toptwo cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			  <div class="bottomone cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			  <div class="bottomtwo cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		   </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three,
			$st_src_four
		);

		// Grid Image 4 Style 8
		$grid_four_style_eight_output = sprintf(
		    '<div class="four-grid-style-eight display-style cwp_pc">
			  <div class="topone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			  <div class="toptwo cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			  <div class="bottomone cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			  <div class="bottomtwo cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		     </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three,
			$st_src_four
		);

		// Grid Image 4 Style 9
		$grid_four_style_nine_output = sprintf(
		    '<div class="four-grid-style-nine display-style cwp_pc">
			<div class="leftone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			<div class="lefttwo cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			<div class="rightone cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			<div class="righttwo cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		  </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three,
			$st_src_four
		);

		// Grid Image 4 Style 10
		$grid_four_style_ten_output = sprintf(
		    '<div class="four-grid-style-ten display-style cwp_pc">
			   <div class="leftone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			   <div class="lefttwo cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			   <div class="rightone cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			   <div class="righttwo cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		     </div>',
			$st_src_one,
			$st_src_two,
			$st_src_three,
			$st_src_four
		);

		// Grid Image 4 Style 11
		$grid_four_style_eleven_output = sprintf(
			'<div class="four-grid-style-eleven display-style cwp_pc">
			   <div class="topleft cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			   <div class="topright cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			   <div class="center cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			   <div class="bottom cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		     </div>',
			   $st_src_one,
			   $st_src_two,
			   $st_src_three,
			   $st_src_four
			);

		// Grid Image 4 Style 12
		$grid_four_style_twelve_output = sprintf(
			'<div class="four-grid-style-twelve display-style cwp_pc">
			   <div class="top cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			   <div class="centerone cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			   <div class="centertwo cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			   <div class="bottom cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		     </div>',
			   $st_src_one,
			   $st_src_two,
			   $st_src_three,
			   $st_src_four
			);

		// Grid Image 4 Style 13
		$grid_four_style_thirteen_output = sprintf(
			'<div class="four-grid-style-thirteen display-style cwp_pc">
			  <div class="top cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			  <div class="center cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			  <div class="bottomone cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			  <div class="bottomtwo cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		    </div>',
			   $st_src_one,
			   $st_src_two,
			   $st_src_three,
			   $st_src_four
			);

		// Grid Image 4 Style 14
		$grid_four_style_fourteen_output = sprintf(
			'<div class="four-grid-style-fourteen display-style cwp_pc">
			<div class="leftone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			<div class="lefttwo cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			<div class="center cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			<div class="right cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		  </div>',
			   $st_src_one,
			   $st_src_two,
			   $st_src_three,
			   $st_src_four
		);
		
		// Grid Image 4 Style 15
		$grid_four_style_fivteen_output = sprintf(
			'<div class="four-grid-style-fifteen display-style cwp_pc">
			   <div class="leftone cwp_griditem cwp_pc_griditem_1" style="background-image: url(%1$s)"></div>
			   <div class="lefttwo cwp_griditem cwp_pc_griditem_2" style="background-image: url(%2$s)"></div>
			   <div class="rightone cwp_griditem cwp_pc_griditem_3" style="background-image: url(%3$s)"></div>
			   <div class="righttwo cwp_griditem cwp_pc_griditem_4" style="background-image: url(%4$s)"></div>
		    </div>',
			   $st_src_one,
			   $st_src_two,
			   $st_src_three,
			   $st_src_four
			);
		
		$output = sprintf(
			'%1$s
			 %2$s
			 %3$s
			 %4$s
			 %5$s
			 %6$s
			 %7$s
			 %8$s
			 %9$s
			 %10$s
			 %11$s
			 %12$s
			 %13$s
			 %14$s
			 %15$s
			 %16$s
			 %17$s
			 %18$s
			 %19$s
			 %20$s
			 %21$s
			 %22$s
			 %23$s
			 
			

			',
			'2' === $num_image && 'one' === $two_style           ?     $grid_two_style_one_output : '',
			'2' === $num_image && 'two' === $two_style           ?     $grid_two_style_two_output : '',
			'3' === $num_image && 'one' === $three_style         ?     $grid_three_style_one_output : '',
			'3' === $num_image && 'two' === $three_style         ?     $grid_three_style_two_output : '',
			'3' === $num_image && 'three' === $three_style       ?     $grid_three_style_three_output : '',
			'3' === $num_image && 'four' === $three_style        ?     $grid_three_style_four_output : '',
			'3' === $num_image && 'five' === $three_style        ?     $grid_three_style_five_output : '',
			'3' === $num_image && 'six' === $three_style         ?     $grid_three_style_six_output : '',
			'4' === $num_image && 'one' === $four_style          ?     $grid_four_style_one_output : '',
			'4' === $num_image && 'two' === $four_style          ?     $grid_four_style_two_output : '',
			'4' === $num_image && 'three' === $four_style        ?     $grid_four_style_three_output : '',
			'4' === $num_image && 'four' === $four_style         ?     $grid_four_style_four_output : '',
			'4' === $num_image && 'five' === $four_style         ?     $grid_four_style_five_output : '',
			'4' === $num_image && 'six' === $four_style          ?     $grid_four_style_six_output : '',
			'4' === $num_image && 'seven' === $four_style        ?     $grid_four_style_seven_output : '',
			'4' === $num_image && 'eight' === $four_style        ?     $grid_four_style_eight_output : '',
			'4' === $num_image && 'nine' === $four_style         ?     $grid_four_style_nine_output : '',
			'4' === $num_image && 'ten' === $four_style          ?      $grid_four_style_ten_output : '',
			'4' === $num_image && 'eleven' === $four_style       ?   $grid_four_style_eleven_output : '',
			'4' === $num_image && 'twelve' === $four_style       ?   $grid_four_style_twelve_output : '',
			'4' === $num_image && 'thirteen' === $four_style     ?   $grid_four_style_thirteen_output : '',
			'4' === $num_image && 'fourteen' === $four_style     ?   $grid_four_style_fourteen_output : '',
			'4' === $num_image && 'fivteen' === $four_style      ?   $grid_four_style_fivteen_output : ''

		);

		return $output;
	}
}

new CWPDC_CollageForDiviModule;
