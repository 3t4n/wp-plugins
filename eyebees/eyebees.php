<?php
ob_start();
/*
Plugin Name: Eyebees
Plugin URI: http://www.eyebees.com
Description: chat and interact with your website visitor real-time.
Author: Eyebees
Version: 1.0
Author URI: http://www.eyebees.com

    This code is a modified version of My Widget
    My Widget is released under the GNU General Public License (GPL)
    http://www.gnu.org/licenses/gpl.txt

    This is a WordPress plugin (http://wordpress.org) and widget
    (http://automattic.com/code/widgets/).
*/


function widget_mywidget_init() {


    if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
        return;
    function widget_mywidget($args) 
    {
	extract($args);
	$options = get_option('widget_mywidget');
	$swarmcode_id = empty($options['swarmcode_id']) ? '441503f14474dd94e904323340e04e98' : $options['swarmcode_id'];
   	$swarmcode_type =empty($options['swarmcode_type']) ? 'static' : $options['swarmcode_type'];
  	switch(strtolower($swarmcode_type))
	{
  	  case 'static' :    $swarmcode_html= "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://www.eyebees.com/swarms/$swarmcode_id/swarming.css.php\"></link> 
             <div id=\"main_swarmgridcontainer\" class=\"main_swarmgridcontainer\">  
             <script src=\"http://www.eyebees.com/swarms/$swarmcode_id/swarming_container.js.php\">
             </script></div>";
             		     break;
  	  case 'dynamic'  : $swarmcode_html= "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://www.eyebees.com/swarms/$swarmcode_id/swarming.css.php\"></link> <script src=\"http://www.eyebees.com/swarms/$swarmcode_id/swarming_container.js.php\"> </script>";
  	  		    break;	
  	}

        /*
        static  441503f14474dd94e904323340e04e98
        dynamic 685645fdc237d1dc9a88277bc1c62f4e
        */
  	echo $swarmcode_html;
    }    
    
    function widget_mywidget_control() 
    {

        // Collect our widget's options.
        $options = get_option('widget_mywidget');

        // This is for handling the control form submission.
        if ( $_POST['mywidget-submit'] ) 
        {
            // Clean up control form submission options
	   $newoptions['swarmcode_id'] = strip_tags(stripslashes($_POST['swarmcode_id']));
	   $newoptions['swarmcode_type'] = strip_tags(stripslashes($_POST['swarmcode_type']));
	   if ( $options != $newoptions ) 
	   {
		   $options = $newoptions;
		   update_option('widget_mywidget', $options);
	   }
        }
	 $swarmcode_id = htmlspecialchars($options['swarmcode_id'], ENT_QUOTES);
	 $swarmcode_type = htmlspecialchars($options['swarmcode_type'], ENT_QUOTES);
// The HTML below is the control form for editing options.
	echo  "<div>
	<label for=\"swarmcode_id\" style=\"line-height:35px;display:block;\">Swarm code: 
	<input type=\"text\" id=\"swarmcode_id\" name=\"swarmcode_id\" value=\"$swarmcode_id\" />
	</label>
        <label for=\"swarmcode_type\" style=\"line-height:35px;display:block;\">Swarm type: 
	<input type=\"text\" id=\"swarmcode_type\" name=\"swarmcode_type\" value=\"$swarmcode_type\" />
        </label>
        <input type=\"hidden\" name=\"mywidget-submit\" id=\"mywidget-submit\" value=\"1\" />
	</div>";
    }
 // This registers the widget. About time.

    register_sidebar_widget('Eyebees', 'widget_mywidget');

    // This registers the (optional!) widget control form.
    register_widget_control('Eyebees', 'widget_mywidget_control');
}    
// Delays plugin execution until Dynamic Sidebar has loaded first.
add_action('plugins_loaded', 'widget_mywidget_init');
?>    



