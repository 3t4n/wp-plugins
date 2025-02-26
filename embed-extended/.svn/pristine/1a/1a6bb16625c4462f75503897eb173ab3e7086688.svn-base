<?php

// Settings page URL.
$settings_url = admin_url('options-general.php?page=embed-extended');

$tabs = $data['tabs'];
$tab = $data['tab'];

?>
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('Embed Extended Settings', 'embed-extended'); ?></h1>
	<hr class="wp-header-end" />
	<nav class="nav-tab-wrapper wp-clearfix">
		<?php $index = 0; foreach ( $tabs as $id => $label ) : ?>
		<a href="<?php echo $settings_url ?><?php if ( $index++ ) echo '&tab=' . $id; ?>"
			class="nav-tab<?php if ( $id === $tab ) echo ' nav-tab-active'; ?>"><?php echo $label; ?></a>
		<?php endforeach; ?>
	</nav>
	<?php echo Embed_Extended()->get_template('admin-settings-' . $tab, $data); ?>
</div>
