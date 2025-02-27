<?php
add_shortcode( 'GPV', 'GPV_shortcode' );
function GPV_shortcode($post)
{
	ob_start();
	$id=$post['id'];
	$show_gallery_posts = array( 'p' => $id, 'post_type' => 'gpv_gallery', 'orderby' => 'ASC');
	$gallery_loop = new WP_Query( $show_gallery_posts );
	while ( $gallery_loop->have_posts() ) : $gallery_loop->the_post();
	if(isset($id)){
		$data_setting = unserialize(get_post_meta($id,'GPV_custom_setting_'.$id, true));
		$GPV_Record = unserialize(base64_decode(get_post_meta( $id, 'GPV_photos_details', true)));
		$TotalImg =  get_post_meta( $id, 'GPV_images_count', true );
		$linkopen= ($data_setting['GPV_setting_link_open']=='Yes')?'_blank':'_self';
		
	}	
	if($data_setting['GPV_setting_lightbox']=="Swipe_Box"){
		$lightboxclass='class="'.$data_setting['GPV_setting_lightbox'].' gpv-link-btn"';
	}			
	?>
	<?php require(GPV_PATH.'include/css_gallery_1.php'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
	<script type="text/javascript">

	WebFont.load({
		google: {families:['<?php echo $data_setting["GPV_setting_font_style"];?>'] 
	}
});
	</script>
	<?php require(GPV_PATH.'/include/gallery_1.php'); ?>

	<script type="text/javascript">
	jQuery(document).ready(function(){
		var section_grid=jQuery('.GPV_my-grid_<?php echo $id;?>');
		var lightbox_obj=section_grid.find('.<?php echo $data_setting["GPV_setting_lightbox"]; ?>');
		var GPV_lightbox='<?php echo $data_setting["GPV_setting_lightbox"]; ?>';		
		section_grid.GPVGRID(
		{				
			column:'<?php echo $data_setting["GPV_setting_column_layout"] ?>',
		});

		if(GPV_lightbox=='Swipe_Box'){

			/* swipebox jquery start*/
			lightbox_obj.swipebox({		
				hideBarsDelay:0,
				hideCloseButtonOnMobile : false,
			});
			/* swipebox jquery end*/
		}
	});
	</script>
	<?php
	endwhile;
	wp_reset_postdata();
	return ob_get_clean();
}
?>