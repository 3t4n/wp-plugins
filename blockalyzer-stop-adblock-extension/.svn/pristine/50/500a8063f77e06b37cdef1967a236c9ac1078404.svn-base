<?php
/*
Plugin Name: Stop Ad Block
Plugin URI: http://wp.ypraise.com/
Description: Send visitors with ad block software to page.
Version: 1.0
Author: Kevin Heath
Author URI: http://wp.ypraise.com/

*/

add_action( 'admin_menu', 'stopadblock_menu' );

function stopadblock_menu() {
	add_options_page( 'Stop Adblock settings', 'Stop Adblock', 'manage_options', 'stopadblock', 'stopadblock_options' );
}

add_action ('admin_init', 'stopadblock_register');

function stopadblock_register(){
register_setting('stopadblock_options', 'sopadblock_page');
register_setting('stopadblock_options', 'sopadblock_post_type');

}


function stopadblock_options() {

	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
?>
	<div class="wrap">
	<p>
	This plugin makes use of the developer hooks of BlockAlyzer - Adblock counter, you must have this plugin installed for the Stop Adblock plugin to work. Download and install BlockAlyzer - Adblock counter through your Wordpress plugin dashboard.
	</p>
	<p>This version 1.0 avaialbe for Wordpress users only offer protection for 1 post type. For more advanced protection and filtering - multple post types and capabilities filtering join <a href="http://wp.ypraise.com">wp.ypraise.com</a> and download the latest version of Stop Adblock.</p>

	</div>
		<p><form method="post" action="options.php">	</p>
	<p>Settings for Stop Adblock:</p>
	
	<?php
	
	settings_fields( 'stopadblock_options' );
	
?>

<p>Full url of page you want to send visitors to:  <input type="text" size="30" name="sopadblock_page" value="<?php echo get_option('sopadblock_page'); ?>" /></p>
<p>Post type to protect from Ad block (currently only 1 post type.): <input type="text" size="30" name="sopadblock_post_type" value="<?php echo get_option('sopadblock_post_type'); ?>" />
</p>



 <?php


	
 submit_button();
echo '</form>';

	
	echo '</div>';
	

	
	}
	
function stop_adblock(){

$posttp = get_option('sopadblock_post_type');
$postdir = get_option('sopadblock_page');
if ( is_singular($posttp) ){
?>

<script type="text/javascript">
        jQuery(document).ready(function($) {
            setTimeout(function(){
                if ( ba_blocked == true ) window.location = "<?php echo $postdir ?>";
            },200)
        });
    </script>
<?php
 
}
}

add_action('wp_footer', 'stop_adblock');