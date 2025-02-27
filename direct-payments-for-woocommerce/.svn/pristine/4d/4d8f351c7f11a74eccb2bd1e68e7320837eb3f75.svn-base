<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
?>
<div class="tumaz-direct-container">
<div class="d-sm-none">

    <?php if (!empty($orders)) : ?>
        <?php foreach ($orders as $order) : ?>
            
            <?php
              $customer_name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
        ?>
            <div class="status-<?php echo esc_attr(str_replace('wc-', '', $order->post_status)); ?>"> 

                <div class="container text-start tumazrebgor">
                    <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">

                        <div class="colt"> 
                            <div class="rowt">  

                                <div class="colt-1t position-relative">  
                                    <span class="position-absolute top-50 start-50 translate-middle">
                                        <?php echo '<i class="bi bi-clock-fill ' . esc_attr($order->status) . '"></i>'; ?> 
                                    </span>
                                </div>

                                <div class="colt-11">
                                    <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">  

                                        <div class="colt">
                                            <span><?php echo esc_html(ucwords(str_replace('wc-', '', $order->payment_method_title))); ?></span>
                                            &nbsp;&nbsp;| &nbsp;&nbsp;<span class="ordat">Amount: </span>
                                            <span class="ordat2"> <?php echo wp_kses_post( wc_price( $order->get_total() ) ); ?></span>
                                        </div>
                                        <div class="colt">
                                            <a href="<?php echo esc_url(admin_url('admin.php?page=wc-orders&action=edit&id=' . esc_attr($order_id))); ?>">
                                                # <?php echo esc_html($order->id); ?> <?php echo esc_html($customer_name); ?>
                                            </a>
                                        </div>
                                        
                                    </div> 
                                </div>
                            </div> 
                        </div> 

                    </div>
                </div>

                <div class="container text-center tebgor">
                    <div class="rowt">
                        <div class="colt-1t">
                            <input type="checkbox" name="post[]" value="<?php echo esc_attr($order->id); ?>">
                        </div>
                        <div class="colt-7">
                            <span class="ordat"> 
                            <?php
$date_created = $order->get_date_created(); // Get the date created object.
if ($date_created) {
    $date = $date_created->date('Y-m-d H:i:s'); // Get the date in a usable format.
    $date_obj = new DateTime($date); // Convert to a DateTime object.
    
    // Current timestamp.
    $current_date = new DateTime();
    $is_today = $date_obj->format('Y-m-d') === $current_date->format('Y-m-d');

    // Format: "Today, 2:09pm - 09/10/24, 8:56pm".
    $formatted_date = sprintf(
        '%s, %s',
        $is_today ? 'Today' : $date_obj->format('d/m/y'),
        $date_obj->format('g:iA')
    );

    echo esc_html($formatted_date);
}
?>
</span> 
                        </div>
                        <div class="colt-4">
                            <button type="button" class="mtwov view-order" data-bs-toggle="digages_popup" data-bs-target="#orderDetailsModal" data-order-id="<?php echo esc_attr($order->id); ?>">
                                <span class="dashicons dashicons-visibility"></span> View
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else : ?>
        <div class="container text-center tumazrebgor">
            <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                <div class="colt">NNo payments found</div>
            </div>
        </div>
    <?php endif; ?>


    
</div> 
</div> 