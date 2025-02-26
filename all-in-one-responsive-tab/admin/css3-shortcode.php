<?php

// Register Shortcode
function aio_responsive_tab_style1_shortcode($atts, $content = null){
	extract( shortcode_atts( array(
	
		'category' => '',
		
	), $atts) );
	

		$q = new WP_Query(
        array('posts_per_page' => -1, 'post_type' => 'aio_tab', 'aiotab_cat' => $category)
        );
		
		while($q->have_posts()) : $q->the_post();
		$id = get_the_ID();
	 
	$style1_options = vp_metabox('aio-meta.style1_option', false);	
	
	// Setting Panel
	$tab_layout = vp_metabox('aio-meta.style1_tab_settings.0.tab_layout', false);
	$tab_animation = vp_metabox('aio-meta.style1_tab_settings.0.tab_animation', false);
	$style1_css = vp_metabox('aio-meta.style1_tab_settings.0.style1_css', false);
	$tab_style = vp_metabox('aio-meta.style1_tab_settings.0.tab_style', false);
	

		$output = '
			<!-- tabs -->
			<div class="aio-tabs aio-tabs-pos-'.$tab_layout.' aio-tabs-anim-'.$tab_animation.' aio-tabs-response-to-icons">

		<style type="text/css">
		'.$style1_css.'
					.aio-tabs > label {
			background: #b9c9ca none repeat scroll 0 0;
			}
			.aio-tabs > ul {
			border-top: 4px solid '.$tab_style.';	
			}
			.aio-tabs > input:checked + label span span {
				background: '.$tab_style.';
				color: #fff;
			}
			.aio-tabs > label:hover span span {
				background: '.$tab_style.';
				color: #fff;	
			}
		</style>
		';

		foreach ($style1_options as $style1_option) {
		$output .='
			<input type="radio" name="aio-tabs" '.$style1_option['highlight_first'].' id="aio-tab'.$style1_option['tab_id'].'" class="aio-tab-content-'.$style1_option['tab_id'].'">
			<label for="aio-tab'.$style1_option['tab_id'].'"><span><span><i class="fa '.$style1_option['menu_icon'].'"></i>'.$style1_option['menuname_title'].'</span></span></label>
		';
		}
		$output.='
		<ul>
		';

		foreach ($style1_options as $style1_option) {
		$output .= '
				<li class="aio-tab-content-'.$style1_option['tab_id'].'">					
						<div class="typography">
							<h1>'.$style1_option['tab_title'].'</h1>
							<p>'.$style1_option['tab_description'].'</p>
						</div>
				</li>
		
				';			
		//$i++;
	}


		$output .='</ul></div>';	
	endwhile;
	wp_reset_query();
	return $output;
}
add_shortcode('aio_style1', 'aio_responsive_tab_style1_shortcode');	

?>