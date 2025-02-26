<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package chat-help
 * @subpackage chat-help/src/Admin/Views/Popup
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\ChatWhatsapp\Admin\Views;

use ThemeAtelier\ChatWhatsapp\Admin\Framework\Classes\CHAT_WHATSAPP;

class General
{

    /**
     * Create Option fields for the setting options.
     *
     * @param string $prefix Option setting key prefix.
     * @return void
     */
    public static function options($prefix, $timezones)
    {
        CHAT_WHATSAPP::createSection(
            $prefix,
            array(
                'title' => esc_html__('FLOATING CHAT', 'chat-help'),
                'icon' => 'icofont-brand-whatsapp',
                'fields' => array(
                    array(
                        'id' => 'chat_layout',
                        'type' => 'layout_preset',
                        'title' => esc_html__('Select Floating Chat Layout', 'chat-help'),
                        'class' => 'chat-whatsapp-layout-preset',
                        'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Select which layout type you want to use.)', 'chat-help') . '</div>',
                        'options' => array(
                            'off' => array(
                                'image'           => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/off.svg',
                                'text'            => esc_html__('No Floating Chat', 'chat-help'),
                                'option_demo_url' => '',
                            ),
                            'form' => array(
                                'image'           => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/single_form.svg',
                                'text'            => esc_html__('Single Form', 'chat-help'),
                                'option_demo_url' => 'https://demo.themeatelier.net/chathelp/single-form',
                            ),
                            'agent' => array(
                                'image'           => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/single_agent.svg',
                                'text'            => esc_html__('Single Agent', 'chat-help'),
                                'option_demo_url' => 'https://demo.themeatelier.net/chathelp/single-agent',
                            ),
                            'button' => array(
                                'image'           => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/single_button.svg',
                                'text'            => esc_html__('Simple Button', 'chat-help'),
                                'option_demo_url' => 'https://demo.themeatelier.net/chathelp/simple-button',
                            ),
                            'advance_button' => array(
                                'image'           => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/advanced_button.svg',
                                'text'            => esc_html__('Advance Button', 'chat-help'),
                                'option_demo_url' => 'https://demo.themeatelier.net/chathelp/advance-button',
                                'pro_only'        => true,
                            ),
                            'multi' => array(
                                'image'           => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/multi_agent.svg',
                                'text'            => esc_html__('Multi Agents', 'chat-help'),
                                'option_demo_url' => 'https://demo.themeatelier.net/chathelp/multi-agents',
                                'pro_only'        => true,
                            ),
                        ),
                        'default' => 'off',
                    ),
                    array(
                        'type' => 'subheading',
                        'style'   => 'success',
                        'content' => esc_html__('With \'No Floating Chat\' chat option, you won\'t be able to use the floating chat feature. However, you can still access and enjoy other functionalities such as the WooCommerce button, shortcodes, and button blocks provided by the plugin.', 'chat-help'),
                        'dependency' => array('chat_layout', '==', 'off'),
                    ),
                    array(
                        'type' => 'section_tab',
                        'dependency' => array('chat_layout', '!=', 'off', 'any'),
                        'tabs' => array(
                            array(
                                'title' => esc_html__('General', 'chat-help'),
                                'icon'  => 'icofont-gears',
                                'fields' => array(
                                    // adding contact number
                                    array(
                                        'id' => 'opt-number',
                                        'type' => 'text',
                                        'title' => esc_html__('WhatsApp Number', 'chat-help'),
                                        'default' => '+880123456189',
                                        'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Add your WhatsApp number including country code. eg: +880123456189', 'chat-help') . '</div> <a class="chat-whatsapp-open-docs" target="_blank" href="https://faq.whatsapp.com/640432094208718/?helpref=uf_share">Detailed explanation</a>',
                                        'validate' => 'csf_validate_numeric',
                                        'dependency' => array('chat_layout', '!=', 'multi', 'any'),
                                    ),
                                    // changing timezone
                                    array(
                                        'id' => 'select-timezone',
                                        'type' => 'select',
                                        'title' => esc_html__('Timezone', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('When using the date and time from the user browser you can transform it to your current timezone (in case your user is in a different timezone)', 'chat-help') . '</div>',
                                        'chosen' => true,
                                        'placeholder' => esc_html__('Select timezone', 'chat-help'),
                                        'dependency' => array('chat_layout', '!=', 'multi', 'any'),
                                        'options' => $timezones,
                                    ),
                                    // Add availability
                                    array(
                                        'id' => 'opt-availablity',
                                        'type' => 'tabbed',
                                        'title' => esc_html__('Availablity', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('24-hour Time without PM:AM" eg: From 00:00 to 23:59. If you are offline for any specefic full day use 00:00 and 00:00 in From and To value.', 'chat-help') . '</div>',
                                        'dependency' => array('chat_layout', '!=', 'multi', 'any'),
                                        // sunday
                                        'tabs' => array(
                                            array(
                                                'title' => esc_html__('Sunday', 'chat-help'),
                                                'fields' => array(
                                                    array(
                                                        'id' => 'availablity-sunday',
                                                        'type' => 'datetime',
                                                        'from_to' => true,
                                                        'settings' => array(
                                                            'noCalendar' => true,
                                                            'enableTime' => true,
                                                            'dateFormat' => 'H:i',
                                                            'time_24hr' => true,
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            // monday
                                            array(
                                                'title' => esc_html__('Monday', 'chat-help'),
                                                'fields' => array(
                                                    array(
                                                        'id' => 'availablity-monday',
                                                        'type' => 'datetime',
                                                        'from_to' => true,
                                                        'settings' => array(
                                                            'noCalendar' => true,
                                                            'enableTime' => true,
                                                            'dateFormat' => 'H:i',
                                                            'time_24hr' => true,
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            // tuesday
                                            array(
                                                'title' => esc_html__('Tuesday', 'chat-help'),
                                                'fields' => array(
                                                    array(
                                                        'id' => 'availablity-tuesday',
                                                        'type' => 'datetime',
                                                        'from_to' => true,
                                                        'settings' => array(
                                                            'noCalendar' => true,
                                                            'enableTime' => true,
                                                            'dateFormat' => 'H:i',
                                                            'time_24hr' => true,
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            // wednesday
                                            array(
                                                'title' => esc_html__('Wednesday', 'chat-help'),
                                                'fields' => array(
                                                    array(
                                                        'id' => 'availablity-wednesday',
                                                        'type' => 'datetime',
                                                        'from_to' => true,
                                                        'settings' => array(
                                                            'noCalendar' => true,
                                                            'enableTime' => true,
                                                            'dateFormat' => 'H:i',
                                                            'time_24hr' => true,
                                                        ),
                                                    ),
                                                ),
                                            ),

                                            // thursday
                                            array(
                                                'title' => esc_html__('Thursday', 'chat-help'),
                                                'fields' => array(
                                                    array(
                                                        'id' => 'availablity-thursday',
                                                        'type' => 'datetime',
                                                        'from_to' => true,
                                                        'settings' => array(
                                                            'noCalendar' => true,
                                                            'enableTime' => true,
                                                            'dateFormat' => 'H:i',
                                                            'time_24hr' => true,
                                                        ),
                                                    ),
                                                ),
                                            ),

                                            // friday
                                            array(
                                                'title' => esc_html__('Friday', 'chat-help'),
                                                'fields' => array(
                                                    array(
                                                        'id' => 'availablity-friday',
                                                        'type' => 'datetime',
                                                        'from_to' => true,
                                                        'settings' => array(
                                                            'noCalendar' => true,
                                                            'enableTime' => true,
                                                            'dateFormat' => 'H:i',
                                                            'time_24hr' => true,
                                                        ),
                                                    ),
                                                ),
                                            ),

                                            // thursday
                                            array(
                                                'title' => esc_html__('Saturday', 'chat-help'),
                                                'fields' => array(
                                                    array(
                                                        'id' => 'availablity-saturday',
                                                        'type' => 'datetime',
                                                        'from_to' => true,
                                                        'settings' => array(
                                                            'noCalendar' => true,
                                                            'enableTime' => true,
                                                            'dateFormat' => 'H:i',
                                                            'time_24hr' => true,
                                                        ),
                                                    ),
                                                ),
                                            ),

                                        ),
                                    ),

                                    // adding agent photo
                                    array(
                                        'id' => 'agent-photo',
                                        'type' => 'media',
                                        'title' => esc_html__('Agent Photo', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/user_image.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Add agent photo to show in the bubble.', 'chat-help') . '</div>',
                                        'library' => 'image',
                                        'placeholder' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/user.webp',
                                        'preview' => true,
                                        'dependency' => array('chat_layout', 'any', 'form,agent', 'any'),
                                        'default' => [
                                            'url' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/user.webp',
                                        ],
                                    ),

                                    // agent name
                                    array(
                                        'id' => 'agent-name',
                                        'type' => 'text',
                                        'title' => esc_html__('Agent Name', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/agent_name.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Add your/agent name for shying in bubble.', 'chat-help') . '</div>',
                                        'default' => esc_html__('John Doe', 'chat-help'),
                                        'dependency' => array('chat_layout', 'any', 'form,agent', 'any'),
                                    ),

                                    // agent subtitle
                                    array(
                                        'id' => 'agent-subtitle',
                                        'type' => 'text',
                                        'title' => esc_html__('Subtitle', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/agent_subtitle.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Add subtitle to show under agent name.', 'chat-help') . '</div>',
                                        'default' => esc_html__('Typically replies within a day', 'chat-help'),
                                        'dependency' => array('chat_layout', 'any', 'form,agent', 'any'),
                                    ),

                                    // Bubble title
                                    array(
                                        'id' => 'bubble-title',
                                        'type' => 'text',
                                        'title' => esc_html__('Bubble Title', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/bubble_title.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Add title to show as top main text of bubble.', 'chat-help') . '</div>',
                                        'default' => esc_html__('Need Help? Send a WhatsApp message now', 'chat-help'),
                                        'dependency' => array('chat_layout', '==', 'multi', 'any'),
                                    ),

                                    // Bubble subtitle
                                    array(
                                        'id' => 'bubble-subtitle',
                                        'type' => 'text',
                                        'title' => esc_html__('Bubble Subtitle', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/bubble_subtitle.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Add subtitle to show below main title.', 'chat-help') . '</div>',
                                        'default' => esc_html__('Click one of our representatives below', 'chat-help'),
                                        'dependency' => array('chat_layout', '==', 'multi', 'any'),
                                    ),
                                    // Header content position
                                    array(
                                        'id' => 'header-content-position',
                                        'type' => 'button_set',
                                        'title' => esc_html__('Bubble Header Content Position', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/header_left_center.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div>',
                                        'default' => 'center',
                                        'options' => array(
                                            'left'   => array(
                                                'text' => esc_html__('Left', 'chat-help'),
                                            ),
                                            'center' => array(
                                                'text' => esc_html__('Center', 'chat-help'),
                                            ),
                                        ),
                                        'dependency' => array('chat_layout', 'any', 'form,agent', 'any'),
                                    ),

                                    // GDPR compliance checkbox
                                    array(
                                        'id' => 'gdpr-enable',
                                        'type' => 'switcher',
                                        'title' => esc_html__('GDPR Compliance', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/gdpr.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Turn ON enabling GDPR compliance checkbox.', 'chat-help') . '</div>',
                                        'default' => false,
                                        'dependency' => array('chat_layout', '!=', 'button', 'any'),
                                    ),
                                    // GDPR compliance text
                                    array(
                                        'id' => 'gdpr-compliance-content',
                                        'type' => 'wp_editor',
                                        'title' => esc_html__('GDPR Compliance Message', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Change default GDPR compliance text.', 'chat-help') . '</div>',
                                        'default' => esc_attr('Please accept our <a href="#">privacy policy</a> first to start a conversation.', 'chat-help'),
                                        'dependency' => array('chat_layout|gdpr-enable', '!=|==', 'button|true', 'any'),
                                    ),
                                    array(
                                        'id' => 'agent-name-placeholder-text',
                                        'type' => 'text',
                                        'title' => esc_html__('Agent Name Placeholder Text', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/your_name.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Add agent name placeholder text.', 'chat-help') . '</div>',
                                        'default' => esc_html__('Your name?', 'chat-help'),
                                        'dependency' => array('chat_layout', '==', 'form', 'any'),
                                    ),
                                    array(
                                        'id' => 'agent-message-placeholder-text',
                                        'type' => 'text',
                                        'title' => esc_html__('Agent Message Placeholder Text', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/message.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Add agent message placeholder text.', 'chat-help') . '</div>',
                                        'default' => esc_html__('Message', 'chat-help'),
                                        'dependency' => array('chat_layout', '==', 'form', 'any'),
                                    ),
                                    array(
                                        'id' => 'show_current_time',
                                        'type' => 'switcher',
                                        'title' => esc_html__('Current Time', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/current_time.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Show message before current time.', 'chat-help') . '</div>',
                                        'default' => true,
                                        'dependency' => array('chat_layout', '==', 'agent', 'any'),
                                    ),

                                    // agent subtitle
                                    array(
                                        'id' => 'agent-message',
                                        'type' => 'textarea',
                                        'title' => esc_html__('Message From Agent', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/agent_message.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Add add custom message for shoeing in message box.', 'chat-help') . '</div>',
                                        'default' => esc_html__('Hello, Welcome to the site. Please click below button for chating me throught WhatsApp.', 'chat-help'),
                                        'dependency' => array('chat_layout', '==', 'agent', 'any'),
                                    ),

                                    // before chat icon
                                    array(
                                        'id' => 'before-chat-icon',
                                        'type' => 'button_set',
                                        'title' => esc_html__('Icon For Send Message Button', 'chat-help'),
                                        'options' => array(
                                            'icofont-brand-whatsapp'    => array(
                                                'text' => '<i class="icofont-brand-whatsapp"></i>',
                                            ),
                                            'icofont-whatsapp'    => array(
                                                'text' => '<i class="icofont-whatsapp"></i>',
                                            ),
                                            'icofont-live-support'    => array(
                                                'text' => '<i class="icofont-live-support"></i>',
                                            ),
                                            'icofont-ui-messaging'    => array(
                                                'text' => '<i class="icofont-ui-messaging"></i>',
                                            ),
                                            'icofont-telegram'    => array(
                                                'text' => '<i class="icofont-telegram"></i>',
                                            ),
                                            'icofont-life-buoy'    => array(
                                                'text' => '<i class="icofont-life-buoy"></i>',
                                            ),
                                            'no_icon'    => array(
                                                'option_name' => esc_html__('No Icon', 'chat-help-pro'),
                                            ),
                                            'native'    => array(
                                                'text' => esc_html__('Native', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                            'custom'    => array(
                                                'text' => esc_html__('Custom', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                        ),
                                        'default' => 'icofont-brand-whatsapp',
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/send_message_icon.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Change icon for adding before send message button text.', 'chat-help') . '</div>',
                                        'dependency' => array('chat_layout', 'any', 'form,agent', 'any'),
                                    ),

                                    // agent subtitle
                                    array(
                                        'id' => 'chat-button-text',
                                        'type' => 'text',
                                        'title' => esc_html__('Send Message Button Text', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/send_message_text.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Add send message button text.', 'chat-help') . '</div>',
                                        'default' => esc_html__('Send a message', 'chat-help'),
                                        'dependency' => array('chat_layout', 'any', 'form,agent', 'any'),
                                    ),

                                    array(
                                        'id' => 'whatsapp_message_template',
                                        'type' => 'textarea',
                                        'title' => esc_html__('Message Template', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Customize your message templates based on the information you need.)', 'chat-help') . '</div>',
                                        'default' => esc_html__("Name: {name}.\n\nMessage: {message}\n\nDate: {date}"), 'chat-help',
                                        'desc' => esc_html__("Available tags &ndash; {name}, {message}, {date}, {siteURL}, {currentURL}", 'chat-help'),
                                        'dependency' => array('chat_layout', '==', 'form', 'any'),
                                    ),

                                    /************************************
                                     * MULTI AGENTS ITEMS SETTINGS
                                     *************************************/

                                    // Chat agents
                                    array(
                                        'id' => 'opt-chat-agents',
                                        'type' => 'group',
                                        'title' => esc_html__('Chat Agents', 'chat-help'),
                                        'dependency' => array('chat_layout', 'any', 'multi', 'any'),
                                        'fields' => array(
                                            array(
                                                'id' => 'agent-name',
                                                'type' => 'text',
                                                'title' => esc_html__('Agent Name', 'chat-help'),
                                            ),

                                            // adding agent photo
                                            array(
                                                'id' => 'agent-photo',
                                                'type' => 'media',
                                                'title' => esc_html__('Agent Photo', 'chat-help'),
                                                'placeholder' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/user.webp',
                                                'library' => 'image',
                                                'preview' => true,
                                            ),

                                            array(
                                                'id' => 'agent-number',
                                                'type' => 'text',
                                                'title' => esc_html__('Whatsapp Number For Agent', 'chat-help'),
                                            ),

                                            // changeing timezone
                                            array(
                                                'id' => 'agent-timezone',
                                                'type' => 'select',
                                                'title' => esc_html__('Timezone', 'chat-help'),
                                                'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('When using the date and time from the user browser you can transform it to your current timezone (in case your user is in a different timezone)', 'chat-help') . '</div>',
                                                'chosen' => true,
                                                'placeholder' => esc_html__('Select timezone', 'chat-help'),
                                                'options' => $timezones,
                                            ),

                                            // user avaialablity
                                            array(
                                                'id' => 'opt-availablity',
                                                'type' => 'tabbed',
                                                'title' => esc_html__('Availability', 'chat-help'),
                                                'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('24-hour Time without PM:AM" eg: From 00:00 to 23:59. If you are offline for any specefic full day use 00:00 and 00:00 in From and To value.', 'chat-help') . '</div>',
                                                // sunday
                                                'tabs' => array(
                                                    array(
                                                        'title' => esc_html__('Sunday', 'chat-help'),
                                                        'fields' => array(
                                                            array(
                                                                'id' => 'availablity-sunday',
                                                                'type' => 'datetime',
                                                                'from_to' => true,
                                                                'settings' => array(
                                                                    'noCalendar' => true,
                                                                    'enableTime' => true,
                                                                    'dateFormat' => 'H:i',
                                                                    'time_24hr' => true,
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                    // monday
                                                    array(
                                                        'title' => esc_html__('Monday', 'chat-help'),
                                                        'fields' => array(
                                                            array(
                                                                'id' => 'availablity-monday',
                                                                'type' => 'datetime',
                                                                'from_to' => true,
                                                                'settings' => array(
                                                                    'noCalendar' => true,
                                                                    'enableTime' => true,
                                                                    'dateFormat' => 'H:i',
                                                                    'time_24hr' => true,
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                    // tuesday
                                                    array(
                                                        'title' => esc_html__('Tuesday', 'chat-help'),
                                                        'fields' => array(
                                                            array(
                                                                'id' => 'availablity-tuesday',
                                                                'type' => 'datetime',
                                                                'from_to' => true,
                                                                'settings' => array(
                                                                    'noCalendar' => true,
                                                                    'enableTime' => true,
                                                                    'dateFormat' => 'H:i',
                                                                    'time_24hr' => true,
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                    // wednesday
                                                    array(
                                                        'title' => esc_html__('Wednesday', 'chat-help'),
                                                        'fields' => array(
                                                            array(
                                                                'id' => 'availablity-wednesday',
                                                                'type' => 'datetime',
                                                                'from_to' => true,
                                                                'settings' => array(
                                                                    'noCalendar' => true,
                                                                    'enableTime' => true,
                                                                    'dateFormat' => 'H:i',
                                                                    'time_24hr' => true,
                                                                ),
                                                            ),
                                                        ),
                                                    ),

                                                    // thursday
                                                    array(
                                                        'title' => esc_html__('Thursday', 'chat-help'),
                                                        'fields' => array(
                                                            array(
                                                                'id' => 'availablity-thursday',
                                                                'type' => 'datetime',
                                                                'from_to' => true,
                                                                'settings' => array(
                                                                    'noCalendar' => true,
                                                                    'enableTime' => true,
                                                                    'dateFormat' => 'H:i',
                                                                    'time_24hr' => true,
                                                                ),
                                                            ),
                                                        ),
                                                    ),

                                                    // friday
                                                    array(
                                                        'title' => esc_html__('Friday', 'chat-help'),
                                                        'fields' => array(
                                                            array(
                                                                'id' => 'availablity-friday',
                                                                'type' => 'datetime',
                                                                'from_to' => true,
                                                                'settings' => array(
                                                                    'noCalendar' => true,
                                                                    'enableTime' => true,
                                                                    'dateFormat' => 'H:i',
                                                                    'time_24hr' => true,
                                                                ),
                                                            ),
                                                        ),
                                                    ),

                                                    // thursday
                                                    array(
                                                        'title' => esc_html__('Saturday', 'chat-help'),
                                                        'fields' => array(
                                                            array(
                                                                'id' => 'availablity-saturday',
                                                                'type' => 'datetime',
                                                                'from_to' => true,
                                                                'settings' => array(
                                                                    'noCalendar' => true,
                                                                    'enableTime' => true,
                                                                    'dateFormat' => 'H:i',
                                                                    'time_24hr' => true,
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            // agent designation

                                            array(
                                                'id' => 'agent-designation',
                                                'type' => 'text',
                                                'title' => esc_html__('Agent Designation', 'chat-help'),
                                            ),

                                            array(
                                                'id' => 'agent-online-text',
                                                'type' => 'text',
                                                'title' => esc_html__('Agent onlione Text', 'chat-help'),
                                            ),

                                            array(
                                                'id' => 'agent-offline-text',
                                                'type' => 'text',
                                                'title' => esc_html__('Agent Offline Text', 'chat-help'),
                                            ),
                                        ),
                                        'default' => array(
                                            array(
                                                'agent-name' => esc_html__('Sarah C. Patrick', 'chat-help'),
                                                'agent-number' => esc_html__('+8801123456588', 'chat-help'),
                                                'agent-designation' => esc_html__('Technical support', 'chat-help'),
                                                'agent-online-text' => esc_html__('I am online', 'chat-help'),
                                                'agent-offline-text' => esc_html__('I am offline', 'chat-help'),
                                                'agent-photo' => [
                                                    "url" => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/user.webp',
                                                ]
                                            ),
                                            array(
                                                'agent-name' => esc_html__('Patricia J. Hunt', 'chat-help'),
                                                'agent-number' => esc_html__('008801123456588', 'chat-help'),
                                                'agent-designation' => esc_html__('Marketing support', 'chat-help'),
                                                'agent-online-text' => esc_html__('I am online', 'chat-help'),
                                                'agent-offline-text' => esc_html__('I am offline', 'chat-help'),
                                                'agent-photo' => [
                                                    "url" => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/agent1.webp',
                                                ]
                                            ),
                                            array(
                                                'agent-name' => esc_html__('Frederic M. Tune', 'chat-help'),
                                                'agent-number' => esc_html__('+8801123456588', 'chat-help'),
                                                'agent-designation' => esc_html__('Sales support', 'chat-help'),
                                                'agent-online-text' => esc_html__('I am online', 'chat-help'),
                                                'agent-offline-text' => esc_html__('I am offline', 'chat-help'),
                                                'agent-photo' => [
                                                    "url" => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/agent2.webp',
                                                ]
                                            ),
                                            array(
                                                'agent-name' => esc_html__('Douglas A. Smith', 'chat-help'),
                                                'agent-number' => esc_html__('+8801123456588', 'chat-help'),
                                                'agent-designation' => esc_html__('Product manager', 'chat-help'),
                                                'agent-online-text' => esc_html__('I am online', 'chat-help'),
                                                'agent-offline-text' => esc_html__('I am offline', 'chat-help'),
                                                'agent-photo' => [
                                                    "url" => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/agent3.webp',
                                                ]
                                            ),
                                            array(
                                                'agent-name' => esc_html__('Douglas A. Smith', 'chat-help'),
                                                'agent-number' => esc_html__('+8801123456588', 'chat-help'),
                                                'agent-designation' => esc_html__('Support Manager', 'chat-help'),
                                                'agent-online-text' => esc_html__('I am online', 'chat-help'),
                                                'agent-offline-text' => esc_html__('I am offline', 'chat-help'),
                                                'agent-photo' => [
                                                    "url" => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/agent4.webp',
                                                ]
                                            ),
                                            array(
                                                'agent-name' => esc_html__('Garland D. Homer', 'chat-help'),
                                                'agent-number' => esc_html__('+8801123456588', 'chat-help'),
                                                'agent-designation' => esc_html__('Technical support', 'chat-help'),
                                                'agent-online-text' => esc_html__('I am online', 'chat-help'),
                                                'agent-offline-text' => esc_html__('I am offline', 'chat-help'),
                                                'agent-photo' => [
                                                    "url" => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/agent1.webp',
                                                ]
                                            ),
                                        )
                                    ),


                                    // Show search field
                                    array(
                                        'id' => 'bubble-search',
                                        'type' => 'switcher',
                                        'title' => esc_html__('Show Searh Field?', 'chat-help'),
                                        'default' => true,
                                        'text_on' => esc_html__('Yes', 'chat-help'),
                                        'text_off' => esc_html__('No', 'chat-help'),
                                        'dependency' => array('chat_layout', '==', 'multi', 'any'),
                                    ),

                                    // Agent list or grid
                                    array(
                                        'id' => 'agent-listGrid',
                                        'type' => 'button_set',
                                        'title' => esc_html__('Agent Listing Style', 'chat-help'),
                                        'default' => 'list',
                                        'options' => array(
                                            'list' => array(
                                                'text' => esc_html__('List', 'chat-help'),
                                            ),
                                            'grid' => array(
                                                'text' => esc_html__('Grid', 'chat-help'),
                                            ),
                                        ),
                                        'dependency' => array('chat_layout', '==', 'multi', 'any'),
                                    ),
                                )
                            ),
                            array(
                                'title' => esc_html__('Button', 'chat-help'),
                                'icon'  => 'icofont-scroll-double-right',
                                'fields' => array(
                                    array(
                                        'id' => 'opt-button-style',
                                        'type' => 'image_select',
                                        'title' => esc_html__('Button Style', 'chat-help'),
                                        'options' => array(
                                            '1' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/button-1.svg',
                                            '2' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/button-2.svg',
                                            '3' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/button-3.svg',
                                            '4' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/button-4.svg',
                                            '5' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/button-5.svg',
                                            '6' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/button-6.svg',
                                            '7' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/button-7.svg',
                                            '8' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/button-8.svg',
                                            '9' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/button-9.svg',
                                        ),
                                        'default' => '1',
                                    ),


                                    // Button text

                                    array(
                                        'id' => 'bubble-text',
                                        'type' => 'text',
                                        'title' => esc_html__('Button Text', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/button_text.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Change text to show in button.', 'chat-help') . '</div>',
                                        'default' => esc_html__('How may I help you?', 'chat-help'),
                                        'dependency' => array('opt-button-style', '!=', '1', 'any'),
                                    ),

                                    // Show hide icon
                                    array(
                                        'id' => 'disable-button-icon',
                                        'type' => 'switcher',
                                        'title' => esc_html__('Show/Hide Icon', 'chat-help'),
                                        'text_on' => esc_html__('Show', 'chat-help'),
                                        'text_off' => esc_html__('Hide', 'chat-help'),
                                        'default' => true,
                                        'text_width' => 80,
                                        'dependency' => array('opt-button-style', '!=', '1', 'any'),
                                    ),

                                    // Circle button icon
                                    array(
                                        'id' => 'circle-button-icon-1',
                                        'type' => 'button_set',
                                        'title' => esc_html__('Icon For Circle Button', 'chat-help'),
                                        'options' => array(
                                            'icofont-brand-whatsapp'    => array(
                                                'text' => '<i class="icofont-brand-whatsapp"></i>',
                                            ),
                                            'icofont-whatsapp'    => array(
                                                'text' => '<i class="icofont-whatsapp"></i>',
                                            ),
                                            'icofont-live-support'    => array(
                                                'text' => '<i class="icofont-live-support"></i>',
                                            ),
                                            'icofont-ui-messaging'    => array(
                                                'text' => '<i class="icofont-ui-messaging"></i>',
                                            ),
                                            'icofont-telegram'    => array(
                                                'text' => '<i class="icofont-telegram"></i>',
                                            ),
                                            'icofont-life-buoy'    => array(
                                                'text' => '<i class="icofont-life-buoy"></i>',
                                            ),
                                            'native'    => array(
                                                'text' => esc_html__('Native', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                            'custom'    => array(
                                                'text' => esc_html__('Custom', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                        ),
                                        'default' => 'icofont-brand-whatsapp',
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/circle_icon.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Change icon for circle button.', 'chat-help') . '</div>',
                                        'dependency' => array('opt-button-style', '==', '1', 'any'),
                                    ),

                                    // Circle button icon close
                                    array(
                                        'id' => 'circle-button-close-1',
                                        'type' => 'button_set',
                                        'title' => esc_html__('Icon For Circle Button Close ', 'chat-help'),
                                        'options' => array(
                                            'icofont-close'    => array(
                                                'text' => '<i class="icofont-close"></i>',
                                            ),
                                            'icofont-close-line'    => array(
                                                'text' => '<i class="icofont-close-line"></i>',
                                            ),
                                            'icofont-close-circled'    => array(
                                                'text' => '<i class="icofont-close-circled"></i>',
                                            ),
                                            'icofont-ui-close'    => array(
                                                'text' => '<i class="icofont-ui-close"></i>',
                                            ),
                                            'icofont-close-squared-alt'    => array(
                                                'text' => '<i class="icofont-close-squared-alt"></i>',
                                            ),
                                            'native'    => array(
                                                'text' => esc_html__('Native', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                            'custom'    => array(
                                                'text' => esc_html__('Custom', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                        ),
                                        'default' => 'icofont-close',
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/close_icon.png') . '" alt=""></div> <div class="chat-whatsapp-info-label">' . esc_html__('Change icon for circle button close.', 'chat-help') . '</div>',
                                        'dependency' => array('opt-button-style', '==', '1', 'any'),
                                    ),
                                    // Circle button icon
                                    array(
                                        'id' => 'circle-button-icon',
                                        'type' => 'button_set',
                                        'title' => esc_html__('Icon For Circle Button', 'chat-help'),
                                        'options' => array(
                                            'icofont-brand-whatsapp'    => array(
                                                'text' => '<i class="icofont-brand-whatsapp"></i>',
                                            ),
                                            'icofont-whatsapp'    => array(
                                                'text' => '<i class="icofont-whatsapp"></i>',
                                            ),
                                            'icofont-live-support'    => array(
                                                'text' => '<i class="icofont-live-support"></i>',
                                            ),
                                            'icofont-ui-messaging'    => array(
                                                'text' => '<i class="icofont-ui-messaging"></i>',
                                            ),
                                            'icofont-telegram'    => array(
                                                'text' => '<i class="icofont-telegram"></i>',
                                            ),
                                            'icofont-life-buoy'    => array(
                                                'text' => '<i class="icofont-life-buoy"></i>',
                                            ),
                                            'native'    => array(
                                                'text' => esc_html__('Native', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                            'custom'    => array(
                                                'text' => esc_html__('Custom', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                        ),
                                        'default' => 'icofont-brand-whatsapp',
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/circle_icon.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Change icon for circle button.', 'chat-help') . '</div>',
                                        'dependency' => array('disable-button-icon|opt-button-style', '==|!=', 'true|1', 'any'),
                                    ),

                                    // Circle button icon close
                                    array(
                                        'id' => 'circle-button-close',
                                        'type' => 'button_set',
                                        'title' => esc_html__('Icon For Circle Button Close ', 'chat-help'),
                                        'options' => array(
                                            'icofont-close'    => array(
                                                'text' => '<i class="icofont-close"></i>',
                                            ),
                                            'icofont-close-line'    => array(
                                                'text' => '<i class="icofont-close-line"></i>',
                                            ),
                                            'icofont-close-circled'    => array(
                                                'text' => '<i class="icofont-close-circled"></i>',
                                            ),
                                            'icofont-ui-close'    => array(
                                                'text' => '<i class="icofont-ui-close"></i>',
                                            ),
                                            'icofont-close-squared-alt'    => array(
                                                'text' => '<i class="icofont-close-squared-alt"></i>',
                                            ),
                                            'native'    => array(
                                                'text' => esc_html__('Native', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                            'custom'    => array(
                                                'text' => esc_html__('Custom', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                        ),
                                        'default' => 'icofont-close',
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/circle_icon.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Change icon for circle button close.', 'chat-help') . '</div>',
                                        'dependency' => array('disable-button-icon|opt-button-style', '==|!=', 'true|1', 'any'),
                                    ),

                                    // changeing circle animations
                                    array(
                                        'id' => 'circle-animation',
                                        'type' => 'select',
                                        'title' => esc_html__('Transition Effect for Circle Icon', 'chat-help'),
                                        'options' => array(
                                            '1' => esc_html__('Slide down', 'chat-help'),
                                            '2' => esc_html__('Rotate', 'chat-help'),
                                            '3' => esc_html__('Fade', 'chat-help'),
                                            '4' => esc_html__('Slide Up', 'chat-help'),
                                        ),
                                        'default' => '1',
                                        'dependency' => array('chat_layout', 'any', 'form,agent,multi', 'any'),
                                    ),


                                    // Button padding
                                    array(
                                        'id' => 'bubble-button-padding',
                                        'type' => 'spacing',
                                        'title' => esc_html__('Button Padding', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Change button padding', 'chat-help') . '</div>',
                                        'default' => array(
                                            'top' => '5',
                                            'right' => '15',
                                            'bottom' => '5',
                                            'left' => '15',
                                            'unit' => 'px',
                                        ),
                                        'dependency' => array('opt-button-style', '!=', '1', 'any'),
                                    ),
                                    array(
                                        'id' => 'bubble_button_tooltip',
                                        'type' => 'button_set',
                                        'title' => esc_html__('Button Tooltip', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/tooltip.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Show button tooltip.', 'chat-help') . '</div>',
                                        'options' => array(
                                            'on_hover' => array(
                                                'text' => esc_html__('On hover', 'chat-help'),
                                            ),
                                            'show' => array(
                                                'text' => esc_html__('Show', 'chat-help'),
                                            ),
                                            'hide' => array(
                                                'text' => esc_html__('Hide', 'chat-help'),
                                            )
                                        ),
                                        'default' => 'on_hover',
                                    ),
                                    array(
                                        'id' => 'bubble_button_tooltip_text',
                                        'type' => 'text',
                                        'title' => esc_html__('Button Tooltip Text', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/tooltip.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Set button tooltip text.', 'chat-help') . '</div>',
                                        'default' => esc_html__('Need Help? Chat with us', 'chat-help'),
                                        'dependency' => array('bubble_button_tooltip', '!=', 'hide', 'any'),
                                    ),
                                    array(
                                        'id' => 'bubble_button_tooltip_background',
                                        'type' => 'color',
                                        'title' => esc_html__('Button Tooltip Background', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Set button tooltip background color.', 'chat-help') . '</div>',
                                        'default' => '#f5f7f9',
                                        'dependency' => array('bubble_button_tooltip', '!=', 'hide', 'any'),
                                    ),
                                    array(
                                        'id' => 'bubble_button_tooltip_width',
                                        'type' => 'slider',
                                        'title' => esc_html__('Button Tooltip Width', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/tooltip_width.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Set bubble button tooltip width.', 'chat-help') . '</div>',
                                        'min' => 20,
                                        'max' => 500,
                                        'step' => 5,
                                        'unit' => 'px',
                                        'default' => 190,
                                        'dependency' => array('bubble_button_tooltip', '!=', 'hide', 'any'),
                                    ),
                                ),
                            ),
                            array(
                                'title' => esc_html__('Visibility', 'chat-help'),
                                'icon' => 'icofont-eye-open',
                                'fields' => array(
                                    array(
                                        'id'       => 'visibility',
                                        'type'     => 'checkbox',
                                        'class'    => 'chat_whatsapp_column_2 visibility',
                                        'title'    => esc_html__('Visibility by', 'chat-help'),
                                        'title_help' => esc_html__('Check the option(s) to visibility by different options.', 'chat-help'),
                                        'options'  => array(
                                            'theme_page'        => esc_html__('Theme Pages', 'chat-help'),
                                            'page'              => esc_html__('Pages', 'chat-help'),
                                            'posts'             => esc_html__('Posts (Pro)', 'chat-help'),
                                            'product'           => esc_html__('Products (Pro)', 'chat-help'),
                                            'category'          => esc_html__('Post Categories (Pro)', 'chat-help'),
                                            'tags'              => esc_html__('Post Tags (Pro)', 'chat-help'),
                                            'product_category'  => esc_html__('Porduct Categories (Pro)', 'chat-help'),
                                            'product_tags'      => esc_html__('Porduct Tags (Pro)', 'chat-help'),
                                        ),
                                    ),
                                    array(
                                        'id'            => 'visibility_by_theme_page',
                                        'type'          => 'accordion',
                                        'class'         => 'padding-t-0',
                                        'dependency'    => array('visibility', 'any', 'theme_page', 'any'),
                                        'accordions'    => array(
                                            array(
                                                'title'     => esc_html__('Theme Pages', 'chat-help'),
                                                // 'icon'      => 'fa fa-heart',
                                                'fields'    => array(
                                                    array(
                                                        'id'    => 'theme_page_target',
                                                        'type'  => 'select',
                                                        'title' => esc_html__('Target', 'chat-help'),
                                                        'options'   => array(
                                                            'include'   => esc_html__('Include', 'chat-help'),
                                                            'exclude'   => esc_html__('Exclude', 'chat-help'),
                                                        )
                                                    ),
                                                    array(
                                                        'id'    => 'theme_page_all',
                                                        'type'  => 'checkbox',
                                                        'title' => esc_html__('All Theme Pages', 'chat-help'),
                                                    ),
                                                    // Include specific
                                                    array(
                                                        'id'      => 'theme_page',
                                                        'type'    => 'select',
                                                        'title'   => esc_html__('Theme Pages', 'chat-help'),
                                                        'options'    => array(
                                                            'post_page' => esc_html__('Blog Page', 'chat-help'),
                                                            '404_page' => esc_html__('404 Page', 'chat-help'),
                                                            'search_page' => esc_html__('Search Page', 'chat-help'),
                                                        ),
                                                        'chosen'      => true,
                                                        'multiple'     => true,
                                                        'sortable'    => true,
                                                        'dependency'    => array('theme_page_all', '!=', 'true', 'any'),
                                                    ),
                                                )
                                            ),
                                        )
                                    ),
                                    array(
                                        'id'            => 'visibility_by_page',
                                        'type'          => 'accordion',
                                        'class'         => 'padding-t-0',
                                        'dependency'    => array('visibility', 'any', 'page', 'any'),
                                        'accordions'    => array(
                                            array(
                                                'title'     => esc_html__('Pages', 'chat-help'),
                                                // 'icon'      => 'fa fa-heart',
                                                'fields'    => array(
                                                    array(
                                                        'id'    => 'page_target',
                                                        'type'  => 'select',
                                                        'title' => esc_html__('Target', 'chat-help'),
                                                        'options'   => array(
                                                            'include'   => esc_html__('Include', 'chat-help'),
                                                            'exclude'   => esc_html__('Exclude', 'chat-help'),
                                                        )
                                                    ),
                                                    array(
                                                        'id'    => 'page_all',
                                                        'type'  => 'checkbox',
                                                        'title' => esc_html__('All Pages', 'chat-help'),
                                                    ),
                                                    // Include specific
                                                    array(
                                                        'id'      => 'page',
                                                        'type'    => 'select',
                                                        'title'   => esc_html__('Pages', 'chat-help'),
                                                        'options'    => 'pages',
                                                        'chosen'      => true,
                                                        'multiple'     => true,
                                                        'sortable'    => true,
                                                        'empty_message'    => esc_html__('You don\'t have any pages available.', 'chat-help'),
                                                        'dependency'    => array('page_all', '!=', 'true', 'any'),
                                                    ),
                                                )
                                            ),
                                        )
                                    ),

                                    // Button visibility
                                    array(
                                        'id'      => 'bubble-visibility',
                                        'type'    => 'button_set',
                                        'title'   => esc_html__('Device Visibility', 'chat-help'),
                                        'title_help' =>  esc_html__('Everywhere = All kind of devices.', 'chat-help') . '<br />' . esc_html__('Deskop Only = 991px bigger devices.', 'chat-help') . '<br />' . esc_html__('Tablet Only = 576px - 991px devices.', 'chat-help'). '<br />' . esc_html__('Mobile Only = Less than 576px devices.', 'chat-help'),
                                        'default' => 'everywhere',
                                        'options'    => array(
                                            'everywhere' => array(
                                                'text' => esc_html__('Everywhere', 'chat-help'),
                                            ),
                                            'desktop'    => array(
                                                'text' => esc_html__('Desktop Only', 'chat-help'),
                                            ),
                                            'tablet'     => array(
                                                'text' => esc_html__('Tablet Only', 'chat-help'),
                                            ),
                                            'mobile'     => array(
                                                'text' => esc_html__('Mobile Only', 'chat-help'),
                                            ),
                                        ),
                                    ),
                                ),
                            ),

                            array(
                                'title'  => esc_html__('Others', 'chat-help'),
                                'icon'   => 'icofont-settings',
                                'fields' => array(
                                    // Autometically show popup
                                    array(
                                        'id'        => 'autoshow-popup',
                                        'type'      => 'switcher',
                                        'title'     => esc_html__('Auto Open Popup', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Turn ON for open popup automatically.', 'chat-help') . '</div>',
                                        'default'   => false,
                                        'dependency' => array('chat_layout', '!=', 'button', 'any'),
                                    ),

                                    // Auto open popup timeout
                                    array(
                                        'id' => 'auto_open_popup_timeout',
                                        'type' => 'slider',
                                        'title' => esc_html__('Auto Open Popup Timeout', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Timeout value for opening popup after second.', 'chat-help') . '</div>',
                                        'min' => 0,
                                        'max' => 100,
                                        'step' => 1,
                                        'default' => 0,
                                        'dependency' => array('autoshow-popup|chat_layout', '==|!=', 'true|button', 'any'),
                                    ),

                                    // Changing bubble animations
                                    array(
                                        'id'    => 'select-animation',
                                        'type'  => 'select',
                                        'title' => esc_html__('Select Animation For Bubble', 'chat-help'),
                                        'options' => array(
                                            '1'     => esc_html__('Fade Right', 'chat-help'),
                                            '2'     => esc_html__('Fade Down', 'chat-help'),
                                            '4'     => esc_html__('Fade In Scale', 'chat-help'),
                                            '5'     => esc_html__('Rotation', 'chat-help'),
                                            '6'     => esc_html__('Slide Fall', 'chat-help'),
                                            '7'     => esc_html__('Slide Down', 'chat-help'),
                                            '3'     => esc_html__('Ease Down', 'chat-help'),
                                            '8'     => esc_html__('Rotate Left', 'chat-help'),
                                            '9'     => esc_html__('Flip Horizontal', 'chat-help'),
                                            '10'    => esc_html__('Flip Vertical', 'chat-help'),
                                            '11'    => esc_html__('Flip Up', 'chat-help'),
                                            '12'    => esc_html__('Super Scaled', 'chat-help'),
                                            '13'    => esc_html__('Slide Up', 'chat-help'),
                                            'random' => esc_html__('Random', 'chat-help'),
                                        ),
                                        'default'     => 'random',
                                        'dependency' => array('chat_layout', '!=', 'button', 'any'),
                                    ),

                                    // Header content position
                                    array(
                                        'id'      => 'bubble-style',
                                        'type'    => 'button_set',
                                        'title'   => esc_html__('Select Bubble Layout Mode', 'chat-help'),
                                        'default' => 'default',
                                        'options' => array(
                                            'default' => array(
                                                'text' => esc_html__('Light mode', 'chat-help'),
                                            ),
                                            'dark'    => array(
                                                'text' => esc_html__('Dark mode', 'chat-help'),
                                            ),
                                            'night'   => array(
                                                'text' => esc_html__('Night mode', 'chat-help'),
                                            ),
                                        ),
                                    ),
                                    array(
                                        'id'        => 'color_settings',
                                        'type'      => 'color_group',
                                        'title'     => esc_html__('Color Settings', 'chat-help'),
                                        'title_help' => '<div class="chat-whatsapp-img-tag"><img src="' . esc_url(CHAT_WHATSAPP_DIR_URL . 'src/assets/image/preview/brand_color.png') . '" alt="' . esc_html__('Preview Image', 'chat-help') . '"></div> <div class="chat-whatsapp-info-label">' . esc_html__('Change Brand Colors.', 'chat-help') . '</div>',
                                        'options'   => array(
                                            'primary' => esc_html__('Primary', 'chat-help'),
                                            'secondary' => esc_html__('Secondary', 'chat-help'),
                                        ),
                                        'default'   => array(
                                            'primary' => '#118c7e',
                                            'secondary' => '#0b5a51',
                                        ),
                                    ),
                                    array(
                                        'id'    => 'heading',
                                        'type'  => 'heading',
                                        'title' => esc_html__('Button Positioning', 'chat-help'),
                                    ),
                                    array(
                                        'id'      => 'bubble-position',
                                        'type'    => 'button_set',
                                        'title'   => esc_html__('Bubble Position', 'chat-help'),
                                        'default' => 'right_bottom',
                                        'options'    => array(
                                            'right_bottom'   => array(
                                                'text' => esc_html__('Right Bottom', 'chat-help'),
                                            ),
                                            'left_bottom' => array(
                                                'text' => esc_html__('Left Bottom', 'chat-help'),
                                            ),
                                            'right_middle' => array(
                                                'text'     => esc_html__('Right Middle', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                            'left_middle'  => array(
                                                'text'     => esc_html__('Left Middle', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                        ),
                                    ),

                                    array(
                                        'id'    => 'right_bottom',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Right Bottom', 'chat-help'),
                                        'top'   => false,
                                        'left'  => false,
                                        'default'  => array(
                                            'right'    => '30',
                                            'bottom'  => '30',
                                            'unit'   => 'px',
                                        ),
                                        'dependency' => array('bubble-position', '==', 'right_bottom', 'any'),
                                    ),

                                    array(
                                        'id'    => 'left_bottom',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Left Bottom', 'chat-help'),
                                        'top'   => false,
                                        'right'  => false,
                                        'default'  => array(
                                            'left'    => '30',
                                            'bottom'  => '30',
                                            'unit'   => 'px',
                                        ),
                                        'dependency' => array('bubble-position', '==', 'left_bottom', 'any'),
                                    ),

                                    array(
                                        'id'    => 'right_middle',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Right Middle', 'chat-help'),
                                        'top'   => false,
                                        'left'  => false,
                                        'bottom'  => false,
                                        'default'  => array(
                                            'right'    => '20',
                                            'unit'   => 'px',
                                        ),
                                        'dependency' => array('bubble-position', '==', 'right_middle', 'any'),
                                    ),

                                    array(
                                        'id'    => 'left_middle',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Left Middle', 'chat-help'),
                                        'top'   => false,
                                        'right' => false,
                                        'bottom' => false,
                                        'default'  => array(
                                            'left' => '20',
                                            'unit' => 'px',
                                        ),
                                        'dependency' => array('bubble-position', '==', 'left_middle', 'any'),
                                    ),

                                    array(
                                        'type'  => 'subheading',
                                        'title' => esc_html__('Different Positioning on Tablet', 'chat-help'),
                                        'dependency' => array('bubble-visibility', '==', 'everywhere', 'any'),
                                    ),

                                    array(
                                        'id'    => 'enable-positioning-tablet',
                                        'type'  => 'switcher',
                                        'class'    => 'switcher_pro_only',
                                        'title' => esc_html__('Use Different Positioning For Tablet Devices', 'chat-help'),
                                        'text_on' => esc_html__('Yes', 'chat-help'),
                                        'text_off'  => esc_html__('No', 'chat-help'),
                                        'dependency' => array('bubble-visibility', '==', 'everywhere', 'any'),
                                    ),

                                    // Bubble position
                                    array(
                                        'id'      => 'bubble-position-tablet',
                                        'type'    => 'button_set',
                                        'title'   => esc_html__('Bubble Position', 'chat-help'),
                                        'default' => 'right_bottom',
                                        'options'    => array(
                                            'right_bottom' => array(
                                                'text' => esc_html__('Right Bottom', 'chat-help'),
                                            ),
                                            'left_bottom'  => array(
                                                'text' => esc_html__('Left Bottom', 'chat-help'),
                                            ),
                                            'right_middle' => array(
                                                'text'     => esc_html__('Right Middle', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                            'left_middle'  => array(
                                                'text'     => esc_html__('Left Middle', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                        ),
                                        'dependency' => array('enable-positioning-tablet|bubble-visibility', '==|==', 'true|everywhere', 'any'),
                                    ),

                                    array(
                                        'id'    => 'right_bottom_tablet',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Right Bottom', 'chat-help'),
                                        'top'   => false,
                                        'left'  => false,
                                        'default'  => array(
                                            'right'    => '30',
                                            'bottom'  => '30',
                                            'unit'   => 'px',
                                        ),
                                        'dependency' => array('bubble-position-tablet|enable-positioning-tablet|bubble-visibility', '==|==|==', 'right_bottom|true|everywhere', 'any'),
                                    ),

                                    array(
                                        'id'    => 'left_bottom_tablet',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Left Bottom', 'chat-help'),
                                        'top'   => false,
                                        'right'  => false,
                                        'default'  => array(
                                            'left'    => '30',
                                            'bottom'  => '30',
                                            'unit'   => 'px',
                                        ),
                                        'dependency' => array('bubble-position-tablet|enable-positioning-tablet|bubble-visibility', '==|==|==', 'left_bottom|true|everywhere', 'any'),
                                    ),

                                    array(
                                        'id'    => 'right_middle_tablet',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Right Middle', 'chat-help'),
                                        'top'   => false,
                                        'left'  => false,
                                        'bottom'  => false,
                                        'default'  => array(
                                            'right'    => '20',
                                            'unit'   => 'px',
                                        ),
                                        'dependency' => array('bubble-position-tablet|enable-positioning-tablet|bubble-visibility', '==|==|==', 'right_middle|true|everywhere', 'any'),
                                    ),

                                    array(
                                        'id'    => 'left_middle_tablet',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Left Middle', 'chat-help'),
                                        'top'   => false,
                                        'right' => false,
                                        'bottom' => false,
                                        'default'  => array(
                                            'left' => '20',
                                            'unit' => 'px',
                                        ),
                                        'dependency' => array('bubble-position-tablet|enable-positioning-tablet|bubble-visibility', '==|==|==', 'left_middle|true|everywhere', 'any'),
                                    ),

                                    array(
                                        'type'  => 'subheading',
                                        'title' => esc_html__('Different Positioning on Mobile', 'chat-help'),
                                        'dependency'    => array('bubble-visibility', '==', 'everywhere', 'any')
                                    ),
                                    array(
                                        'id'    => 'enable-positioning-mobile',
                                        'type'  => 'switcher',
                                        'class'    => 'switcher_pro_only',
                                        'title' => esc_html__('Use Different Positioning for Mobile Devices', 'chat-help'),
                                        'text_on' => esc_html__('Yes', 'chat-help'),
                                        'text_off'  => esc_html__('No', 'chat-help'),
                                        'dependency'    => array('bubble-visibility', '==', 'everywhere', 'any')
                                    ),

                                    // Bubble position
                                    array(
                                        'id'      => 'bubble-position-mobile',
                                        'type'    => 'button_set',
                                        'title'   => esc_html__('Bubble position', 'chat-help'),
                                        'default' => 'right_bottom',
                                        'options'    => array(
                                            'right_bottom' => array(
                                                'text' => esc_html__('Right Bottom', 'chat-help'),
                                            ),
                                            'left_bottom'  => array(
                                                'text' => esc_html__('Left Bottom', 'chat-help'),
                                            ),
                                            'right_middle' => array(
                                                'text'     => esc_html__('Right Middle', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                            'left_middle'  => array(
                                                'text'     => esc_html__('Left Middle', 'chat-help'),
                                                'pro_only' => true,
                                            ),
                                        ),
                                        'dependency' => array('enable-positioning-mobile|bubble-visibility', '==|==', 'true|everywhere', 'any'),
                                    ),

                                    array(
                                        'id'    => 'right_bottom_mobile',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Right Bottom', 'chat-help'),
                                        'top'   => false,
                                        'left'  => false,
                                        'default'  => array(
                                            'right'    => '30',
                                            'bottom'  => '30',
                                            'unit'   => 'px',
                                        ),
                                        'dependency' => array('bubble-position-mobile|enable-positioning-mobile|bubble-visibility', '==|==|==', 'right_bottom|true|everywhere', 'any'),
                                    ),

                                    array(
                                        'id'    => 'left_bottom_mobile',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Left Bottom', 'chat-help'),
                                        'top'   => false,
                                        'right'  => false,
                                        'default'  => array(
                                            'left'    => '30',
                                            'bottom'  => '30',
                                            'unit'   => 'px',
                                        ),
                                        'dependency' => array('bubble-position-mobile|enable-positioning-mobile|bubble-visibility', '==|==|==', 'left_bottom|true|evenywhere', 'any'),
                                    ),

                                    array(
                                        'id'    => 'right_middle_mobile',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Right Middle', 'chat-help'),
                                        'top'   => false,
                                        'left'  => false,
                                        'bottom'  => false,
                                        'default'  => array(
                                            'right'    => '20',
                                            'unit'   => 'px',
                                        ),
                                        'dependency' => array('bubble-position-mobile|enable-positioning-mobile|bubble-visibility', '==|==|==', 'right_middle|true|everywhere', 'any'),
                                    ),

                                    array(
                                        'id'    => 'left_middle_mobile',
                                        'type'  => 'spacing',
                                        'title' => esc_html__('Margin From Left Middle', 'chat-help'),
                                        'top'   => false,
                                        'right' => false,
                                        'bottom' => false,
                                        'default'  => array(
                                            'left' => '20',
                                            'unit' => 'px',
                                        ),
                                        'dependency' => array('bubble-position-mobile|enable-positioning-mobile|bubble-visibility', '==|==|==', 'left_middle|true|everywhere', 'any'),
                                    ),
                                )
                            ),
                        ),
                    ),
                )
            ),
        );
    }
}
