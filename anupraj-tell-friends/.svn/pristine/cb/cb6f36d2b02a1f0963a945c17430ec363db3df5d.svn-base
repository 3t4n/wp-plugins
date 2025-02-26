<?php
/*
Plugin Name: AnupRaj Tell Friends free
Plugin URI: http://anupraj.com.np/index.php/wp-plugins/anupraj-tell-friends
Description: <strong>ARTF</strong> : <a href="admin.php?page=anupraj-tell-friends/anupraj-tell-friends-options.php" title="Customize this plugin">Customize</a> this 'Tell a Friend' Plugin which is useful as <strong>SEO tool</strong> to <strong>drive traffic</strong>. You can use this plugin anywhere within your WordPress site as a link or a widget. [<a href="admin.php?page=anupraj-tell-friends/anupraj-tell-friends-options.php" title="Customize this plugin"><strong>Plugin Settings</strong></a>].
Version: 0.5
Author: Anup Raj 
Author URI: http://anupraj.com.np/
*/

/* options page */
$options_page = get_option('siteurl') . '/wp-admin/admin.php?page=anupraj-tell-friends/anupraj-tell-friends-options.php';
$ARTFpluginpath = get_option('siteurl').'/wp-content/plugins/anupraj-tell-friends';
/* Adds our admin options under "Options" */
function AnupRaj_Tell_Friends_options_page() {
	global $ARTFpluginpath;
	add_menu_page( 'Customize AnupRaj Tell Friends', 'Tell Friends', 1,"anupraj-tell-friends/anupraj-tell-friends-options.php",'',"$ARTFpluginpath/images/ARTF.ico" );
	
	add_submenu_page('anupraj-tell-friends/anupraj-tell-friends-options.php','AnupRaj Tell Friends Customization', 'ARTF > Customize', 9, "anupraj-tell-friends/anupraj-tell-friends-options.php" ,'','' );
	add_submenu_page('anupraj-tell-friends/anupraj-tell-friends-options.php','AnupRaj Tell Friends STATS', 'ARTF > Status', 9, "anupraj-tell-friends/anupraj-tell-friends-stats.php" ,'','' );
	add_submenu_page('anupraj-tell-friends/anupraj-tell-friends-options.php','AnupRaj Tell Friends Help', 'ARTF > Help', 8, "anupraj-tell-friends/anupraj-tell-friends-help.php" ,'','' );
}

function AnupRaj_Tell_Friends_head() {
	global $ARTFpluginpath;
    /* The next lines figures out where the javascripts and images and CSS are installed,
    relative to your wordpress server's root: */
    $plugin_path =  get_bloginfo('wpurl')."/wp-content/plugins/anupraj-tell-friends/";

    /* The xhtml header code needed for gallery to work: */
	$pluginscript = "
	<!-- begin 'AnupRaj Tell Friends' scripts -->
    <link rel=\"stylesheet\" href=\"".$plugin_path."lightbox.css.php\" type=\"text/css\" media=\"screen\" charset=\"utf-8\"/>
	<script type=\"text/javascript\" src=\"".$plugin_path."js/ARTFbox.js\"></script>
	<script type=\"text/javascript\" src=\"".$plugin_path."js/prototype.js\"></script>
    <script type=\"text/javascript\">ARTFbox.setPath('".$plugin_path."js/');</script>
	\n";
	
	/* Output $galleryscript as text for our web pages: */
	$additionaljs=<<< EOX
  <script type="text/javascript">
  <!--

  function processForm(){
    $('submit').disabled = true;
    $('submit').value = "Processing.  Please Wait...";

    $('formARTF').request({
      onSuccess: function(transport)
      {
        if(transport.responseText.match(/^Success/) != null) {
          alert('The information has been sent!');
          $('formARTF').reset();
		  
		  
        } else {
          alert(transport.responseText);
        }

        $('submit').value = 'Tell Friend(s)';
        $('submit').disabled = false;
      }
    });

    return false;
  }

  -->
  </script>	
	<!-- end  'AnupRaj Tell Friends' scripts -->
EOX;
	echo($pluginscript);
	echo($additionaljs);
}
function AnupRaj_Tell_Friends_divs(){
	global $ARTFpluginpath;
	if(get_option('ARTF_custom_msg')==""){$ARTF_custom_msg="Hi!
I just found this page. 
I believe the contents of the page is useful to view.
Thanks";}else{$ARTF_custom_msg=get_option('ARTF_custom_msg');}
	$ARTFuniquetime = md5(uniqid(time()));
	 
	$ARTFcustom_message="";
	if(get_option('ARTFcustom_message')==false){
	$ARTFcustom_message="
		<label for=\"ARTFmessage\">Message:</label><br />
		<textarea name=\"message\" style=\"width:310px; height:75px; padding:5px; color:gray\" id=\"ARTFmessage\">$ARTF_custom_msg</textarea>";
	}
	

	
	if(get_option('ARTFantiSPAM')==""){$ARTFantiSPAM = "We hate SPAM, hence we don't store emails :)";}else{$ARTFantiSPAM = get_option('ARTFantiSPAM');}
	
	if(get_option('ARTFcusTitle')==""){$ARTFcusTitle = "Tell Your Friends";}else{$ARTFcusTitle = get_option('ARTFcusTitle');}
	$ARTFdivs =<<< EOY

<div id="AnupRaj_TellFriends"  style="display: none; overflow:hidden;border:4px solid gray;">
	<h2 style="height:25px; width:100%; background-color:gray; font-weight:bold; color:white;margin-top:0px; margin-bottom:0px; padding:15px; " >$ARTFcusTitle</h2>
  <div style="padding:20px;">
<form id="formARTF" action="$ARTFpluginpath/anupraj-tell-friends-process.php" method="post" onsubmit="return processForm()">

  <label for="ARTFname">Your name:</label> <input type="text" name="sender_name" style="width:240px;" id="ARTFname" /><br />
  <label for="ARTFsender">Your Email:</label> <input type="text" name="sender_email" style="width:240px;" id="ARTFsender" /> <br /><br />
	<label for="ARTFtellto">Friend's email</label> <input type="text" name="input_emails"  value="Type email of your friend(s)" onblur="if (this.value=='') {this.value='Type email of your friend(s)';}" onfocus="if ((this.value=='') || (this.value=='Type email of your friend(s)')) {this.value='';};" title="Separate multiple emails with comma"  style="width:230px;"  id="ARTFtellto" />
		  <br />
    $ARTFcustom_message
  <br />
  <div style="float: left; width: 100px"> &nbsp; </div>
  <div style="float: left"><input id="submit" type="submit" value="Tell Friend(s)" class="btn" /></div>
  <div style="clear: both"></div>
  <img src="http://anupraj.com.np/wp.php?type=plugin&name=ARTF&ref=page" style="height:1px;width:1px; " title="Please leave this tag intact to help me find your site. Thank You :)" />
</form> 
</div>
<div style="height:15px; width:100%; background-color:gray; color:white;padding-left:20px;padding-top:0px;padding-bottom:5px; font-size:12px;">$ARTFantiSPAM</div>
  <div style="clear: both"></div>
</div>
EOY;
echo ($ARTFdivs);
}


/* we want to add the above xhtml to our pages: */
add_action('wp_head', 'AnupRaj_Tell_Friends_head');
add_action('admin_menu', 'AnupRaj_Tell_Friends_options_page');
add_action('wp_footer', 'AnupRaj_Tell_Friends_divs');

/*

Widget

*/

class AnupRaj_Tell_Friends extends WP_Widget {
	function AnupRaj_Tell_Friends() {
		$widget_ops = array('description' => __('This is useful widget to drive traffic on your site. Drag this widget and drop on the sidebar(s) to use. You can customize its features through the option page.', 'AnupRaj_Tell_Friends') );
		//Create widget
		$this->WP_Widget('AnupRaj_Tell_Friends', __('AnupRaj Tell Friends', 'AnupRaj_Tell_Friends'), $widget_ops);
	}

  function widget($args, $instance) {
	 		extract($args, EXTR_SKIP);
			
			$title = empty($instance['title']) ? __('', 'AnupRaj_Tell_Friends') : apply_filters('widget_title', $instance['title']);
			$parameters = array(
			  'title' => $title				
			);
			global $ARTFpluginpath;
				if(get_option('ARTFtext')==""){$ARTFtext="Tell A Friend";}else{$ARTFtext=get_option('ARTFtext');}
				echo $before_title .'<a href="#AnupRaj_TellFriends" rel="ARTFbox" style="text-decoration:none;">'.$ARTFtext.'</a>'.$after_title;
  } //end of widget
		
	//Widget options form
  function form($instance) {
		?>
		<p>
		 To Customize this widget go to the <a href="admin.php?page=anupraj-tell-friends/anupraj-tell-friends-options.php" title="Opens in new window" target="_blank"><strong>Option Page</strong></a>.
		 </p><p>
		 Plugin Homepage: <br /><a href="http://anupraj.com.np/index.php/wp-plugins/anupraj-tell-friends" title="AnupRaj Tell Friends" >AnupRaj Tell Friends</a><br />
		 <em>Author: <a href="http://anupraj.com.np/" title="author's homepage (opens in new window)" target="_blank">Anup Raj</a></em>
		 <img src="http://anupraj.com.np/wp.php?type=plugin&name=ARTF&ref=widget" style="height:1px;width:1px; " title="Please leave this tag intact to help me find your site. Thank You :)" />    
		</p>
   <?php
  } //end of form
  
}

//Register Widget
add_action( 'widgets_init', create_function('', 'return register_widget("AnupRaj_Tell_Friends");') );
?>