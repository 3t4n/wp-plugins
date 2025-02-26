<?php
$animation_select = '';
if(isset($category_container_options['animation_select']) && $category_container_options['animation_select'] !='')
{
	$animation_select = esc_attr_e($category_container_options['animation_select']);
}
?>
<div class="col-lg-<?php esc_attr_e($number_of_colom);?> col-md-<?php esc_attr_e($number_of_colom);?> col-sm-12 col-xs-12  animated <?php echo $animation_select; ?>">
	<div class="container py-3">
		<div class="row">
			<div class="col-12 mx-auto category_container_options_style_<?php esc_attr_e($faq_id);?>  animated <?php echo $animation_select; ?>">
				<a href="<?php echo esc_url($category_link);?>">
					<h2 class="category_title_options_font_<?php esc_attr_e($faq_id);?> category_title_options_style_<?php esc_attr_e($faq_id);?>">
                        <?php if($Show_icon_category!=2){?>
							<i class="<?php esc_attr_e($cat_font_awesome_icon);?> category_icon_options_font_<?php esc_attr_e($faq_id);?>  category_icon_options_style_<?php esc_attr_e($faq_id);?>" style="color:<?php esc_attr_e($cat_c_icon_color);?>"></i>
						<?php } ?>
						<?php esc_html_e($cat_title);?>
						<?php if(AFAQCBC_get_category_image($cat_id) != ''){?>
							<div class="col-12 ">
									<img src="<?php echo esc_url(AFAQCBC_get_category_image($cat_id,$number_of_colom));?>" class="img-fluid category_image_collapse_full_global_style category_image_options_style_<?php esc_attr_e($faq_id);?>" />
							</div>
						<?php } ?>
					</h2>
				</a>
			</div>
			<div class="col-12 mx-auto">
                <div class="accordion" id="faqExample<?php esc_attr_e($cat_id);?>">
				