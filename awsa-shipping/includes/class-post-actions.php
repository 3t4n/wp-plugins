<?php
/**
 * Class AWSA_Order
 *
 * @package           AWSA_IR_Post
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.4.0
 */
/*
	template/admin-order-actions-meta-box.php
	awsa-order-actions.js // awsa-form.js
	css
	.aw-notice
*/

/**
 * Class AWSA_Post_Actions
 * awsa-order-actions.php
 */
class AWSA_Post_Actions {
	/**
	 * Post Type
	 *
	 * @var string
	 */
	public $post_type;

	/**
	 * Constructor
	 *
	 * @param string $post_type
	 * @param string $info_title
	 * @param string $action_title
	 */
	public function __construct( $post_type ) {
		$this->post_type = $post_type;
	}

	/**
	 * Register modules
	 *
	 * @return void
	 */
	public function register_modules() {
		$modules = apply_filters( 'awsa_post_actions_modules_' . $this->post_type, array() );
		foreach ( $modules as $classname ) {
			add_filter( "awsa_{$this->post_type}_actions", $classname . '::get_actions', 15, 2 );
			add_filter( "awsa_{$this->post_type}_action_can", $classname . '::can_run_action', 15, 3 );
			add_action( "awsa_{$this->post_type}_action_html_properties", $classname . '::actions_properties', 15, 3 );
			add_filter( "awsa_{$this->post_type}_actions_ajax_process", $classname . '::ajax_process', 15, 4 );
			add_action( "awsa_{$this->post_type}_info_meta_box", $classname . '::info_meta_box', 15 );
		}
	}

	/**
	 * Enqueue Styles and Scripts
	 *
	 * @return void
	 */
	public function enqueue() {
		wp_register_script( 'awsa-form-script', AWSA_SHIPPING_PU_JS . 'awsa-form.js', array( 'jquery' ), '1.0.0', true );

		wp_register_script( 'awsa-post-actions-script', AWSA_SHIPPING_PU_JS . 'awsa-post-actions.js', array( 'jquery', 'awsa-form-script' ), '1.0.0', true );
		wp_localize_script(
			'awsa-post-actions-script',
			'awsa_script_data',
			array(
				'awsa_ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);
	}

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 10 );
		add_action( 'wp_ajax_aw-admin-actions-ajax-process', array( $this, 'actions_ajax_process' ) );
	}

	/**
	 * Add Meta Boxes
	 *
	 * @return void
	 */
	public function add_meta_boxes() {
		$info_title   = __( 'Details', 'awsa-shipping' );
		$action_title = __( 'Operations', 'awsa-shipping' );
		add_meta_box( 'awsa-post-info-box', $info_title, array( $this, 'info_meta_box' ), $this->post_type, 'side', 'core' );
		add_meta_box( 'awsa-post-actions-box', $action_title, array( $this, 'actions_meta_box' ), $this->post_type, 'side', 'core' );
	}

	/**
	 * Get Children of Post
	 *
	 * @param int $post_id
	 * @return array
	 */
	public function _get_children( $post_id ) {
		switch ( $this->post_type ) {
			case 'product':
				$product      = wc_get_product( $post_id );
				$children_ids = (array) $product->get_children();
				$children     = array();
				foreach ( $children_ids as $id ) {
					$children[] = get_post( $id );
				}
				return $children;
			break;
			default:
				return get_children(
					array(
						'post_parent' => $post_id,
						'post_type'   => $this->post_type,
					)
				);
			break;
		}
	}

	/**
	 * Meta Box Info
	 *
	 * @param WP_Post $post
	 * @return void
	 */
	public function info_meta_box( $post ) {
		$this->register_modules();

		$post_id  = is_a( $post, 'WP_Post' ) ? $post->ID : $post;
		$children = $this->_get_children( $post_id );

		if ( ! empty( $children ) ) {
			foreach ( $children as $child ) {
				$child_id = $child->ID;
				echo '<div id="awsa-info" class="awsa-info">';
					$this->get_child_info( $child );
					do_action( 'awsa_' . $this->post_type . '_info_meta_box', $child_id );
				echo '</div>';
			}
		} else {
			echo '<div id="awsa-info" class="awsa-info">';
				do_action( 'awsa_' . $this->post_type . '_info_meta_box', $post_id );
			echo '</div>';
		}
	}

	/**
	 * Meta Box Actions
	 *
	 * @param WP_Post|int $post
	 * @return void
	 */
	public function actions_meta_box( $post ) {
		$this->enqueue();
		$this->register_modules();

		$post_id   = is_a( $post, 'WP_Post' ) ? $post->ID : $post;
		$post_type = $this->post_type;

		$children = $this->_get_children( $post_id );

		if ( ! empty( $children ) ) {
			foreach ( $children as $child ) {
				$post_id = is_a( $child, 'WP_Post' ) ? $child->ID : $child;
				$this->get_child_info( $child );

				include AWSA_SHIPPING_TEMPLATES . 'admin-post-actions-meta-box.php';
			}
		} else {
			include AWSA_SHIPPING_TEMPLATES . 'admin-post-actions-meta-box.php';
		}
	}

	/**
	 * Actions Ajax Process
	 *
	 * @return void
	 */
	public function actions_ajax_process() {
		$this->register_modules();

		$action  = sanitize_text_field( $_POST['post_action'] );
		$data    = wp_unslash( $_POST['data'] );
		$post_id = sanitize_text_field( $data['post_id'] );
		$nonce   = $data['nonce'];

		if ( ! wp_verify_nonce( $nonce, 'awsa-' . $this->post_type . '-actions-ajax-' . date( 'd' ) . $post_id ) ) {
			return false;
		}
		$r['success'] = false;
		$can          = apply_filters( 'awsa_' . $this->post_type . '_action_can', false, $action, $post_id );

		if ( true === $can ) {
			$r = apply_filters( 'awsa_' . $this->post_type . '_actions_ajax_process', $r, $action, $data, $post_id );

			if ( $r['success'] == false && ( empty( $r['error_messages'] ) && empty( $r['error_codes'] ) ) ) {
				$r['error_messages']['error'] = __( 'The operation failed', 'awsa-shipping' );
			}
		} else {
			if ( is_a( $can, 'awsa_error' ) ) {
				$r['error_messages'][ $can->get_code() ] = $can->get_message();
			} else {
				$r['error_messages']['error'] = __( 'Operation not possible.', 'awsa-shipping' );
			}
		}

		wp_send_json( $r );
	}

	/**
	 * Get Child Info
	 *
	 * @param WP_Post $child
	 * @return void
	 */
	public function get_child_info( &$child ) {
		echo '<strong>#' . esc_html( $child->ID ) . '</strong>';

		do_action( 'awsa_' . $this->post_type . '_actions_meta_box_child_info', $child->ID, $child );
	}
}
