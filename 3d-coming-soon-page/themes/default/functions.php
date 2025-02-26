<?php
function contrix_csp_title() {
	$o = contrix_csp_get_settings();
	extract( $o );

	$output = '';

	if ( !empty( $headline ) ) {
		$output = esc_html( $headline );
	}
	return $output;
}

function contrix_csp_metadescription() {
	$o = contrix_csp_get_settings();
	extract( $o );

	$output = '';

	if ( !empty( $seo_description ) ) {
		$output = '<meta name="description" content="'.esc_attr( $seo_description ).'">';
	}
	$output = '<meta property="og:url" content="'.get_social_link().'"/>';
	return $output;
}

function contrix_csp_privacy() {
	$output = '';

	if ( get_option( 'blog_public' ) == 0 ) {
		$output = "<meta name='robots' content='noindex,nofollow' />";
	}

	return $output;
}

function contrix_csp_favicon() {
	$o = contrix_csp_get_settings();
	extract( $o );

	$output = '';

	if ( !empty( $favicon ) ) {
		$output .= "<!-- Favicon -->\n";
		$output .= '<link href="'.esc_attr( $favicon ).'" rel="shortcut icon" type="image/x-icon" />';
	}

	return $output;
}


function contrix_csp_head() {
	$o = contrix_csp_get_settings();
	extract( $o );

	// CSS
	$output = '';

	$output .= "<!-- default Style -->\n";
	$output .= '<link rel="stylesheet" href="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/libs/bootstrap/bootstrap.min.css">'."\n";
	$output .= '<link rel="stylesheet" href="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/libs/bootstrap/cover.css">'."\n";
	$output .= "<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->";
	//$output .= "<!--[if lt IE 9]>";
	$output .= '<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
	$output .= '<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
	//$output .= "<![endif]-->";

	//$output .= '<link rel="stylesheet" href="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/css/reset.css">'."\n";
	$output .= '<link rel="stylesheet" href="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/css/icons.css">'."\n";
	$output .= '<link rel="stylesheet" href="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/libs/flipcountdown/jquery.flipcountdown.css">'."\n";
	/*if ( is_rtl() ) {
		$output .= '<link rel="stylesheet" href="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/css/rtl.css">'."\n";
	}*/
	$output .= '<style type="text/css">'."\n";

	// Calculated Styles

	$output .= '/* calculated styles */'."\n";
	ob_start();
	?>

	body {
		margin: 0px;
		overflow: hidden;
		font-family:Monospace;
		font-size:13px;
		text-align:center;
		font-weight: bold;
		text-align:center;
		-webkit-background-size: cover;
		background-color:transparent !important;
		background-size: cover;
		background-position: center;
		height: 100%;
		min-height: 480px;
		cursor: pointer;

	}
	div.vjs-control,div.vis-caption-settings,div.vjs-tracksettings,div.vjs-tracksettings-controls{
		display:none !important;
	}
	div.site-wrapper {
		background-size: cover;
		
	}
	#logo {
		height:50px;
		opacity: 0.8;
		-webkit-transition: 3s opacity;
		-moz-transition: 3s opacity;
		-ms-transition: 3s opacity;
		-o-transition: 3s opacity;
		transition: 3s opacity;
	}
	.site-wrapper{
		background-color:transparent;
		position:absolute;
	}
	.no-webgl .preview {
		/*display: none !important;*/
	}
	
	
	.no-webgl-only {
		display: none;
	}
	.no-webgl .no-webgl-only {
		display: block;
	}
	
	a {
		color:#0078ff;
	}
	
	.no-cursor {
		cursor: none;
	}
	
	
	.socials {
		opacity: 0.6;
	}
	.socials:hover {
		opacity: 1;
	}
	
	.no-webgl .socials, .onbottom .socials {
		opacity: 1;
	}
	
	
	
	.social {
		width: 50px;
		height: 50px;
		border-radius: 50%;
		margin: 10px;
		display: inline-block;
		background: #fff;
		box-shadow: inset 0 0 15px #ccc;
		line-height: 50px;
		text-align: center;
		font-size: 18px;
		color: #777;
	}
	.social .fa{
		line-height:50px !important;
	}
	
	.social:hover {
		box-shadow: inset 0 0 15px #999;
		color: #444;
	}
	
	.transit {
		-webkit-transition: 0.5s all ease;
		-moz-transition: 0.5s all ease;
		-ms-transition: 0.5s all ease;
		-o-transition: 0.5s all ease;
		transition: 0.5s all ease;
	}
	
	.transit-long {
		-webkit-transition: 2.5s all ease;
		-moz-transition: 2.5s all ease;
		-ms-transition: 2.5s all ease;
		-o-transition: 2.5s all ease;
		transition: 2.5s all ease;
	}
	
	span
	{
	    display: block;
	    font-size: 2em;
	    font-weight: normal;
	}
  
    <?php 
	$output .= ob_get_clean();

	$output .= '</style>'."\n";


	return $output;
}
function contrix_csp_scripts() {
	$o = contrix_csp_get_settings();
	extract( $o );

	$output = '';

	// Javascript
	$output .= "<!-- JS -->\n";
	$output .= '<script src="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/libs/typedarray.js"></script>'."\n";
	$output .= '<script src="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/libs/three.js.r72/build/three.min.js"></script>'."\n";
	
	$output .= '<script src="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/js/modernizr.webgl.js"></script>'."\n";
	$output .= '<script src="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/libs/jquery-1.9.1/jquery-1.9.1.min.js"></script>'."\n";
	$output .= '<script src="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/libs/video-js/video.js"></script>'."\n";
	$output .= '<script src="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/libs/BigVideo/lib/bigvideo.js"></script>'."\n";
	$output .= '<script src="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/libs/bootstrap/bootstrap.min.js"></script>'."\n";
	$output .= '<script src="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/libs/bootstrap/ie10-viewport-bug-workaround.js"></script>'."\n";
	$output .= '<script src="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/libs/flipcountdown/jquery.flipcountdown.js"></script>'."\n";
	
	$output .= '<script src="'.CONTRIX_CSP_PLUGIN_URL.'themes/default/js/comingsoon.contrix.min.js"></script>'."\n";
	return $output;
}

function contrix_csp_logo() {
	$o = contrix_csp_get_settings();
	extract( $o );
	$output = '';
	if ( !empty( $logo ) ) {
		extract( $logo );
		$output .= "<img id='logo' src='$url'>";
	}

	return  $output;
}
function contrix_csp_cube_path() {
	$o = contrix_csp_get_settings();
	extract( $o );

	$output = '';

	if ( !empty( $theme ) ) {
		$themeFile = basename($theme).PHP_EOL;
		$themeName = substr($themeFile,0,strrpos($themeFile, "."));
		$output .= CONTRIX_CSP_PLUGIN_URL.'themes/default/images/'. $themeName .'/';
	}else{
		$output .= CONTRIX_CSP_PLUGIN_URL.'themes/default/images/Footballfield/';
	}

	return  $output;
}
function contrix_csp_headline() {
	$o = contrix_csp_get_settings();
	extract( $o );

	$output = '';

	if ( !empty( $headline ) ) {
		$output .= $headline;
	}

	return  $output;
}

function contrix_csp_description() {
	$o = contrix_csp_get_settings();
	extract( $o );

	$output = '';

	if ( !empty( $description ) ) {
		$output .= $description;
		//$output .= '<div id="contrix-csp-description">'.shortcode_unautop(wpautop(convert_chars(wptexturize($description)))).'</div>';
	}

	return  $output;
}
function contrix_csp_social() {
	$o = contrix_csp_get_settings();
	extract( $o );

	$output = '';
	if ( !empty( $social_on ) &&  $social_on =='1' ) {
		
		extract( $social_check );
		$output = '<div class="socials transit">';
		if ( !empty( $twitter ) &&  $twitter =='1' ) {
			$output .= '<a class="social-popup" href="https://twitter.com/share?url=' .get_social_link().'" ><div class="social transit"><i class="fa fa-twitter"></i></div></a>';
		}
		if ( !empty( $facebook ) &&  $facebook =='1' ) {
			$output .= '<a class="social-popup" href="http://www.facebook.com/sharer/sharer.php?p[url]=' .get_social_link().'"><div class="social transit"><i class="fa fa-facebook"></i></div></a>';
		}
		if ( !empty( $google ) &&  $google =='1' ) {
			$output .= '<a class="social-popup" href="https://plus.google.com/share?url=' .get_social_link().'"><div class="social transit"><i class="fa fa-google-plus"></i></div></a>';
		}

		$output .= '</div>';
	}

	return  $output;
}
function contrix_csp_countdown() {
	$o = contrix_csp_get_settings();
	extract( $o );

	$output = '';
	if ( !empty( $countdown_on ) &&  $countdown_on =='1' ) {
		if(!empty($enddate)){
			$newEndDate = DateTime::createFromFormat('m/d/Y', $enddate);
			$enddate = $newEndDate->format('Y/m/d'); 
			$dueDate = $enddate . " " . $endhour . ":" . $endminute. ":00" ;
		
			if(!empty($dueDate)){
				$output = '<div class="countdown" data-end-date="' . $dueDate . '"></div>';
			}
		}
       
       
		

	}

	return  $output;
}


function get_social_link(){
	
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if(!empty($actual_link)){
		$actual_link = str_replace("cs_preview=true", "", $actual_link);
	}
	return $actual_link; 
}