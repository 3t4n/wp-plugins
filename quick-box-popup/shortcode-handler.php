<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$xyz_qbx_cache_enable=get_option("xyz_qbx_cache_enable");
$xyz_qbx_enable=get_option('xyz_qbx_enable');
$page_option=get_option('xyz_qbx_page_option');
if($xyz_qbx_enable==1 )
{
	if($xyz_qbx_cache_enable==1)
	{
        add_shortcode( 'xyz_qbx_default_code', 'xyz_qbx_shortcode' );
    }
    else
    {
    	if($page_option==3)
    	   add_shortcode( 'xyz_qbx_default_code', 'xyz_qbx_lightbox_display' );
    }	
}    
function xyz_qbx_shortcode()
{
return "<span id='xyz_qbx_shortcode'></span>";
}
?>