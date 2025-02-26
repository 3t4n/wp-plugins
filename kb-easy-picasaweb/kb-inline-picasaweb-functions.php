<?php

// set a few definitions that we'll use on every link that this plugin filters:

// set max image size
if (!defined(KB_INLINEPICASA_MAXSIZE)){	// NOTE: Can be plugged by another plugin if desired, hence this wrapper.
	$kb_inlinePicasa_maxsize = (int) get_option( KB_INLINEPICASA_OPTION . 'maxsize' );
	$kb_inlinePicasa_valid = array(32, 48, 64, 72, 94, 110, 128, 144, 160, 200, 288, 320, 400, 512, 576, 640, 720, 800, 912, 1024, 1152, 1280, 1440, 1600 );
	if (!in_array($kb_inlinePicasa_maxsize, $kb_inlinePicasa_valid))
		$kb_inlinePicasa_maxsize = 400; // default
	define('KB_INLINEPICASA_MAXSIZE', apply_filters('KB_INLINEPICASA_MAXSIZE',$kb_inlinePicasa_maxsize) ); // pluggable here, too
}

// set cache time. How long do we cache information about an album's photos and captions before querying google again?
if (!defined(KB_INLINEPICASA_CACHETIME)){	// NOTE: Can be plugged by another plugin if desired, hence this wrapper.
	$kb_inlinePicasa_cachetime = (int) get_option( KB_INLINEPICASA_OPTION . 'cachetime' );
	if (!$kb_inlinePicasa_cachetime)
		$kb_inlinePicasa_cachetime = 604800; // 1 week (604800 seconds) by default, unless overridden
	define('KB_INLINEPICASA_CACHETIME', $kb_inlinePicasa_cachetime);
}

// set time of last options update
if (!defined(KB_INLINEPICASA_UPDATE)){	// NOTE: Can be plugged by another plugin if desired, hence this wrapper.
	$kb_inlinePicasa_update = (int) get_option( KB_INLINEPICASA_OPTION . 'update' ); // holds timestamp of last change to plugin's options.
	define('KB_INLINEPICASA_UPDATE', $kb_inlinePicasa_update);
}



// our primary callback function
function kb_inlinePicasa_display($match){
	// $match[0] holds the entire matched phrase. We'll return it if we cannot parse as needed.
	// $match[1] and $match[5] hold any additional attributes other than href (rel, title, style, onclick, etc) that may have been specified.
	// $match[2] holds the TLD e.g. google.COM, google.DK, google.UK
	// $match[3] holds the user name
	// $match[4] holds the requested album name as well as the ?authkey= if it exists.
	// $match[5] is like $match[1]
	// $match[6] holds the link text--we'll use this as an album title
	
	// is there a bookmark (starting with #) on the end of the URL?
	if ( $bk = strpos($match[4],'#') ){
		if ( $bk < strlen($match[4]) - 1 ) // this is a real bookmark, something like .../photo#41432819281
			return $match[0]; // do nothing.
		else // there's just a stray # at the end of the URL; kill it.
			$match[4] = substr( $match[4], 0, -1 );
		unset( $bk );
	}

	// look for an "authkey" parameter
	if ( $authkey_pos = strpos( $match[4], '?authkey=' ) ){
		$authkey = substr( $match[4], ( $authkey_pos+strlen('?authkey=') ) ); // grab the authkey
		$match[4] = substr( $match[4], 0, $authkey_pos );
	}else{
		$authkey = '';
	}

	
	// check that we've got a username, album, and link text
	if (!$match[2] || !$match[3] || !$match[4] || !$match[6])
		return $match[0];
	// now, check that rel="noDisplay" wasn't specified:
	if (preg_match('~rel=["\'][^"\']*noDisplay[^"\']*["\']~', $match[1].$match[5]))
		return $match[0];

	$user = $match[3];
	$album = $match[4];
	$url = 'http://picasaweb.google.'.$match[2].'/'.$user.'/'.$album;	// for saving our data

	// prepare options names
	$md5 = md5($url);
	$content_option = KB_INLINEPICASA_OPTION . $md5 . apply_filters('kb_inlinepicasa_contentoption','');	// holds data about album's contents. Plugins can modify if needed.
	$time_option = $content_option . '_ts';	// holds time stamp from last update

	$last_update = (int) get_option( $time_option );	// to 0 if false
	$last_plugin_update = KB_INLINEPICASA_UPDATE;

	if ($last_plugin_update > $last_update)	// if plugin's options have been updated, we want to force a flush of the cache.
		$last_update = false;
	
	$now = time();
	
	if ( !$last_update   ||   ($now - $last_update) > KB_INLINEPICASA_CACHETIME )	// content is outdated or has yet to be fetched.
		$content = kb_inlinePicasa_fetch( $user, $album, $authkey );
	elseif ( !($content = get_option( $content_option )) )	// get content from cache--should never fail, but just in case, let's check
		$content = kb_inlinePicasa_fetch( $user, $album, $authkey );
	else	// if we're here, then we successfully set $content using get_option( $content_option ) -- everything is good
		$noUpdate = true;

	if (!is_array($content) || empty($content))	// oops! $content doesn't hold what it ought to
		return $match[0];	// don't do nuthin'

	// do we need to update our options?
	if (!$noUpdate){	// update our options
		update_option( $time_option, $now, 'Timestamp for album "'.$album.'"', 'no' );	// update cache's timestamp
		update_option( $content_option, $content, 'Cache of album "'.$album.'"', 'no' );	// update cache
	}
	
	// display options. See root plugin file for list of what might be in here.
	global $kb_inlinePicasa_opts;
	if (!$kb_inlinePicasa_opts)
		$kb_inlinePicasa_opts = get_option( KB_INLINEPICASA_OPTION . 'other' );
	if (!$kb_inlinePicasa_opts){
		global $kb_inlinePicasa_defaults;
		$kb_inlinePicasa_opts = $kb_inlinePicasa_defaults;
	}

	$out = '<div class="kb-inlinePicasa">';

	$albumMeta = $content['meta'];
	unset($content['meta']);	// lest we screw up our loop, below

	if ('http'==substr($match[6],0,4))
		$title = $albumMeta['title'];	// if link text is the URL, use the (feed's) album name instead of link text in the h3 tags
	else 
		$title = $match[6];	// otherwise, use link text

	if ($kb_inlinePicasa_opts['linktitles'] && !$authkey)
		$out .= '<h3><a href="'.$url.'">'.$title.'</a></h3>';
	else
		$out .= '<h3>'.$title.'</h3>';

	if ($kb_inlinePicasa_opts['linkpics'] && !$authkey)
		$endlink = '</a>';
	
	// external plugins can insert text between the heading and the photos
	$out .= apply_filters( 'kb_inlinepicasa_beforepics', '' );

	if ($kb_inlinePicasa_opts['twocolumn'])
		$out .= '<table class="kb-inlinePicasa-table">';

	$odd = 'alt';
	
	if ( isset( $kb_inlinePicasa_opts['numpics'] ) && 1 <= $kb_inlinePicasa_opts['numpics'] )
		$content = array_slice( $content, 0, $kb_inlinePicasa_opts['numpics'] );

	// loop through photos
	foreach ($content as $photo){
		$photo = apply_filters( 'kb_inlinepicasa_photoprops', $photo );
		$alt = htmlspecialchars($photo['caption']);
		if (!$photo['caption'])
			$photo['caption'] = '&nbsp;';
		if (!$kb_inlinePicasa_opts['showcaptions'])
			$photo['caption'] = '';
		if ($endlink)
			$startlink = '<a href="'.$url.'/photo#'.$photo['id'].'" title="Click to enlarge. '.$alt.'">';
		if ($kb_inlinePicasa_opts['noWPCaption']){
			$pic = '
				<div class="kb-inlinePicasa-wrap '.$odd.'">
						<div class="kb-inlinePicasa-image">'.$startlink.'<img src="'.$photo['image'].'" alt="'.$alt.'" height="'.$photo['height'].'" width="'.$photo['width'].'" />'.$endlink.'</div>
						<div class="kb-inlinePicasa-caption">'.$photo['caption'].'</div>
				</div>
			';
		}else{
			$pic = '
				<div class="kb-inlinePicasa-wrap '.$odd.'" style="width:'.($photo['width']+10).'px">
					<div class="wp-caption">
						'.$startlink.'<img src="'.$photo['image'].'" alt="'.$alt.'" height="'.$photo['height'].'" width="'.$photo['width'].'" />'.$endlink.'
						<p class="kb-inlinePicasa-caption wp-caption-text">'.$photo['caption'].'</p>
					</div>
				</div>
			';
		}
		if ($kb_inlinePicasa_opts['twocolumn']){
			if ($odd)
				$out .= '<tr>';
			$out .= '
				<td class="'.$odd.'">
					'.$pic.'
				</td>
			';
			if (!$odd)
				$out .= '</tr>';
		}else{
			$out .= $pic;
		}
		$odd = ('alt'==$odd) ? '' : 'alt';
	}
	if ($kb_inlinePicasa_opts['twocolumn']){
		if (!$odd)
			$out .= '<td> </td></tr>';
		$out .= '</table>';
	}
	

	$out .= '</div>';
	
	$out .= '<div class="kb-inlinePicasa-end"></div>'; // if you apply floats to the images, then apply a clear:both; this this element.

	return $out;
}




// HTTP FUNCTION -- this function does the actual picasaweb queries. Don't call it directly--use the  display function instead, since it has caching built in.
// given a username and an album name/id, produces an array of the album's contents.
// note that $imagesize only takes a certain set of values. If you try an unallowed value, you'll get weird results
// this function was derived partly from http://code.google.com/p/picasawebphplibrary/
function kb_inlinePicasa_fetch($userName, $albumNameOrId, $authkey=false) {

	// prerequisites
	//if (!class_exists('domdocument') || !class_exists('domxpath'))
	//	return false;

	// construct url to album
	if (is_numeric($albumNameOrId))
		$url = 'http://picasaweb.google.com/data/feed/api/user/' .urlencode($userName) . '/albumid/' . urlencode($albumNameOrId);
	else
		$url = 'http://picasaweb.google.com/data/feed/api/user/' .urlencode($userName) . '/album/' . urlencode($albumNameOrId);

	// append image size option
	$url .= '?thumbsize='.KB_INLINEPICASA_MAXSIZE;
	
	// append authkey parameter (for private albums)
	if ( $authkey )
		$url .= '&authkey='.$authkey;
	
	$album = array();
	
	// request album data	
	// first, let's try wp_remote_fopen:
	$xml = wp_remote_fopen($url);	// will try file_get_contents or, if allow_url_fopen is off, looks for curl extension
	
	// check. wp_remote_fopen returns false if (1) $url is bad or (2) allow_url_fopen is off and curl is not installed. In case it's (2), let's try snoopy:
	if (false===$xml){
		if (!class_exists('Snoopy') && file_exists(ABSPATH . 'wp-includes/class-snoopy.php'))
			require_once(ABSPATH . 'wp-includes/class-snoopy.php');
		if (!class_exists('Snoopy'))	// in case !file_exists()
			return false;
		$snoopy = new Snoopy;
		$snoopy->fetch( $url );
		$xml = $snoopy->results;
	}
	if (!$xml)	// either snoopy failed too, or the $url is bad.
		return false;
	
	// get album title
	preg_match('~<title[^>]*>(.*)</title>~Usi', $xml, $m);
	$album['meta']['title'] = $m[1];
	
	// get photos
	preg_match_all('~<entry[^>]*>(.*)</entry>~Usi', $xml, $m);
	$m = $m[0];
	foreach($m as $p){	// loop through all the photos, grabbing the URL, width, height, and caption
		$photo = array();
		// image url, width, height:
		preg_match('~<media:thumbnail\s*url=(["\'])(.*)\1\s*height=(["\'])([0-9]*)\3\s*width=(["\'])([0-9]*)\5~Usi', $p, $pm);
		$photo['image'] = $pm[2];
		$photo['height'] = $pm[4];
		$photo['width'] = $pm[6];
		// image caption:
		preg_match('~<summary[^>]*>(.*)</summary>~Usi', $p, $pm);
		$photo['caption'] = $pm[1];
		// image id (for linking to image)
		preg_match('~<gphoto:id>(.*)</gphoto:id>~U', $p, $pm);
		$photo['id'] = $pm[1];
		$album[] = $photo;
	}
	return $album;
}

?>