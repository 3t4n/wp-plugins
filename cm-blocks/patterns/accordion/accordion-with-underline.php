<?php
/**
 * Title: Accordion With Underline
 * Slug: accordion-with-underline
 * Categories: codemanas
 * Keywords: codemanas
 * Block Types: codemanas/cmblocks--accordion
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:spacer {"height":"60px"} -->
    <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:cmblocks/accordion {"icon":"plus-minus","headerTextColor":"#343333","accordionBorder":{"top":{"style":"none","width":"0px"},"right":{"style":"none","width":"0px"},"bottom":{"color":"#353535","style":"solid","width":"2px"},"left":{"style":"none","width":"0px"}},"iconColor":"#343333"} -->
    <div class="wp-block-cmblocks-accordion cmblocks-accordion" style="--cm-blocks-accordion__border-bottom:2px solid #353535;--cm-blocks-accordion__border-radius:0px 0px 0px 0px;--cm-blocks-accordion-header__font-size:undefined;--cm-blocks-accordion__defaultTextColor:#343333;--cm-blocks-accordion__hoverTextColor:#343333;--cm-blocks-accordion__activeTextColor:#343333;--cm-blocks-accordion__defaultIconColor:#343333;--cm-blocks-accordion__hoverIconColor:#343333;--cm-blocks-accordion__activeIconColor:#343333" data-open-single-accordion-item="default"><!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"plus-minus","accordionBorder":{"top":{"style":"none","width":"0px"},"right":{"style":"none","width":"0px"},"bottom":{"color":"#353535","style":"solid","width":"2px"},"left":{"style":"none","width":"0px"}},"accordionBorderRadius":{"top":"0px","left":"0px","right":"0px","bottom":"0px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","preview":false,"headerTextColor":"#343333","iconColor":"#343333"}} -->
        <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title">Global Header Settings</div><span class="cmblocks-accordion__item-icon cmblocks-accordion-plus"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontFamily":"body"} -->
                <h4 class="wp-block-heading has-body-font-family" style="font-style:normal;font-weight:500"><?php esc_html_e('How to Implement Accordion?','cm-blocks'); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur diam nunc, finibus sed felis laoreet, hendrerit interdum lacus. Phasellus at libero placerat ipsum fringilla tempor eget a massa','cm-blocks'); ?></p>
                <!-- /wp:paragraph --></div></div>
        <!-- /wp:cmblocks/accordion-item -->

        <!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"plus-minus","accordionBorder":{"top":{"style":"none","width":"0px"},"right":{"style":"none","width":"0px"},"bottom":{"color":"#353535","style":"solid","width":"2px"},"left":{"style":"none","width":"0px"}},"accordionBorderRadius":{"top":"0px","left":"0px","right":"0px","bottom":"0px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","preview":false,"headerTextColor":"#343333","iconColor":"#343333"}} -->
        <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('When reader only need a few key peices of information','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon cmblocks-accordion-plus"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:paragraph -->
                <p><?php esc_html_e('This is just some dummy text. Add your content here.','cm-blocks'); ?></p>
                <!-- /wp:paragraph --></div></div>
        <!-- /wp:cmblocks/accordion-item -->

        <!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"plus-minus","accordionBorder":{"top":{"style":"none","width":"0px"},"right":{"style":"none","width":"0px"},"bottom":{"color":"#353535","style":"solid","width":"2px"},"left":{"style":"none","width":"0px"}},"accordionBorderRadius":{"top":"0px","left":"0px","right":"0px","bottom":"0px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","preview":false,"headerTextColor":"#343333","iconColor":"#343333"}} -->
        <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('Frequently asked Questions','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon cmblocks-accordion-plus"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:paragraph -->
                <p><?php esc_html_e('This is just some dummy text. Add your content here.','cm-blocks'); ?></p>
                <!-- /wp:paragraph --></div></div>
        <!-- /wp:cmblocks/accordion-item -->

        <!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"plus-minus","accordionBorder":{"top":{"style":"none","width":"0px"},"right":{"style":"none","width":"0px"},"bottom":{"color":"#353535","style":"solid","width":"2px"},"left":{"style":"none","width":"0px"}},"accordionBorderRadius":{"top":"0px","left":"0px","right":"0px","bottom":"0px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","preview":false,"headerTextColor":"#343333","iconColor":"#343333"}} -->
        <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('When reader only need a few key peices of information','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon cmblocks-accordion-plus"></span></a><div class="cmblocks-accordion__item-content"><!-- wp:image {"id":2182,"width":"582px","height":"auto","sizeSlug":"large","linkDestination":"none"} -->
                <figure class="wp-block-image size-large is-resized"><img src="<?php echo esc_url( plugin_dir_url(__DIR__) .'assets/oldCamera.png'); ?>" alt="" class="wp-image-2182" style="width:582px;height:auto"/></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"medium","fontFamily":"body"} -->
                <h2 class="wp-block-heading has-text-align-center has-body-font-family has-medium-font-size" style="font-style:normal;font-weight:400"><em><?php esc_html_e('Retro Camera','cm-blocks'); ?></em></h2>
                <!-- /wp:heading --></div></div>
        <!-- /wp:cmblocks/accordion-item --></div>
    <!-- /wp:cmblocks/accordion -->

    <!-- wp:spacer {"height":"60px"} -->
    <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer --></div>
<!-- /wp:group -->