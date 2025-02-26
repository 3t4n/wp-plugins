<?php if (!empty($alert)) : adminAlert($alert, $alertType); endif; ?>
<div class="wrap">
	<h1 class="wp-heading-inline">New Campaign</h1>
	<?php sdiAdminInclude('elements/campaign-form.php'); ?>
</div>