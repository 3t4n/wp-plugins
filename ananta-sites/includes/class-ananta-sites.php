<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 *
 * @package    Ananta_Sites
 * @subpackage Ananta_Sites/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @package    Ananta_Sites
 * @subpackage Ananta_Sites/includes
 * @author     Anantsites <https://anantsites.com/>
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly     
class Ananta_Sites {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @access   protected
	 * @var      Ananta_Sites_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 */
	public function __construct() {
		if ( defined( 'ANANTA_SITES_VERSION' ) ) {
			$this->version = ANANTA_SITES_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'ananta-sites';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Ananta_Sites_Loader. Orchestrates the hooks of the plugin.
	 * - Ananta_Sites_i18n. Defines internationalization functionality.
	 * - Ananta_Sites_Admin. Defines all hooks for the admin area.
	 * - Ananta_Sites_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once ANANTA_SITES_DIR_PATH . 'includes/class-ananta-sites-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once ANANTA_SITES_DIR_PATH . 'includes/class-ananta-sites-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once ANANTA_SITES_DIR_PATH . 'admin/class-ananta-sites-admin.php';
        /* Load Plugin Related Files To Get Plugin Info */
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
        include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
        /* Load Theme Installer Related Files to Install Theme */
        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
	    include_once ABSPATH . 'wp-admin/includes/theme.php';

		$this->loader = new Ananta_Sites_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Ananta_Sites_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Ananta_Sites_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Ananta_Sites_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_menu', $plugin_admin, 'register_theme_page');
        $this->loader->add_action( 'wp_ajax_import_action', $plugin_admin, 'import_data_ajax');
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @access   private
	 */
	private function define_public_hooks() {

        // Remove All Third Party Notices
		add_action( 'admin_enqueue_scripts', [$this, 'remove_notices']  );

	}

	public function remove_notices() {
		$screen = get_current_screen();
        if ( isset( $screen->base ) && $screen->base == 'toplevel_page_ananta-demo-import' ) {
            remove_all_actions( 'admin_notices' );
        }
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @return    Ananta_Sites_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

    private function ananta_get_required_plugin_status($plugin, $all_plugins) {
        $response = 'not-installed';
        foreach($all_plugins as $key => $wp_plugin) {
            $folder_arr = explode("/", $key);
            $folder = $folder_arr[0];
            if($folder == $plugin['plugin_slug']) {
                if(is_plugin_inactive( $key ) ) {
                    $response = 'inactive';
                } else {
                    $response = 'active';
                }
                return $response;
            }
        }
        return $response;
            
    }

    private function get_plugin_install_path($plugin_slug) {
        $all_plugins = get_plugins();
        foreach($all_plugins as $key => $wp_plugin) {
            $folder_arr = explode("/", $key);
            $folder = $folder_arr[0];
            if($folder == $plugin_slug) {
                return (string)$key;
                break;
            }
        }
        return false;
    }
    
	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

    public function init_import($theme_id){
        //check for theme_id
        if (empty($theme_id)) {
            $importer_error_msg = "No theme id passed!";
            return ['status' => 'error', 'msg' => $importer_error_msg];
        }

        //Setting upload Dir
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir = $upload_dir . '/ananta_sites_data';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755);
        }
        
        //Getting demo data
        $theme_data_api = wp_remote_get(esc_url_raw("https://template.anantaddons.com/wp-json/wp/v2/demos/" . $theme_id . "?_fields=meta"));
        $theme_data_api_body = wp_remote_retrieve_body($theme_data_api);
        $theme_data_api = json_decode($theme_data_api_body, TRUE);

        //Getting Demo files from url
        file_put_contents($upload['basedir'] . '/ananta_sites_data/demo.wie', fopen($theme_data_api['meta']['widget_file_url'][0], 'r'));
        file_put_contents($upload['basedir'] . '/ananta_sites_data/demo.dat', fopen($theme_data_api['meta']['customizer_file_url'][0], 'r'));
        file_put_contents($upload['basedir'] . '/ananta_sites_data/demo.xml', fopen($theme_data_api['meta']['data_file_url'][0], 'r'));
        return ['status' => 'success', 'msg' => 'Import Data Initialized'];
    }

    public function install_required_plugins($theme_id){
        //check for theme_id
        if (empty($theme_id)) {
            $importer_error_msg = "No theme id passed!";
            return ['status' => 'error', 'msg' => $importer_error_msg];
        }

        //Getting demo data
        $theme_data_api = wp_remote_get(esc_url_raw("https://template.anantaddons.com/wp-json/wp/v2/demos/" . $theme_id . "?_fields=meta"));
        $theme_data_api_body = wp_remote_retrieve_body($theme_data_api);
        $theme_data_api = json_decode($theme_data_api_body, TRUE);

        $required_plugins = $theme_data_api['meta']['premiun_plugin_link'];

        /* Get All Plugins Installed In Wordpress */
        $all_wp_plugins = get_plugins();
        
        $installed_plugins = [];
        if($required_plugins && count($required_plugins) > 0){
            foreach($required_plugins as $theme_plugin){
                if(!empty($theme_plugin['plugin_slug'])){
                    $ananta_sit = new Ananta_Sites();
                    $plugin_status = $ananta_sit->ananta_get_required_plugin_status($theme_plugin, $all_wp_plugins);
                        
                    if($plugin_status == 'not-installed'){
                        $ananta_sit->install_plugin(['name' => $theme_plugin['plugin_name'], 'slug' => $theme_plugin['plugin_slug']]);
                        $installed_plugins['installed'][] = $theme_plugin['plugin_slug'];
                        $myplugin = $ananta_sit->get_plugin_install_path($theme_plugin['plugin_slug']);
                        if($myplugin){
                            $installed_plugins['activated'][] = !is_null(activate_plugin( $myplugin, '', false, false )) ?: $theme_plugin['plugin_slug'];
                        }
                    } else if($plugin_status == 'inactive'){
                        $myplugin = $ananta_sit->get_plugin_install_path($theme_plugin['plugin_slug']);
                        if($myplugin){
                            $installed_plugins['activated'][] = !is_null(activate_plugin( $myplugin, '', false, false )) ?: $theme_plugin['plugin_slug'];
                        }
                        
                    } else if($plugin_status == 'active') {
                        $installed_plugins['activated'][] = $theme_plugin['plugin_slug'];
                    } 
                }
            }
        }
        return ['status' => 'success', 'msg' => 'All required plugins installed successfully'];
        /* End: Install Plugins */
    }
        
    public function install_demo($theme_id, $theme_options) {
        if (empty($theme_id)) {
            $importer_error = true;
            $importer_error_msg = "No theme id passed!";
            return ['status' => 'error', 'msg' => $importer_error_msg];
        }

        // Load Importer API
        require_once ABSPATH . 'wp-admin/includes/import.php';
        //check if wp_importer, the base importer class is available, otherwise include it
        if (!class_exists('WP_Importer')) {
            $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
            if (file_exists($class_wp_importer)) {
                require_once( $class_wp_importer );
            } else {
                $importer_error = true;
                return ['status' => 'error', 'msg' => 'WP_Import Class not found!'];
            }
        }
        
        // // Delete navigation menus.
        // if (!empty($nav_menus)) {
        //     foreach ($nav_menus as $nav_menu) {
        //         wp_delete_nav_menu($nav_menu->slug);
        //     }
        // }

        $upload = wp_upload_dir();
        $wiget_file = $upload['basedir'] . '/ananta_sites_data/demo.wie';
        $customizer_file = $upload['basedir'] . '/ananta_sites_data/demo.dat';
        $data_file = $upload['basedir'] . '/ananta_sites_data/demo.xml';
        
        /* Check if import option is selected */
        
        // File exists?
        if($theme_options['import_content'] == 'true'){
            if (!file_exists($data_file)) {
                return ['status'=> 'error', 'msg' => esc_html__('Data import file could not be found for data. Please try again.','ananta-sites')];
            }
        }
        
        // File exists?
        if($theme_options['import_customizer'] == 'true'){
            if (!file_exists($customizer_file)) {
                return ['status'=> 'error', 'msg' => esc_html__('Customizer file could not be found for data. Please try again.','ananta-sites')];
            }
        }

        //remove current home page if exsist
        if($theme_options['import_content'] == 'true'){

            //Delete All Existing Pages
            if($theme_options['is_replace_content'] == 'true'){ // Delete trashed and published pages
                $all_pages = get_posts(array(
                    'post_type' => 'page',
                    'post_status' => array('publish', 'trash', 'draft'),
                    'posts_per_page' => -1,
                ));
            
                foreach ($all_pages as $page) {
                    wp_delete_post($page->ID, true);
                }
            
                // Delete trashed and published custom post type posts (replace 'anant-header-footer' with your actual CPT slug)
                $args = array(
                    'post_type' => 'anant-header-footer',
                    'post_status' => array('publish', 'trash'),
                    'posts_per_page' => -1,
                );
            
                $anant_header_footer = get_posts($args);
            
                foreach ($anant_header_footer as $post) {
                    wp_delete_post($post->ID, true);
                }
            }

            $import = new ANANTA_WP_Import();
            $content_import_result = $import->dispatch();
            if(isset($content_import_result) && $content_import_result['status'] == 'error') {
                return $content_import_result;
            }
        }

        if( $theme_options['import_customizer'] == 'true' ){
            $ananta_sites = new Ananta_Sites();
            $customizer_import_result = $ananta_sites->ANANTA_import_customizer_settings($customizer_file);
            if($customizer_import_result['status'] == 'error') {
                return $customizer_import_result;
            }
        }
        

        $permalink_structure = '/%postname%/';
        update_option('permalink_structure', $permalink_structure);
        // Flush rewrite rules to apply the changes
        flush_rewrite_rules();

        update_option( 'ANANTA_demo_installed', $theme_id );
        return ['status' => 'success', 'msg' => 'Import Complete'];
    }
        
    public function wie_available_widgets() {

        global $wp_registered_widget_controls;

        $widget_controls = $wp_registered_widget_controls;

        $available_widgets = array();

        foreach ($widget_controls as $widget) {

            // No duplicates.
            if (!empty($widget['id_base']) && !isset($available_widgets[$widget['id_base']])) {
                $available_widgets[$widget['id_base']]['id_base'] = $widget['id_base'];
                $available_widgets[$widget['id_base']]['name'] = $widget['name'];
            }
        }

        return apply_filters('wie_available_widgets', $available_widgets);
    }

    /**
     * Import widget JSON data
     *
     * @global array $wp_registered_sidebars
     * @param object $data JSON widget data from .wie file.
     * @return array Results array
     */

    public function wie_import_data($file) {

        global $wp_registered_sidebars;

        $w_data = implode('', file($file));
        $data = json_decode($w_data);

        // Have valid data?
        // If no data or could not decode.
        if (empty($data) || !is_object($data)) {
            return ['status' => 'error', 'msg' => esc_html__('Import data could not be read. Please try a different file.', 'ananta-sites')];
            wp_die(
                    esc_html__('Import data could not be read. Please try a different file.', 'ananta-sites'), '', array(
                'back_link' => true,
                    )
            );
        }

        // Hook before import.
        do_action('wie_before_import');
        $data = apply_filters('wie_import_data', $data);

        // Get all available widgets site supports.
        $available_widgets = $this->wie_available_widgets();

        // Get all existing widget instances.
        $widget_instances = array();
        foreach ($available_widgets as $widget_data) {
            $widget_instances[$widget_data['id_base']] = get_option('widget_' . $widget_data['id_base']);
        }

        // Begin results.
        $results = array();

        // Loop import data's sidebars.
        foreach ($data as $sidebar_id => $widgets) {

            // Skip inactive widgets (should not be in export file).
            if ('wp_inactive_widgets' === $sidebar_id) {
                continue;
            }

            // Check if sidebar is available on this site.
            // Otherwise add widgets to inactive, and say so.
            if (isset($wp_registered_sidebars[$sidebar_id])) {
                $sidebar_available = true;
                $use_sidebar_id = $sidebar_id;
                $sidebar_message_type = 'success';
                $sidebar_message = '';
            } else {
                $sidebar_available = false;
                $use_sidebar_id = 'wp_inactive_widgets'; // Add to inactive if sidebar does not exist in theme.
                $sidebar_message_type = 'error';
                $sidebar_message = esc_html__('Widget area does not exist in theme (using Inactive)', 'ananta-sites');
            }

            // Result for sidebar
            // Sidebar name if theme supports it; otherwise ID.
            $results[$sidebar_id]['name'] = !empty($wp_registered_sidebars[$sidebar_id]['name']) ? $wp_registered_sidebars[$sidebar_id]['name'] : $sidebar_id;
            $results[$sidebar_id]['message_type'] = $sidebar_message_type;
            $results[$sidebar_id]['message'] = $sidebar_message;
            $results[$sidebar_id]['widgets'] = array();

            // Loop widgets.
            foreach ($widgets as $widget_instance_id => $widget) {

                $fail = false;

                // Get id_base (remove -# from end) and instance ID number.
                $id_base = preg_replace('/-[0-9]+$/', '', $widget_instance_id);
                $instance_id_number = str_replace($id_base . '-', '', $widget_instance_id);

                // Does site support this widget?
                if (!$fail && !isset($available_widgets[$id_base])) {
                    $fail = true;
                    $widget_message_type = 'error';
                    $widget_message = esc_html__('Site does not support widget', 'ananta-sites'); // Explain why widget not imported.
                    return ['status' => 'error', 'msg' => $widget_message];
                    die ();
                }

                // Filter to modify settings object before conversion to array and import
                // Leave this filter here for backwards compatibility with manipulating objects (before conversion to array below)
                // Ideally the newer wie_widget_settings_array below will be used instead of this.
                $widget = apply_filters('wie_widget_settings', $widget);

                // Convert multidimensional objects to multidimensional arrays
                // Some plugins like Jetpack Widget Visibility store settings as multidimensional arrays
                // Without this, they are imported as objects and cause fatal error on Widgets page
                // If this creates problems for plugins that do actually intend settings in objects then may need to consider other approach: https://wordpress.org/support/topic/problem-with-array-of-arrays
                // It is probably much more likely that arrays are used than objects, however.
                $widget = json_decode(wp_json_encode($widget), true);

                // Filter to modify settings array
                // This is preferred over the older wie_widget_settings filter above
                // Do before identical check because changes may make it identical to end result (such as URL replacements).
                $widget = apply_filters('wie_widget_settings_array', $widget);

                // Does widget with identical settings already exist in same sidebar?
                if (!$fail && isset($widget_instances[$id_base])) {

                    // Get existing widgets in this sidebar.
                    $ananta_sidebars_widgets = get_option('sidebars_widgets');
                    $sidebar_widgets = isset($ananta_sidebars_widgets[$use_sidebar_id]) ? $ananta_sidebars_widgets[$use_sidebar_id] : array(); // Check Inactive if that's where will go.
                    // Loop widgets with ID base.
                    $single_widget_instances = !empty($widget_instances[$id_base]) ? $widget_instances[$id_base] : array();
                    foreach ($single_widget_instances as $check_id => $check_widget) {

                        // Is widget in same sidebar and has identical settings?
                        if (in_array("$id_base-$check_id", $sidebar_widgets, true) && (array) $widget === $check_widget) {

                            $fail = true;
                            $widget_message_type = 'warning';

                            // Explain why widget not imported.
                            $widget_message = esc_html__('Widget already exists', 'ananta-sites');

                            break;
                        }
                    }
                }

                // No failure.
                if (!$fail) {

                    // Add widget instance
                    $single_widget_instances = get_option('widget_' . $id_base); // All instances for that widget ID base, get fresh every time.
                    $single_widget_instances = !empty($single_widget_instances) ? $single_widget_instances : array(
                        '_multiwidget' => 1, // Start fresh if have to.
                    );
                    $single_widget_instances[] = $widget; // Add it.
                    // Get the key it was given.
                    end($single_widget_instances);
                    $new_instance_id_number = key($single_widget_instances);

                    // If key is 0, make it 1
                    // When 0, an issue can occur where adding a widget causes data from other widget to load,
                    // and the widget doesn't stick (reload wipes it).
                    if ('0' === strval($new_instance_id_number)) {
                        $new_instance_id_number = 1;
                        $single_widget_instances[$new_instance_id_number] = $single_widget_instances[0];
                        unset($single_widget_instances[0]);
                    }

                    // Move _multiwidget to end of array for uniformity.
                    if (isset($single_widget_instances['_multiwidget'])) {
                        $multiwidget = $single_widget_instances['_multiwidget'];
                        unset($single_widget_instances['_multiwidget']);
                        $single_widget_instances['_multiwidget'] = $multiwidget;
                    }

                    // Update option with new widget.
                    update_option('widget_' . $id_base, $single_widget_instances);

                    // Assign widget instance to sidebar.
                    // Which sidebars have which widgets, get fresh every time.
                    $ananta_sidebars_widgets = get_option('sidebars_widgets');

                    // Avoid rarely fatal error when the option is an empty string
                    // https://github.com/churchthemes/widget-importer-exporter/pull/11.
                    if (!$ananta_sidebars_widgets) {
                        $ananta_sidebars_widgets = array();
                    }

                    // Use ID number from new widget instance.
                    $new_instance_id = $id_base . '-' . $new_instance_id_number;

                    // Add new instance to sidebar.
                    $ananta_sidebars_widgets[$use_sidebar_id][] = $new_instance_id;

                    // Save the amended data.
                    update_option('sidebars_widgets', $ananta_sidebars_widgets);

                    // After widget import action.
                    $after_widget_import = array(
                        'sidebar' => $use_sidebar_id,
                        'sidebar_old' => $sidebar_id,
                        'widget' => $widget,
                        'widget_type' => $id_base,
                        'widget_id' => $new_instance_id,
                        'widget_id_old' => $widget_instance_id,
                        'widget_id_num' => $new_instance_id_number,
                        'widget_id_num_old' => $instance_id_number,
                    );
                    do_action('wie_after_widget_import', $after_widget_import);

                    // Success message.
                    if ($sidebar_available) {
                        $widget_message_type = 'success';
                        $widget_message = esc_html__('Imported', 'ananta-sites');
                    } else {
                        $widget_message_type = 'warning';
                        $widget_message = esc_html__('Imported to Inactive', 'ananta-sites');
                    }
                }

                // Result for widget instance
                $results[$sidebar_id]['widgets'][$widget_instance_id]['name'] = isset($available_widgets[$id_base]['name']) ? $available_widgets[$id_base]['name'] : $id_base; // Widget name or ID if name not available (not supported by site).
                $results[$sidebar_id]['widgets'][$widget_instance_id]['title'] = !empty($widget['title']) ? $widget['title'] : esc_html__('No Title', 'ananta-sites'); // Show "No Title" if widget instance is untitled.
                $results[$sidebar_id]['widgets'][$widget_instance_id]['message_type'] = $widget_message_type;
                $results[$sidebar_id]['widgets'][$widget_instance_id]['message'] = $widget_message;
            }
        }

        // Hook after import.
        do_action('wie_after_import');

        // Return results.
        return apply_filters('wie_import_results', $results);
    }
    
    /**
     * Import Customizer Settings
     */

    function ANANTA_import_customizer_settings($custom_file) {
        // Check to see if the settings have already been imported.
        $template = get_template();
        $imported = get_option($template . '_customizer_import', false);

        // Bail if already imported.
        if ($imported) {
            return ['status' => 'warning', 'msg' => 'Customizer setting already imported!'];
        }
        remove_theme_mods();
        // Get the path to the customizer export file.
        $path = $custom_file;

        // Return if the file doesn't exist.
        if (!file_exists($path)) {
            return ['status' => 'error', 'msg' => 'Customizer import file does not exist!'];
        }

        // Get the settings data.
        $data = @unserialize(file_get_contents($path));

        // Return if something is wrong with the data.
        if ('array' != gettype($data) || !isset($data['mods'])) {
            return ['status' => 'error', 'msg' => 'Invalid customizer data!'];
        }

        // Import options.
        if (isset($data['options'])) {
            foreach ($data['options'] as $option_key => $option_value) {
                update_option($option_key, $option_value);
            }
        }

        // Import mods.
        foreach ($data['mods'] as $key => $val) {
            set_theme_mod($key, $val);
        }

        $nav_menus = wp_get_nav_menus();

        foreach ($nav_menus as $menu) {
            // Get menu items for the current menu
            $menu_items = wp_get_nav_menu_items($menu->term_id);
        
            if (!$menu_items) {
                continue; // Skip if no menu items
            }
        
            $seen = []; // Array to track duplicates
            foreach ($menu_items as $menu_item) {
                // Create a unique key based on title and URL
                $key = md5($menu_item->title . $menu_item->url);
        
                if (isset($seen[$key])) {
                    // Duplicate found, remove the menu item
                    wp_delete_post($menu_item->ID, true);
                } else {
                    $seen[$key] = true; // Mark as seen
                }
            }
        }
        
        $menu = wp_get_nav_menu_object('anant-home-menu');

        if ($menu) {
            $menu_id = $menu->term_id;

            $locations = get_theme_mod('nav_menu_locations');
            if (!is_array($locations)) {
                $locations = [];
            }
            $locations['primary'] = $menu_id;

            set_theme_mod('nav_menu_locations', $locations);
        }

        $home = get_posts(
            array(
                'post_type'              => 'page',
                'title'                  => 'Home',
                'post_status'            => 'publish',
                'numberposts'            => 1,
            )
        );

        $ananta_homepage = $home[0];

        if ($ananta_homepage) {
            update_option('page_on_front', $ananta_homepage->ID);
            update_option('show_on_front', 'page');
        }

        $blog = get_posts(
            array(
                'post_type'              => 'page',
                'title'                  => 'Blog',
                'post_status'            => 'publish',
                'numberposts'            => 1,
            )
        );

        $ananta_blogpage = $blog[0];

        if ($ananta_blogpage) {
            update_option('page_for_posts', $ananta_blogpage->ID);
        }
        
        if ( class_exists( 'woocommerce' ) ) {
            $shop = get_posts(
                array(
                    'post_type'              => 'page',
                    'title'                  => 'Shop',
                    'post_status'            => 'publish',
                    'numberposts'            => 1,
                )
            );
    
            $ananta_shoppage = $shop[0];
    
            if ($ananta_shoppage) {
                update_option('woocommerce_shop_page_id', $ananta_shoppage->ID);
            }
            $cart = get_posts(
                array(
                    'post_type'              => 'page',
                    'title'                  => 'Cart',
                    'post_status'            => 'publish',
                    'numberposts'            => 1,
                )
            );
    
            $ananta_cartpage = $cart[0];
    
            if ($ananta_cartpage) {
                update_option('woocommerce_cart_page_id', $ananta_cartpage->ID);
            }
            
            $checkout = get_posts(
                array(
                    'post_type'              => 'page',
                    'title'                  => 'Checkout',
                    'post_status'            => 'publish',
                    'numberposts'            => 1,
                )
            );
    
            $ananta_checkoutpage = $checkout[0];
    
            if ($ananta_checkoutpage) {
                update_option('woocommerce_checkout_page_id', $ananta_checkoutpage->ID);
            }

            $my_account = get_posts(
                array(
                    'post_type'              => 'page',
                    'title'                  => 'My account',
                    'post_status'            => 'publish',
                    'numberposts'            => 1,
                )
            );
    
            $ananta_my_accountpage = $my_account[0];
    
            if ($ananta_my_accountpage) {
                update_option('woocommerce_myaccount_page_id', $ananta_my_accountpage->ID);
            }

            $wishlist = get_posts(
                array(
                    'post_type'              => 'page',
                    'title'                  => 'Wishlist',
                    'post_status'            => 'publish',
                    'numberposts'            => 1,
                )
            );
    
            $ananta_wishlistpage = $wishlist[0];
    
            if ($ananta_wishlistpage) {
                update_option('wishlist_template_select', $ananta_wishlistpage->ID);
            }
    
            $compare = get_posts(
                array(
                    'post_type'              => 'page',
                    'title'                  => 'Compare',
                    'post_status'            => 'publish',
                    'numberposts'            => 1,
                )
            );
    
            $ananta_comparepage = $compare[0];
    
            if ($ananta_comparepage) {
                update_option('compare_template_select', $ananta_comparepage->ID);
            }
        }

        return ['status' => 'success', 'msg' => 'Customizer Imported Successfully'];
    }
    
   /**
    * Install Plugin
    *
    * @param array $plugin Required Plugin.
    */
        
    public function install_plugin( $plugin = array() ) {

        if ( ! isset( $plugin['slug'] ) || empty( $plugin['slug'] ) ) {
                return esc_html__( 'Invalid plugin slug', 'ananta-sites' );
        }

        include_once ABSPATH . 'wp-admin/includes/plugin.php';
        include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

        

        $api = plugins_api(
                'plugin_information',
                array(
                    'slug'   => sanitize_key( wp_unslash( $plugin['slug'] ) ),
                    'fields' => array(
                        'sections' => false,
                    ),
                )
        );

        if ( is_wp_error( $api ) ) {
                $status['errorMessage'] = $api->get_error_message();
                return $status;
        }

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );

        if ( is_wp_error( $result ) ) {
                return $result->get_error_message();
        } elseif ( is_wp_error( $skin->result ) ) {
                return $skin->result->get_error_message();
        } elseif ( $skin->get_errors()->has_errors() ) {
                return $skin->get_error_messages();
        } elseif ( is_null( $result ) ) {
                global $wp_filesystem;

                // Pass through the error from WP_Filesystem if one was raised.
                if ( $wp_filesystem instanceof WP_Filesystem_Base && is_wp_error( $wp_filesystem->errors ) && $wp_filesystem->errors->has_errors() ) {
                        return esc_html( $wp_filesystem->errors->get_error_message() );
                }

                return esc_html__( 'Unable to connect to the filesystem. Please confirm your credentials.', 'ananta-sites' );
        }

        /* translators: %s plugin name. */
        return sprintf( esc_html__( 'Successfully installed "%s" plugin!', 'ananta-sites' ), $api->name );
    }

}