<?php


  /**
   *  this file is included to display admin dashboard page 
   *
   * @since    1.0.0
   */	
  global $wpdb;

  $ciwcamp_affiliates_query = "SELECT COUNT(*) AS total_affiliates FROM " . $wpdb->prefix . "usermeta WHERE meta_key = %s";
  $ciwcamp_affiliates_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_affiliates_query, "ciwcamp_affiliate_registration" ) ); 
  $ciwcamp_total_affiliates = $ciwcamp_affiliates_data[0]->total_affiliates;

  $ciwcamp_visits_query = "SELECT COUNT(*) AS total_visits FROM " . $wpdb->prefix . "ciwcamp_visits";
  $ciwcamp_visits_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_visits_query ) ); 
  $ciwcamp_total_visits = $ciwcamp_visits_data[0]->total_visits;

  $ciwcamp_sales_query = "SELECT COUNT(*) AS total_sales FROM " . $wpdb->prefix . "ciwcamp_sales";
  $ciwcamp_sales_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_sales_query ) ); 
  $ciwcamp_total_sales = $ciwcamp_sales_data[0]->total_sales;

  $ciwcamp_commission_query = "SELECT SUM(commission) AS total_commission FROM " . $wpdb->prefix . "ciwcamp_sales WHERE product_id!=%s";
  $ciwcamp_commission_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_commission_query,"" ) ); 
  $ciwcamp_total_commission = $ciwcamp_commission_data[0]->total_commission;

  $ciwcamp_top_affiliates_query = "SELECT affiliate_id, count(sales_id) as total_sale, SUM(commission) as commission FROM " . $wpdb->prefix . "ciwcamp_sales  WHERE status = %s AND MONTH(created_date) = MONTH(CURRENT_DATE()) GROUP BY affiliate_id ORDER BY total_sale DESC LIMIT 5";
  $ciwcamp_top_affiliates_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_top_affiliates_query,"Approved" ) ); 

  $ciwcamp_top_product_query = "SELECT product_id, count(product_id) as product_count, SUM(product_price) as product_price, SUM(commission) as commission  FROM " . $wpdb->prefix . "ciwcamp_sales WHERE product_id!=%s GROUP BY product_id ORDER BY count(product_id) DESC LIMIT 5";
  $ciwcamp_top_product_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_top_product_query, "" ) ); 

  $ciwcamp_recent_sale_query = "select * from " . $wpdb->prefix . "ciwcamp_sales order by sales_id DESC limit 5";
  $ciwcamp_recent_sale_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_recent_sale_query ) ); 

  function ciwcamp_total_visits($ciwcamp_affiliate_id)
  {

    global $wpdb;
    $ciwcamp_query = "SELECT COUNT(*) AS total_visits FROM " . $wpdb->prefix . "ciwcamp_visits WHERE affiliate_id =%s";
    $ciwcamp_query_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_query, $ciwcamp_affiliate_id ) ); 

    return $ciwcamp_query_data[0]->total_visits;
  }  
?>
<div class="card-deck mt-n4">
  <div class="card text-blue mb-3 info-color">
    <a class="ciwcamp-taffiliate">
    <span class="dashicons dashicons-buddicons-buddypress-logo text-white"></span></a>
    <p class="font-weight-bold ml-20"><?php esc_html_e( 'Total Affiliates','ciwcamp-affliate-manager' ); ?> 
    <?php esc_html_e($ciwcamp_total_affiliates,'ciwcamp-affliate-manager'); ?></p>
  </div>
  <div class="card text-blue mb-3 success-color">
    <a class="ciwcamp-taffiliate">
    <span class="dashicons dashicons-cover-image text-white"></span></a>
    <p class="font-weight-bold mx-auto"><?php esc_html_e( 'Total Visits','ciwcamp-affliate-manager' ); ?>
    <?php esc_html_e($ciwcamp_total_visits,'ciwcamp-affliate-manager'); ?></p>
  </div>
  <div class="card text-blue mb-3 warning-color">
    <a class="ciwcamp-taffiliate">
    <span class="dashicons dashicons-chart-area text-white"></span></a>
    <p class="font-weight-bold mx-auto"><?php esc_html_e( 'Total Sales','ciwcamp-affliate-manager' ); ?>
    <?php esc_html_e($ciwcamp_total_sales,'ciwcamp-affliate-manager'); ?></p>
  </div>
  <div class="card text-blue mb-3 danger-color">
    <a class="ciwcamp-taffiliate">
    <span class="dashicons dashicons-archive text-white"></span></a>
    <p class="font-weight-bold ml-20"><?php esc_html_e( 'Commissions','ciwcamp-affliate-manager' ); ?>
    <span class="mx-auto"><?php get_woocommerce_currency_symbol()." ".esc_html_e(round($ciwcamp_total_commission, 4),'ciwcamp-affliate-manager'); ?></span></p>
  </div>
</div>

  <div class="z-depth-1 mt-4  pt-3 pl-3 px-3 py-2" > 
    <h6 class="font-weight-bold mx-auto"><?php esc_html_e( 'Visits & Conversions','ciwcamp-affliate-manager' ); ?></h6>
    <canvas id="ciwcamp-visit-conversion"></canvas>
  </div>

  <div class="z-depth-1 mt-4  pt-3 pl-3 px-3 py-2" > 
    <h6 class="font-weight-bold mx-auto"><?php esc_html_e( 'Sales & Commissions','ciwcamp-affliate-manager' ); ?></h6>
    <canvas id="ciwcamp-sale-commission"></canvas>
  </div>

<div class="z-depth-1 mt-4  pt-3 pl-3 px-3 py-2" > 
    <h5 class="font-weight-bold mx-auto pl-4 pt-3"><?php esc_html_e( 'Affiliates','ciwcamp-affliate-manager' ); ?></h5>
    <canvas id="ciwcamp-registered-affiliate" class="px-2 p-3"></canvas>
</div>

<div class="z-depth-1 mt-4  pt-3 pl-3 px-3 py-2" >
  <h6 class="font-weight-bold text-center"><?php esc_html_e( 'Top 5 Affiliates of the month','ciwcamp-affliate-manager' ); ?></h6>
  <table class="table text-center">
    <thead class="text-white ciwcamp-secondary-color">
      <tr>
        <th><?php esc_html_e( 'Affiliate','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Sales','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Commissions','ciwcamp-affliate-manager' ); ?></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($ciwcamp_top_affiliates_data as $ciwcamp_affiliates) { 
        $ciwcamp_affiliate_name = get_user_meta($ciwcamp_affiliates->affiliate_id, "first_name")[0]." ".get_user_meta($ciwcamp_affiliates->affiliate_id, "last_name")[0];
        $ciwcamp_total_visits = ciwcamp_total_visits($ciwcamp_affiliates->affiliate_id);
      ?>
      <tr>
        <td class="text-left"><?php esc_html_e( "#".$ciwcamp_affiliates->affiliate_id." ".$ciwcamp_affiliate_name, 'ciwcamp-affliate-manager'); ?></td>
        <td><?php esc_html_e($ciwcamp_affiliates->total_sale,'ciwcamp-affliate-manager'); ?></td>
        <td><?php esc_html_e(get_woocommerce_currency_symbol()." ".round($ciwcamp_affiliates->commission, 4),'ciwcamp-affliate-manager'); ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<div class="z-depth-1 mt-4  pt-3 pl-3 px-3 py-2" >
  <h6 class="font-weight-bold text-center"><?php esc_html_e( 'Recent Sales','ciwcamp-affliate-manager' ); ?> </h6>
  <table class="table  text-center">
    <thead class="text-white ciwcamp-secondary-color">
      <tr>
        <th><?php esc_html_e( 'Order ID','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Affiliate','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Commission','ciwcamp-affliate-manager' ); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($ciwcamp_recent_sale_data as $ciwcamp_recent_sale) {  
          $ciwcamp_affiliate_name = get_user_meta($ciwcamp_recent_sale->affiliate_id, "first_name")[0]." ".get_user_meta($ciwcamp_recent_sale->affiliate_id, "last_name")[0];
          ?>
        <tr>
          <td class="text-left"><?php esc_html_e("#".$ciwcamp_recent_sale->sales_id,'ciwcamp-affliate-manager' ); ?></td>
          <td class="text-left"><?php esc_html_e("#".$ciwcamp_recent_sale->affiliate_id." ".$ciwcamp_affiliate_name,'ciwcamp-affliate-manager' ); ?></td>
          <td><?php esc_html_e($ciwcamp_recent_sale->commission,'ciwcamp-affliate-manager' ); ?></td>
        </tr>
      <?php } ?>
      </tbody>
  </table>
</div>

<div class="z-depth-1 mt-4  pt-3 pl-3 px-3 py-2" >
  <h6 class="font-weight-bold text-center"><?php esc_html_e( 'Top 5 Products ','ciwcamp-affliate-manager' ); ?></h6>
  <table class="table  text-center">
    <thead class="text-white ciwcamp-secondary-color">
      <tr>
        <th><?php esc_html_e( 'Product ID','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Product Name','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Sale Qty.','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Earning','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Commissions','ciwcamp-affliate-manager' ); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($ciwcamp_top_product_data as $ciwcamp_top_product) {  
          ?>
        <tr>
          <td class="text-left"><?php esc_html_e("#".$ciwcamp_top_product->product_id); ?></td>
          <td><?php esc_html_e(get_the_title( $ciwcamp_top_product->product_id ),'ciwcamp-affliate-manager' ); ?></td>
          <td><?php esc_html_e($ciwcamp_top_product->product_count,'ciwcamp-affliate-manager' ); ?></td>
          <td><?php esc_html_e($ciwcamp_top_product->product_price,'ciwcamp-affliate-manager' ); ?></td>
          <td><?php esc_html_e($ciwcamp_top_product->commission,'ciwcamp-affliate-manager' ); ?></td>
        </tr>
      <?php } ?>
      </tbody>
  </table>
</div>




