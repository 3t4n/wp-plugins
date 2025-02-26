<?php
/*
Plugin Name: Ascend Accessibility
Description: This plugin makes your website more accessible for those with disabilities
Author: Ascend Applications
Author URI: http://ascendapplications.com
version: 1.0
License: GPL2

*/

add_action('wp_footer', 'add_accessibility_plugin');
function add_accessibility_plugin(){ ?>
<script type="text/javascript" src="https://cdn.ascendapplications.com/plugin.js"></script>
<?php }
?>