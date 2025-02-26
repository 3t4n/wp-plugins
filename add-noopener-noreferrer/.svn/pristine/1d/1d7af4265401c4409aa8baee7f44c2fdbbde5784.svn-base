<?php
/*
Plugin Name: ADD noopener & noreferrer
description: Add noopener & noreferrer to the target blank urls present the contents(Post/Page/Product...).
Version: 1.0
Author: Boopathi Rajan
Author URI: http://www.boopathirajan.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
function add_no_nf_targeted_link_rel($rel_values) {
 	return 'noopener noreferrer';
}
add_filter('wp_targeted_link_rel', 'add_no_nf_targeted_link_rel',999);