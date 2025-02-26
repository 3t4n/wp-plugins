<?php
/**
 * Provide an admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://jase.io/
 * @since      1.0.0
 *
 * @package    Social_Icons_Obvs
 * @subpackage Social_Icons_Obvs/admin/partials
 */

?>

<div class="sio-wrap">
	<h2><?php esc_html_e( get_admin_page_title() ); ?></h2>
	<form method="post" action="options.php">

		<?php
		// Display section headings.
		$headings = array( 'Accounts', 'Customise', 'Display' );

		// Set counter.
		$i = 0;
		?>

		<ul class="sio-tabs" role="tablist">

		<?php
		foreach ( $headings as $heading ) {

			// Start counter.
			$i++;
			?>

			<li<?php if ( 1 === $i ) { ?> class="current"<?php } ?> data-tab="tab-<?php echo esc_attr( $i ); ?>">
				<a href="#<?php echo esc_attr( strtolower( $heading ) ) ?>"><?php esc_html_e( $heading ); ?></a>
			</li>

			<?php
		}
		?>

		</ul>

		<?php settings_fields( $this->plugin_name . '-options' ); ?>

		<div id="tab-1" class="sio-tab-content tab-accounts current">
			<?php do_settings_sections( $this->plugin_name . '-accounts' ); ?>
		</div>

		<div id="tab-2" class="sio-tab-content tab-customise">
			<?php
			do_settings_sections( $this->plugin_name . '-customise' );
			require_once 'social-icons-obvs-admin-section-customise-preview.php';
			?>
		</div>

		<div id="tab-3" class="sio-tab-content tab-display">
			<?php do_settings_sections( $this->plugin_name . '-display' ); ?>
		</div>

		<?php submit_button( 'Save Changes' ); ?>

	</form>
</div>
