<?php
/*
Plugin Name: Affiliate Link Cookie Maker
Plugin URI: http://zafrira.net/services/wordpress-plugins/affiliate-link-cookie-maker/
Description: To make sure affiliate link cookies are activated upon page visit and not by link clicking. Put the shortcode in stead of a normal link <i>Use: [afflink url=&#34;url&#34; name=&#34;name&#34;]</i>
Version: 2.0.1
Author: Zafrira
Author URI: http://zafrira.net
*/
if(!is_admin()){
	add_shortcode('afflink','Zafrira_AffiliateLinkMaker'); 
}


function Zafrira_AffiliateLinkMaker($atts)
	{
	$newlink = '<a href="' . $atts[url] . '" target="_blank">' . $atts[name] . '</a>';
	$embedder = '<div style="width:1px;height:1px;position:absolute;top:0;left:0;z-index:-100;" id="Zafrira_AffiliateLinkMaker_Div"><iframe id="Zafrira_AffiliateLinkMaker_Frame" frameborder="0" src="' . $atts[url] . '" style="width: 1px; height: 1px; margin: 0px;" scrolling="no" allowTransparency="true"> </iframe></div>';
	return $newlink . " " . $embedder;
	}