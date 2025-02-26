<?php

require(PT_ABSPATH . 'lib/post-thumb-admin-functions.php');

################################################################################
########## Administration class
################################################################################
class PostThumbAdmin {

	// Version and path to check version
	var $PTRVERSION;
	var $PTRURL = 'http://www.alakhnor.com/post-thumb/ptrversion.htm';

	var $settings;
	var $table_pt_post;
	var $tablestruct = " (post_id int(10) unsigned NOT NULL, body longtext NOT NULL ) ";
	var $tablequery = " post_id, body ";
	var $update_error = false;
	var $error_msg = '';
	var $testimg = 'images/test.jpg';

	var $BooleanList = array('safe_mode', 'rounded' , 'append', 'use_meta','use_png' ,'keep_ratio', 'max',
				'unsharp', 'use_catname', 'stream_check', 'hs_wordtube', 'wt_append', 'hs_youtube',
				'hs_use', 'caption', 'tb_use', 'sb_use', 'hs_post', 'p_keep_ratio', 'p_max', 'p_rounded', 'p_use_png',
				'pt_replace', 'p_caption', 'wt_media', 'wt_playlist', 'ytb_media', 'p_rel', 'p_lightbox');

	var $OptionList = array('updslice', 'append_text', 'resize_width', 'resize_height', 'wordtube_width', 'wordtube_height',
				'wordtube_pwidth', 'wordtube_pheight', 'wordtube_text', 'wordtube_vtext', 'wordtube_mtext', 
				'ovframe', 'hsframe', 'hs_width', 'hs_height', 'ovtopframe', 'unsharp_amount', 'unsharp_radius',
				'unsharp_threshold', 'corner_ratio', 'youtube_width', 'youtube_height',	'youtube_pwidth',
				'youtube_pheight', 'jpg_rate', 'png_rate', 'video_regex', 'bgcolor', 'hdcolor', 'ftcolor',
				'hsmargin', 'p_append_text', 'p_resize_width', 'p_resize_height', 'p_dirname', 'p_subfolder');
	
	/****************************************************************/
	/* Constructor
	/****************************************************************/
	function PostThumbAdmin() {
		global $wpdb;
			
		$this->settings = pt_GetStarterOptions();
		$this->table_pt_post = $wpdb->prefix . "pt_post";
		$this->PTRVERSION = PTRVERSION;
		
		// add WP actions - not limited to is_admin() to be applied also in case of xmlrpc posts by external blogging application
		add_action('publish_post',		array(&$this, 'savePostImage'));
		add_action('edit_post',			array(&$this, 'savePostImage'));
		add_action('save_post',			array(&$this, 'savePostImage'));
		add_action('wp_insert_post',		array(&$this, 'savePostImage'));
		add_action('wp_insert_post',		array(&$this, 'savePostImage'));
		add_action('private_to_published',	array(&$this, 'savePostImage'));
		add_action('delete_post', 		array(&$this, 'deletePostImage'));

		// Header
		if ('deactivate' != $_GET['action'] && stripos($_SERVER['REQUEST_URI'], 'post-thumb-options.php') !== false) {
			add_action('admin_head', 'pt_admin_include_header');
		}

		// Plugin activation
		add_action('activate_post-thumb/post-thumb.php', array(&$this, 'activate'));

		// add option screen menu
		add_action('admin_menu', array(&$this, 'options'));
		
		// check if we need to upgrade
		if ( $this->settings['version'] < $this->PTRVERSION  ) {
			// Execute installation
			$this->install();
				
			// Update version number in the options
			$this->settings['version'] = $this->PTRVERSION;
		}

	}
	/****************************************************************/
	/* Plugin activation
	/****************************************************************/
	function activate() {
		$this->install(false);
	}
	/****************************************************************/
	/* Add post-thumb option
	/****************************************************************/
	function options() {

		if (function_exists('add_options_page'))
			add_options_page('Post Thumb Revisited', 'Post Thumb', 8, basename(__FILE__), array(&$this, 'MenuOptions'));

	}
	/****************************************************************/
	/* Installation routine
	/****************************************************************/
	function install($show_results=true) {

		global $wpdb;

		// add charset & collate like wp core
		$charset_collate = '';
	
		if ( version_compare(mysql_get_server_info(), '4.1.0', '>=') ) {
			if ( ! empty($wpdb->charset) )
				$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
			if ( ! empty($wpdb->collate) )
				$charset_collate .= " COLLATE $wpdb->collate";
		}
		
		// create post table if it doesn't exist
		$tablename = $this->table_pt_post;
        	$found = false;
        	foreach ($wpdb->get_results("SHOW TABLES;", ARRAY_N) as $row) {
        	
            		if ($row[0] == $tablename) {
                	$found = true;
                	break;
            		}
            		
        	}
        	
		// Drop table if previous version is older than 2.1.4 (format has changed)
		if ($found && $this->settings['version'] < '2.2') {
       				$res = $wpdb->query(" DROP TABLE ".$tablename);
       				$found = false;
		}
		
		if (!$found) {
		
            		$res = $wpdb->get_results("CREATE TABLE $tablename " . $this->tablestruct . $charset_collate);
	                $ptr2_options = pt_get_default_options();
			$ptr2_options['version'] = $this->PTRVERSION;
			update_option('post_thumbnail_settings', $ptr2_options);

			$count_posts = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->posts." WHERE post_type <> 'attachment'");
			$this->UpdatePostDB(0, $count_posts, $show_results);

		}
    	}

	/****************************************************************/
	/* Creates all record in DB
	/****************************************************************/
	function UpdatePostDB($llimit, $hlimit, $show_results=true) {

		global $wpdb;
		if ($show_results) echo '<p class="updated">'.__('Posts: ', 'post-thumb-admin').$llimit.' - '.$hlimit.' '.__('updated', 'post-thumb-admin').'</p>';
		$lines = $hlimit-$llimit;

		$dbresults = $wpdb->get_results(" SELECT * FROM ".$wpdb->posts." WHERE post_type <> 'attachment' LIMIT ".$llimit.",".$lines);
		foreach ($dbresults as $dbresult) :

			// Saves post data
			$this->StorePostData($dbresult);
 	
		endforeach;
		unset($dbresults);

	}
	/****************************************************************/
	/* save new list of post tags to database
	/****************************************************************/
	function savePostImage($id) {
	
		
		// authorization
		if ( !current_user_can('edit_post', $id) )
			return $id;

        	// clear old values first
		$this->deletePostImage($id);

		// Retrieve post content as list
		$post = &get_post($id);

		// skip drafts
		if ( !($post->post_status == 'publish' OR $post->post_status == 'static' OR $post->post_status == 'future'))
			return $id;

		// Saves post data
		$this->StorePostData($post);
		
	}

	/*******************************************************************************/
	/* Deletes a post record
	/*******************************************************************************/
	function GetMetacontent($id) {
	
		// finds an attachement to the post
       		if ($this->settings['use_meta'] == 'true') 
       			$metaContent = get_post_meta($id, 'pt_meta_thumb', true);
		else 
			$metaContent = '';
			
		return $metaContent;

	}
	/*******************************************************************************/
	/* Deletes a post record
	/*******************************************************************************/
	function StorePostData($post) {

        	global $wpdb;

 		$p = new postThumb($post);
		$metaContent = $this->GetMetacontent($p->post_id);
		$post->post_content = $this->apply_filters($post->post_content);

		// Check metacontent
		if ($metaContent != '') {

			$pattern1 = '/youtube=\((.*?)\)(.*?)/i';
			$pattern2 = '/MEDIA=([0-9]+%?)/i';
			if (preg_match($pattern1, $metaContent, $match)) {

				$p->image = 'http://img.youtube.com/vi/'.$match[1].'/0.jpg';
                                $p->media = $match[1];
	
			} elseif (preg_match($pattern2, $metaContent, $match)) {

					$media = $wpdb->get_row("SELECT * FROM $wpdb->wordtube WHERE vid = $match[1] ");
					if ($media) {
						$p->image = htmlspecialchars(addslashes($media->image));
						$p->media = htmlspecialchars(addslashes($media->file));
						if (pt_is_flv($media->file)) {
							$p->vwidth = $media->width;
							$p->vheight = $media->height;
						}
					}

			} else
				$p->image = $metaContent;
		}

		// If no meta content detected
		if ($p->image == '') {

	        	// finds an image from the post content
			if (preg_match('@<img([^>]*)\/>@si', $post->post_content, $matches)) {

				// put matches into recognizable vars
				$la = pt_parseAtributes($matches[0], array('src'));
				$p->image = $la['src'];

				// Prepare for RegEx
				$img_src = str_replace(array("%", "|", "@", ")", "("), array("\%", "\|", "\@", "\)", "\("), $p->image);

				// detects if the image is already linked to a thumbnail
				$pattern = '%<a([^>]*).(jpg|jpeg|png|gif)([^>]*)\>([^>]*)'.$img_src.'([^\<]*)\<\/a>%si';
				if (preg_match($pattern,$post->post_content,$matches)) {
					$la = pt_parseAtributes($matches[0], array('href'));
					$p->image = $la['href'];
				} 

				// detects if the image is linked to an url
				$pattern = '%<a([^>]*)>([^>]*)'.$img_src.'([^<]*)\<\/a>%i';
				if (preg_match($pattern,$post->post_content,$matches)) {
					$la = pt_parseAtributes($matches[0], array('href'));
					$p->link = $la['href'];
				}
			}

			// Search for wordTube MEDIA. Hope it won't change after that. Needs to be refreshed if it does.
			if ($this->settings['hs_wordtube'] == 'true') {
				$pattern = '/\[MEDIA=([0-9]+%?)\]/i';
				if (preg_match($pattern, $post->post_content, $match)) {
					
					$media = $wpdb->get_row("SELECT * FROM $wpdb->wordtube WHERE vid = $match[1] ");
					if ($media) {
						$p->image = htmlspecialchars(addslashes($media->image));
						$p->media = htmlspecialchars(addslashes($media->file));
						if (pt_is_flv($media->file)) {
							$p->vwidth = $media->width;
							$p->vheight = $media->height;
						}
					}
					
				}
			}
		 
			// Search for Youtube video.
			if ($this->settings['hs_youtube'] == 'true') {
	
				$pattern1 = '/\[youtube=\((.*?)\)(.*?)\]/i';
				$pattern2 = '/\<a(.*?)href="http:\/\/www\.youtube\.com\/watch\?v\=(.*?)"(.*?)\<\/a>/i';
				$pattern3 = '/\<object([^>]*)>([^>]*)\<param([^>]*)value=[\'|"]http:\/\/www.youtube.com\/v\/(.*?)[\'|"]\>\<\/param>([^>]*)\<param(.*?)\<\/object>/is';
				if (preg_match($pattern1, $post->post_content, $match)) {
	
					$p->image = 'http://img.youtube.com/vi/'.$match[1].'/0.jpg';
	                                $p->media = $match[1];
	
				} elseif (preg_match($pattern2, $post->post_content, $match)) {
	
					$p->image = 'http://img.youtube.com/vi/'.$match[2].'/0.jpg';
	                                $p->media = $match[2];
	
				} elseif (preg_match($pattern3, $post->post_content, $match)) {
	
					$ytbID = explode('&', $match[4]);
					$p->image = 'http://img.youtube.com/vi/'.$ytbID[0].'/0.jpg';
	                                $p->media = $ytbID[0];
				}
			}
		}

		if ($p->image != '') {
			// Retrieve categories. Again, this needs to be refreshed if categories change.
			$p->categories = $this->retrieveCategories($p->post_id);
			$this->savePost($p);
		}
		
		unset ($p);
		
	}
	/*******************************************************************************/
	/* Applies filters from other plugins
	/*******************************************************************************/
	function apply_filters($content) {

		if (function_exists('ngg_addjs')) {
			include_once (NGGALLERY_ABSPATH."nggfunctions.php");
			$content = searchnggallerytags($content);
		}
		if (function_exists('pta_replace_tag')) $content = pta_replace_tag($content);
		if (function_exists('g2_imagebyidinpost')) $content = g2_imagebyidinpost($content);
		if (function_exists('g2_imagebypathinpost')) $content = g2_imagebypathinpost($content);

		return $content;

	}
	/*******************************************************************************/
	/* Deletes a post record
	/*******************************************************************************/
	function deletePostImage($postid) {
		
		global $wpdb;

		if ( is_numeric($postid) || $postid > 0 ) { 
			$wpdb->query("DELETE FROM {$this->table_pt_post} WHERE post_id='$postid'");
			return true;
		} else {
			return false;
		}

	}
	/*******************************************************************************/
	/* Saves a post with its image
	/*******************************************************************************/
	function retrieveCategories($postid) {
	
		$catList = array();
		$categories = get_the_category($postid);
		foreach ($categories as $cat) :
			$catList[] = $cat->cat_ID;
		endforeach;
		$SerCatList = serialize($catList);
		
		return $SerCatList;
		
	}
	/*******************************************************************************/
	/* Saves a post with its image
	/*******************************************************************************/
	function savePost($p) {
	
		global $wpdb;
		
		$p_array = Array();
		$p_array['id'] 		= $p->post_id;
		$p_array['image_url'] 	= $p->image;
		$p_array['media_url'] 	= $p->media;
		$p_array['categories'] 	= $p->categories;
		$p_array['title'] 	= $p->title;
		$p_array['date'] 	= $p->date;
		$p_array['permalink'] 	= $p->permalink;
		$p_array['author'] 	= $p->author;
		$p_array['link'] 	= $p->link;
		$p_array['vwidth'] 	= $p->vwidth;
		$p_array['vheight'] 	= $p->vheight;
		
		$pObject = addslashes(serialize($p_array));
		
		$wpdb->query(" INSERT IGNORE INTO {$this->table_pt_post} ($this->tablequery) 
				VALUES ( '$p->post_id', '$pObject' )");

	}
	/*******************************************************************************/
	/* Option panel
	/*******************************************************************************/
	function MenuOptions() {
	
		global $wpdb;

		// Init parameters
		$tmp_param = array();
		$tmp_param['count_posts'] = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->posts." WHERE post_type <> 'attachment'");
		
		if ($this->settings['updslice'] <= 0) $this->settings['updslice']=20;
		if ($tmp_param['count_posts'] < $this->settings['updslice']) 
			$tmp_param['post_slice'] = $this->settings['updslice']; 
		else 
			$tmp_param['post_slice'] = $this->settings['updslice'];
		$tmp_param['max_count'] = ceil($tmp_param['count_posts']/$tmp_param['post_slice']);
	
		$pa = parse_url(SITEURL);
		$tmp_param['dn'] = str_replace($pa['path'],"",SITEURL);
		$bp = str_replace($pa['path'],"",str_replace( "\\", "/",ABSPATH));
		$tmp_param['bp'] = substr($bp, 0, strlen($bp)-1);
		$tmp_param['pa']['path'] = substr($pa['path'], 1, strlen($pa['path'])-1);

		// Detects wordTube
		$tmp_param['se'] = get_wordTubePath();
		if ($tmp_param['se'] == '') {
	        	$tmp_param['re']='';
	                $tmp_param['wdet']='';
		} else {
			$tmp_param['re'] = "MEDIA=";
	                $tmp_param['wdet']= __('Wordtube detected. Path: ', 'post-thumb-admin');
		}

		if (isset($_POST['info_update'])) {
		
			$this->RetrievePostOptions();
			
			// Update pt_posts table if some checked
			for ($i=1;$i<=$tmp_param['max_count'];$i++) :
			
			  	$_POST['db_refresh'.$i]	= pt_GetBooleanOption ($_POST['db_refresh'.$i]);
				$llimit = ($i-1)*$tmp_param['post_slice'];
				if ($i==$tmp_param['max_count']) $hlimit = $tmp_param['count_posts']; else $hlimit = $i*$tmp_param['post_slice'];
				if ($_POST['db_refresh'.$i] == 'true') {
					$lines = $hlimit-$llimit;
					$array_posts = $wpdb->get_col(" SELECT ID FROM ".$wpdb->posts." WHERE post_type <> 'attachment' LIMIT ".$llimit.",".$lines);
					$array_posts = '( '.implode(',', $array_posts).' )';
					$wpdb->query(" DELETE FROM ".$this->table_pt_post." WHERE post_id IN ".$array_posts);
					$this->UpdatePostDB($llimit, $hlimit);
				}
			endfor;

		  	if (get_magic_quotes_gpc()) $_POST['video_regex'] = stripslashes($_POST['video_regex']);
		}

		// Validates options & displays error message
		$this->ValidateOptions();
		if ($this->update_error || isset($_POST['info_update'])) {
			?>
	        	<div class="updated">
	    			<?php if ($this->update_error) : ?>
	    				<strong><?php _e('Update error:', 'post-thumb-admin'); ?></strong> <?php echo $this->error_msg; ?>
	    			<?php else : ?>
					<?php if (isset($_POST['info_update'])) { ?>
	    					<strong><?php _e('Settings saved', 'post-thumb-admin'); ?></strong>
	    				<?php } ?>
	    			<?php endif; ?>
	    		</div>
			<?php
		}
		
		// Init parameters
		$tmp_param['count_posts'] = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->posts." WHERE post_type <> 'attachment'");
		
		if ($this->settings['updslice'] <= 0) $this->settings['updslice']=20;
		if ($tmp_param['count_posts'] < $this->settings['updslice']) 
			$tmp_param['post_slice'] = $this->settings['updslice']; 
		else 
			$tmp_param['post_slice'] = $this->settings['updslice'];
		$tmp_param['max_count'] = ceil($tmp_param['count_posts']/$tmp_param['post_slice']);
		$tmp_param['count_pt'] = $wpdb->get_var("SELECT COUNT(*) FROM ".$this->table_pt_post);

		$this->settings = pt_get_default_options();
		update_option('post_thumbnail_settings',$this->settings);
		
		pt_MenuOptions($this->settings, $tmp_param);

	}
	/*******************************************************************************/
	/* Retrieve posted options
	/*******************************************************************************/
	function RetrievePostOptions() {
	
	  	if (ini_get('safe_mode')) $safe_mode = 'true'; else $safe_mode = 'false';

		$new_options = pt_get_default_options();

		$new_options['safe_mode'] = $safe_mode;
		$new_options['version']	= $this->PTRVERSION;
		$new_options['phpversion'] = phpversion();
		$new_options['wt_path'] = get_wordTubePath();

		if (isset($_POST['default_image']))
			$new_options['default_image'] = $this->noLeadSlash($this->noTrailSlash($_POST['default_image']));
		if (isset($_POST['full_domain_name']))
			$new_options['full_domain_name'] = $this->noTrailSlash($_POST['full_domain_name']);
		if (isset($_POST['base_path']))
			$new_options['base_path'] = $this->noTrailSlash($_POST['base_path']);
		if (isset($_POST['folder_name']))
			$new_options['folder_name'] = $this->noLeadSlash($this->noTrailSlash($_POST['folder_name']));
		if (isset($_POST['video_default']))
			$new_options['video_default'] = $this->noLeadSlash($this->noTrailSlash($_POST['video_default']));

		// Retrieve Boolean options
		if (isset($_POST['screen'])) {

			$blist = $this->BooleanList;
			
			foreach ($blist as $option) :
				$new_options[$option] = pt_GetBooleanOption ($_POST[$option]);
			endforeach;
		}

		// Retrieve other options
		foreach ($this->OptionList as $option) :
		  	if (isset($_POST[$option]))
				$new_options[$option] = $_POST[$option];
		endforeach;
		
		$this->settings = $new_options;
		update_option('post_thumbnail_settings',$new_options);

	}
	/****************************************************************/
	/* Validates update options
	/****************************************************************/
	function ValidateOptions() {

	        // Test resize values
		if (!is_numeric($this->settings['resize_width'])) {
	
			$this->isError(__("Resize width must be a number", 'post-thumb-admin'));
			$this->settings['resize_width'] = '60';
		}
		elseif (!is_numeric($this->settings['resize_height'])) {
			
			$this->isError(__("Resize width must be a number", 'post-thumb-admin'));
			$this->settings['resize_height'] = '60';
		}

	        // Test default image
		$video_exists = file_exists($this->settings['base_path'].'/'.$this->settings['video_default']);
		if (!$video_exists) $this->isError(__('Video default image not found on server.', 'post-thumb-admin'));

	        // Test default image
		$default_exists = file_exists($this->settings['base_path'].'/'.$this->settings['default_image']);
		if (!$default_exists) $this->isError(__('Default image not found on server.', 'post-thumb-admin'));

	        // Test folder name
		$this->TestFolder($this->settings['base_path'].'/'.$this->settings['folder_name']);
		
		// If no error, tries to generate test image
		if (!$this->is_error) {
			$testimg = PT_ABSPATH.$this->testimg;
			if (file_exists($testimg)) {
				$testthumb = GetAdminThumb($testimg);
				if (!$testthumb) {
					$this->isError(__("Cannot create test thumbnail.", 'post-thumb-admin'));
				}
			} else
				$this->isError(__("Test image doesn't exists.", 'post-thumb-admin'));
		}

	}
	/****************************************************************/
	/* Delete leading slash
	/****************************************************************/
	function noLeadSlash ($text) {
		
		if (substr($text, 0, 1) == '/') return substr($text, 1);
		return $text;
	}
	/****************************************************************/
	/* Delete trailing slash
	/****************************************************************/
	function noTrailSlash ($text) {
		
		if (substr($text, -1) == '/') return substr($text, 0, strlen($text)-1);
		return $text;
	}
	/****************************************************************/
	/* Test if a path is writable
	/****************************************************************/
	function isError ($text) {
		
		$this->update_error = true;
		$this->error_msg = $text;
	}
	/****************************************************************/
	/* Test if a path is writable
	/****************************************************************/
	function TestFolder ($is_writable_dir) {

		$rs = PT_ABSPATH . 'lib/index.htm';
		$rt = $is_writable_dir . '/index.htm';

		if (is_dir($is_writable_dir)) {
		
			if (@copy($rs, $rt)===false)

				$this->isError(__('Directory: ', 'post-thumb-admin').$is_writable_dir.' '.__('may not be writeable.', 'post-thumb-admin'));
			else
	                        unlink($rt);
		}
		else 
			$this->isError(__('Directory: ', 'post-thumb-admin').$is_writable_dir.' '.__('does not exist!', 'post-thumb-admin'));

	}
} // End of admin class

/****************************************************************/
/* Includes features in header for admin panel
/****************************************************************/
function pt_admin_include_header() {

	/* js includes ============================== */
	if (function_exists('wp_enqueue_script')) {
		echo "\n".'<!-- Start Of Script Generated By Post-Thumb Revisited Admin -->'."\n";
		// slider doesn't work with jQuery before 1.2 
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', PT_URLPATH.'js/jquery.js', false, '1.2.2');
		wp_enqueue_script('dimensions', PT_URLPATH.'js/jquery.dimensions.js', array('jquery'));
		wp_enqueue_script('mouse', PT_URLPATH.'js/ui.mouse.js', array('jquery'));
		wp_enqueue_script('slider', PT_URLPATH.'js/ui.slider.js', array('jquery', 'dimensions', 'mouse'));
		wp_enqueue_script('postthumb', PT_URLPATH.'js/post-thumb.js', array('jquery', 'dimensions', 'mouse', 'slider'));
		wp_print_scripts(array('jquery', 'dimensions', 'mouse', 'slider', 'postthumb'));
	} else {
		?>
		<script type="text/javascript" src="<?php echo PT_URLPATH; ?>js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo PT_URLPATH; ?>js/jquery.dimensions.js"></script>
		<script type="text/javascript" src="<?php echo PT_URLPATH; ?>js/ui.mouse.js"></script>
		<script type="text/javascript" src="<?php echo PT_URLPATH; ?>js/ui.slider.js"></script>
		<script type="text/javascript" src="<?php echo PT_URLPATH; ?>js/post-thumb.js"></script>
		<?php
	}

	$echo = __('Click to hide and show', 'post-thumb-admin');

        ?>
	<link rel="stylesheet" href="<?php echo PT_URLPATH; ?>js/flora.slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo PT_URLPATH; ?>lib/ptr_admin.css" type="text/css" media="screen" />

	<script type="text/javascript">
	        var echo = "<?php echo $echo; ?>";
	</script>

	<?php
	echo '<!-- End Of Script Generated By Post-Thumb Revisited Admin -->'."\n";
}
################################################################################
########## Record class
################################################################################
class postThumb {

	var $post_id;
	var $image_url='';
	var $media_url='';
	var $categories='';
	var $title='';
	var $date='';
	var $permalink='';
	var $author='';
	var $link='';
	var $vwidth=0;
	var $vheight=0;
	
	function postThumb($post='') {
		if ($post != '') {
			$this->post_id = $post->ID;
			$this->title = $post->post_title;
			$this->date = $post->post_date_gmt;
			$this->permalink = get_permalink($this->post_id);
			$author = get_author_name($post->post_author);
			if (function_exists('get_author_posts_url'))
				$this->author= '<a href="'.get_author_posts_url($post->post_author).'" title="'.
						__('Posts from: ', 'post-thumb-admin').$author.'">'.$author.'</a>';
			else
				$this->author= '<a href="'.get_author_link(0, $post->post_author).'" title="'.
						__('Posts from: ', 'post-thumb-admin').$author.'">'.$author.'</a>';
		}
	}
}
/****************************************************************/
/* Loads language file at init
/****************************************************************/
function post_thumb_admin_init () {

	// Load language file
	$locale = get_locale();
	if ( !empty($locale) )
		load_textdomain('post-thumb-admin', PT_ABSPATH.'languages/' . 'post-thumb-admin'.$locale.'.mo');
}
add_action('init', 'post_thumb_admin_init');

?>
