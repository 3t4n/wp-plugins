<?php

function vkrwps_orders_callback() {
    if (isset($_POST['submit'])) {

        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'vkrwps-orders' ) ) {
            die('security error');
        }


    }
    echo '<div class=wrap><h2>Orders</h2>';	
    ?>

    <form action="" method="post" id="vkrpsp-orders" style="position:relative;">
    <?php
    
    $preload_img = get_site_url() . '/wp-content/plugins/real-wp-shop-lite/js/ajaximg.GIF';
    $pre_img = '<img src='.$preload_img.' />';

    $symba = get_option('vkrwps_symba');
    $sym = get_option('vkrwps_currency');
    
    ?>
    <div class="ah">
        <div class="ai"><?php echo $pre_img; ?></div>
    </div>

    <table class="form-table ep widefat vkorders" style="position:relative;">
    <?php wp_nonce_field('vkrwps-orders'); ?>

    <tr>
        <th style="padding-left:10px;width:8%;">Order ID</th>        
        <th style="padding-left:10px;width:11%;">View</th>
        <th style="padding-left:10px;width:12%;">Order Status</th>
        <th style="padding-left:10px;width:15%;">Order Date</th>
        <th style="padding-left:10px;width:30%;">Change Order Status</th>
        <th style="padding-left:10px;width:17%;">Update Order Status</th> 
        <th style="padding-left:10px;width:10%;">Delete</th>        
        <th style="padding-left:10px;width:10%;"></th>               
    </tr>

    <?php
            
        global $wpdb;

        $limit = get_option( 'vkrwps_orders_paging' );

        $get_orders = $wpdb->get_results( 
        "
        SELECT * 
        FROM wp_vkrwps_order_info
        ORDER BY id DESC
        LIMIT 0, $limit
        "
        );
            
     foreach ($get_orders as $order): ?>
    <?php $status = $order->order_status; ?>
        <tr class=c<?= $order->id; ?>>
            <td><?= $order->orderid; ?></td>
            <td style="position:relative;overflow:visible;">
                <a href="" id="id<?=$order->id; ?>" class="modal">View Full Info</a>
                <div class="modal fullinfo<?= $order->id; ?>">
                    <span class="close">close</span>
                    <?php
                                            
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
                        
                        ?>
                            <div class="foi">
                                <label>Order ID:</label>
                                <p><?= $foi->orderid; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Order Status:</label>
                                <p><?= $foi->order_status; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Order Date:</label>
                                <p><?= $d; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Name:</label>
                                <p><?= $foi->name; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Middle Name:</label>
                                <p><?= $foi->middle_name; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Last Name:</label>
                                <p><?= $foi->lastname; ?></p>
                            </div> 

                            <div class="foi">
                                <label>E-mail:</label>
                                <p><?= $foi->email; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Address 1:</label>
                                <p><?= $foi->address1; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Address 2:</label>
                                <p><?= $foi->address2; ?></p>
                            </div> 

                            <div class="foi">
                                <label>City:</label>
                                <p><?= $foi->city; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Zip/Postal Code:</label>
                                <p><?= $foi->zip; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Country:</label>
                                <p><?= $foi->country; ?></p>
                            </div> 

                            <div class="foi">
                                <label>State:</label>
                                <p><?= $foi->state; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Phone:</label>
                                <p><?= $foi->phone; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Mobile:</label>
                                <p><?= $foi->mobile; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Fax:</label>
                                <p><?= $foi->fax; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Order Notes:</label>
                                <p><?= nl2br($foi->ordernotes); ?></p>
                            </div> 

                            <div class="foi">
                                <label>Total:</label>
                                <p><?= $ot; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Payment method:</label>
                                <p><?= $foi->payment_option; ?></p>
                            </div> 

                            <div class="foi">
                                <label>Order Content:</label>
                                <p><?= $foi->ordercontent; ?></p>
                            </div> 
                                                      
                        <?php endforeach; ?>
                </div> 
            </td>
            <td><?= $order->order_status; ?></td>
            <td><?= $d; ?></td>

            <td>
                <input type="radio" name="status<?=$order->id;?>" id="pendings<?=$order->id;?>" value="pending" <?php if ($status == 'pending') echo 'checked=checked'; ?>>
                <label for="pendings<?=$order->id;?>">Pending</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="status<?=$order->id;?>" id="paids<?=$order->id;?>" value="paid" <?php if ($status == 'paid') echo 'checked=checked'; ?>>
                <label for="paids<?=$order->id;?>">Paid</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="status<?=$order->id;?>" id="shippeds<?=$order->id;?>" value="shipped" <?php if ($status == 'shipped') echo 'checked=checked'; ?>>
                <label for="shippeds<?=$order->id;?>">Shipped</label>
            </td>
            <td style="position:relative;">
                <a href="#" id="update<?=$order->id;?>" class="upd">UPDATE</a>
                <div class="ai ai<?=$order->id;?>"></div>
            </td>
            <td><a href="#" id="delete<?=$order->id;?>" class="del">DELETE</a></td>
            <td></td>
        </tr>
    <?php endforeach ?>

    </table>
    
    <div class="paging">
        <a href=# class="first disabled">First</a>
        <a href=# class="prev disabled">Previous</a>

        <?php
        
        $tpn = $wpdb->get_var( "SELECT COUNT(*) FROM wp_vkrwps_order_info");

        $mon = get_option('vkrwps_mon');
        if ($tpn > $mon) $tpn=$mon;

        if ( $tpn > $limit) {
            if ( $tpn > $limit) {
                $max = ceil($tpn / $limit);
            }

            for ($i=1; $i <= $max; $i++) { 
                $ip = ceil( ($i - 1) * $limit);
                echo '<a href=# class="page '.$ip.'">'.$i.'</a>';
            }
        }
        
        ?>

        <a href=# class=next>Next</a>
        <a href=# class=last>Last</a>
    </div> 

    </form>
    </div> 
<?php
} 

?>
