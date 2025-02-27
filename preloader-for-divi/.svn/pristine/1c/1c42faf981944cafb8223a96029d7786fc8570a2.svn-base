<?php
/**
 * Plugin Name:       Preloader for Divi
 * Plugin URI:        https://wpmario.com/
 * Description:       It adds a preloader to the page while site is getting load.
 * Version:           1.5
 * Author:            WP Mario
 * Author URI:        https://wpmario.com/
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
define( 'DIVIPRELOADER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( !function_exists( 'dpl_fs' ) ) {
    // Create a helper function for easy SDK access.
    function dpl_fs()
    {
        global  $dpl_fs ;
        
        if ( !isset( $dpl_fs ) ) {
            // Include Freemius SDK.
            require_once plugin_dir_path( __FILE__ ) . '/freemius/start.php';
            $dpl_fs = fs_dynamic_init( array(
                'id'             => '16660',
                'slug'           => 'divi-pre-loader',
                'type'           => 'plugin',
                'public_key'     => 'pk_b32d21144b8744ec32d78595b94a6',
                'is_premium'     => false,
                'premium_suffix' => 'Divi Preloader Pro',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug'    => 'divipreloader_settings',
                'support' => false,
            ),
                'is_live'        => true,
            ) );
        }
        
        return $dpl_fs;
    }
    
    // Init Freemius.
    dpl_fs();
    // Signal that SDK was initiated.
    do_action( 'dpl_fs_loaded' );
}

require_once plugin_dir_path( __FILE__ ) . '/divipreloader_options/framework.php';
require_once 'inc/redux_options.php';
if ( !class_exists( 'Divihoster_Preloader' ) ) {
    class Divihoster_Preloader
    {
        public function __construct()
        {
            $theme = wp_get_theme();
            $theme_name = $theme->get( 'Name' );
            add_action( 'wp_enqueue_scripts', array( &$this, 'dh_preloader_add_public_scripts' ) );
            add_action( 'admin_enqueue_scripts', array( &$this, 'dh_preloader_add_admin_scripts' ) );
            
            if ( 'Divi' !== $theme_name ) {
                add_action( 'wp_footer', array( &$this, 'dh_preloader_et_before_main_content' ) );
            } else {
                add_action( 'et_before_main_content', array( &$this, 'dh_preloader_et_before_main_content' ) );
            }
            
            add_action( 'wp_enqueue_scripts', array( &$this, 'dh_preloader_add_public_scripts' ) );
            add_action( 'wp_head', array( &$this, 'dh_preloader_wp_head_css_default' ) );
            add_action( 'wp_head', array( &$this, 'dh_preloader_wp_head_css_editor' ) );
            // add_action('redux/page/divipreloader_opts/enqueue', array(&$this, 'divipreloader_redux_custom_css_callback') );
        }
        
        public function dh_preloader_add_public_scripts()
        {
            wp_enqueue_script( 'jquery' );
            $opts = $this->divipreloader_get_opts();
            wp_enqueue_script(
                'dh_preloader_script',
                plugin_dir_url( __FILE__ ) . 'assets/public/js/preloader.js',
                array( 'jquery' ),
                1.0,
                true
            );
            if ( !empty($opts['opt-select-animation-effect']) ) {
                $animation_effect = $opts['opt-select-animation-effect'];
            }
            if ( !empty($opts['opt-select-animation-speed']) ) {
                $animation_speed = $opts['opt-select-animation-speed'];
            }
            if ( !empty($opts['opt-preloader-delay-time']) ) {
                $animation_delay_time = $opts['opt-preloader-delay-time'];
            }
            wp_localize_script( 'dh_preloader_script', 'preLoaderObj', [
                'fadeEffect' => $animation_effect,
                'delay'      => $animation_delay_time,
                'speed'      => $animation_speed,
            ] );
        }
        
        public function dh_preloader_add_admin_scripts()
        {
            if ( !isset( $_GET['page'] ) || 'divipreloader_settings' !== $_GET['page'] ) {
                return;
            }
            wp_enqueue_script( 'jquery' );
            wp_enqueue_style(
                'dh_admin_preloader_styles',
                plugin_dir_url( __FILE__ ) . '/assets/admin/css/admin.css',
                array(),
                1.0,
                'screen'
            );
        }
        
        public function divipreloader_get_opts()
        {
            $opts = get_option( 'divipreloader_opts' );
            return $opts;
        }
        
        public function dh_preloader_et_before_main_content()
        {
            $opts = $this->divipreloader_get_opts();
            ?>
				<div id="preloader">
					<div id="status">&nbsp;</div>
				</div>
			<?php 
        }
        
        public function divipreloader_redux_custom_css_callback()
        {
            wp_register_style(
                'divipreloader_redux_custom_css',
                DIVIPRELOADER_PLUGIN_URL . 'assets/admin/css/redux_custom_css.css',
                array( 'redux-admin-css' ),
                1.0,
                'screen'
            );
            wp_enqueue_style( 'divipreloader_redux_custom_css' );
        }
        
        public function divipreloader_get_gif_url( $select_preloader )
        {
            switch ( $select_preloader ) {
                case 0:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/Spin-1s-200px.svg';
                    break;
                case 1:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/91.svg';
                    break;
                case 2:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/810.svg';
                    break;
                case 3:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/831.svg';
                    break;
                case 4:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/bars.svg';
                    break;
                case 5:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/Eclipse-1s-200px.svg';
                    break;
                case 6:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/oval.svg';
                    break;
                case 7:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/Ripple-3.4s-200px.svg';
                    break;
                case 8:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/Rolling-1s-200px.svg';
                    break;
                case 9:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/svg-heart-animation-1.gif';
                    break;
                case 10:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/rings.svg';
                    break;
                case 11:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/hearts.svg';
                    break;
                case 12:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/three-dots.svg';
                    break;
                case 13:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/circles.svg';
                    break;
                case 14:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/ball-triangle.svg';
                    break;
                case 15:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/grid.svg';
                    break;
                case 16:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . 'spinners/tail-spin.svg';
                    break;
                default:
                    $gif_url = DIVIPRELOADER_PLUGIN_URL . '/ajax-loader.gif';
            }
            return $gif_url;
        }
        
        public function dh_preloader_wp_head_css_editor()
        {
            $opts = $this->divipreloader_get_opts();
            $custom_css = $opts['opt-divipreloader-css-editor'];
            // $css = apply_filters( 'wp_get_custom_css', $custom_css, ''	);
            ?>
				<style>
					<?php 
            echo  $custom_css ;
            ?>
				</style>
			<?php 
        }
        
        public function dh_preloader_wp_head_css_default()
        {
            $opts = $this->divipreloader_get_opts();
            $css_class = '';
            if ( $opts['opt-site-uploader-preloader'] ) {
                $custom_preloader = $opts['opt-site-uploader-preloader'];
            }
            if ( $opts['opt-site-display-preloader'] ) {
                $preloader_site_display = $opts['opt-site-display-preloader'];
            }
            if ( $opts['opt-site-home-pg-display-preloader'] ) {
                $preloader_home_pg_display = $opts['opt-site-home-pg-display-preloader'];
            }
            if ( $opts['opt-site-hide-mobile-preloader'] ) {
                $hide_mobile_preloader = $opts['opt-site-hide-mobile-preloader'];
            }
            if ( $opts['opt-site-hide-mobile-width-preloader'] ) {
                $hide_mobile_width_preloader = $opts['opt-site-hide-mobile-width-preloader'];
            }
            if ( $opts['opt-preloader-body-opacity'] ) {
                $opacity = $opts['opt-preloader-body-opacity'];
            }
            
            if ( $custom_preloader['url'] ) {
                $gif_url = $custom_preloader['url'];
            } else {
                $gif_url = $this->divipreloader_get_gif_url( $opts['opt-site-select-preloader'] );
            }
            
            
            if ( $custom_preloader['width'] ) {
                $width = $custom_preloader['width'];
            } elseif ( $opts['opt-custom-preloader-width'] ) {
                $width = $opts['opt-custom-preloader-width'];
            } else {
                $width = 70;
            }
            
            
            if ( $custom_preloader['height'] ) {
                $height = $custom_preloader['height'];
            } elseif ( $opts['opt-custom-preloader-height'] ) {
                $height = $opts['opt-custom-preloader-height'];
            } else {
                $height = 70;
            }
            
            if ( $opts['opt-custom-preloader-background'] ) {
                $preloader_bg_color = $opts['opt-custom-preloader-background'];
            }
            ?>
				<style>
					#status {
					    background-size: contain;
					}

					<?php 
            
            if ( 1 == $preloader_site_display || 1 == $preloader_home_pg_display ) {
                ?>

						
						#preloader {
							position: fixed;
							top: 0;
							left: 0;
							right: 0;
							bottom: 0;
							background-color: #fefefe;
							z-index: 99999999;
							height: 100%;
							width: 100%;
						}
						#preloader {
							background-color: <?php 
                echo  $preloader_bg_color ;
                ?>;
							opacity: <?php 
                echo  $opacity ;
                ?>
						}		
						#status {
							width: <?php 
                echo  $width ;
                ?>px;
							height: <?php 
                echo  $height ;
                ?>px;
							position: fixed;
							left: 50%;
							top: 50%;
							transform: translate(-50%,-50%);
							background-image: url( <?php 
                echo  esc_url( $gif_url ) ;
                ?> );
							background-repeat: no-repeat;
							background-position: center;
							margin: 0 auto;
						}
					
					<?php 
            }
            
            ?>
					
					<?php 
            if ( 1 == $preloader_home_pg_display ) {
                ?>
						body:not(.home) #preloader,
						body:not(.home) #status {
							display: none !important;
						}
					<?php 
            }
            ?>
					
					
					<?php 
            if ( 1 == $hide_mobile_preloader ) {
                ?>
						
						@media (min-width: 481px) and (max-width: 767px) {
							#preloader,
							#status {
								display: none !important;
							}
						
						}
						
						@media (min-width: 320px) and (max-width: 480px) {
						  
							#preloader,
							#status {
								display: none !important;
							}
						  
						}
						
					<?php 
            }
            ?>
					
					<?php 
            
            if ( !empty($hide_mobile_width_preloader) && 0 == $hide_mobile_preloader ) {
                ?>
					
						@media (max-width: <?php 
                echo  $hide_mobile_width_preloader ;
                ?>px) {
						  
							#preloader,
							#status {
								display: none !important;
							}
						  
						}
					
					<?php 
            }
            
            ?>
					
				</style>
			<?php 
        }
    
    }
}
new Divihoster_Preloader();