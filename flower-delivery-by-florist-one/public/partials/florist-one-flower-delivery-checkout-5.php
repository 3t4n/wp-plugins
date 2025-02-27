<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<h3><?php echo esc_html( 'Thank You for Your Order', 'flower-delivery-by-florist-one' ); ?></h3>


<p style="font-size: 24px; margin-top: 40px; margin-bottom: 80px;">Your order number is is <?php echo esc_html($orderno)?></p>

<?php

  $dont_show_remove_button = 1;
  include 'florist-one-flower-delivery-cart-body.php'; 
  clearCart(); 
  
?>  

<script> 
  jQuery(document).ready(function() {
  var uri = window.location.toString();
    if (uri.indexOf("?") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clean_uri);
        jQuery("#florist-one-cart-count").text(0);
    }
  });
</script>







