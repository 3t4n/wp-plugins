<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.linkedin.com/in/stevestewart84/
 * @since      1.0.0
 *
 * @package    Read_mb
 * @subpackage Read_mb/admin/partials 
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<?php settings_errors(); ?>
	<p>Global settings to customize your Read More Buddy buttons.</p>

	 <form method="post" action="options.php">
		<?php
			settings_fields( $this->plugin_name );
			do_settings_sections( $this->plugin_name );
			submit_button();
		?>
	</form>
	
	<div><span>Like What We Do? Show Us Some Love  <a href="https://www.paypal.me/TheSteve84/20?message=Thanks+for+read+more+buddy"><img src= "<?php echo plugin_dir_url( __FILE__ ).'donate-paypal-main.png' ?>" width="100"></a></span><p>Want a feature <a href="mailto:steve.stewart2612@gmail.com">let us know</a> and your wish just might come true. </p></div>
	
</div>

   


<!-- This file should primarily consist of HTML with a little bit of PHP. -->
