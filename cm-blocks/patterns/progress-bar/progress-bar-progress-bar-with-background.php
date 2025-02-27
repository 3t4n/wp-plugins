<?php
/**
 * Title: Progress Bar With Background
 * Slug: progress-bar-progress-bar-with-background
 * Categories: codemanas
 * Keywords: codemanas
 * Block Types: codemanas/cmblocks--progress-bar
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>

<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"><!-- wp:spacer {"height":"60px"} -->
	<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontFamily":"body"} -->
	<h2 class="wp-block-heading has-text-align-center has-body-font-family" style="font-style:normal;font-weight:700"><?php esc_html_e('Graduation Rate', 'cm-blocks'); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"36px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="margin-top:36px"><!-- wp:group {"style":{"color":{"background":"#ececec"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"28px","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"0"},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-background" style="border-radius:8px;background-color:#ececec;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:28px;padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"level":4,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontFamily":"body"} -->
			<h4 class="wp-block-heading has-body-font-family" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:700"><?php esc_html_e('2020', 'cm-blocks'); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:cmblocks/progress-bar {"title":"","percentage":85,"duration":2100,"borderRadius":50,"titleColor":"#3d3d3d","indicatorBackground":"#35a5e1","wrapperBackground":"#f7f7f7","titlePosition":"outside-top","percentagePosition":"append","startFromScratch":true} -->
			<div class="wp-block-cmblocks-progress-bar cmblocks-progress-bar" style="padding-top:30px;height:auto"><div class="cmblocks-progress-bar "><div class="cmblocks-progress-bar__wrapper" style="height:30px;width:100%;border-radius:50px;background:#f7f7f7"><div id="cmProgressBar" class="cmblocks-progress-bar__title" style="display:block;font-size:calc( 30 * 0.55px );color:#3d3d3d;top:-30px"></div><div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="85" aria-labelledby="cmProgressBar" class="cmblocks-progress-bar__indicator" style="height:30px;border-radius:50px 0 0  50px;background:#35a5e1" data-percentage="85" data-duration="2100" data-border-radius="50"><div class="cmblocks-progress-bar__percentage--append" style="display:block;font-size:calc( 30 * 0.55px );color:#2D2D2D;right:calc(-30px - 20px)"><?php esc_html_e('85%', 'cm-blocks'); ?></div></div><div class="cmblocks-progress-bar__percentage" style="display:none;font-size:calc( 30 * 0.55px );color:#2D2D2D;top:5%"><?php esc_html_e('85%', 'cm-blocks'); ?></div></div></div></div>
			<!-- /wp:cmblocks/progress-bar --></div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"color":{"background":"#ececec"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"28px","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"0"},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-background" style="border-radius:8px;background-color:#ececec;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:28px;padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"level":4,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"var:preset|spacing|60"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontFamily":"body"} -->
			<h4 class="wp-block-heading has-body-font-family" style="margin-top:0;margin-bottom:0;margin-left:var(--wp--preset--spacing--60);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:700"><?php esc_html_e('2021', 'cm-blocks'); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:cmblocks/progress-bar {"title":"","percentage":89,"duration":2100,"borderRadius":50,"titleColor":"#3d3d3d","indicatorBackground":"#35a5e1","wrapperBackground":"#f7f7f7","titlePosition":"outside-top","percentagePosition":"append","startFromScratch":true} -->
			<div class="wp-block-cmblocks-progress-bar cmblocks-progress-bar" style="padding-top:30px;height:auto"><div class="cmblocks-progress-bar "><div class="cmblocks-progress-bar__wrapper" style="height:30px;width:100%;border-radius:50px;background:#f7f7f7"><div id="cmProgressBar" class="cmblocks-progress-bar__title" style="display:block;font-size:calc( 30 * 0.55px );color:#3d3d3d;top:-30px"></div><div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89" aria-labelledby="cmProgressBar" class="cmblocks-progress-bar__indicator" style="height:30px;border-radius:50px 0 0  50px;background:#35a5e1" data-percentage="89" data-duration="2100" data-border-radius="50"><div class="cmblocks-progress-bar__percentage--append" style="display:block;font-size:calc( 30 * 0.55px );color:#2D2D2D;right:calc(-30px - 20px)"><?php esc_html_e('89%', 'cm-blocks'); ?></div></div><div class="cmblocks-progress-bar__percentage" style="display:none;font-size:calc( 30 * 0.55px );color:#2D2D2D;top:5%"><?php esc_html_e('89%', 'cm-blocks'); ?></div></div></div></div>
			<!-- /wp:cmblocks/progress-bar --></div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"color":{"background":"#ececec"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"28px","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"0"},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-background" style="border-radius:8px;background-color:#ececec;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:28px;padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"level":4,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontFamily":"body"} -->
			<h4 class="wp-block-heading has-body-font-family" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:700"><?php esc_html_e('2022', 'cm-blocks'); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:cmblocks/progress-bar {"title":"","percentage":79,"duration":2100,"borderRadius":50,"titleColor":"#3d3d3d","indicatorBackground":"#35a5e1","wrapperBackground":"#f7f7f7","titlePosition":"outside-top","percentagePosition":"append","startFromScratch":true} -->
			<div class="wp-block-cmblocks-progress-bar cmblocks-progress-bar" style="padding-top:30px;height:auto"><div class="cmblocks-progress-bar "><div class="cmblocks-progress-bar__wrapper" style="height:30px;width:100%;border-radius:50px;background:#f7f7f7"><div id="cmProgressBar" class="cmblocks-progress-bar__title" style="display:block;font-size:calc( 30 * 0.55px );color:#3d3d3d;top:-30px"></div><div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="79" aria-labelledby="cmProgressBar" class="cmblocks-progress-bar__indicator" style="height:30px;border-radius:50px 0 0  50px;background:#35a5e1" data-percentage="79" data-duration="2100" data-border-radius="50"><div class="cmblocks-progress-bar__percentage--append" style="display:block;font-size:calc( 30 * 0.55px );color:#2D2D2D;right:calc(-30px - 20px)"><?php esc_html_e('79%', 'cm-blocks'); ?></div></div><div class="cmblocks-progress-bar__percentage" style="display:none;font-size:calc( 30 * 0.55px );color:#2D2D2D;top:5%"><?php esc_html_e('79%', 'cm-blocks'); ?></div></div></div></div>
			<!-- /wp:cmblocks/progress-bar --></div>
		<!-- /wp:group --></div>
	<!-- /wp:group -->

	<!-- wp:spacer {"height":"60px"} -->
	<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer --></div>
<!-- /wp:group -->
