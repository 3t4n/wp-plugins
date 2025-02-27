<?php

/**
 * Prevents direct access to the file
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Class Floating_Links_Admin
 *
 * This class handles the admin functionalities of the Floating Links plugin
 */
if ( !class_exists( 'Floating_Links_Admin' ) ) {
    class Floating_Links_Admin {
        /**
         * Floating_Links_Admin constructor.
         *
         * Adds necessary hooks for admin functionalities of the Floating Links plugin
         *
         * @since 1.0.0
         */
        public function __construct() {
            // Registers the menu items for the plugin in the admin panel
            add_action( 'admin_menu', array($this, 'register_menu') );
            // Enqueues the necessary scripts and styles for the plugin's admin pages
            add_action( 'admin_enqueue_scripts', array($this, 'enqueue_scripts') );
            // Adds action to display admin notices
            add_action( 'admin_notices', array($this, 'admin_notices') );
            // Adds AJAX actions for the plugin
            add_action( 'wp_ajax_fl_supported', array($this, 'hide_support_notice') );
            add_action( 'wp_ajax_fl_hide_up', array($this, 'hide_upgrade_notice') );
            add_action( 'wp_ajax_fl_save_values', array($this, 'save_settings') );
            add_action( 'wp_ajax_fl_save_social_settings', array($this, 'save_social_settings') );
            add_action( 'wp_ajax_fl_save_social_icons', array($this, 'save_social_networks') );
            // Modifies the footer text in the admin pages
            add_filter( 'admin_footer_text', array($this, 'footer_text') );
        }

        /**
         * This method registers menu items for the Floating Links plugin in the admin panel.
         *
         * @since 1.0.0
         */
        public function register_menu() {
            add_menu_page(
                __( 'Floating Links Settings', 'floating-links' ),
                __( 'Floating links & social icons', 'floating-links' ),
                'manage_options',
                'floating_links',
                array($this, 'load_main_page'),
                FLOATING_LINKS_URL . 'admin/assets/images/plugin-icon.png'
            );
            add_submenu_page(
                'floating_links',
                __( 'Social Icons', 'floating-links' ),
                __( 'Social Icons', 'floating-links' ),
                'manage_options',
                'floating-links-social-icons',
                array($this, 'load_social_icons_page')
            );
        }

        /**
         * Enqueues the necessary scripts and styles for the Floating Links plugin's admin pages.
         *
         * @param $hook - the current admin page
         *
         * @since 1.0.0
         */
        public function enqueue_scripts( $hook ) {
            // load styles and scripts for only floating links pages
            if ( 'toplevel_page_floating_links' == $hook || 'floating-links-social-icons_page_floating-links-social-icons' == $hook ) {
                // do not load uneccasery scripts to avoid conflicts
                wp_deregister_script( 'bootstrap.min' );
                wp_deregister_script( 'bootstrap' );
                wp_deregister_script( 'jquery-ui-tabs' );
                wp_enqueue_script( 'jquery-ui-core' );
                wp_enqueue_script( 'jquery-ui-tooltip' );
                wp_enqueue_style(
                    'select2',
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                    array(),
                    '4.1.0'
                );
                wp_enqueue_style(
                    'floating-links-fonts',
                    FLOATING_LINKS_URL . 'admin/assets/css/floating-links-fonts.css',
                    array(),
                    FLOATING_LINKS_VERSION
                );
                wp_enqueue_style(
                    'floating-link-admin',
                    FLOATING_LINKS_URL . 'admin/assets/css/floating-links-admin.css',
                    array(),
                    FLOATING_LINKS_VERSION
                );
                wp_enqueue_script( 'jquery-ui-sortable' );
                wp_enqueue_script(
                    'select2',
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                    array('jquery'),
                    '4.1.0'
                );
                wp_enqueue_script(
                    'floating-links-admin',
                    FLOATING_LINKS_URL . 'admin/assets/js/floating-links-admin.js',
                    array('jquery', 'jquery-ui-tooltip', 'select2'),
                    FLOATING_LINKS_VERSION
                );
                // provide data to use in JS
                wp_localize_script( 'floating-links-admin', 'fl', array(
                    'nonce'               => wp_create_nonce( 'fl-ajax-nonce' ),
                    'ajax_url'            => esc_url( admin_url( 'admin-ajax.php' ) ),
                    'notification_string' => __( 'Saving...', 'floating-links' ),
                ) );
            }
        }

        /**
         * Loads the main plugin page in the admin panel
         *
         * @since 1.0.0
         */
        public function load_main_page() {
            $upgrade_info = $this->upgrade_info();
            $settings = get_option( 'fl_settings', false );
            $sort_order = fl_get_sort_order();
            $sort_order = explode( ',', $sort_order );
            $pages = get_pages( array(
                'post_status' => 'publish,private,draft',
            ) );
            $posts = get_posts( array(
                'post_status' => 'publish,private,draft',
            ) );
            if ( fl_fs()->is_premium() ) {
                $plan_class = 'fl-pro';
            } else {
                $plan_class = 'fl-free';
            }
            include_once FLOATING_LINKS_DIR . 'admin/views/html-admin-page-floating-links.php';
        }

        /**
         * Loads the social icons page in the admin panel
         *
         * @since 1.0.0
         */
        public function load_social_icons_page() {
            $upgrade_info = $this->upgrade_info();
            if ( fl_fs()->is_premium() ) {
                $plan_class = 'fl-pro';
            } else {
                $plan_class = 'fl-free';
            }
            $settings = fl_get_social_icons_settings();
            include_once FLOATING_LINKS_DIR . 'admin/views/social-icons/html-admin-page-social-icons.php';
        }

        /**
         * Handles the AJAX request to save plugin settings
         *
         * @since 1.0.0
         */
        public function save_settings() {
            if ( !wp_verify_nonce( $_POST['nonce'], 'fl-ajax-nonce' ) ) {
                wp_send_json_error( __( 'Nonce not verified', 'floating-links' ) );
            }
            if ( !current_user_can( 'manage_options' ) ) {
                wp_send_json_error( __( 'You do not have permission to do this', 'floating-links' ) );
            }
            if ( isset( $_POST['fl_value'] ) ) {
                if ( is_array( $_POST['fl_value'] ) ) {
                    $value = array_map( 'sanitize_text_field', $_POST['fl_value'] );
                } else {
                    $value = sanitize_text_field( $_POST['fl_value'] );
                }
            }
            if ( isset( $_POST['fl_option'] ) ) {
                $id = sanitize_text_field( $_POST['fl_option'] );
            } else {
                $id = false;
            }
            if ( !$id ) {
                wp_send_json_error( __( 'Something went wrong', 'floating-links' ) );
            }
            $settings = get_option( 'fl_settings', false );
            $settings[$id] = $value;
            $saved = update_option( 'fl_settings', $settings );
            if ( $saved ) {
                wp_send_json_success( __( 'Saved', 'floating-links' ) );
            } else {
                wp_send_json_error( __( 'Something went wrong', 'floating-links' ) );
            }
        }

        /**
         * Handles the AJAX request to save social icon settings
         *
         * @since 1.0.0
         */
        public function save_social_settings() {
            if ( !wp_verify_nonce( $_POST['nonce'], 'fl-ajax-nonce' ) ) {
                wp_send_json_error( __( 'Nonce not verified', 'floating-links' ) );
            }
            if ( !current_user_can( 'manage_options' ) ) {
                wp_send_json_error( __( 'You do not have permission to do this', 'floating-links' ) );
            }
            if ( isset( $_POST['fl_value'] ) ) {
                $value = sanitize_text_field( $_POST['fl_value'] );
            }
            if ( isset( $_POST['fl_option'] ) ) {
                $id = sanitize_text_field( $_POST['fl_option'] );
            } else {
                $id = false;
            }
            if ( !$id ) {
                wp_send_json_error( __( 'Something went wrong', 'floating-links' ) );
            }
            $settings = get_option( 'fl_settings', false );
            $settings['social_icons'][$id] = $value;
            $saved = update_option( 'fl_settings', $settings );
            if ( $saved ) {
                wp_send_json_success( __( 'Saved', 'floating-links' ) );
            } else {
                wp_send_json_error( __( 'Something went wrong', 'floating-links' ) );
            }
        }

        /**
         * Handles the AJAX request to save social network order
         *
         * @since 1.0.0
         */
        public function save_social_networks() {
            if ( !wp_verify_nonce( $_POST['nonce'], 'fl-ajax-nonce' ) ) {
                wp_send_json_error( __( 'Nonce not verified', 'floating-links' ) );
            }
            if ( !current_user_can( 'manage_options' ) ) {
                wp_send_json_error( __( 'You do not have permission to do this', 'floating-links' ) );
            }
            if ( isset( $_POST['fl_form'] ) ) {
                parse_str( $_POST['fl_form'], $networks );
            }
            $keys = array();
            foreach ( $networks['networks'] as $key => $value ) {
                if ( !isset( $value['enabled'] ) ) {
                    $networks['networks'][$key]['enabled'] = 'off';
                }
                $keys[$key] = $key;
            }
            $settings = get_option( 'fl_settings', false );
            $settings['social_icons']['networks'] = $networks['networks'];
            $settings['social_icons']['sort'] = $keys;
            $saved = update_option( 'fl_settings', $settings );
            if ( $saved ) {
                wp_send_json_success( __( 'Saved', 'floating-links' ) );
            } else {
                wp_send_json_error( __( 'Something went wrong', 'floating-links' ) );
            }
        }

        /**
         * Display admin notices
         *
         * @since 1.0.0
         */
        public function admin_notices() {
            if ( !current_user_can( 'install_plugins' ) ) {
                return false;
            }
            $settings = get_option( 'fl_settings', false );
            if ( isset( $settings['fl_installDate'] ) && !empty( $settings['fl_installDate'] ) ) {
                $install_date = $settings['fl_installDate'];
            } else {
                return false;
            }
            $display_date = date( 'Y-m-d h:i:s' );
            $datetime1 = new DateTime($install_date);
            $datetime2 = new DateTime($display_date);
            $diff_intrval = round( ($datetime2->format( 'U' ) - $datetime1->format( 'U' )) / (60 * 60 * 24) );
            if ( $diff_intrval >= 6 && get_site_option( 'fl_supported' ) != 'yes' ) {
                ?>

				<div style="position:relative;padding-right:80px;background: #fff;" class="update-nag fta_msg fta_review">
					<p>
						<?php 
                esc_html_e( 'Awesome, you have been using Floating Links for more than a week. I would really appreciate it if you', 'floating-links' );
                ?>
						<b><?php 
                esc_html_e( 'review and rate ', 'floating-links' );
                ?></b>
						<?php 
                esc_html_e( 'the plugin to help spread the word and ', 'floating-links' );
                ?>
						<b><?php 
                esc_html_e( 'encourage us to make it even better.', 'floating-links' );
                ?></b>
					</p>
					<div class="fl_support_btns">
						<a href="https://wordpress.org/support/plugin/floating-links/reviews/?filter=5#new-post" class="fl_HideRating button button-primary" target="_blank">
							<?php 
                esc_html_e( 'I Like Floating Links - It increased engagement on my site', 'floating-links' );
                ?>
						</a>
						<a href="#" class="fl_HideRating button">
							<?php 
                esc_html_e( 'I already rated it', 'floating-links' );
                ?>
						</a>
						<br>
						<a style="margin-top:5px;float:left;" href="#" class="fl_HideRating">
							<?php 
                esc_html_e( 'No, not good enough, I do not like to rate it', 'floating-links' );
                ?>
						</a>
						<div class="fl_HideRating" style="position:absolute;right:10px;cursor:pointer;top:4px;color: #029be4;">
							<div style="font-weight:bold;" class="dashicons dashicons-no-alt"></div>
							<span style="margin-left: 2px;">
								<?php 
                esc_html_e( 'Dismiss', 'floating-links' );
                ?>
							</span>
						</div>
					</div>
				</div>
				<script>
				  jQuery('.fl_HideRating').click(function() {
					const data = {'action': 'fl_supported'};
					jQuery.ajax({
					  url: "<?php 
                echo esc_url( admin_url( 'admin-ajax.php' ) );
                ?>",
					  type: 'post',
					  data: data,
					  dataType: 'json',
					  async: !0,
					  success: function(e) {
						if(e === 'success'){
						  jQuery('.fl_msg.fl_review').slideUp('fast');
						}
					  },
					});
				  });
				</script>
				<style>
					.update-nag.fl_msg{
						padding: 20px;
						position: relative;
						background: #fff;
					}
					.fl_up_msg{    padding-right: 37px !important;}
					.fl_up_msg .fl_hide_up{    position: absolute;
						right: 8px;
						top: 5px;
						cursor: pointer;}
					.update-nag.fl_msg p{  margin-top: 0;}
					.update-nag.fl_msg .fl_up{background-color: #7fc6a6;
						color: #fff;
						box-shadow: none;
						text-shadow: none;
						border: none;
						padding: 10px 27px;
						margin-top: 5px;
						height: auto;
						font-size: 16px;
						border-radius: 0;}
					.update-nag.fl_msg:nth-child(2), .update-nag.fl_msg:nth-child(4){
						display:none;
					}
				</style>
				<?php 
            }
        }

        /**
         * Save the hide settings to never show the notice again
         *
         * @since 1.0.0
         */
        public function hide_support_notice() {
            if ( !current_user_can( 'install_plugins' ) ) {
                return false;
            }
            update_site_option( 'fl_supported', 'yes' );
            echo wp_json_encode( array('success') );
            exit;
        }

        /**
         * Save the hide settings to never show the notice again
         *
         * @since 1.0.0
         */
        public function hide_upgrade_notice() {
            if ( !current_user_can( 'install_plugins' ) ) {
                return false;
            }
            update_site_option( 'fl_hide_up', 'yes' );
            echo wp_json_encode( array('success') );
            exit;
        }

        /**
         * Display custom message in footer
         *
         * @param $text
         *
         * @return mixed|string
         *
         * @since 1.0.0
         */
        public function footer_text( $text ) {
            $screen = get_current_screen();
            $arr = array(
                'toplevel_page_floating_links',
                'floating-links-pro_page_floating_links-account',
                'floating-links_page_floating_links-account',
                'floating-links-pro_page_floating_links-contact',
                'floating-links_page_floating_links-contact',
                'floating-links-social-icons_page_floating-links-social-icons'
            );
            if ( in_array( $screen->id, $arr ) ) {
                $text = '<i><a href="' . admin_url( '?page=floating_links' ) . '">Floating Links</a> v' . FLOATING_LINKS_VERSION . '. ' . __( 'Please', 'floating-links' ) . ' <a target="_blank" href="https://wordpress.org/support/plugin/floating-links/reviews/?filter=5#new-post">' . __( 'rate the plugin', 'floating-links' ) . '<span style="color: #ffb900;" class="stars">&#9733; &#9733; &#9733; &#9733; &#9733; </span></a> ' . __( ' to help us spread the word. Thank you from the Floating Links team!', 'floating-links' ) . '</i>';
                if ( !fl_fs()->is_premium() ) {
                    $text .= '<a style="margin-left:10px" href="' . esc_url( fl_fs()->get_upgrade_url() ) . '" class="button button-black" target="_blank">' . __( 'Go Pro', 'floating-links' ) . ' </a>';
                }
                $text .= '<style>#wpfooter{background-color: #fff;}</style>';
            }
            return $text;
        }

        /**
         * Upgrade info to change data everywhere
         *
         * @since 1.0.0
         *
         * @return array
         */
        public function upgrade_info() {
            return array(
                'coupon'   => 'fl10',
                'discount' => '10%',
                'btn_text' => __( 'Upgrade Now', 'floating-links' ),
                'btn_url'  => fl_fs()->get_upgrade_url(),
            );
        }

    }

    new Floating_Links_Admin();
}