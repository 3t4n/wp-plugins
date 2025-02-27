<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Plugin_Usage_Tracker') ) {
	class Plugin_Usage_Tracker {
		private $wisdom_version = '1.2.4';
		private $home_url = '';
		private $plugin_file = '';
		private $plugin_name = '';
		private $options = array();
		private $require_optin = true;
		private $include_goodbye_form = true;
		private $marketing = false;
		private $collect_email = false;
		private $what_am_i = 'plugin';
		private $theme_allows_tracking = 0;

		public function __construct(
			$_plugin_file,
			$_home_url,
			$_options,
			$_require_optin=true,
			$_include_goodbye_form=true,
			$_marketing=false ) {
			$this->plugin_file = $_plugin_file;
			$this->home_url = trailingslashit( $_home_url );
			if( basename( $this->plugin_file, '.php' ) != 'functions' ) {
				$this->plugin_name = basename( $this->plugin_file, '.php' );
			} else {
				$this->what_am_i = 'theme';
				$theme = wp_get_theme();
				if( $theme->Name ) {
					$this->plugin_name = sanitize_text_field( $theme->Name );
				}
			}
			$this->options = $_options;
			$this->require_optin = $_require_optin;
			$this->include_goodbye_form = $_include_goodbye_form;
			$this->marketing = $_marketing;
			$this->theme_allows_tracking = get_theme_mod( 'wisdom-allow-tracking', 0 );
			if( $this->what_am_i == 'theme' ) {
				add_action( 'after_switch_theme', array( $this, 'schedule_tracking' ) );
				add_action( 'switch_theme', array( $this, 'deactivate_this_plugin' ) );
			} else {
				register_activation_hook( $this->plugin_file, array( $this, 'schedule_tracking' ) );
				register_deactivation_hook( $this->plugin_file, array( $this, 'deactivate_this_plugin' ) );
			}
			$this->init();
		}

		public function init() {
			if( $this->marketing == 3 ) {
				$this->set_can_collect_email( true, $this->plugin_name );
			}
			if( ! $this->require_optin ) {
				$this->set_can_collect_email( true, $this->plugin_name );
				$this->set_is_tracking_allowed( true );
				$this->update_block_notice();
				$this->do_tracking();
			}
			add_filter( 'cron_schedules', array( $this, 'schedule_weekly_event' ) );
			add_action( 'put_do_weekly_action', array( $this, 'do_tracking' ) );
			add_action( 'admin_init', array( $this, 'set_notification_time' ) );
			add_action( 'admin_notices', array( $this, 'optin_notice' ) );
			add_action( 'admin_notices', array( $this, 'marketing_notice' ) );
			add_filter( 'plugin_action_links_' . plugin_basename( $this->plugin_file ), array( $this, 'filter_action_links' ) );
			add_action( 'admin_footer-plugins.php', array( $this, 'goodbye_ajax' ) );
			add_action( 'wp_ajax_goodbye_form', array( $this, 'goodbye_form_callback' ) );
		}

		public function schedule_tracking() {
			if ( ! wp_next_scheduled( 'put_do_weekly_action' ) ) {
				$schedule = $this->get_schedule();
				wp_schedule_event( time(), $schedule, 'put_do_weekly_action' );
			}
			$this->do_tracking( true );
		}

		public function schedule_weekly_event( $schedules ) {
			$schedules['weekly'] = array(
				'interval'	=> 604800,
				'display'		=> __( 'Once Weekly' )
			);
			$schedules['monthly'] = array(
				'interval'	=> 2635200,
				'display'		=> __( 'Once Monthly' )
			);
			return $schedules;
		}

		public function get_schedule() {
			$schedule = apply_filters( 'wisdom_filter_schedule_' . $this->plugin_name, 'weekly' );
			return $schedule;
		}

		public function do_tracking( $force=false ) {
			if ( ! $this->home_url ) {
				return;
			}
			$allow_tracking = $this->get_is_tracking_allowed();
			if( ! $allow_tracking ) {
				return;
			}
			$track_time = $this->get_is_time_to_track();
			if( ! $track_time && ! $force ) {
				return;
			}
			$this->set_admin_email();
			$body = $this->get_data();
			$this->send_data( $body );
		}

		public function force_tracking() {
			$this->do_tracking( true ); 
		}

		public function send_data( $body ) {
			$request = wp_remote_post(
				esc_url( $this->home_url . '?usage_tracker=hello' ),
				array(
					'method'      => 'POST',
					'timeout'     => 20,
					'redirection' => 5,
					'httpversion' => '1.1',
					'blocking'    => true,
					'body'        => $body,
					'user-agent'  => 'PUT/1.0.0; ' . home_url()
				)
			);
			$this->set_track_time();
			if( is_wp_error( $request ) ) {
				return $request;
			}
		}

		public function get_data() {
			$body['message'] = '';
			$body = array(
				'plugin_slug'			=> sanitize_text_field( $this->plugin_name ),
				'url'							=> home_url(),
				'site_name' 			=> get_bloginfo( 'name' ),
				'site_version'		=> get_bloginfo( 'version' ),
				'site_language'		=> get_bloginfo( 'language' ),
				'charset'					=> get_bloginfo( 'charset' ),
				'wisdom_version'	=> $this->wisdom_version,
				'php_version'			=> phpversion(),
				'multisite'				=> is_multisite(),
				'file_location'		=> __FILE__,
				'product_type'		=> esc_html( $this->what_am_i )
			);
			if( $this->get_can_collect_email() ) {
				$body['email'] = $this->get_admin_email();
			}
			$body['marketing_method'] = $this->marketing;
			$body['server'] = isset( $_SERVER['SERVER_SOFTWARE'] ) ? $_SERVER['SERVER_SOFTWARE'] : '';
			$body['memory_limit'] = ini_get( 'memory_limit' );
			$body['upload_max_size'] = ini_get( 'upload_max_size' );
			$body['post_max_size'] = ini_get( 'post_max_size' );
			$body['upload_max_filesize'] = ini_get( 'upload_max_filesize' );
			$body['max_execution_time'] = ini_get( 'max_execution_time' );
			$body['max_input_time'] = ini_get( 'max_input_time' );			
			if( ! function_exists( 'get_plugins' ) ) {
				include ABSPATH . '/wp-admin/includes/plugin.php';
			}
			$plugins = array_keys( get_plugins() );
			$active_plugins = get_option( 'active_plugins', array() );
			foreach ( $plugins as $key => $plugin ) {
				if ( in_array( $plugin, $active_plugins ) ) {
					unset( $plugins[$key] );
				}
			}
			$body['active_plugins'] = $active_plugins;
			$body['inactive_plugins'] = $plugins;
			$body['text_direction']	= 'LTR';
			if( function_exists( 'is_rtl' ) ) {
				if( is_rtl() ) {
					$body['text_direction']	= 'RTL';
				}
			} else {
				$body['text_direction']	= 'not set';
			}

			$plugin = $this->plugin_data();
			$body['status'] = 'Active'; 
			if( empty( $plugin ) ) {
				$body['message'] .= __( 'We can\'t detect any product information. This is most probably because you have not included the code snippet.', 'singularity' );
				$body['status'] = 'Data not found'; 
			} else {
				if( isset( $plugin['Name'] ) ) {
					$body['plugin'] = sanitize_text_field( $plugin['Name'] );
				}
				if( isset( $plugin['Version'] ) ) {
					$body['version'] = sanitize_text_field( $plugin['Version'] );
				}
			}

			$options = $this->options;
			$plugin_options = array();
			if( ! empty( $options ) && is_array( $options ) ) {
				foreach( $options as $option ) {
					$fields = get_option( $option );
					foreach( $fields as $key=>$value ) {
						$plugin_options[$key] = $value;
						
					}
				}
			}
			$body['plugin_options'] = $this->options;
			$body['plugin_options_fields'] = $plugin_options;
			
			$theme = wp_get_theme();
			if( $theme->Name ) {
				$body['theme'] = sanitize_text_field( $theme->Name );
			}
			if( $theme->Version ) {
				$body['theme_version'] = sanitize_text_field( $theme->Version );
			}
			if( $theme->Template ) {
				$body['theme_parent'] = sanitize_text_field( $theme->Template );
			}
			return $body;
		}

		public function plugin_data() {
			if( ! function_exists( 'get_plugin_data' ) ) {
				include ABSPATH . '/wp-admin/includes/plugin.php';
			}
			$plugin = get_plugin_data( $this->plugin_file );
			return $plugin;
		}

		public function deactivate_this_plugin() {
			if( $this->what_am_i == 'theme' ) {
				$allow_tracking = $this->theme_allows_tracking;
			} else {
				$allow_tracking = $this->get_is_tracking_allowed();
			}
			if( ! $allow_tracking ) {
				return;
			}
			$body = $this->get_data();
			$body['status'] = 'Deactivated'; 
			$body['deactivated_date'] = time();
			if( false !== get_option( 'wisdom_deactivation_reason_' . $this->plugin_name ) ) {
				$body['deactivation_reason'] = get_option( 'wisdom_deactivation_reason_' . $this->plugin_name );
			}
			if( false !== get_option( 'wisdom_deactivation_details_' . $this->plugin_name ) ) {
				$body['deactivation_details'] = get_option( 'wisdom_deactivation_details_' . $this->plugin_name );
			}
			$this->send_data( $body );
			wp_clear_scheduled_hook( 'put_do_weekly_action' );
			$track_time = get_option( 'wisdom_last_track_time' );
			if( isset( $track_time[$this->plugin_name]) ) {
				unset( $track_time[$this->plugin_name] );
			}
			update_option( 'wisdom_last_track_time', $track_time );
		}

		public function get_is_tracking_allowed() {
			if( $this->has_user_opted_out() ) {
				$this->set_is_tracking_allowed( false, $this->plugin_name );
				return false;
			}
			if( $this->what_am_i == 'theme' ) {
				$mod = get_theme_mod( 'wisdom-allow-tracking', 0 );
				if( $mod ) {
					return true;
				}
			} else {
				$allow_tracking = get_option( 'wisdom_allow_tracking' );
				if( isset( $allow_tracking[$this->plugin_name] ) ) {
					return true;
				}
			}
			return false;
		}

		public function set_is_tracking_allowed( $is_allowed, $plugin=null ) {
			if( empty( $plugin ) ) {
				$plugin = $this->plugin_name;
			}
			$allow_tracking = get_option( 'wisdom_allow_tracking' );
			if( $this->has_user_opted_out() ) {
				if( $this->what_am_i == 'theme' ) {
					set_theme_mod( 'wisdom-allow-tracking', 0 );
				} else {
					if( isset( $allow_tracking[$plugin] ) ) {
						unset( $allow_tracking[$plugin] );
					}
				}
			} else if( $is_allowed || ! $this->require_optin ) {
				if( $this->what_am_i == 'theme' ) {
					set_theme_mod( 'wisdom-allow-tracking', 1 );
				} else {
					if( empty( $allow_tracking ) || ! is_array( $allow_tracking ) ) {
						$allow_tracking = array( $plugin => $plugin );
					} else {
						$allow_tracking[$plugin] = $plugin;
					}
				}
			} else {
				if( $this->what_am_i == 'theme' ) {
					set_theme_mod( 'wisdom-allow-tracking', 0 );
				} else {
					if( isset( $allow_tracking[$plugin] ) ) {
						unset( $allow_tracking[$plugin] );
					}
				}
			}
			update_option( 'wisdom_allow_tracking', $allow_tracking );
		}

		public function has_user_opted_out() {
			if( $this->what_am_i == 'theme' ) {
				$mod = get_theme_mod( 'wisdom-allow-tracking', 0 );
				if( false === $mod ) {
					return true;
				}
			} else {
				if( ! empty( $this->options ) ) {
					foreach( $this->options as $option_name ) {
						$options = get_option( $option_name );
						if( ! empty( $options['wisdom_opt_out'] ) ) {
							return true;
						}
					}
				}
			}
			return false;
		}

		public function get_is_time_to_track() {
			$track_times = get_option( 'wisdom_last_track_time', array() );
			if( ! isset( $track_times[$this->plugin_name] ) ) {
				return true;
			} else {
				$schedule = $this->get_schedule();
				if( $schedule == 'daily' ) {
					$period = 'day';
				} else if( $schedule == 'weekly' ) {
					$period = 'week';
				} else {
					$period = 'month';
				}
				if( $track_times[$this->plugin_name] < strtotime( '-1 ' . $period ) ) {
					return true;
				}
			}
			return false;
		}

		public function set_track_time() {
			$track_times = get_option( 'wisdom_last_track_time', array() );
			$track_times[$this->plugin_name] = time();
			update_option( 'wisdom_last_track_time', $track_times );
		}

		public function set_notification_time() {
			$notification_times = get_option( 'wisdom_notification_times', array() );
			if( ! isset( $notification_times[$this->plugin_name] ) ) {
				$delay_notification = apply_filters( 'wisdom_delay_notification_' . $this->plugin_name, 0 );
				$notification_time = time() + absint( $delay_notification );
				$notification_times[$this->plugin_name] = $notification_time;
				update_option( 'wisdom_notification_times', $notification_times );
			}
		}

		public function get_is_notification_time() {
			$notification_times = get_option( 'wisdom_notification_times', array() );
			$time = time();
			if( isset( $notification_times[$this->plugin_name] ) ) {
				$notification_time = $notification_times[$this->plugin_name];
				if( $time >= $notification_time ) {
					return true;
				}
			}
			return false;
		}

		public function update_block_notice( $plugin=null ) {
			if( empty( $plugin ) ) {
				$plugin = $this->plugin_name;
			}
			$block_notice = get_option( 'wisdom_block_notice' );
			if( empty( $block_notice ) || ! is_array( $block_notice ) ) {
				$block_notice = array( $plugin => $plugin );
			} else {
				$block_notice[$plugin] = $plugin;
			}
			update_option( 'wisdom_block_notice', $block_notice );
		}

		public function get_can_collect_email() {
			$collect_email = get_option( 'wisdom_collect_email' );
			if( isset( $collect_email[$this->plugin_name] ) ) {
				return true;
			}
			return false;
		}

		public function set_can_collect_email( $can_collect, $plugin=null ) {
			if( empty( $plugin ) ) {
				$plugin = $this->plugin_name;
			}
			$collect_email = get_option( 'wisdom_collect_email' );
			if( $can_collect ) {
				if( empty( $collect_email ) || ! is_array( $collect_email ) ) {
					$collect_email = array( $plugin => $plugin );
				} else {
					$collect_email[$plugin] = $plugin;
				}
			} else {
				if( isset( $collect_email[$plugin] ) ) {
					unset( $collect_email[$plugin] );
				}
			}
			update_option( 'wisdom_collect_email', $collect_email );
		}

		public function get_admin_email() {
			$email = get_option( 'wisdom_admin_emails' );
			if( isset( $email[$this->plugin_name] ) ) {
				return $email[$this->plugin_name];
			}
			return false;
		}

		public function set_admin_email( $email=null, $plugin=null ) {
			if( empty( $plugin ) ) {
				$plugin = $this->plugin_name;
			}
			if( empty( $email ) ) {
				if( function_exists( 'wp_get_current_user' ) ) {
					$current_user = wp_get_current_user();
					$email = $current_user->user_email;
				}
			}
			$admin_emails = get_option( 'wisdom_admin_emails' );
			if( empty( $admin_emails ) || ! is_array( $admin_emails ) ) {
				$admin_emails = array( $plugin => sanitize_email( $email ) );
			} else if( empty( $admin_emails[$plugin] ) ) {
				$admin_emails[$plugin] = sanitize_email( $email );
			}
			update_option( 'wisdom_admin_emails', $admin_emails );
		}

		public function optin_notice() {
			if( isset( $_GET['plugin'] ) && isset( $_GET['plugin_action'] ) ) {
				$plugin = sanitize_text_field( $_GET['plugin'] );
				$action = sanitize_text_field( $_GET['plugin_action'] );
				if( $action == 'yes' ) {
					$this->set_is_tracking_allowed( true, $plugin );
					add_action( 'admin_init', array( $this, 'force_tracking' ) );
				} else {
					$this->set_is_tracking_allowed( false, $plugin );
				}
				$this->update_block_notice( $plugin );
			}
			$is_time = $this->get_is_notification_time();
			if( ! $is_time ) {
				return false;
			}
			$block_notice = get_option( 'wisdom_block_notice' );
			if( isset( $block_notice[$this->plugin_name] ) ) {
				return;
			}
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}
			$is_local = false;
			if( stristr( network_site_url( '/' ), '.dev' ) !== false || stristr( network_site_url( '/' ), 'localhost' ) !== false || stristr( network_site_url( '/' ), ':8888' ) !== false ) {
				$is_local = true;
			}
			$is_local = apply_filters( 'wisdom_is_local_' . $this->plugin_name, $is_local );
			if ( $is_local ) {
				$this->update_block_notice();
			} else {
				$plugin = $this->plugin_data();
				$plugin_name = $plugin['Name'];
				$yes_args = array(
					'plugin' 		=> $this->plugin_name,
					'plugin_action'	=> 'yes'
				);
				if( $this->marketing == 1 ) {
					$yes_args['marketing_optin'] = 'yes';
				} else if( $this->marketing == 2 ) {
					$yes_args['marketing'] = 'yes';
				}
				$url_yes = add_query_arg( $yes_args );
				$url_no = add_query_arg( array(
					'plugin' 		=> $this->plugin_name,
					'plugin_action'	=> 'no'
				) );
				if( $this->marketing != 1 ) {
					$notice_text = sprintf(
						__( 'Thank you for installing our %1$s. We would like to track its usage on your site. We don\'t record any sensitive data, only information regarding the WordPress environment and %1$s settings, which we will use to help us make improvements to the %1$s. Tracking is completely optional.', 'singularity' ),
						$this->what_am_i
					);
				} else {
					$notice_text = sprintf(
						__( 'Thank you for installing our %1$s. We\'d like your permission to track its usage on your site. We won\'t record any sensitive data, only information regarding the WordPress environment and %1$s settings, which we will use to help us make improvements to the %1$s. Tracking is completely optional.', 'singularity' ),
						$this->what_am_i
					);
				}
				$notice_text = apply_filters( 'wisdom_notice_text_' . esc_attr( $this->plugin_name ), $notice_text ); ?>
				<div class="notice notice-info updated put-dismiss-notice">
					<p><?php echo '<strong>' . esc_html( $plugin_name ) . '</strong>'; ?></p>
					<p><?php echo esc_html( $notice_text ); ?></p>
					<p>
						<a href="<?php echo esc_url( $url_yes ); ?>" class="button-secondary"><?php _e( 'Allow', 'singularity' ); ?></a>
						<a href="<?php echo esc_url( $url_no ); ?>" class="button-secondary"><?php _e( 'Do Not Allow', 'singularity' ); ?></a>
					</p>
				</div>
			<?php
			}
		}

		public function marketing_notice() {
			if( isset( $_GET['marketing_optin'] ) ) {
				$this->set_can_collect_email( sanitize_text_field( $_GET['marketing_optin'] ), $this->plugin_name );
				$this->do_tracking( true );
			} else if( isset( $_GET['marketing'] ) && $_GET['marketing']=='yes' ) {
				$plugin = $this->plugin_data();
				$plugin_name = $plugin['Name'];
				$url_yes = add_query_arg( array(
					'plugin' 			=> $this->plugin_name,
					'marketing_optin'	=> 'yes'
				) );
				$url_no = add_query_arg( array(
					'plugin' 			=> $this->plugin_name,
					'marketing_optin'	=> 'no'
				) );
				$marketing_text = sprintf(
					__( 'Thank you for opting in to tracking. Would you like to receive occasional news about this %s, including details of new features and special offers?', 'singularity' ),
					$this->what_am_i
				);
				$marketing_text = apply_filters( 'wisdom_marketing_text_' . esc_attr( $this->plugin_name ), $marketing_text ); ?>
				<div class="notice notice-info updated put-dismiss-notice">
					<p><?php echo '<strong>' . esc_html( $plugin_name ) . '</strong>'; ?></p>
					<p><?php echo esc_html( $marketing_text ); ?></p>
					<p>
						<a href="<?php echo esc_url( $url_yes ); ?>" data-putnotice="yes" class="button-secondary"><?php _e( 'Yes Please', 'singularity' ); ?></a>
						<a href="<?php echo esc_url( $url_no ); ?>" data-putnotice="no" class="button-secondary"><?php _e( 'No Thank You', 'singularity' ); ?></a>
					</p>
				</div>
				<?php }
		}

		public function filter_action_links( $links ) {
			if( ! $this->get_is_tracking_allowed() ) {
				return $links;
			}
			if( isset( $links['deactivate'] ) && $this->include_goodbye_form ) {
				$deactivation_link = $links['deactivate'];
				$deactivation_link = str_replace( '<a ', '<div class="put-goodbye-form-wrapper"><span class="put-goodbye-form" id="put-goodbye-form-' . esc_attr( $this->plugin_name ) . '"></span></div><a onclick="javascript:event.preventDefault();" id="put-goodbye-link-' . esc_attr( $this->plugin_name ) . '" ', $deactivation_link );
				$links['deactivate'] = $deactivation_link;
			}
			return $links;
		}

		public function form_default_text() {
			$form = array();
			$form['heading'] = __( 'Sorry to see you go', 'singularity' );
			$form['body'] = __( 'Before you deactivate the plugin, would you quickly give us your reason for doing so?', 'singularity' );
			$form['options'] = array(
				__( 'Set up is too difficult', 'singularity' ),
				__( 'Lack of documentation', 'singularity' ),
				__( 'Not the features I wanted', 'singularity' ),
				__( 'Found a better plugin', 'singularity' ),
				__( 'Installed by mistake', 'singularity' ),
				__( 'Only required temporarily', 'singularity' ),
				__( 'Didn\'t work', 'singularity' )
			);
			$form['details'] = __( 'Details (optional)', 'singularity' );
			return $form;
		}

		public function form_filterable_text() {
			$form = $this->form_default_text();
			return apply_filters( 'wisdom_form_text_' . esc_attr( $this->plugin_name ), $form );
		}

		public function goodbye_ajax() {
			$form = $this->form_filterable_text();
			if( ! isset( $form['heading'] ) || ! isset( $form['body'] ) || ! isset( $form['options'] ) || ! is_array( $form['options'] ) || ! isset( $form['details'] ) ) {
				$form = $this->form_default_text();
			}
			$html = '<div class="put-goodbye-form-head"><strong>' . esc_html( $form['heading'] ) . '</strong></div>';
			$html .= '<div class="put-goodbye-form-body"><p>' . esc_html( $form['body'] ) . '</p>';
			if( is_array( $form['options'] ) ) {
				$html .= '<div class="put-goodbye-options"><p>';
				foreach( $form['options'] as $option ) {
					$html .= '<input type="checkbox" name="put-goodbye-options[]" id="' . str_replace( " ", "", esc_attr( $option ) ) . '" value="' . esc_attr( $option ) . '"> <label for="' . str_replace( " ", "", esc_attr( $option ) ) . '">' . esc_attr( $option ) . '</label><br>';
				}
				$html .= '</p><label for="put-goodbye-reasons">' . esc_html( $form['details'] ) .'</label><textarea name="put-goodbye-reasons" id="put-goodbye-reasons" rows="2" style="width:100%"></textarea>';
				$html .= '</div><!-- .put-goodbye-options -->';
			}
			$html .= '</div><!-- .put-goodbye-form-body -->';
			$html .= '<p class="deactivating-spinner"><span class="spinner"></span> ' . __( 'Submitting form', 'singularity' ) . '</p>';
			?>
			<div class="put-goodbye-form-bg"></div>
			<style type="text/css">
				.put-form-active .put-goodbye-form-bg {
					background: rgba( 0, 0, 0, .5 );
					position: fixed;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
				}
				.put-goodbye-form-wrapper {
					position: relative;
					z-index: 999;
					display: none;
				}
				.put-form-active .put-goodbye-form-wrapper {
					display: block;
				}
				.put-goodbye-form {
					display: none;
				}
				.put-form-active .put-goodbye-form {
					position: absolute;
				    bottom: 30px;
				    left: 0;
					max-width: 400px;
				    background: #fff;
					white-space: normal;
				}
				.put-goodbye-form-head {
					background: #0073aa;
					color: #fff;
					padding: 8px 18px;
				}
				.put-goodbye-form-body {
					padding: 8px 18px;
					color: #444;
				}
				.deactivating-spinner {
					display: none;
				}
				.deactivating-spinner .spinner {
					float: none;
					margin: 4px 4px 0 18px;
					vertical-align: bottom;
					visibility: visible;
				}
				.put-goodbye-form-footer {
					padding: 8px 18px;
				}
			</style>
			<script>
				jQuery(document).ready(function($){
					$("#put-goodbye-link-<?php echo esc_attr( $this->plugin_name ); ?>").on("click",function(){
						var url = document.getElementById("put-goodbye-link-<?php echo esc_attr( $this->plugin_name ); ?>");
						$('body').toggleClass('put-form-active');
						$("#put-goodbye-form-<?php echo esc_attr( $this->plugin_name ); ?>").fadeIn();
						$("#put-goodbye-form-<?php echo esc_attr( $this->plugin_name ); ?>").html( '<?php echo $html; ?>' + '<div class="put-goodbye-form-footer"><p><a id="put-submit-form" class="button primary" href="#"><?php _e( 'Submit and Deactivate', 'singularity' ); ?></a>&nbsp;<a class="secondary button" href="'+url+'"><?php _e( 'Just Deactivate', 'singularity' ); ?></a></p></div>');
						$('#put-submit-form').on('click', function(e){
							// As soon as we click, the body of the form should disappear
							$("#put-goodbye-form-<?php echo esc_attr( $this->plugin_name ); ?> .put-goodbye-form-body").fadeOut();
							$("#put-goodbye-form-<?php echo esc_attr( $this->plugin_name ); ?> .put-goodbye-form-footer").fadeOut();
							// Fade in spinner
							$("#put-goodbye-form-<?php echo esc_attr( $this->plugin_name ); ?> .deactivating-spinner").fadeIn();
							e.preventDefault();
							var values = new Array();
							$.each($("input[name='put-goodbye-options[]']:checked"), function(){
								values.push($(this).val());
							});
							var details = $('#put-goodbye-reasons').val();
							var data = {
								'action': 'goodbye_form',
								'values': values,
								'details': details,
								'security': "<?php echo wp_create_nonce ( 'wisdom_goodbye_form' ); ?>",
								'dataType': "json"
							}
							$.post(
								ajaxurl,
								data,
								function(response){
									window.location.href = url;
								}
							);
						});
						$('.put-goodbye-form-bg').on('click',function(){
							$("#put-goodbye-form-<?php echo esc_attr( $this->plugin_name ); ?>").fadeOut();
							$('body').removeClass('put-form-active');
						});
					});
				});
			</script>
		<?php }

		public function goodbye_form_callback() {
			check_ajax_referer( 'wisdom_goodbye_form', 'security' );
			if( isset( $_POST['values'] ) ) {
				$values = json_encode( wp_unslash( $_POST['values'] ) );
				update_option( 'wisdom_deactivation_reason_' . $this->plugin_name, $values );
			}
			if( isset( $_POST['details'] ) ) {
				$details = sanitize_text_field( $_POST['details'] );
				update_option( 'wisdom_deactivation_details_' . $this->plugin_name, $details );
			}
			$this->do_tracking(); // Run this straightaway
			echo 'success';
			wp_die();
		}

	}

}