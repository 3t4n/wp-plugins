<?php 
/*
Plugin Name: Raffle Ticket Generator - Woocommerce
Plugin URI: http://wpraffle.com
Description: Raffle Ticket Generator.  Generate numbered raffle tickets and email virtual tickets via WooCommerce order system
Version: 6.0.4
Author: The Web Design Ninja
Author URI: http://TheWebDesignNinja.com 

* WC requires at least: 2.2
 * WC tested up to: 9.4.3
 
Copyright 2012-2024 Teo Leonard and The Web Design Ninja.

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

 
*/
	 
	 
 function wooraffle_install(){
	  global $wpdb;  
	 global $jal_db_version;  
	 $table_name = $wpdb->prefix . "wooraffle_tickets_customer_to_tickets"; 
	 if($wpdb->get_var("show tables like '$table_name'") != $table_name) 
	{
		$sql = "CREATE TABLE " . $table_name . " (
		 `order_id` int(11) NOT NULL,
		  `products_id` int(11) NOT NULL,
		  `ticket_number` varchar(25) NOT NULL
		);";
		$wpdb->query($sql);
	}
	 }
register_activation_hook(__FILE__,'wooraffle_install');
add_action('before_woocommerce_init', function(){



    if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {

        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', 'raffle-ticket-generator-gold/raffle-ticket-generator-gold.php', true );



    }



});
function wooraffle_uninstall(){
	  global $wpdb;  
	 global $jal_db_version;  
	 $table_name = $wpdb->prefix . "wooraffle_tickets_customer_to_tickets"; 
		$sql = "DROP TABLE ". $table_name;
		$wpdb->query($sql);
	 }
//register_deactivation_hook( __FILE__, 'wooraffle_uninstall' );	 


function raffle_script() {
	if (isset($_GET['page']) && $_GET['page'] == 'woocommerce-raffle-tickets') {
	 wp_enqueue_script( 'custom-script', plugin_dir_url( __FILE__ ) . 'includes/js/jquery-ui.js' );
	}
	 wp_enqueue_script( 'custom-script-12', plugin_dir_url( __FILE__ ) . 'includes/js/script.js' );
	 wp_enqueue_script( 'custom-script-3', plugin_dir_url( __FILE__ ) . 'includes/js/jcarousellite_1.0.1c4.js' );
	 wp_register_style( 'raffle_raffle_style', plugin_dir_url( __FILE__ ) . 'includes/css/woostyle.css', false, '1.0.0' );
	 wp_register_style( 'raffle_raffle_style_pages', plugin_dir_url( __FILE__ ) . 'includes/css/style.css', false, '1.0.0' );
	 
	 
     wp_enqueue_style( 'raffle_raffle_style' );
	 wp_enqueue_style( 'raffle_raffle_style_pages' );
}




add_action( 'admin_enqueue_scripts', 'raffle_script');

add_action('admin_menu', 'wooraffle_menu');

function wooraffle_menu()
	{
add_menu_page(__('Add Raffle Ticket Generator Configuration','woocommerce-raffle'), __('Raffle Ticket Generator','woocommerce-raffle'), 'manage_options', 'woocommerce-raffle' ,'simple_woocommerce_raffle_categories');
		add_submenu_page('woocommerce-raffle', __('Customer\'s Ticket Numbers','woocommerce-raffle'), __('View Customer\'s Ticket Numbers','woocommerce-raffle'), 'manage_options', 'woocommerce-raffle-tickets', 'raffle_showresults');
		
		
	}
	
	function simple_winner_categories(){
		echo '<img src="'.plugin_dir_url( __FILE__ ).'/images/wordpress-raffle-logo.png" style="float:left; width:200px"><div style="clear:both"></div>';
		echo '<h1 style="font-size:20px">For Silver and Gold Members Only</h1>';
		echo '<p>The Bronze version is not a trial version - is it simply a lightweight version that generates 500 unique ticket numbers.  

For the full featured versions, with all the options available - please visit <a href="https://wpraffle.com">wpraffle.com</a></p>';
		echo '<div style="clear:both"></div>';
		}
		
		function simple_raffle_winners(){
			echo '<img src="'.plugin_dir_url( __FILE__ ).'/images/wordpress-raffle-logo.png" style="float:left"><div style="clear:both"></div>';
		echo '<h1 style="font-size:20px">For Silver and Gold Members Only</h1>';
		echo '<p>The Bronze version is not a trial version - is it simply a lightweight version that generates 500 unique ticket numbers.  

For the full featured versions, with all the options available - please visit <a href="https://wpraffle.com">wpraffle.com</a></p>';
		echo '<div style="clear:both"></div>';
		}
		
		function simple_raffle_tools(){
			echo '<img src="'.plugin_dir_url( __FILE__ ).'/images/wordpress-raffle-logo.png" style="float:left"><div style="clear:both"></div>';
		echo '<h1 style="font-size:20px">For Silver and Gold Members Only</h1>';
		echo '<p>The Bronze version is not a trial version - is it simply a lightweight version that generates 500 unique ticket numbers.  

For the full featured versions, with all the options available - please visit <a href="https://wpraffle.com">wpraffle.com</a></p>';
		echo '<div style="clear:both"></div>';
		}

function simple_woocommerce_raffle_categories(){
 echo '<img src="'.plugin_dir_url( __FILE__ ).'/images/wordpress-raffle-logo.png" style="float:left"><div style="clear:both"></div>';
		echo '<div class="rtg-settings"><div class="rtg-wrap space">
	<div class="rtg-block75 v-top rtg-inner20 rtg-white">
	<h2>How It Works</h2>
		<p>The Bronze version is our free version and is not designed to be a trial of our paid Silver, Gold and Platinum versions. It is very simple. It generates up to 500 non configurable ticket numbers and those tickets numbers are embedded in the woocommerce email order receipt.</p>
		
		<p>The Raffle Ticket Generator is an addon to woocommerce. You need to create a woocommerce product first. The Raffle Ticket Generator works with a SIMPLE woocommerce product. It does not work with Variable products. When the plugin is installed and activated, you simply designate the number of tickets for each product to generate in the Raffle Ticket section of the product details. <i>( example: 1 will generate 1 ticket when product is bought )</i></p>
		
		<p style="text-align:center;"><img src="'.plugin_dir_url( __FILE__ ).'/images/bronze-settings.png" style="max-width:600px;margin:0 auto;height:auto;"/></p>
		
		<p>You can see details of orders / tickets and export them in <b>View Customer Tickets Numbers</b></p>
		
		
		
		<h2>Do you need more options?<br /> Check our PREMIUM versions:</h2>
			<div class="rtg-wrap space">
			<div class="rtg-row">
	<div class="rtg-block33 v-top rtg-inner20 rtg-bor">
			<img src="'.plugin_dir_url( __FILE__ ).'/images/wordpress-raffle-logo-silver.png" width="200" height="auto"/>
			<ul class="rtg-list">
<li>Works with WordPress and WooCommerce</li>
<li>Raffle Ticket Numbers emailed to customer</li>
<li><strong>Unlimited unique Ticket Numbers assigned</strong></li>
<li><strong>Specify the Ticket Number format</strong></li>
<li><strong>Add manual ticket order from backend</strong></li>
<li><strong>Export to Csv</strong></li>
<li><strong>Resend Ticket Numbers to customers</strong></li>
<li><strong>Run Multiple Raffles at a time</strong></li>
<li><strong>Live Drawing Feature</strong></li>
</ul>
</div><div class="rtg-block33 v-top rtg-inner20 rtg-bor">
<img src="'.plugin_dir_url( __FILE__ ).'/images/wordpress-raffle-logo-gold.png" width="200" height="auto"/>
<ul class="rtg-list">
<li>Works with WordPress and WooCommerce</li>
<li>Raffle Ticket Numbers emailed to customer</li>
<li>Unlimited unique Ticket Numbers assigned</li>
<li>Specify the Ticket Number format</li>
<li>Add manual ticket order from backend</li>
<li>Export to Csv</li>
<li>Resend Ticket Numbers to customers</li>
<li>Run multiple raffles at a time</li>
<li>Live Drawing Feature</li>
<li><strong>Custom ticket images</strong></li>
<li><strong>50-50 raffle options</strong></li>
<li><strong>Ticket inventory management</strong></li>
<li><strong>Raffle archive, backup and restore</strong></li>
<li><strong>Pick a Prize Option</strong></li>
</ul>
</div><div class="rtg-block33 v-top rtg-inner20 rtg-bor">
<img src="'.plugin_dir_url( __FILE__ ).'/images/wordpress-raffle-logo-platinum.png" width="200" height="auto"/>
<ul class="rtg-list">
<li>Works with WordPress and WooCommerce</li>
<li>Raffle Ticket Numbers emailed to customer</li>
<li>Unlimited unique Ticket Numbers assigned</li>
<li>Specify the Ticket Number format</li>
<li>Add manual ticket order from backend</li>
<li>Export to Csv</li>
<li>Resend Ticket Numbers to customers</li>
<li>Run multiple raffles at a time</li>
<li>Live Drawing Feature</li>
<li><strong>Custom ticket images</strong></li>
<li><strong>50-50 raffle options</strong></li>
<li><strong>Ticket inventory management</strong></li>
<li><strong>Raffle archive, backup and restore</strong></li>
<li><strong>Pick a Prize Option</strong></li>
<li><strong>CSS for front end display</strong></li>
<li><strong>Limit purchase per user</strong></li>
<li><strong>PrePurchase quiz option</strong></li>
<li><strong>Custom large format tickets(1200x400)</strong></li>
<li><strong>Custom Email Text</strong></li>

</ul>
</div></div>
<div class="rtg-row">
<div class="rtg-block33 v-top rtg-inner20 rtg-bor rtg-center"> <a href="https://online.wpraffle.com/product/raffle-ticket-generator-silver-6-months-support/" class="rtg-button" target="_blank">Upgrade to Silver</a></div>
<div class="rtg-block33 v-top rtg-inner20 rtg-bor rtg-center"> <a href="https://online.wpraffle.com/product/raffle-ticket-generator-gold-6-months-support/" class="rtg-button"  target="_blank">Upgrade to Gold</a></div>
<div class="rtg-block33 v-top rtg-inner20 rtg-bor rtg-center"> <a href="https://online.wpraffle.com/product/raffle-ticket-generator-platinium-editions-w-6-months-support/" class="rtg-button"  target="_blank">Upgrade to Platinum</a></div>
</div></div>

';
		
	
	echo '</div>
	<div class="rtg-block25 v-top rtg-inner20 rtg-white">
	<h3>Useful Links</h3>
	<p><a href="https://online.wpraffle.com/plugin-support/" target="_blank" class="rtg-button"  target="_blank">Support</a></p>
	<p><a href="https://wpraffle.com/docs/bronze-instruction-manual/" target="_blank" class="rtg-button"  target="_blank">Documentation</a></p>
	
	<h3>Help to improve this plugin!</h3>
	<p>Enjoyed this plugin? You can help by rate this plugin <a href="https://wordpress.org/support/plugin/raffle-ticket-generator/reviews/"><b>5 stars!</b></a></p>
		 </div>
		
	</div></div>';
		echo '<div style="clear:both"></div>';
 
	}
		
		function raffle_generate_csv() {

    global $wpdb;

    if (isset($_POST['cat_name'])) {

        $sitename = sanitize_key(get_bloginfo('name'));

        if (!empty($sitename)) $sitename.= '.';

        $filename = $sitename . 'tickets.' . date('Y-m-d-H-i-s') . '.csv';

        header('Content-Description: File Transfer');

        header('Content-Disposition: attachment; filename=' . $filename);

        header('Content-Type: text/csv; charset=' . get_option('blog_charset'), true);

        $csv_output = 'Order ID, Customer Name, Customer Address, Product Name, Ticket Number';

        $csv_output.= "
";

        $ticketsquery = $wpdb->get_results('select * from ' . $wpdb->prefix . 'wooraffle_tickets_customer_to_tickets t1, ' . $wpdb->prefix . 'posts t2 where t1.products_id = "' . $_POST['cat_name'] . '" and t2.ID = t1.order_id and t2.post_status != "wc-refunded" and t2.post_status != "wc-cancelled" and t2.post_status != "trash" order by ticket_number ASC');

        if (empty($ticketsquery)) {

            $ticketsquery = $wpdb->get_results('select * from ' . $wpdb->prefix . 'wooraffle_tickets_customer_to_tickets t1, ' . $wpdb->prefix . 'posts t2 where t1.products_id = "' . $_POST['cat_name'] . '" and t2.ID = t1.order_id and t2.post_status != "wc-refunded" and t2.post_status != "wc-cancelled" and t2.post_status != "trash" order by ticket_number ASC');

        }

        foreach ($ticketsquery as $ticketsqueryresult) {

            $customer = get_user_by('id', $ticketsqueryresult->customer_id);
			$order = wc_get_order($ticketsqueryresult->order_id);
            $billing_first_name = $order->get_billing_first_name();
            $billing_last_name = $order->get_billing_last_name();
            $billing_company = $order->get_billing_company();
            $billing_address = $order->get_billing_address_1();
            $billing_address2 = $order->get_billing_address_2();
            $billing_city = $order->get_billing_city();
            $billing_postcode = $order->get_billing_postcode();
            $billing_country = $order->get_billing_country();
            $billing_state = $order->get_billing_state();
            $billing_email = $order->get_billing_email();
            $billing_phone = $order->get_billing_phone();
            $billing_paymethod = $order->get_payment_method();

            $customer_name = $billing_first_name . ' ' . $billing_last_name;

            $customer_address = $billing_address . ' ' . $billing_address2 . ' ' . $billing_city . ' ' . $billing_state . ' ' . $billing_postcode . ' ' . $billing_country;

            $product_name = get_the_title($ticketsqueryresult->products_id);

            $csv_output.= $ticketsqueryresult->order_id . ',' . $customer_name . ',' . $customer_address . ',' . $product_name . ',' . $ticketsqueryresult->ticket_number;

            $csv_output.= "
";

        }

        echo $csv_output;

        exit;

    }

}
add_action( 'init',  'raffle_generate_csv'  );
function raffle_showresults(){
	echo '<img src="'.plugin_dir_url( __FILE__ ).'/images/wordpress-raffle-logo.png" style="float:left"><div style="clear:both"></div>';
	echo '<h1 class="rtg-title">Customers Ticket Numbers</h1>';
global $wpdb;

 $args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
    );

    $loop = new WP_Query( $args );



    

echo '<table cellpadding="5" cellspacing="2" border="0" class="export-table">

	<tr class="export-header">

    


        <th>Product Name</th>

        <th>Number Of Tickets</th>

        <th>Number Of Orders</th>

        <th>Csv Export</th>


    

    

    </tr>';

  


    while ( $loop->have_posts() ) : $loop->the_post();   
$number_of_tickets = get_post_meta( get_the_ID(), '_number_field', true );
if ($number_of_tickets > 0) {
        echo '<form method="post">

	 <input type="hidden" name="cat_name" value="' . get_the_ID() . '">

	 <tr class="export-content">

	 <td>' . get_the_title() . '</td>';

        echo '<td>';

        $tickets_query = $wpdb->get_results('select * from ' . $wpdb->prefix . 'wooraffle_tickets_customer_to_tickets t1, ' . $wpdb->prefix . 'posts t2 where t1.products_id = "' . get_the_ID() . '" and t2.ID = t1.order_id and t2.post_status != "wc-refunded" and t2.post_status != "wc-cancelled" and  t2.post_status != "trash"');
		
		if (empty($tickets_query)) {
		 $tickets_query = $wpdb->get_results('select * from ' . $wpdb->prefix . 'wooraffle_tickets_customer_to_tickets t1, ' . $wpdb->prefix . 'wc_orders t2 where t1.products_id = "' . get_the_ID() . '" and t2.ID = t1.order_id and t2.post_status != "wc-refunded" and t2.post_status != "wc-cancelled" and  t2.post_status != "trash"');	
		}

        echo $wpdb->num_rows;

        echo '</td>';

        echo '<td>';

        $tickets_query2 = $wpdb->get_results('select * from ' . $wpdb->prefix . 'wooraffle_tickets_customer_to_tickets t1, ' . $wpdb->prefix . 'posts t2 where t1.products_id = "' . get_the_ID() . '" and t2.ID = t1.order_id and t2.post_status != "wc-refunded" and t2.post_status != "wc-cancelled" and  t2.post_status != "trash" group by order_id');
		if (empty($tickets_query2)) {
		 $tickets_query = $wpdb->get_results('select * from ' . $wpdb->prefix . 'wooraffle_tickets_customer_to_tickets t1, ' . $wpdb->prefix . 'wc_orders t2 where t1.products_id = "' . get_the_ID() . '" and t2.ID = t1.order_id and t2.post_status != "wc-refunded" and t2.post_status != "wc-cancelled" and  t2.post_status != "trash" group by order_id');	
		}

        echo $wpdb->num_rows;

        echo '</td>';

        echo '<td><input type="submit" value="Export Csv" class="button button-primary"></td></tr>';

	

	

	

	

	

	

	echo '</form>';

echo '

<tr>

	<td colspan="5">

		<div class="rtg-accordion">

			<h3>Tickets Information: (Click to expand)</h3>

				<div class="container">

					<div class="mainsection">

						<table cellpadding="3" cellspacing="3">

							<tr>

								<th>Order Number</th>

                                <th>Product Name</th>

								<th>Ticket Number</th>

								<th>Name</th>

								<th>Email Address</th>

								<th>Phone</th>

								<th>Address</th>

							

							</tr>';

                            

        $ticketsquery = $wpdb->get_results('select * from ' . $wpdb->prefix . 'wooraffle_tickets_customer_to_tickets t1, ' . $wpdb->prefix . 'posts t2 where t1.products_id = "' . get_the_ID() . '" and t2.ID = t1.order_id and t2.post_status != "wc-refunded" and t2.post_status != "wc-cancelled" and  t2.post_status != "trash"');
		
		if (empty($ticketsquery)) {
		$ticketsquery = $wpdb->get_results('select * from ' . $wpdb->prefix . 'wooraffle_tickets_customer_to_tickets t1, ' . $wpdb->prefix . 'wc_orders  t2 where t1.products_id = "' . get_the_ID() . '" and t2.ID = t1.order_id and t2.post_status != "wc-refunded" and t2.post_status != "wc-cancelled" and  t2.post_status != "trash"');
		}

        $array_ticket_numbers = array();

        foreach ($ticketsquery as $ticketsqueryresult) {

            $array_ticket_numbers[$ticketsqueryresult->order_id . "_" . $ticketsqueryresult->products_id][] = $ticketsqueryresult->ticket_number;

        }

        foreach ($array_ticket_numbers as $key => $value) {

            $order_id = explode("_", $key);

           $order = wc_get_order($order_id[0]);
            $billing_first_name = $order->get_billing_first_name();
            $billing_last_name = $order->get_billing_last_name();
            $billing_company = $order->get_billing_company();
            $billing_address = $order->get_billing_address_1();
            $billing_address2 = $order->get_billing_address_2();
            $billing_city = $order->get_billing_city();
            $billing_postcode = $order->get_billing_postcode();
            $billing_country = $order->get_billing_country();
            $billing_state = $order->get_billing_state();
            $billing_email = $order->get_billing_email();
            $billing_phone = $order->get_billing_phone();
            $billing_paymethod = $order->get_payment_method();

            $customer_name = $billing_first_name . ' ' . $billing_last_name;

            $customer_address = $billing_address . ' ' . $billing_address2 . ' ' . $billing_city . ' ' . $billing_state . ' ' . $billing_postcode . ' ' . $billing_country;

            $product_name = get_the_title($order_id[2]);

            if (count($value) > 1) {

                $ticket_number = $value[0] . " to " . $value[count($value) - 1];

            } else {

                $ticket_number = $value[0];

            }

            echo '

<tr>

<td>' . $order_id[0] . '</td>

<td>' . $product_name . '</td>

<td>' . $ticket_number . '</td>

<td>' . $customer_name . '</td>

<td>' . $billing_email . '</td>

<td>' . $billing_phone . '</td>

<td>' . $customer_address . '</td>

</tr>

';



        }

echo '

							

						

						</table>

					

					</div>

				</div>

		</div>

	</td>

</tr>';


	}
  


endwhile;

    wp_reset_query();

 echo '  </table>';



}
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );
function woo_add_custom_general_fields() {
  global $woocommerce, $post;
  echo '<div class="options_group">';
  woocommerce_wp_text_input( 
	array( 
		'id'                => '_number_field', 
		'label'             => __( 'Number Of Raffle Tickets', 'woocommerce' ), 
		'placeholder'       => '', 
		'description'       => __( 'Enter the Number of Tickets here for this product.', 'woocommerce' ),
		'type'              => 'number', 
		'custom_attributes' => array(
				'step' 	=> 'any',
				'min'	=> '0'
			) 
	)
);
  echo '</div>';
}
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );
function woo_add_custom_general_fields_save( $post_id ){
	$woocommerce_number_field = $_POST['_number_field'];
	if( !empty( $woocommerce_number_field ) )
		update_post_meta( $post_id, '_number_field', esc_attr( $woocommerce_number_field ) );
		}
add_action('woocommerce_after_single_product_summary', 'simple_number_of_tickets_for_product');
function simple_number_of_tickets_for_product() {
	global $post;
	if (!empty(get_post_meta( $post->ID, '_number_field', true ))) {
echo '<div style="clear:both;">Number Of Tickets: '.get_post_meta( $post->ID, '_number_field', true ). '</div>';	
	}
}

function get_orders_from( $order_id, $limit = 1 ){
   global $wpdb;

    // The SQL query
    $results = $wpdb->get_col( "
        SELECT ID
        FROM {$wpdb->prefix}posts
        WHERE post_type LIKE 'shop_order'
        AND ID < $order_id
        ORDER BY ID DESC
        LIMIT $limit
    " );
    return $limit == 1 ? reset( $results ) : $results;
}
function simple_insert_raffle_tickets($order_id){
	global $wpdb;  
	 global $jal_db_version;  
	// if ( 'processing' == $order_status || 'completed' == $order->status) {
	 $order = new WC_Order($order_id);
	$items = $order->get_items();
	$ticket_prefix = 'wpraffle-'.date('Y');
	$last_order_id = get_orders_from($order_id);

	//$start_query = $wpdb->get_results('SELECT `ticket_number` FROM `'.$wpdb->prefix.'wooraffle_tickets_customer_to_tickets` ORDER BY CAST(`ticket_number` AS UNSIGNED)=0, CAST(`ticket_number` AS UNSIGNED), LEFT(`ticket_number`,1), CAST(MID(`ticket_number`,2) AS UNSIGNED) LIMIT 0,1 ');
	$start_query = $wpdb->get_results('SELECT `ticket_number` FROM `'.$wpdb->prefix.'wooraffle_tickets_customer_to_tickets` where 1');
if (empty($start_query)) {
$start = 1;
}
else {

	foreach ( $start_query as $start_query_result ) {
	$startt = explode('-',$start_query_result->ticket_number);
	if ($startt[2] >= 500) {
	$start = 1;
			}
			else {
	$start = $startt[2]+1;
			}
	}
}
	foreach ( $items as $item ) {
    $product_id = $item['product_id'];
		if (!empty(get_post_meta( $item['product_id'], '_number_field', true ))) {
	$no_of_tickets = ($item['qty']) * (int)(get_post_meta( $item['product_id'], '_number_field', true ));
	for ($i=0; $i<$no_of_tickets; $i++) {
		
		$wpdb->insert($wpdb->prefix."wooraffle_tickets_customer_to_tickets", array(
   "order_id" => $order_id,
   "products_id" => $item['product_id'],
   "ticket_number" => $ticket_prefix.'-'.sprintf('%02d',$start)
));
	$start++;
	}
				}
}
	//$order_status = 'completed';
	//return $order_status;
	//}
			
}
add_action( 'woocommerce_order_status_processing', 'simple_insert_raffle_tickets' );
//add_filter( 'woocommerce_payment_complete_order_status', 'simple_send_ticket_numbers', 10, 3 );
function simple_send_ticket_numbers($order) {
	global $wpdb;
	//if ( 'processing' == $order_status || 'completed' == $order->status) {
	$ticket_numbers = $wpdb->get_results('select * from '.$wpdb->prefix.'wooraffle_tickets_customer_to_tickets where order_id = "'.$order->get_id().'"');
	if ($wpdb->num_rows > 0) {
		echo '<h2>Ticket Numbers provided by WPRaffle.com</h2>';
		foreach ( $ticket_numbers as $result ) {
			echo '<p>'.$result->ticket_number.'</p>';
		}
	}
	//$order_status = 'completed';
	//return $order_status;
	//}
}
add_action( 'woocommerce_email_after_order_table', 'simple_send_ticket_numbers' );
//show on order detail page customer end
add_action( 'woocommerce_order_details_after_order_table', 'simple_send_ticket_numbers' );
//show on admin order page
function simple_show_ticket_numbers_admin($order) {
	global $wpdb;
	$ticket_numbers = $wpdb->get_results('select * from '.$wpdb->prefix.'wooraffle_tickets_customer_to_tickets where order_id = "'.$order->get_id().'"');
	if ($wpdb->num_rows > 0) {
		echo '<p>&nbsp;</p><h2>Ticket Numbers</h2>';
		foreach ( $ticket_numbers as $result ) {
			echo $result->ticket_number.'<br />';
		}
	}
}

add_action( 'woocommerce_admin_order_data_after_order_details', 'simple_show_ticket_numbers_admin' );
?>