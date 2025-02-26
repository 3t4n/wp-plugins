<?php if (!defined('ABSPATH'))
	exit; ?>

<div class="polylai-modal-bg" style="display: none;" id="polylai-modal-restart">
	<div class="polylai-modal-dialog">
		<div class="polylai-modal-header">
			<h4>Restart translations</h4>
			<span class="dashicons dashicons-no" data-polyalai-close></span>
		</div>
		<div class="polylai-modal-body">
			<p>If the translation process seems to be stuck, showing no progress for more than 10 minutes, you may need
				to force a manual restart.
				<br />
				<br />
				Restarting will not erase any content that has already been translated.
			</p>

		</div>
		<div class="polylai-modal-footer">
			<form action="" method="post" class="polylai-form">
				<?php $nonce = wp_create_nonce('polylai_restart_nonce'); ?>
				<input type="hidden" name="polylai_restart_nonce" value="<?php echo $nonce ?>">
				<input name="polylai_restart" class="button button-primary" type="submit"
					value="<?php esc_attr_e('Restart'); ?>" />
			</form>
		</div>
	</div>
</div>