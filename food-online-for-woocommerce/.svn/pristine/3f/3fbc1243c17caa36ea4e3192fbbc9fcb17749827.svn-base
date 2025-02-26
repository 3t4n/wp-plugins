<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}
$show_right = get_option('fdoe_hide_minicart', 'no') == 'yes' && (get_option('fdoe_enable_delivery_switcher','no') == 'no' ||
										(get_option('fdoe_enable_delivery_switcher','no') != 'no' && get_option('fdoe_top_bar','no') == 'yes') ||
										get_option('fdoe_enable_delivery_switcher','no') == 'only_pickup' ||
										get_option('fdoe_is_prem', 'no') == 'no'
										) ? false :true;
 $original_link = wc_get_checkout_url();


?>
</div>
</div>
</div>
<div class="fdoe_extra_checkout" style="display:none">

<?php


	if(!$show_right && get_option('fdoe_top_bar','no') == 'no') {
		do_action('fdoe_loop_end_3');
	}
    echo '<a href="' . esc_url( $original_link ) . '" class="button checkout from_menu" id="checkout_button_1">' . esc_html__( 'Go to Checkout', 'food-online-for-woocommerce' ) . '</a>';

?> </div>



			<?php
			if ($show_right){

				do_action('fdoe_output_rightbar');

				if(get_option('fdoe_loading_overlay','no') == 'yes'){
					echo fdoe_output_rightbar_pre();
				}
			}
			?>

			</div>

		</div>

	</div>

</div>



<script>

	// Collect the looped products into a javascript array

	var Food_Online_Items = <?php echo json_encode(Food_Online::instance()->loop->get_loop_items()) ?>;



</script>

<?php do_action('fdoe_loop_end_2'); ?>
