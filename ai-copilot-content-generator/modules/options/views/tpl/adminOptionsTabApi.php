<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$props = $this->props;
$options = WaicUtils::getArrayValue($props['options'], 'api', array(), 2);
$variations = WaicUtils::getArrayValue($props['variations'], 'api', array(), 2);
$defaults = WaicUtils::getArrayValue($props['defaults'], 'api', array(), 2);
$readOnly = WaicUtils::getArrayValue($props, 'read_only') == 1;
$tokens = WaicUtils::getArrayValue($variations, 'tokens', array(), 2);
$curModel = WaicUtils::getArrayValue($options, 'model', $defaults['model']);
?>
<section class="wbw-body-options-api">
	<div class="wbw-settings-form row">
		<div class="wbw-settings-label col-2"><?php esc_html_e('Open AI API key', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Connect your OpenAI API key to enable our plugin to utilize the capabilities of OpenAI directly on your website. This key is essential for accessing OpenAI\'s advanced AI features, including content generation, language understanding, and more, ensuring your site benefits from the latest in AI technology.', 'ai-copilot-content-generator'); ?>">
			<div class="wbw-settings-field">
			<?php 
				WaicHtml::text('api[api_key]', array(
					'value' => WaicUtils::getArrayValue($options, 'api_key', ''),
					'attrs' => 'placeholder="' . esc_attr__('Enter your Open AI Api', 'ai-copilot-content-generator') . '"'
				));
			?>
			</div>
		</div>
	</div>
	<div class="wbw-group-info">
		<div class="wbw-alert-info">
			<?php esc_html_e('Don\'t have an OpenAI account?', 'ai-copilot-content-generator'); ?> <a href="#" target="_blank"><?php esc_html_e('Explore this guide', 'ai-copilot-content-generator'); ?></a> <?php esc_html_e('to create an account and obtain your API key.', 'ai-copilot-content-generator'); ?>
		</div>
	</div>
	<div class="wbw-group-title">
		<?php esc_html_e('Generation setup', 'ai-copilot-content-generator'); ?>
	</div>
	<div class="wbw-settings-form row">
		<div class="wbw-settings-label col-2"><?php esc_html_e('Model', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Select the model you wish to use for content generation. Different models have varying capabilities, such as language understanding and creativity.', 'ai-copilot-content-generator'); ?>">
			<div class="wbw-settings-field">
			<?php 
				WaicHtml::selectbox('api[model]', array(
					'options' => $variations['model'],
					'value' => $curModel,
					'attrs' => 'id="waicApiModel" data-tokens="' . htmlentities(WaicUtils::jsonEncode($tokens), ENT_COMPAT) . '"',
				));
			?>
			</div>
		</div>
	</div>
	<div class="wbw-settings-form row">
		<div class="wbw-settings-label col-2"><?php esc_html_e('Image model', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Select the model you wish to use for image generation.', 'ai-copilot-content-generator'); ?>">
			<div class="wbw-settings-field">
			<?php 
				WaicHtml::selectbox('api[img_model]', array(
					'options' => $variations['img_model'],
					'value' => WaicUtils::getArrayValue($options, 'img_model', $defaults['img_model']),
				));
			?>
			</div>
		</div>
	</div>
	<div class="wbw-settings-form row">
		<div class="wbw-settings-label col-2"><?php esc_html_e('Language', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Choose the language in which you want your content generated.', 'ai-copilot-content-generator'); ?>">
			<div class="wbw-settings-field">
			<?php
				WaicHtml::selectbox('api[language]', array(
					'options' => $variations['language'],
					'value' => WaicUtils::getArrayValue($options, 'language', $defaults['language']),
				));
			?>
			</div>
		</div>
	</div>
	<div class="wbw-settings-form row wbw-mb-ver10">
		<div class="wbw-settings-label col-2"><?php esc_html_e('Tone of voice', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Specify the desired tone of voice for the generated content.', 'ai-copilot-content-generator'); ?>">
			<div class="wbw-settings-field">
			<?php
				WaicHtml::selectbox('api[tone]', array(
					'options' => $variations['tone'],
					'value' => WaicUtils::getArrayValue($options, 'tone', $defaults['tone']),
				));
			?>
			</div>
		</div>
	</div>
	<div class="wbw-settings-form row wbw-mb-ver10">
		<div class="wbw-settings-label col-2"></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Enable this option if you want the article body to be written in simple, common language that is easy to understand. This setting ensures that the content is accessible to a broad audience by avoiding technical jargon and complex terms.', 'ai-copilot-content-generator'); ?>">
			<?php
				WaicHtml::checkbox('api[common_language]', array(
					'checked' => WaicUtils::getArrayValue($options, 'common_language', 0, 1),
				));
			?>
			<div class="wbw-settings-label"><?php esc_html_e('Use Only Common Language', 'ai-copilot-content-generator'); ?></div>
		</div>
	</div>
	<div class="wbw-settings-form row wbw-mb-ver10">
		<div class="wbw-settings-label col-2"></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Enable this option if you want the article body to be written in a natural, human-like style. This setting ensures that the generated content mimics the tone and flow of human writing, making it more engaging and relatable for readers.', 'ai-copilot-content-generator'); ?>">
			<?php
				WaicHtml::checkbox('api[human_style]', array(
					'checked' => WaicUtils::getArrayValue($options, 'human_style', 0, 1),
				));
			?>
			<div class="wbw-settings-label"><?php esc_html_e('Use Only Human-Like Language Style', 'ai-copilot-content-generator'); ?></div>
		</div>
	</div>
	<div class="wbw-settings-form row wbw-nomargin-ver">
		<div class="wbw-settings-label col-2"><?php esc_html_e('Temperature', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Adjust the creativity of the generated content. A higher temperature results in more creative outputs, while a lower temperature produces more predictable text.', 'ai-copilot-content-generator'); ?>">
			<div class="wbw-settings-field">
			<?php
				WaicHtml::slider('api[temperature]', array(
					'value' => WaicUtils::getArrayValue($options, 'temperature', $defaults['temperature']),
					'min' => 0,
					'max' => 1,
					'step' => '0.01',
					'hide-min-max' => 1,
					'class' => ( $readOnly ? 'disabled' : '' ),
				));
			?>
			</div>
		</div>
	</div>
	<div class="wbw-settings-form row wbw-nomargin-ver">
		<div class="wbw-settings-label col-2"><?php esc_html_e('Max tokens', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Set the maximum number of tokens (words and characters) for the generated content. Higher numbers allow for longer outputs.', 'ai-copilot-content-generator'); ?>">
			<div class="wbw-settings-field">
			<?php
				WaicHtml::slider('api[tokens]', array(
					'value' => WaicUtils::getArrayValue($options, 'tokens', $defaults['tokens']),
					'min' => 1,
					'max' => WaicUtils::getArrayValue($tokens, $curModel, 4096, 1),
					'step' => '1',
					'hide-min-max' => 1,
					'class' => ( $readOnly ? 'disabled' : '' ),
					'id' => 'waicApiTokens',
				));
			?>
			</div>
		</div>
	</div>
	<div class="wbw-settings-form row wbw-nomargin-ver">
		<div class="wbw-settings-label col-2"><?php esc_html_e('Requests per minute', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Set the maximum requests per minute.', 'ai-copilot-content-generator'); ?>">
			<div class="wbw-settings-field">
			<?php
				WaicHtml::slider('api[pre_minute]', array(
					'value' => WaicUtils::getArrayValue($options, 'pre_minute', $defaults['pre_minute']),
					'min' => 1,
					'max' => 20,
					'step' => '1',
					'hide-min-max' => 1,
					'class' => ( $readOnly ? 'disabled' : '' ),
				));
			?>
			</div>
		</div>
	</div>
	<div class="wbw-group-title">
		<?php esc_html_e('Advanced settings', 'ai-copilot-content-generator'); ?>
	</div>
	<div class="wbw-settings-form row wbw-nomargin-ver">
		<div class="wbw-settings-label col-2"><?php esc_html_e('Top P', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Control the diversity of the generated content by setting the probability threshold. Higher values allow more variation in the responses.', 'ai-copilot-content-generator'); ?>">
			<div class="wbw-settings-field">
			<?php
				WaicHtml::slider('api[top_p]', array(
					'value' => WaicUtils::getArrayValue($options, 'top_p', $defaults['top_p']),
					'min' => 0,
					'max' => 1,
					'step' => '0.01',
					'hide-min-max' => 1,
					'class' => ( $readOnly ? 'disabled' : '' ),
				));
			?>
			</div>
		</div>
	</div>
	<div class="wbw-settings-form row wbw-nomargin-ver">
		<div class="wbw-settings-label col-2"><?php esc_html_e('Frequency penalty', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Adjust this to decrease or increase the likelihood of repeating the same information in the output. Negative values make repetition more likely.', 'ai-copilot-content-generator'); ?>">
			<div class="wbw-settings-field">
			<?php
				WaicHtml::slider('api[frequency]', array(
					'value' => WaicUtils::getArrayValue($options, 'frequency', $defaults['frequency']),
					'min' => -2,
					'max' => 2,
					'step' => '0.01',
					'hide-min-max' => 1,
					'class' => ( $readOnly ? 'disabled' : '' ),
				));
			?>
			</div>
		</div>
	</div>
	<div class="wbw-settings-form row wbw-nomargin-ver">
		<div class="wbw-settings-label col-2"><?php esc_html_e('Presence penalty', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-settings-fields col-10">
			<img src="<?php echo esc_url(WAIC_IMG_PATH . '/info.png'); ?>" class="wbw-tooltip" title="<?php esc_html_e('Modify this to discourage or encourage the presence of new.', 'ai-copilot-content-generator'); ?>">
			<div class="wbw-settings-field">
			<?php
				WaicHtml::slider('api[presence]', array(
					'value' => WaicUtils::getArrayValue($options, 'presence', $defaults['presence']),
					'min' => -2,
					'max' => 2,
					'step' => '0.01',
					'hide-min-max' => 1,
					'class' => ( $readOnly ? 'disabled' : '' ),
				));
			?>
			</div>
		</div>
	</div>
</section>