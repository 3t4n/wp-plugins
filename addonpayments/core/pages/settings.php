<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function addonp_register_settings_submenu_page_callback(){ ?>

    <div class="wrap">
        <h1><?php echo __( 'AddonPayments Settings', 'addonpayments' ) ?></h1>
                <?php
        if( isset( $_GET[ 'tab' ] ) ) {
            $active_tab = $_GET[ 'tab' ];
        } else {
            $active_tab = 'basic_settings';
        }
        ?>
        <h2 class="nav-tab-wrapper">
            <a href="admin.php?page=addonpayments-settings&tab=basic_settings" class="nav-tab <?php echo $active_tab == 'basic_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Basic Settings', 'addonpayments' ); ?></a>
            <a href="admin.php?page=addonpayments-settings&&tab=advanced_settings" class="nav-tab <?php echo $active_tab == 'advanced_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Advanced Settings', 'addonpayments' ); ?></a>
            <a href="admin.php?page=addonpayments-settings&&tab=frontend_settings" class="nav-tab <?php echo $active_tab == 'frontend_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Front-End Settings', 'addonpayments' ); ?></a>
        </h2>
        <form method="post" action="options.php">
	         <?php if( $active_tab == 'basic_settings' ) { ?>
                <p><?php
                _e('AddonPayments Settings', 'addonpayments' ); ?></p><?php
                settings_fields( "addonp-basic-settings-section");
                do_settings_sections( "addonp-basic-settings-options" );
            } elseif ( $active_tab == 'advanced_settings' ) { ?>
                <p><?php
                _e( 'AddonPayments Advanced Settings', 'addonpayments' ); ?></p><?php
                settings_fields( "addonp-advanced-settings-section");
                do_settings_sections( "addonp-advanced-settings-options" );
                } else { ?>
	                <p><?php
                _e( 'AddonPayments Front-End Settings', 'addonpayments' ); ?></p><?php
                settings_fields( "addonp-frontend-settings-section");
                do_settings_sections( "addonp-frontend-settings-options" );
                }
            submit_button();
            ?>
        </form>
        <script type="text/javascript">

              var addonp_price_with_tax_field = document.querySelector( '.js-switch-addonp_price_with_tax_field' );
              if ( addonp_price_with_tax_field ) {
                  var switchery = new Switchery( addonp_price_with_tax_field, { size: 'small' } );
                  }

              var addonp_apply_retention = document.querySelector( '.js-switch-addonp_apply_retention' );
              if ( addonp_apply_retention ) {
                var switchery = new Switchery( addonp_apply_retention, { size: 'small' } );
                }

              var addonp_apply_retention_private = document.querySelector( '.js-switch-addonp_apply_retention_to_private' );
              if ( addonp_apply_retention_private ) {
                var switchery = new Switchery( addonp_apply_retention_private, { size: 'small' } );
                }

              var addonp_apply_retention_business = document.querySelector( '.js-switch-addonp_apply_retention_to_business' );
              if ( addonp_apply_retention_business ) {
                var switchery = new Switchery( addonp_apply_retention_business, { size: 'small' } );
                }

              var addonp_apply_retention_self = document.querySelector( '.js-switch-addonp_apply_retention_to_self_employed' );
              if ( addonp_apply_retention_self ) {
                var switchery = new Switchery( addonp_apply_retention_self, { size: 'small' } );
                }

              var addonp_test_mode = document.querySelector( '.js-switch-addonp_test_mode' );
              if ( addonp_test_mode ) {
                var switchery = new Switchery( addonp_test_mode, { size: 'small' } );
                }
              var addonp_show_tax = document.querySelector( '.js-switch-addonp_show_price_with_tax' );
              if ( addonp_show_tax ) {
                var switchery = new Switchery( addonp_show_tax, { size: 'small' } );
                }
              var addonp_show_comment1 = document.querySelector( '.js-switch-addonp_coment1_fields_to_screen_front' );
              if ( addonp_show_comment1 ) {
                var switchery = new Switchery( addonp_show_comment1, { size: 'small' } );
                }
              var addonp_show_retention_text = document.querySelector( '.js-switch-addonp_show_text_retention' );
              if ( addonp_show_retention_text ) {
                var switchery = new Switchery( addonp_show_retention_text, { size: 'small' } );
                }
        </script>
    </div>
<?php }

function addonp_settings_load_css( $hook ){
    global $addon_settings;
    if( $addon_settings != $hook ) {
        return;
    } else {
        wp_register_style(  'addonp_switchery_css', ADDONP_PLUGIN_URL . '/assets/css/switchery.css', array(), ADDONP_VERSION  );
        wp_enqueue_style(   'addonp_switchery_css');
    }
}
add_action( 'admin_enqueue_scripts', 'addonp_settings_load_css' );

//Include all options

include_once( 'setting-options/basic-settings.php'     );
include_once( 'setting-options/advanced-settings.php'  );
include_once( 'setting-options/frontend-settings.php'  );