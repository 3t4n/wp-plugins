<?php
/**
 * ArtistPress Shortcodes.
 *
 * @package     ArtistPress/views/shortcodes
 * @version     1.0.0
 * @author      LTDI Studios
 * 
 */

	function artistpress_artist_shortcode($atts){
		
		extract(shortcode_atts(array(
	      'id' => '',
	    ), $atts));
		
		if (!$id){
			$shortcodeContent = "<p>You need to provide an ID to the artist shortcode to display an artist.</p>";
		}else{
			
			$artistID     	= esc_html($id);
			$artistName 	= get_the_title($artistID);	
			$artistPhone   	= esc_html( get_post_meta($artistID, 'artistpress_artist_phone_number', true) );
			$artistEmail   	= sanitize_email( get_post_meta($artistID, 'artistpress_artist_email_address', true) );
			$artistWebsite 	= esc_url( get_post_meta($artistID, 'artistpress_artist_web_address', true) );
			$artistBio     	= esc_html( get_post_meta($artistID, 'artistpress_artist_bio', true) );

			$artistOptions 			= get_option('artistpress_artist_settings');
			$artistOptionName 		= sanitize_text_field($artistOptions['artist_name']);
			$artistOptionPhone 		= sanitize_text_field($artistOptions['artist_phone']);
			$artistOptionPhoneLink 	= sanitize_text_field($artistOptions['artist_phone_link']);
			$artistOptionEmail 		= sanitize_text_field($artistOptions['artist_email']);
			$artistOptionWeb 		= sanitize_text_field($artistOptions['artist_web']);
			$artistOptionBio		= sanitize_text_field($artistOptions['artist_bio']);
			$artistOptionStyles		= sanitize_text_field($artistOptions['artist_use_stylesheet']);
			$shortcodeContent 		= NULL;
			
			if( $artistOptionStyles == 'yes'){
					wp_enqueue_style( 'artist-styles' );
			}

			$shortcodeContent .= '<article id="artistPressArtist-'.$artistID.'" class="artistBody">';
			$shortcodeContent .= '<div class="row">';
			if ($artistOptionName  == 'yes'){
				$shortcodeContent .= '<h1 class="title">' .  $artistName  . '</h1>';
			}
			$shortcodeContent .= '</div>';

			$shortcodeContent .='<div class="row">';
		
			$shortcodeContent .='<div id="artistPhoto" class="artistPhoto" >';
			$shortcodeContent .= get_the_post_thumbnail($artistID);
			$shortcodeContent .='</div>';

			$shortcodeContent .='<div id="artistInfo" class="artistInfo">';
			$shortcodeContent .='<div class="row">';
			$shortcodeContent .='<div class="artistDetails">';
			$shortcodeContent .='<ul>';
			if ($artistOptionPhone == 'yes'){
				if ($artistOptionPhoneLink  == 'yes'){
					$shortcodeContent .='<li><strong>Phone:</strong> <a href="tel:'. $artistPhone .'">' . $artistPhone . '</a></li>';
				}else{
					$shortcodeContent .='<li><strong>Phone:</strong> ' . $artistPhone . '</li>';
				}
			}
			if ($artistOptionEmail == 'yes'){
				$shortcodeContent .='<li><strong>Email:</strong> ' . $artistEmail . '</li>';
			}
			if ($artistOptionWeb == 'yes'){
				$shortcodeContent .='<li><strong>Website:</strong> ' . $artistWebsite . '</li>';
			}
			$shortcodeContent .='</ul>';
			$shortcodeContent .='<div class="clear"></div>';
			$shortcodeContent .='</div>';
			if ($artistOptionBio == 'yes'){
				$shortcodeContent .='<div class="artistAdInfo"><h2>Biography:</h2><span>' . $artistBio . '</span></div>';
			}
			$shortcodeContent .='</div></div></div></article>';
			}
			return $shortcodeContent;
		}