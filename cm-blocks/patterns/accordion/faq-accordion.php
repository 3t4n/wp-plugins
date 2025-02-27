<?php
/**
 * Title: Faq Accordion
 * Slug: faq-accordion
 * Categories: codemanas
 * Keywords: codemanas
 * Block Types: codemanas/cmblocks--accordion
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"><!-- wp:spacer -->
    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"48px"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"4rem"},"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"}}},"fontFamily":"body"} -->
            <h2 class="wp-block-heading has-body-font-family" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;font-size:4rem;font-style:normal;font-weight:700"><?php esc_html_e('Things To Know','cm-blocks'); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}},"typography":{"fontSize":"20px"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"textColor":"contrast-2"} -->
            <p class="has-contrast-2-color has-text-color has-link-color" style="margin-top:var(--wp--preset--spacing--20);font-size:20px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sollicitudin tellus sit amet scelerisque pretium. Nulla pulvinar est ut odio tincidunt.','cm-blocks'); ?></p>
            <!-- /wp:paragraph --></div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:cmblocks/accordion {"icon":"plus-minus","headerTextColor":"#4c4c4c","hoverHeaderBGColor":"#e34f08","hoverHeaderTextColor":"#fdfdfd","activeHeaderBGColor":"#e34f08","activeHeaderTextColor":"#fefefe","accordionBorder":{"color":"#cacaca","style":"solid","width":"1px"},"accordionHeaderFontSize":"20px","iconColor":"#3a3a3a","hoverIconColor":"#fefefe","activeIconColor":"#fefefe","style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-cmblocks-accordion cmblocks-accordion" style="--cm-blocks-accordion__block-gap:0;--cm-blocks-accordion__border-top:1px solid #cacaca;--cm-blocks-accordion__border-bottom:1px solid #cacaca;--cm-blocks-accordion__border-left:1px solid #cacaca;--cm-blocks-accordion__border-right:1px solid #cacaca;--cm-blocks-accordion__border-radius:0px 0px 0px 0px;--cm-blocks-accordion-header__font-size:20px;--cm-blocks-accordion__defaultTextColor:#4c4c4c;--cm-blocks-accordion__hoverBgColor:#e34f08;--cm-blocks-accordion__hoverTextColor:#fdfdfd;--cm-blocks-accordion__activeBgColor:#e34f08;--cm-blocks-accordion__activeTextColor:#fefefe;--cm-blocks-accordion__defaultIconColor:#3a3a3a;--cm-blocks-accordion__hoverIconColor:#fefefe;--cm-blocks-accordion__activeIconColor:#fefefe" data-open-single-accordion-item="default"><!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"plus-minus","hoverHeaderBGColor":"#e34f08","activeHeaderBGColor":"#e34f08","accordionBorder":{"color":"#cacaca","style":"solid","width":"1px"},"accordionBorderRadius":{"top":"0px","left":"0px","right":"0px","bottom":"0px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","accordionHeaderFontSize":"20px","preview":false,"iconColor":"#3a3a3a","hoverIconColor":"#fefefe","activeIconColor":"#fefefe","style":{"spacing":{"blockGap":"0"}},"headerTextColor":"#4c4c4c","hoverHeaderTextColor":"#fdfdfd","activeHeaderTextColor":"#fefefe"},"headerBGColor":"#e34f08","headerTextColor":"#ffffff","initialOpen":true} -->
                <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item cmblocks-accordion__item--active"><a href="#" class="cmblocks-accordion__item-header" style="--cm-blocks-accordion__defaultBgColor:#e34f08;--cm-blocks-accordion__defaultTextColor:#ffffff;--cm-blocks-accordion__hoverBgColor:#e34f08;--cm-blocks-accordion__hoverTextColor:#ffffff;--cm-blocks-accordion__activeBgColor:#e34f08;--cm-blocks-accordion__activeTextColor:#ffffff" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('How many patterns does this theme have?','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon cmblocks-accordion-plus"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:paragraph {"style":{"typography":{"fontSize":"20px"}}} -->
                        <p style="font-size:20px"><?php esc_html_e('Don’t shy away from using this helpful block to guide your website users to useful pages. Be the guide that they deserve!','cm-blocks'); ?></p>
                        <!-- /wp:paragraph --></div></div>
                <!-- /wp:cmblocks/accordion-item -->

                <!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"plus-minus","hoverHeaderBGColor":"#e34f08","activeHeaderBGColor":"#e34f08","accordionBorder":{"color":"#cacaca","style":"solid","width":"1px"},"accordionBorderRadius":{"top":"0px","left":"0px","right":"0px","bottom":"0px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","accordionHeaderFontSize":"20px","preview":false,"iconColor":"#3a3a3a","hoverIconColor":"#fefefe","activeIconColor":"#fefefe","style":{"spacing":{"blockGap":"0"}},"headerTextColor":"#4c4c4c","hoverHeaderTextColor":"#fdfdfd","activeHeaderTextColor":"#fefefe"}} -->
                <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('When reader only need a few key peices of information','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon cmblocks-accordion-plus"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:paragraph {"style":{"typography":{"fontSize":"20px"}}} -->
                        <p style="font-size:20px"><?php esc_html_e('This is just some dummy text. Add your content here.','cm-blocks'); ?></p>
                        <!-- /wp:paragraph --></div></div>
                <!-- /wp:cmblocks/accordion-item -->

                <!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"plus-minus","hoverHeaderBGColor":"#e34f08","activeHeaderBGColor":"#e34f08","accordionBorder":{"color":"#cacaca","style":"solid","width":"1px"},"accordionBorderRadius":{"top":"0px","left":"0px","right":"0px","bottom":"0px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","accordionHeaderFontSize":"20px","preview":false,"iconColor":"#3a3a3a","hoverIconColor":"#fefefe","activeIconColor":"#fefefe","style":{"spacing":{"blockGap":"0"}},"headerTextColor":"#4c4c4c","hoverHeaderTextColor":"#fdfdfd","activeHeaderTextColor":"#fefefe"}} -->
                <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('Frequently asked Questions','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon cmblocks-accordion-plus"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:paragraph {"style":{"typography":{"fontSize":"20px"}}} -->
                        <p style="font-size:20px"><?php esc_html_e('This is just some dummy text. Add your content here.','cm-blocks'); ?></p>
                        <!-- /wp:paragraph --></div></div>
                <!-- /wp:cmblocks/accordion-item --></div>
            <!-- /wp:cmblocks/accordion --></div>
        <!-- /wp:column --></div>
    <!-- /wp:columns -->

    <!-- wp:spacer -->
    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer --></div>
<!-- /wp:group -->