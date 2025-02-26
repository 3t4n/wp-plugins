<?php

/**
 * Plugin Name: wp360.pro Duplicate Post Meta
 * Author: Sebastian Pisula
 * Author URI: http://wp360.pro
 * Version: 0.0.2
 * Description: Plugin allows to duplicate post meta between posts types
 * Text Domain:  wp360pro-dpm
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class wp360_Duplicate_Post_Meta {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'post_submitbox_minor_actions', array( $this, 'post_submitbox_minor_actions' ) );
		add_action( 'admin_notices', array( $this, 'admin_notices' ) );
		add_action( 'admin_post_wp360.pro_duplicate_posts', array( $this, 'duplicate_posts' ) );
	}

	public function admin_notices() {
		if ( isset( $_GET['info'] ) && isset( $_GET['type'] ) && in_array( $_GET['type'],
				array( 'success', 'error' ) )
		) {
			echo '<div class="notice notice-' . esc_attr( $_GET['type'] ) . '"><p>' . esc_html( $_GET['info'] ) . '</p></div>';
		}
	}

	public function admin_menu() {
		add_submenu_page(
			null,
			'',
			'',
			'manage_options',
			'wp360.pro-duplicate-post-meta',
			array( $this, 'duplicate_post_meta_page' )
		);
	}

	public function duplicate_posts() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'Sorry, you are not allowed to do that.' ) );
		}

		check_admin_referer( 'wp360.pro-duplicate-post-meta' );

		$post_id      = isset( $_POST['post_id'] ) ? (int) $_POST['post_id'] : false;
		$from_post_id = isset( $_POST['from_post_id'] ) ? (int) $_POST['from_post_id'] : false;

		if ( ! $post_id || ! get_post( $post_id ) || ! $from_post_id || ! get_post( $from_post_id ) ) {
			wp_die( __( 'Posts not exists', 'wp360pro-dpm' ) );
		}

		if ( isset( $_POST['post_meta_name'] ) && ! empty( $_POST['post_meta_name'] ) ) {

			foreach ( $_POST['post_meta_name'] AS $key ) {
				$value = get_post_meta( $from_post_id, $key, 1 );
				update_post_meta( $post_id, $key, $value );


				if ( $_value = get_post_meta( $from_post_id, '_' . $key, 1 ) ) {
					update_post_meta( $post_id, '_' . $key, $_value );
				}
			}

			$type = 'success';
			$info = __( 'Selected post meta was copied', 'wp360pro-dpm' );
		} else {
			$type = 'error';
			$info = __( 'Post meta not exists', 'wp360pro-dpm' );
		}

		$url = add_query_arg(
			array(
				'post'   => $post_id,
				'action' => 'edit',
				'type'   => $type,
				'info'   => urlencode( $info )
			), admin_url( 'post.php' ) );

		wp_redirect( $url );
		die();
	}

	public function duplicate_post_meta_page() {
		echo '<div class="wrap">';
		echo '<h1>' . __( 'Duplicate post meta', 'wp360pro-dpm' ) . '</h1>';

		$page         = isset( $_GET['page'] ) ? $_GET['page'] : '';
		$post_id      = isset( $_GET['post_id'] ) ? (int) $_GET['post_id'] : 0;
		$from_post_id = isset( $_POST['from_post_id'] ) ? (int) $_POST['from_post_id'] : 0;
		$post_types   = get_post_types( array( 'show_ui' => true ) );

		if ( ! $post_id || ! get_post( $post_id ) || ! in_array( get_post_type( $post_id ), $post_types ) ) {
			echo '<div class="notice notice-error"><p>' . __( 'Sorry, you are not allowed to edit posts in this post type.' ) . '</p></div>';
		} elseif ( $post_id && ! $from_post_id ) {
			$posts = new WP_Query(
				array(
					'post_type'        => get_post_type( $post_id ),
					'posts_per_page'   => - 1,
					'post__not_in'     => array( $post_id ),
					'suppress_filters' => 1,
					'order'            => 'ASC',
					'orderby'          => 'post_title',
				)
			);

			if ( $posts->have_posts() ) {

				echo '<form action=\'\' method=\'post\'>';
				echo '<input type="hidden" name="page" value="' . esc_attr( $page ) . '"/>';
				echo '<input type="hidden" name="post_id" value="' . esc_attr( $post_id ) . '"/>';

				if ( $from_post_id ) {
					echo '<input type="hidden" name="from_post_id" value="' . esc_attr( $from_post_id ) . '"/>';
				}

				echo '<p><label>' . __( 'Select source post',
						'wp360pro-dpm' ) . '</label><br><select name="from_post_id">';

				while ( $posts->have_posts() ) {
					$posts->the_post();
					echo '<option value="' . get_the_ID() . '">' . esc_html( get_the_title() ) . '</option>';
				}

				echo '</select></p>';

				submit_button( 'Next >>' );

				echo '</form>';
			} else {
				echo '<p>' . __( 'Posts not found', 'wp360pro-dpm' ) . '</p>';

				echo '<a href="' . esc_url( get_edit_post_link( $_GET['post_id'] ) ) . '" class="button button-primary">' . __( '<< Back',
						'wp360pro-dpm' ) . '</a>';
			}

		} elseif ( isset( $_POST['from_post_id'] ) ) {

			echo '<form action=\'' . admin_url( 'admin-post.php' ) . '\' method=\'post\'>';
			echo '<input type="hidden" name="action" value="wp360.pro_duplicate_posts"/>';
			wp_nonce_field( 'wp360.pro-duplicate-post-meta' );
			echo '<input type="hidden" name="page" value="' . esc_attr( $page ) . '"/>';
			echo '<input type="hidden" name="post_id" value="' . esc_attr( $post_id ) . '"/>';

			if ( $from_post_id ) {
				echo '<input type="hidden" name="from_post_id" value="' . esc_attr( $from_post_id ) . '"/>';
			}

			$post_meta = get_post_custom_keys( $from_post_id );

			if ( ! empty( $post_meta ) ) {
				echo '<p><label>' . __( 'Select post meta to copy', 'wp360pro-dpm' ) . '</label><br>';
				foreach ( $post_meta AS $key ) {
					echo '<label><input type="checkbox" name="post_meta_name[]" value="' . esc_attr( $key ) . '"/> ' . esc_html( trim( $key ) ) . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br />';
				}
				echo '</p>';

				submit_button(
					sprintf(
						__( 'Copy from %s to %s', 'wp360pro-dpm' ),
						esc_html( get_post_field( 'post_title', $from_post_id ) ),
						esc_html( get_post_field( 'post_title', $post_id ) )
					)
				);
			} else {
				echo '<p>' . __( 'Posts Meta not found', 'wp360pro-dpm' ) . '</p>';

				echo '<a href="' . esc_url( wp_get_referer() ) . '" class="button button-primary">' . __( '<< Back',
						'wp360pro-dpm' ) . '</a>';
			}

			echo '</form>';
		}

		echo '</div>';
	}

	/**
	 * Add button
	 */
	public function post_submitbox_minor_actions() {

		$args = array(
			'post_id' => get_the_ID(),
			'page'    => 'wp360.pro-duplicate-post-meta',
		);
		$url  = add_query_arg( $args, admin_url( 'admin.php' ) );

		echo '<div style="overflow: hidden;clear: both;padding-top: 5px;"><a class="button button-secondary" href="' . $url . '" id="post-preview">' . __( 'Duplicate post meta',
				'wp360pro-dpm' ) . '</a></div>';
	}
}

new wp360_Duplicate_Post_Meta;