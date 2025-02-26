<?php
class UtmvGrabberOptions {

    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'UtmvGrabber__plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
    }

    /**
     * Add options page
     */
    public function UtmvGrabber__plugin_page() {
        add_menu_page(
                'UtmvGrabber Options', 'Utm Grabber', 'manage_options', 'UtmvGrabber_options', array($this, 'UtmvGrabber_options_page')
        );
        add_submenu_page('UtmvGrabber_options', 'UtmvGrabber Setting', 'Setting', 'manage_options', 'UtmvGrabber_options',  array($this, 'UtmvGrabber_options_page'));
       
    }
    /**
     * Options page callback
     */
    public function UtmvGrabber_options_page() {
        // Set class property
        $this->options = get_option('UtmvGrabber_options');
        echo '<div class="ad_wrap">';
		$this->setting_tabs();
        echo '</div>';
    }

    /**
     * Register and add settings
     */
    public function page_init() {
       
    }

    private function setting_tabs() {
        print UtmvGrabber()->engine->getView('main_utmv_grabber', array()); 
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input) {

        return $input;
    }

    /**
     * display value from array
     * @param String $key
     * @param bolean $return
     *
     * @return String value from options
     */
    public function displayValue($key, $return = false) {
        if (array_key_exists($key, $this->options)) {
            if ($return) {
                return $this->options[$key];
            }
            print $this->options[$key];
        }
    }
    /**
     * Print the NeonMaker api information
     */
    public function general_setting() {
        print sprintf('');
    }
    public function payment_setting() {
        print sprintf('');
    }
}
return new UtmvGrabberOptions();
?>