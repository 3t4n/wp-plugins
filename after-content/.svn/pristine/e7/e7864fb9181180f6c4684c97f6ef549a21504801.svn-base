<?php

function afc_social_sharing() {
	
	if (is_single()) {
		global $afc_opt;
			
		$output = '<div class="afc-social-sharing">';
			
		//facebook
		if( isset( $afc_opt['social_buttons']['fb'] ) ) {
			
			$output .= '<div id="fb-wrapper" class="afc-social-button"><div class="fb-like" data-href="' . get_permalink() . '" data-layout="' . $afc_opt['fb_button'] . '" data-action="like" data-show-faces="true"';
			
			if( $afc_opt['fb_share_button'] == 1 ){ $output .= ' data-share="true"'; }
			
			$output .= '></div></div>';
			
		}
		
		
		//twitter
		if( isset( $afc_opt['social_buttons']['tw'] ) ) {
			
			$output .= '<div id="tw-wrapper" class="afc-social-button"><a href="https://twitter.com/share" class="twitter-share-button" data-count="' . $afc_opt['tw_button'] . '" data-lang="' . get_bloginfo( 'language' ) . '">Tweet</a></div>';
		
		}
		
		
		//google plus
		if( isset( $afc_opt['social_buttons']['g1'] ) ) {
			
			$output .= '<div id="g1-wrapper" class="afc-social-button"><div class="g-plusone" data-width="300" data-size="' . $afc_opt['g1_button'] . '"></div></div>';
			
		}
		
		$output .='</div>';
		return $output;
	}

}

?>