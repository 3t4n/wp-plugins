<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://codexinfra.com
 * @since      1.0.0
 *
 * @package    Ciwcamp_Affliate_Manager
 * @subpackage Ciwcamp_Affliate_Manager/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ciwcamp_Affliate_Manager
 * @subpackage Ciwcamp_Affliate_Manager/admin
 * @author     CodexInfra <developers@codexinfra.com>
 */
class Ciwcamp_Affliate_Manager_Admin {

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
	 * Register the stylesheets for the admin area.
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
		
		if(isset($_GET['page']) && $_GET['page']=="ciwcamp-affliate-manager")
		{
			wp_enqueue_style( "Ciwcamp-Affliate-Manager-Main", plugin_dir_url( __FILE__ ) . 'css/ciwcamp-affliate-manager-main.css', array(), $this->ciwcamp_version, 'all' );

			wp_enqueue_style( 'Ciwcamp-Bootstram-Min', CIWCAMP_ASSETS_COMMON . '/css/mdb-bootstrap.min.css' );

			wp_enqueue_style( 'Ciwcamp-Mdb-min', plugin_dir_url( __FILE__ ) . '/css/mdb.min.css' );

			wp_enqueue_style( 'Ciwcamp-Style', plugin_dir_url( __FILE__ ) . '/css/style.css' );

			wp_enqueue_style( "Ciwcamp-Datatable-Min", plugin_dir_url( __FILE__ ) . 'css/datatables.min.css', array(), $this->ciwcamp_version, 'all' );

			wp_enqueue_style( "Ciwcamp-Toastr", plugin_dir_url( __FILE__ ) . 'css/toastr.css', array(), $this->ciwcamp_version, 'all' );

		}
		
	}

	/**
	 * Register the JavaScript for the admin area.
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

		if(isset($_GET['page']) && $_GET['page']=="ciwcamp-affliate-manager")
		{
			wp_enqueue_script($this->ciwcamp_plugin_name, plugin_dir_url( __FILE__ ) . '/js/ciwcamp-affliate-manager-main.js', array('jquery'));

			wp_localize_script(  $this->ciwcamp_plugin_name, 'ciwcamp_ajax_object', array( 'ciwcamp_ajax_url' => admin_url( 'admin-ajax.php' ), 'ciwcamp_nonce' => wp_create_nonce('ciwcamp-nonce-creation') ) );

			wp_localize_script(
				$this->ciwcamp_plugin_name,
				'ciwcamp_notification_object',
				array('ciwcamp_ajax_url' => admin_url('admin-ajax.php'), 'ciwcamp_general_page_nonce' => wp_create_nonce("ciwcamp-affiliate-general"), 'ciwcamp_translatable_strings'=> $this->ciwcamp_affiliate_translatable_js_strings())
			);

			wp_enqueue_script('Ciwccamp-Popper', plugin_dir_url( __FILE__ ) . '/js/popper.js', array('jquery'));

			wp_enqueue_script('Ciwcamp-Popper-Min', plugin_dir_url( __FILE__ ) . '/js/popper.min.js', array('jquery'));
			
			wp_enqueue_script( "Ciwcamp-Datatable-Min", plugin_dir_url( __FILE__ ) . 'js/datatables.min.js', array( 'jquery' ), $this->ciwcamp_version, false );

			wp_enqueue_script( 'Ciwcamp-mdb-bootstrap-min', CIWCAMP_ASSETS_COMMON . '/js/mdb-bootstrap.min.js', array('jquery'));

			wp_enqueue_script( 'Ciwcamp-MDB', plugin_dir_url( __FILE__ ) . '/js/mdb.js', array('jquery'));

			wp_enqueue_script('Ciwcamp-Affiliate-Dashboard', plugin_dir_url( __FILE__ ) . '/js/ciwcamp-affiliate-dashboard.js', array('jquery'));

			wp_enqueue_script('Ciwcamp-Affliate-Manager-Affiliates', plugin_dir_url( __FILE__ ) . '/js/ciwcamp-affliate-manager-affiliates.js', array('jquery'));

			wp_enqueue_script('Ciwcamp-Toastr-Min', plugin_dir_url( __FILE__ ) . '/js/toastr.min.js	', array('jquery'));

			wp_enqueue_script('Ciwcamp-Affiliate-Settings', plugin_dir_url( __FILE__ ) . '/js/ciwcamp-affliate-settings.js', array('jquery'));

			wp_enqueue_script('Ciwcamp-Affiliate-Withdraw', plugin_dir_url( __FILE__ ) . '/js/ciwcamp-affiliates-withdraw.js', array('jquery'));

			wp_enqueue_script('Ciwcamp-Affiliate-Sales', plugin_dir_url( __FILE__ ) . '/js/ciwcamp-affiliate-sales.js', array('jquery'));

			wp_enqueue_script('Ciwcamp-Chart', plugin_dir_url( __FILE__ ) . '/js/chart.js', array('jquery'));

			wp_enqueue_script('Ciwcamp-Affiliate-Details', plugin_dir_url( __FILE__ ) . '/js/ciwcamp-affiliate-details.js', array('jquery'));
			
			wp_enqueue_script('Ciwcamp-Payment-Settings', plugin_dir_url( __FILE__ ) . '/js/ciwcamp-payment-settings.js', array('jquery'));	

		}
		
	}


	/**
	 * this function is used for Custom menu.
	 *
	 * @since    1.0.0
	 */

	public function ciwcamp_custom_menu_cb()
	{
		add_menu_page(esc_html__('Affiliate Manager Prime','ciwcamp-affliate-manager'), esc_html__( 'Affiliate Manager Prime','ciwcamp-affliate-manager' ),'manage_options','ciwcamp-affliate-manager', array($this,"ciwcamp_affiliates_admin_dashboard_cb"), CIWCAMP_PLUGIN_URL.'/admin/image/icon.png',11); 
	}

	/**
	 * this function is used for Affiliate Admin dashboard page.
	 *
	 * @since    1.0.0
	 */

	public function ciwcamp_affiliates_admin_dashboard_cb()
	{
		include_once CIWCAMP_PLUGIN_DIR.'admin/partials/ciwcamp-affiliates-manager.php';
	}


	/**
	 * this function is used for Affiliate Admin dashboard page.
	 *
	 * @since    1.0.0
	 */

	public function ciwcamp_affiliate_translatable_js_strings()
	{
		$ciwcamp_affiliate_js_translatable_val =  include_once CIWCAMP_PLUGIN_DIR.'admin/partials/ciwcamp-translatable-string.php';
		return $ciwcamp_affiliate_js_translatable_val;
	}


	/**
	 * this function is used for Affiliate Admin dashboard monthly visits and conversion line chart.
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_monthly_visits_and_conversion_cb()
	{
		include_once CIWCAMP_PLUGIN_DIR.'admin/partials/admin-functionality/ciwcamp-visits-conversion-graph.php';
	}


	/**
	 * this function is used for Affiliate Admin dashboard monthly sales and commission line chart.
	 *
	 * @since    1.0.0
	 */
	
	function ciwcamp_monthly_sales_and_commission_cb()
	{
		include_once CIWCAMP_PLUGIN_DIR.'admin/partials/admin-functionality/ciwcamp-sale-commission-graph.php';
	}


	/**
	 * this function is used for generate password.
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_a_generate_password_cb()
	{
		if(isset($_POST['ciwcamp_affiliate_password']) && !empty($_POST['ciwcamp_affiliate_password']))
		{
			echo json_encode(wp_generate_password());
			wp_die();
		}
	}


	/**
	 * this function is used for Affiliate Admin dashboard monthly affiliate regsitration bar chart.
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_monthly_affiliate_registration_cb()
	{
		
		if(isset($_POST['ciwcamp_data_type']) && !empty($_POST['ciwcamp_data_type']))
		{
			global $wpdb;
			
			$ciwcamp_registered_affiliates_data = $wpdb->get_results("" );
			
			$ciwcamp_monthly_affiliate_query = "SELECT MONTHNAME(user_registered) as month, COUNT(ID) as total_affiliates FROM " . $wpdb->prefix . "users WHERE ID IN ( SELECT " . $wpdb->prefix . "users.ID
			FROM " . $wpdb->prefix . "users LEFT JOIN " . $wpdb->prefix . "usermeta ON " . $wpdb->prefix . "users.ID = " . $wpdb->prefix . "usermeta.user_id WHERE " . $wpdb->prefix . "usermeta.meta_key=%s
			ORDER BY " . $wpdb->prefix . "users.ID ) GROUP BY month(user_registered) ";
			$ciwcamp_registered_affiliates_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_monthly_affiliate_query, "ciwcamp_affiliate_registration" ) ); 

			$ciwcamp_registered_affiliates = count($ciwcamp_registered_affiliates_data);
			$ciwcamp_registered_affiliates_array = array(0,0,0,0,0,0,0,0,0,0,0,0);
			for($ciwcamp_data=--$ciwcamp_registered_affiliates; $ciwcamp_data>=0; $ciwcamp_data--)
			{
				if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="January")
				{
					$ciwcamp_registered_affiliates_array[0] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}
				else if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="February")
				{
					$ciwcamp_registered_affiliates_array[1] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}
				else if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="March")
				{
					$ciwcamp_registered_affiliates_array[2] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}
				else if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="April")
				{
					$ciwcamp_registered_affiliates_array[3] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}
				else if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="May")
				{
					$ciwcamp_registered_affiliates_array[4] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}
				else if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="June")
				{
					$ciwcamp_registered_affiliates_array[5] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}
				else if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="July")
				{
					$ciwcamp_registered_affiliates_array[6] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}
				else if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="August")
				{
					$ciwcamp_registered_affiliates_array[7] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}
				else if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="September")
				{
					$ciwcamp_registered_affiliates_array[8] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}
				else if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="October")
				{
					$ciwcamp_registered_affiliates_array[9] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}
				else if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="November")
				{
					$ciwcamp_registered_affiliates_array[10] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}
				else if($ciwcamp_registered_affiliates_data[$ciwcamp_data]->month=="December")
				{
					$ciwcamp_registered_affiliates_array[11] = (int)$ciwcamp_registered_affiliates_data[$ciwcamp_data]->total_affiliates;
				}

			}
			echo json_encode($ciwcamp_registered_affiliates_array);
			wp_die();
		}
	}


	/**
	 *	this function is used for Display affiliate list.
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_affiliates_list_cb()			
	{ 
		if( isset($_POST['ciwcamp_affiliate_status']) && !empty($_POST['ciwcamp_affiliate_status']) )
		{
			$ciwcamp_affiliate_status = sanitize_text_field($_POST['ciwcamp_affiliate_status']);
			if( isset($ciwcamp_affiliate_status) && !empty($ciwcamp_affiliate_status) )
			{
				global $wpdb;

				$table = $wpdb->prefix .'users';

				$primaryKey = 'ID';

				$columns = array(
					array( 'db' => 'ID',  'dt' => 0 , 'field' => 'ID' ),
					array( 'db' => 'ID',  'dt' => 1 , 'field' => 'ID' ),
					array( 'db' => 'ciwcamp_affiliate_registration',  'dt' => 2 , 'field' => 'ciwcamp_affiliate_registration' ),
					array( 'db' => 'first_name', 'dt' => 3 , 'field' => 'first_name' ),
					array( 'db' => 'last_name', 'dt' => 4 , 'field' => 'last_name' ),
					array( 'db' => 'user_login',  'dt' => 5 , 'field' => 'user_login' ),
					array( 'db' => 'user_email',  'dt' => 6 , 'field' => 'user_email' ),
					); 

				$sql_details = array(
					'user' => DB_USER,
					'pass' => DB_PASSWORD,
					'db'   => DB_NAME,
					'host' => DB_HOST
				);
			
				$join = "FROM  ".$wpdb->prefix ."users as m LEFT JOIN (SELECT user_id,
				MAX(CASE WHEN meta_key='ciwcamp_affiliate_registration' THEN meta_value END) ciwcamp_affiliate_registration,
				MAX(CASE WHEN meta_key='first_name' THEN meta_value END) first_name,
				MAX(CASE WHEN meta_key='last_name' THEN meta_value END) last_name 
				FROM ".$wpdb->prefix ."usermeta GROUP BY user_id) ciwcamp_affiliates_table ON m.`ID` = ciwcamp_affiliates_table.`user_id`";
			
				
				if($ciwcamp_affiliate_status=="all")
				{
					$where= "`ciwcamp_affiliate_registration` = '1' OR `ciwcamp_affiliate_registration` = 'Enable' OR `ciwcamp_affiliate_registration` = 'Disable' OR `ciwcamp_affiliate_registration` = 'Reject'";	
				}
				else
				{
					$where= "`ciwcamp_affiliate_registration`= '".$ciwcamp_affiliate_status."'";
				}
				
				include_once( CIWCAMP_PLUGIN_DIR.'admin/ssp/ssp.customized.class.php' );

				$ciwcamp_affiliates_data_ssp =  SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $join, $where );


				if( isset($ciwcamp_affiliates_data_ssp) && !empty($ciwcamp_affiliates_data_ssp) )
				{
					if( isset($ciwcamp_affiliates_data_ssp['data']) && is_array($ciwcamp_affiliates_data_ssp['data']) && !empty($ciwcamp_affiliates_data_ssp['data']) )
					{
						$i = 0;
						{
							if( isset($ciwcamp_affiliates_data_ssp['data'][$i]) )
							{
								foreach( $ciwcamp_affiliates_data_ssp['data'] as $ciwcamp_affiliates )
								{
									if( isset($ciwcamp_affiliates) && !empty($ciwcamp_affiliates) )
									{
										if( isset($ciwcamp_affiliates[0]))
										{
											$ciwcamp_affiliates_data_ssp['data'][$i][0] = "<td><input type='checkbox' class='ciwcamp-select-affiliate' value=".$ciwcamp_affiliates[0]."></td>";
										}
										if( isset($ciwcamp_affiliates[1]) && !empty($ciwcamp_affiliates[1]) )
										{
											$ciwcamp_affiliates_data_ssp['data'][$i][1] = "<a href='#' type='button' class='ciwcamp-affiliate-details waves-effect waves-light' data-id=".$ciwcamp_affiliates[1].">#".$ciwcamp_affiliates[1]."</a>";
										}
										if( isset($ciwcamp_affiliates[2]) && !empty($ciwcamp_affiliates[2]) )
										{
											if($ciwcamp_affiliates[2] == '1' )
											{
												$ciwcamp_affiliates_data_ssp['data'][$i][2] =  esc_html__("Pending",'ciwcamp-affliate-manager');
											}
											else
											{
												$ciwcamp_affiliates_data_ssp['data'][$i][2] = $ciwcamp_affiliates[2];	
											}
										}			
										if( isset($ciwcamp_affiliates[3]))
										{
											$ciwcamp_affiliates_data_ssp['data'][$i][3] = $ciwcamp_affiliates[3]." ".$ciwcamp_affiliates[4];
										}
										if( isset($ciwcamp_affiliates[4]) && !empty($ciwcamp_affiliates[4]))
										{
											$ciwcamp_affiliates_data_ssp['data'][$i][4] = "<a href='#' type='button' class='ciwcamp-affiliate-details waves-effect waves-light' data-id=".$ciwcamp_affiliates[1].">".$ciwcamp_affiliates[5]."</a>";
										}
										if(isset($ciwcamp_affiliates[5]))
										{
											$ciwcamp_affiliates_data_ssp['data'][$i][5] = "<a href='#' type='button' class='ciwcamp-affiliate-details waves-effect waves-light' data-id=".$ciwcamp_affiliates[1].">".$ciwcamp_affiliates[6]."</a>";
										}
										if( isset($ciwcamp_affiliates[6]))
										{
											$ciwcamp_affiliates_data_ssp['data'][$i][6] = "<td>
											<div class='ciwcamp-flex-basis'>
											
											<a href='#' type='button' class='ciwcamp-affiliate-details waves-effect waves-light' data-id=".$ciwcamp_affiliates[1]."><span class='dashicons dashicons-visibility ciwcamp-action-btn-edit'></span></a>	
											
											<a href='#' type='button' class='ciwcamp-affiliate-delete waves-effect waves-lightn' data-id=".$ciwcamp_affiliates[1]."><span class='dashicons dashicons-trash ciwcamp-action-btn-delete'></span></a>
											</div?
											</td>";
										}															
									}
									$i++;
								}
							}
						}
					}
				}
				echo json_encode($ciwcamp_affiliates_data_ssp);
				wp_die();
			}
		}
	}


	/**
	 *	this function is used for Create new affiliate.
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_create_new_affiliate_cb()
	{
		if(isset($_POST['ciwcamp_affiliate_username']) && !empty($_POST['ciwcamp_affiliate_username']) 
			&& isset($_POST['ciwcamp_affiliate_email']) && !empty($_POST['ciwcamp_affiliate_email'])
			&& isset($_POST['ciwcamp_affiliate_fname']) && !empty($_POST['ciwcamp_affiliate_fname'])
			&& isset($_POST['ciwcamp_affiliate_lname']) && !empty($_POST['ciwcamp_affiliate_lname'])
			&& isset($_POST['ciwcamp_affiliate_contact']) && !empty($_POST['ciwcamp_affiliate_contact'])
			&& isset($_POST['ciwcamp_affiliate_password']) && !empty($_POST['ciwcamp_affiliate_password'])
		)
		{
			$ciwcamp_affiliate_username = sanitize_text_field( $_POST['ciwcamp_affiliate_username'] );
			$ciwcamp_affiliate_email = sanitize_email( $_POST['ciwcamp_affiliate_email'] );
			$ciwcamp_affiliate_fname = sanitize_text_field( $_POST['ciwcamp_affiliate_fname'] );
			$ciwcamp_affiliate_lname = sanitize_text_field( $_POST['ciwcamp_affiliate_lname'] );
			$ciwcamp_affiliate_contact = sanitize_text_field( $_POST['ciwcamp_affiliate_contact'] );
			$ciwcamp_affiliate_password = sanitize_text_field( $_POST['ciwcamp_affiliate_password'] );
			$ciwcamp_affiliate_account_number = sanitize_text_field( $_POST['ciwcamp_affiliate_account_number'] );
			$ciwcamp_affiliate_bank_name = sanitize_text_field( $_POST['ciwcamp_affiliate_bank_name'] );
			$ciwcamp_affiliate_bank_address = sanitize_text_field( $_POST['ciwcamp_affiliate_bank_address'] );
			$ciwcamp_affiliate_bank_rounting_number = sanitize_text_field( $_POST['ciwcamp_affiliate_bank_rounting_number'] );
			$ciwcamp_affiliate_bank_iban = sanitize_text_field( $_POST['ciwcamp_affiliate_bank_iban'] );
			$ciwcamp_affiliate_bank_swift = sanitize_text_field( $_POST['ciwcamp_affiliate_bank_swift'] );
			$ciwcamp_affiliate_payment_email = sanitize_email( $_POST['ciwcamp_affiliate_payment_email'] );
			$ciwcamp_affiliate_bank_strip_id = sanitize_text_field( $_POST['ciwcamp_affiliate_bank_strip_id'] );

			$ciwcamp_affiliate_username_exist = username_exists($ciwcamp_affiliate_username);
			$ciwcamp_affiliate_valid_email = is_email($ciwcamp_affiliate_email);
			$ciwcamp_affiliate_exists_email = email_exists($ciwcamp_affiliate_email);

			if( isset($ciwcamp_affiliate_username_exist) && isset($ciwcamp_affiliate_valid_email) )
			{

				if( $ciwcamp_affiliate_username_exist != false )
				{
					echo json_encode('username_exists');
					wp_die();
				}
				elseif( empty($ciwcamp_affiliate_valid_email) )
				{
					echo json_encode('invalid_email');
					wp_die();
				}
				elseif( !empty($ciwcamp_affiliate_exists_email) )
				{
					echo json_encode('email_exists');
					wp_die();
				}
				else
				{
					$ciwcamp_insert_user = array(
						'user_login' => $ciwcamp_affiliate_username,
						'first_name' => $ciwcamp_affiliate_fname,	
						'last_name' => $ciwcamp_affiliate_lname,
						'user_email' => $ciwcamp_affiliate_email,		
						'user_pass' => $ciwcamp_affiliate_password,
						'role'		=> 'Affiliate'
					);
					$ciwcamp_newly_created_user = wp_insert_user( $ciwcamp_insert_user );
					if( !empty($ciwcamp_newly_created_user) )
					{
						update_user_meta( $ciwcamp_newly_created_user,'ciwcamp_reg_contact', $ciwcamp_affiliate_contact );

						update_user_meta( $ciwcamp_newly_created_user,'ciwcamp_affiliate_registration','Enable' );
						
						if(isset($ciwcamp_affiliate_account_number) && !empty($ciwcamp_affiliate_account_number))
						{
							update_user_meta( $ciwcamp_newly_created_user,'ciwcamp_affiliate_account_number', $ciwcamp_affiliate_account_number );
						}
						if(isset($ciwcamp_affiliate_bank_name) && !empty($ciwcamp_affiliate_bank_name))
						{
							update_user_meta( $ciwcamp_newly_created_user,'ciwcamp_affiliate_bank_name', $ciwcamp_affiliate_bank_name );
						}
						if(isset($ciwcamp_affiliate_bank_address) && !empty($ciwcamp_affiliate_bank_address))
						{
							update_user_meta( $ciwcamp_newly_created_user,'ciwcamp_affiliate_bank_address', $ciwcamp_affiliate_bank_address );
						}
						if(isset($ciwcamp_affiliate_bank_rounting_number) && !empty($ciwcamp_affiliate_bank_rounting_number))
						{
							update_user_meta( $ciwcamp_newly_created_user,'ciwcamp_affiliate_bank_rounting_number', $ciwcamp_affiliate_bank_rounting_number );
						}
						if(isset($ciwcamp_affiliate_bank_iban) && !empty($ciwcamp_affiliate_bank_iban))
						{
							update_user_meta( $ciwcamp_newly_created_user,'ciwcamp_affiliate_bank_iban', $ciwcamp_affiliate_bank_iban );
						}
						if(isset($ciwcamp_affiliate_bank_swift) && !empty($ciwcamp_affiliate_bank_swift))
						{
							update_user_meta( $ciwcamp_newly_created_user,'ciwcamp_affiliate_bank_swift', $ciwcamp_affiliate_bank_swift );
						}
						if(isset($ciwcamp_affiliate_payment_email) && !empty($ciwcamp_affiliate_payment_email))
						{
							update_user_meta( $ciwcamp_newly_created_user,'ciwcamp_affiliate_payment_email', $ciwcamp_affiliate_payment_email );
						}
						if(isset($ciwcamp_affiliate_bank_strip_id) && !empty($ciwcamp_affiliate_bank_strip_id))
						{
							update_user_meta( $ciwcamp_newly_created_user,'ciwcamp_affiliate_bank_strip_id', $ciwcamp_affiliate_bank_strip_id );
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
								$ciwcamp_newly_created_user,  $ciwcamp_level_data, "Approved", "Signup Bonus" ) );
						}
					}
					echo json_encode("ciwcamp_registered"); 
					wp_die();
				}
				wp_die();
			}
			wp_die();
		}
	}

 
	/**
	 *	this function is used for Change affiliate status.
	 *
	 * @since    1.0.0
	 */	

	function ciwcamp_change_affiliate_status_cb()
	{
		if(isset($_POST['ciwcamp_selected_action']) && !empty($_POST['ciwcamp_selected_action'])
		&& isset($_POST['ciwcamp_selected_affiliate_id']) && !empty($_POST['ciwcamp_selected_affiliate_id'])
		)
		{
			$ciwcamp_selected_affiliate_id = sanitize_text_field($_POST['ciwcamp_selected_affiliate_id']);
			$ciwcamp_selected_action = sanitize_text_field($_POST['ciwcamp_selected_action']);
			$ciwcamp_action_reason = sanitize_text_field($_POST['ciwcamp_action_reason']);
			foreach($ciwcamp_selected_affiliate_id as $ciwcamp_affiliate_id)
			{
				update_user_meta($ciwcamp_affiliate_id, "ciwcamp_affiliate_registration", $ciwcamp_selected_action);

				update_user_meta($ciwcamp_affiliate_id, "ciwcamp_affiliate_action_reasons", "");

				if(isset($ciwcamp_action_reason) && !empty($ciwcamp_action_reason))
				{
				 	update_user_meta($ciwcamp_affiliate_id, "ciwcamp_affiliate_action_reasons", $ciwcamp_action_reason);
					echo json_encode(1);
					wp_die();
				}
				if(empty($ciwcamp_action_reason))
				{
					if($ciwcamp_selected_action="Reject")
					{
						$ciwcamp_reject_default_message = get_option("ciwcamp_affiliate_reject_msz");
						update_user_meta($ciwcamp_affiliate_id, "ciwcamp_affiliate_action_reasons", $ciwcamp_reject_default_message);
						echo json_encode(1);
						wp_die();
					}
					else if($ciwcamp_selected_action="Disable")
					{
						$ciwcamp_disable_default_message = get_option("ciwcamp_affiliate_disable_msz");
						update_user_meta($ciwcamp_affiliate_id, "ciwcamp_affiliate_action_reasons", $ciwcamp_disable_default_message);
						echo json_encode(1);
						wp_die();
					}
					else if($ciwcamp_selected_action="Banned")
					{
						$ciwcamp_ban_default_message = get_option("ciwcamp_affiliate_ban_msz");
						update_user_meta($ciwcamp_affiliate_id, "ciwcamp_affiliate_action_reasons", $ciwcamp_ban_default_message);
						echo json_encode(1);
						wp_die();
					} 
					wp_die();
				}
				wp_die();
			}
			echo json_encode(1);
			wp_die();
		}
	}


	/**
	 *	this function is used for Delete affiliate.
	 *
	 * @since    1.0.0
	 */	

	function ciwcamp_ciwcamp_delete_affiliate_cb()
	{
		if(isset($_POST['ciwcamp_affiliate_id']) && !empty($_POST['ciwcamp_affiliate_id']))
		{
			$affiliate_id = sanitize_text_field( $_POST['ciwcamp_affiliate_id'] );

			$ciwcamp_affiliate_deleted = delete_user_meta($affiliate_id, "ciwcamp_affiliate_registration");

			echo json_encode(1);
			
			wp_die();
		}
	}


	/**
	 *	 this function is used for affiliate details.
	 *
	 * @since    1.0.0
	 */	

	function ciwcamp_affiliate_details_cb()
	{
		if(isset($_POST['ciwcamp_affiliate_id']) && !empty($_POST['ciwcamp_affiliate_id']))
		{
			$ciwcamp_affiliate_id = sanitize_text_field( $_POST['ciwcamp_affiliate_id'] );
			
			global $wpdb;

			$ciwcamp_affiliate_total_visits_qry = "SELECT COUNT(visits_id) as total_visits FROM " . $wpdb->prefix . "ciwcamp_visits WHERE affiliate_id=%s";
  			$ciwcamp_affiliate_total_visits = $wpdb->get_results( $wpdb->prepare( $ciwcamp_affiliate_total_visits_qry, $ciwcamp_affiliate_id) ); 

			$ciwcamp_affiliate_total_conversions_qry = "SELECT COUNT(visits_id) as total_conversion FROM " . $wpdb->prefix . "ciwcamp_visits WHERE affiliate_id=%s AND status = %s";
			$ciwcamp_affiliate_total_conversions = $wpdb->get_results( $wpdb->prepare( $ciwcamp_affiliate_total_conversions_qry, $ciwcamp_affiliate_id, "Converted") ); 

			$ciwcamp_affiliate_total_commission_qry = "SELECT SUM(commission) as total_commission FROM " . $wpdb->prefix . "ciwcamp_sales WHERE affiliate_id=%s AND status = %s AND source = %s";
			$ciwcamp_affiliate_total_commission = $wpdb->get_results( $wpdb->prepare( $ciwcamp_affiliate_total_commission_qry, $ciwcamp_affiliate_id, "Approved", "sale") ); 

			$ciwcamp_affiliate_total_withdraw_qry = "SELECT SUM(withdraw_amt) as total_withdraw FROM " . $wpdb->prefix . "ciwcamp_withdraw WHERE affiliate_id=%s AND status = %s";
			$ciwcamp_affiliate_total_withdraw = $wpdb->get_results( $wpdb->prepare( $ciwcamp_affiliate_total_withdraw_qry, $ciwcamp_affiliate_id, "Approved") ); 

			$ciwcamp_affiliate_details = get_user_by('id', $ciwcamp_affiliate_id)->data;
			$ciwcamp_affiliate_meta_details = get_user_meta ( $ciwcamp_affiliate_id, false);
			
			$ciwcamp_affiliate_username = $ciwcamp_affiliate_details->user_login;
			$ciwcamp_affiliate_email = $ciwcamp_affiliate_details->user_email;
			$ciwcamp_affiliate_first_name = $ciwcamp_affiliate_meta_details['first_name'][0];
			$ciwcamp_affiliate_last_name = $ciwcamp_affiliate_meta_details['last_name'][0];
			$ciwcamp_affiliate_registration_date = $ciwcamp_affiliate_details->user_registered;
			$ciwcamp_affiliate_contact = $ciwcamp_affiliate_meta_details['ciwcamp_reg_contact'][0];
			$ciwcamp_affiliate_status = $ciwcamp_affiliate_meta_details['ciwcamp_affiliate_registration'][0];
			$ciwcamp_affiliate_parent_id = $ciwcamp_affiliate_meta_details['ciwcamp_affiliate_parent_id'][0];
			$ciwcamp_affiliate_account_number = $ciwcamp_affiliate_meta_details['ciwcamp_affiliate_account_number'][0];
			$ciwcamp_affiliate_bank_name = $ciwcamp_affiliate_meta_details['ciwcamp_affiliate_bank_name'][0];
			$ciwcamp_affiliate_bank_address = $ciwcamp_affiliate_meta_details['ciwcamp_affiliate_bank_address'][0];
			$ciwcamp_affiliate_bank_rounting_number = $ciwcamp_affiliate_meta_details['ciwcamp_affiliate_bank_rounting_number'][0];
			$ciwcamp_affiliate_bank_iban = $ciwcamp_affiliate_meta_details['ciwcamp_affiliate_bank_iban'][0];
			$ciwcamp_affiliate_bank_swift = $ciwcamp_affiliate_meta_details['ciwcamp_affiliate_bank_swift'][0]; 
			$ciwcamp_affiliate_payment_email = $ciwcamp_affiliate_meta_details['ciwcamp_affiliate_payment_email'][0];
			$ciwcamp_affiliate_strip_id = $ciwcamp_affiliate_meta_details['ciwcamp_affiliate_bank_strip_id'][0];
			$ciwcamp_affiliate_commission_details = json_decode($ciwcamp_affiliate_meta_details['ciwcamp-affiliate-commission'][0]); 
			
			$ciwcamp_affiliate_profile_details = array($ciwcamp_affiliate_username, $ciwcamp_affiliate_email, $ciwcamp_affiliate_first_name, $ciwcamp_affiliate_last_name, $ciwcamp_affiliate_registration_date,
												$ciwcamp_affiliate_contact, $ciwcamp_affiliate_status, $ciwcamp_affiliate_parent_id, $ciwcamp_affiliate_account_number, $ciwcamp_affiliate_bank_name, $ciwcamp_affiliate_bank_address,
												$ciwcamp_affiliate_bank_rounting_number, $ciwcamp_affiliate_bank_iban, $ciwcamp_affiliate_bank_swift, $ciwcamp_affiliate_payment_email, $ciwcamp_affiliate_strip_id);
			$ciwcamp_affiliate_visits = (int)$ciwcamp_affiliate_total_visits[0]->total_visits;
			$ciwcamp_affiliate_conversions = (int)$ciwcamp_affiliate_total_conversions[0]->total_conversion;
			$ciwcamp_affiliate_withdraw = (int)$ciwcamp_affiliate_total_withdraw[0]->total_withdraw;
			$ciwcamp_affiliate_balance =  ($ciwcamp_affiliate_total_commission[0]->total_commission) - ($ciwcamp_affiliate_total_withdraw[0]->total_withdraw); 
			
			echo json_encode(array($ciwcamp_affiliate_visits, $ciwcamp_affiliate_conversions, $ciwcamp_affiliate_withdraw, $ciwcamp_affiliate_balance, $ciwcamp_affiliate_profile_details));
			wp_die();
			
		}
	}



	/**
	 * this function is used for Update affiliate details.
	*
	* @since    1.0.0
	*/	

	function ciwcamp_update_affiliate_cb()
	{
		if(isset($_POST['ciwcamp_affiliate_profile_id']) && !empty($_POST['ciwcamp_affiliate_profile_first_name'])
		&& isset($_POST['ciwcamp_affiliate_profile_last_name']) && isset($_POST['ciwcamp_affiliate_profile_bank_name'])
		&& isset($_POST['ciwcamp_affiliate_profile_bank_account_number']) && isset($_POST['ciwcamp_affiliate_profile_bank_address'])
		&& isset($_POST['ciwcamp_affiliate_profile_bank_rounting']) && isset($_POST['ciwcamp_affiliate_profile_bank_iban'])
		&& isset($_POST['ciwcamp_affiliate_profile_bank_swift']) && isset($_POST['ciwcamp_affiliate_profile_payment_email']) 
		&& isset($_POST['ciwcamp_affiliate_profile_strip_id']) && isset($_POST['ciwcamp_affiliate_profile_contact']) )
		{  
			$ciwcamp_affiliate_profile_id = sanitize_text_field($_POST['ciwcamp_affiliate_profile_id']);
			$ciwcamp_affiliate_profile_first_name = sanitize_text_field($_POST['ciwcamp_affiliate_profile_first_name']);
			$ciwcamp_affiliate_profile_last_name = sanitize_text_field($_POST['ciwcamp_affiliate_profile_last_name']);
			$ciwcamp_affiliate_profile_bank_name = sanitize_text_field($_POST['ciwcamp_affiliate_profile_bank_name']);
			$ciwcamp_affiliate_profile_bank_account_number = sanitize_text_field($_POST['ciwcamp_affiliate_profile_bank_account_number']);
			$ciwcamp_affiliate_profile_bank_address = sanitize_text_field($_POST['ciwcamp_affiliate_profile_bank_address']);
			$ciwcamp_affiliate_profile_bank_rounting = sanitize_text_field($_POST['ciwcamp_affiliate_profile_bank_rounting']);
			$ciwcamp_affiliate_profile_bank_iban = sanitize_text_field($_POST['ciwcamp_affiliate_profile_bank_iban']);
			$ciwcamp_affiliate_profile_bank_swift = sanitize_text_field($_POST['ciwcamp_affiliate_profile_bank_swift']);
			$ciwcamp_affiliate_profile_payment_email = sanitize_email($_POST['ciwcamp_affiliate_profile_payment_email']);
			$ciwcamp_affiliate_profile_strip_id = sanitize_text_field($_POST['ciwcamp_affiliate_profile_strip_id']);
			$ciwcamp_affiliate_profile_contact = sanitize_text_field($_POST['ciwcamp_affiliate_profile_contact']);

			if(!empty($ciwcamp_affiliate_profile_id))
			{
				if(!empty($ciwcamp_affiliate_profile_first_name))
				{
					update_user_meta( $ciwcamp_affiliate_profile_id, 'first_name', $ciwcamp_affiliate_profile_first_name );
				}
				if(!empty($ciwcamp_affiliate_profile_last_name))
				{
					update_user_meta( $ciwcamp_affiliate_profile_id, 'last_name', $ciwcamp_affiliate_profile_last_name );
				}
				if(!empty($ciwcamp_affiliate_profile_bank_name))
				{
					update_user_meta( $ciwcamp_affiliate_profile_id, 'ciwcamp_affiliate_bank_name', $ciwcamp_affiliate_profile_bank_name );
				}
				if(!empty($ciwcamp_affiliate_profile_bank_account_number))
				{
					update_user_meta( $ciwcamp_affiliate_profile_id, 'ciwcamp_affiliate_account_number', $ciwcamp_affiliate_profile_bank_account_number );
				}
				if(!empty($ciwcamp_affiliate_profile_bank_address))
				{
					update_user_meta( $ciwcamp_affiliate_profile_id, 'ciwcamp_affiliate_bank_address', $ciwcamp_affiliate_profile_bank_address );
				}
				if(!empty($ciwcamp_affiliate_profile_bank_rounting))
				{
					update_user_meta( $ciwcamp_affiliate_profile_id, 'ciwcamp_affiliate_bank_rounting_number', $ciwcamp_affiliate_profile_bank_rounting );
				}
				if(!empty($ciwcamp_affiliate_profile_bank_iban))
				{
					update_user_meta( $ciwcamp_affiliate_profile_id, 'ciwcamp_affiliate_bank_iban', $ciwcamp_affiliate_profile_bank_iban );
				}
				if(!empty($ciwcamp_affiliate_profile_bank_swift))
				{
					update_user_meta( $ciwcamp_affiliate_profile_id, 'ciwcamp_affiliate_bank_swift', $ciwcamp_affiliate_profile_bank_swift );
				}
				if(!empty($ciwcamp_affiliate_profile_payment_email))
				{
					update_user_meta( $ciwcamp_affiliate_profile_id, 'ciwcamp_affiliate_payment_email', $ciwcamp_affiliate_profile_payment_email );
				}
				if(!empty($ciwcamp_affiliate_profile_strip_id))
				{
					update_user_meta( $ciwcamp_affiliate_profile_id, 'ciwcamp_affiliate_bank_strip_id', $ciwcamp_affiliate_profile_strip_id );
				}
				if(!empty($ciwcamp_affiliate_profile_contact))
				{
					update_user_meta( $ciwcamp_affiliate_profile_id, 'ciwcamp_reg_contact', $ciwcamp_affiliate_profile_contact );
				}
			}
			echo json_encode(1);
			wp_die();
		}

	}


	/**
	 * this function is used for Display affiliate wise sales list.
	*
	* @since    1.0.0
	*/	

	function ciwcamp_an_affliate_sales_list_cb()
	{
		if(isset($_POST['ciwcamp_affiliate_id']) && !empty($_POST['ciwcamp_affiliate_id']))
		{
			if($_POST['ciwcamp_affiliate_id'])
			{
				global $wpdb;

				$ciwcamp_affiliate_id = sanitize_text_field($_POST['ciwcamp_affiliate_id']);

				$table = $wpdb->prefix .'posts';

				$primaryKey = 'ID';

				$columns = array(
					array( 'db' => 'sales_id',  'dt' => 0 , 'field' => 'sales_id' ),
					array( 'db' => 'order_id',  'dt' => 1 , 'field' => 'order_id' ),
					array( 'db' => 'product_id', 'dt' => 2 , 'field' => 'product_id' ),
					array( 'db' => 'commission', 'dt' => 3 , 'field' => 'commission' ),					
					array( 'db' => 'created_date',  'dt' => 4 , 'field' => 'created_date' )
          		  ); 

				$sql_details = array(
					'user' => DB_USER,
					'pass' => DB_PASSWORD,
					'db'   => DB_NAME,
					'host' => DB_HOST
				);
			
				$join = "FROM ".$wpdb->prefix ."ciwcamp_sales";
			
				$where = $wpdb->prefix ."ciwcamp_sales.affiliate_id=".$ciwcamp_affiliate_id. " AND ".$wpdb->prefix ."ciwcamp_sales.source='sale'";
				
				include_once( CIWCAMP_PLUGIN_DIR.'admin/ssp/ssp.customized.class.php' );

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
										if( isset($ciwcamp_sales[1]) && !empty($ciwcamp_sales[1]) )
										{
											$ciwcamp_sales_data_ssp['data'][$i][1] = "#".$ciwcamp_sales[1];
										}
										if( isset($ciwcamp_sales[2]) && !empty($ciwcamp_sales[2]))
										{
											$product = wc_get_product( $ciwcamp_sales[2] );
											$ciwcamp_sales_data_ssp['data'][$i][2] = "#".$ciwcamp_sales[2]." ".$product->get_title();
										}
										if( isset($ciwcamp_sales[3]) && !empty($ciwcamp_sales[3]))
										{
											$ciwcamp_sales_data_ssp['data'][$i][3] = get_woocommerce_currency_symbol()." ".$ciwcamp_sales[3];
										}
										if( isset($ciwcamp_sales[4]) && !empty($ciwcamp_sales[4]))
										{
											$ciwcamp_sales_data_ssp['data'][$i][4] =date_format(date_create($ciwcamp_sales[4]),"Y/m/d  H:i:s") ;
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
	}


	
	/**
	 *	Function is used to sanatize text field or array
	 *
	 * @since    1.0.0
	 */	
	function ciwcamp_sanitize_text_field($array) {
		foreach ( $array as $key => &$value ) {
			if ( is_array( $value ) ) {
				$value = ciwcamp_sanitize_text_field($value);
			}
			else {
				$value = sanitize_text_field( $value );
			}
		}
	
		return $array;
	}

	/**
	 *	this function is used for Create Affiliates withdraw request.
	 *
	 * @since    1.0.0
	 */	

	function ciwcamp_affiliate_withdraw_list_cb()
	{
		if(isset($_POST['ciwcamp_affiliate_id']) && !empty($_POST['ciwcamp_affiliate_id']))
		{
			if($_POST['ciwcamp_affiliate_id'])
			{
				global $wpdb;

				$ciwcamp_affiliate_id = sanitize_text_field($_POST['ciwcamp_affiliate_id']);

				$table = $wpdb->prefix .'ciwcamp_withdraw';

				$primaryKey = 'withdraw_id';

				$columns = array(
					array( 'db' => 'withdraw_id',  'dt' => 0 , 'field' => 'withdraw_id' ),
					array( 'db' => 'withdraw_amt',  'dt' => 1 , 'field' => 'withdraw_amt' ),
					array( 'db' => 'status', 'dt' => 2 , 'field' => 'status' ),
					array( 'db' => 'withdraw_method', 'dt' => 3 , 'field' => 'withdraw_method' ),
					array( 'db' => 'created_date', 'dt' => 4 , 'field' => 'created_date' ),
          		  ); 

				$sql_details = array(
					'user' => DB_USER,
					'pass' => DB_PASSWORD,
					'db'   => DB_NAME,
					'host' => DB_HOST
				);
			
				$join = "FROM ".$wpdb->prefix ."ciwcamp_withdraw INNER JOIN ".$wpdb->prefix ."users ON ".$wpdb->prefix ."ciwcamp_withdraw.affiliate_id=".$wpdb->prefix ."users.ID ";
			
				$where = $wpdb->prefix ."ciwcamp_withdraw.affiliate_id=".$ciwcamp_affiliate_id;

				include_once( CIWCAMP_PLUGIN_DIR.'admin/ssp/ssp.customized.class.php' );

				$_POST = $this->ciwcamp_sanitize_text_field( $_POST );

				$ciwcamp_withdraw_request_data_ssp = SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $join, $where );

				if( isset($ciwcamp_withdraw_request_data_ssp) && !empty($ciwcamp_withdraw_request_data_ssp) )
				{
					if( isset($ciwcamp_withdraw_request_data_ssp['data']) && is_array($ciwcamp_withdraw_request_data_ssp['data']) && !empty($ciwcamp_withdraw_request_data_ssp['data']) )
					{
						$i = 0;
						{
							if( isset($ciwcamp_withdraw_request_data_ssp['data'][$i]) )
							{
								
								foreach( $ciwcamp_withdraw_request_data_ssp['data'] as $ciwcamp_withdraw_request )
								{
									if( isset($ciwcamp_withdraw_request) && !empty($ciwcamp_withdraw_request) )
									{
										if( isset($ciwcamp_withdraw_request[0]) && !empty($ciwcamp_withdraw_request[0]) )
										{
											$ciwcamp_withdraw_request_data_ssp['data'][$i][0] = "#".$ciwcamp_withdraw_request[0];
										}
										if( isset($ciwcamp_withdraw_request[1]) && !empty($ciwcamp_withdraw_request[1]))
										{
											$ciwcamp_withdraw_request_data_ssp['data'][$i][1] = $ciwcamp_withdraw_request[1];
										}
										if( isset($ciwcamp_withdraw_request[2]) && !empty($ciwcamp_withdraw_request[2]))
										{
											$ciwcamp_withdraw_request_data_ssp['data'][$i][2] = $ciwcamp_withdraw_request[2];
										}
										if( isset($ciwcamp_withdraw_request[3]) && !empty($ciwcamp_withdraw_request[3]))
										{
											$ciwcamp_withdraw_request_data_ssp['data'][$i][3] = $ciwcamp_withdraw_request[3];
										}
										if( isset($ciwcamp_withdraw_request[4]) && !empty($ciwcamp_withdraw_request[4]))
										{
											$ciwcamp_withdraw_request_data_ssp['data'][$i][4] = $ciwcamp_withdraw_request[4];
										}																
									}
									$i++;
								}
							}
						}
					}
				}

				echo json_encode($ciwcamp_withdraw_request_data_ssp);

			wp_die();
			}
		}
	}
	

	/**
	 * this function is used for display withdraw request.
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_withdraw_request_list_cb()
	{
		if(isset($_POST['ciwcamp_status']) && !empty($_POST['ciwcamp_status']))
		{
			$ciwcamp_status = sanitize_text_field($_POST['ciwcamp_status']);

			global $wpdb;

			$table = $wpdb->prefix .'ciwcamp_withdraw';

			$primaryKey = 'withdraw_id';

			$columns = array(
				array( 'db' => 'withdraw_id',  'dt' => 0 , 'field' => 'withdraw_id' ),
				array( 'db' => 'ID',  'dt' => 1 , 'field' => 'ID' ),
				array( 'db' => 'display_name',  'dt' => 2 , 'field' => 'display_name' ),
				array( 'db' => 'withdraw_amt',  'dt' => 3 , 'field' => 'withdraw_amt' ),
				array( 'db' => 'withdraw_method',  'dt' => 4 , 'field' => 'withdraw_method' ),
				array( 'db' => 'status', 'dt' => 5 , 'field' => 'status' ),
				array( 'db' => 'created_date', 'dt' => 6 , 'field' => 'created_date' ),
				array( 'db' => 'withdraw_id', 'dt' => 7 , 'field' => 'withdraw_id' ),
				); 

			$sql_details = array(
				'user' => DB_USER,
				'pass' => DB_PASSWORD,
				'db'   => DB_NAME,
				'host' => DB_HOST
			);
		
			$join = "FROM ".$wpdb->prefix ."ciwcamp_withdraw INNER JOIN ".$wpdb->prefix ."users ON  ".$wpdb->prefix ."ciwcamp_withdraw.affiliate_id=".$wpdb->prefix ."users.ID ";
			
			if($ciwcamp_status!="all")
			{
				$where = "status='$ciwcamp_status'";
			}
			else
			{
				$where = "";
			}	

			include_once( CIWCAMP_PLUGIN_DIR.'admin/ssp/ssp.customized.class.php' );

			$ciwcamp_withdraw_request_data_ssp =  SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $join, $where  );

			if( isset($ciwcamp_withdraw_request_data_ssp) && !empty($ciwcamp_withdraw_request_data_ssp) )
			{
				if( isset($ciwcamp_withdraw_request_data_ssp['data']) && is_array($ciwcamp_withdraw_request_data_ssp['data']) && !empty($ciwcamp_withdraw_request_data_ssp['data']) )
				{
					$i = 0;
					{
						if( isset($ciwcamp_withdraw_request_data_ssp['data'][$i]) )
						{
							
							foreach( $ciwcamp_withdraw_request_data_ssp['data'] as $ciwcamp_withdraw_request )
							{
								if( isset($ciwcamp_withdraw_request) && !empty($ciwcamp_withdraw_request) )
								{
									if( isset($ciwcamp_withdraw_request[0]) && !empty($ciwcamp_withdraw_request[0]) )
									{
										$ciwcamp_withdraw_request_data_ssp['data'][$i][0] = "#".$ciwcamp_withdraw_request[0];
									}
									if( isset($ciwcamp_withdraw_request[1]) && !empty($ciwcamp_withdraw_request[1]) )
									{
										$ciwcamp_withdraw_request_data_ssp['data'][$i][1] = "#".$ciwcamp_withdraw_request[1];
									}			
									if( isset($ciwcamp_withdraw_request[2]) && !empty($ciwcamp_withdraw_request[2]) )
									{
										$ciwcamp_withdraw_request_data_ssp['data'][$i][2] = $ciwcamp_withdraw_request[2];
									}
									if( isset($ciwcamp_withdraw_request[3]) && !empty($ciwcamp_withdraw_request[3]))
									{
										$ciwcamp_withdraw_request_data_ssp['data'][$i][3] = $ciwcamp_withdraw_request[3];
									}
									if( isset($ciwcamp_withdraw_request[4]) && !empty($ciwcamp_withdraw_request[4]))
									{
										$ciwcamp_withdraw_request_data_ssp['data'][$i][4] = $ciwcamp_withdraw_request[4];
									}
									if( isset($ciwcamp_withdraw_request[5]) && !empty($ciwcamp_withdraw_request[5]))
									{
										$ciwcamp_withdraw_request_data_ssp['data'][$i][5] = $ciwcamp_withdraw_request[5];
									}
									if( isset($ciwcamp_withdraw_request[6]) && !empty($ciwcamp_withdraw_request[6]))
									{
										$ciwcamp_withdraw_request_data_ssp['data'][$i][6] = date_format(date_create($ciwcamp_withdraw_request[6]),"d-m-Y") ;
									}
									if( isset($ciwcamp_withdraw_request[7]) && !empty($ciwcamp_withdraw_request[7]) )
									{
										if($ciwcamp_withdraw_request[5]=="Pending")
										{
											$ciwcamp_withdraw_request_data_ssp['data'][$i][7] = "<td>
											
											
											<a href='#' type='button' class='ciwcamp-approve-withdraw' title='Approved' data-id=".$ciwcamp_withdraw_request[0]." ><span class='dashicons dashicons-yes ciwcamp-action-btn-approve'></span></a>
											
											<a href='#' type='button' class='ciwcamp-reject-withdraw' title='Reject' data-id=".$ciwcamp_withdraw_request[0]." ><span class='dashicons dashicons-no ciwcamp-action-btn-reject'></span></a>									
											
											<a href='#' type='button' class='ciwcamp-delete-withdraw' title='Delete' data-id=".$ciwcamp_withdraw_request[0]." ><span class='dashicons dashicons-trash ciwcamp-action-btn-delete'></span></a>										
											
											</td>";
										}
										else
										{
											$ciwcamp_withdraw_request_data_ssp['data'][$i][7] = "<td>
											
											<a href='#' type='button' class='ciwcamp-delete-withdraw' title='Delete'  data-id=".$ciwcamp_withdraw_request[0]."><span class='dashicons dashicons-trash ciwcamp-action-btn-delete'></span></a>										
											
											</td>";
										}
									}															
								}
							$i++;
							}
						}
					}
				}
				echo json_encode($ciwcamp_withdraw_request_data_ssp);
			    wp_die();
			}
		}
	}


	/**
	 * this function is used for display withdraw request.
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_approve_withdraw_cb()
	{
		if(isset($_POST['ciwcamp_withdraw_id']) && !empty($_POST['ciwcamp_withdraw_id']))
		{ 
			$ciwcamp_withdraw_id = sanitize_text_field( $_POST['ciwcamp_withdraw_id'] );

			global $wpdb;
			$ciwcamp_table_name  = $wpdb->prefix."ciwcamp_withdraw";
			$ciwcamp_withdraw_db_query = "SELECT * FROM $ciwcamp_table_name WHERE withdraw_id = %d";
			$ciwcamp_withdraw_request = $wpdb->get_results($wpdb->prepare($ciwcamp_withdraw_db_query,sanitize_text_field($ciwcamp_withdraw_id)));
			$ciwcamp_affiliate_id = $ciwcamp_withdraw_request[0]->affiliate_id;
			$ciwcamp_payment_method = $ciwcamp_withdraw_request[0]->withdraw_method;
			$ciwcamp_payment_amt = $ciwcamp_withdraw_request[0]->withdraw_amt;
			$ciwcamp_withdraw_id = $ciwcamp_withdraw_request[0]->withdraw_id;

			require_once(CIWCAMP_PLUGIN_DIR.'admin/partials/payment/ciwcamp-load-payment-method.php');

			$ciwcamp_payment_obj = new Ciwcamp_Payment_Gateways;
			$ciwcamp_payement_msg = $ciwcamp_payment_obj->ciwcamp_load_avail_method($ciwcamp_payment_method, $ciwcamp_affiliate_id, $ciwcamp_payment_amt,$ciwcamp_withdraw_id);
			if($ciwcamp_payement_msg== "done")
			{
				echo json_encode(1);
				wp_die();
			}
			else 
			{
				echo json_encode(0);
				wp_die();
			}	
		} 
		wp_die();
	}



	/**
	 *	this function is used for Reject withdraw request.
	 *
	 * @since    1.0.0
	 */	

	function ciwcamp_reject_withdraw_cb()
	{ 
		if(isset($_POST['ciwcamp_withdraw_id']) && !empty($_POST['ciwcamp_withdraw_id']))
		{ 
			$ciwcamp_withdraw_id = sanitize_text_field( $_POST['ciwcamp_withdraw_id'] );

			global $wpdb;
			$ciwcamp_table_name  = $wpdb->prefix."ciwcamp_withdraw";
			$ciwcamp_updated= $wpdb->query( $wpdb->prepare("UPDATE $ciwcamp_table_name 
						SET status = %s 
					WHERE withdraw_id = %s", "Rejected", $ciwcamp_withdraw_id)
			);
			if($ciwcamp_updated)
			{
				echo json_encode(1);
				wp_die();
			}
			else
			{
				echo json_encode(0);
				wp_die();
			}

		} wp_die();
	}


	/**
	 *	this function is used for Reject withdraw request.
	 *
	 * @since    1.0.0
	 */	

	function ciwcamp_withdraw_delete_cb()
	{
		if(isset($_POST['ciwcamp_withdraw_id']) && !empty($_POST['ciwcamp_withdraw_id']))
		{
			$ciwcamp_withdraw_id = sanitize_text_field( $_POST['ciwcamp_withdraw_id'] );

			global $wpdb;
			$table_name  = $wpdb->prefix."ciwcamp_withdraw";

			$ciwcamp_withdraw_request_deleted = $wpdb->query( $wpdb->prepare("DELETE FROM $table_name 
					WHERE withdraw_id = %s", $ciwcamp_withdraw_id));
			if($ciwcamp_withdraw_request_deleted)
			{
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
	 *	this function is used for sale list.
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_sales_list_cb()
	{
		include_once CIWCAMP_PLUGIN_DIR.'admin/partials/admin-functionality/ciwcamp-sales-commission-list.php';
	}
	

	/**
	 *  this function is used for save comman setting
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_commission_setting_cb()
	{
		if(isset($_POST['ciwcamp_comman_commission_type']) && !empty($_POST['ciwcamp_comman_commission_type'])
		&& isset($_POST['ciwcamp_common_commission_value']) && !empty($_POST['ciwcamp_common_commission_value'])
		)
		{
			$ciwcamp_comman_commission_type = sanitize_text_field($_POST['ciwcamp_comman_commission_type']);
			$ciwcamp_common_commission_value = sanitize_text_field($_POST['ciwcamp_common_commission_value']);
			$ciwcamp_comman_commission = array($ciwcamp_comman_commission_type, $ciwcamp_common_commission_value);

			$comman_commission_saved = update_option("ciwcamp-common-commission", $ciwcamp_comman_commission);
			
			echo json_encode(1);
			wp_die();
			
		}
		echo json_encode(0);
		wp_die();

	}

	
	/**
	 *  this function is used for save setting
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_admin_setting_cb()
	{
		if(isset($_POST['ciwcamp_signup_bonus']) && 
		isset($_POST['ciwcamp_cookie_time']) && 
		isset($_POST['ciwcamp_affiliate_pending_msz']) &&
		isset($_POST['ciwcamp_affiliate_reject_msz']) &&
		isset($_POST['ciwcamp_affiliate_disable_msz']) && 
		isset($_POST['ciwcamp_affiliate_ban_msz'])) 
		{
			$ciwcamp_signup_bonus = sanitize_text_field($_POST['ciwcamp_signup_bonus']);
			$ciwcamp_cookie_time = sanitize_text_field($_POST['ciwcamp_cookie_time']);
			$ciwcamp_affiliate_pending_msz = sanitize_text_field($_POST['ciwcamp_affiliate_pending_msz']);
			$ciwcamp_affiliate_reject_msz = sanitize_text_field($_POST['ciwcamp_affiliate_reject_msz']);
			$ciwcamp_affiliate_disable_msz = sanitize_text_field($_POST['ciwcamp_affiliate_disable_msz']);
			$ciwcamp_affiliate_ban_msz = sanitize_text_field($_POST['ciwcamp_affiliate_ban_msz']);

			if(!empty($ciwcamp_signup_bonus))
			{
				$ciwcamp_update = update_option("ciwcamp-signup-bonus", $ciwcamp_signup_bonus);
			}
			if(!empty($ciwcamp_cookie_time))
			{
				$ciwcamp_update = update_option("ciwcamp-cookie-time", $ciwcamp_cookie_time);
			}
			if(!empty($ciwcamp_affiliate_pending_msz))
			{
				$ciwcamp_update = update_option("ciwcamp_affiliate_pending_msz", $ciwcamp_affiliate_pending_msz);
			}
			if(!empty($ciwcamp_affiliate_reject_msz))
			{
				$ciwcamp_update = update_option("ciwcamp_affiliate_reject_msz", $ciwcamp_affiliate_reject_msz);
			}
			if(!empty($ciwcamp_affiliate_disable_msz))
			{
				$ciwcamp_update = update_option("ciwcamp_affiliate_disable_msz", $ciwcamp_affiliate_disable_msz);
			}
			if(!empty($ciwcamp_affiliate_ban_msz))
			{
				$ciwcamp_update = update_option("ciwcamp_affiliate_ban_msz", $ciwcamp_affiliate_ban_msz);
			}			
			echo json_encode(1);
			wp_die();
		}
	}


	/**
	 *  this function is used for save bank tranfer settings
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_save_bank_transfer_details_cb()
	{
		if(isset($_POST['ciwcamp_active_bank_tranfer']))
		{
			$ciwcamp_active_bank_tranfer = sanitize_text_field($_POST['ciwcamp_active_bank_tranfer']);
			if($ciwcamp_active_bank_tranfer)
			{
				update_option("ciwcamp_active_bank_tranfer", "");
				echo json_encode(2);
				wp_die();
			}
			else
			{
				update_option("ciwcamp_active_bank_tranfer", $ciwcamp_active_bank_tranfer);
				echo json_encode(1);
				wp_die();
			}
			wp_die();
		}
		wp_die();
	}


	/**
	 *  this function is used for save cash tranfer settings
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_save_cash_transfer_details_cb()
	{
		if(isset($_POST['ciwcamp_active_cash_transfer']))
		{
			$ciwcamp_active_cash_transfer = sanitize_text_field($_POST['ciwcamp_active_cash_transfer']);
			if($ciwcamp_active_cash_transfer=="")
			{
				update_option("ciwcamp_active_cash_transfer", "");
				echo json_encode(2);
				wp_die();
			}
			else
			{
				update_option("ciwcamp_active_cash_transfer", $ciwcamp_active_cash_transfer);
				echo json_encode(1);
				wp_die();
			}
			wp_die();
		}
		wp_die();
	}
	

	/**
	 *  this function is used for approve affiliate sale
	 *
	 * @since    1.0.0
	 */


	function ciwcamp_affiliate_sales_amount_transfer_cb($order_id,$old_status,$new_status)
	{
		$ciwcamp_selected_status = get_option("ciwcamp-sale-conversion-settings");
		if($ciwcamp_selected_status == $new_status)
		{
			global $wpdb;
			$ciwcamp_table_name = $wpdb->prefix . "ciwcamp_sales";

			$ciwcamp_visits_db_query = "SELECT * FROM $ciwcamp_table_name WHERE status = %s AND order_id = %d";
			$ciwcamp_pending_sales = $wpdb->get_results($wpdb->prepare($ciwcamp_visits_db_query, 'Pending', sanitize_text_field($order_id)));
			foreach($ciwcamp_pending_sales as $ciwcamp_data)
			{
			$ciwcamp_status_updated = $wpdb->query( $wpdb->prepare("UPDATE $ciwcamp_table_name 
						SET status = %s 
					WHERE sales_id = %s" , 'Approved', $ciwcamp_data->sales_id));
			}
		}

	}


	/**
	 *  this function is used for affiliate couter details
	 *
	 * @since    1.0.0
	 */

	 
	function ciwcamp_affiliate_status_count_cb()
	{
		if(isset($_POST['ciwcamp_affiliate_status_count']) && !empty($_POST['ciwcamp_affiliate_status_count']))
		{
			$ciwcamp_status_count = sanitize_text_field($_POST['ciwcamp_affiliate_status_count']);
			if($ciwcamp_status_count == "Yes")
			{
				global $wpdb;
				$ciwcamp_table_name = $wpdb->prefix . "usermeta";
				$ciwcamp_all_affiliate_data = $wpdb->get_results( "SELECT count(user_id) as affiliates FROM $ciwcamp_table_name WHERE meta_key='ciwcamp_affiliate_registration'" );
				$ciwcamp_disabled_affiliate_data = $wpdb->get_results( "SELECT count(user_id) as affiliates FROM $ciwcamp_table_name WHERE meta_value='Disable'" );
				$ciwcamp_banned_affiliate_data = $wpdb->get_results( "SELECT count(user_id) as affiliates FROM $ciwcamp_table_name WHERE meta_value='Banned'" );
				$ciwcamp_rejected_affiliate_data = $wpdb->get_results( "SELECT count(user_id) as affiliates FROM $ciwcamp_table_name WHERE meta_value='Reject'" );
				$ciwcamp_pending_affiliate_data = $wpdb->get_results( "SELECT count(user_id) as affiliates FROM $ciwcamp_table_name WHERE meta_key='ciwcamp_affiliate_registration' AND meta_value='1'" );

				echo json_encode(array($ciwcamp_all_affiliate_data[0]->affiliates, $ciwcamp_disabled_affiliate_data[0]->affiliates, $ciwcamp_banned_affiliate_data[0]->affiliates, $ciwcamp_rejected_affiliate_data[0]->affiliates, $ciwcamp_pending_affiliate_data[0]->affiliates));
				wp_die();
			} wp_die();
		}
	}


	/**
	 *  this function is used update active tab
	 *
	 * @since    1.0.0
	 */

	function ciwcamp_current_active_cb()
	{ 
		if(isset($_POST['ciwcamp_href']) && !empty($_POST['ciwcamp_href']))
		{
			$ciwcamp_href = sanitize_text_field($_POST['ciwcamp_href']);

			$ciwcamp_updated = update_option("ciwcamp-active-tab", $ciwcamp_href);

			echo json_encode(1);
			wp_die();
		}
		wp_die();
	}
}




