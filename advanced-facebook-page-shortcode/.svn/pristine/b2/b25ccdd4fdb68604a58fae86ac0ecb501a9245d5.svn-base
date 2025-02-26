<?php
/**
 * @package advanced-facebook-page-shortcode
*/
/*
Plugin Name: Advanced Facebook  Page Shortcode
Plugin URI: http://www.crayfishstudios.com/
Description: Advanced Facebook Page Shortcode is a customizable facebook page display wordpress shortcode plugin. There have lots of options to customize the page shortcode. So by using this you can up and run a customizable wordpress shortcode on your website very easily.
Version: 1.0
Author: Crayfish Studios
Author URI: http://www.crayfishstudios.com/
*/
// Register style sheet.
add_shortcode('fish_facebook', 'advancedFacebookPageShortcode');
 function advancedFacebookPageShortcode($atts){
 	$atts = shortcode_atts(array(
 		'suffix' => '',
 		'page' => 'http://www.facebook.com/Facebook',
 		'width' => '300',
        'height' => '356',
        'background' => '#050026',
        'header' => 'false',
		'padding' => '15',
		'radius' => '15',
        'border' => '2',
		'bordercolor' => '#9A1717',
        'theme' => 'light'
 	), $atts);
 	extract($atts);

 	$data = "";
        $data .= "
            <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = '//connect.facebook.net/en_US/all.js#xfbml=1';
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));
             </script>
  ";
 	$data .= "
    <div id='advanced_facebook' class='$suffix' style='max-width: $width";
        $data .= "px;'>
		<div class='fbCustom' style='background:$background; width:$width";
        $data .= "px; padding: $padding";
        $data .= "px; border: $border";
        $data .= "px solid $bordercolor; border-radius: $radius";
        $data .= "px;'>
        <div class='FBWrap' style='height:$height";
        $data .= "px; overflow: hidden;'>
            <div class='fb-like-box'
                data-width='$width' data-height='$height' 
                data-href='$page'
                data-border-color='$bordercolor' data-show-faces='true'
                data-stream='false' data-header='false' data-color-scheme='dark'>
            </div>
         </div>
      </div>
	  <div style='font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr;'><a href='http://www.empirepromos.com/' target='_blank' style='color: #808080;' title='click here'>Promotional Items</a></div>
</div>                   
";
    return $data;
 }