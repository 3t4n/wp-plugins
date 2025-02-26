<?php
/**
 * @package Ayar Zawgyi Comment font converter
 * @version 0.0.1
 */
/*
Plugin Name: Ayar Zawgyi Comment font converter 
Plugin URI: http://wordpress.org/extend/plugins/ayar-unicode-combobox/
Description: Ayar Zawgyi Comment font converter is  mostly based on saturngod's MMEmbed plugin for Ayar Myanmar unicode User.
Contributors: Kyaw San
Contributors: URI: http://www.mmtalk.com
Original Authors : saturngod
Credits : saturngod
Version: 0.0.2
Tags: Ayar, Zawgyi, Myanmar, Fonts
*/

function addembed()
{
	$plugin_url= get_option('siteurl').'/wp-content/plugins/'.dirname(plugin_basename(__FILE__));
	
	if(!is_admin())
	{
	
	?>
	<script src="<?php echo $plugin_url ?>/browserdetect.js"></script>
	<link href='http://ayarunicodegroup.org/fonts.css' rel='stylesheet' type='text/css'/>
	<link href='http://cdn-mmpress.appspot.com/css?font=ayar' rel='stylesheet' type='text/css'/>
<link href='http://cdn-mmpress.appspot.com/css?font=ayar_takhu' rel='stylesheet' type='text/css/'>
<link href='http://cdn.myanmapress.com/css?font=ayar_kasone' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_nayon' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_wazo' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_wagaung' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_tawthalin' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_thadingyut' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_tazaungmone' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_natdaw' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_pyatho' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_tapotwe' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_tabaung' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_typewriter' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_juno' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=ayar_thawka' rel='stylesheet' type='text/css'/>
<link href='http://cdn.myanmapress.com/css?font=zawgyi' rel='stylesheet' type='text/css'/>
	<?php
	}
		//for convert zawgyi to unicode comment
		if(is_single())
		{
			if (get_option('uniemd_init') =="")
			{
				//init
				update_option('uniemd_init',1);
				update_option('uniemd_jquery',1);
				update_option('uniemd_converter',1);
			}
			
			if (get_option('uniemd_jquery') ==1)
			{
				//add jquery
	?>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<?php
			}
			if (get_option('uniemd_converter') ==1)
			{
	?>
			<script src="<?php echo $plugin_url ?>/zgcomment_convert.js"></script>
	<?php
			}
	?>
	<?php
		}
}
add_action('wp_head', 'addembed');
add_action('wp_footer','footercss');
add_filter('the_content', 'unicode_rss');

//footer for add css
function footercss()
{

$plugin_url= get_option('siteurl').'/wp-content/plugins/'.dirname(plugin_basename(__FILE__));

?>
<script src="<?php echo $plugin_url ?>/footermobile.js"></script>
<?php	
}

//for rss
function unicode_rss($content) {
	
	if(is_feed())
	{
		$content="<span style=\"font-family:Ayar, AyarTakhu, Ayar Takhu;\">".$content."</span>";
	}
	return $content;
}

require 'adminpanel.php';

?>