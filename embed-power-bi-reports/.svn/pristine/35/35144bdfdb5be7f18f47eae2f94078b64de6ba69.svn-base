<?php
/**
 * Handles PowerBI Configurations.
 *
 * @package embed-power-bi-reports\Controller
 */

namespace MoEmbedPowerBI\Controller;

use MoEmbedPowerBI\API\Authorization;
use MoEmbedPowerBI\API\Azure;
use MoEmbedPowerBI\Wrappers\wpWrapper;
use MoEmbedPowerBI\Wrappers\pluginConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle the Power BI Configuration functionalities.
 */
class powerBIConfig {
	/**
	 * Holds the Power BI Config class instance.
	 *
	 * @var Power_BI_Config
	 */
	private static $instance;

	/**
	 * Variable to store api endpoint value from plugin constants file.
	 *
	 * @var string
	 */
	private static $api_endpoint = pluginConstants::API_ENDPOINT_VAL;

	/**
	 * Variable to store configuartions.
	 *
	 * @var array
	 */
	private $config = array();

	/**
	 * Object instance( Power BI Config Controller) getter method.
	 *
	 * @return Power_BI_Config
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to call functions according to the form submitted.
	 *
	 * @param iterable|object $option Stores the form option value.
	 * @return void
	 */
	public function mo_epbr_save_settings( $option ) {
		switch ( $option ) {
			case 'mo_epbr_resource_config_option':
				$this->mo_epbr_save_resource_config();
				break;

			case 'mo_epbr_shortcode_container':
				$this->mo_epbr_delete_shortcode();
				break;

			case 'mo_epbr_allshortcode_delete':
				$this->mo_epbr_delete_all_shortcodes();
				break;

			case 'mo_epbr_powerbi_resource_integration':
				$this->mo_epbr_more_resource_configurations();
				break;

		}
	}

	/**
	 * Function to fetch and store the embed mode and etc additional resource configurations.
	 *
	 * @return void
	 */
	private function mo_epbr_more_resource_configurations() {
		check_admin_referer( 'mo_epbr_powerbi_resource_integration' );
		if ( isset( $_POST['res_embed_mode_dropdown'] ) ) {
			$selected = sanitize_text_field( wp_unslash( $_POST['res_embed_mode_dropdown'] ) );
			wpWrapper::mo_epbr_set_option( 'mo_epbr_res_embed_mode', $selected );
		}
			wpWrapper::mo_epbr__show_success_notice( 'Embed Mode Changed Successfully.' );
	}

	/**
	 * Function to delete all shortcodes.
	 *
	 * @return void
	 */
	private function mo_epbr_delete_all_shortcodes() {
		check_admin_referer( 'mo_epbr_allshortcode_delete' );
		wpWrapper::mo_epbr_set_option( 'mo_epbr_all_generated_shortcodes', '' );
		wpWrapper::mo_epbr_set_option( 'mo_epbr_resourceids_array', '' );
		wpWrapper::mo_epbr__show_success_notice( esc_html__( 'All Shortcodes Deleted Successfully.', 'embed-power-bi-reports' ) );
	}

	/**
	 * Function to delete particular shortcode.
	 *
	 * @return void
	 */
	private function mo_epbr_delete_shortcode() {
		check_admin_referer( 'mo_epbr_shortcode_container' );
		$shortcode_config         = sanitize_text_field( str_replace( '\\', '', isset( $_POST['mo_epbr_current_clicked_value'] ) ? sanitize_text_field( wp_unslash( $_POST['mo_epbr_current_clicked_value'] ) ) : '' ) );
		$shortcode__config        = explode( '"', $shortcode_config );
		$shortcode_wid            = $shortcode__config[1];
		$shortcode_rid            = $shortcode__config[3];
		$all_generated_shortcodes = wpWrapper::mo_epbr_get_option( 'mo_epbr_all_generated_shortcodes' );
		$element                  = array_search( $shortcode_config, $all_generated_shortcodes, true );
		unset( $all_generated_shortcodes[ $element ] );
		$resource_ids = wpWrapper::mo_epbr_get_option( 'mo_epbr_resourceids_array' );
		if ( in_array( $shortcode_rid . '=' . $shortcode_wid, $resource_ids, true ) ) {
			$key = array_search( $shortcode_rid . '=' . $shortcode_wid, $resource_ids, true );
			if ( false !== $key ) {
				unset( $resource_ids[ $key ] );
			}
		}
		wpWrapper::mo_epbr_set_option( 'mo_epbr_resourceids_array', $resource_ids );
		wpWrapper::mo_epbr_set_option( 'mo_epbr_all_generated_shortcodes', $all_generated_shortcodes );
		wpWrapper::mo_epbr__show_success_notice( esc_html__( 'Shortcode Deleted Successfully.', 'embed-power-bi-reports' ) );
	}

	/**
	 * Function to save the resource configurations.
	 *
	 * @return void
	 */
	private function mo_epbr_save_resource_config() {
		check_admin_referer( 'mo_epbr_resource_config_option' );
		$wid        = isset( $_POST['wid'] ) ? sanitize_text_field( wp_unslash( $_POST['wid'] ) ) : '';
		$rid        = isset( $_POST['rid'] ) ? sanitize_text_field( wp_unslash( $_POST['rid'] ) ) : '';
		$height     = isset( $_POST['height'] ) ? sanitize_text_field( wp_unslash( $_POST['height'] ) ) : '';
		$width      = isset( $_POST['width'] ) ? sanitize_text_field( wp_unslash( $_POST['width'] ) ) : '';
		$dataset_id = isset( $_POST['datasetid'] ) ? sanitize_text_field( wp_unslash( $_POST['datasetid'] ) ) : '';
		wpWrapper::mo_epbr_set_option( 'mo_epbr_dataset_id', $dataset_id );
		if ( is_numeric( $height ) ) {
			$height = $height . 'px';}
		if ( is_numeric( $width ) ) {
			$width = $width . 'px';}
		if ( ! isset( $resourceids_arr ) ) {
			$mo_epbr_resourceids_array = array();
		}
		if ( wpWrapper::mo_epbr_get_option( 'mo_epbr_resourceids_array' ) ) {
			$mo_epbr_resourceids_array = wpWrapper::mo_epbr_get_option( 'mo_epbr_resourceids_array' );
		}

		$generated_shortcode = '[MO_API_POWER_BI workspace_id="' . $wid . '" report_id="' . $rid . '" width="' . $width . '" height="' . $height . '" ]';

		if ( wpWrapper::mo_epbr_get_option( 'mo_epbr_all_generated_shortcodes' ) ) {
			$shortcodes_array = wpWrapper::mo_epbr_get_option( 'mo_epbr_all_generated_shortcodes' );

			if ( ! in_array( $generated_shortcode, $shortcodes_array, true ) && ( ! in_array( $rid . '=' . $wid, $mo_epbr_resourceids_array, true ) ) ) {
				array_push( $shortcodes_array, $generated_shortcode );
			} elseif ( in_array( $rid . '=' . $wid, $mo_epbr_resourceids_array, true ) ) {
				$shortcode_value = '[MO_API_POWER_BI workspace_id="' . $wid . '" report_id="' . $rid . '" ';
				$index           = 0;
				foreach ( $shortcodes_array as $shortcode ) {
					if ( str_contains( $shortcode, $shortcode_value ) ) {
						$shortcodes_array[ $index ] = $generated_shortcode;
					}
					++$index;
				}
			}
			wpWrapper::mo_epbr_set_option( 'mo_epbr_all_generated_shortcodes', $shortcodes_array );
		} else {
			$new_shortcodes_array = array( $generated_shortcode );
			wpWrapper::mo_epbr_set_option( 'mo_epbr_all_generated_shortcodes', $new_shortcodes_array );
		}

		if ( ! in_array( $rid, $mo_epbr_resourceids_array, true ) ) {
			array_push( $mo_epbr_resourceids_array, $rid . '=' . $wid );
		}
		wpWrapper::mo_epbr_set_option( 'mo_epbr_resourceids_array', $mo_epbr_resourceids_array );
		wpWrapper::mo_epbr__show_success_notice( esc_html__( 'Shortcode Saved Successfully.', 'embed-power-bi-reports' ) );
	}

	/**
	 * Function handling the embed shortcode funnctionalities.
	 *
	 * @param string $attrs These are the attributes sent or written within the shortcode.
	 * @param string $content This is the content of the sttributes values.
	 * @return string
	 */
	public function mo_embed_shortcode_power_bi( $attrs = '', $content = '' ) {
		$attrs = shortcode_atts(
			array(
				'width'        => '800px',
				'height'       => '800px',
				'workspace_id' => '',
				'report_id'    => '',
			),
			$attrs,
			'MO_API_POWER_BI'
		);
		if ( ! isset( $attrs['workspace_id'] ) || ! isset( $attrs['report_id'] ) ) {
			return '';
		}
		$this->config['rid']    = sanitize_text_field( wp_unslash( $attrs['report_id'] ) );
		$this->config['wid']    = sanitize_text_field( wp_unslash( $attrs['workspace_id'] ) );
		$this->config['width']  = sanitize_text_field( wp_unslash( $attrs['width'] ) );
		$this->config['height'] = sanitize_text_field( wp_unslash( $attrs['height'] ) );
		$server_post_new_url    = isset( $_SERVER['REQUEST_URI'] ) ? strpos( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'wp-admin/post-new.php' ) : false;
		$server_post_url        = isset( $_SERVER['REQUEST_URI'] ) ? strpos( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'wp-admin/post.php' ) : false;
		$server_pages_url       = isset( $_SERVER['REQUEST_URI'] ) ? strpos( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'wp-json/wp/v2/pages' ) : false;

		if ( ! ( false === $server_post_new_url ) || ! ( false === $server_post_url ) || ! ( false === $server_pages_url ) ) {
			ob_start();
		}

		if ( false === $server_post_new_url || ! ( false === $server_post_url ) || ! ( false === $server_pages_url ) ) {
			$content = $this->load_power_bi_content_js();
		}

		if ( ! ( false === $server_post_new_url ) || ! ( false === $server_post_url ) || ! ( false === $server_pages_url ) ) {
			ob_get_clean();
		}

		return $content;
	}

	/**
	 * Function handling the case when the user is not logged in.
	 *
	 * @return string
	 */
	public function mo_epbr_shortcode_user_not_logged_in_content() {
		$url                        = wpWrapper::mo_epbr_get_current_page_url();
		$current_wordpress_home_url = home_url();
		$loginpage                  = $current_wordpress_home_url . '/wp-admin';
		$content                    = '
        <div id="powerbi-embed-not-loggedin_user" style="width:' . esc_attr( $this->config['width'] ) . ';height:' . esc_attr( $this->config['height'] ) . ';display:flex;justify-content:center;flex-direction:column;align-items:center;color:#000;
        background-image:url(' . plugin_dir_url( MO_EPBR_PLUGIN_FILE ) . 'images/restrictedcontent-bg.png);background-size:cover;opacity:0.75;">          
        <span style="text-align:center;width:65%;display:inline-block;background:white;"> Please <a onclick="mo_epbr_azure_redirect()" style="color:blue;cursor:pointer;text-decoration:underline;">login</a> via Azure AD to view the Power BI content.</span>
        </div>
        <script>
        document.cookie = "rurlcookie=' . esc_url( $url ) . '; path=/";
        function mo_epbr_azure_redirect(){window.location.href="' . esc_url( $loginpage ) . '";}
        </script>';
		return $content;
	}

	/**
	 * Function call to get the report content.
	 *
	 * @return bool
	 */
	public function get_report_content() {
		$client_config = wpWrapper::mo_epbr_get_option( pluginConstants::APPLICATION_CONFIG_OPTION );
		$handler       = azure::get_client( $client_config );
		$handler->set_scope( pluginConstants::SCOPE_DEFAULT_OFFLINE_ACCESS );
		$access_token = $handler->mo_epbr_get_new_access_token();
		if ( $access_token ) {
			$this->config['access_token'] = $access_token;
			$report_details               = $this->get_report_details();
			if ( isset( $report_details['error'] ) ) {
				return false;
			}
			if ( isset( $report_details['datasetId'] ) || isset( $report_details['embedUrl'] ) ) {
				$this->config['datasetId'][0] = sanitize_text_field( wp_unslash( $report_details['datasetId'] ) );
				$this->config['embedUrl']     = sanitize_text_field( wp_unslash( $report_details['embedUrl'] ) );
				return $access_token;
			}
		}
		return false;
	}

	/**
	 * Function to get the report content.
	 *
	 * @return array
	 */
	public function get_report_details() {
		$reports_endpoint = self::$api_endpoint . $this->config['wid'] . '/reports/' . $this->config['rid'];
		$headers          = array(
			'Authorization' => 'Bearer ' . $this->config['access_token'],
			'Content-Type'  => 'application/json',
		);
		$handle           = Authorization::get_controller();
		$response         = $handle->mo_epbr_get_request( $reports_endpoint, $headers );
		if ( isset( $response['error'] ) ) {
			return false;  }
		return $response;
	}

	/**
	 * Function to load the power bi content or the js.
	 *
	 * @return string
	 */
	public function load_power_bi_content_js() {
		if ( ! is_user_logged_in() ) {
			$content = $this->mo_epbr_shortcode_user_not_logged_in_content();
			return $content;
		} elseif ( is_user_logged_in() ) {
			wp_enqueue_script( 'mo_epbr_powerbireport_js', esc_url( MO_EPBR_PLUGIN_URL . '/includes/js/powerbi_reports.js' ), array( 'jquery' ), MO_EPBR_PLUGIN_VERSION, false );
			$token_status = $this->get_report_content();
			if ( ! $token_status ) {
				$html = '<div id="powerbi-embed" style="width:' . esc_attr( $this->config['width'] ) . ';height:' . esc_attr( $this->config['height'] ) . ';display:flex;justify-content:center;flex-direction:column;align-items:center;color:#000;
            background-image:url(' . esc_url( plugin_dir_url( MO_EPBR_PLUGIN_FILE ) ) . 'images/restrictedcontent-bg.png);background-size:cover;
            ">          
            <div style="width:' . esc_attr( $this->config['width'] ) . ';height:' . esc_attr( $this->config['height'] ) . ';background-color:#3a3a3a;opacity:0.75;position:absolute"></div>
            <span style="font-size:1.2rem;text-align:center;color:#fff;font-weight:700;font-family:sans-serif;z-index:1">The Page is restricted for Premium Users only.</span>
            <span style="font-size:1.2rem;text-align:center;color:#fff;font-weight:700;font-family:sans-serif;z-index:1">Please upgrade to view the content.</span>
            <span style="margin:20px;z-index:1"><a class="restrictedcontent_anchor" style="height:30px;font-size:15px;display:flex;justify-content:center;align-items:center;text-transform:none;text-decoration:none;color:blue;background:white;padding:5px;cursor: pointer;" onclick="window.location.href=\'' . esc_url_raw( home_url() ) . '\'">Go back to site</a></span>
            </div>';
				return $html;
			} else {
				$embedurl     = isset( $this->config['embedUrl'] ) ? $this->config['embedUrl'] : '';
				$access_token = isset( $this->config['access_token'] ) ? $this->config['access_token'] : '';
				$filterpane   = wpWrapper::mo_epbr_get_option( 'mo_epbr_add_filters_pane' ) === '1' ? 'true' : 'false';
				$pagenav      = wpWrapper::mo_epbr_get_option( 'mo_epbr_add_page_navigation' ) === '1' ? 'true' : 'false';
				$lang         = ! empty( wpWrapper::mo_epbr_get_option( 'mo_epbr_selected_language_for_embed' ) ) ? wpWrapper::mo_epbr_get_option( 'mo_epbr_selected_language_for_embed' ) : 'en';
				$localelang   = ! empty( wpWrapper::mo_epbr_get_option( 'mo_epbr_selected_locale_language_for_embed' ) ) ? wpWrapper::mo_epbr_get_option( 'mo_epbr_selected_locale_language_for_embed' ) : 'en';
				if ( $lang ) {
					$embedurl = $embedurl . '&language=' . $lang;}
				if ( $localelang ) {
					$embedurl = $embedurl . '&formatLocale=' . $localelang;}
				$breakpoint    = ! empty( wpWrapper::mo_epbr_get_option( 'mo_epbr_mobile_display_breakpoint' ) ) ? wpWrapper::mo_epbr_get_option( 'mo_epbr_mobile_display_breakpoint' ) : 320;
				$mobile_height = ! empty( wpWrapper::mo_epbr_get_option( 'mo_epbr_embed_mobile_height' ) ) ? wpWrapper::mo_epbr_get_option( 'mo_epbr_embed_mobile_height' ) : '100px';
				$mobile_width  = ! empty( wpWrapper::mo_epbr_get_option( 'mo_epbr_embed_mobile_width' ) ) ? wpWrapper::mo_epbr_get_option( 'mo_epbr_embed_mobile_width' ) : '100%';
				$mode          = ! empty( wpWrapper::mo_epbr_get_option( 'mo_epbr_res_embed_mode' ) ) ? wpWrapper::mo_epbr_get_option( 'mo_epbr_res_embed_mode' ) : '';
				$datasetid     = ! empty( wpWrapper::mo_epbr_get_option( 'mo_epbr_dataset_id' ) ) ? wpWrapper::mo_epbr_get_option( 'mo_epbr_dataset_id' ) : '';
				$content       = '<div id="powerbi-embed' . esc_attr( $this->config['rid'] ) . '" style="width:' . esc_attr( $this->config['width'] ) . ';height:' . esc_attr( $this->config['height'] ) . ';">Loading Content...</div>
            <script>
            embedConfiguration = {
                type:"report",
                embedUrl: "' . esc_js( $embedurl ) . '",
                tokenType: window["powerbi-client"].models.TokenType.Aad,
                accessToken: "' . esc_js( $access_token ) . '",
                settings: {
                    filterPaneEnabled: ' . esc_js( $filterpane ) . ',
                        navContentPaneEnabled: ' . esc_js( $pagenav ) . ',
                        },
                    localeSettings: {
                    language: "' . esc_js( $lang ) . '",
                    formatLocale: "' . esc_js( $localelang ) . '",
                        }
            };
            switch("' . esc_js( $mode ) . '"){
                case "Edit": 
                            embedConfiguration.viewMode = window["powerbi-client"].models.ViewMode.Edit;
                            embedConfiguration.permissions = window["powerbi-client"].models.Permissions.All;
                            embedConfiguration.allowEdit = true;
                            break;
                case "Create": 
                            embedConfiguration.datasetId = "' . esc_js( $datasetid ) . '";
                            embedConfiguration.permissions = window["powerbi-client"].models.Permissions.All;
                            break;
            }

            if("Create" === "' . esc_js( $mode ) . '"){
                var report = powerbi.createReport(
                    document.getElementById("powerbi-embed' . esc_js( $this->config['rid'] ) . '"),embedConfiguration 
                );
            }
            else{
            var report = powerbi.embed(
                document.getElementById("powerbi-embed' . esc_js( $this->config['rid'] ) . '"),embedConfiguration 
            );}

            var container = document.getElementById("powerbi-embed' . esc_html( $this->config['rid'] ) . '");
            if("' . esc_js( $breakpoint ) . '" !== "" && window.outerWidth <= ' . esc_js( $breakpoint ) . '){
                container.style.width = "' . esc_js( $mobile_width ) . '";
                container.style.height="' . esc_js( $mobile_height ) . '";
                window.report.on("rendered", function(e){
                    let pages = report.getPages().then(pages => {
                        if(pages.length && ' . esc_js( $pagenav ) . '){
                            let pagesHTML = "";
                            for(let page in pages){
                                pagesHTML += pages[page].isActive ? `<li class=active>pages[page].displayName</li>` : `<li onclick=\'window.report.setPage(pages[page].name)\'>pages[page].displayName</li>`; 
                            }
                            let mobileNav = `
                                <style>
                                    .powerbi_page_nav {
                                        list-style:none; 
                                        cursor:pointer;
                                        padding: 0;
                                    }
                                    .powerbi_page_nav li {
                                        text-align:center;
                                        padding:15px 0;
                                        width:100%;
                                        border-bottom:1px solid;
                                        background-color: #f3f2f1;
                                        font-size: 16px;
                                    }
                                    .powerbi_page_nav li.active {
                                        background-color:#fff;
                                        border-bottom: 4px solid #f2c811;
                                    }
                                </style>
                                <ul class="powerbi_page_nav">
                                    ${pagesHTML}
                                </ul>    
                            `;
                            let mobileNavE = $(".powerbi_page_nav");
                            if (mobileNavE.length){
                                mobileNavE.html(mobileNav);
                            } else {
                                container.after(mobileNav);
                            }
                            
                        }
                    });
                });
                const newSettings = {
                    layoutType: window["powerbi-client"].models.LayoutType.MobileLandscape
                };
                report.updateSettings(newSettings);
            }
            </script> 
            ';
				return $content;
			}
		}
	}
}
