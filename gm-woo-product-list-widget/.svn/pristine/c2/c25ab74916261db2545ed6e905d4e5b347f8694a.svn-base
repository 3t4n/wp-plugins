<?php

class GMWPLW_Comman {
	
	public function __construct () {

				

    }


}

function GMWPLW_returndata($post_id){

	$gmwplw_select_type = get_post_meta( $post_id,'gmwplw_select_type', true);
	if (empty($gmwplw_select_type)) {
		$gmwplw_select_type = 'all';
	}
	$gmwplw_select_tax_val = get_post_meta( $post_id,'gmwplw_select_tax_val', true);
   	$gmwplw_product_show = get_post_meta( $post_id,'gmwplw_product_show', true);
   	if (empty($gmwplw_product_show)) {
		$gmwplw_product_show = 5;
	}
	$gmwplw_show_per_column = get_post_meta( $post_id,'gmwplw_show_per_column', true);
   	if (empty($gmwplw_show_per_column)) {
		$gmwplw_show_per_column = 3;
	}
   	$gmwplw_thum = get_post_meta( $post_id,'gmwplw_thum', true);
   	if (empty($gmwplw_thum)) {
		$gmwplw_thum = 'yes';
	}
   	$gmwplw_order_by = get_post_meta( $post_id,'gmwplw_order_by', true);
   	if (empty($gmwplw_order_by)) {
		$gmwplw_order_by = 'ASC';
	}
   	$gmwplw_order = get_post_meta( $post_id,'gmwplw_order', true);
   	if (empty($gmwplw_order)) {
		$gmwplw_order = 'name';
	}
	$gmwplw_layout = get_post_meta( $post_id,'gmwplw_layout', true);
   	if (empty($gmwplw_layout)) {
		$gmwplw_layout = 'list';
	}
	$arr_make = array('all','featured','sale');
	$caclass='productsbycat_'.$gmwplw_layout;
	$arggs = array(
		'post_type' => 'product',
		);
	$arggs['posts_per_page'] = $gmwplw_product_show;
	$arggs['orderby'] = $gmwplw_order_by;
	$arggs['order'] = $gmwplw_order;
	
	if(isset($gmwplw_order_by) && $gmwplw_order_by=='total_sales'){
		$arggs['orderby']='meta_value_num';
		$arggs['meta_key']='total_sales';
	}
	if (!in_array($gmwplw_select_type, $arr_make) && $gmwplw_select_tax_val!=''){
		$tacar = array(
								        'taxonomy'      => $gmwplw_select_type,
								        'field'         => 'term_id', 
								        'terms'         => $gmwplw_select_tax_val,
								        'operator'		=> '='
							   		 );
		$arggs['tax_query'] = array(
				                $tacar
				            );
	}
	if(isset($gmwplw_select_type) &&  $gmwplw_select_type=='featured'){
		$arggs['tax_query'] = array(
				                array(
				                    'taxonomy' => 'product_visibility',
				                    'field'    => 'name',
				                    'terms'    => 'featured',
				                ),
				            );
	}
	if(isset($gmwplw_select_type) &&  $gmwplw_select_type=='bestsellers'){
		$arggs['meta_query'] = array(
				                array(
				                    'taxonomy' => 'product_visibility',
				                    'field'    => 'name',
				                    'terms'    => 'featured',
				                ),
				            );
	}
	?>
	<div class=" woocommerce  <?php echo esc_attr($caclass); ?>">
		<?php
		$loop = new WP_Query($arggs);
		while ($loop->have_posts()):
		$loop->the_post();
		global $product; 
		$producta = wc_get_product( $loop->post->ID );
		?>
		<div class="gmwplw-product">
			<a href="<?php	echo esc_attr(get_permalink($loop->post->ID)) ?>" title="<?php	echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID) ?>">
				<div class="gmwplw-innder">
					<?php
					if (isset($gmwplw_thum) && $gmwplw_thum == 'yes') {
						$isthem = get_the_post_thumbnail_url($loop->post->ID, 'thumbnail');
						if ($isthem!='') {
							?>
							<div class="lefmss"><img src="<?php echo esc_attr($isthem); ?>" alt="Placeholder"/></div>
							<?php
							} else { 
							?>
							<div class="lefmss"><img src="<?php echo esc_attr(wc_placeholder_img_src('thumbnail')) ?>" alt="Placeholder"  /></div>
							<?php 
							}
						}
						$averagea = $producta->get_average_rating();
					?>
					<div class="rightss">
					<div class="gmwproduct-title"><?php echo esc_attr($loop->post->post_title);	?></div>
					<?php
					if($averagea!=0){
					?>
					<div class="gmproduct-rating"><?php echo html_entity_decode(esc_html('<div class="star-rating"><span style="width:'.( ( $averagea / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$averagea.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>'));	?></div>
					<?php
					}
					?>
					<div class="gmproduct-price"><?php echo html_entity_decode(esc_html($producta->get_price_html()));	?></div>

					</div>
			</div>
			</a>
		</div>
		<?php
		endwhile;
		wp_reset_query();
		?>
	</div>
	<style>
		.productsbycat_grid {
			grid-template-columns: repeat(<?php echo $gmwplw_show_per_column;?>, 1fr);
		}
	</style>
    
	<?php
	
}
?>