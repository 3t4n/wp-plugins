<?php
//used for auto inlcusion of the dashboard files and add-ons
//it assumes that directories "dashboard" and "addons" do not have any subdirectories that contain files for inlcusion

if (!function_exists('ap_readdir')){
	function ap_readdir($dir,$sort='ASC'){
	
		$apfiles = array();
		
		//dashboard
		$h = opendir($dir);
		while (false !== ($fname = readdir($h))){
			$apfiles[] = $fname; 
		}
		closedir($h);
		
		//ensure all files are .php files
		$ifiles = array();
		foreach ($apfiles as $apfile){
			if(preg_match("/.php$/",$apfile)){
				$ifiles[] = $apfile;
			}
		}
		
		sort($ifiles);
		if  ($sort != 'ASC')
			rsort($ifiles);

		
		return $ifiles;
	}
}

//include the files
$ipath = dirname(__FILE__);
//addons
if (file_exists($ipath.'/addons')){
	$apfiles = ap_readdir($ipath.'/addons');
	foreach ($apfiles as $apfile){
		include_once('addons/'.$apfile);
	}
}
//dashboard
if (is_admin()){
	$apfiles = ap_readdir($ipath.'/dashboard');
	foreach ($apfiles as $apfile){
		include_once('dashboard/'.$apfile);
	}

}
//include files found in the AmberPanther root directory
$ipath = ABSPATH . 'ap-addons/ap-plugins';
if (file_exists($ipath)){
	$apfiles = ap_readdir($ipath);
	foreach ($apfiles as $apfile){
		include_once($ipath.'/'.$apfile);
	}
}

?>