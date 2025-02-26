<?php
/**
 * Cutom Post Type Email Templates
 *
 * @package momoacg
 */
class MoMo_ACGWC_Email_Templates {
	/**
	 * Constructor to initialize hooks and actions.
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'register_cpt' ], 15 );
		add_action( 'admin_menu', array( $this, 'add_cpt_to_custom_settings_submenu' ), 15 );
		add_action( 'admin_head', array( $this, 'custom_submenu_styling' ), 10 );


		add_action( 'init', [ $this, 'register_meta_fields' ] );
		add_action( 'wp_ajax_momoacgwc_save_email_template', array( $this, 'momoacgwc_save_email_template' ) );
		add_action( 'wp_ajax_momoacgwc_open_email_template', array( $this, 'momoacgwc_open_email_template' ) );
	}

	/**
	 * Open an email template.
	 */
	public function momoacgwc_open_email_template() {
		$res = check_ajax_referer( 'momoacg_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momoacgwc_open_email_template' !== $_POST['action'] ) {
			return;
		}
		$template_id = $_POST['id'];
		$post = get_post( $template_id );

		if ( $post ) {
			$title = $post->post_title; // Get the post title
			$content = $post->post_content; // Get the post content
			echo wp_json_encode(
				array(
					'status'  => 'good',
					'title'   => $title,
					'content' => $content,
					'message' => esc_html__( 'Template retrieved successfully.', 'momoacgwc' ),
				)
			);
			exit;
		} else {
			echo wp_json_encode(
				array(
					'status'  => 'bad',
					'message' => esc_html__( 'Post no Found', 'momoacgwc' ),
				)
			);
			exit;
		}
	}
	/**
	 * Handles the AJAX request to save an email template.
	 */
	public function momoacgwc_save_email_template() {
		$res = check_ajax_referer( 'momoacg_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momoacgwc_save_email_template' !== $_POST['action'] ) {
			return;
		}
		if ( ! isset( $_POST['title'], $_POST['content'] ) ) {
			echo wp_json_encode(
				array(
					'status'  => 'bad',
					'message' => esc_html__( 'Invalid Data Provided', 'momoacgwc' ),
				)
			);
			exit;
		}
	
		$template_name = sanitize_text_field( $_POST['title'] );
		$template_content = $_POST['content'];
		$template_id = $_POST['id'];
		if ( empty( $template_name ) ) {
			echo wp_json_encode(
				array(
					'status'  => 'bad',
					'message' => esc_html__( 'Template name is required', 'momoacgwc' ),
				)
			);
			exit;
		}
		if ( ! empty( $template_id ) ) {
			$template_id = wp_insert_post( [
				'ID'           => $template_id,
				'post_title'   => $template_name,
				'post_content' => $template_content,
				'post_status'  => 'publish',
				'post_type'    => 'momo_email_template',
			] );
		} else {
			$template_id = wp_insert_post( [
				'post_title'   => $template_name,
				'post_content' => $template_content,
				'post_status'  => 'publish',
				'post_type'    => 'momo_email_template',
			] );
		}
		
	
		if ( is_wp_error( $template_id ) ) {
			echo wp_json_encode(
				array(
					'status'  => 'bad',
					'message' => esc_html__( 'Failed to save the template.', 'momoacgwc' ),
				)
			);
			exit;
		}
	
		echo wp_json_encode(
			array(
				'status'      => 'good',
				'message'     => $message,
				'template_id' => $template_id,
			)
		);
		exit;
	}
	/**
	 * Register the Email Templates Custom Post Type.
	 */
	public function register_cpt() {
		$args = [
			'label'           => esc_html__( 'Email Templates', 'momoacgwc' ),
			'public'          => true,
			'show_in_menu'    => false,
			'show_ui'         => true,
			'capability_type' => 'post',
			'supports'        => array( 'title', 'editor' ),
			'menu_icon'       => 'dashicons-email-alt',
			'show_in_rest'    => true,
		];

		register_post_type( 'momo_email_template', $args );
	}
	public function add_cpt_to_custom_settings_submenu() {
		add_submenu_page(
			'momoacgwc', // Parent slug (your settings page)
			__( 'Email Templates', 'momoacgwc' ), // Page title
			__( 'Email Templates', 'momoacgwc' ), // Menu title
			'manage_options', // Capability
			'edit.php?post_type=momo_email_template' // URL for the CPT
		);
	}
	public function custom_submenu_styling() {
		?>
		<style>
			/* Example CSS to indent submenu items */
			.toplevel_page_momoacgwc .wp-submenu li a[href="edit.php?post_type=momo_email_template"] {
				padding-left: 30px!important; /* Indent submenu */
			}
		</style>
		<?php
	}
	
	/**
	 * Register custom meta fields for additional data.
	 */
	public function register_meta_fields() {
		$meta_fields = [
			'_momo_open_rate' => [
				'type'         => 'number',
				'single'       => true,
				'description'  => 'Open rate for the email',
				'show_in_rest' => true,
			],
			'_momo_click_rate' => [
				'type'         => 'number',
				'single'       => true,
				'description'  => 'Click rate for the email',
				'show_in_rest' => true,
			],
		];

		foreach ( $meta_fields as $key => $args ) {
			register_post_meta( 'momo_email_template', $key, $args );
		}
	}

	/**
	 * Save an email template.
	 *
	 * @param string $template_name Name of the template.
	 * @param string $content       Content of the template.
	 * @return int|WP_Error The ID of the inserted post, or WP_Error on failure.
	 */
	public function save_template( $template_name, $content ) {
		$template_id = wp_insert_post( [
			'post_title'   => sanitize_text_field( $template_name ),
			'post_content' => wp_kses_post( $content ),
			'post_type'    => 'momo_email_template',
			'post_status'  => 'publish',
		] );

		return $template_id;
	}

	/**
	 * Retrieve all email templates.
	 *
	 * @return array List of WP_Post objects representing the templates.
	 */
	public function get_templates() {
		$args = [
			'post_type'      => 'momo_email_template',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'date',
			'order'          => 'DESC',
		];

		return get_posts( $args );
	}

	/**
	 * Update meta information for a specific template.
	 *
	 * @param int    $template_id Post ID of the template.
	 * @param string $meta_key    Meta key to update.
	 * @param mixed  $value       Value to set.
	 */
	public function update_meta( $template_id, $meta_key, $value ) {
		update_post_meta( $template_id, $meta_key, $value );
	}

	/**
	 * Render a dropdown of saved templates.
	 */
	public function render_template_dropdown() {
		$templates = $this->get_templates();

		echo '<select name="email_template_select" id="email_template_select">';
		echo '<option>' . esc_html__( 'Select Template', 'momoacgwc' ) . '</option>';
		foreach ( $templates as $template ) {
			echo '<option value="' . esc_attr( $template->ID ) . '">' . esc_html( $template->post_title ) . '</option>';
		}
		echo '</select>';
	}
}
