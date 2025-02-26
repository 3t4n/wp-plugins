<?php
/**
 * MoMo ACG - Single Create Page
 *
 * @author MoMo Themes
 * @package momoacg
 * @since v2.1.0
 */

global $momoacg;
$languages  = $momoacg->lang->momo_get_all_langs();
$all_styles = $momoacg->lang->momo_get_all_writing_style();

$temperature       = 0.7;
$max_tokens        = 1500;
$top_p             = 0.5;
$frequency_penalty = 0.5;
$presence_penalty  = 0.5;

$is_premium = momoacg_fs()->is_premium();
?>
<div class="momo-admin-content-box">
	<div class="momo-ms-admin-content-main " id="momo_acg_content_generator_form">
		<div class="momo-be-block-section">
			<div class="momo-be-msg-block"></div>
			<div class="momo-be-block">
				<input type="text" class="full-width" name="title" placeholder="<?php esc_html_e( 'Write a travel article about Nepal in 1500 words...', 'momoacg' ); ?>">
			</div>
			<div class="momo-be-block content-generator">
				<textarea rows="15" class="full-width" name="momo_acg_content_generator_content" id="momo_acg_content_generator_content"></textarea>
			</div>
			<div class="momo-be-block">
				<span class="momo-be-btn-extra momo-be-btn momo-content-generator-save-content" id="momo-content-generator-save-content"><?php esc_html_e( 'Save Content', 'momoacg' ); ?></span>
				<span class="momo-be-btn-primary momo-be-btn momo-content-generator-generate-content momo-be-float-right" id="momo-content-generator-generate-content"><?php esc_html_e( 'Generate Content', 'momoacg' ); ?></span>
			</div>		
			<div class="momo-be-block momo-mt-40">
				<div class="momo-be-collapsible">
					<div class="momo-be-collapsible-header">
						<span><?php esc_html_e( 'Content Options', 'momoacg' ); ?></span>
						<i class="bx bx-chevron-down momo-be-collapsible-icon"></i>
					</div>
					<div class="momo-be-collapsible-content">
						<div class="momo-form-container">
							<div class="momo-form-group">
								<label class="regular" for="language"><?php esc_html_e( 'Language', 'momoacg' ); ?></label>
								<select name="language" id="language">
									<?php foreach ( $languages as $lang => $value ) : ?>
										<option value="<?php echo esc_attr( $lang ); ?>"><?php echo esc_html( $value ); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="momo-form-group">
								<label class="regular" for="no_of_paragraph"><?php esc_html_e( 'Paragraph', 'momoacg' ); ?></label>
								<select name="no_of_paragraph" id="no_of_paragraph">
									<option value="1"><?php esc_html_e( '1', 'momoacg' ); ?></option>
									<option value="2"><?php esc_html_e( '2', 'momoacg' ); ?></option>
									<option value="3" selected><?php esc_html_e( '3', 'momoacg' ); ?></option>
									<option value="4"><?php esc_html_e( '4', 'momoacg' ); ?></option>
									<option value="5"><?php esc_html_e( '5', 'momoacg' ); ?></option>
									<option value="6"><?php esc_html_e( '6', 'momoacg' ); ?></option>
									<option value="7"><?php esc_html_e( '7', 'momoacg' ); ?></option>
									<option value="8"><?php esc_html_e( '8', 'momoacg' ); ?></option>
									<option value="9"><?php esc_html_e( '9', 'momoacg' ); ?></option>
									<option value="10"><?php esc_html_e( '10', 'momoacg' ); ?></option>
								</select>
							</div>
							<div class="momo-form-group">
								<label class="regular" for="writing_style"><?php esc_html_e( 'Writing Style', 'momoacg' ); ?></label>
								<select name="writing_style" id="writing_style">
									<?php foreach ( $all_styles as $value => $name ) : ?>
										<option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $name ); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="momo-form-container momo-mt-20">
							<div class="momo-form-group">
								<div class="momo-be-block">
									<span class="momo-be-toggle-container">
										<label class="switch">
											<input type="checkbox" class="switch-input" name="enable_image" autocomplete="off">
											<span class="switch-label" data-on="Yes" data-off="No"></span>
											<span class="switch-handle"></span>
										</label>
									</span>
									<span class="momo-be-toggle-container-label">
										<label class="momo-be-toggle-container-label"><?php esc_html_e( 'Generate Image', 'momoacg' ); ?></label>
									</span>
								</div>
							</div>
							<div class="momo-form-group">
								<div class="momo-be-block">
									<span class="momo-be-toggle-container">
										<label class="switch">
											<input type="checkbox" class="switch-input" name="add_introduction" autocomplete="off">
											<span class="switch-label" data-on="Yes" data-off="No"></span>
											<span class="switch-handle"></span>
										</label>
									</span>
									<span class="momo-be-toggle-container-label">
										<label class="momo-be-toggle-container-label"><?php esc_html_e( 'Add Introduction', 'momoacg' ); ?></label>
									</span>
								</div>
							</div>
							<div class="momo-form-group">
								<div class="momo-be-block">
									<span class="momo-be-toggle-container">
										<label class="switch">
											<input type="checkbox" class="switch-input" name="add_conclusion" autocomplete="off">
											<span class="switch-label" data-on="Yes" data-off="No"></span>
											<span class="switch-handle"></span>
										</label>
									</span>
									<span class="momo-be-toggle-container-label">
										<label class="momo-be-toggle-container-label"><?php esc_html_e( 'Add Conclusion', 'momoacg' ); ?></label>
									</span>
								</div>
							</div>
							<div class="momo-form-group">
								<div class="momo-be-block">
									<span class="momo-be-toggle-container">
										<label class="switch">
											<input type="checkbox" class="switch-input" name="add_para_heading" autocomplete="off">
											<span class="switch-label" data-on="Yes" data-off="No"></span>
											<span class="switch-handle"></span>
										</label>
									</span>
									<span class="momo-be-toggle-container-label">
										<label class="momo-be-toggle-container-label"><?php esc_html_e( 'Add Paragraph Heading', 'momoacg' ); ?></label>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="momo-be-block momo-mt-20">
				<div class="momo-be-collapsible">
					<div class="momo-be-collapsible-header">
						<span><?php esc_html_e( 'Settings', 'momoacg' ); ?></span>
						<i class="bx bx-chevron-down momo-be-collapsible-icon"></i>
					</div>
					<div class="momo-be-collapsible-content">
						<div class="momo-row">
							<div class="momo-padding-12 momo-col-3">
								<div class="momo-be-range-slider-container momo-full-page">
									<label for="temperature" class="block">
										<?php esc_html_e( 'Temperature', 'momoacg' ); ?>
										<span class="momo-be-helper bx bxs-help-circle">
											<span class="momo-be-helper-text">
												<?php esc_html_e( 'Higher temperature generates less accurate but diverse and creative output. Lesser temperature will generate more accurate results.', 'momoacg' ); ?>
											</span>
										</span>
									</label>
									<span class="momo-range-input-holder">
										<input name="temperature" type="range" min="0.1" max="1" step="0.1" value="<?php echo esc_attr( $temperature ); ?>" class="momo-be-range-slider inline" autocomplete="off">
										<span class="momo-be-rs-value"><?php echo esc_html( $temperature ); ?></span>
									</span>
								</div>
							</div>
							<div class="momo-padding-12 momo-col-3">
								<div class="momo-be-range-slider-container momo-full-page">
									<label for="max_tokens" class="block">
										<?php esc_html_e( 'Maximum Tokens', 'momoacg' ); ?>
										<span class="momo-be-helper bx bxs-help-circle">
											<span class="momo-be-helper-text">
												<?php esc_html_e( 'Use it in combination with "Temperature" to control the randomness and creativity of the output.', 'momoacg' ); ?>
											</span>
										</span>
									</label>
									<span class="momo-range-input-holder">
										<input name="max_tokens" type="range" min="0" max="3000" step="30" value="<?php echo esc_attr( $max_tokens ); ?>" class="momo-be-range-slider inline" autocomplete="off">
										<span class="momo-be-rs-value"><?php echo esc_html( $max_tokens ); ?></span>
									</span>
								</div>
							</div>
							<div class="momo-padding-12 momo-col-3">
								<div class="momo-be-range-slider-container momo-full-page">
									<label for="top_p" class="block">
										<?php esc_html_e( 'Top P', 'momoacg' ); ?>
										<span class="momo-be-helper bx bxs-help-circle">
											<span class="momo-be-helper-text">
												<?php esc_html_e( 'To control randomness of the output.', 'momoacg' ); ?>
											</span>
										</span>
									</label>
									<span class="momo-range-input-holder">
										<input name="top_p" type="range" min="0" max="1" step="0.1" value="<?php echo esc_attr( $top_p ); ?>" class="momo-be-range-slider inline" autocomplete="off">
										<span class="momo-be-rs-value"><?php echo esc_html( $top_p ); ?></span>
									</span>
								</div>
							</div>
						</div>
						<div class="momo-row">
							<div class="momo-col momo-col-3">
								<div class="momo-be-range-slider-container momo-full-page">
									<label for="frequency_penalty" class="block">
										<?php esc_html_e( 'Frequency Penalty', 'momoacg' ); ?>
										<span class="momo-be-helper bx bxs-help-circle">
											<span class="momo-be-helper-text">
												<?php esc_html_e( 'For improving the quality and coherence of the generated text.', 'momoacg' ); ?>
											</span>
										</span>
									</label>
									<span class="momo-range-input-holder">
										<input name="frequency_penalty" type="range" min="0" max="2" step="0.2" value="<?php echo esc_attr( $frequency_penalty ); ?>" class="momo-be-range-slider inline" autocomplete="off">
										<span class="momo-be-rs-value"><?php echo esc_html( $frequency_penalty ); ?></span>
									</span>
								</div>
							</div>
							<div class="momo-col momo-col-3">
								<div class="momo-be-range-slider-container momo-full-page">
									<label for="presence_penalty" class="block">
										<?php esc_html_e( 'Presence Penalty', 'momoacg' ); ?>
										<span class="momo-be-helper bx bxs-help-circle">
											<span class="momo-be-helper-text">
												<?php esc_html_e( 'To produce more concise text.', 'momoacg' ); ?>
											</span>
										</span>
									</label>
									<span class="momo-range-input-holder">
										<input name="presence_penalty" type="range" min="0" max="2" step="0.2" value="<?php echo esc_attr( $presence_penalty ); ?>" class="momo-be-range-slider inline" autocomplete="off">
										<span class="momo-be-rs-value"><?php echo esc_html( $presence_penalty ); ?></span>
									</span>
								</div>
							</div>
							<div class="momo-col momo-col-3"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
