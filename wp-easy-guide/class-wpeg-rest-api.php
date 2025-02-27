<?php
/**
 * WordPress EasyGuide Main Class
 *
 * @package WPEG_Admin
 * @since 1.0.0
 */

/**
 * WPEG Main Class
 */
class WPEG_REST_API {
	/**
	 * API Version.
	 *
	 * @var string
	 */
	private static $version = 'v1';

	/**
	 * API Namespace.
	 *
	 * @var string
	 */
	private static $namespace = 'wpeg';

	/**
	 * API Routes.
	 *
	 * @var array
	 */
	private static $routes = array(
		// Create guide.
		array(
			'path'     => '/guide',
			'methods'  => WP_REST_Server::CREATABLE,
			'callback' => 'create_guide_callback',
		),

		// Update guide by id.
		array(
			'path'     => '/guide/(?P<id>[\d]+)',
			'methods'  => WP_REST_Server::EDITABLE,
			'callback' => 'update_guide_callback',
		),

		// Delete guide by id.
		array(
			'path'     => '/guide/(?P<id>[\d]+)',
			'methods'  => WP_REST_Server::DELETABLE,
			'callback' => 'delete_guide_callback',
		),

		// Get guide list.
		array(
			'path'     => '/list',
			'methods'  => WP_REST_Server::READABLE,
			'callback' => 'list_guide_callback',
		),

		// Get guide list by ID.
		array(
			'path'     => '/list/(?P<id>[\d]+)',
			'methods'  => WP_REST_Server::READABLE,
			'callback' => 'list_guide_callback',
		),

		// Create step by guide id.
		array(
			'path'     => '/create_step',
			'methods'  => WP_REST_Server::CREATABLE,
			'callback' => 'create_step_callback',
		),

		// Update step by step id.
		array(
			'path'     => '/update_step/(?P<id>[\d]+)',
			'methods'  => WP_REST_Server::EDITABLE,
			'callback' => 'update_step_callback',
		),

		// Delete step by id.
		array(
			'path'     => '/delete_step/(?P<id>[\d]+)',
			'methods'  => WP_REST_Server::DELETABLE,
			'callback' => 'delete_step_callback',
		),

		// Get all step list.
		array(
			'path'     => '/list_step',
			'methods'  => WP_REST_Server::READABLE,
			'callback' => 'list_step_callback',
		),

		// Get step list by guide_id.
		array(
			'path'     => '/list_step/(?P<id>[\d]+)',
			'methods'  => WP_REST_Server::READABLE,
			'callback' => 'list_step_callback',
		),

		// Reordering step.
		array(
			'path'     => '/reorder_step',
			'methods'  => WP_REST_Server::EDITABLE,
			'callback' => 'reorder_step_callback',
		),

		// Import.
		array(
			'path'     => '/import',
			'methods'  => WP_REST_Server::CREATABLE,
			'callback' => 'import_callback',
		),
	);

	/**
	 * Register and initialize Rest Routes.
	 *
	 * @return void
	 */
	public static function init() {
		foreach ( self::$routes as $route ) {
			register_rest_route(
				self::$namespace . '/' . self::$version, $route['path'], array(
					array(
						'methods'  => $route['methods'],
						'callback' => array( 'WPEG_REST_API', $route['callback'] ),
					),
				)
			);
		}
	}

	/**
	 * Create guide.
	 *
	 * @param Request $request WordPress REST API Request.
	 * @return mixed
	 */
	public static function create_guide_callback( $request ) {
		global $wpdb;

		$wpdb->insert(
			$wpdb->prefix . WPEG::$guide_table,
			array(
				'title'       => $request->get_param( 'title' ),
				'description' => $request->get_param( 'description' ),
			),
			array(
				'%s',
				'%s',
			)
		);

		$response = array(
			'status' => 200,
			'id'     => $wpdb->insert_id,
		);

		return rest_ensure_response( $response );
	}

	/**
	 * Update Guide
	 *
	 * @param Request $request WordPress REST API Request.
	 * @return mixed
	 */
	public static function update_guide_callback( $request ) {
		global $wpdb;

		$id = intval( $request['id'] );

		if ( isset( $id ) ) {
			$field       = array();
			$field_types = array();

			$title = $request->get_param( 'title' );
			if ( $title ) {
				$field['title'] = $title;
				array_push( $field_types, '%s' );
			}

			$description = $request->get_param( 'description' );
			if ( $description ) {
				$field['description'] = $description;
				array_push( $field_types, '%s' );
			}

			$active = $request->get_param( 'active' );
			if ( isset( $active ) ) {
				$field['active'] = intval( $active );
				array_push( $field_types, '%d' );
			}

			$wpdb->update(
				$wpdb->prefix . WPEG::$guide_table,
				$field,
				array(
					'ID' => $id,
				),
				$field_types,
				array( '%d' )
			);
		}

		return rest_ensure_response(
			array(
				'status' => 200,
			)
		);
	}

	/**
	 * Delete callback with given ID.
	 *
	 * @param Request $request WordPress REST API Request.
	 * @return mixed
	 */
	public static function delete_guide_callback( $request ) {
		global $wpdb;

		$id = intval( $request['id'] );

		if ( isset( $id ) ) {
			$wpdb->delete(
				$wpdb->prefix . WPEG::$guide_table, array(
					'ID' => $id,
				), array( '%d' )
			);
			$wpdb->delete(
				$wpdb->prefix . WPEG::$step_table, array(
					'guide_id' => $id,
				), array( '%d' )
			);
		}

		return rest_ensure_response(
			array(
				'status' => 200,
			)
		);
	}

	/**
	 * /list Callback.
	 *
	 * @param array $request Get params.
	 * @return array
	 */
	public static function list_guide_callback( $request ) {
		global $wpdb;

		if ( isset( $request['id'] ) ) {
			$id     = intval( $request['id'] );
			$result = $wpdb->get_row( 'SELECT * FROM ' . $wpdb->prefix . WPEG::$guide_table . ' WHERE ID=' . $id, ARRAY_A );// WPCS: unprepared SQL OK.

			if ( ! empty( $result ) ) {
				$result_steps    = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . WPEG::$step_table . ' WHERE guide_id=' . $id . ' ORDER BY `order` ASC', ARRAY_A );// WPCS: unprepared SQL OK.
				$result['steps'] = $result_steps;
			}
		} else {
			$result = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . WPEG::$guide_table, ARRAY_A );// WPCS: unprepared SQL OK.
		}

		return rest_ensure_response( $result );
	}

	/**
	 * Create Step by Guide id
	 *
	 * @param Request $request WordPress REST API Request.
	 * @return mixed
	 */
	public static function create_step_callback( $request ) {
		global $wpdb;

		$id = intval( $request->get_param( 'guide_id' ) );

		$response = new WP_Error( 'error', __( 'An error occurred when creating new step', 'wpeg' ) );

		if ( isset( $id ) ) {
			$field       = array();
			$field_types = array();

			$field['guide_id'] = $id;
			array_push( $field_types, '%d' );

			$title = $request->get_param( 'title' );
			if ( $title ) {
				$field['title'] = $title;
				array_push( $field_types, '%s' );
			}

			$description = $request->get_param( 'description' );
			if ( $description ) {
				$field['description'] = $description;
				array_push( $field_types, '%s' );
			}

			$action = $request->get_param( 'action' );
			if ( $action ) {
				$field['action'] = $action;
				array_push( $field_types, '%s' );
			}

			$type = $request->get_param( 'type' );
			if ( $type ) {
				$field['type'] = $type;
				array_push( $field_types, '%s' );
			}

			$selector = $request->get_param( 'selector' );
			if ( isset( $selector ) && ! empty( $selector ) ) {
				$field['selector'] = $selector;
				array_push( $field_types, '%s' );
			}

			$uri = $request->get_param( 'uri' );
			if ( isset( $uri ) && ! empty( $uri ) ) {
				$field['uri'] = $uri;
				array_push( $field_types, '%s' );
			}

			$neworder = $wpdb->get_results( 'SELECT IFNULL(MAX(`order`),0) + 1 AS neworder FROM ' . $wpdb->prefix . WPEG::$step_table . ' WHERE guide_id=' . $id, ARRAY_A );// WPCS: unprepared SQL OK.
			if ( ! empty( $neworder ) ) {
				$field['order'] = $neworder[0]['neworder'];
				array_push( $field_types, '%d' );
			}

			$wpdb->insert(
				$wpdb->prefix . WPEG::$step_table,
				$field,
				$field_types
			);

			$response = array(
				'status' => 200,
				'id'     => $wpdb->insert_id,
			);
		}

		return rest_ensure_response( $response );
	}

	/**
	 * Update Step
	 *
	 * @param Request $request WordPress REST API Request.
	 * @return mixed
	 */
	public static function update_step_callback( $request ) {
		global $wpdb;

		$id = intval( $request['id'] );

		if ( isset( $id ) ) {
			$field       = array();
			$field_types = array();

			$title = $request->get_param( 'title' );
			if ( $title ) {
				$field['title'] = $title;
				array_push( $field_types, '%s' );
			}

			$description = $request->get_param( 'description' );
			if ( $description ) {
				$field['description'] = $description;
				array_push( $field_types, '%s' );
			}

			$action = $request->get_param( 'action' );
			if ( $action ) {
				$field['action'] = $action;
				array_push( $field_types, '%s' );
			}

			$type = $request->get_param( 'type' );
			if ( $type ) {
				$field['type'] = $type;
				array_push( $field_types, '%s' );
			}

			$selector = $request->get_param( 'selector' );
			if ( isset( $selector ) ) {
				$field['selector'] = $selector;
				array_push( $field_types, '%s' );
			}

			$uri          = $request->get_param( 'uri' );
			$field['uri'] = $uri;
			array_push( $field_types, '%s' );

			$wpdb->update(
				$wpdb->prefix . WPEG::$step_table,
				$field,
				array(
					'ID' => $id,
				),
				$field_types,
				array( '%d' )
			);
		}

		return rest_ensure_response(
			array(
				'status' => 200,
			)
		);
	}

	/**
	 * Delete Step callback with given ID.
	 *
	 * @param Request $request WordPress REST API Request.
	 * @return mixed
	 */
	public static function delete_step_callback( $request ) {
		global $wpdb;

		$id = intval( $request['id'] );

		if ( isset( $id ) ) {
			$wpdb->delete(
				$wpdb->prefix . WPEG::$step_table, array(
					'ID' => $id,
				), array( '%d' )
			);
		}

		return rest_ensure_response(
			array(
				'status' => 200,
			)
		);
	}

	/**
	 * /list step Callback.
	 *
	 * @param array $request Get params.
	 * @return array
	 */
	public static function list_step_callback( $request ) {
		global $wpdb;

		if ( isset( $request['id'] ) ) {
			$id     = intval( $request['id'] );
			$result = $wpdb->get_results( 'SELECT * FROM `' . $wpdb->prefix . WPEG::$step_table . '` WHERE `guide_id`=' . $id . ' ORDER BY `guide_id` DESC, `order` ASC', ARRAY_A );// WPCS: unprepared SQL OK.
		} else {
			$result = $wpdb->get_results( 'SELECT * FROM `' . $wpdb->prefix . WPEG::$step_table . '` ORDER BY `guide_id` DESC, `order` ASC', ARRAY_A );// WPCS: unprepared SQL OK.
		}

		return rest_ensure_response( $result );
	}

	/**
	 * Reorder Step
	 *
	 * @param Request $request WordPress REST API Request.
	 * @return mixed
	 */
	public static function reorder_step_callback( $request ) {
		global $wpdb;

		$from_id = $request->get_param( 'from_id' );
		$to_id   = $request->get_param( 'to_id' );

		if ( $from_id && $to_id ) {
			$from_order = $wpdb->get_row( 'SELECT `order` FROM ' . $wpdb->prefix . WPEG::$step_table . ' WHERE `ID`=' . $from_id, ARRAY_A );// WPCS: unprepared SQL OK.
			$to_order   = $wpdb->get_row( 'SELECT `order`, `guide_id` FROM ' . $wpdb->prefix . WPEG::$step_table . ' WHERE `ID`=' . $to_id, ARRAY_A );// WPCS: unprepared SQL OK.

			if ( ! empty( $from_order ) && ! empty( $to_order ) ) {
				$guide_id    = $to_order['guide_id'];
				$operation   = ( $from_order['order'] > $to_order['order'] ) ? '+ 1' : '- 1';
				$comparator1 = ( $from_order['order'] > $to_order['order'] ) ? '< ' . $from_order['order'] : '> ' . $from_order['order'];
				$comparator2 = ( $from_order['order'] > $to_order['order'] ) ? '>= ' . $to_order['order'] : '<= ' . $to_order['order'];

				$reorder_sql = sprintf(
					'UPDATE `%s` SET `order` = `order` %s WHERE `guide_id`= %s AND `order` %s AND `order` %s', $wpdb->prefix . WPEG::$step_table,
					$operation,
					$guide_id,
					$comparator1,
					$comparator2
				);

				$wpdb->query( $reorder_sql );// WPCS: unprepared SQL OK.

				$to_order_val = intval( $to_order['order'] );
				$wpdb->update(
					$wpdb->prefix . WPEG::$step_table,
					array(
						'order' => $to_order_val,
					),
					array(
						'ID' => $from_id,
					),
					array( '%d' ),
					array( '%d' )
				);
			}
		}

		return rest_ensure_response(
			array(
				'status' => 200,
			)
		);
	}

	/**
	 * Import file
	 *
	 * @param Request $request WordPress REST API Request.
	 * @return mixed
	 */
	public static function import_callback( $request ) {
		global $wpdb;
		$post_data = $request->get_params();

		$response = new WP_Error( 400, __( 'An error occurred when creating new step', 'wpeg' ) );

		try {
			foreach ( $post_data as $guide ) {
				$create_guide = $wpdb->insert(
					$wpdb->prefix . WPEG::$guide_table,
					array(
						'title'       => $guide['title'],
						'description' => $guide['description'],
						'active'      => $guide['active'],
					),
					array(
						'%s',
						'%s',
						'%d',
					)
				);

				if ( $create_guide && $guide['steps'] && count( $guide['steps'] ) > 0 ) {
					$guide_id = $wpdb->insert_id;

					foreach ( $guide['steps'] as $step ) {
						$field       = array();
						$field_types = array();

						$field['guide_id'] = $guide_id;
						array_push( $field_types, '%d' );

						$title = $step['title'];
						if ( $title ) {
							$field['title'] = $title;
							array_push( $field_types, '%s' );
						}

						$description = $step['description'];
						if ( $description ) {
							$field['description'] = $description;
							array_push( $field_types, '%s' );
						}

						$action = $step['action'];
						if ( $action ) {
							$field['action'] = $action;
							array_push( $field_types, '%s' );
						}

						$type = $step['type'];
						if ( $type ) {
							$field['type'] = $type;
							array_push( $field_types, '%s' );
						}

						$selector = $step['selector'];
						if ( isset( $selector ) ) {
							$field['selector'] = $selector;
							array_push( $field_types, '%s' );
						}

						$uri = $step['uri'];
						if ( isset( $uri ) ) {
							$field['uri'] = str_replace( $guide['siteOrigin'], site_url(), $uri );
							array_push( $field_types, '%s' );
						}

						$order = $step['order'];
						if ( isset( $order ) ) {
							$field['order'] = $order;
							array_push( $field_types, '%s' );
						}

						$wpdb->insert(
							$wpdb->prefix . WPEG::$step_table,
							$field,
							$field_types
						);
					}
				}

				$response = array(
					'status'  => 200,
					'message' => __( 'Import success', 'wpeg' ),
				);
			}
		} catch ( Exception $e ) {
			$response = array(
				'status'  => 403,
				'message' => $e->getMessage(),
			);
		}

		return rest_ensure_response( $response );
	}
}
