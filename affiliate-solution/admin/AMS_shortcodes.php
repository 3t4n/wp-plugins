<?php
add_action( 'init', 'ESSITCO_AMS_register_shortcodes' );

function ESSITCO_AMS_register_shortcodes(){
    add_shortcode( 'AMS-offer', 'ESSITCO_AMS_offer_shortcodes' );
}

function ESSITCO_AMS_offer_shortcodes($atts){
	$atts = shortcode_atts( array('offer_id' => ''), $atts );
	$offer_id = $atts['offer_id'];
	$args = array(
		'post_type' => 'offer'
	);
	if($offer_id){
		$args['p'] = (int)$offer_id;
	}
	
	$offers = new WP_Query( $args );

	while($offers->have_posts()) : $offers->the_post(); 	
			$post_id = get_the_ID();
			$offer_type = get_post_meta($post_id, "offer_type", true);
			if($offer_type == "deal"){
				$link = get_post_meta($post_id, "deal_affiliate_link", true);
			}elseif($offer_type == "coupon"){
				$coupon_type = get_post_meta($post_id, "coupon_type", true);
				if($coupon_type == "code"){
					$link = get_post_meta($post_id, "coupon_store_link_with_code", true);
					$code = get_post_meta($post_id, "coupon_code", true);
				}else{
					$link = get_post_meta($post_id, "coupon_sale_link", true);
				}
			}
			$trackingurl = $link == "" ? "#" : $link;
			$offer_store_id = get_post_meta($post_id, "store", true);

			$offer_expire_date = get_post_meta($post_id, "offer_expire_date", true);
			$offer_categories_name = get_the_terms($post_id, "offer_category");
			if(!empty($offer_categories_name)){
				foreach($offer_categories_name as $off_cat){
					$categories_str .= $off_cat->name.", ";
				}
			}
		?>
		<div class="deal-list v-offset-2">
			<div class="deal-list-item">
				<div class="deal-content deal-title">
					<a href="<?php echo $trackingurl; ?>" target="_blank" class="show-code"><?php the_title(); ?></a>
					<div class="deal-cash-back"></div>
					<div class="coupon-custom-code"></div>
					<div class="deal-code">
						<span class="red-meta">Expires in: </span><?php echo date("F j, Y", strtotime($offer_expire_date)) ?>
						<?php if($offer_type == "deal"){ ?> <span class="red-meta">Price: </span>$<?php echo get_post_meta($post_id, "deal_store_sale_price", true); ?> <?php } ?>
						<?php if(isset($code)){ ?> <span class="red-meta">Coupon: </span><span class="AMS-coupon"><?php echo $code; ?></span> <?php } ?>
						<?php if(isset($categories_str)){ ?> <span class="red-meta">Categories: </span><?php echo rtrim($categories_str,', '); ?><?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php unset($code);unset($categories_str); endwhile;
}
?>