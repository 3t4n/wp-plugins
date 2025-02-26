<?php
/**
 * Easy Export
 *
 * Plugin Name: Easy Export
 * Plugin URI: https://wordpress.org/plugins/easy-export/
 * Description: Easy Export export reports.
 * Version: 1.3.0
 * Author: H.P. Gong
 * License: GPL-3.0+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 *
 */

// Exit if accessed directly.
if(! defined('ABSPATH')){exit;}

// Define urls
define('hp_easy_export_report_url_p', plugin_dir_url( __FILE__ ));

// Check is HP_Easy_Export exists
if(!class_exists('HP_Easy_Export')){

// Class HP Easy Export
  class HP_Easy_Export{

   // Function __construct
   public function __construct(){
	  add_action('admin_menu', array($this, 'add_admin_menu'));
	  add_action('admin_init', array($this, 'create_export_scripts'));
	  add_action('init', array($this, 'check_if_woo_install'));
	  add_action('init', array($this, 'check_versions'));
	  add_action('init', array($this, 'validate_form'));
	  }

	   // Activation Function
	  public function activate_hp_easy_export_report(){
	   }

	   // Deactivation Function
	  public function deactivate_hp_easy_export_report(){
	   }

	   // Uninstall Function
	  public function uninstall_hp_easy_export_report(){
	   }

	  // Check if WooCommerce plugin is install and activated
	  // in order for Easy Export plugin to run
	  public function check_if_woo_install(){
	   if (! class_exists('WooCommerce')){
	   $url = admin_url('/plugins.php');
	   require_once(ABSPATH . 'wp-admin/includes/plugin.php');
	   deactivate_plugins( plugin_basename( __FILE__ ));
	   wp_die( __('Easy Export requires WooCommerce to run. <br>Please install WooCommerce and activate before attempting to activate again.<br><a href="'.$url.'">Return to the Plugins section</a>'));
	   }
       }

       // Check if WooCommerce plugin has the current version and
	   // activated in order for Easy Export plugin to run
	   public function check_versions(){
	    global $woocommerce;
	    if (version_compare($woocommerce->version, '4.8.0', '<')){
	    $url = admin_url('/plugins.php');
	    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
	    deactivate_plugins( plugin_basename( __FILE__ ));
	    wp_die( __('Easy Export is disabled.<br>Easy Export requires a minimum of WooCommerce v4.8.0.<br><a href="'.$url.'">Return to the Plugins section</a>'));
	    }
	    }

	   // Add Menu Button/Menu Page & Submenu Buttons/Submenu Pages
	   public function add_admin_menu(){
		add_menu_page('Easy Export', 'Easy Export', 'administrator', 'hp_easy_export_report', array($this, 'plugin_settings'), hp_easy_export_report_url_p . 'img/icon.png', 59);
		add_submenu_page('hp_easy_export_report', 'Order / Sale List', 'Order / Sale List', 'manage_options', 'hp_easy_export_report', 'hp_easy_export_report', 'hp_easy_export_report1');
		add_submenu_page('hp_easy_export_report', 'Customer List', 'Customer List', 'manage_options', 'hp_easy_customer_list', 'hp_easy_customer_list', 'hp_easy_export_report3');
        add_submenu_page('hp_easy_export_report', 'Product List', 'Product List', 'manage_options', 'hp_easy_product_list', 'hp_easy_product_list', 'hp_easy_export_report4');
		}

		// Only Administrator have permissions to access this page
	   public static function plugin_settings() {
	    if (!current_user_can('administrator')){
	    wp_die('You do not have sufficient permissions to access this page.');
	    }
	    }

	   // Verify Nonce Form
	   public function validate_form() {
        if(isset($_POST['btn_grey1'])){
        if (!isset($_POST['hp_display_export_report_nonce1']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce1'], 'hp_easy_export_report_e2')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray1'])){
        if (!isset($_POST['hp_display_export_report_nonce2']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce2'], 'hp_easy_export_report_e1')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey2'])){
        if (!isset($_POST['hp_display_export_report_nonce3']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce3'], 'hp_easy_export_report_e4')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray2'])){
        if (!isset($_POST['hp_display_export_report_nonce4']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce4'], 'hp_easy_export_report_e3')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey3'])){
        if (!isset($_POST['hp_display_export_report_nonce5']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce5'], 'hp_easy_export_report_e6')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray3'])){
        if (!isset($_POST['hp_display_export_report_nonce6']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce6'], 'hp_easy_export_report_e5')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey4'])){
        if (!isset($_POST['hp_display_export_report_nonce7']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce7'], 'hp_easy_export_report_e8')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray4'])){
        if (!isset($_POST['hp_display_export_report_nonce8']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce8'], 'hp_easy_export_report_e7')){
        wp_die('You do not have access to this page.');
        }
        }
	    if(isset($_POST['btn_grey5'])){
        if (!isset($_POST['hp_display_export_report_nonce9']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce9'], 'hp_easy_export_report_e10')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray5'])){
        if (!isset($_POST['hp_display_export_report_nonce10']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce10'], 'hp_easy_export_report_e9')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey6'])){
        if (!isset($_POST['hp_display_export_report_nonce11']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce11'], 'hp_easy_export_report_e12')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray6'])){
        if (!isset($_POST['hp_display_export_report_nonce12']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce12'], 'hp_easy_export_report_e11')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey7'])){
        if (!isset($_POST['hp_display_export_report_nonce13']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce13'], 'hp_easy_export_report_e14')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray7'])){
        if (!isset($_POST['hp_display_export_report_nonce14']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce14'], 'hp_easy_export_report_e13')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey7'])){
        if (!isset($_POST['hp_display_export_report_nonce15']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce15'], 'hp_easy_export_report_e16')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray7'])){
        if (!isset($_POST['hp_display_export_report_nonce16']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce16'], 'hp_easy_export_report_e15')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey7'])){
        if (!isset($_POST['hp_display_export_report_nonce17']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce17'], 'hp_easy_export_report_e18')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray7'])){
        if (!isset($_POST['hp_display_export_report_nonce18']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce18'], 'hp_easy_export_report_e17')){
        wp_die('You do not have access to this page.');
        }
        }
	    }

	   // Register the jQuery & CSS scripts and link the files
	   public function create_export_scripts(){
	   // jQuery
	    wp_enqueue_script('jquery');
	   // jQuery scripts for Easy Export
	    wp_register_script('export', hp_easy_export_report_url_p .'js/export.js', array('jquery'));
		wp_register_script('easy_export', hp_easy_export_report_url_p .'js/easy_export.js', array('jquery'));
	    wp_register_script('printPreview', hp_easy_export_report_url_p .'js/printPreview.js', array('jquery'));
		wp_register_script('jquery.multipurpose_tabcontent', hp_easy_export_report_url_p .'js/jquery.multipurpose_tabcontent.js', array('jquery'));
	    wp_register_script('jspdf.debug', hp_easy_export_report_url_p .'js/jspdf.debug.js', array('jquery'));
        wp_register_script('jspdf.plugin.autotable', hp_easy_export_report_url_p .'js/jspdf.plugin.autotable.js', array('jquery'));
		wp_enqueue_script('export');
		wp_enqueue_script('easy_export');
		wp_enqueue_script('printPreview');
		wp_enqueue_script('jquery.multipurpose_tabcontent');
		wp_enqueue_script('jspdf.debug');
		wp_enqueue_script('jspdf.plugin.autotable');
	   // CSS scripts for export
	    wp_register_style('export', hp_easy_export_report_url_p . 'css/export.css');
	    wp_enqueue_style('export');
		wp_register_style('animate', hp_easy_export_report_url_p . 'css/animate.css');
	    wp_enqueue_style('animate');
	    wp_register_style('style', hp_easy_export_report_url_p . 'css/style.css');
	    wp_enqueue_style('style');
	    }
  }

	   // The hp_easy_export_report function will export the Order List in PDF, CSV and Print
       function hp_easy_export_report(){

         echo '<div class="tab_wrapper first_tab">
               <ul class="tab_list">
               <li class="active">Order List</li>
               <li>Order Summary</li> 
			   <li>Yearly Summary</li> 
			   <li>Total Sales Amount</li> 
              </ul>';
		echo '<div class="content_wrapper">';
        echo '<div class="tab_content active">';
	    echo '<form method="POST" action="">';
	    echo wp_nonce_field('hp_easy_export_report_e1', 'hp_display_export_report_nonce2');
        echo '<div id="dvData1">
	    <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport1">
	    <thead>
	    <tr>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">ID</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Order Date</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">First Name</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Last Name</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Phone Number</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Email</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Status</th>
		<th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Sub Total</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Taxes</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Discount</th>
		<th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Shipping Cost</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Order Total</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Date Complete</th>
	    </tr>
	    </thead>
	    <tbody>';	 
	     global $woocommerce;
	     $query1 = array('post_type' => 'shop_order', 'post_status' => array('wc-completed', 'wc-processing', 'wc-on-hold', 'wc-pending'), 'posts_per_page' => -1);
	     $loop1 = new WP_Query($query1);
	     if($loop1->have_posts()){
	     while ($loop1->have_posts() ){
	     $loop1->the_post();
	     $order_id1 = $loop1->post->ID;
	     $order1 = new WC_Order($order_id1);
		 echo '<tr>
		<td style="border: 1px solid black;">'.sanitize_text_field($order1->get_id()).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_date_created()->date_i18n(__('m-d-Y', 'woocommerce' ))).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_billing_first_name()).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_billing_last_name()).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_billing_phone()).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_billing_email()).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field(ucfirst(str_replace("wc-","", $order1->get_status()))).'</td>
		<td style="border: 1px solid black;">'.sanitize_text_field(wc_price($order1->get_subtotal())).'</td>
		<td style="border: 1px solid black;">'.sanitize_text_field(wc_price($order1->get_total_tax())).'</td>
		<td style="border: 1px solid black;">'.sanitize_text_field(wc_price($order1->get_total_discount())).'</td>
		<td style="border: 1px solid black;">'.sanitize_text_field(wc_price($order1->get_shipping_total())).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field(wc_price($order1->get_total())).'</td>
		<td style="border: 1px solid black;">'.sanitize_text_field($order1->paid_date).'</td> 
		   </tr>';
			    }
			    } 
	    echo '</tbody>
	    </table>
	    </div>
	    <br>';
	    include 'pdf/pdf1.php';
        include 'csv/csv1.php';
        echo wp_nonce_field('hp_easy_export_report_e2', 'hp_display_export_report_nonce1');
        include 'print/print1.php';
        echo '</form></div>';
		
		 echo '<div class="tab_content">';
         echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e3', 'hp_display_export_report_nonce4');
		 echo'
         <div id="dvData2">
         <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport2">
		 <thead>
         <tr>
         <th style="border: 1px solid black; background-color: #e8e5fa;">Order Summary</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;">Amount</th>
         </tr>
         </thead>
		 <tbody>';
         global $wpdb;
			$today_date = date_i18n("Y-m-d");	
			$query2a = "SELECT
                        SUM(order_total.meta_value) AS 'total_sales', 'Yesterday' AS 'summary'
                        FROM {$wpdb->prefix}posts AS p			
                        LEFT JOIN  {$wpdb->prefix}postmeta AS order_total ON order_total.post_id=p.ID 
                        WHERE post_type ='shop_order' 
                        AND order_total.meta_key='_order_total' 
                        AND p.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed')
                        AND date_format( p.post_date, '%Y-%m-%d') = DATE_SUB('$today_date', INTERVAL 1 DAY)
						AND p.post_status NOT IN ('trash')
                        UNION
                        SELECT
                        SUM(order_total.meta_value) AS 'total_sales', 'Today' AS 'summary'
                        FROM {$wpdb->prefix}posts AS p			
                        LEFT JOIN  {$wpdb->prefix}postmeta AS order_total ON order_total.post_id=p.ID 
                        WHERE post_type ='shop_order' 
                        AND order_total.meta_key='_order_total' 
                        AND p.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed')
                        AND date_format( p.post_date, '%Y-%m-%d') = '{$today_date}' 
                        GROUP BY date_format( p.post_date, '%Y-%m-%d')
						AND p.post_status NOT IN ('trash')
                        UNION
                        SELECT
                        SUM(order_total.meta_value) AS 'total_sales', 'Week' AS 'summary'
                        FROM {$wpdb->prefix}posts AS p			
                        LEFT JOIN  {$wpdb->prefix}postmeta AS order_total ON order_total.post_id=p.ID 
                        WHERE post_type ='shop_order' 
                        AND order_total.meta_key='_order_total' 
                        AND p.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed')
                        AND YEAR(date_format( p.post_date, '%Y-%m-%d')) = YEAR(CURRENT_DATE()) 
                        AND WEEK(date_format( p.post_date, '%Y-%m-%d')) = WEEK(CURRENT_DATE())
						AND p.post_status NOT IN ('trash')
                        UNION
                        SELECT
                        SUM(order_total.meta_value) AS 'total_sales', 'Month' AS 'summary'
                        FROM {$wpdb->prefix}posts AS p			
                        LEFT JOIN  {$wpdb->prefix}postmeta AS order_total ON order_total.post_id=p.ID 
                        WHERE post_type ='shop_order' 
                        AND order_total.meta_key='_order_total' 
                        AND p.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed')							
                        AND YEAR(date_format( p.post_date, '%Y-%m-%d')) = YEAR(CURRENT_DATE())
                        AND MONTH(date_format( p.post_date, '%Y-%m-%d')) = MONTH(CURRENT_DATE())
						AND p.post_status NOT IN ('trash')
                        UNION
                        SELECT
                        SUM(order_total.meta_value) AS 'total_sales', 'Year' AS 'summary'
                        FROM {$wpdb->prefix}posts AS p			
                        LEFT JOIN  {$wpdb->prefix}postmeta AS order_total ON order_total.post_id=p.ID 
                        WHERE post_type ='shop_order' 
                        AND order_total.meta_key='_order_total' 
                        AND p.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed')							
                        AND YEAR(date_format( p.post_date, '%Y-%m-%d')) = YEAR(date_format(NOW(), '%Y-%m-%d'))
                        AND p.post_status NOT IN ('trash')";
		   
		 $loop2a = $wpdb->get_results($query2a);
		 if(count($loop2a)){	
		 foreach($loop2a as $order2a){
		 echo '<tr>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order2a->summary).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field(wc_price($order2a->total_sales)).'</td>
		 </tr>';
		 }
		 } 
	     echo '</tbody>
	     </table></div>
	     <br>';
	     include 'pdf/pdf2.php';
         include 'csv/csv2.php';
	     echo wp_nonce_field('hp_easy_export_report_e4', 'hp_display_export_report_nonce3');
         include 'print/print2.php';
         echo '</form></div>';
		   
		 echo '<div class="tab_content">';
         echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e5', 'hp_display_export_report_nonce6');
		 echo'
        <div id="dvData3">
		 <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport3">
		 <thead>
         <tr>
         <th style="border: 1px solid black; background-color: #e8e5fa;">Yearly Summary</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;">Amount</th>
         </tr>
         </thead>
		 <tbody>';
		 global $wpdb;
			$query2c = "SELECT 
                        SUM(postmeta.meta_value) as 'order_total', YEAR(date_format( posts.post_date, '%Y-%m-%d')) as Year
                        FROM {$wpdb->prefix}posts as posts		
                        LEFT JOIN  {$wpdb->prefix}postmeta as postmeta ON postmeta.post_id=posts.ID 
                        WHERE postmeta.meta_key ='_order_total' 
                        AND posts.post_status NOT IN ('trash')
                        AND posts.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed' ,'wc-cancelled' ,  'wc-refunded' ,'wc-failed')
                        GROUP BY YEAR(date_format( posts.post_date, '%Y-%m-%d'))";
		  
		 $rows = $wpdb->get_results( $query2c);	
         foreach($rows as $key=>$value){
		 echo '<tr>
		 <td style="border: 1px solid black;">'.sanitize_text_field($value->Year).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field(wc_price( $value->order_total)).'</td>
		 </tr>';
		 } 
	     echo '</tbody>
	     </table>
	     </div>
	     <br>';
	     include 'pdf/pdf3.php';
         include 'csv/csv3.php';
	     echo wp_nonce_field('hp_easy_export_report_e6', 'hp_display_export_report_nonce5');
         include 'print/print3.php';
         echo '</form></div>';
		  
		 echo '<div class="tab_content">';
         echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e7', 'hp_display_export_report_nonce8');
		 echo'
         <div id="dvData4">
	     <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport4">
		 <thead>
         <tr>
         <th style="border: 1px solid black; background-color: #e8e5fa;">Total Sales Amount</th>
         </tr>
         </thead>
		 <tbody>';
		 global $wpdb;
			$query2b = "SELECT
                        SUM(order_total.meta_value) AS 'total_sales'
                        FROM {$wpdb->prefix}posts AS p		
                        LEFT JOIN  {$wpdb->prefix}postmeta AS order_total ON order_total.post_id=p.ID 
                        WHERE p.post_type ='shop_order' 
                        AND order_total.meta_key='_order_total'
                        AND p.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed')";
		   
		 $rows = $wpdb->get_results($query2b);	
         
         foreach($rows as $key=>$value){
		 echo '<tr>
		 <td style="border: 1px solid black;"><b>'.sanitize_text_field(wc_price( $value->total_sales)).'</b></td>
		 </tr>';
		 } 
	     echo '</tbody>
	     </table></div>
	     <br>';
	     include 'pdf/pdf4.php';
         include 'csv/csv4.php';
	     echo wp_nonce_field('hp_easy_export_report_e8', 'hp_display_export_report_nonce7');
         include 'print/print4.php';
         echo '</form></div></div></div>';
        }
        
       // The hp_easy_customer_list function will export the Customer List in PDF, CSV and Print
        function hp_easy_customer_list(){
		   
         echo '<div class="tab_wrapper first_tab">
               <ul class="tab_list">
               <li class="active">Billing List</li>
               <li>Shipping List</li> 
			   <li>Mailing List</li> 
              </ul>';
		 echo '<div class="content_wrapper">';
         echo '<div class="tab_content active">';
		 echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e9', 'hp_display_export_report_nonce10');
		 echo '
         <div id="dvData5">
	     <table style="border-collapse: collapse; width: 100%; border: 0px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport5">
         <thead>
         <tr>
         <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">First Name</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">Last Name</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">Email</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">Phone Number</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">Address</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">City</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">State</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">Zip</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">Country</th>
         </tr>
         </thead>
         <tbody>';
	     global $woocommerce;
	     $query3 = array('post_type' => 'shop_order', 'post_status' => array('wc-completed', 'wc-processing', 'wc-on-hold', 'wc-pending'), 'posts_per_page' => -1);
	     $loop3 = new WP_Query($query3);
	     if($loop3->have_posts()){
	     while ($loop3->have_posts() ){
	     $loop3->the_post();
	     $order_id3 = $loop3->post->ID;
	     $order3 = new WC_Order($order_id3);
	     echo '<tr>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_first_name()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_last_name()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_email()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_phone()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_address_1()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_city()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_state()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_postcode()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_country()).'</td>
	     </tr>';
	     }
	     }   
	     echo '</tbody>
	     </table>
	     </div>
	     <br>';
	     include 'pdf/pdf5.php';
         include 'csv/csv5.php';
	     echo wp_nonce_field('hp_easy_export_report_e10', 'hp_display_export_report_nonce9');
         include 'print/print5.php';
         echo '</form></div>';
	     
		 echo '<div class="tab_content">';
         echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e11', 'hp_display_export_report_nonce12');
		 echo'
         <div id="dvData6">
	     <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport6">
         <thead>
         <tr>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">First Name</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Last Name</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Address</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">City</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">State</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Zip</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Country</th>
         </tr>
         </thead>
         <tbody>';
		 global $woocommerce;
		 $query4 = array('post_type' => 'shop_order', 'post_status' => array('wc-completed', 'wc-processing', 'wc-on-hold', 'wc-pending'), 'posts_per_page' => -1);
		 $loop4 = new WP_Query($query4);
		 if($loop4->have_posts()){
		 while ($loop4->have_posts() ){
		 $loop4->the_post();
		 $order_id4 = $loop4->post->ID;
		 $order4 = new WC_Order($order_id4);
		 echo '<tr>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_first_name()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_last_name()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_address_1()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_city()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_state()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_postcode()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_country()).'</td>
         </tr>';
	     }
         }  
	     echo '</tbody>
	     </table>
	     </div>
	     <br>';
	     include 'pdf/pdf6.php';
         include 'csv/csv6.php';
	     echo wp_nonce_field('hp_easy_export_report_e12', 'hp_display_export_report_nonce11');
         include 'print/print6.php';
         echo '</form></div>';
	
	     echo '<div class="tab_content">';
         echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e13', 'hp_display_export_report_nonce14');
		 echo'
         <div id="dvData7">
	     <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport7">
		 <thead>
		 <tr>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">First Name</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Last Name</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Email</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Country</th>
		 </tr>
		 </thead>
		 <tbody>';
		 global $woocommerce;
		 $query5 = array('post_type' => 'shop_order', 'post_status' => array('wc-completed', 'wc-processing', 'wc-on-hold', 'wc-pending'), 'posts_per_page' => -1);
		 $loop5 = new WP_Query($query5);
		 if($loop5->have_posts()){
		 while ($loop5->have_posts() ){
		 $loop5->the_post();
		 $order_id5 = $loop5->post->ID;
		 $order5 = new WC_Order($order_id5);
		 echo '<tr>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order5->get_billing_first_name()).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order5->get_billing_last_name()).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order5->get_billing_email()).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order5->get_billing_country()).'</td>
		 </tr>';
		 }
		 }
		 echo '</tbody>
		 </table>
	     </div>
	     <br>';
	     include 'pdf/pdf7.php';
         include 'csv/csv7.php';
	     echo wp_nonce_field('hp_easy_export_report_e14', 'hp_display_export_report_nonce13');
         include 'print/print7.php';
         echo '</form></div></div></div>';
         }   

        // The hp_easy_product_list function will export the Product List in PDF, CSV and Print
        function hp_easy_product_list(){
         
		 echo '<div class="tab_wrapper first_tab">
               <ul class="tab_list">
                <li class="active">Product List</li>
				<li>Category List</li>
               </ul>';
		 echo '<div class="content_wrapper">';
         echo '<div class="tab_content active">';
         echo '<form method="POST" action="">';
	     echo wp_nonce_field('hp_easy_export_report_e15', 'hp_display_export_report_nonce16');
	     echo'
         <div id="dvData8">
      	 <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport8">
         <thead>
         <tr>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">ID</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">SKU</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Category</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Product Name</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Regular Price</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Stock Status</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Total Stock</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">Manage Stock</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">Sold Individually</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" scope="col">Allow backorders?</th>
         </tr>
         </thead>
         <tbody>';
		 global $woocommerce;
		 $query6 = array('post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => -1);
		 $loop6 = new WP_Query($query6);
		 if($loop6->have_posts()){
		 while ($loop6->have_posts() ){
		 $loop6->the_post();
		 $order_id6 = $loop6->post->ID;
		 $order6 = new WC_Product($order_id6); 
		 echo '<tr>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order6->get_id()).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order6->get_sku()).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order6->get_categories()).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order6->get_name()).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field(wc_price($order6->get_regular_price())).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order6->stock_status).'</td>
		 <td style="border: 1px solid black;" class="st">'.sanitize_text_field($order6->stock).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order6->get_stock_quantity()).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order6->sold_individually).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order6->backorders).'</td>
		 </tr>';
		 }
		 } 
		 echo '</tbody>
		 </table>
		 </div>
		 <br>';
		 include 'pdf/pdf8.php';
         include 'csv/csv8.php';
		 echo wp_nonce_field('hp_easy_export_report_e16', 'hp_display_export_report_nonce15');
	     include 'print/print8.php';
         echo '</form></div>';
	
		 echo '<div class="tab_content">';
         echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e17', 'hp_display_export_report_nonce18');
	     echo'
         <div id="dvData9">
     	 <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport9">
         <thead>
         <tr>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Category ID</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Category Name</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Quantity</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Total Amount per Category</th>
         </tr>
         </thead>
         <tbody>';
		 global $wpdb;
		 $query7 = "SELECT 
		            SUM(woo_op_qty.meta_value) AS quantity,
				    SUM(woo_op_line_total.meta_value) AS total_amount, terms_p_id.term_id AS cat_id,
				    terms_p_id.name AS category_name, tax_p_id.parent AS parent_cat_id
				    FROM {$wpdb->prefix}woocommerce_order_items AS woo_order_items
				    LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS woo_order_p_id 
					ON woo_order_p_id.order_item_id = woo_order_items.order_item_id
				    LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS woo_op_qty 
					ON woo_op_qty.order_item_id = woo_order_items.order_item_id
				    LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS woo_op_line_total 
					ON woo_op_line_total.order_item_id = woo_order_items.order_item_id
				    LEFT JOIN {$wpdb->prefix}term_relationships AS rel_p_id 
					ON rel_p_id.object_id = woo_order_p_id.meta_value 
				    LEFT JOIN {$wpdb->prefix}term_taxonomy AS tax_p_id 
					ON tax_p_id.term_taxonomy_id = rel_p_id.term_taxonomy_id
				    LEFT JOIN {$wpdb->prefix}terms AS terms_p_id 
					ON terms_p_id.term_id = tax_p_id.term_id
				    LEFT JOIN {$wpdb->prefix}posts AS p 
					ON p.id=woo_order_items.order_id
				    WHERE p.post_type = 'shop_order'
				    AND woo_order_items.order_item_type = 'line_item'
				    AND woo_order_p_id.meta_key = '_product_id'
				    AND woo_op_qty.meta_key = '_qty'
				    AND woo_op_line_total.meta_key = '_line_total'
				    AND tax_p_id.taxonomy = 'product_cat'
				    GROUP BY cat_id
				    ORDER BY total_amount DESC";
					
		 $loop7 = $wpdb->get_results($query7);
		 if(count($loop7)){	
		 foreach($loop7 as $order7){
		 echo '<tr>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order7->cat_id).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order7->category_name).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order7->quantity).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field(wc_price($order7->total_amount)).'</td>
		 </tr>';
		 }
		 }  
		 echo '</tbody>
		 </table>
		 </div>
		 <br>';
	     include 'pdf/pdf9.php';
         include 'csv/csv9.php';
	     echo wp_nonce_field('hp_easy_export_report_e18', 'hp_display_export_report_nonce17');
         include 'print/print9.php';
         echo '</form></div></div></div>';
		 }
        } 
	  
		// Check if HP_Easy_Export exists then
		// the plugin will activate or deactivate
		if(class_exists('HP_Easy_Export')){
		 register_activation_hook( __FILE__, array('HP_Easy_Export', 'activate_hp_easy_export_report'));
		 register_deactivation_hook( __FILE__, array('HP_Easy_Export', 'deactivate_hp_easy_export_report'));
		 register_uninstall_hook(__FILE__, array('HP_Easy_Export', 'uninstall_hp_easy_export_report'));
		 $HP_Easy_Export = new HP_Easy_Export();
		}
  ?>
