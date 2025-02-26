<?php
/**
 * Provide a popup to get the consent from user to send data
 *
 * This file is used to markup the admin-facing aspects of the sdk/plugin.
 *
 * @link
 * @since      1.0.0
 *
 * @package    Hash_Track_Optin
 * @subpackage Hash_Track_Optin/SDK/partials
 */

?>
<div class="modal-backdrop"></div>
<div class="postbox dpcp-insights open-insights">
	<h2><?php echo esc_html( $popup['title'] ); ?></h2>
	<?php if ( isset( $popup['description'] ) ) : ?>
		<p class="dpcp-insights-p"><?php echo wp_kses( $popup['description'], true ); ?></p>
	<?php endif ?>
	<button value="yes" class="hto-button-allow dpcp-insights-button"><?php echo esc_html( isset( $popup['accept_text'] ) ? $popup['accept_text'] : 'Allow & Continue' ); ?></button>
	<div class="insights skip"><a href="#" class="learn-more" onclick="open_learn_more();return false;">Learn More</a>&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="#" value="skip" class="hto-button-skip learn-more"><?php echo esc_html( isset( $popup['skip_text'] ) ? $popup['skip_text'] : 'Skip' ); ?></a>
	</div>
	<div id="permission_learn_more" style="display: none;">
	<?php if ( isset( $popup['consent_title'] ) ) : ?>
		<p><?php echo esc_html( $popup['consent_title'] ); ?></p>
		<?php endif ?>
		<?php if ( isset( $popup['consent'] ) && is_array( $popup['consent'] ) ) : ?>
		<ul style="list-style-type: disc;">
			<?php foreach ( $popup['consent'] as $consent ) : ?>
			<li><?php echo esc_html( $consent['description'] ); ?></li>
			<?php endforeach ?>
		</ul>
		<?php endif ?>
		<div class="insights skip">
			<a href="#" class="learn-more" onclick="close_learn_more(); return false;">Close Section</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="#" value="yes" class="hto-button-allow learn-more"><?php echo esc_html( isset( $popup['accept_text'] ) ? $popup['accept_text'] : 'Allow & Continue' ); ?></a>
		</div>
	</div>
</div>
<script>
	let permission_learn_more = document.getElementById("permission_learn_more");

	function open_learn_more() {
		permission_learn_more.style.display = "inline"
	}

	function close_learn_more() {
		permission_learn_more.style.display = "none"
	}
</script>
