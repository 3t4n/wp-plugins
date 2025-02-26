<div class="tool-box" style=' width: calc(100% - 350px);'>

	<h3 class="title"><?php _e('Export Product CSV', 'rspider-csv-export-import-woo'); ?></h3>
	<p><?php _e('Export your products using this tool. This exported CSV will be in an importable format.', 'rspider-csv-export-import-woo'); ?></p>
	<p class="description"><?php _e('Click export to save your products to your computer.', 'rspider-csv-export-import-woo'); ?></p>

	<form action="<?php echo admin_url('admin.php?page=rspider_csv_import_woo&action=export'); ?>" method="post">

		<table class="form-table">
			<tr>
				<th>
					<label for="v_limit"><?php _e( 'Limit', 'rspider-csv-export-import-woo' ); ?></label>
				</th>
				<td>
					<input type="text" name="limit" id="v_limit" placeholder="<?php _e('Unlimited', 'rspider-csv-export-import-woo'); ?>" class="input-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="v_offset"><?php _e( 'Offset', 'rspider-csv-export-import-woo' ); ?></label>
				</th>
				<td>
					<input type="text" name="offset" id="v_offset" placeholder="<?php _e('0', 'rspider-csv-export-import-woo'); ?>" class="input-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="v_columns"><?php _e( 'Columns', 'rspider-csv-export-import-woo' ); ?></label>
				</th>
				<td>
					<select id="v_columns" name="columns[]" data-placeholder="<?php _e('All Columns', 'rspider-csv-export-import-woo'); ?>" class="wc-enhanced-select" multiple="multiple">
						<?php
							foreach ($post_columns as $key => $column) {
								echo '<option value="'.$key.'">'.$column.'</option>';
							}
							echo '<option value="images">'.__('Images (featured and gallery)', 'rspider-csv-export-import-woo').'</option>';
							echo '<option value="file_paths">'.__('Downloadable file paths', 'rspider-csv-export-import-woo').'</option>';
							echo '<option value="taxonomies">'.__('Taxonomies (cat/tags/shipping-class)', 'rspider-csv-export-import-woo').'</option>';
							echo '<option value="attributes">'.__('Attributes', 'rspider-csv-export-import-woo').'</option>';
							echo '<option value="meta">'.__('Meta (custom fields)', 'rspider-csv-export-import-woo').'</option>';

							if ( function_exists( 'woocommerce_gpf_install' ) )
								echo '<option value="gpf">'.__('Google Product Feed fields', 'rspider-csv-export-import-woo').'</option>';
						?>
						</select>
				</td>
			</tr>
			<tr>
				<th>
					<label for="v_include_hidden_meta"><?php _e( 'Include hidden meta data', 'rspider-csv-export-import-woo' ); ?></label>
				</th>
				<td>
					<input type="checkbox" name="include_hidden_meta" id="v_include_hidden_meta" class="checkbox" />
				</td>
			</tr>
		</table>

		<p class="submit"><input type="submit" class="button " value="<?php _e('Export Products', 'rspider-csv-export-import-woo'); ?>" /></p>

	</form>
</div>