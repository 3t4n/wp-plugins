<?php

/**
 * The public-specific functionality of the plugin.
 *
 * @link       http://codexinfra.com
 * @since      1.0.0
 *
 * @package    Ciwcamp_Affliate_Manager
 * @subpackage Ciwcamp_Affliate_Manager/public
 */

/**
 * The public-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-specific stylesheet and JavaScript.
 *
 * @package    Ciwcamp_Affliate_Manager
 * @subpackage Ciwcamp_Affliate_Manager/public
 * @author     CodexInfra <developers@codexinfra.com>
 */
class Ciwcamp_Affliate_Manager_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $ciwcamp_plugin_name    The ID of this plugin.
	 */
	private $ciwcamp_plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $ciwcamp_version    The current version of this plugin.
	 */
	private $ciwcamp_version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $ciwcamp_plugin_name       The name of this plugin.
	 * @param      string    $ciwcamp_version    The version of this plugin.
	 */
	public function __construct( $ciwcamp_plugin_name, $ciwcamp_version ) {

		$this->ciwcamp_plugin_name = $ciwcamp_plugin_name;
		$this->ciwcamp_version = $ciwcamp_version;

	}

	/**
	 * Register the stylesheets for the public area.
	 *
	 * @since    1.0.0
	 */
	public function ciwcamp_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the ciwcamp_run() function
		 * defined in Affliate_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Affliate_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		global $post;
		$ciwcamp_post_slug = $post->post_name;
		if($ciwcamp_post_slug == "affiliate-dashboard")
		{
			wp_enqueue_style( 'ciwcamp-bootstrap', CIWCAMP_ASSETS_COMMON . '/css/mdb-bootstrap.min.css' );
			wp_enqueue_style( 'ciwcamp-font-awesome-min', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css' );
			wp_enqueue_style( 'ciwcamp-datatable', plugin_dir_url( __FILE__ ) . '/css/jquery.dataTables.min.css' );
			wp_enqueue_style( 'ciwcamp-mdb-min', plugin_dir_url( __FILE__ ) . '/css/mdb.min.css' );
			wp_enqueue_style( 'ciwcamp-style', plugin_dir_url( __FILE__ ) . '/css/style.css' );
			wp_enqueue_style( 'ciwcamp-datatable', plugin_dir_url( __FILE__ ) . 'css/datatables.min.css' );
			wp_enqueue_style( 'ciwcamp-datatable-select', plugin_dir_url( __FILE__ ) . 'css/datatables-select.min.css' );
			wp_enqueue_style( 'ciwcamp-toastr', plugin_dir_url( __FILE__ ) . 'css/toastr.css' );
			wp_enqueue_style( 'ciwcamp-material-icons', plugin_dir_url( __FILE__ ) . 'css/material-icons.css' );
		}
		else
		{
			wp_enqueue_style( 'ciwcamp-style', plugin_dir_url( __FILE__ ) . '/css/style.css' );
		}	
		
	}

	/**
	 * Register the JavaScript for the public area.
	 *
	 * @since    1.0.0
	 */
	public function ciwcamp_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the ciwcamp_run() function
		 * defined in Affliate_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Affliate_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		
		global $post;
		$ciwcamp_post_slug = $post->post_name;

		if($ciwcamp_post_slug == "affiliate-dashboard")
		{
			wp_enqueue_script( $this->ciwcamp_plugin_name, plugin_dir_url( __FILE__ ) . 'js/ciwcamp-affiliate-main.js', array('jquery'));

			wp_localize_script(  $this->ciwcamp_plugin_name, 'ciwcamp_ajax_object', array( 'ciwcamp_ajax_url' => admin_url( 'admin-ajax.php' ), 'ciwcamp_nonce' => wp_create_nonce('ciwcamp-nonce-creation') ) );
		
			wp_localize_script(
				$this->ciwcamp_plugin_name,
				'ciwcamp_notification_object',
				array('ciwcamp_ajax_url' => admin_url('admin-ajax.php'), 'ciwcamp_public_page_nonce' => wp_create_nonce("ciwcamp-affiliate-general"), 'ciwcamp_translatable_strings'=> $this->ciwcamp_affiliate_translatable_js_strings())
			);
			
			wp_enqueue_script( 'ciwcamp-affiliate-profile', plugin_dir_url( __FILE__ ) . 'js/ciwcamp-affiliate-profile.js', array('jquery'));

			wp_enqueue_script( 'ciwcamp-affiliate-dashboard', plugin_dir_url( __FILE__ ) . 'js/ciwcamp-affiliate-dashboard.js', array('jquery'));
			
			wp_enqueue_script( 'ciwcamp-popper-min', plugin_dir_url( __FILE__ ) . 'js/popper.min.js', array('jquery'));

			wp_enqueue_script( 'ciwcamp-mdb-bootstrap', CIWCAMP_ASSETS_COMMON . '/js/mdb-bootstrap.min.js', array('jquery'));

			wp_enqueue_script( 'ciwcamp-datatable', plugin_dir_url( __FILE__ ) . 'js/datatables.min.js', array('jquery'));

			wp_enqueue_script( 'ciwcamp-datatable-select', plugin_dir_url( __FILE__ ) . 'js/datatables-select.min.js', array('jquery'));

			wp_enqueue_script( 'ciwcamp-MDB', plugin_dir_url( __FILE__ ) . 'js/mdb.js', array('jquery'));

			wp_enqueue_script( 'ciwcamp-toastr-min', plugin_dir_url( __FILE__ ) . 'js/toastr.min.js', array('jquery'));
		}
		
	}
	
	
	/**
	 * this function is used for User Regsitration Upside
	 *
	 * @since    1.0.0
	 */

	public function ciwcamp_add_register_fields_upside_cb()
	{
			woocommerce_form_field(
				'ciwcamp_reg_first_name',
				array(
					'type'        => 'text',
					'required'    => true,
					'label'       => 'First Name'
				),
				( isset($_POST['ciwcamp_reg_first_name']) ? sanitize_text_field($_POST['ciwcamp_reg_first_name']) : '' )
			);

			woocommerce_form_field(
				'ciwcamp_reg_last_name',
				array(
					'type'        => 'text',
					'required'    => true,
					'label'       => 'Last Name'
				),
				( isset($_POST['ciwcamp_reg_last_name']) ? sanitize_text_field($_POST['ciwcamp_reg_last_name']) : '' )
			);

			woocommerce_form_field(
				'ciwcamp_reg_contact',
				array(
					'type'        => 'number',
					'required'    => true,
					'label'       => 'Contact'
				),
				( isset($_POST['ciwcamp_reg_contact']) ? sanitize_text_field($_POST['ciwcamp_reg_contact']) : '' )
			);

			woocommerce_form_field(
				'ciwcamp_reg_payment_email',
				array(
					'type'        => 'text',
					'required'    => true,
					'label'       => 'Payment Email Address'
				),
				( isset($_POST['ciwcamp_reg_payment_email']) ? sanitize_email($_POST['ciwcamp_reg_payment_email']) : '' )
			);
			
	}

	
	/**
	 * this function is used for Translatable strings
	 *
	 * @since    1.0.0
	 */


	public function ciwcamp_affiliate_translatable_js_strings()
	{
		$ciwcamp_affiliate_js_translatable_val =  include_once CIWCAMP_PLUGIN_DIR.'public/partials/ciwcamp-translatable-string.php';
		return $ciwcamp_affiliate_js_translatable_val;
	}


	/**
	 * this function is used for User Regsitration Downside
	 *
	 * @since    1.0.0
	 */

	public function ciwcamp_add_register_fields_downside_cb()
	{

		woocommerce_form_field( 'affiliate_registration', array( 
			'type' => 'checkbox', 
			'class' => array('input-checkbox'), 
			'label' => __('Affiliate Regsitration'), 
			'required' => false, 
			'value'  => 'pending', 
			'default' => '1' 
			), 'whatever');
			
	}


	/**
	 * this function is used for User Regsitration Validation
	 *
	 * @since    1.0.0
	 */
	
	public function ciwcamp_register_validation_cb ($username, $email, $errors)
	{
		
		if ( empty( $_POST['ciwcamp_reg_first_name'] ) ) 
		{
			$errors->add( 'ciwcamp_reg_first_name_error', 'First Name is required!' );
		}
		elseif ( empty( $_POST['ciwcamp_reg_last_name'] ) ) 
		{
			$errors->add( 'ciwcamp_reg_last_name_error', 'Last Name is required!' );
		}
		elseif ( empty( $_POST['ciwcamp_reg_contact'] ) ) 
		{
			$errors->add( 'ciwcamp_reg_contact_error', 'Contact is required!' );
		}
		elseif ( empty( $_POST['ciwcamp_reg_payment_email'] ) ) 
		{
			$errors->add( 'ciwcamp_reg_payment_email_error', 'Email is required!' );
		}
	}


	/**
	 *  this function is used for User Regsitration
	 *
	 * @since    1.0.0
	 */

	public function ciwcamp_account_registration_cb ($customer_id)
	{
		if ( isset( $_POST['ciwcamp_reg_first_name'] ) ) {
			update_user_meta( $customer_id, 'first_name', wc_clean( $_POST['ciwcamp_reg_first_name'] ) );
		}
		if ( isset( $_POST['ciwcamp_reg_last_name'] ) ) {
			update_user_meta( $customer_id, 'last_name', wc_clean( $_POST['ciwcamp_reg_last_name'] ) );
		}
		if ( isset( $_POST['ciwcamp_reg_contact'] ) ) {
			update_user_meta( $customer_id, 'ciwcamp_reg_contact', wc_clean( $_POST['ciwcamp_reg_contact'] ) );
		}
		if ( isset( $_POST['ciwcamp_reg_payment_email'] ) ) {
			update_user_meta( $customer_id, 'ciwcamp_affiliate_payment_email', sanitize_email( $_POST['ciwcamp_reg_payment_email'] ) );
		}
		if ( isset( $_POST['affiliate_registration'] ) ) {
			update_user_meta( $customer_id, 'ciwcamp_affiliate_registration', wc_clean( $_POST['affiliate_registration'] ) );
		}
		$ciwcamp_level_data = get_option("ciwcamp-signup-bonus");

		if(!empty($ciwcamp_level_data))
		{
			global $wpdb;
				$ciwcamp_table_name = $wpdb->prefix."ciwcamp_sales";
				$wpdb->query( $wpdb->prepare( "  
				INSERT INTO $ciwcamp_table_name
				( affiliate_id, commission, status, source)
				VALUES ( %s, %s, %s)", 
				$customer_id,  $ciwcamp_level_data, "Approved", "Signup Bonus" ) );
		}
	}


	/**
	 *  this function is used for Affiliate dashboard URL
	 *
	 * @since    1.0.0
	 */

	public function ciwcamp_affiliate_dashboard_hook_endpoint( $url, $endpoint, $value, $permalink )
	{
		if( $endpoint === 'ciwcamp_affiliate_dashboard' )
		{
	 
			$url = site_url();
	 
		}
		return $url;
	}


	/**
	 *  this function is used for Affiliate Custom template
	 *
	 * @since    1.0.0
	 */

	public function ciwcamp_custom_template($ciwcamp_templates, $wp_theme, $post, $post_type)
	{
		$ciwcamp_templates['ciwcamp-custom-template.php'] = esc_html__( 'Affiliate Dashboard','ciwcamp-affliate-manager' );
    	return $ciwcamp_templates;
	}


	/**
	 *  this function is used for redirect on custom template page
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_redirect_page_template ($ciwcamp_template) {

		global $wpdb;

		if (get_page_template_slug() === 'ciwcamp-custom-template.php')
		{		
			if ($ciwcamp_theme_file = locate_template(array('ciwcamp-custom-template.php'))) 
			{
				$ciwcamp_template = $ciwcamp_theme_file;
			} 
			else 
			{
				$ciwcamp_template = CIWCAMP_PLUGIN_DIR.'public/partials/ciwcamp-custom-template.php';
			}
		}
		return $ciwcamp_template;
	}


	/**
	 *  this function is used for Affiliate dashbaord page count data
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_affiliate_dashboard_count_cb()
	{ 
		if(isset($_POST['ciwcamp_affiliate_dash']) && !empty($_POST['ciwcamp_affiliate_dash']))
		{ 
			global $wpdb;
			$ciwcamp_affiliate_id = get_current_user_id();
			$ciwcamp_visits_query = "SELECT COUNT(*) AS total_visits FROM " . $wpdb->prefix . "ciwcamp_visits WHERE affiliate_id = %s";
			$ciwcamp_visits_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_visits_query, $ciwcamp_affiliate_id ) ); 
			$ciwcamp_total_visits = $ciwcamp_visits_data[0]->total_visits;

			$ciwcamp_sales_query = "SELECT COUNT(*) AS total_sales FROM ".$wpdb->prefix . "ciwcamp_sales WHERE affiliate_id = %s AND status =%s AND source = %s";
			$ciwcamp_sales_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_sales_query, $ciwcamp_affiliate_id, "Approved", "sale" ) ); 
			$ciwcamp_total_sales = $ciwcamp_sales_data[0]->total_sales;

			$ciwcamp_earning_query = "SELECT SUM(commission) AS total_earning FROM ".$wpdb->prefix . "ciwcamp_sales WHERE affiliate_id = %s AND status =%s";
			$ciwcamp_earning_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_earning_query, $ciwcamp_affiliate_id, "Approved"  ) );
			$ciwcamp_total_earning = $ciwcamp_earning_data[0]->total_earning; 
			
			$ciwcamp_balance_query = "SELECT SUM(withdraw_amt) AS withdraw_amt FROM ".$wpdb->prefix . "ciwcamp_withdraw WHERE affiliate_id = %s AND status =%s";
			$ciwcamp_balance_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_balance_query, $ciwcamp_affiliate_id, "Approved" ) ); 
			$ciwcamp_affiliate_balance = $ciwcamp_earning_data[0]->total_earning - $ciwcamp_balance_data[0]->withdraw_amt;
			if(empty($ciwcamp_total_earning))
			{
				$ciwcamp_total_earning=0;
			}
			echo json_encode(array($ciwcamp_total_visits, $ciwcamp_total_sales, $ciwcamp_total_earning, $ciwcamp_affiliate_balance));
			wp_die();
		}
		wp_die();
	}


	/**
	 *  this function is used for Affiliate dahsboard visits and sales line chart
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_affiliate_sales_and_visits_cb()
	{ 
		include_once CIWCAMP_PLUGIN_DIR.'public/partials/Affiliate-Functionality/ciwcamp-affiliate-sales-visits-graph.php';
	}


	/**
	 *  this function is used for Affiliate earning bar chart
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_my_earnings_cb()
	{
		include_once CIWCAMP_PLUGIN_DIR.'public/partials/Affiliate-Functionality/ciwcamp-affiliate-earnings-graph.php';
	}


	/**
	 *  this function is used for affiliate sales list url Ajax
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_sale_list_cb()
	{ 
		if(isset($_POST['ciwcamp_status']) && !empty($_POST['ciwcamp_status']))
		{
			$ciwcamp_status = sanitize_text_field( $_POST['ciwcamp_status'] );

			$ciwcamp_affiliate_id = get_current_user_id();

			global $wpdb;

			$table = $wpdb->prefix .'posts';

			$primaryKey = 'ID';

			$columns = array(
				array( 'db' => 'order_id',  'dt' => 0, 'field' => 'order_id' ),
				array( 'db' => 'product_id', 'dt' => 1, 'field' => 'product_id' ),
				array( 'db' => 'commission', 'dt' => 2, 'field' => 'commission' ),					
				array( 'db' => 'created_date',  'dt' => 3, 'field' => 'created_date' ),
				array( 'db' => 'status',  'dt' => 4, 'field' => 'status' ),

				); 

			$sql_details = array(
				'user' => DB_USER,
				'pass' => DB_PASSWORD,
				'db'   => DB_NAME,
				'host' => DB_HOST
			);
		
			$join = "FROM ".$wpdb->prefix ."ciwcamp_sales";
		
			if($ciwcamp_status == "all")
			{
				$where ="affiliate_id = '$ciwcamp_affiliate_id' AND source = 'sale'";
			}
			else
			{
				$where ="affiliate_id = '$ciwcamp_affiliate_id' AND source = 'sale' AND status = '$ciwcamp_status' ";
			}
			
			include_once( CIWCAMP_PLUGIN_DIR.'public/ssp/ssp.customized.class.php' );

			$ciwcamp_sales_data_ssp =  SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $join, $where );

			if( isset($ciwcamp_sales_data_ssp) && !empty($ciwcamp_sales_data_ssp) )
			{
				if( isset($ciwcamp_sales_data_ssp['data']) && is_array($ciwcamp_sales_data_ssp['data']) && !empty($ciwcamp_sales_data_ssp['data']) )
				{
					$i = 0;
					{
						if( isset($ciwcamp_sales_data_ssp['data'][$i]) )
						{
							
							foreach( $ciwcamp_sales_data_ssp['data'] as $ciwcamp_sales )
							{	
								
								if( isset($ciwcamp_sales) && !empty($ciwcamp_sales) )
								{		
									if( isset($ciwcamp_sales[0]) && !empty($ciwcamp_sales[0]) )
									{
										$ciwcamp_sales_data_ssp['data'][$i][0] = "#".$ciwcamp_sales[0];
									}
									if( isset($ciwcamp_sales[1]) && !empty($ciwcamp_sales[1]))
									{
										$ciwcamp_sales_data_ssp['data'][$i][1] = "#1".$ciwcamp_sales[1]." ".get_the_title($ciwcamp_sales[1]);
									}
									if( isset($ciwcamp_sales[2]) && !empty($ciwcamp_sales[2]))
									{
										$ciwcamp_sales_data_ssp['data'][$i][2] = get_woocommerce_currency_symbol()." ".$ciwcamp_sales[2];
									}
									if( isset($ciwcamp_sales[3]) && !empty($ciwcamp_sales[3]))
									{
										$ciwcamp_sales_data_ssp['data'][$i][3] =date_format(date_create($ciwcamp_sales[3]),"d-m-Y") ;
									}
									
								}
								$i++;
							}
						}
					}
				}
			}

			echo json_encode($ciwcamp_sales_data_ssp);
			wp_die();
		}
	}


	/**
	 *  this function is used for affiliate earnings list url Ajax
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_earnings_list_cb()
	{
		if(isset($_POST['ciwcamp_type']) && !empty($_POST['ciwcamp_type']))
		{
			$ciwcamp_type = sanitize_text_field( $_POST['ciwcamp_type'] );

			$ciwcamp_affiliate_id = get_current_user_id();

			global $wpdb;

			$table = $wpdb->prefix .'posts';

			$primaryKey = 'ID';

			$columns = array(
				array( 'db' => 'commission',  'dt' => 0, 'field' => 'commission' ),
				array( 'db' => 'source', 'dt' => 1, 'field' => 'source' ),
				array( 'db' => 'created_date', 'dt' => 2, 'field' => 'created_date' ),					

				); 

			$sql_details = array(
				'user' => DB_USER,
				'pass' => DB_PASSWORD,
				'db'   => DB_NAME,
				'host' => DB_HOST
			);
		
			$join = "FROM ".$wpdb->prefix ."ciwcamp_sales";

			if($ciwcamp_type=="all")
			{
				$where ="affiliate_id = '$ciwcamp_affiliate_id' AND status = 'Approved'";
			}
			else
			{
				$where ="affiliate_id = '$ciwcamp_affiliate_id' AND source = '$ciwcamp_type' AND status = 'Approved' ";
			}
			
			include_once( CIWCAMP_PLUGIN_DIR.'public/ssp/ssp.customized.class.php' );

			$ciwcamp_earnings_data_ssp =  SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $join, $where );

			if( isset($ciwcamp_earnings_data_ssp) && !empty($ciwcamp_earnings_data_ssp) )
			{
				if( isset($ciwcamp_earnings_data_ssp['data']) && is_array($ciwcamp_earnings_data_ssp['data']) && !empty($ciwcamp_earnings_data_ssp['data']) )
				{
					$i = 0;
					{
						if( isset($ciwcamp_earnings_data_ssp['data'][$i]) )
						{
							
							foreach( $ciwcamp_earnings_data_ssp['data'] as $ciwcamp_earnings )
							{	
								
								if( isset($ciwcamp_earnings) && !empty($ciwcamp_earnings) )
								{		
									if( isset($ciwcamp_earnings[0]) && !empty($ciwcamp_earnings[0]) )
									{
										$ciwcamp_earnings_data_ssp['data'][$i][0] = get_woocommerce_currency_symbol()." ".$ciwcamp_earnings[0];
									}
									if( isset($ciwcamp_earnings[1]) && !empty($ciwcamp_earnings[1]))
									{
										$ciwcamp_earning_source = "";
										if($ciwcamp_earnings[1]== "mlm")
										{
											$ciwcamp_earning_source = "MLM";
										}
										if($ciwcamp_earnings[1]== "reward")
										{
											$ciwcamp_earning_source = "Reward";
										}
										if($ciwcamp_earnings[1]== "sale")
										{
											$ciwcamp_earning_source = "Product Sale";
										}
										$ciwcamp_earnings_data_ssp['data'][$i][1] = $ciwcamp_earning_source;
									}
									if( isset($ciwcamp_earnings[2]) && !empty($ciwcamp_earnings[2]))
									{
										$ciwcamp_earnings_data_ssp['data'][$i][2] = date_format(date_create($ciwcamp_earnings[2]),"d-m-Y") ;
									}
								}
								$i++;
							}
						}
					}
				}
			}

			echo json_encode($ciwcamp_earnings_data_ssp);
			wp_die();
		}
	}


	/**
	 *  this function is used for affiliate withdraw list url Ajax
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_affiliate_withdraw_request_list_cb()
	{
		if(isset($_POST['ciwcamp_status']) && !empty($_POST['ciwcamp_status']))
		{
			$ciwcamp_status = sanitize_text_field( $_POST['ciwcamp_status'] );

			$ciwcamp_affiliate_id = get_current_user_id();

			global $wpdb;

			$table = $wpdb->prefix .'ciwcamp_withdraw';

			$primaryKey = 'withdraw_id';

			$columns = array(
				array( 'db' => 'withdraw_id',  'dt' => 0, 'field' => 'withdraw_id' ),
				array( 'db' => 'withdraw_amt',  'dt' => 1, 'field' => 'withdraw_amt' ),
				array( 'db' => 'withdraw_method',  'dt' => 2, 'field' => 'withdraw_method' ),
				array( 'db' => 'created_date', 'dt' => 3, 'field' => 'created_date' ),
				array( 'db' => 'status', 'dt' => 4, 'field' => 'status' ),					
				array( 'db' => 'modified_date',  'dt' => 5, 'field' => 'modified_date' )
				); 

			$sql_details = array(
				'user' => DB_USER,
				'pass' => DB_PASSWORD,
				'db'   => DB_NAME,
				'host' => DB_HOST
			);
		
			$join = "FROM ".$wpdb->prefix ."ciwcamp_withdraw";

			if($ciwcamp_status=="all")
			{		
				$where ="affiliate_id = '$ciwcamp_affiliate_id'";
			}
			else
			{
				$where ="status = '$ciwcamp_status'";	
			}
			
			include_once( CIWCAMP_PLUGIN_DIR.'public/ssp/ssp.customized.class.php' );

			$ciwcamp_withdraw_data_ssp =  SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $join, $where );

			if( isset($ciwcamp_withdraw_data_ssp) && !empty($ciwcamp_withdraw_data_ssp) )
			{
				if( isset($ciwcamp_withdraw_data_ssp['data']) && is_array($ciwcamp_withdraw_data_ssp['data']) && !empty($ciwcamp_withdraw_data_ssp['data']) )
				{
					$i = 0;
					{
						if( isset($ciwcamp_withdraw_data_ssp['data'][$i]) )
						{
							
							foreach( $ciwcamp_withdraw_data_ssp['data'] as $ciwcamp_withdraw_data )
							{	
								
								if( isset($ciwcamp_withdraw_data) && !empty($ciwcamp_withdraw_data) )
								{
									if( isset($ciwcamp_withdraw_data[0]) && !empty($ciwcamp_withdraw_data[0]) )
									{
										$ciwcamp_withdraw_data_ssp['data'][$i][0] = "#".$ciwcamp_withdraw_data[0];
									}			
									if( isset($ciwcamp_withdraw_data[1]) && !empty($ciwcamp_withdraw_data[1]) )
									{
										$ciwcamp_withdraw_data_ssp['data'][$i][1] = get_woocommerce_currency_symbol()."".$ciwcamp_withdraw_data[1];
									}
									if( isset($ciwcamp_withdraw_data[2]) && !empty($ciwcamp_withdraw_data[2]))
									{
										$ciwcamp_withdraw_data_ssp['data'][$i][2] = $ciwcamp_withdraw_data[2];
									}
									if( isset($ciwcamp_withdraw_data[3]) && !empty($ciwcamp_withdraw_data[3]))
									{
										$ciwcamp_withdraw_data_ssp['data'][$i][3] = date_format(date_create($ciwcamp_withdraw_data[3]),"d-m-Y") ;
									}
									if( isset($ciwcamp_withdraw_data[4]) && !empty($ciwcamp_withdraw_data[4]))
									{
										$ciwcamp_withdraw_data_ssp['data'][$i][4] = $ciwcamp_withdraw_data[4];
									}
									if( isset($ciwcamp_withdraw_data[5]) && !empty($ciwcamp_withdraw_data[5]))
									{
										$ciwcamp_withdraw_data_ssp['data'][$i][5] =date_format(date_create($ciwcamp_withdraw_data[5]),"d-m-Y") ;
									}
								}
								$i++;
							}
						}
					}
				}
			}

			 echo json_encode($ciwcamp_withdraw_data_ssp);

		wp_die();
		}
	
	}



	/**
	 *  this function is used for withdraw request
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_withdraw_amt_req_cb()
	{
		if( isset($_POST['ciwcamp_withdraw_amt']) && !empty($_POST['ciwcamp_withdraw_amt'])  && isset($_POST['ciwcamp_withdraw_method']) && !empty($_POST['ciwcamp_withdraw_method']) )
		{
			$ciwcamp_affiliate_id = get_current_user_id();

			$ciwcamp_withdraw_amt = sanitize_text_field( $_POST['ciwcamp_withdraw_amt'] );

			$ciwcamp_withdraw_method = sanitize_text_field( $_POST['ciwcamp_withdraw_method'] );
			
			global $wpdb;

			$ciwcamp_earning_query = "SELECT SUM(commission) AS total_earning FROM ".$wpdb->prefix . "ciwcamp_sales WHERE affiliate_id = %s";
			$ciwcamp_earning_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_earning_query, $ciwcamp_affiliate_id ) ); 

			$ciwcamp_balance_query = "SELECT SUM(withdraw_amt) AS withdraw_amt FROM ".$wpdb->prefix . "ciwcamp_withdraw WHERE affiliate_id = %s AND status =%s";
			$ciwcamp_balance_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_balance_query, $ciwcamp_affiliate_id, "Approved" ) ); 


			$ciwcamp_affiliate_balance = $ciwcamp_earning_data[0]->total_earning - $ciwcamp_balance_data[0]->withdraw_amt;

			if($ciwcamp_withdraw_amt<=$ciwcamp_affiliate_balance)
			{	
		
				$ciwcamp_table_name = $wpdb->prefix . "ciwcamp_withdraw";

				$wpdb->insert( $ciwcamp_table_name, array(
					'affiliate_id' => $ciwcamp_affiliate_id, 
					'withdraw_amt' => $ciwcamp_withdraw_amt,
					'withdraw_method' =>$ciwcamp_withdraw_method),
					array( '%s', '%s', '%s')
				);
				echo json_encode(1);
				wp_die();
			}
			else
			{
				echo json_encode(0);
				wp_die();
			}
			wp_die();
		}

	}


	/**
	 *  this function is used for visit 
	 *
	 * @since    1.0.0
	 */

	public function ciwcamp_get_referral_url()
	{
		$ciwcamp_current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 

		$ciwcamp_array_url = explode("/?Aff-",$ciwcamp_current_url);
		
		if(!isset($ciwcamp_array_url[1]))
		{
			$ciwcamp_array_url[1] = "";
		}
		
		$ciwcamp_affiliate_id = $ciwcamp_array_url[1];
		$ciwcamp_cookie_name = "affiliate_id";
		$ciwcamp_cookie_data = $ciwcamp_affiliate_id;
		
		if(!empty($ciwcamp_affiliate_id))
		{
			$ciwcamp_cookie_expiry_time = (int)get_option("ciwcamp-cookie-time");

			if(empty($ciwcamp_cookie_expiry_time))
			{
				$ciwcamp_cookie_expiry_time = 1;
			}
			setcookie(
				$ciwcamp_cookie_name,
				$ciwcamp_cookie_data,
				time() + (86400 * 30)*($ciwcamp_cookie_expiry_time)
			);
			global $wpdb;
			$ciwcamp_table_name = $wpdb->prefix . "ciwcamp_visits";
			
			$wpdb->insert( $ciwcamp_table_name, array(
				'visitor_id' => get_current_user_id(), 
				'affiliate_id' => $ciwcamp_affiliate_id ),
				array( '%d', '%d')
			);
		}
	}


	/**
	 *  this function is used for save affiliate profile 
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_save_affiliate_profile_cb()
	{
		if(isset($_POST['ciwcamp_profile_first_name']) && 
		isset($_POST['ciwcamp_profile_last_name']) && 
		isset($_POST['ciwcamp_profile_contact']) && 
		isset($_POST['ciwcamp_profile_account_number']) && 
		isset($_POST['ciwcamp_profile_bank_name']) && 
		isset($_POST['ciwcamp_profile_bank_addr']) && 
		isset($_POST['ciwcamp_profile_rounting_number']) && 
		isset($_POST['ciwcamp_profile_bank_iban']) && 
		isset($_POST['ciwcamp_profile_bank_swift']) && 
		isset($_POST['ciwcamp_profile_payment_email']) && 
		isset($_POST['ciwcamp_profile_bank_stripe_id']) )
		{
			$ciwcamp_affiliate_id = get_current_user_id();
			$ciwcamp_profile_first_name = sanitize_text_field( $_POST['ciwcamp_profile_first_name'] );
			$ciwcamp_profile_last_name = sanitize_text_field( $_POST['ciwcamp_profile_last_name'] );
			$ciwcamp_profile_contact = sanitize_text_field( $_POST['ciwcamp_profile_contact'] );
			$ciwcamp_profile_account_number = sanitize_text_field( $_POST['ciwcamp_profile_account_number'] );
			$ciwcamp_profile_bank_name = sanitize_text_field( $_POST['ciwcamp_profile_bank_name'] );
			$ciwcamp_profile_bank_addr = sanitize_text_field( $_POST['ciwcamp_profile_bank_addr'] );
			$ciwcamp_profile_rounting_number = sanitize_text_field( $_POST['ciwcamp_profile_rounting_number'] );
			$ciwcamp_profile_bank_iban = sanitize_text_field( $_POST['ciwcamp_profile_bank_iban'] );
			$ciwcamp_profile_bank_swift = sanitize_text_field( $_POST['ciwcamp_profile_bank_swift'] );
			$ciwcamp_profile_payment_email = sanitize_email( $_POST['ciwcamp_profile_payment_email'] );
			$ciwcamp_profile_bank_stripe_id = sanitize_text_field( $_POST['ciwcamp_profile_bank_stripe_id'] );

			if(!empty($ciwcamp_profile_first_name))
			{
				update_usermeta($ciwcamp_affiliate_id , 'first_name', $ciwcamp_profile_first_name);
			}
			if(!empty($ciwcamp_profile_last_name))
			{
				update_usermeta($ciwcamp_affiliate_id , 'last_name', $ciwcamp_profile_last_name);
			}
			if(!empty($ciwcamp_profile_contact))
			{
				update_usermeta($ciwcamp_affiliate_id , 'ciwcamp_reg_contact', $ciwcamp_profile_contact);
			}
			if(!empty($ciwcamp_profile_account_number))
			{
				update_usermeta($ciwcamp_affiliate_id , 'ciwcamp_affiliate_account_number', $ciwcamp_profile_account_number);
			}
			if(!empty($ciwcamp_profile_bank_name))
			{
				update_usermeta($ciwcamp_affiliate_id , 'ciwcamp_affiliate_bank_name', $ciwcamp_profile_bank_name);
			}
			if(!empty($ciwcamp_profile_bank_addr))
			{
				update_usermeta($ciwcamp_affiliate_id , 'ciwcamp_affiliate_bank_address', $ciwcamp_profile_bank_addr);
			}
			if(!empty($ciwcamp_profile_rounting_number))
			{
				update_usermeta($ciwcamp_affiliate_id , 'ciwcamp_affiliate_bank_rounting_number', $ciwcamp_profile_rounting_number);
			}
			if(!empty($ciwcamp_profile_bank_iban))
			{
				update_usermeta($ciwcamp_affiliate_id , 'ciwcamp_affiliate_bank_iban', $ciwcamp_profile_bank_iban);
			}
			if(!empty($ciwcamp_profile_bank_swift))
			{
				update_usermeta($ciwcamp_affiliate_id , 'ciwcamp_affiliate_bank_swift', $ciwcamp_profile_bank_swift);
			}
			if(!empty($ciwcamp_profile_payment_email))
			{
				update_usermeta($ciwcamp_affiliate_id , 'ciwcamp_affiliate_payment_email', $ciwcamp_profile_payment_email);
			}
			if(!empty($ciwcamp_profile_bank_stripe_id))
			{
				update_usermeta($ciwcamp_affiliate_id , 'ciwcamp_affiliate_bank_strip_id', $ciwcamp_profile_bank_stripe_id);
			}
			echo json_encode(1);
			wp_die();

		}	wp_die();
	}

	
	/**
	 *  this function is used for commission tranfer after sale 
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_get_order_details( $order_id ) {
		if ( ! $order_id )
			return;
		
		if( ! get_post_meta( $order_id, '_thankyou_action_done', true ) ) 
		{ 
			$ciwcamp_order_commission = get_post_meta($order_id, "ciwcamp-order-commission");
			
			if(empty($ciwcamp_order_commission))
			{ 
				$ciwcamp_order_id = $order_id;

				$ciwcamp_affiliate_id = sanitize_text_field( $_COOKIE['affiliate_id'] );
				if(isset($ciwcamp_affiliate_id) && !empty($ciwcamp_affiliate_id))
				{	 
					update_post_meta($ciwcamp_order_id, "ciwcamp-order-commission", "Transfered");

					global $wpdb;
					$ciwcamp_table_name  = $wpdb->prefix."ciwcamp_visits";
					$get_current_user_id = get_current_user_id();
					$ciwcamp_visits_db_query = "SELECT * FROM $ciwcamp_table_name WHERE visitor_id = %d ORDER BY visits_id DESC LIMIT 1";
					$ciwcamp_visits_db_record = $wpdb->get_results($wpdb->prepare($ciwcamp_visits_db_query,sanitize_text_field($get_current_user_id)));
					$ciwcamp_visits_id = $ciwcamp_visits_db_record[0]->visits_id;
					$wpdb->query( $wpdb->prepare("UPDATE $ciwcamp_table_name 
								SET status = %s 
								WHERE visits_id = %s","Converted", $ciwcamp_visits_id)
					);

					$ciwcamp_order = wc_get_order( $ciwcamp_order_id );
					$ciwcamp_items = $ciwcamp_order->get_items();
					$ciwcamp_product_details_array[] = "";

					foreach ( $ciwcamp_items as $ciwcamp_item ) 
					{ 	
						$ciwcamp_product_id = $ciwcamp_item->get_product_id();
						$ciwcamp_order_qty = $ciwcamp_item->get_quantity();	
						$ciwcamp_product_price =  get_post_meta($ciwcamp_product_id , '_sale_price', true);
						
						if(empty($ciwcamp_product_price))
						{
							$ciwcamp_product_price =  get_post_meta($ciwcamp_product_id , '_regular_price', true);

							if(empty($ciwcamp_product_price))
							{
								$ciwcamp_product_price =  get_post_meta($ciwcamp_product_id , '_price', true);
							}	
						}
						$ciwcamp_product_details = array($ciwcamp_product_id, $ciwcamp_order_qty, $ciwcamp_product_price);
						array_push($ciwcamp_product_details_array, $ciwcamp_product_details);

					} 
					array_shift($ciwcamp_product_details_array);
					$ciwcamp_comman_commission = get_option("ciwcamp-common-commission");
				
					if(!empty($ciwcamp_comman_commission))
					{
						foreach($ciwcamp_product_details_array as $ciwcamp_product_details)
						{ 
							$ciwcamp_product_id = $ciwcamp_product_details[0];
							$ciwcamp_product_qty = $ciwcamp_product_details[1];
							$ciwcamp_product_price = $ciwcamp_product_details[2];
							if($ciwcamp_comman_commission[0]=="Flat")
							{ 
								$ciwcamp_commission_value = $ciwcamp_comman_commission[1]*$ciwcamp_product_qty;
								self::ciwcamp_affiliate_commission($ciwcamp_affiliate_id, $ciwcamp_order_id, $ciwcamp_product_id, $ciwcamp_commission_value, $ciwcamp_product_price);
							
							}
							else if($ciwcamp_comman_commission[0]=="Percentage")
							{
								$ciwcamp_commission_value = ($ciwcamp_product_price/100)*$ciwcamp_comman_commission[1]*$ciwcamp_product_qty;
								self::ciwcamp_affiliate_commission($ciwcamp_affiliate_id, $ciwcamp_order_id, $ciwcamp_product_id, $ciwcamp_commission_value, $ciwcamp_product_price); 
							}
							else if($ciwcamp_comman_commission[0]=="Combined")
							{
								$ciwcamp_commission = explode(",",$ciwcamp_comman_commission[1]);

								$ciwcamp_flat_commission = $ciwcamp_commission[0];
								$ciwcamp_percentage_commission = $ciwcamp_commission[1];
								$ciwcamp_commission_value = ((($ciwcamp_product_price/100)*$ciwcamp_percentage_commission)+$ciwcamp_flat_commission)*$ciwcamp_product_qty;
								self::ciwcamp_affiliate_commission($ciwcamp_affiliate_id, $ciwcamp_order_id, $ciwcamp_product_id, $ciwcamp_commission_value, $ciwcamp_product_price);
							}

						} 
					}	
							
				} 
			}
		}
	}


	/**
	 * this function is used for add commission in affiliate account 
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_affiliate_commission($ciwcamp_affiliate_id, $ciwcamp_order_id, $ciwcamp_product_id, $ciwcamp_commission_value, $ciwcamp_product_price)
	{  	
		global $wpdb;	
		$wpdb->query( $wpdb->prepare( "  
		INSERT INTO ".$wpdb->prefix."ciwcamp_sales
		( affiliate_id, order_id, product_id, commission, product_price, source, status)
		VALUES ( %s, %s, %s, %s, %s, %s)", 
		$ciwcamp_affiliate_id, $ciwcamp_order_id, $ciwcamp_product_id, $ciwcamp_commission_value, $ciwcamp_product_price, "sale", "Approved" ) );
	}


}