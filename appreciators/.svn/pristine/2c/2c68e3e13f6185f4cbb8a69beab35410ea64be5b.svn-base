<?php
/**
 * Plugin options view.
 *
 * @package   Appreciators
 * @author    Minh Lee <minh@appreciators.org>
 * @license   GPL-2.0+
 * @copyright 2016 Appreciators Clique
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<div class="wrap">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	<div style="float:left;width:100%;">

    <h3>Linked Account</h3>
    <div id='app-admin' author-id='<?php  global $current_user; 
        echo $current_user->ID; ?>' display-name='<?php global $current_user; 
        echo $current_user->display_name ; ?>' username='<?php global $current_user; 
        echo $current_user->user_login; ?>' email='<?php global $current_user;  
        echo $current_user->user_email; ?>'></div>

	<form method="post" action="options.php">
		<?php
			settings_fields( 'appreciators_settings' );
			do_settings_sections( 'appreciators_settings' );
			submit_button();
		?>
	</form>

	</div>

</div>

