<?php
/*
Plugin Name: Nepali Date
Plugin URI: http://www.hostyasui.com
Description: Display Nepali date in your website easily
Author: govinda khatiwada
Version: 1.1
Author URI: http://www.hostyasui.com

*/


// We're putting the plugin's functions inside the init function to ensure the
// required Sidebar Widget functions are available.
  
  function widget_nepal_date_init() 
	  {
	  /* Your custom code starts here */
	  /* ---------------------------- */
	  
	  /* Your Function */
	  function nepal_date()
	  {
		  
		  /* Your Code ----------------- */ 
		  
		  $url = file_get_contents("http://hostyasui.com/nepalidate/date.php");
		return $url;
 
		  
		  /* End of Your Code ---------- */
		  
	  }
	  add_shortcode('nepalidate', 'nepal_date');  
	  /* -------------------------- */
	  /* Your custom code ends here */
	  
	  function widget_nepal_date($args) 
	  {
	  
	  	  // Collect our widget's options, or define their defaults.
		  $options = get_option('widget_nepal_date');
		  $title = empty($options['title']) ? __('Nepali Date') : $options['title'];
			
		  extract($args);
		  echo $before_widget;
		  echo $before_title;
		  echo $title;
		  echo $after_title;
		 echo nepal_date();
		  echo $after_widget;
	  }  
	  
	  // This is the function that outputs the form to let users edit
	  // the widget's title. It's an optional feature, but were're doing 
	  // it all for you so why not!
	  
	  function widget_nepal_date_control()
	  {
	  
		// Collect our widget options.
		$options = $newoptions = get_option('widget_nepal_date');
		
		// This is for handing the control form submission.
		if ( $_POST['widget_nepal_date-submit'] ) 
		{
			// Clean up control form submission options
			$newoptions['title'] = strip_tags(stripslashes($_POST['widget_nepal_date-title']));
		}
				
		// If original widget options do not match control form
		// submission options, update them.
		if ( $options != $newoptions ) 
		{
			$options = $newoptions;
			update_option('widget_nepal_date', $options);
		}
						
		$title = attribute_escape($options['title']);

		echo '<p><label for="nepal_date-title">';
		echo 'Title: <input style="width: 250px;" id="widget_nepal_date-title" name="widget_nepal_date-title" type="text" value="';
		echo $title;
		echo '" />';
		echo '</label></p>';
		echo '<input type="hidden" id="widget_nepal_date-submit" name="widget_nepal_date-submit" value="1" />';
	  }
	  
	  
	// This registers the widget.
    register_sidebar_widget('Nepali Date', 'widget_nepal_date');
	
	// This registers the (optional!) widget control form.
    register_widget_control('Nepali Date', 'widget_nepal_date_control');
	
  }
    
  add_action('plugins_loaded', 'widget_nepal_date_init');
 add_filter('widget_text', 'do_shortcode'); 
?>