<?php

use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Arr;
use IntroToursDP\Std\Core\Str;


define('DP_INTRO_TOURS_PRO_ONLY_CLASS', 'dpit-pro-only');
define('DP_INTRO_TOURS_SPACER', '<br>');
define('DP_INTRO_TOURS_PRO_ONLY_HIDDEN_CLASS', 'dpit-pro-only dpit-pro-only--hidden');
define('DP_INTRO_TOURS_PRO_ONLY_NO_EVENTS_CLASS', 'dpit-pro-only dpit-pro-only--no-event');
define('DP_INTRO_TOURS_PRO_POSTFIX', (!DP_INTRO_TOURS_IS_PRO ? ' (<span class="dpit-pro-postfix">PRO<span>)' : ''));
define('DP_INTRO_TOURS_PRODUCT_FEATURES_LINK_PRO_A_TAG', '<a href="' . DP_INTRO_TOURS_PRODUCT_FEATURES_LINK_PRO . '" target="_blank">' . __('check out the PRO version', 'dp-intro-tours') . '</a>');
define('DPIT_ADMIN_SETTINGS_LINK', Dp_Intro_Tours_Helper::get_plugin_settings_page_url() . '#dp_it_general_options-checkbox-admin_board_tour_en');

function dpit_acf_print_default_val($default_val)
{
	return DP_INTRO_TOURS_SPACER . __('default', 'dp-intro-tours') . ': ' . $default_val;
}

function dpit_init_acf_cfg()
{
	if (!function_exists('get_editable_roles')) {
		require_once ABSPATH . 'wp-admin/includes/user.php';
	}
	$editable_roles      = [];
	$editable_roles_data = get_editable_roles();
	if ($editable_roles_data) {
		foreach ($editable_roles_data as $key => $data) {
			$editable_roles[$key] = $data['name'];
		}
	}
	acf_add_local_field_group(
		[
			'key'                   => Dp_Intro_Tours_Helper::get_acf_root_key(),
			'title'                 => __('Tour Options', 'dp-intro-tours') . (DP_INTRO_TOURS_IS_PRO ? ' (PRO)' : ''),
			'fields'                => array_filter(
				[
					[
						// cspell:ignore field_5e4c8efdab990
						'key'               => 'field_5e4c8efdab990',
						'label'             => __('Activate', 'dp-intro-tours'),
						'name'              => 'intro_enabled',
						'type'              => 'true_false',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => 'acf-field--main',
							'id'    => '',
						],
						'message'           => __('When tour is deactivated, you can still edit it with visual builder, however it is not executed for public.', 'dp-intro-tours'),
						'default_value'     => '0',
						'ui'                => 1,
						'ui_on_text'        => __('Active', 'dp-intro-tours'),
						'ui_off_text'       => __('Inactive', 'dp-intro-tours'),
					],

					dpit_get_acf_design_config(Dp_Intro_Tours_Helper::get_themes_select_options(false)),
					dpit_get_acf_properties_config(),
					dpit_get_acf_trigger_config(0, $editable_roles),

					[
						// cspell:ignore field_6e5c8efdcfc27
						'key'               => 'field_6e5c8efdcfc27',
						'label'             => __('Additional trigger', 'dp-intro-tours') . DP_INTRO_TOURS_PRO_POSTFIX,
						'name'              => 'add_additional_trigger',
						'type'              => 'true_false',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => 'acf-field--main ' . DP_INTRO_TOURS_PRO_ONLY_CLASS,
							'id'    => '',
						],
						'message'           => __('Add second trigger so you can combine their settings and cover huge amount of use cases. E.g. run automatically but just in case of first visit of particular user together with starting when an info button is pressed.', 'dp-intro-tours'),
						'default_value'     => 0,
						'ui'                => 1,
						'ui_on_text'        => __('Enabled', 'dp-intro-tours'),
						'ui_off_text'       => __('Disabled', 'dp-intro-tours'),
					],
					DP_INTRO_TOURS_IS_PRO ? dpit_get_acf_trigger_config(1, $editable_roles) : null,
					[
						// cspell:ignore field_5e4c8efdcfc17
						'key'               => 'field_5e4c8efdcfc17',
						'label'             => __('Steps', 'dp-intro-tours'),
						'name'              => 'intro_steps',
						'type'              => 'table',
						'instructions'      => __('Define Your tour step by step', 'dp-intro-tours'),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => 'acf-field--no-info-icon acf-field--main',
							'id'    => '',
						],
						'use_header'        => 1,
						'use_caption'       => 2,
					],
					dpit_get_acf_labeling_config(),
					dpit_get_acf_url_vars_config(),
				]
			),
			'location'              => [
				[
					[
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'dp_intro_tours',
					],
				],
			],
			'menu_order'            => 0,
			'position'              => 'acf_after_title',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
		]
	);

	dpit_init_acf_cfg_helper();
}

function dpit_init_acf_cfg_helper()
{
	acf_add_local_field_group(
		[
			'key'                   => 'group_5e4c5f78c342c',
			'title'                 => 'Intro tour - helper',
			'fields'                => [
				[
					// cspell:ignore field_5a4c6efdb55d2
					'key'               => 'field_5a4c6efdb55d2',
					'label'             => 'Steps url unified',
					'name'              => 'steps_url_unified_serialized',
					'type'              => 'textarea',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '100',
						'class' => 'acf-field--no-info-icon',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => '',
					'maxlength'         => '',
					'rows'              => '',
					'new_lines'         => '',
				],
				[
					'key'               => 'field_5f7795cf760c7',
					'label'             => __('Start URL count', 'dp-intro-tours'),
					'name'              => 'start_url_cnt',
					'type'              => 'number',
					'instructions'      => __('Defines how many start urls the tour has', 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => 1,
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'min'               => 0,
					'max'               => PHP_INT_MAX,
					'step'              => 1,
				],
				[
					// cspell:ignore field_5a4c6eedb55d2
					'key'               => 'field_5a4c6eedb55d2',
					'label'             => 'Steps url relative',
					'name'              => 'steps_url_relative_serialized',
					'type'              => 'textarea',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '100',
						'class' => 'acf-field--no-info-icon',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => '',
					'maxlength'         => '',
					'rows'              => '',
					'new_lines'         => '',
				],
				[
					// cspell:ignore field_5e4c8efdb55d2
					'key'               => 'field_5e4c8efdb55d2',
					'label'             => 'Plugin version',
					'name'              => 'plugin_version',
					'type'              => 'text',
					'instructions'      => 'Store version of plugin which updated current intro tour last time.',
					'required'          => 0,
					'conditional_logic' => '',
					'wrapper'           => [
						'width' => '',
						'class' => 'acf-field--no-info-icon',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				],
			],
			'location'              => [
				[
					[
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'dp_intro_tours',
					],
				],
			],
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => DP_INTRO_TOURS_DP_ADMIN_DEBUG_EN,
			'description'           => '',
		]
	);
}

function dpit_get_acf_cfg_trigger_choices()
{
	$res = [
		'click'       => __('Mouse click', 'dp-intro-tours'),
		'mousedown'   => __('Press mouse button', 'dp-intro-tours'),
		'mouseup'     => __('Release mouse button', 'dp-intro-tours'),
		'dblclick'    => __('Mouse double-click', 'dp-intro-tours'),
		'mouseover'   => __('Mouse hover over element', 'dp-intro-tours'),
		'mousewheel'  => __('Mouse wheel action', 'dp-intro-tours'),
		'mouseout'    => __('Mouse cursor leaving the element', 'dp-intro-tours'),
		'contextmenu' => __('Context menu open', 'dp-intro-tours'),
		'inviewport'  => __('Element is scrolled in viewport', 'dp-intro-tours'),
		'touchstart'  => __('Touch start', 'dp-intro-tours'),
		'touchmove'   => __('Touch move', 'dp-intro-tours'),
		'touchend'    => __('Touch end', 'dp-intro-tours'),
		'touchcancel' => __('Touch cancel', 'dp-intro-tours'),
		'keydown'     => __('Keyboard key down', 'dp-intro-tours'),
		'keypress'    => __('Keyboard key press', 'dp-intro-tours'),
		'keyup'       => __('Keyboard key up', 'dp-intro-tours'),
		'focus'       => __('Form become focused', 'dp-intro-tours'),
		'blur'        => __('Form lose focus', 'dp-intro-tours'),
		'change'      => __('Form changed (typing ... )', 'dp-intro-tours'),
		'submit'      => __('Form was submitted', 'dp-intro-tours'),
	];
	return array_filter($res);
}


function dpit_get_editable_roles()
{
	global $wp_roles;

	$all_roles      = $wp_roles->roles;
	$editable_roles = apply_filters('editable_roles', $all_roles);

	return $editable_roles;
}

function dpit_get_acf_trigger_config($idx = 0, $editable_roles = [])
{
	$trigger_object_page_is_defined_text = (DP_INTRO_TOURS_IS_PRO)
		? __('The page is defined by Page/Post/CPT URL of the first intro step in STEPS table.', 'dp-intro-tours')
		: __('The page is defined by Page/Post/CPT URL option above.', 'dp-intro-tours');

	$mobile_breakpoint      = Dp_Intro_Tours_Helper::get_mobile_breakpoint_val();
	$is_admin_board_tour_en = Settings::get_setting_array_field('dp_it_general_options', 'admin_board_tour_en', '0') === '1';
	$query_params_defs      = Dp_Intro_Tours_Helper::get_dp_intro_query_params(false);

	$res = [
		// cspell:ignore field_5e4c8efdabd76 field_6e4c8efdabd76
		'key'               => $idx === 0 ? 'field_5e4c8efdabd76' : 'field_6e4c8efdabd76',
		'label'             => $idx === 0 ? __('Trigger', 'dp-intro-tours') : __('Trigger 2', 'dp-intro-tours'),
		'name'              => $idx === 0 ? 'intro_trigger' : 'intro_trigger_2',
		'type'              => 'group',
		'instructions'      => __('Defines where and how this tour will start', 'dp-intro-tours'),
		'required'          => 0,
		'conditional_logic' => $idx === 0 ? '' : [
			[
				[
					'field'    => 'field_6e5c8efdcfc27',
					'operator' => '!=',
					'value'    => 0,
				],
			],
		],
		'wrapper'           => [
			'width' => '',
			'class' => '',
			'id'    => '',
		],
		'layout'            => 'block',
		'sub_fields'        => array_filter(
			[
				[
					// cspell:ignore field_2e4c8efdb51e3 field_2e4c8efeb51e3
					'key'               => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
					'label'             => __('Mode', 'dp-intro-tours'),
					'name'              => 'trigger_mode',
					'type'              => 'radio',
					'instructions'      => __('Specifies when to start the tour:', 'dp-intro-tours')
						. DP_INTRO_TOURS_SPACER . ' • ' . __('PAGE LOAD: start the tour after the page loads', 'dp-intro-tours') . ' ' . $trigger_object_page_is_defined_text
						. DP_INTRO_TOURS_SPACER . ' • ' . __('BUTTON CLICK: start when defined button is clicked - button defined visually by our frontend builder or manually as CSS selector', 'dp-intro-tours')
						. DP_INTRO_TOURS_SPACER . ' • ' . __('ELEMENT IN VIEW: start when defined element appears in the viewport - element defined visually by our frontend builder or manually as CSS selector', 'dp-intro-tours')
						. DP_INTRO_TOURS_SPACER . ' • ' . __('ADVANCED: opens advanced options', 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'choices'           => [
						'pageLoad'      => __('Page load', 'dp-intro-tours'),
						'button'        => __('Button click', 'dp-intro-tours'),
						'elementInView' => __('Element in view', 'dp-intro-tours'),
						'advanced'      => __('Advanced', 'dp-intro-tours'),
					],
					'allow_null'        => 0,
					'other_choice'      => 0,
					'default_value'     => $idx === 0 ? 'pageLoad' : 'button',
					'layout'            => 'horizontal',
					'return_format'     => 'value',
					'save_other_choice' => 0,
				],
				[
					// cspell:ignore field_5e4c8efdb51e3 field_6e4c8efdb51e3
					'key'               => $idx === 0 ? 'field_5e4c8efdb51e3' : 'field_6e4c8efdb51e3',
					'label'             => __('Mode - Advanced', 'dp-intro-tours'),
					'name'              => 'trigger_object',
					'type'              => 'radio',
					'instructions'      => __('Specifies the type of trigger:', 'dp-intro-tours')
						. DP_INTRO_TOURS_SPACER . ' • ' . __('WINDOW: page load, window resize etc.', 'dp-intro-tours')
						. ' ' . $trigger_object_page_is_defined_text
						. DP_INTRO_TOURS_SPACER . ' • ' . __("CUSTOM ELEMENT: e.g. '.button or #btn' ( defined manually as css selector or visually by our frontend builder).", 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
								'operator' => '==',
								'value'    => 'advanced',
							],
						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'choices'           => [
						'page'            => __('Window event', 'dp-intro-tours'),
						'custom_selector' => __('Custom element event', 'dp-intro-tours'),
					],
					'allow_null'        => 0,
					'other_choice'      => 0,
					'default_value'     => $idx === 0 ? 'page' : 'custom_selector',
					'layout'            => 'horizontal',
					'return_format'     => 'value',
					'save_other_choice' => 0,
				],
				[
					'key'               => $idx === 0 ? 'field_5e4dcb233ca1a' : 'field_6e4dcb233ca1a',
					'label'             => __('Once per page load', 'dp-intro-tours'),
					'name'              => 'once_per_session_only',
					'type'              => 'true_false',
					'instructions'      => __("E.g. if 'Event' is set as 'Element is scrolled in viewport', tour won't start, when element is scrolled in view for second time, after previous tour has finished.", 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_5e4c8efdb51e3' : 'field_6e4c8efdb51e3',
								'operator' => '!=',
								'value'    => 'page',
							],
							[
								'field'    => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
								'operator' => '==',
								'value'    => 'advanced',
							],
						],
						[
							[
								// cspell:ignore field_5e4c8efdb5d9f field_6e4c8efdb5d9f
								'field'    => $idx === 0 ? 'field_5e4c8efdb5d9f' : 'field_6e4c8efdb5d9f',
								'operator' => '!=',
								'value'    => 'load',
							],
							[
								'field'    => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
								'operator' => '==',
								'value'    => 'advanced',
							],
						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'message'           => __('Run intro tour only once during current webpage load.', 'dp-intro-tours'),
					'default_value'     => 0,
					'ui'                => 1,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				],
				[
					'key'               => $idx === 0 ? 'field_5e4c8efdb5d9f' : 'field_6e4c8efdb5d9f',
					'label'             => __('Window event', 'dp-intro-tours'),
					'name'              => 'intro_trigger_event_window',
					'type'              => 'select',
					'instructions'      => __('Defines the type of event that is used as a trigger on "window" object. (page load, page scroll, window resize)', 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_5e4c8efdb51e3' : 'field_6e4c8efdb51e3',
								'operator' => '==',
								'value'    => 'page',
							],
							[
								'field'    => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
								'operator' => '==',
								'value'    => 'advanced',
							],
						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'choices'           => [
						'load'   => __('Page load', 'dp-intro-tours'),
						'scroll' => __('Page scroll', 'dp-intro-tours'),
						'resize' => __('Page resize', 'dp-intro-tours'),
					],
					'default_value'     => 'load',
					'allow_null'        => 0,
					'multiple'          => 0,
					'ui'                => 0,
					'ajax'              => 0,
					'return_format'     => 'value',
					'placeholder'       => '',
				],
				[
					// cspell:ignore field_5e4c8efdb59b4 field_6e4c8efdb59b4
					'key'               => $idx === 0 ? 'field_5e4c8efdb59b4' : 'field_6e4c8efdb59b4',
					'label'             => __('Custom element event', 'dp-intro-tours'),
					'name'              => 'intro_trigger_event',
					'type'              => 'select',
					'instructions'      => __('Defines the type of event that is used as a starter (on specified element by Selector field above)', 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_5e4c8efdb51e3' : 'field_6e4c8efdb51e3',
								'operator' => '!=',
								'value'    => 'page',
							],
							[
								'field'    => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
								'operator' => '==',
								'value'    => 'advanced',
							],
						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'choices'           => dpit_get_acf_cfg_trigger_choices(),
					'default_value'     => 'click',
					'allow_null'        => 0,
					'multiple'          => 0,
					'ui'                => 0,
					'ajax'              => 0,
					'return_format'     => 'value',
					'placeholder'       => '',
				],
				[
					'key'               => $idx === 0 ? 'field_5e4e67f65130f' : 'field_6e4e47f65230f',
					'label'             => __('Code of pressed key', 'dp-intro-tours'),
					'name'              => 'specific_key_pressed',
					'type'              => 'number',
					'instructions'      => __("Code of keyboard key, that needs to be pressed to activate trigger. Default empty or '0' -> all keys activate trigger. You can find your keycode here: ", 'dp-intro-tours') . '<a href="https://www.w3.org/2002/09/tests/keys.html" target="_blank">Keycode info</a>',
					'required'          => 0,
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_5e4c8efdb59b4' : 'field_6e4c8efdb59b4',
								'operator' => '==',
								'value'    => 'keydown',
							],
						],
						[
							[
								'field'    => $idx === 0 ? 'field_5e4c8efdb59b4' : 'field_6e4c8efdb59b4',
								'operator' => '==',
								'value'    => 'keypress',
							],
						],
						[
							[
								'field'    => $idx === 0 ? 'field_5e4c8efdb59b4' : 'field_6e4c8efdb59b4',
								'operator' => '==',
								'value'    => 'keyup',
							],
						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => 'acf-field--ia acf-field--key-code',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => __('Keyboard key code', 'dp-intro-tours'),
					'prepend'           => '',
					'append'            => '',
					'min'               => 0,
					'max'               => '',
					'step'              => '',
				],
				[
					// cspell:ignore field_5e4c8efdb55d0 field_6e4c8efdb55d0
					'key'               => $idx === 0 ? 'field_5e4c8efdb55d0' : 'field_6e4c8efdb55d0',
					'label'             => __('Element', 'dp-intro-tours'),
					'name'              => 'intro_trigger_selector',
					'type'              => 'text',
					'instructions'      => __('CSS selector of the element (button) that is responsible for initiating this tour.', 'dp-intro-tours')
						. ' <a href="https://www.w3schools.com/cssref/css_selectors" target="_blank">' . __('CSS Selector Reference', 'dp-intro-tours') . '</a>',
					'required'          => 0,
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_5e4c8efdb51e3' : 'field_6e4c8efdb51e3',
								'operator' => '!=',
								'value'    => 'page',
							],
							[
								'field'    => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
								'operator' => '!=',
								'value'    => 'pageLoad',
							],
						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => 'acf-field--ia',
						'id'    => 'dpit-trigger-selector-' . $idx,
					],
					'default_value'     => '',
					'placeholder'       => __('CSS selector E.g. #button-wrap-id .button-class', 'dp-intro-tours'),
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				],
				[
					'key'               => $idx === 0 ? 'field_5e4e67f65230f' : 'field_6e4e67f65230f',
					'label'             => __('In view port offset', 'dp-intro-tours'),
					'name'              => 'in_view_port_offset',
					'type'              => 'number',
					'instructions'      => __("By default, the tour starts when the top of the element hits the top of the window. But what if we want to start a tour when the element is, for example, 20px from above? Just use this option and set a number without 'px' or '%'. The unit is selected in the field below.", 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_5e4c8efdb59b4' : 'field_6e4c8efdb59b4',
								'operator' => '==',
								'value'    => 'inviewport',
							],
						],
						[
							[
								'field'    => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
								'operator' => '==',
								'value'    => 'elementInView',
							],
						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => 0,
					'placeholder'       => __('Offset in pixels or %', 'dp-intro-tours'),
					'prepend'           => '',
					'append'            => '',
					'min'               => '',
					'max'               => '',
					'step'              => '',
				],
				[
					'key'               => $idx === 0 ? 'field_5e4e697552310' : 'field_6e4e697552310',
					'label'             => __('In view port offset unit', 'dp-intro-tours'),
					'name'              => 'in_view_port_offset_unit',
					'type'              => 'radio',
					'instructions'      => __('Specifies unit of In View Port Offset option.', 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_5e4c8efdb59b4' : 'field_6e4c8efdb59b4',
								'operator' => '==',
								'value'    => 'inviewport',
							],
						],
						[
							[
								'field'    => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
								'operator' => '==',
								'value'    => 'elementInView',
							],
						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'choices'           => [
						''  => 'px',
						'%' => '%',
					],
					'allow_null'        => 0,
					'other_choice'      => 0,
					'default_value'     => 'px',
					'layout'            => 'horizontal',
					'return_format'     => 'value',
					'save_other_choice' => 0,
				],
				[
					// cspell:ignore field_5e4c8ef1b4a15 field_6e4c4efdb4a15
					'key'               => $idx === 0 ? 'field_5e4c8ef1b4a15' : 'field_6e4c4efdb4a15',
					'label'             => __('Allow the visitor to skip this tour for future visits', 'dp-intro-tours'),
					'name'              => 'allow_future_visits_checkbox',
					'type'              => 'true_false',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
								'operator' => '!=',
								'value'    => 'button',
							],

						],
					],
					'default_value'     => 1,
					'ui'                => 1,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				],
				[
					// cspell:ignore field_5e4c8efdb4a15 field_6e4c8efdb4a15
					'key'               => $idx === 0 ? 'field_5e4c8efdb4a15' : 'field_6e4c8efdb4a15',
					'label'             => __('Run tour only N-times', 'dp-intro-tours'),
					'name'              => 'first_user_visit_only',
					'type'              => 'true_false',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
								'operator' => '!=',
								'value'    => 'button',
							],

						],
					],
					'message'           => __("Enables the feature: Run an initial tour only on a user's first visits", 'dp-intro-tours'),
					'default_value'     => 0,
					'ui'                => 1,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				],
				[
					'key'               => $idx === 0 ? 'field_5e4e6af65230f' : 'field_6e3367f65230f',
					'label'             => __('First N visits only', 'dp-intro-tours'),
					'name'              => 'first_n_user_visit',
					'type'              => 'number',
					'instructions'      => __("Run an initial tour only on a specified count of a user's first visits", 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_5e4c8efdb4a15' : 'field_6e4c8efdb4a15',
								'operator' => '==',
								'value'    => 1,
							],
						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => 1,
					'placeholder'       => __('First N visits', 'dp-intro-tours'),
					'prepend'           => '',
					'append'            => '',
					'min'               => 1,
					'max'               => '',
					'step'              => '',
				],
				[
					// cspell:ignore field_5e4c8efab4a15 field_6e4c8bfdb4a15
					'key'               => $idx === 0 ? 'field_5e4c8efab4a15' : 'field_6e4c8bfdb4a15',
					'label'             => __('Where are the tour visits calculated for logged-in users?', 'dp-intro-tours'),
					'name'              => 'visit_count_mode',
					'type'              => 'radio',
					'instructions'      => ' • ' . __('Server: Calculate the number of visits across devices for logged-in users', 'dp-intro-tours')
						. DP_INTRO_TOURS_SPACER . ' • ' . __('Browser: Calculate the number of visits in the browser, i.e. not across devices for logged-in users', 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_2e4c8efdb51e3' : 'field_2e4c8efeb51e3',
								'operator' => '!=',
								'value'    => 'button',
							],
							[
								'field'    => $idx === 0 ? 'field_5e4c8efdb4a15' : 'field_6e4c8efdb4a15',
								'operator' => '==',
								'value'    => 1,
							],

						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'choices'           => [
						'server'      => __('Server', 'dp-intro-tours'),
						'browser'        => __('Browser', 'dp-intro-tours'),
					],
					'allow_null'        => 0,
					'other_choice'      => 0,
					'default_value'     => 'server',
					'layout'            => 'horizontal',
					'return_format'     => 'value',
					'save_other_choice' => 0,
				],
				[
					'key'               => $idx === 0 ? 'field_5e56b493fb1b9' : 'field_6e56b493fb1b9',
					'label'             => __('Lock by URL parameter', 'dp-intro-tours') . DP_INTRO_TOURS_PRO_POSTFIX,
					'name'              => 'lock_by_url_parameter',
					'type'              => 'true_false',
					'instructions'      => __('You can send intro tour invitation to specific person only by sending a tour start URL with an unlock parameter', 'dp-intro-tours')
						. DP_INTRO_TOURS_SPACER
						. __('E.g. for tour starting on the home page:', 'dp-intro-tours') . ' www.your-home-page-address.com/?<strong>' . Dp_Intro_Tours_Helper::set_dp_url_param('dp_qp_lock', $query_params_defs, 'Your Unlock Key', false) . '</strong>' // dp_to_check
						. DP_INTRO_TOURS_SPACER
						. __('If you want the tour to start as soon as the visitor clicks on the link sent to them, then set options Mode = Whole Page and Page Event = Page load.', 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => DP_INTRO_TOURS_PRO_ONLY_CLASS,
						'id'    => '',
					],
					'message'           => '',
					'default_value'     => 0,
					'ui'                => 1,
					'ui_on_text'        => __('Locked', 'dp-intro-tours'),
					'ui_off_text'       => __('Unlocked', 'dp-intro-tours'),
				],
				[
					// cspell:ignore field_6e4c2eedb15d0 field_6eec2eed515d0
					'key'               => $idx === 0 ? 'field_6e4c2eedb15d0' : 'field_6eec2eed515d0',
					'label'             => __('Unlock key', 'dp-intro-tours'),
					'name'              => 'intro_tour_key_unlock',
					'type'              => 'text',
					'instructions'      => sprintf(
						// translators: %s: url parameter as a key
						__('Defines a URL key to unlock the tour for selected users only. The tour only starts for users to whom you submit a URL with a key in the form of the %s parameter.', 'dp-intro-tours'),
						'<strong>' . Dp_Intro_Tours_Helper::set_dp_url_param('dp_qp_lock', $query_params_defs, 'Your Unlock Key', false) . '</strong>'
					),
					'required'          => 0,
					'conditional_logic' => [
						[
							[
								'field'    => $idx === 0 ? 'field_5e56b493fb1b9' : 'field_6e56b493fb1b9',
								'operator' => '==',
								'value'    => '1',
							],
						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => DP_INTRO_TOURS_PRO_ONLY_HIDDEN_CLASS,
						'id'    => '',
					],
					'default_value'     => 'my_url_key_12345',
					'placeholder'       => __('my_url_key_12345', 'dp-intro-tours'),
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				],
				[
					'key'               => $idx === 0 ? 'field_5e52b493fb1f9' : 'field_5e56b493cb1f9',
					'label'             => __('Allow just for logged-in users', 'dp-intro-tours'),
					'name'              => 'allow_just_for_logged_in_users',
					'type'              => 'true_false',
					'instructions'      => __('Enable this setting if you want to run the tour ONLY for logged in / registered users. It works together with', 'dp-intro-tours') . ' <strong>' . __('First N Visits Only', 'dp-intro-tours') . '</strong> ' . __('option and counts logged in visits separately.', 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'message'           => '',
					'default_value'     => 0,
					'ui'                => 1,
					'ui_on_text'        => __('On', 'dp-intro-tours'),
					'ui_off_text'       => __('Off', 'dp-intro-tours'),
				],
				[
					// cspell:ignore field_61faad1aa7efe field_61aaad1aa7efe
					'key'               => $idx === 0 ? 'field_61faad1aa7efe' : 'field_61aaad1aa7efe',
					'label'             => __('Disable for user roles', 'dp-intro-tours'),
					'name'              => 'disable_for_roles',
					'type'              => 'select',
					'instructions'      => __('Select user roles, where the tour should not start. You can make multiple choices', 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => 0, /*[
						[
							[
								'field'    => $idx === 0 ? 'field_5e52b493fb1f9' : 'field_5e56b493cb1f9',
								'operator' => '==',
								'value'    => '1',
							],
						],
					]*/
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'choices'           => $editable_roles,
					'default_value'     => '',
					'allow_null'        => 0,
					'multiple'          => 1,
					'ui'                => 0,
					'ajax'              => 0,
					'return_format'     => 'value',
					'placeholder'       => '',
				],
				[
					'key'               => $idx === 0 ? 'field_5e52b4935b1f9' : 'field_5ea6b493cb1f9',
					'label'             => __('Enable for mobile phones', 'dp-intro-tours') . DP_INTRO_TOURS_PRO_POSTFIX,
					'name'              => 'allow_for_mobile',
					'type'              => 'true_false',

					'instructions'      => sprintf(
						// translators: %d: screen width in pixels
						__('To disable the tour for mobile phones with a screen width of less then or equal to %d pixels, turn off this setting. You can adjust the mobile screen width limit in the global settings of the plugin.', 'dp-intro-tours'),
						$mobile_breakpoint
					),
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => DP_INTRO_TOURS_PRO_ONLY_CLASS,
						'id'    => '',
					],
					'message'           => '',
					'default_value'     => 1,
					'ui'                => 1,
					'ui_on_text'        => __('On', 'dp-intro-tours'),
					'ui_off_text'       => __('Off', 'dp-intro-tours'),
				],
				[
					'key'               => $idx === 0 ? 'field_5e52b4915b1f9' : 'field_5ea62493cb1f9',
					'label'             => __('Enable for wide screens', 'dp-intro-tours') . DP_INTRO_TOURS_PRO_POSTFIX,
					'name'              => 'allow_for_wide_screens',
					'type'              => 'true_false',
					// translators: %d: screen width in pixels
					'instructions'      => sprintf(__('To disable the tour for devices with a screen larger than %d pixels, turn off this setting. You can adjust the mobile screen width limit in the global settings of the plugin.', 'dp-intro-tours'), $mobile_breakpoint),
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => DP_INTRO_TOURS_PRO_ONLY_CLASS,
						'id'    => '',
					],
					'message'           => '',
					'default_value'     => 1,
					'ui'                => 1,
					'ui_on_text'        => __('On', 'dp-intro-tours'),
					'ui_off_text'       => __('Off', 'dp-intro-tours'),
				],
				($idx === 0) ? [
					'key'               => 'field_5e56b493fb1f9',
					'label'             => __('Start this tour everywhere', 'dp-intro-tours') . DP_INTRO_TOURS_PRO_POSTFIX,
					'name'              => 'global_start_at_all_pages',
					'type'              => 'true_false',
					// translators: %s: tours enabled on the admin board area link
					'instructions'      => sprintf(__('To start this tour on all URLs of this site, turn this setting on. If you have %s, all admin pages will also be included unless you set on option below.', 'dp-intro-tours'), '<a href="' . DPIT_ADMIN_SETTINGS_LINK . '">' . __('tours enabled on the admin board area', 'dp-intro-tours') . '</a>')
						. DP_INTRO_TOURS_SPACER
						. __('ADVANCED: You can filter where to start by your custom code with our', 'dp-intro-tours')
						. ' <a href="' . DP_INTRO_TOURS_API_DOC . '" target="_blank">'
						. __('API ( PHP & JS )', 'dp-intro-tours')
						. '</a>',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => DP_INTRO_TOURS_PRO_ONLY_CLASS . ((DP_INTRO_TOURS_IS_PRO || true) ? ' acf-field--ia' : ''),
						'id'    => '',
					],
					'message'           => '',
					'default_value'     => 0,
					'ui'                => 1,
					'ui_on_text'        => __('On', 'dp-intro-tours'),
					'ui_off_text'       => __('Off', 'dp-intro-tours'),
				] : null,
				($idx === 0 && $is_admin_board_tour_en) ? [
					'key'               => 'field_5e56b493ff1f9',
					'label'             => __('Exclude admin board area from "Start this tour everywhere"', 'dp-intro-tours') . DP_INTRO_TOURS_PRO_POSTFIX,
					'name'              => 'dpit_start_everywhere_no_admin',
					'type'              => 'true_false',
					'instructions'      => __('To start this tour only on all public URLs of this site, turn this setting on. The tour will then not start on the admin board', 'dp-intro-tours'),
					'required'          => 0,
					'conditional_logic' => [
						[
							'field'    => 'field_5e56b493fb1f9',
							'operator' => '==',
							'value'    => '1',
						],
					],
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'message'           => '',
					'default_value'     => 0,
					'ui'                => 1,
					'ui_on_text'        => __('On', 'dp-intro-tours'),
					'ui_off_text'       => __('Off', 'dp-intro-tours'),
				] : null,
				(!DP_INTRO_TOURS_IS_PRO && $idx === 0) ? [
					'key'               => 'field_5e4aec4c9c300',
					'label'             => __('Pages / posts / CPTs', 'dp-intro-tours') . ' / ' . ((!DP_INTRO_TOURS_IS_PRO) ? '<a class="' . DP_INTRO_TOURS_PRO_ONLY_CLASS . '">' : '') . __('Variable URL', 'dp-intro-tours') . DP_INTRO_TOURS_PRO_POSTFIX . ((!DP_INTRO_TOURS_IS_PRO) ? '</a>' : ''),
					'name'              => 'intro_related_posts',
					'type'              => 'page_link',
					'instructions'      => __('Defines the pages / posts / CPTs where the introductory tour should start.', 'dp-intro-tours')
						. ((!DP_INTRO_TOURS_IS_PRO) ? DP_INTRO_TOURS_SPACER . __('To run it on other custom types, or use variable url eg. run at all product pages:', 'dp-intro-tours')
							. DP_INTRO_TOURS_SPACER . '<em>/product/{product-id}</em>' . DP_INTRO_TOURS_SPACER . __('please', 'dp-intro-tours')
							. ' ' . DP_INTRO_TOURS_PRODUCT_FEATURES_LINK_PRO_A_TAG : ''),
					'required'          => 0,
					'conditional_logic' => DP_INTRO_TOURS_IS_PRO ? [
						[
							[
								'field'    => 'field_5e56b493fb1f9',
								'operator' => '==',
								'value'    => '0',
							],
						],
					] : 0,
					'wrapper'           => [
						'width' => '',
						'class' => DP_INTRO_TOURS_IS_PRO ? '' : 'acf-field--ia',
						'id'    => '',
					],
					'post_type'         => /*! DP_INTRO_TOURS_IS_PRO ? [
						0 => 'post',
						1 => 'page',
						2 => 'product',
					] : */ null,
					'taxonomy'          => '',
					'allow_null'        => 0,
					'allow_archives'    => 0,
					'multiple'          => 1,
				] : null,
			]
		),
	];
	return $res;
}

function dpit_get_acf_properties_config()
{
	return [
		'key'               => 'field_5f77156b760c6',
		'label'             => __('Properties', 'dp-intro-tours'),
		'name'              => 'dp_tour_behaviour',
		'type'              => 'group',
		'instructions'      => __('Adjusts tour\'s properties.', 'dp-intro-tours'),
		'required'          => 0,
		'conditional_logic' => 0,
		'wrapper'           => [
			'width' => '',
			'class' => '',
			'id'    => '',
		],
		'layout'            => 'block',
		'sub_fields'        => [

			[
				'key'               => 'field_5f74566bbe6e9',
				'label'             => __('Show bullet navigation', 'dp-intro-tours'),
				'name'              => 'show_bullet_navigation',
				'type'              => 'true_false',
				'instructions'      => __('Turn this setting off to hide bullet navigation feature for this tour', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 1,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f74566bbe6e7',
				'label'             => __('Show progress bar', 'dp-intro-tours'),
				'name'              => 'show_progress_bar',
				'type'              => 'true_false',
				'instructions'      => __('Turn this setting off to hide progress bar feature for this tour', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => [
					[
						[
							'field'    => 'field_5f26bc465c86e',
							'operator' => '!=',
							'value'    => 'sticky',
						],
					],
				],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f74566bbe6e1',
				'label'             => __('Show step numbers', 'dp-intro-tours'),
				'name'              => 'show_step_numbers',
				'type'              => 'true_false',
				'instructions'      => __('Turn this setting off to hide step number badges for this tour', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 1,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f778e9eb36e4',
				'label'             => __('Disable bullet navigation', 'dp-intro-tours'),
				'name'              => 'disable_navigation_by_bullets',
				'type'              => 'true_false',
				'instructions'      => __('When this setting is on, visitor can\'t navigate to intro steps by click on navigational bullets in intro tooltip.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f74566bbe6e2',
				'label'             => __('Disable exit on overlay click', 'dp-intro-tours'),
				'name'              => 'disable_exit_on_backdrop_click',
				'type'              => 'true_false',
				'instructions'      => __('Turn this setting on to disable the end of the tour when the user clicks on the overlay.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 1,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f77379ebe6e4',
				'label'             => __('Increment step after reload', 'dp-intro-tours') . DP_INTRO_TOURS_PRO_POSTFIX,
				'name'              => 'increment_step_after_reload',
				'type'              => 'true_false',
				'instructions'      => __('Submission of non-AJAX forms support.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => DP_INTRO_TOURS_PRO_ONLY_CLASS,
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f77a79ebe6e4',
				'label'             => __('Skip absent target elements', 'dp-intro-tours'),
				'name'              => 'skip_absent_ref_el',
				'type'              => 'true_false',
				'instructions'      => __('Skip a step whose target element is not in the page\'s DOM.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f77379abe6e4',
				'label'             => __('Strict URL parameters compare', 'dp-intro-tours') . DP_INTRO_TOURS_PRO_POSTFIX,
				'name'              => 'strict_url_compare',
				'type'              => 'true_false',
				'instructions'      => __('If On, the URLs of the next step are strictly compared - query parameters included. It reloads between 2 steps with the same URL but different query parameters.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => DP_INTRO_TOURS_PRO_ONLY_CLASS,
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 1,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f77879abe6e4',
				'label'             => Dp_Intro_Tours_Helper::get_generic_i18n('allow_redirect_to_ext') . DP_INTRO_TOURS_PRO_POSTFIX,
				'name'              => 'allow_redirect_to_extraneous_url',
				'type'              => 'true_false',
				'instructions'      => __("If On, you can configure step's url as an extraneous and it won't be blocked.", 'dp-intro-tours')
					. DP_INTRO_TOURS_SPACER . __('Of course this has a sense only for a last step as after such a redirection tours ends.', 'dp-intro-tours')
					. DP_INTRO_TOURS_SPACER . __('In this way you can create cross domain tour, if you configure starting of tour at your other owned domain or you can just redirect visitor at the and of the tour to extraneous url from whatever reason.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => DP_INTRO_TOURS_PRO_ONLY_CLASS,
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f773e9eb36e4',
				'label'             => __('Hide previous step button', 'dp-intro-tours'),
				'name'              => 'hide_previous_step_button',
				'type'              => 'true_false',
				'instructions'      => __('Hide previous step button (web app and dynamic links support, where previous doesn\'t work)', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f773e4eb36e4',
				'label'             => __('Hide skip tour button', 'dp-intro-tours'),
				'name'              => 'hide_skip_button',
				'type'              => 'true_false',
				'instructions'      => __('Hide button for exiting of the tour.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f7754e7be6e3',
				'label'             => __('Disable running bullets animation', 'dp-intro-tours'),
				'name'              => 'disable_starting_animation',
				'type'              => 'true_false',
				'instructions'      => __('Disable running bullets animation in the beginning of thr tour and in case of redirection to other page in PRO.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f7795ca760c7',
				'label'             => __('Animation: total size [ vw ]', 'dp-intro-tours'),
				'name'              => 'bullet_anim_size',
				'type'              => 'number',
				'instructions'      => __('Adjust the size of the bullet animation container: 20 - 90 vw ( % from actual window width )', 'dp-intro-tours') . dpit_acf_print_default_val('30vw'),
				'required'          => 0,
				'conditional_logic' => [
					[
						[
							'field'    => 'field_5f7754e7be6e3',
							'operator' => '==',
							'value'    => '0',
						],
					],
				],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => 30,
				'placeholder'       => '30 vw',
				'prepend'           => '',
				'append'            => '',
				'min'               => 20,
				'max'               => 90,
				'step'              => 1,
			],
			[
				'key'               => 'field_5f77a5ca760c7',
				'label'             => __('Animation: bullet radius [ % ]', 'dp-intro-tours'),
				'name'              => 'bullet_anim_border_radius',
				'type'              => 'number',
				'instructions'      => __('Adjust rounding of bullet in animation: 0 - 50% of the bullet size', 'dp-intro-tours') . DP_INTRO_TOURS_SPACER . ' • ' . __('50% = circle shape ( default )', 'dp-intro-tours') . DP_INTRO_TOURS_SPACER . ' • ' . __('0% = squared shape', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => [
					[
						[
							'field'    => 'field_5f7754e7be6e3',
							'operator' => '==',
							'value'    => '0',
						],
					],
				],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => 50,
				'placeholder'       => '50 %',
				'prepend'           => '',
				'append'            => '',
				'min'               => 0,
				'max'               => 300,
				'step'              => 1,
			],
			[
				'key'               => 'field_5f7755ca760c7',
				'label'             => __('Scroll speed [ 1 - 100 % ]', 'dp-intro-tours'),
				'name'              => 'scroll_speed',
				'type'              => 'number',
				'instructions'      => ' • &ensp;&ensp;&ensp;1%: ' . __('slowest scrolling', 'dp-intro-tours') . DP_INTRO_TOURS_SPACER . ' • 100%: ' . __('switches to the next target immediately', 'dp-intro-tours') . dpit_acf_print_default_val('30%'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => 30,
				'placeholder'       => '30 %',
				'prepend'           => '',
				'append'            => '',
				'min'               => 1,
				'max'               => 100,
				'step'              => 1,
			],
			[
				'key'               => 'field_6e3367665230f',
				'label'             => __('Maximal tooltip width [px]', 'dp-intro-tours'),
				'name'              => 'max_tooltip_width',
				'type'              => 'number',
				'instructions'      => __('Maximal width of intro tooltip in pixels.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => '',
				'placeholder'       => '-',
				'prepend'           => '',
				'append'            => '',
				'min'               => 0,
				'max'               => '',
				'step'              => '',
			],
			[
				'key'               => 'field_6e3361665230f',
				'label'             => __('Loading delay [ ms ]', 'dp-intro-tours'),
				'name'              => 'loading_delay',
				'type'              => 'number',
				'instructions'      => __('Tour loading delay - waiting for frontend rendering jobs shortly after page load', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => 0,
				'placeholder'       => __('0 ms', 'dp-intro-tours'),
				'prepend'           => '',
				'append'            => '',
				'min'               => 0,
				'max'               => 20000,
				'step'              => '',
			],
		],
	];
}

function dpit_get_acf_design_config($themes)
{
	$query_params_defs = Dp_Intro_Tours_Helper::get_dp_intro_query_params(false);
	return [
		'key'               => 'field_5f26bac05c86c',
		'label'             => __('Design', 'dp-intro-tours'),
		'name'              => 'intro_design',
		'type'              => 'group',
		'instructions'      => __('Override global design settings from', 'dp-intro-tours') . ' <a href="' . Dp_Intro_Tours_Helper::get_plugin_settings_page_url('general') . '">' . __("plugin's global setting page", 'dp-intro-tours') . '</a> ' . __('particularly for this tour.', 'dp-intro-tours'),
		'required'          => 0,
		'conditional_logic' => 0,
		'wrapper'           => [
			'width' => '',
			'class' => '',
			'id'    => '',
		],
		'layout'            => 'block',
		'sub_fields'        => [
			[
				'key'               => 'field_5f26bc465c86e',
				'label'             => __('Theme', 'dp-intro-tours'),
				'name'              => 'theme',
				'type'              => 'select',
				'instructions'      => __('Override default theme option from plugin\'s global options page for this tour.', 'dp-intro-tours') . ' ' . Dp_Intro_Tours_Helper::get_pro_link_html(Dp_Intro_Tours_Helper::build_dp_query_string(['dp_qp_lock' => 'start-theme-demo'], $query_params_defs), 'Choose your theme visually'),
				'required'          => 0,
				'conditional_logic' => [
					[
						[
							'field'    => 'field_5f74566abe6e9',
							'operator' => '==',
							'value'    => '0',
						],
					],
				],
				'wrapper'           => [
					'width' => '',
					'class' => Str::classes(['acf-field--ia' => true]),
					'id'    => '',
				],
				'choices'           => $themes,
				'default_value'     => Dp_Intro_Tours_Helper::get_themes_select_def_val(false),
				'allow_null'        => 0,
				'multiple'          => 0,
				'ui'                => 0,
				'return_format'     => 'value',
				'ajax'              => 0,
				'placeholder'       => '',
			],
			[
				'key'               => 'field_5f74566abe6e9',
				'label'             => __('Do not load any theme style', 'dp-intro-tours'),
				'name'              => 'do_not_load_theme',
				'type'              => 'true_false',
				'instructions'      => __("If you plan to use custom CSS for major restyling, you may want to turn this option on. This ensures that only the necessary styles are loaded, so you don't have to overload all of the theme's CSS styles.", 'dp-intro-tours')
					. DP_INTRO_TOURS_SPACER
					. __('Check documentation', 'dp-intro-tours')
					. ': <a href="' . DP_INTRO_TOURS_CSS_DOC . '" target="_blank">'
					. __('CSS customization', 'dp-intro-tours')
					. '</a>',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => Str::classes(['acf-field--ia' => true]),
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __('On', 'dp-intro-tours'),
				'ui_off_text'       => __('Off', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f26da3c5c86f',
				'label'             => __('Accent Color', 'dp-intro-tours'),
				'name'              => 'dp_it_accent_color',
				'type'              => 'color_picker',
				'instructions'      => __('Override default accent color from plugin\'s global settings page for this tour.', 'dp-intro-tours') . ' ' . Dp_Intro_Tours_Helper::get_pro_link_html(
					Dp_Intro_Tours_Helper::build_dp_query_string(
						[
							'dp_qp_lock' => 'start-theme-demo',
							'dp_qp_step' => '1',
						],
						$query_params_defs
					),
					'Choose accent color visually'
				),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => Str::classes(['acf-field--ia' => true]),
					'id'    => '',
				],
				'default_value'     => '',
			],
			[
				'key'               => 'field_5f26bb5a5c86d',
				'label'             => __('Font family of the buttons and step numbers', 'dp-intro-tours'),
				'name'              => 'custom_font',
				'type'              => 'text',
				'instructions'      => __('Overrides global option for font family of the buttons and step numbers inside a intro tooltip.', 'dp-intro-tours') . ' ' . Dp_Intro_Tours_Helper::get_generic_i18n('font_option_hint'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => '',
				'placeholder'       => __('e.g. Ubuntu, Lato, \'Lucida Grande\', Tahoma, Sans-Serif', 'dp-intro-tours'),
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			],
			[
				'key'               => 'field_5f7795ba760c7',
				'label'             => __('Tooltip container radius override', 'dp-intro-tours') . ' [ px ]',
				'name'              => 'tooltip_radius',
				'type'              => 'number',
				'instructions'      => __('Override the radius of intro tooltip [px].', 'dp-intro-tours') . dpit_acf_print_default_val(__('-1 => default intro theme value is used', 'dp-intro-tours')),
				'required'          => 0,
				'conditional_logic' => '',
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => -1,
				'placeholder'       => '-1 => ' . __('Default intro theme value is used', 'dp-intro-tours'),
				'prepend'           => '',
				'append'            => '',
				'min'               => -1,
				'max'               => 1000,
				'step'              => 1,
			],
			[
				'key'               => 'field_5f7795bc760c7',
				'label'             => __('Button radius override', 'dp-intro-tours') . ' [ px ]',
				'name'              => 'button_radius',
				'type'              => 'number',
				'instructions'      => __('Override the radius of intro buttons [px].', 'dp-intro-tours') . dpit_acf_print_default_val(__('-1 => default intro theme value is used', 'dp-intro-tours')),
				'required'          => 0,
				'conditional_logic' => '',
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => -1,
				'placeholder'       => '-1 => ' . __('Default intro theme value is used', 'dp-intro-tours'),
				'prepend'           => '',
				'append'            => '',
				'min'               => -1,
				'max'               => 1000,
				'step'              => 1,
			],
			[
				'key'               => 'field_5f7795aa760c7',
				'label'             => __('Highlight layer radius override', 'dp-intro-tours') . ' [ px ]',
				'name'              => 'highlight_radius',
				'type'              => 'number',
				'instructions'      => __('Override the radius of highlighting layer [px].', 'dp-intro-tours') . dpit_acf_print_default_val(__('-1 => default intro theme value is used', 'dp-intro-tours')),
				'required'          => 0,
				'conditional_logic' => '',
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => -1,
				'placeholder'       => '-1 => ' . __('Default intro theme value is used', 'dp-intro-tours'),
				'prepend'           => '',
				'append'            => '',
				'min'               => -1,
				'max'               => 1000,
				'step'              => 1,
			],
		],
	];
}


function dpit_get_acf_url_vars_config()
{
	$pro_only_classes = !DP_INTRO_TOURS_IS_PRO ? DP_INTRO_TOURS_PRO_ONLY_NO_EVENTS_CLASS : '';
	return [
		// cspell:ignore field_5f26baaa5c86c
		'key'               => 'field_5f26baaa5c86c',
		'label'             => __('Variables in URL', 'dp-intro-tours') . DP_INTRO_TOURS_PRO_POSTFIX,
		'name'              => 'intro_url_variables',
		'type'              => 'group',
		'instructions'      => __('URL variables allow you to define the variables of the URL portion of each step to create universal tours!')
			. DP_INTRO_TOURS_SPACER
			. '<div class="dpit-info-icon dpit-info-icon--inline dpit-info-icon--pre" data-info-text="' . Dp_Intro_Tours_Helper::get_generic_i18n('custom_url_vars_desc_detail') . '"></div>'
			. Dp_Intro_Tours_Helper::get_generic_i18n('custom_url_vars_desc')
			. DP_INTRO_TOURS_SPACER
			. Dp_Intro_Tours_Helper::get_generic_i18n('custom_url_vars_example')
			. DP_INTRO_TOURS_SPACER
			. Dp_Intro_Tours_Helper::get_generic_i18n('system_url_vars_desc')
			. DP_INTRO_TOURS_SPACER
			. Dp_Intro_Tours_Helper::get_generic_i18n('system_url_vars_example')
			. DP_INTRO_TOURS_SPACER
			. Dp_Intro_Tours_Helper::get_generic_i18n('system_url_vars_desc_detail'),
		'required'          => 0,
		'conditional_logic' => 0,
		'wrapper'           => [
			'width' => '',
			'class' => '',
			'id'    => '',
		],
		'layout'            => 'block',
		'sub_fields'        => [
			[
				// cspell:ignore field_5e4c8eadab990
				'key'               => 'field_5e4c8eadab990',
				'label'             => __('Enable url variables', 'dp-intro-tours'),
				'name'              => 'url_vars_enabled',
				'type'              => 'true_false',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => $pro_only_classes,
					'id'    => '',
				],
				'message'           => __('Enable / disable URL variables.', 'dp-intro-tours'),
				'default_value'     => '1',
				'ui'                => 1,
				'ui_on_text'        => __('Active', 'dp-intro-tours'),
				'ui_off_text'       => __('Inactive', 'dp-intro-tours'),
			],
			[
				'key'               => 'field_5f26f35a5c86d',
				'label'             => __('Variable Examples for Visual Builder Start', 'dp-intro-tours'),
				'name'              => 'url_vars_examples',
				'type'              => 'textarea',
				'readonly'          => '1',
				'instructions'      => __('Example values are used to concretize starting url (first step) for visual builder only - they has no effect in live tour.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => $pro_only_classes,
					'id'    => '',
				],
				'default_value'     => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			],
		],
	];
}

function dpit_get_placeholder_as_global_val($options, $id, $def)
{
	$glob_option_val = Arr::get($options, $id);
	return $glob_option_val ? $glob_option_val : $def;
}

function dpit_get_acf_labeling_config()
{
	$labeling_options = get_option('dp_it_labeling_options');
	$skip_for_future_visits_title = Dp_Intro_Tours_Helper::get_generic_i18n('skip-for-future-visits') . ' ' . __('checkbox', 'dp-intro-tours');
	return [
		// cspell:ignore field_5f26baca5c86c
		'key'               => 'field_5f26baca5c86c',
		'label'             => __('Labeling', 'dp-intro-tours'),
		'name'              => 'intro_labeling',
		'type'              => 'group',
		'instructions'      => __('Override of', 'dp-intro-tours') . ' <a href="' . Dp_Intro_Tours_Helper::get_plugin_settings_page_url('labeling') . '">' . __("plugin's global labeling options", 'dp-intro-tours') . '</a> ' . __('particularly for this tour.', 'dp-intro-tours'),
		'required'          => 0,
		'conditional_logic' => 0,
		'wrapper'           => [
			'width' => '',
			'class' => '',
			'id'    => 'dpit-admin-tour-edit-labeling',
		],
		'layout'            => 'block',
		'sub_fields'        => [
			[
				// cspell:ignore field_61faad1aa7ebe
				'key'               => 'field_61faad1aa7ebe',
				'label'             => __('Icon in next and previous step button', 'dp-intro-tours'),
				'name'              => 'button_arrows',
				'type'              => 'select',
				'instructions'      => Dp_Intro_Tours_Helper::get_button_labeling_select_instructions(
					// translators: %s: <strong>"selection of arrow icons"</strong>
					sprintf(__('Override the global option for %s in buttons in the tooltip', 'dp-intro-tours'), '<strong>' . __('selection of arrow icons', 'dp-intro-tours') . '</strong>'),
					false
				),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'choices'           => Dp_Intro_Tours_Helper::get_button_labeling_select_options(false),
				'default_value'     => Dp_Intro_Tours_Helper::get_button_labeling_select_def_val(false),
				'allow_null'        => 0,
				'ui'                => 0,
				'ajax'              => 0,
				'return_format'     => 'value',
				'placeholder'       => '',
			],

			[
				'key'               => 'field_5f26b35a5c86d',
				'label'             => __('Next step button', 'dp-intro-tours'),
				'name'              => 'nextLabel',
				'type'              => 'text',
				'instructions'      => __('Custom text for next step button.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => '',
				'placeholder'       => dpit_get_placeholder_as_global_val($labeling_options, 'nextLabel', Dp_Intro_Tours_Helper::get_generic_i18n('next')),
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			],
			[
				'key'               => 'field_5f46b35a5c86d',
				'label'             => __('Previous step button', 'dp-intro-tours'),
				'name'              => 'prevLabel',
				'type'              => 'text',
				'instructions'      => __('Custom text for previous step button.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => '',
				'placeholder'       => dpit_get_placeholder_as_global_val($labeling_options, 'prevLabel', Dp_Intro_Tours_Helper::get_generic_i18n('back')),
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			],
			[
				// cspell:ignore field_61faad13a7ebe
				'key'               => 'field_61faad13a7ebe',
				'label'             => __('Icons in cancel button', 'dp-intro-tours'),
				'name'              => 'button_cancel_ico',
				'type'              => 'select',
				'instructions'      => Dp_Intro_Tours_Helper::get_button_labeling_select_instructions(
					// translators: %s: <strong>"selection of arrow icons"</strong>
					sprintf(__('Override the global option for %s in buttons in the tooltip', 'dp-intro-tours'), '<strong>' . __('selection of arrow icons', 'dp-intro-tours') . '</strong>'),
					false
				),
				'required'          => 0,
				'conditional_logic' => [
					[
						[
							'field'    => 'field_5f26bc465c86e',
							'operator' => '!=',
							'value'    => 'sticky',
						],
					],
				],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'choices'           => Dp_Intro_Tours_Helper::get_button_labeling_select_options(false),
				'default_value'     => Dp_Intro_Tours_Helper::get_button_labeling_select_def_val(true, true),
				'allow_null'        => 0,
				'ui'                => 0,
				'ajax'              => 0,
				'return_format'     => 'value',
				'placeholder'       => '',
			],
			[
				'key'               => 'field_5f26a35a5c86d',
				'label'             => __('Cancel button', 'dp-intro-tours'),
				'name'              => 'skipLabel',
				'type'              => 'text',
				'instructions'      => __('Custom text for cancel tour button.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => [
					[
						[
							'field'    => 'field_5f26bc465c86e',
							'operator' => '!=',
							'value'    => 'sticky',
						],
					],
				],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => '',
				'placeholder'       => dpit_get_placeholder_as_global_val($labeling_options, 'skipLabel', __('Skip', 'dp-intro-tours')),
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			],
			[
				'key'               => 'field_5f26b35abc86d',
				'label'             => __('Done button', 'dp-intro-tours'),
				'name'              => 'doneLabel',
				'type'              => 'text',
				'instructions'      => __('Custom text for the finish tour button.', 'dp-intro-tours'),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => '',
				'placeholder'       => dpit_get_placeholder_as_global_val($labeling_options, 'doneLabel', __('Done', 'dp-intro-tours')),
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			],

			[
				'key'               => 'field_5f26b35ab386d',
				'label'             => $skip_for_future_visits_title,
				'name'              => 'skipForFutureVisitsLabel',
				'type'              => 'text',
				'instructions'      => sprintf(__('Custom text for the %s', 'dp-intro-tours'), $skip_for_future_visits_title),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => '',
				'placeholder'       => dpit_get_placeholder_as_global_val($labeling_options, 'skipForFutureVisitsLabel', Dp_Intro_Tours_Helper::get_generic_i18n('skip-for-future-visits')),
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			],
		],
	];
}
