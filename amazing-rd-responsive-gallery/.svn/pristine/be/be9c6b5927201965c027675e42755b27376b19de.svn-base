<?php

// Register Shortcode
function rdgallery_shortcode_function($atts, $content = null){
	extract( shortcode_atts( array(
	
		'category' => '',
		
	), $atts) );
	

		$q = new WP_Query(
        array('posts_per_page' => -1, 'post_type' => 'rdgallery', 'rdgallery_cat' => $category)
        );
		
		while($q->have_posts()) : $q->the_post();
		//$id = get_the_ID();
	 
	$rdgallery_options = vp_metabox('rdgallery-meta.rdgallery_option', false);	
	
	// Style 1
	$gallery_size = vp_metabox('rdgallery-meta.rdgallery_setting.0.gallery_size', false);
	$gird_layout = vp_metabox('rdgallery-meta.rdgallery_setting.0.gird_layout', false);
	$gird_loader = vp_metabox('rdgallery-meta.rdgallery_setting.0.gird_loader', false);
	$hover_effects = vp_metabox('rdgallery-meta.rdgallery_setting.0.hover_effects', false);
	$gallery_margin = vp_metabox('rdgallery-meta.rdgallery_setting.0.gallery_margin', false);
	$custom_css_code = vp_metabox('rdgallery-meta.rdgallery_setting.0.custom_css_code', false);

	$i = 0;

		$output = '
		<style type="text/css">
		'.$custom_css_code.'
		</style>
<div class="rdgallery">
		';
		foreach ($rdgallery_options as $rdgallery_option) {		
		$output .= '
				<figure class="filter-class">
					<img src="'.$rdgallery_option['up_img'].'"/>
					<figcaption>
						<h2>'.$rdgallery_option['wr_title'].'</h2>
						<p class="description">'.$rdgallery_option['wr_desc'].'</p>
					</figcaption>
				</figure>
				';		
		$i++;
	}
		$output .='</div>';

	endwhile;
	$output .='
	<script>
    jQuery(document).ready(function () {
       jQuery(".rdgallery").rdgallery({
		thumbSize: "'.$gallery_size.'",
		gridLayout: "'.$gird_layout.'",
		gridLoader: '.$gird_loader.',
		thumbHoverEffect: "'.$hover_effects.'",
		thumbMargin: '.$gallery_margin.',
		gridAnimation: {
        animationType: "fadeIn",
        animationDuration: 1000,
        offsetTop: 250,
        delay: true,
        timeout: 0,

    }
			});
		});
		</script>
	';
		
	wp_reset_query();
	return $output;
}
add_shortcode('rdgallery', 'rdgallery_shortcode_function');	

?>