<?php
/**
 * Title: Accordion With Image
 * Slug: accordion-with-image
 * Categories: codemanas
 * Keywords: codemanas
 * Block Types: codemanas/cmblocks--accordion
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"48px","left":"48px","top":"48px","bottom":"48px"}},"color":{"background":"#f5f5f5"},"border":{"radius":"36px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-background" style="border-radius:36px;background-color:#f5f5f5;padding-top:48px;padding-right:48px;padding-bottom:48px;padding-left:48px"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%"><!-- wp:image {"id":2205,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
            <figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url( plugin_dir_url(__DIR__) .'assets/paper-questionmark.jpg'); ?>" alt="" class="wp-image-2205" style="border-radius:10px"/></figure>
            <!-- /wp:image --></div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"70%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%"><!-- wp:cmblocks/accordion {"icon":"right-down","headerBGColor":"#407fa4","headerTextColor":"#ffffff","accordionBorder":{"color":"#b3b3b3","style":"solid","width":"1px"},"accordionBorderRadius":{"top":"12px","left":"12px","right":"12px","bottom":"12px"},"iconColor":"#f4f4f4","style":{"spacing":{"blockGap":"12px"}}} -->
            <div class="wp-block-cmblocks-accordion cmblocks-accordion" style="--cm-blocks-accordion__block-gap:12px;--cm-blocks-accordion__border-top:1px solid #b3b3b3;--cm-blocks-accordion__border-bottom:1px solid #b3b3b3;--cm-blocks-accordion__border-left:1px solid #b3b3b3;--cm-blocks-accordion__border-right:1px solid #b3b3b3;--cm-blocks-accordion__border-radius:12px 12px 12px 12px;--cm-blocks-accordion-header__font-size:undefined;--cm-blocks-accordion__defaultBgColor:#407fa4;--cm-blocks-accordion__defaultTextColor:#ffffff;--cm-blocks-accordion__hoverBgColor:#407fa4;--cm-blocks-accordion__hoverTextColor:#ffffff;--cm-blocks-accordion__activeBgColor:#407fa4;--cm-blocks-accordion__activeTextColor:#ffffff;--cm-blocks-accordion__defaultIconColor:#f4f4f4;--cm-blocks-accordion__hoverIconColor:#f4f4f4;--cm-blocks-accordion__activeIconColor:#f4f4f4" data-open-single-accordion-item="default"><!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"right-down","headerBGColor":"#407fa4","headerTextColor":"#ffffff","accordionBorder":{"color":"#b3b3b3","style":"solid","width":"1px"},"accordionBorderRadius":{"top":"12px","left":"12px","right":"12px","bottom":"12px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","preview":false,"style":{"spacing":{"blockGap":"12px"}},"iconColor":"#f4f4f4"}} -->
                <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('Global Header Settings','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon dashicons dashicons-arrow-right-alt2"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:paragraph -->
                        <p><?php esc_html_e('This is just some dummy text. Add your content here.','cm-blocks'); ?></p>
                        <!-- /wp:paragraph --></div></div>
                <!-- /wp:cmblocks/accordion-item -->

                <!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"right-down","headerBGColor":"#407fa4","headerTextColor":"#ffffff","accordionBorder":{"color":"#b3b3b3","style":"solid","width":"1px"},"accordionBorderRadius":{"top":"12px","left":"12px","right":"12px","bottom":"12px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","preview":false,"style":{"spacing":{"blockGap":"12px"}},"iconColor":"#f4f4f4"}} -->
                <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('When reader only need a few key pieces of information','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon dashicons dashicons-arrow-right-alt2"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:group {"style":{"spacing":{"margin":{"top":"12px","bottom":"12px"},"blockGap":"24px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group" style="margin-top:12px;margin-bottom:12px"><!-- wp:image {"id":2205,"width":"88px","height":"auto","sizeSlug":"full","linkDestination":"none"} -->
                            <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( plugin_dir_url(__DIR__) .'assets/paper-questionmark.jpg'); ?>" alt="" class="wp-image-2205" style="width:88px;height:auto"/></figure>
                            <!-- /wp:image -->

                            <!-- wp:paragraph {"style":{"color":{"text":"#4a4a4a"},"elements":{"link":{"color":{"text":"#4a4a4a"}}}}} -->
                            <p class="has-text-color has-link-color" style="color:#4a4a4a"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur diam nunc, finibus sed felis laoreet, hendrerit interdum lacus. Phasellus at libero placerat ipsum fringilla tempor eget a massa','cm-blocks'); ?></p>
                            <!-- /wp:paragraph --></div>
                        <!-- /wp:group --></div></div>
                <!-- /wp:cmblocks/accordion-item -->

                <!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"right-down","headerBGColor":"#407fa4","headerTextColor":"#ffffff","accordionBorder":{"color":"#b3b3b3","style":"solid","width":"1px"},"accordionBorderRadius":{"top":"12px","left":"12px","right":"12px","bottom":"12px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","preview":false,"style":{"spacing":{"blockGap":"12px"}},"iconColor":"#f4f4f4"}} -->
                <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('Frequently asked Questions','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon dashicons dashicons-arrow-right-alt2"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:paragraph -->
                        <p><?php esc_html_e('This is just some dummy text. Add your content here.','cm-blocks'); ?></p>
                        <!-- /wp:paragraph --></div></div>
                <!-- /wp:cmblocks/accordion-item -->

                <!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"right-down","headerBGColor":"#407fa4","headerTextColor":"#ffffff","accordionBorder":{"color":"#b3b3b3","style":"solid","width":"1px"},"accordionBorderRadius":{"top":"12px","left":"12px","right":"12px","bottom":"12px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","preview":false,"style":{"spacing":{"blockGap":"12px"}},"iconColor":"#f4f4f4"}} -->
                <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('When reader only need a few key pieces of information','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon dashicons dashicons-arrow-right-alt2"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:heading {"fontFamily":"body"} -->
                        <h2 class="wp-block-heading has-body-font-family"><?php esc_html_e('This is heading','cm-blocks'); ?></h2>
                        <!-- /wp:heading --></div></div>
                <!-- /wp:cmblocks/accordion-item -->

                <!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"right-down","headerBGColor":"#407fa4","headerTextColor":"#ffffff","accordionBorder":{"color":"#b3b3b3","style":"solid","width":"1px"},"accordionBorderRadius":{"top":"12px","left":"12px","right":"12px","bottom":"12px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","preview":false,"style":{"spacing":{"blockGap":"12px"}},"iconColor":"#f4f4f4"}} -->
                <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('How many types of accordions are there?','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon dashicons dashicons-arrow-right-alt2"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:paragraph -->
                        <p><?php esc_html_e('Accordions come in various types, including piano accordions, button accordions (diatonic and chromatic), concertinas, and others. Piano accordions have a keyboard, while button accordions have buttons for playing melody and chords.','cm-blocks'); ?></p>
                        <!-- /wp:paragraph --></div></div>
                <!-- /wp:cmblocks/accordion-item --></div>
            <!-- /wp:cmblocks/accordion --></div>
        <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
<!-- /wp:group -->