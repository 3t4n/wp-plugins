<?php
/*
Plugin Name: Quick Save
Plugin URI: http:/50wave.com
Description: CTR + S / CMD + S Save Code and post
Author: Malith MCR
Version: 1.6
Author URI: http://50wave.com/
*/

if ( defined( 'ABSPATH' )){

// Menu Page
  add_action('admin_menu','init_quicksave_admin_menu');
    function init_quicksave_admin_menu(){
    
    	add_options_page('Quick Save','Quick Save','manage_options','quicksave-settings','init_quicksave_admin_option_page');
    
    }

function init_quicksave_admin_option_page(){ 

 ?>
 <script>
 document.addEventListener("keydown", function(e) {
  if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
    e.preventDefault();
    alert('Working');
  }
}, false);
 </script>
 <ul>
    <li>Control + S for save on Theme/Plugin editor</li>
</ul>
<?php
    
}

// Code Editor Save

function quicksave_add_editor_styles() {
         ?>
 <script>
 document.addEventListener("keydown", function(e) {
  if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
    e.preventDefault();
    var theme = document.getElementById('submit');
    var post = document.getElementById('publish');
    if(theme != "")
    theme.click();
    else
    post.click();

  }
}, false);
 </script>
 <?php
}
add_action( 'admin_head', 'quicksave_add_editor_styles' );



}

?>