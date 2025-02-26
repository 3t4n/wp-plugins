<?php
/*
Plugin Name: (a) QR Code
Plugin URI: http://anton.shevchuk.name
Description: QR Code generator for your blog (based on Google Charts API)
Version: 0.1
Author: Anton Shevchuk
Author URI: http://anton.shevchuk.name
*/

/* CONFIG SECTION */

/* DEFINES SECTION */

/* SYSTEM SECTION */

/**
 * aQRCode
 *
 * generate qr code
 *
 * @access  public
 * @param   string  $chl data
 * @param   integer $chs dafault 150x150
 * @param   string  $choe  
 * @param   string  $chld  ECC level (L or M or Q or H)
 * @param   integer $margin  
 * @return  string
 */
function aQRCodeG($chl, $chs = '150', $choe = 'UTF-8', $chld = 'L', $margin = '4') 
{
    $chl  = urlencode($chl);
    
    if ($chs > 546) $chs = 546;
    $chs  = $chs .'x'. $chs;
    
    $chld = strtoupper($chld);
    switch ($chld) {
        case 'L':
        case 'M':
        case 'Q':
        case 'H':
            break;
        default:
            $chld = 'L';
            break;
    }
    $chld = $chld .'|'. $margin;
    
    $url  = 'http://chart.apis.google.com/chart?chs='.$chs.'&cht=qr&chl='.$chl.'&choe='.$choe.'&chld='.$chld;
    return $url;
}