<?php 

class DepositphotosAffiliateSettings
{
    private $options;
    
    public function __construct() {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
    }
    
    public function add_plugin_page() {
        $hook = add_options_page('Settings Admin', 'Depositphotos Affiliate', 'manage_options', 'depositphotos-affiliate-setting-admin', array($this, 'create_admin_page'));
    }
    
    public function create_admin_page() {
        $this->options = get_option('dpaff_options');
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Depositphotos Affiliate Settings</h2>           
            <form method="post" action="options.php">
            <?php
            settings_fields('dpaff_option_group');
            do_settings_sections('dp-setting-admin');
            submit_button();
            ?>
            </form>
        </div>
        <?php
    }
    
    public function page_init() {
        register_setting('dpaff_option_group', 'dpaff_options', array($this, 'sanitize'));
        
        add_settings_section('setting_section', 'Depositphotos Affiliate Settings', array($this, 'print_settings_info'), 'dp-setting-admin');
        
        add_settings_field('dpaff_affiliate_url', 'Affiliate URL', array($this, 'affiliate_url_callback'), 'dp-setting-admin', 'setting_section');

        add_settings_field('dpaff_block_type', 'Block Type', array($this, 'block_type_callback'), 'dp-setting-admin', 'setting_section');

        add_settings_section('setting_faq', 'FAQ', array($this, 'print_faq_info'), 'dp-setting-admin');
       
    }
    
    public function sanitize($input) {
        $new_input = array();

        if (isset($input['affiliate_url'])) $new_input['affiliate_url'] = sanitize_text_field($input['affiliate_url']);

        if (isset($input['block_type'])) $new_input['block_type'] = sanitize_text_field($input['block_type']);
        
        return $new_input;
    }
    
    public function print_settings_info() {
        print 'Set Depositphotos Affiliate Settings';
    }

    public function affiliate_url_callback() {
        printf('<input type="text" id="affiliate_url" name="dpaff_options[affiliate_url]" size="60" value="%s" />', isset($this->options['affiliate_url']) ? esc_url($this->options['affiliate_url']) : '');
    }

    public function block_type_callback() {
        ?>
        <input type="radio" name="dpaff_options[block_type]" value="iframe" <?php if (isset($this->options['block_type']) && $this->options['block_type'] == 'iframe') echo 'checked="checked"' ?>> iframe 
        <input type="radio" name="dpaff_options[block_type]" value="block" <?php if (isset($this->options['block_type']) && $this->options['block_type'] == 'block') echo 'checked="checked"' ?>> block 
        <input type="radio" name="dpaff_options[block_type]" value="php" <?php if ((isset($this->options['block_type']) && $this->options['block_type'] == 'php') || !isset($this->options['block_type'])) echo 'checked="checked"' ?>> php 
        <?php
    }

    public function print_faq_info() {
        print '<p>To use the plugin, you need to receive a tracking code in the partnership program at Depositphotos.</p><p><a href="https://depositphotos.com/affiliate/signup.html">Register with this link: https://depositphotos.com/affiliate/signup.html</a></p><p>Receive a registration confirmation and your unique tracking code which will look like this: tracking.depositphotos.com/aff + unique identifier</p><p>In WordPress, go to the plugin settings and paste the identifier code in the field ‘Your tracking link’.</p><p>Before publishing, press the shortcode button to bring the block to the publication.</p><p>Correctly adjust your plugin settings with the help of keywords and choose categories so that your photographs are thematically appropriate for your publication.</p>';
    }
}

if (is_admin()) $hover_pack_settings = new DepositphotosAffiliateSettings();