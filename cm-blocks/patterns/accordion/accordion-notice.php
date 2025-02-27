<?php
/**
 * Title: Accordion Notice
 * Slug: accordion-notice
 * Categories: codemanas
 * Keywords: codemanas
 * Block Types: codemanas/cmblocks--accordion
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:cmblocks/accordion {"icon":"plus-minus","contentBGColor":"#cee6cc","headerBGColor":"#cee6cc","headerTextColor":"#212121","hoverHeaderBGColor":"#cee6cc","activeHeaderBGColor":"#cee6cc","accordionBorder":{"top":{"style":"none","width":"0px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"color":"#17c604","style":"solid","width":"5px"}},"iconColor":"#212121"} -->
    <div class="wp-block-cmblocks-accordion cmblocks-accordion" style="--cm-blocks-accordion__border-left:5px solid #17c604;--cm-blocks-accordion__border-radius:0px 0px 0px 0px;--cm-blocks-accordion-header__font-size:undefined;--cm-blocks-accordion__defaultBgColor:#cee6cc;--cm-blocks-accordion__defaultTextColor:#212121;--cm-blocks-accordion__hoverBgColor:#cee6cc;--cm-blocks-accordion__hoverTextColor:#212121;--cm-blocks-accordion__activeBgColor:#cee6cc;--cm-blocks-accordion__activeTextColor:#212121;--cm-blocks-accordion__defaultContentBgColor:#cee6cc;--cm-blocks-accordion__defaultIconColor:#212121;--cm-blocks-accordion__hoverIconColor:#212121;--cm-blocks-accordion__activeIconColor:#212121" data-open-single-accordion-item="default"><!-- wp:spacer {"height":"60px"} -->
        <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"plus-minus","contentBGColor":"#cee6cc","headerBGColor":"#cee6cc","hoverHeaderBGColor":"#cee6cc","activeHeaderBGColor":"#cee6cc","accordionBorder":{"top":{"style":"none","width":"0px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"color":"#17c604","style":"solid","width":"5px"}},"accordionBorderRadius":{"top":"0px","left":"0px","right":"0px","bottom":"0px"},"showIcon":true,"iconPosition":"icon-after","openSingleAccordionItem":"default","preview":false,"headerTextColor":"#212121","iconColor":"#212121"},"initialOpen":true} -->
        <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item cmblocks-accordion__item--active"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('When reader only need a few key peices of information','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon cmblocks-accordion-plus"></span></a><div class="cmblocks-accordion__item-content" style="background-color:#cee6cc"><!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sollicitudin tellus sit amet scelerisque pretium. Nulla pulvinar est ut odio tincidunt, sed maximus metus efficitur. Duis pharetra libero lacus, quis feugiat mauris efficitur non.','cm-blocks'); ?></p>
                <!-- /wp:paragraph --></div></div>
        <!-- /wp:cmblocks/accordion-item --></div>
    <!-- /wp:cmblocks/accordion -->

    <!-- wp:cmblocks/accordion {"icon":"plus-minus","contentBGColor":"#e6cccc","headerBGColor":"#e6cccc","headerTextColor":"#212121","hoverHeaderBGColor":"#e6cccc","activeHeaderBGColor":"#e6cccc","accordionBorder":{"top":{"style":"none","width":"0px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"color":"#ff0202","style":"solid","width":"5px"}},"iconPosition":"icon-before","iconColor":"#212121"} -->
    <div class="wp-block-cmblocks-accordion cmblocks-accordion cmblocks-accordion--icon-before" style="--cm-blocks-accordion__border-left:5px solid #ff0202;--cm-blocks-accordion__border-radius:0px 0px 0px 0px;--cm-blocks-accordion-header__font-size:undefined;--cm-blocks-accordion__defaultBgColor:#e6cccc;--cm-blocks-accordion__defaultTextColor:#212121;--cm-blocks-accordion__hoverBgColor:#e6cccc;--cm-blocks-accordion__hoverTextColor:#212121;--cm-blocks-accordion__activeBgColor:#e6cccc;--cm-blocks-accordion__activeTextColor:#212121;--cm-blocks-accordion__defaultContentBgColor:#e6cccc;--cm-blocks-accordion__defaultIconColor:#212121;--cm-blocks-accordion__hoverIconColor:#212121;--cm-blocks-accordion__activeIconColor:#212121" data-open-single-accordion-item="default"><!-- wp:cmblocks/accordion-item {"globalSettings":{"icon":"plus-minus","contentBGColor":"#e6cccc","headerBGColor":"#e6cccc","hoverHeaderBGColor":"#e6cccc","activeHeaderBGColor":"#e6cccc","accordionBorder":{"top":{"style":"none","width":"0px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"color":"#ff0202","style":"solid","width":"5px"}},"accordionBorderRadius":{"top":"0px","left":"0px","right":"0px","bottom":"0px"},"showIcon":true,"iconPosition":"icon-before","openSingleAccordionItem":"default","preview":false,"headerTextColor":"#212121","iconColor":"#212121"},"initialOpen":true} -->
        <div class="wp-block-cmblocks-accordion-item cmblocks-accordion__item cmblocks-accordion__item--active"><a href="#" class="cmblocks-accordion__item-header" aria-expanded="true" aria-controls="cmblocks-accordion__panel"><div class="cmblocks-accordion__item-title"><?php esc_html_e('Global Header Settings','cm-blocks'); ?></div><span class="cmblocks-accordion__item-icon cmblocks-accordion-plus"></span></a><div class="cmblocks-accordion__item-content" style="background-color:#e6cccc"><!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sollicitudin tellus sit amet scelerisque pretium. Nulla pulvinar est ut odio tincidunt, sed maximus metus efficitur. Duis pharetra libero lacus, quis feugiat mauris efficitur non.','cm-blocks'); ?></p>
                <!-- /wp:paragraph --></div></div>
        <!-- /wp:cmblocks/accordion-item --></div>
    <!-- /wp:cmblocks/accordion -->

    <!-- wp:spacer {"height":"60px"} -->
    <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer --></div>
<!-- /wp:group -->