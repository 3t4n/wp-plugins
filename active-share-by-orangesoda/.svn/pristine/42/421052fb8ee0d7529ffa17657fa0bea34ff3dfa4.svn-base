<?php
/*
Plugin Name: Active Share by OrangeSoda
Plugin URI: http://wordpress.org/extend/plugins/active-share-by-orangesoda
Description: Active share provides a box that shows up on individual posts once users have scrolled a specified amount to share the page.
Version: 1.1
Author: Dan Garfield for OrangeSoda.com
Author URI: http://www.orangesoda.com
License: GPL2
*/


class active_share {
	private $as_tshares = array(
		array(
		"name" => "Twitter",
		"id" => "as-twitter",
		"js" => "",
		"style" => "float:left; margin: 0 5px; padding: 3px 0 0 0;",
		"code" => '<a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>'
		),
	
		array(
		"name" => "Tweetmeme",
		"id" => "as-tweetmeme",
		"js" => "",
		"style" => "float:left; margin: 0 5px; padding: 3px 0 0 0;",
		"code" => '<script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script>'),
		
		array(	
		"name" => "Google Buzz",
		"id" => "as-buzzwidget",
		"js" => "",
		"style" => "float: left; margin: 0 5px;",
		"code" => "<a title='Post to Google Buzz' class='google-buzz-button' href='http://www.google.com/buzz/post' data-button-style='normal-count'></a><script type='text/javascript' src='http://www.google.com/buzz/api/button.js'></script>"
		),
		
		array(
		"name" => "Plus one",
		"id" => "as-plusone",
		"js" => "",
		"style" => "float:left; padding-top: 4px; margin: 0 5px;",
		"code" => '<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone size="tall"></g:plusone>'
		),
	
		array(
		"name" => "Facebook Share",
		"id" => "as-facebook",
		"js" => "",
		"style" => "float: left; margin: 0 5px; padding: 4px 0 0;",
		"code" => '<a name="fb_share" type="box_count" href="http://www.facebook.com/sharer.php">Share</a>
	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>'
		),
		
		array(
		"name" => "Facebook Like",
		"id" => "as-fblike",
		"js" => "",
		"style" => "float: left; margin: 0 5px; padding: 4px 0 0; width: 50px; overflow: hidden;",
		"code" => '<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=155934781145405&amp;xfbml=1"></script><fb:like href="" send="false" layout="box_count" width="50" show_faces="false" font=""></fb:like>'
		),
		
		array(
		"name" => "LinkedIn",
		"id" => "as-linkedin",
		"js" => "",
		"style" => "float: left; padding-top: 2px; margin: 0 5px;",
		"code" => '<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-counter="top"></script>'
		),
		
		array(
		"name" => "StumbleUpon",
		"id" => "as-stumbleupon",
		"js" => "",
		"style" => "float: left; margin: 0 5px; padding: 4px 0px 0px;",
		"code" => "<script src='http://www.stumbleupon.com/hostedbadge.php?s=5'></script>"
		),
		
		array(
		"name" => "Reddit",
		"id" => "as-reddit",
		"js" => "",
		"style" => "float: left; margin: 0 5px; padding: 0px 0px 0px;",
		"code" => '<script type="text/javascript" src="http://reddit.com/static/button/button2.js"></script>'
		),
		
		array(
		"name" => "Digg",
		"id" => "as-digg",
		"js" => "digg.js",
		"style" => "float: left; margin: 0 5px; padding: 3px 0px 0px;",
		"code" => '<script type="text/javascript">(function() {
var s = document.createElement("SCRIPT"), s1 = document.getElementsByTagName("SCRIPT")[0];
s.type = "text/javascript";
s.async = true;
s.src = "http://widgets.digg.com/buttons.js";
s1.parentNode.insertBefore(s, s1);
})();
</script>
<!-- Medium Button -->
<a class="DiggThisButton DiggMedium"></a>'
		),

	);
		
	function active_share() {
		
	}
	//****************************************************************************************
	//Set Functions
	//****************************************************************************************
	//output functions
	function comment_marker($content=''){
		$options = get_option('as_options');
		if($options['as-posts']==1&&is_single()){
			$content .= "<div id='active-share-comment-marker'></div>";
		}
		else if($options['as-pages']==1&&is_page()){
			$content .= "<div id='active-share-comment-marker'></div>";
		}
		return $content;
	}
	
	function jquery() {
		
	}
	
	function ass_loadjs(){
		DEFINE('get_plugin_directory_uri', get_bloginfo('wpurl') . '/wp-content/plugins/active-share-by-orangesoda/');
		$options = get_option('as_options');
		if(($options['as-posts']==1&&is_single())||($options['as-pages']==1&&is_page())){
			wp_register_script('active-share',
			get_plugin_directory_uri . 'active-share.js', array('jquery'),'1.0');
			wp_enqueue_script('active-share');
		}
		
//		if(is_single()||is_page()){
//			
//			wp_register_script('active-share',
//			get_plugin_directory_uri . 'active-share.js', array('jquery'),'1.0');
//			wp_enqueue_script('active-share');
//
//		}
	}
	
	function html2rgb($color)
	{
	    if ($color[0] == '#')
	        $color = substr($color, 1);
	
	    if (strlen($color) == 6)
	        list($r, $g, $b) = array($color[0].$color[1],
	                                 $color[2].$color[3],
	                                 $color[4].$color[5]);
	    elseif (strlen($color) == 3)
	        list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
	    else
	        return false;
	
	    $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);
	
	    return "$r, $g, $b";
	}
	
	function print_shares($id){
		if (function_exists('wp_reset_postdata')){
			wp_reset_postdata();
		}
		$options = get_option('as_options');
		if(($options['as-posts']==1&&is_single())||($options['as-pages']==1&&is_page())){
			$as_tshares = $this->as_tshares;			
			$title = get_the_title($id);
			$bgcolor = "rgba(" . $this->html2rgb($options['as-bgcolor']) . ", " . $options['as-opacity']/100 . ")";
			$color = $options['as-color'];
			$twocolor = $options['as-twocolor'];
			$width = $options['as-width'];
			$message = $options['as-message'];
			print "<div id='as-share-window' style='width: 100%; display: block; position: fixed; top: -450px; left: 0px; background-color: $bgcolor; z-index: 100; padding: 0 0 10px 0;'><div style='width: " . $width . "px; margin: 20px auto;'>";
			
			foreach ($as_tshares AS $theshare){
				if($options[$theshare['id']]==1) {
					print "<span id ='" . $theshare['id'] . "' style='" . $theshare['style'] . "'>" . $theshare['code'] . "</span>";
				}
			}
			
			?>
			<div style='display:block; margin: 0 5px; padding: 5px 0px 0px; color: <?php print $twocolor; ?>'><?php print $message;?><br /><span style='color: <?php print $color; ?>; font-size: 18px;'><?php print $title; ?></span></div>
			</div>
			<div style="clear:both;"></div>
			</div>
			<?php
		}
	}
		
	//admin functions
	function active_share_settings() {
		if (!current_user_can('manage_options'))  {
	    	wp_die( __('You do not have sufficient permissions to access this page.') );
	  	}
		//If posting to the form
	  	if($_POST['checks']&&$_POST['as-bgcolor']&&$_POST['as-color']){
	  		$oldoptions = get_option('as_options'); //load old options
	  		$update = array(
	  			'as-posts'=>'',
	  			'as-pages'=>'',
	  			'as-message'=>$_POST['as-message'],
				'as-width'=>'',
				'as-level'=>'');
			$checkboxes = array(
				'as-posts'=>'',
	  			'as-pages'=>''
			);
	  		foreach ($this->as_tshares AS $theshare){
	  			$update[$theshare['id']]='';
	  			$checkboxes[$theshare['id']]='';
	  		}
	  		
			//validation, old change color if a valid hex colorcode
			if(preg_match('(#?([A-Fa-f0-9]){3}(([A-Fa-f0-9]){3})?)', $_POST['as-bgcolor'])) {
				$update['as-bgcolor'] = $_POST['as-bgcolor'];
			}
			else {
				$update['as-bgcolor'] = $oldoptions['as-bgcolor'];
			}
			if(preg_match('(#?([A-Fa-f0-9]){3}(([A-Fa-f0-9]){3})?)', $_POST['as-color'])) {
				$update['as-color'] = $_POST['as-color'];
			}
			else {
				$update['as-color'] = $oldoptions['as-color'];
			}
			if(preg_match('(#?([A-Fa-f0-9]){3}(([A-Fa-f0-9]){3})?)', $_POST['as-twocolor'])) {
				$update['as-twocolor'] = $_POST['as-twocolor'];
			}
			else {
				$update['as-color'] = $oldoptions['as-color'];
			}
			if($_POST['as-width'] < 1500 && $_POST['as-width'] > 600) {
				$update['as-width'] = $_POST['as-width'];
			}
			else {
				$update['as-width'] = 800;
			}
			if($_POST['as-opacity'] <= 100 && $_POST['as-opacity'] >= 0) {
				$update['as-opacity'] = $_POST['as-opacity'];
			}
			else {
				$update['as-opacity'] = 80;
			}
	  		
	  		//check if a checkbox is present, if so mark it as 1 in the DB else mark as 0
	  		$checked = array_flip($_POST['checks']);
	  		foreach($checkboxes AS $check => $null){
	  			if(isset($checked[$check])){
	  				$update[$check] = 1;
	  			}
	  			else {
	  				$update[$check] = 0;
	  			}
	  		}
	  		
	  		update_option('as_options', $update); //update options
	  		
	  	}
	
	  	$option = get_option('as_options'); //load options for form display
	?>
		<div class="wrap"><form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
		<?php settings_fields( 'active-share-group' ); ?>
		<h1>Active Share Settings</h1><p style="width: 500px">Active Share is a free plugin provided by <a href="http://orangesoda.com">OrangeSoda</a> and written by Dan Garfield. For marketing tips <a href="http://twitter.com/orangesoda">follow OrangeSoda on twitter</a>. This plugin was inspired by a similar feature on okcupid's blog. Their blog is awesome and you should <a href="http://blog.okcupid.com/">check it out</a>.</p>
		<h2>Placement Options</h2>
		<p>
			<table class="form-table">
				<tr>
				<th scope="row">Posts</th>
				<td><input type="checkbox" <?php echo $this->checkboxes($option["as-posts"]);?> name="checks[]" value="as-posts" /></td>
				</tr>
				<tr>
				<th scope="row">Pages</th>
				<td><input type="checkbox" <?php echo $this->checkboxes($option["as-pages"]);?> name="checks[]" value="as-pages" /></td>
				</tr>
			</table>
		</p>
		<h2>Sharing Services</h2>
		<p>
			<table class="form-table">
			<?php
				foreach ($this->as_tshares AS $theshare){
					print '<tr valign="top">';
					print '<th scope="row">Show ' . $theshare["name"] . '</th>';
					print '<td><input type="checkbox"' . $this->checkboxes($option[$theshare["id"]]) . 'name="checks[]" value="' . $theshare["id"] . '" /></td>';
					print '</tr>';
				}
			?>
			</table>
		</p>
		
		<h2>Style Settings</h2>
		<p>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Background Color</th>
				<td><input type="text" name="as-bgcolor" value="<?php echo $option['as-bgcolor']; ?>" /></td>
				</tr>
				<tr valign="top">
				<th scope="row">Background Opacity (0=transparent, 100=opaque)</th>
				<td><input type="text" name="as-opacity" value="<?php echo $option['as-opacity']; ?>" /></td>
				</tr>
				<tr valign="top">
				<th scope="row">Text Color</th>
				<td><input type="text" name="as-color" value="<?php echo $option['as-color']; ?>" /></td>
				<tr valign="top">
				<th scope="row">Message Color</th>
				<td><input type="text" name="as-twocolor" value="<?php echo $option['as-twocolor']; ?>" /></td>
				</tr>
				<tr valign="top">
				<th scope="row">Message Text</th>
				<td><input type="text" name="as-message" value="<?php echo $option['as-message']; ?>" /></td>
				</tr>
				<tr valign="top">
				<th scope="row">Width (between 600 and 1500</th>
				<td><input type="text" name="as-width" value="<?php echo $option['as-width']; ?>" /></td>
				</tr>
			</table>
		</p>
		
		<p class="submit">
	    	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	    </p>
	</p>
	</form>
	</div>
	
	<?php
	}
	
	function checkboxes($option) {
		if($option==1) {
			$return = 'checked="checked"';
		}
		else {
			$return = '';
		}
		return $return;
	}
	
	
	//****************************************************************************************
	//add options
	//****************************************************************************************
	function as_add_options() {
		$as_tshare = $this->as_tshares;
		$as_option = array();
		$i = 0;
		$en = 1;
		foreach ($as_tshare AS $theshare){
			if ($i == 0){ $en = 0; $i++; }
			else if($i<4){ $en = 1; $i++; }
			else { $en = 0; }
			$as_option[$theshare['id']] = $en;
		}
		
		$as_option['as-posts'] = 1;
		$as_option['as-pages'] = 1;
		$as_option['as-bgcolor'] = '#000000';
		$as_option['as-color'] = '#FFFFFF';
		$as_option['as-opacity'] = '100';
		$as_option['as-twocolor'] = '#9F9F9F';
		$as_option['as-message'] = 'be a pal and share this would ya?';
		$as_option['as-width'] = 800;
		$as_option['as-level'] = 1;
	
		add_option("as_options", $as_option);
		
	
	}
}



global $as_share;
$as_share = new active_share();

function active_share_menu() {
	global $as_share;
		add_options_page(__('Active Share Settings','active-share-settings'), __('Active Share Settings','active-share-settings'), 'manage_options',  'active_share', array(&$as_share, 'active_share_settings'));
	
}

//****************************************************************************************
//add filters and actions
//****************************************************************************************
//function actions and filters
add_filter('the_content', array(&$as_share, 'comment_marker'));
add_action('wp_print_scripts',  array(&$as_share, 'ass_loadjs'), 10, 1);
add_action('wp_footer', array(&$as_share, 'print_shares'), 1, 1);

//options actions and filters
if ( is_admin() ){ // admin actions
	add_action('admin_menu', 'active_share_menu');
	add_action( 'admin_init', array(&$as_share, 'as_add_options' ));
}

?>
