<?php
/**
 * Insert Codes into Header, after opening Body tag & Footer.
 *
 * @since 1.0.0
 * @package InsertCodess
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

?>
<div class="insertcodes-container">
	<div class="wrap insertcodes-wrap">
		<div class="insertcodes__header">
			<h1 class="wp-heading-inline">
				<?php esc_html_e( 'Insert Codes', 'insert-codes' ); ?>
			</h1>
			<p><?php esc_html_e( 'Below are the code editor fields for inserting codes inside the header, body & footer.', 'insert-codes' ); ?></p>
		</div>
		<hr class="wp-header-end">
		<div class="insertcodes__body">
			<div class="insertcodes__content">
				<form id="insertcodes-form" method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
					<div class="field-group filed-section">
						<h3><?php esc_html_e( 'Insert Header, Body & Footer Scripts', 'insert-codes' ); ?></h3>
					</div>

					<div class="field-group field-editor">
						<div class="field-label">
							<label for="insertcodes_header"><strong><?php esc_html_e( 'Insert Scripts in Header:', 'insert-codes' ); ?></strong></label>
						</div>
						<div class="field">
							<textarea type="text" name="insertcodes_header" id="insertcodes_header"><?php echo wp_kses( get_option( 'insertcodes_header' ), insertcodes_get_allowed_html() ); ?></textarea>
							<p class="description"><?php printf( /* translators: HTML head tag as string. */ esc_html__( 'These scripts will be printed in the %s section.', 'insert-codes' ), esc_html( htmlspecialchars( '<head>' ) ) ); ?></p>
						</div>
					</div>

					<div class="field-group field-editor">
						<div class="field-label">
							<label for="insertcodes_body"><strong><?php esc_html_e( 'Insert Scripts in Body:', 'insert-codes' ); ?></strong></label>
						</div>
						<div class="field">
							<textarea type="text" name="insertcodes_body" id="insertcodes_body"><?php echo wp_kses( get_option( 'insertcodes_body' ), insertcodes_get_allowed_html() ); ?></textarea>
							<p class="description"><?php printf( /* translators: HTML head tag as string. */ esc_html__( 'These scripts will be printed bellow the %s section.', 'insert-codes' ), esc_html( htmlspecialchars( '<body>' ) ) ); ?></p>
						</div>
					</div>

					<div class="field-group field-editor">
						<div class="field-label">
							<label for="insertcodes_footer"><strong><?php esc_html_e( 'Insert Scripts in Footer:', 'insert-codes' ); ?></strong></label>
						</div>
						<div class="field">
							<textarea type="text" name="insertcodes_footer" id="insertcodes_footer"><?php echo wp_kses( get_option( 'insertcodes_footer' ), insertcodes_get_allowed_html() ); ?></textarea>
							<p class="description"><?php printf( /* translators: HTML head tag as string. */ esc_html__( 'These scripts will be printed bellow the %s section.', 'insert-codes' ), esc_html( htmlspecialchars( '<footer>' ) ) ); ?></p>
						</div>
					</div>

					<div class="field-group is-last-item">
						<input type="hidden" name="action" value="insertcodes_hbf_scripts">
						<?php wp_nonce_field( 'insertcodes_hbf_scripts' ); ?>
						<div class="field-submit-btn">
							<?php submit_button(); ?>
						</div>
					</div>
				</form>
			</div>
			<div class="insertcodes__aside aside__items">
				<div class="aside__item">
					<div class="aside__item__header">
						<h4><?php esc_html_e( 'Support & Rating', 'insert-codes' ); ?></h4>
					</div>
					<div class="aside__item__body">
						<ul>
							<li>
								<p>
									<?php esc_html_e( 'If you need help, please visit the support forum.', 'insert-codes' ); ?>
									<a href="https://wordpress.org/support/plugin/insert-codes/" target="_blank"><?php esc_html_e( 'Get Support', 'insert-codes' ); ?></a>
								</p>
							</li>
							<li>
								<p>
									<?php esc_html_e( 'If you like the plugin, please rate it on WordPress.org.', 'insert-codes' ); ?>
									<a href="https://wordpress.org/plugins/insert-codes/" target="_blank"><?php esc_html_e( 'Give a Rating', 'insert-codes' ); ?></a>
								</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
