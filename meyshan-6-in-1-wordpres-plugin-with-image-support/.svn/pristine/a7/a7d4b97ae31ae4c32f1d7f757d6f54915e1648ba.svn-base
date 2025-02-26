<?php
/*
Plugin Name: Meyshan 6 in 1
Version: 3.0
Plugin URI: http://www.spicyexpress.net/index.php/2007/03/01/meyshan-6-in-1-wordpress-plugin/
Description: Display six plugins in a Mini tabbed box.  Developed by<a href="http://www.meyshan.coml">Meyshan 6 in 1</a> at Spicyexpress.net. Based on <a href="http://www.cssplay.co.uk/menus/mini_tabbed_pages.html">Mini Tabbed Pages</a> by Stu Nicholls.
Author: Meyshan World
Version: 1.0
Author URI: http://www.spicyexpress.net
*/
function sixinone($thin = null) {
	$options = get_option('widget_sixinone');
	sixinone_display((isset($thin) ? $thin : $options['thin']) , $options['images'], $options['names'], $options['commands']);
}

function sixinone_display($thin = true, $images, $names, $commands) {
if (!isset($thin))
	$thin = true;
?>
<div id="tabswrapper">
<div id="tabs"<?php echo $thin ? ' class="small"' : ''; ?>>
<?php /*<p class="bold"><?php echo $title; ?></p> */?>

<ul>
<?php $tabpos = 'left'; for ($i=1 ; $i<=6 ;$i++) { ?>
<li><a href="#nogo" class="one outer"><?php echo $images[$i] ? '<img class="tabimage" src="'.str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/sixinone_images/'.$images[$i].'" />' : ''; ?><?php echo $names[$i]; ?><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->
<div class="tab_<?php echo $tabpos; ?>">
<?php eval($commands[$i]); ?>
</div>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
<?php
if ($thin)
{
	if('left' == $tabpos)
		$tabpos = 'right';
	else
		$tabpos = 'left';
	if(2 == $i || 4 == $i)
		echo '</ul><br class="clear" /><ul>';
} 
else 
{
	if('left' == $tabpos)
		$tabpos = 'center';
	elseif ('center' == $tabpos)
		$tabpos = 'right';
	else
		$tabpos = 'left';
	if(3 == $i)
		echo '</ul><br class="clear" /><ul>';
}
} //End for loop for each of 6 tabs
?>

</ul>
<br class="clear" />
<span class="base"></span>
</div>
</div>
<?php
}

function widget_sixinone_css() {
?>
<style type="text/css">
div#tabs *, div#tabs ul *, div#tabs ul li * {
	margin: 0;
	}
.clear {clear:both;}
/* ================================================================ 
This copyright notice must be untouched at all times.

The original version of this stylesheet and the associated (x)html
is available at http://www.cssplay.co.uk/menus/mini_tabbed_pages.html
Copyright (c) 2005-2007 Stu Nicholls. All rights reserved.
This stylesheet and the associated (x)html may be modified in any 
way to fit your requirements.
=================================================================== */


#tabs {width: 400px; background: url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/top.png); text-align:center;  position:absolute; z-index:500; padding-top:5px;}
#tabs.small {width: 267px; background: url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/top_small.png);}
#tabs ul {padding:0; margin:0; width:400px; list-style:none; position:relative;}
#tabs.small ul {width:267px;}
#tabs ul li {float:left; display:inline; width:125px; height:53px; margin:0 4px;}
#tabs ul li a.outer {display:block; width:125px; height:49px; border-bottom:1px solid #9c9c9c; text-align:center; line-height:45px; text-decoration:none; color:#464; font-weight:bold; margin-bottom:3px; font-size:11px;}
#tabs ul li img.tabimage {vertical-align:middle; padding-right:5px;}

#tabs ul li a.one {background:url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab.png) top left no-repeat;}
#tabs ul li a.two {background:url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab.png) top left no-repeat;}
#tabs ul li a.three {background:url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab.png) top left no-repeat;}
#tabs ul li a.four {background:url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab.png) top left no-repeat;}
#tabs ul li a.five {background:url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab.png) top left no-repeat;}
#tabs ul li a.six {background:url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab.png) top left no-repeat;}
#tabs ul li div {display:none;}

#tabs ul li:hover {padding-bottom:132px; border-bottom:1px solid #fff; color:#000; margin-bottom:0;}

#tabs ul li:hover > a.outer {color:#000; background-position:0 -55px; height:55px; cursor:default;}

* html #tabs ul li a.outer:hover {padding-bottom:130px; border-bottom:1px solid #fff; height:55px; color:#000; margin-bottom:0;background-position:0 -55px; height:55px; cursor:default;}

#tabs ul li:hover div {display:block; padding:5px; position:absolute; left:4px; top:55px; width:381px; height:118px; border-bottom:3px solid #fff;}
#tabs.small ul li:hover div {width:248px;}
#tabs ul li a:hover div {display:block; padding:5px; position:absolute; left:4px; top:55px; width:381px; height:118px; border-bottom:3px solid #fff;}
#tabs.small ul li a:hover div {width:248px;}

#tabs ul li a:hover div.tab_left,
#tabs ul li:hover div.tab_left
{background:#fff url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab_left.png);}
#tabs.small ul li a:hover div.tab_left,
#tabs.small ul li:hover div.tab_left
{background:#fff url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab_left_small.png);}

#tabs ul li a:hover div.tab_center,
#tabs ul li:hover div.tab_center
{background:#fff url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab_center.png);}
#tabs.small ul li a:hover div.tab_center,
#tabs.small ul li:hover div.tab_center
{background:#fff url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab_center_small.png);}

#tabs ul li a:hover div.tab_right,
#tabs ul li:hover div.tab_right
{background:#fff url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab_right.png);}
#tabs.small ul li a:hover div.tab_right,
#tabs.small ul li:hover div.tab_right
{background:#fff url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/tab_right_small.png);}



.clear {height:0; line-height:0; overflow:hidden;}
#tabs span.base {display:block; height:5px;font-size:5px; color:#bc8f8f; background:url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/bottom.png) bottom;}
#tabs.small span.base {background:url(<?php echo str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))); ?>/sixinone_images/bottom_small.png) bottom;}
#tabs div h5 {font-size:11px; margin-bottom:10px;}
#tabs div p {font-weight:normal; text-align:left; color:#000; margin-top:3px;}
#tabs div a img {border:0;}
#tabs div img.image {float:left; border:0; margin-top:-35px; margin-right:5px;}
#tabs p.bold {color:#069; padding-top:5px;}
* html #tabs p.fire {margin-top:-15px;}
* html #tabs form {margin-top:-20px;}
#tabs p.buttons {text-align:center;}

div#tabswrapper {
height:170px;
}

/* ### Kubrik Fix ### */
#sidebar ul div#tabs ul li:before {
	content: "";
	}
#sidebar ul div#tabs ul li {
	margin: 0 4px;
	}
#sidebar ul div#tabs ul {
	margin: 0;
	}

</style>
<?php
}

function sixinone_control() {
	$options = get_option('widget_sixinone');
	if ( !is_array($options) )
		$options = array('thin'=>true);		
	
	if ( $_POST['sixinone-submit'] ) {
		
		for($i=1; $i<=6; $i++) {
			$options['names'][$i] = strip_tags(stripslashes($_POST['sixinone-name'.($i)]));
		}
		
		for($i=1; $i<=6; $i++) {
			$options['commands'][$i] = str_replace('?>','',str_replace('<?php','',stripslashes($_POST['sixinone-command'.($i)])));
		}
		
		for($i=1; $i<=6; $i++) {
			$options['images'][$i] = strip_tags(stripslashes($_POST['sixinone-image'.($i)]));
		}
		
		$options['thin'] = strip_tags(stripslashes($_POST['sixinone-thin']));
		
		update_option('widget_sixinone', $options);
	}
	
	echo '<strong>Plugin Layout:</strong><br />';
	echo '<input type="radio" id="sixinone-thin" name="sixinone-thin" ' . ($options['thin'] ? 'checked="checked "' : '') . 'value="true">Thin (2x3)     ';
	echo '<input type="radio" id="sixinone-thin" name="sixinone-thin" ' . (!$options['thin'] ? 'checked="checked "' : '') . 'value="">Wide (3x2)';
	

	echo '<table><tr>';
	for($i=1; $i<=6; $i++)
	{
		echo '<td><strong>Plugin '.$i.':</strong><br />';
		echo 'Image Filename: <input style="width: 200px;" id="sixinone-image'.$i.'" name="sixinone-image'.$i.'" type="text" value="'.$options['images'][$i].'" /><br />';
		echo 'Name: <input style="width: 200px;" id="sixinone-name'.$i.'" name="sixinone-name'.$i.'" type="text" value="'.$options['names'][$i].'" /><br />';
		echo 'Command: <input style="width: 200px;" id="sixinone-command'.$i.'" name="sixinone-command'.$i.'" type="text" value="'.$options['commands'][$i].'" /></td>';
		if ($i == 3)
			echo '</tr><tr>';
	}
	echo '</tr></table>';
	
	echo '<input type="hidden" id="sixinone-submit" name="sixinone-submit" value="1" />';
}

function sixinone_addMenu() {
	add_options_page("Meyshan 6 in 1", "Meyshan 6 in 1" , 8, __FILE__, 'sixinone_optionsMenu');
}

function sixinone_optionsMenu() {
	echo '<div style="width:675px; margin:auto;"><form method="post">';
	sixinone_control();
	echo '<p class="submit"><input value="Save Changes »" type="submit"></form></p></div>';
}


function widget_sixinone_init() {


	if (!function_exists('register_sidebar_widget'))
		return;
	
	function widget_sixinone($args) {
		extract($args);
		
		echo $before_widget;
		sixinone();
		echo $after_widget;
	}

	
	register_sidebar_widget('Meyshan 6 in 1', 'widget_sixinone');
	register_widget_control('Meyshan 6 in 1', 'sixinone_control', 675, 380);
}

add_action('admin_menu', 'sixinone_addMenu');
add_action('plugins_loaded', 'widget_sixinone_init');
add_action('wp_head', 'widget_sixinone_css');


?>
