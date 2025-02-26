<?php
/*
Plugin Name: Ragic Shortcode Plugin
Description: Enables shortcode to Ragic Web Embed forms.
Version: 1.3
License: GPL
Author: ragicsupport
Author URI: https://www.ragic.com
*/

function createRagicEmbedJS($atts, $content = null) {
	extract(shortcode_atts(array(
		'ragic_url' => '',
		'ragic_feature' => '',
		'ragic_webform_version_is_new' => false,
		'ragic_version' => '',
	), $atts));

	$ragic_url = htmlspecialchars($ragic_url);
	$ragic_feature = htmlspecialchars($ragic_feature);
	
	if (!$ragic_url || !$ragic_feature) {

		$error = "
		<div style='height:200;width:300;text-align:center'>
			<h3>There is something wrong with your short code parameter!</h3>
		</div>\n";

		return $error;

	} else if ("rawembed" == $ragic_feature) {
		$executer = "<div class='ragic_rawembed'><iframe src='$ragic_url' sandbox='allow-modals allow-forms allow-popups allow-scripts allow-same-origin' style='border:none;overflow-x:hidden;overflow-y:hidden;height:600px;width:100%;'></iframe></div>";
		return "$executer";
	} else {
		$executer  = "<div id='ragic_webview'></div>\n";
		$executer .= "<script type='text/javascript'>\n";
		$executer .= "  /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */\n";
		$executer .= "  var a =  document.createElement('a');\n";
		$executer .= "  a.href = '$ragic_url';\n";		
		$executer .= "  var ragic_url = a.hostname + (a.pathname.charAt(0) == '/' ? '' : '/') + a.pathname;\n";
		$executer .= "  var ragic_feature= '$ragic_feature';\n";
		if ($ragic_webform_version_is_new) $executer.= "var webFormVersionIsNew = true;\n";
		$executer .= "  /* * * DON'T EDIT BELOW THIS LINE * * */\n";
		$executer .= "  (function() {\n";
		$executer .= "    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;\n";
		$executer .= "    dsq.src = window.location.protocol+'//'+a.hostname+(ragic_feature == 'fts' ? '/intl/common/loadfts.js?wp' : '/intl/common/load.js?wp');\n";
		$executer .= "    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);\n";
		$executer .= "  })();\n";
		$executer .= "</script>\n";

		return "$executer";
	}
}

add_shortcode('ragic', 'createRagicEmbedJS');
?>