<?php

/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<div class="card mb-4 bg-light border-0">
  <div class="card-body py-0">
    <ul class="list-group  list-group-flush ms-0">
      <li class="list-group-item bg-light d-flex py-4 px-0">
        <small><?php esc_html_e( 'Subtotal', 'flower-delivery-by-florist-one' );?></small><small class="ms-auto">$<?php echo (isset($get_total_response_body['SUBTOTAL']))? number_format(esc_html($get_total_response_body['SUBTOTAL']), 2) : 0 ?></small>
      </li>
      <li class="list-group-item bg-light d-flex py-4 px-0">
        <small><?php esc_html_e( 'Service Charge', 'flower-delivery-by-florist-one' );?></small><small class="ms-auto">$<?php echo (isset($get_total_response_body['FLORISTONESERVICECHARGE']))? number_format(esc_html($get_total_response_body['FLORISTONESERVICECHARGE']), 2) : 0 ?></small>
      </li>
      <li class="list-group-item bg-light d-flex py-4 px-0">
        <small><?php esc_html_e( 'Sales Tax', 'flower-delivery-by-florist-one' );?></small><small class="ms-auto">$<?php echo (isset($get_total_response_body['TAXTOTAL']))?number_format(esc_html($get_total_response_body['TAXTOTAL']), 2) : 0 ?></small>
      </li>
      <li class="list-group-item bg-light d-flex py-4 px-0 fw-bold fs-6">
        <span><?php esc_html_e( 'Total', 'flower-delivery-by-florist-one' );?></span><span class="ms-auto">$<?php echo (isset($get_total_response_body['ORDERTOTAL']))? number_format(esc_html($get_total_response_body['ORDERTOTAL']), 2) : 0 ?></span>
      </li>
    </ul>
  </div>
</div>
