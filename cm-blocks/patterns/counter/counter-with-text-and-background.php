<?php
/**
 * Title: Counter With Text And Background
 * Slug: counter-with-text-and-background
 * Categories: codemanas
 * Keywords: codemanas
 * Block Types: codemanas/cmblocks--counter
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>

<!-- wp:cover {"url":"<?php  echo esc_url( plugin_dir_url(__DIR__) .'assets/clocks.jpg'); ?>","id":396,"dimRatio":80,"overlayColor":"contrast","align":"full"} -->
<div class="wp-block-cover alignfull"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-396" alt="" src="<?php  echo esc_url( plugin_dir_url(__DIR__) .'assets/clocks.jpg'); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|base-2"}}},"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"capitalize"},"spacing":{"blockGap":"var:preset|spacing|10"}},"textColor":"base-2","layout":{"type":"constrained"},"fontSize":"xx-large","fontFamily":"heading"} -->
		<div class="wp-block-group alignfull has-base-2-color has-text-color has-link-color has-heading-font-family has-xx-large-font-size" style="font-style:normal;font-weight:600;text-transform:capitalize"><!-- wp:spacer -->
			<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns {"verticalAlignment":"center","align":"wide","fontSize":"x-large"} -->
			<div class="wp-block-columns alignwide are-vertically-aligned-center has-x-large-font-size"><!-- wp:column {"verticalAlignment":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|base-2"}}},"typography":{"textTransform":"none"}},"textColor":"base-2"} -->
				<div class="wp-block-column is-vertically-aligned-center has-base-2-color has-text-color has-link-color" style="text-transform:none"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"38px"},"elements":{"link":{"color":{"text":"var:preset|color|base-2"}}}},"textColor":"base-2","fontFamily":"system-sans-serif"} -->
					<h2 class="wp-block-heading has-text-align-center has-base-2-color has-text-color has-link-color has-system-sans-serif-font-family" style="font-size:38px"><?php esc_html_e('Time is the most valuable thing', 'cm-blocks'); ?></h2>
					<!-- /wp:heading --></div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:cmblocks/counter {"title":"Funds Raised","endValue":"500","prefix":"$","suffix":"K","counterColor":"#f6ecb3","prefixColor":"#f6ecb3","suffixColor":"#f6ecb3","counterFontSize":"3.27rem","titleFontSize":"1.85rem","counterAlignment":"center","titleAlignment":"center","startFromScratch":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
					<div class="wp-block-cmblocks-counter cmblocks-counter" style="font-style:normal;font-weight:700;background:" role="timer" aria-live="polite" aria-label="<?php esc_html_e('Counter', 'cm-blocks'); ?>"><div class="cmblocks-counter__wrapper" style="background:" data-end-value="500" data-start-value="0" data-duration="1200" data-separator=""><div class="cmblocks-counter__main" style="justify-content:center"><div class="cmblocks-counter__prefix" style="color:#f6ecb3;padding-right:0px;font-size:3.27rem"><?php esc_html_e('$', 'cm-blocks'); ?></div><div class="cmblocks-counter__counter" style="color:#f6ecb3;font-size:3.27rem;justify-content:center"><?php esc_html_e('0', 'cm-blocks'); ?></div><div class="cmblocks-counter__suffix" style="color:#f6ecb3;padding-left:0px;font-size:3.27rem"><?php esc_html_e('K', 'cm-blocks'); ?></div></div><div class="cmblocks-counter__title" style="color:;font-size:1.85rem;text-align:center"><?php esc_html_e('Funds Raised', 'cm-blocks'); ?></div></div></div>
					<!-- /wp:cmblocks/counter --></div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:cmblocks/counter {"title":"Templates","endValue":"50","suffix":"+","counterColor":"#f6ecb3","suffixColor":"#f6ecb3","counterFontSize":"3.27rem","titleFontSize":"1.85rem","counterAlignment":"center","titleAlignment":"center","startFromScratch":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
					<div class="wp-block-cmblocks-counter cmblocks-counter" style="font-style:normal;font-weight:700;background:" role="timer" aria-live="polite" aria-label="<?php esc_html_e('Counter', 'cm-blocks'); ?>"><div class="cmblocks-counter__wrapper" style="background:" data-end-value="50" data-start-value="0" data-duration="1200" data-separator=""><div class="cmblocks-counter__main" style="justify-content:center"><div class="cmblocks-counter__prefix" style="color:;padding-right:0;font-size:3.27rem"></div><div class="cmblocks-counter__counter" style="color:#f6ecb3;font-size:3.27rem;justify-content:center"><?php esc_html_e('0', 'cm-blocks'); ?></div><div class="cmblocks-counter__suffix" style="color:#f6ecb3;padding-left:0px;font-size:3.27rem"><?php esc_html_e('+', 'cm-blocks'); ?></div></div><div class="cmblocks-counter__title" style="color:;font-size:1.85rem;text-align:center"><?php esc_html_e('Templates', 'cm-blocks'); ?></div></div></div>
					<!-- /wp:cmblocks/counter --></div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:cmblocks/counter {"title":"Downloads","endValue":"20","suffix":"K+","counterColor":"#f6ecb3","suffixColor":"#f6ecb3","counterFontSize":"3.27rem","titleFontSize":"1.85rem","counterAlignment":"center","titleAlignment":"center","startFromScratch":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
					<div class="wp-block-cmblocks-counter cmblocks-counter" style="font-style:normal;font-weight:700;background:" role="timer" aria-live="polite" aria-label="<?php esc_html_e('Counter', 'cm-blocks'); ?>"><div class="cmblocks-counter__wrapper" style="background:" data-end-value="20" data-start-value="0" data-duration="1200" data-separator=""><div class="cmblocks-counter__main" style="justify-content:center"><div class="cmblocks-counter__prefix" style="color:;padding-right:0;font-size:3.27rem"></div><div class="cmblocks-counter__counter" style="color:#f6ecb3;font-size:3.27rem;justify-content:center"><?php esc_html_e('0', 'cm-blocks'); ?></div><div class="cmblocks-counter__suffix" style="color:#f6ecb3;padding-left:0px;font-size:3.27rem"><?php esc_html_e('K+', 'cm-blocks'); ?></div></div><div class="cmblocks-counter__title" style="color:;font-size:1.85rem;text-align:center"><?php esc_html_e('Downloads', 'cm-blocks'); ?></div></div></div>
					<!-- /wp:cmblocks/counter --></div>
				<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer -->
			<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div>
		<!-- /wp:group --></div></div>
<!-- /wp:cover -->
