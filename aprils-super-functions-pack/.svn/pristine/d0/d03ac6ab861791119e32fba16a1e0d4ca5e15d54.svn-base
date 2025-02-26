<?php

/*
 * USEFUL FUNCTIONS FOR USE IN THEME/TEMPLATE FILES * * * * * * * * * * * * * *
 */

// returns a string with the path to the post's or page's image
// ( used only on search results so far. 70x70 size hard-coded )
function asfp_get_image($postid,$size='thumbnail',$class='',$format='imgtag') {
	$image_url = '';
	
	if (function_exists('has_post_thumbnail')) {
		if (has_post_thumbnail($postid)) {
			$image_id = get_post_thumbnail_id($postid);
			$image_url = wp_get_attachment_image_src($image_id,$size);
			$image_url = $image_url[0];
		}
	}

	if (empty($image_url)) {
	    $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent='.$postid );
	    if ($arrImages) {
	        // Get array keys representing attached image numbers
	        $arrKeys = array_keys($arrImages);
	        // Get the first image attachment
	        $iNum = $arrKeys[0];
	        // return the url for the attachment
	        $imginfo = wp_get_attachment_image_src($iNum,$size);
	        $image_url = $imginfo[0];
		} 
	}
	
	if (!empty($image_url)) {
		switch($format) {
			case 'url':
				$str = $image_url;
				break;
			default:
				$str = '<img src="'.$image_url.'" class="'.$class.'" width="70" height="70" />';
		}
		return $str;
	}
}

// prints out a list of the current page's children or siblings in a widget div
function asfp_subpages_nav($args=null) {
	parse_str($args,$arg); // link_heading
	if (isset($arg['depth'])) $depth = $arg['depth'];
	else $depth = 2;
	if (isset($arg['echo'])) $echo = $arg['echo'];
	else $echo = true;
	if (isset($arg['widget_class'])) $widget_class = $arg['widget_class'];
	else $widget_class = true;
	global $post;
	
	if (is_page() && !is_404() && !is_search() && !is_front_page()) {
		// If CHILD_OF is not NULL, then this page has a parent
		// Therefore, list siblings i.e. subpages of this page's parent
		if ($post->post_parent)
		    $thelist = wp_list_pages('echo=0&title_li=&depth='.$depth.'&sort_column=menu_order&child_of='.asfp_get_ancestor());
		// If CHILD_OF is zero, this is a top level page, so list subpages only.
		else
		    $thelist = wp_list_pages('echo=0&title_li=&depth=2&sort_column=menu_order&child_of='.$post->ID);
		if (!empty($thelist)) {
			if ($post->post_parent) {
				$sectitle = get_the_title(asfp_get_ancestor());
				$securl = get_permalink(asfp_get_ancestor());
			} else {
				$sectitle = get_the_title($post->ID); 
				$securl = get_permalink($post->ID);
			} 
			
			$out = '';
			$out .= '<div class="';
			if ($widget_class) $out .= 'widget ';
			$out .= 'asfp_subpages_nav">';
			$out .= '<h3>';
			if (isset($arg['link_heading'])) $out .= '<a href="'.$securl.'">'; 
			$out .= $sectitle; 
			if (isset($arg['link_heading'])) $out .= '</a>';
			$out .= '</h3>';
			$out .= '<div class="asfp_nav_box"><ul>';
			$out .= $thelist;
			$out .= '</ul></div><div class="clr"></div></div>';
			
			if ($echo) echo $out;
			else return $out;
		}
	}
}

/*
 * asfp_get_latest_tweet()
 * gets the most recent tweet from user's timeline
 * @param string username
 * @returns string
 */

function asfp_get_latest_tweet($username) {
	$path = 'http://twitter.com/statuses/user_timeline/'.$username.'.json?count=1';
	$path = 'https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name='.$username.'&count=1';
	$jason = file_get_contents($path);
	$arr = json_decode($jason);
	$object = get_object_vars($arr[0]);
	return make_clickable($object['text']);
}

/*
 * USED BY THE FUNCTIONS ABOVE * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
 
// returns the page id of the parent, grandparent, or great-grandparent of the current page
function asfp_get_ancestor() {
	global $post;
	if ($post->post_parent) {
		$ancestor = get_posts('post_type=page&include='.$post->post_parent);
		if ($ancestor[0]->post_parent) {
			$ancestor2 = get_posts('post_type=page&include='.$ancestor[0]->post_parent);
			if ($ancestor2[0]->post_parent) return $ancestor2[0]->post_parent;
			else return $ancestor[0]->post_parent;
		}
		else return $post->post_parent;
	} else return false;
}


/*
 *	NOT TEMPLATE FUNCTIONS * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

// Used by document types feature
function asfp_doctypes_regex($text) {
	$types = get_option('asfp_doctypes_list');
	$types = preg_replace('/,[ ]*/i','|',$types);
	// add the class to links
	$text = preg_replace('/href=([\'|"][[a-z0-9]|[\.\-\_]]*)\.('.$types.')([\'|"])/i','href=\\1.\\2\\3 class="link \\2"',$text);
	// remove the class from links followed directly by an image tag
	$text = preg_replace('/(<a[^>]+)class="link [^"]+"([^>]*>)<img/i','\\1\\2<img',$text);
	return $text;
}

// Used by facebook meta information feature
function asfp_fb_to_head() {
	global $post;
	
	// figure out image URL
	if (get_option('asfp_fbmeta_img') != null) $defaultimg = get_option('asfp_fbmeta_img');
	else $defaultimg = '';
	$postimg = asfp_get_image($post->ID,'thumbnail','','url');
	if (empty($postimg)) $postimg = $defaultimg;
	if (is_single() || is_page()) $fb_thumb = $postimg; 
	else $fb_thumb = $defaultimg;

	// figure out excerpt/description
	global $post;
	setup_postdata($post);
	$description = get_bloginfo('description');
	$excerpt = strip_tags(get_the_excerpt());
	if (empty($excerpt)) $excerpt = $description;
	?>

	<!-- Facebook Meta Tags -->
	<meta property="og:site_name" content="<?php echo get_bloginfo('name') ?>"/>
	<meta property="og:title" content="<?php if (is_single() || is_page()) echo $post->post_title.' &raquo; '; echo get_bloginfo('name') ?>"/>
	<meta property="og:description" content="<?php if (is_single() || is_page()) echo $excerpt; else echo get_bloginfo('description') ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="<?php echo 'http://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]; ?> "/>
	<?php if ( !empty($fb_thumb) ): ?><meta property="og:image" content="<?php echo $fb_thumb ?>"/><?php
	endif;
	echo "\n\n";
}
?>