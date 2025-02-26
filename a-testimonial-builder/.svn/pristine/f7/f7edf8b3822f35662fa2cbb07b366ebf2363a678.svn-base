<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Description of flash-messages
 *
 * @author dareks
 */
class ATBS_FlashMessages {

    public function __construct()
    {
        add_action('admin_notices', [&$this, 'atbs_show_flash_messages']);
    }

    //Flash Messages
    public static function atbs_queue_flash_message($message, $class = '')
    {

        $default_allowed_classes = array('error', 'updated', 'success');
        $allowed_classes = apply_filters('flash_messages_allowed_classes', $default_allowed_classes);
        $default_class = apply_filters('flash_messages_default_class', 'updated');

        if (!in_array($class, $allowed_classes))
            $class = $default_class;

        $flash_messages = maybe_unserialize(get_option('atbs_flash_messages', array()));
        $flash_messages[$class][] = $message;

        update_option('atbs_flash_messages', $flash_messages);
    }

    public static function atbs_show_flash_messages()
    {
        $flash_messages = maybe_unserialize(get_option('atbs_flash_messages', ''));

        if (is_array($flash_messages)) {
            foreach ($flash_messages as $class => $messages) {
                foreach ($messages as $message) {
                    ?><div class="<?php echo esc_attr($class); ?>"><p><?php echo esc_attr($message); ?></p></div><?php
                }
            }
        }

        //clear flash messages
        delete_option('atbs_flash_messages');
    }
}