<?php
 if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'GHLCF7_Settings_Page' ) ) {
	class GHLCF7_Settings_Page {

        public function __construct() {
			add_action( 'admin_menu', array( $this, 'ghlcf7_create_menu_page' ) );
			add_action( 'admin_post_ghlcf7_admin_settings', array( $this, 'ghlcf7_save_settings' ) );
			add_filter( 'plugin_action_links_' . GHLCF7_PLUGIN_BASENAME , array( $this , 'ghlcf7_add_settings_link' ) );
		
		}

        public function ghlcf7_create_menu_page() {
	    
			$page_title 	= __( 'GHL for CF7', 'go-high-level-extension-for-contact-form7' );
			$menu_title 	= __( 'GHL for CF7', 'go-high-level-extension-for-contact-form7' );
			$capability 	= 'manage_options';
			$menu_slug 		= 'ib-ghlcf7';
			$callback   	= array( $this, 'ghlcf7_page_content' );
			$icon_url   	= 'dashicons-admin-plugins';
			add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $callback, $icon_url );
	
		}	
		
        public function ghlcf7_page_content() {
            // check user capabilities to access the setting page.
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}
			// $default_tab = null;
			// $tab = isset( $_GET['tab'] ) ? sanitize_text_field(wp_unslash($_GET['tab'])) : $default_tab;
			 // Verify the nonce
			if ( isset( $_GET['_wpnonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'ghl-cf7_nonce' ) ) {
				wp_die(esc_html__( 'Nonce verification failed.', 'go-high-level-extension-for-contact-form7' ) );
			}

			$default_tab = null;
			$tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : $default_tab;	
			?>

<div class="wrap main-con">
    <div class="ghl-header">
        <!-- Logo -->
        <div class="logo"
            style="background-image: url('<?php echo esc_url(plugins_url('images/GHLCF7.png', __DIR__)); ?>'); background-size: contain; background-repeat: no-repeat;">
        </div>


        <h1>GHL for Contact Form 7</h1>
    </div>
    <div class="ghl-container">

        <div class="ghl-content">
            <div class="ghl-tabs">
                <h2 class="nav-tab-wrapper-vertical">
                    <?php 
					$nonce = wp_create_nonce('ghl-cf7_nonce');
					?>
                    <a href="<?php echo esc_url(add_query_arg(array('page' => 'ib-ghlcf7', 'tab' => 'our-products','_wpnonce' => $nonce), admin_url('admin.php'))); ?>"
                        class="nav-tab <?php if($tab === 'our-products'):?>nav-tab-active<?php endif; ?>">
                        Our Products
                    </a>
                    <a href="<?php echo esc_url(add_query_arg(array('page' => 'ib-ghlcf7', '_wpnonce' => $nonce), admin_url('admin.php'))); ?>"
                        class="nav-tab <?php if($tab === null):?>nav-tab-active<?php endif; ?>">
                        Connect with GHL
                    </a>
                    <a href="<?php echo esc_url(add_query_arg(array('page' => 'ib-ghlcf7', 'tab' => 'option', '_wpnonce' => $nonce), admin_url('admin.php'))); ?>"
                        class="nav-tab <?php if($tab === 'option'):?>nav-tab-active<?php endif; ?>">
                        Mapping Fields
                    </a>
                    <a href="<?php echo esc_url(add_query_arg(array('page' => 'ib-ghlcf7', 'tab' => 'global', '_wpnonce' => $nonce), admin_url('admin.php'))); ?>"
                        class="nav-tab <?php if($tab === 'global'):?>nav-tab-active<?php endif; ?>">
                        Global Tags
                    </a>
                    <a href="<?php echo esc_url(add_query_arg(array('page' => 'ib-ghlcf7', 'tab' => 'support', '_wpnonce' => $nonce), admin_url('admin.php'))); ?>"
                        class="nav-tab <?php if($tab === 'support'):?>nav-tab-active<?php endif; ?>">
                        Help
                    </a>
                </h2>
            </div>


            <div class="tab-content">
                <?php switch($tab) :
					case 'option':
						require_once plugin_dir_path( __FILE__ )."/ghl-cf7-mapping-fields.php";
						break;	
					case 'global':
						require_once plugin_dir_path( __FILE__ )."/ghl-cf7-global-tags.php";
						break;
					case 'support':
						require_once plugin_dir_path( __FILE__ )."/help-page.php";
					break;
					case 'our-products':
						require_once plugin_dir_path( __FILE__ )."/our-products.php";
					break;
					default:
						require_once plugin_dir_path( __FILE__ )."/settings-form.php"; 
						break;
					endswitch; ?>
            </div>
        </div>
    </div>
</div>

<?php	
	    		
		}
		
		public function ghlcf7_save_settings() {
		// Verify the nonce for security
		check_admin_referer("ghl-cf7");

		// Initialize an array for sanitized name fields
		$name_fields = [];

		// Validate and sanitize the name field types and values
		if (isset($_POST['name-field-types']) && isset($_POST['name-field-values'])) {
			$types = array_map('sanitize_text_field', (array) wp_unslash($_POST['name-field-types']));
			$values = array_map('sanitize_text_field', (array) wp_unslash($_POST['name-field-values']));
			$unique_types = array_unique($types);

			foreach ($unique_types as $index => $type) {
				if (!empty($values[$index])) {
					$name_fields[] = [
						'type' => sanitize_text_field($type),
						'value' => sanitize_text_field($values[$index])
					];
				}
			}
		}

		// Update the name fields option only if data is available
		if (!empty($name_fields)) {
			update_option('ghlcf7_name_fields', $name_fields);
		}

		// Sanitize email and phone fields
		$ghlcf7_email_field = isset($_POST['email-field']) ? sanitize_text_field(wp_unslash($_POST['email-field'])) : '';
		$ghlcf7_phne_field  = isset($_POST['phone-field']) ? sanitize_text_field(wp_unslash($_POST['phone-field'])) : '';

		// Update email and phone field options
		if (!empty($ghlcf7_email_field)) {
			update_option('ghlcf7_email_field', $ghlcf7_email_field);
		}
		if (!empty($ghlcf7_phne_field)) {
			update_option('ghlcf7_phne_field', $ghlcf7_phne_field);
		}

		// Sanitize and validate the referer URL
		$referer = isset($_POST['_wp_http_referer']) ? esc_url_raw(sanitize_text_field(wp_unslash($_POST['_wp_http_referer']))) : '';

		// Redirect back to the referer URL
		if (!empty($referer)) {
			wp_safe_redirect($referer);
		} else {
			wp_safe_redirect(admin_url());
		}
		exit();
}



		public function ghlcf7_add_settings_link( $links ) {
	        $newlink = sprintf( "<a href='%s'>%s</a>" , admin_url( 'admin.php?page=ib-ghlcf7' ) , __( 'Settings' , 'go-high-level-extension-for-contact-form7' ) );
	        $links[] = $newlink;
	        return $links;
	    }
    }
    new GHLCF7_Settings_Page();
}