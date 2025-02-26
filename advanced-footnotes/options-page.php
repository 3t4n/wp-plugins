<?php defined('ABSPATH') or die('Oh, hi!'); ?>

<div class="wrap" id="advanced-footnotes-options">
	<h1><?=__('Advanced Footnotes Options', 'advanced_footnotes')?></h1>

	<form method="post" action="options.php">
		<?php settings_fields( 'afn_opts' ); ?>
		<?php do_settings_sections( 'advanced_footnotes' ); ?>

		<?php submit_button(); ?>
	</form>
</div>