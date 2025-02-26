<?php
/*
Plugin Name: Arena.IM - Live Blogging for real-time events
Plugin URI: https://arena.im
Description: Arena is a live blogging platform for real-time events.
Version: 0.4.1
Author: Arena.im
Author URI: https://arena.im
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: albfre
*/

// Include helper functions
require_once plugin_dir_path(__FILE__) . 'includes/image-functions.php';

if (!class_exists('Albfre_Settings')) {

  class Albfre_Settings {
    const ALBFRE_URL = 'https://go.arena.im';
    const ALBFRE_API_V2_BASE_URL = 'https://api.arena.im/v2';
    const ALBFRE_DASHBOARD_URL = 'https://dashboard.arena.im';
    const ALBFRE_CACHE_API = 'https://cached-api.arena.im/v1';

    public function __construct() {
      add_action('init', array($this, 'albfre_liveblog_internationalization'));
      add_action('admin_notices', array(&$this, 'albfre_plugin_activation'));
      add_action('admin_menu', array(&$this, 'albfre_add_menu'));
      add_action('admin_enqueue_scripts', array($this,'albfre_settings_assets'));
      add_action('wp_ajax_albfre_user_action', array($this,'albfre_user_action'));
      add_action('wp_ajax_albfre_set_account_action', array($this,'albfre_set_account_action'));
      add_action('wp_ajax_albfre_logout_action', array($this,'albfre_logout_action'));

      /**
       * Used to enable plugin's debug information.
       */
      update_option('albfre_debug', false);
      /**
       * The amount of time to consider a post "live".
       * This TLL will be considered while searching by posts using the post_date field and check
       * if it is an Arena post. If it is an Arena post, it will search on Arena's API for the correctly
       * last update date.
       */
      update_option('albfre_max_date_to_live', strtotime('-35 days'));
      /**
       * Default date format: this is important to keep compatible with MySQL database date
       * format, what makes easy to insert the formatted date directly on database.
       */
      update_option('albfre_date_format', 'Y-m-d H:i:s');
    }

    public function albfre_plugin_activation() {
      global $hook_suffix;

      if ($hook_suffix == 'plugins.php' && !get_option('albfre_user_token')) {
        include(sprintf("%s/templates/albfre_notice.php", dirname(__FILE__)));
      }
    }

    public function albfre_liveblog_internationalization() {
      load_plugin_textdomain('albfre', false, basename(dirname(__FILE__)) . '/languages');
    }

    public function albfre_add_menu(){
			add_options_page(
				esc_html__('Arena Settings', 'albfre'),
				esc_html__('Arena', 'albfre'),
				'manage_options',
				'albfre_plugin',
				array(&$this, 'albfre_create_plugin_settings_page')
			);
    }

    public function albfre_create_plugin_settings_page(){
      global $wpdb;

      if(!current_user_can('manage_options'))	{
        wp_die(esc_html__('You do not have sufficient permissions to access this page.', 'albfre'));
      }

      include(sprintf("%s/templates/albfre_settings.php", dirname(__FILE__)));
    }

    public function albfre_settings_assets($hook) {
      global $wpdb;

      // Register and enqueue notice styles
      wp_enqueue_style(
          'albfre_notice_style', 
          plugins_url('assets/albfre_notice.css', __FILE__),
          array(),
          '0.3.0'
      );

      if ($hook != 'settings_page_albfre_plugin') {
        return;
      }

      // Register and enqueue admin styles
      wp_register_style(
          'albfre_admin_style',
          plugins_url('assets/albfre_admin.css', __FILE__),
          array(),
          '0.3.0'
      );
      wp_enqueue_style('albfre_admin_style');

      // Register and enqueue admin script
      wp_register_script(
          'albfre_admin_script',
          plugins_url('assets/albfre_admin.js', __FILE__),
          array('jquery'),
          '0.3.0',
          true
      );
      wp_enqueue_script('albfre_admin_script');

      // Localize script data
      $albfre_api_signin_url = esc_url(self::ALBFRE_API_V2_BASE_URL . "/account/signinfirebase");
      $albfre_api_me_url = esc_url(self::ALBFRE_API_V2_BASE_URL . "/account/me");
      $albfre_user_token = sanitize_text_field(get_option('albfre_user_token'));
      $albfre_user_siteId = sanitize_text_field(get_option('albfre_user_siteId'));
      $albfre_user_accountId = sanitize_text_field(get_option('albfre_user_accountId'));

      wp_localize_script('albfre_admin_script', 'albfre_settings_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'albfre_api_signin_url' => $albfre_api_signin_url,
        'albfre_api_me_url' => $albfre_api_me_url,
        'albfre_user_token' => $albfre_user_token,
        'albfre_user_siteId' => $albfre_user_siteId,
        'albfre_user_accountId' => $albfre_user_accountId
      ));
    }

    public function albfre_set_account_action() {
      global $wpdb;

      $albfre_account = $_POST['albfre_account'];

      update_option('albfre_user_siteId', sanitize_text_field($albfre_account['siteId']));
      update_option('albfre_user_accountId', sanitize_text_field($albfre_account['accountId']));
    }

    public function albfre_user_action() {
      global $wpdb;
      $albfre_user = $_POST['albfre_user'];

      $json_accounts = str_replace('\"', '"', $albfre_user['accounts']);

      update_option('albfre_user_displayName', sanitize_text_field($albfre_user['displayName']));
      update_option('albfre_user_token', sanitize_text_field($albfre_user['arenaApiToken']));
      update_option('albfre_user_siteId', sanitize_text_field($albfre_user['siteId']));
      update_option('albfre_user_accountId', sanitize_text_field($albfre_user['accountId']));
      update_option('albfre_user_accounts', json_decode($json_accounts));
      update_option('albfre_user_json_accounts', str_replace('\"', "'", $albfre_user['accounts']));

      wp_die();
    }

    public function albfre_logout_action() {
      global $wpdb;
      delete_option('albfre_user_displayName');
      delete_option('albfre_user_token');
      delete_option('albfre_user_siteId');
      delete_option('albfre_user_accountId');
      delete_option('albfre_user_accounts');
      echo 'deleted!';
      wp_die();
    }
  }
}

if(!class_exists('Albfre')){
  require_once plugin_dir_path( __FILE__ ) . 'gutenberg/init.php';
  require_once plugin_dir_path( __FILE__ ) . 'shortcode/init.php';

  class Albfre {
    public function __construct(){
      $albfre_settings = new Albfre_Settings();

      add_action('init', array($this, 'albfre_liveblog_internationalization'));
      add_action('media_buttons', array(&$this, 'albfre_button_wizard'), 11);
      add_action('admin_menu', array(&$this, 'albfre_add_pages'));
      add_action('admin_enqueue_scripts', array($this,'albfre_events_assets'));
      add_action('wp_enqueue_scripts', array($this, 'albfre_register_frontend_scripts'));
      add_shortcode('arena_embed', array($this, 'albfre_get_embed_func'));
      add_shortcode('arena_embed_amp', array($this, 'albfre_get_embed_amp_func'));
      add_shortcode('arena_embed_iframe', array($this, 'albfre_get_embed_iframe_func'));
    }

    public function albfre_liveblog_internationalization() {
      load_plugin_textdomain('albfre', false, basename(dirname(__FILE__)) . '/languages');
    }

    public function albfre_register_frontend_scripts() {
      wp_register_script(
          'arenalib',
          Albfre_Settings::ALBFRE_URL . '/public/js/arenalib.js',
          array(),
          '0.3.0',
          true
      );
    }

    public function albfre_get_embed_func($atts) {
      $albfre_version = sanitize_text_field($atts['version']);
      $albfre_publisher = htmlspecialchars_decode(sanitize_text_field($atts['publisher']));
      $albfre_event = htmlspecialchars_decode(sanitize_text_field($atts['event']));
      
      wp_enqueue_script('arenalib');
      wp_add_inline_script('arenalib', '', 'before');
      wp_scripts()->registered['arenalib']->src = add_query_arg(
          array(
              'p' => $albfre_publisher,
              'e' => $albfre_event
          ),
          wp_scripts()->registered['arenalib']->src
      );

      $albere_seo_result_str = "";

      try {
        $albfre_seo_api_url = Albfre_Settings::ALBFRE_CACHE_API . "/liveblog" . "/" . $albfre_publisher . "/" . $albfre_event . "/ldjson";
        $albere_seo_result_str = $this->callSEOAPI($albfre_seo_api_url);
      } catch (Exception $e) {
        error_log('Exception: ' . $e->getMessage());
      }

      return "<div id='arena-live' data-publisher='{$albfre_publisher}' data-event='{$albfre_event}' data-version='{$albfre_version}'></div>{$albere_seo_result_str}";
    }

    public function callSEOAPI($url) {
      $response = wp_remote_get($url);
      
      if (is_wp_error($response)) {
          throw new Exception('Cannot get seo info: ' . esc_html($response->get_error_message()));
      }
      
      $http_code = absint(wp_remote_retrieve_response_code($response));
      
      if ($http_code >= 400) {
          throw new Exception('Cannot get seo info: HTTP code ' . esc_html($http_code));
      }
      
      $body = wp_remote_retrieve_body($response);
      
      // Validate JSON
      $json_data = json_decode($body);
      if (json_last_error() !== JSON_ERROR_NONE) {
          throw new Exception('Invalid JSON response from SEO API');
      }
      
      // Re-encode with wp_json_encode which handles escaping
      return wp_json_encode($json_data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    }

    public function albfre_get_embed_amp_func($atts) {
      $albfre_version = sanitize_text_field($atts['version']);
      $albfre_publisher = sanitize_text_field($atts['publisher']);
      $albfre_event = sanitize_text_field($atts['event']);
      $albfre_height = sanitize_text_field($atts['height']);
      if ($albfre_version == '2') {
        $albfre_api_url = esc_url(Albfre_Settings::ALBFRE_URL . "/embed/{$albfre_publisher}/{$albfre_event}?v=2");
      } else {
        $albfre_api_url = esc_url(Albfre_Settings::ALBFRE_URL . "/embed/{$albfre_publisher}/{$albfre_event}");
      }

      return "<amp-iframe src='{$albfre_api_url}' height='" . $albfre_height . "' layout='fixed-height' frameborder='0' sandbox='allow-scripts allow-same-origin allow-popups allow-forms allow-modals'><amp-img src='https://go.arena.im/public/imgs/empty-photo-cover-event.png' layout='fixed-height' height='" . $albfre_height . "' placeholder></amp-img></amp-iframe>";
    }

    public function albfre_get_embed_iframe_func($atts) {
      $albfre_version = sanitize_text_field($atts['version']);
      $albfre_publisher = sanitize_text_field($atts['publisher']);
      $albfre_event = sanitize_text_field($atts['event']);
      
      // Validate width/height contain valid CSS values
      $albfre_width = preg_match('/^\d+(%|px|em|rem|vh|vw)?$/', $atts['width']) ? $atts['width'] : '100%';
      $albfre_height = preg_match('/^\d+(%|px|em|rem|vh|vw)?$/', $atts['height']) ? $atts['height'] : '600px';
      
      if ($albfre_version == '2') {
          $albfre_api_url = Albfre_Settings::ALBFRE_URL . "/embed/{$albfre_publisher}/{$albfre_event}?v=2";
      } else {
          $albfre_api_url = Albfre_Settings::ALBFRE_URL . "/embed/{$albfre_publisher}/{$albfre_event}";
      }

      return sprintf(
          '<iframe src="%s" style="border: 0; width: %s; height: %s; border-radius: 4px;"></iframe>',
          esc_url($albfre_api_url),
          esc_attr($albfre_width),
          esc_attr($albfre_height)
      );
    }

    public function albfre_events_assets($hook) {
      global $wpdb;
      if ($hook != 'admin_page_albfre_list_events') {
        return;
      }

      $translations = array(
        'LIVE' => esc_html__('LIVE', 'albfre'),
        'UPCOMING' => esc_html__('UPCOMING', 'albfre'),
        'TODAY' => esc_html__('TODAY', 'albfre'),
        'ADD' => esc_html__('ADD', 'albfre'),
        'EMPTY_TITLE' => esc_html__("You haven't created any Event yet.", 'albfre'),
        'EMPTY_SUBTITLE' => esc_html__('But you can easily create a new one.', 'albfre'),
        'EMPTY_BUTTON' => esc_html__('CREATE NEW EVENT', 'albfre')
      );

      // Register and enqueue events styles
      wp_register_style(
          'albfre_prefs_admin_wizard',
          plugins_url('assets/albfre_events.css', __FILE__),
          array(),
          '0.3.0'
      );
      wp_enqueue_style('albfre_prefs_admin_wizard');

      // Register and enqueue events script
      wp_register_script(
          'albfre_prefs_admin_script',
          plugins_url('assets/albfre_events.js', __FILE__),
          array('jquery'),
          '0.3.0',
          true
      );
      wp_enqueue_script('albfre_prefs_admin_script');

      // Localize script data
      $albfre_publisher = sanitize_text_field(get_option('albfre_user_siteId'));
      $albfre_user_token = sanitize_text_field(get_option('albfre_user_token'));
      $albfre_api_events_url = esc_url(Albfre_Settings::ALBFRE_API_V2_BASE_URL . "/account/sites/{$albfre_publisher}/events");
      
      wp_localize_script('albfre_prefs_admin_script', 'albfre_events_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'albfre_user_token' => $albfre_user_token,
        'albfre_api_events_url' => $albfre_api_events_url,
        'albfre_translations' => $translations,
        'albfre_dashboard' => esc_url(Albfre_Settings::ALBFRE_DASHBOARD_URL)
      ));
    }

    public function albfre_add_pages() {
      add_submenu_page(null, 'Arena Wizard', 'Arena Wizard', 'manage_options', 'albfre_list_events', array(&$this, 'albfre_wizard'));
    }

    public function albfre_wizard() {
      global $wpdb;
      include(sprintf("%s/templates/albfre_list_events.php", dirname(__FILE__)));
    }
    // add arena button on post page
    public function albfre_button_wizard() {
      add_thickbox();
      $wizhref = esc_url(admin_url('admin.php?page=albfre_list_events') .
      '&random=' . wp_rand(1, 1000) .
      '&TB_iframe=true&width=950&height=800');
      ?>
        <a href="<?php echo esc_url($wizhref); ?>" class="thickbox button ytprefs_media_link" id="ytprefs_wiz_button" title="<?php echo esc_attr__('Arena Events', 'albfre'); ?>">
            <div style="background: transparent url(<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/albfre_logo.png'); ?>) no-repeat scroll top left;display: inline-block;height: 16px;margin: 5px 2px 0 0;vertical-align: top;width: 16px;"></div> 
            <?php echo esc_html__('Arena', 'albfre'); ?>
        </a>
      <?php
    }
  }
}

if(class_exists('Albfre')){
  $albfre = new Albfre();
}

?>