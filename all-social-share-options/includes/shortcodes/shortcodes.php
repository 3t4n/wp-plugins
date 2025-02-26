<?php

/* Theme Shortcode
/*-----------*/

/*
* Social Count
*/
function asso_social( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style' => '',
			'col'   => ''
	    ), $atts));
		
	   return '<div class="social-content"><div class="social-count '.$style.' '.$col.'"><ul>' . do_shortcode($content) . '</ul></div></div>';
	}
add_shortcode('sc', 'asso_social');


function asso_jrs( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'social' => 'facebook',
			'target' => '_blank',
			'url'    => '',
			'count'  => '',
			'text'   => 'Followers'
	    ), $atts));
		
	   return '<li class="asso-'.$social.'">
					<a target="'.$target.'" href="'.$url.'">
						<i class="asso-'.$social.'"></i>
						<div class="social-stats">
							<span>'.$count.'</span>
							<small>'.$text.'</small>
						</div>
					</a>
				</li>';
	}
add_shortcode('jrs', 'asso_jrs');


/*
* Twitter tweet shortcode
*/
function asso_twitter_tweet( $atts, $content = null ) {
		
	   return '<div class="twitter-widget"><div id="asso_tweet"></div></div>';
	}
add_shortcode('sc-tweet', 'asso_twitter_tweet');

?>