<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://wordpress.org/plugins/restrict-wp-upload-type/
 * @since      1.0.0
 *
 * @package    Restrict_Wp_Upload_Type
 * @subpackage Restrict_Wp_Upload_Type/includes
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
 * @since      1.0.0
 * @package    Restrict_Wp_Upload_Type
 * @subpackage Restrict_Wp_Upload_Type/includes
 * @author     Kushang Tailor <admin@gmail.com>
 */
class Restrict_Wp_Upload_Type {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Restrict_Wp_Upload_Type_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
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
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'RESTRICT_WP_UPLOAD_TYPE_VERSION' ) ) {
			$this->version = RESTRICT_WP_UPLOAD_TYPE_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'restrict-wp-upload-type';

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
	 * - Restrict_Wp_Upload_Type_Loader. Orchestrates the hooks of the plugin.
	 * - Restrict_Wp_Upload_Type_i18n. Defines internationalization functionality.
	 * - Restrict_Wp_Upload_Type_Admin. Defines all hooks for the admin area.
	 * - Restrict_Wp_Upload_Type_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-restrict-wp-upload-type-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-restrict-wp-upload-type-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-restrict-wp-upload-type-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-restrict-wp-upload-type-public.php';

		$this->loader = new Restrict_Wp_Upload_Type_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Restrict_Wp_Upload_Type_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Restrict_Wp_Upload_Type_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Restrict_Wp_Upload_Type_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Restrict_Wp_Upload_Type_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Restrict_Wp_Upload_Type_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}

add_filter('upload_mimes', 'restrict_wp_upload_remove_mime_types', 1, 1);
function restrict_wp_upload_remove_mime_types($mime_types){
    
    $check_extension = get_post_meta( 49, 'rwut_check_extension_key', true );
    $check_ex_array = explode(",", $check_extension);

    if(in_array('.jpg / .jpeg / .jpe', $check_ex_array)){
        $mime_types['jpg|jpeg|jpe']  = 'image/jpeg';
    } else {
        unset( $mime_types['jpg|jpeg|jpe'] );
    }

    if(in_array('.gif', $check_ex_array)){
        $mime_types['gif']  = 'image/gif';
    } else {
        unset($mime_types['gif']);
    }

    if(in_array('.svg', $check_ex_array)){
        $mime_types['svg'] = 'image/svg';
    } else {
        unset($mime_types['svg']);
    }

    if(in_array('.png', $check_ex_array)){
        $mime_types['png']  = 'image/png';
    } else {
        unset($mime_types['png']);
    }

    if(in_array('.bmp', $check_ex_array)){
        $mime_types['bmp']  = 'image/bmp';
    } else {
        unset($mime_types['bmp']);
    }

    if(in_array('.tiff / .tif', $check_ex_array)){
        $mime_types['tiff|tif']  = 'image/tiff';
    } else {
        unset($mime_types['tiff|tif']);
    }

    if(in_array('.webp', $check_ex_array)){
        $mime_types['webp']  = 'image/webp';
    } else {
        unset($mime_types['webp']);
    }

    if(in_array('.ico', $check_ex_array)){
        $mime_types['ico']  = 'image/x-icon';
    } else {
        unset($mime_types['ico']);
    }

    if(in_array('.heic', $check_ex_array)){
        $mime_types['heic']  = 'image/heic';
    } else {
        unset($mime_types['heic']);
    }

    if(in_array('.asf / .asf', $check_ex_array)){
        $mime_types['asf|asx']  = 'video/x-ms-asf';
    } else {
        unset($mime_types['asf|asx']);
    }

    if(in_array('.wmv', $check_ex_array)){
        $mime_types['wmv']  = 'video/x-ms-wmv';
    } else {
        unset($mime_types['wmv']);
    }

    if(in_array('.wmx', $check_ex_array)){
        $mime_types['wmx']  = 'video/x-ms-wmx';
    } else {
        unset($mime_types['wmx']);
    }

    if(in_array('.wm', $check_ex_array)){
        $mime_types['wm']  = 'video/x-ms-wm';
    } else {
        unset($mime_types['wm']);
    }

    if(in_array('.avi', $check_ex_array)){
        $mime_types['avi']  = 'video/avi';
    } else {
        unset($mime_types['avi']);
    }

    if(in_array('.divx', $check_ex_array)){
        $mime_types['divx']  = 'video/divx';
    } else {
        unset($mime_types['divx']);
    }

    if(in_array('.flv', $check_ex_array)){
        $mime_types['flv']  = 'video/x-flv';
    } else {
        unset($mime_types['flv']);
    }

    if(in_array('.mov / .qt', $check_ex_array)){
        $mime_types['mov|qt']  = 'video/quicktime';
    } else {
        unset($mime_types['mov|qt']);
    }

    if(in_array('.mpeg / .mpg . /mpe', $check_ex_array)){
        $mime_types['mpeg|mpg|mpe']  = 'video/mpeg';
    } else {
        unset($mime_types['mpeg|mpg|mpe']);
    }

    if(in_array('.mp4 / .m4v', $check_ex_array)){
        $mime_types['mp4|m4v']  = 'video/mp4';
    } else {
        unset($mime_types['mp4|m4v']);
    }

    if(in_array('.ogv', $check_ex_array)){
        $mime_types['ogv']  = 'video/ogg';
    } else {
        unset($mime_types['ogv']);
    }

    if(in_array('.webm', $check_ex_array)){
        $mime_types['webm']  = 'video/webm';
    } else {
        unset($mime_types['webm']);
    }

    if(in_array('.mkv', $check_ex_array)){
        $mime_types['mkv']  = 'video/x-matroska';
    } else {
        unset($mime_types['mkv']);
    }

    if(in_array('.3gp / .3gpp', $check_ex_array)){
        $mime_types['3gp|3gpp']  = 'video/3gpp';
    } else {
        unset($mime_types['3gp|3gpp']);
    }

    if(in_array('.3g2 / .3gp2', $check_ex_array)){
        $mime_types['3g2|3gp2']  = 'video/3gpp2';
    } else {
        unset($mime_types['3g2|3gp2']);
    }

    if(in_array('.txt / .asc / .c / .cc / .h / .srt', $check_ex_array)){
        $mime_types['txt|asc|c|cc|h|srt']  = 'text/plain';
    } else {
        unset($mime_types['txt|asc|c|cc|h|srt']);
    }

    if(in_array('.csv', $check_ex_array)){
        $mime_types['csv']  = 'text/csv';
    } else {
        unset($mime_types['csv']);
    }

    if(in_array('.tsv', $check_ex_array)){
        $mime_types['tsv']  = 'text/tab-separated-values';
    } else {
        unset($mime_types['tsv']);
    }

    if(in_array('.ics', $check_ex_array)){
        $mime_types['ics']  = 'text/calendar';
    } else {
        unset($mime_types['ics']);
    }

    if(in_array('.rtx', $check_ex_array)){
        $mime_types['rtx']  = 'text/richtext';
    } else {
        unset($mime_types['rtx']);
    }

    if(in_array('.css', $check_ex_array)){
        $mime_types['css']  = 'text/css';
    } else {
        unset($mime_types['css']);
    }

    if(in_array('.htm / .html', $check_ex_array)){
        $mime_types['htm|html']  = 'text/html';
    } else {
        unset($mime_types['htm|html']);
    }

    if(in_array('.vtt', $check_ex_array)){
        $mime_types['vtt']  = 'text/vtt';
    } else {
        unset($mime_types['vtt']);
    }

    if(in_array('.dfxp', $check_ex_array)){
        $mime_types['dfxp']  = 'application/ttaf+xml';
    } else {
        unset($mime_types['dfxp']);
    }

    if(in_array('.mp3 / .m4a / .m4b', $check_ex_array)){
        $mime_types['mp3|m4a|m4b']  = 'audio/mpeg';
    } else {
        unset($mime_types['mp3|m4a|m4b']);
    }

    if(in_array('.aac', $check_ex_array)){
        $mime_types['aac']  = 'audio/aac';
    } else {
        unset($mime_types['aac']);
    }

    if(in_array('.ra / .ram', $check_ex_array)){
        $mime_types['ra|ram']  = 'audio/x-realaudio';
    } else {
        unset($mime_types['ra|ram']);
    }

    if(in_array('.wav', $check_ex_array)){
        $mime_types['wav']  = 'audio/wav';
    } else {
        unset($mime_types['wav']);
    }

    if(in_array('.ogg / .oga', $check_ex_array)){
        $mime_types['ogg|oga']  = 'audio/ogg';
    } else {
        unset($mime_types['ogg|oga']);
    }

    if(in_array('.flac', $check_ex_array)){
        $mime_types['flac']  = 'audio/flac';
    } else {
        unset($mime_types['flac']);
    }

    if(in_array('.mid / .midi', $check_ex_array)){
        $mime_types['mid|midi']  = 'audio/midi';
    } else {
        unset($mime_types['mid|midi']);
    }

    if(in_array('.wma', $check_ex_array)){
        $mime_types['wma']  = 'audio/x-ms-wma';
    } else {
        unset($mime_types['wma']);
    }

    if(in_array('.wax', $check_ex_array)){
        $mime_types['wax']  = 'audio/x-ms-wax';
    } else {
        unset($mime_types['wax']);
    }

    if(in_array('.mka', $check_ex_array)){
        $mime_types['mka']  = 'audio/x-matroska';
    } else {
        unset($mime_types['mka']);
    }

    if(in_array('.rtf', $check_ex_array)){
        $mime_types['rtf']  = 'application/rtf';
    } else {
        unset($mime_types['rtf']);
    }

    if(in_array('.js', $check_ex_array)){
        $mime_types['js']  = 'application/javascript';
    } else {
        unset($mime_types['js']);
    }

    if(in_array('.pdf', $check_ex_array)){
        $mime_types['pdf']  = 'application/pdf';
    } else {
        unset($mime_types['pdf']);
    }

    if(in_array('.swf', $check_ex_array)){
        $mime_types['swf']  = 'application/x-shockwave-flash';
    } else {
        unset($mime_types['swf']);
    }

    if(in_array('.class', $check_ex_array)){
        $mime_types['class']  = 'application/java';
    } else {
        unset($mime_types['class']);
    }

    if(in_array('.tar', $check_ex_array)){
        $mime_types['tar']  = 'application/x-tar';
    } else {
        unset($mime_types['tar']);
    }

    if(in_array('.zip', $check_ex_array)){
        $mime_types['zip']  = 'application/zip';
    } else {
        unset($mime_types['zip']);
    }

    if(in_array('.gz / .gzip', $check_ex_array)){
        $mime_types['gz|gzip']  = 'application/x-gzip';
    } else {
        unset($mime_types['gz|gzip']);
    }

    if(in_array('.rar', $check_ex_array)){
        $mime_types['rar']  = 'application/rar';
    } else {
        unset($mime_types['rar']);
    }

    if(in_array('.7z', $check_ex_array)){
        $mime_types['7z']  = 'application/x-7z-compressed';
    } else {
        unset($mime_types['7z']);
    }

    if(in_array('.exe', $check_ex_array)){
        $mime_types['exe']  = 'application/x-msdownload';
    } else {
        unset($mime_types['exe']);
    }

    if(in_array('.psd', $check_ex_array)){
        $mime_types['psd']  = 'application/octet-stream';
    } else {
        unset($mime_types['psd']);
    }

    if(in_array('.xcf', $check_ex_array)){
        $mime_types['xcf']  = 'application/octet-stream';
    } else {
        unset($mime_types['xcf']);
    }

    if(in_array('.doc', $check_ex_array)){
        $mime_types['doc']  = 'application/msword';
    } else {
        unset($mime_types['doc']);
    }

    if(in_array('.pot / .pps / .ppt', $check_ex_array)){
        $mime_types['pot|pps|ppt']  = 'application/vnd.ms-powerpoint';
    } else {
        unset($mime_types['pot|pps|ppt']);
    }

    if(in_array('.wri', $check_ex_array)){
        $mime_types['wri']  = 'application/vnd.ms-write';
    } else {
        unset($mime_types['wri']);
    }

    if(in_array('.xlsx', $check_ex_array)){
        $mime_types['xlsx']  = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
    } else {
        unset($mime_types['xlsx']);
    }

    if(in_array('.xla / .xls / .xlt / .xlw', $check_ex_array)){
        $mime_types['xla|xls|xlt|xlw']  = 'application/vnd.ms-excel';
    } else {
        unset($mime_types['xla|xls|xlt|xlw']);
    }

    if(in_array('.mdb', $check_ex_array)){
        $mime_types['mdb']  = 'application/vnd.ms-access';
    } else {
        unset($mime_types['mdb']);
    }

    if(in_array('.mpp', $check_ex_array)){
        $mime_types['mpp']  = 'application/vnd.ms-project';
    } else {
        unset($mime_types['mpp']);
    }

    if(in_array('.doc', $check_ex_array)){
        $mime_types['doc']  = 'application/msword';
    } else {
        unset($mime_types['doc']);
    }

    if(in_array('.docx', $check_ex_array)){
        $mime_types['docx']  = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    } else {
        unset($mime_types['docx']);
    }

    if(in_array('.docm', $check_ex_array)){
        $mime_types['docm']  = 'application/vnd.ms-word.document.macroEnabled.12';
    } else {
        unset($mime_types['docm']);
    }

    if(in_array('.dotx', $check_ex_array)){
        $mime_types['dotx']  = 'application/vnd.openxmlformats-officedocument.wordprocessingml.template';
    } else {
        unset($mime_types['dotx']);
    }

    if(in_array('.dotm', $check_ex_array)){
        $mime_types['dotm']  = 'application/vnd.ms-word.template.macroEnabled.12';
    } else {
        unset($mime_types['dotm']);
    }

    if(in_array('.xlsm', $check_ex_array)){
        $mime_types['xlsm']  = 'application/vnd.openxmlformats-officedocument.wordprocessingml.template';
    } else {
        unset($mime_types['xlsm']);
    }

    if(in_array('.xlsb', $check_ex_array)){
        $mime_types['xlsb']  = 'application/vnd.ms-excel.sheet.binary.macroEnabled.12';
    } else {
        unset($mime_types['xlsb']);
    }

    if(in_array('.xltx', $check_ex_array)){
        $mime_types['xltx']  = 'application/vnd.openxmlformats-officedocument.spreadsheetml.template';
    } else {
        unset($mime_types['xltx']);
    }

    if(in_array('.xltm', $check_ex_array)){
        $mime_types['xltm']  = 'application/vnd.ms-excel.template.macroEnabled.12';
    } else {
        unset($mime_types['xltm']);
    }

    if(in_array('.xlam', $check_ex_array)){
        $mime_types['xlam']  = 'application/vnd.ms-excel.addin.macroEnabled.12';
    } else {
        unset($mime_types['xlam']);
    }

    if(in_array('.pptx', $check_ex_array)){
        $mime_types['pptx']  = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';
    } else {
        unset($mime_types['pptx']);
    }

    if(in_array('.pptm', $check_ex_array)){
        $mime_types['pptm']  = 'application/vnd.ms-powerpoint.presentation.macroEnabled.12';
    } else {
        unset($mime_types['pptm']);
    }

    if(in_array('.ppsx', $check_ex_array)){
        $mime_types['ppsx']  = 'application/vnd.openxmlformats-officedocument.presentationml.slideshow';
    } else {
        unset($mime_types['ppsx']);
    }

    if(in_array('.ppsm', $check_ex_array)){
        $mime_types['ppsm']  = 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12';
    } else {
        unset($mime_types['ppsm']);
    }

    if(in_array('.potx', $check_ex_array)){
        $mime_types['potx']  = 'application/vnd.openxmlformats-officedocument.presentationml.template';
    } else {
        unset($mime_types['potx']);
    }

    if(in_array('.potm', $check_ex_array)){
        $mime_types['potm']  = 'application/vnd.ms-powerpoint.template.macroEnabled.12';
    } else {
        unset($mime_types['potm']);
    }

    if(in_array('.ppam', $check_ex_array)){
        $mime_types['ppam']  = 'application/vnd.ms-powerpoint.addin.macroEnabled.12';
    } else {
        unset($mime_types['ppam']);
    }

    if(in_array('.sldx', $check_ex_array)){
        $mime_types['sldx']  = 'application/vnd.openxmlformats-officedocument.presentationml.slide';
    } else {
        unset($mime_types['sldx']);
    }

    if(in_array('.sldm', $check_ex_array)){
        $mime_types['sldm']  = 'application/vnd.ms-powerpoint.slide.macroEnabled.12';
    } else {
        unset($mime_types['sldm']);
    }

    if(in_array('.onetoc / .onetoc2 / .onetmp / .onepkg', $check_ex_array)){
        $mime_types['onetoc|onetoc2|onetmp|onepkg']  = 'application/onenote';
    } else {
        unset($mime_types['onetoc|onetoc2|onetmp|onepkg']);
    }

    if(in_array('.oxps', $check_ex_array)){
        $mime_types['oxps']  = 'application/oxps';
    } else {
        unset($mime_types['oxps']);
    }

    if(in_array('.xps', $check_ex_array)){
        $mime_types['xps']  = 'application/vnd.ms-xpsdocument';
    } else {
        unset($mime_types['xps']);
    }

    if(in_array('.odt', $check_ex_array)){
        $mime_types['odt']  = 'application/vnd.oasis.opendocument.text';
    } else {
        unset($mime_types['odt']);
    }

    if(in_array('.odp', $check_ex_array)){
        $mime_types['odp']  = 'application/vnd.oasis.opendocument.presentation';
    } else {
        unset($mime_types['odp']);
    }

    if(in_array('.ods', $check_ex_array)){
        $mime_types['ods']  = 'application/vnd.oasis.opendocument.spreadsheet';
    } else {
        unset($mime_types['ods']);
    }

    if(in_array('.odg', $check_ex_array)){
        $mime_types['odg']  = 'application/vnd.oasis.opendocument.graphics';
    } else {
        unset($mime_types['odg']);
    }

    if(in_array('.odc', $check_ex_array)){
        $mime_types['odc']  = 'application/vnd.oasis.opendocument.chart';
    } else {
        unset($mime_types['odc']);
    }

    if(in_array('.odb', $check_ex_array)){
        $mime_types['odb']  = 'application/vnd.oasis.opendocument.database';
    } else {
        unset($mime_types['odb']);
    }

    if(in_array('.odf', $check_ex_array)){
        $mime_types['odf']  = 'application/vnd.oasis.opendocument.formula';
    } else {
        unset($mime_types['odf']);
    }

    if(in_array('.wp / .wpd', $check_ex_array)){
        $mime_types['wp|wpd']  = 'application/wordperfect';
    } else {
        unset($mime_types['wp|wpd']);
    }

    if(in_array('.key', $check_ex_array)){
        $mime_types['key']  = 'application/vnd.apple.keynote';
    } else {
        unset($mime_types['key']);
    }

    if(in_array('.numbers', $check_ex_array)){
        $mime_types['numbers']  = 'application/vnd.apple.numbers';
    } else {
        unset($mime_types['numbers']);
    }

    if(in_array('.pages', $check_ex_array)){
        $mime_types['pages']  = 'application/vnd.apple.pages';
    } else {
        unset($mime_types['pages']);
    }

    // echo "<pre>";
    // print_r($mime_types);
    // echo "</pre>";
    // exit;

    return $mime_types;
}