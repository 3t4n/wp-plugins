<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
?>
<div class="tumaz-direct-container">
<div class="d-none d-sm-block"> 
			 <div class='wrap'>
                 
<table class="wp-list-table widefat striped "> 
<thead>
	<tr>
		<td >
		<input type="checkbox" id="select-all" /></td> 
          <th scope="colt">Status</th>
          <th scope="colt">Payment Method</th>
          <th scope="colt"></th>
          <th scope="colt">Amount</th>
          <th scope="colt">Order</th>
          <th scope="colt"></th>
          <th scope="colt">Date</th>  
			</tr>
	</thead>
    <tbody>
        <?php if (!empty($orders)) : ?>
            <?php foreach ($orders as $order) : ?>
              <?php
              $customer_name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
        ?>
                 <tr data-bs-toggle="digages_popup" data-bs-target="#orderDetailsModal" data-customer="<?php echo esc_attr($customer_name); ?>" class="view-order tumaz_hand_pointer" data-order-id="<?php echo esc_attr($order->get_id()); ?>">
              <th><input type="checkbox" name="post[]" value="<?php echo esc_attr( $order->get_id() ); ?>"></th> 
              
              <td>  
                <?php echo '<i class="bi bi-clock-fill '.esc_html($order->status).'"></i>';?> 
                </td> 
              <td><?php echo esc_html(ucwords(str_replace('wc-', '', $order->payment_method_title))); ?></td>
              <td><span>
              <span class="dashicons dashicons-visibility mtwovicn"></span></span></td>
              <td>
                <?php echo wp_kses_post( wc_price( $order->get_total() ) ); ?>
                
            </td>
              <td><a href="<?php echo esc_url(admin_url('admin.php?page=wc-orders&action=edit&id=' . $order->id)); ?>"># <?php echo esc_html($order->id); ?> <?php echo esc_html($customer_name); ?></a></td>
              <td><span>
              <span class="dashicons dashicons-visibility mtwovicn"></span></span></td>

                <td><?php
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
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr><td colspan="8">No payments found</td></tr>
        <?php endif; ?>
    </tbody> 

 
	<tfoot>
	<tr>
		<td>
		<input type="checkbox" id="select-all" /></td>  
          <th scope="colt">Status</th>
          <th scope="colt">Payment Method</th>
          <th scope="colt"></th>
          <th scope="colt">Amount</th>
          <th scope="colt">Order</th>
          <th scope="colt"></th>
          <th scope="colt">Date</th>  
			</tr>
			
	</tfoot>

</table>
</div>
</div>
        </div>