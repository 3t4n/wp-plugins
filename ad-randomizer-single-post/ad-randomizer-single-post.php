<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*

Plugin Name: Ad Randomizer Single Post
Plugin URI: http://www.wppluginsdev.com
Description: This plugin allows you to insert adsense (or other ad programs) into your posts (pages optional) either at the top of the post, the top left, top right, middle left, middle right or bottom of the post, and it will randomly show whatever ad unit you have saved at the specified location. In other words you might see a 468 by 60 ad at the top of the page one minute and the next you might see a 350 by 200 image ad in the middle of the page floating left of the content, or you might see a 200 by 200 text ad floating right of the content at the top of the page. Just save the ad code you want to use in each available slot and the plugin will randomize the ad for you so you can play with different ad units and ad positions without having to do any work other than setting up the plugin upon activation.
Version: 1.0
Author: wppluginsdev.com
Author URI: http://www.wppluginsdev.com

*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*  Copyright 2012  wppluginsdev.com  (email : wppluginsdev@LIVE.COM)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !defined('WP_CONTENT_DIR') )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' ); // no trailing slash, full paths only - WP_CONTENT_URL is defined further down

if ( !defined('WP_CONTENT_URL') )
	define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content'); // no trailing slash, full paths only - WP_CONTENT_URL is defined further down

$wpcontenturl=WP_CONTENT_URL;
$wpcontentdir=WP_CONTENT_DIR;
$wpinc=WPINC;

$adransipo_plugin_path = WP_CONTENT_DIR.'/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
$adransipo_plugin_url = WP_CONTENT_URL.'/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));


	if( file_exists("$adransipo_plugin_path/ad-randomizer-single-post-admin.php") )
	{
		require("$adransipo_plugin_path/ad-randomizer-single-post-admin.php");
	}


function insertadinto($content)
{
	$myadops='';
	$adsead='';
	$text='';
	$textdef='';

	$adransipo_options = get_option( 'adransipo_plugin_options' );


	// Setup a default ad at the top of content if this space is enabled and ad_top_content is not empty
	if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
	{
		if(isset($adransipo_options["ad_top_content"]) && !empty($adransipo_options["ad_top_content"]))
		{
			$textdef ='<div style="text-align:center;padding:10px;">'. $adransipo_options["ad_top_content"].'</div>';
		}
	}

	// Ad space options array
	$myadoptions=array('ad_top_content','ad_left_content_top','ad_right_content_top','ad_left_content_middle','ad_right_content_middle','ad_bottom_content');


	// Rebuild array so that it only contains filled out units
	foreach($myadoptions as $myadoption)
	{
		if(isset($adransipo_options[$myadoption]) && !empty($adransipo_options[$myadoption]))
		{
				$myadops[]=$myadoption;
		}
	}


	// Select a random ad from array of ads
	if(isset($myadops) && !empty($myadops))
	{
		$adsead = $myadops[array_rand($myadops)];
	}


	if ( is_single() && isset($adsead) &&!empty($adsead) )
	{

			if($adsead == 'ad_top_content' )
			{
					if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'. $adransipo_options["ad_top_content"].'</div>';
						return html_entity_decode(stripslashes($text)) . $content;
					}
					else
					{
						return $content;
					}
			}
			elseif( $adsead == 'ad_left_content_top'  )
			{
					if( isset($adransipo_options['disable_enable_ad_left_content_top']) && !empty($adransipo_options['disable_enable_ad_left_content_top']) && ($adransipo_options['disable_enable_ad_left_content_top'] != "Disable") )
					{
						$text ='<div style="float:left;margin-right:10px;">'. $adransipo_options["ad_left_content_top"].'</div>';
						return html_entity_decode(stripslashes($text)) . $content;
					}
					else
					{
						if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
						{
							$text ='<div style="text-align:center;padding:10px;">'. $adransipo_options["ad_top_content"].'</div>';
							return html_entity_decode(stripslashes($text)) . $content;
						}
						else
						{
							return $content;
						}
					}
			}
			elseif($adsead == 'ad_right_content_top')
			{
				if( isset($adransipo_options['disable_enable_ad_right_content_top']) && !empty($adransipo_options['disable_enable_ad_right_content_top']) && ($adransipo_options['disable_enable_ad_right_content_top'] != "Disable") )
				{
					$text ='<div style="float:right;margin-left:10px;">'.$adransipo_options["ad_right_content_top"].'</div>';
					return html_entity_decode(stripslashes($text)) . $content;
				}
				else
				{
					if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'. $adransipo_options["ad_top_content"].'</div>';
						return html_entity_decode(stripslashes($text)) . $content;
					}
					else
					{
						return $content;
					}
				}
			}
			elseif($adsead == 'ad_left_content_middle')
			{

				if( isset($adransipo_options['disable_enable_ad_left_content_middle']) && !empty($adransipo_options['disable_enable_ad_left_content_middle']) && ($adransipo_options['disable_enable_ad_left_content_middle'] != "Disable") )
				{
					if(strlen($content) > 600)
					{
						$before_content = substr($content, 0, 300);
						$after_content = substr($content, 300);
						$after_content = explode('</p>', $after_content);
						$text ='<div style="float:left;margin-right:10px;">'. $adransipo_options["ad_left_content_middle"].'</div>';
						array_splice($after_content, 1, 0, html_entity_decode(stripslashes($text)));
						$after_content = implode('</p>', $after_content);
						return $before_content . $after_content;
					}else { return $content.html_entity_decode(stripslashes($textdef));}
				}
				else
				{
					if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'. $adransipo_options["ad_top_content"].'</div>';
						return html_entity_decode(stripslashes($text)) . $content;
					}
					else
					{
						return $content;
					}
				}

			}
			elseif($adsead == 'ad_right_content_middle')
			{

				if( isset($adransipo_options['disable_enable_ad_right_content_middle']) && !empty($adransipo_options['disable_enable_ad_right_content_middle']) && ($adransipo_options['disable_enable_ad_right_content_middle'] != "Disable") )
				{
					if(strlen($content) > 600)
					{
						$before_content = substr($content, 0, 300);
						$after_content = substr($content, 300);
						$after_content = explode('</p>', $after_content);
						$text ='<div style="float:right;margin-left:10px;">'. $adransipo_options["ad_right_content_middle"].'</div>';
						array_splice($after_content, 1, 0, html_entity_decode(stripslashes($text)));
						$after_content = implode('</p>', $after_content);
						return $before_content . $after_content;
					}else { return $content.html_entity_decode(stripslashes($textdef));}
				}
				else
				{
					if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'. $adransipo_options["ad_top_content"].'</div>';
						return html_entity_decode(stripslashes($text)) . $content;
					}
					else
					{
						return $content;
					}
				}

			}
			elseif($adsead == 'ad_bottom_content')
			{
					if( isset($adransipo_options['disable_enable_ad_bottom_content']) && !empty($adransipo_options['disable_enable_ad_bottom_content']) && ($adransipo_options['disable_enable_ad_bottom_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'.$adransipo_options["ad_bottom_content"].'</div>';
						return $content . html_entity_decode(stripslashes($text));
					}
					else
					{
						return $content;
					}
			}
			else
			{
				if(isset($adransipo_options['ad_top_content']) && !empty($adransipo_options['ad_top_content']))
				{
					if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'.$adransipo_options["ad_bottom_content"].'</div>';
						return $content . html_entity_decode(stripslashes($text));
					}
					else
					{
						return $content;
					}
				}

			}
	}
	elseif(isset($adransipo_options['yes_no_options_ads_on_pages']) && !empty($adransipo_options['yes_no_options_ads_on_pages']) && ($adransipo_options['yes_no_options_ads_on_pages'] =='yes'))
	{
			// For pages

		if ( is_page() && isset($adsead) &&!empty($adsead) )
		{

			if($adsead == 'ad_top_content' )
			{
					if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'. $adransipo_options["ad_top_content"].'</div>';
						return html_entity_decode(stripslashes($text)) . $content;
					}
					else
					{
						return $content;
					}
			}
			elseif( $adsead == 'ad_left_content_top'  )
			{
					if( isset($adransipo_options['disable_enable_ad_left_content_top']) && !empty($adransipo_options['disable_enable_ad_left_content_top']) && ($adransipo_options['disable_enable_ad_left_content_top'] != "Disable") )
					{
						$text ='<div style="float:left;margin-right:10px;">'. $adransipo_options["ad_left_content_top"].'</div>';
						return html_entity_decode(stripslashes($text)) . $content;
					}
					else
					{
						if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
						{
							$text ='<div style="text-align:center;padding:10px;">'. $adransipo_options["ad_top_content"].'</div>';
							return html_entity_decode(stripslashes($text)) . $content;
						}
						else
						{
							return $content;
						}
					}
			}
			elseif($adsead == 'ad_right_content_top')
			{
				if( isset($adransipo_options['disable_enable_ad_right_content_top']) && !empty($adransipo_options['disable_enable_ad_right_content_top']) && ($adransipo_options['disable_enable_ad_right_content_top'] != "Disable") )
				{
					$text ='<div style="float:right;margin-left:10px;">'.$adransipo_options["ad_right_content_top"].'</div>';
					return html_entity_decode(stripslashes($text)) . $content;
				}
				else
				{
					if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'. $adransipo_options["ad_top_content"].'</div>';
						return html_entity_decode(stripslashes($text)) . $content;
					}
					else
					{
						return $content;
					}
				}
			}
			elseif($adsead == 'ad_left_content_middle')
			{

				if( isset($adransipo_options['disable_enable_ad_left_content_middle']) && !empty($adransipo_options['disable_enable_ad_left_content_middle']) && ($adransipo_options['disable_enable_ad_left_content_middle'] != "Disable") )
				{
					if(strlen($content) > 600)
					{
						$before_content = substr($content, 0, 300);
						$after_content = substr($content, 300);
						$after_content = explode('</p>', $after_content);
						$text ='<div style="float:left;margin-right:10px;">'. $adransipo_options["ad_left_content_middle"].'</div>';
						array_splice($after_content, 1, 0, html_entity_decode(stripslashes($text)));
						$after_content = implode('</p>', $after_content);
						return $before_content . $after_content;
					}else { return $content.html_entity_decode(stripslashes($textdef));}
				}
				else
				{
					if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'. $adransipo_options["ad_top_content"].'</div>';
						return html_entity_decode(stripslashes($text)) . $content;
					}
					else
					{
						return $content;
					}
				}

			}
			elseif($adsead == 'ad_right_content_middle')
			{

				if( isset($adransipo_options['disable_enable_ad_right_content_middle']) && !empty($adransipo_options['disable_enable_ad_right_content_middle']) && ($adransipo_options['disable_enable_ad_right_content_middle'] != "Disable") )
				{
					if(strlen($content) > 600)
					{
						$before_content = substr($content, 0, 300);
						$after_content = substr($content, 300);
						$after_content = explode('</p>', $after_content);
						$text ='<div style="float:right;margin-left:10px;">'. $adransipo_options["ad_right_content_middle"].'</div>';
						array_splice($after_content, 1, 0, html_entity_decode(stripslashes($text)));
						$after_content = implode('</p>', $after_content);
						return $before_content . $after_content;
					}else { return $content.html_entity_decode(stripslashes($textdef));}
				}
				else
				{
					if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'. $adransipo_options["ad_top_content"].'</div>';
						return html_entity_decode(stripslashes($text)) . $content;
					}
					else
					{
						return $content;
					}
				}

			}
			elseif($adsead == 'ad_bottom_content')
			{
					if( isset($adransipo_options['disable_enable_ad_bottom_content']) && !empty($adransipo_options['disable_enable_ad_bottom_content']) && ($adransipo_options['disable_enable_ad_bottom_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'.$adransipo_options["ad_bottom_content"].'</div>';
						return $content . html_entity_decode(stripslashes($text));
					}
					else
					{
						return $content;
					}
			}
			else
			{
				if(isset($adransipo_options['ad_top_content']) && !empty($adransipo_options['ad_top_content']))
				{
					if( isset($adransipo_options['disable_enable_ad_top_content']) && !empty($adransipo_options['disable_enable_ad_top_content']) && ($adransipo_options['disable_enable_ad_top_content'] != "Disable") )
					{
						$text ='<div style="text-align:center;padding:10px;">'.$adransipo_options["ad_bottom_content"].'</div>';
						return $content . html_entity_decode(stripslashes($text));
					}
					else
					{
						return $content;
					}
				}

			}
		}
	}
	else{return $content;}


}
add_filter('the_content', 'insertadinto');

?>