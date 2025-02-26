<?php
/*
Plugin Name: flexo-facebook-manager
Version: 1.0022
Contributors: flexostudio
Tags: facebook, comments, like, posts
Author: Grigor Grigorov, Mariela Stefanova, Flexo Studio Team
Description: All in One Facebook Manager. It will integrate Facebook to your Site. Open Graph and Widgets supported.
Plugin URI: http://www.flexostudio.com/wordpress-plugins-flexo-utils.html
*/

class flexoFBManager {
	public static $weight_comments = 1.5;
	public static $weight_likes		 = 1;
	public static $done						 = false;
	/* =_ functions 
	-------------------------------------------------------------------------------------- */		
	public static function get_url($post_id=null){
	  $permalink	=	get_permalink($post_id);
		$rurl = ($permalink);
		return $rurl;	
	}
	
	/* =public functions
	-------------------------------------------------------------------------------------- */		
	public static function the_facebook(){
			
		echo get_facebook($post_id=null);
		
	}
	
	public static function get_facebook($post_id=null, $case='default'){

		return self::get_form($post_id,$case);
	}
	public static function get_fb_likes_field_name(){
		return "fb_likes";
	}
	
	
	/* =LIKES section
	-------------------------------------------------------------------------------------- */	
	public static function get_data($post_id=null){
		
		//ako e da
		$post_meta	=	get_option(fb_post_meta);
		if ($post_meta	==	'yes'){
			$graph 	= "http://graph.facebook.com/?id=".self::get_url($post_id);
			//ako e ne
			$obj		=	json_decode(file_get_contents($graph));
		}
		else {$obj		=	false;}
		return $obj;	
	}
	
	public static function get_likes($post_id=null){
		$obj	=	self::get_data($post_id);
		return $obj->shares;
	}
	
	public static function update_likes($post_id=null){
		if($post_id == null):
			$post_id = get_the_ID();
		endif;

		$data		=	self::get_data($post_id);
		$likes	=	intval($data->shares);//flexoFBManager::get_likes($post_id);
		$comments	=	intval($data->comments);
		
		$vars		=	self::post_vars($post_id);
		
		$update_score = false;
		
		self::save_custom($post_id,$field = "fb_likes" , $value = $likes);
		self::save_custom($post_id,$field = "fb_comments" , $value = $comments);
		self::save_custom($post_id,$field = "fb_score" , $likes * self::$weight_likes + $comments * self::$weight_comments + 1);
		self::save_custom($post_id,$field = "fb_need_update" , "no");
		
		return $likes;
	}
	
	public static function reset_data($post_id=null){
		if($post_id == null):
			$post_id = get_the_ID();
		endif;
		self::save_custom($post_id,$field = "fb_need_update" , $value = "yes");
	}
	
	/* =COMMENTS section
	-------------------------------------------------------------------------------------- */	
	public static function get_comments($post_id=null){
		$graph 	= "http://graph.facebook.com/comments/?ids=".self::get_url($post_id);
		$obj		=	json_decode(file_get_contents($graph));
		$url=(self::get_url($post_id));
	//	echo $url;
//		echo '<pre>';print_r($obj -> $url-> data);
		return count($obj -> $url-> data);
	}

	public static function update_comments($post_id=null){
		if($post_id == null):
			$post_id = get_the_ID();
		endif;

		$comments_raw	=	self::get_comments($post_id);
		$vars		=	self::post_vars($post_id);
		
		$comments	=	count($comments_raw);
		if($vars['comments'] !== $comments):
			self::save_custom($post_id,$field = "fb_comments" , $value = $comments);
		endif;
		
		return $comments;
	}	

	public static function update_all($post_id = null){
		self::update_likes($post_id);
		self::update_comments($post_id);
	}
	
	public static function reset_all($post_id = null) {
		self::reset_data($post_id);
	}
	
	/* =WP Section
	-------------------------------------------------------------------------------------- */		
	public static function post_vars($post_id=null){
		//todo if custom post_id
		$custom = get_post_custom();
		$ret			=	array(
			'likes'						=> 	$custom["fb_likes"][0], 
			'comments'				=> 	$custom["fb_comments"][0],
			'fb_check'				=>	$custom["fb_check"][0],
			'fb_pic'					=>	$custom["fb_pic"][0],
			'pic'							=>	$custom["pic"][0],
			'fb_need_update' 	=>	$custom["fb_need_update"][0],
			'fb_score'				=>	$custom["fb_score"][0],
			'url_pic'					=>	$custom["url_pic"][0],
			'fb_text'					=>	$custom["fb_text"][0],
			'fb_title'				=>	$custom["fb_title"][0],
			'custom_text'			=>	$custom["custom_text"][0],
			'custom_title'		=>	$custom["custom_title"][0],
		);
		return $ret;		
	}	
	
	public static function save_custom($post_id,$field,$value){
		update_post_meta($post_id, $field, $value);
	}
	  
	public static $moreJS;
	public static function js_unload($post_id=null){
		if($post_id == null):
			$post_id = get_the_ID();
		endif;
		$url = plugins_url( 'update.php' , __FILE__ );
		self::$moreJS .= '<script type="text/javascript">
			jQuery(window).unload(function() {
				jQuery.ajax({
						type: "GET",
						url: "'.$url.'",
						data: "p='.$post_id.'",
						success: function(msg){
						}				
				});
		});
		</script>';
	}
	
	public static function wp_footer(){
		//todo da se proveri zasto ne raboti pri chrome
		//echo self::$moreJS;
	}

	public static function get_cache_likes($post_id=null){
		$ret	=	0;
		$vars	=	self::post_vars($post_id);
		if($vars['likes'] == null || $vars['fb_need_update'] == 'yes'){
			$ret 	=	self::update_likes();
		}else{
			$ret	=	$vars['likes'];
		}
		return $ret;
	}
	
	
	public static function get_cache_comments($post_id=null){
		$ret	=	0;
		$vars	=	self::post_vars($post_id);
		if($vars['comments'] == null){
			$ret 	=	self::update_comments();
		}else{
			$ret	=	$vars['comments'];
		}
		return $vars['comments'];
	}	

	public static	function admin_on_post_show(){
	 	add_meta_box('add_fb', 'Flexo Facebook Manager', 'flexoFBManager::show_fb_manager', 'post', 'normal', 'high' );
	}
	public static	function admin_on_page_show(){
	 	add_meta_box('add_fb', 'Flexo Facebook Manager', 'flexoFBManager::show_fb_manager', 'page', 'normal', 'high' );
	}
	public static function show_fb_manager (){
		global $post;
		$data		=	self::post_vars($post_id=null);
		$check	=	$data['fb_check'];
		$fb_pic	=	$data['fb_pic'];
		$pic		=	$data['pic'];
		$url_pic=	$data['url_pic'];
		$fb_text			=	$data['fb_text'];
		$custom_text	=	$data['custom_text'];
		$fb_title			=	$data['fb_title'];
		$custom_title	=	$data['custom_title'];
		?>
		
		<div class="fb-manager">
		<ul>
			<li>
				<input type="radio" name="fb_check" value="no" checked <?php echo $check == 'no' ? 'checked' : ''; ?>/>No
			</li><li>
				<input type="radio" name="fb_check" value="yes" <?php echo $check == 'yes' ? 'checked' : ''; ?>/>All
			</li><li>
				<input type="radio" name="fb_check" value="like" <?php echo $check == 'like' ? 'checked' : ''; ?>/>Like
			</li><li>
				<input type="radio" name="fb_check" value="comments" <?php echo $check == 'comments' ? 'checked' :'';?>/>Comments
			</li><li>
				<input type="radio" name="fb_check" value="open_g" <?php echo $check == 'open_g' ? 'checked' :'';?>/> Open Graph only
			</li>
		</ul>
							<a href="http://developers.facebook.com/tools/debug/og/object?q=<?php echo get_permalink(); ?>" target="_blank"
								class="debug-button">Test Open Graph</a>
		<br /><br /><br />
		<h3>Open Graph Title</h3>
		<ul>
			<li>
				<input type="radio" name="fb_title" value="title" checked <?php echo $fb_title == 'title' ? 'checked' : ''; ?>/>Current Title
			</li><li>
				<input type="radio" name="fb_title" value="seo_title" <?php echo $fb_title == 'seo_title' ? 'checked' : ''; ?>/>the "All in One Seo" Title
			</li><li>
				<input type="radio" name="fb_title" value="custom_title" <?php echo $fb_title == 'custom_title' ? 'checked' : ''; ?>/>Custom Title
			</li>
			
		</ul>
		<div class="clear"></div>
		<input type="text" name="custom_title"  value="<?php if (!$custom_title){echo '';} else{echo $custom_title;} ?>" style="width: 300px;height: 18px; margin-bottom:15px"/>

		<div class="clear"></div>
		
		<h3>Open Graph Description</h3>
		<ul>
			<li>
				<input type="radio" name="fb_text" value="content" checked <?php echo $fb_text == 'content' ? 'checked' : ''; ?>/>the content
			</li><li>
				<input type="radio" name="fb_text" value="excerpt" <?php echo $fb_text == 'excerpt' ? 'checked' : ''; ?>/>the excerpt
			</li>
			<li>
				<input type="radio" name="fb_text" value="seo" <?php echo $fb_text == 'seo' ? 'checked' : ''; ?>/>the "All in One Seo" Description
			</li>
			<li>
				<input type="radio" name="fb_text" value="custom" <?php echo $fb_text == 'custom' ? 'checked' : ''; ?>/>custom text
			</li>
		</ul>
		<div class="clear"></div>
		<textarea name="custom_text"><?php if (!$custom_text){echo ' ';} else{ echo $custom_text;} ?></textarea>
		<div class="clear"></div>
		<h3>Open Graph Image</h3>
			<ul>
				<li>
					<input type="radio" name="fb_pic" value="first_pic" checked <?php echo $fb_pic == 'first_pic' ? 'checked' : ''; ?>/>First image from the content
		
				</li><li>
					<input type="radio" name="fb_pic" value="thumb" <?php echo $fb_pic == 'thumb' ? 'checked' : ''; ?>/>Thumbnail
				</li><li>
					<input type="radio" name="fb_pic" value="avatar" <?php echo $fb_pic == 'avatar' ? 'checked' : ''; ?>/>Avatar
				</li><li>
					<input type="radio" name="fb_pic" value="url_pic" <?php echo $fb_pic == 'url_pic' ? 'checked' : ''; ?>/>from URL
				</li>
				<li style="border: none;clear:left;">
					
				<input type="text" name="url_pic"  value="<?php if (!$url_pic){echo 'http://';} else{echo $url_pic;} ?>" style="width: 300px;height: 18px;"/>
					</li>
				<li style="border: none;clear:left;">
					<input type="radio" name="fb_pic" value="attach" <?php echo $fb_pic == 'attach' ? 'checked' : ''; ?>/>Attach Picture
							<?php if(strlen($pic) > 0)echo "<img style='max-width:90%;' src='".$pic."'  />"; ?>
							<input class="file" type="file" style="width:100%;height:25px;" size="0" name="pic"  ID="pic" value="<?php echo $pic; ?>" />
				</li><li style="clear: left;">
							<input type="checkbox" name="del" value="del picture">Delete Picture
				</li>
			</ul>
					<div class="clear"></div>
		</div>
		<?php 
		
	
		

	}
	
	public static function admin_on_post_save () {
		global $post;
	

	//	echo "<pre>";		print_r($_POST['fb_pic']);		echo "</pre>";exit;
				$files = array('pic');
	  foreach($files as $fname):
	  if(!empty($_FILES[$fname]['name'])){ //New upload
	   if(floatval($_FILES[$fname]['error']) > 0)
	    continue;
	
	   require_once( ABSPATH . 'wp-admin/includes/file.php' );
	   require_once(ABSPATH . 'wp-admin/includes/image.php');
	   require_once(ABSPATH . 'wp-admin/includes/media.php');
		
		 $override['action'] = 'editpost';
	   $overrdie['test_form'] = false;
	
	   
	   $uploaded_file = wp_handle_upload($_FILES[$fname], $override);
	   $filename   = $uploaded_file['file'];
	   
	   $post_id = $post->ID;
	   $attachment = array(
	    'post_title'    => $_FILES[$fname]['name'],
	    'post_content'   => '',
	    'post_type'    => 'attachment',
	    'post_parent'   => $post_id,
	    'post_mime_type'  => $_FILES[$fname]['type'],
	    'guid'       => $uploaded_file['url']
	    );
	    
	    $url   =  sprintf("%s", $uploaded_file['url']);
	    
	     if(strlen($url)>0){
			    update_post_meta($post->ID, $fname, $url);
			    $id = wp_insert_attachment( $attachment,$filename, $post_id );
			    wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $filename ) );
	   		}
	   		
	  }
		endforeach;
		if($_POST['fb_check']):
	   update_post_meta($post->ID, "fb_check", $_POST['fb_check']);
	  endif;
	  if($_POST['fb_pic']):
	   update_post_meta($post->ID, "fb_pic", $_POST['fb_pic']);
	  endif;
	  if($_POST['pic']):
	   update_post_meta($post->ID, "pic", $_POST['pic']);
	  endif;
	  if($_POST['del']):
	   update_post_meta($post->ID, "pic", '');
	  endif;
	  
	  if($_POST['url_pic']):
	   update_post_meta($post->ID, "url_pic", $_POST['url_pic']);
	  endif;
	   if($_POST['fb_text']):
	   update_post_meta($post->ID, "fb_text", $_POST['fb_text']);
	  endif;
	  if($_POST['custom_text']):
	   update_post_meta($post->ID, "custom_text", $_POST['custom_text']);
	  endif;
	   if($_POST['fb_title']):
	   update_post_meta($post->ID, "fb_title", $_POST['fb_title']);
	  endif;
	  if($_POST['custom_title']):
	   update_post_meta($post->ID, "custom_title", $_POST['custom_title']);
	  endif;
	}
	
		
	public static function the_excerpt($content = ''){
		return $content;
	}
	public static function the_content($content = ''){
	//	if(self::$done === true)
		//	return $content;
			
			
		global $post;
		$post_id	=	$post->ID;
		$data			=	self::post_vars($post_id);
		$more			=	"";
		$l				=	"";
		$layout		=	get_option(fb_layout);
		$gallery_check = self::gallery_filter();
		
		if($gallery_check) {
			$ret	=	$content;
		}	else {
			
					if(is_singular()){
					
						switch($data['fb_check']){
							case "yes"			: 
								if ($layout	==	'top'){
								$l		=	self::get_facebook($post_id,'like');
								$more = self::get_facebook($post_id,'comments'); 
								}
								else {
									 $more = self::get_facebook($post_id); 
								}
							break;
							
							case "like"			: $more = self::get_facebook($post_id,'like'); 			break;
							case "comments"	: $more = self::get_facebook($post_id,'comments'); 	break;
							case "open_g"	:	break;
						}
			
						self::reset_all();
					
						}
						$cl  =	'<div style=" width: 100%; clear:both; line-height:0; height:0; overflow:hidden; "></div>';
						$ret =	$l.$content.$cl.$more;
					}
					
		//self::$done	=	true;
		return $ret;
	}
	
public static function fb_menu_display() {
					if (isset($_POST['submit'])):
							$fb_width1 = addslashes(htmlspecialchars($_POST['width']));
							$fb_appId1 = addslashes(htmlspecialchars($_POST['appId']));
							$fb_num_posts1 = addslashes(htmlspecialchars($_POST['num_posts']));
							$fb_feed1 = addslashes(htmlspecialchars($_POST['feed']));
							$fb_type1 = addslashes(htmlspecialchars($_POST['type']));
							$fb_xid1 = addslashes(htmlspecialchars($_POST['xid']));
							$fb_face1 = addslashes(htmlspecialchars($_POST['face']));
							$fb_send1 = addslashes(htmlspecialchars($_POST['send']));
							$fb_layout1 = addslashes(htmlspecialchars($_POST['layout']));
							$fb_header1 = (($_POST['header']));
							$fb_post_meta1 = addslashes(htmlspecialchars($_POST['post_meta']));
							$fb_language1 = addslashes(htmlspecialchars($_POST['fb_language']));
							$fb_remove_br1 = addslashes(htmlspecialchars($_POST['remove_br']));
							$fb_color_st1 = addslashes(htmlspecialchars($_POST['color_st']));
							$fb_layout_st1 = addslashes(htmlspecialchars($_POST['layout_st']));
							$fb_verb1 = addslashes(htmlspecialchars($_POST['verb']));
							
								
							update_option(fb_width, $fb_width1);
							update_option(fb_appId, $fb_appId1);
							update_option(fb_num_posts, $fb_num_posts1);
							update_option(fb_feed, $fb_feed1);
							update_option(fb_type, $fb_type1);
							update_option(fb_xid, $fb_xid1);
							update_option(fb_face, $fb_face1);
							update_option(fb_send, $fb_send1);
							update_option(fb_layout, $fb_layout1);
							update_option(fb_header, $fb_header1);
							update_option(fb_post_meta, $fb_post_meta1);
							update_option(fb_language, $fb_language1);
							update_option(fb_remove_br, $fb_remove_br1);
							update_option(fb_color_st, $fb_color_st1);
							update_option(fb_layout_st, $fb_layout_st1);
							update_option(fb_verb, $fb_verb1);
							//echo $fb_language1;
					endif;
	?>
	<style>

		</style>



<!-------------------------->		
	<div id="normal-sortables" class=""  style="margin-top:20px;width:600px;">
		<div id="add_fb" class="postbox ">
			<h3 class="hndle" style="padding:10px;"><span>Flexo Facebook Manager 
			</span> </h3>
			<div class="inside">
				
		<div class="fb_admin">
			
		<form method="POST">
			<div class="row">
				<div class="title">width</div>
				<div class="input">
					<input type="text" name="width" value="<?php echo get_option(fb_width); ?>"/>
					<div class="desc">
						<a href="http://www.flexostudio.com/flexo-facebook-manager.html" target="_blank" class="debug-button" >Help</a>
					</div>
				</div>
			</div><!-- row -->
			<div class="row">
				<div class="title">appId</div>
				<div class="input">
					<input type="text" name="appId" value="<?php echo get_option(fb_appId); ?>"/>
					<div class="desc">
						<a href="https://developers.facebook.com/apps/?action=create" target="_blank"	class="debug-button">Get App ID</a>
					</div>
				</div>
			</div><!-- row -->
			<div class="row">
				<div class="title">language</div>
				<div class="input">
								
							<select name="fb_language" style='margin-left:10px;' >
													<option value="en_US" selected="selected">- select -</option>
													<option value="en_US">English (US)</option>
													<option value="af_ZA">Afrikaans</option>
													<option value="az_AZ">Azerbaycan dili</option>
													<option value="id_ID">Bahasa Indonesia</option>
													<option value="ms_MY">Bahasa Melayu</option>
													<option value="bs_BA">Bosanski</option>
													<option value="ca_ES">Catala</option>
													<option value="cs_CZ">Cestina</option>
													<option value="cy_GB">Cymraeg</option>
													<option value="da_DK">Dansk</option>
													<option value="de_DE">Deutsch</option>
													<option value="et_EE">Eesti</option>
													<option value="en_GB">English (UK)</option>
													<option value="es_LA">Espanol</option>
													<option value="eo_EO">Esperanto</option>
													<option value="eu_ES">Euskara</option>
													<option value="tl_PH">Filipino</option>
													<option value="fr_FR">French(France)</option>
													<option value="fr_CA">French(Canada)</option>
													<option value="ko_KR">Korean</option>
													<option value="hr_HR">Croatian</option>
													<option value="it_IT">Italian</option>
													<option value="lt_LT">Lithuanian</option>
													<option value="hu_HU">Hungarian</option>
													<option value="nl_NL">Dutch</option>
													<option value="ja_JP">Japanese</option>
													<option value="nb_NO">Norwegian (bokmal)</option>
													<option value="pl_PL">Polish</option>
													<option value="pt_BR">Portuguese</option>
													<option value="ro_RO">Romanian</option>
													<option value="ru_RU">Russian</option>
													<option value="sk_SK">Slovak</option>
													<option value="sv_SE">Swedish</option>
													<option value="zh_TW">Taiwan</option>
													<option value="zh_CN">China</option>
													<option value="zh_HK">Hong Kong</option>
													<option value="el_GR">Greek</option>
													<option value="bg_BG">Bulgarian</option>
													<option value="mk_MK">Macedonian</option>
													<option value="ar_AR">Arabic</option>
													<option value="hi_IN">Hindi</option>
													<option value="sr_RS">Serbian</option>
													<option value="uk_UA">Ukrainian</option>
													<option value="be_BY">Belarusian</option>
												</select>
				<?php echo '['.get_option(fb_language).']'; ?>
				</div>
			</div><!-- row -->
				
			<div class="row">
				<div class="title">num posts</div>
				<div class="input">
					<input type="text" name="num_posts" value="<?php echo get_option(fb_num_posts); ?>"/>
				</div>
			</div><!-- row -->
	
			<div class="row">
				<div class="title">feed</div>
				<div class="input">
					<div class="radio">
						<input type="radio" name="feed" value="true" <?php echo get_option(fb_feed) == 'true' ? 'checked' : ''; ?>/>true
					</div>
					<div class="radio">
						<input type="radio" name="feed" value="false" <?php echo get_option(fb_feed) == 'false' ? 'checked' : ''; ?>/>false
					</div>
				</div>
			</div>

			<div class="row">
				<div class="title">faces</div>
				<div class="input">
					<div class="radio">
						<input type="radio" name="face" value="true" <?php echo get_option(fb_face) == 'true' ? 'checked' : ''; ?>/>true
					</div>
					<div class="radio">
						<input type="radio" name="face" value="false" <?php echo get_option(fb_face) == 'false' ? 'checked' : ''; ?>/>false
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="title">send button</div>
				<div class="input">
					<div class="radio">
						<input type="radio" name="send" value="true" <?php echo get_option(fb_send) == 'true' ? 'checked' : ''; ?>/>true
					</div>
					<div class="radio">
						<input type="radio" name="send" value="false" <?php echo get_option(fb_send) == 'false' ? 'checked' : ''; ?>/>false
					</div>
					<div class="radio" style="padding-left:10px;color:gray;border:none;">
						not supported by IFrame
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="title">color scheme</div>
				<div class="input">
					<div class="radio">
						<input type="radio" name="color_st" value="light" <?php echo get_option(fb_color_st) == 'light' ? 'checked' : ''; ?>/>light
					</div>
					<div class="radio">
						<input type="radio" name="color_st" value="dark" <?php echo get_option(fb_color_st) == 'dark' ? 'checked' : ''; ?>/>dark
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="title">Verb to display</div>
				<div class="input">
					<div class="radio">
						<input type="radio" name="verb" value="like" <?php echo get_option(fb_verb) == 'like' ? 'checked' : ''; ?>/>like
					</div>
					<div class="radio">
						<input type="radio" name="verb" value="recommend" <?php echo get_option(fb_verb) == 'recommend' ? 'checked' : ''; ?>/>recommend
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="title">like counter layout style</div>
				<div class="input">
					<div class="radio">
						<input type="radio" name="layout_st" value="standard" <?php echo get_option(fb_layout_st) == 'standard' ? 'checked' : ''; ?>/>standard
					</div>
					<div class="radio">
						<input type="radio" name="layout_st" value="button_count" <?php echo get_option(fb_layout_st) == 'button_count' ? 'checked' : ''; ?>/>button_count
					</div>
					<div class="radio">
						<input type="radio" name="layout_st" value="box_count" <?php echo get_option(fb_layout_st) == 'box_count' ? 'checked' : ''; ?>/>box_count
					</div>
				</div>
			</div>
							
			<div class="row">
				<div class="title">comments	header</div>
				<div class="input">
					<input type="text" name="header" value="<?php echo get_option(fb_header); ?>"/>
				</div>
			</div><!-- row -->
			
			
			<div class="row">
				<div class="title">layout</div>
				<div class="input" style="margin-left:10px;">
					<div class="radio">
						<div class="layout bottom"></div>
						<input  type="radio" name="layout" value="top" <?php echo get_option(fb_layout) == 'top' ? 'checked' : ''; ?>/> top
					</div>
					<div class="radio">
						<div class="layout top" ></div>
						<input  type="radio" name="layout" value="bottom" <?php echo get_option(fb_layout) == 'bottom' ? 'checked' : ''; ?>/>bottom
					</div>
				</div>
			</div>

			<div class="row">
				<div class="title">Post Meta Vars</div>
				<div class="input">
					<div class="radio">
						<input type="radio" name="post_meta" value="yes" <?php echo get_option(fb_post_meta) == 'yes' ? 'checked' : ''; ?>/>yes
					</div>
					<div class="radio">
						<input type="radio" name="post_meta" value="no" <?php echo get_option(fb_post_meta) == 'no' ? 'checked' : ''; ?>/>no
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="title">remove [ ] tags</div>
				<div class="input">
					<div class="radio">
						<input type="radio" name="remove_br" value="yes" <?php echo get_option(fb_remove_br) == 'yes' ? 'checked' : ''; ?>/>yes
					</div>
					<div class="radio">
						<input type="radio" name="remove_br" value="no" <?php echo get_option(fb_remove_br) == 'no' ? 'checked' : ''; ?>/>no
					</div>
				</div>
			</div>

			<div class="row">
				<div class="title">type</div>
				<div class="input">
					<div class="radio">
						<input type="radio" name="type" value="html" <?php echo get_option(fb_type) == 'html' ? 'checked' : ''; ?>/>HTML5
					</div>
					<div class="radio">
						<input type="radio" name="type" value="xfbml" <?php echo get_option(fb_type) == 'xfbml' ? 'checked' : ''; ?>/>XFBML
					</div>
					<div class="radio">
						<input type="radio" name="type" value="iframe" <?php echo get_option(fb_type) == 'iframe' ? 'checked' : ''; ?>/>IFRAME
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="title">XID (only for iframe):</div>
				<div class="input">
					<div class="radio">
						<input type="radio" name="xid" value="url" <?php echo get_option(fb_xid) == 'url' ? 'checked' : ''; ?>/>Post url
					</div>						
					<div class="radio">
						<input type="radio" name="xid" value="p_id" <?php echo get_option(fb_xid) == 'p_id' ? 'checked' : ''; ?>/>Post ID
					</div>
				</div>
			</div>
			
			<input class="submit-button" style="float:right;" type="submit" name="submit" value="Save">
			<div class="clear"></div>
	</form>
		</div>
			</div>
		</div>
	</div>
	<?php
			
					
				
	}

	public static function fb_id(){
		$fb_appId1=get_option(fb_appId);
		return $fb_appId1;
	}
	
		
	public static function get_form($post_id=null,$type='default',$url="") {
		
		if (!$url)
 			$rurl	= self::get_url($post_id);
		else
			$rurl = ($url);
		
 		$fb_width1		=	get_option(fb_width);
 		$fb_appId1		=	self::fb_id();
 		$fb_num_posts1=	get_option(fb_num_posts);
 		$fb_feed1			=	get_option(fb_feed);
 		$fb_type1			=	get_option(fb_type);
 		$fb_send1			=	get_option(fb_send);
 		$fb_face1			=	get_option(fb_face);
 		$fb_header1		=	get_option(fb_header);
 		$fb_color_st1	=	get_option(fb_color_st);
 		$fb_layout_st1=	get_option(fb_layout_st);
 		$fb_verb1			=	get_option(fb_verb);
 		$fb_lang			=	get_option(fb_language);
 		
 		$arg					=	array(
 		 		'fb_width1'			=>	$fb_width1,
		 		'fb_appId1'			=>	$fb_appId1,
		 		'fb_num_posts1'	=>	$fb_num_posts1,
		 		'fb_feed1'			=>	$fb_feed1,
		 		'fb_type1'			=>	$fb_type1,
		 		'fb_face1'			=>	$fb_face1,
		 		'fb_send1'			=>	$fb_send1,
		 		'fb_header1'		=>	$fb_header1,
		 		'post_id'				=>	$post_id,
		 		'color_st'			=>	$fb_color_st1,
		 		'layout_st'			=>	$fb_layout_st1,
		 		'fb_verb'					=>	$fb_verb1,
		 		'fb_lang'					=>	$fb_lang,
 		);
 		//echo '<pre>';print_r($arg);echo '</pre>';
 		switch($fb_type1):
 			case 'html':
 				$form = self::get_html_form($rurl,$arg,$type);
			break;
			
			case 'xfbml':
					$form = self::get_xfbml_form($rurl,$arg,$type);
			break;
			case 'iframe':
		 		 $form = self::get_iframe_form($rurl,$arg,$type);
				break;
			
 		endswitch;
	return $form;
		
	}
	public static function get_html_form ($rurl,$arg,$case){
			//echo '<pre>';print_r($arg);echo '</pre>';
			
		switch($case):
			case 'default':
				$form = '<div class="fb_header">'.$arg['fb_header1'].'</div>
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) {return;}
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/'.$arg['fb_lang'].'/all.js#xfbml=1&appId='.$arg['fb_appId1'].'";
					  fjs.parentNode.insertBefore(js, fjs);
						}(document, "script", "facebook-jssdk"));</script>
						<div class="fb-like" data-send="'.$arg['fb_send1'].'" data-layout="'.$arg['layout_st'].'" data-width="'.$arg['fb_width1'].'" data-show-faces="'.$arg['fb_face1'].'" data-action="'.$arg['fb_verb'].'" data-colorscheme="'.$arg['color_st'].'"></div> 
						<div class="fb-comments" data-href="'.$rurl.'" data-num-posts="'.$arg['fb_num_posts1'].'" data-width="'.$arg['fb_width1'].'" data-colorscheme="'.$arg['color_st'].'"></div>';
					break;
				
				case 'comments':
		 			$form ='<div class="fb_header">'.$arg['fb_header1'].'</div>
		 				<div id="fb-root"></div>
							<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) {return;}
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/'. $arg['fb_lang'].'/all.js#xfbml=1&appId='.$arg['fb_appId1'].'";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, "script", "facebook-jssdk"));</script> 
						<div class="fb-comments" data-href="'.$rurl.'" data-num-posts="'.$arg['fb_num_posts1'].'" data-width="'.$arg['fb_width1'].'" data-colorscheme="'.$arg['color_st'].'"></div>';
				break;	
				case 'like':
					$form = '<div id="fb-root"></div>
							<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) {return;}
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/'. $arg['fb_lang'].'/all.js#xfbml=1&appId='.$arg['fb_appId1'].'";
						  fjs.parentNode.insertBefore(js, fjs);
							}(document, "script", "facebook-jssdk"));</script>
							<div class="fb-like" data-send="'.$arg['fb_send1'].'" data-layout="'.$arg['layout_st'].'" data-width="'.$arg['fb_width1'].'" data-show-faces="'.$arg['fb_face1'].'"  data-action="'.$arg['fb_verb'].'"  data-colorscheme="'.$arg['color_st'].'"></div> ';
					break;	
 			endswitch;
		return $form;
	}
	
	public static function get_xfbml_form($rurl,$arg,$case) {
		
		switch($case):
			case 'default':
				$form = '<div class="fb_header">'.$arg['fb_header1'].'</div>
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) {return;}
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/'.$arg['fb_lang'].'/all.js#xfbml=1&appId='.$arg['fb_appId1'].'";
					  fjs.parentNode.insertBefore(js, fjs);
						}(document, "script", "facebook-jssdk"));</script>
						<html xmlns:fb="http://ogp.me/ns/fb#">
							<fb:like href="'.$rurl.'" send="'.$arg['fb_send1'].'" layout="'.$arg['layout_st'].'" width="'.$arg['fb_width1'].'" show_faces="'.$arg['fb_face1'].'" action="'.$arg['fb_verb'].'" colorscheme="'.$arg['color_st'].'"></fb:like>
							<fb:comments href="'.$rurl.'" num_posts="'.$arg['fb_num_posts1'].'" width="'.$arg['fb_width1'].'" colorscheme="'.$arg['color_st'].'"></fb:comments>';
					break;
					
				case 'comments':
		 			$form ='<div class="fb_header">'.$arg['fb_header1'].'</div>
		 			<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) {return;}
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/'.$arg['fb_lang'].'/all.js#xfbml=1&appId='.$arg['fb_appId1'].'";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, "script", "facebook-jssdk"));</script>
						<html xmlns:fb="http://ogp.me/ns/fb#"> 
						<fb:comments href="'.$rurl.'" num_posts="'.$arg['fb_num_posts1'].'" width="'.$arg['fb_width1'].'" colorscheme="'.$arg['color_st'].'"></fb:comments>';
				break;	
				case 'like':
					$form = '<div id="fb-root"></div>
							<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) {return;}
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/'.$arg['fb_lang'].'/all.js#xfbml=1&appId='.$arg['fb_appId1'].'";
						  fjs.parentNode.insertBefore(js, fjs);
							}(document, "script", "facebook-jssdk"));</script>
							<html xmlns:fb="http://ogp.me/ns/fb#">
							<fb:like href="'.$rurl.'" send="'.$arg['fb_send1'].'" layout="'.$arg['layout_st'].'" width="'.$arg['fb_width1'].'" show_faces="'.$arg['fb_face1'].'" action="'.$arg['fb_verb'].'"  colorscheme="'.$arg['color_st'].'"></fb:like>';
					break;	
 			endswitch;
		return $form;
	}

	public static function  get_iframe_form ($rurl,$arg,$case) {
	
		$fb_xid1=get_option(fb_xid);
		if ($fb_xid1 == 'p_id')
				$xid=$arg['post_id'];
		else 
				$xid=$rurl;
		
		
		if ($arg['fb_face1'] == 'true') $height='70';
		else 	$height = '35';
		
		switch($case):
			case 'default':
				
				$form = '<div class="fb_header">'.$arg['fb_header1'].'</div>
				<iframe src="//www.facebook.com/plugins/like.php?href='.$rurl.'&amp;send='.$arg['fb_send1'].'&amp;layout='.$arg['layout_st'].'&amp;width='.$arg['fb_width1'].'&amp;show_faces='.$arg['fb_face1'].'&amp;action=like&amp;colorscheme='.$arg['color_st'].'&amp;font=tahoma&amp;height='.$height.'px&amp;appId='.$arg['fb_appId1'].'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$arg['fb_width1'].'; height:'.$height.'px;" allowTransparency="true"></iframe><div id="fb-root"></div><script src="http://connect.facebook.net/'.$arg['fb_lang'].'/all.js#appId='.$arg['fb_appId1'].'&amp;xfbml=1"></script>
				<fb:comments xid="'.$xid.'" numposts="'.$arg['fb_num_posts1'].'" width="'.$arg['fb_width1'].'" publish_feed="'.$arg['fb_feed1'].'" colorscheme="'.$arg['color_st'].'"></fb:comments>';
				
			break;
			case 'like':
			
				$form = '<iframe src="//www.facebook.com/plugins/like.php?href='.$rurl.'&amp;send='.$arg['fb_send1'].'&amp;layout='.$arg['layout_st'].'&amp;width='.$arg['fb_width1'].'&amp;show_faces='.$arg['fb_face1'].'&amp;action=like&amp;colorscheme='.$arg['color_st'].'&amp;font=tahoma&amp;height='.$height.'px&amp;appId='.$arg['fb_appId1'].'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$arg['fb_width1'].'; height:'.$height.'px;" allowTransparency="true"></iframe>';
				
				
			break;
			case 'comments':
					$form = '<div class="fb_header">'.$arg['fb_header1'].'</div>
					<div id="fb-root"></div><script src="http://connect.facebook.net/'.$arg['fb_lang'].'/all.js#appId='.$arg['fb_appId1'].'&amp;xfbml=1"></script><fb:comments colorscheme="'.$arg['color_st'].'" xid="'.$xid.'" numposts="'.$arg['fb_num_posts1'].'" width="'.$arg['fb_width1'].'"   publish_feed="'.$arg['fb_feed1'].'"></fb:comments>';
			break;
		endswitch;
	return $form;
	}
	//widget
	public static function get_form_widget() {
	global $post;
		$post_id	=	$post->ID;
	}
	public static function login(){
		$fb_appId1		=	self::fb_id();
		$form	=	'<div id="fb-root"></div>
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) {return;}
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/'.get_option(fb_language).'/all.js#xfbml=1&appId='.$fb_appId1.'";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, "script", "facebook-jssdk"));</script>
							<div class="fb-login-button" data-show-faces="false" data-width="200" data-max-rows="1"></div>';
		return $form;
	}
	public static function activity($url,$width,$height,$header,$color){		
		$form	=	'<div id="fb-root"></div>
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/'.get_option(fb_language).'/all.js#xfbml=1";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, "script", "facebook-jssdk"));</script>
							<div class="fb-activity" data-site="'.$url.'" data-width="'.$width.'" data-height="'.$height.'" data-header="'.$header.'" data-colorscheme="'.$color.'" data-recommendations="false"></div>';
		return $form;
	}
	public static function w_like($width,$url,$layout,$face,$send,$color,$verb){
		$fb_appId1		=	self::fb_id();
		$form = '<div id="fb-root"></div>
							<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) {return;}
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/'.get_option(fb_language).'/all.js#xfbml=1&appId='.$fb_appId1.'";
						  fjs.parentNode.insertBefore(js, fjs);
							}(document, "script", "facebook-jssdk"));</script>
							<div class="fb-like" data-href="'.$url.'" data-send="'.$send.'" data-layout="'.$layout.'" data-width="'.$width.'" data-show-faces="'.$face.'" data-action="'.$verb.'" data-colorscheme="'.$color.'"></div>';
		return $form;
	}
	public static function like_box($lbox_url,$width,$height,$lb_header,$color,$lb_face,$lb_stream){
		$fb_appId1		=	self::fb_id();
		$form = '<div id="fb-root"></div>
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/'.get_option(fb_language).'/all.js#xfbml=1&appId='.$fb_appId1.'";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, "script", "facebook-jssdk"));</script>
							<html xmlns:fb="http://ogp.me/ns/fb#">
							<div class="fb-like-box" data-href="'.$lbox_url.'" data-width="'.$width.'" data-height="'.$height.'" data-colorscheme="'.$color.'" data-show-faces="'.$lb_face.'"  data-stream="'.$lb_stream.'" data-header="'.$lb_header.'"></div>';
	
		return $form;
	}
	public static	function catch_first_image() {
		 global $post, $posts;
		 $first_img = '';
		 ob_start();
		 ob_end_clean();
		 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		 $first_img = $matches [1] [0];
	
		 return $first_img;
	}
	public static function fb_menu () {
			add_options_page('fb settings','Flexo Facebook Manager','manage_options','fb-manager','flexoFBManager::fb_menu_display','');
	
	}
	 
	 public static function gallery_filter(){
	 	
	 	$pattern	=	"?sgimage=";
	 	$url	='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	 	$ret = strpos($url, $pattern) === false ? false : true;	
	 return $ret; 
	}
	public static function remove_brackets($content=''){

	$ret 			=	"";
	$pattern	=	"[";
	$spos 		=	0;
	$epos			=	-1;
	
	while(($spos = strpos($content,$pattern,++$epos)) > -1):
		$last			=	$epos;
		$epos			=	strpos($content,"]",$spos);
		if($epos != -1):
			//$ret	 .= 
		//	$offset		=	strpos($content," ",$spos);
			//$settings	=	substr($content,$offset,$epos - $offset);

			$ret   .= substr($content,$last,$spos-$last);
	
		endif;
	endwhile;
		$ret .= substr($content,$epos);
			//echo $ret;
	return $ret;
}

		public static function wp_head(){
			self::open_graph_check();
		}
		
		public static function admin_head(){
			include('admin.css.php');
		}
		public static function open_graph_check(){
			?><!-- Flexo Facebook Manager --><?php
			global $post;
			$post_id	=	$post->ID;
			
			$data			=	self::post_vars($post_id);
			if($data['fb_check']	!=	'no') {
						$perm	='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					
						if 			($data['fb_pic']			== 'attach'){$pic_url	=	$data['pic'];}
						elseif ($data['fb_pic'] == 'first_pic') 	{$pic_url	=	self::catch_first_image();}
						elseif ($data['fb_pic'] == 'thumb')				{
							
								if(has_post_thumbnail($post_id)) {
								 $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
									//echo '<pre>';print_r($post);echo '</pre>';
						//	echo 123;	  $aid=get_post_thumbnail_id($post->ID);
							//print_r ($thumb);
							// echo wp_get_attachment_image($aid, 'full');
								}
							
							$pic_url	=	 $thumb[0];
						}
						elseif ($data['fb_pic']	==	'avatar') {
							$settings=get_avatar($post->post_author);
							preg_match('/(?<key>[^=]+)=[\'"](?<val>[^\'"]+)[\'"]/i',$settings,$m);
							$pic_url	=	$m['val'];
							
						}
						else 																			{$pic_url	=	$data['url_pic'];}
						
						if ($data['fb_text'] 		 == 'content') 		{$text1	=	$post-> post_content;}
						elseif ($data['fb_text'] == 'excerpt')		{$text1	=	$post-> post_excerpt;}
						elseif ($data['fb_text'] ==	'seo'&& class_exists('All_in_One_Seo_Pack'))				{$text1	=	get_post_meta($post->ID, "_aioseop_description", true);}
						else 																			{$text1	=	$data['custom_text'];}
						
						if($data['fb_title']		 ==	'seo_title'&& class_exists('All_in_One_Seo_Pack'))			 {$title1=get_post_meta($post->ID, "_aioseop_title", true);}
						elseif($data['fb_title'] ==	'custom_title')		 {$title1	=	$data['custom_title'];}
						else																					 {$title1=$post-> post_title;}
							
						$text = htmlspecialchars(strip_tags($text1)); 
						
						if (get_option(fb_remove_br)=='yes'){$text_kr =	self::remove_brackets($text);}
						else																{$text_kr	=	$text;}
					
						$title=	htmlspecialchars ($title1);
						echo '<link rel="canonical" href="'.$perm.'"/>'."\n";
						remove_action('wp_head','rel_canonical');
						//echo '123'.$pic_url;
						
						?>
					<meta property="og:title" content="<?php echo $title; ?>" />
			    <meta property="og:description" content="<?php echo $text_kr; ?>" />			
			    <meta property="og:locale" content="<?php echo get_option(fb_language); ?>" />	
			    <meta property="og:type" content="blog"/>
			    <meta property="og:url" content="<?php echo $perm; ?>"/>
			    <meta property="og:image" content="<?php echo $pic_url; ?>"/>
			    <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
			    <meta property="fb:app_id" content="<?php echo flexoFBManager::fb_id(); ?>"/>
			    <?php /*<meta property="fb:admins" content="1423356739"/> */ ?>
						<?php
			}
		}
	
	


	public static function parse_locale($_lang){
		//$lang	=	"en_US";
		$lang = "bg_BG";
		
		return $lang;
	}
}//class main

/* Widget -------------------------------------------------------------
---------------------------------------------*/
class flexoFBManager_widget extends WP_Widget {
	
	/** constructor */
	function __construct() {
		parent::WP_Widget( /* Base ID */'flexoFBManager_widget', /* Name */'Flexo Facebook Manager', array( 'description' => 'Integrates Facebook in your Site.' ) );
	}
	
	
  function flexofacebook(){
    $widget_ops = array('classname' => 'widget_flexo_fb', 'description' => __( "Flexo Facebook Manager") );
    $control_ops = array('width' => 200, 'height' => 200);
    $this->WP_Widget('Flexo Facebook Manager', __('All in One Facebook Manager – integrates Facebook in your Site'), $widget_ops, $control_ops);
  }


	function widget( $args, $instance ) {
			
			extract($args);
      $title 				= apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title']);
      $like 				= empty($instance['like']) ? 'false' : $instance['like'];
      $url 					= empty($instance['url']) ? 'home' : $instance['url'];
      $other_url 		= empty($instance['other_url']) ? '' : $instance['other_url'];
      $face 				= empty($instance['face']) ? 'false' : $instance['face'];
      $login 				= empty($instance['login']) ? 'false' : $instance['login'];
      $activity 		= empty($instance['activity']) ? 'false' : $instance['activity'];
      $activity_url = empty($instance['activity_url']) ? '' : $instance['activity_url'];
      $color 				= empty($instance['color']) ? 'light' : $instance['color'];
      $layout 			= empty($instance['layout']) ? 'standard' : $instance['layout'];
      $width 				= empty($instance['width']) ? '200' : $instance['width'];
      $height	 			= empty($instance['height']) ? '70' : $instance['height'];
      $header 			= empty($instance['header']) ? 'true' : $instance['header'];
      $send 				= empty($instance['send']) ? 'true' : $instance['send'];
      $like_box	 		= empty($instance['like_box']) ? 'false' : $instance['like_box'];
      $lb_header 		= empty($instance['lb_header']) ? 'true' : $instance['lb_header'];
      $lb_face 			= empty($instance['lb_face']) ? 'true' : $instance['lb_face'];
      $lb_stream		= empty($instance['lb_stream']) ? 'true' : $instance['lb_stream'];
      $lbox_url 		= empty($instance['lbox_url']) ? 'home' : $instance['lbox_url'];
      $lb_other_url = empty($instance['lb_other_url']) ? '' : $instance['lb_other_url'];
      $verb					=	empty($instance['verb']) ? 'like' : $instance['verb'];
     echo '<h2>'.$title.'</h2>';
      if ( $login ==	'true'){
      		echo '<div id="flexo-login">'.flexoFBManager::login().'</div>';
    	}
    	
    	if (	$like	==	'true'){
    		if ($url	==	'home'){
    			$url_to_like	=	 get_bloginfo('url');
    		}
    		if($url	==	'other'){
    			$url_to_like	=	 $other_url;
    		}
    		if($url	==	'current'){
    			$url_to_like	=	'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    		}
    		
    		echo  '<div id="flexo-like">'.flexoFBManager::w_like($width,$url_to_like,$layout,$face,$send,$color,$verb).'</div>';
    	}
      
      if (	$activity	==	'true'){
    		echo  '<div id="flexo-activity">'.flexoFBManager::activity($activity_url,$width,$height,$header,$color).'</div>';
    	}
    	
    	if (	$like_box	==	'true'){
    		if ($url	==	'home'){
    			$url_to_like_box	=	 get_bloginfo('url');
    		}
    		if($url	==	'other'){
    			$url_to_like_box	=	 $lb_other_url;
    		}
    		if($url	==	'current'){
    			$url_to_like_box	=	'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    		}
    		
    		echo  '<div id="flexo-like-box">'.flexoFBManager::like_box($url_to_like_box,$width,$height,$lb_header,$color,$lb_face,$lb_stream).'</div>';
    	}
      
	}
	function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
      $instance['title'] = strip_tags(stripslashes($new_instance['title']));
      $instance['like'] = strip_tags(stripslashes($new_instance['like']));
      $instance['url'] = strip_tags(stripslashes($new_instance['url']));
      $instance['other_url'] = strip_tags(stripslashes($new_instance['other_url']));
      $instance['face'] = strip_tags(stripslashes($new_instance['face']));
      $instance['login'] = strip_tags(stripslashes($new_instance['login']));
      $instance['activity'] = strip_tags(stripslashes($new_instance['activity']));
      $instance['activity_url'] = strip_tags(stripslashes($new_instance['activity_url']));
      $instance['color'] = strip_tags(stripslashes($new_instance['color']));
      $instance['layout'] = strip_tags(stripslashes($new_instance['layout']));
      $instance['verb'] = strip_tags(stripslashes($new_instance['verb']));
      $instance['width'] = strip_tags(stripslashes($new_instance['width']));
      $instance['height'] = strip_tags(stripslashes($new_instance['height']));
      $instance['header'] = strip_tags(stripslashes($new_instance['header']));
      $instance['send'] = strip_tags(stripslashes($new_instance['send']));
      $instance['like_box'] = strip_tags(stripslashes($new_instance['like_box']));
      $instance['lbox_url'] = strip_tags(stripslashes($new_instance['lbox_url']));
      $instance['lb_header'] = strip_tags(stripslashes($new_instance['lb_header']));
      $instance['lb_face'] = strip_tags(stripslashes($new_instance['lb_face']));
      $instance['lb_stream'] = strip_tags(stripslashes($new_instance['lb_stream']));
      $instance['lb_other_url'] = strip_tags(stripslashes($new_instance['lb_other_url']));
      
    return $instance;
	}
	function form( $instance ) {
			//echo'<pre>';print_r ( $instance);echo'</pre>';
			//st-ti po podrazbirane
		//	$instance = wp_parse_args( (array) $instance, array('title'	=> '','like'	=>	'false','face'	=>	'false') );
			$title 				= htmlspecialchars($instance['title']);
      $like 				= htmlspecialchars($instance['like']);
      $url 					= htmlspecialchars($instance['url']);
      $other_url 		= htmlspecialchars($instance['other_url']);
      $height 			= htmlspecialchars($instance['height']);
      $face 				= htmlspecialchars($instance['face']);
      $login 				= htmlspecialchars($instance['login']);
      $activity 		= htmlspecialchars($instance['activity']);
      $activity_url = htmlspecialchars($instance['activity_url']);
      $color 				= htmlspecialchars($instance['color']);
      $layout 			= htmlspecialchars($instance['layout']);
      $verb 				= htmlspecialchars($instance['verb']);
      $width 				= htmlspecialchars($instance['width']);
      $height 			= htmlspecialchars($instance['height']);
      $header 			= htmlspecialchars($instance['header']);
      $send 				= htmlspecialchars($instance['send']);
      $like_box 		= htmlspecialchars($instance['like_box']);
      $lbox_url 		= htmlspecialchars($instance['lbox_url']);
      $lb_header 		= htmlspecialchars($instance['lb_header']);
      $lb_face 			= htmlspecialchars($instance['lb_face']);
      $lb_stream 		= htmlspecialchars($instance['lb_stream']);
      $lb_other_url = htmlspecialchars($instance['lb_other_url']);
    

		?><div class="FB-weight">
<!-- Title -->
		<label for="<?php echo $this->get_field_name('title');?> ">Title  
			<input id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
		</label></br ></br >
		
			<label for="<?php echo $this->get_field_name('width');?> ">width 
				<input id="<?php echo $this->get_field_id('width');?>" name="<?php echo $this->get_field_name('width');?>" type="text" value="<?php echo $width;?>" />
			</label></br >
			<label for="<?php echo $this->get_field_name('height');?> ">height
				<input id="<?php echo $this->get_field_id('height');?>" name="<?php echo $this->get_field_name('height');?>" type="text" value="<?php echo $height;?>" />
			</label></br ></br >
	
<!-- Login Button	 -->
		<label for="<?php echo $this->get_field_name('login');?> "><div class="widget-top"><div class="widget-title"><h4>Login Button	<span class="in-widget-title"></span></h4></div>
			<div class="w-a weight-arrows1"></div>
			</div>
			<div class="togg1">
			<input type="radio" name="<?php echo $this->get_field_name('login');?>" value="true"<?php echo $login == 'true' ? 'checked' : ''; ?>> Yes
			<input type="radio" name="<?php echo $this->get_field_name('login');?>" value="false"<?php echo $login == 'false' ? 'checked' : '';?>>	No
		
		</label></br ></br >
		</div>
<!-- Like Button	 -->
		<label for="<?php echo $this->get_field_name('like');?> "><div class="widget-top"><div class="widget-title"><h4>Like Button	<span class="in-widget-title"></span></h4></div>
			<div class="w-a weight-arrows2"></div>
			</div> 	
				<div class="togg2">
			<input type="radio" name="<?php echo $this->get_field_name('like');?>" value="true"<?php echo $like == 'true' ? 'checked' : ''; ?>> Yes
			<input type="radio" name="<?php echo $this->get_field_name('like');?>" value="false"<?php echo $like == 'false' ? 'checked' : '';?>>	No
		</label></br >
				
		<label for="<?php echo $this->get_field_name('verb');?> "><div class="second-title">Verb to display</div>	
			<input type="radio" name="<?php echo $this->get_field_name('verb');?>" value="like"<?php echo $verb == 'like' ? 'checked' : ''; ?>> Like
			<input type="radio" name="<?php echo $this->get_field_name('verb');?>" value="recommend"<?php echo $verb == 'recommend' ? 'checked' : '';?>>	Recommend</br >
		</label>		
										
		<label for="<?php echo $this->get_field_name('url');?> "><div class="second-title">URL to Like</div>	
			<input type="radio" name="<?php echo $this->get_field_name('url');?>" value="home"<?php echo $url == 'home' ? 'checked' : ''; ?>> Home URL
			<input type="radio" name="<?php echo $this->get_field_name('url');?>" value="current"<?php echo $url == 'current' ? 'checked' : '';?>>	Current URL</br >
			<input type="radio" name="<?php echo $this->get_field_name('url');?>" value="other"<?php echo $url == 'other' ? 'checked' : '';?>>	Other URL
		</label>
		
		<label for="<?php echo $this->get_field_name('other_url');?> ">
			<input id="<?php echo $this->get_field_id('other_url');?>" name="<?php echo $this->get_field_name('other_url');?>" type="text" value="<?php echo $other_url;?>" />
		</label></br >
		
		<label for="<?php echo $this->get_field_name('face');?> "><div class="second-title">Show Faces	</div>
			<input type="radio" name="<?php echo $this->get_field_name('face');?>" value="true"<?php echo $face == 'true' ? 'checked' : ''; ?>> Yes
			<input type="radio" name="<?php echo $this->get_field_name('face');?>" value="false"<?php echo $face == 'false' ? 'checked' : '';?>>	No
		</label></br >
		<label for="<?php echo $this->get_field_name('send');?> "><div class="second-title">Send Button</div>
			<input type="radio" name="<?php echo $this->get_field_name('send');?>" value="true"<?php echo $send == 'true' ? 'checked' : ''; ?>> Yes
			<input type="radio" name="<?php echo $this->get_field_name('send');?>" value="false"<?php echo $send == 'false' ? 'checked' : '';?>>	No
		</label></br >
		
		<label for="<?php echo $this->get_field_name('layout');?> "><div class="second-title">Layout Style	</div>
			<input type="radio" name="<?php echo $this->get_field_name('layout');?>" value="standard"<?php echo $layout == 'standard' ? 'checked' : ''; ?>> standard
			<input type="radio" name="<?php echo $this->get_field_name('layout');?>" value="button_count"<?php echo $layout == 'button_count' ? 'checked' : '';?>>	button_count	
			<input type="radio" name="<?php echo $this->get_field_name('layout');?>" value="box_count"<?php echo $layout == 'box_count' ? 'checked' : '';?>>	box_count
		</label>
		</div>
<!-- Like Box	 -->
		<label for="<?php echo $this->get_field_name('login');?> "><div class="widget-top"><div class="widget-title"><h4>Like Box<span class="in-widget-title"></span></h4></div>
			<div class="w-a weight-arrows3"></div>
			</div>
				<div class="togg3">
			<input type="radio" name="<?php echo $this->get_field_name('like_box');?>" value="true"<?php echo $like_box == 'true' ? 'checked' : ''; ?>> Yes
			<input type="radio" name="<?php echo $this->get_field_name('like_box');?>" value="false"<?php echo $like_box == 'false' ? 'checked' : '';?>>	No
		</label>
		
		
		<label for="<?php echo $this->get_field_name('lbox_url');?> "><div class="second-title">URL to Like	</div>
			<input type="radio" name="<?php echo $this->get_field_name('lbox_url');?>" value="home"<?php echo $lbox_url == 'home' ? 'checked' : ''; ?>> Home URL
			<input type="radio" name="<?php echo $this->get_field_name('lbox_url');?>" value="current"<?php echo $lbox_url == 'current' ? 'checked' : '';?>>	Current URL</br >
			<input type="radio" name="<?php echo $this->get_field_name('lbox_url');?>" value="other"<?php echo $lbox_url == 'other' ? 'checked' : '';?>>	Other URL
		</label>
		
		<label for="<?php echo $this->get_field_name('lb_other_url');?> ">
			<input id="<?php echo $this->get_field_id('lb_other_url');?>" name="<?php echo $this->get_field_name('lb_other_url');?>" type="text" value="<?php echo $lb_other_url;?>" />
		</label>
		
		<label for="<?php echo $this->get_field_name('lb_header');?> "><div class="second-title">Show Header</div>	
			<input type="radio" name="<?php echo $this->get_field_name('lb_header');?>" value="true"<?php echo $lb_header == 'true' ? 'checked' : ''; ?>> Yes
			<input type="radio" name="<?php echo $this->get_field_name('lb_header');?>" value="false"<?php echo $lb_header == 'false' ? 'checked' : '';?>>	No
		</label>
		
		<label for="<?php echo $this->get_field_name('lb_face');?> "><div class="second-title">Show Faces	</div>
			<input type="radio" name="<?php echo $this->get_field_name('lb_face');?>" value="true"<?php echo $lb_face == 'true' ? 'checked' : ''; ?>> Yes
			<input type="radio" name="<?php echo $this->get_field_name('lb_face');?>" value="false"<?php echo $lb_face == 'false' ? 'checked' : '';?>>	No
		</label>
		
		<label for="<?php echo $this->get_field_name('lb_stream');?> "><div class="second-title">Show Stream</div>	
			<input type="radio" name="<?php echo $this->get_field_name('lb_stream');?>" value="true"<?php echo $lb_stream == 'true' ? 'checked' : ''; ?>> Yes
			<input type="radio" name="<?php echo $this->get_field_name('lb_stream');?>" value="false"<?php echo $lb_stream == 'false' ? 'checked' : '';?>>	No
		</label>
			</div>
<!-- Activity Feed		 -->	
		<label for="<?php echo $this->get_field_name('activity');?> "><div class="widget-top"><div class="widget-title"><h4>Activity Feed	<span class="in-widget-title"></span></h4></div>
			<div class="w-a weight-arrows4"></div>
			</div>
			<div class="togg4">
			<input type="radio" name="<?php echo $this->get_field_name('activity');?>" value="true"<?php echo $activity == 'true' ? 'checked' : ''; ?>> Yes
			<input type="radio" name="<?php echo $this->get_field_name('activity');?>" value="false"<?php echo $activity == 'false' ? 'checked' : '';?>>	No
		</label>
		<label for="<?php echo $this->get_field_name('activity_url');?> "><div class="second-title">Activity URL</div>
			<input id="<?php echo $this->get_field_id('activity_url');?>" name="<?php echo $this->get_field_name('activity_url');?>" type="text" value="<?php echo $activity_url; ?>" />
		</label></br >
		<label for="<?php echo $this->get_field_name('header');?> "><div class="second-title">Show Header</div>	
			<input type="radio" name="<?php echo $this->get_field_name('header');?>" value="true"<?php echo $header == 'true' ? 'checked' : ''; ?>> Yes
			<input type="radio" name="<?php echo $this->get_field_name('header');?>" value="false"<?php echo $header == 'false' ? 'checked' : '';?>>	No
		</label>
		</div>
<!-- Other Options		 -->		
	<label for="<?php echo $this->get_field_name('color');?> "><div class="widget-top"><div class="widget-title"><h4>Color Scheme<span class="in-widget-title"></span></h4></div>
		<div class="w-a weight-arrows5"></div>
		</div>
		<div class="togg5">
			<input type="radio" name="<?php echo $this->get_field_name('color');?>" value="light"<?php echo $color == 'light' ? 'checked' : ''; ?>> light
			<input type="radio" name="<?php echo $this->get_field_name('color');?>" value="dark"<?php echo $color == 'dark' ? 'checked' : '';?>>	dark
		</label>
	</div></div>
		<?php
}
		


}//class widget
function FlexoFacebookInit() {
  register_widget('flexoFBManager_widget');
  }
  add_action('widgets_init', 'FlexoFacebookInit');
  
 function add_custom_js(){
	$url = plugins_url( '',__FILE__ );

		wp_enqueue_script('FlexoScript', $url.'/script.js', array('jquery'));

}

/* =Add admin menu
------------------------------------------*/
if(function_exists('add_action')):
	add_action('admin_menu', 'flexoFBManager::fb_menu');
	add_option('fb_width','600','fb_width');
	add_option('fb_appId','','fb_appId');
	add_option('fb_num_posts','10','fb_num_posts');
	add_option('fb_language','en_US','fb_language');
	add_option('fb_feed','true','fb_feed');
	add_option('fb_type','html','fb_type');
	add_option('fb_xid','url','fb_xid');
	add_option('fb_face','false','fb_face');
	add_option('fb_send','false','fb_send');
	add_option('fb_layout','bottom','fb_layout');
	add_option('fb_header','','fb_header');
	add_option('fb_post_meta','yes','Fb_Post_Meta');
	add_option('fb_remove_br','yes','fb_remove_br');
	add_option('fb_color_st','light','fb_color_st');
	add_option('fb_layout_st','standard','fb_layout_st');
	add_option('fb_verb','like','fb_verb');
	//add_action('widgets_init', 'add_custom_js');	
	add_action('widgets_admin_page', 'add_custom_js');	

		
	add_action('admin_menu', 'flexoFBManager::admin_on_post_show' );
	add_action('admin_menu', 'flexoFBManager::admin_on_page_show' );
	add_action('save_post', 'flexoFBManager::admin_on_post_save');
	add_action('save_page', 'flexoFBManager::admin_on_post_save');
	add_action('wp_footer', 'flexoFBManager::wp_footer');
	add_action('wp_head'	,	'flexoFBManager::wp_head',1);
	add_action('admin_head', 'flexoFBManager::admin_head');
	
	add_filter('the_content', 'flexoFBManager::the_content');
endif;

?>