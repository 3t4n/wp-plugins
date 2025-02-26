<?php

add_action('wp_ajax_ORDERS_PAGING', 'vkrwps_orders_paging');
function vkrwps_orders_paging() {

    $start = $_POST['start'];

    $s = '';

    $paging = get_option( 'vkrwps_orders_paging' );

    $symba = get_option('vkrwps_symba');
    $sym = get_option('vkrwps_currency');

    global $wpdb;

    $get_orders = $wpdb->get_results( 
    "
    SELECT * 
    FROM wp_vkrwps_order_info
    ORDER BY id DESC
    LIMIT $start,$paging
    "
    );
    
    $s .='
    <tr>
        <th style="padding-left:10px;width:8%;">Order ID</th>        
        <th style="padding-left:10px;width:11%;">View</th>
        <th style="padding-left:10px;width:12%;">Order Status</th>
        <th style="padding-left:10px;width:15%;">Order Date</th>
        <th style="padding-left:10px;width:30%;">Change Order Status</th>
        <th style="padding-left:10px;width:17%;">Update Order Status</th> 
        <th style="padding-left:10px;width:10%;">Delete</th>        
        <th style="padding-left:10px;width:10%;"></th>               
    </tr>';
    
    foreach ($get_orders as $order): ?>

        <?php $status = $order->order_status; 
        $s .=  '<tr class=c'.$order->id.'>';
        $s .=  '<td>'.$order->orderid.'</td>';
        $s .=  '<td style="position:relative;overflow:visible;">';
        $s .=  '<a href="#" id=id'.$order->id.' class="modal">View Full Info</a>';
        $s .=  '<div class="modal fullinfo'.$order->id.'">';
        $s .=  '<span class="close">close</span>';            
                $get_full_order = $wpdb->get_results( 
                "
                SELECT * 
                FROM wp_vkrwps_order_info
                WHERE id=$order->id
                "
                );                        
                        
                        foreach ($get_full_order as $foi): ?>

                        <?php
                        
                        $d = $foi->orderdate;
 
                        $ot = $foi->total;
                        if ($symba == 'after') {
                            $ot = $ot.$sym;
                        } else {
                            $ot = $sym.$ot;
                        }
                        
                        
                        $s .=  '  <div class="foi">
                                    <label>Order ID:</label>
                                    <p>'.$foi->orderid.'</p>
                                </div>';

                         $s .=  '<div class="foi">
                                <label>Order Status:</label>
                                <p>'.$foi->order_status.'</p>
                            </div>';

                        $s .= '<div class="foi">
                                <label>Order Date:</label>
                                <p>'.$d.'</p>
                            </div>'; 

                        $s .= '<div class="foi">
                                <label>Name:</label>
                                <p'. $foi->name.'</p>
                            </div>'; 

                        $s .=   '<div class="foi">
                                <label>Middle Name:</label>
                                <p>'.$foi->middle_name.'</p>
                            </div> ';

                        $s .= '<div class="foi">
                                <label>Last Name:</label>
                                <p>'. $foi->lastname.'</p>
                            </div> ';

                        $s .=   '<div class="foi">
                                <label>E-mail:</label>
                                <p>'. $foi->email.'</p>
                            </div>'; 

                        $s .=   '<div class="foi">
                                <label>Address 1:</label>
                                <p>'. $foi->address1.'</p>
                            </div>'; 

                         $s .=  '<div class="foi">
                                <label>Address 2:</label>
                                <p>'.$foi->address2.'</p>
                            </div>'; 

                        $s .=   '<div class="foi">
                                <label>City:</label>
                                <p>'.$foi->city.'</p>
                            </div>'; 

                         $s .=  '<div class="foi">
                                <label>Zip/Postal Code:</label>
                                <p>'.$foi->zip.'</p>
                            </div>'; 

                        $s .=   '<div class="foi">
                                <label>Country:</label>
                                <p>'.$foi->country.'</p>
                            </div> ';

                        $s .='    <div class="foi">
                                <label>State:</label>
                                <p>'.$foi->state.'</p>
                            </div> ';

                         $s .=  '<div class="foi">
                                <label>Phone:</label>
                                <p>'.$foi->phone.'</p>
                            </div> ';

                         $s .=  '<div class="foi">
                                <label>Mobile:</label>
                                <p>'.$foi->mobile.'</p>
                            </div> ';

                         $s .=  '<div class="foi">
                                <label>Fax:</label>
                                <p>'.$foi->fax.'</p>
                            </div>'; 

                         $s  .= '<div class="foi">
                                <label>Order Notes:</label>
                                <p>'.nl2br($foi->ordernotes).'</p>
                            </div>'; 

                        $s  .=  '<div class="foi">
                                <label>Total:</label>
                                <p>'.$ot.'</p>
                            </div> ';

                        $s .= '<div class="foi">
                                <label>Payment method:</label>
                                <p>'.$foi->payment_option.'</p>
                            </div> ';

                         $s  .= '<div class="foi">
                                <label>Order Content:</label>
                                <p>'.$foi->ordercontent.'</p>
                            </div> ';
                                                      
                        endforeach; 
            $s .=    '</div>
            </td>
            <td>'.$order->order_status.'</td>
            <td>'.$d.'</td>';
            $s .= '<td>
                <input type="radio" name="status'.$order->id.'" id="pendings'.$order->id.'" value="pending"';?>
                <?php if ($status == 'pending') $s .= 'checked=checked'; $s.='>';?>
                <?php $s .= '<label for="pendings'.$order->id.'">Pending</label>
            &nbsp;&nbsp;&nbsp;&nbsp';
                $s .= '<input type="radio" name="status'.$order->id.'" id="paids'.$order->id.'" value="paid"';?> 
                <?php if ($status == 'paid') $s .= 'checked=checked'; $s.='>'; ?>
                <?php $s .= '<label for="paids'.$order->id.'">Paid</label>
            &nbsp;&nbsp;&nbsp;&nbsp;';
                $s .= '<input type="radio" name="status'.$order->id.'" id="shippeds'.$order->id.'" value="shipped"';?> 
                <?php if ($status == 'shipped') $s .= 'checked=checked'; $s.='>'; ?>
                <?php $s .= '<label for="shippeds'.$order->id.'">Shipped</label>
            </td>
            <td style="position:relative;">
                <a href="#" id="update'.$order->id.'" class="upd">UPDATE</a>
                <div class="ai ai'.$order->id.'"></div>
            </td>
            <td><a href="#" id="delete'.$order->id.'" class="del">DELETE</a></td>
            <td></td>
        </tr>';
        
     endforeach;

    echo $s;

    die();
}

?>