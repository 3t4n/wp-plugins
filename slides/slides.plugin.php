<?php
/*
Plugin Name: Slides 
Version: 1.0.0
Description: Slides is a slideshow plugin for jQuery that is built with simplicity in mind.
Author: Pritesh Gupta
Author URI: http://www.priteshgupta.com
Plugin URI: http://www.priteshgupta.com/plugins/slides
License: GPL
*/
/*  Copyright (C) 2012  Pritesh Gupta {http://www.priteshgupta.com/plugins/slides}

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php
    add_action('activate_slides_plugin.php', 'slides_plugin');
	function slides_plugin(){
			add_option("slides_plugin", 'yes');
			add_option("slides_plugin2", '5000');
			add_option("slides_plugin3", '2500');
			add_option("slides_plugin_display", 'yes');
		}
	add_action('wp_head', 'slides_plugin_session');
	function slides_plugin_session(){$_SESSION['slides_plugin_nri'] = 0;}
	
    add_action('admin_menu', 'slides_plugin_menu');
    function slides_plugin_menu() {
        if (function_exists('add_options_page')) {
            add_options_page('Slides', 'Slides', 9, 'slides_plugin', 'slides_plugin_display');
        }
    }
    function slides_plugin_display(){
		
        if($_POST['Submit']){
			$slides_plugin = $_POST['slides_plugin'];
			$slides_plugin2 = $_POST['slides_plugin2'];
			$slides_plugin3 = $_POST['slides_plugin3'];
			update_option("slides_plugin", $slides_plugin);
			update_option("slides_plugin2", $slides_plugin2);
			update_option("slides_plugin3", $slides_plugin3);
			update_option("slides_plugin_display", $_POST['slides_plugin_display']);
			
			echo '<div id="message" class="updated fade"><p>Update Successful!</p></div>';
		}
		$output = '<form method="post" action="'.$_SERVER['REQUEST_URI'].'">';
		?>
	<style type="text/css">
	.author{
	text-decoration:none;
	}
		
	table{
	width:60%;
	border-collapse:collapse;
	table-layout:auto;
	vertical-align:top;
	margin-bottom:15px;
	border:1px solid #CCCCCC;
	}

	table thead th{
	color:#FFFFFF;
	background-color:#666666;
	border:1px solid #CCCCCC;
	border-collapse:collapse;
	text-align:center;
	table-layout:auto;
	vertical-align:middle;
	}

	table tbody td{
	vertical-align:top;
	border-collapse:collapse;
	border-left:1px solid #CCCCCC;
	border-right:1px solid #CCCCCC;
	}
	
	table thead th, table tbody td{
	padding:5px;
	border-collapse:collapse;
	}

	table tbody tr.light{
	color:#333333;
	background-color:#F7F7F7;
	}

	table tbody tr.dark{
	color:#333333;
	background-color:#E8E8E8;
	}
	
	input[type=text]{
	background: #cecdcd; /* Fallback */
	background: rgba(206, 205, 205, 0.6);
	border: 2px solid #666;
	padding: 6px 5px;
	line-height: 1em;
	-webkit-box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	-moz-box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	-webkit-border-radius: 8px !important; 
	-moz-border-radius: 8px !important;
	border-radius: 8px !important; 
	margin-bottom: 10px;
	width: 300px;
	}
	
	select{
	background: #cecdcd; /* Fallback */
	background: rgba(206, 205, 205, 0.6);
	border: 2px solid #666;
	padding: 6px 5px;
	height: 2.8em !important;
	-webkit-box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	-moz-box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	-webkit-border-radius: 8px !important; 
	-moz-border-radius: 8px !important;
	border-radius: 8px !important; 
	margin-bottom: 10px;
	width: 300px;
	text-align:center;
	}
	
	</style>
		<?php
		$output .= '<div class="wrap">'."\n";
		$output .= '	<h2>Slides Plugin Options</h2>'."\n";
		$output .= '	WordPress Plugin by <strong><a href="http://www.priteshgupta.com" target="_blank" class="author">Pritesh Gupta</a></strong> || Slides by <strong><a href="http://nathansearles.com" target="_blank" class="author">Nathan Searles</a></strong> || <a href="http://www.priteshgupta.com/plugins/slides-plus" target="_blank" class="author"><strong>Visit Plugin Release Page</strong></a> || <a href="http://slidesjs.com" target="_blank" class="author"><strong>Visit Slides Release Page</strong></a>'."\n";
		$output .= '	<br /> <br />'."\n";
		$output .= '	<table border="0" cellspacing="0" cellpadding="6">'."\n";
		
		$slides_plugin_display = get_option('slides_plugin_display', 'yes');
		$output .= '		<tr class="dark">'."\n";
		$output .= '			<td width="75%">Preload images in an image based slideshow? </td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="slides_plugin">'."\n";
		$output .= '					<option value="no"';if ($slides_plugin == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '					<option value="yes"';if ($slides_plugin == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";

		$output .= '		<tr class="light">'."\n";
		$output .= '			<td width="75%">Autoplay slideshow? (A positive number will set to true and be the time between slide animation in milliseconds.) </td>'."\n";
		$output .= '			<td width="25%"><input type="text" name="slides_plugin2" value="'.get_option('slides_plugin2', '5000').'" /></td>';
		$output .= '		</tr>'."\n";

		$output .= '		<tr class="dark">'."\n";
		$output .= '			<td width="50%">Pause slideshow on click of next/prev or pagination? (A positive number will set to true and be the time of pause in milliseconds.) </td>'."\n";
		$output .= '			<td><input type="text" name="slides_plugin3" value="'.get_option('slides_plugin3', '2500').'" /></td>';
		$output .= '		</tr>'."\n";

		$output .= '		<tr class="light">'."\n";
		$output .= '			<td width="75%">Pause slideshow on hovering? </td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="slides_plugin_display">'."\n";
		$output .= '					<option value="no"';if ($slides_plugin_display == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($slides_plugin_display == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";

		$output .= '	</table>'."\n";
		$output .= "\n";
		$output .= '				<input type="submit" name="Submit" class="button-primary" style="float:left" value="Update Options &raquo;" /><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=doubleagentcreative%40gmail%2ecom&lc=US&item_name=Pritesh%20Gupta&no_note=0&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_LG%2egif%3aNonHostedGuest" title="PayPal Donate" style="float:left; margin-left: 7px; display: none;"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" /></a>&nbsp;&nbsp;'."\n";
		$output .= '</form>';
		$output .= '</div>'."\n";
        echo $output;
    }
function slides_scripts() {
   wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'); 
    wp_register_script( 'slides', plugins_url('/slides.min.jquery.js', __FILE__));
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'slides' );
}  	
function SlidesHeader() {
$play = get_option("slides_plugin2", 5000);
$pause = get_option("slides_plugin3", 2500);
?>	
<!-- Begin Slides WordPress Plugin -->
<script language="javascript"> 
		$(function(){
			$('#slidesContainer').slides({
				preload: <?php if (get_option("slides_plugin", "yes") == 'yes'){ ?>true<?php } else {?>false<?php }?>,
				preloadImage: 'images/loading.gif',
				play: <?php echo $play ?>,
				pause: <?php echo $pause ?>,
				hoverPause: <?php if (get_option("slides_plugin_display", "yes") == 'yes'){ ?>true<?php } else {?>false<?php }?>
			});
		});
</script> 
<!-- End Slides WordPress Plugin -->
<?php }	
wp_enqueue_style('slides-slider', plugins_url('/slides.style.css', __FILE__));
add_action('wp_enqueue_scripts', 'slides_scripts');
add_action('wp_head', 'SlidesHeader'); 
function slides_shortcode_format($content){
$autop = array('<br />');
$content = str_replace($autop, "", $content);
return $content;
}
add_filter('the_content','slides_shortcode_format',11);
function Slides_Slider( $atts, $content = null ) {
		$output2 .= '<a href="#" class="prev"><img src="' .plugins_url( 'images/arrow-prev.png' , __FILE__ ). '" width="24" height="43" alt="Arrow Prev"></a>'."\n";
 		$output2 .= '<a href="#" class="next"><img src="' .plugins_url( 'images/arrow-next.png' , __FILE__ ). '" width="24" height="43" alt="Arrow Next"></a>';
		return '<div id="slidesContainer">'."\n".'<div class="slides_container">'. do_shortcode($content).'</div>'."\n".$output2."\n".'</div>';
	    return '';
}
function Slides_Slide($atts, $content = null) {
    extract(shortcode_atts(array(
        "linkurl" => '',
		"linktitle" => '',
		"imgurl" => '',
		"imgalt" => '',
    ), $atts));
		return '<a href="'.$linkurl.'" title="'.$linktitle.'" target="_blank"><img src="'.$imgurl.'" width="570" height="270" alt="'.$imgalt.'"'.'></a>';
} 
	add_shortcode('slides' , 'Slides_Slider' );
	add_shortcode('slidesslide' , 'Slides_Slide' ); 
?>