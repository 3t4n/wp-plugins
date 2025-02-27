<?php
/* ==========================================================================
   Register styles and scripts
   ========================================================================== */
if( !function_exists('loginstyle_custom_login') ) {
        function loginstyle_custom_login() {

        	$loginstyle_options = get_option( LOGINSTYLE_OPTIONS );
                
                $blog_id = '';
                if( is_multisite() ) {
                        $blog_id = get_current_blog_id();
                }

                echo '<link rel="stylesheet" type="text/css" href="' . LOGINSTYLE_URL . 'public/css/custom' . $blog_id . '.css" />';

                if( $loginstyle_options['font_family'] != '' ) {
                	echo '<link rel="stylesheet" id="loginstyle_google_font" href="https://fonts.googleapis.com/css?family=' . urlencode( esc_html( $loginstyle_options['font_family'] ) ) . ':' . esc_html( $loginstyle_options['font_variant'] ) . '&subset=' . esc_html( $loginstyle_options['font_subset'] ) . '" type="text/css" media="all">';
                }

                if( $loginstyle_options['shake_off'] == '1' ) {
                	remove_action('login_head', 'wp_shake_js', 12);
                }

                if( $loginstyle_options['submit_label'] != '' || $loginstyle_options['input_username_label'] != '' ||
                    $loginstyle_options['input_password_label'] != '' || $loginstyle_options['input_rememberme_label'] != '' ||
                    $loginstyle_options['input_show_username_label'] != '1' || $loginstyle_options['input_show_password_label'] != '1' ) {
                	add_filter( 'gettext', 'loginstyle_change_label', 20, 3 );
                }

                
		function loginstyle_change_label( $translated_text, $text, $domain ) {
			if ( $text === 'Username' || $text === 'Username or Email' || $text === 'Password' || $text === 'Remember Me' || $text === 'Log In' ) {

				$loginstyle_options = get_option( LOGINSTYLE_OPTIONS );
				if( $text === 'Username' || $text === 'Username or Email' ) {
					if( $loginstyle_options['input_show_username_label'] != '1' ) {
						$translated_text = '';
					} else {
						$translated_text =  $loginstyle_options['input_username_label'] != '' ? $loginstyle_options['input_username_label'] : $translated_text;
					}
				} elseif( $text === 'Password' )  {
					if( $loginstyle_options['input_show_password_label'] != '1' ) {
						$translated_text = '';
					} else {
						$translated_text =  $loginstyle_options['input_password_label'] != '' ? $loginstyle_options['input_password_label'] : $translated_text;
					}
				} elseif( $text === 'Remember Me' )  {
					$translated_text = $loginstyle_options['input_rememberme_label'] != '' ? $loginstyle_options['input_rememberme_label'] : $translated_text;
				} elseif( $text === 'Log In' )  {
					$translated_text = $loginstyle_options['submit_label'] != '' ? $loginstyle_options['submit_label'] : $translated_text;
				}
		   		
			}
			return $translated_text;
		}
        }
}
add_action('login_head', 'loginstyle_custom_login');

if( !function_exists('loginstyle_enqueue_script') ) {
	function loginstyle_enqueue_script( $page ) {

        	$loginstyle_options = get_option( LOGINSTYLE_OPTIONS );

        	if( $loginstyle_options['background'] == 'video' && $loginstyle_options['video'] == 'youtube' && $loginstyle_options['youtube'] != '' ) {
        		wp_enqueue_script( 'loginstyle_js', LOGINSTYLE_URL . 'public/js/loginstyle.min.js', array('jquery'), null, true );

               		$ratio = $loginstyle_options['aspect_ratio'] != 'custom' || $loginstyle_options['aspect_ratio'] != '' ? $loginstyle_options['aspect_ratio'] : '1.77777778';
               		if( $loginstyle_options['aspect_ratio'] == 'custom' && $loginstyle_options['custom_ratio1'] != '' && $loginstyle_options['custom_ratio2'] != '' ) {
               			$ratio = (int) $loginstyle_options['custom_ratio1'] / (int) $loginstyle_options['custom_ratio2'];
               		}

        		wp_localize_script('loginstyle_js', 'loginstyle_vars', array(
                                        'iframe_ratio' => $ratio,
                                )
                        );
        	}

        	if( $loginstyle_options['background'] == 'image' && $loginstyle_options['background_repeat'] == 'no-repeat' && $loginstyle_options['rain'] == '1' ) {
        		wp_enqueue_script( 'loginstyle_js', LOGINSTYLE_URL . 'public/js/rainyday.min.js', null, null, true );
        	}

        	if( ( $loginstyle_options['background'] != 'video' || $loginstyle_options['video'] != 'youtube') && $loginstyle_options['particles'] == '1' ) {
        		wp_enqueue_script( 'loginstyle_js', LOGINSTYLE_URL . 'public/js/particles.min.js' );
        	}
	}
}
add_action( 'login_enqueue_scripts', 'loginstyle_enqueue_script' );


/* ==========================================================================
   Login Page Customizations
   ========================================================================== */
if( !function_exists( 'loginstyle_login_redirect' ) ) {
	function loginstyle_login_redirect( $redirect_to, $request, $user ) {

		$loginstyle_options = get_option( LOGINSTYLE_OPTIONS );

		if( '' != $loginstyle_options['login_redirect'] ) {
			return $loginstyle_options['login_redirect'];
		} else {
			return $redirect_to;
		}
	}
}
add_filter("login_redirect", "loginstyle_login_redirect", 10, 3);

if( !function_exists( 'loginstyle_logo_url' ) ) {
	function loginstyle_logo_url() {

		$loginstyle_options = get_option( LOGINSTYLE_OPTIONS );

		if( '' != $loginstyle_options['logo_url'] ) {
			return $loginstyle_options['logo_url'];
		} else {
			return 'https://wordpress.org/';
		}
	}
}
add_filter( 'login_headerurl', 'loginstyle_logo_url' );

if( !function_exists( 'loginstyle_logo_url_title' ) ) {
	function loginstyle_logo_url_title() {

		$loginstyle_options = get_option( LOGINSTYLE_OPTIONS );

		if( '' != $loginstyle_options['logo_title'] ) {
			return $loginstyle_options['logo_title'];
		} else {
			return __('Powered by WordPress', LOGINSTYLE_SLUG);
		}
	}
}
add_filter( 'login_headertitle', 'loginstyle_logo_url_title' );

if( !function_exists('loginstyle_login_footer') ) {
	function loginstyle_login_footer() {
		$loginstyle_options = get_option( LOGINSTYLE_OPTIONS );

		if( '' != $loginstyle_options['footer_text'] || !empty( $loginstyle_options['social'] ) ) {
			$html = '<div class="loginstyle-footer">';
			$html .= '' != $loginstyle_options['footer_text'] ? '<div>' . $loginstyle_options['footer_text'] . '</div>' : '';

			if( !empty( $loginstyle_options['social'] ) ) {
				$html .= '<div><ul>';

				foreach( $loginstyle_options['social'] as $social ) {
					$html .= '<li><a href="' . $social['link'] . '" target="_blank"><i class="' . $social['icon'] . '"></i></a></li>';
				}
				$html .= '</ul></div>';
			}

			$html .= '</div>';

			echo $html;
		}

		if( $loginstyle_options['background'] == 'video' ) {
			$video = '';

			if( $loginstyle_options['video'] == 'html5' ) {
				$video .= '<div class="loginstyle-video">';
                                $fallback = wp_get_attachment_image_src( $loginstyle_options['video_placeholder'], 'full' );
                                $poster = $fallback ? ' poster="' . $fallback[0] . '"' : '';
                                $video_types = array('mp4', 'webm', 'ogg');
                                
                                $video .= '<video loop muted autoplay' . $poster . '>';
                                foreach( $video_types as $v ) {
                                	if( $loginstyle_options['html5_source'] == 'media' && $loginstyle_options[ $v ] != '' && wp_get_attachment_url( $loginstyle_options[ $v ] ) ) {
                                		$video .= '<source src="' . wp_get_attachment_url( $loginstyle_options[ $v ] ) . '" type="video/' . $v . '">';
                                	} elseif ( $loginstyle_options['html5_source'] == 'url' && $loginstyle_options[ $v . "_url" ] != '' ) {
                                		$video .= '<source src="' . loginstyle_get_url( $loginstyle_options[ $v . "_url" ] ) . '" type="video/' . $v . '">';
                                	}
                                }
                                
                                $video .= $fallback ? '<img src="' . $fallback[0] . '" alt="' . __('The video tag is not supported for your browser.', LOGINSTYLE_SLUG) . '" />' : '';
                                $video .= '</video></div>';
                                
                        } elseif( $loginstyle_options['video'] == 'youtube' && $loginstyle_options['youtube'] != '' ) {
                                if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == ‘on’ || $_SERVER['HTTPS'] == 1) ||
                                        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == ‘https’) {
                                        $protocol = 'https:';
                                } else {
                                        $protocol = 'http:';
                                }
                                $video = '<div id="loginstyle_yt_container"><div id="loginstyle_yt" data-videoid="' . esc_html( $loginstyle_options['youtube'] ) . '"></div></div>';
                        }

                        echo $video;
		}

		if( $loginstyle_options['background'] == 'slide' ) {
			$count = $loginstyle_options['background_slides_source'] == 'url' ? count( $loginstyle_options['background_slides_url'] ) : count( $loginstyle_options['background_slides'] );

			$slides = '<ul id="loginstyle_slide">';

			for( $i = 0; $i < $count; $i++ ) {
				$slides .= '<li><span></span></li>';
			}

			$slides .= '</ul>';

			echo $slides;
		}

		if( $loginstyle_options['particles'] == '1' && ( $loginstyle_options['background'] != 'video' || $loginstyle_options['video'] != 'youtube' ) ) {
			$part_color = $loginstyle_options['particles_color'] == 'black' ? 'black' : 'white';
			echo '<div id="loginstyle_particles" style=""></div>';
			echo '<script type="text/javascript">particlesJS.load("loginstyle_particles", "wp-content/plugins/loginstyle/public/json/particles-' . $part_color . '.json");</script>';
		}

		if( $loginstyle_options['input_username_placeholder'] != '' ) {
			echo '<script type="text/javascript">document.getElementById("user_login").setAttribute("placeholder", "' . $loginstyle_options['input_username_placeholder'] . '");</script>';
		}

		if( $loginstyle_options['input_password_placeholder'] != '' ) {
			echo '<script type="text/javascript">document.getElementById("user_pass").setAttribute("placeholder", "' . $loginstyle_options['input_password_placeholder'] . '");</script>';
		}

		if( $loginstyle_options['rememberme_on'] == '1' ) {
			echo '<script type="text/javascript">document.getElementById("rememberme").checked = true;</script>';
		}

		if( $loginstyle_options['submit_move_row'] == 'before' ) {
			echo '<script type="text/javascript">document.getElementById("loginform").appendChild(document.getElementsByClassName("forgetmenot")[0]);</script>';
		}

		if( $loginstyle_options['background'] == 'image' && $loginstyle_options['background_repeat'] == 'no-repeat' && $loginstyle_options['rain'] == '1' ) {
			$background_img = $loginstyle_options['background_image_source'] == 'media' ? wp_get_attachment_url( $loginstyle_options['background_image'] ) : loginstyle_get_url( $loginstyle_options['background_image_url'] );
			echo '<div id="rain_background"><img id="rain_img" class="landscape" alt="' . __('Rainy Background', LOGINSTYLE_OPTIONS) . '" src="' . $background_img . '" crossorigin="anonymous"></div>';

			//$blurry = $loginstyle_options['blur'] == '1' && is_numeric( $loginstyle_options['blur_value'] ) ? (int) $loginstyle_options['blur_value'] : 0;
			$blurry = 0;
			$rain_intensity = $loginstyle_options['rain_intensity'] == 'heavy' ? "[1, 0, 60],[3, 3, 15]" : "[1, 0, 20],[3, 3, 1]";
			$rain_int =  $loginstyle_options['rain_intensity'] == 'heavy'  ? 10 : 100;

			echo '<script type=text/javascript>
			var image = document.getElementById("rain_img");
			var addEvent = function(object, type, callback) {
				if (object == null || typeof(object) == "undefined") return;
				if (object.addEventListener) {
					object.addEventListener(type, callback, false);
				} else if (object.attachEvent) {
					object.attachEvent("on" + type, callback);
				} else {
					object["on"+type] = callback;
				}
			};
			var image_scale = function() {
				var img_w = image.width;
				var img_h = image.height;
				var win_w = window.innerWidth;
				var win_h = window.innerHeight;

				image.className = img_w / img_h < win_w / win_h ? "landscape" : "portrait";
			};
			image.onload = function () {

				image_scale();

	   			var engine = new RainyDay({
				    	image: this,
				    	parentElement: document.getElementById("rain_background"),
				    	blur: ' . $blurry . ',
				    	opacity: 0.9
				});
				engine.rain( [' . $rain_intensity . '],                       
				' . $rain_int . ');
			};
			addEvent(window, "resize", image_scale);
			</script>';

		}
	}
}
add_action('login_footer', 'loginstyle_login_footer');