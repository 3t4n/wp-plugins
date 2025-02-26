<?php

namespace AWSA_Core\Post_Actions;

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
class Post_Actions {

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
	 */
	public function __construct( string $post_type ) {

		$this->post_type = $post_type;
	}

	/**
	 * Add Meta Box Post Actions
	 *
	 * @param string $post_type
	 *
	 * @since 1.0.0
	 * @return void
	 *
	 */
	public static function add_for_post_type( string $post_type ): void {

		$awsa_post_actions = new self( $post_type );
		$awsa_post_actions->init();
	}

	/**
	 * Register modules
	 *
	 * @return void
	 */
	public function register_modules(): void {

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
	public function enqueue(): void {

		$js_url = defined( "AWSA_CORE_PU_JS" ) ? AWSA_CORE_PU_JS : plugin_dir_url( __FILE__ );
		wp_register_script(
			'awsa-form-script',
			$js_url . 'awsa-form.js',
			array( 'jquery' ),
			'1.0.0',
			true
		);

		wp_register_script(
			'awsa-post-actions-script',
			plugin_dir_url( __FILE__ ) . 'awsa-post-actions.js',
			array(
				'jquery',
				'awsa-form-script',
			),
			'1.0.0',
			true
		);

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
	public function init(): void {

		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 10 );
		add_action( 'wp_ajax_aw-admin-actions-ajax-process', array( $this, 'actions_ajax_process' ) );
	}

	/**
	 * Add Meta Boxes
	 *
	 * @return void
	 */
	public function add_meta_boxes(): void {

		$info_title   = __( 'Details', 'awsa-shipping' );
		$action_title = __( 'Operations', 'awsa-shipping' );
		add_meta_box(
			'awsa-post-info-box',
			$info_title,
			array(
				$this,
				'info_meta_box',
			),
			$this->post_type,
			'side',
			'core'
		);
		add_meta_box(
			'awsa-post-actions-box',
			$action_title,
			array(
				$this,
				'actions_meta_box',
			),
			$this->post_type,
			'side',
			'core'
		);
	}

	/**
	 * Get Children of Post
	 *
	 * @param int $post_id
	 *
	 * @return array
	 */
	public function _get_children( $post_id ): array {

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
	 * @param \WP_Post $post
	 *
	 * @return void
	 */
	public function info_meta_box( $post ): void {

		$this->register_modules();

		$post_id  = is_a( $post, 'WP_Post' ) ? $post->ID : $post;
		$children = $this->_get_children( $post_id );

		if ( !empty( $children ) ) {
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
	 * @param \WP_Post|int $post
	 *
	 * @return void
	 */
	public function actions_meta_box( $post ): void {

		$this->enqueue();
		$this->register_modules();

		$post_id   = is_a( $post, 'WP_Post' ) ? $post->ID : $post;
		$post_type = $this->post_type;

		$children = $this->_get_children( $post_id );

		if ( !empty( $children ) ) {
			foreach ( $children as $child ) {
				$post_id = is_a( $child, 'WP_Post' ) ? $child->ID : $child;
				$this->get_child_info( $child );

				include __DIR__ . '/template-admin-post-actions-meta-box.php';
			}
		} else {
			include __DIR__ . '/template-admin-post-actions-meta-box.php';
		}
	}

	/**
	 * Actions Ajax Process
	 *
	 * @return void
	 */
	public function actions_ajax_process(): void {

		$this->register_modules();
		$action  = sanitize_text_field( $_POST['post_action'] );
		$data    = wp_unslash( $_POST['data'] );
		$post_id = sanitize_text_field( $data['post_id'] );
		$nonce   = $data['nonce'];

		if ( !wp_verify_nonce( $nonce, 'awsa-' . $this->post_type . '-actions-ajax-' . date( 'd' ) . $post_id ) ) {
			return;
		}
		$r['success'] = false;
		$can          = apply_filters( 'awsa_' . $this->post_type . '_action_can', false, $action, $post_id );

		if ( true === $can ) {

			$r = apply_filters( 'awsa_' . $this->post_type . '_actions_ajax_process', $r, $action, $data, $post_id );

			if ( false === $r['success'] && ( empty( $r['error_messages'] ) && empty( $r['error_codes'] ) ) ) {
				$r['error_messages']['error'] = __( 'The operation failed', 'awsa-shipping' );
			}
		} elseif ( is_a( $can, 'AWSA_Error' ) ) {

			$r['error_messages'][ $can->get_code() ] = $can->get_message();
		} else {

			$r['error_messages']['error'] = __( 'Operation not possible.', 'awsa-shipping' );
		}

		wp_send_json( $r );
	}

	/**
	 * Get Child Info
	 *
	 * @param \WP_Post $child
	 *
	 * @return void
	 */
	public function get_child_info( &$child ): void {

		echo '<strong>#' . esc_html( $child->ID ) . '</strong>';

		do_action( 'awsa_' . $this->post_type . '_actions_meta_box_child_info', $child->ID, $child );
	}

}
