<?php

/**
 * file included for sales commission list
 *
 * @since    1.0.0
 */



if(isset($_POST['ciwcamp_status']) && !empty($_POST['ciwcamp_status']))
{
    $ciwcamp_status = sanitize_text_field($_POST['ciwcamp_status']);
    
    global $wpdb;

    $table = $wpdb->prefix .'posts';

    $primaryKey = 'ID';

    $columns = array(
        array( 'db' => 'sales_id',  'dt' => 0 , 'field' => 'sales_id' ),
        array( 'db' => 'affiliate_id',  'dt' => 1 , 'field' => 'affiliate_id' ),
        array( 'db' => 'order_id',  'dt' => 2 , 'field' => 'order_id' ),
        array( 'db' => 'product_id', 'dt' => 3 , 'field' => 'product_id' ),
        array( 'db' => 'commission', 'dt' => 4 , 'field' => 'commission' ),					
        array( 'db' => 'created_date',  'dt' => 5 , 'field' => 'created_date' )

        ); 

    $sql_details = array(
        'user' => DB_USER,
        'pass' => DB_PASSWORD,
        'db'   => DB_NAME,
        'host' => DB_HOST
    );
    
    $join = "FROM ".$wpdb->prefix ."ciwcamp_sales";

    if($ciwcamp_status != "all")
    {
        $where = "status = '$ciwcamp_status' AND source = 'sale'";
    }
    else
    {
        $where = "source = 'sale'";
    }
    
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
                                $ciwcamp_affiliate_name = "#".$ciwcamp_sales[1]." ".get_user_meta($ciwcamp_sales[1], 'first_name')[0]." ".get_user_meta($ciwcamp_sales[1], 'last_name')[0];
                                $ciwcamp_sales_data_ssp['data'][$i][1] = $ciwcamp_affiliate_name;
                            }			
                            if( isset($ciwcamp_sales[2]) && !empty($ciwcamp_sales[2]) )
                            {
                                $ciwcamp_sales_data_ssp['data'][$i][2] = "#".$ciwcamp_sales[2];
                            }
                            if( isset($ciwcamp_sales[3]) && !empty($ciwcamp_sales[3]))
                            {
                                $product = wc_get_product( $ciwcamp_sales[3] );
                                $ciwcamp_sales_data_ssp['data'][$i][3] = "#".$ciwcamp_sales[3]." ".$product->get_title();
                            }
                            if( isset($ciwcamp_sales[4]) && !empty($ciwcamp_sales[4]))
                            {
                                $ciwcamp_sales_data_ssp['data'][$i][4] = get_woocommerce_currency_symbol()." ".$ciwcamp_sales[4];
                            }
                            if( isset($ciwcamp_sales[5]) && !empty($ciwcamp_sales[5]))
                            {
                                $ciwcamp_sales_data_ssp['data'][$i][5] =date_format(date_create($ciwcamp_sales[5]),"Y/m/d  H:i:s") ;
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

?>