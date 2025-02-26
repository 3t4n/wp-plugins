<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       automob.co.za
 * @since      1.0.0
 *
 * @package    Automob
 * @subpackage Automob/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Automob
 * @subpackage Automob/admin
 * @author     Luke Madzedze <lukemadzedze@gmail.com>
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Automob_Admin 
{

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) 
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() 
	{

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/automob-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */

	public function enqueue_scripts() 
	{

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/automob-admin.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'amSearchParams', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'site_url' => get_bloginfo('wpurl'),
			'ribbons_base_url' => plugin_dir_url((dirname(__FILE__))).'theme-files/'
		));

	}

	// Register Custom Post Type
	public function register_car() 
	{

		$labels = array(
			'name'                  => _x( 'Cars', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Car', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Car Listings', 'text_domain' ),
			'name_admin_bar'        => __( 'Car', 'text_domain' ),
			'archives'              => __( 'Car Archives', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Cars', 'text_domain' ),
			'add_new_item'          => __( 'Add New Car', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Car', 'text_domain' ),
			'edit_item'             => __( 'Edit Car', 'text_domain' ),
			'update_item'           => __( 'Update Car', 'text_domain' ),
			'view_item'             => __( 'View Car', 'text_domain' ),
			'search_items'          => __( 'Search Car', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Hero Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set hero image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove hero image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as hero image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into car', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this car', 'text_domain' ),
			'items_list'            => __( 'Car list', 'text_domain' ),
			'items_list_navigation' => __( 'Car list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Car list', 'text_domain' ),
		);
		   
		$args = array(
			'label'                 => __( 'Car', 'text_domain' ),
			'description'           => __( 'Vehicle in stock for sale', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor','thumbnail'  ),
			'taxonomies'            => array(false),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 0,
			'menu_icon'         => plugin_dir_url( __FILE__).'img/car-icon.png',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type(AUTOMOB_CPT_CAR, $args );

	}

	public function menu()
	{
		$subpages = new AutomobSubPages();
		add_submenu_page( 'edit.php?post_type='.AUTOMOB_CPT_CAR, 'Automob Settings', 'Automob Settings', 'edit_pages', 'plugin_options', array($subpages,'settings') );
	}

	public function add_tabs()
	{
		$metaboxes = new Automob_Metaboxes();
		add_meta_box( "am-admin-tabs", "Title", array($metaboxes,'add_tabs_markup'), AUTOMOB_CPT_CAR, 'normal', 'high');
		// add_meta_box( "am-admin-publish-panel", "After you make your changes click the \"Update Automob\" button.", array($metaboxes,'add_publish_panel_markup'), AUTOMOB_CPT_CAR, 'normal', 'high');
	}

	
	public  function register_settings() 
	{
			register_setting( 'automob_general_settings', 'contact_email'); 
			register_setting( 'automob_general_settings', 'currency_symbol'); 
			register_setting( 'automob_general_settings', 'max-vehicles');
			register_setting( 'automob_general_settings', 'show-sold-cars');
			register_setting( 'automob_general_settings', 'search_results_page');
			register_setting( 'automob_general_settings', 'distance_unit');

			register_setting( 'automob_general_settings', 'decimal-separater');
			register_setting( 'automob_general_settings', 'thousands_separater');
			
			
	} 

	public function edit_vehicles_for_sale_columns( $columns ) 
	{

		$columns = array(
			'cb' => '<input type="checkbox" />',
			'featured_image' => __( '' ),
			'title' => __( 'Title' ),
			'price' => __( 'Asking Price' ),
			'mileage' => __( 'Mileage' ),
			'date' => __( 'Date' )
		);

		return $columns;
	}


	public function manage_vehicles_for_sale_columns( $column, $post_id ) 
	{
		global $post;

		switch( $column ) {
			case 'price' :
				$price = get_post_meta( $post_id, '_am_asking_price', true );

				if ( empty( $price ) )
					echo __( 'Unknown' );
				else
					printf( __( '%s' ), get_option('currency_symbol').$price );

				break;
			case 'mileage' :
				$mileage = get_post_meta( $post_id, '_am_mileage', true );

				if ( empty( $mileage ) )
					echo __( 'Unknown' );
				else
					printf( __( '%s' ), $mileage );

				break;
			case 'featured_image':
			    $post_thumbnail_id = get_post_thumbnail_id($post_id);
			    if ($post_thumbnail_id) {
			        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
			        echo '<img height="120px" src="' . $post_thumbnail_img[0] . '" />';
			    }
				break;

			/* Just break out of the switch statement for everything else. */
			default :
				break;
		}
	}


	function yourprefix_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<div class="custom-field-row <?php echo $classes; ?>">
		<p><label for="<?php echo $id; ?>"><?php echo $label; ?></label></p>
		<p><input id="<?php echo $id; ?>" type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>"/></p>
		<p class="description"><?php echo $description; ?></p>
	</div>
	<?php
}
		

	public function test()
	{
		// $carTable = new Automob_Car_Table();
		// $cars = $carTable->getAll();
		// $prices = array();
		// foreach ($cars as $car) 
		// {
		// 	$prices[] = $car->asking_price;			
		// }

		//  print_r($prices);die();
		 
	}



}
