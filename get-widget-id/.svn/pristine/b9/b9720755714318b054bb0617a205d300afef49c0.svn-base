<?php

/*
Plugin Name: Get Widget ID
Description: Get ID of any active widget.
Version: 1.0
Author: a.ankit
Author URI: http://spicemailer.com
License: GPLv2 or later
Text Domain: gwid
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/




add_action('in_widget_form', 'spice_get_widget_id');

function spice_get_widget_id($widget_instance)

{
    
    // Check if the widget is already saved or not. 
    
    if ($widget_instance->number=="__i__"){
     
     echo "<p><strong>Widget ID is</strong>: Pls save the widget first!</p>"   ;
    
    
  }  else {

        
       echo "<p><strong>Widget ID is: </strong>" .$widget_instance->id. "</p>";
         
 
    }
}

