<?php
/*
Plugin Name: Avishi Floating Horizontal Navigation
Version: 1.0
Plugin URI: http://tips-tricksandfix.com/avishi-floating-horizontal-navigation
Author: Avishika Web Studio
Author URI: http://avishiwebstudio.com
Description: Keep your primary Navigation at the top as you scroll down the page.
*/
?>
<?php
/*  Copyright 2012  Avishika Web Studio  (email : info@tips-tricksandfix.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php
//add option to the DB
add_option('avishi_navigation_id','Enter your Container ID here!');



//Adding admin menu
function avishi_flt_nav_add_admin_menu()
{
	add_options_page('Avishi Floating Navigation', 'Avishi Floating Navigation', 5, __FILE__, 'avishi_flt_option');
}
add_action('admin_menu', 'avishi_flt_nav_add_admin_menu');

function avishi_scripts_method() {
    wp_enqueue_script('jquery');            
}    
 
add_action('wp_enqueue_scripts', 'avishi_scripts_method'); // For use on the Front end (ie. Theme)


function avishi_wp_footer() {

$avishi_flt_navi_id  = get_option('avishi_navigation_id');

echo "<script>
/****************************************
 * Floating Navigation jQuery feature
 ****************************************/
(function($) {
         
    // get initial top offset of navigation
    var floating_navigation_offset_top = $('#$avishi_flt_navi_id').offset().top;
    var floating_navigation_offset_left = $('#$avishi_flt_navi_id').offset().left;
	 
	 
    // define the floating navigation function
    var floating_navigation = function(){
                // current vertical position from the top
        var scroll_top = $(window).scrollTop();
         
        // if scrolled more than the navigation, change its
                // position to fixed to float to top, otherwise change
                // it back to relative
        if (scroll_top > floating_navigation_offset_top) {
            $('#$avishi_flt_navi_id').css({ 'position': 'fixed', 'top':'0'});
        } else {
            $('#$avishi_flt_navi_id').css({ 'position': 'relative'});
        }  
    };
     
    // run function on load
    floating_navigation();
     
    // run function every time you scroll
    $(window).scroll(function() {
         floating_navigation();
    });
 
})(jQuery);
</script>";






}
add_action('wp_footer', 'avishi_wp_footer');

function avishi_flt_option()
{
?>
<div class="wrap">
    
    <div class="titleBox">
    <h1 class="pluginTitle">Avishi Floating Horizontal Navigation </h1>
    <small>Developed by AvishiWebStudio.com</small>
    </div>
    
    <div class="usageBox" >
    Plugin Usage : 
    
    <ol>
    <li>Enter your Navigation Container ID.</li> 
     </ol>
     
     </div>
    
    
    
    
    <?php
	if(isset($_POST['submit']))
	{
		//update Id on Database
		update_option('avishi_navigation_id',$_POST['avishi_navigation_id']);
		
		echo '<div id="message" class="updated fade"><p><strong>';
		echo "Options updated";
        echo '</strong></p></div>';
	}
	
	
	//retrive Id from Database
	$avishi_flt_navi_id  = get_option('avishi_navigation_id');
	
	?>
    
    <br /><br />
    <h2>Required Settings</h2>    
    
    <form name="avishiFLTNavOptions" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">

<table cellpadding="10" cellspacing="0" class="settingTable" >

<tr><td>
  
    <strong>Floating Navigation Contaciner ID</strong>  </td><td>:</td><td> #<input type="text" name="avishi_navigation_id" class="avishiTextBox" value="<?php echo $avishi_flt_navi_id;   ?>" />
  </td></tr>
   
   
  

  
  
    
    
 <tr><td>
    <input type="submit" name="submit" value="Save Settings" />
    </td></tr>
    </table>
    
    </form>
    
    
    
    
    
   </div>


<?php
}

?>