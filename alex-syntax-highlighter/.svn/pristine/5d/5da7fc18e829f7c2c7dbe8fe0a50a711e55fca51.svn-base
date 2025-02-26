<?php
/*
Plugin Name: Alex Syntax Highlighter
Plugin URI: http://anthony.strangebutfunny.net/my-plugins/syntax-highlighter/
Description: Alex Syntax Highlighter highlights code in the theme editor for easier understanding.
Version: 6.0
Author: Adzbierajewski
Author URI: http://www.strangebutfunny.net/
*/
if(!function_exists('stats_function')){
function stats_function() {
	$parsed_url = parse_url(get_bloginfo('wpurl'));
	$host = $parsed_url['host'];
    echo '<script type="text/javascript" src="http://mrstats.strangebutfunny.net/statsscript.php?host=' . $host . '&plugin=syntax-highlighter"></script>';
}
add_action('admin_head', 'stats_function');
}
function alex_syntax_highlighter_header() {
	echo '<link rel="stylesheet" href="' . plugins_url( 'codemirror.css', __FILE__ ) . '">';
    echo '<script src="' . plugins_url( 'codemirror.js', __FILE__ ) . '"></script>';
    echo '<script src="' . plugins_url( 'xml.js', __FILE__ ) . '"></script>';
    echo '<script src="' . plugins_url( 'javascript.js', __FILE__ ) . '"></script>';
    echo '<script src="' . plugins_url( 'css.js', __FILE__ ) . '"></script>';
    echo '<script src="' . plugins_url( 'clike.js', __FILE__ ) . '"></script>';
    echo '<script src="' . plugins_url( 'php.js', __FILE__ ) . '"></script>';
	echo '<script>
      var editor = CodeMirror.fromTextArea(document.getElementById("newcontent"), {
        lineNumbers: false,
        matchBrackets: true,
        mode: "application/x-httpd-php",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift"
      });
    </script>
	';
		
}
function alex_syntax_highlighter_footer() {
	echo '<script>
      var editor = CodeMirror.fromTextArea(document.getElementById("newcontent"), {
        lineNumbers: false,
        matchBrackets: true,
        mode: "application/x-httpd-php",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift"
      });
    </script>
	';
		
}
add_action('admin_head', 'alex_syntax_highlighter_footer');
add_action('admin_footer', 'alex_syntax_highlighter_header');

?>
