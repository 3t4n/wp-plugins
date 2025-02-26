<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$directory = CLICK_N_CHAT_DIR_PATH . 'admin/includes/pages/';
$files = glob($directory . '*.php');
foreach ($files as $file) {
    require_once $file;
}


if (!class_exists('click_n_chat_menu')) {
    class click_n_chat_menu {
		
        public function __construct() {
            add_action('admin_menu', array($this, 'add_admin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'click_n_chat_enqueue_admin_assets'));
        }

        public function add_admin_menu() {
            add_menu_page(
				'Click n Chat',
				'Click n Chat',
				'manage_options',
				'wa-clicknchat',
				array($this, 'click_n_chat_pages'),  
				CLICK_N_CHAT_DIR_URL .'assets/images/cnccalliconsmall20.png', 
				6
			);
			add_submenu_page(
				'wa-clicknchat', 
				'Premium',
				'<span style="color:#00AC57;font-weight:bold;"><span class="dashicons dashicons-yes-alt"></span> Premium</span>',
				'manage_options',
				'chatnclick_premium',
				array($this, 'chatnclick_premium_page'),
			);
        }
		function chatnclick_premium_page() {
			 wp_redirect('https://clicknchat.flag92.com/');
    		 exit;
		}
        function click_n_chat_pages() {
			$nonce = 'activate-app';
	 
			if (isset($_POST['action']) && $_POST['action']=='activ893046') {
				if (  ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), $nonce) ) {
					 die( 'Security check' ); 
				} 
				$code = $_POST["purchase_code"];
				if (!preg_match("/^([a-f0-9]{8})-(([a-f0-9]{4})-){3}([a-f0-9]{12})$/i", $code)) {
				?><div class="alert alert-danger" role="alert"><?php echo esc_html("Invalid purchase code"); ?></div><?php
				}
				else
				{
					$verify = $this->click_n_chat_verify($code);
					if(preg_match("/^([a-f0-9]{8})-(([a-f0-9]{4})-){3}([a-f0-9]{12})$/i", $verify)){update_option('click_n_chat_is_active', '1');update_option('click_n_chat_purchase_code', $code);$this->click_n_chat_migrate();}
				}	
			}
			$this->click_n_chat_plugin_admin_notice();
			$active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'display_users';
			
			$click_n_chat_purchase_code = get_option('click_n_chat_purchase_code');
			if($click_n_chat_purchase_code == ""){update_option('click_n_chat_is_active', '0');}
			$click_n_chat_is_active = get_option('click_n_chat_is_active');
			if($click_n_chat_is_active == "0"){
				$this->click_n_chat_migrate_clear();
            	//click_n_chat_prod();
				update_option('click_n_chat_is_active', '1');update_option('click_n_chat_purchase_code', 'cnc0000-free87-025dfr-854bbk-ghjf87-8745df');$this->click_n_chat_migrate();
			}
			
			//else
			{
		?>
			<header class="cnc-header">
                <h2 class="cnc-header-title">
                	<img width="35px" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/cncsicon.png'); ?>" />&nbsp;<span class="fs-4"><b>Click n Chat</b></span>
                </h2>
    
                <a href="?page=wa-clicknchat&tab=display_users" class="cnc-nav-tab <?php echo esc_html(($active_tab == 'display_users' || $active_tab == 'add_edit_user') ? 'nav-tab-is-active' : ''); ?>">Social Users</a>
                
                <a href="?page=wa-clicknchat&tab=analytics" class="cnc-nav-tab <?php echo esc_html($active_tab == 'analytics' ? 'nav-tab-is-active' : ''); ?>">Analytics</a>
                
                <a href="?page=wa-clicknchat&tab=woocommerce" class="cnc-nav-tab <?php echo esc_html($active_tab == 'woocommerce' ? 'nav-tab-is-active' : ''); ?>">WooCommerce</a>
                
                <a href="?page=wa-clicknchat&tab=chatgpt" class="cnc-nav-tab <?php echo esc_html($active_tab == 'chatgpt' ? 'nav-tab-is-active' : ''); ?>">ChatGPT</a>
                
                <a href="?page=wa-clicknchat&tab=autoreply" class="cnc-nav-tab <?php echo esc_html($active_tab == 'autoreply' ? 'nav-tab-is-active' : ''); ?>">Auto Reply</a>
                
                <a href="?page=wa-clicknchat&tab=lead_list" class="cnc-nav-tab <?php echo esc_html($active_tab == 'lead_list' ? 'nav-tab-is-active' : ''); ?>">Leads</a>
                <a href="?page=wa-clicknchat&tab=cnc_setting" class="cnc-nav-tab <?php echo esc_html($active_tab == 'cnc_setting' ? 'nav-tab-is-active' : ''); ?>">Setting</a>
        	</header>
            <div class="cnc-tab-content wrap">
				<?php
                if ($active_tab == 'display_users') {
                    click_n_chat_user_list();
                } elseif ($active_tab == 'add_edit_user') {
                    click_n_chat_add_edit_user($this->click_n_chat_limit());
                } elseif ($active_tab == 'woocommerce') {
                    click_n_chat_woocommerce($this->click_n_chat_limit());
                } elseif ($active_tab == 'chatgpt') {
                    click_n_chat_chatgpt($this->click_n_chat_limit());
                } elseif ($active_tab == 'autoreply') {
                    click_n_chat_autoreply($this->click_n_chat_limit());
                } elseif ($active_tab == 'add_edit_autoreply') {
                    click_n_chat_autoreply_add_edit($this->click_n_chat_limit());
                } elseif ($active_tab == 'analytics') {
                    click_n_chat_analytics($this->click_n_chat_limit());
                } elseif ($active_tab == 'lead_list') {
                    click_n_chat_lead_list($this->click_n_chat_limit());
				} elseif ($active_tab == 'cnc_setting') {
                    click_n_chat_setting();
                }
                ?>
            </div>
			
			
		<?php 
			}
		}

        public function click_n_chat_enqueue_admin_assets($hook) {
            // Load only on our custom admin page
            if ($hook != 'toplevel_page_wa-clicknchat') {
                return;
            }
			$theme_version = wp_get_theme()->get('Version');
			$active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'display_users';
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style('cnc-admin-simple-line-icons', CLICK_N_CHAT_DIR_URL . 'admin/assets/css/simple-line-icons.css', array(), $theme_version);
			wp_enqueue_style('custom-admin-style', CLICK_N_CHAT_DIR_URL . 'admin/assets/css/admin-style.css', array(), $theme_version);
			wp_enqueue_style('custom-admin-intlTelInput', CLICK_N_CHAT_DIR_URL . 'admin/assets/css/intlTelInput.min.css', array(), $theme_version );    
			wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), $theme_version, 1 );
			wp_enqueue_script('cnc-admin-script-intlTelInput', CLICK_N_CHAT_DIR_URL . 'admin/assets/js/intlTelInputWithUtils.min.js', array('jquery'), $theme_version, true);
			wp_enqueue_script('my-admin-script', CLICK_N_CHAT_DIR_URL . 'admin/assets/js/admin-script.js', array('jquery'), $theme_version, true);
			
			wp_enqueue_script('jquery-ui-sortable');
			
			$ajax_data = array(  
				'plugin_url' => CLICK_N_CHAT_DIR_URL,  
				'ajax_url' => admin_url('admin-ajax.php'),  
				'nonce'    => wp_create_nonce( 'ajax-call-nounce' ), 
				'active_tab'    => $active_tab, 
			);  		
			wp_localize_script('my-admin-script', 'click_n_chat_ajax_object ', $ajax_data);  
        } 
		
		function click_n_chat_is_premium_user() {
			return get_option('click_n_chat_premium', false);
		}
		
		function click_n_chat_limit() {
			if(!$this->click_n_chat_is_premium_user())
			{
				return get_option('click_n_chat_limit');
			}
		}
		function click_n_chat_verify($purchase_code) {
			$response = wp_remote_post( 'https://flag92.com/wp-json/click_n_chat_codecanyon/v1/verify', array('method' => 'POST','body' => wp_json_encode( array('purchase_code' => $purchase_code ,'domain' => site_url()) ),'headers' => array('Content-Type' => 'application/json',),'redirection' => 10));
			if ( is_wp_error( $response ) ) {
				return $response->get_error_message();
			} else {
				$status_code = wp_remote_retrieve_response_code( $response );			
				if ($status_code >= 200 && $status_code < 450 ) {
					return $purchase_code;
				} else {
					return "error";
				}
			}
		}
		function click_n_chat_migrate() {
			global $wpdb; 
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); 
			
			$table_name = $wpdb->prefix . 'cnc_social_users';
			$charset_collate = $wpdb->get_charset_collate();
		
			$sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				position mediumint(9) DEFAULT '1',
				name tinytext NOT NULL,
				cnc_social_id varchar(255),
				social_type varchar(50),
				user_icon varchar(255),
				designation varchar(50),
				description varchar(250),
				welcome_message varchar(250),
				is_woo char(1) DEFAULT '0',
				is_widget char(1) DEFAULT '0',
				status char(1) DEFAULT '1',
				availability char(1) DEFAULT '1',
				PRIMARY KEY  (id)
			) $charset_collate;";
			dbDelta($sql);
			$wpdb->insert(
				$table_name,
				[
				 	'position' => '1',
					'name' => 'John Doe',
					'cnc_social_id' => '15555555555',
					'social_type' => 'whatsapp',
					'user_icon' => 'social_icon',
					'designation' => 'Support',
					'description' => 'Availabe',
					'welcome_message' => 'Hi I want to ask for you services',
				]
			);
 
			$table_name = $wpdb->prefix . 'cnc_auto_reply';
			$charset_collate = $wpdb->get_charset_collate();
		
			$sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				query tinytext NOT NULL,
				keyword tinytext NOT NULL,
				reply text NOT NULL,
				is_suggestion char(1) DEFAULT '0',
				PRIMARY KEY  (id)
			) $charset_collate;";
		
			dbDelta($sql);
			
			$wpdb->insert(
				$table_name,
				[
				 	'query' => 'What is Click n Chat?',
					'keyword' => 'Click n Chat',
					'reply' => '<b>Chat n Click</b> allows you to connect with website visitors through their favorite social channels by displaying a floating chat icon at the bottom of your site. With features like auto-reply, widget customization, and social user availability, you can ensure seamless communication and enhance visitor engagement across multiple platforms.',
					'is_suggestion' => '1'
				]
			);
			$wpdb->insert(
				$table_name,
				[
				 	'query' => 'default',
					'keyword' => 'default',
					'reply' => 'This message will be sent by default when no match is found in the autoreply.',
					'is_suggestion' => '1'
				]
			);
			
			$click_n_chat_setting_popup = new click_n_chat_setting_popup();
			update_option('click_n_chat_setting_popup', $click_n_chat_setting_popup);
			$click_n_chat_setting_woocommerce = new click_n_chat_setting_woocommerce();
			update_option('click_n_chat_setting_woocommerce', $click_n_chat_setting_woocommerce);
			$click_n_chat_setting_chatgpt = new click_n_chat_setting_chatgpt();
			update_option('click_n_chat_setting_chatgpt', $click_n_chat_setting_chatgpt);
			$click_n_chat_setting_analytics = new click_n_chat_setting_analytics();
			update_option('click_n_chat_setting_analytics', $click_n_chat_setting_analytics);
			update_option('click_n_chat_premium', false);
			update_option('click_n_chat_greetings_message', 'Welcome to <a href="https://flag92.com/">Click n Chat</a>');
			update_option('click_n_chat_time_zone', 'UTC');
			update_option('click_n_chat_limit', '10');
			update_option('click_n_chat_is_enable', '1');
		}
		function click_n_chat_migrate_clear() {
			global $wpdb;
        	$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}cnc_social_users");
			$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}cnc_auto_reply");
			delete_option('click_n_chat_setting_popup');
			delete_option('click_n_chat_greetings_message');
			delete_option('click_n_chat_is_enable');
			delete_option('click_n_chat_is_active');
			delete_option('click_n_chat_limit');
			delete_option('click_n_chat_purchase_code');
			delete_option('click_n_chat_setting_woocommerce');
			delete_option('click_n_chat_setting_chatgpt');
			delete_option('click_n_chat_setting_analytics');
			delete_option('click_n_chat_time_zone');
		}
		function click_n_chat_plugin_admin_notice() {
			if (isset($_GET['message'])) {
				$message_type = sanitize_text_field($_GET['message']);
		
				if ($message_type == 'success') {
				?>
					<div class="notice notice-success is-dismissible">
						<p>Record saved successfully.</p>
					</div>
                <?php
				} elseif ($message_type == 'deleted') {
				?>
					<div class="notice notice-success is-dismissible">
						<p>Record deleted successfully.</p>
					</div>
                <?php
				} elseif ($message_type == 'error') {
				?>
					<div class="notice notice-error is-dismissible">
						<p>There was an error processing your request.</p>
					</div>
                <?php 
				}
			}
		}
    }
	
    new click_n_chat_menu();
}

