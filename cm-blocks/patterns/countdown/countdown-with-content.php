<?php
/**
 * Title: Countdown With Content
 * Slug: countdown-with-content.php
 * Categories: codemanas
 * Keywords: codemanas
 * Block Types: codemanas/cmblocks--countdown
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>

<!-- wp:group {"align":"full","style":{"color":{"background":"#c3f4f4"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#c3f4f4"><!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide"><!-- wp:spacer -->
        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"36px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"constrained","contentSize":"400px"}} -->
            <div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"40px"}},"className":"is-style-default","fontFamily":"body"} -->
                <h2 class="wp-block-heading is-style-default has-body-font-family" style="font-size:40px;font-style:normal;font-weight:700"> <?php esc_html_e('Websites is Under Construction','cm-blocks'); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p> <?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a justo id nunc placerat facilisis. Cras mollis diam eget lectus viverra semper. Praesent in rhoncus ex. Phasellus non tempus ligula, ut posuere velit.','cm-blocks'); ?> </p>
                <!-- /wp:paragraph --></div>
            <!-- /wp:group -->

            <!-- wp:cmblocks/countdown {"countdownDayText":" DAYS","countdownHourText":" HOURS","countdownMinuteText":" MINUTES","countdownSecondText":" SECONDS","countdownTextColor":"#111111","countdownDigitColor":"#111111","countdownBackgroundColor":"#ffffff","countdownSeparatorColor":"#111111","countdownBlockMargin":{"right":"16px","left":"16px","top":"16px","bottom":"16px"},"countdownBlockBorder":{"width":"0px","style":"none","color":"#000"},"countdownBlockPadding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"},"countdownContentLayout":"column","countdownTextFontSize":"16px","countdownDigitFontSize":"80px","countdownSeparatorFontSize":"70px","countdownDateTime":"Thu, 16 Apr 2026 23:00:00 GMT","countdownDisplayDateTime":"2026-04-16T23:00:00","startFromScratch":true,"separatorMargin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"align":"wide","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"layout":{"selfStretch":"fill","flexSize":null}}} -->
            <div style="font-style:normal;font-weight:700;--cmblocks-countdown__ticker-digit-color:#111111;--cmblocks-countdown__ticker-text-color:#111111;--cmblocks-countdown__ticker-text-font-size:16px;--cmblocks-countdown__ticker-digit-font-size:80px;--cmblocks-countdown__ticker-background-color:#ffffff;--cmblocks-countdown__ticker-padding-top:24px;--cmblocks-countdown__ticker-padding-bottom:24px;--cmblocks-countdown__ticker-padding-left:24px;--cmblocks-countdown__ticker-padding-right:24px;--cmblocks-countdown__ticker-margin-top:16px;--cmblocks-countdown__ticker-margin-bottom:16px;--cmblocks-countdown__ticker-margin-left:16px;--cmblocks-countdown__ticker-margin-right:16px;--cmblocks-countdown__ticker-separator-font-size:70px;--cmblocks-countdown__ticker-separator-color:#111111;--cmblocks-countdown__separator-margin-top:0px;--cmblocks-countdown__separator-margin-bottom:0px;--cmblocks-countdown__separator-margin-left:0px;--cmblocks-countdown__separator-margin-right:0px;--cmblocks-countdown__ticker-border-top:0px none #000;--cmblocks-countdown__ticker-border-bottom:0px none #000;--cmblocks-countdown__ticker-border-left:0px none #000;--cmblocks-countdown__ticker-border-right:0px none #000;--cmblocks-countdown__ticker-border-radius:0px 0px 0px 0px" class="wp-block-cmblocks-countdown alignwide cmblocks-countdown" role="timer" aria-live="polite" aria-atomic="true" aria-label="<?php esc_html_e('Countdown Timer','cm-blocks'); ?>"><div data-countdown-datetime="Thu, 16 Apr 2026 23:00:00 GMT" class="cmblocks-countdown__ticker cmblocks-countdown__ticker--horizontal cmblocks-countdown__ticker--content-column" role="presentation"><span class="cmblocks-countdown__ticker-item cmblocks-countdown__ticker-days" aria-label="<?php esc_html_e('Days','cm-blocks'); ?>"><span class="cmblocks-countdown__ticker-digit"></span><span class="cmblocks-countdown__ticker-text"> <?php esc_html_e('DAYS','cm-blocks'); ?></span></span><span class="cmblocks-countdown__ticker-separator">:</span><span class="cmblocks-countdown__ticker-item cmblocks-countdown__ticker-hours" aria-label="<?php esc_html_e('Hours','cm-blocks'); ?>"><span class="cmblocks-countdown__ticker-digit"></span><span class="cmblocks-countdown__ticker-text"> <?php esc_html_e('HOURS','cm-blocks'); ?></span></span><span class="cmblocks-countdown__ticker-separator">:</span><span class="cmblocks-countdown__ticker-item cmblocks-countdown__ticker-minutes" aria-label="<?php esc_html_e('Minutes','cm-blocks'); ?>"><span class="cmblocks-countdown__ticker-digit"></span><span class="cmblocks-countdown__ticker-text"> <?php esc_html_e('MINUTES','cm-blocks'); ?></span></span><span class="cmblocks-countdown__ticker-separator">:</span><span class="cmblocks-countdown__ticker-item cmblocks-countdown__ticker-seconds" aria-label="<?php esc_html_e('Seconds','cm-blocks'); ?>"><span class="cmblocks-countdown__ticker-digit"></span><span class="cmblocks-countdown__ticker-text"> <?php esc_html_e('SECONDS','cm-blocks'); ?></span></span></div></div>
            <!-- /wp:cmblocks/countdown --></div>
        <!-- /wp:group -->

        <!-- wp:spacer -->
        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->