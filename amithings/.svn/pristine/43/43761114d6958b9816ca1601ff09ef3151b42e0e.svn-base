<?php
/*
	Plugin Name: Amithings
	Plugin URI: https://wordpress.org/plugins/amithings/
	Description: Shows Information from Amithings in your Blog by using shortcodes inside Posts and Pages. Ex: [amithings upl="information(bible-versions)"]
	Version: 1.2
	Author: Suporte On
	Author URI: http://www.suporteon.com
	License: GPLv2 or later
*/

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	define( 'AMITHINGS_NAME', 'Amithings' );
	define( 'AMITHINGS_DIR', plugin_dir_path(__FILE__) );
	define( 'AMITHINGS_URL', plugin_dir_url(__FILE__) );

	define( 'AMITHINGS_TEXT_DOMAIN', 'amithings' );
	
	register_activation_hook( __FILE__, 'amithings_activation' );
	register_deactivation_hook( __FILE__, 'amithings_deactivation' );

	add_action( 'init', 'amithings_init' );
	add_action( 'admin_menu', 'amithings_admin_menu' );
	add_action( 'admin_notices', 'amithings_admin_notices' );

	function amithings_activation()
	{
	}

	function amithings_admin()
	{
		require_once AMITHINGS_DIR . 'amithings-admin.php';
	}

	function amithings_admin_menu()
	{
		add_menu_page( __( AMITHINGS_NAME, AMITHINGS_TEXT_DOMAIN ), __( AMITHINGS_NAME, AMITHINGS_TEXT_DOMAIN ), 2, 'amithings', 'amithings_admin', AMITHINGS_URL . 'assets/icon-20x20.png', 4 );
	}

	function amithings_admin_notices()
	{
	}

	function amithings_deactivation()
	{
	}

	function amithings_init()
	{
		load_plugin_textdomain( 'amithings', FALSE, AMITHINGS_DIR . 'languages' );
	}

	if (!function_exists('amithings_shortcode'))
	{
		function amithings_shortcode($atts)
		{
//			$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

			extract(shortcode_atts(array(
				'address' => 'no',
				'border' => 'no',
				'container' => 'iframe',
				'height' => 'auto',
				'scrolling' => 'no',
				'upl' => '',
				'width' => '100%'
			), $atts));

			// address
			switch ($address)
			{
				case 'yes':
				case 'no':
				{
					break;
				}
				default:
				{
					$address = 'no';
				}
			}

			// border
			switch ($border)
			{
				case 'yes':
				case 'no':
				{
					break;
				}
				default:
				{
					$border = 'no';
				}
			}

			// container
			switch ($container)
			{
				case 'iframe':
				{
					break;
				}
				default:
				{
					$container = 'iframe';
				}
			}

			// height
			switch ($height)
			{
				case 'auto':
				{
					break;
				}
				default:
				{
					if (!preg_match('/^-?[0-9]{1,10}(cm|em|ex|in|mm|pc|pt|px|%)?$/', $height))
					{
						$height = 'auto';
					}
				}
			}

			// scrolling
			switch ($scrolling)
			{
				case 'auto':
				{
					$overflow = 'auto';
					break;
				}
				case 'yes':
				{
					$overflow = 'scroll';
					break;
				}
				case 'no':
				{
					$overflow = 'hidden';
					break;
				}
				default:
				{
					$scrolling = 'auto';
					$overflow = 'auto';
				}
			}

			// upl
			if (substr($upl, 0, 1) == '/')
			{
				$upl = substr($upl, 1);
			}
			if (substr($upl, -1, 1) == '/')
			{
				$upl = substr($upl, 0, strlen($upl) - 1);
			}
			$upl = 'http://app.amithings.com' . '/' . $upl;

			// width
			switch ($width)
			{
				case 'auto':
				{
					break;
				}
				default:
				{
					if (!preg_match('/^-?[0-9]{1,10}(cm|em|ex|in|mm|pc|pt|px|%)?$/', $width))
					{
						$width = '100%';
					}
				}
			}

			switch ($container)
			{
				case 'iframe':
				{
					wp_enqueue_style( 'amithings-style', plugins_url( 'assets/css/amithings.css', __FILE__ ), FALSE, FALSE, FALSE );
					wp_enqueue_script( 'postmessage-script', plugins_url( 'assets/js/postmessage.min.js', __FILE__ ) );
					wp_enqueue_script( 'amithings-script', plugins_url( 'assets/js/amithings.js', __FILE__ ) );
					$html = '';
					$html .= '<div class="amithings-contents' . (($border == 'yes') ? ' amithings-border' : '') . '">';
					$html .= '<div class="amithings-address' . (($address == 'no') ? ' amithings-hide' : '') . '" id="amithings-' . uniqid() . '"></div>';
					$html .= '<iframe';
					$html .= ' class="amithings-iframe"';
					$html .= ' id="amithings-' . uniqid() . '"';
					$html .= ' scrolling="' . $scrolling . '"';
					$html .= ' src="' . $upl . '"';
					$html .= ' style="';
					if ($height != 'auto')
					{
						$html .= 'height: ' . $height . ';';
						$html .= ' ';
					}
					$html .= 'overflow: ' . $overflow . ';';
					$html .= ' width: ' . $width . ';';
					$html .= '">';
					$html .= '</iframe>';
					$html .= '</div>';
					break;
				}
			}
			return($html);
		}
	}

	add_shortcode('amithings', 'amithings_shortcode');
?>