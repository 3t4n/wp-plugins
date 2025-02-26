<?php
$ttsbg_settings = 'tt_sbg_css_settings'; // do not change!

$ttsbg_defaults = array( // define our defaults
		'css_prefix' => get_css_prefix(),
                'template_path' => get_stylesheet_directory(),
		'additional_css' => 'No' 
);

function get_css_prefix(){
    
$template_path = get_stylesheet_directory().'/style.css';

$CSSprefix = new CSS();
$CSSprefix->parse_file($template_path);
$properties = $CSSprefix->get_css();

reset($properties);
$first_key = key($properties);


$theme_css_prefix = get_between($first_key, '#', 'main');

return $theme_css_prefix;
}

//	push the defaults to the options database,
//	if options don't yet exist there.
add_option($ttsbg_settings, $ttsbg_defaults, '', 'yes');

/*
///////////////////////////////////////////////
This section hooks the proper functions
to the proper actions in WordPress
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
*/
//	this function registers our settings in the db

add_action('admin_init', 'register_ttsbg_settings');
function register_ttsbg_settings() {
	global $ttsbg_settings;
	register_setting($ttsbg_settings, $ttsbg_settings);
}

// add CSS and JS if necessary
function tt_theme_options_css_js() {
echo <<<CSS

<style type="text/css">
body {margin:0;padding:0;}
	.option-title h2	{
	font:italic 24px/35px Georgia,"Times New Roman","Bitstream Charter",Times,serif;
	margin:0;
	padding:5px 15px 13px 0;
	text-shadow:0 1px 0 #FFFFFF;
	color:#464646;
	}
	h4.sub-title 	{
	margin:10px 0;
	font-weight:normal;
        font-size:16px;
        padding:5px;
        background-color:#ddd;
	}
	.metabox-holder { 
		width: 350px; float: left;
		margin: 0px; padding: 0px 10px 0px 0px;
	}
	.metabox-holder-wide { 
		width: 710px; float: left;
		margin: 0px; padding: 0px 10px 0px 0px;
	}
	.metabox-holder ol, .metabox-holder-wide ol {
		list-style-type:decimal;
		margin-left:4em;
	}
	.metabox-holder code, .metabox-holder-wide code {
	padding: 9px;
	background: #eee;
        
        font-size:12px;
        margin:20px 0;
	}
	.metabox-holder pre code, .metabox-holder-wide pre code {
	padding: 0;
	}
	.metabox-holder pre, .metabox-holder-wide pre {
	padding: 9px;
        line-height: 13px;
	background: #eee;
	border: 1px solid #ccc;
	}
	
	.metabox-holder .postbox .inside, .metabox-holder-wide .postbox .inside {
		padding: 0px 10px 0px 10px;
	}
	.title-postbox	h2 {
		padding: 10px 0px 10px 0px;
		font-size:20px;
		margin-top:10px;
		border-top:1px #ccc dotted;
		}
	p.small-red 	{
		color:#ff0000;
		font-size:11px;
		line-height:12px;
		font-style:italic;
		margin: 0;
	}
        
	p.sub 	{
		color:#666;
		font-size:12px;
		line-height:11px;
		font-style:italic;
		margin: 0;
                padding-left:20px;
	}
    
	p.normal 	{

		margin-bottom: 5px;
                font-size:14px;
	}
	.block-box	{
	float:left;
	margin:0 5px;
	}
	
	.block-boxc	{
	color:#666;
	font-size:10px;
	padding-left:5px;
	}
	
	.clearfix	{
	clear:both;
	}
	hr.seperator {
		border-color:1px dotted ;
		border-style:none none solid;
		border-width:medium medium 1px;
		margin:10px 0 10px;
		padding:0 0 5px;
	}
	
strong.sub-head	{
line-height:30px;
}
pre{overflow:auto;font:.9em Monaco,monospace,Courier,"Courier New";line-height:25px;margin-bottom:25px;padding:9px;background:#eee;border:1px solid #ccc;}
code{font:.9em Monaco,monospace,Courier,"Courier New";padding:0 3px;background:#eee;}

</style>

CSS;
echo <<<JS

<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".fade").fadeIn(1000).fadeTo(1000, 1).fadeOut(1000);
});
</script>

JS;
}

?>