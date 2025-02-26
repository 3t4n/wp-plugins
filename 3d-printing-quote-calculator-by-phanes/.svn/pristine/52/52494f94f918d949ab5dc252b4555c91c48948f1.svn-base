<div id="pqc-wrapper" class="container">

    <?php if ( isset( $order_id ) ) : extract( $the_orders[$order_id] ); ?>
    
        <h3><?php printf( __( 'Order #%s', 'pqc' ), $order_id ); ?></h3>
        
        <?php if ( $total_item > 0 ) : ?>

        <table class="cart">
        
            <thead style="background: #333; color: #fff;">
                <tr>
                    <th id="item" style="width: 52%;"><?php _e( 'Item(s)', 'pqc' ); ?></th>
                    <th id="quantity" style="width: 15%;"><?php _e( 'Quantity', 'pqc' ); ?></th>
                    <th id="total" style="width: 38%;"><?php _e( 'Price', 'pqc' ); ?></th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach( $items as $item_data ) : ?>
                    <tr class="order_item">
                        <td style="text-align:left; vertical-align:middle; border: 1px solid #eee; word-wrap:break-word;">
                        <?php
                        printf(
                        '<span style="font-weight: 700;">%s</span> 
                        <div style="%s">
                        Volume: %s cubic cm 
                        <br> Density: %s g/cubic cm 
                        <br> Material: %s
                        </div>',
                        $item_data['name'],
                        'font-size: 10px;margin-top: 0.5em;padding: 0.5% 5%;line-height: 1.8;',
                        $item_data['volume'],
                        $item_data['density'],
                        $item_data['material']
                        );
                        ?>
                        </td>
                        <td style="text-align:left; vertical-align:middle; border: 1px solid #eee;">
                        <?php echo $item_data['quantity']; ?>
                        </td>
                        <td style="text-align:left; vertical-align:middle; border: 1px solid #eee;">
                        <?php echo pqc_money_format( $item_data['amount'], $currency, true, $currency_pos ); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            
            <tfoot>
            
                <?php if ( isset( $coupon ) && ! empty( $coupon ) ) : ?>
                <tr>
                    <th class="td" scope="row" colspan="2" style="text-align:left; border-top-width: 2px;">Coupon:</th>
                    <td class="td" style="text-align:left; border-top-width: 2px;">
                    <?php echo $coupon; ?>
                    <?php
                    if ( ! empty( $coupon_amount ) && ! empty( $coupon_type ) ) {
                        $discount = $coupon_type == 'percent' ? 
                        "$coupon_amount% off" :
                        '- ' . pqc_money_format( $coupon_amount, $currency, true, $currency_pos );
                        printf( '<p style="font-style: italic; color: #888;">Discount: %s</p>', $discount );
                    }
                    ?>
                    </td>
                </tr>
                <?php endif; ?>

                <tr>
                    <th class="td" scope="row" colspan="2" style="text-align:left; border-top-width: 2px;">Subtotal:</th>
                    <td class="td" style="text-align:left; border-top-width: 2px;">
                    <?php echo pqc_money_format( $subtotal, $currency, true, $currency_pos ); ?>
                    </td>
                </tr>
                
                <tr>
                    <th class="td" scope="row" colspan="2" style="text-align:left; border-top-width: 2px;">Shipping Option: &nbsp;&nbsp; <?php echo $shipping_option; ?></th>
                    <td class="td" style="text-align:left; border-top-width: 2px;">
                    <?php echo pqc_money_format( $shipping_cost, $currency, true, $currency_pos ); ?>
                    </td>
                </tr>
                
                <tr>
                    <th class="td" scope="row" colspan="2" style="text-align:left; border-top-width: 2px;">Payment Method:</th>
                    <td class="td" style="text-align:left; border-top-width: 2px;">
                    <?php
                    if ( $order_status == 'pending' && isset( $pay_for_order_id ) && ! empty( $pay_for_order_id ) ) :
                        
                    printf(
                        '<a class="link" target="_blank" href="%s?pay_for_order=true&pay_for_order_id=%s&order_id=%s">Complete payment</a>',
                        get_permalink( pqc_page_exists( 'pqc-checkout' ) ),
                        $pay_for_order_id, $order_id
                    );
                    
                    else: echo $payment_method; endif;
                    ?>
                    </td>
                </tr>
                <?php if ( isset( $txn_id ) && ! empty( $txn_id ) ) : ?>
                <tr>
                    <th class="td" scope="row" colspan="2" style="text-align:left; border-top-width: 2px;">Transaction ID:</th>
                    <td class="td" style="text-align:left; border-top-width: 2px;">
                    <p style="font-style: italic; color: #888; font-size: 14px;"><?php echo $txn_id; ?></P>
                    </td>
                </tr>
                <?php endif; ?>
                
                <tr>
                    <th class="td" scope="row" colspan="2" style="text-align: left; border-top-width: 2px">Total:</th>
                    <td class="td" style="text-align:left; border-top-width: 2px; background: rgb(139, 195, 74) none repeat scroll 0% 0%; color: rgb(255, 255, 255); font-size: 20px; font-weight: 800;">
                    <?php echo pqc_money_format( $total, $currency, true, $currency_pos ); ?>
                    </td>
                </tr>
                
            </tfoot>

        </table>
        
        <div style="float: left;">
            <h2><?php _e( 'Customer details', 'pqc' ); ?></h2>
            <ul style="padding-left: 10%;">
                <?php foreach ( $fields as $name => $value ) : $name = ucfirst( $name ); ?>
                    <li><strong><?php echo wp_kses_post( $name ); ?>:</strong> <span class="text"><?php echo wp_kses_post( $value ); ?></span></li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <?php else : ?>
        
        <table>
            <tbody>
                <tr>
                    <td><?php _e( 'No order found', 'pqc' ); ?></td>
                </tr>
            </tbody>
        </table>
        
        <?php endif; ?>

    <?php else : ?>

    <?php $payment_message = apply_filters( 'pqc_payment_response', '' ); ?>

    <header class="codrops-header">
        <?php if ( ! empty( $payment_message ) ) : ?>
        <div class="notice"><p><?php echo $payment_message; ?></p></div>
        <?php endif; ?>
    </header>

    <header class="codrops-header">
        <?php if ( ! empty( $GLOBALS['payment_message'] ) ) : ?>
        <div class="notice"><p><?php echo $GLOBALS['payment_message']; ?></p></div>
        <?php endif; ?>
        
        <?php if ( isset( $_GET['order_request_sent'] ) && $_GET['order_request_sent'] == 'true' && isset( $_GET['order_id'] ) ) : ?>
        <div class="success"><p><?php echo __( 'Order submitted successfully, Your Order ID is #', 'pqc' ) . $_GET['order_id']; ?></p></div>
        <?php endif; ?>
    </header>

    <div id="content-full">
    
        <div class="item-total-heading" style="margin-bottom: 0;">
            <h1 style="padding: 0; float: left; width: 50%;"><?php printf( _n( '%1$s order', '%1$s orders', $total_item, 'pqc' ), $total_item ); ?></h1>
        </div>

        <?php /* To be decided ?>
        <div class="search-order">
            <form method="GET" enctype="multipart/form-data">
                <input type="text" placeholder="Search order by Order ID" name="search_order_id">
                <button type="submit" name="search_order"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <?php */ ?>
        
        <div class="paginate">
            <?php echo pqc_orders_pagination( $per_page, $page, null, get_permalink( pqc_page_exists( 'pqc-orders' ) ) ); ?>
        </div>
        
        <table class="cart" style="margin: 0;">
            <thead style="background: #333; color: #fff;">
                <tr>
                    <th id="order" style="width: 20%;"><?php _e( 'Order', 'pqc' ); ?></th>
                    <th id="items"><?php _e( 'Purchased', 'pqc' ); ?></th>
                    <th id="ship-to" style="width: 32%;"><?php _e( 'Ship to', 'pqc' ); ?></th>
                    <th id="total"><?php _e( 'Total', 'pqc' ); ?></th>
                    <th id="date"><?php _e( 'Date', 'pqc' ); ?></th>
                </tr>
            </thead>
            
            <tbody>
                <?php if ( $total_item > 0 ) : ?>
                <?php
                $i = 0;
                foreach( $the_orders as $the_order ) :
                $query_string = esc_url( add_query_arg( array(
                    'order_action'  => 'view-order',
                    'order_id'      => $the_order['id'],
                ), get_permalink( pqc_page_exists( 'pqc-orders' ) )
                ) );
                
                ?>
                <tr id="<?php echo $the_order['id']; ?>" <?php if ( $i % 2 ) { echo 'class="even"'; } ?>>
                    <td class="order">
                        <strong>
                            <a href="<?php echo $query_string; ?>" style="cursor: pointer;" title="Order <?php echo $the_order['title']; ?>"><?php echo $the_order['title']; ?></a>
                        </strong>
                        <p><?php echo 'Payment ' . $the_order['order_status']; ?></p>
                    </td>
                    
                    <td class="items">
                        <p><?php echo count( $the_order['items'] ) . ' ' . _n( 'item', 'items', count( $the_order['items'] ), 'pqc' ); ?></p>
                    </td>
                    
                    <td class="ship-to">
                        <p><?php echo $the_order['ship_to']; ?></p>
                        <p><?php echo 'Via ' . $the_order['payment_method']; ?></p>
                    </td>
                    
                    <td class="total"><p><?php echo pqc_money_format( $the_order['total'], $the_order['currency'], true, $the_order['currency_pos'] ); ?></p></td>
                    
                    <td class="date"><p><?php echo pqc_time_difference( $the_order['date'], current_time( 'mysql' ) ); ?></p></td>
                    
                </tr>
                <?php $i++; endforeach; ?>
                <?php else : ?>
                <tr><td><?php _e( 'No Order Found', 'pqc' ); ?></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <div class="paginate">
            <?php echo pqc_orders_pagination( $per_page, $page, null, get_permalink( pqc_page_exists( 'pqc-orders' ) ) ); ?>
        </div>
    
    </div>
    
    <?php endif; ?>

</div><!-- /container -->