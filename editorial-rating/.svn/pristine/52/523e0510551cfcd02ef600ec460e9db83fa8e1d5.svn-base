<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Options Class
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'WPAS_Options' ) ) {
  class WPAS_Options extends WPAS_Abstract {

    // constans
    public $unique       = '';
    public $notice       = '';
    public $abstract     = 'options';
    public $sections     = array();
    public $options      = array();
    public $errors       = array();
    public $pre_tabs     = array();
    public $pre_fields   = array();
    public $pre_sections = array();
    public $args         = array(

      // framework title
      'framework_title'         => 'WPAS <small>Header Footer Customizer by <a href="https://forhad.net/" target="_blank">Forhad</a></small>',
      'framework_class'         => '',

      // menu settings
      'menu_title'              => '',
      'menu_slug'               => '',
      'menu_type'               => 'menu',
      'menu_capability'         => 'manage_options',
      'menu_icon'               => null,
      'menu_position'           => null,
      'menu_hidden'             => false,
      'menu_parent'             => '',
      'sub_menu_title'          => '',

      // menu extras
      'show_bar_menu'           => true,
      'show_sub_menu'           => true,
      'show_in_network'         => true,
      'show_in_customizer'      => false,
      'show_search'             => true,
      'show_reset_all'          => true,
      'show_reset_section'      => true,
      'show_footer'             => true,
      'show_all_options'        => true,
      'show_form_warning'       => true,
      'sticky_header'           => true,
      'save_defaults'           => true,
      'ajax_save'               => true,
      'form_action'             => '',

      // admin bar menu settings
      'admin_bar_menu_icon'     => '',
      'admin_bar_menu_priority' => 50,

      // footer
      'footer_text'             => '<a href="https://forhad.net/contact-with-forhad/?ref=100" target="_blank">I have ideas to improve this plugin</a> / <a href="https://forhad.net/contact-with-forhad/?ref=100" target="_blank">Contact Us</a>',
      'footer_after'            => '',
      'footer_credit'           => '',

      // database model
      'database'                => '', // options, transient, theme_mod, network
      'transient_time'          => 0,

      // contextual help
      'contextual_help'         => array(),
      'contextual_help_sidebar' => '',

      // typography options
      'enqueue_webfont'         => true,
      'async_webfont'           => false,

      // others
      'output_css'              => true,

      // theme
      'nav'                     => 'normal',
      'theme'                   => 'dark',
      'class'                   => '',

      // external default values
      'defaults'                => array(),
    );

    // run framework construct
    public function __construct( $key, $params = array() ) {

      $this->unique   = $key;
      $this->args     = apply_filters( "wpas_{$this->unique}_args", wp_parse_args( $params['args'], $this->args ), $this );
      $this->sections = apply_filters( "wpas_{$this->unique}_sections", $params['sections'], $this );

      // run only is admin panel options, avoid performance loss
      $this->pre_tabs     = $this->pre_tabs( $this->sections );
      $this->pre_fields   = $this->pre_fields( $this->sections );
      $this->pre_sections = $this->pre_sections( $this->sections );

      $this->get_options();
      $this->set_options();
      $this->save_defaults();

      add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
      add_action( 'admin_bar_menu', array( $this, 'add_admin_bar_menu' ), $this->args['admin_bar_menu_priority'] );
      add_action( 'wp_ajax_wpas_'. $this->unique .'_ajax_save', array( $this, 'ajax_save' ) );

      if ( $this->args['database'] === 'network' && ! empty( $this->args['show_in_network'] ) ) {
        add_action( 'network_admin_menu', array( $this, 'add_admin_menu' ) );
      }

      // wp enqeueu for typography and output css
      parent::__construct();

    }

    // instance
    public static function instance( $key, $params = array() ) {
      return new self( $key, $params );
    }

    // add admin bar menu
    public function add_admin_bar_menu( $wp_admin_bar ) {

      if ( ! current_user_can( $this->args['menu_capability'] ) ) {
        return;
      }

      if ( is_network_admin() && ( $this->args['database'] !== 'network' || $this->args['show_in_network'] !== true ) ) {
        return;
      }

      if ( ! empty( $this->args['show_bar_menu'] ) && empty( $this->args['menu_hidden'] ) ) {

        global $submenu;

        $menu_slug = $this->args['menu_slug'];
        $menu_icon = ( ! empty( $this->args['admin_bar_menu_icon'] ) ) ? '<span class="wpas-ab-icon ab-icon '. esc_attr( $this->args['admin_bar_menu_icon'] ) .'"></span>' : '';

        $wp_admin_bar->add_node( array(
          'id'    => $menu_slug,
          'title' => $menu_icon . esc_attr( $this->args['menu_title'] ),
          'href'  => esc_url( ( is_network_admin() ) ? network_admin_url( 'admin.php?page='. $menu_slug ) : admin_url( 'admin.php?page='. $menu_slug ) ),
        ) );

        if ( ! empty( $submenu[$menu_slug] ) ) {
          foreach ( $submenu[$menu_slug] as $menu_key => $menu_value ) {
            $wp_admin_bar->add_node( array(
              'parent' => $menu_slug,
              'id'     => $menu_slug .'-'. $menu_key,
              'title'  => $menu_value[0],
              'href'   => esc_url( ( is_network_admin() ) ? network_admin_url( 'admin.php?page='. $menu_value[2] ) : admin_url( 'admin.php?page='. $menu_value[2] ) ),
            ) );
          }
        }

      }

    }

    public function ajax_save() {

      $result = $this->set_options( true );

      if ( ! $result ) {
        wp_send_json_error( array( 'error' => esc_html__( 'Error while saving the changes.', 'wpas' ) ) );
      } else {
        wp_send_json_success( array( 'notice' => $this->notice, 'errors' => $this->errors ) );
      }

    }

    // get default value
    public function get_default( $field ) {

      $default = ( isset( $field['default'] ) ) ? $field['default'] : '';
      $default = ( isset( $this->args['defaults'][$field['id']] ) ) ? $this->args['defaults'][$field['id']] : $default;

      return $default;

    }

    // save defaults and set new fields value to main options
    public function save_defaults() {

      $tmp_options = $this->options;

      foreach ( $this->pre_fields as $field ) {
        if ( ! empty( $field['id'] ) ) {
          $this->options[$field['id']] = ( isset( $this->options[$field['id']] ) ) ? $this->options[$field['id']] : $this->get_default( $field );
        }
      }

      if ( $this->args['save_defaults'] && empty( $tmp_options ) ) {
        $this->save_options( $this->options );
      }

    }

    // set options
    public function set_options( $ajax = false ) {

      // XSS ok.
      // No worries, This "POST" requests is sanitizing in the below foreach. see #L337 - #L341
      $response  = ( $ajax && ! empty( $_POST['data'] ) ) ? json_decode( wp_unslash( trim( $_POST['data'] ) ), true ) : $_POST;

      // Set variables.
      $data      = array();
      $noncekey  = 'wpas_options_nonce'. $this->unique;
      $nonce     = ( ! empty( $response[$noncekey] ) ) ? $response[$noncekey] : '';
      $options   = ( ! empty( $response[$this->unique] ) ) ? $response[$this->unique] : array();
      $transient = ( ! empty( $response['wpas_transient'] ) ) ? $response['wpas_transient'] : array();

      if ( wp_verify_nonce( $nonce, 'wpas_options_nonce' ) ) {

        $importing  = false;
        $section_id = ( ! empty( $transient['section'] ) ) ? $transient['section'] : '';

        if ( ! $ajax && ! empty( $response[ 'wpas_import_data' ] ) ) {

          // XSS ok.
          // No worries, This "POST" requests is sanitizing in the below foreach. see #L337 - #L341
          $import_data  = json_decode( wp_unslash( trim( $response[ 'wpas_import_data' ] ) ), true );
          $options      = ( is_array( $import_data ) && ! empty( $import_data ) ) ? $import_data : array();
          $importing    = true;
          $this->notice = esc_html__( 'Settings successfully imported.', 'wpas' );

        }

        if ( ! empty( $transient['reset'] ) ) {

          foreach ( $this->pre_fields as $field ) {
            if ( ! empty( $field['id'] ) ) {
              $data[$field['id']] = $this->get_default( $field );
            }
          }

          $this->notice = esc_html__( 'Default settings restored.', 'wpas' );

        } else if ( ! empty( $transient['reset_section'] ) && ! empty( $section_id ) ) {

          if ( ! empty( $this->pre_sections[$section_id-1]['fields'] ) ) {

            foreach ( $this->pre_sections[$section_id-1]['fields'] as $field ) {
              if ( ! empty( $field['id'] ) ) {
                $data[$field['id']] = $this->get_default( $field );
              }
            }

          }

          $data = wp_parse_args( $data, $this->options );

          $this->notice = esc_html__( 'Default settings restored.', 'wpas' );

        } else {

          // sanitize and validate
          foreach ( $this->pre_fields as $field ) {

            if ( ! empty( $field['id'] ) ) {

              $field_id    = $field['id'];
              $field_value = isset( $options[$field_id] ) ? $options[$field_id] : '';

              // Ajax and Importing doing wp_unslash already.
              if ( ! $ajax && ! $importing ) {
                $field_value = wp_unslash( $field_value );
              }

              // Sanitize "post" request of field.
              if ( ! isset( $field['sanitize'] ) ) {

                if( is_array( $field_value ) ) {

                  $data[$field_id] = wp_kses_post_deep( $field_value );

                } else {

                  $data[$field_id] = wp_kses_post( $field_value );

                }

              } else if( isset( $field['sanitize'] ) && is_callable( $field['sanitize'] ) ) {

                $data[$field_id] = call_user_func( $field['sanitize'], $field_value );

              } else {

                $data[$field_id] = $field_value;

              }

              // Validate "post" request of field.
              if ( isset( $field['validate'] ) && is_callable( $field['validate'] ) ) {

                $has_validated = call_user_func( $field['validate'], $field_value );

                if ( ! empty( $has_validated ) ) {

                  $data[$field_id] = ( isset( $this->options[$field_id] ) ) ? $this->options[$field_id] : '';
                  $this->errors[$field_id] = $has_validated;

                }

              }

            }

          }

        }

        $data = apply_filters( "wpas_{$this->unique}_save", $data, $this );

        do_action( "wpas_{$this->unique}_save_before", $data, $this );

        $this->options = $data;

        $this->save_options( $data );

        do_action( "wpas_{$this->unique}_save_after", $data, $this );

        if ( empty( $this->notice ) ) {
          $this->notice = esc_html__( 'Settings saved.', 'wpas' );
        }

        return true;

      }

      return false;

    }

    // save options database
    public function save_options( $data ) {

      if ( $this->args['database'] === 'transient' ) {
        set_transient( $this->unique, $data, $this->args['transient_time'] );
      } else if ( $this->args['database'] === 'theme_mod' ) {
        set_theme_mod( $this->unique, $data );
      } else if ( $this->args['database'] === 'network' ) {
        update_site_option( $this->unique, $data );
      } else {
        update_option( $this->unique, $data );
      }

      do_action( "wpas_{$this->unique}_saved", $data, $this );

    }

    // get options from database
    public function get_options() {

      if ( $this->args['database'] === 'transient' ) {
        $this->options = get_transient( $this->unique );
      } else if ( $this->args['database'] === 'theme_mod' ) {
        $this->options = get_theme_mod( $this->unique );
      } else if ( $this->args['database'] === 'network' ) {
        $this->options = get_site_option( $this->unique );
      } else {
        $this->options = get_option( $this->unique );
      }

      if ( empty( $this->options ) ) {
        $this->options = array();
      }

      return $this->options;

    }

    // admin menu
    public function add_admin_menu() {

      extract( $this->args );

      if ( $menu_type === 'submenu' ) {

        $menu_page = call_user_func( 'add_submenu_page', $menu_parent, esc_attr( $menu_title ), esc_attr( $menu_title ), $menu_capability, $menu_slug, array( $this, 'add_options_html' ) );

      } else {

        $menu_page = call_user_func( 'add_menu_page', esc_attr( $menu_title ), esc_attr( $menu_title ), $menu_capability, $menu_slug, array( $this, 'add_options_html' ), $menu_icon, $menu_position );

        if ( ! empty( $sub_menu_title ) ) {
          call_user_func( 'add_submenu_page', $menu_slug, esc_attr( $sub_menu_title ), esc_attr( $sub_menu_title ), $menu_capability, $menu_slug, array( $this, 'add_options_html' ) );
        }

        if ( ! empty( $this->args['show_sub_menu'] ) && count( $this->pre_tabs ) > 1 ) {

          // create submenus
          foreach ( $this->pre_tabs as $section ) {
            call_user_func( 'add_submenu_page', $menu_slug, esc_attr( $section['title'] ),  esc_attr( $section['title'] ), $menu_capability, $menu_slug .'#tab='. sanitize_title( $section['title'] ), '__return_null' );
          }

          remove_submenu_page( $menu_slug, $menu_slug );

        }

        if ( ! empty( $menu_hidden ) ) {
          remove_menu_page( $menu_slug );
        }

      }

      add_action( 'load-'. $menu_page, array( $this, 'add_page_on_load' ) );

    }

    public function add_page_on_load() {

      if ( ! empty( $this->args['contextual_help'] ) ) {

        $screen = get_current_screen();

        foreach ( $this->args['contextual_help'] as $tab ) {
          $screen->add_help_tab( $tab );
        }

        if ( ! empty( $this->args['contextual_help_sidebar'] ) ) {
          $screen->set_help_sidebar( $this->args['contextual_help_sidebar'] );
        }

      }

      if ( ! empty( $this->args['footer_credit'] ) ) {
        add_filter( 'admin_footer_text', array( $this, 'add_admin_footer_text' ) );
      }

    }

    public function add_admin_footer_text() {
      echo wp_kses_post( $this->args['footer_credit'] );
    }

    public function error_check( $sections, $err = '' ) {

      if ( ! $this->args['ajax_save'] ) {

        if ( ! empty( $sections['fields'] ) ) {
          foreach ( $sections['fields'] as $field ) {
            if ( ! empty( $field['id'] ) ) {
              if ( array_key_exists( $field['id'], $this->errors ) ) {
                $err = '<span class="wpas-label-error">!</span>';
              }
            }
          }
        }

        if ( ! empty( $sections['subs'] ) ) {
          foreach ( $sections['subs'] as $sub ) {
            $err = $this->error_check( $sub, $err );
          }
        }

        if ( ! empty( $sections['id'] ) && array_key_exists( $sections['id'], $this->errors ) ) {
          $err = $this->errors[$sections['id']];
        }

      }

      return $err;
    }

    // option page html output
    public function add_options_html() {

      $has_nav       = ( count( $this->pre_tabs ) > 1 ) ? true : false;
      $show_all      = ( ! $has_nav ) ? ' wpas-show-all' : '';
      $ajax_class    = ( $this->args['ajax_save'] ) ? ' wpas-save-ajax' : '';
      $sticky_class  = ( $this->args['sticky_header'] ) ? ' wpas-sticky-header' : '';
      $wrapper_class = ( $this->args['framework_class'] ) ? ' '. $this->args['framework_class'] : '';
      $theme         = ( $this->args['theme'] ) ? ' wpas-theme-'. $this->args['theme'] : '';
      $class         = ( $this->args['class'] ) ? ' '. $this->args['class'] : '';
      $nav_type      = ( $this->args['nav'] === 'inline' ) ? 'inline' : 'normal';
      $form_action   = ( $this->args['form_action'] ) ? $this->args['form_action'] : '';

      do_action( 'wpas_options_before' );

      echo '<div class="wpas wpas-options'. esc_attr( $theme . $class . $wrapper_class ) .'" data-slug="'. esc_attr( $this->args['menu_slug'] ) .'" data-unique="'. esc_attr( $this->unique ) .'">';

        echo '<div class="wpas-container">';

        echo '<form method="post" action="'. esc_attr( $form_action ) .'" enctype="multipart/form-data" id="wpas-form" autocomplete="off" novalidate="novalidate">';

        echo '<input type="hidden" class="wpas-section-id" name="wpas_transient[section]" value="1">';

        wp_nonce_field( 'wpas_options_nonce', 'wpas_options_nonce'. $this->unique );
        ?>
        <!-- Header -->
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@400..700&display=swap');
        div#wpbody {
            font-family: "Rubik", sans-serif;
            font-optical-sizing: auto;
            background: rgb(206 255 243 / 30%);
        }
        /* Hide all notices & other sections except the framework body!! */
        div#wpbody-content > *:not(.wpas-options) {display: none !important;}
        /* Reset */
        #wpcontent {
          padding-left: 0;
        }
        .wpas-options {
            margin: 0 !important;
        }
        .wpas-container {
            border: 0 !important;
        }
        .frhd-option-body p {
            font-size: 16px;
            margin: 2px;
        }
        .wpas-header-wrap .wpas-header-right,
        .wpas-header-wrap .wpas-expand-all,
        .wpas-header-wrap .wpas-search,
        .wpas-header-wrap .wpas-buttons {
            float: none;
            clear: both;
        }
        .wpas-header-right {
            display: flex;
            justify-content: space-between;
        }
        .frhd-dashboard-nav .dashicons,
        .frhd-dashboard-nav .dashicons-before:before {
            transition: none;
        }
        /* Header */
        .wpas-setting-header {
            margin-bottom: 20px;
            box-sizing: border-box;
            background-image: linear-gradient(to right, #009688, #009688, #4caf50, #009688) !important;
            border-bottom: 1px solid #dedede;
        }
        .wpas-setting-header-info {
            position: relative;
            overflow: hidden;
        }
        .wpas-setting-header-info > img {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            object-fit: cover;
            object-position: center -180px;
        }
        .frhd-setting-header-info-content {
            display: flex;
            align-items: center;
            gap: 30px;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 20px;
            position: relative;
            z-index: 999;
        }
        .frhd-dashboard-logo {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .frhd-setting-header-info-content img {
            max-width: 70px;
            max-height: 70px;
            filter: drop-shadow(1px 1px 1px #919191);
        }
        .frhd-setting-header-info-content h1 {
            font-size: 37px;
            font-weight: bold;
            color: rgb(3,34,27);
            text-shadow: 1px 1px 1px #f9ffb9;
        }
        #frhd-plugin-version {
            position: relative;
            padding: 3px 17px;
            font-weight: 500;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to bottom, #8BC34A, rgb(3, 34, 27));
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: inline-block;
            font-size: 14px;
            color: #fff;
            margin-left: 7px;
            border-radius: 50px;
        }
        #frhd-plugin-version span {
            width: 20px;
            height: 20px;
            position: absolute;
            top: -2px;
            right: 10px;
            transform: rotate(-20deg);
            filter: blur(0.5px);
            animation-name: wpas-spin;
            animation-duration: 20000ms;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }
        #frhd-plugin-version:before {
            content: "";
            position: absolute;
            z-index: -1;
            top: -1px;
            right: -1px;
            bottom: -1px;
            left: -1px;
            border-radius: 999px;
        }
        #frhd-plugin-version span:before,
        #frhd-plugin-version span:after {
            content: "";
            position: absolute;
        }
        #frhd-plugin-version span:before {
            width: 1px;
            height: 100%;
            left: 12px;
            background: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 0.7), transparent);
        }
        #frhd-plugin-version span:after {
            width: 100%;
            height: 1px;
            top: 10px;
            left: 0;
            background: linear-gradient(to left, transparent, rgba(255, 255, 255, 0.7), transparent);
        }
        /* Nav */
        .frhd-dashboard-nav nav {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }
        .frhd-dashboard-nav nav a {
            border-radius: 3px;
            color: #2f2e2e;
            padding: 7px 13px;
            text-decoration: none;
            transition: all .15s ease;
            border: 1px solid transparent;
            display: inline-flex;
            align-items: center;
            gap: 2px;
            font-size: 13px;
            line-height: 13px;
            font-weight: bold;
            text-shadow: 1px 1px 3px #cfcfcf;
        }
        .frhd-dashboard-nav nav a .dashicons {
            font-size: 16px;
            line-height: 21px;
        }
        .frhd-dashboard-nav nav a.frhd-current,
        .frhd-dashboard-nav nav a:hover {
            background-color: #fff;
            border-color: #dfdbdb;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }
        .wpas-setting-header-info:hover .frhd-dashboard-nav nav a:not(:hover) {
            color: hsl(0deg 1.08% 18.24% / 50%);
        }
        span.frhd-nav-badge {
            color: #f18500;
            vertical-align: super;
            font-size: 9px;
            font-weight: 700;
            padding-left: 2px;
            margin-top: -10px;
        }
        /* Tabs & Options Body */
        .wpas-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 60px;
        }
        .wpas-footer {
            position: relative;
            z-index: 99;
            background: #fff !important;
        }
        .wpas-header-wrap .wpas-search input {
            min-width: 300px;
            text-align: left;
            border: 1px solid #d7d7d7;
            background: #fff !important;
        }
        .wpas-header-wrap .wpas-expand-all {
            background: #fff !important;
            border: 1px solid #d7d7d7;
        }
        .wpas-form-warning {
          animation: wpas-wiggle 1.5s infinite;
          border: 1px solid #d9c299;
          border-radius: 3px;
        }
        /* Footer Promotion */
        ul.frhd-footer-pro-links {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }
        ul.frhd-footer-pro-links a {
            color: #607D8B;
        }
        ul.frhd-footer-pro-links a:hover {
            color: #673AB7;
        }
        ul.frhd-footer-pro-socials {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
        }
        ul.frhd-footer-pro-socials svg {
            transition: .3s;
        }
        ul.frhd-footer-pro-socials svg:hover {
            transform: scale(1.1);
        }
        ul.frhd-footer-pro-socials svg:hover path {
            fill: #673AB7;
        }
        .frhd-footer-promotion .dashicons-heart {
            animation: frhdgscolors 2s infinite;
        }
        /* Animation */
        @keyframes frhdgscolors {
          0% {transform: scale(1.1);color:#E91E63;}
          50% {transform: scale(1);color:#9C27B0;}
          100%{transform: scale(1);color:#673AB7}
        }
        @keyframes wpas-wiggle {
          0% { transform: rotate(0deg); }
          60% { transform: rotate(0deg); }
          65% { transform: rotate(1deg); }
          70% { transform: rotate(-1deg); }
          75% { transform: rotate(2deg); }
          80% { transform: rotate(-2deg); }
          85% { transform: rotate(3deg); }
          95% { transform: rotate(-3deg); }
          100% { transform: rotate(0deg); }
        }
        @keyframes wpas-spin {
          from {transform:rotate(0deg);}
          to {transform:rotate(360deg);}
        }
        </style>
        <div class="wpas-option-body">
          <div class="wpas-setting-header">
            <div class="wpas-setting-header-info">
              <img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/admin-head-bg-pattern.png' ); ?>" alt="">
              <div class="frhd-setting-header-info-content">
                <div class="frhd-dashboard-logo">
                  <img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/plugin-logo.png' ); ?>" alt="Header Footer Customizer">
                  <div class="frhd-plugin-about">
                      <h1>Editorial Rating<sup id="frhd-plugin-version"><?php echo WPAS_Editorial_Rating_VERSION; ?><span></span></sup></h1>
                  </div>
                </div>
                <div class="frhd-dashboard-nav">
                  <nav>
                    <a href="<?php echo get_admin_url() . 'admin.php?page=fancypost-init'; ?>"><span class="dashicons dashicons-admin-home"></span>Getting Started</a>
                    <a href="<?php echo get_admin_url() . 'edit.php?post_type=frhdfp_blocks'; ?>" style="padding: 8px 13px 6px;"><span class="dashicons dashicons-shortcode"></span>Block to Shortcode<span class="frhd-nav-badge">&nbsp;NEW!</span></a>
                    <a href="<?php echo get_admin_url() . 'admin.php?page=fancypost_backup'; ?>"><span class="dashicons dashicons-backup"></span>Backup</a>
                    <a href="<?php echo get_admin_url() . 'admin.php?page=fancypost_license'; ?>"><span class="dashicons dashicons-shield"></span>License</a>
                    <a href="<?php echo get_admin_url() . 'admin.php?page=fancypost_help'; ?>" style="color: green;"><span class="dashicons dashicons-editor-help"></span>Help</a>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        if ( ! empty( $this->args['show_footer'] ) ) {
          echo '<div class="wpas-header-wrap" style="max-width: 1400px;margin: 0 auto;padding: 20px;text-align: center;margin-bottom: -10px;">';
          echo '<div class="wpas-header-right">';
          $notice_class = ( ! empty( $this->notice ) ) ? 'wpas-form-show' : '';
          $notice_text  = ( ! empty( $this->notice ) ) ? $this->notice : '';
          
          echo '<div style="display: flex;">';
          echo ( $has_nav && $this->args['show_all_options'] ) ? '<div class="wpas-expand-all" title="'. esc_html__( 'show all settings', 'wpas' ) .'"><i class="fas fa-outdent"></i></div>' : '';
          echo ( $this->args['show_search'] ) ? '<div class="wpas-search"><input type="text" name="wpas-search" placeholder="'. esc_html__( 'Search...', 'wpas' ) .'" autocomplete="off" /></div>' : '';
          echo '</div>';
          echo '<div class="wpas-buttons">';
          echo '<div class="wpas-form-result wpas-form-success '. esc_attr( $notice_class ) .'">'. $notice_text .'</div>';
          echo ( $this->args['show_form_warning'] ) ? '<div class="wpas-form-result wpas-form-warning">'. esc_html__( 'You have unsaved changes, save your changes!', 'wpas' ) .'</div>' : '';
          echo '<input type="submit" name="'. esc_attr( $this->unique ) .'[_nonce][save]" class="button button-primary wpas-top-save wpas-save'. esc_attr( $ajax_class ) .'" value="'. esc_html__( 'Save', 'wpas' ) .'" data-save="'. esc_html__( 'Saving...', 'wpas' ) .'">';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }

        echo '<div class="wpas-wrapper'. esc_attr( $show_all ) .'">';

          if ( $has_nav ) {

            echo '<div class="wpas-nav wpas-nav-'. esc_attr( $nav_type ) .' wpas-nav-options">';

              echo '<ul>';

              foreach ( $this->pre_tabs as $tab ) {

                $tab_id    = sanitize_title( $tab['title'] );
                $tab_error = $this->error_check( $tab );
                $tab_icon  = ( ! empty( $tab['icon'] ) ) ? '<i class="wpas-tab-icon '. esc_attr( $tab['icon'] ) .'"></i>' : '';

                if ( ! empty( $tab['subs'] ) ) {

                  echo '<li class="wpas-tab-item">';

                    echo '<a href="#tab='. esc_attr( $tab_id ) .'" data-tab-id="'. esc_attr( $tab_id ) .'" class="wpas-arrow">'. $tab_icon . $tab['title'] . $tab_error .'</a>';

                    echo '<ul>';

                    foreach ( $tab['subs'] as $sub ) {

                      $sub_id    = $tab_id .'/'. sanitize_title( $sub['title'] );
                      $sub_error = $this->error_check( $sub );
                      $sub_icon  = ( ! empty( $sub['icon'] ) ) ? '<i class="wpas-tab-icon '. esc_attr( $sub['icon'] ) .'"></i>' : '';

                      echo '<li><a href="#tab='. esc_attr( $sub_id ) .'" data-tab-id="'. esc_attr( $sub_id ) .'">'. $sub_icon . $sub['title'] . $sub_error .'</a></li>';

                    }

                    echo '</ul>';

                  echo '</li>';

                } else {

                  echo '<li class="wpas-tab-item"><a href="#tab='. esc_attr( $tab_id ) .'" data-tab-id="'. esc_attr( $tab_id ) .'">'. $tab_icon . $tab['title'] . $tab_error .'</a></li>';

                }

              }

              echo '</ul>';

            echo '</div>';

          }

          echo '<div class="wpas-content">';

            echo '<div class="wpas-sections">';

            foreach ( $this->pre_sections as $section ) {

              $section_onload = ( ! $has_nav ) ? ' wpas-onload' : '';
              $section_class  = ( ! empty( $section['class'] ) ) ? ' '. $section['class'] : '';
              $section_icon   = ( ! empty( $section['icon'] ) ) ? '<i class="wpas-section-icon '. esc_attr( $section['icon'] ) .'"></i>' : '';
              $section_title  = ( ! empty( $section['title'] ) ) ? $section['title'] : '';
              $section_parent = ( ! empty( $section['ptitle'] ) ) ? sanitize_title( $section['ptitle'] ) .'/' : '';
              $section_slug   = ( ! empty( $section['title'] ) ) ? sanitize_title( $section_title ) : '';

              echo '<div class="wpas-section hidden'. esc_attr( $section_onload . $section_class ) .'" data-section-id="'. esc_attr( $section_parent . $section_slug ) .'">';
              echo ( $has_nav ) ? '<div class="wpas-section-title"><h3>'. $section_icon . $section_title .'</h3></div>' : '';
              echo ( ! empty( $section['description'] ) ) ? '<div class="wpas-field wpas-section-description">'. $section['description'] .'</div>' : '';

              if ( ! empty( $section['fields'] ) ) {

                foreach ( $section['fields'] as $field ) {

                  $is_field_error = $this->error_check( $field );

                  if ( ! empty( $is_field_error ) ) {
                    $field['_error'] = $is_field_error;
                  }

                  if ( ! empty( $field['id'] ) ) {
                    $field['default'] = $this->get_default( $field );
                  }

                  $value = ( ! empty( $field['id'] ) && isset( $this->options[$field['id']] ) ) ? $this->options[$field['id']] : '';

                  WPAS::field( $field, $value, $this->unique, 'options' );

                }

              } else {

                echo '<div class="wpas-no-option">'. esc_html__( 'No data available.', 'wpas' ) .'</div>';

              }

              echo '</div>';

            }

            echo '</div>';

            echo '<div class="clear"></div>';

          echo '</div>';

          echo ( $has_nav && $nav_type === 'normal' ) ? '<div class="wpas-nav-background"></div>' : '';

          if ( ! empty( $this->args['show_footer'] ) ) {

            echo '<div class="wpas-footer">';
  
            echo '<div class="wpas-buttons">';

            // Notices.
            $notice_class = ( ! empty( $this->notice ) ) ? 'wpas-form-show' : '';
            $notice_text  = ( ! empty( $this->notice ) ) ? $this->notice : '';
            echo '<div class="wpas-form-result wpas-form-success '. esc_attr( $notice_class ) .'">'. $notice_text .'</div>';
            echo ( $this->args['show_form_warning'] ) ? '<div class="wpas-form-result wpas-form-warning">'. esc_html__( 'You have unsaved changes, save your changes!', 'wpas' ) .'</div>' : '';

            // Buttons.
            echo '<input type="submit" name="wpas_transient[save]" class="button button-primary wpas-save'. esc_attr( $ajax_class ) .'" value="'. esc_html__( ' Save', 'wpas' ) .'" data-save="'. esc_html__( 'Saving...', 'wpas' ) .'">';
            echo ( $this->args['show_reset_section'] ) ? '<input type="submit" name="wpas_transient[reset_section]" class="button button-secondary wpas-reset-section wpas-confirm" value="'. esc_html__( 'Reset Section', 'wpas' ) .'" data-confirm="'. esc_html__( 'Are you sure to reset this section options?', 'wpas' ) .'">' : '';
            echo ( $this->args['show_reset_all'] ) ? '<input type="submit" name="wpas_transient[reset]" class="button wpas-warning-primary wpas-reset-all wpas-confirm" value="'. ( ( $this->args['show_reset_section'] ) ? esc_html__( 'Reset All', 'wpas' ) : esc_html__( 'Reset', 'wpas' ) ) .'" data-confirm="'. esc_html__( 'Are you sure you want to reset all settings to default values?', 'wpas' ) .'">' : '';
            echo '</div>';
  
            echo ( ! empty( $this->args['footer_text'] ) ) ? '<div class="wpas-copyright">'. $this->args['footer_text'] .'</div>' : '';
  
            echo '<div class="clear"></div>';
            echo '</div>';
  
          }

        echo '</div>';

        echo '</form>';

        echo '</div>';

        echo '<div class="clear"></div>';

        echo ( ! empty( $this->args['footer_after'] ) ) ? $this->args['footer_after'] : '';
        ?>
        <div class="frhd-footer-promotion" style="display: block;text-align: center;">
          <p style="font-weight: 600;font-size: 14px;color: #607D8B;">Made with <span class="dashicons dashicons-heart"></span> by the Pluginic Team</p>
          <ul class="frhd-footer-pro-links">
            <li><a href="https://pluginic.com/support/" target="_blank">Support</a><span> /</span></li>
            <li><a href="https://pluginic.com/fancypost-docs/" target="_blank">Docs</a><span> /</span></li>
            <li><a href="https://www.facebook.com/pluginic/" target="_blank">VIP Circle</a><span> /</span></li>
            <li><a href="<?php echo get_admin_url() . 'admin.php?page=fancypost_opt#tab=recommended'; ?>">Free Plugins</a></li>
          </ul>
          <ul class="frhd-footer-pro-socials">
            <li><a href="https://www.facebook.com/pluginic/" target="_blank" rel="noopener noreferrer"><svg width="16" height="16" aria-hidden="true"><path fill="#A7AAAD" d="M16 8.05A8.02 8.02 0 0 0 8 0C3.58 0 0 3.6 0 8.05A8 8 0 0 0 6.74 16v-5.61H4.71V8.05h2.03V6.3c0-2.02 1.2-3.15 3-3.15.9 0 1.8.16 1.8.16v1.98h-1c-1 0-1.31.62-1.31 1.27v1.49h2.22l-.35 2.34H9.23V16A8.02 8.02 0 0 0 16 8.05Z"></path></svg><span class="screen-reader-text">Facebook</span></a></li>
            <li><a href="https://www.linkedin.com/company/pluginicofficial/" target="_blank" rel="noopener noreferrer"><svg width="16" height="16" aria-hidden="true"><path fill="#A7AAAD" d="M14 1H1.97C1.44 1 1 1.47 1 2.03V14c0 .56.44 1 .97 1H14a1 1 0 0 0 1-1V2.03C15 1.47 14.53 1 14 1ZM5.22 13H3.16V6.34h2.06V13ZM4.19 5.4a1.2 1.2 0 0 1-1.22-1.18C2.97 3.56 3.5 3 4.19 3c.65 0 1.18.56 1.18 1.22 0 .66-.53 1.19-1.18 1.19ZM13 13h-2.1V9.75C10.9 9 10.9 8 9.85 8c-1.1 0-1.25.84-1.25 1.72V13H6.53V6.34H8.5v.91h.03a2.2 2.2 0 0 1 1.97-1.1c2.1 0 2.5 1.41 2.5 3.2V13Z"></path></svg><span class="screen-reader-text">LinkedIn</span></a></li>
            <li><a href="https://twitter.com/pluginic" target="_blank" rel="noopener noreferrer"><svg width="17" height="16" aria-hidden="true"><path fill="#A7AAAD" d="M15.27 4.43A7.4 7.4 0 0 0 17 2.63c-.6.27-1.3.47-2 .53a3.41 3.41 0 0 0 1.53-1.93c-.66.4-1.43.7-2.2.87a3.5 3.5 0 0 0-5.96 3.2 10.14 10.14 0 0 1-7.2-3.67C.86 2.13.7 2.73.7 3.4c0 1.2.6 2.26 1.56 2.89a3.68 3.68 0 0 1-1.6-.43v.03c0 1.7 1.2 3.1 2.8 3.43-.27.06-.6.13-.9.13a3.7 3.7 0 0 1-.66-.07 3.48 3.48 0 0 0 3.26 2.43A7.05 7.05 0 0 1 0 13.24a9.73 9.73 0 0 0 5.36 1.57c6.42 0 9.91-5.3 9.91-9.92v-.46Z"></path></svg><span class="screen-reader-text">Twitter</span></a></li>
            <li><a href="https://www.youtube.com/@pluginic" target="_blank" rel="noopener noreferrer"><svg width="17" height="16" aria-hidden="true"><path fill="#A7AAAD" d="M16.63 3.9a2.12 2.12 0 0 0-1.5-1.52C13.8 2 8.53 2 8.53 2s-5.32 0-6.66.38c-.71.18-1.3.78-1.49 1.53C0 5.2 0 8.03 0 8.03s0 2.78.37 4.13c.19.75.78 1.3 1.5 1.5C3.2 14 8.51 14 8.51 14s5.28 0 6.62-.34c.71-.2 1.3-.75 1.49-1.5.37-1.35.37-4.13.37-4.13s0-2.81-.37-4.12Zm-9.85 6.66V5.5l4.4 2.53-4.4 2.53Z"></path></svg><span class="screen-reader-text">YouTube</span></a></li>
          </ul>
        </div>
        <?php
      echo '</div>';

      do_action( 'wpas_options_after' );

    }
  }
}
