<?php

return array
(/*
	'add_panel'       => true,
	'id'              => $this->plugin->dashed_name,
	'title'           => __( 'Molongui Order Bump', 'molongui-bump-offer' ),
	'description'     => sprintf( '%s%s%s', '<p>', __( 'Customize visual settings to your like.', 'molongui-bump-offer' ), '</p>' ),
	'priority'        => 121,
	'capability'      => 'manage_options',
	'active_callback' => '',
	'sections'        => array
	(
		array
		(
			'id'                 => 'molongui_order_bump_option_group_1_id',
			'title'              => __( 'Option group 1', 'molongui-bump-offer' ),
			'description'        => __( 'Option group description.', 'molongui-bump-offer' ),
			'display'            => true,
			'priority'           => '',
			'type'               => '',
			'capability'         => 'manage_options',
			'active_callback'    => '',
			'description_hidden' => true,
			'fields'             => array
			(
				array
				(
					'id'      => $this->plugin->db_prefix.'_xxx[select_setting_name]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => 'option-1',
						'transport'            => 'refresh',
						'validate_callback'    => '',
						'sanitize_callback'    => 'molongui_order_bump_sanitize_setting',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Label', 'molongui-bump-offer' ),
						'description'     => __( 'Description.', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Select_Control',
						'type'            => 'molongui-select',
						'choices'         => array
						(
							'option-1' => array
							(
								'label'    => __( 'Option 1', 'molongui-bump-offer' ),
								'disabled' => false,
								'premium'  => false,
							),
							'option-2' => array
							(
								'label'    => __( 'Option 2', 'molongui-bump-offer' ),
								'disabled' => false,
								'premium'  => false,
							),
							'option-3' => array
							(
								'label'    => __( 'Option 3', 'molongui-bump-offer' ),
								'disabled' => false,
								'premium'  => false,
							),
						),
						'input_attrs'     => array(),
						'allow_addition'  => false,
						'active_callback' => '',
					),
				),
			),
		),
		array
		(
			'id'                 => 'molongui_order_bump_option_group_2_id',
			'title'              => __( 'Option group 2', 'molongui-bump-offer' ),
			'description'        => __( 'Option group description.', 'molongui-bump-offer' ),
			'display'            => true,
			'priority'           => '',
			'type'               => '',
			'capability'         => 'manage_options',
			'active_callback'    => '',
			'description_hidden' => true,
			'fields'             => array
			(
				array
				(
					'id'      => 'molongui_premium_notice',
					'display' => !did_action( 'mbo_pro/loaded' ),
					'setting' => array
					(
						'sanitize_callback' => '',
					),
					'control' => array
					(
						'label'           => __( 'Upgrade to unlock all features', 'molongui-bump-offer' ),
						'description'     => sprintf( __( 'You can preview premium settings but default values will be saved. Consider upgrading to %sPremium version%s to unlock all features and have premium support.', 'molongui-bump-offer' ), '<a href="https://www.molongui.com/product/authorship" target="_blank">', '</a>' ),
						'priority'        => 1,
						'class'           => 'Molongui_Customize_Notice_Control',
						'type'            => 'notice',
						'choices'         => array(),
						'input_attrs'     => array
						(
							'bg'    => 'orange',
							'color' => 'white',
						),
						'allow_addition'  => false,
						'active_callback' => '',
					),
				),
				array
				(
					'id'      => 'setting_section_title',
					'display' => true,
					'setting' => array
					(
						'sanitize_callback' => 'esc_html',
					),
					'control' => array
					(
						'label'           => __( 'Section', 'molongui-bump-offer' ),
						'description'     => __( 'Section description.', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Heading_Control',
						'type'            => 'heading',
						'choices'         => array(),
						'input_attrs'     => array(),
						'allow_addition'  => false,
						'active_callback' => '',
					),
				),
				array
				(
					'id'      => $this->plugin->db_prefix.'_xxx[img_radio_setting_name]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => 'option_1',
						'transport'            => 'refresh',
						'validate_callback'    => '',
						'sanitize_callback'    => '',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Label', 'molongui-bump-offer' ),
						'description'     => __( 'Description.', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Image_Radio_Button_Control',
						'type'            => 'molongui-image-radio',
						'choices'         => array
						(
							'option_1' => array
							(
								'image'   => $this->plugin->url.'customizer/img/setting/box-layout-1.png',
								'label'   => __( 'Option 1', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'option_2' => array
							(
								'image'   => $this->plugin->url.'customizer/img/setting/box-layout-2.png',
								'label'   => __( 'Option 2', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'option_3' => array
							(
								'image'   => $this->plugin->url.'customizer/img/setting/box-layout-3.png',
								'label'   => __( 'Option 3', 'molongui-bump-offer' ),
								'premium' => false,
							),
						),
						'input_attrs'     => array(),
						'allow_addition'  => false,
						'active_callback' => '',
					),
				),
				array
				(
					'id'      => $this->plugin->db_prefix.'_xxx[range_setting_name]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => 0,
						'transport'            => 'postMessage',
						'validate_callback'    => '',
						'sanitize_callback'    => 'molongui_order_bump_sanitize_setting',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Label', 'molongui-bump-offer' ),
						'description'     => __( 'Description.', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Range_Control',
						'type'            => 'flat',
						'choices'         => array(),
						'input_attrs'     => array
						(
							'premium' => false,
							'min'     => 0,
							'max'     => 200,
							'step'    => 1,
							'suffix'  => 'px',
						),
						'allow_addition'  => false,
						'active_callback' => '',
					),
				),
				array
				(
					'id'      => $this->plugin->db_prefix.'_xxx[color_setting_name]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => 'inherit',
						'transport'            => 'postMessage',
						'validate_callback'    => '',
						'sanitize_callback'    => 'molongui_order_bump_sanitize_setting',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Label', 'molongui-bump-offer' ),
						'description'     => __( 'Description.', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Color_Control',
						'type'            => 'molongui-color',
						'choices'         => array(),
						'input_attrs'     => array
						(
							'premium' => false,
						),
						'allow_addition'  => false,
						'active_callback' => '',
					),
				),
				array
				(
					'id'      => 'molongui_headline_typography_settings',
					'display' => true,
					'setting' => array
					(
						'sanitize_callback' => 'esc_html',
					),
					'control' => array
					(
						'label'           => __( 'Typography', 'molongui-bump-offer' ),
						'description'     => __( '', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Group_Label_Control',
						'type'            => 'molongui-compact-group-label',
						'active_callback' => 'molongui_active_headline_setting',
						'input_attrs'     => array(),
						'choices'         => array(),
					),
				),
				array
				(
					'id'      => $this->plugin->db_prefix.'_box[headline_text_size]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => 'normal',
						'transport'            => 'postMessage',
						'validate_callback'    => '',
						'sanitize_callback'    => 'molongui_authorship_sanitize_setting',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Size', 'molongui-bump-offer' ),
						'description'     => __( '', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Range_Control',
						'type'            => 'molongui-compact-range-flat',
						'choices'         => array(),
						'input_attrs'     => array
						(
							'premium' => false,
							'min'     => 8,
							'max'     => 100,
							'step'    => 1,
							'suffix'  => 'px',
						),
						'allow_addition'  => false,
						'active_callback' => 'molongui_active_headline_setting',
					),
				),
				array
				(
					'id'      => $this->plugin->db_prefix.'_box[headline_text_style]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => '',
						'transport'            => 'postMessage',
						'validate_callback'    => '',
						'sanitize_callback'    => 'molongui_authorship_sanitize_setting',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Style', 'molongui-bump-offer' ),
						'description'     => __( '', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Image_Checkbox_Button_Control',
						'type'            => 'molongui-compact-image-checkbox',
						'choices'         => array
						(
							'normal' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-normal.png',
								'label'   => __( 'Normal', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'bold' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-bold.png',
								'label'   => __( 'Bold', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'italic' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-italic.png',
								'label'   => __( 'Italic', 'molongui-bump-offer' ),
								'premium' => !did_action( 'mbo_pro/loaded' ),
							),
							'underline' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-underline.png',
								'label'   => __( 'Underline', 'molongui-bump-offer' ),
								'premium' => !did_action( 'mbo_pro/loaded' ),
							),
							'overline' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-overline.png',
								'label'   => __( 'Overline', 'molongui-bump-offer' ),
								'premium' => !did_action( 'mbo_pro/loaded' ),
							),
							'overunderline' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-overunderline.png',
								'label'   => __( 'Overline and underline', 'molongui-bump-offer' ),
								'premium' => !did_action( 'mbo_pro/loaded' ),
							),
						),
						'input_attrs'     => array( 'compact' => true ),
						'allow_addition'  => true,
						'active_callback' => 'molongui_active_headline_setting',
					),
				),
				array
				(
					'id'      => $this->plugin->db_prefix.'_box[headline_text_case]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => 'none',
						'transport'            => 'postMessage',
						'validate_callback'    => '',
						'sanitize_callback'    => 'molongui_authorship_sanitize_setting',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Case', 'molongui-bump-offer' ),
						'description'     => __( '', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Image_Radio_Button_Control',
						'type'            => 'molongui-compact-image-radio',
						'choices'         => array
						(
							'none' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-case/font-case-none.png',
								'label'   => __( 'Leave as is', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'capitalize' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-case/font-case-capitalize.png',
								'label'   => __( 'Capitalize', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'uppercase' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-case/font-case-uppercase.png',
								'label'   => __( 'Uppercase', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'lowercase' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-case/font-case-lowercase.png',
								'label'   => __( 'Lowercase', 'molongui-bump-offer' ),
								'premium' => false,
							),
						),
						'input_attrs'     => array(),
						'allow_addition'  => false,
						'active_callback' => 'molongui_active_headline_setting',
					),
				),
				array
				(
					'id'      => $this->plugin->db_prefix.'_box[headline_text_align]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => 'left',
						'transport'            => 'postMessage',
						'validate_callback'    => '',
						'sanitize_callback'    => 'molongui_authorship_sanitize_setting',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Align', 'molongui-bump-offer' ),
						'description'     => __( '', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Image_Radio_Button_Control',
						'type'            => 'molongui-compact-image-radio',
						'choices'         => array
						(
							'left' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/text-align/text-align-left.png',
								'label'   => __( 'Left', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'center' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/text-align/text-align-center.png',
								'label'   => __( 'Center', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'right' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/text-align/text-align-right.png',
								'label'   => __( 'Right', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'justify' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/text-align/text-align-justify.png',
								'label'   => __( 'Justify', 'molongui-bump-offer' ),
								'premium' => false,
							),
						),
						'input_attrs'     => array(),
						'allow_addition'  => false,
						'active_callback' => 'molongui_active_headline_setting',
					),
				),
				array
				(
					'id'      => $this->plugin->db_prefix.'_box[headline_text_color]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => 'inherit',
						'transport'            => 'postMessage',
						'validate_callback'    => '',
						'sanitize_callback'    => 'molongui_authorship_sanitize_setting',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Color', 'molongui-bump-offer' ),
						'description'     => __( '', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Color_Control',
						'type'            => 'molongui-compact-color',
						'choices'         => array(),
						'input_attrs'     => array
						(
							'premium' => !did_action( 'mbo_pro/loaded' ),
						),
						'allow_addition'  => false,
						'active_callback' => 'molongui_active_headline_setting',
					),
				),
				array
				(
					'id'      => $this->plugin->db_prefix.'_xxx[img_checkbox_setting_name]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => '',
						'transport'            => 'postMessage',
						'validate_callback'    => '',
						'sanitize_callback'    => 'molongui_order_bump_sanitize_setting',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Label', 'molongui-bump-offer' ),
						'description'     => __( 'Description.', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Image_Checkbox_Button_Control',
						'type'            => 'molongui-image-checkbox',
						'choices'         => array
						(
							'normal' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-normal.png',
								'label'   => __( 'Normal', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'bold' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-bold.png',
								'label'   => __( 'Bold', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'italic' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-italic.png',
								'label'   => __( 'Italic', 'molongui-bump-offer' ),
								'premium' => !did_action( 'mbo_pro/loaded' ),
							),
							'underline' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-underline.png',
								'label'   => __( 'Underline', 'molongui-bump-offer' ),
								'premium' => !did_action( 'mbo_pro/loaded' ),
							),
							'overline' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-overline.png',
								'label'   => __( 'Overline', 'molongui-bump-offer' ),
								'premium' => !did_action( 'mbo_pro/loaded' ),
							),
							'overunderline' => array
							(
								'image'   => $this->plugin->url.'fw/customizer/img/font-style/font-style-overunderline.png',
								'label'   => __( 'Overline and underline', 'molongui-bump-offer' ),
								'premium' => !did_action( 'mbo_pro/loaded' ),
							),
						),
						'input_attrs'     => array(),
						'allow_addition'  => false,
						'active_callback' => '',
					),
				),
				array
				(
					'id'      => $this->plugin->db_prefix.'_xxx[text_radio_setting_name]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => 'link',
						'transport'            => 'postMessage',
						'validate_callback'    => '',
						'sanitize_callback'    => 'molongui_order_bump_sanitize_setting',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Label', 'molongui-bump-offer' ),
						'description'     => __( 'Description.', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'Molongui_Customize_Text_Radio_Button_Control',
						'type'            => 'label',
						'choices'         => array
						(
							'1' => array
							(
								'label'   => __( 'Link', 'molongui-bump-offer' ),
								'premium' => false,
							),
							'0' => array
							(
								'label'   => __( 'No link',  'molongui-bump-offer' ),
								'premium' => !did_action( 'mbo_pro/loaded' ),
							),
						),
						'input_attrs'     => array
						(
							'premium' => !did_action( 'mbo_pro/loaded' ),
						),
						'allow_addition'  => false,
						'active_callback' => '',
					),
				),
				array
				(
					'id'      => $this->plugin->db_prefix.'_xxx[control_setting_name]',
					'display' => true,
					'setting' => array
					(
						'type'                 => 'option',
						'capability'           => 'manage_options',
						'default'              => __( 'About the author', 'molongui-bump-offer' ),
						'transport'            => 'postMessage',
						'validate_callback'    => '',
						'sanitize_callback'    => 'wp_filter_nohtml_kses',
						'sanitize_js_callback' => '',
						'dirty'                => false,
					),
					'control' => array
					(
						'label'           => __( 'Label', 'molongui-bump-offer' ),
						'description'     => __( 'Description.', 'molongui-bump-offer' ),
						'priority'        => 10,
						'class'           => 'WP_Customize_Control',
						'type'            => 'text',
						'choices'         => array(),
						'input_attrs'     => array
						(
							'premium'     => false,
							'placeholder' => __( 'Placeholder', 'molongui-bump-offer' ),
						),
						'allow_addition'  => false,
						'active_callback' => '',
					),
				),
			),
		),
	),
*/
);