<?php 
if( !defined('ABSPATH') ){ exit();}
add_action(  'transition_post_status',  'xyz_link_tbap_future_to_publish', 10, 3 );
function xyz_link_tbap_future_to_publish($new_status, $old_status, $post){
	if (isset($_GET['_locale']) && empty($_POST))
		return ;
	if(!isset($GLOBALS['tbap_dup_publish']))
		$GLOBALS['tbap_dup_publish']=array();
	$postid =$post->ID;
	$post_published_date_time=$post_modified_date_time=time();
	if ($post) {
		$post_published_date_time = strtotime(get_the_date('Y-m-d H:i:s', $postid));
		$post_modified_date_time = strtotime(get_the_modified_date('Y-m-d H:i:s', $postid));
	}
	$get_post_meta=get_post_meta($postid,"xyz_tbap",true);
	
	$post_tumblr_permission=get_option('xyz_tbap_tbpost_permission');
	if(isset($_POST['xyz_tbap_tbpost_permission'])){
		$post_tumblr_permission=intval($_POST['xyz_tbap_tbpost_permission']);
		if((isset($_POST['xyz_tbap_tbpost_permission']) && isset($_POST['xyz_tbap_tbpost_media_permission'])))
		{
			$futToPubDataArray=array( 'post_tumblr_permission'	=>	$_POST['xyz_tbap_tbpost_permission'],
					'xyz_tbap_tbpost_media_permission'	=>	$_POST['xyz_tbap_tbpost_media_permission'],
					'xyz_tbap_tbmessage'	=>	$_POST['xyz_tbap_tbmessage']);
			update_post_meta($postid, "xyz_tbap_future_to_publish", $futToPubDataArray);
		}
	}
	else
	{
		if ($post_tumblr_permission == 1) {
			if($new_status == 'publish')
			{
				if ($get_post_meta == 1 ) {
					if(get_option('xyz_tbap_default_selection_edit')==0)
					return;
				}
				else //prevent backend publish
				{
					//post meta not 1, edited post
					if (($post_modified_date_time != $post_published_date_time) && $old_status=='publish' ) 
					{//already plublished being edited
						if ((get_option('xyz_tbap_default_selection_edit') == 0))
							return;
					}
					else //post meta not 1, new post 
					{
						if ((get_option('xyz_tbap_default_selection_create') == 0))
						return;
					}
				}
			}
			else return;
		}
	}
	if($post_tumblr_permission == 1)
	{
		if($new_status == 'publish')
		{
			if(!in_array($postid,$GLOBALS['tbap_dup_publish'])) {
				$GLOBALS['tbap_dup_publish'][]=$postid;
				xyz_tbap_link_publish($postid);
			}
		}
	}
}

function xyz_tbap_link_publish($post_ID) {

	$_POST_CPY=$_POST;
	$_POST=stripslashes_deep($_POST);
	$post_tumblr_media_permission=0;
	$messagetopost='';
	$post_tumblr_permission=get_option('xyz_tbap_tbpost_permission');
	$get_post_meta_future_data=get_post_meta($post_ID,"xyz_tbap_future_to_publish",true);
	
	$get_post_meta=get_post_meta($post_ID,"xyz_tbap",true);
	if(!empty($get_post_meta_future_data) && ((get_option('xyz_tbap_default_selection_edit')==2 && $get_post_meta==1) || (get_option('xyz_tbap_default_selection_create')==2 && $get_post_meta!=1 )))///select values from post meta
	{
		$post_tumblr_permission=$get_post_meta_future_data['post_tumblr_permission'];
		$post_tumblr_media_permission=$get_post_meta_future_data['xyz_tbap_tbpost_media_permission'];
		$messagetopost=$get_post_meta_future_data['xyz_tbap_tbmessage'];
	}
	if(isset($_POST['xyz_tbap_tbpost_permission']))
	$post_tumblr_permission=intval($_POST['xyz_tbap_tbpost_permission']);
	if ($post_tumblr_permission != 1) {
		$_POST=$_POST_CPY;
		return ;
	} else if(( (isset($_POST['_inline_edit'])) || (isset($_REQUEST['bulk_edit'])) )  && (get_option('xyz_tbap_default_selection_edit') == 0 && $get_post_meta==1) ) {
		$_POST=$_POST_CPY;
		return;
	}
	global $current_user;
	wp_get_current_user();
	$af=get_option('xyz_tbap_af');
	$tbappid=get_option('xyz_tbap_tbconsumer_id');
	$tbappsecret=get_option('xyz_tbap_tbconsumer_secret');
	$tbid=get_option('xyz_tbap_tb_id');
	$tbaccess_token=get_option('xyz_tbap_current_tbappln_token');
	$tbaccess_token_secret=get_option('xyz_tbap_tbaccestok_secret');
	if ($messagetopost=='')
	$messagetopost=get_option('xyz_tbap_tbmessage');
	if(isset($_POST['xyz_tbap_tbmessage']))
		$messagetopost=sanitize_textarea_field($_POST['xyz_tbap_tbmessage']);
	if ($post_tumblr_media_permission==0)
	$post_tumblr_media_permission=get_option('xyz_tbap_tbpost_media_permission');
	if(isset($_POST['xyz_tbap_tbpost_media_permission']))
		$post_tumblr_media_permission=intval($_POST['xyz_tbap_tbpost_media_permission']);
	$postpp= get_post($post_ID);global $wpdb;

	$entries0 = $wpdb->get_results($wpdb->prepare( 'SELECT user_nicename,display_name FROM '.$wpdb->base_prefix.'users WHERE ID=%d',$postpp->post_author));
	foreach( $entries0 as $entry ) {			
		$user_nicename=$entry->user_nicename;
		$user_displayname=$entry->display_name;
	}
	if ($postpp->post_status == 'publish')
	{
		$posttype=$postpp->post_type;
		if ($posttype=="page")
		{
			$xyz_tbap_include_pages=get_option('xyz_tbap_include_pages');	
			if($xyz_tbap_include_pages==0)
			{
				$_POST=$_POST_CPY;return;
			}
		}
		else if($posttype=="post")
		{
			$xyz_tbap_include_posts=get_option('xyz_tbap_include_posts');
			if($xyz_tbap_include_posts==0)
			{
				$_POST=$_POST_CPY;
				return;
			}
			$xyz_tbap_include_categories=get_option('xyz_tbap_include_categories');
			if($xyz_tbap_include_categories!="All")
			{
				$carr1=explode(',',$xyz_tbap_include_categories);
				$defaults = array('fields' => 'ids');
				$carr2=wp_get_post_categories( $post_ID, $defaults );
				$retflag=1;
				foreach ($carr2 as $key=>$catg_ids)
				{
				if(in_array($catg_ids, $carr1))
					$retflag=0;
				}
				if($retflag==1)
				{$_POST=$_POST_CPY;return;}
			}
		}
		else
		{
			$xyz_tbap_include_customposttypes=get_option('xyz_tbap_include_customposttypes');
			if($xyz_tbap_include_customposttypes!='')
			{
			$carr=explode(',', $xyz_tbap_include_customposttypes);
				if(!in_array($posttype, $carr))
				{
					$_POST=$_POST_CPY;return;
				}	
			}
			else 
			{
			$_POST=$_POST_CPY;return;	
			}
		}
		$get_post_meta=get_post_meta($post_ID,"xyz_tbap",true);
		if($get_post_meta!=1)
			add_post_meta($post_ID, "xyz_tbap", "1");
		include_once ABSPATH.'wp-admin/includes/plugin.php';
		$pluginName = 'bitly/bitly.php';
		if (is_plugin_active($pluginName))
			remove_all_filters('post_link');
		$link = get_permalink($postpp->ID);
		$xyz_tbap_apply_filters=get_option('xyz_tbap_apply_filters');
		$ar2=explode(",",$xyz_tbap_apply_filters);
		$con_flag=$exc_flag=$tit_flag=0;
		if(isset($ar2))
		{
			if(in_array(1, $ar2)) $con_flag=1;
			if(in_array(2, $ar2)) $exc_flag=1;
			if(in_array(3, $ar2)) $tit_flag=1;
		}
		$content = $postpp->post_content;
		if($con_flag==1)
			$content = apply_filters('the_content', $content);
		$content = html_entity_decode($content, ENT_QUOTES, get_bloginfo('charset'));
		$excerpt = $postpp->post_excerpt;
		if($exc_flag==1)
			$excerpt = apply_filters('the_excerpt', $excerpt);
		$excerpt = html_entity_decode($excerpt, ENT_QUOTES, get_bloginfo('charset'));
		$content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
		$content=  preg_replace("/\\[caption.*?\\].*?\\[.caption\\]/is","", $content);
		$content = preg_replace('/\[.+?\]/', '', $content);
		$excerpt = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $excerpt);
		
		if($excerpt=="")
		{
			if($content!="")
			{
				$content1=$content;
				$content1=strip_tags($content1);
				$content1=strip_shortcodes($content1);
				$excerpt=implode(' ', array_slice(explode(' ', $content1), 0, 50));
			}
		}
		else
		{
			$excerpt=strip_tags($excerpt);
			$excerpt=strip_shortcodes($excerpt);
		}
		$description = $content;
		$description_org=$description;
		$attachmenturl=xyz_tbap_getimage($post_ID, $postpp->post_content);

		if(!empty($attachmenturl))
			$image_found=1;
		else
			$image_found=0;
		$name = $postpp->post_title;
		$caption = html_entity_decode(get_bloginfo('title'), ENT_QUOTES, get_bloginfo('charset'));
		
		if($tit_flag==1)
			$name = apply_filters('the_title', $name,$post_ID);
		
		$name = html_entity_decode($name, ENT_QUOTES, get_bloginfo('charset'));
		$name=strip_tags($name);
		$name=strip_shortcodes($name);
		$description=strip_tags($description);		
		$description=strip_shortcodes($description);
		$description=str_replace("&nbsp;","",$description);
		$excerpt=str_replace("&nbsp;","",$excerpt);
		
		if($tbaccess_token!="" && $tbaccess_token_secret!="" && $tbappid!="" && $tbappsecret!="" && $post_tumblr_permission==1)
		{
			$data=array();
			$img_status="";
			if($post_tumblr_media_permission==1)
			{
				$img=array();
				if(!empty($attachmenturl))
					$img = wp_remote_get($attachmenturl,array('sslverify'=> (get_option('xyz_tbap_peer_verification')=='1') ? true : false));
					
				if(is_array($img))
				{
					if (isset($img['body'])&& trim($img['body'])!='')
					{
						$image_found = 1;
							if (($img['headers']['content-length']) && trim($img['headers']['content-length'])!='')
							{
								$img_size=$img['headers']['content-length']/(1024*1024);
								if($img_size>10){$image_found=0;$img_status="Image skipped(greater than 10MB)";}
							}
						$img = $img['body'];
					}
					else
						$image_found = 0;
				}
			}
			$messagetopost=str_replace("&nbsp;","",$messagetopost);
			$substring="";$islink=0;$issubstr=0;
		
			$substring=str_replace('{POST_TITLE}', $name, $messagetopost);
			$substring=str_replace('{BLOG_TITLE}', $caption,$substring);
			$substring=str_replace('{PERMALINK}', ' '.$link.' ', $substring);
			$substring=str_replace('{POST_EXCERPT}', $excerpt, $substring);
			$substring=str_replace('{POST_CONTENT}', $description, $substring);
			$substring=str_replace('{USER_NICENAME}', $user_nicename, $substring);
			$substring=str_replace('{USER_DISPLAY_NAME}', $user_displayname, $substring);
			$publish_time=get_the_time(get_option('date_format'),$post_ID );
			$substring=str_replace('{POST_PUBLISH_DATE}', $publish_time, $substring);
			$substring=str_replace('{POST_ID}', $post_ID, $substring);

			$client = new Tumblr\API\Client($tbappid, $tbappsecret);
			$client->setToken($tbaccess_token, $tbaccess_token_secret);
			$tb_publish_status=array();$tb_publish_status['status_msg']='';
			
			if($post_tumblr_media_permission==1 && $image_found==1)
				$data = array('type' => 'photo', 'caption' => $name, 'source' => $attachmenturl);//image
			
			else if($post_tumblr_media_permission==2)
			{
				if($image_found==1)
					$data = array('type' => 'link','title' => $name, 'url' => $link, 'description'=>$substring, 'thumbnail'=>$attachmenturl); //link with img
				else 
					$data = array('type' => 'link','title' => $name, 'url' => $link, 'description'=>$substring); //link without image
			}
			
			else
				$data = array('type' => 'text', 'title' => $name, 'body' => $substring);    //simple text
			
			if(!empty($data))
			{
				try{
					$post_id_string='';
					$blog_name = $tbid.'.tumblr.com';
					$createPost = $client->createPost($blog_name, $data);
					if (isset($createPost->id)){
						$posturl = 'https://'.$tbid.'.tumblr.com/post/'.$createPost->id.'/';
						$post_id_string="<br/><span style=\"color:#21759B;text-decoration:underline;\"><a  href=".$posturl.">View Post</a></span>";
					}
					$tb_publish_status['status_msg'].="<span style=\"color:green\">Success.</span>".$post_id_string;
				}
				catch (Exception $e)
				{
					$tb_publish_status['status_msg'].="<span style=\"color:red\">".$e->getMessage().".</span>";
				}
			}
			$tb_publish_status_insert=serialize($tb_publish_status['status_msg']);
			$time=time();
			$post_tb_options=array(
					'postid'	=>	$post_ID,
					'acc_type'	=>	"tumblr",
					'publishtime'	=>	$time,
					'status'	=>	$tb_publish_status_insert
			);
			$update_opt_array=array();
			$arr_retrive=(get_option('xyz_tbap_post_logs'));
			$update_opt_array[0]=isset($arr_retrive[0]) ? $arr_retrive[0] : '';
			$update_opt_array[1]=isset($arr_retrive[1]) ? $arr_retrive[1] : '';
			$update_opt_array[2]=isset($arr_retrive[2]) ? $arr_retrive[2] : '';
			$update_opt_array[3]=isset($arr_retrive[3]) ? $arr_retrive[3] : '';
			$update_opt_array[4]=isset($arr_retrive[4]) ? $arr_retrive[4] : '';
			$update_opt_array[5]=isset($arr_retrive[5]) ? $arr_retrive[5] : '';
			$update_opt_array[6]=isset($arr_retrive[6]) ? $arr_retrive[6] : '';
			$update_opt_array[7]=isset($arr_retrive[7]) ? $arr_retrive[7] : '';
			$update_opt_array[8]=isset($arr_retrive[8]) ? $arr_retrive[8] : '';
			$update_opt_array[9]=isset($arr_retrive[9]) ? $arr_retrive[9] : '';
			array_shift($update_opt_array);
			array_push($update_opt_array,$post_tb_options);
			update_option('xyz_tbap_post_logs', $update_opt_array);
		}
	}
	$_POST=$_POST_CPY;
}
?>