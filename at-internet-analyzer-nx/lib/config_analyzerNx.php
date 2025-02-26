<?php
// ---------------------------------------------
// Add all the sections, fields and settings 
// ---------------------------------------------	

add_action('admin_init', 'analyzerNx_options_init');
add_action('admin_menu', 'analyzerNx_menu');

function analyzerNx_options_init(){	
	if(function_exists('register_setting')){
		register_setting('analyzerNx_sampleoptions', 'xtsd_value', 'wp_filter_nohtml_kses');
		register_setting('analyzerNx_sampleoptions', 'xtsite_value', 'wp_filter_nohtml_kses');	
		register_setting('analyzerNx_sampleoptions', 'xtdmc_value', 'wp_filter_nohtml_kses');	
		register_setting('analyzerNx_sampleoptions', 'homepage_ergo');	
		register_setting('analyzerNx_sampleoptions', 'posts_ergo');	
		register_setting('analyzerNx_sampleoptions', 'pages_ergo');	
	}
}

function analyzerNx_menu(){	
	if(function_exists('register_setting')&&function_exists('settings_fields')){ 
		add_options_page('Analyzer<sup>NX</sup>', 'Analyzer<sup>NX</sup>', 'edit_plugins', __FILE__, 'analyzerNx_options');			
	}
	else{
		add_options_page('Analyzer<sup>NX</sup>', 'Analyzer<sup>NX</sup>', 'edit_plugins', __FILE__, 'analyzerNx_error');	
	}  			
}

function analyzerNx_options(){  		
	echo "<div class='wrap'>\n";
	echo "<div id='icon-options-general' class='icon32'><br /></div>\n";
	echo "<h2>Analyzer<sup>NX</sup> Configuration</h2>\n";
	echo "<form method='post' action='options.php'>\n";	
    echo settings_fields('analyzerNx_sampleoptions'); 	
	echo "<h3 class='hndle'><span class='wp-menu-toggle'>Please set the values for your Tag and your preferences</span></h3>\n";		
	echo "<table class='form-table'>\n";
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>xtsd</th>\n";	
	echo "<td><input name='xtsd_value' type='text' value='".get_option('xtsd_value')."' class='regular-text code' /> <i>http://logi123</i> for example (with protocol http or https)</td>\n";	
	echo "</tr>\n";	
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>xtsite</th>\n";	
	echo "<td><input name='xtsite_value' type='text' value='".get_option('xtsite_value')."' class='regular-text code' /> <i>123456</i> for example</td>\n";
	echo "</tr>\n";		
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>xtdmc</th>\n";	
	echo "<td><input name='xtdmc_value' type='text' value='".get_option('xtdmc_value')."' class='regular-text code' /> <i>.site.com</i> for example</td>\n";
	echo "</tr>\n";		
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>Activate ClickZone analysis on the Homepage</th>\n";
	echo "<td><input ".(get_option('homepage_ergo')?'checked="checked"':'')." name='homepage_ergo' type='checkbox' value='1' class='regular-text code' /></td>\n";
	echo "</tr>\n";	
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>Activate ClickZone analysis on the Blog-Posts</th>\n";
	echo "<td><input ".(get_option('posts_ergo')?'checked="checked"':'')." name='posts_ergo' type='checkbox' value='1' class='regular-text code' /></td>\n";
	echo "</tr>\n";	
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>Activate ClickZone analysis on the static Pages</th>\n";	
	echo "<td><input ".(get_option('pages_ergo')?'checked="checked"':'')." name='pages_ergo' type='checkbox' value='1' class='regular-text code' /></td>\n";
	echo "</tr>\n";
	echo "</table>\n";			
	echo "<p class='submit'><input type='submit' name='Update' class='button-primary' value='Save settings'/></p>\n";
	echo "</form>\n";
	echo "</div>\n";
}

function analyzerNx_error(){  	
	echo "<div class='wrap'>\n";
	echo "<div id='icon-options-general' class='icon32'><br /></div>\n";
	echo "<h2>Analyzer<sup>NX</sup> Configuration</h2>\n";
	echo "<form method='post' action=''>\n";
	echo "<div class='error'><p><strong>The Analyzer<sup>NX</sup> plug-in is not compatible with your WordPress version. Please deactivate it.</strong></p></div>\n";
	echo "</form>\n";
	echo "</div>\n";
}

?>