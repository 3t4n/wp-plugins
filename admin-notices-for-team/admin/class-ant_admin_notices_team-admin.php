<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://plugwpress.com
 * @since      1.0.0
 *
 * @package    Ant_admin_notices_team
 * @subpackage Ant_admin_notices_team/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ant_admin_notices_team
 * @subpackage Ant_admin_notices_team/admin
 * @author     PlugWPress <info@plugwpress.com>
 */
class Ant_admin_notices_team_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of this plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ant_admin_notices_team_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ant_admin_notices_team_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ant_admin_notices_team-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'wp-color-picker' );

		wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');



	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ant_admin_notices_team_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ant_admin_notices_team_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ant_admin_notices_team-admin.js', array( 'jquery' ), $this->version, false );


		wp_enqueue_script('ant-ajax', plugin_dir_url(__FILE__) . 'js/ant-ajax.js', array('jquery'), $this->version);
		wp_localize_script('ant-ajax', 'ant_vars', array(
				'ant_nonce' => wp_create_nonce('ant-nonce')
			)
		);

		wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( 'color-picker.js', __FILE__ ), array( 'wp-color-picker' ), $this->version, true );

		wp_enqueue_script('jquery-ui-datepicker');

	}


	public function register_notices_custom_post_type() {
		/**
		 * This function register a new custom post type called Notices
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ant_admin_notices_team_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ant_admin_notices_team_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$labels = array(
			'name'               => _x( 'Notices', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'Notice', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'Notices', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'Notice', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'Add New', 'notice', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'Add New Notice', 'your-plugin-textdomain' ),
			'new_item'           => __( 'New Notice', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'Edit Notice', 'your-plugin-textdomain' ),
			'view_item'          => __( 'View Notice', 'your-plugin-textdomain' ),
			'all_items'          => __( 'All Notices', 'your-plugin-textdomain' ),
			'search_items'       => __( 'Search Notices', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'Parent Notices:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'No notices found.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'No notices found in Trash.', 'your-plugin-textdomain' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'exclude_from_search'=> true,
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'notices' ),
			'capability_type'    => 'notice',
			'map_meta_cap'  => true,
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'          => 'dashicons-testimonial',
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);


		register_post_type(
			'notice',
			$args
		);


	}

	public function add_users_caps() {

		// gets the Admin role
		$admin = get_role( 'administrator' );

		// Allow Admin to
		$admin->add_cap( 'read_private_notices' );
		$admin->add_cap( 'edit_private_notices' );
		$admin->add_cap('delete_notices');
		$admin->add_cap('edit_notices');
		$admin->add_cap('publish_notices');
		$admin->add_cap('edit_published_notices');
		$admin->add_cap('edit_others_notices');


		// gets the Editor role
		$editor = get_role( 'editor' );

		// Allow Editors to
		$editor->add_cap( 'read_private_notices' );
		$editor->add_cap( 'edit_private_notices' );
		$editor->add_cap('delete_notices');
		$editor->add_cap('edit_notices');
		$editor->add_cap('publish_notices');
		$editor->add_cap('edit_published_notices');
		$editor->add_cap('edit_others_notices');


        // gets the Author role
        $author = get_role( 'author' );

        // Allow Authors to
        $author->add_cap( 'read_private_notices' );
        $author->add_cap('publish_notices');
        $author->add_cap('delete_notices');
        $author->add_cap('edit_notices');

		// gets the Contributor role
		$contributor = get_role( 'contributor' );

		// Allow Contributor to
		$contributor->add_cap( 'read_private_notices' );

	}

	/**
	 * Forcing Custom Post Type Status change from Public to Private.
	 */
	public function post_status_to_private( $new_status, $old_status, $post ) {
		if ( $post->post_type == 'notice' && $new_status == 'publish' && $old_status  != $new_status ) {
			$post->post_status = 'private';
			wp_update_post( $post );
		}
	}


	/**
	 * Adds the meta box container.
	 */
	public function add_author_meta_box( $post_type ) {
		// Limit meta box to certain post types.
		$post_types = array( 'notice' );

		if ( in_array( $post_type, $post_types ) ) {
			add_meta_box(
				'notices_meta_box',
				__( 'Notices Options', 'your-plugin-textdomain' ),
				array( $this, 'render_author_meta_box' ),
				$post_type,
				'side',
				'high'
			);
		}
	}

	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 */
	public function render_author_meta_box( $post ) {

		// Add a nonce field so we can check for it later.
		wp_nonce_field( 'ant_author_custom_box', 'ant_author_custom_box_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
		$value        = get_post_meta( $post->ID, '_target_author_key', true );
		$value_groups = get_post_meta( $post->ID, '_target_author_groups', true );
		$value_custom_groups = get_post_meta( $post->ID, '_author_groups', true );
		$value_date   = get_post_meta( $post->ID, '_notices_expire_date', true );

		// Display the form, using the current value.
		$options = get_option( $this->plugin_name . '-settings' );
		$users = get_users();

		$groups     = array(
			'Admin Users' => get_option('admin_groups'),
			'Editors' => get_option('editor_groups'),
			'Authors' => get_option('author_groups'),
			'Contributors' => get_option('contributor_groups')
		);
		update_option( 'ant_groups', $groups );

		$groups = get_option('ant_groups');


		// Users Dropdown Form

		if ( $users && $options['toggle-target-authors'] == 'enabled' ) {
		    if( empty($value_groups) ) {
			    ?>
                <label for="target_author_field" class="meta_label_notices">
				    <?php _e( 'Target Author', 'your-plugin-textdomain' ); ?>
                </label>
                <select name="target_author_field">
                    <option value="All">All Users</option>
				    <?php foreach ( $users as $user ) { ?>
                        <option value="<?php echo $user->display_name; ?>"<?php selected( $user->display_name, $value, true ); ?>><?php echo $user->display_name; ?></option>
				    <?php } ?>
                </select><br>
			    <?php
		    }
		}

		// Groups Dropdown Form and Add Group
		if ( $options['toggle-target-author-groups'] == 'enabled' ) {

	            ?>
                <div id="target_groups">
                <label for="target_author_field" class="meta_label_notices">
		            <?php _e( 'Target Author\'s Groups', 'your-plugin-textdomain' ); ?>
                </label>
                    <p>Choose one of the default groups</p>
                <select name="target_author_groups">
                    <option value="">No Groups Selected</option>
		            <?php foreach ($groups as $name => $val) { ?>
                        <option value="<?php echo $name; ?>"<?php selected( $name, $value_groups, true ); ?>><?php echo $name;?></option>
		            <?php } ?>
                </select><br>
                </div>

                <div id="custom_groups">
                    <p>or you can select multiple users and create your custom groups</p>
                    <label for="add_to_group" class="meta_label_notices">
                        <?php _e( 'Select Users', 'your-plugin-textdomain' ); ?>
                    </label>
                    <select multiple="multiple" name="add_to_group[]" id="add_to_group">
                        <option value="No Users Selected">No Users Selected</option>
                        <?php foreach ( $users as $user ) { ?>
                            <option value="<?php echo $user->display_name; ?>"<?php selected( $user->display_name, $value_custom_groups, true ); ?>><?php echo $user->display_name; ?></option>
                        <?php } ?>
                    </select><br>
                    <?php

                    ?>
                    <div class="author_tags_container">
		                <?php
		                foreach ( $value_custom_groups as $k => $v ) {
			                if ( $v != "" ) {
				                ?>
                                <div class="author_tags">
					                <?php
					                echo $v;
					                ?>
                                </div><br>
				                <?php
			                }
		                }
                        ?>
                    </div><br>
                </div><br>

            <?php

		}

		// Expiration Date Form
		?>
        <label for="expiration_date">
			<?php _e( 'Set Expiration Date', 'your-plugin-textdomain' ); ?>
        </label>
        <input type="text" name="expiration_date" id="ant_expires" class="ant-date-picker" value="<?php echo $value_date; ?>"><br>
		<?php

	}

	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function save_meta_box(  ) {
     $post_id = get_the_ID();
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['ant_author_custom_box_nonce'] ) ) {
			return $post_id;
		}

		$nonce = $_POST['ant_author_custom_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'ant_author_custom_box' ) ) {
			return $post_id;
		}

		/*
		 * If this is an autosave, our form has not been submitted,
		 * so we don't want to do anything.
		 */
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// Check the user's permissions.
		if ( 'notice' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}

		/* OK, it's safe for us to save the data now. */

		// Sanitize the user input.
		$mydata     = esc_attr__( $_POST['target_author_field'] );


		$groupsData = esc_attr__( $_POST['target_author_groups'] );
		//$groupsName = esc_attr__( $_POST['group_name'] );
		//$groupsAuthors = esc_attr__( $_POST['add_to_group'] );

		$expiredata = esc_attr__( $_POST['expiration_date'] );

		if ( isset( $_POST['add_to_group'] ) ) {

			//$groupsAuthors = array();

			$groupsAuthors = (array) $_POST['add_to_group'];

			update_post_meta( $post_id, '_author_groups', $groupsAuthors );
		}

			// Update the meta field.
		update_post_meta( $post_id, '_target_author_key', $mydata );
		update_post_meta( $post_id, '_target_author_groups', $groupsData );
		//update_post_meta( $post_id, '_author_groups', $groupsAuthors );
		update_post_meta( $post_id, '_notices_expire_date', $expiredata );
	}

	/**
	 * Register the settings page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function add_settings_page() {
		// Create our settings page as a submenu page of Notices custom post types
		add_submenu_page(
			'edit.php?post_type=notice',                             // parent slug
			__( 'Settings', 'your-plugin-textdomain' ),      // page title
			__( 'Settings', 'your-plugin-textdomain' ),      // menu title
			'manage_options',                        // capability
			'ant_admin_notices_team',                           // menu_slug
			array( $this, 'display_settings_page' )  // callable function
		);
	}

	/**
	 * Display the settings page content for the page we have created.
	 *
	 * @since    1.0.0
	 */
	public function display_settings_page() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/ant_admin_notices_team-admin-display.php';

	}

	/**
	 * Add action links on plugin page pointing to the settings.
	 *
	 * @since    1.0.0
	 */

	public function add_action_links( $links ) {

		$settings_link = array(
			'<a href="' . admin_url( 'edit.php?page=' . $this->plugin_name ) . '">' . __( 'Settings', $this->plugin_name ) . '</a>',
		);

		return array_merge( $settings_link, $links );
	}

	/**
	 * Register the settings for our settings page.
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {

		// REGISTER GENERAL SETTINGS
		register_setting(
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings',
			array( $this, 'sandbox_register_setting' )
		);
		// REGISTER DESIGN SETTINGS
		register_setting(
			$this->plugin_name . '-design-settings',
			$this->plugin_name . '-design-settings',
			array( $this, 'sandbox_register_design_setting' )
		);

		// GENERAL SETTINGS SECTION
		add_settings_section(
			$this->plugin_name . '-general-section',
			__( 'General Options', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_general_settings_section' ),
			$this->plugin_name . '-settings&tab=general'
		);
		// DESIGN SETTINGS SECTION
		add_settings_section(
			$this->plugin_name . '-design-section',
			__( 'Design Options', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_design_settings_section' ),
			$this->plugin_name . '-settings&tab=design'
		);

		// GENERAL SETTINGS FIELDS
		add_settings_field(
			'notice-number',
			__( '<div class="woo_box_title">Notices Number</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_input_text' ),
			$this->plugin_name . '-settings&tab=general',
			$this->plugin_name . '-general-section',
			array(
				'label_for'   => __( 'notice-number', 'your-plugin-textdomain' ),
				'description' => __( 'Set the number of Notices you want to display', 'your-plugin-textdomain' )
			)
		);
		add_settings_field(
			'display-dashboard-only',
			__( '<div class="woo_box_title">Display Notices only in Dashboard</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_single_checkbox' ),
			$this->plugin_name . '-settings&tab=general',
			$this->plugin_name . '-general-section',
			array(
				'label_for'   => __( 'display-dashboard-only', 'your-plugin-textdomain' ),
				'description' => __( 'If enabled, Notices will be displayed only when in Dashboard and in its subpages.', 'your-plugin-textdomain' )
			)
		);
		/*add_settings_field(
			'let-create',
			__( '<div class="woo_box_title">You Allow to CREATE Notices</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_multiple_checkbox' ),
			$this->plugin_name . '-settings&tab=general',
			$this->plugin_name . '-general-section',
			array(
				'label_for' => __( 'let-create', 'your-plugin-textdomain' ),
				'description' => __( 'Check the roles you want to give the capability to create new Notices', 'your-plugin-textdomain' ),
				'default' => array( 'administrator' => 'Administrator' ),
				'options'  => array( 'administrator' => 'Administrator', 'editor' => 'Editor', 'author' => 'Author', 'contributor' => 'Contributor' )
			)
		);
		add_settings_field(
			'let-edit',
			__( '<div class="woo_box_title">You Allow to EDIT Notices</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_multiple_checkbox' ),
			$this->plugin_name . '-settings&tab=general',
			$this->plugin_name . '-general-section',
			array(
				'label_for' => __( 'let-edit', 'your-plugin-textdomain' ),
				'description' => __( 'Check the roles you want to give the capability to edit other Notices' ),
				'default' => array( 'administrator' => 'Administrator' ),
				'options'  => array( 'administrator' => 'Administrator', 'editor' => 'Editor', 'author' => 'Author', 'contributor' => 'Contributor' )
			)
		);*/
		add_settings_field(
			'toggle-target-authors',
			__( '<div class="woo_box_title">LET targetting Authors</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_single_checkbox' ),
			$this->plugin_name . '-settings&tab=general',
			$this->plugin_name . '-general-section',
			array(
				'label_for'   => __( 'toggle-target-authors', 'your-plugin-textdomain' ),
				'description' => __( 'Enable a meta box in Notice Custom Post for targetting specific authors', 'your-plugin-textdomain' )
			)
		);
		 add_settings_field(
			'toggle-target-author-groups',
			__( '<div class="woo_box_title">LET targetting Author\'s Groups</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_single_checkbox' ),
			$this->plugin_name . '-settings&tab=general',
			$this->plugin_name . '-general-section',
			array(
				'label_for'   => __( 'toggle-target-author-groups', 'your-plugin-textdomain' ),
				'description' => __( 'Enable a meta box in Notice Custom Post for targetting specific author\'s groups', 'your-plugin-textdomain' )
			)
		);

		// DESIGN SETTINGS FIELDS
		add_settings_field(
			'notice-position',
			__( '<div class="woo_box_title">Notice Position</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_input_text' ),
			$this->plugin_name . '-settings&tab=design',
			$this->plugin_name . '-design-section',
			array(
				'label_for'           => __( 'notice-position', 'your-plugin-textdomain' ),
				'label_for_display'   => __( 'display-inline', 'your-plugin-textdomain' ),
				'description'         => __( 'Where do you want to position the notices', 'your-plugin-textdomain' ),
				'description_display' => __( 'Display Notices Inline', 'your-plugin-textdomain' )
			)
		);
		add_settings_field(
			'notice-width',
			__( '<div class="woo_box_title">Notice Width</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_input_text' ),
			$this->plugin_name . '-settings&tab=design',
			$this->plugin_name . '-design-section',
			array(
				'label_for'       => __( 'notice-width', 'your-plugin-textdomain' ),
				'label_for_radio' => __( 'width-unit', 'your-plugin-textdomain' ),
				'description'     => __( 'Choose the unit', 'your-plugin-textdomain' ),
				'default'         => __( '50', 'your-plugin-textdomain' )
			)
		);
		add_settings_field(
			'notice-type',
			__( '<div class="woo_box_title">Notice Type</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_radio' ),
			$this->plugin_name . '-settings&tab=design',
			$this->plugin_name . '-design-section',
			array(
				'label_for'   => __( 'notice-type', 'your-plugin-textdomain' ),
				'description' => __( 'Choose the Type of Notices', 'your-plugin-textdomain' ),
				'option_one'  => __( 'Thin', 'your-plugin-textdomain' ),
				'option_two'  => __( 'Large ', 'your-plugin-textdomain' )
			)
		);
		add_settings_field(
			'notice-style',
			__( '<div class="woo_box_title">Notice Style</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_radio' ),
			$this->plugin_name . '-settings&tab=design',
			$this->plugin_name . '-design-section',
			array(
				'label_for'    => __( 'notice-style', 'your-plugin-textdomain' ),
				'description'  => __( 'Choose the style of Notices', 'your-plugin-textdomain' ),
				'option_one'   => __( 'Default Basic', 'your-plugin-textdomain' ),
				'option_two'   => __( 'Warning Yellow Notice ', 'your-plugin-textdomain' ),
				'option_three' => __( 'Info Blue Notice', 'your-plugin-textdomain' ),
				'option_four'  => __( 'Success Green Notice', 'your-plugin-textdomain' ),
				'option_five'  => __( 'Error Red Notice', 'your-plugin-textdomain' )
			)
		);
		add_settings_field(
			'toggle-custom-style',
			__( '<div class="woo_box_title">Use Custom Style</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_single_checkbox_custom' ),
			$this->plugin_name . '-settings&tab=design',
			$this->plugin_name . '-design-section',
			array(
				'label_for'   => __( 'toggle-custom-style', 'your-plugin-textdomain' ),
				'description' => __( 'Customize the css rendering of your admin notices', 'your-plugin-textdomain' )
			)
		);
		add_settings_field(
			'font-style',
			__( '<div class="woo_box_title">Font Style</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_select' ),
			$this->plugin_name . '-settings&tab=design',
			$this->plugin_name . '-design-section',
			array(
				'label_for'         => __( 'font-style', 'your-plugin-textdomain' ),
				'label_for_size'    => __( 'font-size', 'your-plugin-textdomain' ),
				'label_for_color'   => __( 'font-color', 'your-plugin-textdomain' ),
				'default_size'      => __( '14', 'your-plugin-textdomain' ),
				'default_color'     => __( 'black', 'your-plugin-textdomain' ),
				'description'       => __( 'Choose the Font', 'your-plugin-textdomain' ),
				'description_color' => __( 'Font Color', 'your-plugin-textdomain' )
			)
		);
		add_settings_field(
			'bg-color',
			__( '<div class="woo_box_title">Background Color</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_color' ),
			$this->plugin_name . '-settings&tab=design',
			$this->plugin_name . '-design-section',
			array(
				'label_for'   => __( 'bg-color', 'your-plugin-textdomain' ),
				'description' => __( 'Choose the Background Color', 'your-plugin-textdomain' )
			)
		);
		add_settings_field(
			'border-style',
			__( '<div class="woo_box_title">Border</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_input_text' ),
			$this->plugin_name . '-settings&tab=design',
			$this->plugin_name . '-design-section',
			array(
				'label_for'          => __( 'border-style', 'your-plugin-textdomain' ),
				'label_for_color'    => __( 'border-color', 'your-plugin-textdomain' ),
				'description_border' => __( 'Customize the Notices\'s Border', 'your-plugin-textdomain' ),
				'default'            => __( '0', 'your-plugin-textdomain' )
			)
		);
		add_settings_field(
			'border-radius',
			__( '<div class="woo_box_title">Border Radius</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_range' ),
			$this->plugin_name . '-settings&tab=design',
			$this->plugin_name . '-design-section',
			array(
				'label_for'   => __( 'border-radius', 'your-plugin-textdomain' ),
				'description' => __( 'Set the Notices\'s Border Radius', 'your-plugin-textdomain' ),
				'default'     => __( '0', 'your-plugin-textdomain' )
			)
		);
		add_settings_field(
			'custom-css',
			__( '<div class="woo_box_title">Custom Css</div>', 'your-plugin-textdomain' ),
			array( $this, 'sandbox_add_settings_field_textarea' ),
			$this->plugin_name . '-settings&tab=design',
			$this->plugin_name . '-design-section',
			array(
				'label_for'   => __( 'custom-css', 'your-plugin-textdomain' ),
				'description' => __( 'Add your Custom CSS', 'your-plugin-textdomain' )
			)
		);


	}

	public function sandbox_register_setting( $input ) {

		/*$new_input = array();

				if ( isset( $input ) ) {
					// Loop trough each input and sanitize the value if the input id isn't post-types
					foreach ( $input as $key => $value ) {
						if ( $key == 'credits-value' || $key == 'coupon-title' ) {
							$new_input[ $key ] = sanitize_text_field( $value );
						} else if ($key == 'toggle-single-credits-value' || $key == 'credits-sale-count' || $key == 'toggle-round-method' ) {
							$new_input[ $key ] = filter_var( $value, FILTER_SANITIZE_NUMBER_INT );
						}
					}
				}*/
		$options_array = get_option( $this->plugin_name . '-settings' );

		if ( isset( $input['notice-number'] ) ) {
			$options_array['notice-number'] = sanitize_text_field( $input['notice-number'] );
		}
		/*if ( isset( $input['let-create'] ) ) {
			$options_array['let-create'] = filter_var( $input['let-create'], FILTER_SANITIZE_NUMBER_INT );
		}
		if ( isset( $input['let-edit'] ) ) {
			$options_array['let-edit'] = filter_var( $input['let-edit'], FILTER_SANITIZE_NUMBER_INT );
		}*/

		if ( isset( $input['display-dashboard-only'] ) ) {
			$options_array['display-dashboard-only'] = esc_attr( $input['display-dashboard-only'] );
		} else {
			$options_array['display-dashboard-only'] = 'disabled';
		}

		if ( isset( $input['toggle-target-authors'] ) ) {
			$options_array['toggle-target-authors'] = esc_attr( $input['toggle-target-authors'] );
		} else {
			$options_array['toggle-target-authors'] = 'disabled';
		}

		if ( isset( $input['toggle-target-author-groups'] ) ) {
			$options_array['toggle-target-author-groups'] = esc_attr( $input['toggle-target-author-groups'] );
		} else {
			$options_array['toggle-target-author-groups'] = 'disabled';
		}

		return $options_array;

	}

	public function sandbox_register_design_setting( $input ) {

		$options_design_array = get_option( $this->plugin_name . '-design-settings' );

		if ( isset( $input['display-inline'] ) ) {
			$options_design_array['display-inline'] = esc_attr( $input['display-inline'] );
		} else {
			$options_design_array['display-inline'] = 'disabled';
		}
		if ( isset( $input['notice-position'] ) ) {
			$options_design_array['notice-position'] = sanitize_text_field( $input['notice-position'] );
		}
		if ( isset( $input['notice-width'] ) ) {
			$options_design_array['notice-width'] = sanitize_text_field( $input['notice-width'] );
		}
		if ( isset( $input['width-unit'] ) ) {
			$options_design_array['width-unit'] = filter_var( $input['width-unit'], FILTER_SANITIZE_NUMBER_INT );
		}
		if ( isset( $input['notice-type'] ) ) {
			$options_design_array['notice-type'] = filter_var( $input['notice-type'], FILTER_SANITIZE_NUMBER_INT );
		}
		if ( isset( $input['notice-style'] ) ) {
			$options_design_array['notice-style'] = filter_var( $input['notice-style'], FILTER_SANITIZE_NUMBER_INT );
		}

		if ( isset( $input['toggle-custom-style'] ) ) {
			$options_design_array['toggle-custom-style'] = esc_attr( $input['toggle-custom-style'] );
		} else {
			$options_design_array['toggle-custom-style'] = 'disabled';
		}


		if ( isset( $input['font-style'] ) ) {
			$options_design_array['font-style'] = sanitize_text_field( $input['font-style'] );
		}
		if ( isset( $input['font-size'] ) ) {
			$options_design_array['font-size'] = sanitize_text_field( $input['font-size'] );
		}
		if ( isset( $input['font-color'] ) ) {
			$options_design_array['font-color'] = sanitize_text_field( $input['font-color'] );
		}
		if ( isset( $input['bg-color'] ) ) {
			$options_design_array['bg-color'] = sanitize_text_field( $input['bg-color'] );
		}
		if ( isset( $input['border-radius'] ) ) {
			$options_design_array['border-radius'] = sanitize_text_field( $input['border-radius'] );
		}
		if ( isset( $input['border-style'] ) ) {
			$options_design_array['border-style'] = sanitize_text_field( $input['border-style'] );
		}
		if ( isset( $input['border-color'] ) ) {
			$options_design_array['border-color'] = sanitize_text_field( $input['border-color'] );
		}
		if ( isset( $input['custom-css'] ) ) {
			$options_design_array['custom-css'] = sanitize_text_field( $input['custom-css'] );
		}


		return $options_design_array;

	}

	public function sandbox_add_general_settings_section() {

		return;

	}

	public function sandbox_add_design_settings_section() {

		return;

	}

	public function sandbox_add_settings_field_radio( $args ) {

		$field_id           = $args['label_for'];
		$field_description  = $args['description'];
		$field_option_one   = $args['option_one'];
		$field_option_two   = $args['option_two'];
		$field_option_three = $args['option_three'];
		$field_option_four  = $args['option_four'];
		$field_option_five  = $args['option_five'];

		$options_design = get_option( $this->plugin_name . '-design-settings' );
		$option         = 0;

		if ( ! empty( $options_design[ $field_id ] ) ) {

			$option = $options_design[ $field_id ];

		}

		if ( $field_id == 'notice-type' ) {

			?>
            <span class="description"><?php echo esc_html( $field_description ); ?></span><br>
            <input type="radio" class="radio_input_one"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   value="1" <?php checked( 1, $option, true ); ?>/>
            <label for="radio_input_one"><?php echo $field_option_one; ?></label>

            <input type="radio" class="radio_input_two"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   value="2" <?php checked( 2, $option, true ); ?>/>
            <label for="radio_input_two"><?php echo $field_option_two; ?></label>

			<?php


		} else if ( $field_id == 'notice-style' ) {

			?>
            <span class="description"><?php echo esc_html( $field_description ); ?></span><br>
            <input type="radio" class="radio_input_one"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   value="1" <?php checked( 1, $option, true ); ?>/>
            <label for="radio_input_one"><?php echo $field_option_one; ?></label>
            <img src="<?php echo plugin_dir_url( __FILE__ ); ?>images/Basic.jpg" alt="Warning Notice" height="60px"
                 class="notice-img"><br>

            <input type="radio" class="radio_input_two"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   value="2" <?php checked( 2, $option, true ); ?>/>
            <label for="radio_input_two"><?php echo $field_option_two; ?></label>
            <img src="<?php echo plugin_dir_url( __FILE__ ); ?>images/Warning.jpg" alt="Warning Notice" height="60px"
                 class="notice-img"><br>

            <input type="radio" class="radio_input_three"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   value="3" <?php checked( 3, $option, true ); ?>/>
            <label for="radio_input_three"><?php echo $field_option_three; ?></label>
            <img src="<?php echo plugin_dir_url( __FILE__ ); ?>images/Info.jpg" alt="Warning Notice" height="60px"
                 class="notice-img"><br>
            <input type="radio" class="radio_input_four"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   value="4" <?php checked( 4, $option, true ); ?>/>
            <label for="radio_input_four"><?php echo $field_option_four; ?></label>
            <img src="<?php echo plugin_dir_url( __FILE__ ); ?>images/Success.jpg" alt="Warning Notice" height="60px"
                 class="notice-img"><br>
            <input type="radio" class="radio_input_five"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   value="5" <?php checked( 5, $option, true ); ?>/>
            <label for="radio_input_five"><?php echo $field_option_five; ?></label>
            <img src="<?php echo plugin_dir_url( __FILE__ ); ?>images/Error.jpg" alt="Warning Notice" height="60px"
                 class="notice-img"><br>

			<?php


		} else {

			?>
            <span class="description"><?php echo esc_html( $field_description ); ?></span><br>
            <input type="radio" class="radio_input_one"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   value="1" <?php checked( 1, $option, true ); ?>/>
            <label for="radio_input_one"><?php echo $field_option_one; ?></label>

            <input type="radio" class="radio_input_two"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   value="2" <?php checked( 2, $option, true ); ?>/>
            <label for="radio_input_two"><?php echo $field_option_two; ?></label>

            <input type="radio" class="radio_input_three"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   value="3" <?php checked( 3, $option, true ); ?>/>
            <label for="radio_input_three"><?php echo $field_option_three; ?></label>
			<?php


		}

	}

	/**
	 * Sandbox our single checkboxes.
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_field_single_checkbox( $args ) {

		$field_id          = $args['label_for'];
		$field_description = $args['description'];

		$options = get_option( $this->plugin_name . '-settings' );

		$option = 'disabled';

		if ( isset( $options[ $field_id ] ) && ! empty( ( $options[ $field_id ] ) ) ) {

			$option = $options[ $field_id ];

		}

		?>
        <div class="checkbox-content">
            <input type="checkbox" class="ant_checkbox"
                   name="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>"
                   id="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>"
                   value="enabled"<?php checked( 'enabled', $option, true ); ?>" />
            <label for="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" class="ant_check_label">


                <span class="ant_switch_off" data-checked="<?php _e( 'enabled', 'your-plugin-textdomain' ) ?>"
                      data-unchecked="<?php _e( 'disabled', 'your-plugin-textdomain' ) ?>"></span>
                <span class="ant_switch_on"></span>
            </label>
        </div>
        <div class="ant_check_description"><?php echo esc_html( $field_description ); ?></div>

		<?php
	}

	public function sandbox_add_settings_field_single_checkbox_custom( $args ) {

		$field_id_custom   = $args['label_for'];
		$field_description = $args['description'];

		$options_design = get_option( $this->plugin_name . '-design-settings' );
		$option         = 'disabled';

		if ( isset( $options_design[ $field_id_custom ] ) && ! empty( $options_design[ $field_id_custom ] ) ) {

			$option = $options_design[ $field_id_custom ];

		}

		?>
        <div class="checkbox-content" id="customStyle">
            <input type="checkbox" class="ant_checkbox"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id_custom . ']'; ?>"
                   id="<?php echo $this->plugin_name . '-design-settings[' . $field_id_custom . ']'; ?>"
                   value="enabled"<?php checked( 'enabled', $option, true ); ?>" />
            <label for="<?php echo $this->plugin_name . '-design-settings[' . $field_id_custom . ']'; ?>"
                   class="ant_check_label">


                <span class="ant_switch_off" data-checked="<?php _e( 'enabled', 'your-plugin-textdomain' ) ?>"
                      data-unchecked="<?php _e( 'disabled', 'your-plugin-textdomain' ) ?>"></span>
                <span class="ant_switch_on"></span>
            </label>
        </div>
        <div class="ant_check_description"><?php echo esc_html( $field_description ); ?></div>

		<?php
	}

	public function sandbox_add_settings_field_single_checkbox_display( $args ) {

		$field_id          = $args['label_for'];
		$field_description = $args['description'];

		$options_design = get_option( $this->plugin_name . '-design-settings' );
		$option         = 'disabled';

		if ( isset( $options_design[ $field_id ] ) && ! empty( $options_design[ $field_id ] ) ) {

			$option = $options_design[ $field_id ];

		}

		?>
        <div class="checkbox-content" id="fontStyle">
            <input type="checkbox" class="ant_checkbox"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   id="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   value="enabled"<?php checked( 'enabled', $option, true ); ?>" />
            <label for="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   class="ant_check_label">


                <span class="ant_switch_off" data-checked="<?php _e( 'enabled', 'your-plugin-textdomain' ) ?>"
                      data-unchecked="<?php _e( 'disabled', 'your-plugin-textdomain' ) ?>"></span>
                <span class="ant_switch_on"></span>
            </label>
        </div>
        <div class="ant_check_description"><?php echo esc_html( $field_description ); ?></div>

		<?php
	}


	/**
	 * Sandbox our inputs with text
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_field_input_text( $args ) {
		$field_id                  = $args['label_for'];
		$field_id_display          = $args['label_for_display'];
		$field_default_unit        = $args['default_unit'];
		$field_default             = $args['default'];
		$field_id_radio            = $args['label_for_radio'];
		$field_id_color            = $args['label_for_color'];
		$field_description         = $args['description'];
		$field_description_border  = $args['description_border'];
		$field_description_display = $args['description_display'];
		$options                   = get_option( $this->plugin_name . '-settings' );
		$options_design            = get_option( $this->plugin_name . '-design-settings' );
		$option                    = $field_default;
		$option_radio              = 0;
		$option_display            = 0;
		$option_color              = '';

		$option_unit = $field_default_unit;
		$items       = array( "%", "px" );

		if ( ! empty( $options[ $field_id ] ) ) {
			$option = $options[ $field_id ];
		}

		if ( ! empty( $options_design[ $field_id ] ) ) {
			$option = $options_design[ $field_id ];
		}

		if ( ! empty( $options_design[ $field_id_radio ] ) ) {

			$option_radio = $options_design[ $field_id_radio ];

		}

		if ( ! empty( $options_design[ $field_id_color ] ) ) {

			$option_color = $options_design[ $field_id_color ];

		}

		if ( ! empty( $options_design[ $field_id_display ] ) ) {

			$option_display = $options_design[ $field_id_display ];

		}


		if ( $field_id == 'notice-width' ) {

			$args['option_one'] = '%';
			$args['option_two'] = 'px';
			$field_option_one   = $args['option_one'];
			$field_option_two   = $args['option_two'];


			_e( 'Value:', 'your-plugin-textdomain' ) ?>
            <input type="text" name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   id="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>" pattern="[0-9]{1,3}"
                   value="<?php echo esc_attr( $option ); ?>" class="small-text <?php if ( $field_id == 'bg-color' ) {
				echo 'ant-color-picker';
			} ?>"/>

            <span class="description"><?php echo esc_html( $field_description ); ?></span>
            <input type="radio" class="radio_input_one"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id_radio . ']'; ?>"
                   value="1" <?php checked( 1, $option_radio, true ); ?>/>
            <label for="radio_input_one"><?php echo $field_option_one; ?></label>
            <input type="radio" class="radio_input_two"
                   name="<?php echo $this->plugin_name . '-design-settings[' . $field_id_radio . ']'; ?>"
                   value="2" <?php checked( 2, $option_radio, true ); ?>/>
            <label for="radio_input_two"><?php echo $field_option_two; ?></label>

			<?php
		} else if ( $field_id == 'border-style' ) {


			?>
            <span class="description"><?php echo esc_html( $field_description_border ); ?></span><br>
            <input type="text" name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   id="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>" pattern="[0-9]{1,3}"
                   value="<?php echo esc_attr( $option ); ?>" class="small-text <?php if ( $field_id == 'bg-color' ) {
				echo 'ant-color-picker';
			} ?>"/><?php _e( 'px', 'your-plugin-textdomain' ); ?>


            <input type="text" name="<?php echo $this->plugin_name . '-design-settings[' . $field_id_color . ']'; ?>"
                   id="<?php echo $this->plugin_name . '-design-settings[' . $field_id_color . ']'; ?>"
                   value="<?php echo esc_attr( $option_color ); ?>" class="ant-color-picker"/>

			<?php
		} else if ( $field_id == 'notice-position' ) {
			?>
            <div class="ant_check_description"><?php echo esc_html( $field_description_display ); ?></div>
            <div class="checkbox-content notice-inline" id="fontStyle">
                <input type="checkbox" class="ant_checkbox"
                       name="<?php echo $this->plugin_name . '-design-settings[' . $field_id_display . ']'; ?>"
                       id="<?php echo $this->plugin_name . '-design-settings[' . $field_id_display . ']'; ?>"
                       value="enabled" <?php checked( 'enabled', $option_display, true ); ?>" />
                <label for="<?php echo $this->plugin_name . '-design-settings[' . $field_id_display . ']'; ?>"
                       class="ant_check_label">


                <span class="ant_switch_off" data-checked="<?php _e( 'enabled', 'your-plugin-textdomain' ) ?>"
                      data-unchecked="<?php _e( 'disabled', 'your-plugin-textdomain' ) ?>"></span>
                    <span class="ant_switch_on"></span>
                </label>
            </div>
			<?php

			_e( 'Margin:', 'your-plugin-textdomain' ) ?>
            <input type="text" name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   id="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>" pattern="[0-9]{1,3}"
                   value="<?php echo esc_attr( $option ); ?>" class="small-text <?php if ( $field_id == 'bg-color' ) {
				echo 'ant-color-picker';
			} ?>"/>
			<?php

		} else {

			_e( 'Value:', 'your-plugin-textdomain' ) ?>
            <input type="text" name="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>"
                   id="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" pattern="[0-9]{1,3}"
                   value="<?php echo esc_attr( $option ); ?>" class="small-text <?php if ( $field_id == 'bg-color' ) {
				echo 'ant-color-picker';
			} ?>"/>
			<?php
		}

	}

	public function sandbox_add_settings_range( $args ) {

		$field_id          = $args['label_for'];
		$field_description = $args['description'];
		$field_default     = $args['default'];
		$options_design    = get_option( $this->plugin_name . '-design-settings' );
		$option            = $field_default;


		if ( ! empty( $options_design[ $field_id ] ) ) {
			$option = $options_design[ $field_id ];
		}

		?>

        <label>
            <span class="description"><?php echo esc_html( $field_description ); ?></span><br>
            <input type="range" name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   id="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                   oninput="updateRadius(this.value)" min="0" max="100" step="1" class="ant-range-input"
                   style="color: #0a0;" value="<?php echo esc_attr( $option ); ?>">
        </label>
        <span id="currentRadiusValue"><?php echo esc_attr( $option ); ?></span>

		<?php
		if ( $field_id == 'border-line' ) {

			?>
            <input type="text" name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']-input'; ?>"
                   id="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']-input'; ?>" value=""
                   class="small-text"/>
			<?php
		}
	}

	public function sandbox_add_settings_field_color( $args ) {
		$field_id          = $args['label_for'];
		$field_description = $args['description'];
		$options_design    = get_option( $this->plugin_name . '-design-settings' );
		$option            = $field_default;

		if ( ! empty( $options_design[ $field_id ] ) ) {
			$option = $options_design[ $field_id ];
		}

		?>
        <span class="description"><?php echo esc_html( $field_description ); ?></span><br>
        <input type="text" name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
               id="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
               value="<?php echo esc_attr( $option ); ?>" data-alpha="true" class="ant-color-picker"/>
		<?php

	}

	public function sandbox_add_settings_field_textarea( $args ) {
		$field_id          = $args['label_for'];
		$field_description = $args['description'];
		$options_design    = get_option( $this->plugin_name . '-design-settings' );
		$option            = '';

		if ( ! empty( $options_design[ $field_id ] ) ) {
			$option = $options_design[ $field_id ];
		}

		?>
        <span class="description"><?php echo esc_html( $field_description ); ?></span><br>
        <textarea name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                  id="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                  placeholder="/* Everything you want customize go here! */"
                  class="settings_textarea"><?php echo esc_attr( $option ); ?></textarea>
		<?php


	}


	public function sandbox_add_settings_field_select( $args ) {
		$field_id                = $args['label_for'];
		$field_id_size           = $args['label_for_size'];
		$field_id_color          = $args['label_for_color'];
		$field_description       = $args['description'];
		$field_description_color = $args['description_color'];
		$field_default           = $args['default'];
		$default_size            = $args['default_size'];
		$default_color           = $args['default_color'];

		$options_design = get_option( $this->plugin_name . '-design-settings' );
		$option         = 'default';
		$option_size    = $default_size;
		$option_color   = $default_color;


		if ( $field_id == 'font-style' ) {

			if ( ! empty( $options_design[ $field_id ] ) ) {
				$option = $options_design[ $field_id ];
			}
			?>
            <span class="description"><?php echo esc_html( $field_description ); ?></span><br>
            <select name="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                    id="<?php echo $this->plugin_name . '-design-settings[' . $field_id . ']'; ?>"
                    class="settings_select">
                <option value="default">Default</option>
                <option value="Georgia"<?php selected( $option, 'Georgia' ); ?>>Georgia</option>
                <option value="Times New Roman"<?php selected( $option, 'Times New Roman' ); ?>>Times New Roman</option>
                <option value="Arial"<?php selected( $option, 'Arial' ); ?>>Arial</option>
                <option value="Trebuchet"<?php selected( $option, 'Trebuchet' ); ?>>Trebuchet</option>
                <option value="Verdana"<?php selected( $option, 'Verdana' ); ?>>Verdana</option>
                <option value="EB Garamond"<?php selected( $option, 'EB Garamond' ); ?>>EB Garamond</option>
                <option value="Amatic SC"<?php selected( $option, 'Amatic SC' ); ?>>Amatic SC</option>
                <option value="Arimo"<?php selected( $option, 'Arimo' ); ?>>Arimo</option>
                <option value="Arvo"<?php selected( $option, 'Arvo' ); ?>>Arvo</option>
                <option value="Bitter"<?php selected( $option, 'Bitter' ); ?>>Bitter</option>
                <option value="Boogaloo"<?php selected( $option, 'Boogaloo' ); ?>>Boogaloo</option>
                <option value="Bree Serif"<?php selected( $option, 'Bree Serif' ); ?>>Bree Serif</option>
                <option value="Merriweather"<?php selected( $option, 'Merriweather' ); ?>>Merriweather</option>
                <option value="Cardo"<?php selected( $option, 'Cardo' ); ?>>Cardo</option>
                <option value="Chewy"<?php selected( $option, 'Chewy' ); ?>>Chewy</option>
                <option value="Comfortaa"<?php selected( $option, 'Comfortaa' ); ?>>Comfortaa</option>
                <option value="Coming Soon"<?php selected( $option, 'Coming Soon' ); ?>>Coming Soon</option>
                <option value="Covered By Your Grace"<?php selected( $option, 'Covered By Your Grace' ); ?>>Covered By
                    Your Grace
                </option>
                <option value="Indie Flower"<?php selected( $option, 'Indie Flower' ); ?>>Indie Flower</option>
                <option value="Inconsolata"<?php selected( $option, 'Inconsolata' ); ?>>Inconsolata</option>
                <option value="Gloria Hallelujah"<?php selected( $option, 'Gloria Hallelujah' ); ?>>Gloria Hallelujah
                </option>
                <option value="Marvel"<?php selected( $option, 'Marvel' ); ?>>Marvel</option>
                <option value="Architects Daughter"<?php selected( $option, 'Architects Daughter' ); ?>>Architects
                    Daughter
                </option>
                <option value="Crimson Text"<?php selected( $option, 'Crimson Text' ); ?>>Crimson Text</option>
                <option value="Permanent Marker"<?php selected( $option, 'Permanent Marker' ); ?>>Permanent Marker
                </option>
                <option value="Kalam"<?php selected( $option, 'Kalam' ); ?>>Kalam</option>
                <option value="Roboto Slab"<?php selected( $option, 'Roboto Slab' ); ?>>Roboto Slab</option>
            </select>
			<?php

			if ( ! empty( $options_design[ $field_id_size ] ) ) {
				$option_size = $options_design[ $field_id_size ];
			}


			_e( 'Size:', 'your-plugin-textdomain' ) ?>
            <input type="text" name="<?php echo $this->plugin_name . '-design-settings[' . $field_id_size . ']'; ?>"
                   id="<?php echo $this->plugin_name . '-design-settings[' . $field_id_size . ']'; ?>"
                   pattern="[0-9]{1,2}" value="<?php echo esc_attr( $option_size ); ?>"
                   class="small-text <?php if ( $field_id == 'bg-color' ) {
				       echo 'ant-color-picker';
			       } ?>"/><br>
			<?php
			if ( ! empty( $options_design[ $field_id_color ] ) ) {
				$option_color = $options_design[ $field_id_color ];
			}
			?>
            <span class="description"><?php echo esc_html( $field_description_color ); ?></span><br>
            <input type="text" name="<?php echo $this->plugin_name . '-design-settings[' . $field_id_color . ']'; ?>"
                   id="<?php echo $this->plugin_name . '-design-settings[' . $field_id_color . ']'; ?>"
                   value="<?php echo esc_attr( $option_color ); ?>" data-alpha="true" class="ant-color-picker"/>

			<?php

		}

	}

	public function google_fonts() {
		$query_args = array(
			'family' => 'Amatic+SC|Architects+Daughter|Arimo|Arvo|Bitter|Boogaloo|Bree+Serif|Cardo|Chewy|Comfortaa|Coming+Soon|Covered+By+Your+Grace|Crimson+Text|EB+Garamond|Gloria+Hallelujah|Inconsolata|Indie+Flower|Kalam|Merriweather|Permanent+Marker|Roboto+Slab|Marvel'
		);
		wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	}

	public function notices_showing( ) {
		global $current_user;
		global $pagenow;

		$options        = get_option( $this->plugin_name . '-settings' );
		$options_design = get_option( $this->plugin_name . '-design-settings' );
		$noticeNumber   = $options['notice-number'];
		$noticeClasses[] = '';

		if ( $options_design['notice-type'] == 2 ) {
			$noticeClasses[] = 'notice-large';
		}

		if ( $options_design['notice-style'] == 2 ) {
			$noticeClasses[] = 'notice-warning';

		} else if ( $options_design['notice-style'] == 3 ) {
			$noticeClasses[] = 'notice-info';

		} else if ( $options_design['notice-style'] == 4 ) {
			$noticeClasses[] = 'notice-success';

		} else if ( $options_design['notice-style'] == 5 ) {
			$noticeClasses[] = 'notice-error';
		}

		/**
		 * Since 1.0.2
		 * Show Notices only when in Dashboard or in Dashboard subpages (index.php)
		 * */
		if ( ($options['display-dashboard-only'] == 'enabled') && ($pagenow != 'index.php') ) {
			$noticeClasses[] = 'hidden';
		}


		if ( ! current_user_can( 'read_private_notices' ) ) {
			return false;
		}
		$current_time = current_time( 'Y-m-d' );

		// BEGIN THE LOOP
		$args  = array(
			'post_type'      => 'notice',
			'post_status'    => 'private',
			'posts_per_page' => $noticeNumber
		);
		$query = new WP_Query( $args );

		/**
		 * Since 1.0.2
		 * Show Notices targetting based on default roles groups
		 * */
		//ARGS
		$argsAdmin = array(
			'role'         => 'Administrator',
			'orderby'     => 'display_name',
			'order' => 'ASC'
			//'role__in'     => array(),
		);
		$argsEditor = array(
			'role'         => 'Editor',
			'orderby'     => 'display_name',
			'order' => 'ASC'
		);
		$argsAuthor = array(
			'role'         => 'Author',
			'orderby'     => 'display_name',
			'order' => 'ASC'
		);
		$argsContributor = array(
			'role'         => 'Contributor',
			'orderby'     => 'display_name',
			'order' => 'ASC'
		);

		$adminGroup = get_users($argsAdmin);
		$editorGroup = get_users($argsEditor);
		$authorGroup = get_users($argsAuthor);
		$contributorGroup = get_users($argsContributor);

		?>

		<?php

		//looping with $query->get_posts() in order to avoid issues when loop is in admin side
		if ( $query->have_posts() ) {

			foreach ( $query->get_posts() as $notice ) {

			    $notice_id = $notice->ID;
			    $user_id = get_current_user_id();
				$expires = get_post_meta( $notice_id, '_notices_expire_date', true );
				$authorOptions = get_post_meta( $notice->ID, '_target_author_key', true );
				$authorOptionGroups = get_post_meta( $notice->ID, '_target_author_groups', true );
				$authorCustomGroups = get_post_meta( $notice->ID, '_author_groups', true );


				if (
				    $authorOptionGroups == 'Admin Users'
                ) {
					foreach ($adminGroup as $admin) {
						$admins[]           = $admin->display_name;
						$authorOptionGroups = $admins;
					}
                } elseif ( $authorOptionGroups == 'Editors' ) {
					foreach ($editorGroup as $editor) {
						$editors[] = $editor->display_name;
						$authorOptionGroups = $editors;
					}
                } elseif ( $authorOptionGroups == 'Authors' ) {
					foreach ($authorGroup as $author) {
						$authors[]          = $author->display_name;
						$authorOptionGroups = $authors;
					}
				}  elseif ( $authorOptionGroups == 'Contributors' ) {
					foreach ($contributorGroup as $contributor) {
						$contributors[]     = $contributor->display_name;
						$authorOptionGroups = $contributors;
					}
				}



				$ant_dismiss = get_user_option("ant-dismiss-$notice_id", $user_id);

				if (
                    (
                        (
                                ( $authorOptions == "All" || empty($authorOptions) )
                                && empty($authorOptionGroups)
                          && ( empty($authorCustomGroups) || in_array("No Users Selected", $authorCustomGroups) )
                        )
                          ||  ( $authorOptions == $current_user->display_name)
													||  in_array($current_user->display_name, $authorOptionGroups)
	                        ||  in_array($current_user->display_name, $authorCustomGroups)
                    )
                 && ( $ant_dismiss != "dismissed" )
                 && ( $current_time < $expires || empty($expires) )
                ) {

						?>
                        <div class="ant-notice-wrap">
                            <div class='notice ant-notice <?php
							foreach ( $noticeClasses as $noticeClass => $class ) {
								print_r( array_values( $noticeClasses ) );
							}
							( ! empty( $notice->post_content ) ) ? print( 'ant-tip' ) : print( '' ); ?> is-dismissible'
                                 data-tip="<?php echo $notice->post_content; ?>"
                                 data-notice-id="<?php echo $notice_id; ?>" tabindex="1">
								<?php
								echo $notice->post_title;

								/*
								 *
								 * for custom dismiss future update
								 * echo '<button type="button" class="ant-notice-dismiss">'.__('I\'ve Got it.', 'your-plugin-textdomain').'</button>';
								 * */

								?>
                            </div>
                        </div>
						<?php
					}

				  }
                }
            }

	function ant_process_ajax() {

		if( !isset( $_POST['ant_nonce'] ) || !wp_verify_nonce($_POST['ant_nonce'], 'ant-nonce') )
			die('Permissions check failed');

		$user_id = get_current_user_id();
		$notice_id = $_REQUEST['notice'];

		update_user_option( $user_id, "ant-dismiss-$notice_id", 'dismissed' );

	die();
}

	function ant_notice_is_expired( $notice_id = 0 ) {

		$expires = get_post_meta( $notice_id, '_notices_expire_date', true );

		if( ! empty( $expires ) ) {

			// Get the current time and the post's expiration date
			$current_time = current_time( 'Y-m-d' );
			$expiration   = strtotime( $expires, current_time( 'Y-m-d' ) );

			// Determine if current time is greater than the expiration date
			if( $current_time >= $expiration ) {
				wp_trash_post($notice_id);
			}
		}

		return false;

	}


     public function custom_css() {
	     $options_design = get_option( $this->plugin_name . '-design-settings' );

	    $width = $options_design['notice-width'];
	    $margin = $options_design['notice-position'];
	    $font = $options_design['font-style'];
        $fontSize = $options_design['font-size'];
        $fontColor = $options_design['font-color'];
	    $bgColor = $options_design['bg-color'];
	    $border = $options_design['border-style'];
	    $borderColor = $options_design['border-color'];
	    $borderRadius = $options_design['border-radius'];
	    $unitRadius = 'px';
	    $customCss = $options_design['custom-css'];


	        if ( $options_design['width-unit'] == 1 ) {
			    $unit = '%';
            } else {
	        $unit = 'px';
            }

            if ( $options_design['border-radius'] >= 50 ) {
			    $unitRadius = '%';
            }


	    $custom_css = "

                .ant-notice {
                        width: {$width}{$unit};
                        margin-left: {$margin}% !important;

                }";

	     /* Future update: adding custom dismiss maybe on hover
	        * add setting for tooltip width, color and style
	      * if ( $options_design['custom-dismiss'] == 'enabled' ) {
		     $custom_css = "
		     .ant-notice-dismiss  {
			     position: relative !important;
                        bottom: 34px !important;
                        background-color: {$bgColor} !important;
                        border: solid {$border}px {$borderColor} !important;
                        border-bottom: none !important;
                        }";
	     }*/

                     if ( $options_design['display-inline'] == 'enabled' ) {

                         $custom_css .= "
                                   .wrap div.ant-notice, div.ant-notice {
                                          position: static;
                                          display: inline-block;
                            }";
                     }

                         if ( $options_design['toggle-custom-style'] == 'enabled' ) {
                         $custom_css .= "
                           .ant-notice {
                        font-family: {$font}, Helvetica, sans-serif !important;
                        font-size: {$fontSize}px !important;
                        color: {$fontColor} !important;
                        background-color: {$bgColor} !important;
                        border: solid {$border}px {$borderColor} !important;
                        border-radius: {$borderRadius}{$unitRadius} !important;
                        {$customCss}
                        }";
                         }

                         if ( $options_design['notice-type'] == 1 ) {
                             $custom_css .= "
                               div.ant-notice .notice-dismiss {
                               position: absolute !important;
                               top: -8px !important;
                                }";
                         }

        wp_add_inline_style( $this->plugin_name, $custom_css );

     }


}
