<?php

function byrev_gallery_cache($id, $instance, &$output)  {
		switch (_GALLERY_CACHE_MODE) {
		    case 'mysql':
		        //
		        break;
		        
		    case 'disk':
		        return byrev_gallery_cache_disk($id, $instance, $output);
		        break;
		        
		    case 'auto':
		        //
		        break;
		}	
	return false;	
}

function byrev_gallery_write_cache(&$output)  {
		switch (_GALLERY_CACHE_MODE) {
		    case 'mysql':
		        // 
		        break;
		        
		    case 'disk':
		        return byrev_gallery_wite_cache_disk($output);
		        break;
		        
		    case 'auto':
		        //
		        break;
		}		
}

#================DISK==================================================================================================
function byrev_gallery_cache_hash_disk($id, $instance) {
	$hash = md5($id.'-'.$instance.'-'._IMAGE_IN_PAGE.'-'.__PAGE_ALBUM);
	$hash_file = $hash.'.gcache';
	$dir_cache = dirname( __FILE__).'/cache/'.$hash[1].'/'.$hash[2];
	$cache_file = $dir_cache.'/'.$hash_file;
	
	return array(
		'md5' => $hash,
		'hash-file' => $hash_file,
		'cache-file' =>$cache_file,
		'cache-dir'=> $dir_cache
	);
}

function byrev_gallery_cache_disk($id, $instance, &$output) {
	$hash =  byrev_gallery_cache_hash_disk($id, $instance);
	$cache_file = $hash['cache-file'];
	
	$filemtime = @filemtime($cache_file); 
	if (!$filemtime or (time() - $filemtime >= _GALLERY_CACHE_EXPIRATION)){	
		$GLOBALS['byev_gallery_cache'] = $hash;		
		return false;
	} else {
		$output = file_get_contents($cache_file).'<!-- ByREV Gallery Disk-Cache -->';
		return true;
	}	
}

function byrev_gallery_wite_cache_disk(&$output) {
	if (isset($GLOBALS['byev_gallery_cache'])) {
		$hash = &$GLOBALS['byev_gallery_cache'];				
		
		if (!is_dir($hash['cache-dir'])) mkdir($hash['cache-dir'], 0777, true);	
			
		$result = file_put_contents($hash['cache-file'], $output);
		if ($result) unset($GLOBALS['byev_gallery_cache']);
		return $result;	
	} else {
		return false;
	}
}

#================MYSQL=================================================================================================
function byrev_gallery_cache_mysql() {

}

#================AUTO=================================================================================================
function byrev_gallery_cache_auto() {

}

?>