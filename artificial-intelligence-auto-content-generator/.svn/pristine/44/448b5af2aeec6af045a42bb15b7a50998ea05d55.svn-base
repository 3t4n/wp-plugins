<?php
/**
 * MoMO AutoBlog - Settings Page
 *
 * @author MoMo Themes
 * @package momoacg
 * @since v3.5.0
 */

global $momoacg;
$all_styles = $momoacg->lang->momo_get_all_writing_style();
$is_premium = momoacg_fs()->is_premium();
$disabled   = '';
if ( ! $is_premium ) {
	$disabled = 'disabled';
}
?>
<div class="momo-admin-content-box">
	<div class="momo-ms-admin-content-main momoautoblog-editor-main" id="momoautoblog-editor-main-form">
		<div class="momo-be-block-section" id="momo-auto-blog-section">
			<h2 class="momo-be-block-section-header"><?php esc_html_e( 'Auto Blog', 'momoacg' ); ?><?php echo $is_premium ? '' : '<span class="momo-pro-label">' . esc_html__( 'PRO', 'momoacg' ) . '</span>'; ?></h2>
			<div class="momo-be-msg-block"></div>
			<div class="momo-be-block momo-mt-30">
				<div class="momo-be-messagebox"></div>
				<div class="momo-row momo-mt-20">
					<div class="momo-col">
						<label  class="regular"><?php esc_html_e( 'Add Keywords: AI will write blogs based on the keywords added here. Seperate keywords by comma.', 'momoacg' ); ?>:</label>
						<input type="text" class="full-width " name="momo_autoblog_keywords" placeholder="<?php echo esc_html( 'nepali food, chinese food, indian food' ); ?>" <?php echo esc_attr( $disabled ); ?> >
					</div>
				</div>
				<div class="momo-row momo-mt-20">
					<div class="momo-col">
						<label class="regular">
							<?php esc_html_e( 'Select Category', 'momoacg' ); ?>
						</label>
						<select name="momo_autoblog_category" class="full-width " <?php echo esc_attr( $disabled ); ?>>
						<?php
						$categories = get_categories(
							array(
								'orderby' => 'name',
								'order'   => 'ASC',
							)
						);

						foreach ( $categories as $category ) {
							?>
							<option value="<?php echo esc_attr( $category->term_id ); ?>"><?php echo esc_html( $category->name ); ?></option>
							<?php
						}
						?>
						</select>
					</div>
					<div class="momo-col">
						<label class="regular">
							<?php esc_html_e( 'Writing Style', 'momoacg' ); ?>
						</label>
						<select name="momo_autoblog_writing_style" class="full-width " <?php echo esc_attr( $disabled ); ?>>
							<?php foreach( $all_styles as $value => $name ) : ?>
								<option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $name ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="momo-row momo-mt-20">
					<div class="momo-col">
						<label  class="regular"><?php esc_html_e( 'Number of posts', 'momoacg' ); ?>:</label>
						<select name="momo_autoblog_nop" class="full-width " <?php echo esc_attr( $disabled ); ?>>
							<option value="1"><?php esc_html_e( '1', 'momoacg' ); ?></option>
							<option value="2"><?php esc_html_e( '2', 'momoacg' ); ?></option>
							<option value="3"><?php esc_html_e( '3', 'momoacg' ); ?></option>
							<option value="4"><?php esc_html_e( '4', 'momoacg' ); ?></option>
							<option value="5"><?php esc_html_e( '5', 'momoacg' ); ?></option>
						</select>
					</div>
					<div class="momo-col">
						<label  class="regular"><?php esc_html_e( 'Number of paragraphs', 'momoacg' ); ?>:</label>
						<select name="momo_autoblog_nof_para" class="full-width " <?php echo esc_attr( $disabled ); ?>>
							<option value="1"><?php esc_html_e( '1', 'momoacg' ); ?></option>
							<option value="2"><?php esc_html_e( '2', 'momoacg' ); ?></option>
							<option value="3"><?php esc_html_e( '3', 'momoacg' ); ?></option>
							<option value="4"><?php esc_html_e( '4', 'momoacg' ); ?></option>
							<option value="5"><?php esc_html_e( '5', 'momoacg' ); ?></option>
						</select>
					</div>
				</div>
				<div class="momo-row momo-mt-20">
					<div class="momo-col">
						<label  class="regular"><?php esc_html_e( 'Frequency', 'momoacg' ); ?>:</label>
						<select name="momo_autoblog_per" class="full-width " <?php echo esc_attr( $disabled ); ?>>
							<option value="daily"><?php esc_html_e( 'Day', 'momoacg' ); ?></option>
							<option value="weekly"><?php esc_html_e( 'Week', 'momoacg' ); ?></option>
							<option value="monthly"><?php esc_html_e( 'Month', 'momoacg' ); ?></option>
							<option value="yearly"><?php esc_html_e( 'Year', 'momoacg' ); ?></option>
						</select>
					</div>
					<div class="momo-col">
						<label class="regular">
							<?php esc_html_e( 'Save generated blog as', 'momoacg' ); ?>
						</label>
						<select name="momo_autoblog_status"  class="full-width " <?php echo esc_attr( $disabled ); ?>>
							<option value="momoacg_post_draft"><?php esc_html_e( 'Plugin Draft', 'momoacg' ); ?></option>
							<option value="wp_post_draft"><?php esc_html_e( 'Post Draft', 'momoacg' ); ?></option>
							<option value="wp_post_publish"><?php esc_html_e( 'Post Publish', 'momoacg' ); ?></option>
						</select>
					</div>
				</div>
				<div class="momo-row momo-mt-20">
					<div class="momo-col">
						<label class="regular">
							<?php esc_html_e( 'Generate Title', 'momoacg' ); ?>
						</label>
						<span class="momo-be-toggle-container">
							<label class="switch">
								<input type="checkbox" class="switch-input" name="momo_autoblog_generate_title" autocomplete="off" <?php echo esc_attr( $disabled ); ?>>
								<span class="switch-label" data-on="Yes" data-off="No"></span>
								<span class="switch-handle"></span>
							</label>
						</span>
					</div>
					<div class="momo-col">
						<label class="regular">
							<?php esc_html_e( 'Add Image', 'momoacg' ); ?>
						</label>
						<span class="momo-be-toggle-container">
							<label class="switch">
								<input type="checkbox" class="switch-input" name="momo_autoblog_add_image" autocomplete="off" <?php echo esc_attr( $disabled ); ?>>
								<span class="switch-label" data-on="Yes" data-off="No"></span>
								<span class="switch-handle"></span>
							</label>
						</span>
					</div>
				</div>
				<div class="momo-be-block">
					<span class="button button-primary <?php echo $is_premium ? 'momo-autoblog-generate-queue' : ''; ?> momo-be-float-right"><?php esc_html_e( 'Process', 'momoacg' ); ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
