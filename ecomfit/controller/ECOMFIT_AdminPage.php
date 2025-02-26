<?php
/**
 * Admin page setup
 *
 * @since      1.0
 * @author     Ecomfit
 */

require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'model/ECOMFIT_Install.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'model/ECOMFIT_Product.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'model/ECOMFIT_Order.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'lib/ECOMFIT_SaveFile.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'lib/ECOMFIT_ApiCommon.php' );


class ECOMFIT_AdminPage {
	var $ecomfit_login_page_url;
	var $ecomfit_manager_page_url;

	public function __construct() {
		$this->ecomfit_hooks();
		$this->ecomfit_login_page_url   = admin_url( '/admin.php?page=ecomfit_login_page' );
		$this->ecomfit_manager_page_url = admin_url( '/admin.php?page=ecomfit_manager_page' );
	}

	public function ecomfit_hooks() {
		add_action( 'admin_menu', array( $this, 'ecomfit_app_menu' ), 200 );
		// change status of a product
		add_action( 'save_post', array( $this, 'ecomfit_save_post' ), 10, 4 );
		add_action( 'delete_post', array( $this, 'ecomfit_delete_product_variation' ), 10, 6 );
		add_action( 'woocommerce_save_product_variation', array( $this, 'ecomfit_save_product_variation' ), 10, 5 );
	}

	public function ecomfit_app_menu() {
		// this is the main item for the menu
		add_menu_page( 'Ecomfit',            // page title
			'Ecomfit',                          // menu title
			'manage_options',               // capabilities
			'ecomfit_login_page',                   // menu slug
			array( $this, 'ecomfit_login_page' ),
			plugins_url( 'view/img/ecomfit-logo.jpg', ECOMFIT_WOOCOMMERCE_PLUGIN_DIRNAME )
		);

		// this is a submenu
		add_submenu_page( '',            // parent slug
			'Manager Page',                    // page title
			'Manager Page',                    // menu title
			'manage_options',               // capability
			'ecomfit_manager_page',                 // menu slug
			array( $this, 'ecomfit_manager_page' ) );  // function
	}

	public function ecomfit_save_post( $post_id, $post, $update ) {
		$webId = get_option( ECOMFIT_WEB_ID );
		if ( $webId && get_option( ECOMFIT_TOKEN ) ) {
			if ( $this->ecomfit_is_product( $post ) ) {
				$product_id = wp_get_post_parent_id( $post_id );
				$product    = array();
				if ( $product_id == 0 ) {
					$product = ECOMFIT_Product::ecomfit_get_product_change( $post_id );
				} else {
					$product = ECOMFIT_Product::ecomfit_get_product_change( $product_id );
				}
				if ( $product ) {
					$body = array(
						'webId'   => $webId,
						'msg'     => '',
						'version' => get_option( ECOMFIT_VERSION ),
						'product' => $product
					);
					$url  = '';
					if ( $product['status'] == 'publish' ) {
						$url         = '/wordpress/save_product';
						$body['msg'] = 'created or updated product';
					} else if ( $product['status'] == 'trash' ) {
						$url         = '/wordpress/delete_product';
						$body['msg'] = 'deleted product';
					}
					ECOMFIT_ApiCommon::post( $url, $body );
				}
			} else if ( $this->ecomfit_is_order( $post ) ) {
				$order = ECOMFIT_Order::ecomfit_get_order( $post_id );
				if ( $order ) {
					$body = array(
						'webId'   => $webId,
						'msg'     => '',
						'version' => get_option( ECOMFIT_VERSION ),
						'order'   => $order
					);
					$url  = '';
					// Order status starting with Pending and ending with Completed.
					if ( $post->post_status != 'trash' && $post->post_status != 'wc-pending') {
						$url         = '/wordpress/save_order';
						$body['msg'] = 'created or updated order';
					} else if ( $post->post_status == 'trash' ) {
						$url         = '/wordpress/delete_order';
						$body['msg'] = 'deleted order';
					}
					if ( $url ) {
						ECOMFIT_ApiCommon::post( $url, $body );
					}
				}
			}
		}
	}

	public function ecomfit_save_product_variation( $variation_id, $i ) {
		$webId = get_option( ECOMFIT_WEB_ID );
		if ( $webId && get_option( ECOMFIT_TOKEN ) ) {
			$product_id = wp_get_post_parent_id( $variation_id );
			$product    = array();
			if ( $product_id == 0 ) {
				$product = ECOMFIT_Product::ecomfit_get_product_change( $variation_id );
			} else {
				$product = ECOMFIT_Product::ecomfit_get_product_change( $product_id );
			}

			if ( $product ) {
				$body = array(
					'webId'   => $webId,
					'msg'     => 'updated product',
					'version' => get_option( ECOMFIT_VERSION ),
					'product' => $product
				);
				$url  = '/wordpress/update_product';
				ECOMFIT_ApiCommon::post( $url, $body );
			}
		}
	}

	public function ecomfit_delete_product_variation( $variation_id ) {
		$webId = get_option( ECOMFIT_WEB_ID );
		if ( $webId && get_option( ECOMFIT_TOKEN ) ) {
			$product = ECOMFIT_Product::ecomfit_get_product_change( $variation_id );
			if ( $product ) {
				$body = array(
					'webId'   => $webId,
					'msg'     => 'delete product variation',
					'version' => get_option( ECOMFIT_VERSION ),
					'product' => $product
				);
				$url  = '/wordpress/delete_product';
				ECOMFIT_ApiCommon::post( $url, $body );
			}
		}
	}

	public function ecomfit_redirect_to_login_page() {
		if ( ECOMFIT_ACTIVE_PLUGIN == get_option( ECOMFIT_LOGIN_CURRENT_STATUS ) ) {
			update_option( ECOMFIT_LOGIN_CURRENT_STATUS, ECOMFIT_LOGOUT, true );
			wp_redirect( $this->ecomfit_login_page_url );
			exit;
		}
	}

	public function ecomfit_link_sync_product() {
		if ( 0 == get_option( ECOMFIT_LINK_SYNC_PRODUCT ) ) {
			$webId = get_option( ECOMFIT_WEB_ID );
			if ( $webId && get_option( ECOMFIT_TOKEN ) ) {
				$linkSyncProduct = get_home_url() . '/?rest_route=/ecomfit/product';
				$url             = '/wordpress/link_sync_product';
				$body            = array(
					'webId'           => $webId,
					'msg'             => 'link sync product',
					'version'         => get_option( ECOMFIT_VERSION ),
					'linkSyncProduct' => $linkSyncProduct
				);
				$result          = ECOMFIT_ApiCommon::post( $url, $body );
				if ( $result && $result->status ) {
					update_option( ECOMFIT_LINK_SYNC_PRODUCT, 1, true );
				}
			}
		}
	}

	public function ecomfit_get_api_token( $webId, $token, $meteorToken ) {
		$url    = '/wordpress/getApiToken';
		$body   = array(
			'webId'       => $webId,
			'token'       => $token,
			'rootUrl'     => get_home_url(),
			'meteorToken' => $meteorToken
		);
		$result = ECOMFIT_ApiCommon::post( $url, $body );

		return $result;
	}

	public function ecomfit_login_page() {
		 // If woocommerce is active
		if (ECOMFIT_ApiCommon::isWooCommerceActive()) {
			update_option( ECOMFIT_STATUS_WOOCOMMERCE, ECOMFIT_ACTIVE_WOOCOMMERCE, true);
			if ( ECOMFIT_LOGIN_SUCCESS == get_option( ECOMFIT_LOGIN_CURRENT_STATUS ) ) {
				echo "redirect to manager";
				wp_redirect( $this->ecomfit_manager_page_url );
				exit;
			}
		} else {
			$wooCommercePluginUrl = ECOMFIT_ApiCommon::getWooCommercePluginUrl();
			update_option( ECOMFIT_STATUS_WOOCOMMERCE, ECOMFIT_DEACTIVE_WOOCOMMERCE, true);
		}
		$status = 0;
		if ( isset( $_POST["webId"] ) && $_POST["webId"] && isset( $_POST["token"] ) && $_POST["token"]
			 && isset( $_POST["meteorToken"] ) && $_POST["meteorToken"] ) {
			$webId             = sanitize_text_field( $_POST["webId"] );
			$token             = sanitize_text_field( $_POST["token"] );
			$meteorToken       = sanitize_text_field( $_POST["meteorToken"] );
			$resultGetApiToken = $this->ecomfit_get_api_token( $webId, $token, $meteorToken );
			if ( $resultGetApiToken && $resultGetApiToken->status ) {
				update_option( ECOMFIT_LOGIN_CURRENT_STATUS, ECOMFIT_LOGIN_SUCCESS, true );
				update_option( ECOMFIT_WEB_ID, $webId, true );
				update_option( ECOMFIT_TOKEN, $resultGetApiToken->data->token, true );
				wp_redirect( $this->ecomfit_manager_page_url );
				exit();
			} else {
				update_option( ECOMFIT_LOGIN_CURRENT_STATUS, ECOMFIT_LOGIN_FAIL, true );
				$status = 1;
			}
		} else if ( $_POST ) {
			update_option( ECOMFIT_LOGIN_CURRENT_STATUS, ECOMFIT_LOGIN_FAIL, true );
			$status = 1;
		}
		include( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'view/templates/ecomfit-login.php' );
		if ( $status == 1 ) {
			?>
			<script type="text/javascript">
				alert("Connect to server NOT Success.\n Please to Let Connect Again!");
			</script>
			<?php
		}
	}

	public function ecomfit_manager_page() {
		if ( ECOMFIT_LOGIN_SUCCESS != get_option( ECOMFIT_LOGIN_CURRENT_STATUS) ) {
			wp_redirect( $this->ecomfit_login_page_url );
			exit;
		}
		include( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'view/templates/ecomfit-manager.php' );
		$this->ecomfit_link_sync_product();
	}

	protected function ecomfit_is_product( $post ) {
		return ( $post->post_type == 'product_variation' ) || ( $post->post_type == 'product' );
	}

	protected function ecomfit_is_order( $post ) {
		return ( $post->post_type == 'shop_order' );
	}
}
