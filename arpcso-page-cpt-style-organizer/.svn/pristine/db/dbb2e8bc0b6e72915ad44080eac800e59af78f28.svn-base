<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://alessioruggieri.com
 * @since      1.0.0
 *
 * @package    Arpcso_Page_Cpt_Style_Organizer
 * @subpackage Arpcso_Page_Cpt_Style_Organizer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Handles the creation of the admin menu and rendering of the admin page.
 *
 * @package    Arpcso_Cpt_Style_Organizer
 * @subpackage Arpcso_Cpt_Style_Organizer/admin
 * @author     Alessio Ruggieri <info@alessioruggieri.com>
 */
class Arpcso_Page_Cpt_Style_Organizer_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name    The name of this plugin.
	 */
	public function __construct($plugin_name)
	{
		$this->plugin_name = $plugin_name;
	}

	/**
	 * Add a menu item to the WordPress admin dashboard.
	 *
	 * @since    1.0.0
	 */
	public function add_menu()
	{
		add_menu_page(
			esc_html__('ARPCSO Page Organizer', 'arpcso-page-cpt-style-organizer'),
			esc_html__('ARPCSO Organizer', 'arpcso-page-cpt-style-organizer'),
			'manage_options',
			$this->plugin_name,
			array($this, 'render_admin_page'),
			'dashicons-grid-view',
			25
		);
	}

	/**
	 * Enqueue admin scripts for the plugin.
	 *
	 * @since    1.0.0
	 * @param    string    $hook    The current admin page hook.
	 */
	public function enqueue_scripts($hook)
	{
		// Check if we are in the plugin screen
		if ($hook === 'toplevel_page_' . $this->plugin_name) {
			wp_enqueue_script(
				$this->plugin_name . '-admin',
				plugin_dir_url(__FILE__) . 'js/arpcso-page-cpt-style-organizer-admin.js',
				array('jquery'),
				'1.0.0',
				true
			);

			// Passing data from PHP to JS
			wp_localize_script(
				$this->plugin_name . '-admin',
				'arCPTOrganizer',
				array(
					'groups' => get_option('arpcso_page_cpt_ct_groups', [])
				)
			);
		}

		// Upload the script to the post/page edit screen
		if ($hook === 'post.php' || $hook === 'post-new.php') {
			$screen = get_current_screen();
			if ($screen && $screen->post_type === 'page') {
				wp_enqueue_script(
					$this->plugin_name . '-admin',
					plugin_dir_url(__FILE__) . 'js/arpcso-page-cpt-style-organizer-admin.js',
					array('jquery'),
					'1.0.0',
					true
				);

				wp_localize_script(
					$this->plugin_name . '-admin',
					'arCPTOrganizer',
					array(
						'groups' => get_option('arpcso_page_cpt_ct_groups', [])
					)
				);
			}
		}
	}

	/**
	 * Enqueue admin style for the plugin.
	 *
	 * @since    1.0.0
	 * @param    string    $hook    The current admin page hook.
	 */
	public function enqueue_styles($hook)
	{
		// Load style only in admin page
		if ($hook !== 'toplevel_page_arpcso-page-cpt-style-organizer') {
			return;
		}

		wp_enqueue_style(
			$this->plugin_name . '-admin',
			plugin_dir_url(__FILE__) . 'css/arpcso-page-cpt-style-organizer-admin.css',
			array(),
			'1.0.0',
			'all'
		);
	}

	/**
	 *  Handles saving the settings from the admin page.
	 *
	 * @since    1.0.0
	 */
	public function save_settings()
	{

		if (
			!isset($_POST['arpcso_page_cpt_ct_nonce_field']) ||
			!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['arpcso_page_cpt_ct_nonce_field'])), 'arpcso_page_cpt_ct_nonce')
		) {
			wp_die(esc_html__('Nonce verification failed', 'arpcso-page-cpt-style-organizer'));
		}



		if (!current_user_can('manage_options')) {
			wp_die(esc_html__('Unauthorized', 'arpcso-page-cpt-style-organizer'));
		}

		$cpts = isset($_POST['cpt']) ? array_map('sanitize_text_field', wp_unslash($_POST['cpt'])) : [];
		$cts = isset($_POST['ct']) ? array_map('sanitize_text_field', wp_unslash($_POST['ct'])) : [];

		$cpt_ct_groups = [];
		foreach ($cpts as $index => $cpt) {
			if (!empty($cpt) && !empty($cts[$index])) {
				$cpt_ct_groups[] = [
					'cpt' => $cpt,
					'ct'  => $cts[$index]
				];
			}
		}

		update_option('arpcso_page_cpt_ct_groups', $cpt_ct_groups);

		wp_redirect(esc_url(admin_url('admin.php?page=' . $this->plugin_name . '&updated=true')));
		exit;
	}

	/**
	 * Render the admin page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function render_admin_page()
	{

		$cpt_ct_groups = get_option('arpcso_page_cpt_ct_groups', []);
?>
		<div class="wrap">
			<h1><?php esc_html_e('ARPCSO Page CPT-Style Organizer', 'arpcso-page-cpt-style-organizer'); ?></h1>
			<p><?php esc_html_e('Add and manage your Custom Post Type and Custom Taxonomy groups below.', 'arpcso-page-cpt-style-organizer'); ?></p>

			<form id="arpcso-page-cpt-style-organizer-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<?php wp_nonce_field('arpcso_page_cpt_ct_nonce', 'arpcso_page_cpt_ct_nonce_field'); ?>

				<!-- Hidden field for action -->
				<input type="hidden" name="action" value="arpcso_page_cpt_save">

				<table class="form-table" id="ar-cpt-ct-table">
					<thead>
						<tr>
							<th><?php esc_html_e('Custom Post Type', 'arpcso-page-cpt-style-organizer'); ?></th>
							<th><?php esc_html_e('Custom Taxonomy', 'arpcso-page-cpt-style-organizer'); ?></th>
							<th><?php esc_html_e('Actions', 'arpcso-page-cpt-style-organizer'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($cpt_ct_groups)) : ?>
							<?php foreach ($cpt_ct_groups as $group) : ?>
								<tr>
									<td><input type="text" name="cpt[]" value="<?php echo esc_attr($group['cpt']); ?>" required></td>
									<td><input type="text" name="ct[]" value="<?php echo esc_attr($group['ct']); ?>" required></td>
									<td><button type="button" class="button ar-remove-row"><?php esc_html_e('Remove', 'arpcso-page-cpt-style-organizer'); ?></button></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>

				<p>
					<button type="button" id="ar-add-row" class="button"><?php esc_html_e('Add Row', 'arpcso-page-cpt-style-organizer'); ?></button>
				</p>

				<p>
					<input type="submit" class="button-primary" value="<?php esc_html_e('Save Changes', 'arpcso-page-cpt-style-organizer'); ?>">
				</p>
			</form>
		</div>
	<?php
	}

	/**
	 * Add a metabox to the page edit screen.
	 *
	 * @since 1.0.0
	 */
	public function add_metabox()
	{
		add_meta_box(
			'arpcso_page_cpt_style_organizer_metabox',
			esc_html__('ARPCSO Page Organizer', 'arpcso-page-cpt-style-organizer'),
			[$this, 'render_metabox'],
			'page',
			'side',
			'default'
		);
	}

	/**
	 * Render the content of the metabox.
	 *
	 * @since 1.0.0
	 * @param WP_Post $post The current post object.
	 */
	public function render_metabox($post)
	{
		// Retrieve saved data for this page
		$selected_group = get_post_meta($post->ID, '_arpcso_page_cpt_ct_group', true);
		$selected_type = get_post_meta($post->ID, '_arpcso_page_cpt_ct_type', true);
		$selected_role = get_post_meta($post->ID, '_arpcso_page_cpt_ct_role', true);

		// Retrieves groups defined in the plugin
		$groups = get_option('arpcso_page_cpt_ct_groups', []);
		wp_nonce_field('arpcso_page_cpt_ct_metabox_nonce', 'arpcso_page_cpt_ct_metabox_nonce_field');

		// Content of the metabox
	?>
		<p><?php esc_html_e('Is this page part of a Custom Post Type or a Custom Taxonomy?', 'arpcso-page-cpt-style-organizer'); ?></p>

		<!-- Group selector -->
		<select name="arpcso_page_cpt_ct_group" id="arpcso_page_cpt_ct_group">
			<option value=""><?php esc_html_e('Select a group...', 'arpcso-page-cpt-style-organizer'); ?></option>
			<?php foreach ($groups as $index => $group) : ?>
				<option value="<?php echo esc_attr($index); ?>" <?php selected($selected_group, $index); ?>>
					<?php echo esc_html($group['cpt'] . ' / ' . $group['ct']); ?>
				</option>
			<?php endforeach; ?>
		</select>

		<!-- Selector switch for CPT or CT -->
		<div id="arpcso_page_cpt_ct_type_section" style="margin-top: 10px;">
			<label id="cpt_type_label">
				<input type="radio" name="arpcso_page_cpt_ct_type" value="cpt" <?php checked($selected_type, 'cpt'); ?>>
				<?php echo esc_html__('Custom Post Type', 'arpcso-page-cpt-style-organizer'); ?>
			</label>
			<br>
			<label id="ct_type_label">
				<input type="radio" name="arpcso_page_cpt_ct_type" value="ct" <?php checked($selected_type, 'ct'); ?>>
				<?php echo esc_html__('Custom Taxonomy', 'arpcso-page-cpt-style-organizer'); ?>
			</label>
		</div>

		<!-- Selector switch for role -->
		<div id="arpcso_page_cpt_ct_role_section" style="margin-top: 10px;">
			<label id="archive_label">
				<input type="radio" name="arpcso_page_cpt_ct_role" value="archive" <?php checked($selected_role, 'archive'); ?>>
				<?php esc_html_e('Archive', 'arpcso-page-cpt-style-organizer'); ?>
			</label>
			<br>
			<label id="single_label">
				<input type="radio" name="arpcso_page_cpt_ct_role" value="single" <?php checked($selected_role, 'single'); ?>>
				<?php esc_html_e('Single Element', 'arpcso-page-cpt-style-organizer'); ?>
			</label>
		</div>

		<!-- Reset button -->
		<div style="margin-top: 15px;">
			<button type="button" id="ar-reset-button" class="button"><?php esc_html_e('Reset', 'arpcso-page-cpt-style-organizer'); ?></button>
		</div>

<?php
	}
	/**
	 * Save the metabox data.
	 *
	 * @since 1.0.0
	 * @param int $post_id The ID of the current post.
	 */
	public function save_metabox_data($post_id)
	{
		// Verification of nonce
		if (
			!isset($_POST['arpcso_page_cpt_ct_metabox_nonce_field']) ||
			!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['arpcso_page_cpt_ct_metabox_nonce_field'])), 'arpcso_page_cpt_ct_metabox_nonce')
		) {
			return;
		}

		// Check the user's permissions
		if (!current_user_can('edit_post', $post_id)) {
			return;
		}

		// Avoid automatic saves
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		// Retrieves and validates submitted data
		$group = isset($_POST['arpcso_page_cpt_ct_group']) ? sanitize_text_field(wp_unslash($_POST['arpcso_page_cpt_ct_group'])) : '';

		$type = isset($_POST['arpcso_page_cpt_ct_type']) ? sanitize_text_field(wp_unslash($_POST['arpcso_page_cpt_ct_type'])) : '';
		$role = isset($_POST['arpcso_page_cpt_ct_role']) ? sanitize_text_field(wp_unslash($_POST['arpcso_page_cpt_ct_role'])) : '';

		// Check if the fields are empty
		if ($group !== "" && empty($type) && empty($role)) {

			// Delete existing data in the database
			delete_post_meta($post_id, '_arpcso_page_cpt_ct_group');
			delete_post_meta($post_id, '_arpcso_page_cpt_ct_type');
			delete_post_meta($post_id, '_arpcso_page_cpt_ct_role');
		} else {

			// Save or update data in the database
			if ($group !== "") {
				update_post_meta($post_id, '_arpcso_page_cpt_ct_group', $group);
			} else {
				delete_post_meta($post_id, '_arpcso_page_cpt_ct_group');
			}

			if (!empty($type)) {
				update_post_meta($post_id, '_arpcso_page_cpt_ct_type', $type);
			} else {
				delete_post_meta($post_id, '_arpcso_page_cpt_ct_type');
			}

			if (!empty($role)) {
				update_post_meta($post_id, '_arpcso_page_cpt_ct_role', $role);
			} else {
				delete_post_meta($post_id, '_arpcso_page_cpt_ct_role');
			}
		}
	}

	/**
	 * Add a custom filter to the Pages admin screen.
	 *
	 * @since 1.0.0
	 */
	public function add_custom_filter()
	{
		global $typenow;

		if ($typenow === 'page') {

			$selected = '';
			if (isset($_GET['ar_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['ar_nonce'])), 'arpcso_page_filter_nonce')) {
				$selected = isset($_GET['arpcso_page_filter']) ? sanitize_text_field(wp_unslash($_GET['arpcso_page_filter'])) : '';
			}

			$groups = get_option('arpcso_page_cpt_ct_groups', []);

			echo '<form method="GET" action="">';
			echo '<input type="hidden" name="post_type" value="page">';
			echo '<input type="hidden" name="ar_nonce" value="' . esc_attr(wp_create_nonce('arpcso_page_filter_nonce')) . '">';

			// Select for filter
			echo '<select name="arpcso_page_filter" onchange="this.form.submit();">';
			echo '<option value="">' . esc_html__('All Custom Types', 'arpcso-page-cpt-style-organizer') . '</option>';

			foreach ($groups as $group) {
				$cpt_archive = 'archive_' . $group['cpt'];
				$ct_archive = 'archive_' . $group['ct'];
				$cpt_single = 'single_' . $group['cpt'];
				$ct_single = 'single_' . $group['ct'];

				echo '<option value="' . esc_attr($cpt_archive) . ' + cpt" ' . selected($selected, $cpt_archive . ' + cpt', false) . '>';
				echo esc_html__('Archive of ', 'arpcso-page-cpt-style-organizer') . esc_html($group['cpt']) . '</option>';

				echo '<option value="' . esc_attr($ct_archive) . ' + ct" ' . selected($selected, $ct_archive . ' + ct', false) . '>';
				echo esc_html__('Archive of ', 'arpcso-page-cpt-style-organizer') . esc_html($group['ct']) . '</option>';

				echo '<option value="' . esc_attr($cpt_single) . ' + cpt" ' . selected($selected, $cpt_single . ' + cpt', false) . '>';
				echo esc_html__('Single ', 'arpcso-page-cpt-style-organizer') . esc_html($group['cpt']) . '</option>';

				echo '<option value="' . esc_attr($ct_single) . ' + ct" ' . selected($selected, $ct_single . ' + ct', false) . '>';
				echo esc_html__('Single ', 'arpcso-page-cpt-style-organizer') . esc_html($group['ct']) . '</option>';
			}

			echo '</select>';
			echo '</form>';
		}
	}


	/**
	 * Filter pages by custom type.
	 *
	 * @param WP_Query $query The current query object.
	 *
	 * @since 1.0.0
	 */
	public function filter_pages_by_custom_type($query)
	{
		if (!is_admin() || !$query->is_main_query() || $query->get('post_type') !== 'page') {
			return;
		}

		$cpt_ct_groups = get_option('arpcso_page_cpt_ct_groups', []);

		// Retrieves the value selected from the select
		if (isset($_GET['ar_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['ar_nonce'])), 'arpcso_page_filter_nonce')) {
			$selected_filter = isset($_GET['arpcso_page_filter']) ? sanitize_text_field(wp_unslash($_GET['arpcso_page_filter'])) : '';
		} else {
			$selected_filter = '';
		}



		// If the filter is empty, do not apply any changes
		if (empty($selected_filter)) {
			return;
		}

		$filter_parts = explode('_', $selected_filter);
		if (count($filter_parts) !== 2) {
			return;
		}

		$filter_parts_plus = explode('+', $filter_parts[1]);
		if (count($filter_parts_plus) !== 2) {
			return;
		}

		$role = trim($filter_parts[0]);
		$typology = trim($filter_parts_plus[0]);
		$type = trim($filter_parts_plus[1]);

		// Find the index of the group matching the typology
		$group_index = null;
		foreach ($cpt_ct_groups as $index => $group) {
			if ($group['cpt'] === $typology || $group['ct'] === $typology) {
				$group_index = $index;
				break;
			}
		}

		// If no matching group was found, return early
		if ($group_index === null) {
			return;
		}

		// Apply the query with meta_query
		$query->set('meta_query', [
			'relation' => 'AND',
			[
				'key'     => '_arpcso_page_cpt_ct_type',
				'value'   => $type,
				'compare' => '=',
			],
			[
				'key'     => '_arpcso_page_cpt_ct_role',
				'value'   => $role,
				'compare' => '=',
			],
			[
				'key'     => '_arpcso_page_cpt_ct_group',
				'value'   => $group_index, // Use the group index here
				'compare' => '=',
			],
		]);
	}
}
