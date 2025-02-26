<?php
/**
 * JETI_Integration_Settings Class
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined( 'ABSPATH' ) || exit;

/**
 * JETI_Integration_Settings Class
 */
class JETI_Integration_Settings {

    /**
     * @var string
     */
    public $id = 'jetapi';

    /**
     * @var string
     */
    public $plugin_id = 'jeti_';

    /**
     * @var array
     */
    public $form_fields = array();

    /**
     * @var array
     */
    public $settings = array();

    /**
     * Constructor for the integration.
     */
    public function __construct() {
        $this->init_form_fields();
        $this->init_settings();

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
    }

    /**
     * Initialize integration settings form fields.
     */
    public function init_form_fields() {
        $this->form_fields = array(
            'enable_notifications' => array(
                'title'       => __( 'Enable Notifications', 'jetapi-integration-for-woocommerce' ),
                'type'        => 'checkbox',
                'label'       => __( 'Enable notifications sending on order status changes', 'jetapi-integration-for-woocommerce' ),
                'default'     => 'yes',
            ),
            'bearer_token' => array(
                'title'       => __( 'Bearer Token', 'jetapi-integration-for-woocommerce' ),
                'type'        => 'text',
                'description' => __( 'Enter your JetAPI Bearer Token for authentication. This is the only authentication method required.', 'jetapi-integration-for-woocommerce' ),
                'desc_tip'    => true,
                'default'     => '',
            ),
            'sender_name' => array(
                'type'        => 'hidden',
                'default'     => 'JETAPI.IO',
            ),
            'cascade_sending' => array(
                'title'       => __( 'Cascade Sending Order', 'jetapi-integration-for-woocommerce' ),
                'type'        => 'ordered_multiselect',
                'description' => __( 'Select and order the channels to use for cascade sending. The order determines the priority. Drag and drop to reorder.', 'jetapi-integration-for-woocommerce' ),
                'desc_tip'    => false,
                'options'     => array(
                    'whatsapp' => __( 'WhatsApp', 'jetapi-integration-for-woocommerce' ),
                    'tdlib' => __( 'Telegram', 'jetapi-integration-for-woocommerce' ),
                    'sms'      => __( 'SMS', 'jetapi-integration-for-woocommerce' ),
                ),
                'default'     => array('whatsapp', 'tdlib', 'sms'),
            ),
            'channel_whatsapp' => array(
                'title'       => __( 'WhatsApp', 'jetapi-integration-for-woocommerce' ),
                'type'        => 'checkbox',
                'label'       => __( 'Enable WhatsApp for order status changes', 'jetapi-integration-for-woocommerce' ),
                'default'     => 'yes',
            ),
            'channel_tdlib' => array(
                'title'       => __( 'Telegram', 'jetapi-integration-for-woocommerce' ),
                'type'        => 'checkbox',
                'label'       => __( 'Enable Telegram for order status changes', 'jetapi-integration-for-woocommerce' ),
                'default'     => 'yes',
            ),
            'channel_sms' => array(
                'title'       => __( 'SMS', 'jetapi-integration-for-woocommerce' ),
                'type'        => 'checkbox',
                'label'       => __( 'Enable SMS for order status changes', 'jetapi-integration-for-woocommerce' ),
                'default'     => 'yes',
            ),
            'use_jetapi_channels' => array(
                'title'       => __( 'JetAPI Channels', 'jetapi-integration-for-woocommerce' ),
                'type'        => 'checkbox',
                'label'       => __( 'Use JetAPI channels and order', 'jetapi-integration-for-woocommerce' ),
                'description' => __( 'When checked, selected channels and cascade sending order will be ignored for order status changes. JetAPI will determine the channels and order.', 'jetapi-integration-for-woocommerce' ),
                'default'     => 'no',
            ),
            'notification_triggers' => array(
                'title'       => __( 'Notification Triggers', 'jetapi-integration-for-woocommerce' ),
                'type'        => 'multicheck',
                'description' => __( 'Select the WooCommerce events that should trigger notifications.', 'jetapi-integration-for-woocommerce' ),
                'desc_tip'    => false,
                'options'     => array(
                    'new_order'          => __( 'New Order', 'jetapi-integration-for-woocommerce' ),
                    'cancelled_order'    => __( 'Cancelled Order', 'jetapi-integration-for-woocommerce' ),
                    'order_on_hold'      => __( 'Order On Hold', 'jetapi-integration-for-woocommerce' ),
                    'processing_order'   => __( 'Processing Order', 'jetapi-integration-for-woocommerce' ),
                    'completed_order'    => __( 'Completed Order', 'jetapi-integration-for-woocommerce' ),
                    'refunded_order'     => __( 'Refunded Order', 'jetapi-integration-for-woocommerce' ),
                ),
                'default'     => array('new_order', 'completed_order'),
            ),
            'user_plan' => array(
                'type'        => 'hidden',
                'default'     => 'none',
            ),
            'account_info' => array(
                'title'       => __( 'Account Information', 'jetapi-integration-for-woocommerce' ),
                'type'        => 'account_info',
                'description' => '',
                'desc_tip'    => false,
            ),
        );
    }

    /**
     * Initialize settings.
     */
    public function init_settings() {
        $this->settings = get_option('jeti_settings', array());
        if (empty($this->settings)) {
            $this->settings = array();
            foreach ($this->form_fields as $key => $field) {
                $this->settings[$key] = isset($field['default']) ? $field['default'] : '';
            }
        }

        $array_fields = ['cascade_sending', 'notification_triggers'];

        foreach ($array_fields as $field) {
            if (isset($this->settings[$field])) {
                if (is_string($this->settings[$field])) {
                    $this->settings[$field] = explode(',', $this->settings[$field]);
                } elseif (!is_array($this->settings[$field])) {
                    $this->settings[$field] = $this->form_fields[$field]['default'] ?? array();
                }
            } else {
                $this->settings[$field] = $this->form_fields[$field]['default'] ?? array();
            }
        }
    }

    /**
     * Enqueue admin scripts and styles.
     */
    public function enqueue_admin_scripts() {
        wp_enqueue_script( 'jquery-ui-sortable' );
        wp_enqueue_script( 'jeti-admin-js', JETI_PLUGIN_URL . 'assets/js/admin-script.js', array( 'jquery', 'jquery-ui-sortable' ), JETI_VERSION, true );
    }

    /**
     * Get option from DB.
     *
     * @param  string $key Option key.
     * @param  mixed  $empty_value Value when empty.
     * @return mixed The value specified for the option or a default value for the option.
     */
    public function get_option( $key, $empty_value = null ) {
        if ( empty( $this->settings ) ) {
            $this->init_settings();
        }

        // Get option default if unset.
        if ( ! isset( $this->settings[ $key ] ) ) {
            $form_fields = $this->get_form_fields();
            $this->settings[ $key ] = isset( $form_fields[ $key ] ) ? $this->get_field_default( $form_fields[ $key ] ) : '';
        }

        if ( ! is_null( $empty_value ) && '' === $this->settings[ $key ] ) {
            $this->settings[ $key ] = $empty_value;
        }

        return $this->settings[ $key ];
    }

    /**
     * Get a field default value. Defaults to '' if not set.
     *
     * @param array $field
     * @return string
     */
    public function get_field_default( $field ) {
        return empty( $field['default'] ) ? '' : $field['default'];
    }

    /**
     * Get the form fields after they are initialized.
     *
     * @return array of options
     */
    public function get_form_fields() {
        return apply_filters( 'jetapi_settings_api_form_fields_' . $this->id, $this->form_fields );
    }

    /**
     * Get field key.
     *
     * @param string $key
     * @return string
     */
    public function get_field_key( $key ) {
        return $this->plugin_id . $this->id . '_' . $key;
    }

    /**
     * Generate HTML for the settings form.
     */
    public function generate_settings_html()
    {
        $html = '';
        foreach ($this->get_form_fields() as $k => $v)
        {
            $type = $this->get_field_type($v);
            if ($type === 'account_info')
            {
                $html .= $this->generate_account_info_html($k, $v);
            }
            else
            {
                $html .= $this->{'generate_' . $type . '_html'}($k, $v);
            }
        }
        return $html;
    }

    /**
     * Get field type.
     *
     * @param array $field
     * @return string
     */
    public function get_field_type( $field ) {
        return empty( $field['type'] ) ? 'text' : $field['type'];
    }

    /**
     * Generate Text Input HTML.
     *
     * @param string $key Field key.
     * @param array  $data Field data.
     * @return string
     */
    public function generate_text_html( $key, $data ) {
        $field_key = $this->get_field_key( $key );
        $defaults  = array(
            'title'             => '',
            'disabled'          => false,
            'class'             => '',
            'css'               => '',
            'placeholder'       => '',
            'type'              => 'text',
            'desc_tip'          => false,
            'description'       => '',
            'custom_attributes' => array(),
        );

        $data = wp_parse_args( $data, $defaults );

        ob_start();
        ?>
        <tr valign="top">
            <th scope="row" class="titledesc">
                <label for="<?php echo esc_attr( $field_key ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
                <?php echo wp_kses_post( $this->get_tooltip_html( $data ) ); ?>
            </th>
            <td class="forminp">
                <fieldset>
                    <legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
                    <input class="input-text regular-input <?php echo esc_attr( $data['class'] ); ?>" 
                        type="<?php echo esc_attr( $data['type'] ); ?>" 
                        name="<?php echo esc_attr( $field_key ); ?>" 
                        id="<?php echo esc_attr( $field_key ); ?>" 
                        style="<?php echo esc_attr( $data['css'] ); ?>" 
                        value="<?php echo esc_attr( $this->get_option( $key ) ); ?>" 
                        placeholder="<?php echo esc_attr( $data['placeholder'] ); ?>" 
                        <?php disabled( $data['disabled'], true ); ?> 
                        <?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); ?> />
                    <?php echo wp_kses_post( $this->get_description_html( $data ) ); ?>
                </fieldset>
            </td>
        </tr>
        <?php

        return ob_get_clean();
    }

    /**
     * Generate Select HTML.
     *
     * @param string $key Field key.
     * @param array  $data Field data.
     * @return string
     */
    public function generate_select_html( $key, $data ) {
        $field_key = $this->get_field_key( $key );
        $defaults  = array(
            'title'             => '',
            'disabled'          => false,
            'class'             => '',
            'css'               => '',
            'placeholder'       => '',
            'type'              => 'text',
            'desc_tip'          => false,
            'description'       => '',
            'custom_attributes' => array(),
            'options'           => array(),
        );

        $data = wp_parse_args( $data, $defaults );

        ob_start();
        ?>
        <tr valign="top">
            <th scope="row" class="titledesc">
                <label for="<?php echo esc_attr( $field_key ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
                <?php echo wp_kses_post( $this->get_tooltip_html( $data ) ); ?>
            </th>
            <td class="forminp">
                <fieldset>
                    <legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
                    <select class="select <?php echo esc_attr( $data['class'] ); ?>" name="<?php echo esc_attr( $field_key ); ?>" id="<?php echo esc_attr( $field_key ); ?>" style="<?php echo esc_attr( $data['css'] ); ?>" <?php disabled( $data['disabled'], true ); ?> <?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); ?>>
                        <?php foreach ( (array) $data['options'] as $option_key => $option_value ) : ?>
                            <option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $this->get_option( $key ), $option_key ); ?>><?php echo esc_html( $option_value ); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo wp_kses_post( $this->get_description_html( $data ) ); ?>
                </fieldset>
            </td>
        </tr>
        <?php

        return ob_get_clean();
    }

    /**
     * Generate Ordered Multiselect HTML.
     *
     * @param string $key Field key.
     * @param array  $data Field data.
     * @return string
     */
    public function generate_ordered_multiselect_html( $key, $data ) {
        $field_key = $this->get_field_key( $key );
        $defaults  = array(
            'title'             => '',
            'disabled'          => false,
            'class'             => '',
            'css'               => '',
            'placeholder'       => '',
            'type'              => 'text',
            'desc_tip'          => false,
            'description'       => '',
            'custom_attributes' => array(),
            'options'           => array(),
        );

        $data = wp_parse_args( $data, $defaults );
        $current_value = (array) $this->get_option( $key, array() );

        ob_start();
        ?>
        <tr valign="top">
            <th scope="row" class="titledesc">
                <label for="<?php echo esc_attr( $field_key ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
                <?php echo wp_kses_post( $this->get_tooltip_html( $data ) ); ?>
            </th>
            <td class="forminp">
                <fieldset>
                    <legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
                    <ul class="jetapi-ordered-multiselect <?php echo esc_attr( $data['class'] ); ?>" id="<?php echo esc_attr( $field_key ); ?>_list">
                        <?php
                        foreach ( $current_value as $option_key ) :
                            if ( isset( $data['options'][ $option_key ] ) ) :
                                ?>
                                <li data-value="<?php echo esc_attr( $option_key ); ?>">
                                    <input type="hidden" name="<?php echo esc_attr( $field_key ); ?>[]" value="<?php echo esc_attr( $option_key ); ?>" />
                                    <?php echo esc_html( $data['options'][ $option_key ] ); ?>
                                </li>
                                <?php
                            endif;
                        endforeach;

                        foreach ( $data['options'] as $option_key => $option_value ) :
                            if ( ! in_array( $option_key, $current_value ) ) :
                                ?>
                                <li data-value="<?php echo esc_attr( $option_key ); ?>">
                                    <input type="hidden" name="<?php echo esc_attr( $field_key ); ?>[]" value="<?php echo esc_attr( $option_key ); ?>" />
                                    <?php echo esc_html( $option_value ); ?>
                                </li>
                                <?php
                            endif;
                        endforeach;
                        ?>
                    </ul>
                    <?php echo wp_kses_post( $this->get_description_html( $data ) ); ?>
                </fieldset>
            </td>
        </tr>
        <?php

        return ob_get_clean();
    }

    /**
     * Generate Multicheck HTML.
     *
     * @param string $key Field key.
     * @param array  $data Field data.
     * @return string
     */
    public function generate_multicheck_html( $key, $data ) {
        $field_key = $this->get_field_key( $key );
        $defaults  = array(
            'title'             => '',
            'disabled'          => false,
            'class'             => '',
            'css'               => '',
            'placeholder'       => '',
            'type'              => 'text',
            'desc_tip'          => false,
            'description'       => '',
            'custom_attributes' => array(),
            'options'           => array(),
        );

        $data = wp_parse_args( $data, $defaults );
        $value = (array) $this->get_option( $key, array() );

        ob_start();
        ?>
        <tr valign="top">
            <th scope="row" class="titledesc">
                <label for="<?php echo esc_attr( $field_key ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
                <?php echo wp_kses_post( $this->get_tooltip_html( $data ) ); ?>
            </th>
            <td class="forminp">
                <fieldset>
                    <legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
                    <?php foreach ( $data['options'] as $option_key => $option_label ) : ?>
                        <label for="<?php echo esc_attr( $field_key ); ?>_<?php echo esc_attr( $option_key ); ?>">
                            <input type="checkbox" name="<?php echo esc_attr( $field_key ); ?>[]" id="<?php echo esc_attr( $field_key ); ?>_<?php echo esc_attr( $option_key ); ?>" value="<?php echo esc_attr( $option_key ); ?>" <?php checked( in_array( $option_key, $value ), true ); ?> />
                            <?php echo esc_html( $option_label ); ?>
                        </label>
                        <br />
                    <?php endforeach; ?>
                    <?php echo wp_kses_post( $this->get_description_html( $data ) ); ?>
                </fieldset>
            </td>
        </tr>
        <?php

        return ob_get_clean();
    }

    /**
     * Generate Account Info HTML.
     *
     * @param string $key Field key.
     * @param array  $data Field data.
     * @return string
     */
    public function generate_account_info_html( $key, $data ) {
        $auth = new JETI_Auth();
        $is_authenticated = JETI_Auth::is_authenticated();
        
        ob_start();
        ?>
        <tr valign="top">
            <th scope="row" class="titledesc">
                <?php echo wp_kses_post( $data['title'] ); ?>
                <?php echo wp_kses_post( $this->get_tooltip_html( $data ) ); ?>
            </th>
            <td class="forminp">
                <?php if ( $is_authenticated ) : ?>
                    <?php 
                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Output is pre-escaped in get_user_info_html()
                    echo $auth->get_user_info_html(); 
                    
                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Output is pre-escaped in get_logout_form()
                    echo $auth->get_logout_form(); 
                    ?>
                <?php else : ?>
                    <p><?php esc_html_e( 'You are not authenticated with JetAPI. Please enter your Bearer Token and save the settings to authenticate.', 'jetapi-integration-for-woocommerce' ); ?></p>
                <?php endif; ?>
                <?php echo wp_kses_post( $this->get_description_html( $data ) ); ?>
            </td>
        </tr>
        <?php
        return ob_get_clean();
    }

    /**
     * Get tooltip HTML.
     *
     * @param array $data
     * @return string
     */
    public function get_tooltip_html( $data ) {
        if ( true === $data['desc_tip'] ) {
            $tip = $data['description'];
        } elseif ( ! empty( $data['desc_tip'] ) ) {
            $tip = $data['desc_tip'];
        } else {
            $tip = '';
        }

        return $tip ? jeti_help_tip( $tip ) : '';
    }

    /**
     * Get description HTML.
     *
     * @param array $data
     * @return string
     */
    public function get_description_html( $data ) {
        if ( true === $data['desc_tip'] ) {
            $description = '';
        } elseif ( ! empty( $data['desc_tip'] ) ) {
            $description = $data['description'];
        } elseif ( ! empty( $data['description'] ) ) {
            $description = $data['description'];
        } else {
            $description = '';
        }

        return $description ? '<p class="description">' . wp_kses_post( $description ) . '</p>' : '';
    }

    /**
     * Get custom attributes HTML.
     *
     * @param array $data
     * @return string
     */
    public function get_custom_attribute_html( $data ) {
        $custom_attributes = array();

        if ( ! empty( $data['custom_attributes'] ) && is_array( $data['custom_attributes'] ) ) {
            foreach ( $data['custom_attributes'] as $attribute => $attribute_value ) {
                $custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
            }
        }

        return implode( ' ', $custom_attributes );
    }

    /**
     * Sanitize settings before saving.
     *
     * @param array $settings Array of settings to be sanitized.
     * @return array
     */
    public function sanitize_settings($settings) {
        if (isset($settings['cascade_sending']) && is_array($settings['cascade_sending'])) {
            $settings['cascade_sending'] = array_map('sanitize_text_field', $settings['cascade_sending']);
        }
        if (isset($settings['notification_triggers']) && is_array($settings['notification_triggers'])) {
            $settings['notification_triggers'] = array_map('sanitize_text_field', $settings['notification_triggers']);
        }
        return $settings;
    }

    /**
     * Get option key.
     *
     * @return string
     */
    public function get_option_key() {
        return $this->plugin_id . $this->id . '_settings';
    }

    /**
     * Get notification statuses.
     *
     * @return array
     */
    public function get_notification_statuses() {
        $notification_triggers = $this->get_option('notification_triggers', array());
        $status_mapping = array(
            'new_order'        => 'pending',
            'cancelled_order'  => 'cancelled',
            'order_on_hold'    => 'on-hold',
            'processing_order' => 'processing',
            'completed_order'  => 'completed',
            'refunded_order'   => 'refunded',
        );

        $notification_statuses = array();
        foreach ($notification_triggers as $trigger) {
            if (isset($status_mapping[$trigger])) {
                $notification_statuses[] = $status_mapping[$trigger];
            }
        }

        return $notification_statuses;
    }

    /**
     * Generate Hidden Input HTML.
     *
     * @param string $key Field key.
     * @param array  $data Field data.
     * @return string
     */
    public function generate_hidden_html( $key, $data ) {
        $field_key = $this->get_field_key( $key );
        $defaults  = array(
            'type'              => 'hidden',
            'css'               => '',
            'custom_attributes' => array(),
        );

        $data = wp_parse_args( $data, $defaults );

        ob_start();
        ?>
        <input type="<?php echo esc_attr( $data['type'] ); ?>" 
               name="<?php echo esc_attr( $field_key ); ?>" 
               id="<?php echo esc_attr( $field_key ); ?>" 
               value="<?php echo esc_attr( $this->get_option( $key ) ); ?>" 
               style="<?php echo esc_attr( $data['css'] ); ?>" 
               <?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); ?> />
        <?php

        return ob_get_clean();
    }

    /**
     * Generate Checkbox HTML.
     *
     * @param string $key Field key.
     * @param array  $data Field data.
     * @return string
     */
    public function generate_checkbox_html( $key, $data ) {
        $field_key = $this->get_field_key( $key );
        $defaults  = array(
            'title'             => '',
            'label'             => '',
            'disabled'          => false,
            'class'             => '',
            'css'               => '',
            'type'              => 'checkbox',
            'desc_tip'          => false,
            'description'       => '',
            'custom_attributes' => array(),
        );

        $data = wp_parse_args( $data, $defaults );

        ob_start();
        ?>
        <tr valign="top">
            <th scope="row" class="titledesc">
                <label for="<?php echo esc_attr( $field_key ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
                <?php echo wp_kses_post( $this->get_tooltip_html( $data ) ); ?>
            </th>
            <td class="forminp">
                <fieldset>
                    <legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
                    <label for="<?php echo esc_attr( $field_key ); ?>">
                        <input
                            name="<?php echo esc_attr( $field_key ); ?>"
                            id="<?php echo esc_attr( $field_key ); ?>"
                            type="checkbox"
                            class="<?php echo esc_attr( $data['class'] ); ?>"
                            value="1"
                            <?php checked( $this->get_option( $key ), 'yes' ); ?>
                            <?php disabled( $data['disabled'], true ); ?>
                            <?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); ?>
                        /> <?php echo wp_kses_post( $data['label'] ); ?>
                    </label>
                    <?php echo wp_kses_post( $this->get_description_html( $data ) ); ?>
                </fieldset>
            </td>
        </tr>
        <?php

        return ob_get_clean();
    }
}
