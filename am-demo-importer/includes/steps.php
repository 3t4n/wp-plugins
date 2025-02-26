<?php

class AmDemoImporterSteps {

    private $whizzie_instance;
    private $setup_plugins_instance;

    public function __construct($whizzie_instance) {
        $this->whizzie_instance = $whizzie_instance;
        $this->setup_plugins_instance = new AmDemoImporterSetup_Plugins($whizzie_instance);
    }

    public function get_steps() {
        
    
        $active_plugins = get_option('active_plugins');
        $theme_info = wp_get_theme();
        $theme_author = $theme_info->get( 'Author' );
        
        if ( $theme_author == 'patrickoslo' && file_exists( get_template_directory() . '/inc/plugins.json' ) ) {

            $plugins_json = file_get_contents( get_template_directory() . '/inc/plugins.json' );
		    $plugins_data = json_decode($plugins_json, true);

            if (is_array($plugins_data) && !empty($plugins_data)) {
                $steps['plugins'] = array(
                    'id' => 'plugins',
                    'title' => __('Plugins', 'am-demo-importer'),
                    'icon' => 'admin-plugins',
                    'view' => 'get_step_plugins',
                    'callback' => 'install_plugins',
                    'button_text' => __('Install Plugins', 'am-demo-importer'),
                    'can_skip' => true,
                    'icon_url'    => __('Install Plugins', 'am-demo-importer')
                );
            }
        }

        if(!in_array('elementor/elementor.php', $active_plugins)){
            $steps['plugins'] = array(
                'id' => 'plugins',
                'title' => __('Plugins', 'am-demo-importer'),
                'icon' => 'admin-plugins',
                'view' => 'get_step_plugins',
                'callback' => 'install_plugins',
                'button_text' => __('Install Plugins', 'am-demo-importer'),
                'can_skip' => true,
                'icon_url'    => __('Install Plugins', 'am-demo-importer')
            );
        }

        $steps['widgets'] = array(
            'id' => 'widgets',
            'title' => __('Demo Importer', 'am-demo-importer'),
            'icon' => 'welcome-widgets-menus',
            'view' => 'get_step_widgets',
            'callback' => 'install_widgets',
            'button_text' => __('Import Content', 'am-demo-importer'),
            'can_skip' => true,
            'icon_url'    =>__('Import Content', 'am-demo-importer')
        );

        $steps['done'] = array(
            'id' => 'done',
            'title' => __('Finish', 'am-demo-importer'),
            'icon' => 'yes',
            'view' => 'get_step_done',
            'callback' => '',
            'icon_url'    =>__('Finish', 'am-demo-importer')
        );

        return $steps;
    }

    public function get_step_done() { ?>
        
        <div class="wp-setup-finish">
            <p>
                <?php echo esc_html('The demo content has been successfully imported. Click the finish button for further details.'); ?>
            </p>
            <div class="am-demo-importer-setup-end-btn-wrap">
            <div class="finish-buttons">
                <a href="<?php echo esc_url(site_url()); ?>" class="wz-btn-visit-site" target="_blank"><?php esc_html_e('Explore your website', 'am-demo-importer'); ?></a>
            </div>
            <div class="wp-finish-btn">
                <a href="<?php echo esc_url(admin_url()); ?>" class="button button-primary" onclick="openCity(event, 'theme_info')" data-tab="theme_info" >Finish</a>
            </div>
    </div>
        </div><?php
    }

    public function get_step_widgets() { ?>
        <div class="summary">
            <p>
                <?php esc_html_e('Click the button below to import the demo content using Elementor.', 'am-demo-importer'); ?>
            </p>
        </div><?php
    }

    public function get_step_plugins() {

        $plugins = $this->setup_plugins_instance->get_plugins();
        $content = array();
        
        // The detail element is initially hidden from the user
        $content['detail'] = '<span class="wizard-plugin-count">' . count($plugins['all']) . '</span><h2>Install Plugins</h2><ul class="whizzie-do-plugins">';
        foreach ($plugins['all'] as $slug => $plugin) {
            $content['detail'].= '<li data-slug="' . esc_attr($slug) . '">' . esc_html($plugin['name']) . '<div class="wizard-plugin-title">';
            $content['detail'].= '<span class="wizard-plugin-status">Installation Required</span><i class="spinner"></i></div></li>';
        }
        $content['detail'].= '</ul>';
        return $content;
    }

    public function wizard_page() {
        
        tgmpa_load_bulk_installer();
        if (!class_exists('AM_DEMO_IMPORTER_TGM_Plugin_Activation') || !isset($GLOBALS['am_demo_importer_tgmpa'])) {
            die('Failed to find TGM');
        }
        
        $url = wp_nonce_url(add_query_arg(array('plugins' => 'go')), 'whizzie-setup');
        $method = ''; // Leave blank so WP_Filesystem can populate it as necessary.
        $fields = array_map('sanitize_text_field', array_keys($_POST)); // Extra fields to pass to WP_Filesystem.
        
        if (false === ($creds = request_filesystem_credentials(esc_url_raw($url), $method, false, false, $fields))) {
            return true; // Stop the normal page form from displaying, credential request form will be shown.
        }

        // Now we have some credentials, setup WP_Filesystem.
        if (!WP_Filesystem($creds)) {
            // Our credentials were no good, ask the user for them again.
            request_filesystem_credentials(esc_url_raw($url), $method, true, false, $fields);
            return true;
        }
        /* If we arrive here, we have the filesystem */ ?>
        <div class="wee-wrap">
            
            <?php echo '<div class="card wee-whizzie-wrap">';
                // The wizard is a list with only one item visible at a time
                $steps = $this->get_steps();
                echo '<ul class="wee-whizzie-nav wizard-icon-nav">';
                $stepI = 1;
                foreach ($steps as $step) {
                    $stepAct = ($stepI == 1) ? 1 : 0;
                    if (isset($step['icon_url']) && $step['icon_url']) {
                        echo '<li class="nav-step-' . esc_attr($step['id']) . '" wizard-steps="step-' . esc_attr($step['id']) . '" data-enable="' . esc_attr($stepAct) . '">
                            <span>' . esc_html($step['icon_url']) . '</span>
                        </li>';
                    }
                    $stepI++;
                }
            echo '</ul>'; 
                echo '<ul class="whizzie-menu wp-wizard-menu-page">';
                    foreach ($steps as $step) {
                        $class = 'step step-' . esc_attr($step['id']);
                        echo '<li data-step="' . esc_attr($step['id']) . '" class="' . esc_attr($class) . '" >';
                            // $content is split into summary and detail
                            $content = call_user_func(array($this, $step['view']));
                            if (isset($content['summary'])) {
                                printf('<div class="summary">%s</div>', wp_kses_post($content['summary']));
                            }
                
                            if (isset($content['detail'])) {
                                // Add a link to see more detail
                                printf('<div class="wz-require-plugins">');
                                printf('<div class="detail">%s</div>', wp_kses_post($content['detail']));
                                printf('</div>');
                            }
                            printf('<div class="wizard-button-wrapper">');
                                if(defined('IS_AM_PREMIUM_THEME')){
                                    if (am_demo_importer_ThemeWhizzie::get_the_validation_status() === 'true') {
                                        if (isset($step['button_text']) && $step['button_text'] && isset($step['multiple'])) {
                                            echo "<div class='multiple-home-page-imports'>";
                                            foreach ($step['multiple'] as $import) {
                                                $button_html = '<div class="button-wrap">
                                                    <a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s" data-slug="' . esc_attr($import['slug']) . '">
                                                        <img src="' . esc_url($import['card_image']) . '" />
                                                        <p class="themes-name"> %s </p>
                                                    </a>
                                                </div>';
                                                echo wp_kses_post( sprintf( $button_html, esc_attr( $step['callback'] ), esc_attr( $step['id'] ), esc_html( $import['card_text'])));
                                            }
                                            echo "</div>";
                                        } elseif (isset($step['button_text']) && $step['button_text']) {
                                            printf('<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>', esc_attr($step['callback']), esc_attr($step['id']), esc_html($step['button_text']));
                                        }
                                    } else {
                                        printf('<div class="button-wrap"><a href="#" class="button button-primary key-activation-tab-click">%s</a></div>', esc_html(__('Activate Your License', 'am-demo-importer')));
                                    }
                                } else {
                                    if (isset($step['button_text']) && $step['button_text'] && isset($step['multiple'])) {
                                        echo '<div class="multiple-home-page-imports">';
                                        foreach ($step['multiple'] as $import) {
                                            $button_html = '<div class="button-wrap">
                                                                <a href="#" class="button button-primary do-it" data-callback="' . esc_attr($step['callback']) . '" data-step="' . esc_attr($step['id']) . '" data-slug="' . esc_attr($import['slug']) . '">
                                                                    <img src="' . esc_url($import['card_image']) . '" />
                                                                    <p class="themes-name"> ' . esc_html($import['card_text']) . ' </p>
                                                                </a>
                                                            </div>';
                                            echo wp_kses_post( $button_html );
                                        }
                                        echo '</div>';
                                    } elseif (isset($step['button_text']) && $step['button_text']) {
                                        printf('<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>', esc_attr($step['callback']), esc_attr($step['id']), esc_html($step['button_text']));
                                    }
                                }
                            printf('</div>');
                        echo '</li>';
                    }
                echo '</ul>';
              ?>
                <div class="step-loading">
                    <span class="spinner">
                        <img src="<?php echo esc_url(ADI_URL . 'theme-wizard/assets/images/am-demo-importer-loader.gif'); ?>">
                    </span>
                </div>
            <?php echo '</div>'; ?>
        </div><?php
    }
}