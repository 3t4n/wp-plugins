<?php
/**
 * Title: Countdown With Heading And Buttons
 * Slug: countdown-with-heading-and-buttons
 * Categories: codemanas
 * Keywords: codemanas
 * Block Types: codemanas/cmblocks--countdown
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:spacer -->
    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontFamily":"body"} -->
    <h1 class="wp-block-heading has-text-align-center has-body-font-family" style="font-style:normal;font-weight:600"><?php esc_html_e('CM Blocks','cm-blocks'); ?></h1>
    <!-- /wp:heading -->

    <!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"elements":{"link":{"color":{"text":"#7c7c7c"}}},"color":{"text":"#7c7c7c"}}} -->
        <p class="has-text-align-center has-text-color has-link-color" style="color:#7c7c7c;margin-top:var(--wp--preset--spacing--20)"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a justo id nunc placerat facilisis.','cm-blocks'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group"><!-- wp:cmblocks/countdown {"countdownHourText":" Hours","countdownMinuteText":" Minutes","countdownSecondText":" Seconds","countdownBlockMargin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"countdownBlockBorder":{"style":"none","width":"0px","color":"#000"},"countdownBlockBorderRadius":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"countdownBlockPadding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"},"countdownContentLayout":"column","countdownTextFontSize":"20px","countdownDigitFontSize":"68px","countdownDateTime":"Fri, 06 Mar 2026 10:57:00 GMT","countdownDisplayDateTime":"2026-03-06T10:57:00","startFromScratch":true,"separatorMargin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"style":{"typography":{"fontStyle":"normal","fontWeight":"100"}}} -->
            <div style="font-style:normal;font-weight:100;--cmblocks-countdown__ticker-digit-color:#000;--cmblocks-countdown__ticker-text-color:#000;--cmblocks-countdown__ticker-text-font-size:20px;--cmblocks-countdown__ticker-digit-font-size:68px;--cmblocks-countdown__ticker-padding-top:24px;--cmblocks-countdown__ticker-padding-bottom:24px;--cmblocks-countdown__ticker-padding-left:24px;--cmblocks-countdown__ticker-padding-right:24px;--cmblocks-countdown__ticker-margin-top:0px;--cmblocks-countdown__ticker-margin-bottom:0px;--cmblocks-countdown__ticker-margin-left:0px;--cmblocks-countdown__ticker-margin-right:0px;--cmblocks-countdown__separator-margin-top:0px;--cmblocks-countdown__separator-margin-bottom:0px;--cmblocks-countdown__separator-margin-left:0px;--cmblocks-countdown__separator-margin-right:0px;--cmblocks-countdown__ticker-border-top:0px none #000;--cmblocks-countdown__ticker-border-bottom:0px none #000;--cmblocks-countdown__ticker-border-left:0px none #000;--cmblocks-countdown__ticker-border-right:0px none #000;--cmblocks-countdown__ticker-border-radius:0px 0px 0px 0px" class="wp-block-cmblocks-countdown cmblocks-countdown" role="timer" aria-live="polite" aria-atomic="true" aria-label="<?php esc_html_e('Countdown Timer','cm-blocks'); ?>"><div data-countdown-datetime="Fri, 06 Mar 2026 10:57:00 GMT" class="cmblocks-countdown__ticker cmblocks-countdown__ticker--horizontal cmblocks-countdown__ticker--content-column" role="presentation"><span class="cmblocks-countdown__ticker-item cmblocks-countdown__ticker-days" aria-label="<?php esc_html_e('Days','cm-blocks'); ?>"><span class="cmblocks-countdown__ticker-digit"></span><span class="cmblocks-countdown__ticker-text"> <?php esc_html_e('Days','cm-blocks'); ?> </span></span><span class="cmblocks-countdown__ticker-separator">:</span><span class="cmblocks-countdown__ticker-item cmblocks-countdown__ticker-hours" aria-label="<?php esc_html_e('Hours','cm-blocks'); ?>"><span class="cmblocks-countdown__ticker-digit"></span><span class="cmblocks-countdown__ticker-text"> <?php esc_html_e('Hours','cm-blocks'); ?></span></span><span class="cmblocks-countdown__ticker-separator">:</span><span class="cmblocks-countdown__ticker-item cmblocks-countdown__ticker-minutes" aria-label="<?php esc_html_e('Minutes','cm-blocks'); ?>"><span class="cmblocks-countdown__ticker-digit"></span><span class="cmblocks-countdown__ticker-text"> <?php esc_html_e('Minutes','cm-blocks'); ?></span></span><span class="cmblocks-countdown__ticker-separator">:</span><span class="cmblocks-countdown__ticker-item cmblocks-countdown__ticker-seconds" aria-label="<?php esc_html_e('Seconds','cm-blocks'); ?>"><span class="cmblocks-countdown__ticker-digit"></span><span class="cmblocks-countdown__ticker-text"> <?php esc_html_e('Seconds','cm-blocks'); ?></span></span></div></div>
            <!-- /wp:cmblocks/countdown --></div>
        <!-- /wp:group -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"24px"}}} -->
        <div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"100px"}},"className":"is-style-fill"} -->
            <div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" style="border-radius:100px"><?php esc_html_e('Learn More','cm-blocks'); ?></a></div>
            <!-- /wp:button -->

            <!-- wp:button {"style":{"border":{"radius":"100px"}},"className":"is-style-outline"} -->
            <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-radius:100px"><?php esc_html_e('Visit Us','cm-blocks'); ?></a></div>
            <!-- /wp:button --></div>
        <!-- /wp:buttons --></div>
    <!-- /wp:group -->

    <!-- wp:spacer -->
    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer --></div>
<!-- /wp:group -->