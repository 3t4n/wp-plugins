<?php
/**
 * Title: Portfolio Progress Bar
 * Slug: progress-bar-portfolio
 * Categories: codemanas
 * Keywords: codemanas
 * Block Types: codemanas/cmblocks--progress-bar
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>

<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"><!-- wp:spacer -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:columns {"verticalAlignment":"bottom","align":"wide","style":{"spacing":{"blockGap":{"left":"24px"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-bottom"><!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group"><!-- wp:image {"lightbox":{"enabled":false},"id":694,"width":"72px","height":"auto","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"500px"}}} -->
				<figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php  echo esc_url( plugin_dir_url(__DIR__) .'/assets/samantha.jpg'); ?>" alt="" class="wp-image-694" style="border-radius:500px;aspect-ratio:1;object-fit:cover;width:72px;height:auto"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"1.4rem"}},"fontFamily":"body"} -->
				<h4 class="wp-block-heading has-body-font-family" style="font-size:1.4rem;font-style:normal;font-weight:500"><?php esc_html_e('Samantha Adams', 'cm-blocks'); ?></h4>
				<!-- /wp:heading --></div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"textColor":"contrast-2"} -->
			<p class="has-contrast-2-color has-text-color has-link-color" style="font-style:normal;font-weight:300"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus malesuada urna nec efficitur. Donec sem erat, pretium vel quam consectetur, pharetra volutpat eros. Suspendisse interdum leo ac arcu dignissim condimentum.', 'cm-blocks'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"textColor":"contrast-2"} -->
			<p class="has-contrast-2-color has-text-color has-link-color" style="font-style:normal;font-weight:300"><?php esc_html_e('Aenean pharetra nulla vitae lacus tempus, sed pharetra metus commodo. Nulla nec venenatis augue. Duis quis semper dolor. Sed faucibus lorem lobortis, rhoncus est ornare, suscipit risus.', 'cm-blocks'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#d84c09"},"border":{"radius":"4px"}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" style="border-radius:4px;background-color:#d84c09"><?php esc_html_e('Learn More', 'cm-blocks'); ?></a></div>
				<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"},"margin":{"top":"48px"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="margin-top:48px;padding-right:0;padding-left:0"><!-- wp:cmblocks/progress-bar {"title":"HTML","percentage":68,"borderRadius":4,"titleColor":"#111111","indicatorBackground":"#f16529","titlePosition":"outside-top","percentagePosition":"append","startFromScratch":true} -->
				<div class="wp-block-cmblocks-progress-bar cmblocks-progress-bar" style="padding-top:30px;height:auto"><div class="cmblocks-progress-bar "><div class="cmblocks-progress-bar__wrapper" style="height:30px;width:100%;border-radius:4px;background:#E7E7E7"><div id="cmProgressBar" class="cmblocks-progress-bar__title" style="display:block;font-size:calc( 30 * 0.55px );color:#111111;top:-30px"><?php esc_html_e('HTML', 'cm-blocks'); ?></div><div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="68" aria-labelledby="cmProgressBar" class="cmblocks-progress-bar__indicator" style="height:30px;border-radius:4px 0 0  4px;background:#f16529" data-percentage="68" data-duration="500" data-border-radius="4"><div class="cmblocks-progress-bar__percentage--append" style="display:block;font-size:calc( 30 * 0.55px );color:#2D2D2D;right:calc(-30px - 20px)"><?php esc_html_e('68%', 'cm-blocks'); ?></div></div><div class="cmblocks-progress-bar__percentage" style="display:none;font-size:calc( 30 * 0.55px );color:#2D2D2D;top:5%"><?php esc_html_e('68%', 'cm-blocks'); ?></div></div></div></div>
				<!-- /wp:cmblocks/progress-bar -->

				<!-- wp:cmblocks/progress-bar {"title":"CSS","percentage":39,"borderRadius":4,"titleColor":"#111111","indicatorBackground":"#214ce5","titlePosition":"outside-top","percentagePosition":"append","startFromScratch":true} -->
				<div class="wp-block-cmblocks-progress-bar cmblocks-progress-bar" style="padding-top:30px;height:auto"><div class="cmblocks-progress-bar "><div class="cmblocks-progress-bar__wrapper" style="height:30px;width:100%;border-radius:4px;background:#E7E7E7"><div id="cmProgressBar" class="cmblocks-progress-bar__title" style="display:block;font-size:calc( 30 * 0.55px );color:#111111;top:-30px"><?php esc_html_e('CSS', 'cm-blocks'); ?></div><div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="39" aria-labelledby="cmProgressBar" class="cmblocks-progress-bar__indicator" style="height:30px;border-radius:4px 0 0  4px;background:#214ce5" data-percentage="39" data-duration="500" data-border-radius="4"><div class="cmblocks-progress-bar__percentage--append" style="display:block;font-size:calc( 30 * 0.55px );color:#2D2D2D;right:calc(-30px - 20px)"><?php esc_html_e('39%', 'cm-blocks'); ?></div></div><div class="cmblocks-progress-bar__percentage" style="display:none;font-size:calc( 30 * 0.55px );color:#2D2D2D;top:5%"><?php esc_html_e('39%', 'cm-blocks'); ?></div></div></div></div>
				<!-- /wp:cmblocks/progress-bar -->

				<!-- wp:cmblocks/progress-bar {"title":"Javascript","percentage":55,"height":34.81,"borderRadius":4,"titleColor":"#111111","indicatorBackground":"#f7e025","titlePosition":"outside-top","percentagePosition":"append","startFromScratch":true} -->
				<div class="wp-block-cmblocks-progress-bar cmblocks-progress-bar" style="padding-top:34.81px;height:auto"><div class="cmblocks-progress-bar "><div class="cmblocks-progress-bar__wrapper" style="height:34.81px;width:100%;border-radius:4px;background:#E7E7E7"><div id="cmProgressBar" class="cmblocks-progress-bar__title" style="display:block;font-size:calc( 34.81 * 0.55px );color:#111111;top:-34.81px"><?php esc_html_e('Javascript', 'cm-blocks'); ?></div><div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="55" aria-labelledby="cmProgressBar" class="cmblocks-progress-bar__indicator" style="height:34.81px;border-radius:4px 0 0  4px;background:#f7e025" data-percentage="55" data-duration="500" data-border-radius="4"><div class="cmblocks-progress-bar__percentage--append" style="display:block;font-size:calc( 34.81 * 0.55px );color:#2D2D2D;right:calc(-34.81px - 20px)"><?php esc_html_e('55%', 'cm-blocks'); ?></div></div><div class="cmblocks-progress-bar__percentage" style="display:none;font-size:calc( 34.81 * 0.55px );color:#2D2D2D;top:5%"><?php esc_html_e('55%', 'cm-blocks'); ?></div></div></div></div>
				<!-- /wp:cmblocks/progress-bar -->

				<!-- wp:cmblocks/progress-bar {"title":"PHP","percentage":38,"height":34.81,"borderRadius":4,"titleColor":"#111111","indicatorBackground":"#787cb4","titlePosition":"outside-top","percentagePosition":"append","startFromScratch":true} -->
				<div class="wp-block-cmblocks-progress-bar cmblocks-progress-bar" style="padding-top:34.81px;height:auto"><div class="cmblocks-progress-bar "><div class="cmblocks-progress-bar__wrapper" style="height:34.81px;width:100%;border-radius:4px;background:#E7E7E7"><div id="cmProgressBar" class="cmblocks-progress-bar__title" style="display:block;font-size:calc( 34.81 * 0.55px );color:#111111;top:-34.81px"><?php esc_html_e('PHP', 'cm-blocks'); ?></div><div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="38" aria-labelledby="cmProgressBar" class="cmblocks-progress-bar__indicator" style="height:34.81px;border-radius:4px 0 0  4px;background:#787cb4" data-percentage="38" data-duration="500" data-border-radius="4"><div class="cmblocks-progress-bar__percentage--append" style="display:block;font-size:calc( 34.81 * 0.55px );color:#2D2D2D;right:calc(-34.81px - 20px)"><?php esc_html_e('38%', 'cm-blocks'); ?></div></div><div class="cmblocks-progress-bar__percentage" style="display:none;font-size:calc( 34.81 * 0.55px );color:#2D2D2D;top:5%"><?php esc_html_e('38%', 'cm-blocks'); ?></div></div></div></div>
				<!-- /wp:cmblocks/progress-bar --></div>
			<!-- /wp:group --></div>
		<!-- /wp:column --></div>
	<!-- /wp:columns -->

	<!-- wp:spacer -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer --></div>
<!-- /wp:group -->
