<?php
/**
 * The PointsRewardsIntegration class.
 *
 * @link       https://appcheap.io
 * @since      4.2.0
 * @author     ngocdt
 * @package    AppBuilder
 */

namespace AppBuilder\Di\Service\Integration;

defined( 'ABSPATH' ) || exit;

use WP_Error;
use WP_REST_Server;
use WP_REST_Response;

/**
 * PointsRewardsIntegration Class.
 */
class PointsRewardsIntegration implements IntegrationInterface {
	use IntegrationTraits;

	/**
	 * Integrations infomation.
	 *
	 * @var string $identifier infomation.
	 */
	public static $infomation = array(
		'identifier'    => 'PointsRewards',
		'title'         => 'WooCommerce Points and Rewards',
		'description'   => 'Reward your customers for purchases and other actions with points which can be redeemed for discounts.',
        'icon'          => 'https://woocommerce.com/wp-content/uploads/2013/06/Points_and_Rewards_icon-marketplace-160x160-1.png',
		'url'           => 'https://woocommerce.com/products/woocommerce-points-and-rewards/',
		'author'        => 'Woo',
		'documentation' => 'https://appcheap.io/docs/mdelicious-documents/features/points-and-rewards/',
		'category'      => 'cart, product',
	);

	/**
	 * Register hooks.
	 */
	public function register_hooks() {
		add_action( 'rest_api_init', array( $this, 'rest_api_init' ) );
	}

	/**
	 * Rest API Init (Any filter or action that needs to be added to the REST API should be added here)
	 */
	public function rest_api_init() {
		// The TranslatePress plugin is not active, do nothing.
		if ( ! class_exists( 'WooCommerce', false ) ) {
			return;
		}
		
		$namespace = 'app-builder/v1';
		$route     = 'points-and-rewards';

		register_rest_route( $namespace, $route, [
			[
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'app_builder_points_rewards_my_points'),
				'permission_callback' => '__return_true',
			],
		] );

		add_filter( 'app_builder_prepare_product_object', array( $this, 'app_builder_woocommerce_points_and_rewards_addons_prepare_product_object' ), 999, 3 );
	}
	
	function app_builder_woocommerce_points_and_rewards_addons_prepare_product_object( $data, $post, $request ) {
	
		if ( ! isset( $data['id'] ) ) {
			return $data;
		}
	
		if ( ! class_exists( '\YITH_WC_Points_Rewards_Frontend' ) ) {
			return $data;
		}
	
		$afc_fields = $data['afc_fields'] ?? [];
		$message    = do_shortcode( '[yith_points_product_message product_id="' . $data['id'] . '"]' );
	
		$afc_fields['yith_points_product_message'] = [
			"key"    => uniqid(),
			"label"  => "points",
			"name"   => "points",
			"prefix" => "acf",
			"type"   => "html",
			"value"  => $message,
			"_name"  => "points",
			"_valid" => 1
		];
	
		$data['afc_fields'] = $afc_fields;
	
		if ( isset( $data['acf'] ) ) {
			$data['acf']['points'] = $message;
		} else {
			$data['acf'] = [ 'points' => $message ];
		}
	
		return $data;
	}

	function app_builder_points_rewards_my_points( $request ) {

		if ( ! class_exists( '\WC_Points_Rewards_Manager' ) ) {
			return new WP_Error(
				'exist_discount',
				__( "Plugin not installed.", "app_builder" )
			);
		}
	
		if ( get_current_user_id() == 0 ) {
			return new WP_Error(
				'user_logged',
				__( "User logout.", "app_builder" )
			);
		}
	
		$page     = $request->get_param( 'page' );
		$per_page = $request->get_param( 'per_page' );
	
		global $wc_points_rewards;
	
		$points_balance = \WC_Points_Rewards_Manager::get_users_points( get_current_user_id() );
		$points_label   = $wc_points_rewards->get_points_label( $points_balance );
	
		$count        = empty( $per_page ) ? 5 : absint( $per_page );
		$current_page = empty( $page ) ? 1 : absint( $page );
	
		// get a set of points events, ordered newest to oldest
		$args = array(
			'calc_found_rows' => true,
			'orderby'         => array(
				'field' => 'date',
				'order' => 'DESC',
			),
			'per_page'        => $count,
			'paged'           => $current_page,
			'user'            => get_current_user_id(),
		);
	
		$events     = \WC_Points_Rewards_Points_Log::get_points_log_entries( $args );
		$total_rows = \WC_Points_Rewards_Points_Log::$found_rows;
	
		return new WP_REST_Response(
			[
				'points_balance' => $points_balance,
				'points_label'   => $points_label,
				'events'         => $events,
				'total_rows'     => $total_rows,
				'current_page'   => $current_page,
				'count'          => $count,
			]
		);
	}
}
