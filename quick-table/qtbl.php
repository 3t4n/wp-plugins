<?php
/*
Plugin Name: Quick Table
Version: 1.0.0
Plugin URI: http://www.save-o-matic.com
Description: Very simeple plugin to add shorcode to add tables. Makes work faster, and sometimes cleaner, when you only need a simple one line table...

Author: Rodger Cravens
Author URI: http://www.save-o-matic.com
*/

/*  Copyright 2014  Rodger Cravens, (email : rodger.cravens@gmail.com)

    This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA */

// This adds support for a "qtbl" shortcode
add_shortcode( 'qtbl', 'qtbl_shortcode_fn' );

function qtbl_shortcode_fn($atts, $content = '') 
{
  
  extract(shortcode_atts(array(
      'style' => '',
   ), $atts));
  
    // wrapped content is in $content, so let's return it after we try and execute any shortcode
    $content = '<table><tr><td style="' . $style . '">' . do_shortcode($content) . '</td></tr></table>';
    return $content;
}
?>