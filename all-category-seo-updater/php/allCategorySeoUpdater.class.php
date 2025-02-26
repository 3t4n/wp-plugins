<?php
if(!class_exists('allCategorySeoUpdater')){
	class allCategorySeoUpdater{
		var $version = '0.2.7';
		var $html;
		var $cat_id;

		var $filer;
		/** Temp filename for the latest version. */
		var $upgrade_filename = 'temp.zip';
		
		/** Where to extract the downloaded newest version. */
		var $upgrade_folder;
		
		/** Any error in upgrading. */
		var $upgrade_error;
		
		/** Which zip to download in order to upgrade .*/
		var $upgrade_url = 'http://downloads.wordpress.org/plugin/all-category-seo-updater.zip';
		
		/** Filename of log file. */
		var $log_file;
		
		/** Flag whether there should be logging. */
		var $do_log;
		
		var $wp_version;
 
		function allCategorySeoUpdater($tmpfile){
			global $wp_version;
			global $version;
			$this->wp_version = $wp_version;
			$this->filer = $tmpfile;
			$homer = get_option('siteurl');
			if(file_exists('../wp-load.php')){
				require_once('../wp-load.php');
			}
			$this->html = '';
			$this->log_file = $homer.'/wp-content/plugins/all-category-seo-updater/all-category-seo-updater.log';
			if (get_option('acsu_do_log')) {
				$this->do_log = true;
			} else {
				$this->do_log = false;
			}
			$this->upgrade_filename = dirname(__FILE__) . '/' . $this->upgrade_filename;
			$this_folder = dirname(__FILE__);

			#$this->upgrade_folder = dirname(__FILE__);
		}

		function upgrade_folder(){
			$this_folder = dirname(__FILE__);
			chdir($this_folder);
			chdir('../');
			$folder = getcwd();
			return $folder;
		}

		function admin_menu() {
			$file = __FILE__;
			
			// hack for 1.5
			if (substr($this->wp_version, 0, 3) == '1.5') {
				$file = 'all-category-seo-updater/all_category_seo_updater.php';
			}

			add_submenu_page('options-general.php', __('All Category SEO', 'all_category_seo_updater'), __('All Category SEO', 'all_category_seo_updater'), 10, $file, array($this, 'options_panel'));
		}
		
		function management_panel() {
			$message = null;
			$base_url = "edit.php?page=all-category-seo-updater";//" . __FILE__;
			//echo($base_url);
			$type = $_REQUEST['type'];
			if (!isset($type)) {
				$type = "posts";
			}
		}

		function template_redirecter() {
			global $wp_query;
			$post = $wp_query->get_queried_object();

			if (is_feed()) {
				return;
			}

			if (is_single() || is_page()) {
				$aiosp_disable = htmlspecialchars(stripcslashes(get_post_meta($post->ID, 'aiosp_disable', true)));
				if ($aiosp_disable) {
					return;
				}
			}

			if (get_option('aiosp_rewrite_titles')) {
				#if(is_category()){
					ob_start(array($this, 'output_callback_for_title'));
				#}
			}
		}
		
		function output_callback_for_title($content) {
			return $this->rewrite_title($content);
		}

		function is_static_front_page() {
			global $wp_query;
			$post = $wp_query->get_queried_object();
			return get_option('show_on_front') == 'page' && is_page() && $post->ID == get_option('page_on_front');
		}
		
		function is_static_posts_page() {
			global $wp_query;
			$post = $wp_query->get_queried_object();
			return get_option('show_on_front') == 'page' && is_home() && $post->ID == get_option('page_for_posts');
		}

		function get_base() {
			 return '/'.end(explode('/', str_replace(array('\\','/all_category_seo_updater.php'),array('/',''),$this->filer)));
		}

		function wp_stylesheet() {
			$home = get_option('siteurl');
			$stylesheet = $home.'/wp-content/plugins' . $this->get_base() . '/css/allCategorySeoUpdater.css';
			$stylesheet2 = $home.'/wp-content/plugins' . $this->get_base() . '/css/colorPicker.css';
			echo("<link rel='stylesheet' href='" . $stylesheet2 . "' type='text/css' media='all' />"."\r\n");
			echo("<link rel='stylesheet' href='" . $stylesheet . "' type='text/css' media='all' />"."\r\n");
		}
		function wp_scripts() {
			$home = get_option('siteurl');
			$script = $home.'/wp-content/plugins' . $this->get_base() . '/js/allCategorySeoUpdater.js';
			$script2 = $home.'/wp-content/plugins' . $this->get_base() . '/js/colorPicker.js';
			echo("<script type='text/javascript' src='". $script ."'></script>"."\r\n");
			echo("<script type='text/javascript' src='". $script2 ."'></script>"."\r\n");
		}

		function wp_header() {
			if (is_feed()) {
				return;
			}
			
			global $wp_query;
			$post = $wp_query->get_queried_object();
			$meta_string = null;
			
			if(is_category() && !is_feed()){
				$cat_info = get_the_category();//this is an object, so you have to access it like an object (and not an array)
				#$this->darray($cat_info);
				$this->cat_id = $post->cat_ID; //see above comment
				#exit($this->cat_id);
			}
			//echo("wp_head() " . wp_title('', false) . " is_home() => " . is_home() . ", is_page() => " . is_page() . ", is_single() => " . is_single() . ", is_static_front_page() => " . $this->is_static_front_page() . ", is_static_posts_page() => " . $this->is_static_posts_page());

			if(is_category() && !is_feed()){
				if (is_single() || is_page()) {
					$aiosp_disable = htmlspecialchars(stripcslashes(get_post_meta($post->ID, 'aiosp_disable', true)));
					if ($aiosp_disable) {
						return;
					}
				}
				
				if (get_option('aiosp_rewrite_titles')) {
					// make the title rewrite as short as possible
					if (function_exists('ob_list_handlers')) {
						$active_handlers = ob_list_handlers();
					} else {
						$active_handlers = array();
					}
					if (sizeof($active_handlers) > 0 &&
						strtolower($active_handlers[sizeof($active_handlers) - 1]) ==
						strtolower('allCategorySeoUpdater::output_callback_for_title')) {
						ob_end_flush();
					} else {
						$this->log("another plugin interfering?");
						// if we get here there *could* be trouble with another plugin :(
						$this->ob_start_detected = true;
						if (function_exists('ob_list_handlers')) {
							foreach (ob_list_handlers() as $handler) {
								$this->log("detected output handler $handler");
							}
						}
					}
				}
				
				echo "\n<!-- all category seo updater $this->version ";
				if ($this->ob_start_detected) {
					echo "ob_start_detected ";
				}
				echo "[$this->title_start.'firster',$this->title_end] ";
				echo "-->\n";
				
				if ((is_home() && get_option('aiosp_home_keywords')) || $this->is_static_front_page()) {
					$keywords = trim($this->internationalize(get_option('aiosp_home_keywords')));
				} else {
					$keywords = $this->get_all_keywords();
				}
				if (is_single() || is_page()) {
					if ($this->is_static_front_page()) {
						$description = trim(stripcslashes($this->internationalize(get_option('aiosp_home_description'))));
					} else {
						$description = $this->get_post_description($post);
					}
				} else if (is_home()) {
					$description = trim(stripcslashes($this->internationalize(get_option('aiosp_home_description'))));
				} else if (is_category()) {
					$description = $this->internationalize(category_description());
				}
				
				if (isset($description) && (strlen($description) > $this->minimum_description_length) && !(is_home() && is_paged())) {
					$description = trim(strip_tags($description));
					$description = str_replace('"', '', $description);
					
					// replace newlines on mac / windows?
					$description = str_replace("\r\n", ' ', $description);
					
					// maybe linux uses this alone
					$description = str_replace("\n", ' ', $description);
					
					if (isset($meta_string)) {
						//$meta_string .= "\n";
					} else {
						$meta_string = '';
					}
					
					// description format
					$description_format = get_option('aiosp_description_format');
					if (!isset($description_format) || empty($description_format)) {
						$description_format = "%description%";
					}
					$description = str_replace('%description%', $description, $description_format);
					$description = str_replace('%blog_title%', get_bloginfo('name'), $description);
					$description = str_replace('%blog_description%', get_bloginfo('description'), $description);
					$description = str_replace('%wp_title%', $this->get_original_title(), $description);
					
					$meta_string .= sprintf("<meta name=\"description\" content=\"%s\" />", $description);
				}

				if (isset ($keywords) && !empty($keywords) && !(is_home() && is_paged())) {
					if (isset($meta_string)) {
						$meta_string .= "\n";
					}
					$meta_string .= sprintf("<meta name=\"keywords\" content=\"%s\" />", $keywords);
				}

				if (function_exists('is_tag')) {
					$is_tag = is_tag();
				}
				
				if ((is_category() && get_option('aiosp_category_noindex')) ||
					(!is_category() && is_archive() &&!$is_tag && get_option('aiosp_archive_noindex')) ||
					(get_option('aiosp_tags_noindex') && $is_tag)) {
					if (isset($meta_string)) {
						#$meta_string .= "\n";
					}
					#$meta_string .= '<meta name="robots" content="noindex,follow" />';
				}
				
				$page_meta = stripcslashes(get_option('aiosp_page_meta_tags'));
				$post_meta = stripcslashes(get_option('aiosp_post_meta_tags'));
				$home_meta = stripcslashes(get_option('aiosp_home_meta_tags'));
				if(is_category() && !is_feed()){
					$cat_meta = $this->get_cat_meta($meta_string);
					$meta_string = $cat_meta;
				}
				if (is_page() && isset($page_meta) && !empty($page_meta)) {
					if (isset($meta_string)) {
						$meta_string .= "\n";
					}
					echo "\n$page_meta";
				}
				
				if (is_single() && isset($post_meta) && !empty($post_meta)) {
					if (isset($meta_string)) {
						$meta_string .= "\n";
					}
					$meta_string .= "$post_meta";
				}
				
				if (is_home() && !empty($home_meta)) {
					if (isset($meta_string)) {
						$meta_string .= "\n";
					}
					$meta_string .= "$home_meta";
				}

				#if(is_category() && !is_feed() && isset($cat_meta)){
				#	$meta_string .= "\n";
				#	$meta_string .= "$cat_meta";
				#}
				
				if ($meta_string != null) {
					echo "$meta_string\n";
				}
				
				if(get_option('aiosp_can')){
					$url = $this->aiosp_mrt_get_url($wp_query);
						if ($url) {
					echo "".'<link rel="canonical" href="'.$url.'" />'."\n";
					}
				}
				
				echo "<!-- /all category seo updater -->\n";
			}
		}		
		
		function aiosp_mrt_get_url($query) {
			if ($query->is_404 || $query->is_search) {
				return false;
			}
			$haspost = count($query->posts) > 0;
			$has_ut = function_exists('user_trailingslashit');

			if (get_query_var('m')) {
				$m = preg_replace('/[^0-9]/', '', get_query_var('m'));
				switch (strlen($m)) {
					case 4: 
						$link = get_year_link($m);
						break;
					case 6: 
						$link = get_month_link(substr($m, 0, 4), substr($m, 4, 2));
						break;
					case 8: 
						$link = get_day_link(substr($m, 0, 4), substr($m, 4, 2),
											 substr($m, 6, 2));
						break;
					default:
						return false;
				}
			} elseif (($query->is_single || $query->is_page) && $haspost) {
				$post = $query->posts[0];
				$link = get_permalink($post->ID);
				$link = $this->yoast_get_paged($link); 
	/*	        if ($page && $page > 1) {
					$link = trailingslashit($link) . "page/". "$page";
					if ($has_ut) {
						$link = user_trailingslashit($link, 'paged');
					} else {
						$link .= '/';
					}
				}
				if ($query->is_page && ('page' == get_option('show_on_front')) && 
					$post->ID == get_option('page_on_front'))
				{
					$link = trailingslashit($link);
				}*/
			} elseif ($query->is_author && $haspost) {
				global $wp_version;
				if ($wp_version >= '2') {
					$author = get_userdata(get_query_var('author'));
					if ($author === false)
						return false;
					$link = get_author_link(false, $author->ID,
						$author->user_nicename);
				} else {
					global $cache_userdata;
					$userid = get_query_var('author');
					$link = get_author_link(false, $userid,
						$cache_userdata[$userid]->user_nicename);
				}
			} elseif ($query->is_category && $haspost) {
				$link = get_category_link(get_query_var('cat'));
				$link = $this->yoast_get_paged($link);
			} else if ($query->is_tag  && $haspost) {
				$tag = get_term_by('slug',get_query_var('tag'),'post_tag');
					 if (!empty($tag->term_id)) {
							$link = get_tag_link($tag->term_id);
					 } 
					 $link = $this->yoast_get_paged($link);			
			} elseif ($query->is_day && $haspost) {
				$link = get_day_link(get_query_var('year'),
									 get_query_var('monthnum'),
									 get_query_var('day'));
			} elseif ($query->is_month && $haspost) {
				$link = get_month_link(get_query_var('year'),
									   get_query_var('monthnum'));
			} elseif ($query->is_year && $haspost) {
				$link = get_year_link(get_query_var('year'));
			} elseif ($query->is_home) {
				if ((get_option('show_on_front') == 'page') &&
					($pageid = get_option('page_for_posts'))) 
				{
					$link = get_permalink($pageid);
					$link = $this->yoast_get_paged($link);
					$link = trailingslashit($link);
				} else {
					$link = get_option('home');
					$link = $this->yoast_get_paged($link);
					$link = trailingslashit($link);	        }
			} else {
				return false;
			}
		
			return $link;
			
		}
		
		
		function yoast_get_paged($link) {
				$page = get_query_var('paged');
				if ($page && $page > 1) {
					$link = trailingslashit($link) ."page/". "$page";
					if ($has_ut) {
						$link = user_trailingslashit($link, 'paged');
					} else {
						$link .= '/';
					}
				}
				return $link;
		}	

		function get_cat_meta($meta_string){
			if(is_category() && !is_feed()){
				global $wpdb;
				global $wp_query;
				$post = $wp_query->get_queried_object();
				#$this->darray($post);
				$this->cat_id = $post->cat_ID;
				$table_name = $wpdb->prefix."allcategoryseoupdater";
				$query2 = "SELECT meta_keywords,meta_description FROM ".$table_name." WHERE cat_id=".$this->cat_id;
				$resulter = $wpdb->get_row($query2, ARRAY_A);
				$meta = '';
				$start_meta_keys = strpos($meta_string, "<meta name=\"keywords\"");
				$end_meta_keys = strpos($meta_string, "/>", $start_meta_keys);
				$meta_keywords = substr($meta_string, $start_meta_keys, ($end_meta_keys+2));
				$start_meta_desc = strpos($meta_string, "<meta name=\"description\"");
				$end_meta_desc = strpos($meta_string, "/>", $start_meta_desc);
				$meta_description = substr($meta_string, $start_meta_desc, ($end_meta_desc+2));
				$start_meta_robots = strpos($meta_string, "<meta name=\"robots\"");
				$end_meta_robots = strpos($meta_string, "/>", $start_meta_robots);
				$meta_robots = substr($meta_string, $start_meta_robots, ($end_meta_robots+2));

				$meta_new_keys = "<meta name=\"keywords\" content=\"".$resulter['meta_keywords']."\" />";
				$meta_new_desc = "<meta name=\"description\" content=\"".$resulter['meta_description']."\" />";
				$meta_new_robots = "<meta name=\"robots\" content=\"noindex,follow\" />";
				if(isset($meta_keywords) && !empty($meta_keywords)){
					$meta_keys = str_replace($meta_keywords, $meta_new_keys, $meta_string);
					$meta .= $meta_keys."\n";
				}
				else{
					$meta .= $meta_new_keys."\n";
				}
				if(isset($meta_description) && !empty($meta_description)){
					$meta_desc = str_replace($meta_description, $meta_new_desc, $meta_string);
					$meta .= $meta_desc."\n";
				}
				else{
					$meta .= $meta_new_desc."\n";
				}
				if(isset($meta_robots) && !empty($meta_robots)){
					$meta_robot = str_replace($meta_robots, $meta_new_robots, $meta_string);
					$meta .= $meta_robot;
				}
				else{
					$meta .= $meta_new_robots;
				}
				return $meta;
			}
		}
		
		function get_post_description($post) {
			$description = trim(stripcslashes($this->internationalize(get_post_meta($post->ID, "description", true))));
			if (!$description) {
				$description = $this->trim_excerpt_without_filters_full_length($this->internationalize($post->post_excerpt));
				if (!$description && get_option("aiosp_generate_descriptions")) {
					$description = $this->trim_excerpt_without_filters($this->internationalize($post->post_content));
				}				
			}
			
			// "internal whitespace trim"
			$description = preg_replace("/\s\s+/", " ", $description);
			
			return $description;
		}
		
		function replace_title($content, $title) {
			$title = trim(strip_tags($title));
			
			$title_tag_start = "<title>";
			$title_tag_end = "</title>";
			$len_start = strlen($title_tag_start);
			$len_end = strlen($title_tag_end);
			$title = stripcslashes(trim($title));
			$start = strpos($content, $title_tag_start);
			$end = strpos($content, $title_tag_end);
			
			$this->title_start = $start;
			$this->title_end = $end;
			$this->orig_title = $title;
			
			if ($start && $end) {
				$header = substr($content, 0, $start + $len_start) . $title .  substr($content, $end);
			} else {
				// this breaks some sitemap plugins (like wpg2)
				//$header = $content . "<title>$title</title>";
				
				$header = $content;
			}
			return $header;
		}
		
		function internationalize($in) {
			if (function_exists('langswitch_filter_langs_with_message')) {
				$in = langswitch_filter_langs_with_message($in);
			}
			if (function_exists('polyglot_filter')) {
				$in = polyglot_filter($in);
			}
			if (function_exists('qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage')) {
				$in = qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage($in);
			}
			$in = apply_filters('localization', $in);
			return $in;
		}
		
		/** @return The original title as delivered by WP (well, in most cases) */
		function get_original_title() {
			global $wp_query;
			if (!$wp_query) {
				return null;	
			}
			
			$post = $wp_query->get_queried_object();
			
			// the_search_query() is not suitable, it cannot just return
			global $s;
			
			$title = null;
			
			if (is_home()) {
				$title = get_option('blogname');
			} else if (is_single()) {
				$title = $this->internationalize(wp_title('', false));
			} else if (is_search() && isset($s) && !empty($s)) {
				if (function_exists('attribute_escape')) {
					$search = attribute_escape(stripcslashes($s));
				} else {
					$search = wp_specialchars(stripcslashes($s), true);
				}
				$search = $this->capitalize($search);
				$title = $search;
			} else if (is_category() && !is_feed()) {
				$category_description = $this->internationalize(category_description());
				$category_name = ucwords($this->internationalize(single_cat_title('', false)));
				$title = $category_name;
			} else if (is_page()) {
				$title = $this->internationalize(wp_title('', false));
			} else if (function_exists('is_tag') && is_tag()) {
				global $utw;
				if ($utw) {
					$tags = $utw->GetCurrentTagSet();
					$tag = $tags[0]->tag;
					$tag = str_replace('-', ' ', $tag);
				} else {
					// wordpress > 2.3
					$tag = $this->internationalize(wp_title('', false));
				}
				if ($tag) {
					$title = $tag;
				}
			} else if (is_archive()) {
				$title = $this->internationalize(wp_title('', false));
			} else if (is_404()) {
				$title_format = get_option('aiosp_404_title_format');
				$new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
				$new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
				$new_title = str_replace('%request_url%', $_SERVER['REQUEST_URI'], $new_title);
				$new_title = str_replace('%request_words%', $this->request_as_words($_SERVER['REQUEST_URI']), $new_title);
					$title = $new_title;
				}
				
				return trim($title);
			}
		
		function paged_title($title) {
			// the page number if paged
			global $paged;
			
			// simple tagging support
			global $STagging;

			if (is_paged() || (isset($STagging) && $STagging->is_tag_view() && $paged)) {
				$part = $this->internationalize(get_option('aiosp_paged_format'));
				if (isset($part) || !empty($part)) {
					$part = " " . trim($part);
					$part = str_replace('%page%', $paged, $part);
					$this->log("paged_title() [$title] [$part]");
					$title .= $part;
				}
			}
			return $title;
		}

		function rewrite_title($header) {

			global $wp_query;
			if (!$wp_query) {
				$header .= "<!-- no wp_query found! -->\n";
				return $header;	
			}
			
			if(is_category() && !is_feed()){
				$cat_info = get_the_category();//this is an object, so you have to access it like an object (and not an array)
				#$this->darray($cat_info);
				$this->cat_id = $cat_info[0]->term_id; //see above comment
				#exit($this->cat_id);
			}
			$post = $wp_query->get_queried_object();
			
			// the_search_query() is not suitable, it cannot just return
			global $s;
			
			// simple tagging support
			global $STagging;

			if (is_home()) {
				$title = $this->internationalize(get_option('aiosp_home_title'));
				if (empty($title)) {
					$title = $this->internationalize(get_option('blogname'));
				}
				$title = $this->paged_title($title);
				$header = $this->replace_title($header, $title);
			} else if (is_single()) {
				// we're not in the loop :(
				$authordata = get_userdata($post->post_author);
				$categories = get_the_category();
				$category = '';
				if (count($categories) > 0) {
					$category = $categories[0]->cat_name;
				}
				$title = $this->internationalize(get_post_meta($post->ID, "title", true));
				if (!$title) {
					$title = $this->internationalize(get_post_meta($post->ID, "title_tag", true));
					if (!$title) {
						$title = $this->internationalize(wp_title('', false));
					}
				}
				$title_format = get_option('aiosp_post_title_format');
				$new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
				$new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
				$new_title = str_replace('%post_title%', $title, $new_title);
				$new_title = str_replace('%category%', $category, $new_title);
				$new_title = str_replace('%category_title%', $category, $new_title);
				$new_title = str_replace('%post_author_login%', $authordata->user_login, $new_title);
				$new_title = str_replace('%post_author_nicename%', $authordata->user_nicename, $new_title);
				$new_title = str_replace('%post_author_firstname%', ucwords($authordata->first_name), $new_title);
				$new_title = str_replace('%post_author_lastname%', ucwords($authordata->last_name), $new_title);
				$title = $new_title;
				$title = trim($title);
				$header = $this->replace_title($header, $title);
			} else if (is_search() && isset($s) && !empty($s)) {
				if (function_exists('attribute_escape')) {
					$search = attribute_escape(stripcslashes($s));
				} else {
					$search = wp_specialchars(stripcslashes($s), true);
				}
				$search = $this->capitalize($search);
				$title_format = get_option('aiosp_search_title_format');
				$title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
				$title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
				$title = str_replace('%search%', $search, $title);
				$header = $this->replace_title($header, $title);
			} else if (is_category() && !is_feed()) {
				/*
				#exit('stopped');
				$category_description = $this->internationalize(category_description());
				$category_name = ucwords($this->internationalize(single_cat_title('', false)));
				$title_format = get_option('aiosp_category_title_format');
				$title = str_replace('%category_title%', $category_name, $title_format);
				$title = str_replace('%category_description%', $category_description, $title);
				$title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title);
				$title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
				$title = $this->paged_title($title);
				$header = $this->replace_title($header, $title);
				*/
				
				#$cat_info = get_the_category();//this is an object, so you have to access it like an object (and not an array)
				#$cat_id = $cat_info[0]->term_id; //see above comment
				global $wpdb;
				global $wp_query;
				$post = $wp_query->get_queried_object();
				$this->cat_id = $post->cat_ID;
				$table_name = $wpdb->prefix."allcategoryseoupdater";
				$query2 = "SELECT page_title FROM ".$table_name." WHERE cat_id=".$this->cat_id;
				$resulter = $wpdb->get_row($query2, ARRAY_A);
				$category_name = ucwords(single_cat_title('', false));
				$header = $this->replace_title($header, $resulter['page_title']);
			} else if (is_page()) {
				// we're not in the loop :(
				$authordata = get_userdata($post->post_author);
				if ($this->is_static_front_page()) {
					if ($this->internationalize(get_option('aiosp_home_title'))) {
						$header = $this->replace_title($header, $this->internationalize(get_option('aiosp_home_title')));
					}
				} else {
					$title = $this->internationalize(get_post_meta($post->ID, "title", true));
					if (!$title) {
						$title = $this->internationalize(wp_title('', false));
					}
					$title_format = get_option('aiosp_page_title_format');
					$new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
					$new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
					$new_title = str_replace('%page_title%', $title, $new_title);
					$new_title = str_replace('%page_author_login%', $authordata->user_login, $new_title);
					$new_title = str_replace('%page_author_nicename%', $authordata->user_nicename, $new_title);
					$new_title = str_replace('%page_author_firstname%', ucwords($authordata->first_name), $new_title);
					$new_title = str_replace('%page_author_lastname%', ucwords($authordata->last_name), $new_title);
					$title = trim($new_title);
					$header = $this->replace_title($header, $title);
				}
			} else if (function_exists('is_tag') && is_tag()) {
				global $utw;
				if ($utw) {
					$tags = $utw->GetCurrentTagSet();
					$tag = $tags[0]->tag;
					$tag = str_replace('-', ' ', $tag);
				} else {
					// wordpress > 2.3
					$tag = $this->internationalize(wp_title('', false));
				}
				if ($tag) {
					$tag = $this->capitalize($tag);
					$title_format = get_option('aiosp_tag_title_format');
					$title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
					$title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
					$title = str_replace('%tag%', $tag, $title);
					$title = $this->paged_title($title);
					$header = $this->replace_title($header, $title);
				}
			} else if (isset($STagging) && $STagging->is_tag_view()) { // simple tagging support
				$tag = $STagging->search_tag;
				if ($tag) {
					$tag = $this->capitalize($tag);
					$title_format = get_option('aiosp_tag_title_format');
					$title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
					$title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
					$title = str_replace('%tag%', $tag, $title);
					$title = $this->paged_title($title);
					$header = $this->replace_title($header, $title);
				}
			} else if (is_archive()) {
				$date = $this->internationalize(wp_title('', false));
				$title_format = get_option('aiosp_archive_title_format');
				$new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
				$new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
				$new_title = str_replace('%date%', $date, $new_title);
				$title = trim($new_title);
				$title = $this->paged_title($title);
				$header = $this->replace_title($header, $title);
			} else if (is_404()) {
				$title_format = get_option('aiosp_404_title_format');
				$new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
				$new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
				$new_title = str_replace('%request_url%', $_SERVER['REQUEST_URI'], $new_title);
				$new_title = str_replace('%request_words%', $this->request_as_words($_SERVER['REQUEST_URI']), $new_title);
				$header = $this->replace_title($header, $new_title);
			}
			
			return $header;

		}

		function get_all_keywords() {
			global $posts;

			if (is_404()) {
				return null;
			}
			
			// if we are on synthetic pages
			if (!is_home() && !is_page() && !is_single() &&!$this->is_static_front_page() && !$this->is_static_posts_page()) {
				return null;
			}

			$keywords = array();
			if (is_array($posts)) {
				foreach ($posts as $post) {
					if ($post) {

						// custom field keywords
						$keywords_a = $keywords_i = null;
						$description_a = $description_i = null;
						$id = $post->ID;
						$keywords_i = stripcslashes($this->internationalize(get_post_meta($post->ID, "keywords", true)));
						$keywords_i = str_replace('"', '', $keywords_i);
						if (isset($keywords_i) && !empty($keywords_i)) {
							$traverse = explode(',', $keywords_i);
							foreach ($traverse as $keyword) {
								$keywords[] = $keyword;
							}
						}
						
						// WP 2.3 tags
						if (function_exists('get_the_tags')) {
							$tags = get_the_tags($post->ID);
							if ($tags && is_array($tags)) {
								foreach ($tags as $tag) {
									$keywords[] = $this->internationalize($tag->name);
								}
							}
						}

						// Ultimate Tag Warrior integration
						global $utw;
						if ($utw) {
							$tags = $utw->GetTagsForPost($post);
							if (is_array($tags)) {
								foreach ($tags as $tag) {
									$tag = $tag->tag;
									$tag = str_replace('_',' ', $tag);
									$tag = str_replace('-',' ',$tag);
									$tag = stripcslashes($tag);
									$keywords[] = $tag;
								}
							}
						}
						
						// autometa
						$autometa = stripcslashes(get_post_meta($post->ID, "autometa", true));
						if (isset($autometa) && !empty($autometa)) {
							$autometa_array = explode(' ', $autometa);
							foreach ($autometa_array as $e) {
								$keywords[] = $e;
							}
						}

						if (get_option('aiosp_use_categories') && !is_page()) {
							$categories = get_the_category($post->ID);
							foreach ($categories as $category) {
								$keywords[] = $this->internationalize($category->cat_name);
							}
						}

					}
				}
			}
			
			return $this->get_unique_keywords($keywords);
		}
		
		function get_meta_keywords() {
			global $posts;

			$keywords = array();
			if (is_array($posts)) {
				foreach ($posts as $post) {
					if ($post) {
						// custom field keywords
						$keywords_a = $keywords_i = null;
						$description_a = $description_i = null;
						$id = $post->ID;
						$keywords_i = stripcslashes(get_post_meta($post->ID, "keywords", true));
						$keywords_i = str_replace('"', '', $keywords_i);
						if (isset($keywords_i) && !empty($keywords_i)) {
							$keywords[] = $keywords_i;
						}
					}
				}
			}
			
			return $this->get_unique_keywords($keywords);
		}
		
		function get_unique_keywords($keywords) {
			$small_keywords = array();
			foreach ($keywords as $word) {
				if (function_exists('mb_strtolower'))			
					$small_keywords[] = mb_strtolower($word);
				else 
					$small_keywords[] = $this->strtolower($word);
			}
			$keywords_ar = array_unique($small_keywords);
			return implode(',', $keywords_ar);
		}

		function get_url($url)	{
			if (function_exists('file_get_contents')) {
				$file = file_get_contents($url);
			} else {
				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_HEADER, 0);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$file = curl_exec($curl);
				curl_close($curl);
			}
			return $file;
		}
		
		function log($message) {
			if ($this->do_log) {
				error_log(date('Y-m-d H:i:s') . " " . $message . "\n", 3, $this->log_file);
			}
		}

		function download_newest_version() {
			$success = true;
			$file_content = $this->get_url($this->upgrade_url);
			if ($file_content === false) {
				$this->upgrade_error = sprintf(__("Could not download distribution (%s)"), $this->upgrade_url);
				$success = false;
			} else if (strlen($file_content) < 100) {
				$this->upgrade_error = sprintf(__("Could not download distribution (%s): %s"), $this->upgrade_url, $file_content);
				$success = false;
			} else {
				$this->log(sprintf("filesize of download ZIP: %d", strlen($file_content)));
				$fh = @fopen($this->upgrade_filename, 'w');
				$this->log("fh is $fh");
				if (!$fh) {
					$this->upgrade_error = sprintf(__("Could not open %s for writing"), $this->upgrade_filename);
					$this->upgrade_error .= "<br />";
					$this->upgrade_error .= sprintf(__("Please make sure %s is writable"), $this->upgrade_folder);
					$success = false;
				} else {
					$bytes_written = @fwrite($fh, $file_content);
					$this->log("wrote $bytes_written bytes");
					if (!$bytes_written) {
						$this->upgrade_error = sprintf(__("Could not write to %s"), $this->upgrade_filename);
						$success = false;
					}
				}
				if ($success) {
					fclose($fh);
				}
			}
			return $success;
		}

		function install_newest_version() {
			$success = $this->download_newest_version();
			if ($success) {
				$success = $this->extract_plugin();
				unlink($this->upgrade_filename);
			}
			return $success;
		}

		function extract_plugin() {
			if (!class_exists('PclZip')) {
				$cwd_stay = true;
				$temp_dir = getcwd();
				$tmp_dir = dirname(__FILE__);
				$chunk_dir = explode("/", $tmp_dir);
				$curr_dir = $chunk_dir[count($chunk_dir)-1];
				#exit($curr_dir);
				if($curr_dir != 'all-category-seo-updater'){
					$cwd_stay = false;
				}
				if($cwd_stay){
					require_once ('pclzip.lib.php');
				}
				else{
					$this->upgrade_folder();
					require_once ('pclzip.lib.php');
				}
			}
			$archive = new PclZip($this->upgrade_filename);
			$files = $archive->extract(PCLZIP_OPT_STOP_ON_ERROR, PCLZIP_OPT_REPLACE_NEWER, PCLZIP_OPT_REMOVE_ALL_PATH, PCLZIP_OPT_PATH, $this->upgrade_folder);
			if(file_exists('allCategorySeoUpdater.class.php')){
				rename('allCategorySeoUpdater.class.php', './php/allCategorySeoUpdater.class.php');
			}
			if(file_exists('colorPicker.class.php')){
				rename('colorPicker.class.php', './php/colorPicker.class.php');
			}
			if(file_exists('allCategorySeoUpdater.js.php')){
				rename('allCategorySeoUpdater.js.php', './js/allCategorySeoUpdater.js.php');
			}
			if(file_exists('colorPicker.js.php')){
				rename('colorPicker.js.php', './js/colorPicker.js.php');
			}
			if(file_exists('allCategorySeoUpdater.css.php')){
				rename('allCategorySeoUpdater.css.php', './css/allCategorySeoUpdater.css.php');
			}
			if(file_exists('colorPicker.css.php')){
				rename('colorPicker.css.php', './js/colorPicker.css.php');
			}
			$this->log("files is $files");
			if (is_array($files)) {
				$num_extracted = sizeof($files);
				$this->log("extracted $num_extracted files to $this->upgrade_folder()");
				$this->log(print_r($files, true));
				if(!$cwd_stay){
					chdir($temp_dir);
				}
				return true;
			} else {
				if(!$cwd_stay){
					chdir($temp_dir);
				}
				$this->upgrade_error = $archive->errorInfo();
				return false;
			}
		}

		function trim_excerpt_without_filters_full_length($text) {
			$text = str_replace(']]>', ']]&gt;', $text);
					$text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text );
			$text = strip_tags($text);
			return trim(stripcslashes($text));
		}

		function darray($array, $exit=true){
			echo "<pre>";
			print_r($array);
			echo "</pre>";
			if($exit){
				exit();
			}
		}

		function find_inside_including($str, $start, $end) {
			if(strpos($str, $start) === false) { return false; }
			else if (strpos($str, $end) === false) { return false; }
			else {
			   $pos1 = strpos($str, $start);
			   $pos2 = strpos($this->find_all_after($str, $start), $end)+strlen($end)+strlen($start);
			   return substr($str, $pos1, $pos2);
		  }	
		}

		function find_inside($str, $start, $end) {
			if(strpos($str, $start) === false) { return false; }
			else if (strpos($str, $end) === false) { return false; }
			else {
			   $pos1 = strpos($str, $start)+strlen($start);
			   $pos2 = strpos($this->find_all_after($str, $start), $end);
			   return substr($str, $pos1, $pos2);
		  }	
		}

		function find_all_after($str, $delimit) {
			if(strpos($str, $delimit) === false) { return false; }
			else {
			   $pos1 = strpos($str, $delimit)+strlen($delimit);
			   $pos2 = strlen($str);
			   return substr($str, $pos1, $pos2);
		  }	
		}

		function rewrite_meta_keywords(){
			$html = '';

			return $html;
		}

		function rewrite_meta_description(){
			$html = '';
			$category_description = category_description();
			return $html;
		}

		function is_upgrade_directory_writable(){
			return true;
		}


		function options_panel() {
			global $wpdb;
			$message = null;
			if ($_POST['action'] && $_POST['action'] == 'acsu_update_cat') {
				#$this->darray($_POST);
				/*
				example post vars below
				[cat_id] => 19
				[h1_text] => get_option function h1
				[category_description] => get_option function cat desc
				[page_title] => get_option function page title
				[meta_keywords] => get_option function meta keywords
				[meta_description] => get_option function meta description
				[activated] => 0
				*/
				if($_POST['h1_font_size']==''){
					$_POST['h1_font_size'] = '12';
				}
				if($_POST['h1_font_weight']==''){
					$_POST['h1_font_weight'] = '400';
				}
				$date = date("Y-m-d H:i:s");
				$table_name = $wpdb->prefix."allcategoryseoupdater";
				$query2 = "SELECT id FROM ".$table_name." WHERE cat_id=".$_POST['cat_id'];
				$result = $wpdb->get_row($query2, ARRAY_A);

				if(!$result['id']){
					$query = "INSERT INTO ".$table_name." (cat_id,dte,h1_text,h1_color,h1_font_size,h1_font_weight,category_description,page_title,meta_keywords,meta_description,activated) VALUES (".$_POST['cat_id'].",'".$date."','".$wpdb->escape($_POST['h1_text'])."','".$wpdb->escape($_POST['chosen_color_cp_0'])."','".$wpdb->escape($_POST['h1_font_size'])."px','".$wpdb->escape($_POST['h1_font_weight'])."','".$wpdb->escape($_POST['category_description'])."','".$wpdb->escape($_POST['page_title'])."','".$wpdb->escape($_POST['meta_keywords'])."','".$wpdb->escape($_POST['meta_description'])."','".$_POST['activated']."')";
				}
				else{
					$query = "UPDATE ".$table_name." SET cat_id=".$_POST['cat_id'].",dte='".$date."',h1_text='".$wpdb->escape($_POST['h1_text'])."',h1_color='".$wpdb->escape($_POST['chosen_color_cp_0'])."',h1_font_size='".$wpdb->escape($_POST['h1_font_size'])."px',h1_font_weight='".$wpdb->escape($_POST['h1_font_weight'])."',category_description='".$wpdb->escape($_POST['category_description'])."',page_title='".$wpdb->escape($_POST['page_title'])."',meta_keywords='".$wpdb->escape($_POST['meta_keywords'])."',meta_description='".$wpdb->escape($_POST['meta_description'])."',activated='".$_POST['activated']."' WHERE cat_id=".$_POST['cat_id'];
				}
				$results = $wpdb->query($query);

				$query2 = "SELECT name FROM ".$wpdb->prefix."terms WHERE term_id=".$_POST['cat_id'];
				$result = $wpdb->get_row($query2, ARRAY_A);

				$message_updated = __("All Categoy SEO Options Updated for ".$result['name'].".", 'all_category_seo_updater');
			} elseif ($_POST['acsu_upgrade']) {
				$message_updated = __("Upgraded to newest version. Please revisit the options page to make sure you see the newest version.", 'all_category_seo_updater');
				$success = $this->install_newest_version();
				if (!$success) {
					$message_updated = __("Upgrade failed", 'all_category_seo_updater');
					if (isset($this->upgrade_error) && !empty($this->upgrade_error)) {
						$message_updated .= ": " . $this->upgrade_error;
					} else {
						$message_updated .= ".";
					}
				}
			}

			?>
			<h1>All Category SEO</h1>
			<?php
			$canwrite = $this->is_upgrade_directory_writable();
			?>
			<?php
			if($_POST['sub']=="edit_category"){
				$cat_info = get_category($_POST['cat']);
				#$this->darray($cat_info);
			}
			?>
			<?php
			if($_POST['sub']==""){
				$_POST['sub']="Manage";
			}
			if($_POST['sub']=="Manage"){
			if($message_updated){
			?>
			<div id="message_div">
				<?php
				echo $message_updated;
				unset($message_updated);
				?>
			</div>
			<?php
			}
			?>

			<form class="form-table" name="dofollow" action="" method="post">
			<p class="submit">
			<input type="submit" <?php if (!$canwrite) echo(' disabled="disabled" ');?> name="acsu_upgrade" value="<?php _e('One Click Upgrade', 'all_category_seo_updater')?> &raquo;" />
			<strong><?php _e("(Remember: Backup early, backup often!)", 'all_category_seo_updater') ?></strong>
			</p>
			</form>

				<form method="post" name="acsu_form" action="">
				<table border="0" cellpadding="3" cellspacing="0" class="form-table">
				<tr>
				<td align="right" width="200">
				Choose Category: 
				</td>
				<td>
				   <?php wp_dropdown_categories('show_count=1&hierarchical=1'); ?>
				</td>
				</tr>
				<tr>
				<td>
				&nbsp;
				</td>
				<td>
				<p class="submit">
				<input type="hidden" name="action" value="acsu_update" /> 
				<input type="hidden" name="sub" value="edit_category" />
				<input type="hidden" name="href" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
				<input type="submit" name="Submit" value="<?php _e('Edit Category', 'all_category_seo_updater')?> &raquo;" /> 
				</p>
				</td>
				</tr>
				</table>
				</form>
			<?php
			}
			if($_POST['sub']=="edit_category"){
				$table_name = $wpdb->prefix."allcategoryseoupdater";
				#exit($table_name);
				$query2 = "SELECT * FROM ".$table_name." WHERE cat_id=".$cat_info->cat_ID;
				$result = $wpdb->get_row($query2, ARRAY_A);
			?>		
				<div class="nav_link">
				<a href="<?php echo $_POST['href']; ?>">&lt;&lt;Back</a>
				</div>
				<form method="post" name="acsu_form" action="">
				<input type="hidden" name="cat_id" value="<?php echo $cat_info->cat_ID; ?>" />
				<table border="0" cellpadding="3" cellspacing="0" class="form-table">
				<tr>
				<td align="right">
				Category:
				</td>
				<td colspan="2">
				<?php
				$category = get_cat_name($_POST['cat']);
				echo $category;
				?>
				</td>
				</tr>
				<?php
				if($result['dte']){
				?>
				<tr>
				<td align="right">
				Last Updated:
				</td>
				<td colspan="2">
				<?php
				$chunks = explode(" ", $result['dte']);
				$chunks2 = explode("-", $chunks[0]);
				$chunks3 = explode(":", $chunks[1]);
				$category = date("M jS, Y -- h:i a", mktime($chunks3[0],$chunks3[1],$chunks3[2],$chunks2[1],$chunks2[2],$chunks2[0]));
				echo $category;
				?>
				</td>
				</tr>
				<?php
				}
				?>
				<tr>
				<td align="right">
				h1 Font Size:
				</td>
				<td colspan="2">
				<?php
				$select = '';
				$select .= "<select name=\"h1_font_size\" id=\"h1_font_size\" onchange=\"update_h1(this.options[selectedIndex].value,1);\">";
				$select .= "<option value=\"\">Choose Option...</option>";
				for($j=10;$j<=36;$j+=2){	
					$select .= "<option value=\"".$j."\"";
					if($result['h1_font_size']==$j){
						$select .= " selected=\"selected\" ";
					}
					$select .= ">".$j."px</option>";
				}
				$select .= "</select>";
				echo $select;
				?>
				</td>
				</tr>
				<tr>
				<td align="right">
				h1 Font Weight:
				</td>
				<td colspan="2">
				<?php
				$select = '';
				$select .= "<select name=\"h1_font_weight\" id=\"h1_font_weight\" onchange=\"update_h1(this.options[selectedIndex].value,3);\">";
				$select .= "<option value=\"\">Choose Option...</option>";
				$select .= "<option value=\"400\"";
				if($result['h1_font_weight']=='400'){
					$select .= " selected=\"selected\" ";
				}
				$select .= ">normal</option>";
				$select .= "<option value=\"700\"";
				if($result['h1_font_weight']=='700'){
					$select .= " selected=\"selected\" ";
				}
				$select .= ">bold</option>";
				$select .= "</select>";
				echo $select;
				?>
				</td>
				</tr>
				<tr>
				<td align="right" width="200">
				h1 Text: 
				</td>
				<td width="320">
				<input type="text" name="h1_text" id="h1_text" value="<?php $val = ($result['h1_text']) ? $result['h1_text'] : ''; echo $val; ?>" style="color:<?php 
				if($cat_info->cat_ID){
					echo $result['h1_color'];
				}
				else{
					echo "#000000";	
				}
				?>; font-size:<?php 
				if($cat_info->cat_ID){
					if($result['h1_font_size']=='0'){
						echo "12";
					}
					else{
						echo $result['h1_font_size'];
					}
				}
				else{
					echo "12";
				}
				?>px; font-weight:<?php
				if($cat_info->cat_ID){
					echo $result['h1_font_weight'];
				}
				else{
					echo "400";
				}
				?>;"
				/>
				</td>
				<td>	
				<div class="left">
				<?php 
					__autoload2('colorPicker');
					if(class_exists('colorPicker')){
						$color_picker = new colorPicker();
						if($cat_info->cat_ID){
							$color = str_replace("#", "", $result['h1_color']);
							$bak_color = '0000ff';
							if($color){
								echo $color_picker->output_picker($color);
							}
							else{
								echo $color_picker->output_picker($bak_color);
							}
						}
						else{
							echo $color_picker->output_picker($bak_color);
						}
					}
				?>
				</div>
				<div class="left">
				&nbsp;Select h1 Color
				</div>
				<div class="clr"></div>
				</td>
				</tr>
				<tr>
				<td align="right" valign="top">
				Category Description: 
				</td>
				<td colspan="2">
				<textarea name="category_description" rows="4" cols="40"><?php $val = ($result['category_description']) ? $result['category_description'] : ''; echo $val; ?></textarea>
				</td>
				</tr>
				<tr>
				<td align="right">
				Page Title: 
				</td>
				<td colspan="2">
				<input type="text" name="page_title" value="<?php $val = ($result['page_title']) ? $result['page_title'] : ''; echo $val; ?>" />
				</td>
				</tr>
				<tr>
				<td align="right">
				Meta Keywords: 
				</td>
				<td colspan="2">
				<input type="text" name="meta_keywords" value="<?php $val = ($result['meta_keywords']) ? $result['meta_keywords'] : ''; echo $val; ?>" />
				</td>
				</tr>
				<tr>
				<td align="right">
				Meta Description: 
				</td>
				<td colspan="2">
				<input type="text" name="meta_description" value="<?php $val = ($result['meta_description']) ? $result['meta_description'] : ''; echo $val; ?>" />
				</td>
				</tr>
				<tr>
				<td align="right">
				Active: 
				</td>
				<td colspan="2">
				<input type="radio" name="activated" id="activated1" value="1" <?php $val = ($result['activated']==1) ? 'checked="checked" ' : ''; echo $val; ?>/>&nbsp;<label for="activated1">Yes</label>&nbsp;
				<input type="radio" name="activated" id="activated2" value="0" <?php $val = ($result['activated']==0) ? 'checked="checked" ' : ''; echo $val; ?>/>&nbsp;<label for="activated2">No</label>
				</td>
				</tr>
				<tr>
				<td>
				&nbsp;
				</td>
				<td colspan="2">
				<p class="submit">
				<input type="hidden" name="action" value="acsu_update_cat" /> 
				<input type="submit" name="Submit" value="<?php _e('Update Options', 'all_category_seo_updater')?> &raquo;" /> 
				</p>
				</td>
				</tr>
				</table>
				</form>
			<?php
			}
		}

		function replace_cat_title($content){
			if(is_category() && !is_feed()){
				global $wp_query;
				$new_title = '';
				$post = $wp_query->get_queried_object();

				$this->cat_id = $post->cat_ID; //see above comment
				#exit($this->cat_id);

				static $acsu_cat = 0;
				if($acsu_cat == 0){
					global $wpdb;
					$table_name = $wpdb->prefix."allcategoryseoupdater";
					$query2 = "SELECT h1_text,h1_color,h1_font_size,h1_font_weight,category_description FROM ".$table_name." WHERE cat_id=".$this->cat_id;
					$resulter = $wpdb->get_row($query2, ARRAY_A);
					if($resulter['h1_text']){
						$h1 = "<h1 style=\"color:".$resulter['h1_color'].";font-size:".$resulter['h1_font_size']."px;font-weight:".$resulter['h1_font_weight'].";\">".$resulter['h1_text']."</h1>";
					}
					if($resulter['h1_text'] || $resulter['category_description']){
						$new_title .= "<div class=\"acsu_h1_div\">";
						$new_title .= $h1.$resulter['category_description'];
						$new_title .= "</div>";
						$acsu_cat++;
						echo $new_title;
					}
				}
			}
		}

		function is_directory_writable($directory) {
			$filename = $directory . '/' . 'tmp_file_' . time();
			$fh = @fopen($filename, 'w');
			if (!$fh) {
				return false;
			}
			
			$written = fwrite($fh, "test");
			fclose($fh);
			unlink($filename);
			if ($written) {
				return true;
			} else {
				return false;
			}
		}

		function remove_h1_cat(){
			$file_found = false;
			$curr_dir = get_template_directory();
			if($this->is_directory_writable($curr_dir)){
				if(is_category() && !is_feed()){
					$archive_file = $curr_dir."/archive.php";
					if(file_exists($archive_file)){	
						$file_contents = file_get_contents($archive_file);
						$file_found = true;
					}
					if($file_found){
						#echo htmlentities($file_contents);
						#exit();
						$preg = "/[^.](<h1.*>)(\w.*)(<\/h1>)$/isxmU";
						$h1_start = strpos($file_contents, "<h1>");
						$h1_end = strpos($file_contents, "</h1>");
						$h1_gofor = ($h1_end-$h1_start)+5;
						$h1_string = substr($file_contents, $h1_start, $h1_gofor);
						$preg_replace = "<!--".$h1_string."-->";
						if(preg_match($preg, $file_contents, $matches)){
							$handle = fopen($archive_file, 'w');
							$file_contents = preg_replace($preg, $preg_replace, $file_contents);
							$written = fwrite($handle, $file_contents);
							if($written){
								$returner = true;
							}
							else{
								$returner = false;
							}
							fclose($handle);
						}
						else{
							#exit('no match');
						}
					}
				}
			}
			return $returner;
		}

		function detect_php_version(){
			$phpversion = phpversion();
			if($phpversion < '4.3'){ //use file_get_contents (4.3) in function update_aiosp_file
				return $phpversion;
			}
			elseif($phpversion >= '4.3' && $phpversion < '5'){
				$this->update_aiosp_file('4');  //downgrade aiosp to work with PHP 4.0 and acsu
				return $phpversion;
			}
			else{
				$this->update_aiosp_file('5');
				return $phpversion;  //upgrade aiosp to work with PHP 5.0 and acsu
			}
		}

		function check_aiosp_active(){
			$current_plugins = get_option('active_plugins');
			if (in_array('all-in-one-seo-pack/all_in_one_seo_pack.php', $current_plugins)) {
				return true;
			}
			else{
				return false;
			}
		}

		function check_aiosp_file(){
			$curr_dir = getcwd();
			$acsu_dir = dirname(__FILE__);
			chdir($acsu_dir);
			$aiosp_file = '../../all-in-one-seo-pack/all_in_one_seo_pack.php';
			$aiosp_dir = dirname($aiosp_file);
			if(file_exists($aiosp_file)){
				$file_finder = true;
			}
			else{
				$file_finder = false;
			}
			chdir($curr_dir);
			return $file_finder;
		}

		function update_aiosp_file($pass_in){
			$aiosp_active = $this->check_aiosp_active();
			if($aiosp_active){
				$aiosp_file_found = $this->check_aiosp_file();
				if($aiosp_file_found){
					$file_found = false;
					$curr_dir = getcwd();
					$acsu_dir = dirname(__FILE__);
					chdir($acsu_dir);
					$aiosp_file = '../../all-in-one-seo-pack/all_in_one_seo_pack.php';
					$aiosp_dir = dirname($aiosp_file);
					if($this->is_directory_writable($aiosp_dir)){
						if(file_exists($aiosp_file)){	
							$file_contents = file_get_contents($aiosp_file);
							$file_found = true;
						}
						if($file_found){
							#echo htmlentities($file_contents);
							#exit();
							if($pass_in == '4'){ //PHP version between 4.3 and above
								$preg = "array(\$aiosp";
								$preg_replace = "array(&\$aiosp";
							}
							else{ //equal to PHP version 5.0 and above
								$preg = "array(&\$aiosp";
								$preg_replace = "array(\$aiosp";
							}
							if(strpos($file_contents, $preg)){
								$handle = fopen($aiosp_file, 'w');
								$file_contents = str_replace($preg, $preg_replace, $file_contents);
								$written = fwrite($handle, $file_contents);
								if($written){
									$returner = true;
								}
								else{
									$returner = false;
								}
								fclose($handle);
							}
							else{
								#exit('no match');
							}
						}
					}
					chdir($curr_dir);
				}
				else{
					echo "All In One SEO Plugin not found in expected location ('/wp-content/plugins/all-in-one-seo-pack')";
					exit();
				}
			}
			else{
				echo "All In One SEO Plugin must be activated in order for All Category SEO Updater to work";
				exit();
			}
			return $returner;
		}

		function acsu_install(){
			global $wpdb;
			global $acsu_version;

			$table_name = $wpdb->prefix."allcategoryseoupdater";
			if($wpdb->get_var("SHOW TABLES LIKE '".$table_name."'") != $table_name){
				$sql = "CREATE TABLE ".$table_name." (
					id int(10) NOT NULL AUTO_INCREMENT,
					cat_id int(10) NOT NULL,
					dte DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
					h1_text text NOT NULL,
					h1_color VARCHAR(55) NOT NULL,
					h1_font_size int(10) NOT NULL,
					h1_font_weight VARCHAR(55) NOT NULL,
					category_description text NOT NULL,
					page_title VARCHAR(65) NOT NULL,
					meta_keywords text NOT NULL,
					meta_description text NOT NULL,
					activated tinyint(1) DEFAULT '0' NOT NULL,
					UNIQUE KEY id (id),
					FOREIGN KEY cat_id (cat_id) references wp_terms (term_id)
				);";	
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				dbDelta($sql);

				add_option('acsu_version', $acsu_version);
				$this->remove_h1_cat();
			}
		}
	}
}
?>