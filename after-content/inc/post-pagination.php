<?php 
/* == PAGINATION ==*/
function afc_post_pagination() {
	
	if (is_single()) {
	
		global $afc_opt;
		
		$prev_format = $afc_opt['prev_format'];
		$prev_link = $afc_opt['prev_link'];
		$next_format = $afc_opt['next_format'];
		$next_link = $afc_opt['next_link'];
		
		if ($afc_opt['link_cat'] == 1) {
			$links_cat = 'true';
		} else {
			$links_cat = 'false';
		};
		
		if ( get_previous_post_link( $prev_format, $prev_link, $links_cat ) or get_next_post_link( $next_format, $next_link, $links_cat )  ) {
			$output = '<nav class="afc-post-links">';
			$output .= '<div class="afc-previous">' .  get_previous_post_link($prev_format, $prev_link, $links_cat) . '</div>';
			$output .= '<div class="afc-next">' . get_next_post_link($next_format, $next_link, $links_cat) . '</div>';
			$output .= '</nav>';
			
			return $output;
		}
	}
} ?>