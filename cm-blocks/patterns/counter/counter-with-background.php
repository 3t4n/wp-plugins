<?php
/**
 * Title: Counter With Background
 * Slug: counter-with-background
 * Categories: codemanas
 * Keywords: codemanas
 * Block Types: codemanas/cmblocks--counter
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>

<!-- wp:cover {"url":"<?php  echo esc_url( plugin_dir_url(__DIR__) .'assets/city.jpg'); ?>","id":766,"dimRatio":60,"overlayColor":"foreground","minHeight":300,"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-cover alignwide" style="padding-top:0;padding-bottom:0;min-height:300px"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-766" alt="" src="<?php  echo esc_url( plugin_dir_url(__DIR__) .'assets/city.jpg'); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignwide" style="padding-top:0;padding-bottom:0"><!-- wp:spacer {"height":"36px"} -->
			<div style="height:36px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"border":{"width":"0px","style":"none","radius":"12px"}},"fontSize":"medium"} -->
			<div class="wp-block-columns has-medium-font-size" style="border-style:none;border-width:0px;border-radius:12px;padding-top:0;padding-bottom:0"><!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
				<div class="wp-block-column" style="padding-top:0;padding-bottom:0"><!-- wp:cmblocks/counter {"title":"Happy Clients","endValue":"231","titleColor":"#ffffff","counterColor":"#ffffff","suffixColor":"#ffffff","counterFontSize":"3.27rem","titleFontSize":"1.05rem","counterAlignment":"center","titleAlignment":"center","startFromScratch":true,"align":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"typography":{"textTransform":"none"}}} -->
					<div class="wp-block-cmblocks-counter aligncenter cmblocks-counter" style="padding-top:0;padding-bottom:0;text-transform:none;background:" role="timer" aria-live="polite" aria-label="<?php esc_html_e('Counter', 'cm-blocks'); ?>"><div class="cmblocks-counter__wrapper" style="background:" data-end-value="231" data-start-value="0" data-duration="1200" data-separator=""><div class="cmblocks-counter__main" style="justify-content:center"><div class="cmblocks-counter__prefix" style="color:;padding-right:0;font-size:3.27rem"></div><div class="cmblocks-counter__counter" style="color:#ffffff;font-size:3.27rem;justify-content:center"><?php esc_html_e('0', 'cm-blocks'); ?></div><div class="cmblocks-counter__suffix" style="color:#ffffff;padding-left:0;font-size:3.27rem"></div></div><div class="cmblocks-counter__title" style="color:#ffffff;font-size:1.05rem;text-align:center"><?php esc_html_e('Happy Clients', 'cm-blocks'); ?></div></div></div>
					<!-- /wp:cmblocks/counter --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:cmblocks/counter {"title":"Awards","endValue":"400","titleColor":"#ffffff","counterColor":"#ffffff","suffixColor":"#ffffff","counterFontSize":"3.27rem","titleFontSize":"1.05rem","counterAlignment":"center","titleAlignment":"center","startFromScratch":true,"align":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
					<div class="wp-block-cmblocks-counter aligncenter cmblocks-counter" style="padding-top:0;padding-bottom:0;background:" role="timer" aria-live="polite" aria-label="<?php esc_html_e('Counter', 'cm-blocks'); ?>"><div class="cmblocks-counter__wrapper" style="background:" data-end-value="400" data-start-value="0" data-duration="1200" data-separator=""><div class="cmblocks-counter__main" style="justify-content:center"><div class="cmblocks-counter__prefix" style="color:;padding-right:0;font-size:3.27rem"></div><div class="cmblocks-counter__counter" style="color:#ffffff;font-size:3.27rem;justify-content:center"><?php esc_html_e('0', 'cm-blocks'); ?></div><div class="cmblocks-counter__suffix" style="color:#ffffff;padding-left:0;font-size:3.27rem"></div></div><div class="cmblocks-counter__title" style="color:#ffffff;font-size:1.05rem;text-align:center"><?php esc_html_e('Awards', 'cm-blocks'); ?></div></div></div>
					<!-- /wp:cmblocks/counter --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:cmblocks/counter {"title":"Projects","endValue":"122","titleColor":"#ffffff","counterColor":"#ffffff","suffixColor":"#ffffff","counterFontSize":"3.27rem","titleFontSize":"1.05rem","counterAlignment":"center","titleAlignment":"center","startFromScratch":true,"align":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
					<div class="wp-block-cmblocks-counter aligncenter cmblocks-counter" style="padding-top:0;padding-bottom:0;background:" role="timer" aria-live="polite" aria-label="<?php esc_html_e('Counter', 'cm-blocks'); ?>"><div class="cmblocks-counter__wrapper" style="background:" data-end-value="122" data-start-value="0" data-duration="1200" data-separator=""><div class="cmblocks-counter__main" style="justify-content:center"><div class="cmblocks-counter__prefix" style="color:;padding-right:0;font-size:3.27rem"></div><div class="cmblocks-counter__counter" style="color:#ffffff;font-size:3.27rem;justify-content:center"><?php esc_html_e('0', 'cm-blocks'); ?></div><div class="cmblocks-counter__suffix" style="color:#ffffff;padding-left:0;font-size:3.27rem"></div></div><div class="cmblocks-counter__title" style="color:#ffffff;font-size:1.05rem;text-align:center"><?php esc_html_e('Projects', 'cm-blocks'); ?></div></div></div>
					<!-- /wp:cmblocks/counter --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:cmblocks/counter {"title":"Hours","endValue":"4","suffix":"K","titleColor":"#ffffff","counterColor":"#ffffff","suffixColor":"#ffffff","counterFontSize":"3.27rem","titleFontSize":"1.05rem","counterAlignment":"center","titleAlignment":"center","startFromScratch":true,"align":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
					<div class="wp-block-cmblocks-counter aligncenter cmblocks-counter" style="padding-top:0;padding-bottom:0;background:" role="timer" aria-live="polite" aria-label="<?php esc_html_e('Counter', 'cm-blocks'); ?>"><div class="cmblocks-counter__wrapper" style="background:" data-end-value="4" data-start-value="0" data-duration="1200" data-separator=""><div class="cmblocks-counter__main" style="justify-content:center"><div class="cmblocks-counter__prefix" style="color:;padding-right:0;font-size:3.27rem"></div><div class="cmblocks-counter__counter" style="color:#ffffff;font-size:3.27rem;justify-content:center"><?php esc_html_e('0', 'cm-blocks'); ?></div><div class="cmblocks-counter__suffix" style="color:#ffffff;padding-left:0px;font-size:3.27rem">K</div></div><div class="cmblocks-counter__title" style="color:#ffffff;font-size:1.05rem;text-align:center"><?php esc_html_e('Hours', 'cm-blocks'); ?></div></div></div>
					<!-- /wp:cmblocks/counter --></div>
				<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer {"height":"36px"} -->
			<div style="height:36px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div>
		<!-- /wp:group --></div></div>
<!-- /wp:cover -->
