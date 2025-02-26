<?php
/**
 * Settings.
 *
 * @since 1.0.0
 * @package AIContentWriter/Admin
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

?>
<div class="wrap aicw-wrap aicw-settings">
	<div class="aicw__header">
		<h1 class="wp-heading-inline">
			<?php esc_html_e( 'Settings', 'ai-content-writer' ); ?>
		</h1>
		<p><?php esc_html_e( 'The following options are the configuration settings for the AI Content Writer plugin.', 'ai-content-writer' ); ?></p>
	</div>
	<hr class="wp-header-end">
	<div class="aicw__body">
		<form id="aicw-form" method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
			<div class="aicw-form__content">
				<div class="field-group field-section">
					<h3><?php esc_html_e( 'General Settings', 'ai-content-writer' ); ?></h3>
					<p><?php esc_html_e( 'The following options are the general settings for the AI Content Writer plugin.', 'ai-content-writer' ); ?></p>
				</div>
				<div class="field-group">
					<div class="field-label">
						<strong><?php esc_html_e( 'Enable AI Content Writer:', 'ai-content-writer' ); ?></strong>
					</div>
					<div class="field">
						<label for="aicw_is_enabled">
							<input name="aicw_is_enabled" id="aicw_is_enabled" type="checkbox" value="yes" <?php checked( get_option( 'aicw_is_enabled' ), 'yes' ); ?>>
							<?php esc_html_e( 'Enable AI Content Writer', 'ai-content-writer' ); ?>
						</label>
						<p class="description"><?php esc_html_e( 'Enable to activate the AI Content Writer plugin features.', 'ai-content-writer' ); ?></p>
					</div>
				</div>
				<div class="field-group">
					<div class="field-label">
						<label for="aicw_api_model"><strong><?php esc_html_e( 'API Model:', 'ai-content-writer' ); ?></strong></label>
					</div>
					<div class="field">
						<select name="aicw_api_model" id="aicw_api_model" class="regular-text">
							<option value="gemini" <?php selected( get_option( 'aicw_api_model' ), 'gemini' ); ?>><?php esc_html_e( 'Gemini', 'ai-content-writer' ); ?></option>
							<option value="chatgpt" <?php selected( get_option( 'aicw_api_model' ), 'chatgpt' ); ?>><?php esc_html_e( 'ChatGPT', 'ai-content-writer' ); ?></option>
						</select>
						<p class="description"><?php esc_html_e( 'Select the AI model to generate content.', 'ai-content-writer' ); ?></p>
					</div>
				</div>
				<div class="field-group">
					<div class="field-label">
						<label for="aicw_gemini_api_key"><strong><?php esc_html_e( 'Gemini API Key:', 'ai-content-writer' ); ?></strong></label>
					</div>
					<div class="field">
						<input type="text" name="aicw_gemini_api_key" id="aicw_gemini_api_key" class="regular-text" value="<?php echo esc_attr( get_option( 'aicw_gemini_api_key' ) ); ?>" />
						<p class="description"><?php esc_html_e( 'Enter your Gemini API key.', 'ai-content-writer' ); ?></p>
					</div>
				</div>
				<div class="field-group">
					<div class="field-label">
						<label for="aicw_chatgpt_api_secret_key"><strong><?php esc_html_e( 'ChatGPT API Secret Key:', 'ai-content-writer' ); ?></strong></label>
					</div>
					<div class="field">
						<input type="text" name="aicw_chatgpt_api_secret_key" id="aicw_chatgpt_api_secret_key" class="regular-text" value="<?php echo esc_attr( get_option( 'aicw_chatgpt_api_secret_key' ) ); ?>" />
						<p class="description"><?php esc_html_e( 'Enter your ChatGPT API secret key.', 'ai-content-writer' ); ?></p>
					</div>
				</div>
				<div class="field-group">
					<div class="field-label">
						<label for="aicw_chatgpt_ai_model"><strong><?php esc_html_e( 'ChatGPT AI Model:', 'ai-content-writer' ); ?></strong></label>
					</div>
					<div class="field">
						<select name="aicw_chatgpt_ai_model" id="aicw_chatgpt_ai_model" class="regular-text">
							<option value="gpt-3.5-turbo" <?php selected( get_option( 'aicw_chatgpt_ai_model' ), 'gpt-3.5-turbo' ); ?>><?php esc_html_e( 'GPT-3.5 Turbo', 'ai-content-writer' ); ?></option>
							<option value="gpt-4" <?php selected( get_option( 'aicw_chatgpt_ai_model' ), 'gpt-4o' ); ?>><?php esc_html_e( 'GPT-4o', 'ai-content-writer' ); ?></option>
							<option value="gpt-4o-mini" <?php selected( get_option( 'aicw_chatgpt_ai_model' ), 'gpt-4o-mini' ); ?>><?php esc_html_e( 'GPT-4o Mini', 'ai-content-writer' ); ?></option>
							<option value="gpt-4-turbo" <?php selected( get_option( 'aicw_chatgpt_ai_model' ), 'gpt-4-turbo' ); ?>><?php esc_html_e( 'GPT-4 Turbo', 'ai-content-writer' ); ?></option>
						</select>
						<p class="description"><?php esc_html_e( 'Select the ChatGPT AI model to generate content.', 'ai-content-writer' ); ?></p>
					</div>
				</div>
				<div class="field-group">
					<div class="field-label">
						<strong><?php esc_html_e( 'Enable Redirection:', 'ai-content-writer' ); ?></strong>
					</div>
					<div class="field">
						<label for="aicw_enable_redirection">
							<input name="aicw_enable_redirection" id="aicw_enable_redirection" type="checkbox" value="yes" <?php checked( get_option( 'aicw_enable_redirection' ), 'yes' ); ?>>
							<?php esc_html_e( 'Enable Redirection', 'ai-content-writer' ); ?>
						</label>
						<p class="description"><?php esc_html_e( 'Enable to redirect to the edit page after successful generation of content from the "Generate Content" page.', 'ai-content-writer' ); ?></p>
					</div>
				</div>
				<div class="field-group field-section">
					<h3><?php esc_html_e( 'Image Settings', 'ai-content-writer' ); ?></h3>
					<p><?php esc_html_e( 'The following options are the image settings for the AI Content Writer plugin.', 'ai-content-writer' ); ?></p>
				</div>
				<div class="field-group">
					<div class="field-label">
						<strong><?php esc_html_e( 'Enable Image Generation:', 'ai-content-writer' ); ?></strong>
					</div>
					<div class="field">
						<label for="aicw_enable_img_generation">
							<input name="aicw_enable_img_generation" id="aicw_enable_img_generation" type="checkbox" value="yes" <?php checked( get_option( 'aicw_enable_img_generation' ), 'yes' ); ?>>
							<?php esc_html_e( 'Enable Thumbnail Image Generation', 'ai-content-writer' ); ?>
						</label>
						<p class="description"><?php esc_html_e( 'Enable to activate the thumbnail image generation feature. AI generated content will have a featured image. This feature requires the Pexels API key.', 'ai-content-writer' ); ?></p>
					</div>
				</div>
				<div class="field-group">
					<div class="field-label">
						<label for="aicw_pexels_api_key"><strong><?php esc_html_e( 'Pexels API Key:', 'ai-content-writer' ); ?></strong></label>
					</div>
					<div class="field">
						<input type="text" name="aicw_pexels_api_key" id="aicw_pexels_api_key" class="regular-text" value="<?php echo esc_attr( get_option( 'aicw_pexels_api_key' ) ); ?>"/>
						<p class="description"><?php esc_html_e( 'Enter your Pexels API key. This key is required to generate thumbnails images for the AI generated content.', 'ai-content-writer' ); ?></p>
					</div>
				</div>
				<div class="field-group">
					<div class="field-submit-btn">
						<button class="button button-primary"><?php esc_html_e( 'Save Changes', 'ai-content-writer' ); ?></button>
					</div>
				</div>
				<input type="hidden" name="action" value="aicw_update_settings">
				<?php wp_nonce_field( 'aicw_update_settings' ); ?>
			</div>
			<div class="aicw-form__aside">
				<div class="aicw__sidebar">
					<div class="aicw__sidebar__header">
						<h2><?php esc_html_e( 'Support', 'ai-content-writer' ); ?></h2>
					</div>
					<div class="aicw__sidebar__body">
						<p><?php esc_html_e( 'If you need help, please contact us.', 'ai-content-writer' ); ?></p>
						<p>
							<a href="https://beautifulplugins.com/support" target="_blank" class="button button-secondary">
								<?php esc_html_e( 'Contact Support', 'ai-content-writer' ); ?>
							</a>
						</p>
					</div>
				</div>
				<div class="aicw__sidebar">
					<div class="aicw__sidebar__header">
						<h2><?php esc_html_e( 'Our Popular Plugins', 'ai-content-writer' ); ?></h2>
					</div>
					<div class="aicw__sidebar__body">
						<ul>
							<li>
								<a href="https://wordpress.org/plugins/advanced-shortcodes/" target="_blank">
									<?php esc_html_e( 'Advanced Shortcodes', 'ai-content-writer' ); ?>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
