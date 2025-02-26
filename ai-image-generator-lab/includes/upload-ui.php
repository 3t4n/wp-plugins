<?php
$isPro = WpzAiImageLab::isPro();
		if (!get_option('wpz_ai_images_key')) {
?>
			<button type="button" class="wpz-ai-images-show button-secondary"><?php esc_html_e('Generate Image with AI', 'wpz-ai-image-lab'); ?></button>
			<div class="wpz-ai-images-upload-ui wpz-ai-images-hidden">
				<p style="flex-basis: 100%;">
					<?php
					printf(
					// translators:  %s are strong tags
						esc_html__('%1$sTo start using AI Image Lab%2$s please follow the instructions on the %3$sAI Image Lab admin page%4$s to connect your site, then refresh this page!', 'wpz-ai-image-lab'),
						'<strong>',
						'</strong>',
                        '<a href="'. esc_url(admin_url('admin.php?page=wpz-ai-images')) . '" target="_blank">',
                        '</a>'
					);
					?> </p>
			</div>
<?php
			return;
		}

        $prompt_modifiers = include( WpzAiImageLab::$pluginDir . 'includes/prompt_modifiers.php' );
		$defaultValues = [];

		foreach ($prompt_modifiers as $category => $modifier) {
			foreach ($modifier['values'] as $value => $valueInfo) {
				if (!empty($valueInfo['default'])) {
					$defaultValues[$category] = $value;
					break;
				}
			}
		}
?>
		<button type="button" class="wpz-ai-images-show button-secondary">Generate Image with AI</button>

		<div class="wpz-ai-images-upload-ui wpz-ai-images-hidden wpz-ai-images-<?php echo($isPro ? 'pro' : 'free'); ?>" data-api-url="<?php echo(esc_attr(self::API_URL)); ?>" data-api-key="<?php echo(esc_attr(get_option('wpz_ai_images_key'))); ?>" data-get-nonce="<?php echo(esc_attr(wp_create_nonce('wpz-ai-images-get'))); ?>" data-settings-save-nonce="<?php echo(esc_attr(wp_create_nonce('wpz-ai-images-settings-save'))); ?>">

			<div class="wpz-ai-images-form">
				<div class="wpz-ai-prompt-generator">
                    <div class="wpz-ai-header">
                        <div class="wpz-ai-header-branding">
                           <img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/logo.svg')); ?>" onload="var $wpzt = jQuery(this); jQuery(document).ready(function() { window.wpzai_update_ui && window.wpzai_update_ui($wpzt.closest('.wpz-ai-images-upload-ui')); });">
                            <h2><?php $isPro ? esc_html_e('AI Image Lab Pro', 'wpz-ai-image-lab') : esc_html_e('AI Image Lab', 'wpz-ai-image-lab'); ?></h2>
                        </div>

                        <div class="wpz-ai-header-links">
                            <a href="<?php echo(esc_url(admin_url('admin.php?page=wpz-ai-images'))); ?>" target="_blank"><?php esc_html_e('Settings', 'wpz-ai-image-lab'); ?></a>
                            <a href="https://wordpress.org/support/plugin/ai-image-generator-lab/"
                               target="_blank"><?php esc_html_e( 'Support', 'wpz-ai-image-lab' ); ?></a>
                            <a href="https://wpzone.co/docs/plugin/ai-image-lab-generator/" target="_blank"><?php esc_html_e('Documentation', 'wpz-ai-image-lab'); ?></a>
                        </div>
                    </div>

                    <div class="wpz-ai-form-body">
                        <div class="wpz-ai-images-toggle wpz-ai-images-edit-image wpz-ai-images-hidden">
                            <h3><a href="#"><?php esc_html_e('Edit Image', 'wpz-ai-image-lab'); ?></a></h3>
							
							<p><?php esc_html_e('Click and drag to select area(s) of the image to re-generate. You can reuse your original text prompt or modify it below.', 'wpz-ai-image-lab'); ?></p>
							
							<p class="wpz-ai-images-notice wpz-ai-images-notice-info">
                                <img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/info-icon.svg')); ?>">
                                <?php esc_html_e('The AI will determine what changes to make to the image, based on the input image and the provided prompt text, if any. In some cases, the output may closely match the original image instead of being changed by the prompt text. In this case, you could try selecting a larger editing area, changing your prompt text, and/or running additional generations.', 'wpz-ai-image-lab'); ?>
							</p>
							
							<div>
								<div class="wpz-ai-image-editor"></div>
								
								<textarea placeholder="<?php esc_attr_e('Enter an image editing prompt', 'wpz-ai-image-lab'); ?>"></textarea>
								
								<?php if ($isPro) { ?>
								<div class="wpz-ai-images-edit-hd">
									<label>
										<input type="checkbox" name="edit_hd">
										<strong>Enable HD image editing mode</strong>
									</label>
									<p><?php esc_html_e('Without HD image editing mode, the longest dimension of the output image will be limited to 768 pixels, regardless of the size of the input image. If HD image editing mode is enabled, the final downloaded image will have its longest dimension be 2048 pixels, but this may also result in unexpected changes to the image.', 'wpz-ai-image-lab'); ?></p>
								</div>
								<?php } ?>
							</div>
						</div>
						
                        <div class="wpz-ai-images-toggle wpz-ai-images-prompt-text wpz-ai-images-active">
                            <h3><a href="#"><?php esc_html_e('Describe Image', 'ai-image-lab'); ?></a></h3>
							
							
                        <div>
							<p class="wpz-ai-images-notice wpz-ai-images-notice-info">
                                <img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/info-icon.svg')); ?>">
                                <?php esc_html_e('Some types of images are better suited for AI Image Lab than others. Particularly, AI Image Lab is currently not good at creating images with multiple faces or images containing text.', 'ai-image-lab'); ?></p>

                        <table>
                            <thead>
                                <tr>
                                    <th><?php esc_html_e('Prompt', 'ai-image-lab'); ?></th>
                                    <th><?php esc_html_e('Priority', 'ai-image-lab'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <textarea placeholder="<?php esc_html_e('Enter prompt keywords here. Optionally, separate phrases with commas.', 'ai-image-lab'); ?>"></textarea>
                                    </td>
                                    <td>
                                        <span class="wpz-ai-images-weight-control">
                                            <button type="button" class="wpz-ai-images-decrease" disabled title="Decrease"><span><?php esc_html_e('Decrease', 'ai-image-lab'); ?></span></button>
                                            <input type="number" min="1" max="5" step="1" value="1">
                                            <button type="button" class="wpz-ai-images-increase" title="Increase"><span><?php esc_html_e('Increase', 'ai-image-lab'); ?></span></button>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">
                                        <button type="button" class="button-primary wpz-ai-images-add" disabled><?php esc_html_e('Add', 'ai-image-lab'); ?></button>
                                        <button type="button" class="button-secondary wpz-ai-clear-text-button"><?php esc_html_e('Clear All Text', 'ai-image-lab'); ?></button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="wpz-ai-images-sample-prompts-container">
                            <div class="wpz-ai-images-sample-prompts-header">
                                <img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/bulb.svg')); ?>">
                                <h4><?php esc_html_e('Need Inspiration?', 'ai-image-lab'); ?></h4>
                            </div>
                            <ul class="wpz-ai-images-sample-prompts">
                                <?php foreach (self::SAMPLE_PROMPTS as $prompt) { ?>
                                    <li>
                                        <a href="#"><?php echo(esc_html($prompt)); ?></a>
                                    </li>
                                <?php } ?>
                            </ul>

                        </div>


                        <div>
                                    <label class="wpz-form-row">
                                        <h4><?php esc_html_e('Quality', 'ai-image-lab'); ?></h4>
                                        <select name="high_quality">
                                            <option value="0"><?php esc_html_e('Faster speed, lower quality', 'ai-image-lab'); ?></option>
                                            <option value="1"><?php esc_html_e('Slower speed, higher quality', 'ai-image-lab'); ?></option>
                                        </select>
                                    </label>
                                    <label class="wpz-form-row">
                                        <h4><?php esc_html_e('Aspect Ratio', 'ai-image-lab'); ?></h4>
                                        <select name="ratio">
                                            <option value="1">1:1 (<?php esc_html_e('square', 'ai-image-lab'); ?>)</option>
                                            <option value="1.5">3:2 (<?php esc_html_e('landscape', 'ai-image-lab'); ?>)</option>
                                            <option value="0.666667">2:3 (<?php esc_html_e('portrait)', 'ai-image-lab'); ?></option>
                                            <option value="1.777778">16:9 (<?php esc_html_e('landscape)', 'ai-image-lab'); ?></option>
                                            <option value="0.5625">9:16 (<?php esc_html_e('portrait)', 'ai-image-lab'); ?></option>
                                            <option value="0"><?php esc_html_e('Custom size', 'ai-image-lab'); ?></option>
                                        </select>
                                    </label>
                                    <label class="wpz-ai-images-hidden wpz-form-row">
                                        <h4><?php esc_html_e('Width', 'ai-image-lab'); ?></h4>
                                        <input name="width" type="number" min="64" max="2048" step="1" value="768">
                                    </label>
                                    <label class="wpz-form-row">
                                        <h4><?php esc_html_e('Height', 'ai-image-lab'); ?></h4>
                                        <input name="height" type="number" min="64" max="2048" step="1" value="768">
                                    </label>
									
									<p class="wpz-ai-images-notice wpz-ai-images-notice-info wpz-ai-images-hd-notice wpz-ai-images-hidden">
										<img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/info-icon.svg')); ?>">
										<span>
											<?php if ($isPro) { ?>
											<strong><?php esc_html_e('HD mode activated!', 'ai-image-lab'); ?></strong><br>
											<?php esc_html_e('Images with a dimension greather than 768px take longer to download after selecting an image, and the downloaded image may vary slightly from the preview.', 'ai-image-lab'); ?>
											<?php } else { ?>
											<strong><?php esc_html_e('Upgrade to Pro for HD mode', 'ai-image-lab'); ?></strong><br>
											<?php
												printf(
													esc_html__('You\'ll need AI Image Lab Pro to generate images with a dimension greather than 768px (up to 2048px!) via HD mode. %sClick here%s for details!', 'ai-image-lab'),
													'<a href="https://wpzone.co/product/ai-image-generator-lab/" target="_blank">',
													'</a>'
												);
											?>
											<?php } ?>
										</span>
									</p>
                    </div>

                            </div>

                        </div>

                        <div class="wpz-ai-images-toggle">
                            <h3><a href="#"><?php esc_html_e('Style', 'ai-image-lab'); ?></a></h3>

                            <div>
                                <?php foreach ( $prompt_modifiers as $category => $modifier) {
                                    $className = 'wpz-ai-prompt-modifier';
                                    isset( $modifier['class']) ? $className .= ' ' . $modifier['class'] : '';
                                    ?>
                                    <div data-category="<?php echo(esc_attr($category)); ?>"
                                            <?php if (isset($modifier['showIfCondition']) && isset($modifier['showIfValue'])) { ?>
                                                data-show-condition="<?php echo(esc_attr($modifier['showIfCondition'])); ?>"
                                                data-show-value="<?php echo(esc_attr($modifier['showIfValue'])); ?>"
                                                <?php
                                                    if (!isset($defaultValues[ $modifier['showIfCondition'] ]) || $defaultValues[ $modifier['showIfCondition'] ] != $modifier['showIfValue']) {
                                                        $className.= ' wpz-ai-images-hidden';
                                                    }
                                                ?>
                                            <?php } ?>
                                    class="<?php echo(esc_attr($className)); ?>">
                                        <h4><?php echo(esc_html($modifier['label'])); ?></h4>
                                        <ul>
                                            <?php foreach ($modifier['values'] as $value => $valueInfo) { ?>
                                                <?php if ($value == 'other') { ?>
                                                    <li class="wpz-ai-images-other">
                                                        <span>
                                                            <select>
                                                                <option value=""><?php esc_html_e('Select', 'ai-image-lab'); ?>...</option>
                                                                <?php foreach ($valueInfo as $otherValue => $otherValueLabel) { ?>
                                                                <option value="<?php echo(esc_attr($otherValue)); ?>"><?php echo(esc_html($otherValueLabel)); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </span>
													<?php if (count($modifier['values']) > 1) { ?>
													<label>&nbsp;</label>
													<?php } ?>
												</li>
											<?php } else { ?>
											<li data-modifier="<?php echo(esc_attr($value)); ?>"<?php if (!empty($valueInfo['default'])) echo(' class="wpz-ai-images-active"'); ?>>
												<a href="#">
                                                    <div>
													    <img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/samples/'.$valueInfo['sample-image'])); ?>" alt="<?php echo(esc_attr(sprintf('%s sample image', $valueInfo['label']))); ?>">
                                                    </div>
                                                    <label><?php echo(esc_html($valueInfo['label'])); ?></label>
												</a>
											</li>
											<?php } ?>
										<?php } ?>
									</ul>
								</div>

							<?php } ?>
                    </div>

					    </div>

                        <div class="wpz-ai-images-footer">
                            Do you need help? View the plugin <a href="https://wordpress.org/support/plugin/ai-image-generator-lab/" target="_blank">support forum</a>. <br>
                            Looking for inspirations? Check AI Image Lab on <a href="https://www.facebook.com/aiimagelab" target="_blank">Facebook</a> or <a href="https://www.instagram.com/aiimagelab" target="_blank">Instagram</a>.
                        </div>

                    </div>
					
					<?php if (!$isPro) { ?>
					<p class="wpz-ai-image-lab-notice wpz-ai-image-lab-notice-error wpz-ai-images-quota-empty-notice wpz-ai-images-hidden">
                        <img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/notifications/error.svg')); ?>">
                        <span>
                            <?php
                            printf(
                                esc_html__('You\'ve used up your quota for the current 24-hour period, so you can\'t generate any new images at this time. Please refresh the page later to check if your quota has been replenished, or %supgrade to AI Image Lab Pro%s!', 'ai-image-lab'),
                                '<a href="https://wpzone.co/product/ai-image-generator-lab/" target="_blank">',
                                '</a>'
                            );
                            ?>
                        </span>
					</p>
					<?php } ?>

					<div class="wpz-ai-images-generate-button-container">
						<button type="button" class="button-primary wpz-ai-generate-button" disabled><?php esc_html_e('Generate Images', 'ai-image-lab'); ?></button>
						<button type="button" class="button-secondary wpz-ai-back-button wpz-ai-images-hidden"><?php esc_html_e('Back', 'ai-image-lab'); ?></button>
					</div>

				</div>

			</div>

			<div class="wpz-ai-images-results-container">
                <div class="wpz-ai-images-title-wrapper">
				<h3 class="wpz-ai-title"><?php esc_html_e('Generated Images', 'ai-image-lab'); ?></h3>
                <div class="wpz-ai-social-media">
                    Find Us On
                    <a class="wpz-ai-image-lab-settings-header-link"
                       href="https://www.facebook.com/aiimagelab" target="_blank"><?php esc_html_e( 'Facebook', 'wpz-ai-image-lab' ); ?></a>
                     and
                    <a class="wpz-ai-image-lab-settings-header-link"
                       href="https://www.instagram.com/aiimagelab" target="_blank"><?php esc_html_e( 'Instagram', 'wpz-ai-image-lab' ); ?></a>
                </div>
                </div>
				
				<?php if (!$isPro) { ?>
				<div class="wpz-ai-images-quota-notice">
                    <div class="wpz-ai-image-lab-notice wpz-ai-image-lab-notice-info">
                        <img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/notifications/warning-circle.svg')); ?>">
                        <div>
                        <?php printf(
                            esc_html__('You have %s image(s) left in your download quota for today (when we last checked). Your quota is not reduced by generating image previews, only when you select an image to download to your site. The watermark on the image preview will be removed when it is downloaded to your site. To generate more images per day, and enjoy other features such as higher maximum image resolution, check out %sAI Image Lab Pro%s!', 'ai-image-lab'),
                            '<span class="wpz-ai-images-quota-notice-number">?</span>',
                            '<a href="https://wpzone.co/product/ai-image-generator-lab/" target="_blank">',
                            '</a>'
                        ); ?>
                        </div>
                    </div>
				</div>
				<?php } ?>
				
				<div class="wpz-ai-images-notice">
					<h4>
						<img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/exclamation_mark_icon.svg')); ?>" alt="Exclamation mark icon"><br>
						<?php esc_html_e('Unfortunately, this is taking longer than expected.', 'ai-image-lab'); ?>
					</h4>
					<p><?php esc_html_e('We aim to have your first image preview complete within 30 seconds of your request, but in case our servers are extra busy right now, please wait for at least a minute before trying again.', 'ai-image-lab'); ?></p>
					<p><?php esc_html_e('If you are still not able to generate your images after a second attempt, you may be encountering one of the following situations', 'ai-image-lab'); ?>:</p>
					<ul>
						<li><strong><?php esc_html_e('AI Image Lab is super popular right now!', 'ai-image-lab'); ?></strong> <?php esc_html_e('If our servers are too busy to accept new requests within a reasonable timeframe, please try again later.', 'ai-image-lab'); ?></li>
                        <li><strong><?php esc_html_e('You\'ve been extra busy!', 'ai-image-lab'); ?> </strong> <?php esc_html_e('We do have some limitations on how many images you can generate within specific timeframes to help ensure that our service remains available for all users. If you have generated a lot of images within a 24 hour period, please try again tomorrow.', 'ai-image-lab'); ?></p></li>
						<li><strong><?php esc_html_e('Your prompt was blocked', 'ai-image-lab'); ?></strong> <?php esc_html_e('Our AI may not permit certain prompts based on their content, possibly including NSFW prompts and prompts that violate our terms of use. If you think this is the case, please try a different prompt.', 'ai-image-lab'); ?></li>
					</ul>
					<button type="button" class="button-primary wpz-ai-images-notice-close-button">Close</button>
				</div>

				<ul class="wpz-ai-images-results wpz-ai-images-placeholders">
					<li>
						<a href="#"><img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" data-placeholder-src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" alt="Generated image placeholder"></a>
                        <div class="wpz-ai-tooltip-box">
                            <span class="wpz-ai-tooltip-box-text-uploading"><?php esc_html_e('Uploading... This may take a bit, especially for higher image resolutions.', 'ai-image-lab'); ?></span>
                            <span class="wpz-ai-tooltip-box-text-watermark"><?php esc_html_e('Downloaded files will not contain visible watermarks.', 'ai-image-lab'); ?></span>
                        </div>
                    </li>
					<li>
                        <a href="#"><img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" data-placeholder-src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" alt="Generated image placeholder"></a>
                        <div class="wpz-ai-tooltip-box">
                            <span class="wpz-ai-tooltip-box-text-uploading"><?php esc_html_e('Uploading... This may take a bit, especially for higher image resolutions.', 'ai-image-lab'); ?></span>
                            <span class="wpz-ai-tooltip-box-text-watermark"><?php esc_html_e('Downloaded files will not contain visible watermarks.', 'ai-image-lab'); ?></span>
                        </div>
                    </li>
					<li>
                        <a href="#"><img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" data-placeholder-src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" alt="Generated image placeholder"></a>
                        <div class="wpz-ai-tooltip-box">
                            <span class="wpz-ai-tooltip-box-text-uploading"><?php esc_html_e('Uploading... This may take a bit, especially for higher image resolutions.', 'ai-image-lab'); ?></span>
                            <span class="wpz-ai-tooltip-box-text-watermark"><?php esc_html_e('Downloaded files will not contain visible watermarks.', 'ai-image-lab'); ?></span>
                        </div>
                    </li>
					<li>
                        <a href="#"><img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" data-placeholder-src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" alt="Generated image placeholder"></a>
                        <div class="wpz-ai-tooltip-box">
                            <span class="wpz-ai-tooltip-box-text-uploading"><?php esc_html_e('Uploading... This may take a bit, especially for higher image resolutions.', 'ai-image-lab'); ?></span>
                            <span class="wpz-ai-tooltip-box-text-watermark"><?php esc_html_e('Downloaded files will not contain visible watermarks.', 'ai-image-lab'); ?></span>
                        </div>
                    </li>
					<li>
						<a href="#"><img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" data-placeholder-src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" alt="Generated image placeholder">
                        </a>
                        <div class="wpz-ai-tooltip-box">
                            <span class="wpz-ai-tooltip-box-text-uploading"><?php esc_html_e('Uploading... This may take a bit, especially for higher image resolutions.', 'ai-image-lab'); ?></span>
                            <span class="wpz-ai-tooltip-box-text-watermark"><?php esc_html_e('Downloaded files will not contain visible watermarks.', 'ai-image-lab'); ?></span>
                        </div>
                    </li>
					<li>
                        <a href="#"><img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" data-placeholder-src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" alt="Generated image placeholder">
                        </a>
                            <div class="wpz-ai-tooltip-box">
                                <span class="wpz-ai-tooltip-box-text-uploading"><?php esc_html_e('Uploading... This may take a bit, especially for higher image resolutions.', 'ai-image-lab'); ?></span>
                                <span class="wpz-ai-tooltip-box-text-watermark"><?php esc_html_e('Downloaded files will not contain visible watermarks.', 'ai-image-lab'); ?></span>
                            </div>
					</li>
					<li<?php if (!$isPro) echo(' class="wpz-ai-images-hidden"'); ?>>
                        <a href="#"><img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" data-placeholder-src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" alt="Generated image placeholder">
                        </a>
                        <div class="wpz-ai-tooltip-box">
                            <span class="wpz-ai-tooltip-box-text-uploading"><?php esc_html_e('Uploading... This may take a bit, especially for higher image resolutions.', 'ai-image-lab'); ?></span>
                            <span class="wpz-ai-tooltip-box-text-watermark"><?php esc_html_e('Downloaded files will not contain visible watermarks.', 'ai-image-lab'); ?></span>
                        </div>
					</li>
					<li<?php if (!$isPro) echo(' class="wpz-ai-images-hidden"'); ?>>
                        <a href="#"><img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" data-placeholder-src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" alt="Generated image placeholder">
                        </a>
                        <div class="wpz-ai-tooltip-box">
                            <span class="wpz-ai-tooltip-box-text-uploading"><?php esc_html_e('Uploading... This may take a bit, especially for higher image resolutions.', 'ai-image-lab'); ?></span>
                            <span class="wpz-ai-tooltip-box-text-watermark"><?php esc_html_e('Downloaded files will not contain visible watermarks.', 'ai-image-lab'); ?></span>
                        </div>
					</li>
					<li<?php if (!$isPro) echo(' class="wpz-ai-images-hidden"'); ?>>
                        <a href="#"><img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" data-placeholder-src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" alt="Generated image placeholder">
                        </a>
                        <div class="wpz-ai-tooltip-box">
                            <span class="wpz-ai-tooltip-box-text-uploading"><?php esc_html_e('Uploading... This may take a bit, especially for higher image resolutions.', 'ai-image-lab'); ?></span>
                            <span class="wpz-ai-tooltip-box-text-watermark"><?php esc_html_e('Downloaded files will not contain visible watermarks.', 'ai-image-lab'); ?></span>
                        </div>
					</li>
					<li<?php if (!$isPro) echo(' class="wpz-ai-images-hidden"'); ?>>
                        <a href="#"><img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" data-placeholder-src="<?php echo(esc_url(self::$pluginUrl.'assets/img/image-placeholder.svg')); ?>" alt="Generated image placeholder">
                        </a>
                        <div class="wpz-ai-tooltip-box">
                            <span class="wpz-ai-tooltip-box-text-uploading"><?php esc_html_e('Uploading... This may take a bit, especially for higher image resolutions.', 'ai-image-lab'); ?></span>
                            <span class="wpz-ai-tooltip-box-text-watermark"><?php esc_html_e('Downloaded files will not contain visible watermarks.', 'ai-image-lab'); ?></span>
                        </div>
					</li>
				</ul>
				
				<div class="wpz-ai-images-feedback">
					<h4><?php esc_html_e('How would you rate these results?', 'ai-image-lab'); ?></h4>
					
					<p class="wpz-ai-images-feedback-complete"><?php esc_html_e('Thank you!', 'ai-image-lab'); ?></p>
					
					<ol class="wpz-ai-images-feedback-stars">
						<li><button type="button" title="<?php esc_attr_e('Rate 1 of 5'); ?>"></button></li>
						<li><button type="button" title="<?php esc_attr_e('Rate 2 of 5'); ?>"></button></li>
						<li><button type="button" title="<?php esc_attr_e('Rate 3 of 5'); ?>"></button></li>
						<li><button type="button" title="<?php esc_attr_e('Rate 4 of 5'); ?>"></button></li>
						<li><button type="button" title="<?php esc_attr_e('Rate 5 of 5'); ?>"></button></li>
					</ol>
					
					<div>
                        <label><h4><?php esc_html_e('Feedback (optional):', 'ai-image-lab'); ?></h4></label>
						<textarea class="wpz-ai-images-feedback-text"></textarea>
					</div>
					
					<div>
						<button type="button" class="wpz-ai-images-feedback-submit button-secondary"><?php esc_html_e('Submit', 'ai-image-lab'); ?></button>
					</div>
					
					<p><?php esc_html_e('Your feedback will be linked to the current request.', 'ai-image-lab'); ?></p>
					
				</div>
			</div>
		</div>
<?php
