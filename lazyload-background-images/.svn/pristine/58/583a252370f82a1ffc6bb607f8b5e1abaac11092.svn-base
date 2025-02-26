<?php

/**
 * @since 1.0.0
 * @author Proloy Bhaduri<support@proloybhaduri.com>
 */

//sample file 
if (!current_user_can('manage_options') || !is_admin()) {
	return;
}

//Get the active tab from the $_GET param
$export_tab = null;
$curr_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : $export_tab;
$curr_page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : null;
$curr_tab_val = '';
if ($curr_page === 'lazyload-bg') :
	switch ($curr_tab) {
		case 'settings':
			$curr_tab_val = 'settings';
			break;
		case  'more':
			$curr_tab_val = 'more';
			break;
		default:
			$curr_tab_val = 'settings';
			break;
	}
	$setting_tab = false;
	$more_tab = false;
	switch ($curr_tab) {
		case 'settings':
			$setting_tab = true;
			break;
		case  'more':
			$more_tab = true;
			break;
		default:
			$setting_tab = true;
			break;
	}

?>

	<div class="pblzbg-container relative mt-10">
		<!-- Here are our tabs -->
		<div class="h-2"></div>
		<nav class="nav-tab-wrapper mt-10 pt-10">
			<a href="?page=lazyload-bg&tab=settings" class="nav-tab rounded-t-lg <?php if ($setting_tab) : ?>nav-tab-active<?php endif; ?>"><?php echo __('<span class="dashicons dashicons-cover-image"></span>&nbsp; Lazyload Backgrounds', 'lazyload-bg'); ?></a>
			<a href="?page=lazyload-bg&tab=more" class="nav-tab  rounded-t-lg <?php if ($more_tab) : ?>nav-tab-active<?php endif; ?>"><?php echo __('More Help&nbsp;<span class="dashicons dashicons-editor-help"></span>', 'lazyload-bg'); ?></a>

		</nav>
		<?php
		//
		?>
		<div class="tab-content">
			<?php
			define('PBLZBG_LOAD_TEMPLATE', true);
			if ($setting_tab) {
				require_once PBLZBG_PLUGIN_DIR . 'admin/templates/settings.php';
			} else if ($more_tab) {
				require_once PBLZBG_PLUGIN_DIR . 'admin/templates/more.php';
			}
			?>
		</div>
	</div>


<?php
endif;
?>