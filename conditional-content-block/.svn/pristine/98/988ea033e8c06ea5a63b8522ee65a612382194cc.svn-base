<?php
/**
 * Plugin Name: Conditional Content Block
 * Description: Show/hide content based on multiple conditions
 * Version: 1.3.1
 * Author:      Mainul Kabir Aion
 * Author URI:  https://mkaion.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'MKAION_CCB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

function mkaion_ccb_init() {
    wp_register_script(
        'mkaion-ccb-editor-script',
        plugins_url('block.js', __FILE__),
        array('wp-blocks', 'wp-editor', 'wp-components', 'wp-element', 'wp-date', 'wp-i18n'),
		null,
		true
    );

    $roles = [];
    $wp_roles = wp_roles();
    foreach ($wp_roles->roles as $role_key => $role) {
        $roles[] = ['value' => $role_key, 'label' => $role['name']];
    }
    
    wp_localize_script('mkaion-ccb-editor-script', 'conditionalContentBlock', [
        'roles' => $roles,
        'timezone' => wp_timezone_string(),
        'locale' => get_locale(),
        'dateFormat' => get_option('date_format'),
        'timeFormat' => get_option('time_format')
    ]);

    register_block_type('conditional-content-block/main', [
        'editor_script' => 'mkaion-ccb-editor-script',
        'render_callback' => 'mkaion_ccb_render_conditional_block',
        'attributes' => [
            'visibility' => ['type' => 'string', 'default' => 'all'],
            'fallbackText' => ['type' => 'string', 'default' => ''],
            'roles' => ['type' => 'array', 'default' => []],
            'deviceTypes' => ['type' => 'array', 'default' => []],
            'startDateTime' => ['type' => 'string', 'default' => ''],
            'endDateTime' => ['type' => 'string', 'default' => ''],
            'enableSchedule' => ['type' => 'boolean', 'default' => false]
        ]
    ]);
}
add_action('init', 'mkaion_ccb_init');

function mkaion_ccb_render_conditional_block($attributes, $content) {
    // Backward compatibility for old 'showLoggedIn' attribute
    if (!isset($attributes['visibility']) && isset($attributes['showLoggedIn'])) {
        $attributes['visibility'] = $attributes['showLoggedIn'] ? 'logged_in' : 'logged_out';
    }

    // Set default values
    $defaults = [
        'visibility' => 'all',
        'fallbackText' => '',
        'roles' => [],
        'deviceTypes' => [],
        'startDateTime' => '',
        'endDateTime' => '',
        'enableSchedule' => false
    ];
    $attributes = wp_parse_args($attributes, $defaults);

    $show_content = true;
    $user = wp_get_current_user();

    // Visibility check
    switch ($attributes['visibility']) {
        case 'logged_in':
            if (!is_user_logged_in()) {
                $show_content = false;
            } elseif (!empty($attributes['roles'])) {
                $show_content = (bool) array_intersect($attributes['roles'], $user->roles);
            }
            break;

        case 'logged_out':
            $show_content = !is_user_logged_in();
            break;

        case 'all':
        default:
            // No visibility restrictions
            break;
    }

    // Device type check
    if (!empty($attributes['deviceTypes']) && $show_content) {
        $is_mobile = wp_is_mobile();
        $is_tablet = (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) || 
                    (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false && !$is_mobile);
        
        $device_match = false;
        if ($is_mobile && in_array('mobile', $attributes['deviceTypes'])) $device_match = true;
        if ($is_tablet && in_array('tablet', $attributes['deviceTypes'])) $device_match = true;
        if (!$is_mobile && !$is_tablet && in_array('desktop', $attributes['deviceTypes'])) $device_match = true;
        
        $show_content = $device_match;
    }

    // Schedule validation
    if ($attributes['enableSchedule'] && $show_content) {
        $timezone = new DateTimeZone(wp_timezone_string());
        $now = new DateTime('now', $timezone);
        
        if (!empty($attributes['startDateTime'])) {
            $start = new DateTime($attributes['startDateTime'], $timezone);
            if ($now < $start) $show_content = false;
        }
        
        if (!empty($attributes['endDateTime'])) {
            $end = new DateTime($attributes['endDateTime'], $timezone);
            if ($now > $end) $show_content = false;
        }
    }

    return $show_content ? $content : (
        !empty($attributes['fallbackText']) 
            ? '<div class="conditional-fallback">' . esc_html($attributes['fallbackText']) . '</div>' 
            : ''
    );
}

function mkaion_ccb_enqueue_styles() {
    wp_enqueue_style( 'mkaion-ccb-styles', plugins_url( 'style.css', __FILE__ ) );
    wp_add_inline_style( 'mkaion-ccb-styles', '
        .conditional-fallback {
            padding: 15px;
            border: 1px dashed #ccc;
            margin: 10px 0;
            color: #666;
        }

        .datetime-pickers {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .datetime-picker-field .components-text-control__input {
            cursor: pointer;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 8px 12px;
        }

        .datetime-picker-field .components-text-control__input:focus {
            border-color: #007cba;
            box-shadow: 0 0 0 1px #007cba;
        }

        @media (max-width: 782px) {
            .datetime-pickers {
                grid-template-columns: 1fr;
            }
        }
    ' );
}
add_action('wp_enqueue_scripts', 'mkaion_ccb_enqueue_styles');