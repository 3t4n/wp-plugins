<?php
/*
Plugin Name: ArianeLab
Plugin URI: https://www.arianelab.com/
Description: ArianeLab enables you to re-engage your customers through browser push notifications. Send unlimited notifications to unlimited subscribers for free. Visit https://www.arianelab.com for more details.
Author: Guillaume Leroy <gleroy@arianelab.com>
Version: 1.1
wp-arianelab.php
Author URI: https://www.arianelab.com

This relies on the actions being present in the themes header.php and footer.php
 * header.php code before the closing </head> tag
 *   wp_head();
 *
 */

//------------------------------------------------------------------------//
//---Config---------------------------------------------------------------//
//------------------------------------------------------------------------//

class ArianeLabPlugin
{

    /**
     * Plugin name
     *
     * @var string
     */
    protected $name = "arianelab";

    /**
     * Version
     *
     * @var string
     */
    protected $version = "1.1";

    /**
     * Static domain
     *
     * @var string
     */
    private $_static_domain = '//t.arianelab.com';

    /**
     * Tag code
     *
     * @string
     */
    private $_js = '<!-- Start ArianeLab Code -->
    <script
      data-name=\'wp-arianelab\'
      data-subdomain=\'arianelab_subdomain\'
      src="https://#arianelab_subdomain#/wpal/widget.js?type=#arianelab_tag_type#">
    </script>
    <!-- End ArianeLab Code -->';

    /**
     * Plugin configuration parameters
     *
     * @var array
     */
    private $_cfg = [
        'arianelab_subdomain',
        'arianelab_tag_type',
        'arianelab_tag_diff',
        'arianelab_tag_collecte',
        'arianelab_site_token',
    ];

    private $_text_domain = 'wp-arianelab';

    /**
     * ArianeLab collect subdomain
     *
     * @var string|null
     */
    private $_arianelab_subdomain = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        // Add hook
        add_action('admin_enqueue_scripts', [$this, 'loadJS']);
        add_action('admin_head', [$this, 'loadCSS']);
        add_action('admin_init', [$this, 'register']);
        add_action('admin_menu', [$this, 'getMenu']);
        add_action('admin_notices', [$this, 'noSettings']);
        add_action('plugins_loaded', [$this, 'loadTextdomain']);
        add_action('wp_head', [$this, 'getHeader'], 1);

        $this->_arianelab_subdomain = get_option('arianelab_subdomain');
    }

    /**
     * Display admin page
     *
     * @return void
     */
    public function dashboard()
    {
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';

        return;
    }

    /**
     * Return Tag code for header
     *
     * @return void
     */
    public function getHeader()
    {
        $tag_types = get_option('arianelab_tag_type');
        if (!empty($tag_types) && is_array($tag_types)) {
	        $site_token = get_option('arianelab_site_token');
            if (in_array('visit', $tag_types)) {
                $domain = $this->_static_domain;
            } else {
                $domain = $this->_arianelab_subdomain;
            }
            $url = "https://" . $domain . "/wpal/widget.js?";
            $url .= 'tag[]=' . implode('&tag[]=', $tag_types);
            $url .= "&site=" . $site_token;

	        echo '<!-- Start ArianeLab v' . $this->version . ' Code -->
	        <script
	          data-name=\'wp-arianelab\'
	          data-subdomain=\'' . $domain . '\'
	          src="' . $url . '">
	        </script>
	        <!-- End ArianeLab Code -->';
        }
    }

    /**
     * Options page link
     *
     * @return void
     */
    public function getMenu()
    {
        add_options_page(
            'ArianeLab',
            'ArianeLab',
            'create_users',
            'al_arianelab_options',
            [$this, 'dashboard']
        );
    }

    /**
     * Load JS lib
     *
     * @return void
     */
    public function loadCSS()
    {
        wp_enqueue_style(
            'al_stype',
            plugin_dir_url(__FILE__) . 'css/lib.css',
            [],
            false,
            'all'
        );
    }

    /**
     * Load JS lib
     *
     * @return void
     */
    public function loadJS()
    {
        wp_enqueue_script('al_script', plugin_dir_url(__FILE__) . 'js/lib.js');
    }

    /**
     * Load translation file
     *
     * @return bool
     */
    public function loadTextdomain()
    {
        return load_plugin_textdomain(
            'wp-arianelab',
            false,
            dirname(plugin_basename(__FILE__)) . '/languages/'
        );
    }

    /**
     * Plugin is not configured
     *
     * @return void
     */
    public function noSettings()
    {
        $src = __(
            "Just enter your <a target=\"_blank\" href=\"https://console.arianelab.com/settings\">Subdomain</a> for it to work.",
            $this->_text_domain
        );
        if (!is_admin()) {
            return;
        }
        $al_option = get_option("arianelab_subdomain");
        if (!$al_option) {
            echo "<div class='updated fade'><p><strong>"
            . __("Arianelab plugin is almost ready", $this->_text_domain)
                . ".</strong> Just enter your <a target=\"_blank\" href=\"https://console.arianelab.com/settings\">Subdomain</a> for it to work.</p></div>";
        }
    }

    /**
     * Options settings
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->_cfg as $cfg) {
            register_setting(
                'al_arianelab_options',
                $cfg
            );
        }
    }
} // end class

$alPlugin = new ArianeLabPlugin();
