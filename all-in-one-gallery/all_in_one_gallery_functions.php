<?php

/*Plugin: All-in-One-Gallery*/
/*Content: Functions */
/*Author: Thomas Michalak aka TM*/
/*Author URI: http://www.fuck-dance-lets-art.com*/

/* my base path to the files */
define('BASE', dirname(__FILE__));

function allInOneGalleryWebsiteURL(){
	$v = get_bloginfo('url');
	return $v;
}

function allInOneGalleryPath(){
		$v = BASE;
		return $v;
}
function allInOneGalleryURLDirect(){
		$v = '/wp-content/plugins/all-in-one-gallery';
		return $v;
}
function allInOneGalleryURL(){
		$v = allInOneGalleryWebsiteURL().allInOneGalleryURLDirect();
		return $v;
}

function allInOneGalleryDebug($val){
	printf("<pre>%s</pre>", print_r($val, true));
}

?>