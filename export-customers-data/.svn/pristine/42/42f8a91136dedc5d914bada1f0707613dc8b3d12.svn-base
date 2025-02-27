<?php if ( ! defined( 'ABSPATH' ) ) exit; 

	
	
	function wcde_sanitize_data( $input ) {
		if(is_array($input)){		
			$new_input = array();	
			foreach ( $input as $key => $val ) {
				$new_input[ $key ] = (is_array($val)?wcde_sanitize_data($val):sanitize_text_field( $val ));
			}			
		}else{
			$new_input = sanitize_text_field($input);			
			if(stripos($new_input, '@') && is_email($new_input)){
				$new_input = sanitize_email($new_input);
			}
			if(stripos($new_input, 'http') || wp_http_validate_url($new_input)){
				$new_input = esc_url_raw($new_input);
			}			
		}	
		return $new_input;
	}	
	
	if(!function_exists('wcde_pre')){
	function wcde_pre($data){
			if(isset($_GET['debug'])){
				wcde_pree($data);
			}
		}	 
	} 	
	if(!function_exists('wcde_pree')){
	function wcde_pree($data){
				echo '<pre>';
				print_r($data);
				echo '</pre>';	
		
		}	 
	} 
	
	function wcde_settings_update(){
		
		
		
		if(!empty($_POST) && is_admin()){
		
			global $wcde_currency, $wcde_settings;
			
			
			
			
			//pree($_POST);exit;
				
			if (isset($_POST['export_data'])) {
				if (
						!isset($_POST['export_customer_field'])
					|| 
						!wp_verify_nonce($_POST['export_customer_field'], 'export_customer_action')
				) {
			
					_e('Sorry, your nonce did not verify.', 'woo-cde');
					exit;
				} else {
			
					if(!class_exists('XLSXWriter')){
						$xlsxwriter = WCDE_PLUGIN_DIR . '/inc/xlsxwriter.class.php';//exit;
						if(file_exists($xlsxwriter)){
							//echo 
							include_once($xlsxwriter);
							//exit;
						}
					}else{
						//echo 'XLSXWriter';exit;
					}
					
					if(class_exists('XLSXWriter')){
						
						if(class_exists('ZipArchive')){
							
							global $export_column;
							//$export_column = wcde_sanitize_data($_POST["customer_data"]);
							$export_column = array_map( 'sanitize_text_field', wp_unslash( $_POST['customer_data'] ) );
							//pree($export_column);exit;
							$query = new WC_Order_Query(array(
								'limit' => -1,
								'post_type' => 'shop_order',
								'orderby' => 'date',
								'order' => 'DESC'
							));
					
							$orders = $query->get_orders();
							//pree($orders);exit;
							if (!empty($orders)) {
								global $emails_added;
								$emails_added = array();
								
								$billing_address = array_map(function ($order) {
									global $export_column, $emails_added;
									$single_address =  $order->get_address();
									
									$single_address['country'] = WC()->countries->countries[ $single_address['country'] ];
									if(!is_null($export_column) && !in_array($single_address['email'], $emails_added)){
										//pree($single_address['email']);
										//pree($single_address);										
										$emails_added[] = $single_address['email'];
										$single_address['order_id'] = $order->get_id();
										$selected_columns = array_intersect_key($single_address, $export_column);
										return array_values($selected_columns);
									}else{
										return false;
									}
								}, $orders);
							}
						
							$billing_address = array_filter($billing_address);
							//pree($billing_address);exit;
					
							
							ob_clean();
							$filename = "customer_data.xlsx";
							header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
							header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
							header('Content-Transfer-Encoding: binary');
							header('Cache-Control: must-revalidate');
							header('Pragma: public');
					
							$header = array();
							if(!empty($export_column)){
								foreach ($export_column as $key => $value) {
									$header[$key] = 'string';
								}
							}
							
							
							
							$writer = new XLSXWriter();
							$writer->writeSheetHeader('Sheet1', $header);
							
							//pree($billing_address);exit;
							//$billing_address = array_unique($billing_address);
							
							foreach($billing_address as $row){
								$writer->writeSheetRow('Sheet1', $row);
								sleep(0.25);
							}
							
							//pree($billing_address);exit;
							
							$writer->writeToStdOut();//
							
						}else{
							_e('PHP Class ZipArchive is missing. Please check it with your hosting server settings.', 'woo-cde');
						}
							
						
						exit;
					}else{
						//echo '>P<';exit;
					}
				}
			}			
		
	
			
	
		}
	}
	
	//wcde_settings_update();
	//add_action('admin_init', 'wcde_settings_update');	
	add_action('init', 'wcde_settings_update');
	


	function wcde_admin_menu()
	{
		global $wcde_data;
		
		$title = str_replace('WooCommerce', 'WC', $wcde_data['Name']);
		add_submenu_page('woocommerce', $title, __('Export Customers', 'woo-cde'), 'manage_woocommerce', 'wcde_settings', 'wcde_settings' );



	}

	function wcde_settings(){ 



		if ( !current_user_can( 'administrator' ) )  {



			wp_die( __( 'You do not have sufficient permissions to access this page.', 'woo-cde' ) );



		}



		global $wpdb; 

		

				
		include('wcde_settings.php');	

		

	}
	
	
	function wcde_plugin_linx($links) { 

		global $wcde_premium_copy, $wcde_pro;


		$settings_link = '<a href="admin.php?page=wcde_settings">'.__('Settings', 'woo-cde').'</a>';

		
		if($wcde_pro){
			array_unshift($links, $settings_link); 
		}else{
			 
			$wcde_premium_link = '<a href="'.esc_url($wcde_premium_copy).'" title="'.__('Go Premium', 'woo-cde').'" target="_blank">'.__('Go Premium', 'woo-cde').'</a>'; 
			array_unshift($links, $settings_link, $wcde_premium_link); 
		
		}
				
		
		return $links; 
	}
	
	
	function wcde_array_unique_recursive($array)
	{
		$array = array_unique($array, SORT_REGULAR);
	
		foreach ($array as $key => $elem) {
			if (is_array($elem)) {
				$array[$key] = wcde_array_unique_recursive($elem);
			}
		}
	
		return $array;
	}	
	
		
	if (!function_exists('wcde_fetch_array')) {
		function wcde_fetch_array($result)
		{
			return json_decode(json_encode($result), true);
		}
	}	
		
	function wcde_admin_scripts() {
		
	
		wp_enqueue_script('wcde-boostrap-script', plugins_url('js/bootstrap.js', dirname(__FILE__)), array('jquery'), '1.0', true);
		wp_enqueue_style('wcde-boostrap-style', plugins_url('css/bootstrap.css', dirname(__FILE__)));
		wp_enqueue_style('fontawesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
		
		
		wp_register_style('wcde-admin', plugins_url('css/admin-style.css?t='.time(), dirname(__FILE__)));
		
		
		wp_enqueue_style( 'wcde-admin' );
		
		wp_enqueue_script(
			'wcde_scripts',
			plugins_url('js/admin-scripts.js', dirname(__FILE__)),
			array('jquery'),
			time()
		);		
		

		$translation_array = array(
			'this_url' => admin_url( 'admin.php?page=wcde_settings' ),			
			'wcde_tab' => (isset($_GET['t'])?$_GET['t']:'0'),
			
		);
		
		
		
		wp_localize_script( 'wcde_scripts', 'wcde_obj', $translation_array );
		
		
		
		
		
	}		
	
	

	function wcde_admin_head(){
		global $wcde_url;
		
?>

	<style type="text/css">
	
		
		li.current a[href="admin.php?page=wcde_settings"], 
		li.current a[href="admin.php?page=wcde_settings"]:hover {
			background-color: #32373C !important;
			color: #fff !important;
			background-image:url("<?php echo $wcde_url; ?>img/woo.png?<?php echo time(); ?>") !important;
			background-size: 18px !important;
			background-repeat: no-repeat !important;
			background-position: 4px 10px !important;
			text-indent: 14px !important;
			font-size: 12px !important;
		}
				
		li.current a[href="admin.php?page=wcde_settings"]:hover {
			background-color: #32373C !important;
			color: #fff !important;
		}
		
		@media only screen and (max-device-width: 480px) {
			
			
		}			
		
		/* ipad */
		@media only screen 
		and (min-device-width : 768px) 
		and (max-device-width : 1024px)  {
		}
		
		@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {

		}
		@supports (-ms-accelerator:true) {
		  /* IE Edge 12+ CSS styles go here */ 
		}				
	</style>
    <script type="text/javascript" language="javascript">
		jQuery(document).ready(function($){
			<?php if(isset($_GET['mt']) && isset($_GET['post'])): ?>
			if($('.woocommerce-order-data__heading').length>0){
				$('.woocommerce-order-data__heading').html('Order #<?php echo wcde_sanitize_data($_GET['mt']); ?>');
			}
			<?php endif; ?>
		});
	</script>
<?php		
		
	}
	
	add_action('admin_head', 'wcde_admin_head');		