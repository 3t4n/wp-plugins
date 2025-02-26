<?php
/*
Plugin Name: AdTaily Widget Light
Plugin URI: http://ageno.pl/wordpress/adtaily-widget-light
Description: Super simple widget for AdTaily ads. Shows ads in your widgetized sidebar.
Author: Maksymilian Sleziak
Tags: sidebar, adtaily, ads, ad, ageno, pl, maxbmx, widget, simple, advert, plugin, plug, plug-in, reklama, reklamy, reklam, banery, baner, 125px, ageno.pl, Maksymilian, Sleziak
Author URI: http://maksymilian.sleziak.com/
Version: 1.0
License: GPL2

	Check: http://ageno.pl/ - Good websites based on Wordpress and more...
	
	____________________________________________________________________________
	
	USAGE:
	
	Copyright (C) 2010  Maksymilian Sleziak  maksymilian.sleziak.com, ageno.pl
	
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.	    

	AWL - AdTaily Widget Light - free free free FREE, but it will be super cool if you put link to us in footer - ageno.pl
*/

function AWL($args) 
{ 	

	extract($args);
	
	$options = get_option("AWL");

	if (!is_array( $options )) 
	$options = array('title' => 'AdTaily','content' => '','author' => '1');
	
	echo '<!-- start of AdTaily Widget Light -->';
	echo $before_widget;
	echo $before_title.$options['title'].$after_title.'';
	echo '<div style="clear:both; display:block; position:relative;">';
	echo $options['content'];
	if($options['author'] == 1)//!display author
	{
		echo '<span style="font-size:10px; text-align:center; margin:0 auto;">Author: <a href="http://maksymilian.sleziak.com/" title="Maksymilian Sleziak">maxbmx</a> &amp; <a href="http://ageno.pl/" title="Good SEO websites">ageno</a></span>'; //please do not 
	}	  
	echo '</div>';  
	echo $after_widget;
	echo '<!-- !end of AdTaily Widget Light, check: http://ageno.pl -->';

}

function AWL_control()
{
	$options = get_option("AWL");
	
	if (!is_array( $options ))
	$options = array('title' => 'AdTaily','content' => '','author' => '1');

	if ($_POST['AWL-Submit']) // !Submit!
	{
		$options['title'] = htmlspecialchars($_POST['AWL-WidgetTitle']);
		$options['content'] = str_replace("  ", "", (trim(stripslashes($_POST['AWL-WidgetContent']))));
		$options['author'] = $_POST['AWL-WidgetAuthor'];
		update_option("AWL", $options);
	}
?>	
	<p>
	    <label for="AWL-WidgetTitle">Title: 
	    	<input type="text" id="AWL-WidgetTitle" name="AWL-WidgetTitle" value="<?php echo $options['title'];?>"/>
	    </label>
	</p>
	<p>
	    <label for="AWL-WidgetContent" style="clear:both; display:block;">AdTaily code: <span style="font-size:10px; float:right; color:#999;">paste it here</span></label>
	    <textarea id="AWL-WidgetContent" style="width:97%" name="AWL-WidgetContent" rows="12"><?php echo $options['content'];?></textarea>
	</p>
	<p>
	    <label for="AWL-WidgetAuthor">Show author: 
	    	<input type="checkbox" id="AWL-WidgetAuthor" name="AWL-WidgetAuthor" <?php if ($options['author']==1){ echo 'checked=checked';}?> value="1"/>
	    </label>
	</p>
    <p>
    		<input type="hidden" id="AWL-Submit" name="AWL-Submit" value="1" />
	</p>
<?php
}

function AWL_init()
{
	register_sidebar_widget('AdTaily Widget Light', 'AWL');
	register_widget_control('AdTaily Widget Light', 'AWL_control');
}
add_action("plugins_loaded", "AWL_init");
?>