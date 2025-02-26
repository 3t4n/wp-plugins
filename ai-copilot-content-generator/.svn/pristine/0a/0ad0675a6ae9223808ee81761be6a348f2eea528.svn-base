<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$props = $this->props;
$module = $this->getModule();
$isApiKey = !empty($props['api_key']);
if ( !$isApiKey ) { 
?>
	<div class="wbw-alert-block wbw-alert-aikey">
		<div class="wbw-alert-title"><span>!</span> <?php echo esc_html_e('Connect your Open AI API Key', 'ai-copilot-content-generator'); ?></div>
		<div class="wbw-aikey-form">
			<span><?php echo esc_html_e('Open AI API key', 'ai-copilot-content-generator'); ?></span>
				<?php 
					WaicHtml::text('waic_api_key', array(
						'value' => '',
						'attrs' => 'id="wpbApiKeyField" placeholder="' . esc_attr__('Enter your Open AI Api key', 'ai-copilot-content-generator') . '"'
					));
				?>
				<button class="wbp-button wbw-button-form wbw-button-small" id="wpbSaveApiKey"><?php echo esc_html_e('Save', 'ai-copilot-content-generator'); ?></button>
			</div>
		<div class="wbw-alert-info"><?php esc_html_e('Don\'t have an OpenAI account?', 'ai-copilot-content-generator'); ?> <a href="#" target="_blank"><?php esc_html_e('Explore this guide', 'ai-copilot-content-generator'); ?></a> <?php esc_html_e('to create an account and obtain your API key.', 'ai-copilot-content-generator'); ?></div>
	</div>
<?php } ?>
<section class="wbw-body-workspace">
<?php foreach ($props['features'] as $block => $group) { ?>
	<div class="wbw-group-title">
		<?php echo esc_html($group['title']); ?>
	</div>
	<ul class="wbw-ws-group">
	<?php foreach ($group['blocks'] as $key => $data) { ?>
		<li class="wbw-ws-block<?php echo $isApiKey && $data['active'] ? ' active' : ''; ?>">
			<?php if (!empty($data['add'])) require('adminFeature' . waicStrFirstUp($data['add']) . '.php'); ?>
			<div class="wbw-ws-title">
				<img src="<?php echo esc_url($props['img_path'] . '/' . ( empty($block) ? '' : $block . '-' ) . $key . '.png'); ?>" alt="?">
				<div class="wbw-ws-title-text">
					<?php echo esc_html($data['title']); ?>
				</div>
			</div>
			<div class="wbw-ws-desc"><?php echo esc_html($data['desc']); ?></div>
			<?php if ($data['active']) { ?>
				<a href="<?php echo esc_url($module->getFeatureUrl( $block . $key )); ?>" class="wbw-hidden wbw-feature-link"></a>
			<?php } ?>
		</li>
	<?php } ?>
	</ul>
	<div class="wbw-clear"></div>
<?php } ?>
</section>
