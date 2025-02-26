<?php
/**
 * @package antispam-squirrel
 * @Version 1.0
 */
/*
plugin name: Antispam Squirrel
Description: This plugin is used to avoid spam comments.
Author: Mia Jiao
Version: 1.0
Author Uri: http://mia.blog.coolder.com
*/

defined('ABSPATH') OR exit; // prevent full path disclosure

$antispam_squirrel_error_message = "You are a robot!";

function antispam_squirrel() {
    ?>
    <p class="antispam-squirrel">
        <label for="Antispam Squirrel"><?php _e('Please copy the word "SQUIRREL" in the space below') ?></label>
        <input type="text" name="antispam_squirrel" id="antispam_squirrel" />
    </p>
    <?php
}
// Now we set that function up to execute when the comment_form action is called
add_action( 'comment_form', 'antispam_squirrel');
//add_action( 'comment_form_after_fields', 'antispam_squirrel');
//add_action( 'comment_form_logged_in_after', 'antispam_squirrel');

function antispam_squirrel_check($commentdata) {  
 
    global $antispam_squirrel_error_message;

    if($_POST['antispam_squirrel'] == "SQUIRREL") {
        return $commentdata;
    } else wp_die($antispam_squirrel_error_message);
   
}

if ( ! is_admin()) {
     add_filter('preprocess_comment', 'antispam_squirrel_check', 1);
}

?>

