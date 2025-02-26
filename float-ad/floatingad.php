<?php
/*
Plugin Name: Float ad
Plugin URI: http://smallwebsitehost.com/floatingad-wordpress-plugin/wordpress
Description: This plugin is a floating ad plugin. You can place your ad at the top of your blog and it will stay there although you scroll the page.
Version: 1.0
Autdor: Ian Sani
Autdor URI: http://www.smallwebsitehost.com/

    Copyright 2008  Ian sani (email : yulianto@solusiwebindo.com)

    tdis program is free software; you can redistribute it and/or modify
    it under tde terms of tde GNU General Public License as published by
    tde Free Software Foundation; eitder version 2 of tde License, or
    (at your option) any later version.

    tdis program is distributed in tde hope tdat it will be useful,
    but WItdOUT ANY WARRANTY; witdout even tde implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See tde
    GNU General Public License for more details.

    You should have received a copy of tde GNU General Public License
    along witd tdis program; if not, write to tde Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
class floatingad{
	
	function floatingad() {
		// define URL
		
 		$this->form_action = "?page=" . substr( __FILE__ , strlen(ABSPATH . PLUGINDIR) + 1 ); // results to eg: 

		add_action('init', array($this, 'init'));
		add_action('admin_menu', array(&$this, 'setmenu'));
		add_filter('the_content', array(&$this, 'the_content_filter'));
	}
	
	function init()
	{		
		add_option('floatingad_top', "<center>This is top ad<br>This is top ad</center>");
		add_option('floatingad_bottom', "This is bottom ad");
		add_option('floatingad_topactive', "1");
		add_option('floatingad_bottomactive', "1");
		add_option('floatingad_topcolor', "#ffffff");
		add_option('floatingad_topbgcolor', "#000000");
		add_option('floatingad_bottombgcolor', "#ffffff");
	}
		
	function managepage(){
		if( $_POST['process'] == 'edit' ) {
			$this->savesetting();
		}

		$this->settingpage();
	}

	function savesetting()
	{
		$floatingad_top = stripslashes($_POST['floatingad_top']);
		$floatingad_bottom = stripslashes($_POST['floatingad_bottom']);
		$floatingad_topcolor = stripslashes($_POST['floatingad_topcolor']);
		$floatingad_topactive = stripslashes($_POST['floatingad_topactive']);
		$floatingad_bottomactive = stripslashes($_POST['floatingad_bottomactive']);
		$floatingad_topbgcolor = stripslashes($_POST['floatingad_topbgcolor']);
		$floatingad_bottombgcolor = stripslashes($_POST['floatingad_bottombgcolor']);
		
		update_option('floatingad_top', $floatingad_top );
		update_option('floatingad_bottom', $floatingad_bottom);
		update_option('floatingad_topcolor', $floatingad_topcolor);
		update_option('floatingad_topactive', $floatingad_topactive );
		update_option('floatingad_bottomactive', $floatingad_bottomactive);
		update_option('floatingad_topbgcolor', $floatingad_topbgcolor );
		update_option('floatingad_bottombgcolor', $floatingad_bottombgcolor);
	
		echo '<div id="message" class="updated fade"><p><strong>';
		_e('Settings saved.', 'wpnewsletter_domain');
		echo '</strong></p></div>';
	}
	
	function settingpage()
	{
		$floatingad_top = stripslashes(get_option('floatingad_top'));
		$floatingad_bottom = stripslashes(get_option('floatingad_bottom'));
		$floatingad_topactive = stripslashes(get_option('floatingad_topactive'));
		$floatingad_bottomactive = stripslashes(get_option('floatingad_bottomactive'));
		$floatingad_topbgcolor = stripslashes(get_option('floatingad_topbgcolor'));
		$floatingad_topcolor = stripslashes(get_option('floatingad_topcolor'));
		$floatingad_bottombgcolor = stripslashes(get_option('floatingad_bottombgcolor'));

		?>
		<div class="wrap">
		<form action="" method="post" >
		<input type="hidden" name="process" value="edit" />
    	<table>
		<tr><td><b>Top ad:</b></td><td><textarea name="floatingad_top" id="floatingad_top" rows="10" cols="100"><?php echo $floatingad_top; ?></textarea></td></tr>
		<tr><td><b>Top ad text color:</b></td><td><input type="text" name="floatingad_topcolor" id="floatingad_topcolor" value="<?php echo $floatingad_topcolor; ?>"></td></tr>
		<tr><td><b>Top ad background color:</b></td><td><input type="text" name="floatingad_topbgcolor" id="floatingad_topbgcolor" value="<?php echo $floatingad_topbgcolor; ?>"></td></tr>
		<tr><td><b>Top ad active:</b></td><td><input type='checkbox' name='floatingad_topactive' <?php if($floatingad_topactive) echo 'checked' ?>>
</td></tr>
	<!--	<tr><td><b>Bottom ad:</b></td><td><textarea name="floatingad_bottom" id="floatingad_bottom" rows="10" cols="100"><?php echo $floatingad_bottom; ?></textarea></td></tr>
		<tr><td><b>Bottom ad background color:</b></td><td><input type="text" name="floatingad_bottombgcolor" id="floatingad_bottombgcolor" value="<?php echo $floatingad_bottombgcolor; ?>"></td></tr>
		<tr><td><b>Bottom ad active:</b></td><td><input type='checkbox' name='floatingad_bottomactive' <?php if($floatingad_bottomactive) echo 'checked' ?>'></tr> -->
		<p class="submit"><input type="submit" name="Submit" value="Update Settings &raquo;" /></p>
		</form>
		</table>
		</div>
		<?php
	}
	
	function the_content_filter($content)
	{
		$regex = '/\[simpleproduct:(\d+)\]/';
		return preg_replace_callback($regex, array(&$this, 'the_content_filter_callback'), $content) ;
	}
	
	function the_content_filter_callback($matches) {
		$id = intval( $matches[1] ); 
		//$this->displayad();
	}
	
	function displayad()
	{
		$floatingad_top = stripslashes(get_option('floatingad_top'));
		$floatingad_topbgcolor = stripslashes(get_option('floatingad_topbgcolor'));
		$floatingad_topcolor = stripslashes(get_option('floatingad_topcolor'));
		$floatingad_topactive = stripslashes(get_option('floatingad_topactive'));
		$floatingad_bottom = stripslashes(get_option('floatingad_bottom'));
		$floatingad_bottomactive = stripslashes(get_option('floatingad_bottomactive'));
		$floatingad_bottombgcolor = stripslashes(get_option('floatingad_bottombgcolor'));

		?>
		<LINK href="<?php echo get_bloginfo('wpurl') ?>/wp-content/plugins/<?php echo dirname(plugin_basename(__FILE__)); ?>/css/css.css" type=text/css rel=stylesheet>
		<SCRIPT language=JavaScript src="<?php echo get_bloginfo('wpurl') ?>/wp-content/plugins/<?php echo dirname(plugin_basename(__FILE__)); ?>/js/js.js"></SCRIPT> 	
		<?php if($floatingad_topactive != '')
		{ ?>
			<div id="dummy">
			<div id=copyright>Powered by <a href="http://smallwebsitehost.com/">Small Website</a></div>
			<?php
				$floatingad_top = stripslashes(get_option('floatingad_top'));
				echo $floatingad_top;
			?>
			</div>
			<div id="topfixed" style="background-color:<?php echo $floatingad_topbgcolor;?>;color:<?php echo $floatingad_topcolor;?>">
			<?php
				$floatingad_top = stripslashes(get_option('floatingad_top'));
				echo $floatingad_top;
			?>
			</div>
			<?php
		}
	}

	function setmenu () {
	     add_options_page(
	        'Float Ad Setting',         
	        'Float Ad ',        
	        'manage_options', 
	        __FILE__,         
	         array(&$this,'managepage' ) );  
	}
}
	// Load tinymce button 
	$floatingad = new floatingad();
?>