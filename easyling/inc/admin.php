<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'easyling_admin' ) ) :

final class easyling_admin {


  /**
   * Plugin instance
   *
   * @var object $instance
   */
  protected static $instance;
  

  /**
   * Plugin settings
   *
   * @var array $settings
   */
  private $settings;
  
  
  /**
   *  Initialize easyling_admin
   */
  private function __construct() {
    if ( is_admin() && ! wp_doing_cron() && ! wp_doing_ajax() && ! defined('REST_REQUEST') ) {
      add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
      add_action( 'admin_menu', array( $this, 'setup_menu' ) );
      add_filter( 'plugin_action_links_' . easyling()->get_setting('basename'), array( $this, 'plugin_actions' ) );
    }

    if ( is_admin() ) {
      add_action( 'wp_ajax_easyling_test_connection', array( $this, 'ajax_test_connection' ) );
    }
  }


  /**
   *  Create or retrieve instance. Singleton pattern
   *
   *  @static
   *
   *  @return object easyling_admin instance
   */
  public static function instance() {
    return self::$instance ? self::$instance : self::$instance = new self();
  }


  /**
   *  Display actions on plugins page
   * 
   *  @param array $actions An array of plugin action links.
   *  @return array
   */
  public function plugin_actions( $actions ) {
    $settings_action = [
      'settings' => sprintf(
        '<a href="%1$s" %2$s>%3$s</a>',
        menu_page_url( 'easyling', false ),
        'aria-label="' . __( 'Settings for Easyling', 'easyling' ) . '"',
        esc_html__( 'Settings', 'easyling' )
      ),
    ];

    $actions = ( $settings_action + $actions );
    return $actions;
  }


  /**
   *  Create admin page(s)
   */
  public function setup_menu() {
    add_menu_page(
      esc_html__( 'Easyling', 'easyling' ),
      esc_html__( 'Easyling', 'easyling' ),
      'manage_options',
      'easyling',
      array( $this, 'page' ),
      'dashicons-translation',
      76
    );
  }


  /**
   *  Formats and outputs notice HTML
   */
  public function display_admin_notice( $message, $type = 'success', $is_dismissible = true ) {
    printf(
      '<div class="notice notice-%s %s"><p>%s</p></div>',
      esc_attr( $type ),
      $is_dismissible ? 'is-dismissible' : '',
      esc_html( $message )
    );
  }


  /**
   *  Render admin page
   */
  public function page() {
    $status_options = array(
      'enabled'  => __( 'Enabled', 'easyling' ),
      'disabled' => __( 'Disabled', 'easyling' ),
    );
    $publishing_mode_options = array(
      'js'    => __( 'JavaScript', 'easyling' ),
      'proxy' => __( 'Translation Proxy', 'easyling' ),
    );
    $location_host_options = array(
      'app.easyling.com' => __( 'app.easyling.com', 'easyling' ),
      'eu.easyling.com'  => __( 'eu.easyling.com', 'easyling' ),
      'custom'           => __( 'Other', 'easyling' ),
    );
    $floating_language_selector_options = array(
      ''      => __( 'Default', 'easyling' ),
      'true'  => __( 'Hide', 'easyling' ),
      'false' => __( 'Show', 'easyling' ),
    );

    $should_save_user_config = ! empty( $_POST['easyling_nonce'] ) && wp_verify_nonce( $_POST['easyling_nonce'], 'easyling_save_settings' );
    if ( $should_save_user_config ) {
      easyling()->update_user_config( 'status', sanitize_text_field( $_POST['status'] ) );
      easyling()->update_user_config( 'custom_location_host', sanitize_text_field( $_POST['custom_location_host'] ) );
      easyling()->update_user_config( 'project_code', sanitize_text_field( $_POST['project_code'] ) );
      easyling()->update_user_config( 'prerender_key', sanitize_text_field( $_POST['prerender_key'] ) );
      easyling()->update_user_config( 'redirect_system_pages', ! empty( $_POST['redirect_system_pages'] ) && ( 'on' === $_POST['redirect_system_pages'] ) ? 'on' : 'off' );
      easyling()->update_user_config( 'deployed', ! empty( $_POST['deployed'] ) && ( 'on' === $_POST['deployed'] ) ? 'on' : 'off' );
      easyling()->update_user_config( 'translate_login_page', ! empty( $_POST['translate_login_page'] ) && ( 'on' === $_POST['translate_login_page'] ) ? 'on' : 'off' );

      $location_host = sanitize_text_field( $_POST['location_host'] );
      if ( ! empty( $location_host_options[ $location_host ] ) ) {
        easyling()->update_user_config( 'location_host', $location_host );
      }

      $publishing_mode = sanitize_text_field( $_POST['publishing_mode'] );
      if ( ! empty( $publishing_mode_options[ $publishing_mode ] ) ) {
        easyling()->update_user_config( 'publishing_mode', $publishing_mode );
      }

      $floating_language_selector = sanitize_text_field( $_POST['floating_language_selector'] );
      if ( isset( $floating_language_selector_options[ $floating_language_selector ] ) ) {
        easyling()->update_user_config( 'floating_language_selector', $floating_language_selector );
      }

      $config = easyling()->save_user_config();
    } else {
      $config = easyling()->get_user_config();
    }

    $project_settings = easyling()->get_project_settings( $ignore_cache = true );

    if ( ! empty( $project_settings['languages'] ) ) {
      foreach ( $project_settings['languages'] as $key => $item ) {
        if ( empty( $item['deployPath'] ) && ( $config['deployed'] === 'on' ) ) {
          $project_settings['languages'][$key]['status'] = 'error';
          $project_settings['languages'][$key]['status_tooltip'] = "Subdirectory is not set for the {$item['language']} [{$item['targetLanguage']}] language.";
          $project_settings['languages'][$key]['status_message'] = "Subdirectory is not set for the {$item['language']} [{$item['targetLanguage']}] language. Please go to Easyling dashboard and configure subdirectory for this language in order to enable this language.";
        } elseif ( isset( $item['published'] ) && empty( $item['published'] ) ) {
          $project_settings['languages'][$key]['status'] = 'error';
          $project_settings['languages'][$key]['status_tooltip'] = "{$item['language']} [{$item['targetLanguage']}] language has been configured, but not published.";
          $project_settings['languages'][$key]['status_message'] = "{$item['language']} [{$item['targetLanguage']}] language has been configured, but not published and therefore it's not enabled.";
        } else {
          $project_settings['languages'][$key]['status'] = 'success';
          $project_settings['languages'][$key]['status_tooltip'] = "{$item['language']} [{$item['targetLanguage']}] language has been properly configured and enabled.";
        }
      }      
    }

    $is_configured = ! empty( $project_settings['languages'] ) && ! empty( $config['project_code'] );

    $new_tab_link_icon = '<i aria-hidden="true" class="dashicons dashicons-external" style="text-decoration:none;"></i>';
    ?>
    <div class="wrap">
      <h1><?php esc_html_e( 'Easyling settings', 'easyling' ) ?></h1>
      <form id="EasylingSettingsForm" method="POST">
        <table class="form-table">
          <tbody>
            <tr>
              <th><?php esc_html_e( 'Status', 'easyling' ) ?></th>
              <td>
                <select name="status" id="EasylingStatus">
                  <?php foreach ( $status_options as $value => $name ) : ?>
                    <option value="<?php echo esc_attr( $value ) ?>" <?php selected( $config['status'], $value ); ?>><?php echo esc_html( $name ) ?></option>
                  <?php endforeach; ?>
                </select>
                <p><?php esc_html_e( 'Quickly activate or deactivate translation features.', 'easyling' ) ?></p>
              </td>
            </tr>
            <tr>
              <th><?php esc_html_e( 'Easyling project code', 'easyling' ) ?></th>
              <td>
                <input type="text" name="project_code" id="EasylingProjectCode" class="regular-text" value="<?php echo esc_attr( $config['project_code'] ) ?>" />
                <?php if ( empty( $config['project_code'] ) ) : ?>
                  <p class="easyling-error"><?php esc_html_e( 'Easyling project code is missing. Make sure to enter the project code to enable website translation.', 'easyling' ) ?></p>
                <?php elseif ( empty( $project_settings ) ) : ?>
                  <p class="easyling-error"><?php esc_html_e( 'The project with the specified project code does not exists. Please enter valid project code.', 'easyling' ) ?></p>
                <?php endif; ?>
                <p><?php esc_html_e( "You can find your project code in your Easyling account after it's been created. Learn more at", 'easyling' ) ?> <a href="https://www.easyling.com/wp-plugin" target="_blank">easyling.com/wp-plugin<i aria-hidden="true" class="dashicons dashicons-external" style="text-decoration:none"></i></a>.</p>
              </td>
            </tr>
            <tr>
              <th><?php esc_html_e( 'Languages', 'easyling' ) ?></th>
              <td>
                <?php if ( ! empty( $project_settings['languages'] ) && ! empty( $project_settings['config'] ) ) : ?>
                  <?php
                    $flags_sprite_image_size = $project_settings['config']['atlasWidth'];
                    $flag_size = $project_settings['config']['flagWidth'];
                    $image_size = 16;
                    $resize_ratio = $flag_size / $image_size;
                    $background_image_size = $flags_sprite_image_size / $resize_ratio;
                  ?>
                  <div class="easyling-language-list">
                    <?php foreach ( $project_settings['languages'] as $item ) : ?>
                      <?php
                        $flag_style_data = array(
                          '{image_size}'       => $image_size,
                          '{flags_sprite_url}' => $project_settings['config']['sheet'],
                          '{flag_bg_x}'        => $item['flag']['x'] / $resize_ratio,
                          '{flag_bg_y}'        => $item['flag']['y'] / $resize_ratio,
                          '{bg_image_size}'    => $background_image_size,
                        );
                        $flag_style = strtr( implode( '', array(
                          "display:inline-block;",
                          "width: {image_size}px;",
                          "height: {image_size}px;",
                          "background-image: url('{flags_sprite_url}');",
                          "background-position: -{flag_bg_x}px -{flag_bg_y}px;",
                          "background-size: {bg_image_size}px {bg_image_size}px;",
                        )), $flag_style_data );
                      ?>
                      <a <?php if ( ! empty( $item['deployPath'] ) ) :?> href="<?php echo esc_attr( $item['deployPath'] ); ?>" target="_blank" <?php endif; ?> class="easyling-language-list-item easyling-status-<?php echo esc_attr( $item['status'] ); ?>" title="<?php echo esc_attr( $item['status_tooltip'] ); ?>">
                        <span class="easyling-language-flag" style="<?php echo esc_attr( $flag_style ) ?>"></span>
                        <span class="easyling-language-title"><?php echo esc_html( $item['language'] ) ?></span>
                      </a>
                    <?php endforeach; ?>
                  </div>
                  <?php foreach ( $project_settings['languages'] as $item ) : ?>
                    <?php if ( ! empty( $item['status_message'] ) ) : ?>
                      <p class="easyling-<?php echo esc_attr( $item['status'] ) ?>"><?php echo esc_html( $item['status_message'], 'easyling' ) ?></p>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <p><?php esc_html_e( 'Translation target languages set in your Easyling account.', 'easyling' ) ?></p>
                <?php else : ?>
                  <p><?php esc_html_e( 'Please provide project code and save changes to see the languages configured in your project.', 'easyling' ) ?></p>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th><?php esc_html_e( 'Easyling location', 'easyling' ) ?></th>
              <td>
                <select name="location_host" id="EasylingLocation">
                  <?php foreach ( $location_host_options as $value => $name ) : ?>
                    <option value="<?php echo esc_attr( $value ) ?>" <?php selected( $config['location_host'], $value ); ?>><?php echo esc_html( $name ) ?></option>
                  <?php endforeach; ?>
                </select>
                <p id="EasylingCustomLocationWrapper">
                  <input type="text" name="custom_location_host" id="EasylingCustomLocation" class="regular-text" value="<?php echo esc_attr( $config['custom_location_host'] ) ?>" />
                </p>
                <p><?php esc_html_e( 'Set location according to your Easyling account. You can choose your account to be on a US or EU based server.', 'easyling' ) ?> <a href="#" id="EasylingLocationLogin" target="wp-easyling-domainname"><?php esc_html_e( 'Login', 'easyling' ) ?><?php echo $new_tab_link_icon; ?></a></p>
              </td>
            </tr>
            <tr>
              <th><?php esc_html_e( 'Easyling publishing mode', 'easyling' ) ?></th>
              <td>
                <select name="publishing_mode">
                  <?php foreach ( $publishing_mode_options as $value => $name ) : ?>
                    <option value="<?php echo esc_attr( $value ) ?>" <?php selected( $config['publishing_mode'], $value ); ?>><?php echo esc_html( $name ) ?></option>
                  <?php endforeach; ?>
                </select>
                <p><?php esc_html_e( 'Set the publishing mode according to your Easyling settings.', 'easyling' ) ?></p>
              </td>
            </tr>
            <tr>
              <th><?php esc_html_e( 'Connection testing', 'easyling' ) ?></th>
              <td>
                <a id="EasylingTestConnectionBtn" href="#" class="button button-primary"<?php echo $is_configured ? '' : ' disabled' ?>><?php esc_html_e( 'Test connection', 'easyling' ) ?></a>
                <?php if ( ! $is_configured ) : ?>
                  <p><?php esc_html_e( 'Configure and save settings first before you can test your connection.', 'easyling' ) ?></p>
                <?php else : ?>
                  <p id="EasylingConnectionStatus" class="notice" style="display: none;"></p>
                  <p><?php esc_html_e( 'Click to check if your connection works fine.', 'easyling' ) ?></p>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th><?php esc_html_e( 'Floating language selector', 'easyling' ) ?></th>
              <td>
                <select name="floating_language_selector">
                  <?php foreach ( $floating_language_selector_options as $value => $name ) : ?>
                    <option value="<?php echo esc_attr( $value ) ?>" <?php selected( $config['floating_language_selector'], $value ); ?>><?php echo esc_html( $name ) ?></option>
                  <?php endforeach; ?>
                </select>
                <p><?php esc_html_e( 'Override project settings for the floating sidebar language selector or choose "Default" to leave it as it is.', 'easyling' ) ?></p>
              </td>
            </tr>
            <tr>
              <th><?php esc_html_e( 'Redirect system pages', 'easyling' ) ?></th>
              <td>
                <label>
                  <input type="checkbox" name="redirect_system_pages" <?php checked( $config['redirect_system_pages'] === 'on' ) ?>>
                  <?php esc_html_e( 'Yes, redirect all system pages to the original site', 'easyling' ) ?>
                </label>
                <p><?php esc_html_e( 'If this is enabled and a user lands on a Login or Registration page in a language other than the default, the plugin will redirect the user to the corresponding page (Login or Registration) in the default language.', 'easyling' ) ?></p>
              </td>
            </tr>
            <tr>
              <th><?php esc_html_e( 'Subdirectory publishing', 'easyling' ) ?></th>
              <td>
                <label>
                  <input type="checkbox" name="deployed" <?php checked( $config['deployed'] === 'on' ) ?>>
                  <?php esc_html_e( 'Publish into subdirectory, instead of using query parameter as a language selector', 'easyling' ) ?>
                </label>
                <p><?php esc_html_e( 'The actual names for the subdirectories can be set in Easyling.', 'easyling' ) ?></p>
              </td>
            </tr>
            <tr>
              <th><?php esc_html_e( 'Translate login page', 'easyling' ) ?></th>
              <td>
                <label>
                  <input type="checkbox" name="translate_login_page" <?php checked( $config['translate_login_page'] === 'on' ) ?>>
                  <?php esc_html_e( 'Yes, translate login page as well', 'easyling' ) ?>
                </label>
                <p><?php esc_html_e( 'By default, the Easyling plugin does not translate the WordPress login page. However, you can allow it to be translated.', 'easyling' ) ?></p>
              </td>
            </tr>
            <tr>
              <th><?php esc_html_e( 'prerender.io token', 'easyling' ) ?></th>
              <td>
                <input type="text" name="prerender_key" class="regular-text" value="<?php echo esc_attr( $config['prerender_key'] ) ?>" />
                <p><?php
                  echo " ";
                  echo wp_kses_post( strtr(
                    __( 'Unique API Key, which you can find on your {account_settings_page} after subscribing to {prerender_io_services}.', 'easyling' ),
                    array(
                      '{account_settings_page}' => sprintf(
                        '<a href="https://dashboard.prerender.io/settings?utm_source=easyling+WP+plugin&utm_medium=easyling+WP+plugin" target="_blank">%s%s</a>',
                        __( 'account settings page', 'easyling' ),
                        $new_tab_link_icon
                      ),
                      '{prerender_io_services}' => sprintf(
                        '<a href="https://prerender.io?utm_source=easyling+WP+plugin&utm_medium=easyling+WP+plugin" target="_blank">%s%s</a>',
                        __( 'prerender.io services', 'easyling' ),
                        $new_tab_link_icon
                      ),
                    )
                  ) );
                ?></p>
              </td>
            </tr>
          </tbody>
        </table>
        <p class="submit">
          <?php wp_nonce_field( 'easyling_save_settings', 'easyling_nonce' ); ?>
          <input type="submit" name="submit_btn" id="submit_btn" class="button button-primary" value="<?php esc_attr_e( 'Save Changes', 'easyling' ) ?>">
        </p>
      </form>

      <a id="EasylingDebugToggleBtn" class="button button-secondary" href="#"><span class="easyling-show">Show</span><span class="easyling-hide">Hide</span> debug information</a>
      <div id="EasylingDebugInfo">
        <h4>PROJECT SETTINGS</h4>
        <p><?php echo esc_html( wp_json_encode( $project_settings ) ); ?></p>
        <h4>PLUGIN SETTINGS</h4>
        <p><?php echo esc_html( wp_json_encode( $config ) ); ?></p>
        <h4>RAW STUB.JSON</h4>
        <p><?php
          $raw_stub_json = defined('ENABLE_CACHE') ? wp_cache_get( 'raw_stub_json', 'easyling' ) : get_transient( 'raw_stub_json' );
          echo esc_html( $raw_stub_json );
        ?></p>
      </div>
    </div>
    <?php
  }


  /**
   *  Enqueue admin page assets
   */
  public function enqueue_assets( $hook_suffix ) {
    if ( 'toplevel_page_easyling' === $hook_suffix ) {
      wp_enqueue_style( 'easyling-admin', easyling()->get_setting('url') . 'assets/css/admin.css', array(), easyling()->get_setting('version'), 'all' );
      wp_enqueue_script( 'easyling-admin', easyling()->get_setting('url') . 'assets/js/admin.js', array( 'jquery' ), easyling()->get_setting('version'), true );
      wp_localize_script(
        'easyling-admin',
        'Easyling',
        array(
          'ajaxUrl'              => admin_url( 'admin-ajax.php' ),
          'testConnectionNonce'  => wp_create_nonce( 'easyling_test_connection' ),
          'testConnectionAction' => 'easyling_test_connection',
        )
      );
    }
  }


  /**
   *  Test connection of the configured project
   */
  public function ajax_test_connection() {
    try {
      check_ajax_referer( 'easyling_test_connection', 'nonce' );

      $user_config = easyling()->get_user_config();

      $project_settings = easyling()->get_project_settings();
      if ( empty( $project_settings ) ) {
        throw new Exception( __( 'Project settings are not saved yet', 'easyling' ), 1);
      }

      $subdir_locale_map = ! empty( $project_settings['subdir_locale_map'] ) ? $project_settings['subdir_locale_map'] : array();
      if ( empty( $subdir_locale_map ) ) {
        throw new Exception( __( 'Languages are not configured', 'easyling' ), 1);
      }

      $location_host = $user_config['location_host'] === 'custom' ? $user_config['custom_location_host'] : $user_config['location_host'];
      $location_host = ! empty( $location_host ) ? trim( $location_host ) : $location_host;
      if ( empty( $location_host ) ) {
        throw new Exception( __( 'Easyling location is invalid', 'easyling' ), 1);
      }
      $locale_prefix = array_key_first( $subdir_locale_map );
      $locale = $subdir_locale_map[ $locale_prefix ];

      $result = easyling()->app_request( array(
        'publishing_mode' => $user_config['publishing_mode'],
        'locale'          => $locale,
        'project_code'    => $user_config['project_code'],
        'location_host'   => $location_host,
        'request_method'  => 'GET',
        'request_body'    => null,
        'request_uri'     => "/{$locale_prefix}/",
      ) );
      $response = $result['response'];

      if ( is_wp_error( $response ) ) {
        $error = sprintf(
          __( 'Failed fetching %s, error: %s', 'easyling' ),
          $result['proxy_url'],
          $response->get_error_message()
        );
        throw new Exception( $error, 1 );
      }

      echo json_encode( array(
        'result' => $result,
        'status' => true,
        'message' => sprintf(
          __( 'Successfully fetched %s, response code %s', 'easyling' ),
          $result['proxy_url'],
          $response['response']['code']
        ),
      ) );
    } catch (Exception $e) {
      echo json_encode( array(
        'status' => false,
        'message' => $e->getMessage(),
      ) );
    }

    die();
  }


}


/**
 *  The main function responsible for returning easyling_admin instance
 *
 *  @return object easyling_admin instance
 */
function easyling_admin() {
  return easyling_admin::instance();
}


// initialize
easyling_admin();

endif; // class_exists check

?>