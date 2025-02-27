<?php
/**
 * Insert Code Snippets.
 *
 * @since 1.2.0
 * @package InsertCodess
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

?>
	<div class="insertcodes-container">
		<div class="wrap insertcodes-wrap">
			<div class="insertcodes__header">
				<h1 class="wp-heading-inline">
					<?php esc_html_e( 'Insert Code Snippets', 'insert-codes' ); ?>
				</h1>
				<p><?php esc_html_e( 'Below are the code editor fields for inserting code snippets inside the functions.php file.', 'insert-codes' ); ?></p>
			</div>
			<hr class="wp-header-end">
			<div class="insertcodes__body">
				<div class="insertcodes__content">
					<form id="insertcodes-form" method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
						<div class="field-group filed-section">
							<h3><?php esc_html_e( 'PHP Code Snippets', 'insert-codes' ); ?></h3>
						</div>
						<div class="field-group field-editor">
							<div class="field-label">
								<label for="insertcodes_php"><strong><?php esc_html_e( 'PHP Code Snippets:', 'insert-codes' ); ?></strong></label>
							</div>
							<div class="field">
								<textarea type="text" name="insertcodes_php" id="insertcodes_php"><?php echo esc_textarea( get_option( 'insertcodes_php' ) ); ?></textarea>
								<p class="description"><?php esc_html_e( 'These scripts will be executed in the PHP context.', 'insert-codes' ); ?></p>
							</div>
						</div>
						<div class="field-group filed-section">
							<h3><?php esc_html_e( 'Snippets Settings', 'insert-codes' ); ?></h3>
						</div>
						<div class="field-group">
							<div class="field-label">
								<strong><?php esc_html_e( 'Enable Snippets:', 'insert-codes' ); ?></strong>
							</div>
							<div class="field">
								<label for="insertcodes_enable_snippets">
									<input name="insertcodes_enable_snippets" id="insertcodes_enable_snippets" type="checkbox" value="yes" <?php checked( get_option( 'insertcodes_enable_snippets' ), 'yes' ); ?>>
									<?php esc_html_e( 'Enable php code snippet', 'insert-codes' ); ?>
								</label>
								<p class="description"><?php esc_html_e( 'Enabling this will execute the PHP code snippets.', 'insert-codes' ); ?></p>
							</div>
						</div>
						<div class="field-group">
							<div class="field-label">
								<label for="insertcodes_snippets_location"><strong><?php esc_html_e( 'Location:', 'insert-codes' ); ?></strong></label>
							</div>
							<div class="field">
								<select name="insertcodes_snippets_location" id="insertcodes_snippets_location" class="regular-text">
									<option value="everywhere" <?php selected( get_option( 'insertcodes_snippets_location' ), 'everywhere' ); ?>><?php esc_html_e( 'Everywhere', 'insert-codes' ); ?></option>
									<option value="admin_only" <?php selected( get_option( 'insertcodes_snippets_location' ), 'admin_only' ); ?>><?php esc_html_e( 'Admin only', 'insert-codes' ); ?></option>
									<option value="frontend_only" <?php selected( get_option( 'insertcodes_snippets_location' ), 'frontend_only' ); ?>><?php esc_html_e( 'Frontend only', 'insert-codes' ); ?></option>
								</select>
								<p class="description"><?php esc_html_e( 'Select where the code snippet should execute.', 'insert-codes' ); ?></p>
							</div>
						</div>
						<div class="field-group is-last-item">
							<input type="hidden" name="action" value="insertcodes_snippets">
							<?php wp_nonce_field( 'insertcodes_snippets' ); ?>
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
					<div class="aside__item">
						<div class="aside__item__header">
							<h4><?php esc_html_e( 'Important Notes', 'insert-codes' ); ?></h4>
						</div>
						<div class="aside__item__body">
							<ul>
								<li>
									<p>
										<?php esc_html_e( 'Please make sure to test the code snippets before saving if you are using the PHP code snippets feature. Incorrect code can break your website. We recommend to take a backup of your website before saving the code snippets.', 'insert-codes' ); ?>
									</p>
								</li>
								<li>
									<p>
										<?php esc_html_e( '* If you need urgent support, please visit the support forum.', 'insert-codes' ); ?>
										<a href="https://wordpress.org/support/plugin/insert-codes/" target="_blank"><?php esc_html_e( 'Get Support', 'insert-codes' ); ?></a>
									</p>
								</li>
								<li>
									<p>
										<?php esc_html_e( '* If you need help via our site, please visit the support forum. We provide urgent support via our site if your site goes down due to the plugin.', 'insert-codes' ); ?>
										<a href="https://wpfresher.com/contact/" target="_blank"><?php esc_html_e( 'Get Support', 'insert-codes' ); ?></a>
									</p>
								</li>
								<li>
									<p>
										<?php esc_html_e( 'Please remember, the plugin provides the code snippets feature and it is harder to debug the code snippets.', 'insert-codes' ); ?>
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
