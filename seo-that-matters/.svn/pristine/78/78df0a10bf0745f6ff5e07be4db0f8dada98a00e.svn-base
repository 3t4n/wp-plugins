<?php

namespace SeoThatMatters;

if (!defined('WPINC')) { die; }

class PluginMessages {
    
    public static function plugin_queue($message, $class = '') {
        
        $default_allowed_classes = array('error', 'warning', 'success', 'info');
        $allowed_classes = apply_filters(SEOTM_PREFIX . '_messages_allowed_classes', $default_allowed_classes);
        $default_class = apply_filters(SEOTM_PREFIX . '_messages_default_class', 'success');

        if (!in_array($class, $allowed_classes)) {
            $class = $default_class;
        }

        $messages = maybe_unserialize(get_option('_plugin_messages', array()));
        $messages[$class][] = $message;

        update_option('_plugin_messages', $messages);
        
    }


    public static function show() {
        
        $group_messages = maybe_unserialize(get_option('_plugin_messages'));
        
        if (!$group_messages) {
            return;
        }

        $errors = "";
        if (is_array($group_messages)) {
            foreach ($group_messages as $class => $messages) {
                $errors .= '<div class="notice '.esc_attr(SEOTM_PREFIX).'-notice notice-' . $class . ' is-dismissible"">';
                $prev_message = '';
                foreach ($messages as $message) {
                    if( $prev_message !=  $message)
                    $errors .= '<p>' . $message . '</p>';
                    $prev_message =  $message;
                }
                $errors .= '</div>';
            }
        }

        delete_option('_plugin_messages');

        print $errors;
        
    }
}

function plugin_queue($message, $class = null) {
	PluginMessages::plugin_queue($message, $class);
}
if (class_exists('SeoThatMatters\PluginMessages')) {
    add_action('admin_notices', array('SeoThatMatters\PluginMessages', 'show'));
}