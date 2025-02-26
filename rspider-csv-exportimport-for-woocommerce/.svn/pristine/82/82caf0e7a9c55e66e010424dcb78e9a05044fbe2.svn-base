<?php 
     include('rspider-info.php');
?>

<div class="wrap woocommerce">
	<div class="icon32" id="icon-woocommerce-importer"><br></div>
    <h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
        <a href="<?php echo admin_url('admin.php?page=rspider_csv_import_woo') ?>" class="nav-tab <?php echo ($tab == 'import') ? 'nav-tab-active' : ''; ?>"><?php _e('Import Products', 'rspider-csv-export-import-woo'); ?></a><a href="<?php echo admin_url('admin.php?page=rspider_csv_import_woo&tab=export') ?>" class="nav-tab <?php echo ($tab == 'export') ? 'nav-tab-active' : ''; ?>"><?php _e('Export Products', 'rspider-csv-export-import-woo'); ?></a>
    </h2>

	<?php
		switch ($tab) {
			case "export" :
				$this->admin_export_page();
			break;
			default :
				$this->admin_import_page();
			break;
		}
	?>
</div>