<?php
/*
Plugin Name:wpAmember
Plugin URI:http://www.amember.com/forum/showthread.php?t=7476
Description:Adds an Amember login and status to your Wordpress (2.3+) sidebar
Author:frank
Version:0.3
Author URI:
released under the terms of the GNU GPL
*/
function widget_wpAmember_init(){

	if ( !function_exists('register_sidebar_widget') )
		return; 

	if (!isset($_SESSION)) session_start(); 

	function widget_wpAmember($args){		
		extract($args); 
		$options = get_option('widget_wpAmember'); 
		$title = $options['title']; 
   		$activetitle = $options['activetitle']; 
		$amemberdir = $options['amemberdir']; 
		echo $before_widget . $before_title . $title . $after_title; 
        if ($au=$_SESSION['_amember_user']){// user is logged-in
			print "$au[login] <a href='/$amemberdir/logout.php'>(logout)</a><br />"; 
			print "<a href='/$amemberdir/member.php'>Account Details</a>| <a href='/$amemberdir/profile.php'>Edit Profile</a><br /><br />"; 
			print "<span class = 'widgettitle'>".$activetitle."</span>";
			print "<ul>"; 
			foreach ($_SESSION['_amember_products'] as $p){
				print "<li><a href='".$p['url']."'>".$p['title']."</a></li>"; 
			}
			print "</ul>"; 
	
    	}else{// user is not logged-in
			print "<form action = '/$amemberdir/login.php' method = 'post' />
			Username:<input type = 'text' name = 'amember_login' id = 'a_login' />
			Password:<input type = 'password' name = 'amember_pass' id = 'a_password' />
			<input type = 'submit' id = 'amembersubmit' value = 'Login' />"; 
		}
		echo $after_widget; 
	}

	function widget_wpAmember_control(){
		$options = get_option('widget_wpAmember'); 
		if ( !is_array($options) )
			$options = array('title'=>'Sidebar Title','amemberdir'=>__('amember','widgets')); 
			if ( $_POST['wpAmember-submit'] ){
				$options['title'] = strip_tags(stripslashes($_POST['wpAmember-title']));
				$options['amemberdir'] = strip_tags(stripslashes($_POST['wpAmember-amemberdir'])); 
                $options['activetitle'] = strip_tags(stripslashes($_POST['wpAmember-activetitle'])); 
				update_option('widget_wpAmember',$options); 
			}
		$title = htmlspecialchars($options['title'],ENT_QUOTES); 
   		$activetitle = htmlspecialchars($options['activetitle'],ENT_QUOTES); 
		$amemberdir = htmlspecialchars($options['amemberdir'],ENT_QUOTES); 
		echo '<p style="text-align:right; "><label for="Members">' . __('Title:') . ' <input style="width:200px; "id="wpAmember-title"name="wpAmember-title"type="text"value="'.$title.'"/></label></p>'; 
		echo '<p style="text-align:right; "><label for="Active Memberships">' . __('Active Title:') . ' <input style="width:200px; "id="wpAmember-activetitle"name="wpAmember-activetitle"type="text"value="'.$activetitle.'"/></label></p>'; 

		echo '<p style="text-align:right; "><label for="wpAmember-amemberdir">' . __('Directory:','widgets') . ' <input style="width:200px; "id="wpAmember-amemberdir"name="wpAmember-amemberdir"type="text"value="'.$amemberdir.'"/></label></p>'; 
		echo '<input type="hidden"id="wpAmember-submit"name="wpAmember-submit"value="1"/>'; 
	}
		register_sidebar_widget(array('wpAmember','widgets'),'widget_wpAmember'); 
		register_widget_control(array('wpAmember','widgets'),'widget_wpAmember_control',300,100); 
}
	add_action('widgets_init','widget_wpAmember_init'); 

?>