<?php
class FTB_Widget_Admin_Settings {
    private function validate_widget_id($widgetId) {
        return preg_match('/^[0-9]+$/i', $widgetId);
    }

    private function validate_widget_token($widgetToken) {
        return preg_match('/^[a-z0-9]+$/i', $widgetToken);
    }

    private function update_widget_settings(&$updateErrors = []) {
        $widgetToken = isset($_POST['ftb-widget-token']) ? $_POST['ftb-widget-token'] : null;
        $widgetId = isset($_POST['ftb-widget-id']) ? $_POST['ftb-widget-id'] : null;

        if ($widgetToken === null && $widgetId === null) {
            return false;
        }

        $widgetToken = sanitize_text_field($widgetToken);
        $widgetId = sanitize_text_field($widgetId);

        $valid = true;
        if (!$this->validate_widget_id($widgetId)) {
            $updateErrors[] = "Widget Id is invalid";
            $valid = false;
        }

        if (!$this->validate_widget_token($widgetToken)) {
            $updateErrors[] = "Widget Token is invalid";
            $valid = false;
        }

        if ($valid) {
            update_option('ftb_widget_token', $widgetToken);
            update_option('ftb_widget_id', $widgetId);
        }

        return $valid;
    }

    public function render_admin_page_html() {
        //must check that the user has the required capability
       if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
       }

       $updated = $this->update_widget_settings($updateErrors);

       $widgetToken = get_option('ftb_widget_token');
       $widgetId = get_option('ftb_widget_id');

       $html = '<div class="wrap">';

       $html .= '<h2>Freetobook Responsive Widget Settings</h2>';
        if ($updated) {
            $html .= '<h3>Changes saved</h3>';
        }

        if (!empty($updateErrors)) {
            $html .= '<h3>Error: ' . esc_html(implode(', ', $updateErrors)) . '</h3>';
        }

        $html .= '
            <br />
            <br />
            <form method="post">';

        $html .= '
            <table>
                <tr> 
                    <td style="width:100px">Widget Id</td> 
                    <td><input type="text" size="30" name="ftb-widget-id" value="' . esc_attr($widgetId) . '" ></td>
                </tr>
                <tr> 
                    <td style="width:100px">Widget Token</td> 
                    <td><input type="text" size="110" name="ftb-widget-token" value="' . esc_attr($widgetToken) . '" ></td>
                </tr>	   
            </table>
    
               <a href="https://www.freetobook.com/diary/directBookings/wordPress" target="_blank">Need help with freetobook wordpress widdget?</a>
    
               <p class="submit">
               <input type="submit" name="Submit" class="button-primary" value="' .  __('Save Changes', 'FreetobookWidget') . '" />
            </p>
        </form>
    
        </div>';

        $allowedTags = [
            "div" => [
                "class" => true
            ],
            "h2" => [],
            "h3" => [],
            "form" => [
                "method" => true
            ],
            "table" => [],
            "tr" => [],
            "br" => [],
            "td" => [
                "style" => true
            ],
            "input" => [
                "name" => true,
                "type" => true,
                "size" => true,
                "value" => true,
                "class" => true
            ],
            "p" => [
                "class" => true
            ],
            "a" => [
                "href" => true,
                "target" => true
            ],
        ];

        echo wp_kses($html, $allowedTags);
    }

    public function add_plugin_settings_link($links) {
        $settings_link = '<a href="options-general.php?page=freetobook-responsive-widget/includes/ftb-widget-admin-settings.php">Settings</a>';

        array_unshift($links, $settings_link);
        return $links;
    }

    public function add_settings_menu() {
        add_submenu_page(
            'options-general.php',
            'Freetobook Responsive Widget Options',
            'Freetobook Responsive Widget',
            'activate_plugins',
            __FILE__,
            array($this, 'render_admin_page_html')
        );

        add_filter(
            "plugin_action_links_freetobook-responsive-widget/freetobook-responsive-widget.php",
            array($this, 'add_plugin_settings_link')
        );
    }
}
