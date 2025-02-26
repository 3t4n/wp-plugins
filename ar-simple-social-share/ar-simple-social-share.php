<?php 
/*
Plugin Name: Ar Simple Social Share

Description: Add a group of simple dropdown social sharing buttons on your wordpress website

Plugin URI: http://themencode.com/ar-simple-social-share/

Author: ThemeNcode

Author URI: http://themencode.com 

Version: 2.0.3

License: GPLv2 or later

License URI: http://www.gnu.org/licenses/gpl-2.0.html

*/

/* 

If you find any bug or need any kind of help, please feel free to send an email to contact@abdulawal.com . I'll get back to you asap.

*/


include_once 'ar-framework/options-init.php';

define('PLUGIN_NAME','Ar Simple Social Share');

define('PLUGIN_DIR', 'ar-simple-social-share');

define('IMG_DIR', 'ar-simple-social-share/images');



// Add Scripts to header



function uzzal_head_materials(){

	//PT+Sans|Great+Vibes|EB+Garamond

	$css_dir = plugins_url()."/".PLUGIN_DIR."/css";

	

	$custom_font = get_option('ar_custom_font', 'true');

	

	if($custom_font=="true"){

		$get_font = get_option('ar_font_name', '');

	} else {

		$get_font = get_option('ar_title_font', '');

	}

	$get_font = str_replace(' ', '+', $get_font);

	echo "<link href='$css_dir/ar-style.css' rel='stylesheet' />";

	echo "<link href='http://fonts.googleapis.com/css?family=$get_font' rel='stylesheet' type='text/css'>

	<script src='http://platform.tumblr.com/v1/share.js'></script>

	<script type='text/javascript' src='http://assets.pinterest.com/js/pinit.js'></script>";

}

add_action('wp_head', 'uzzal_head_materials');



	// Function with sharing links



	function ar_simple_social_share($content){

		$style= get_option('s-style', '');

		$img_url     =  plugins_url()."/".IMG_DIR."/style-$style";

		$blog_title  = get_bloginfo("name");

		$share_url   =  get_permalink();

		$share_title =  get_the_title();

		$effect      =  get_option('effect', '');

	if($effect == "Hover"){

		$content .= '<div class="ar_share_wrapper" style="font-family: '.get_option('ar_title_font', 'Great Vibes').'">

						<ul>

							<li>'.get_option("ar_title_id", "Share on Social Netwrorks.").'

								<ul class="share">';

								if(get_option('show_facebook', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_fb_title", "Share on Facebook").'" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$share_url.'"><img src="'.$img_url.'/facebook.png" /></a></li>';

								}

								if(get_option('show_twitter', 'true') == "true"){

									$content .=    '<li><a title="'.get_option("ar_twitter_title", "Share on Twitter").'" target="_blank" href="https://twitter.com/intent/tweet?url='.$share_url.'&text='.$share_title.'"><img src="'.$img_url.'/twitter.png" /></a></li>';

								}

								if(get_option('show_pinterest', 'true') == "true"){

									$content .=		'<li><a title="'.get_option("ar_pinterest_title", "Share on Pinterest").'" target="_blank" href="//www.pinterest.com/pin/create/button/?url='.$share_url.'&media='.wp_get_attachment_url(get_post_thumbnail_id()).'&description='.$share_title.'" class="pin-it-button" data-pin-do="buttonPin" data-pin-config="above""><img src="'.$img_url.'/pinterest.png" /></a></li>';

								}

								if(get_option('show_google_plus', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_google_plus_title", "Share on Google Plus").'" target="_blank" href="https://plus.google.com/share?url='.$share_url.'"><img src="'.$img_url.'/google_plus.png" /></a></li>';

								}

								if(get_option('show_reddit', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_reddit_title", "Share on Reddit").'" target="_blank" href="http://www.reddit.com/submit?url='.$share_url.'"><img src="'.$img_url.'/reddit.png" /></a></li>';

								}

								if(get_option('show_stumbleupon', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_stumbleupon_title", "Share on Stumbleupon").'" target="_blank" href="http://www.stumbleupon.com/submit?url='.$share_url.'"><img src="'.$img_url.'/stumbleupon.png" /></a></li>';

								}

								if(get_option('show_digg', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_digg_title", "Share on Digg").'" target="_blank" href="http://digg.com/submit?phase=2&url='.$share_url.'&title='.$share_title.'"><img src="'.$img_url.'/digg.png" /></a></li>';

								}

								if(get_option('show_tumblr', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_tumblr_title", "Share on Tumblr").'" target="_blank" href="http://www.tumblr.com/share" title="Share on Tumblr"><img src="'.$img_url.'/tumblr.png" /></a></li>';

								}

								if(get_option('show_linkedin', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_linkedin_title", "Share on Linkedin").'" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.$share_url.'&title='.$share_title.'&summary='.$share_content.'&source='.$blog_title.'"><img src="'.$img_url.'/linkedin.png" /></a></li>';

								}

								if(get_option('show_blogger', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_blogger_title", "Share on Blogger").'" target="_blank" href="http://www.blogger.com/blog-this.g?t='.$share_title.'&u='.$share_url.'&n='.$share_title.'&pli=1"><img src="'.$img_url.'/blogger.png" /></a></li>';

								}

								if(get_option('show_delicious', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_delicious_title", "Share on Delicious").'" target="_blank" href="https://delicious.com/save?url='.$share_url.'&title='.$share_title.'"><img src="'.$img_url.'/delicious.png" /></a></li>';

								}

								$content .=  '</ul>

							</li>

						</ul>

					</div><!--/.ar_share_wrapper-->

					<div class="clear"></div>';
					 
		} elseif( $effect == "Direct"){

			$content .= '<div class="ar_share_wrapper_direct" style="font-family: '.get_option('ar_title_font', 'Great Vibes').'">

						<ul>

							<li>'.get_option("ar_title_id", "Share on Social Netwrorks.").'
							</li>

						</ul>

						<ul class="share">';

								if(get_option('show_facebook', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_fb_title", "Share on Facebook").'" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$share_url.'"><img src="'.$img_url.'/facebook.png" /></a></li>';

								}

								if(get_option('show_twitter', 'true') == "true"){

									$content .=    '<li><a title="'.get_option("ar_twitter_title", "Share on Twitter").'" target="_blank" href="https://twitter.com/intent/tweet?url='.$share_url.'&text='.$share_title.'"><img src="'.$img_url.'/twitter.png" /></a></li>';

								}

								if(get_option('show_pinterest', 'true') == "true"){

									$content .=		'<li><a title="'.get_option("ar_pinterest_title", "Share on Pinterest").'" title="Share on Pinterest" target="_blank" href="//www.pinterest.com/pin/create/button/?url='.$share_url.'&media='.wp_get_attachment_url(get_post_thumbnail_id()).'&description='.$share_title.'" class="pin-it-button" data-pin-do="buttonPin" data-pin-config="above""><img src="'.$img_url.'/pinterest.png" /></a></li>';

								}

								if(get_option('show_google_plus', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_google_plus_title", "Share on Google Plus").'" target="_blank" href="https://plus.google.com/share?url='.$share_url.'"><img src="'.$img_url.'/google_plus.png" /></a></li>';

								}

								if(get_option('show_reddit', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_reddit_title", "Share on Reddit").'" target="_blank" href="http://www.reddit.com/submit?url='.$share_url.'"><img src="'.$img_url.'/reddit.png" /></a></li>';

								}

								if(get_option('show_stumbleupon', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_stumbleupon_title", "Share on Stumbleupon").'" target="_blank" href="http://www.stumbleupon.com/submit?url='.$share_url.'"><img src="'.$img_url.'/stumbleupon.png" /></a></li>';

								}

								if(get_option('show_digg', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_digg_title", "Share on Digg").'" target="_blank" href="http://digg.com/submit?phase=2&url='.$share_url.'&title='.$share_title.'"><img src="'.$img_url.'/digg.png" /></a></li>';

								}

								if(get_option('show_tumblr', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_tumblr_title", "Share on Tumblr").'" target="_blank" href="http://www.tumblr.com/share" title="Share on Tumblr"><img src="'.$img_url.'/tumblr.png" /></a></li>';

								}

								if(get_option('show_linkedin', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_linkedin_title", "Share on Linkedin").'" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.$share_url.'&title='.$share_title.'&summary='.$share_content.'&source='.$blog_title.'"><img src="'.$img_url.'/linkedin.png" /></a></li>';

								}

								if(get_option('show_blogger', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_blogger_title", "Share on Blogger").'" target="_blank" href="http://www.blogger.com/blog-this.g?t='.$share_title.'&u='.$share_url.'&n='.$share_title.'&pli=1"><img src="'.$img_url.'/blogger.png" /></a></li>';

								}

								if(get_option('show_delicious', 'true') == "true"){

									$content .= 	'<li><a title="'.get_option("ar_delicious_title", "Share on Delicious").'" target="_blank" href="https://delicious.com/save?url='.$share_url.'&title='.$share_title.'"><img src="'.$img_url.'/delicious.png" /></a></li>';

								}

								$content .=  '</ul>

					</div><!--/.ar_share_wrapper-->

					<div class="clear"></div>';

		}
				return $content;					

	}	

	if(get_option('to_excerpt', 'true') == "true"){

		add_filter('excerpt_more', 'ar_simple_social_share');

	}

	function include_in_post_content(){

		if(get_option('to_single', 'true') == "true"){

			if(is_single()){

				add_filter('the_content', 'ar_simple_social_share');

				} else {

					echo '';

				}

			}

	}



	add_action('template_redirect','include_in_post_content');



	function include_in_page_content(){

		if(get_option('to_page', 'true') == "true"){

			if(is_page()){

				add_filter('the_content', 'ar_simple_social_share');

				} else {

					echo '';

				}

			}

	}



	add_action('template_redirect','include_in_page_content');



	// Create The Shortcode

	add_shortcode('ar-simple-social-share', 'ar_simple_social_share');


/* Facebook Like Box Addon Shortcode  */
	function ar_facebook_likebox( $atts ) {
	     extract( shortcode_atts( array(
		      'username' => 'arwpthemes',
		      'width' => '250',
		      'height' => '350',
		      'colorscheme' => 'light',
		      'show_faces' => 'true',
		      'show_stream' => 'true',
		      'show_header' => 'true',
		      'show_border' => 'true',
		      'appid' => '481092295342350',
	     ), $atts ) );
	    return '<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F'.$username.'&amp;width='.$width.'&amp;height='.$height.'&amp;colorscheme='.$colorscheme.'&amp;show_faces='.$show_faces.'&amp;header='.$show_header.'&amp;stream='.$show_stream.'&amp;show_border='.$show_border.'&amp;appId='.$appid.'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:'.$height.'px;" allowTransparency="true"></iframe>';

	}
	add_shortcode( 'ar-fblike', 'ar_facebook_likebox' );
// Just end of the plugin :D
//This plugin was coded by Abdul Awal Uzzal. Catch me at facebook: http://facebook.com/webdesignerbd
//Thanks for using this plugin
?>