<?php 
/**
 * AI Header Footer CPT Class
 *
 * @since 1.0.0
 */
final class AIEA_Header_Footer_CPT {

	private static $_instance = null;
		 
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {
				
		//create post type
		add_action( 'init', [ $this, 'header_footer_post_type' ], 10 );
		
		//admin menu
		add_action( 'admin_menu', [ $this, 'register_admin_menu' ], 50 );
		
		//add metabox
		add_action( 'add_meta_boxes', [ $this, 'aiea_hf_register_metabox' ] );
		
		//save meta
		add_action( 'save_post', [ $this, 'aiea_hf_save_meta' ] );

	}

	public function aiea_hf_register_metabox() {
		add_meta_box(
			'ai-hf-meta-box',
			__( 'AI Header & Footer Builder Options', 'ai-addons' ),
			[
				$this,
				'ifh_metabox_render',
			],
			'ai-hf',
			'normal',
			'high'
		);
	}
	
	/**
	 * Render Meta field.
	 *
	 * @param  POST $post Currennt post object which is being displayed.
	 */
	function ifh_metabox_render( $post ) {
		$values            = get_post_custom( $post->ID );
		$template_type     = isset( $values['aiea_hf_template_type'] ) ? esc_attr( $values['aiea_hf_template_type'][0] ) : '';
		
		$canvas_enable = get_post_meta( $post->ID, 'aiea_hf_canvas_enable', true );

		// We'll use this nonce field later on when saving.
		wp_nonce_field( 'aiea_hf_meta_nounce', 'aiea_hf_meta_nounce' );
		?>
		<table class="ai-hf-options-table widefat">
			<tbody>
				<tr class="ai-hf-options-row type-of-template">
					<td class="ai-hf-options-row-heading">
						<label for="aiea_hf_template_type"><?php _e( 'Type of Template', 'ai-addons' ); ?></label>
					</td>
					<td class="ai-hf-options-row-content">
						<select name="aiea_hf_template_type" id="aiea_hf_template_type">
							<option value="" <?php selected( $template_type, '' ); ?>><?php _e( 'Select Option', 'ai-addons' ); ?></option>
							<option value="type_header" <?php selected( $template_type, 'type_header' ); ?>><?php _e( 'Header', 'ai-addons' ); ?></option>
							<option value="type_footer" <?php selected( $template_type, 'type_footer' ); ?>><?php _e( 'Footer', 'ai-addons' ); ?></option>
							<option value="custom" <?php selected( $template_type, 'custom' ); ?>><?php _e( 'Custom Block', 'ai-addons' ); ?></option>
						</select>
					</td>
				</tr>

				<?php $this->display_rules_tab(); ?>
								
				<tr class="ai-hf-options-row ai-hf-shortcode">
					<td class="ai-hf-options-row-heading">
						<label for="aiea_hf_template"><?php _e( 'Shortcode', 'ai-addons' ); ?></label>
						<i class="ai-hf-options-row-heading-help dashicons dashicons-editor-help" title="<?php _e( 'Copy this shortcode and paste it into your post, page, or text widget content.', 'ai-addons' ); ?>">
						</i>
					</td>
					<td class="ai-hf-options-row-content">
						<span class="ai-hf-shortcode-col-wrap">
							<input type="text" onfocus="this.select();" readonly="readonly" value="[aiea_hf_template id='<?php echo esc_attr( $post->ID ); ?>']" class="ai-hf-large-text code">
						</span>
					</td>
				</tr>
			</tbody>
		</table>
		<?php
	}
	
	/**
	 * Markup for Display Rules Tabs.
	 *
	 * @since  1.0.0
	 */
	public function display_rules_tab() {
		
		require_once( AIEA_DIR .'core/header-footer/target-rule/target-rules-fields.php' );

		$include_locations = get_post_meta( get_the_id(), 'aiea_hf_target_include_locations', true );
		$exclude_locations = get_post_meta( get_the_id(), 'aiea_hf_target_exclude_locations', true );
		$users             = get_post_meta( get_the_id(), 'aiea_hf_target_user_roles', true );
		?>
		<tr class="ai-target-rules-row ai-hf-options-row">
			<td class="ai-target-rules-row-heading ai-hf-options-row-heading">
				<label><?php esc_html_e( 'Display On', 'ai-addons' ); ?></label>
				<div class="ai-target-rules-desc"><?php echo esc_html__( 'Add locations for where this template should appear.', 'ai-addons' ); ?></div>
			</td>
			<td class="ai-target-rules-row-content ai-hf-options-row-content">
				<?php
				AIEA_Target_Rules_Fields::target_rule_settings_field(
					'ai-target-rules-location',
					[
						'title'          => __( 'Display Rules', 'ai-addons' ),
						'value'          => '[{"type":"basic-global","specific":null}]',
						'tags'           => 'site,enable,target,pages',
						'rule_type'      => 'display',
						'add_rule_label' => __( 'Add Display Rule', 'ai-addons' ),
					],
					$include_locations
				);
				?>
			</td>
		</tr>
		<tr class="ai-target-rules-row ai-hf-options-row">
			<td class="ai-target-rules-row-heading ai-hf-options-row-heading">
				<label><?php esc_html_e( 'Do Not Display On', 'ai-addons' ); ?></label>
				<div class="ai-target-rules-desc"><?php echo esc_html__( 'Add locations for where this template should not appear.', 'ai-addons' ); ?></div>
			</td>
			<td class="ai-target-rules-row-content ai-hf-options-row-content">
				<?php
				AIEA_Target_Rules_Fields::target_rule_settings_field(
					'ai-target-rules-exclusion',
					[
						'title'          => __( 'Exclude On', 'ai-addons' ),
						'value'          => '[]',
						'tags'           => 'site,enable,target,pages',
						'add_rule_label' => __( 'Add Exclusion Rule', 'ai-addons' ),
						'rule_type'      => 'exclude',
					],
					$exclude_locations
				);
				?>
			</td>
		</tr>
		<tr class="ai-target-rules-row ai-hf-options-row">
			<td class="ai-target-rules-row-heading ai-hf-options-row-heading">
				<label><?php esc_html_e( 'User Roles', 'ai-addons' ); ?></label>
				<div class="ai-target-rules-desc"><?php echo esc_html__( 'Display custom template based on user role.', 'ai-addons' ); ?></div>
			</td>
			<td class="ai-target-rules-row-content ai-hf-options-row-content">
				<?php
				AIEA_Target_Rules_Fields::target_user_role_settings_field(
					'ai-target-rules-users',
					[
						'title'          => __( 'Users', 'ai-addons' ),
						'value'          => '[]',
						'tags'           => 'site,enable,target,pages',
						'add_rule_label' => __( 'Add User Rule', 'ai-addons' ),
					],
					$users
				);
				?>
			</td>
		</tr>
		<?php
	}
	
	/**
	 * Register Post type for AI Elementor Header & Footer Builder templates
	 */
	public function header_footer_post_type() {
		
		$labels = [
			'name'               => __( 'AI Elementor Header & Footer Builder', 'ai-addons' ),
			'singular_name'      => __( 'AI Elementor Header & Footer Builder', 'ai-addons' ),
			'menu_name'          => __( 'AI Elementor Header & Footer Builder', 'ai-addons' ),
			'name_admin_bar'     => __( 'AI Elementor Header & Footer Builder', 'ai-addons' ),
			'add_new'            => __( 'Add New', 'ai-addons' ),
			'add_new_item'       => __( 'Add New Header or Footer', 'ai-addons' ),
			'new_item'           => __( 'New Template', 'ai-addons' ),
			'edit_item'          => __( 'Edit Template', 'ai-addons' ),
			'view_item'          => __( 'View Template', 'ai-addons' ),
			'all_items'          => __( 'All Templates', 'ai-addons' ),
			'search_items'       => __( 'Search Templates', 'ai-addons' ),
			'parent_item_colon'  => __( 'Parent Templates:', 'ai-addons' ),
			'not_found'          => __( 'No Templates found.', 'ai-addons' ),
			'not_found_in_trash' => __( 'No Templates found in Trash.', 'ai-addons' ),
		];

		$args = [
			'labels'              => $labels,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'show_in_nav_menus'   => false,
			'exclude_from_search' => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'menu_icon'           => 'dashicons-editor-kitchensink',
			'supports'            => [ 'title', 'elementor' ],
		];

		register_post_type( 'ai-hf', $args );
		
		flush_rewrite_rules();
	}
	
	public function register_admin_menu() {
		add_submenu_page(
			'ai-addons',
			esc_html__( 'Header & Footer Builder', 'ai-addons' ),
			esc_html__( 'Header Footer', 'ai-addons' ),
			'edit_pages',
			'edit.php?post_type=ai-hf'
		);
	}
	
	/**
	 * Save meta field.
	 *
	 * @param  POST $post_id Currennt post object which is being displayed.
	 *
	 * @return Void
	 */
	public function aiea_hf_save_meta( $post_id ) {

		// Bail if we're doing an auto save.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// if our nonce isn't there, or we can't verify it, bail.
		if ( ! isset( $_POST['aiea_hf_meta_nounce'] ) || ! wp_verify_nonce( $_POST['aiea_hf_meta_nounce'], 'aiea_hf_meta_nounce' ) ) {
			return;
		}

		// if our current user can't edit this post, bail.
		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}
		
		require_once( AIEA_DIR .'core/header-footer/target-rule/target-rules-fields.php' );
		
		$target_locations = AIEA_Target_Rules_Fields::get_format_rule_value( $_POST, 'ai-target-rules-location' );
		$target_exclusion = AIEA_Target_Rules_Fields::get_format_rule_value( $_POST, 'ai-target-rules-exclusion' );
		$target_users     = [];

		if ( isset( $_POST['ai-target-rules-users'] ) ) {
			$target_users = array_map( 'sanitize_text_field', $_POST['ai-target-rules-users'] );
		}

		update_post_meta( $post_id, 'aiea_hf_target_include_locations', $target_locations );
		update_post_meta( $post_id, 'aiea_hf_target_exclude_locations', $target_exclusion );
		update_post_meta( $post_id, 'aiea_hf_target_user_roles', $target_users );

		if ( isset( $_POST['aiea_hf_template_type'] ) ) {
			update_post_meta( $post_id, 'aiea_hf_template_type', sanitize_text_field( $_POST['aiea_hf_template_type'] ) );
		}
		
		update_post_meta( $post_id, '_wp_page_template', 'elementor_canvas' );
	}

}
AIEA_Header_Footer_CPT::instance();