<?php
/**
 * Automation Admin Init
 *
 * @package momoacg
 */
class MoMo_ACGWC_Automation_Admin {
	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'momo_add_submenu_to_momoacgwc', array( $this, 'momo_add_submenu_of_automation' ), 16 );
		add_action( 'admin_enqueue_scripts', array( $this, 'momoacgwc_automation_print_admin_ss' ) );

		add_action( 'wp_ajax_momoacgwc_automation_addedit', array( $this, 'momoacgwc_automation_addedit' ) );
		add_action( 'wp_ajax_momoacgwc_automation_load_workflows_list', array( $this, 'momoacgwc_automation_load_workflows_list' ) );
		add_action( 'wp_ajax_momoacgwc_automation_toggle_status', array( $this, 'momoacgwc_automation_toggle_status' ) );
		add_action( 'wp_ajax_momoacgwc_automation_edit_form', array( $this, 'momoacgwc_automation_edit_form' ) );
		add_action( 'wp_ajax_momoacgwc_automation_delete_automation', array( $this, 'momoacgwc_automation_delete_automation' ) );
	}
	/**
	 * AJAX handler for loading the automation edit form
	 *
	 * @return void
	 */
	public function momoacgwc_automation_delete_automation() {
		global $momoacgwc;
		$res = check_ajax_referer( 'momoacgwc_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momoacgwc_automation_delete_automation' !== $_POST['action'] ) {
			return;
		}
		$workflow_id = isset( $_POST['workflow_id'] ) ? sanitize_text_field( wp_unslash( $_POST['workflow_id'] ) ) : '';
		wp_delete_post( $workflow_id );
		$response = array(
			'status'  => 'good',
			'message' => esc_html__( 'Workflow deleted successfully', 'momoacgwc' ),
		);
		echo wp_json_encode( $response );
		exit;
	}
	/**
	 * AJAX handler for loading the automation edit form
	 *
	 * @return void
	 */
	public function momoacgwc_automation_edit_form() {
		global $momoacgwc;
		$res = check_ajax_referer( 'momoacgwc_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momoacgwc_automation_edit_form' !== $_POST['action'] ) {
			return;
		}
		$workflow_id = isset( $_POST['workflow_id'] ) ? sanitize_text_field( wp_unslash( $_POST['workflow_id'] ) ) : '';
		$type        = isset( $_POST['type'] ) ? sanitize_text_field( wp_unslash( $_POST['type'] ) ) : 'new';
		$meta_data   = get_post_meta( $workflow_id, '', true );
		ob_start();
		$post_id = $workflow_id;
		include_once $momoacgwc->plugin_path . 'automation/admin/pages/momoacgwc-automation-form.php';
		$contents = ob_get_clean();
		$response = array(
			'status'  => 'good',
			'content' => $contents,
			'title'   => esc_html__( 'Edit', 'momoacgwc' ),
			'message' => esc_html__( 'Edit form generated successfully', 'momoacgwc' ),
		);
		echo wp_json_encode( $response );
		exit;
	}
	/**
	 * Change Workflow Status
	 *
	 * @return void
	 */
	public function momoacgwc_automation_toggle_status() {
		$res = check_ajax_referer( 'momoacgwc_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momoacgwc_automation_toggle_status' !== $_POST['action'] ) {
			return;
		}
		$workflow_id = isset( $_POST['workflow_id'] ) ? sanitize_text_field( wp_unslash( $_POST['workflow_id'] ) ) : '';
		$status      = isset( $_POST['status'] ) ? sanitize_text_field( wp_unslash( $_POST['status'] ) ) : 'on';
		if ( empty( $workflow_id ) ) {
			return;
		}
		if ( 'off' === $status ) {
			$new_status = 'on';
			$btn        = esc_html__( 'On', 'momoacgwc' );
		} else {
			$new_status = 'off';
			$btn        = esc_html__( 'Off', 'momoacgwc' );
		}
		update_post_meta( $workflow_id, 'workflow_status', $new_status );
		$response = array(
			'status'     => 'good',
			'new_status' => $new_status,
			'text'       => $btn,
		);
		echo wp_json_encode( $response );
		exit;
	}
	/**
	 * Add/Edit automation
	 *
	 * @since 1.2.6
	 *
	 * @return void
	 */
	public function momoacgwc_automation_addedit() {
		$res = check_ajax_referer( 'momoacgwc_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momoacgwc_automation_addedit' !== $_POST['action'] ) {
			return;
		}
		$meta_data  = array();
		$post_title = isset( $_POST['post_title'] ) ? sanitize_text_field( wp_unslash( $_POST['post_title'] ) ) : '';
		$content    = isset( $_POST['content'] ) ? wpautop( wp_unslash( $_POST['content'] ) ) : '';

		$meta_data['to']             = isset( $_POST['to'] ) ? sanitize_text_field( wp_unslash( $_POST['to'] ) ) : '';
		$meta_data['from']           = isset( $_POST['from'] ) ? sanitize_text_field( wp_unslash( $_POST['from'] ) ) : '';
		$meta_data['reply_to']       = isset( $_POST['reply_to'] ) ? sanitize_text_field( wp_unslash( $_POST['reply_to'] ) ) : '';
		$meta_data['reply_to_name']  = isset( $_POST['reply_to_name'] ) ? sanitize_text_field( wp_unslash( $_POST['reply_to_name'] ) ) : '';
		$meta_data['reply_to_email'] = isset( $_POST['reply_to_email'] ) ? sanitize_text_field( wp_unslash( $_POST['reply_to_email'] ) ) : '';
		$meta_data['subject']        = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : '';
		$meta_data['heading']        = isset( $_POST['heading'] ) ? sanitize_text_field( wp_unslash( $_POST['heading'] ) ) : '';
		$meta_data['preheader']      = isset( $_POST['preheader'] ) ? sanitize_text_field( wp_unslash( $_POST['preheader'] ) ) : '';
		$meta_data['event']          = isset( $_POST['event'] ) ? sanitize_text_field( wp_unslash( $_POST['event'] ) ) : '';
		$meta_data['event_action']   = isset( $_POST['event_action'] ) ? sanitize_text_field( wp_unslash( $_POST['event_action'] ) ) : '';
		$type                        = isset( $_POST['type'] ) ? sanitize_text_field( wp_unslash( $_POST['type'] ) ) : 'new';
		$post_id                     = isset( $_POST['workflow_id'] ) ? sanitize_text_field( wp_unslash( $_POST['workflow_id'] ) ) : 0;

		$is_new = 0 === (int) $post_id;

		$post_data = array(
			'post_title'   => $post_title,
			'post_type'    => 'momoacgwc_automation',
			'post_status'  => 'publish',
			'post_content' => $content,
		);

		if ( $is_new ) {
			$post_id                      = wp_insert_post( $post_data );
			$meta_data['workflow_status'] = 'off';
		} else {
			$post_data['ID'] = $post_id;
			wp_update_post( $post_data );
		}
		if ( $post_id ) {
			foreach ( $meta_data as $key => $value ) {
				update_post_meta( $post_id, $key, $value );
			}
		}
		$response = array(
			'status'  => 'good',
			'message' => $is_new ? 'Automation created successfully' : 'Automation updated successfully',
		);
		echo wp_json_encode( $response );
		exit;
	}
	/**
	 * AJAX handler for loading the automation workflows list
	 *
	 * @since 1.2.6
	 *
	 * @return void
	 */
	public function momoacgwc_automation_load_workflows_list() {
		$res = check_ajax_referer( 'momoacgwc_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momoacgwc_automation_load_workflows_list' !== $_POST['action'] ) {
			return;
		}
		$args = array(
			'post_type'      => 'momoacgwc_automation',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
		);
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			ob_start();
			?>
			<table class="wp-list-table widefat fixed striped momo-acgwc-automation-list">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Title', 'momoacgwc' ); ?></th>
						<th><?php esc_html_e( 'Published Date', 'momoacgwc' ); ?></th>
						<th><?php esc_html_e( 'Status', 'momoacgwc' ); ?></th>
						<th><?php esc_html_e( 'Action', 'momoacgwc' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();
						$post_id = get_the_ID();
						$status  = get_post_meta( $post_id, 'workflow_status', true );
						if ( empty( $status ) ) {
							$status = 'off';
						}
						?>
						<tr>
							<td><?php the_title(); ?></td>
							<td><?php echo get_the_date( 'Y-m-d' ); ?></td>
							<td style="text-align: center;">
								<button class="momo-workflow-toggle-status" data-id="<?php echo esc_attr( $post_id ); ?>" data-status="<?php echo esc_attr( $status ); ?>">
									<?php echo ucfirst( $status ); ?>
								</button>
							</td>
							<td>
								<a href="#" class="edit-automation momoacgwc-automation-ed-btn" data-id="<?php echo esc_attr( $post_id ); ?>"><?php esc_html_e( 'Edit', 'momoacgwc' ); ?></a>
								<a href="#" class="delete-automation momoacgwc-automation-ed-btn" data-id="<?php echo esc_attr( $post_id ); ?>"><?php esc_html_e( 'Delete', 'momoacgwc' ); ?></a>
							</td>
						</tr>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</tbody>
			</table>
			<?php
		} else {
			?>
			<p><?php esc_html_e( 'No workflows found.', 'momoacgwc' ); ?></p>
			<?php
		}
		$contents = ob_get_clean();
		$html     = wp_kses_post( $contents );
		$response = array(
			'status'  => 'good',
			'content' => $html,
		);
		echo wp_json_encode( $response );
		exit;
	}
	/**
	 * Adds Submenu
	 */
	public function momo_add_submenu_of_automation() {
		global $momoacgwc;
		add_submenu_page(
			'momoacgwc',
			esc_html__( 'WooAI Automation', 'momoacgwc' ),
			'Automation',
			'manage_options',
			'momoacgwc-automation',
			array( $this, 'wooai_automation_add_admin_settings_page' )
		);
	}
	/**
	 * Settings Page
	 */
	public function wooai_automation_add_admin_settings_page() {
		global $momoacgwc;
		include_once $momoacgwc->plugin_path . 'automation/admin/pages/momo-acgwc-automation-settings.php';
	}
	/**
	 * Enqueue script and styles
	 */
	public function momoacgwc_automation_print_admin_ss() {
		$current_screen = get_current_screen();
		if ( isset( $current_screen->base ) && 'woo-ai_page_momoacgwc-automation' === $current_screen->base ) {
			global $momoacgwc;

			$momo_acgwc_insights_settings = get_option( 'momo_acgwc_insights_settings' );

			wp_enqueue_style( 'momoacgwc_automation_style', $momoacgwc->plugin_url . 'automation/assets/momoacgwc-automation.css', array(), $momoacgwc->version );
			wp_register_script( 'momoacgwc_automation_admin', $momoacgwc->plugin_url . 'automation/assets/momoacgwc-automation.js', array( 'jquery' ), $momoacgwc->version, true );
			wp_enqueue_script( 'momoacgwc_automation_admin' );
			$ajaxurl = array(
				'ajaxurl'              => admin_url( 'admin-ajax.php' ),
				'momoacgwc_ajax_nonce' => wp_create_nonce( 'momoacgwc_security_key' ),
				'creating_post'        => esc_html__( 'Adding / Updating Automation', 'momoacgwc' ),
				'empty_field'          => esc_html__( 'Empty required field(s)', 'momoacgwc' ),
				'generating'           => esc_html__( 'Generating Workflow', 'momoacgwc' ),
				'delete'               => esc_html__( 'Deleting Workflow', 'momoacgwc' ),
			);
			wp_localize_script( 'momoacgwc_automation_admin', 'momoacgwc_automation_admin', $ajaxurl );
		}
	}
}
new MoMo_ACGWC_Automation_Admin();
