<?php
if (function_exists('load_plugin_textdomain')) {
    load_plugin_textdomain('adminhelp', 'wp-content/plugins/adminhelp');
}
function ahelpmenu_request($name, $default=null) 
{
	if (!isset($_REQUEST[$name])) return $default;
	return stripslashes_deep($_REQUEST[$name]);
}
	
?>	

<div class="wrap">
<table class="form-table"><tr valign="top">
<?php global $ahelpmenu_options;
echo $ahelpmenu_options['helpmenuoptions'];
?></tr>
</table>
</div>
