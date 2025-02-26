<?php

class SaveOnFacebookAdmin {
    
    protected $version;
    
    protected $IAAdminService;
    
    public function __construct($version) {
        $this->version = $version;
        
        require_once SaveButtonPluginPath . 'includes/lang/language.php';
        $this->languages = new Languages();
    }
    
    public function enqueueStyles() {
        wp_enqueue_style(
            'save-on-facebook-admin',
            plugin_dir_url( __FILE__ ) . 'css/save-on-facebook-admin.css',
            array(),
            $this->version,
            FALSE
        );
    }
    
    public function addAdminMenu() {
        add_menu_page('Save on Facebook Plugin', 'Save on Facebook', 'manage_options', 'save-on-facebook', array($this, 'displayMenuOptions'));
    }
    
    public function displayMenuOptions() {
        if ( !current_user_can('manage_options')) {
            wp_die(__('You do not have the permissions to access this page.'));
        }
        $this->displayOptionsPage();
    }
    
    public function initDisplayOptions() {
        $this->getDisplaySettings();
    }
    
    public function initFacebookOptions() {
        $this->getFacebookSettings();
    }
    
    public function displayOptionsPage() {
        ?>

        <div class="wrap">
            <h1>Save on Facebook Plugin Settings</h1>
            
            <?php settings_errors(); ?>
            
            <?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general_options'; ?>
            
            <h2 class="nav-tab-wrapper">
                <a href="?page=save-on-facebook&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>">General Options</a>
                <!--<a href="?page=save-on-facebook&tab=facebook_options" class="nav-tab <?php echo $active_tab == 'facebook_options' ? 'nav-tab-active' : ''; ?>">Facebook Options</a>-->
            </h2>
            
            <form method="post" action="options.php">
                
                <?php
                if($active_tab == 'general_options') {
                    do_settings_sections('sof-options');
                    do_settings_sections('sof-facebook');
                    settings_fields('sof-general-settings');
                } else if ($active_tab == 'facebook_options') {
//                    $this->getFacebookSettings();
//                    do_settings_sections('sof-facebook');
                }
                ?>
                
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
    
    public function getDisplaySettings() {
        
        
        
        add_settings_section('sof-section', 'Display Settings', array($this, 'displayTabContent'), 'sof-options');
        
        add_settings_field('button-size', 'Button Size', array($this, 'addButtonSizeInput'), 'sof-options', 'sof-section');
        add_settings_field('button-position', 'Button Position', array($this, 'addButtonPositionInput'), 'sof-options', 'sof-section');
        add_settings_field('alignment', 'Alignment', array($this, 'addButtonAlignmentInput'), 'sof-options', 'sof-section');
        add_settings_field('post-type', 'Show on', array($this, 'addPostTypeInput'), 'sof-options', 'sof-section');
        
        register_setting('sof-general-settings', 'sof-section');
        
    }
    
    public function displayTabContent() {
        echo 'These are the settings for the display of the button.<br> The button can be displayed on top and bottom of posts and pages with different size and alignment.';
    }
    
    public function getFacebookSettings() {
        
        
        add_settings_section('sof-facebook', 'Facebook Settings', array($this, 'facebookTabContent'), 'sof-options');
        
        add_settings_field('sof-sdk', 'Add Sdk', array($this, 'addSdkInput'), 'sof-options', 'sof-facebook');
        add_settings_field('sof-lang', 'Language', array($this, 'addLanguageInput'), 'sof-options', 'sof-facebook');
        
        register_setting('sof-general-settings', 'sof-facebook');
    }
    
    public function facebookTabContent() {
        echo 'If your theme or any of your other plugins includes the Facebook JavaScript SDK, leave this option blank.<br> For example, if you already have login, share or like buttons uncheck the option.';
    }
    
    public function addSdkInput() {
        $options = get_option('sof-facebook');
        if (isset($options['sof-sdk'])) {
            $fbSdk = $options['sof-sdk'];
        }
        ?>

        <div>
            <input type="checkbox" id="sof-sdk" name="sof-facebook[sof-sdk]" value="1" <?php checked($fbSdk, 1); ?> />
        </div>
        <?php
    }
    
    public function addLanguageInput() {
        $options = get_option('sof-facebook');
        if (isset($options['sof-lang'])) {
            $fbLang = $options['sof-lang'];
        }
        
        $languages = $this->languages->getLanguages();
        ?>

        <div>
            <select name="sof-facebook[sof-lang]">
                <?php 
                    foreach($languages as $language => $value) {
                        echo '<option value="' . $value . '"' . selected($fbLang, $value) . '>' . $language . '</option>';
                    }
                ?>
            </select>
        </div>
        <?php
    }
    
    public function addButtonSizeInput() {
        
        $options = get_option('sof-section');
        if (isset($options['button-size'])) {
            $buttonSize = $options['button-size'];
        }
        ?>
        <div>
            <input type="radio" id="sof-button-size" name="sof-section[button-size]" value="small" <?php checked($buttonSize, 'small'); ?> />
            <label class="radio" for="sof-button-size">Small</label>
            <input type="radio" id="sof-button-size-large" name="sof-section[button-size]" value="large" <?php checked($buttonSize, 'large'); ?> />
            <label class="radio" for="sof-button-size-large">Large</label>
        </div>
        <?php
    }
    
    public function addButtonPositionInput() {
        $options = get_option('sof-section');
        if (isset($options['button-position'])) {
            $buttonPosition = $options['button-position'];
        }
        ?>
        <div>
            <input type="radio" id="sof-button-position-top" name="sof-section[button-position]" value="top" <?php checked($buttonPosition, 'top'); ?> />
            <label class="radio" for="sof-button-position-top">Top</label>
            <input type="radio" id="sof-button-position-bottom" name="sof-section[button-position]" value="bottom" <?php checked($buttonPosition, 'bottom'); ?> />
            <label class="radio" for="sof-button-position-bottom">Bottom</label>
            </div>
        </div>
        <?php
    }
    
    public function addButtonAlignmentInput() {
        $options = get_option('sof-section');
        if (isset($options['button-alignment'])) {
            $buttonAlignment = $options['button-alignment'];
        }
        ?>
        <div>
            <input type="radio" id="sof-button-alignment-left" name="sof-section[button-alignment]" value="left" <?php checked($buttonAlignment, 'left'); ?> />
            <label class="radio" for="sof-button-alignment-left">Left</label>
            <input type="radio" id="sof-button-alignment-center" name="sof-section[button-alignment]" value="center" <?php checked($buttonAlignment, 'center'); ?> />
            <label class="radio" for="sof-button-alignment-center">Center</label>
            <input type="radio" id="sof-button-alignment-right" name="sof-section[button-alignment]" value="right" <?php checked($buttonAlignment, 'right'); ?> />
            <label class="radio" for="sof-button-alignment-right">Right</label>
        </div>
        <?php
    }
    
    public function addPostTypeInput() {
        $options = get_option('sof-section');
        if (isset($options['post-type-post'])) {
            $buttonPostTypePost = $options['post-type-post'];
        }
        if (isset($options['post-type-page'])) {
            $buttonPostTypePage = $options['post-type-page'];
        }
        ?>
        <div>
            <input type="checkbox" id="sof-post-type-post" name="sof-section[post-type-post]" value="post" <?php checked($buttonPostTypePost, 'post'); ?> />
            <label class="checkbox" for="sof-post-type-post">Posts</label>
            <input type="checkbox" id="sof-post-type-page" name="sof-section[post-type-page]" value="page" <?php checked($buttonPostTypePage, 'page'); ?> />
            <label class="checkbox" for="sof-post-type-page">Pages</label>
        </div>
        <?php
    }
}