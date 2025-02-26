<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Automizely Feed Actions
 */
class Automizely_Feed_Actions {



	/**
	 * Instance of this class.
	 *
	 * @var object Class Instance
	 */
	private static $instance;

	/**
	 * Get the class instance
	 *
	 * @return Automizely_Feed_Actions
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Add 'modified_after' and 'modified_before' for data query
	 *
	 * @param  array           $args
	 * @param  WP_REST_Request $request
	 * @return array
	 */
    public function add_query( array $args, $request ) {
		$modified_after  = $request->get_param( 'modified_after' );
		$modified_before = $request->get_param( 'modified_before' );
		if ( ! $modified_after || ! $modified_before ) {
			return $args;
		};
		$args['date_query'][] = array(
			'column' => 'post_modified',
			'after'  => $modified_after,
			'before' => $modified_before,
		);
		return $args;
	}

	/**
	 * Add 'modified' to orderby enum
	 *
	 * @param array $params
	 */
	public function add_collection_params( $params ) {
		$enums = $params['orderby']['enum'];
		if ( ! in_array( 'modified', $enums ) ) {
			$params['orderby']['enum'][] = 'modified';
		}
		return $params;
	}

	/**
	 * Add 'modified_after' and 'modified_before' for data query
	 *
	 * @param  array           $args
	 * @param  WP_REST_Request $request
	 * @return array
	 */
	public function add_customer_query( array $args, $request ) {
		$order           = $request->get_param( 'order' );
		$modified_after  = $request->get_param( 'modified_after' );
		$modified_before = $request->get_param( 'modified_before' );
		if ( ! $modified_after || ! $modified_before ) {
			return $args;
		};
		// @notice may overwrite other service's query
		$args['meta_query'] = array(
			'modified' => array(
				'key'     => 'last_update',
				'value'   => array( strtotime( $modified_after ), strtotime( $modified_before ) ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
			),
		);
		$args['orderby']    = array(
			'modified' => $order ? $order : 'DESC',
		);
		return $args;
	}
	/**
	 * @param $comment
	 * @param $request
	 * @return void
	 */
	public function woocommerce_rest_insert_order_note($comment, $request) {
		try {
			$order_id = $request['order_id'];
			$order_notes = $this->get_order_notes($order_id);
			$order = new WC_Order( $order_id );
			$order->update_meta_data( '_aftership_order_notes', $order_notes );
			$order->save_meta_data();
		}catch ( Exception $e) {
			return;
		}
	}

	/**
	 * @param $comment_id
	 * @param $order_id
	 * @return void
	 */
	function woocommerce_order_note_added( $comment_id, $order)
	{
		try {
			$order_id = $order->get_id();
			$order_notes = $this->get_order_notes($order_id);
			$order->update_meta_data( '_aftership_order_notes', $order_notes );
			$order->save_meta_data();
		}catch ( Exception $e) {
			return;
		}
	}
	/**
	 * Get Order Notes
	 *
	 * @param  $order_id string
	 * @return array
	 */
	private function get_order_notes( $order_id ) {
		$args = array(
			'post_id' => $order_id,
			'approve' => 'approve',
			'type'    => 'order_note',
		);

		remove_filter( 'comments_clauses', array( 'WC_Comments', 'exclude_order_comments' ), 10, 1 );
		$notes = get_comments( $args );
		add_filter( 'comments_clauses', array( 'WC_Comments', 'exclude_order_comments' ), 10, 1 );

		$order_notes = array();

		foreach ( $notes as $note ) {
			$order_notes[] = [
				"author" => $note->comment_author,
				"date_created_gmt" => $note->comment_date_gmt,
				"note" => $note->comment_content,
				'customer_note'    => (bool) get_comment_meta( $note->comment_ID, 'is_customer_note', true ),
			];
		}

		return $order_notes;
	}
}
