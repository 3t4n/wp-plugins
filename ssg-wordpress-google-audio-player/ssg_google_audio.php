<?php
/*
Plugin Name: SSG Wordpress Google Audio Player
Plugin URI: http://sethelalouf.com/archives/72
Description: A slim, simple mp3 player plugin for Wordpress utilizing Google's free Flash Audio Player.
Author: Spacesuit Group Inc
Version: 1.5
Author URI: http://sethelalouf.com/
*/
 

function ssg_google_audio($content) {
	
	
	global $post;
	
	//
	// Get plugin options
	//
	$swf = get_option('ssg_gplayer-swf');
	$auto = get_option('ssg_gplayer-auto');
	$height = get_option('ssg_gplayer-height');
	if ($height ==''){
		$height='27';
	}
	$width = get_option('ssg_gplayer-width');
	if ($width ==''){
		$width='400';
	}
	$color = get_option('ssg_gplayer-bgcolor');
	if ($color ==''){
		$color='ffffff';
	}
	
	$css = get_option('ssg_gplayer-css');
	
	$autoplay = get_option('ssg_gplayer-autoplay');
	
	
	if($auto){
		//
		// Find all embedded .mp3 files if Auto Embedd is ON
		//
		preg_match_all('/<a href="([^"]*\.mp3)"[^>]*>(.*)<\/a>/Ui', $content, $dubQ, PREG_PATTERN_ORDER);
		preg_match_all('/<a href=\'([^"]*\.mp3)\'[^>]*>(.*)<\/a>/Ui', $content, $singQ, PREG_PATTERN_ORDER);
		preg_match_all('/\[gplayer href="([^"]*\.mp3)"[^>]*\](.*)\[\/gplayer\]/Ui', $content, $non_auto_dubQ, PREG_PATTERN_ORDER);
		preg_match_all('/\[gplayer href=\'([^"]*\.mp3)\'[^>]*\](.*)\[\/gplayer\]/Ui', $content, $non_auto_singQ, PREG_PATTERN_ORDER);
		
		$matches[0] = $dubQ;
		$matches[1] = $singQ;
		$matches[2] = $non_auto_dubQ;
		$matches[3] = $non_auto_sing;
		
		
		
		
		
		
		//print_r($MList);
		
	}else{
		//
		// Find all embedded .mp3 files if Auto Embedd is OFF
		// i.e. lets look for <gplayer href="http://example.com/test.mp3">EXAMPLE TITLE</gplayer>
		//
		preg_match_all('/\[gplayer href="([^"]*\.mp3)"[^>]*\](.*)\[\/gplayer\]/Ui', $content, $non_auto_dubQ, PREG_PATTERN_ORDER);
		preg_match_all('/\[gplayer href=\'([^"]*\.mp3)\'[^>]*\](.*)\[\/gplayer\]/Ui', $content, $non_auto_singQ, PREG_PATTERN_ORDER);
		$matches[0] = $non_auto_dubQ;
		$matches[1] = $non_auto_singQ;
	}
		
	foreach($matches as $key => $M){
			
			if ( !empty($M[0])){
			
				$MList[] = $M;
			}
		
		}
		
	
		//
		// Restructure array
		///
		if ( (sizeof($MList[0]) > 0) || (sizeof($MList[1]) > 0) || (sizeof($MList[2]) > 0) || (sizeof($MList[3]) > 0)   ){
			foreach ($MList as $match){
				foreach ($match[0] as $needle){
					$needles[] = $needle;
				}
				
				foreach ($match[1] as $href){
					$hrefs[] = $href;
				}
				
				foreach ($match[2] as $text){
					$texts[] = $text;
				}		
			}
		
			
		//
		// Replace each instance of mp3 anchor tags with the Google Audio Player
		//	using SWFObject 2.2
			
			for ($i=0; $i < sizeof($needles); $i++){
				if ( ! defined( 'WP_PLUGIN_URL' ) )
				  define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
	  			if ($autoplay == true){
					$ap= '&autoPlay=true';
				}else{
					$ap='';
				}
				$gplayer = '<script type="text/javascript">
									swfobject.registerObject("ssg_gplayer_object-'.$post->ID .'-'. $i.'", "9.0.0", "'.WP_PLUGIN_URL.'/ssg-wordpress-google-audio-player/swfobject/expressInstall.swf");
								</script>
								<div class="ssg-gplayer" style="width:'.$width.'px;">
								
								<span class="title">'. $texts[$i].'</span>
								
								<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'.$width.'" height="'.$height.'" id="ssg_gplayer_object-'.$post->ID.'-'.$i.'">
									<param name="movie" value="http://www.google.com/reader/ui/3523697345-audio-player.swf?audioUrl='.$hrefs[$i].$ap.'" />
									<!--[if !IE]>-->
									<object type="application/x-shockwave-flash" data="http://www.google.com/reader/ui/3523697345-audio-player.swf?audioUrl='.$hrefs[$i].$ap.'" width="'.$width.'" height="'.$height.'" id="ssg_gplayer_object-'.$post->ID.'-'.$i.'">
									<!--<![endif]-->
										<a href="http://www.adobe.com/go/getflashplayer">
											<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
										</a>
									<!--[if !IE]>-->
									</object>
									<!--<![endif]-->
								</object>
								
							</div>';
			
	
					
				$content = str_replace($needles[$i], $gplayer, $content);
			}
		
		}
		return $content;
		
	
}



function ssg_player_options() {
  add_options_page('SSG Google Audio Player Settings', 'SSG Google Audio Player', 8, 'ssg_gplayer', 'ssg_gplayer_options_page');
}

function ssg_gplayer_options_page() {
  echo '<div class="wrap">';
  echo '<h2>SSG Google Audio Player Options</h2>';
  
  	

  ?>
  
  
  <form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
    
    
    <h3>Google Player Settings</h3>
    <table class="form-table">
    
    <tr valign="top">
    <th scope="row">Player Width</th>
    <td><input type="text" name="ssg_gplayer-width" value="<?php echo get_option('ssg_gplayer-width'); ?>" size="4"/></td>
    </tr>
     
    <tr valign="top">
    <th scope="row">Player Height</th>
    <td><input type="text" name="ssg_gplayer-height" value="<?php echo get_option('ssg_gplayer-height'); ?>" size="4" /> (use 27 for an exact fit)</td>
    </tr>
    
     <tr valign="top">
    <th scope="row">Auto Start</th>
    <td><input type="checkbox" name="ssg_gplayer-autoplay" <?php if (get_option('ssg_gplayer-autoplay') =='on' ){ echo 'checked="checked"'; } ?> />Automatically start google audio player when page loads? Be careful to only enable this option if you know you will only have 1 google player (mp3) per page. </td>
    </tr>
    
    
     <tr valign="top">
    <th scope="row">Omit SWFObject in &lt;head&gt; section.</th>
    <td><input id="ssg_gplayer-swf" type="checkbox" name="ssg_gplayer-swf" <?php if (get_option('ssg_gplayer-swf') =='on' ){ echo 'checked="checked"'; } ?>  /> <strong>Omit swfObject</strong><p>If you are already inclduing <strong>swfobject.js</strong> then you can check this box to prevent redundancy.</p></td>
    </tr>
   
   
    <tr valign="top">
    <th scope="row">Use Default CSS<Br />
    </th>
    <td><input type="checkbox" name="ssg_gplayer-css" <?php if (get_option('ssg_gplayer-css') =='on' ){ echo 'checked="checked"'; } ?> /></td>
    </tr> 
    
    <tr valign="top">
    <th scope="row">Player Background Color<Br />
    <small>HEX color value</small>
    </th>
    <td>#<input type="text" name="ssg_gplayer-bgcolor" value="<?php echo get_option('ssg_gplayer-bgcolor'); ?>" size="8" /></td>
    </tr>
    </table>
    
    <h3>Auto Embedd</h3>
     <table class="form-table">

    <tr valign="top">
    <th scope="row">Enable <strong>Auto Embed</strong><br />
    </th>
    <td><label for="ssg_gplayer-auto"><input id="ssg_gplayer-auto" type="checkbox" name="ssg_gplayer-auto" <?php if (get_option('ssg_gplayer-auto') ){ echo 'checked="checked"'; } ?>  /> YES</label></td>
    </tr>
    
    </table>
         <div>

    <p>If <strong>Auto Embed</strong> is NOT enabled, then you must use the following shortcode in the body of your posts where you want the Google Audio Player to appear.<br />
    <div style="background:#fff;border:1px solid #ccc;padding:15px">
    <code style="font-size:14px;line-height:1.5;">
   	[gplayer href="<strong>MP3 FILE</strong>" ] <strong>MP3 TITLE</strong> [/gplayer];
    </code>
     </div>
    <small>Note that it is the exact same sytax as an anchor tag only repacing the &lt;a&gt; and &lt;/a&gt; with [gplayer href=""] and [/gplayer];  </small>
    <br /><br />
    If <strong>Auto-Embed</strong> is enabled, all links to mp3's (e.g. <strong>&lt;a href=&quot;http://abc.com/one.mp3&quot;&gt;MP3&lt;/a&gt;</strong>) would be replaced by a Google Audio Player.
    </div>
    
   
    
    
     <h3>CSS/HTML REFERENCE:</h3>
		<p>The Google Audio Player will replace all instances of anchor tags linking to .mp3 files as follows:</p>
   <div style="background:#fff;border:1px solid #ccc;padding:15px">
    <code style="font-size:14px;line-height:1.5;">
    &lt;div class=&quot;ssg-gplayer&quot;&gt;<br /><br />

    &lt;div class=&quot;title&quot;&gt;<strong>EXAMPLE TITLE(taken from text between the anchor tags)</strong>&lt;/div&gt;<br /><br />
    
    &lt;embed type=&quot;application/x-shockwave-flash&quot; src=&quot;http://www.google.com/reader/ui/3247397568-audio-player.swf?audioUrl=&quot;<strong>[HTTP://EXAMPLE.COM/TEST.MP3]</strong>&quot; width=&quot;<strong>[PLAYER WIDTH]</strong>&quot; height=&quot;<strong>[PLAYER HEIGHT]</strong>&quot; allowscriptaccess=&quot;never&quot; quality=&quot;best&quot; bgcolor=&quot;#<strong>[HEXCOLOR]</strong>&quot; wmode=&quot;window&quot; flashvars=&quot;playerMode=embedded&quot; /&gt;<br /><br />
    
    &lt;/div&gt;
    </code>
    
    
     </div>
    
    
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="ssg_gplayer-width,ssg_gplayer-height,ssg_gplayer-bgcolor,ssg_gplayer-auto,ssg_gplayer-swf,ssg_gplayer-autoplay,ssg_gplayer-css" />
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
    
    </form>
  
  
  <?php
  
  echo '</div>';
}

function ssg_player_head(){

	if ( ! defined( 'WP_PLUGIN_URL' ) )
	  define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
	

	$swf = get_option('ssg_gplayer-swf');
	
	if ($swf!='on'){
		echo '<script type="text/javascript" src="'.WP_PLUGIN_URL.'/ssg-wordpress-google-audio-player/swfobject/swfobject.js"></script>';
	}


	$css = get_option('ssg_gplayer-css');

	if ($css =='on'){
	
		echo  '
		<style type="text/css" media="screen">

		.ssg-gplayer{
				background:#efefef;
				border:1px solid #D9D9D9;
				
				
				-moz-border-radius-topleft:3px;
				-webkit-border-top-left-radius:3px;
				-moz-border-radius-topright:3px;
				-webkit-border-top-right-radius:3px;
				
				
				}

				.ssg-gplayer .title{
				font-size:11px !important;
				margin:4px 3px 2px !Important;
				font-family:Verdana, Arial, Helvetica, sans-serif !Important;
				letter-spacing:normal !Important;
				background:url('.WP_PLUGIN_URL.'/ssg-wordpress-google-audio-player/screen_bg.gif);
				padding:4px 5px 1px;
				display:block;
				color:#5A5C50;
				border:1px solid #CED3B8;
				-moz-border-radius:3px;
				-webkit-border-radius:3px;
				-moz-border-radius:3px;
				-webkit-border-radius:3px;
				height:18px;
				overflow:hidden;
				}
				
				</style>';
	
	
	}


}




add_action('wp_head', 'ssg_player_head');

add_action('admin_menu', 'ssg_player_options');

add_filter( "the_content", "ssg_google_audio" );
add_filter( "the_excerpt", "ssg_google_audio" );
?>