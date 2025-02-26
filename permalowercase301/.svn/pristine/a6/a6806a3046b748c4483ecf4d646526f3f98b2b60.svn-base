<?php
/*
Plugin Name: permaLowercase301
Plugin URI: http://www.vizioninteractive.com/
Description: A plugin to convert WordPress URLs entered which contain Uppercase letters and 301 redirect them to the correct Lowercase URL. The Query String (?) and Fragment (#) remain untouched and are included in the new URL.
Version: 1.1
Author: Vizion Interactive, Inc.
Author URI: http://www.vizioninteractive.com/
*/
function permaLowercase301()
	{
		$link = "http".(($_SERVER['HTTPS']=="on"||$_SERVER['HTTPS'])?'s':'')."://".$_SERVER['HTTP_HOST'];
		$fullurl = $link.$_SERVER['REQUEST_URI'];
		$exp = parse_url($fullurl);
		if(preg_match('/[A-Z]/',$exp['path']))
			{
				$url = strtolower($exp['path']);
				if($url!=$exp['path'])
					{
						$redirect = $link.$url.((isset($exp['query'])&&!empty($exp['query']))?'?'.$exp['query']:'').((isset($exp['fragment'])&&!empty($exp['fragment']))?'#'.$exp['fragment']:'');
						if(function_exists('status_header')){status_header(301);}
						header("HTTP/1.0 301 Moved Permanently");
						header("Location: ".$redirect);
					}
			}
	}
add_action('template_redirect','permaLowercase301');
?>