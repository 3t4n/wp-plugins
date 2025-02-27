<?php
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
//Load Dompdf Class
if (!class_exists('Dompdf')) {
    include_once(plugin_dir_path(__FILE__) . 'pdf/dompdf/autoload.inc.php');
}

// Load logo in the invoice
function invoice_for_woocommerce_invoie_logo_mpdf() {
	if (get_option('logo_invoice1')){
		return '<div class="ifw-logo"><img style="height: 80px; text-align: center;" alt="invoice logo" src="'.esc_url_raw(get_option( 'logo_invoice1' )).'"/></div>';
	}
}

//Invoice title field
function invoice_for_woocommerce_invoie() {
	if (get_option('field_1')){
		return '<h1 style="text-align: center;">'.esc_html(get_option( 'field_1' ) ).'</h1>';
	}
}

//Invoice original field
function invoice_for_woocommerce_original() {
	if ( get_option( 'field_2' ) ){
		return '<h5 style="text-align: center;">'.esc_html( get_option( 'field_2') ).'</h5>';
	}
}

//Invoice number field if is provided
function invoice_for_woocommerce_name() {
	if ( get_option( 'field_4' ) and get_post_meta( get_the_ID(), 'invoice_number', true ) ) {
		return '<td><b>'.esc_html( get_option( 'field_4' ) ).'</b> '.esc_html( get_post_meta( get_the_ID(), 'invoice_number', true ) ).'</td>';
	}
}

//Order date created
function invoice_for_woocommerce_date_created() {
	if ( get_option( 'field_6' ) and get_post_meta( get_the_ID(), 'get_date_created', true ) )  {
		return '<td><b>'.esc_html( get_option( 'field_6' ) ).'</b> '.esc_html( get_post_meta( get_the_ID(), 'get_date_created', true ) ) .'</td>';
	}
}

//Order date created
function invoice_for_woocommerce_date_complate() {
	if ( get_option( 'field_7' ) and get_post_meta( get_the_ID(), 'get_date_complate', true ) ) {
		return '<td><b>'.esc_html( get_option( 'field_7' ) ).'</b> '.esc_html( get_post_meta( get_the_ID(), 'get_date_complate', true ) ).'</td>';
	}
}
function invoice_for_woocommerce_ifv_customer() {
	if ( get_option( 'field_8' ) and get_post_meta( get_the_ID(), 'ifv_customer', true ) ) {
		return '<td><b>'.esc_html( get_option( 'field_8' ) ).'</b> '.esc_html( get_post_meta( get_the_ID(), 'ifv_customer', true ) ).'</td>';
	}
	else {
		return '<td><b>'.esc_html( get_option( 'field_8' ) ).'</b></td>';
	}
}
function invoice_for_woocommerce_ifv_vat_number() {
	if ( get_option( 'field_9' ) and get_post_meta( get_the_ID(), 'vat_number', true ) ) {
		return '<td><b>'.esc_html( get_option( 'field_9' ) ).'</b> '.esc_html( get_post_meta( get_the_ID(), 'vat_number', true ) ).'</td>';
	}
	else {
		return '<td><b>'.esc_html( get_option( 'field_9' ) ).'</b></td>';		
	}
}
function invoice_for_woocommerce_ifv_vat_id() {
	if ( get_option( 'field_10' ) and get_post_meta( get_the_ID(), 'vat_number', true ) ) {
		return '<td><b>'.esc_html( get_option( 'field_10' ) ).'</b> '.esc_html( substr( get_post_meta( get_the_ID(), 'vat_number', true ), 2 ) ).'</td>';
	} else {
		return '<td><b>'.esc_html( get_option( 'field_10' ) ).'</b></td>';		
	}
}
function invoice_for_woocommerce_ifv_city () {
	if ( get_option( 'field_11' ) and get_post_meta( get_the_ID(), 'ifv_city', true ) ) {
		return '<td><b>'.esc_html( get_option( 'field_11' ) ).'</b> '.esc_html( get_post_meta( get_the_ID(), 'ifv_city', true ) ).'</td>';
	}
	else {
		return '<td><b>'.esc_html( get_option( 'field_11' ) ).'</b></td>';
	}
}
function invoice_for_woocommerce_ifv_address () {
	if (get_option( 'field_12' ) and get_post_meta( get_the_ID(), 'ifv_address', true ) ) {
		return '<td><b>'.esc_html( get_option( 'field_12') ).'</b> '.esc_html( get_post_meta( get_the_ID(), 'ifv_address', true ) ).'</td>';
	}
	else {
		return '<td><b>'.esc_html( get_option( 'field_12') ).'</b></td>';
	}
}
function invoice_for_woocommerce_ifv_customer_name () {
	if (get_option('field_13') and get_post_meta( get_the_ID(), 'ifv_customer_name', true ) ) {
		return '<td><b>'.esc_html( get_option( 'field_13' ) ).'</b> '.esc_html( get_post_meta( get_the_ID(), 'ifv_customer_name', true )  ).'</td>';
	} else {
		return '<td><b>'.esc_html( get_option( 'field_13' ) ).'</b></td>';
		
	}
}
function invoice_for_woocommerce_ifv_supplier_name () {
	if (get_option('field_14')){
		return '<td><b>'.esc_html(get_option('field_14')).' </b>  '.esc_html(get_option('field_49')).'</td>';
	}
	else {
		return '<td><b>'.esc_html(get_option('field_14')).' </b></td>';		
	}
}
function invoice_for_woocommerce_ifv_supplier_vat () {
	if (get_option('field_15')){
		return '<td><b>'.esc_html(get_option('field_15')).' </b>  '.esc_html(get_option('field_16')).'</td>';
	} else {
		return '<td><b>'.esc_html(get_option('field_15')).' </b></td>';		
	}
}
function invoice_for_woocommerce_ifv_supplier_id () {
	if ( get_option( 'field_17' ) ) {
		return '<td><b>'.esc_html( get_option( 'field_17' ) ).' </b> '.esc_html(get_option( 'field_18' ) ).'</td>';
	} else {
		return '<td><b>'.esc_html( get_option( 'field_17' ) ).'</td>';		
	}
}
function invoice_for_woocommerce_ifv_supplier_city () {
	if (get_option('field_19')){
		return '<td><b>'.esc_html(get_option('field_19')).' </b> '.esc_html(get_option('field_20')).'</td>';
	} else {
		return '<td><b>'.esc_html(get_option('field_19')).' </b></td>';		
	}
}
function invoice_for_woocommerce_ifv_supplier_address () {
	if (get_option('field_21')){
		return '<td><b>'.esc_html(get_option('field_21')).' </b> '.esc_html(get_option('field_22')).'</td>';
	} else {
		return '<td><b>'.esc_html(get_option('field_21')).' </b></td>';
	}
}
function invoice_for_woocommerce_ifv_supplier_accountable () {
	if (get_option('field_23')){
		return '<td><b>'.esc_html(get_option('field_23')).' </b> '.esc_html(get_option('field_24')).'</td>';
	} else {
		return '<td><b>'.esc_html(get_option('field_23')).' </b></td>';
	}
}
function invoice_for_woocommerce_order_id () {
	if ( get_option( 'field_26' ) and get_post_meta( get_the_ID(), 'ifv_order_id', true ) ) {
		return '<td><b>'.esc_html(get_option('field_26')).'</b> #'.esc_html( get_post_meta( get_the_ID(), 'ifv_order_id', true ) ).'</td>';
	} else {
		return '<td><b>'.esc_html(get_option('field_26')).'</b> #</td>';
		
	}
}
function invoice_for_woocommerce_customer_product () {
	if (get_option('field_28') and get_post_meta( get_the_ID(), 'ifv_customer_product', true ) ) {
		return '<td><b>'.esc_html(get_option('field_28')).'</b> '.esc_html(get_post_meta( get_the_ID(), 'ifv_customer_product', true ) ).'</td>';
	} else {
		return '<td><b>'.esc_html(get_option('field_28')).'</b></td>';		
	}
}
function invoice_for_woocommerce_base_price () {
	if (get_option('field_31') and get_post_meta( get_the_ID(), 'ifv_get_base_price', true ) ) {
		return '<td><b>'.esc_html(get_option('field_31')).'</b> '.esc_html(get_post_meta( get_the_ID(), 'ifv_get_base_price', true ) ).'</td>';
	} else {
		return '<td><b>'.esc_html(get_option('field_31')).'</b></td>';
	}
}
function invoice_for_woocommerce_base_price_1 () {
	if (get_option('field_32') and get_post_meta( get_the_ID(), 'ifv_get_base_price', true )  ){
		return '<td><b>'.esc_html(get_option('field_32')).'</b> '.esc_html(get_post_meta( get_the_ID(), 'ifv_get_base_price', true ) ).'</td>';
	} else {
		return '<td><b>'.esc_html(get_option('field_32')).'</b></td>';		
	}
}
function invoice_for_woocommerce_currency () {
	if (get_option('field_33')){
		return '<td><b>'.esc_html(get_option('field_33')).'</b> '.esc_html(get_option('field_52')).'</td>';
	} else {
		return '<td><b>'.esc_html(get_option('field_33')).'</b></td>';		
	}
}
function invoice_for_woocommerce_get_price_1 () {
	if (get_option('field_34') and get_post_meta( get_the_ID(), 'ifv_get_price', true ) ) {
		return '<tr><td><b>'.esc_html(get_option('field_34')).'</b></td><td>'.esc_html(get_post_meta( get_the_ID(), 'ifv_get_price', true ) )." ".esc_html(get_option('field_52')).'</td></tr>';
	} else {
		return '<tr><td><b>'.esc_html(get_option('field_34')).'</b></td><td></td></tr>';		
	}
}
function invoice_for_woocommerce_get_fee () {
	if (get_option( 'activate_all_VAT_fields' )  ) {
		if (get_option('field_35')  ) {
			return '<tr><td><b>'.esc_html(get_option('field_35'))." ".esc_html(get_post_meta( get_the_ID(), 'ifv_get_procent', true )).'</b></td><td> '.esc_html(get_post_meta( get_the_ID(), 'ifv_get_fee', true ))." ".esc_html(get_option('field_52')).'</td></tr>';
		} else {
			return '<tr><td><b>'.esc_html(get_option('field_35'))." ".esc_html(get_post_meta( get_the_ID(), 'ifv_get_procent', true )).'</b></td><td> </td></tr>';
			
		}
	}
}
function invoice_for_woocommerce_get_total () {
	if ( get_option( 'field_36' ) and get_post_meta( get_the_ID(), 'ifv_get_total', true ) ) {    
		return '<tr><td><b>'.esc_html(get_option('field_36')).'</b></td><td>'.number_format( ( float )esc_html( get_post_meta( get_the_ID(), 'ifv_get_total', true ) ), 2, '.', '' )." ".esc_html(get_option('field_52')).'</td></tr>';
	} else {
		return '<tr><td><b>'.esc_html(get_option('field_36')).'</b></td><td></td></tr>';		
	}
}
function invoice_for_woocommerce_get_payment_method () {
	if (get_option('field_38') and get_option('custom_payment_method')){
		return '<td><b>'.esc_html(get_option('field_38')).'</b>'." ".esc_html(get_option('custom_payment_method')).' </td>';
	}
	if (get_option('field_38') and !get_option('custom_payment_method') and get_post_meta( get_the_ID(), 'ifv_get_payment_method', true ) ) {
		return '<td><b>'.esc_html(get_option('field_38')).'</b>'." ".esc_html( get_post_meta( get_the_ID(), 'ifv_get_payment_method', true ) ).' </td>';
	}
}
function invoice_for_woocommerce_date_created_foot () {
	if ( get_option( 'field_40' ) and get_post_meta( get_the_ID(), 'get_date_created', true ) ) {
		return '<td><b>'.esc_html( get_option( 'field_40' ) ).'</b></td><td>'.esc_html( get_post_meta( get_the_ID(), 'get_date_created', true ) ).'</td>';
	}
	else {
		return '<td><b>'.esc_html( get_option( 'field_40' ) ).'</b></td><td></td>';		
	}
}
function invoice_for_woocommerce_zero () {
	if ( get_option( 'field_41' ) ){
		return '<td><b>'.esc_html(get_option('field_41')).'</b></td>';
	}
}
function invoice_for_woocommerce_zero_rate() {
	if ( get_option( 'field_42' ) and get_post_meta( get_the_ID(), 'ifv_get_fee', true ) and get_post_meta( get_the_ID(), 'ifv_get_procent', true ) == "0%" ) {
		return '<td>'.esc_html(get_option('field_42')).'</td>';
	}
}
function invoice_for_woocommerce_zero_all() { 
	if( get_option( 'activate_grounds_for_zero' ) ) {
		return "<tr>".invoice_for_woocommerce_zero ().invoice_for_woocommerce_zero_rate()."</tr>";
	}
}


function invoice_for_woocommerce_description_operation () {
	if (get_option('field_43')){
		return '<td><b>'.esc_html(get_option('field_43')).'</b></td><td>'.esc_html(get_option('field_44')).'</td>';
	}
}
function invoice_for_woocommerce_place () {
	if (get_option('field_45') and get_post_meta( get_the_ID(), 'ifv_place', true ) ){
		return '<td><b>'.esc_html(get_option('field_45')).'</b></td><td>'.esc_html( get_post_meta( get_the_ID(), 'ifv_place', true ) ).'</td>';
	}
}
function invoice_for_woocommerce_receiver () {
	if (get_option('field_46') and get_post_meta( get_the_ID(), 'ifv_customer', true ) ) {
		return '<td><b>'.esc_html(get_option('field_46')).'</b> '.esc_html( get_post_meta( get_the_ID(), 'ifv_customer', true ) ).'</td>';
	}
}
function invoice_for_woocommerce_compiler () {
	if (get_option('field_47') ){
		return '<td><b>'.esc_html( get_option( 'field_47' ) ).'</b> '.esc_html( get_option( 'field_49' ) ).'</td>';
	}
}

function invoice_for_woocommerce_footer_all_ountries() {
	if (get_option('field_48') and get_post_meta( get_the_ID(), 'ifv_get_footer_all_country', true ) ) {
		return '<td style="border: 0; text-align: center;">'.esc_html(get_post_meta( get_the_ID(), 'ifv_get_footer_all_country', true ) ).'</td>';
	}
}

function invoice_for_woocommerce_all_items_detiles() {
	global $post;
	$order = new WC_Order( $post->ID );
	$order_items = $order->get_items();
	$arr = array ();
	foreach ($order_items as $items_key => $items_value) {
		$all = '<tr>
			<td>'.esc_html( $items_value['name'] ).'</td>
			<td>'.esc_html( $items_value['qty'] ).'</td>
			<td>'. number_format((float)esc_html( $order->get_item_subtotal( $items_value) ), 2, '.', '' ).'</td>
		</tr>';
		array_push( $arr,$all );
	}
	$imp_orders = implode( "",$arr );
	return $imp_orders;
}

function invoice_for_woocommerce_hide_vat_fields() {
	if( !get_option( 'activate_all_VAT_fields' ) ) {
	    return '.vat-fields { display:none;}';
	}
}

function invoice_for_woocommerce_ifv_all_products() {
		return '
		<tr>
			<td><b>'. esc_html( get_option( 'field_28' ) )." ".'</b></td>
			<td><b>'. esc_html( get_option( 'field_30' ) )." ".'</b></td>
			<td><b>'. esc_html( get_option( 'field_31' ) )." ".'</b></td>
		</tr>';
}

//Generate Invoice from HTML
$htmlll = '
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style>
		 * { font-family: "DejaVu Sans" !important; }
			b { font-weight: bold; color: #222222;}
			'.invoice_for_woocommerce_hide_vat_fields() .'
			table{border: none; vertical-align: top; font-size: 12px;}
			table td {border: 1px solid #eee; padding: 5px; }
			.table td {width: 50%;}
			.ifw-logo { width: 50%; text-align: center; margin-left: 25%; margin-right: 25%; max-height: 100px;}
			.ifw-logo img { display: inline-table;  text-align: center; }
			.ifv-qr {width: 100%; text-align:center;}
			.ifv-qr img {width: 15%;}
		</style>
	</head>
	<body>
		'.invoice_for_woocommerce_invoie_logo_mpdf().
		invoice_for_woocommerce_invoie().
		invoice_for_woocommerce_original().'
	<table style="width: 100%;" >
		<tr>
		'.invoice_for_woocommerce_name().
		invoice_for_woocommerce_date_created().
		invoice_for_woocommerce_date_complate().'
		</tr>
	</table>
	<table class="table" style="width: 100%;">
	<tr>
		'.invoice_for_woocommerce_ifv_customer().'
		'.invoice_for_woocommerce_ifv_supplier_name ().'
	</tr>
	<tr class="vat-fields">
		'.invoice_for_woocommerce_ifv_vat_number().'
		'.invoice_for_woocommerce_ifv_supplier_vat().'
	</tr>
	<tr class="vat-fields">
		'.invoice_for_woocommerce_ifv_vat_id().'
		'.invoice_for_woocommerce_ifv_supplier_id().'
	</tr>
	<tr>
		'.invoice_for_woocommerce_ifv_city ().'
		'.invoice_for_woocommerce_ifv_supplier_city ().'
	</tr>
	<tr>
		'.invoice_for_woocommerce_ifv_address ().'
		'.invoice_for_woocommerce_ifv_supplier_address().'
	</tr>
	<tr>
		'.invoice_for_woocommerce_ifv_customer_name().'
		'.invoice_for_woocommerce_ifv_supplier_accountable ().'
	</tr>
	</table>
	<table style="width: 100%;">'.invoice_for_woocommerce_ifv_all_products().invoice_for_woocommerce_all_items_detiles().'</table>
	<table style="width: 100%;">
	<tr>
		'.invoice_for_woocommerce_order_id ().'
		'.invoice_for_woocommerce_base_price_1 ().'
		'.invoice_for_woocommerce_currency ().'
	</tr>
	</table>
	<table style="width: 100%;">
		'.invoice_for_woocommerce_get_price_1 ().'
		'.invoice_for_woocommerce_get_fee ().'
		'.invoice_for_woocommerce_get_total ().'
	</table>
	<table style="width: 100%;">
	<tr>
		'.invoice_for_woocommerce_get_payment_method ().'
	</tr>
	</table>
	<table style="width: 100%;">
	<tr>
		'.invoice_for_woocommerce_date_created_foot ().'
	</tr>
	    '.invoice_for_woocommerce_zero_all().'
	<tr>
		'.invoice_for_woocommerce_description_operation ().'
	</tr>
	<tr>
		'.invoice_for_woocommerce_place ().'
	</tr>
	</table>
	<table style="width: 100%;">
	<tr>
		'.invoice_for_woocommerce_receiver ().'
		'.invoice_for_woocommerce_compiler ().'
	</tr>
	</table>
	<table style="width: 100%; border: 0;">
	<tr>
		'.invoice_for_woocommerce_footer_all_ountries().'
	</tr>
	</table>
	</body>
</html>
';

//Title of the invoice. When isset invoice number the title is invoice number else the title is untitled.
function invoice_for_woocommerce_number() {
	if (get_post_meta( get_the_ID(), 'invoice_number', true )) {
		return esc_html(get_post_meta( get_the_ID(), 'invoice_number', true ));
	}
	else {
		return "untitled";
	}
}

//Use classes
use Dompdf\Autoloader;
use Dompdf\Dompdf;
use Dompdf\Options;
use Dompdf\Canvas;
use Dompdf\Cellmap;
use Dompdf\Renderer;
use Dompdf\CanvasFactory;
use Dompdf\Exception;
use Dompdf\Frame;
use Dompdf\Helpers;
use Dompdf\JavascriptEmbedder;
use Dompdf\LineBox;
use Dompdf\PhpEvaluator;
use Dompdf\FontMetrics;

$invoice_id = get_post_meta( get_the_ID(), 'ifv_order_id', true );
$ifv_activate_invoice = get_post_meta( get_the_ID(), 'ifv_activate_invoice', true );

// Create Invoice and Acivate the invoice to user account when is selected - Acivate invoice to user account.
if( $ifv_activate_invoice == "yes_order_list" or  $ifv_activate_invoice == "yes" ) {

	$filepath__1 = trailingslashit(wp_upload_dir()['basedir'])."invoices/".$invoice_id.'.pdf';
	$options = new Options();
	$options->set( 'isRemoteEnabled',true ); 
	$dompdf = new Dompdf( $options );
	$dompdf->load_html( $htmlll, 'UTF-8' );
	$dompdf->setPaper( 'A4', 'portrait' );
	$dompdf->render();
	$dompdf_output = $dompdf->output();
	file_put_contents( $filepath__1, $dompdf_output );

}

// Download Invoice.
if ( isset( $_GET['link'] ) == "go" ) {

	$options = new Options();
	
	$options->set( 'isRemoteEnabled',true );
	
	// instantiate and use the dompdf class
	$dompdf = new Dompdf($options);
	$dompdf->loadHtml( $htmlll, 'UTF-8' );

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper( 'A4', 'portrait' );

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	ob_end_clean();
	$dompdf->stream( get_post_meta( get_the_ID(), 'invoice_number', true ).".pdf" );
	
	exit;
}
	
//Delete the invoice when is selected Deactivate Invoice.
if ( $ifv_activate_invoice == "" ) {
	$url = trailingslashit( wp_upload_dir()['basedir'] ) . 'invoices/'.$invoice_id.'.pdf';
    wp_delete_file( $url );
	
}