<?php
/*
Plugin Name: ClickBank Hop Ad
Version: 1.0
Plugin URI: http://opensolv.com/cbhopad
Description: This plugin allows users to add a ClickBank Text Ad as a configurable widget. 
Author: Hans Bakker
Author URI: http://opensolv.com
*/

$pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_settings('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';


//Anything you echo in this functionu will be placed in the pages header.  To use this function, you must uncomment this line at the bottom of this file: add_action('wp_head', 'cbhopad_header');
function cbhopad_header()
{
	
//reserved.. not in use


}

//This is a wrapper for the main function, which grabs the parameters from a direct function call, or from the options database.  The first parameter is important, because it allows you to have the direct data returned.  I use this to insert a plugin contents into a post with the content_cbhopad function. If you don't pass any other arguments, the options will be pulled from those set in the options panel.
function cbhopad($echo = 'true',
	$parameter1 = '',
	$parameter2 = '',
	$parameter3 = '',
	$parameter4 = '',
	$parameter5 = '',
	$parameter6 = '',
	$parameter7 = '',
	$parameter8 = '',
	$parameter9 = '',
	$parameter10 = '',
	$parameter11 = '',
	$parameter12 = '',
	$parameter13 = '',
	$parameter14 = ''
	)
{
	$options = get_option('cbhopad');
	$parameter1 = (($parameter1 != '') ? $parameter1 : $options['parameter1']);
	$parameter2 = (($parameter2 != '') ? $parameter2 : $options['parameter2']);
	$parameter3 = (($parameter3 != '') ? $parameter3 : $options['parameter3']);
	$parameter4 = (($parameter4 != '') ? $parameter4 : $options['parameter4']);
	$parameter5 = (($parameter5 != '') ? $parameter5 : $options['parameter5']);
	$parameter6 = (($parameter6 != '') ? $parameter6 : $options['parameter6']);
	$parameter7 = (($parameter7 != '') ? $parameter7 : $options['parameter7']);
	$parameter8 = (($parameter8 != '') ? $parameter8 : $options['parameter8']);
	$parameter9 = (($parameter9 != '') ? $parameter9 : $options['parameter9']);
	$parameter10 = (($parameter10 != '') ? $parameter10 : $options['parameter10']);
	$parameter11 = (($parameter11 != '') ? $parameter11 : $options['parameter11']);
	$parameter12 = (($parameter12 != '') ? $parameter12 : $options['parameter12']);
	$parameter13 = (($parameter13 != '') ? $parameter13 : $options['parameter13']);
	$parameter14 = (($parameter14 != '') ? $parameter14 : $options['parameter14']);
	if($echo)
	{
		echo cbhopad_return (
		$parameter1, 
		$parameter2, 
		$parameter3,
		$parameter4,
		$parameter5,
		$parameter6,
		$parameter7,
		$parameter8,
		$parameter9,
		$parameter10,
		$parameter11,
		$parameter12,
		$parameter13,
		$parameter14		
		);
	}
	else
	{
		return cbhopad_return (
		$parameter1, 
		$parameter2, 
		$parameter3,
		$parameter4,
		$parameter5,
		$parameter6,
		$parameter7,
		$parameter8,
		$parameter9,
		$parameter10,
		$parameter11,
		$parameter12,
		$parameter13,
		$parameter14		);
	}
}

//This is the heart of the plugin, where you get to write your own php code.  I'm afraid I can't help you with that, as it will be completely unique to your plugin.  Just make sure to return your output, instead of echoing it.  The parameters will be passed directly from the cbhopad function, so you don't need to use get_options().
function cbhopad_return (
		$parameter1, 
		$parameter2, 
		$parameter3,
		$parameter4,
		$parameter5,
		$parameter6,
		$parameter7,
		$parameter8,
		$parameter9,
		$parameter10,
		$parameter11,
		$parameter12,
		$parameter13,
		$parameter14		)
{
	global $pluginpath;
	$output =			
                    	'<!--begin hopad-->' ."\n"
						.'<div id="cbhopad">' ."\n"
						.'<script language="javascript">' ."\n"
                        .'hopfeed_template="";' ."\n"
                        ."hopfeed_align='LEFT';" ."\n"
                        ."hopfeed_type='IFRAME';" ."\n"
                        ."hopfeed_affiliate_tid='" . $parameter3 . "';" ."\n"
                        ."hopfeed_affiliate='" . $parameter1 . "';" ."\n"
                        ."hopfeed_fill_slots='true';" ."\n"
                        .'hopfeed_height=' . $parameter5 . ';' ."\n"
                        .'hopfeed_width=' . $parameter4 . ';' ."\n"
                        .'hopfeed_cellpadding=0;' ."\n"
                        .'hopfeed_rows=' . $parameter12 . ';' ."\n"
                        .'hopfeed_cols=' . $parameter11 . ';' ."\n"
                        ."hopfeed_font='" . $parameter8 . "';" ."\n"
                        ."hopfeed_font_size='" . $parameter10 . "';" ."\n"
                        ."hopfeed_font_color='" . $parameter9 . "';" ."\n"
                        ."hopfeed_border_color='" . $parameter14 . "';" ."\n"
                        ."hopfeed_link_font_color='" . $parameter6 . "';" ."\n"
                        ."hopfeed_link_font_hover_color='" . $parameter7 . "';" ."\n"
                        ."hopfeed_background_color='" . $parameter13 . "';" ."\n"
                        ."hopfeed_keywords='" . $parameter2 . "';" ."\n"
                        ."hopfeed_path='http://" . $parameter1 . ".hopfeed.com';" ."\n"
                        ."hopfeed_link_target='_blank';" ."\n"
                        .'</script>' ."\n"
                        ."<script src='http://" . $parameter1 . ".hopfeed.com/script/hopfeed.js'></script>" ."\n"
						.'</div>' ."\n"
                    	.'<!--end hopad-->' ."\n";
						
	return($output);
}

//This function can be used to insert the function output in a particular post.  In the code view of a Wordpress post, insert a tag like this: <!--cbhopad-->, or <!--cbhopad(paramater1value)-->.  The plugin will spit out its results at that point in the post content.
function content_cbhopad($content)
{
	if(preg_match('/<!--cbhopad[\(]*(.*?)[\)]*-->/',$content,$matches))
	{
		$parameter1 = $matches[1];
		$content = preg_replace('/<!--cbhopad(.*?)-->/',cbhopad(false,$parameter1), $content);
	}
	return $content;
}

//This function creates a backend option panel for the plugin.  It stores the options using the wordpress get_option function.
function cbhopad_control()
{
		
		$options = get_option('cbhopad');
		
		if ( !is_array($options) )
		{
			//This array sets the default options for the plugin when it is first activated.
			//options are overridden onced saved to the database (in wp-options where option_name = 'cbhopad')
			$options = array('title'=>'ClickBank Products', 
			'parameter1'=>'yourcbid', 
			'parameter2'=>'weight loss, diet', 
			'parameter3'=>'sometid',
			'parameter4'=>'164',
			'parameter5'=>'345',
			'parameter6'=>'#525252',
			'parameter7'=>'#C07D2A',
			'parameter8'=>'Georgia, "Times New Roman", Times, Arial',
			'parameter9'=>'#775931',
			'parameter10'=>'12px',
			'parameter11'=>'1',
			'parameter12'=>'4',
			'parameter13'=>'#EDEDED',
			'parameter14'=>'#EDEDED'			
			);
		}
		if ( $_POST['cbhopad-submit'] )
		{
			$options['title'] = strip_tags(stripslashes($_POST['cbhopad-title']));

			//One of these lines is needed for each parameter
			$options['parameter1'] = strip_tags(stripslashes($_POST['cbhopad-parameter1']));
			$options['parameter2'] = strip_tags(stripslashes($_POST['cbhopad-parameter2']));
			$options['parameter3'] = strip_tags(stripslashes($_POST['cbhopad-parameter3']));
			$options['parameter4'] = strip_tags(stripslashes($_POST['cbhopad-parameter4']));
			$options['parameter5'] = strip_tags(stripslashes($_POST['cbhopad-parameter5']));
			$options['parameter6'] = strip_tags(stripslashes($_POST['cbhopad-parameter6']));
			$options['parameter7'] = strip_tags(stripslashes($_POST['cbhopad-parameter7']));
			$options['parameter8'] = strip_tags(stripslashes($_POST['cbhopad-parameter8']));
			$options['parameter9'] = strip_tags(stripslashes($_POST['cbhopad-parameter9']));
			$options['parameter10'] = strip_tags(stripslashes($_POST['cbhopad-parameter10']));
			$options['parameter11'] = strip_tags(stripslashes($_POST['cbhopad-parameter11']));
			$options['parameter12'] = strip_tags(stripslashes($_POST['cbhopad-parameter12']));
			$options['parameter13'] = strip_tags(stripslashes($_POST['cbhopad-parameter13']));
			$options['parameter14'] = strip_tags(stripslashes($_POST['cbhopad-parameter14']));

			update_option('cbhopad', $options);
		}
		
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		include $pluginpath . 'cbhopad_control.inc.php';

}

//This function adds the options panel under the Options menu of the admin interface.  If you only want the options in the widget panel, you don't need this function, nor the cbhopad_optionsMenu one.
function cbhopad_addMenu()
{
	add_options_page("ClickBank Hop Ad", "ClickBank Hop Ad" , 8, __FILE__, 'cbhopad_optionsMenu');
}	

//This function is called by cbhopad_addMenu, and displays the options panel
function cbhopad_optionsMenu()
{
	echo '<div style="width:250px; margin:auto;"><form method="post">';
	cbhopad_control();
	echo '<p class="submit"><input value="Save Changes »" type="submit"></form></p></div>';
}

//This function is a wrapper for all the widget specific functions
//You can find out more about widgets here: http://automattic.com/code/widgets/
function widget_cbhopad_init()
{
	if (!function_exists('register_sidebar_widget'))
		return;
	
	//This displays the plugin's output as a widget.  You shouldn't need to modify it.
	function widget_cbhopad($args)
	{
		extract($args);
				
		$options = get_option('cbhopad');
		$title = $options['title'];

		echo $before_widget;
		echo $before_title . $title . $after_title;
		cbhopad();
		echo $after_widget;
	}
	
	
	
	register_sidebar_widget('ClickBank Hop Ad', 'widget_cbhopad');
	//You'll need to modify these two numbers to get the widget control the right size for your options.  
	//250 is a good width, but you'll need to change the 200 depending on how many options you add
	register_widget_control('ClickBank Hop Ad', 'cbhopad_control', 250, 200);
}
add_action('plugins_loaded', 'widget_cbhopad_init');

//future use:
//Uncomment this if you want the options panel to appear under the Admin Options interface
//add_action('admin_menu', 'cbhopad_addMenu');

//Uncomment this is you need to include some code in the header
//add_action('wp_head', 'cbhopad_header');

//Uncomment this if you want the token to be called using a token in a post (<!--cbhopad-->)
//add_filter('the_content', 'content_cbhopad');


?>
