<?php
/**
 * MoMO BulkCW - Editor Page
 *
 * @author MoMo Themes
 * @package momoacg
 * @since v1.0.0
 */

?>
<div class="momo-admin-content-box">
	<div class="momo-ms-admin-content-main momobulkcw-editor-main" id="momobulkcw-editor-main-form">
		<div class="momo-be-msg-block"></div>
		<div class="momo-be-block-section" id="momo-bulkcw-title-tow-section">
			<div class="momo-be-block">
				<?php $momoacg->bulkcwfn->momo_echo_bulkcw_title_row(); ?>
			</div>
			<div class="momo-be-block momo-mt-20">
				<span class="momo-be-btn-extra momo-be-btn momo_bulkcw_add_new_title_row"><?php esc_html_e( 'Add to Queue', 'momoacg' ); ?></span>
			</div>
		</div>
		<div class="momo-be-hr-line momo-no-margin-top"></div>
		<div class="momo-be-block-section">
			<div class="momo-be-fixed-table-container">
				<table class="momo-be-table momo-acg-bulkcw-titles-list" data-row_count="0">
					<thead>
						<tr>
							<th><?php esc_html_e( 'Title', 'momoacg' ); ?></th>
							<th><?php esc_html_e( 'Category', 'momoacg' ); ?></th>
							<th><?php esc_html_e( 'Paragraphs', 'momoacg' ); ?></th>
							<th><?php esc_html_e( 'Scheduled', 'momoacg' ); ?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $momoacg->bulkcwfn->momo_echo_bulkcw_queue_list( array() ); ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="momo-center momo-be-generate-bulk-buttons momo-be-right momo-be-block-section">
			<span class="momo-be-btn-primary momo-be-btn momo_bulkcw_generate_bulk_content"><?php esc_html_e( 'Process Queue', 'momoacg' ); ?></span>
		</div>
	</div>
</div>
