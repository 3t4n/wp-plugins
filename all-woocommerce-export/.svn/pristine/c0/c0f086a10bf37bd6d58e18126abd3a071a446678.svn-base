<?php
/*
Plugin Name: All Woocommerce Export
Plugin URI: https://wordpress.org/plugins/all-woocommerce-export
Description: Export your Woocommerce Orders , Woocommerce Products & Woocommerce Customers in this plugin.
Version: 1.1
Author: Technobrains
Author URI: http://www.technobrains.in/
License: GPLv2
Text Domain : awe
*/

/* Plugin Licence

Copyright 2014 Technobrains (email : info@technobrains.in)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

// Make sure we don't expose any info if called directly
if ( basename( $_SERVER['PHP_SELF'] ) == basename( __FILE__ ) ) {
	die( 'Sorry, but you cannot access this page directly.' );
}

function awe_registersubmenu() {
    add_submenu_page( 'woocommerce', 'All Export', 'All Export', 'manage_options', 'all-export', 'awe_allwoocommerceexport' );
}
add_action('admin_menu', 'awe_registersubmenu',2000);

function awe_allwoocommerceexport() {
	include('order.php'); //Add Order Meta Array
	//include('product.php'); // Add Product Meta Array
	//include('customer.php'); // Add Customer Meta Array
	$i = 1; // Auto-increment order id in checkbox
	$j = 1; // Auto-increment product id in checkbox
	$p = 1; // Auto-increment customer id in checkbox
	?>
	<!-- Main Wrapper Start -->
	<div class="wrap">
		<h1 class="main-title"><?php esc_html__( 'All Woocommerce Export', 'awe' ); ?></h1>
		<p class="description" ><?php esc_html__( 'Download Complted Order details & More', 'awe' ); ?></p><hr />
		<?php $abc = array( 'ajaxurl' => admin_url( 'admin-ajax.php'));
		 ?>
		<div class="radio_wrapper">
			<input class="stv-radio-tab" type="radio" id="tab1" value="Order" name="datatype" checked /><label for="tab1"><?php esc_html__( 'Orders', 'awe' ); ?></label>
			<!--<input class="stv-radio-tab" type="radio" id="tab2" value="Product" name="datatype"> <label for="tab2">Products</label> 
			<input class="stv-radio-tab" type="radio" id="tab3" value="Customer" name="datatype"><label for="tab3">Customers</label>-->
		</div>
		<div class="links">
			<a href="javascript:void(0);" id="export-select-all"><?php esc_html__( 'Select all', 'awe' ); ?></a>  |<a href="javascript:void(0);" id="export-select-none">Select none</a>
		</div>
		<!-- Order Form Start -->
		<div id="order_form">
			<form id="idForm" method="post">
				<div class="all-fields">
					<?php foreach($fields as $key => $val ){ ?>
						<input type="checkbox" name="ordermeta" id="<?php echo $i++; ?>" rel="<?php echo $val['placeholder']; ?>" value="<?php echo $val['value']; ?>"><?php echo $val['placeholder']; ?></input><br/>
					<?php } ?><hr>
					<input type="submit" name="submit" value="Download Orders" class="button-primary" />
				</div>
			</form>
		</div>
		<p id="demo"></p>
		<div id="feedback"></div>
		<!-- Order Form End -->
	</div>
	<!-- Main Wrapper End -->
<?php }

	
// Add javascript in backend 
add_action( 'admin_print_scripts', 'awe_script' );
function awe_script() { 
	wp_enqueue_script('inkthemes', plugins_url( 'js/ajax-script.js' , __FILE__ ) , array( 'jquery' ));
	wp_localize_script( 'inkthemes', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));
}



add_action('wp_ajax_awe_orderdetails', 'awe_orderdetails');
add_action('wp_ajax_nopriv_awe_orderdetails', 'awe_orderdetails');

function awe_orderdetails(){
	$awe_postresult =  stripslashes($_POST['search_val']);
	$awe_dataresult = json_decode($awe_postresult);
	$awe_result = count($awe_dataresult);
	
	/** Set default timezone (will throw a notice otherwise) */
//date_default_timezone_set('Asia/Kolkata');

// include PHPExcel
require('PHPExcel.php');

// create new PHPExcel object
$objPHPExcel = new PHPExcel();

// set default font
$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');

// set default font size
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

// create the writer
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");

/**
 * Define currency and number format.
 */

// currency format, € with < 0 being in red color
$currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';

// number format, with thousands separator and two decimal points.
$numberFormat = '#,#0.##;[Red]-#,#0.##';

// writer already created the first sheet for us, let's get it
$objSheet = $objPHPExcel->getActiveSheet();

// rename the sheet
$objSheet->setTitle('My sales report');

// let's bold and size the header font and write the header
// as you can see, we can specify a range of cells, like here: cells from A1 to A4

$objSheet->getStyle('A1')->getFont()->setBold(true)->setSize(12);
$i=0; // For get how many results get in array
$j=0; // For Header Display
for ($char = 'B'; $char <= 'Z'; $char++) {
    $i++;
    if($awe_result >= $i){
		$objSheet->getStyle($char.'1')->getFont()->setBold(true)->setSize(12);
	}
}

// write header
$objSheet->getCell('A1')->setValue('No');
$k=0; // For Get how many results get in array
for ($char1 = 'B'; $char1 <= 'Z'; $char1++) {
    $k++;
    if($awe_result >= $k){
		$textvl1 = $awe_dataresult[$j]->rel;
		$objSheet->getCell($char1.'1')->setValue($textvl1);
	}
	$j++;
}
	
	
	// we could get this data from database, but here we are writing for simplicity
	$filters = array(
		'post_status' => 'public',
		'post_type' => 'shop_order',
		'posts_per_page' => 200,
		'paged' => 1
	);
	$loop = new WP_Query($filters);
	$q = 1; // For Numbering Details
	$p = 2; // For Row counting
	while ($loop->have_posts()) {
		$loop->the_post();
		$order = new WC_Order($loop->post->ID);
		$all_order = $order->get_items();						
		foreach ($order->get_items() as $key => $lineItem) {
			$ordera = wc_get_order( $lineItem['order_id'] );
			$order_data = $ordera->get_data();
			$id = $q++;
			$p++;
			$objSheet->getCell('A'.$p)->setValue($id);
			$s=0;
			$d=0;
			for ($char2 = 'B'; $char2 <= 'Z'; $char2++) {
				$s++;				
				if($awe_result >= $s){
					$textvl = $awe_dataresult[$d]->value;
					if($textvl == 'order_id'){
						$data =  $lineItem['order_id'];
					} elseif($textvl == 'order_status'){
						$data =  $order_data['status'];
					} else {
						$data = get_post_meta( $lineItem['order_id'], $textvl, true );
					}
					$objSheet->getCell($char2.$p)->setValue($data);
				}
				$d++;
			}
		}
	}
// autosize the columns				
$e=0; //For get how many results get in array
for ($char3 = 'A'; $char3 <= 'Z'; $char3++) {
    $e++;
    if($awe_result >= $e){
		$objSheet->getColumnDimension($char3)->setAutoSize(true);
	}
}

$fileName = dirname(__FILE__).'/order.xlsx';
header('Content-Type: application/vnd.ms-excel');
header('Content-disposition: attachment; filename=order.xlsx');
header('Cache-Control: max-age=0');
// Clear any previous output
$cre = $objWriter->save($fileName);
//$objWriter->save('php://output');
	
}


	
//Add Style Sheet in Backend
add_action( 'admin_print_styles', 'awe_styles_admin' );
function awe_styles_admin() {
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_style( 'stylesheet', plugins_url('css/allwoocommerceexport.css' , __FILE__ ), array(), '', false );
}

//Uninstall Plugin
register_deactivation_hook('__FILE__', 'awe_uninstall');
function awe_uninstall() {
	delete_option('all_woocommerceexport');
}
?>