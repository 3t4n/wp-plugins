<?php

if (!defined('WPINC')) {
    die;
}

class OPM_IMG_Messages {
    public static function queue($message, $class = '')
    {
        $default_allowed_classes = array('error', 'warning', 'success', 'info');
        $allowed_classes = apply_filters('opm_img_messages_allowed_classes', $default_allowed_classes);
        $default_class = apply_filters('opm_img_messages_default_class', 'success');

        if (!in_array($class, $allowed_classes)) {
            $class = $default_class;
        }

        $messages = maybe_unserialize(get_option('_opm_img_messages', array()));
        $messages[$class][] = $message;

        update_option('_opm_img_messages', $messages);
    }

    public static function show()
    {
        $group_messages = maybe_unserialize(get_option('_opm_img_messages'));
        
        if (!$group_messages) {
            return;
        }

        $errors = "";
        if (is_array($group_messages)) {
            foreach ($group_messages as $class => $messages) {
                $errors .= '<div class="notice opm_img-notice notice-' . $class . ' is-dismissible"">';
                $prev_message = '';
                foreach ($messages as $message) {
                    if( $prev_message !=  $message)
                    $errors .= '<p>' . $message . '</p>';
                    $prev_message =  $message;
                }
                $errors .= '</div>';
            }
        }

        delete_option('_opm_img_messages');

        echo $errors;
    }
}

if (class_exists('OPM_IMG_Messages') && !function_exists('opm_img_Queue')) {
    function opm_img_Queue($message, $class = null)
    {
        OPM_IMG_Messages::queue($message, $class);
    }
}
add_action('admin_notices', array('OPM_IMG_Messages', 'show'));