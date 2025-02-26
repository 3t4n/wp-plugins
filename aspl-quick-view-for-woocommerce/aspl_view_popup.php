<?php 
if ( ! defined( 'ABSPATH' ) ) 
{
	exit;
}
?>
<div class="quick_view_main">
	<?php 
	global $product;
	?>
	<input type="hidden" name="aspl_product_id" class="aspl_product_qview_id">
	<span class='aspl_quick_view_button button button-primary' style="background-color: <?php _e(get_option('aspl_qview_button_back_color')); ?>; color:<?php _e(get_option('aspl_qview_button_text_color')); ?>;"><?php _e(get_option('aspl_qview_button_text')); ?></span>

	<div class="quick_popup_body" style="display:none;" >
		<div class="modal-content req_popup_parent">
			<div class="quick_popup_body-content">
				
				<span class="aspl_quick_view_cancel_btn" style="font-size:40px; float: right;">&times</span>

				<div class="quick_popup_body_image">
					<img src="<?php _e(esc_url(wp_get_attachment_url( $product->get_image_id() ))); ?>" class="aspl_qv_main_img" />
					<div class="aspl_quick_view_fature_img">
						<img src="<?php _e(esc_url(wp_get_attachment_url( $product->get_image_id() ))); ?>" class="aspl_qv_main_img" />
					</div>
					<?php 
						$gallery_images = $product->get_gallery_image_ids();
						foreach ($gallery_images as $key => $value) {
							?>
							<div class="aspl_quick_view_fature_img">
								<img src="<?php _e(esc_url($Original_image_url = wp_get_attachment_url( $value ))); ?>" class="aspl_qv_fature_image" />
							</div>
							<?php
						}
					?>
				</div>

				
				<div class="quick_popup_body_contant">
					<div>
						<?php 

							if( $product->is_type( 'variable' )) {
	
								$attribute_keys = array_keys( $product->get_variation_attributes() );
								?>	
								<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php _e(esc_attr(absint( $product->get_id() ))); ?>" data-product_variations="<?php _e(htmlspecialchars( json_encode( $product->get_available_variations() ) )) ?>">
									<?php 
										do_action('aspl_qview_product_data');
									 ?>
								</form>
								<?php
							} else {
								do_action('aspl_qview_product_data');
							}
						 ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>