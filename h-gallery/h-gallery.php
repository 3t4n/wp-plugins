<?php
/*
Plugin Name: H Gallery
Plugin URI: //01241.com/
Description: H Gallery integrates Google Picasa Albums with a simple configurable Shortcode in your Wordpress Blog posts and pages. Fully responsive and with fullscreen option.
This Plugin is based on two excellent works:
- The fully responsive, simple and lightweight responsive slider plugin from @viljamis. http://responsive-slides.viljamis.com/
- And the jQuery HTML5 Fullscreen Slideshow from  Eike Send http://eikes.github.com/jquery.fullscreen.js/
Author: Markus Steiger
Version: 0.6.8.3
Author URI: http://01241.com
*/


function shortcode_Hgallery($atts, $content = null) {

$user = get_option("hgallery_data_userid");

echo '<link rel="stylesheet" href="'.plugins_url( '/css/hgallery.css?v=1', __FILE__ ).'" />';
echo '<script src="'.plugins_url( '/js/responsiveslides.min.js', __FILE__ ).'"></script>';

extract( shortcode_atts( array(

        	'album' => '',
        	'mxresults' => '30',
        	'mxbigimgsize' => '1280',
	'maxwidth' => '1280',
        	'wrapperwidth' => '100%',
        	'wrappermargins' => '0 0 1em 0',
	'bigimagewidth' => '100%',
        	'bigimageheight' => 'auto',
        	'thumbwidth' => '100px',
        	'pager' => 'true',
        	'arrows' => '01',
        	'speed' => '1000',
        	'auto' => 'false',
        	'caption' => 'none',
        	'fullscreencaption' => 'none',
	'fullscreencaptionsize' => '120%',
	'fullscreenicon' => '02',
        	'fullscreen' => '0',
        	'cssstyle' => 'A',
        	'template' => 't4'

   	 ), $atts));

ob_start();

	$photo_feed = "https://picasaweb.google.com/data/feed/api/user/$user/album/$album?imgmax=$mxbigimgsize&max-results=$mxresults";

	$ch = curl_init($photo_feed);
        		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        		$xml_raw = curl_exec($ch);
        		curl_close($ch);
        		$photos = simplexml_load_string($xml_raw);

	echo "\n<div class=\"H-gallery-wrapper\" id=\"$album\">  \n\n";

	echo "<!-- Start Bigimage -->  \n";

     	echo "<div class=\"H-gallery-display rslides_container\" id=\"Hdisplay-$album\">  \n";
	echo "<ul class=\"big-images\" id=\"display-$album\">  \n";

	foreach ($photos->entry as $entry) {
		$media = $entry->children('http://search.yahoo.com/mrss/');
		$group_content = $media->group->content;

        		$temp['full_url'] = $group_content->attributes()->{'url'};
        		$temp['full_width'] = $group_content->attributes()->{'width'};
        		$temp['full_height'] = $group_content->attributes()->{'height'};

		$entry_caption = $media->group->description;
		$entry_id = $entry->id;
		$photo_id_index = strrpos($entry_id, '/photoid/');
		$bigphoto_id = substr($entry_id, $photo_id_index + 9);

		echo "<li id=\"tab$bigphoto_id\" class=\"tab_content\"><img src=\"". $group_content->attributes()->{'url'} ."\" width=\"". $group_content->attributes()->{'width'} ."\" height=\"". $group_content->attributes()->{'height'}."\" /><span id=\"caption$bigphoto_id\" style=\"display:$caption\" class=\"hgallery_caption\">$entry_caption</span></li>\n";

		}

	echo "</ul>\n";
	echo "</div>\n";
	echo "<!-- End Bigimage -->  \n\n";

	echo "<!-- Start Fullsize -->  \n";
     	echo "<div class=\"H-gallery-fullsize-wrapper\" id=\"fullsize-wrapper-$album\">  \n";

	foreach ($photos->entry as $entry) {
		$media = $entry->children('http://search.yahoo.com/mrss/');
		$group_content = $media->group->content;
		$entry_fullscreencaption = $media->group->description;

		echo "<div style=\"display: none;\" class=\"image\">\n";
		echo "<a rel=\"gallery\" title=\"$entry_fullscreencaption\" href=\"". $group_content->attributes()->{'url'} ."\">";
		echo '<img src="'.plugins_url( '/css/images/fullscreen_icon_' . $fullscreenicon . '.png', __FILE__ ).'" /></a>';
		echo "<div style=\"display: none;\" class=\"fullscreen_caption\">$entry_fullscreencaption</div>";
		echo "</div>    \n\n";
		}

     	echo "</div>\n";
	echo "<!-- End Fullsize -->  \n\n";

	echo "<!-- Start Thumbs -->  \n";
     	echo "<div class=\"H-gallery-thumbs-wrapper clearfix\" id=\"thumbs-wrapper-$album\">  \n";
     	echo "<ul class=\"thumbs\" id=\"thumbs-$album\">\n";

		foreach ($photos->entry as $entry) {
		$media = $entry->children('http://search.yahoo.com/mrss/');
		$group_content = $media->group->content;

        		$temp['full_url'] = $group_content->attributes()->{'url'};
        		$temp['full_width'] = $group_content->attributes()->{'width'};
        		$temp['full_height'] = $group_content->attributes()->{'height'};

		$entry_id = $entry->id;
		$photo_id_index = strrpos($entry_id, '/photoid/');
		$bigphoto_id = substr($entry_id, $photo_id_index + 9);

		echo "<li class=\" \"><a href=\"#tab$bigphoto_id\"><img src=\"". $group_content->attributes()->{'url'} ."\"/></a></li>\n";
		}

	echo "</ul>\n";
     	echo "</div>\n";
	echo "<!-- End Thumbs -->  \n\n";

	echo "</div>\n\n";


	if ($template=="t1")		{
					echo "<script  type=\"text/javascript\">";
					echo '$(function () {';
					echo "$('#display-$album').responsiveSlides({";
					echo "speed: $speed, ";
					echo "pager: false, ";
					echo '});  ';
					echo '});  ';
					echo "</script>\n\n";
					echo "<style type=\"text/css\">\n";
					echo "    #$album.H-gallery-wrapper { width: $wrapperwidth; margin: $wrappermargins; max-width: 100%; }\n";
					echo "    #Hdisplay-$album ul li img { width: $bigimagewidth; height: $bigimageheight; }\n";
					echo "    #thumbs-wrapper-$album {display: none; }  \n";
					echo "    #fullsize-wrapper-$album {display: none; }  \n";
					echo "</style>\n\n";
					}

	elseif ($template=="t2")	{
					echo "\n\n";
					echo "<script  type=\"text/javascript\">\n";
					echo '$(function () {';
					echo "$('#display-$album').responsiveSlides({";
					echo "maxwidth: $maxwidth, ";
					echo "auto: $auto, ";
					echo "pager: $pager, ";
					echo "speed: $speed";
					echo '});  ';
					echo '});  ';
					echo "</script>\n\n";
					echo "<style type=\"text/css\">\n";
					echo "    #$album.H-gallery-wrapper { width: $wrapperwidth; margin: $wrappermargins; max-width: 100%; }\n";
					echo "    #Hdisplay-$album ul li img { width: $bigimagewidth; height: $bigimageheight; }\n";
					echo "    #thumbs-wrapper-$album { display: none; }\n";
					echo "    #fullsize-wrapper-$album {display: none; }  \n";
					echo "</style>\n\n";
					}

	elseif ($template=="t3")	{
					echo "\n";
					echo "<script  type=\"text/javascript\">";
					echo '$(function () {';
					echo "$('#display-$album').responsiveSlides({";
					echo "auto: false, ";
					echo "pager: $pager, ";
					echo "nav: true, ";
					echo "speed: $speed, ";
					echo "namespace: \"transparent-btns\"";
					echo '});  ';
					echo '});  ';
					echo "</script>\n\n";
					echo "<style type=\"text/css\">\n";
					echo "    #$album.H-gallery-wrapper { width: $wrapperwidth; margin: $wrappermargins; max-width: 100%; }\n";
					echo "    #Hdisplay-$album ul li img { width: $bigimagewidth; height: $bigimageheight; }\n";
					echo "    #thumbs-wrapper-$album {display: none; }\n";
					echo "    #fullsize-wrapper-$album {display: none; }  \n";
					echo "</style>\n\n";
					}

	elseif ($template=="t4")	{
					echo "<script  type=\"text/javascript\">";
					echo '$(function () {';
					echo "$('#display-$album').responsiveSlides({";
					echo "auto: false, ";
					echo "pager: $pager, ";
					echo "nav: true, ";
					echo "speed: $speed, ";
					echo "namespace: \"large-btns\"";
					echo '});  ';
					echo '});  ';
					echo "</script>\n\n";
					echo "<style type=\"text/css\">   \n";
					echo "    #$album.H-gallery-wrapper { width: $wrapperwidth; margin: $wrappermargins; max-width: 100%; }\n";
					echo "     #thumbs-wrapper-$album {display: none; }  \n";
					echo "    #Hdisplay-$album ul li img { width: $bigimagewidth; height: $bigimageheight; }\n";
					echo "    #fullsize-wrapper-$album {display: none; }  \n";
					echo '      .large-btns_nav { background-image: url("'.plugins_url( '/css/images/arrows_' . $arrows . '.png', __FILE__ ).'") }'; echo "\n";
					echo "</style>\n\n";
					}
	
	elseif ($template=="t5")	{
					echo '<link rel="stylesheet" href="'.plugins_url( '/css/style_' . $cssstyle . '.css?v=1', __FILE__ ).'" />'; echo "\n";
					echo '<script src="'.plugins_url( '/js/h-gallery.js', __FILE__ ).'"></script>';
					echo "<style type=\"text/css\">   \n";
					echo "    #fullsize-wrapper-$album {display: none; }  \n";
					echo "</style>\n\n";
					}
	else
  					echo " \n\n";

	if ($fullscreen=="1")		{
					echo '<script src="'.plugins_url( '/js/jquery.fullscreenslides.min.js', __FILE__ ).'"></script>';
					echo '<script src="'.plugins_url( '/js/fullscreenloader.js', __FILE__ ).'"></script>';
					echo "<style type=\"text/css\">   \n";
					echo "   #fullsize-wrapper-$album div:first-child { display: block !important; }\n";
					echo "   #fullsize-wrapper-$album {display: block !important; }  \n";  
					echo "   #fs-caption { display: $fullscreencaption !important; font-size: $fullscreencaptionsize; }\n";
					echo "</style>\n\n";
					}
					else
  					echo " ";

$list_hgallery= ob_get_clean();
	return $list_hgallery;

}

add_shortcode( 'Gallery-H', 'shortcode_Hgallery' );


// LOAD SCRIPTS AND STYLES IN THE HEADER (false) or FOOTER (true) |  for Feature: Script Conflict Handling in AdminPage

	//	function hgalleryscripts() {
	//	wp_enqueue_script('jq172', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', array('jquery'), '', true); 
	// 	wp_enqueue_script('h-gallery', plugins_url('/js/responsiveslides.min.js', __FILE__), array('jquery'), '1.04', false); 
	//	}    
	//	add_action('wp_enqueue_scripts', 'hgalleryscripts');


// REPLACE THE Wordpress "jquery.js"

function replace_wp_jquery() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}    
 
add_action('wp_enqueue_scripts', 'replace_wp_jquery');



// ADMIN PAGE

function hgallery_admin() {
	  include(ABSPATH . '/wp-content/plugins/h-gallery/admin/h-gallery-admin.php');
}

function hgallery_admin_actions() {
	add_options_page("H-Gallery", "H Gallery ", manage_options, "H-Gallery_Settings", "hgallery_admin");
}
	add_action('admin_menu', 'hgallery_admin_actions');
	
function hgallery_install() { /* Creates new database field */
	add_option("hgallery_data_userid");
		}


?>