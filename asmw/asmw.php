<?php
/*
Plugin Name: ASMW
Plugin URI: http://amiest.musicwednesday.com/the-code
Description: Use [song url] to incert the ASMW player in your blog post.
Version: 3.2.4
Date: March 18, 2009
Author: Mouseclone
Author URI: http://mouseclone.com
*/




/* Player */

function player($text) {
	$asmw_songid_pat = '/(\[http:\/\/(.*)amiestreet(.*).mp3\])/';

    if(preg_match($asmw_songid_pat, $text, $matches)){
		$songid = str_replace('[http://amiestreet.com/stream/song/','',$matches[1]);
    	$songid = str_replace('.mp3]','',$songid);
	}

	$asmw_player = '<div style="text-align:center;margin:0;border:0;padding:0;width:100%;">Brought to you by: <a href="http://amiest.musicwednesday.com">#ASMW</a> <a href="http://amiest.musicwednesday.com/uber-tracker">Uber Tracker</a><br /><embed height="55px" width="100%" name="plugin" src="http://amiestreet.com/static/swf/AsmwPlayer.swf?songId=' . $songid . '&pytr=asmw" type="application/x-shockwave-flash"/></div>';

        if (preg_match($asmw_songid_pat, $text, $matches)) {
                $text = preg_replace($asmw_songid_pat, $asmw_player, $text);
        }

	return $text;
	}
	
/* Links */

	function asmw_links($str)
	{
		// find the url
		$matches = array();
		preg_match('`"http://[-_a-z0-9.]*amiestreet.com[^"]*"`',$str,$matches);
		
		// loop through the matches
		if(count($matches) > 0) {
			foreach($matches as $k=>$v)
			{
				$replace = '';
				if(strpos($v,'?'))
				{
					$replace = substr($v,0,strlen($v)-1).'&pytr=asmw"';
				}else{
					$replace = substr($v,0,strlen($v)-1).'?pytr=asmw"';
				}
				if(!empty($replace))
				{
					$str = str_replace($v,$replace,$str);
				}
			}
		}
		
		// return the replaced string
		return $str;
	}


add_filter('content_save_pre', 'player');
?>
