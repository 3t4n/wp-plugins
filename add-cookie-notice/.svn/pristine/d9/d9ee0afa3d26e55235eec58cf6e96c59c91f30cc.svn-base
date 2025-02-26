<?php

/**
Plugin Name: Add Cookie Notice
Plugin URI: http://analyticator.com/wordpress/plugins/add-cookie-notice/
Description: The best Cookie Compliance plugin for WordPress.
Author: Analyticator
Author URI: https://analyticator.com/
Version: 1.0.0
*/

require_once dirname( __FILE__ ) . '/inc/class.settings-api.php';

define( 'ADD_COOKIE_NOTICE_PLUGIN_VER', '1.0.0' );


class AddCookieNotice {

    private $settings_api;

    function load_scripts() {
        wp_register_style('add-cookie-notice-css', plugins_url('css/add-cookie-notice.css', __FILE__), array(), ADD_COOKIE_NOTICE_PLUGIN_VER);
        wp_enqueue_style('add-cookie-notice-css');
 
        wp_register_script('add-cookie-notice-js', plugins_url( 'js/add-cookie-notice.js', __FILE__), array('jquery'), ADD_COOKIE_NOTICE_PLUGIN_VER, true);
        wp_enqueue_script('jquery');
        wp_enqueue_script('add-cookie-notice-js');
    }

    function __construct() {
        $this->settings_api = AddCookieNotice_Settings::getInstance();

        add_action( 'admin_init', array($this, '_admin_init') );
        add_action( 'admin_menu', array($this, '_admin_menu') );

        add_action('init', array($this, 'load_scripts'));
    }

    function _admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function _admin_menu() {
        add_options_page( 'Cookie Notice', 'Cookie Notice', 'install_plugins', 'addcookienotice', array($this, 'plugin_settings_admin_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'addcookienotice_basics',
                'title' => __( 'Basic Settings', 'addcookienotice' )
            ),
            array(
                'id' => 'addcookienotice_advanced',
                'title' => __( 'Advanced Settings', 'addcookienotice' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'addcookienotice_basics' => array(
                array(
                    'name' => 'defaulttext',
                    'label' => __( 'Default info text', 'addcookienotice' ),
                    'desc' => __( 'Short information that is shown to the user about your use of cookies.', 'addcookienotice' ),
                    'type' => 'textarea',
                    'default' => __('We use cookies to improve your experience on our website. By browsing this website, you agree to our use of cookies.')
                ),
                array(
                    'name' => 'okbuttontext',
                    'label' => __( 'Confirmation button Text', 'addcookienotice' ),
                    'type' => 'text',
                    'default' => __('Ok')
                ),
                array(
                    'name' => 'position',
                    'label' => __( 'Position', 'addcookienotice' ),
                    'type' => 'radio',
                    'options' => array(
                        'bottom' => 'Bottom',
                        'top' => 'Top'
                    ),
                    'default' => 'bottom'
                ),
                array(
                    'name' => 'style',
                    'label' => __( 'Style', 'addcookienotice' ),
                    'type' => 'select',
                    'options' => array(
                        'dark' => 'Dark',
                        'light' => 'Light'
                    ),
                    'default' => 'dark'
                ),
                array(
                    'name' => 'displaymore',
                    'label' => __( 'More information section', 'addcookienotice' ),
                    'type' => 'radio',
                    'options' => array(
                        'true' => 'Show',
                        'false' => 'Hide'
                    ),
                    'default' => 'true'
                ),
                array(
                    'name' => 'morebuttontext',
                    'label' => __( 'More button text', 'addcookienotice' ),
                    'type' => 'text',
                    'default' => __('More Info')
                ),
                array(
                    'name' => 'moretext',
                    'label' => __( 'More information', 'addcookienotice' ),
                    'desc' => __( 'A more detailed description of why you use cookies on your site.', 'addcookienotice' ),
                    'type' => 'textarea',
                    'default' => __('Cookies are small text files held on your computer. Some cookies are required to ensure that the site functions correctly, for this reason we may have already set some cookies. They also allow us to give you the best browsing experience possible and help us understand how you use our site.')
                ),
                array(
                    'name' => 'moreurl',
                    'label' => __( 'More information URL', 'addcookienotice' ),
                    'desc' => __( 'Add an URL here to disable the more information slider and redirect the user to a webpage. Leave blank to use the more information slider instead.', 'addcookienotice' ),
                    'type' => 'text',
                    'default' => ''
                ),
            ),
            'addcookienotice_advanced' => array(
                array(
                    'name' => 'sticky',
                    'label' => __( 'Fixed or not?', 'addcookienotice' ),
                    'desc' => __( 'Fixed makes the cookie info banner visible when the user scrolls down.', 'addcookienotice' ),
                    'type' => 'radio',
                    'options' => array(
                        'true' => 'Fixed',
                        'false' => 'Absolute'
                    ),
                    'default' => 'true'
                ),
                /* array(
                    'name' => 'makespace',
                    'label' => __( 'Make space for the cookie bar?', 'addcookienotice' ),
                    'desc' => __( 'This will push your HTML body up or down so that the info banner does not obstruct any other content on your page.', 'addcookienotice' ),
                    'type' => 'checkbox',
                    'default' => 'off'
                ), */
                array(
                    'name' => 'delay',
                    'label' => __( 'Display delay', 'addcookienotice' ),
                    'desc' => __( 'Milliseconds. Set time delay in seconds to show the user the cookie info banner.', 'addcookienotice' ),
                    'type' => 'number',
                    'default' => '1000'
                ),
                array(
                    'name' => 'speedin',
                    'label' => __( 'Animation speed in', 'addcookienotice' ),
                    'desc' => __( 'Animation speed in seconds.', 'addcookienotice' ),
                    'type' => 'number',
                    'default' => '500'
                ),
                array(
                    'name' => 'speedout',
                    'label' => __( 'Animation speed out', 'addcookienotice' ),
                    'desc' => __( 'Animation speed in seconds.', 'addcookienotice' ),
                    'type' => 'number',
                    'default' => '400'
                ),
                array(
                    'name' => 'cookiename',
                    'label' => __( 'Cookie Name', 'addcookienotice' ),
                    'desc' => __( 'Name of the cookie that is set so that the user does not see this banner again once they have accepted.', 'addcookienotice' ),
                    'type' => 'text',
                    'default' => 'addcookienotice'
                ),
                array(
                    'name' => 'cookieexpiry',
                    'label' => __( 'Cookie Expiry', 'addcookienotice' ),
                    'desc' => __( 'Days. When to show the cookie info banner again to the same user.', 'addcookienotice' ),
                    'type' => 'number',
                    'default' => '90'
                ),
            )
        );

        return $settings_fields;
    }

    function plugin_settings_admin_page() {
        echo '<div class="wrap">';
        echo '<div id="icon-plugins" class="icon32"><br></div><h2><strong>Cookie Notice</strong> - The Best Cookie Compliance plugin for WordPress.</h2><br />';

        // settings_errors();

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
        echo '<p><a href="http://analyticator.com/wordpress/plugins/addcookienotice/" target="_blank">Cookie Notice</a> WordPress plugin &copy; <a href="http://analyticator.com/" target="_blank">Analyticator</a>.</p>';

    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}

$load_add_cookie_notice = new AddCookieNotice();

/**
 * Get the value of a settings field
 *
 * @param string $option settings field name
 * @param string $section the section name this field belongs to
 * @param string $default default text if it's not found
 * @return mixed
 */
function addcookienotice_option( $option, $section, $default = '' ) {

    $options = get_option( $section );

    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }

    return $default;
}

/**
 * Output style and scripts
 */


function addcookienotice_script(){ ?>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery().addcookienotice({
        defaultText: "<?php echo addcookienotice_option( 'defaulttext', 'addcookienotice_basics', __('We use cookies to improve your experience on our website. By browsing this website, you agree to our use of cookies.') ); ?>",
        okButton: "<?php echo addcookienotice_option( 'okbuttontext', 'addcookienotice_basics', __('Ok') ); ?>",
        displayMore: <?php echo addcookienotice_option('displaymore', 'addcookienotice_basics', 'true'); ?>,
        moreButton: "<?php echo addcookienotice_option( 'morebuttontext', 'addcookienotice_basics', __('More Info') ); ?>",
        moreInfo: "<?php echo addcookienotice_option( 'moretext', 'addcookienotice_basics', __('Cookies are small text files held on your computer. Some cookies are required to ensure that the site functions correctly, for this reason we may have already set some cookies. They also allow us to give you the best browsing experience possible and help us understand how you use our site.') ); ?>",
        moreURL:  "<?php echo addcookienotice_option( 'moreurl', 'addcookienotice_basics', __('') ); ?>",
        location: "<?php echo addcookienotice_option( 'position', 'addcookienotice_basics', 'bottom' ); ?>",
        speedIn: <?php echo addcookienotice_option( 'speedin', 'addcookienotice_advanced', '500' ); ?>,
        speedOut: <?php echo addcookienotice_option( 'speedout', 'addcookienotice_advanced', '400' ); ?>,
        delay: <?php echo addcookienotice_option( 'delay', 'addcookienotice_advanced', '1000' ); ?>,
        float: <?php echo addcookienotice_option('sticky', 'addcookienotice_advanced', 'true'); ?>,
        style: "<?php echo addcookienotice_option( 'style', 'addcookienotice_basics', 'dark' ); ?>",
        cookieExpiry: <?php echo addcookienotice_option( 'cookieexpiry', 'addcookienotice_advanced', '90' ); ?>,
        cookieName: "<?php echo addcookienotice_option( 'cookiename', 'addcookienotice_advanced', 'addcookienotice' ); ?>"
      });
    });
  </script>
<?php }

add_action('wp_footer', 'addcookienotice_script');
