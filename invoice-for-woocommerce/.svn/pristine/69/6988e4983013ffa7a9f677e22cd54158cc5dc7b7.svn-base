<?php // Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
* Adding custom fields - Download Invoice
*/

// Column Title
add_filter( 'manage_edit-shop_order_columns', 'invoice_for_woocommerce_shop_order_column', 20 );
function invoice_for_woocommerce_shop_order_column($columns)
{
    $reordered_columns = array();
    // Inserting columns to a specific location
    foreach( $columns as $key => $column){
        $reordered_columns[$key] = $column;
        if( $key ==  'order_status' ){
            // Inserting after "Status" column
            $reordered_columns['ifv-active'] = __( 'Invoices','invoice-for-woocommerce');
        }
    }
    return $reordered_columns;
}

// Adding custom fields Download Invoice meta data for each new column (example) when the order is complete
add_action( 'manage_shop_order_posts_custom_column' , 'invoice_for_woocommerce_custom_orders_list_column_content', 20, 2 );
function invoice_for_woocommerce_custom_orders_list_column_content( $column, $post_id ) {
	global  $post;
	$order = wc_get_order( $post_id );
	if ($order->has_status('completed') ) {
		$value1 = get_post_meta( get_the_ID(), 'ifv_activate_invoice', true );
		$value2 = get_post_meta( get_the_ID(), 'ifv_activate_invoice_1', true );
		$ifv_order_id = get_post_meta(get_the_ID(), 'ifv_order_id', true );
		$invoice_number = get_post_meta(get_the_ID(), 'invoice_number', true );
		switch ( $column ) {
			case 'ifv-active':
			// Get custom post meta data
			$in_number = get_post_meta(get_the_ID(), 'invoice_number', true);
			if($in_number) { echo "<b>№:</b> <span class='invoice-num'>".$in_number."</span>";	}
			$filepath__1 = trailingslashit( wp_upload_dir()['basedir'] )."invoices/".$ifv_order_id.'.pdf';
			$filepath__2 = trailingslashit( wp_upload_dir()['basedir'] )."invoices/".$ifv_order_id.'_lang.pdf';

			if( ( $value1 == "yes" or $value1 == "yes_order_list" ) and $order->has_status( 'completed' ) ) {
				?>
				<br>
				<?php if ( file_exists($filepath__1 ) and !is_search() ) { ?>
				<a class="icon-ce button" download href="<?php echo admin_url('edit.php')."?post_type=shop_order&invoice=".$ifv_order_id."&paged=".get_query_var('paged'); ?>">
					<?php esc_html_e('Download','invoice-for-woocommerce'); ?>
					<?php if(get_option( 'countries_flag' )) { ?><img class="invoice-flags" style="width:30px;" src="<?php echo plugin_dir_url(__FILE__).'flags/'.str_replace(" ", "_", get_option( 'countries_flag' )).".jpg"; ?>"><?php } ?>
				</a>

				<?php 
				}
				// Download en Invoice
				if( isset( $_GET['invoice'] ) ) {
					$fidWWWW = intval($_GET['invoice']);
					if ($fidWWWW == $ifv_order_id and $value1 != "" ) {
						$pdf__11=file_get_contents($filepath__1);
						header("Content-type:application/pdf");
						header("Content-Disposition:attachment; filename=".$invoice_number.".pdf");
						echo $pdf__11;
						ob_clean();
						flush();
						readfile($filepath__1);
						exit;
					}
				}
			}

			
		    break;
		}
	}
}

	

/**
 * Adding custom fields show EU VAT name in the order
 *
 */
if ( get_option( 'activate_all_VAT_fields' ) ){
	function invoice_for_woocommerce_column_vat( $columns ) {
		$new_columns = array();
		foreach ( $columns as $column_name => $column_info ) {
			$new_columns[ $column_name ] = $column_info;
			if ( 'order_total' === $column_name ) {
				$new_columns['VAT_EU'] = __( 'EU VAT or TAX', 'invoice-for-woocommece' );
			}
		}
		return $new_columns;
	}
	add_filter( 'manage_edit-shop_order_columns', 'invoice_for_woocommerce_column_vat', 20 );

	function invoice_for_woocommerce_vat_column_content( $column ) {
		global $the_order, $post;
		$order = wc_get_order( $post->ID );
		$vat = get_post_meta( get_the_ID(), 'vat_number', true );
		$tax_procentage_s = ( ( $order->get_total() / ($order->get_total() - $order->get_total_tax())) * 100 )-( 100 );
		if ( 'VAT_EU' === $column and $order->has_status('completed') ) {
			if ( invoice_for_woocommerce_isEU($order->get_billing_country() ) == true ) { ?>
				<img class="ifv-order-flag" src=<?php echo plugin_dir_url(__FILE__)."flags/europe-flag.jpg"; ?> />
			<?php }
			// Loop through order items
			echo "  TAX Rate ".number_format($tax_procentage_s, 0, '.', '.')."% "."";
			echo "<br><strong>".$vat."</strong>";
			
			
			if (!$vat){
			echo WC()->countries->countries[ $order->get_billing_country() ];
		}
			
			
		}

	}
	add_action( 'manage_shop_order_posts_custom_column', 'invoice_for_woocommerce_vat_column_content' );
}