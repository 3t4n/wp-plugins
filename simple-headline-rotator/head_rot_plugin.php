<?php
/*
Plugin Name: Headline Rotator
Plugin URI: http://www.outtolunchproductions.com/2009/03/17/headline-rotator/
Description: A simple text rotator of titles and excerpts from a specified category. Just add &lt;?php headline_rotator() ?&gt; to your template file and it will rotate through the latest 5 posts in the category named FrontPage. Set height and width in the Options. Based on <a href="http://www.learningjquery.com/2006/10/scroll-up-headline-reader">Scroll Up Headline Reader</a> by Karl Swedberg.
Version: 1.0
Author: Carter Fort
Author URI: http://www.outtolunchproductions.com
*/


/* Prevent direct access to the plugin */
if (!defined('ABSPATH')) {
	exit("Sorry, you are not allowed to access this page directly.");
}

/* Set constant for plugin directory */
define( 'HDROT_URL', WP_PLUGIN_URL.'/simple-headline-rotator' );

/* This is where the plugin does its stuff */
function head_rot_scripts() {
    
	$options = get_option('head_rot_plugin_settings');
    /* Add JQuery and CSS files */
	/* echo '<link rel="stylesheet" href="' . HDROT_URL . '/style.css">' ."\n"; */
	echo '<script type="text/javascript" src="' . HDROT_URL . '/jquery.js"></script>' ."\n";
	/* Add gallery javascript file */
	echo '<script type="text/javascript" src="' . HDROT_URL . '/slider.js"></script>' ."\n";
}
add_action('wp_head', 'head_rot_scripts');

/* Template tag to display rotator in theme files */
function headline_rotator() {
	include_once('head_rot.php');
}



function head_rot_style() {
?>
	<style type='text/css'>
#scrollup {
	position: relative;
	overflow: hidden;
	height: <?php echo get_option('head_rot_height'); ?>px;
	width: <?php echo get_option('head_rot_width'); ?>px;
	}
.headline {
	position: absolute;
	top: 5px;
	left: <?php echo get_option('head_rot_width'); ?>px;
	height: <?php echo get_option('head_rot_height'); ?>px;
	margin-bottom: 10px;
	}
	</style>
<?php
}


add_action('wp_head', 'head_rot_style');

add_action('admin_menu', 'head_rot_plugin_menu');

function head_rot_plugin_menu() {
    // Add a new submenu under Options:
    add_options_page('Headline Rotator', 'Headline Rotator Options', 8, 'head_rot_options', 'head_rot_options_page');


}


add_option('head_rot_width', '500', '', $autoload);
add_option('head_rot_height', '100', '', $autoload);


// Options Page
function head_rot_options_page() {

    // variables for the field and option names 
    $opt_name = 'head_rot_width';
    $hidden_field_name = 'HR_submit_hidden';
    $data_field_name = 'slider_width';
	$height = 'head_rot_height';
	$height_field_name = 'slider_height';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );
	$height_val = get_option ( $height );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];
        $height_val = $_POST[ $height_field_name ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );
	update_option( $height, $height_val );

        // Put an options updated message on the screen

?>
<div class="updated"><p><strong><?php _e('Options saved.', 'hr_trasn_domain' ); ?></strong></p></div>
<?php

    }

    // Now display the options editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'Headline Rotator Options', 'hr_trasn_domain' ) . "</h2>";

    // options form
    
    ?>
<form name="form1" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Set slider width:", 'hr_trasn_domain' ); ?> 
<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="3">px
</p>
<p><?php _e("Set slider height:", 'hr_trasn_domain' ); ?> 
<input type="text" name="<?php echo $height_field_name; ?>" value="<?php echo $height_val; ?>" size="3">px
</p>

<p class="submit">
<input type="submit" name="Submit" value="<?php _e('Update Options', 'hr_trasn_domain' ) ?>" />
</p>

</form>
</div>

<?php
 
}

?>
