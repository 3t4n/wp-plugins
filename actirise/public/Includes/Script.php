<?php
namespace ActirisePublic\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Actirise\Includes\Helpers;
use Actirise\Includes\Cron;
use Actirise\Includes\Options;

/**
 * This class handles the head script integration
 *
 * @link       https://actirise.com
 * @since      2.0.0
 * @package    actirise
 * @subpackage actirise/public/includes
 * @author     actirise <wordpress@actirise.com>
 */
final class Script {
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */

	protected $plugin_name;
	/**
	 * The current version of the plugin.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	private $version;

	/**
	 * No pub Class
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      NoPub    $no_pub    The no pub class.
	 */
	private $no_pub;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * @since    2.0.0
	 * @param    string $plugin_name The name of this plugin.
	 * @param    string $version     The version of this plugin.
	 * @param    NoPub  $no_pub      The no pub class.
	 */
	public function __construct( $plugin_name, $version, $no_pub ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->no_pub      = $no_pub;

		if ( ACTIRISE_CRON !== 'true' ) {
			$this->update_fastcmp();
		}
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    2.0.0
	 * @return void
	 */
	public function head_integration() {
		/** @var string $uuid  */
		$uuid = Options::get( 'settings-uuid', '' );
		/** @var string $type_tag  */
		$type_tag = Options::get( 'settings-uuid-type', 'boot' );
		/** @var string $custom_value1 */
		$custom_value1 = Options::get( 'custom1', '' );
		/** @var string $custom_value2 */
		$custom_value2 = Options::get( 'custom2', '' );
		/** @var string $custom_value3 */
		$custom_value3 = Options::get( 'custom3', '' );
		/** @var string $custom_value4 */
		$custom_value4 = Options::get( 'custom4', '' );
		/** @var string $custom_value5 */
		$custom_value5 = Options::get( 'custom5', '' );

		$script_option = version_compare( get_bloginfo( 'version' ), '6.3', '>=' ) ? array(
			'in_footer' => false,
		) : false;

		if ( Options::get( 'fastcmp-enabled', 'false' ) === true ) {
			$fastcmp_options = Helpers::get_fastcmp_options( true );

			if ( $fastcmp_options['privacyPolicy'] !== '' && $fastcmp_options['uuid'] !== '' ) {
				/** @var string $exclude_iab_vendors */
				$exclude_iab_vendors = wp_json_encode( $fastcmp_options['excludedIabVendors'] );
				/** @var string $exclude_google_vendors */
				$exclude_google_vendors = wp_json_encode( $fastcmp_options['excludedGoogleVendors'] );

				$custom_vendor        = '';
				$custom_vendor_string = '';

				if ( count( $fastcmp_options['customsVendor'] ) > 0 ) {
					$custom_vendor_string = '[';

					/** @var object{name: string, id: string} $customs_vendor */
					foreach ( $fastcmp_options['customsVendor'] as $customs_vendor ) {
						$custom_vendor_string .= '{name: "' . esc_attr( $customs_vendor->name ) . '", id: "' . esc_attr( $customs_vendor->id ) . '"},';
					}
					$custom_vendor_string  = substr( $custom_vendor_string, 0, -1 );
					$custom_vendor_string .= ']';

					$custom_vendor .= 'custom: {vendors: ' . $custom_vendor_string . '},';
				}

				$fastcmp_config = sprintf(
					"window.FAST_CMP_OPTIONS = { 
					domainUid: '%s',
					countryCode: '%s',
					policyUrl: '%s',
					displaySynchronous: false,
					publisherName: '%s',
					bootstrap: { 
						excludedIABVendors: %s, 
						excludedGoogleVendors: %s,
					},
					jurisdiction: '%s',
					%s
					%s
				};",
					esc_js( $fastcmp_options['uuid'] ),
					esc_js( $fastcmp_options['headOffice'] ),
					esc_js( $fastcmp_options['privacyPolicy'] ),
					esc_js( $fastcmp_options['name'] ),
					esc_js( $exclude_iab_vendors ),
					esc_js( $exclude_google_vendors ),
					esc_js( $fastcmp_options['targetedAudience'] ),
					$fastcmp_options['logo'] !== '' ? "publisherLogo: function (c) { return c.createElement('img', { src: '" . $fastcmp_options['logo'] . "', height: '40' }) }," : '',
					$custom_vendor
				);

				$stublight = $fastcmp_options['stubLight'];

				$fast_cmp_options_script = array(
					'data-no-optimize'         => '1',
					'data-wpmeteor-nooptimize' => 'true',
					'data-cfasync'             => 'false',
					'nowprocket'               => '',
				);

				if ( defined( 'WP_ROCKET_VERSION' ) === false ) {
					$fast_cmp_options_script['charset'] = 'UTF-8';
				}

				wp_enqueue_script(
					'fastcmp',
					'https://static.fastcmp.com/fast-cmp-stub.js',
					array(),
					'latest',
					$script_option
				);

				wp_add_inline_script( 'fastcmp', $fastcmp_config . "\n" . $stublight, 'before' );

				$fastcmp_options = Helpers::get_fastcmp_options( true );

				$this->add_fastcmp_style( $fastcmp_options );
			}
		}

		if ( $uuid === '' ) {
			return;
		}

		$presized_div_selected = $this->get_presized_slot_active();

		$no_pub = $this->no_pub->check_no_pub() ? 'no_pub: true,' : '';

		wp_enqueue_script(
			'actirise',
			'https://www.flashb.id/' . esc_js( $type_tag ) . '/' . esc_js( $uuid ) . '.js',
			array(),
			'latest',
			$script_option
		);

		$data_var = sprintf(
			"window._hbdbrk=window._hbdbrk||[];window._hbdbrk.push(['_vars', {page_type:'%s',pid:3,custom1:'%s',custom2:'%s',custom3:'%s',custom4:'%s',custom5:'%s',%s}]);",
			esc_attr( Helpers::get_page_type() ),
			esc_attr( Helpers::get_custom_value( $custom_value1, 'custom1' ) ),
			esc_attr( Helpers::get_custom_value( $custom_value2, 'custom2' ) ),
			esc_attr( Helpers::get_custom_value( $custom_value3, 'custom3' ) ),
			esc_attr( Helpers::get_custom_value( $custom_value4, 'custom4' ) ),
			esc_attr( Helpers::get_custom_value( $custom_value5, 'custom5' ) ),
			esc_attr( $no_pub )
		);

		/** @var string $adstxt_active */
		$adstxt_active = Options::get( 'adstxt-active', 'false' );
		/** @var string $presizeddiv_active */
		$presizeddiv_active = Options::get( 'presizeddiv-active', 'false' );

		$actirise_plugin = sprintf(
			"window.actirisePlugin=window.actirisePlugin||{};window.actirisePlugin.version='%s';window.actirisePlugin.adsTxtActive=%s;window.actirisePlugin.presizedActive=%s;window.actirisePlugin.cron=%s;window.actirisePlugin.fastcmp=%s;window.actirisePlugin.autoUpdate=%s;",
			esc_attr( $this->version ),
			esc_attr( $adstxt_active ),
			esc_attr( $presizeddiv_active ),
			esc_attr( ( defined( 'ACTIRISE_CRON' ) && ACTIRISE_CRON === 'true' ) === true ? 'true' : 'false' ),
			esc_attr( Options::get( 'fastcmp-enabled', 'false' ) === true ? 'true' : 'false' ),
			esc_attr( Helpers::has_auto_update() ? 'true' : 'false' )
		);

		wp_add_inline_script( 'actirise', $data_var . "\n" . $actirise_plugin, 'after' );
	}

	/**
	 * Change js attribute.
	 *
	 * @since 2.5.7
	 * @param string $tag The tag.
	 * @param string $handle The handle.
	 * @return string
	 */
	public function change_js_attribute( $tag, $handle ) {
		if ( 'actirise' === $handle ) {
			/** @var string $tag */
			$tag = preg_replace( '#\sid=([\'"])actirise-js([\'"])#', '', $tag );
			/** @var string $tag */
			$tag = str_replace( 'src=', 'data-cfasync="false" defer src=', $tag );
			/** @var string $tag */
			$tag = preg_replace( '#\sid=([\'"])actirise-js-after([\'"])#', '', $tag );
			/** @var string $tag */
			$tag = preg_replace( '/\?ver=[0-9.a-z]+/', '', $tag );
		}

		if ( 'fastcmp' === $handle ) {
			/** @var string $tag */
			$tag = preg_replace( '#\sid=([\'"])fastcmp-js-before([\'"])#', ' data-no-optimize="1" data-wpmeteor-nooptimize="true" data-cfasync="false" nowprocket="" charset="UTF-8"', $tag );
			/** @var string $tag */
			$tag = str_replace( 'src=', 'async data-no-optimize="1" data-wpmeteor-nooptimize="true" data-cfasync="false" nowprocket="" charset="UTF-8" src=', $tag );
			/** @var string $tag */
			$tag = preg_replace( '#\sid=([\'"])fastcmp-js([\'"])#', '', $tag );
			/** @var string $tag */
			$tag = preg_replace( '/\?ver=[0-9.a-z]+/', '', $tag );
		}

		return $tag;
	}

	/**
	 * Get fastcmp style.
	 *
	 * @since 2.4.0
	 * @param array{acceptButtonStyle: array{bg: string, font: string}, declineButtonStyle: array{bg: string, border: string, font: string}, parametersButtonStyle: array{bg: string, border: string, font: string}, customStyle: string} $fastcmp_options The fastcmp options.
	 * @return void
	 */
	public function add_fastcmp_style( $fastcmp_options ) {
		wp_register_style( 'fast-cmp-custom-styles', false, array(), $this->version );
		wp_enqueue_style( 'fast-cmp-custom-styles' );

		$custom_css = '';

		if ( $fastcmp_options['acceptButtonStyle']['bg'] !== '' || $fastcmp_options['acceptButtonStyle']['font'] !== '' ) {
			$custom_css .= '#fast-cmp-container button.fast-cmp-button-primary{';
			if ( $fastcmp_options['acceptButtonStyle']['bg'] !== '' ) {
				$custom_css .= 'background-color:' . esc_attr( $fastcmp_options['acceptButtonStyle']['bg'] ) . '!important;';
			}
			if ( $fastcmp_options['acceptButtonStyle']['font'] !== '' ) {
				$custom_css .= 'color:' . esc_attr( $fastcmp_options['acceptButtonStyle']['font'] ) . '!important;';
			}
			$custom_css .= '}';
		}

		if ( $fastcmp_options['acceptButtonStyle']['bg'] !== '' ) {
			$custom_css .= '#fast-cmp-container #fast-cmp-home button.fast-cmp-button-secondary{';
			if ( $fastcmp_options['declineButtonStyle']['bg'] === 'transparent' ) {
				$custom_css .= 'box-shadow: inset 0 0 0 1px ' . esc_attr( $fastcmp_options['acceptButtonStyle']['bg'] ) . '!important;';
			} else {
				$custom_css .= 'box-shadow: none!important;';
			}
			$custom_css .= '}';
			$custom_css .= '#fast-cmp-container #fast-cmp-home button.fast-cmp-navigation-button{';
			if ( $fastcmp_options['parametersButtonStyle']['bg'] === 'transparent' ) {
				$custom_css .= 'box-shadow: inset 0 0 0 1px ' . esc_attr( $fastcmp_options['acceptButtonStyle']['bg'] ) . '!important;';
			} else {
				$custom_css .= 'box-shadow: none!important;';
			}
			$custom_css .= '}';
		}

		if ( $fastcmp_options['declineButtonStyle']['bg'] !== '' || $fastcmp_options['declineButtonStyle']['font'] !== '' ) {
			$custom_css .= '#fast-cmp-container #fast-cmp-home button.fast-cmp-button-secondary{';
			if ( $fastcmp_options['declineButtonStyle']['bg'] !== '' && $fastcmp_options['declineButtonStyle']['bg'] !== 'transparent' ) {
				$custom_css .= 'background-color:' . esc_attr( $fastcmp_options['declineButtonStyle']['bg'] ) . '!important;';
			}
			if ( $fastcmp_options['declineButtonStyle']['font'] !== '' ) {
				$custom_css .= 'color:' . esc_attr( $fastcmp_options['declineButtonStyle']['font'] ) . '!important;';
			}
			$custom_css .= '}';
		}

		if ( $fastcmp_options['declineButtonStyle']['border'] !== '' ) {
			$custom_css     .= '#fast-cmp-container #fast-cmp-home button.fast-cmp-button-secondary:hover{';
				$custom_css .= 'box-shadow: inset 0 0 0 1px ' . esc_attr( $fastcmp_options['declineButtonStyle']['border'] ) . '!important;';
			if ( $fastcmp_options['declineButtonStyle']['font'] !== '' ) {
				$custom_css .= 'color:' . esc_attr( $fastcmp_options['declineButtonStyle']['font'] ) . '!important;';
			}
			$custom_css .= '}';
		}

		if ( $fastcmp_options['parametersButtonStyle']['bg'] !== '' || $fastcmp_options['parametersButtonStyle']['font'] !== '' ) {
			$custom_css .= '#fast-cmp-container #fast-cmp-home button.fast-cmp-navigation-button{';
			if ( $fastcmp_options['parametersButtonStyle']['bg'] !== '' && $fastcmp_options['parametersButtonStyle']['bg'] !== 'transparent' ) {
				$custom_css .= 'background-color:' . esc_attr( $fastcmp_options['parametersButtonStyle']['bg'] ) . '!important;';
			}
			if ( $fastcmp_options['parametersButtonStyle']['font'] !== '' ) {
				$custom_css .= 'color:' . esc_attr( $fastcmp_options['parametersButtonStyle']['font'] ) . '!important;';
			}
			$custom_css .= '}';
		}

		if ( $fastcmp_options['parametersButtonStyle']['border'] !== '' ) {
			$custom_css .= '#fast-cmp-container #fast-cmp-home button.fast-cmp-navigation-button:hover{';
			$custom_css .= 'box-shadow: inset 0 0 0 1px ' . esc_attr( $fastcmp_options['parametersButtonStyle']['border'] ) . '!important;';
			if ( $fastcmp_options['parametersButtonStyle']['font'] !== '' ) {
				$custom_css .= 'color:' . esc_attr( $fastcmp_options['parametersButtonStyle']['font'] ) . '!important;';
			}
			$custom_css .= '}';
		}

		if ( $fastcmp_options['acceptButtonStyle']['bg'] !== '' ) {
			$custom_css .= '#fast-cmp-container a {';
			$custom_css .= 'color: ' . esc_attr( $fastcmp_options['acceptButtonStyle']['bg'] ) . '!important;';
			$custom_css .= '}';
			$custom_css .= '#fast-cmp-container .fast-cmp-layout-header .fast-cmp-navigation-button {';
			$custom_css .= 'background-color: ' . esc_attr( $fastcmp_options['acceptButtonStyle']['bg'] ) . '!important;';
			$custom_css .= 'color: white!important;';
			$custom_css .= '}';
			$custom_css .= '#fast-cmp-container #fast-cmp-consents .fast-cmp-layout-nav button.fast-cmp-navigation-button {';
			$custom_css .= 'color: ' . esc_attr( $fastcmp_options['acceptButtonStyle']['bg'] ) . '!important;';
			$custom_css .= 'box-shadow: inset 0 0 0 1px ' . esc_attr( $fastcmp_options['acceptButtonStyle']['bg'] ) . '!important;';
			$custom_css .= '}';
			$custom_css .= '#fast-cmp-form .fast-cmp-spinner {';
			$custom_css .= 'border-left-color: ' . esc_attr( $fastcmp_options['acceptButtonStyle']['bg'] ) . '!important;';
			$custom_css .= '}';
		}

		$fastcmp_options['customStyle'] = preg_replace( '/\s\s+/', '', $fastcmp_options['customStyle'] );

		if ( ! is_null( $fastcmp_options['customStyle'] ) && $fastcmp_options['customStyle'] !== '' ) {
			$custom_css .= trim( $fastcmp_options['customStyle'] );
		}

		wp_add_inline_style( 'fast-cmp-custom-styles', $custom_css );
	}

	/**
	 * Get presized slot active.
	 *
	 * @since 2.0.0
	 * @return array<mixed>
	 */
	private function get_presized_slot_active() {
		$presized_div = get_option( $this->plugin_name . '-presizeddiv-selected', array() );

		if ( ! is_array( $presized_div ) ) {
			$presized_div = array();
		}

		return $presized_div;
	}

	/**
	 * Update fastcmp.
	 *
	 * @since 2.2.0
	 * @return void
	 */
	private function update_fastcmp() {
		$cron = new Cron();
		$cron->check_scheduled_task_with_transient(
			'get_fast_cmp',
			array(
				$cron,
				'get_fast_cmp',
			)
		);
	}
}
