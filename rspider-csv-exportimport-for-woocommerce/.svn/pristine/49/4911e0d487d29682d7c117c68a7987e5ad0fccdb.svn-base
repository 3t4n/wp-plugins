<div class="tool-box" style=' width: calc(100% - 350px);'>

	<h3 class="title"><?php _e('Export Product Variations CSV', 'rspider-csv-export-import-woo'); ?></h3>
	<p><?php _e('Export your product variations using this tool. This exported CSV will be in an importable format.', 'rspider-csv-export-import-woo'); ?></p>
	<p class="description"><?php _e('Click export to save your products variations to your computer.', 'rspider-csv-export-import-woo'); ?></p>

	<form action="<?php echo admin_url('admin.php?page=rspider_csv_import_woo&action=export_variations'); ?>" method="post">

		<table class="form-table">
			<tr>
				<th>
					<label for="limit"><?php _e( 'Limit', 'rspider-csv-export-import-woo' ); ?></label>
				</th>
				<td>
					<input type="text" name="limit" id="limit" placeholder="<?php _e('Unlimited', 'rspider-csv-export-import-woo'); ?>" class="input-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="offset"><?php _e( 'Offset', 'rspider-csv-export-import-woo' ); ?></label>
				</th>
				<td>
					<input type="text" name="offset" id="offset" placeholder="<?php _e('0', 'rspider-csv-export-import-woo'); ?>" class="input-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="product"><?php _e( 'Limit to parent ID(s)', 'rspider-csv-export-import-woo' ); ?></label>
				</th>
				<td>
					<input type="text" name="product_limit" id="product_limit" placeholder="<?php _e( 'N/A', 'rspider-csv-export-import-woo' ); ?>" class="input-text" /> <span class="description"><?php _e( 'Comma separate IDs', 'rspider-csv-export-import-woo' ); ?></span>
				</td>
			</tr>
			<tr>
				<th>
					<label for="columns"><?php _e( 'Columns', 'rspider-csv-export-import-woo' ); ?></label>
				</th>
				<td>
					<select id="columns" name="columns[]" data-placeholder="<?php _e('All Columns', 'rspider-csv-export-import-woo'); ?>" class="wc-enhanced-select" multiple="multiple">
						<?php
							foreach ( $variation_columns as $key => $column ) {
								echo '<option value="'.$key.'">'.$column.'</option>';
							}
							echo '<option value="images">'.__('Images (featured and gallery)', 'rspider-csv-export-import-woo').'</option>';
							echo '<option value="taxonomies">'.__('Taxonomies (cat/tags/shipping-class)', 'rspider-csv-export-import-woo').'</option>';
							echo '<option value="meta">'.__('Meta (custom fields)', 'rspider-csv-export-import-woo').'</option>';
						?>
						</select>
				</td>
			</tr>
			<tr>
				<th>
					<label for="include_hidden_meta"><?php _e( 'Include hidden meta data', 'rspider-csv-export-import-woo' ); ?></label>
				</th>
				<td>
					<input type="checkbox" name="include_hidden_meta" id="include_hidden_meta" class="checkbox" />
				</td>
			</tr>
		</table>

		<p class="submit"><input type="submit" class="button" value="<?php _e('Export Variations', 'rspider-csv-export-import-woo'); ?>" /></p>

	</form>
</div>