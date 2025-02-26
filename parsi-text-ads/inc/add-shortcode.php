<?php
function display_text_ads_shortcode() {


	$out= '';
	wp_reset_postdata();
	wp_reset_query();
	$the_query = new WP_Query( 'post_type=text_ads' );
	if ($the_query->have_posts()) {
		$out .= '<div class="parsi-ads">';
	$out .= '<div class="parsi-ads-title">'; $out .= __('Your ADS Here','pw-spe') ; $out .= '</div>';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$text_ads_link = get_post_meta(get_the_ID(), 'text_ads-link', true);
			$text_url = get_post_meta(get_the_ID(), 'text_url', true);
			$text_ads_des  = get_post_meta(get_the_ID(), 'text_ads-des', true);
			$dropdown_value = get_post_meta(get_the_ID(), 'rangha', true);
			$link_rel = get_post_meta(get_the_ID(), 'link_rel', true);
			$link_target = get_post_meta(get_the_ID(), 'link_target', true);

			$out .= '
			<a target="'.$link_target.'" rel="'.$link_rel.'" href="http://' . $text_ads_link . '/" title="' . get_the_title() . '">
			<ul class="'.$dropdown_value.'">
			<li class="text_ads-name">' . get_the_title() . '</li>
			<li class="text_ads-desc">' . $text_ads_des . '</li>
			<li class="text_ads-adre">' . $text_url . '</li>
				</ul>
			</a>
			';
		}
	} else {
		$out .= '
		<p>
		'._e('You have not created an ad to display.','pw-spe').'
		</p>
		';
	}
	$out .= '</div>';
	return $out;
	wp_reset_postdata();
	wp_reset_query();

}
add_shortcode('parsi_text_ads', 'display_text_ads_shortcode');
?>
