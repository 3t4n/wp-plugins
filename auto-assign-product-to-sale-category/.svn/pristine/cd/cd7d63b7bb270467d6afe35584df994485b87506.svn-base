<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/mrakisp
 * @since      1.0.0
 *
 * @package    Aatsc
 * @subpackage Aatsc/admin/partials
 */


?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
	<h1>Set Sale Category</h1>
	<form method="post" action="options.php">
		<?php
            settings_fields( 'autosale_cat_settings' ); 
            do_settings_sections( 'auto-sale-cat-slug' ); // a page slug
            submit_button();
        ?>
    </form>
</div>