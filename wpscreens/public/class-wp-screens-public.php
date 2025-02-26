<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       whitelabelcoders.com
 * @since      1.0.0
 *
 * @package    Wp_Screens
 * @subpackage Wp_Screens/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Screens
 * @subpackage Wp_Screens/public
 * @author     WLC <pfober@whitelabelcoders.com>
 */
class Wpscrn_Wp_Screens_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function wpscrn_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Screens_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Screens_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-screens-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'owl-carousel-min', plugin_dir_url( __FILE__ ) . 'css/owl.carousel.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function wpscrn_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Screens_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Screens_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-screens-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'owl-carousel-min', plugin_dir_url( __FILE__ ) . 'js/owl.carousel.min.js', array( 'jquery' ), $this->version, false );

	}

	public function wpscrn_verify_pro() {
		$wpscreens_valid_licance = get_option( 'wpscreens_valid_licance' );
		
		$wp_screens_addon_valid_licence = get_option('wpscreens_valid_licence_addon');
		if ( '1' === $wpscreens_valid_licance || '2' === $wpscreens_valid_licance || '3' == $wp_screens_addon_valid_licence ) {
			return true;
		}
	}

	public function wpscrn_wp_screens_by_id() {
		$id = get_the_ID();

		$post        = get_post();
		$slider_type = get_post_meta( $id, 'slider_type', true );

		if ( ! empty( $slider_type ) ) {
			if ( empty( $post->post_password ) || is_user_logged_in() || sanitize_text_field( $_POST['post_password'] ) === $post->post_password || '' . $id . '_' . $post->post_password === $_COOKIE['ssd'] ) {

				$pro = $this->wpscrn_verify_pro();

				if ( empty( $pro ) ) {
					setcookie( 'ssd', '' . $id . '_' . $post->post_password, strtotime( '+1 day' ), '/' );
				} else {
					setcookie( 'ssd', '' . $id . '_' . $post->post_password, strtotime( '+365 days' ), '/' );
				}
				echo '<div id="divi-sticky-header" class="wpscr_divi-sticky-header"></div><div class="wpscr_smart-slider-container">';

				$top_left   = get_field( 'top-left' );
				$top_center = get_field( 'top-center' );
				$top_right  = get_field( 'top-right' );

				$background           = get_field( 'background' );
				$top_backgrund_image  = get_field( 'top_backgrund_image' );
				$top_background_size  = get_field( 'top_background_size' );
				$top_background_color = get_field( 'top_background_color' );
				$top_opacity          = get_field( 'top_opacity' );
				$top_color            = get_field( 'top_color' );
				$top_shadow           = get_field( 'top_shadow' );
				$top_shadow_color     = get_field( 'top_shadow_color' );

				if ( 'image' === $background ) {
					$top_styles = 'background-image: url(' . esc_html( $top_backgrund_image ) . ');';
					if ( 'repeat' === $top_background_size ) {
						$top_styles .= 'background-repeat: repeat';
					} else {
						$top_styles .= 'background-size: cover; ';
						$top_styles .= 'background-position: center; ';
					}
				} elseif ( 'color' === $background ) {
					$top_styles = '';
					if ( ! empty( $top_background_color ) ) {

						list($r, $g, $b) = sscanf( $top_background_color, '#%02x%02x%02x' );
						$top_styles     .= 'background-color: rgba(' . esc_html( $r ) . ',' . esc_html( $g ) . ',' . esc_html( $b ) . ',';
						if ( ! empty( $top_opacity ) ) {
							if ( '100' === $top_opacity ) {
								$top_styles .= '1';
							} else {
								$top_styles .= '0.' . esc_html( $top_opacity );
							}
						} else {
							$top_styles .= '0'; }
							$top_styles .= ');';
						}
					}

					$top_styles .= 'color: ' . esc_html( $top_color ) . ';';

					if ( $top_shadow ) {
						$top_styles .= 'text-shadow: 0 0 5px ' . esc_html( $top_shadow_color ) . ';';
					}

					if ( empty( $pro ) ) {
						$top_styles .= 'display: none;';
					}

					$feed_type  = get_field( 'feed_type' );
					$newsfeed_url   = get_field( 'newsfeed_url' );				
					$newsfeed_items = get_field( 'newsfeed_items' );
					$newsfeed_logo  = get_field( 'newsfeed_logo' );
					$logo_position = get_field('logo_position');

					$bottom_background       = get_field( 'bottom_background' );
					$bottom_backgrund_image  = get_field( 'bottom_backgrund_image' );
					$bottom_background_size  = get_field( 'bottom_background_size' );
					$bottom_background_color = get_field( 'bottom_background_color' );
					$bottom_opacity          = get_field( 'bottom_opacity' );
					$bottom_color            = get_field( 'bottom_color' );
					$bottom_shadow           = get_field( 'bottom_shadow' );
					$bottom_shadow_color     = get_field( 'bottom_shadow_color' );

					if ( 'image' === $bottom_background ) {
						$bottom_styles = 'background-image: url(' . esc_url( $bottom_backgrund_image ) . ');';
						if ( 'repeat' === $bottom_background_size ) {
							$bottom_styles .= 'background-repeat: repeat';
						} else {
							$bottom_styles .= 'background-size: cover; ';
							$bottom_styles .= 'background-position: center; ';
						}
					} elseif ( 'color' === $bottom_background ) {
						$bottom_styles = '';
						if ( ! empty( $bottom_background_color ) ) {

							list($r, $g, $b) = sscanf( $bottom_background_color, '#%02x%02x%02x' );
							$bottom_styles  .= 'background-color: rgba(' . esc_html( $r ) . ',' . esc_html( $g ) . ',' . esc_html( $b ) . ',';
							if ( ! empty( $bottom_opacity ) ) {
								if ( '100' === $bottom_opacity ) {
									$bottom_styles .= '1';
								} else {
									$bottom_styles .= '0.' . esc_html( $bottom_opacity );
								}
							} else {
								$bottom_styles .= '0'; }
								$bottom_styles .= ');';
							}
						}

						$bottom_styles .= 'color: ' . $bottom_color . ';';

						if ( $bottom_shadow ) {
							$bottom_styles .= 'text-shadow: 0 0 5px ' . $bottom_shadow_color . ';';
						}

						if ( empty( $pro ) ) {
							$bottom_styles .= 'display: none; ';
						}

						if ( ! empty( $top_left ) || ! empty( $top_center ) || ! empty( $top_right ) ) { ?>

							<div class="wpscr_widgets" style="<?php echo esc_html( $top_styles ); ?>" >
								<div class="wpscr_left">
									<?php

									if ( 'logo' === $top_left ) {
										echo $this->wpscrn_widget_logo( $id );
									}
									if ( 'date-time' === $top_left ) {
										echo $this->wpscrn_widget_date_time();
									}
									if ( 'weather' === $top_left ) {
										echo $this->wpscrn_widget_weather( $id );
									}
									?>
								</div>
								<div class="wpscr_center">
									<?php
									if ( 'logo' === $top_center ) {
										echo $this->wpscrn_widget_logo( $id );
									}
									if ( 'date-time' === $top_center ) {
										echo $this->wpscrn_widget_date_time();
									}
									if ( 'weather' === $top_center ) {
										echo $this->wpscrn_widget_weather( $id );
									}
									?>
								</div>
								<div class="wpscr_right">
									<?php
									if ( 'logo' === $top_right ) {
										echo $this->wpscrn_widget_logo( $id );
									}
									if ( 'date-time' === $top_right ) {
										echo $this->wpscrn_widget_date_time();
									}
									if ( 'weather' === $top_right ) {
										echo $this->wpscrn_widget_weather( $id );
									}
									?>
								</div>
							</div>

							<?php
						}

						if (!empty( $newsfeed_url ) && "newsfeed" == $feed_type ) {
							
							include_once('inc/neewsfeed.php');

						}elseif($feed_type == "message_ticker" ){
							
							include_once('inc/message_ticker.php');
						}

							if ( 'smart-slider' === $slider_type ) {
								$slider = get_post_meta( $id, 'smart-slider-id', true );
								echo '' . do_shortcode( '[smartslider3 slider=' . esc_html( $slider ) . ']' );
							}
							if ( 'layer-slider' === $slider_type ) {
								$slider = get_post_meta( $id, 'layer-slider-id', true );
								echo '' . do_shortcode( '[layerslider id="' . esc_html( $slider ) . '"]' );
							}
							if ( 'revolution-slider' === $slider_type ) {
								$slider = get_post_meta( $id, 'rev-slider-id', true );
								echo '' . do_shortcode( '[rev_slider alias="' . esc_html( $slider ) . '"][/rev_slider]' );
							}
							if ( 'depicter-slider' === $slider_type ) {
								$slider = get_post_meta( $id, 'depicter-slider-id', true );
								echo '' . do_shortcode( '[depicter id="' . esc_html( $slider ) . '"]' );
							}
							echo'</div>';
						} else {
							?>
							<div class="wpscr_smart-slider-container">
								<div class="et_pb_section et_section_regular">
									<div class="et_pb_row">
										<div class="et_pb_column et_pb_column_4_4">
											<div class="et_password_protected_form">
												<h1><?php _e( 'Wachtwoordbeveiliging', 'wp-screens' ); ?></h1>
												<p><strong><?php _e( 'Go pro and never refresh your screen again!', 'wp-screens' ); ?>.</strong></p>
												<p><?php _e( 'Voer het wachtwoord hieronder in om deze beveiligde post te bekijken', 'wp-screens' ); ?>.</p>
												<form action="" method="post">
													<p><label for="pwbox-131980314"><?php _e( 'Wachtwoord', 'wp-screens' ); ?>: </label><input name="post_password" id="pwbox-131980314" type="password" size="20" maxlength="20" /></p>
													<p><button type="submit" class="et_submit_button et_pb_button"><?php _e( 'Indienen', 'wp-screens' ); ?></button></p>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					}
				}

				public function wpscrn_widget_weather( $id ) {
					$weather           = get_field( 'weather' );
					$weather_container = '<div class="weather-container">' . $weather . '</div>';
					return $weather_container;
				}

				public function wpscrn_widget_logo( $id ) {
					$logo = get_field( 'logo' );

					return '<img src="' . esc_url( $logo ) . '" alt="' . esc_html( get_the_title() ) . '" class="widget-logo">';
				}

				public function wpscrn_widget_date_time() {
					$lang = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
					if ( 'nl' === $lang ) {
						setlocale( LC_ALL, 'nl_NL.UTF8' );
					}
					if ( 'de' === $lang ) {
						setlocale( LC_ALL, 'de_DE.UTF8' );
					}
					if ( 'fr' === $lang ) {
						setlocale( LC_ALL, 'fr_FR.UTF8' );
					}
					if ( 'pl' === $lang ) {
						setlocale( LC_ALL, 'pl_PL.UTF8' );
					}
					if ( 'zh-cn' === $lang ) {
						setlocale( LC_ALL, 'zh_CN.UTF8' );
					}
					if ( 'zh-cn' === $lang ) {
						setlocale( LC_ALL, 'zh_CN.UTF8' );
					}
					if ( 'en-gb' === $lang ) {
						setlocale( LC_ALL, 'en_GB.UTF8' );
					}
					if ( 'en' === $lang ) {
						setlocale( LC_ALL, 'en_US.UTF8' );
					}
					if ( 'en' === $lang ) {
						setlocale( LC_ALL, 'en_US.UTF8' );
					}
					if ( 'da' === $lang ) {
						setlocale( LC_ALL, 'da_DK.UTF8' );
					}
					if ( 'es' === $lang ) {
						setlocale( LC_ALL, 'es_ES.UTF8' );
					}
					if ( 'it' === $lang ) {
						setlocale( LC_ALL, 'it_IT.UTF8' );
					}
					if ( 'it' === $lang ) {
						setlocale( LC_ALL, 'it_IT.UTF8' );
					}
					if ( 'ja' === $lang ) {
						setlocale( LC_ALL, 'ja.UTF8' );
					}
					if ( 'nb' === $lang ) {
						setlocale( LC_ALL, 'nb_NO.UTF8' );
					}
					if ( 'nb' === $lang ) {
						setlocale( LC_ALL, 'nb_NO.UTF8' );
					}
					if ( 'pt' === $lang ) {
						setlocale( LC_ALL, 'pt_PT.UTF8' );
					}
					if ( 'ro' === $lang ) {
						setlocale( LC_ALL, 'ro_RO.UTF8' );
					}
					if ( 'sl' === $lang ) {
						setlocale( LC_ALL, 'sl_SI.UTF8' );
					}
					if ( 'sl' === $lang ) {
						setlocale( LC_ALL, 'sl_SI.UTF8' );
					}
					if ( 'sv' === $lang ) {
						setlocale( LC_ALL, 'sv_SE.UTF8' );
					}
					if ( 'sv' === $lang ) {
						setlocale( LC_ALL, 'sv_SE.UTF8' );
					}
					if ( 'tr' === $lang ) {
						setlocale( LC_ALL, 'tr_TR.UTF8' );
					}
					?>
					<div class="date-time-container">
						<div class="date"><?php echo strftime("%A, %e %B"); ?></div>
						<div id="time" onload="startTime()"></div>
					</div>
					<script>
						function wpscrn_startTime() {
							var today = new Date();
							var h     = today.getHours();
							var m     = today.getMinutes();
							var s     = today.getSeconds();
							m         = checkTime(m);
							s         = checkTime(s);
							document.getElementById("time").innerHTML =
							h + ":" + m + ":" + s;
							var t     = setTimeout(wpscrn_startTime, 500);
						}
						function checkTime(i) {
							if (i < 10) {i = "0" + i}; 
							return i;
						}

						wpscrn_startTime();
					</script>
					<?php
				}
				public function wp_screens_template( $single ) {
					global $wp_query, $post;

					if ( 'displays' === $post->post_type ) {
						if ( file_exists( WP_PLUGIN_DIR . '/wp-screens/public/single-displays.php' ) ) {
							return WP_PLUGIN_DIR . '/wp-screens/public/single-displays.php';
						}
					}

					return $single;
				}
			}
