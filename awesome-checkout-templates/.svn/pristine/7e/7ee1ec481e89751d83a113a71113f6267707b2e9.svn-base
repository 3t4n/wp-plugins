<!-- layout Product section start-->
<div class="tab-pane <?php if(esc_html($tab) == "wacout_product"){echo "active";}?>" id="wacout_metabox_side_tab4">
	<div class="wacout_layout_stng_sidebar">
		<ul class="nav wacout_stng_nav">
			<li><a href="#wacout_metabox_layout_prd_tab1" class="wacout_side_tab active" data-bs-toggle="tab"><?php _e('By default Product' , 'wacout') ;?></a></li>
			<li><a href="#wacout_metabox_layout_prd_tab2" class="wacout_side_tab" data-bs-toggle="tab"><?php _e('Related Products' , 'wacout') ;?></a></li>

		</ul>
	</div>
	<div class="wacout_layout_stng_cntnt">
		<!-- start general setting-->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="wacout_metabox_layout_prd_tab1">
				<div class="tabpane_inner">
					<?php


					   if(isset($temp_layout_more_product['wacout_bdpc_id']) && !empty($temp_layout_more_product['wacout_bdpc_id'])){
						   $wacout_bdpc_id = sanitize_text_field($temp_layout_more_product['wacout_bdpc_id']);
					   } else{ $wacout_bdpc_id = ""; }

					?>
					<div class="wacout_bdpc_wrap">
						<div class="wacout_bdpc_group mb_20">
							<div class="wacout_bdpc_in">
								<div class="wacout_bdpc_lbl"><?php _e('Product' , 'wacout') ;?></div>
								<select name="wacout_more_prd[wacout_bdpc_id]" class="wacout_product_search" multiple="multiple" data-placeholder="<?php esc_attr_e( 'Search for a product', 'wacout' ); ?>">
									<?php
								   if(is_array($wacout_bdpc_id)){
									   foreach ($wacout_bdpc_id as $key => $id) {
										   $product_name =  esc_html(get_the_title($id));
										   $html = '<option value="'.esc_attr($id). '" selected="selected">'.$product_name.'(#'.esc_html($id).')'.'</option>';
										   echo $html;
									   }
								   }
								   else{
									   $id = $wacout_bdpc_id ;
									   $product_name =  esc_html(get_the_title($id));
									   $html = '<option value="'.esc_attr($id). '" selected="selected">'.$product_name.'(#'.esc_html($id).')'.'</option>';
									   echo $html;
								   }
									?>
								</select>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="wacout_metabox_layout_prd_tab2">
				<div class="tabpane_inner">
					<?php

					   if(isset($temp_layout_more_product['wacout_more_prd_add_count']) && !empty($temp_layout_more_product['wacout_more_prd_add_count'])){
						   $wacout_more_prd_add_count = $temp_layout_more_product['wacout_more_prd_add_count'];
					   } else{ $wacout_more_prd_add_count = "0"; }


					?>
					<div class="wacout_more_prd_wrap">
						<div class="wacout_more_prd_hd">
							<a class="wacout_more_prd_add_button"><?php _e('+ Add New' , 'wacout') ;?></a>
							<input type="hidden" name="wacout_more_prd[wacout_more_prd_add_count]" id="wacout_more_prd_add_count" value="<?php echo $wacout_more_prd_add_count; ?>">
						</div>
						<?php
						   for ($y = 0; $y <= $wacout_more_prd_add_count; $y++) {

							   if(isset($temp_layout_more_product['wacout_more_prd_id'][$y]) && !empty($temp_layout_more_product['wacout_more_prd_id'][$y])){
								   $wacout_more_prd_id = sanitize_text_field($temp_layout_more_product['wacout_more_prd_id'][$y]);
							   } else{$wacout_more_prd_id = "";}

							   if(isset($temp_layout_more_product['wacout_more_prd_des'][$y]) && !empty($temp_layout_more_product['wacout_more_prd_des'][$y])){
								   $wacout_more_prd_des = wp_kses_post($temp_layout_more_product['wacout_more_prd_des'][$y]);
							   } else{ $wacout_more_prd_des = ""; }

							   if(isset($temp_layout_more_product['wacout_more_prd_btn'][$y]) && !empty($temp_layout_more_product['wacout_more_prd_btn'][$y])){
								   $wacout_more_prd_btn = sanitize_text_field($temp_layout_more_product['wacout_more_prd_btn'][$y]);
							   } else{ $wacout_more_prd_btn = ""; }

						?>

						<div class="wacout_more_prd_single">
							<div class="wacout_more_prd_remove">X</div>

							<div class="wacout_more_prd_group mb_20">
								<div class="wacout_more_prd_in">
									<div class="wacout_more_prd_lbl"><?php _e('Product' , 'wacout') ;?></div>
									<select name="wacout_more_prd[wacout_more_prd_id][]" class="wacout_product_search" multiple="multiple" data-placeholder="<?php _e( 'Search for a product', 'wacout' ); ?>">
										<?php
									   if(is_array($wacout_more_prd_id)){
										   foreach ($wacout_more_prd_id as $key => $id) {
												 $product_name =  esc_html(get_the_title($id));
											   $html = '<option value="'.esc_attr($id). '" selected="selected">'.$product_name.'(#'.esc_html($id).')'.'</option>';
											   echo $html;
										   }
									   }
									   else{
										   $id = $wacout_more_prd_id ;
											 $product_name =  esc_html(get_the_title($id));
										   $html = '<option value="'.esc_attr($id). '" selected="selected">'.$product_name.'(#'.esc_html($id).')'.'</option>';
										   echo $html;
									   }
										?>
									</select>
								</div>
							</div>
							<div class="wacout_more_prd_group mb_20">
								<div class="wacout_more_prd_in">
									<div class="wacout_more_prd_lbl"><?php _e('Description' , 'wacout') ;?></div>
									<textarea class="wacout_more_prd_ctrl" name="wacout_more_prd[wacout_more_prd_des][]"><?php echo wp_kses_post($wacout_more_prd_des);?></textarea>
								</div>
							</div>

							<div class="wacout_more_prd_group">
								<div class="wacout_more_prd_in">
									<div class="wacout_more_prd_lbl"><?php _e('Button Text' , 'wacout') ;?></div>
									<input class="wacout_more_prd_ctrl" type="text" name="wacout_more_prd[wacout_more_prd_btn][]" value="<?php echo esc_attr($wacout_more_prd_btn);?>">
								</div>
							</div>

						</div>

						<?php }

						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear test1234"></div>
	<?php  wp_nonce_field( 'post_save_wpnonce','save-post-nonce-field' );?>
</div>
<!-- layout Product section end-->