<?php
/*
Plugin Name: Limundo widget
Plugin URI: http://www.blogovnik.com/widget/limundo
Description: Limundo widget - show your auctions to your blog under the post/ Prikazuje Vase limundo aukcije na Vasem blogu.
Version: 0.1
Author: Dejan Major - mangup
Author URI: http://www.blogovnik.com/
*/

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

$ver= '0.1';

add_action('the_content', 'add_limundo_widget');

add_action('admin_menu','limundo_admin_menu');

function limundo_admin_menu(){

    add_options_page('Limundo.com', 'Limundo.com', 9, basename(__FILE__), 'limundo_seting'); 

}

function limundo_seting(){

if ($_POST['action'] == 'update') {

    $_POST["limundo_show_pages"] == "on" ? update_option("limundo_on_page", "checked") : update_option("limundo_on_page", "");  
    $_POST["limundo_show_posts"] == "on" ? update_option("limundo_on_post", "checked") : update_option("limundo_on_post", "");  
    $_POST["limundo_username"] != "" ? update_option("limundo_username", $_POST["limundo_username"]) : update_option("limundo_username", "");  

    $message = '<div id="message" class="updated fade"><p><strong>Options Saved</strong></p></div>';

    }
     $options["page"] = get_option("limundo_on_page");
     $options["post"] = get_option("limundo_on_post");
     $options["username"] = get_option("limundo_username");

    echo ' 
    <div class="wrap"> 
    '.$message.' 
    <div id="icon-options-general" class="icon32"><br /></div> 
    <h2>Limundo Widget Settings</h2> 

     <form method="post" action=""> 
     <input type="hidden" name="action" value="update" /> 

     <h3>Where to show limundo widget:</h3> 
      <input name="limundo_show_pages" type="checkbox" id="show_pages" '.$options['page'].' /> Pages<br /> 
      <input name="limundo_show_posts" type="checkbox" id="show_posts" '.$options['post'].' /> Posts<br /> 
      <br /> 
     <h3>Username from <a href="http://www.limundo.com/ref/mangup024" target="_blank">limundo.com</a> website</h3>
      <input name="limundo_username" type="text" id="limundo_username" value="'.$options["username"].'" /> <small>(leave blank if You don\'t have auction to show hot auction!)</small>
      <br /><br />
      <input type="submit" class="button-primary" value="Save Changes" /> 
      </form> 

       </div><br /><br />';  
       
       echo limundo_widget();




}

function add_limundo_widget($content) {

     $options["page"] = get_option("limundo_on_page");
     
     $options["post"] = get_option("limundo_on_post");
     
    if ( (is_single() && $options["post"]) || (is_page() && $options["page"]) ) {
    
	$content .= limundo_widget();

    }

    return $content;

}

function limundo_widget(){
    
    $options["username"] = get_option("limundo_username");

		$link1 = 'http://www.blogovnik.com/widget/limundo/limundo-widget-korisnik2.php?k='.$options["username"];
		$link2 = 'http://www.blogovnik.com/widget/limundo/limundo-widget-aukcije.php';
		
	$link = ($options["username"] == '') ? $link2 : $link1;	
		
	$output = '<div>';
	 

    

    $output .= '
    
<!-- limundo widget www.blogovnik.com -->
<script src="'.$link.'" type="text/javascript"></script>
<!-- limundo widget www.blogovnik.com -->
    ';

    $output .= '</div>';
    
    return $output;
    
}