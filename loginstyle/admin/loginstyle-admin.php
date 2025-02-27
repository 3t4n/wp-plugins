<?php
/* ==========================================================================
   Actions
   ========================================================================== */
if ( !function_exists('loginstyle_admin_menu') ) {
        function loginstyle_admin_menu() {
                add_theme_page('Loginstyle Settings', 'Loginstyle', 'manage_options','loginstyle-settings', 'loginstyle_settings');
                add_action( 'admin_init', 'register_loginstyle_settings' );
     }
}

if( !function_exists('register_loginstyle_settings') ) {
        function register_loginstyle_settings() {
                //register our settings
               register_setting( LOGINSTYLE_OPTIONS . '_group', LOGINSTYLE_OPTIONS, 'loginstyle_options_sanitize');
        }
}


if ( !function_exists('loginstyle_get_default_options') ) {
        function loginstyle_get_default_options() {

        	return array(
                	'content_width' => '',
                	'content_width_unit' => 'px',
                        'background' => 'color',
                        'background_color' => '',
                        'background_gradient' => '',
                        'background_image_source' => 'media',
                        'background_image' => '',
                        'background_image_url' => '',
                        'background_slides_source' => 'media',
                        'background_slides' => array(),
                        'background_slides_url' => array(),
                        'background_position' => 'left top',
                        'background_position_custom' => '',
                        'background_repeat' => 'repeat',
                        'gradient_direction' => 'left top',
                        'gradient_from' => '',
                        'gradient_to' => '',
                        'slide_animation' => 'fade',
                        'animation_time' => 6,
                        'video' => 'html5',
                        'video_placeholder' => '',
                        'html5_source' => 'media',
                        'webm' => '',
                        'mp4' => '',
                        'ogg' => '',
                        'webm_url' => '',
                        'mp4_url' => '',
                        'ogg_url' => '',
                        'placeholder' => '',
                        'youtube' => '',
                        'aspect_ratio' => 16/9,
                        'custom_ratio1' => '',
                        'custom_ratio2' => '',
                        'blur' => '',
                        'blur_value' => '',
                        'dotted' => '',
                        'color' => '',
                        'overlay_color' => '',
                        'rain' => '0',
                        'rain_intensity' => 'light',
                        'particles' => '0',
                        'particles_color' => 'white',
                        'logo' => 'default',
                        'logo_image_source' => 'media',
                        'logo_image' => '',
                        'logo_image_url' => '',
                        'logo_url' => '',
                        'logo_title' => '',
                        'logo_width' => '',
                        'logo_height' => '',
                        'logo_top' => '',
                        'logo_right' => '',
                        'logo_bottom' => '',
                        'logo_left' => '',
                        'logo_top_unit' => 'px',
                        'logo_right_unit' => 'px',
                        'logo_bottom_unit' => 'px',
                        'logo_left_unit' => 'px',
                        'form_background_image_source' => 'media',
                        'form_background_image' => '',
                        'form_background_image_url' => '',
                        'form_background_color' => '',
                        'form_background_position' => 'left top',
                        'form_background_position_custom' => '',
                        'form_background_repeat' => 'repeat',
                        'form_border_width' => '',
                        'form_border_style' => '',
                        'form_border_color' => '',
                        'form_border_radius' => '',
                        'form_padding_top' => '',
                        'form_padding_right' => '',
                        'form_padding_bottom' => '',
                        'form_padding_left' => '',
                        'form_padding_top_unit' => 'px',
                        'form_padding_right_unit' => 'px',
                        'form_padding_bottom_unit' => 'px',
                        'form_padding_left_unit' => 'px',
                        'font_family' => '',
                        'font_backup' => '',
                        'font_variant' => '',
                        'font_subset' => '',
                        'font_backup' => '',
                        'font_color' => '',
                        'link_color' => '',
                        'link_hover_color' => '',
                        'rememberme_on' => '',
                        'lostpassword_off' => '',
                        'backto_off' => '',
                        'shake_off' => '',
                        'login_redirect' => '',
                        'input_show_username_label' => '1',
                        'input_username_label' => '',
                        'input_username_placeholder' => '',
                        'input_show_password_label' => '1',
                        'input_password_label' => '',
                        'input_password_placeholder' => '',
                        'input_rememberme_label' => '',
                        'input_label_color' => '',
                        'input_font_color' => '',
                        'placeholder_color' => '',
                        'input_font_size' => '',
                        'input_align' => 'left',
                        'input_background_color' => '',
                        'input_border_top_width' => '',
                        'input_border_right_width' => '',
                        'input_border_bottom_width' => '',
                        'input_border_left_width' => '',
                        'input_border_style' => '',
                        'input_border_color' => '',
                        'input_border_radius' => '',
                        'input_padding_top' => '',
                        'input_padding_right' => '',
                        'input_padding_bottom' => '',
                        'input_padding_left' => '',
                        'input_padding_top_unit' => '',
                        'input_padding_right_unit' => '',
                        'input_padding_bottom_unit' => '',
                        'input_padding_left_unit' => '',
                        'input_show_icon' => '',
                        'username_icon' => '',
                        'password_icon' => '',
                        'input_icon_position' => 'left',
                        'input_icon_align' => 'left',
                        'input_icon_border_width' => '',
                        'input_icon_border_color' => '',
                        'input_icon_font_color' => '',
                        'input_icon_background_color' => '',
                        'input_icon_width' => '',
                        'checkbox_background_color' => '',
                        'checkbox_check_color' => '',
                        'checkbox_label_color' => '',
                        'checkbox_border_color' => '',
                        'checkbox_border_radius' => '',
                        'submit_label' => '',
                        'submit_padding_top' => '',
                        'submit_padding_right' => '',
                        'submit_padding_bottom' => '',
                        'submit_padding_left' => '',
                        'submit_padding_top_unit' => '',
                        'submit_padding_right_unit' => '',
                        'submit_padding_bottom_unit' => '',
                        'submit_padding_left_unit' => '',
                        'submit_background_color' => '',
                        'submit_font_size' => '',
                        'submit_font_size_unit' => '',
                        'submit_font_color' => '',
                        'submit_border_width' => '',
                        'submit_border_style' => '',
                        'submit_border_color' => '',
                        'submit_radius' => '',
                        'submit_hover_background_color' => '',
                        'submit_hover_font_color' => '',
                        'submit_hover_border_color' => '',
                        'submit_transition' => '0.5',
                        'submit_move_row' => '',
                        'submit_align' => '',
                        'submit_align_nex_row' => '',
                        'footer_align' => 'left',
                        'footer_text' => '',
                        'social' => array(),
                        'social_icon_color' => '',
                        'social_icon_hover_color' => '',
                        'social_icon_font_size' => '',
                        'custom_css' => '',
                        'deactivate_deletes_data' => '0',
                );
        }
}

if ( !function_exists('loginstyle_settings') ) {
        function loginstyle_settings() {
                if ( !current_user_can('manage_options') ) {
                        wp_die('You do not have sufficient permissions to access this page.');
                }
                
                $loginstyle_options = get_option(LOGINSTYLE_OPTIONS);
                
                $options = loginstyle_get_default_options();

                foreach ( $options as $option => $default ) {
                        if( isset( $loginstyle_options[$option] ) ) {
                                $$option = is_array( $loginstyle_options[$option] ) ? $loginstyle_options[$option] : esc_attr( $loginstyle_options[$option] );
                        } else {
                                $$option = $default;
                        }
                }

		$tabs = array(
			'general' => __('General', LOGINSTYLE_SLUG),
		        'background' => __('Background', LOGINSTYLE_SLUG),
		        'logo' => __('Logo', LOGINSTYLE_SLUG),
		        'form' => __('Form', LOGINSTYLE_SLUG),
		        'input' => __('Inputs', LOGINSTYLE_SLUG),
		        'submit' => __('Submit', LOGINSTYLE_SLUG),
		        'footer' => __('Footer', LOGINSTYLE_SLUG),
		        'templates' => __('Templates', LOGINSTYLE_SLUG),
		);

		// Get list of Google Fonts
                $fonts = json_decode(file_get_contents( LOGINSTYLE_PATH . '/admin/json/google-fonts.json'), true);

                $items = $fonts['items'];
                $i = 0;
                
                // List of html5 vidoe formats
                $videos = array('webm', 'mp4', 'ogg');

                // List of social icon buttons
                $social_icon_options = loginstyle_get_social_buttons();
                $social = array_slice($social, 0, 5, true);

                // Get templates
                $templates = array();
                $template_dir = LOGINSTYLE_PATH . 'admin/templates/';
                $theme_template_dir = get_template_directory() . '/loginstyle/templates/';
                
		function loop_files( $file, $dir, $url ) {
			if( !is_dir( $file) ) { 
	    			
	    			$ext = pathinfo( $file, PATHINFO_EXTENSION );
	    			if( $ext == 'json' ) {
	    				$file_name = basename($file, '.json');
	    				$template_img = '';

	    				if( file_exists( $dir . $file_name . '.png') ) {
	    					$template_img =  $url . $file_name . '.png';
	    				} elseif( file_exists( $dir . $file_name . '.jpg') ) {
	    					$template_img =  $url . $file_name . '.jpg';
	    				} elseif( file_exists( $dir . $file_name . '.jpeg') ) {
	    					$template_img =  $url . $file_name . '.jpeg';
	    				}

	    				$encode_options = file_get_contents( $file );
			                $template_content = json_decode($encode_options, true);
			                $template_name = isset( $template_content['template_name'] ) ? $template_content['template_name'] : '';

			                return array('file' => basename( $file ), 'preview' => $template_img, 'name' => $template_name);
	    			} else {
	    				return false;
	    			}
	    		}
		}

                foreach( glob( $template_dir . '*' ) as $file ){
	    		if( is_array( $result = loop_files( $file, $template_dir, LOGINSTYLE_URL . 'admin/templates/' ) ) ) {
	    			$templates[] =  $result;
	    		}
		}

                foreach( glob( $theme_template_dir . '*' ) as $file ){
	    		if( is_array( $result = loop_files( $file, $theme_template_dir, get_template_directory_uri() . '/loginstyle/templates/' ) ) ) {
	    			$templates[] =  $result;
	    		}
		}

                // Create export nonce
                $nonce = wp_create_nonce("loginstyle_export_options");

                include_once(LOGINSTYLE_PATH . '/admin/partials/loginstyle-admin-settings-display.php');
        }
}

if ( !function_exists('loginstyle_get_social_buttons') ) {
        function loginstyle_get_social_buttons() {

                return array(
                	'loginicon-facebook8',
                	'loginicon-googleplus4',
			'loginicon-twitter8',
			'loginicon-instagram0',
			'loginicon-pinterest4',
			'loginicon-github7',
			'loginicon-tumblr2',
			'loginicon-dropbox2',
			'loginicon-behance0',
			'loginicon-dribbble0',
                );
        }
}

if( !function_exists('loginstyle_get_icon_content') ) {
	function loginstyle_get_icon_content( $class ) {
		$content = array(
			"loginicon-search" => "\\e036",
			"loginicon-repeat" => "\\e058",
			"loginicon-cross" => "\\e114",
			"loginicon-triangle-down" => "\\f05b",
			"loginicon-triangle-left" => "\\f044",
			"loginicon-triangle-right" => "\\f05a",
			"loginicon-triangle-up" => "\\f0aa",
			"loginicon-instagram0" => "\\e920",
			"loginicon-user3" => "\\e90f",
			"loginicon-user11" => "\\e91d",
			"loginicon-key7" => "\\e901",
			"loginicon-key8" => "\\e908",
			"loginicon-facebook8" => "\\e94c",
			"loginicon-googleplus4" => "\\e98f",
			"loginicon-twitter8" => "\\e958",
			"loginicon-pinterest4" => "\\e995",
			"loginicon-github7" => "\\f00a",
			"loginicon-tumblr2" => "\\e972",
			"loginicon-dropbox2" => "\\e942",
			"loginicon-behance0" => "\\e966",
			"loginicon-dribbble0" => "\\e965",
		);

		if( isset( $content[ $class ] ) ) {
			return $content[ $class ];
		} else {
			return '';
		}
	}
}

if ( !function_exists('loginstyle_add_custom_script') ) {
        function loginstyle_add_custom_script($hook) {
                global $post;  
  
                if ( $hook == 'appearance_page_loginstyle-settings' ) {
                	wp_enqueue_media();
                        wp_enqueue_script('loginstyle_admin_js', LOGINSTYLE_URL . 'admin/js/admin.js', '', '', true); 
                        //wp_enqueue_script( 'wp-color-picker' ); 
                        wp_enqueue_script( 'jquery-ui-core' );
                        wp_enqueue_script( 'jquery-ui-tabs' );
                        wp_enqueue_script( 'jquery-ui-slider' );
                        wp_enqueue_script( 'jquery-ui-sortable' );
                        wp_enqueue_script( 'alpha-color-picker', LOGINSTYLE_URL . 'admin/js/alpha-color-picker.js', array('jquery', 'wp-color-picker'), null, true );
                        wp_enqueue_script( 'icon-picker', LOGINSTYLE_URL . 'admin/js/iconpicker.min.js', array('jquery'), null, true );
                        wp_localize_script('loginstyle_admin_js', 'cmb_vars', array(
                                        'mediaTitle' => __('Insert Media', LOGINSTYLE_SLUG),
                                        'mediaButton' => __('Add Media', LOGINSTYLE_SLUG),
                                        'options' => LOGINSTYLE_OPTIONS,
                                        'confirm' => __('WARNING: All current options will be lost. This cannot be undone. Proceed to load template?', LOGINSTYLE_SLUG),
                                )
                        );

                        wp_enqueue_style('loginstyle_admin_css', LOGINSTYLE_URL . 'admin/css/loginstyle-admin.css');
                        wp_enqueue_style( 'wp-color-picker' ); 
                        wp_enqueue_style('google-font', "http://fonts.googleapis.com/css?family=Amaranth:italic' rel='stylesheet' type='text/css'>");
                } 
        }
}

if (!function_exists('loginstyle_options_sanitize'))
{
	function loginstyle_options_sanitize( $input ) {

                unset( $input['social']['%']);
                unset( $input['background_slides_url']['%']);

                $defaults = loginstyle_get_default_options();
                foreach( $defaults as $k => $default ) {
                	if( !isset( $input[ $k ] ) ) {
                		$input[ $k ] = $default;
                	}
                } 
        
                return $input;
	}
}

add_action('admin_menu', 'loginstyle_admin_menu');
add_action( 'admin_enqueue_scripts', 'loginstyle_add_custom_script', 10, 1 );

/* ==========================================================================
   Filters
   ========================================================================== */
if ( !function_exists('loginstyle_link_action_on_plugin')) {
        function loginstyle_link_action_on_plugin( $links ) {
                $links[] = '<a href="'. get_admin_url(null, 'themes.php?page=loginstyle-settings') .'">' . __('Settings', LOGINSTYLE_SLUG) . '</a>';
                return $links;
        }
}

if ( !function_exists('loginstyle_add_custom_mime_types') ) {
        function loginstyle_add_custom_mime_types( $mimes ) {
                return array_merge($mimes,array (
			'webm' => 'video/webm',
		));
        }
}

add_filter( 'plugin_action_links_loginstyle/loginstyle.php', 'loginstyle_link_action_on_plugin' );
add_filter('upload_mimes','loginstyle_add_custom_mime_types');

/* ==========================================================================
   Ajax Actions
   ========================================================================== */
if( !function_exists('loginstyle_import_success_notice') ) {
	function loginstyle_import_success_notice() {
		global $pagenow;

		if ( $pagenow == 'themes.php' && isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'loginstyle-settings' ) {
			if( isset( $_GET[ 'template' ] ) && $_GET[ 'template' ] == 'success' ) {
				echo '<div id="loginstyle_result" class="updated notice is-dismissible"><p>' . __( 'The template has successfully loaded.', LOGINSTYLE_SLUG ) . '</p></div>';
			} elseif ( isset( $_GET[ 'import' ] ) && $_GET[ 'import' ] == 'success' ) {
				echo '<div id="loginstyle_result" class="updated notice is-dismissible"><p>' . __( 'The options have successfully loaded.', LOGINSTYLE_SLUG ) . '</p></div>';
			}
		}
	}
}
add_action( 'admin_notices', 'loginstyle_import_success_notice' );

if( !function_exists('loginstyle_import_options') ) {
        function loginstyle_import_options() {
        
                if ( !wp_verify_nonce( $_POST['nonce'], 'loginstyle_export_options' ) ) {
                        exit("Not verified");
                }
                
                $file = $_POST['file'];

                if( file_exists( LOGINSTYLE_PATH . 'admin/templates/' . $file ) || file_exists( get_template_directory() . '/loginstyle/templates/' . $file ) ) {
                	$file_path = file_exists( get_stylesheet_directory() . '/loginstyle/templates/' . $file ) ? get_stylesheet_directory() . '/loginstyle/templates/' . $file : LOGINSTYLE_PATH . 'admin/templates/' . $file;
                	$encode_options = file_get_contents( $file_path );
	                $template = json_decode($encode_options, true);
	                $options = $template['loginstyle_options'];
	                $defaults = loginstyle_get_default_options();
	                $sanitized = array();

	                foreach ( $defaults as $option => $default ) {
	                        if( isset( $options[ $option ] ) ) {
	                                $sanitized[ $option ] = $options[ $option ];
	                        } else {
	                                $sanitized[ $option ] = $default;
	                        }
	                }

	                update_option( LOGINSTYLE_OPTIONS, $sanitized );

                	$result = array('success' => __('The template has successfully loaded.', LOGINSTYLE_SLUG));
                } else {
                	$result = array('error' => __('An error has occurred: the template file does not exist.', LOGINSTYLE_SLUG));
                }

                if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                        echo json_encode($result);
                }
                else {
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
             
                die();
        }
}
add_action("wp_ajax_loginstyle_import", "loginstyle_import_options");


/* ==========================================================================
   Post Save Options
   ========================================================================== */
if( !function_exists('loginstyle_post_save_options') ) {
	function loginstyle_post_save_options( $old_value, $new_value ) {

                if ( !current_user_can('manage_options') ) {
                        wp_die('You do not have sufficient permissions to access this page.');
                }

                // Generate custom css. If different from old one update static custom.css
                $css = '';
                
                // font style
                $css .= $new_value['font_family'] != '' ? 'font-family: "' . $new_value['font_family'] . '", ' . $new_value['font_backup'] . ';' : '';
                if ( isset( $new_value['font_variant'] ) && ( $new_value['font_variant'] != '' || $new_value['font_variant'] != 'regular' ) ) {
                        if ( strpos($new_value['font_variant'],'italic' ) !== false) {
                                $css .= 'font-style: italic;';
                                $saved_meta['font_variant'] = str_replace('italic', '', $new_value['font_variant']);
                        }
                        if ( is_numeric( $new_value['font_variant'] ) ) {
                                $css .= 'font-weight: ' . $new_value['font_variant'] . ';';
                        }
                }

                // font color
                $css .= $new_value['font_color'] != '' ? loginstyle_create_color_css( $new_value['font_color'], 'color' ) : '';

                if( $css != '' ) {
                        $css = 'body {' . $css . '}';
                }

                //width
                $css .= $new_value['content_width'] != '' ? '#login { width:' . $new_value['content_width'] . $new_value['content_width_unit'] . ';}' : '';


                $background_css = '';
                $background_dimensions = 'height:100%; width:100%; top:0; left:0;';
  
                // custom background
                if( $new_value['background'] == 'color' ) {
                	$background_css .= $new_value['background_color'] != '' ? loginstyle_create_color_css( $new_value['background_color'], 'background-color' ) : '';
                } elseif( $new_value['background'] == 'gradient' ) {
                	if( $new_value['gradient_from'] != '' && $new_value['gradient_to'] != '' ) {
                		$gradient_direction = in_array( $new_value['gradient_direction'], array('top', 'left', 'radial') ) ? $new_value['gradient_direction'] : 'left top';

                		$background_css .= 'background-color:' . loginstyle_rgba_to_hex( $new_value['gradient_from'] ) . ';';

                		switch( $new_value['gradient_direction'] ) {
                			case 'top':
                				$background_css .= 'background: -webkit-linear-gradient(' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: -o-linear-gradient(' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: -mozt-linear-gradient(' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: linear-gradient(' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				break;
                			case 'left':
                				$background_css .= 'background: -webkit-linear-gradient(left, ' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: -o-linear-gradient(right, ' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: -mozt-linear-gradient(right, ' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: linear-gradient(right, ' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				break;
                			case 'radial':
                				$background_css .= 'background: -webkit-radial-gradient(' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: -o-radial-gradient(' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: -mozt-radial-gradient(' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: radial-gradient(' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				break;
                			case 'left top':
                			default:
                				$background_css .= 'background: -webkit-linear-gradient(left top, ' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: -o-linear-gradient(bottom right, ' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: -mozt-linear-gradient(bottom right, ' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				$background_css .= 'background: linear-gradient(bottom right, ' . $new_value['gradient_from'] . ', ' . $new_value['gradient_to'] . ');';
                				break;
                		}
                	}
                } elseif( $new_value['background'] == 'image' ) {

                	if( $new_value['background_image_source'] == 'media' && $new_value['background_image'] != '' ) {
                		$background_css .= 'background-image: url(' . wp_get_attachment_url( $new_value['background_image'] ) . ');';
                	} elseif( $new_value['background_image_source'] == 'url' && $new_value['background_image_url'] != '' ) {
                		$background_css .= 'background-image: url(' . loginstyle_get_url( $new_value['background_image_url'] ) . ');';
                	}
                	$background_css .= $new_value['background_repeat'] != '' ? 'background-repeat: ' . $new_value['background_repeat'] . ';' : '';
                	$background_css .= $new_value['background_position'] != '' && $new_value['background_position'] != 'custom' ? 'background-position: ' . $new_value['background_position'] . ';' : '';
                	$background_css .= $new_value['background_position'] == 'custom' && $new_value['background_position_custom'] != '' ? 'background-position: ' . $new_value['background_position_custom'] . ';' : '';
                	$background_css .= $new_value['background_repeat'] == 'no-repeat' ? 'background-size: cover;' : '';

                }

                if( $background_css != '' ) {
                        $css .= 'body{ background:transparent; } body:before { content: \'\';position: fixed; display: block; z-index: -1;' . $background_dimensions . $background_css . '}';
                }

                // color and dotoverlay
                if( $new_value['color'] == '1' && $new_value['overlay_color'] != '' ) {
                	$css .= '#login:before { content: \'\';position: fixed; display: block; z-index: -1; width:100%; height:100%; top:0; left:0;' . loginstyle_create_color_css( $new_value['overlay_color'], 'background' ) . '}';
                }

                // link color
                $css .= $new_value['link_color'] != '' ? 'body a {' . loginstyle_create_color_css( $new_value['link_color'], 'color' ) . '} .login #backtoblog a, .login #nav a, .login h1 a {' . loginstyle_create_color_css( $new_value['link_color'], 'color' ) . '}' : '';
                $css .= $new_value['link_hover_color'] != '' ? 'body a:hover {' . loginstyle_create_color_css( $new_value['link_hover_color'], 'color' ) . '} .login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {' . loginstyle_create_color_css( $new_value['link_hover_color'], 'color' ) . '}'  : '';

                // remove links
                $css .= $new_value['lostpassword_off'] == '1' ? 'p#nav { display: none; }' : '';
                $css .= $new_value['backto_off'] == '1' ? 'p#backtoblog { display: none; }' : '';

                // logo
                if( $new_value['logo'] == 'custom' ) {
                	$custom_logo = '';
                	if( $new_value['logo_image_source'] == 'media' && $new_value['logo_image'] != '' ) {
                		$custom_logo = 'background-image: url(' . wp_get_attachment_url( $new_value['logo_image'] ) . ');';
                	} elseif( $new_value['logo_image_source'] == 'url' && $new_value['logo_image_url'] != '' ) {
                		$custom_logo = 'background-image: url(' . loginstyle_get_url( $new_value['logo_image_url'] ) . ');';
                	}
                	
                	$custom_logo .= $new_value['logo_width'] != '' ? 'background-size: ' .  $new_value['logo_width'] . 'px; width: ' .  $new_value['logo_width'] . 'px;' : '';
                	$custom_logo .= $new_value['logo_height'] != '' ? 'height: ' .  $new_value['logo_height'] . 'px;' : '';
                	$css .= '.login h1 a { ' . $custom_logo . ' }';

                } elseif( $new_value['logo'] == 'hidden' ) {
                	$css .= '.login h1 a { background: none; }';
                }
               	if( $new_value['logo'] != 'hidden' ) {
               		$logo_margins = '';
               		$logo_margins .= $new_value['logo_top'] != '' ? 'margin-top: ' . $new_value['logo_top'] . $new_value['logo_top_unit'] . ';' : '';
               		$logo_margins .= $new_value['logo_right'] != '' ? 'margin-right: ' . $new_value['logo_right'] . $new_value['logo_right_unit'] . ';' : '';
               		$logo_margins .= $new_value['logo_bottom'] != '' ? 'margin-bottom: ' . $new_value['logo_bottom'] . $new_value['logo_bottom_unit'] . ';' : '';
               		$logo_margins .= $new_value['logo_left'] != '' ? 'margin-left: ' . $new_value['logo_left'] . $new_value['logo_left_unit'] . ';' : '';

               		$css .= $logo_margins != '' ? '.login h1 { ' . $logo_margins . '}' : '';
               	}

               	// form
               	$form_css = '';
               	$message_css = '';

               	$form_css .= $new_value['form_padding_top'] != '' ? 'padding-top: ' . $new_value['form_padding_top'] . $new_value['form_padding_top_unit'] . ';' : '';
       		$form_css .= $new_value['form_padding_right'] != '' ? 'padding-right: ' . $new_value['form_padding_right'] . $new_value['form_padding_right_unit'] . ';' : '';
       		$form_css .= $new_value['form_padding_bottom'] != '' ? 'padding-bottom: ' . $new_value['form_padding_bottom'] . $new_value['form_padding_bottom_unit'] . ';' : '';
       		$form_css .= $new_value['form_padding_left'] != '' ? 'padding-left: ' . $new_value['form_padding_left'] . $new_value['form_padding_left_unit'] . ';' : '';

       		if( $new_value['form_border_style'] == 'none' ) {
       			$form_css .= 'border: none;';
       		} else {
       			if( $new_value['form_border_width'] != '' ) {
	       			$form_css .= 'border-width: ' . $new_value['form_border_width'] . 'px;';
	       			$message_css .= 'border-right-width: ' . $new_value['form_border_width'] . 'px; border-top-width: ' . $new_value['form_border_width'] . 'px; border-bottom-width: ' . $new_value['form_border_width'] . 'px;';
	       		}
	       		if( $new_value['form_border_style'] != '' ) {
	       			$form_css .= 'border-style: ' . $new_value['form_border_style'] . ';';
	       			$message_css .= 'border-right-style: ' . $new_value['form_border_style'] . '; border-top-style: ' . $new_value['form_border_style'] . '; border-bottom-style: ' . $new_value['form_border_style'] . ';';
	       		}
	       		if( $new_value['form_border_color'] != '' ) {
	       			$form_css .= loginstyle_create_color_css( $new_value['form_border_color'], 'border-color' );
	       			$message_css .= loginstyle_create_color_css( $new_value['form_border_color'], 'border-right-color' ) . loginstyle_create_color_css( $new_value['form_border_color'], 'border-top-color' ) . loginstyle_create_color_css( $new_value['form_border_color'], 'border-bottom-color' );
	       		}
       		}
       		
       		if( $new_value['form_border_radius'] != '' ) {
       			$form_css .= 'border-radius: ' . $new_value['form_border_radius'] . 'px;';
       			$message_css .= 'border-radius: ' . $new_value['form_border_radius'] . 'px;';
       		}

       		if( $new_value['form_background_color'] != '' ) {
       			$form_css .= loginstyle_create_color_css( $new_value['form_background_color'], 'background-color' );

       			if( loginstyle_get_alpha( $new_value['form_background_color'] ) === 0 && $new_value['form_border_style'] == 'none' ) {
       				$message_css .= $new_value['input_background_color'] != '' ? loginstyle_create_color_css( $new_value['input_background_color'], 'background-color' ) : '';
       				$message_css .= $new_value['input_font_color'] != '' ? loginstyle_create_color_css( $new_value['input_font_color'], 'color' ) : '';
       				$message_css .= $new_value['input_border_style'] != '' ? 'border-right-style: ' . $new_value['input_border_style'] . '; border-top-style: ' . $new_value['input_border_style'] . '; border-bottom-style: ' . $new_value['input_border_style'] . ';' : '';
       				$message_css .= $new_value['input_border_color'] != '' ? loginstyle_create_color_css( $new_value['input_border_color'], 'border-right-color' ) . loginstyle_create_color_css( $new_value['input_border_color'], 'border-top-color' ) . loginstyle_create_color_css( $new_value['input_border_color'], 'border-bottom-color' ) : '';
       				$message_css .= $new_value['input_border_bottom_width'] != '' ? 'border-bottom-width: ' . $new_value['input_border_bottom_width'] . 'px;' : '';
       				$message_css .= $new_value['input_border_top_width'] != '' ? 'border-top-width: ' . $new_value['input_border_top_width'] . 'px;' : '';
       				$message_css .= $new_value['input_border_right_width'] != '' ? 'border-right-width: ' . $new_value['input_border_right_width'] . 'px;' : '';
       			} else {
       				$message_css .= loginstyle_create_color_css( $new_value['form_background_color'], 'background-color' );
       				$message_css .= $new_value['checkbox_label_color'] != '' ? loginstyle_create_color_css( $new_value['checkbox_label_color'], 'color' ) : '';
       			}
       		}

       		$form_css .= $new_value['form_background_image_source'] == 'media' && $new_value['form_background_image'] != '' ? 'background-image: url(' .  wp_get_attachment_url( $new_value['form_background_image'] ) . ');' : '';
       		$form_css .= $new_value['form_background_image_source'] == 'url' && $new_value['form_background_image_url'] != '' ? 'background-image: url(' .  loginstyle_get_url( $new_value['form_background_image_url'] ) . ');' : '';
       		$form_css .= $new_value['form_background_position'] != '' ? $new_value['form_background_position'] == 'custom' && $new_value['form_background_position_custom'] != '' ? 'background-position: ' .  $new_value['form_background_position_custom'] . ';' : 'background-position: ' .  $new_value['form_background_position'] . ';' : '';
       		$form_css .= $new_value['form_background_repeat'] != '' ? 'background-repeat: ' .  $new_value['form_background_repeat'] . ';' : '';

       		if( $form_css != '' ) {
                        $css .= '.login form { -webkit-box-shadow:none; box-shadow:none;' . $form_css . '}';
                }

       		if( $message_css != '' ) {
                        $css .= '#login #login_error, #login .message {' . $message_css . '}';
                }

                // submit
                $submit_css = '-webkit-box-shadow:none; box-shadow:none;';

               	$submit_css .= $new_value['submit_padding_top'] != '' ? 'padding-top: ' . $new_value['submit_padding_top'] . $new_value['submit_padding_top_unit'] . ';' : '';
       		$submit_css .= $new_value['submit_padding_bottom'] != '' ? 'padding-bottom: ' . $new_value['submit_padding_bottom'] . $new_value['submit_padding_bottom_unit'] . ';' : '';
       		$submit_css .= $new_value['submit_padding_right'] != '' ? 'padding-right: ' . $new_value['submit_padding_right'] . $new_value['submit_padding_right_unit'] . ';' : '';
       		$submit_css .= $new_value['submit_padding_left'] != '' ? 'padding-left: ' . $new_value['submit_padding_left'] . $new_value['submit_padding_left_unit'] . ';' : '';
       		$submit_css .= $new_value['submit_font_size'] != '' ? 'font-size: ' . $new_value['submit_font_size'] . $new_value['submit_font_size_unit'] . ';' : '';
       		$submit_css .= $submit_css != '' ? 'height: auto;' : '';
       		$submit_css .= $new_value['submit_font_color'] != '' ? loginstyle_create_color_css( $new_value['submit_font_color'], 'color' ) : '';
       		$submit_css .= $new_value['submit_radius'] != '' ? 'border-radius: ' . $new_value['submit_radius'] . 'px;' : '';
       		$submit_css .= $new_value['submit_background_color'] != '' ? loginstyle_create_color_css( $new_value['submit_background_color'], 'background-color' ) : '';
       		$submit_css .= $new_value['submit_font_color'] != '' || $new_value['submit_background_color'] != '' ? 'text-shadow: none;' : '';
       		$submit_css .= $new_value['submit_hover_font_color'] != '' || $new_value['submit_hover_background_color'] != '' || $new_value['submit_hover_border_color'] != '' ? 'transition: all ' . $new_value['submit_transition'] . 's; -webkit-transition: all ' . $new_value['submit_transition'] . 's;' : '';
       		$css .= $new_value['submit_border_color'] != '' || $new_value['submit_background_color'] != '' ? '#loginform #wp-submit:focus, #loginform #wp-submit:active { -webkit-box-shadow:none; box-shadow:none; }' : '';

       		if( $new_value['submit_move_row'] != '' ) {
       			$submit_align = '';
       			if( $new_value['submit_align'] == 'full' ) {
       				$submit_css .= ' width: 100%;';
       			} elseif( $new_value['submit_align'] != 'right' ) {
       				$submit_align = ' text-align:' . $new_value['submit_align'] . ';';
       			}
       			$submit_margin = $new_value['submit_move_row'] == 'before' ? 'margin-bottom: 16px;' : 'margin-top: 2.6em;';
       			$css .= '#login form p.submit, .login-action-lostpassword p.submit { clear:both; ' . $submit_margin  . $submit_align . '}';
       			$submit_css .= $new_value['submit_align'] != 'right' ? 'float: none;' : '';
       		}

       		if( $new_value['submit_border_style'] == 'none' ) {
       			$submit_css .= 'border:none;';
       		} else {
	       		$submit_css .= $new_value['submit_border_width'] != '' ? 'border-width: ' . $new_value['submit_border_width'] . 'px;' : '';
	       		$submit_css .= $new_value['submit_border_style'] != '' ? 'border-style: ' . $new_value['submit_border_style'] . ';' : '';
	       		$submit_css .= $new_value['submit_border_color'] != '' ? loginstyle_create_color_css( $new_value['submit_border_color'], 'border-color' ) : '';
       		}

       		$css .= '#loginform #wp-submit {' . $submit_css . '}';

                // submit hover
                $submit_hover_css = '';

       		$submit_hover_css .= $new_value['submit_hover_font_color'] != '' ? loginstyle_create_color_css( $new_value['submit_hover_font_color'], 'color' ) : '';
       		$submit_hover_css .= $new_value['submit_hover_background_color'] != '' ? loginstyle_create_color_css( $new_value['submit_hover_background_color'], 'background-color' ) : '';
       		$submit_hover_css .= $new_value['submit_hover_border_color'] != '' ? loginstyle_create_color_css( $new_value['submit_hover_border_color'], 'border-color' ) : '';

       		if( $submit_hover_css != '' ) {
                        $css .= '#loginform #wp-submit:hover {' . $submit_hover_css . '}';
                }

                // inputs
                $css .= $new_value['input_show_username_label'] != '1' ? '.login label[for=user_login] br {display:none}' : '';
                $css .= $new_value['input_show_password_label'] != '1' ? '.login label[for=user_pass] br {display:none}' : '';

                $input_text_css = '-webkit-box-shadow:none; box-shadow:none;';

                $input_text_css .= $new_value['input_padding_top'] != '' ? 'padding-top: ' . $new_value['input_padding_top'] . $new_value['input_padding_top_unit'] . ';' : '';
       		$input_text_css .= $new_value['input_padding_bottom'] != '' ? 'padding-bottom: ' . $new_value['input_padding_bottom'] . $new_value['input_padding_bottom_unit'] . ';' : '';
       		$input_text_css .= $new_value['input_padding_right'] != '' ? 'padding-right: ' . $new_value['input_padding_right'] . $new_value['input_padding_right_unit'] . ';' : '';
       		$input_text_css .= $new_value['input_padding_left'] != '' ? 'padding-left: ' . $new_value['input_padding_left'] . $new_value['input_padding_left_unit'] . ';' : '';
       		$input_text_css .= $new_value['input_border_radius'] != '' ? 'border-radius: ' . $new_value['input_border_radius'] . 'px;' : '';
       		$input_text_css .= $new_value['input_align'] != '' || $new_value['input_align'] != 'left' ? 'text-align: ' . $new_value['input_align'] . ';' : '';
       		$input_text_css .= $new_value['input_background_color'] != '' ? loginstyle_create_color_css( $new_value['input_background_color'], 'background-color' ) : '';
       		$input_text_css .= $new_value['input_font_color'] != '' ? loginstyle_create_color_css( $new_value['input_font_color'], 'color' ) : '';
       		$input_text_css .= $new_value['input_font_size'] != '' ? 'font-size: ' . $new_value['input_font_size'] . 'px;' : '';
       		$css .= $new_value['placeholder_color'] != '' ? '::-webkit-input-placeholder { ' . loginstyle_create_color_css( $new_value['placeholder_color'], 'color' ) . ' } :-moz-placeholder { ' . loginstyle_create_color_css( $new_value['placeholder_color'], 'color' ) . ' } ::-moz-placeholder { ' . loginstyle_create_color_css( $new_value['placeholder_color'], 'color' ) . ' } :-ms-input-placeholder { ' . loginstyle_create_color_css( $new_value['placeholder_color'], 'color' ) . ' } :placeholder-shown { ' . loginstyle_create_color_css( $new_value['placeholder_color'], 'color' ) . ' }' : '';

       		if( $new_value['input_border_style'] == 'none' ) {
       			$input_text_css .= 'border: none;';
       		} else {
	       		$input_text_css .= $new_value['input_border_top_width'] != '' ? 'border-top-width: ' . $new_value['input_border_top_width'] . 'px;' : '';
	       		$input_text_css .= $new_value['input_border_right_width'] != '' ? 'border-right-width: ' . $new_value['input_border_right_width'] . 'px;' : '';
	       		$input_text_css .= $new_value['input_border_bottom_width'] != '' ? 'border-bottom-width: ' . $new_value['input_border_bottom_width'] . 'px;' : '';
	       		$input_text_css .= $new_value['input_border_left_width'] != '' ? 'border-left-width: ' . $new_value['input_border_left_width'] . 'px;' : '';
	       		$input_text_css .= $new_value['input_border_style'] != '' ? 'border-style: ' . $new_value['input_border_style'] . ';' : '';
       			$input_text_css .= $new_value['input_border_color'] != '' ? loginstyle_create_color_css( $new_value['input_border_color'], 'border-color' ) : '';
       		}

       		$css .= '#login input[type=text], #login input[type=password] {' . $input_text_css . '}';

       		$css .= $new_value['input_label_color'] != '' ? '#login label { ' . loginstyle_create_color_css( $new_value['input_label_color'], 'color' ) . ' }' : '';

       		// loginicon
       		$css .= $new_value['input_show_icon'] == '1' || !empty( $new_value['social'] ) ? '@font-face{font-family:\'loginstyle\';src:url(\'../../public/font/loginstyle.eot\');src:url(\'../../public/font/loginstyle.eot\') format(\'embedded-opentype\'), url(\'../../public/font/loginstyle.ttf\') format(\'truetype\'), url(\'../../public/font/loginstyle.woff\') format(\'woff\'), url(\'../../public/font/loginstyle.svg\') format(\'svg\');font-weight:normal;font-style:normal}' : '';

       		// input icons
       		if( $new_value['input_show_icon'] == '1' ) {
       			$css .= '#login label { position: relative; }';

       			// get input height
       			$input_line_height = $new_value['input_font_size'] != '' ? floor( $new_value['input_font_size'] * 1.4 + $new_value['input_padding_top'] + $new_value['input_padding_bottom'] ) : 43;
       			$input_height = floor( $input_line_height - $new_value['input_border_top_width'] );
       			$bottom = $new_value['input_padding_bottom'] != '' ? $new_value['input_padding_bottom'] : 6;
       			$bottom += $new_value['input_border_top_width'] != '' ? (int) $new_value['input_border_top_width'] : 0;

       			$input_icon_css = 'font-family: \'loginstyle\'; position: absolute; bottom: -' . $bottom . 'px; height: ' . $input_height . 'px; line-height: ' . $input_line_height . 'px; font-size: 15px;';
       			$input_icon_css .= $new_value['input_icon_width'] != '' ? 'width:' . $new_value['input_icon_width'] . 'px;' : '';
       			$input_icon_css .= $new_value['input_icon_position'] == 'right' ? 'right: 6px;' : 'left: 0;';
       			$input_icon_css .= $new_value['input_icon_align'] != '' ? 'text-align: ' . $new_value['input_icon_align'] . ';' : 'text-align:center;';
       			$input_icon_css .= $new_value['input_icon_font_color'] != '' ? loginstyle_create_color_css( $new_value['input_icon_font_color'], 'color' ) : '';
       			$input_icon_css .= $new_value['input_icon_background_color'] != '' && $new_value['input_border_radius'] != '' ? 'border-top-' . $new_value['input_icon_position'] . '-radius: ' . $new_value['input_border_radius'] . 'px; border-bottom-' . $new_value['input_icon_position'] . '-radius: '  . $new_value['input_border_radius'] . 'px;' : '' ;
       			$input_icon_css .= $new_value['input_icon_background_color'] != '' ? loginstyle_create_color_css( $new_value['input_icon_background_color'], 'background-color' ) : '';
       			$input_icon_css .= $new_value['input_icon_border_color'] != '' ? loginstyle_create_color_css( $new_value['input_icon_border_color'], 'border-color' ) : '';
       			if( $new_value['input_icon_border_width'] != '' ) {
       				$input_icon_css .= $new_value['input_icon_position'] == 'right' ? 'border-left-width:' . $new_value['input_icon_border_width'] . 'px; border-left-style: solid;' : 'border-right-width:' . $new_value['input_icon_border_width'] . 'px; border-right-style: solid;';
       			}
       			$css .= '#login label:before {' . $input_icon_css . ' }';

       			if( $new_value['username_icon'] != '' ) {
       				$css .= '#login label[for=user_login]:before{ content:\'' . loginstyle_get_icon_content( $new_value['username_icon'] ) . '\';}';
       				$css .= $new_value['input_icon_border_width'] > 0 || $new_value['input_icon_background_color'] != ''? '#login input#user_login { padding-' . $new_value['input_icon_position'] . ': ' . ( $new_value['input_icon_width'] + 10 ) . 'px; }' : '#login input#user_login { padding-' . $new_value['input_icon_position'] . ': ' . $new_value['input_icon_width'] . 'px; }';
       			}

       			if( $new_value['password_icon'] != '' ) {
       				$css .= '#login label[for=user_pass]:before{ content:\'' . loginstyle_get_icon_content( $new_value['password_icon'] ) . '\';}';
       				$css .= $new_value['input_icon_border_width'] > 0 || $new_value['input_icon_background_color'] != '' ? '#login input#user_pass { padding-' . $new_value['input_icon_position'] . ': ' . ( $new_value['input_icon_width'] + 10 ) . 'px; }' : '#login input#user_pass { padding-' . $new_value['input_icon_position'] . ': ' . $new_value['input_icon_width'] . 'px; }';
       			}
       		}

       		// checkbox
       		$checkbox_css = '-webkit-box-shadow:none; box-shadow:none;';

       		if( $new_value['checkbox_background_color'] != '' ) {
       			$checkbox_css .= loginstyle_create_color_css( $new_value['checkbox_background_color'], 'background-color' );
       			//$css .= '#login input[type=checkbox]:before { ' . loginstyle_create_color_css( $new_value['checkbox_background_color'], 'background-color' ) . ';}';
       		}
       		$checkbox_css .= $new_value['checkbox_border_color'] != '' ? loginstyle_create_color_css( $new_value['checkbox_border_color'], 'border-color' ) : '';
       		$checkbox_css .= $new_value['checkbox_border_radius'] != '' ? 'border-radius:' . $new_value['checkbox_border_radius'] . 'px;' : '';
       		$css .= $new_value['checkbox_check_color'] != '' ? '#login input[type=checkbox]:checked:before { ' . loginstyle_create_color_css( $new_value['checkbox_check_color'], 'color' ) . '}' : '';
       		$css .= $new_value['checkbox_label_color'] != '' ? '#login label[for=rememberme] { ' . loginstyle_create_color_css( $new_value['checkbox_label_color'], 'color' ) . ' }' : '';

       		$css .= $checkbox_css != '' ? '#login input[type=checkbox] { ' . $checkbox_css . ' }' : '';

       		// footer
       		if( $new_value['footer_text'] != '' || !empty( $new_value['social'] ) ) {
       			$footer_css = 'margin: 50px auto 20px; box-sizing: border-box;';
       			$footer_css .= $new_value['content_width'] != '' ? 'width:' . $new_value['content_width'] . $new_value['content_width_unit'] . ';' : 'width: 320px;';
       			$footer_css .= $new_value['footer_align'] != '' ? 'text-align:' . $new_value['footer_align'] . ';' : '';
       			$css .= '.login .loginstyle-footer{ ' . $footer_css . '} .login .loginstyle-footer > div { margin-bottom: 30px; }';
       		}

       		// social
       		if( !empty( $new_value['social'] ) ) {
       			$css .= '[class^="loginicon-"],[class*=" loginicon-"]{font-family:\'loginstyle\' !important;speak:none;font-style:normal;font-weight:normal;font-variant:normal;text-transform:none;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}';

       			foreach( $new_value['social'] as $social ) {
				$css .= '.' . $social['icon'] . ':before{content:"' . loginstyle_get_icon_content( $social['icon'] ) . '"}';
			}

       			$social_font_size = $new_value['social_icon_font_size'] != '' ? $new_value['social_icon_font_size'] . 'px' : '20px';
       			$css .= '.login .loginstyle-footer ul { list-style-type: none; } .login .loginstyle-footer li { display: inline-block; margin: 0 0.7em; font-size: ' . $social_font_size . '; }';

       			$social_css = '';
       			$css .= $new_value['social_icon_color'] != '' ? '.login .loginstyle-footer li a { text-decoration: none; ' . loginstyle_create_color_css( $new_value['social_icon_color'], 'color' ) . ' -webkit-transition: 0.5s all; transition: 0.5s all; }' : '.login .loginstyle-footer li a { text-decoration: none; -webkit-transition: 0.5s all; transition: 0.5s all; }';
       			$css .= $new_value['social_icon_hover_color'] != '' ? '.login .loginstyle-footer li a:hover { ' . loginstyle_create_color_css( $new_value['social_icon_hover_color'], 'color' ) . ' }' : '';
       		}

       		// custom css
       		$css .= $new_value['custom_css'] != '' ? $new_value['custom_css'] : '';
                
                // grab old css
                $old_css = get_option('loginstyle_css');
                
                update_option( 'loginstyle_css', $css );

                if( $old_css != $css ) {
                        loginstyle_update_static_css();
                }
	}

}
add_action( 'update_option_' . LOGINSTYLE_OPTIONS, 'loginstyle_post_save_options', 10, 2 );


if( !function_exists('loginstyle_update_static_css') ) {
        function loginstyle_update_static_css() {
                
                $css = get_option('loginstyle_css');

                if( $css ) {
	                $blog_id = '';
	                if( is_multisite() ) {
	                        $blog_id = get_current_blog_id();
	                }
	                
	                $filename = LOGINSTYLE_PATH . 'public/css/custom' . $blog_id . '.css';
	                
	                if( file_exists( $filename ) ) {
	                        file_put_contents($filename, $css, LOCK_EX);
	                } else {
	                        $file = fopen($filename, "w");
	                        
	                        if( $file == false ) {
	                                die("unable to create file");
	                        }
	                        
	                        fwrite($file, $css);
	                        fclose($file);
	                }
                }
        }
}

if( !function_exists('loginstyle_create_color_css') ) {
        function loginstyle_create_color_css($color, $property) {
                
                if( strpos( $color, 'rgba' ) !== false ) {
			return $property . ': ' . loginstyle_rgba_to_hex( $color ) . ';' . $property . ': ' . $color . ';';
                } else {
                	return $property . ': ' . $color . ';';
                }
        }
}

if( !function_exists('loginstyle_rgba_to_hex') ) {
        function loginstyle_rgba_to_hex( $rgba ) {

                if( strpos( $rgba, 'rgba' ) === 0 ) {

                	$rgba = preg_replace( 
			array(
				'/[^\d,]/',    // Matches anything that's not a comma or number.
				'/(?<=,),+/',  // Matches consecutive commas.
				'/^,+/',       // Matches leading commas.
				'/,+$/'        // Matches trailing commas.
			), '', $rgba );

                	$rgba = explode( ',', $rgba );
		
			$hex  = "#";
			$hex .= str_pad( dechex( $rgba[0] ), 2, "0", STR_PAD_LEFT );
			$hex .= str_pad( dechex( $rgba[1] ), 2, "0", STR_PAD_LEFT );
			$hex .= str_pad( dechex( $rgba[2] ), 2, "0", STR_PAD_LEFT );

			return $hex;
                } else {
                	return $rgba;
                }
        }
}

if( !function_exists('loginstyle_get_alpha') ) {
	function loginstyle_get_alpha( $rgba ) {
		if( strpos( $rgba, 'rgba' ) === 0 ) {

                	$rgba = preg_replace( 
				array(
					'/[^\d,]/',    // Matches anything that's not a comma or number.
					'/(?<=,),+/',  // Matches consecutive commas.
					'/^,+/',       // Matches leading commas.
					'/,+$/'        // Matches trailing commas.
			), '', $rgba );

                	$rgba = explode( ',', $rgba );

			return (int) $rgba[3];
                } else {
                	return false;
                }
	}
}

if( !function_exists('loginstyle_get_url') ) {
	function loginstyle_get_url( $url ) {
		
		if ( !filter_var($url, FILTER_VALIDATE_URL) === false ) {
		    	return $url;
		} else {
			$blog_id = is_multisite() ? get_current_blog_id() : '';
		    	return get_site_url( $blog_id, $url );
		}
	}
}
?>