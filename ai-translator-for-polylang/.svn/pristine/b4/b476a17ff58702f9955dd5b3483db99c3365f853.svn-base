<?php if (!defined('ABSPATH'))
	exit; ?>
<h2>PolylAI Translator Settings</h2>

<?php

	require_once plugin_dir_path(dirname(__FILE__)) . 'partials/cron-help-modal.php';
	require_once plugin_dir_path(dirname(__FILE__)) . 'partials/logs-modal.php';
require_once plugin_dir_path(dirname(__FILE__)) . 'partials/restart-modal.php';

?>

<form action="options.php" method="post" class="polylai-form">
	<?php
	settings_fields('polylai_translator_options');
	do_settings_sections('polylai_translator');
	?>

	<input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e('Save'); ?>" />
</form>
