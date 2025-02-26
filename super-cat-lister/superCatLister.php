<?php
/*
Plugin Name: Super Cat Lister
Plugin URI: http://www.ecosystemi.com/super-cat-lister
Version: v1.00
Author: <a href="http://www.ecosystemi.com">Jason Pomerantz</a>
Description: Inserts formatted category lists into posts or pages, with numerous options.  Helpful for using Wordpress as a Content Management Systems (CMS).
Tags: categories, content management, category listing
*/

/*
*
*	Super Cat Lister
*
*	Copyright 2009 Jason Pomerantz (http://www.ecosystemi.com)
*	Released under the GNU General Public License (http://www.gnu.org/licenses/gpl.html)
*


*/
require 'includes/superCatListerIncludes.php';

add_action('admin_menu','superCatLister_initAdmin');
add_shortcode('cat_lister', 'cat_lister_func');
add_shortcode('page_lister', 'page_lister_func');

?>