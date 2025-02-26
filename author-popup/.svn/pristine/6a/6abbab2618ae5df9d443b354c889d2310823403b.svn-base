<?php
/*
Plugin Name: Author Popup
Plugin URI: http://secureslash.com/opensource-world/wordpress-author-popup-plugin-karthikeyan/
Description: A CSS popup will appear by hovering on an author link with user profile & social links.
Version: 1.0
Author: KarthiKeyan
Author URI: http://blaze.ws
*/

/*  Copyright 2011  Karthi Keyan  (email : root@secureslash.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function author_popup() {
	global $authordata;
	$nick = get_the_author();

// Gravatar Photo

	$mail = get_the_author_email();
	$gravatar = 'http://www.gravatar.com/avatar.php?gravatar_id=' .md5($mail);

// Get ID for hidden DIV

	$div_id = 'a'.get_the_ID();

// Hidden DIV output

	$author_posts_link = get_author_posts_url($authordata->ID, $authordata->user_nicename );

	
	
 if ( get_the_author_meta( 'twitter' ) ) { 
			$sociallinks .='
				<a href="http://twitter.com/'.the_author_meta( "twitter" ).'" title="Follow'.the_author_meta( "display_name" ).'on Twitter"><img src="/wp-content/
				plugins/author-popup/img/twitter.png" border="0" /></a>
			';
		 } // End check for twitter 

		if ( get_the_author_meta( 'facebook' ) ) { 
			$sociallinks .='
				<a href="'.the_author_meta( "facebook" ).'" title="View my facebok profile"><img src="/wp-content/
				plugins/author-popup/img/facebook.png" border="0" /></a>
			';
		 } // End check for facebook 
		 if ( get_the_author_meta( 'youtube' ) ) { 
			$sociallinks .='
				<a href="'.the_author_meta( "youtube" ).'" title="View my facebok profile"><img src="/wp-content/
				plugins/author-popup/img/youtube.png" border="0" /></a>
			';
		 } // End check for youtube 
	$jss = "
    <!--
    jQuery.noConflict(); 
    jQuery(function () {
        jQuery('.bubbleInfo').each(function () {
            var distance = 1;
            var time = 250;
            var hideDelay = 500;

            var hideDelayTimer = null;

            var beingShown = false;
            var shown = false;
            var trigger = jQuery('.trigger', this);
            var info = jQuery('.popup', this).css('opacity', 0);


            jQuery([trigger.get(0), info.get(0)]).mouseover(function () {
                if (hideDelayTimer) clearTimeout(hideDelayTimer);
                if (beingShown || shown) {
                    // don't trigger the animation again
                    return;
                } else {
                    // reset position of info box
                    beingShown = true;

                    info.css({
                        top: -58,
                        right: -50,
                        display: 'block'
                    }).animate({
                        top: '-=' + distance + 'px',
                        opacity: 1
                    }, time, 'swing', function() {
                        beingShown = false;
                        shown = true;
                    });
                }

                return false;
            }).mouseout(function () {
                if (hideDelayTimer) clearTimeout(hideDelayTimer);
                hideDelayTimer = setTimeout(function () {
                    hideDelayTimer = null;
                    info.animate({
                        top: '-=' + distance + 'px',
                        opacity: 0
                    }, time, 'swing', function () {
                        shown = false;
                        info.css('display', 'none');
                    });

                }, hideDelay);

                return false;
            });
        });
    });
    
    //-->
  
";
	$hidden_div = '
   </div>

    
<table id="dpop" class="popup">
                <tbody><tr>
                        <td id="topleft" class="corner"></td>
                        <td class="top"></td>
                        <td id="topright" class="corner"></td>
                </tr>

                <tr>
                        <td class="pleft"></td>
                        <td  bgcolor="white">
                        
                        <table class="popup-contents">
                                <tbody><tr>
                                <td>
                                <img border="0" title="Author Popup" src="'.$gravatar.'" alt="gravatar" />
                                </td>
                                <td>
                                 <table><tbody><tr></tr>
                                        <th>Author:</th>
                                        <td><b> '.get_the_author().'</b></td>
                                </tr>
                                <tr>
                                        <th valign="top"><b>About:</b> </th>
                                        <td align="justify">'.get_the_author_description().'</td>
                                </tr>
                                <tr valign="top">
											<td colspan="2" valign="top"><img border="0" src="/wp-content/plugins/author-popup/img/starburst.gif" />&nbsp;<a title="Author Popup" href="'.$author_posts_link.'">Posts by '.get_the_author().'<b></b></a> ('.get_the_author_posts().')'.$sociallinks.'		
		</td>                                
                                </tr>
                               
                                                                          
                               
                        </tbody></table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                               

                        </td>
                        <td class="pright"></td>    
                </tr>

                <tr>
                        <td class="corner" id="bottomleft"></td>
                        <td class="bottom"><div class="bottomtail_removefromunderscrore"></div></td>
                        <td id="bottomright" class="corner"></td>
                </tr>
        </tbody></table>
</div>';
// Show it
echo '<script type="text/javascript">';
echo $jss;
echo '</script>';
echo '<div align="left" style="float:right;"><div id="authi"  style="margin:0px;padding:0px;"  class="bubbleInfo"><div class="trigger">'; 
echo ('Posted By: <a href="javascript:;" >'.$nick.'</a>'.$hidden_div);
echo '</div>';

}

// Hook onmousedown="toggleDiv(\'authi\');"

	add_filter('the_author_posts_link', 'author_popup');  

// Add JavaScript and Styles to header

	add_action('wp_head', 'add_head');
	function add_head() {
	echo '<script type="text/javascript" src="'.get_option(siteurl).'/wp-content/plugins/author-popup/javascript/ap.js"></script><link rel="stylesheet" href="'.get_option('siteurl').'/wp-content/plugins/author-popup/css/ap_style.css" type="text/css" />';
}

?>