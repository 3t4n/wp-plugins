<?php
/***********************************************************************************/
/* Post Thumb Revisited Main functions
/*
/* 	function the_thumb ($arg='')
/* 	function get_thumb ($arg='')
/*		Loop function. Returns the formatted thumbnail of the current post
/*		or object (depending on parameters)
/*
/* 	function get_thumb_url ()
/*
/*	function the_recent_thumbs ($arg='', $beforeli='', $afterli='', $before='', $after='')
/*	function get_recent_thumbs ($arg='', $beforeli='', $afterli='', $before='', $after='')
/*		Anywhere function. Returns thumbnails of the most recent posts
/*
/* 	function the_random_thumb ($arg='', $beforeli='', $afterli='', $before='', $after='')
/*	function get_random_thumb ($arg='', $beforeli='', $afterli='', $before='', $after='')
/*		Anywhere function. Returns thumbnail(s) from random post(s)
/*
/*	function pt_the_excerpt($length=40, $title_after= false, $arg='')
/*		Loop function. Returns Thumbnail (+ Title) + Excerpt
/*
/*	function get_single_thumb ($post, $arg='')
/*	function get_recent_medias ($arg='', $beforeli='', $afterli='', $before='', $after='')
/*	function get_WTMedia ($vid, $arg='', $play_width=0, $play_height=0)
/*	function get_WTPlaylist ($pid, $arg='', $play_width=0, $play_height=0, $mp3=false, $flv=false)
/*	function get_wordTubeTag ($content='')
/*	function get_Youtube ($id, $title, $thumb)
/*	function RecentImages ($arg='', $slice=5, $timeout=0)
/*	function RecentImages_sub ($ListImages, $slice, $offset, $i, $limit)
/*
/***********************************************************************************/


/***********************************************************************************/
/* display thumbnail. Loop function.
/***********************************************************************************/
function the_thumb ($arg='') {

	echo get_thumb($arg);
}
/***********************************************************************************/
/* Get thumbnail. Loop function.
/***********************************************************************************/
function get_thumb ($arg='') {
	global $PTRevisited;

		return $PTRevisited->GetThumb($arg);
}
/***********************************************************************************/
/* Get post image url. Loop function.
/***********************************************************************************/
function get_thumb_url () {
	global $PTRevisited, $post;

		setup_postdata($post);
		$array =  $PTRevisited->GetPostData($post->ID);
		if ($array !='') return $array['image_url'];
		return '';
	
}
/***********************************************************************************/
/* Return recent posts display string
/***********************************************************************************/
function get_recent_thumbs ($arg='', $beforeli='', $afterli='', $before='', $after='') {
	global $PTRevisited;

		return $PTRevisited->GetTheRecentThumbs($arg, $beforeli, $afterli, $before, $after);
}
/***********************************************************************************/
/* Display recent posts
/***********************************************************************************/
function the_recent_thumbs ($arg='', $beforeli='', $afterli='', $before='', $after='') {

	echo get_recent_thumbs($arg, $beforeli, $afterli, $before, $after);

}
/***********************************************************************************/
/* Return random thumbnails.
/***********************************************************************************/
function get_random_thumb ($arg='', $beforeli='', $afterli='', $before='', $after='') {
	global $PTRevisited;

		return $PTRevisited->GetRandomThumb($arg, $beforeli, $afterli, $before, $after);

}
/***********************************************************************************/
/* Return random thumbnails.
/*
/* LIMIT: number of thumbnail to display. Default is 1.
/***********************************************************************************/
function the_random_thumb ($arg='', $beforeli='', $afterli='', $before='', $after='') {

	echo get_random_thumb($arg, $beforeli, $afterli, $before, $after);

}
/****************************************************************/
/* Returns displayable post content
/****************************************************************/
function pt_get_excerpt($earg='', $arg='', $addstr='') {

	global $PTRevisited;
		return $PTRevisited->TheExcerpt($earg, $arg, $addstr);

}
/****************************************************************/
/* Returns displayable post content
/****************************************************************/
function pt_the_excerpt($earg='', $arg='', $addstr='') {
	global $PTRevisited;
		echo $PTRevisited->TheExcerpt($earg, $arg, $addstr);
}
/***********************************************************************************/
/* Display recent posts
/***********************************************************************************/
function get_recent_medias ($arg='', $beforeli='', $afterli='', $before='', $after='') {
	global $PTRevisited;
		echo $PTRevisited->GetTheRecentThumbs($arg.'&media=1', $beforeli, $afterli, $before, $after);
}
/***********************************************************************************/
/* Get thumbnail for a given post
/***********************************************************************************/
function get_single_thumb ($post, $arg='') {
	global $PTRevisited;
		return $PTRevisited->GetSingleThumb($post, $arg);
}
/****************************************************************/
/* Includes features in header
/****************************************************************/
function pt_include_header() {
	global $PTRevisited;
		return $PTRevisited->include_header();
}
/***********************************************************************************/
/* Get Post-Thumb Revisited options.
/***********************************************************************************/
function get_pt_options($option) {
	global $PTRevisited;
		return $PTRevisited->settings[$option];
}
/***********************************************************************************/
/* Get Post-Thumb Revisited options.
/***********************************************************************************/
function get_pt_options_all() {
	global $PTRevisited;
		return $PTRevisited->settings;
}
/***********************************************************************************/
/* Get wordtube options.
/***********************************************************************************/
function get_wt_options_all() {
	global $PTRevisited;
		return $PTRevisited->wordtube_options;
}
/***********************************************************************************/
/* Get wordtube options.
/***********************************************************************************/
function get_wt_options($option) {
	global $PTRevisited;
		return $PTRevisited->wordtube_options[$option];
}
/***********************************************************************************/
/* Get wordtube playertype.
/***********************************************************************************/
function get_wt_playertype() {
	global $PTRevisited;
		return $PTRevisited->playertype;
}
/***********************************************************************************/
/* Get wordtube playertype.
/***********************************************************************************/
function get_wt_playertypemp3() {
	global $PTRevisited;
		return $PTRevisited->playertypemp3;
}

/***********************************************************************************/
/* Get wordTube media.
/***********************************************************************************/
function get_WTMedia ($vid, $arg='', $play_width=0, $play_height=0) {
	global $PTRLibrary;
		if (class_exists('PostThumbLibrary'))
			return $PTRLibrary->GetWTMedia($vid, $arg, $play_width, $play_height);
		return false;
}
/***********************************************************************************/
/* Get wordTube Playlist.
/***********************************************************************************/
function get_WTPlaylist ($pid, $arg='', $play_width=0, $play_height=0, $mp3=false, $flv=false) {
	global $PTRLibrary;
		if (class_exists('PostThumbLibrary'))
		return $PTRLibrary->GetWTPlaylist($pid, $arg, $play_width, $play_height, $mp3, $flv);
		return false;
}
/***********************************************************************************/
/* Get 
/***********************************************************************************/
function get_wordTubeTag ($content='') {
	global $PTRLibrary;
		if (class_exists('PostThumbLibrary'))
		return $PTRLibrary->ReplaceWordTubeMedia($content);
		return false;
}
/***********************************************************************************/
/* Get 
/***********************************************************************************/
function get_Youtube ($id, $title, $thumb) {
	global $PTRLibrary;
		if (class_exists('PostThumbLibrary'))
		return $PTRLibrary->GetYoutube($id, $title, $thumb);
		return false;
}

/***********************************************************************************/
/* List all recent images.
/* 	$arg: 		post-thumb parameters
/*	$slice:		number of posts to load for each loop of parsing
/*	$timeout:	cache delay in minutes
/***********************************************************************************/
function RecentImages ($arg='', $slice=5, $timeout=0) {
	global $PTRevisited, $wpdb;

	// check cache
	if ($timeout > 0) {
		$filename = 'recentimages'.md5($arg);
		$dirname = get_pt_options('base_path').'/'.get_pt_options('folder_name').'/_cache/';
		$ret_str = pt_load_cache($filename, $dirname, $timeout);
		if ($ret_str !== false) return $ret_str;
	}
	
	$ListImages = array();
	$ListImages['pic'] = array();
	$ListImages['endDB'] = false;

	// Retrieves specific parameters
	$new_args = pt_parse_arg($arg);
	if (isset($new_args['LIMIT'])) { 
		$limit = (int) $new_args['LIMIT']; 
	} else 
		$limit = 10;


	$offset = 0;
	$i = 0;
	while ($i < $limit):
        	$ListImages = RecentImages_sub ($ListImages, $slice, $offset, $i, $limit);
        	$offset = $offset+$slice;
        	$i = count($ListImages['pic']);
        	if ($ListImages['endDB']) break;
        endwhile;

	// Delete image in excess
	while (count($ListImages['pic']) > $limit) :
		array_pop($ListImages['pic']);
	endwhile;
	
	$ret_str = '';
	foreach ($ListImages['pic'] as $image):

		$t = new pt_thumbnail (get_pt_options_all(), $image[0], $arg);

		// Add thumbnail & highslide expand to image
		if (POSTTHUMB_USE_HS) {
			$h = new pt_highslide ($image[0], $t->thumb_url, $image[1]);
			$h->set_borders (get_pt_options('ovframe'));
			$h->set_title ($image[1]);
			if (get_pt_options('caption') == 'true')
				$h->set_caption (addslashes($image[1]));
			$h->set_html_size();
			$h->set_href_text('', $add_tag);
			$ret_str .= $h->highslide_link ();
			unset ($h);
		}
		// Simple replacement by thumbnail linked to image
		else $ret_str .= '<a href="'.$image[0].'" title="'.$image[1].'" ><img src="'.$t->thumb_url.'" alt="'.$image[1].'" /></a>';

		unset ($t);

	endforeach;
	
	unset($ListImages);
	
	if ($timeout > 0) pt_save_cache($filename, $dirname, $ret_str);
	return $ret_str;	
}
/***********************************************************************************/
/* List all recent images.
/*	$ListImages:	input and output parameter. Contain the list of images
/*	$offset:	post to skip to start new loop
/*	$i:		current counter
/*	$limit:		number of images to return
/***********************************************************************************/
function RecentImages_sub ($ListImages, $slice, $offset, $i, $limit) {
	global $PTRevisited, $PTRLibrary, $post;
	$attrList = array ("src");

	// Create a query object to retrieve posts
	$my_query = new WP_Query();
	$posts = $my_query->query('showposts='.$limit.'&offset='.$offset);
//	$posts = get_posts('numberposts='.$slice.'&offset='.$offset);
	if (count($posts) < $slice) $ListImages['endDB']=true;
	
	foreach ($posts as $post) :

		if ($i>$limit) break;

		setup_postdata($post);		
		$content = apply_filters('the_content', get_the_content());

		// Parse images
		$pattern = '/<img([^>]*)\/>/si';
		if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {
			
			foreach ($matches as $match) :

				// Skip wp smileys
				if (stripos($match[0], 'smiley')) continue;
				if (stripos($match[0], 'sficon')) continue;
				if (stripos($match[0], 'jlanguage')) continue;
				if (stripos($match[0], 'icons')) continue;
				if (stripos($match[0], 'sfavatar')) continue;

				if ($i>$limit) break;
				if (!$PTRLibrary->p_rel) {
					if (stripos($match[0], 'rel="thumb"') === false && stripos($match[0], "rel='thumb'") === false)
						continue;
				} else {
					if (stripos($match[0], 'rel="nothumb"') !== false || stripos($match[0], "rel='nothumb'") !== false)
						continue;
				}

				$m = str_replace(array("%", "|", "@", ")", "("), array("\%", "\|", "\@", "\)", "\("), $match[0]);
				
				$pat = '%<a([^>]*)\>([^>]*)'.$m.'([^>]*)\<\/a>%si';
				if (preg_match($pat,$content,$macgee)) {
					if (stripos($match[0], 'sficon')) continue;
				}

				$pat = '%<a([^>]*).(jpg|jpeg|png|gif)([^>]*)\>([^>]*)'.$m.'([^>]*)\<\/a>%si';
				if (preg_match($pat,$content,$macgee)) {

					$ListAttr = pt_parseAtributes($macgee[0], array('href', 'title'));
					$ListImages['pic'][] =  array($ListAttr['href'], $ListAttr['title']);
					$i++;
					unset($macgee);

				} else {

					$ListAttr = pt_parseAtributes($match[1], array('src', 'alt'));
					$ListImages['pic'][] =  array($ListAttr['src'], $ListAttr['alt']);
					$i++;
				}

			endforeach;
		}
		
	endforeach;

	unset ($my_query);
	unset ($posts);
	
	return $ListImages;
	

}
/********************************************************************************************************/
/*
/* Utility functions for Post-thumb revisited
/*
/********************************************************************************************************/


/****************************************************************/
/* Parse given attributes of an html string
/****************************************************************/
function pt_parseAtributes($html, $attrList=array ("src", "alt", "title", "align")) {

	$html = trim($html);
	$ListAttr = array();
	
	foreach ($attrList as $attr) :
		$ListAttr[$attr]= pt_parseAttribute($html, $attr);
	endforeach;
	
	return $ListAttr;
}
function pt_parseAttribute($html, $attr) {

	if (($pos=stripos($html, $attr)) === false) return '';
	$html = substr($html, $pos);
	$html = str_replace($attr, '', $html);
	$html = ltrim($html);
	$html = substr($html, 2);
	if (($pos=stripos($html, '"')) === false) {
		if (($pos=stripos($html, "'")) === false) return '';
	}
	return substr($html, 0, $pos);
}
/***********************************************************************************/
/* extended pathinfo (for php4)
/***********************************************************************************/
function pt_pathinfo($path) {

	$tab = pathinfo($path);
	$tab['filename'] = substr($tab['basename'],0,strlen($tab['basename']) - (strlen($tab['extension']) + 1) );
	return $tab;
}
/***********************************************************************************/
/* Parse arguments
/***********************************************************************************/
function pt_parse_arg ($arg) {

	parse_str($arg, $new_args);
	return array_change_key_case($new_args, CASE_UPPER);

}
/***********************************************************************************/
/* Exclude some REGEX from a content
/***********************************************************************************/
function exclude_regex ($content) {

	$result = $content;
	$reg_coolplayer = '/\[coolplayer](.*?)\[\/coolplayer]/i';
	$reg_youtube = '/\[youtube](.*?)\[\/youtube]/i';
	$reg_dailymotion = '/\[dailymotion](.*?)\[\/dailymotion]/i';
	$reg_googlevideo = '/\[googlevideo](.*?)\[\/googlevideo]/i';
	$reg_wordtube = '/\[MEDIA=(.*?)]/i';
	$reg_extremevideo = '/\[ev(.*?)\[\/ev]/i';

	$pt_youtube = '/\[youtube=\((.*?)\]/i';
 	$pt_dailymotion = '/\[dailymotion=\((.*?)\]/i';

	$content = preg_replace($reg_coolplayer, '...', $content);
	$content = preg_replace($reg_youtube, '...', $content);
	$content = preg_replace($reg_dailymotion, '...', $content);
	$content = preg_replace($reg_googlevideo, '...', $content);
	$content = preg_replace($reg_wordtube, '...', $content);
	$content = preg_replace($reg_extremevideo, '...', $content);
	$content = preg_replace($pt_youtube, '...', $content);
	$content = preg_replace($pt_dailymotion, '...', $content);

	return $content;
}
/****************************************************************
* Test if remote image exists
* @param url to test
* @return true if file exists
****************************************************************/
function remote_file_exists ($uri) {

//	$uri = str_replace(' ', '%20', $uri);
	if (@file_exists($uri)) return true;

	$parsed_url = @parse_url($uri);
	if ( !$parsed_url || !is_array($parsed_url) )
		return false;

	if ( !isset($parsed_url['scheme']) || !in_array($parsed_url['scheme'], array('http','https')) )
		$uri = 'http://' . $uri;

	if ( ini_get('allow_url_fopen') ) {
		if (@fclose(@fopen($uri, 'r')) !== false) return true;
	}

	if ( function_exists('curl_init') ) {

		// The maximum number of seconds to allow cURL functions to execute.
		$timeout = 5;
		$handle = curl_init();
		curl_setopt ($handle, CURLOPT_MUTE, TRUE);
		curl_setopt ($handle, CURLOPT_URL, $uri);
		curl_setopt ($handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt ($handle, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt ($handle, CURLOPT_TIMEOUT, $timeout);
		$buffer = curl_exec($handle);
		curl_close($handle);
		if ($buffer !== false) return true;
	}

	if ( function_exists('get_headers') ) {

		$AgetHeaders = @get_headers($uri);
		if (preg_match("|200|", $AgetHeaders[0])) return true;

	}

	return @file_exists($uri);

}
/****************************************************************/
/* retourne un chemin canonique a partir d'un chemin contenant des ../
/****************************************************************/
function canonicalize($address) {

	$address = explode('/', $address);
	$keys = array_keys($address, '..');

	foreach($keys AS $keypos => $key)
	{
		array_splice($address, $key - ($keypos * 2 + 1), 2);
	}

	$address = implode('/', $address);
	$address = str_replace('./', '', $address);
	return $address;
}
/****************************************************************/
/*
/****************************************************************/
function pt_clean_text($text, $no_semiologic=false) {

	$text = strip_tags(stripslashes($text));

	if (function_exists('jLanguage_processTitle'))
		$text = jLanguage_processTitle($text);

	$pattern = '/\[MEDIA=([^\]]*)\]/i';
        $text = preg_replace($pattern,'',$text);
	$pattern = '/\[PTPLAYLIST=([^\]]*)\]/i';
        $text = preg_replace($pattern,'',$text);
	$pattern = '/\[dailymotion=([^\]]*)\]/i';
        $text = preg_replace($pattern,'',$text);
	$pattern = '/\[youtube=([^\]]*)\]/i';
        $text = preg_replace($pattern,'',$text);
	$pattern = '/\[PTSET=([^\]]*)\]/i';
        $text = preg_replace($pattern,'',$text);
	$pattern = '/\[PTALBUM=([^\]]*)\]/i';
        $text = preg_replace($pattern,'',$text);
	$pattern = '/\[PTTAG=([^\]]*)\]/i';
        $text = preg_replace($pattern,'',$text);
	$pattern = '/\[GALLERY=([^\]]*)\]/i';
        $text = preg_replace($pattern,'',$text);
	$pattern = '/\[SINGLEPIC=([^\]]*)\]/i';
        $text = preg_replace($pattern,'',$text);

	// This is for semiologic smart link plugin
	if ($no_semiologic) {

        	$pattern = '/\[([^\]]*)\-(\>|\&gt)([^\]]*)\]/i';
        	if (preg_match_all($pattern, $text, $matches, PREG_SET_ORDER)) {
        	
        		foreach ($matches as $match) :
				$text = str_replace($match[0], $match[1], $text);
                        endforeach;
		}
	}

	// Trim all unwanted/unnecessary characters
	return rtrim($text, "\s\n\t\r\0\x0B");
}
/****************************************************************/
/*
/****************************************************************/
function get_pt_excerpt($arg='') {
	global $post;

	$new_args = pt_parse_arg($arg);
	
	// Retrieves specific parameters
	if (isset($new_args['MORETEXT'])) $more_text = $new_args['MORETEXT']; else $more_text = "...";
	$link = isset($new_args['LINK']);
	if (isset($new_args['MORETAG'])) $more_tag = $new_args['MORETAG']; else $more_tag = "span";
	if (isset($new_args['SHOWDOTS'])) $showdots = '...'; else $showdots = '';

	// if there's a password, return there.
	if (!empty($post->post_password)) {

		if ($_COOKIE['wp-postpass_'.COOKIEHASH] != $post->post_password) { // and it doesn't match cookie
			// if this runs in a feed
			if(is_feed())
				$output = __('There is no excerpt because this is a protected post.');
			else
				$output = get_the_password_form();
		}
		return $output;
	}


	// Create more link or more text
	if ($link) {
		if ($more_tag == '')
			$more_link = '';
		else
			$more_link = '<' . $more_tag . ' class="more-link">';
		$more_link .= '<a href="'.get_permalink().'" title="Permanent Link to '.get_the_title().'">' . $more_text . '</a>';
                if ($more_tag != '') $more_link .= '</' . $more_tag . '>' . "\n";
	} else
		$more_link = $more_text;

	$more_link = $showdots.$more_link;

	return get_pt_excerpt_sub($post->post_content, $more_link, $arg);
}
/****************************************************************/
/*
/****************************************************************/
function get_pt_excerpt_sub($text='', $morelink='...', $arg='') {

	$new_args = pt_parse_arg($arg);

	// Retrieves specific parameters
	$excerpt_length = 0;
	$excerpt_words = 0;
	if (isset($new_args['WORDS'])) $excerpt_words = $new_args['WORDS']; 
	elseif (isset($new_args['LENGTH'])) $excerpt_length = $new_args['LENGTH']; 
	else $excerpt_words = 40;
	if (isset($new_args['NOMORE'])) $no_more = ($new_args['NOMORE']==1); else $no_more = false;
	if (isset($new_args['NOSEMIO'])) $no_semiologic = ($new_args['NOSEMIO']==1); else $no_semiologic = false;

	// First cleaning
	$text = pt_clean_text($text, $no_semiologic);
	$ellipsis = false;

	// Excerpt based on number of words
	if ($excerpt_words > 0) {

		if (!$no_more && strpos($text, '<!--more-->')) {
			$text = explode('<!--more-->', $text, 2);
			$l = count($text[0]);
			$more_link = 1;
		} else {
			$words = explode(' ', $text, $excerpt_words + 1);
			if (count($words) > $excerpt_words) {
				array_pop($words);
				$output = implode(' ', $words);
				$output .= $morelink;
			} else {
				$output = $text;
				$ellipsis = true;
			}
		}


	// Excerpt based on number of characters
	} elseif ($excerpt_length > 0) {
		if (!$no_more && strpos($text, '<!--more-->')) {
			$text = explode('<!--more-->', $text, 2);
			$l = count($text[0]);
			$more_link = 1;
		} else {
			if (strlen($text)+3 > $excerpt_length) {
				$output = substr($text,0,$excerpt_length-3).$morelink;
			} else {
				$output = $text;
				$ellipsis = true;
			}
		}
	} else {
		$output = $text;
		$ellipsis = true;
	}

	return $output;
}
/****************************************************************/
/*
/****************************************************************/
function get_excerpt_revisited($excerpt_length=120, $more_link_text="...", $no_more=false) {

	global $post;
	$ellipsis = 0;
	$output = '';

 	// if there's a password
 	if (!empty($post->post_password)) { 
 	
		if ($_COOKIE['wp-postpass_'.COOKIEHASH] != $post->post_password) { // and it doesn't match cookie
			// if this runs in a feed
			if(is_feed()) { 
				$output = __('There is no excerpt because this is a protected post.');
			} else {
				$output = get_the_password_form();
			}
		}
		return $output;
	}

	$text = pt_clean_text($post->post_content);

	if($excerpt_length < 0 || $text=='') {
		$output = $text;
	} else {
	
		if(!$no_more && strpos($text, '<!--more-->')) {
			$text = explode('<!--more-->', $text, 2);
			$l = count($text[0]);
			$more_link = 1;
		} else {
			$text = explode(' ', $text);
			if(count($text) > $excerpt_length) {
				$l = $excerpt_length;
				$ellipsis = 1;
			} else {
				$l = count($text);
				$more_link_text = '';
				$ellipsis = 0;
			}
		}
		for ($i=0; $i<$l; $i++)	$output .= $text[$i] . ' ';
	}

	$output = rtrim($output, "\s\n\t\r\0\x0B");
	$output .= ($ellipsis) ? '...' : '';

	return $output;
}
/****************************************************************/
/*
/****************************************************************/
function get_the_excerpt_revisited($excerpt_length=120, $more_link_text="...", $no_semiologic=false, $showdots=true, $more_tag='div', $no_more=false) {
	global $post;
	$ellipsis = 0;
	$output = '';

	// if there's a password, return there.
	if (!empty($post->post_password)) {

		if ($_COOKIE['wp-postpass_'.COOKIEHASH] != $post->post_password) { // and it doesn't match cookie
			// if this runs in a feed
			if(is_feed())
				$output = __('There is no excerpt because this is a protected post.');
			else
				$output = get_the_password_form();
		}
		return $output;
	}

	$output = excerpt_revisited($post->post_content, $excerpt_length, get_permalink($post->ID), $more_link_text, $no_semiologic, $showdots, $more_tag, $no_more);

	return $output;
}
/****************************************************************/
/*
/****************************************************************/
function excerpt_revisited($content, $excerpt_length=120, $link='#', $more_link_text="...", $no_semiologic=false, $showdots=true, $more_tag='div', $no_more=false) {
	$ellipsis = 0;
	$output = '';

	$text = pt_clean_text($content, $no_semiologic);

	if($excerpt_length < 0 || $text=='') {
		$output = $text;
	} else {
		if(!$no_more && strpos($text, '<!--more-->')){
		
			$text = explode('<!--more-->', $text, 2);
			$l = count($text[0]);
			$more_link = 1;
		} else {
			$text = explode(' ', $text);
			if(count($text) > $excerpt_length) {
				$l = $excerpt_length;
				$ellipsis = 1;
			} else {
				$l = count($text);
				$more_link_text = '';
				$ellipsis = 0;
			}
		}
		for ($i=0; $i<$l; $i++)	$output .= $text[$i] . ' ';
	}

	switch($more_tag) {
		case('div') :
			$tag = 'div';
		break;
		case('span') :
			$tag = 'span';
		break;
		case('p') :
			$tag = 'p';
		break;
		default :
			$tag = 'span';
	}

	$output = rtrim($output, "\s\n\t\r\0\x0B");
	$output .= ($showdots && $ellipsis) ? '...' : '';

	if ($more_link_text != '')
		$output .= ' <' . $tag . ' class="more-link"><a href="'. $link . '" title="' . $more_link_text . '">' . $more_link_text . '</a></' . $tag . '>' . "\n";

	return $output;
}
/****************************************************************/
/* Return a string cleaned of annoying '\'
/****************************************************************/
function str_clean ($item)
{
	return str_replace(array("\`", "\'", '\"'), array("`", "'", '"'), $item);
}
/****************************************************************/
/* Returns a formatted url for inframe display
/****************************************************************/
function pt_return_get ($url, $if=1) {

	$look_get = strpos($url,'?');
	$end_char = substr($url, -1, 1);
	if ($end_char == '/') $url_inframe = substr($url, 0, strlen($url)-1); else $url_inframe = $url;
	if ($look_get !== false) $url_inframe .= "&amp;inframe=".$if; else $url_inframe .= "?inframe=".$if;
	return $url_inframe;
}
/*******************************************************************************/
/* Change relative url to absolute
/*******************************************************************************/
function NormalizeURL($url) {
	
	// Test if url is absolute
	if ( stristr( $url, 'http://' )) return $url;
	
	$siteurlparsed = parse_url(SITEURL);
	$host = $siteurlparsed['scheme'].'://'.$siteurlparsed['host'];
	// If http not in url, assumes relative address to blog url
	return canonicalize($host.$url);
	
}

/*##############################################################*/
/* Youtube functions
/*	- GetUserYoutubeVideo   Return user video feed
/*	- GetSingleYoutubeVideo	Return single video
/*##############################################################*/

/****************************************************************/
/* Return Youtube User video
/****************************************************************/
function GetUserYoutubeVideo($youtube_user, $num=5) {
	if ($youtube_user=='') return;
	$url = 'http://gdata.youtube.com/feeds/api/users/'.$youtube_user.'/uploads?orderby=updated&start-index=1&max-results='.$num;
	$ytb = ParseYoutubeDetails(GetYoutubePage($url), false);
	if ($num == 1) return $ytb[0];
	return $ytb;
}
/****************************************************************/
/* Return Youtube single video
/****************************************************************/
function GetSingleYoutubeVideo($youtube_media) {
	if ($youtube_media=='') return;
	$url = 'http://gdata.youtube.com/feeds/api/videos/'.$youtube_media;
	$ytb = ParseYoutubeDetails(GetYoutubePage($url));
	return $ytb[0];
}
/****************************************************************/
/* Parse xml from Youtube
/****************************************************************/
function ParseYoutubeDetails($ytVideoXML, $show=false) {

	// Create parser, fill it with xml then delete it
	$yt_xml_parser = xml_parser_create();
	xml_parse_into_struct($yt_xml_parser, $ytVideoXML, $yt_vals);
	xml_parser_free($yt_xml_parser);
	
	// Init individual entry array and list array
	$yt_video = array();
	$yt_vidlist = array();

	// is_entry tests if an entry is processing
	$is_entry = true;
	// is_author tests if an author tag is processing
	$is_author = false;
	foreach ($yt_vals as $yt_elem) :

		// If no entry is being processed and tag is not start of entry, skip tag
		if (!$is_entry && $yt_elem['tag'] != 'ENTRY') continue;

		// Processed tag
		switch ($yt_elem['tag']) :
			case 'ENTRY' :
				if ($yt_elem['type'] == 'open') {
					$is_entry = true;
                                        $yt_video = array();
				} else {
					$yt_vidlist[] = $yt_video;
					$is_entry = false;
				}
			break;
			case 'ID' :
				$yt_video['id'] = substr($yt_elem['value'],-11);
				$yt_video['link'] = $yt_elem['value'];
			break;
			case 'PUBLISHED' :
				$yt_video['published'] = substr($yt_elem['value'],0,10).' '.substr($yt_elem['value'],11,8);
			break;
			case 'UPDATED' :
				$yt_video['updated'] = substr($yt_elem['value'],0,10).' '.substr($yt_elem['value'],11,8);
			break;
			case 'MEDIA:TITLE' :
				$yt_video['title'] = $yt_elem['value'];
			break;
			case 'MEDIA:KEYWORDS' :
				$yt_video['tags'] = $yt_elem['value'];
			break;
			case 'MEDIA:DESCRIPTION' :
				$yt_video['description'] = $yt_elem['value'];
			break;
			case 'MEDIA:CATEGORY' :
				$yt_video['category'] = $yt_elem['value'];
			break;
			case 'YT:DURATION' :
				$yt_video['duration'] = $yt_elem['attributes'];
			break;
			case 'MEDIA:THUMBNAIL' :
				if ($yt_elem['attributes']['HEIGHT'] == 240) {
					$yt_video['thumbnail'] = $yt_elem['attributes'];
					$yt_video['thumbnail_url'] = $yt_elem['attributes']['URL'];
				}
			break;
			case 'YT:STATISTICS' :
				$yt_video['viewed'] = $yt_elem['attributes']['VIEWCOUNT'];
			break;
			case 'GD:RATING' :
				$yt_video['rating'] = $yt_elem['attributes'];
			break;
			case 'AUTHOR' :
				$is_author = ($yt_elem['type'] == 'open');
			break;
			case 'NAME' :
				if ($is_author) $yt_video['author_name'] = $yt_elem['value'];
			break;
			case 'URI' :
				if ($is_author) $yt_video['author_uri'] = $yt_elem['value'];
			break;
			default :
		endswitch;
  	endforeach;
  	unset($yt_vals);
  
	return $yt_vidlist;
}
/****************************************************************/
/* Returns content of a remote page
/* Still need to do it without curl
/****************************************************************/
function GetYoutubePage($url) {

	// Try to use curl first
	if (function_exists('curl_init')) {
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		$xml = curl_exec ($ch);
		curl_close ($ch);
	}
	// If not found, try to use file_get_contents (requires php > 4.3.0 and allow_url_fopen)
	else {
		$xml = file_get_contents($url);
	}
	
	return $xml;
}
/****************************************************************/
/* Gets options. Sets minimum options to operate before first validation.
/****************************************************************/
function pt_GetStarterOptions() {

	// Init parameters
	$up = UPLOAD_PATH;
	$pa = parse_url(SITEURL);
	$path = substr($pa['path'], 1, strlen($pa['path'])-1);
	
	$dn = str_replace($pa['path'],"",SITEURL);
	$bp = str_replace($pa['path'],"",str_replace( "\\", "/",ABSPATH));
	$bp = substr($bp, 0, strlen($bp)-1);
	$def = $path.'/wp-content/plugins/'. PT_PLUGIN_BASENAME.'/images/default.png';
	
	$settings = get_option('post_thumbnail_settings');

	if ($settings['append'] == '') 		$settings['append'] = 'false';
	if ($settings['append_text'] == '') 	$settings['append_text'] = 'thumb_';
	if ($settings['base_path'] == '') 	$settings['base_path'] = $bp;
	if ($settings['default_image'] == '') 	$settings['default_image'] = $def;
	if ($settings['folder_name'] == '') 	$settings['folder_name'] = $path.'/'.$up.'/pth';
	if ($settings['full_domain_name'] == '')$settings['full_domain_name'] = str_replace( "\\", "/",$dn);

	if ($settings['tb_use'] == '') 		$settings['tb_use'] = 'false';
	if ($settings['hs_use'] == '') 		$settings['hs_use'] = 'false';

	$settings['jpg_rate'] 			= ptr_test_setting($settings['jpg_rate'], '75', 100);
	if ($settings['keep_ratio'] == '') 	$settings['keep_ratio'] = 'true';
	$settings['png_rate'] 			= ptr_test_setting($settings['png_rate'], '6', 9);

	$settings['resize_width'] 		= ptr_test_setting($settings['resize_width'], '60');
	$settings['resize_height'] 		= ptr_test_setting($settings['resize_height'], '60');

	if ($settings['rounded'] == '') 	$settings['rounded'] = 'false';
	if ($settings['stream_check'] == '') 	$settings['stream_check'] = 'false';

	if ($settings['unsharp'] == '') 	$settings['unsharp'] = 'false';

	if ($settings['use_catname'] == '') 	$settings['use_catname'] = 'false';
	if ($settings['use_meta'] == '') 	$settings['use_meta'] = 'true';
	if ($settings['use_png'] == '') 	$settings['use_png'] = 'false';

	if ($settings['video_default'] == '') 	$settings['video_default'] = $def;
	if ($settings['pt_replace'] == '') 	$settings['pt_replace'] = 'false';

	return $settings;
}
/***********************************************************************************/
/* Valids a numeric number vs a default value
/***********************************************************************************/
function ptr_test_setting($option, $default, $max = 0) {

	$option = trim($option);
	if (!is_numeric($option) || ($option > $max && $max <> 0 ))

		return $default;
	else
		return $option;
}
/***********************************************************************************/
/* Simple check of flv-ness of a file
/***********************************************************************************/
function pt_is_flv ($file) {
	return (stripos($file, '.flv') !== false);
}
function has_to_be_loaded() {

	$uri = $_SERVER['REQUEST_URI'];
	$self = $_SERVER['PHP_SELF'];
	
	if (stripos($uri, 'deactivate') !== false) return false;
	if (stripos($self, 'edit') !== false) return true;
	if (stripos($uri, 'delete') !== false) return true;
	if (stripos($self, 'post') !== false) return true;
	if (stripos($self, 'option') !== false) return true;
	if (stripos($self, 'plugin') !== false && stripos($uri, 'activate') !== false) return true;
	
	return true;
}
/***********************************************************************************/
/* function for php4
/***********************************************************************************/
if (!function_exists('stripos')) {
	function stripos($str, $mix) { 
		return strpos(strtolower($str), strtolower($mix));
	}
}
if (!function_exists('file_put_contents')) {
	define('FILE_APPEND', 1);
	function file_put_contents($n, $d, $flag = false) {
		$mode = ($flag == FILE_APPEND || strtoupper($flag) == 'FILE_APPEND') ? 'a' : 'w';
		$f = @fopen($n, $mode);
		if ($f === false) {
			return false;
		} else {
			if (is_array($d)) $d = implode($d);
			$bytes_written = fwrite($f, $d);
			fclose($f);
			return $bytes_written;
		}
	}
}
if( !function_exists('memory_get_usage') ) {
	function memory_get_usage() {

		//If its Windows
		//Tested on Win XP Pro SP2. Should work on Win 2003 Server too
		//Doesn't work for 2000
		//If you need it to work for 2000 look at http://us2.php.net/manual/en/function.memory-get-usage.php#54642
		if ( substr(PHP_OS,0,3) == 'WIN') {
			if ( substr( PHP_OS, 0, 3 ) == 'WIN' ) {
				$output = array();
				exec( 'tasklist /FI "PID eq ' . getmypid() . '" /FO LIST', $output );
        
				return preg_replace( '/[\D]/', '', $output[5] ) * 1024;
			}
		} else {

			//We now assume the OS is UNIX
			//Tested on Mac OS X 10.4.6 and Linux Red Hat Enterprise 4
			//This should work on most UNIX systems
			$pid = getmypid();

			// exec("ps -o rss -p $pid", $output);   // Uncomment this line for  MAC OS X 10.4 (Intel)
			exec("ps -eo%mem,rss,pid | grep $pid", $output); // Comment this line for MAC OS X 10.4 (Intel)
			$output = explode("  ", $output[0]);

			//rss is given in 1024 byte units
			return $output[1] * 1024;
		}
	}
} 
/***********************************************************************************/
/* load cache file - timeout in minutes
/***********************************************************************************/
function pt_load_cache($filename, $dirname, $timeout=0) {
		
	if (!file_exists($dirname.$filename)) return false;

	// Test if cache has expired
	$diff = (time() - filemtime($dirname.$filename))/60;
	if ($diff >= $timeout && $timeout != 0) return false;
		
	// Read content from cache file.
	$content = file_get_contents($dirname.$filename);
		
	if ($content === false) return false;

	return unserialize($content);
		
}
/***********************************************************************************
	save cache file
***********************************************************************************/
function pt_save_cache($filename, $dirname, $content) {

	$content = serialize($content);

	if (!is_dir($dirname)) {
		$old_umask = umask(0);
		@mkdir($dirname, 0777);
		umask($old_umask);
		if (!is_dir($dirname)) return false;
	}

	// Writes content from cache file.
	$content = file_put_contents($dirname.$filename, $content);

}
/***********************************************************************************
	For WP below 2.1
***********************************************************************************/
if (!function_exists('sanitize_file_name')) {
	function sanitize_file_name( $name ) { // Like sanitize_title, but with periods
		$name = strtolower( $name );
		$name = preg_replace('/&.+?;/', '', $name); // kill entities
		$name = str_replace( '_', '-', $name );
		$name = preg_replace('/[^a-z0-9\s-.]/', '', $name);
		$name = preg_replace('/\s+/', '-', $name);
		$name = preg_replace('|-+|', '-', $name);
		$name = trim($name, '-');
		return $name;
	}
}
?>