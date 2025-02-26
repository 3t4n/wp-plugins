<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Alcud_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @var      string    $plugin_name       The name of this plugin.
	 * @var      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->plugin_slug = 'alcud';
		$plugin_screen_hook_suffix = null;

	}

	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name . 'slick', plugin_dir_url( __FILE__ ) . 'css/slick.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/alcud-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_slug . '-admin-script-serializeJSON', plugins_url( 'js/jquery_serializeJSON.js', __FILE__ ), array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . 'slick', plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/alcud-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_plugin_admin_menu(){
		$this->plugin_screen_hook_suffix = add_menu_page(
			__( 'AL-CUD', $this->plugin_slug ),
			__( 'AL-CUD', $this->plugin_slug ),
			'edit_others_posts',
			$this->plugin_slug,
			array( $this, 'display_plugin_admin_page' ),
			'',
			"12.12"
			);
	}

	public function display_plugin_admin_page() {
		global $wpdb;
		$table_name = $wpdb->prefix . "alcud"; 
		$detail = $wpdb->get_row( "SELECT * FROM $table_name WHERE id = 1");

		$business_name = "";
		$contact_person = "";
		$email_address = "";
		$contact_number = "";
		$address = "";
		$open_hours = "";
		$note = "";

		if($detail){
			$business_name = $detail->business_name;
			$contact_person = $detail->contact_person;
			$email_address = $detail->email_address;
			$contact_number = $detail->contact_number;
			$address = $detail->address;
			$open_hours = $detail->open_hours;
			$note = $detail->note;
		}

		global $wpdb;
		$table_name = $wpdb->prefix . "alcud_options"; 
		$detail = $wpdb->get_row( "SELECT * FROM $table_name WHERE id = 1");

		$widget_type = "";

		if($detail){
			$widget_type = $detail->widget_type;
		}


		$img_url = plugin_dir_url( __FILE__ ) . 'images/';
		include_once( 'partials/alcud-admin-display.php' );
	}

	public function action_add_details() {
		global $wpdb;

		$str = $_POST['form_data'];
		$str = (string)str_replace("\\","", $str);
		$data =json_decode($str, true);

		$business_name = "";
		$contact_person = "";
		$email_address = "";
		$contact_number = "";
		$address = "";
		$open_hours = "";
		$note = "";


		if(isset($data['business_name']))
			$business_name = $data['business_name'];

		if(isset($data['contact_person']))
			$contact_person = $data['contact_person'];

		if(isset($data['email_address']))
			$email_address = $data['email_address'];
		
		if(isset($data['contact_number']))
			$contact_number = $data['contact_number'];

		if(isset($data['address']))
			$address = $data['address'];

		if(isset($data['open_hours']))
			$open_hours = $data['open_hours'];

		if(isset($data['note']))
			$note = $data['note'];


		// status variable values: NULL, transfered
		$table_name = $wpdb->prefix . "alcud"; 

		$counter = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE id = 1");
		if(!$counter) {
			$result = $wpdb->insert($table_name,
				array(
					'business_name'=> $business_name,
					'contact_person'=> $contact_person,
					'contact_number'=> $contact_number,
					'email_address'=> $email_address,
					'address' => $address,
					'open_hours' => $open_hours,
					'note' => $note
					)
				);
			$lastid = $wpdb->insert_id;
			echo $lastid;
		}

		else{			
			$result = $wpdb->update($table_name,
				array(
					'business_name'=> $business_name,
					'contact_person'=> $contact_person,
					'contact_number'=> $contact_number,
					'email_address'=> $email_address,
					'address' => $address,
					'open_hours' => $open_hours,
					'note' => $note
					),
				array('id' => 1)
				);
			echo $result;
		}	
	}

	public function action_select_widget() {
		global $wpdb;

		$data = $_POST['widget_type'];
		if(isset($data))
			$widget_type = $data;


		$table_name = $wpdb->prefix . "alcud_options"; 

		$counter = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE id = 1");
		if(!$counter) {
			$result = $wpdb->insert($table_name, array('widget_type'=> $widget_type));
		}

		else{			
			$result = $wpdb->update($table_name,
				array('widget_type'=> $widget_type),
				array('id' => 1)
				);
		}
	}
}
