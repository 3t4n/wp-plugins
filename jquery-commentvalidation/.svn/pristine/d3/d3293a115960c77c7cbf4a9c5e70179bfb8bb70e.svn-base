<?php
/*
Plugin Name: jQuery CommentValidation
Plugin URI: http://foo.iskandar.web.id
Description: jQuery Validation for WP comment system
Author: FoO Iskandar
Version: 0.2
Author URI: http://iskandar.web.id
*/

function jQuerycommentValidation() {

echo '<link rel="stylesheet" href="';
bloginfo('wpurl');
echo '/wp-content/plugins/jQuery-comment-validation/jquery-comment-validation.css"></script>';
echo '<script type="text/javascript" src="http://www.google.com/jsapi"></script>';
echo '<script type="text/javascript">/* load jQuery */ google.load("jquery", "1.3.2");</script>';
echo '<script type="text/javascript" src="';
bloginfo('wpurl');
echo '/wp-content/plugins/jQuery-comment-validation/jquery.validate.js"></script>';
echo '<script type="text/javascript" src="';
bloginfo('wpurl');
echo '/wp-content/plugins/jQuery-comment-validation/jquery-comment-validation.js"></script>';

}

add_action('wp_head', 'jQuerycommentValidation');

?>