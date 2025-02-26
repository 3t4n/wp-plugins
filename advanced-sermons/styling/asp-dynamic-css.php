<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Dynamic Sermon CSS Styling

function asp_dynamic_css() { ?>

    <style type="text/css">

    <?php $asp_design_title_overlay_opacity = get_option('asp_design_title_overlay_opacity');
    if (!empty($asp_design_title_overlay_opacity)) { ?>
        .sermon-wrapper .sermon-title-holder:after,.sermon-wrapper .sermon-featured-image:after {
            opacity: <?php echo get_option('asp_design_title_overlay_opacity') ?>;
        }
    <?php } ?>

    <?php // Sermon Archive Content Width
    $asp_single_sermon_content_width = get_option('asp_single_sermon_content_width');
    $asp_archive_sermon_content_width = get_option('asp_archive_sermon_content_width');

    // Default the archive width to single sermon width if not set
    if (empty($asp_archive_sermon_content_width)) {
        $asp_archive_sermon_content_width = $asp_single_sermon_content_width;
    }
    if (!empty($asp_archive_sermon_content_width) && $asp_archive_sermon_content_width !== "auto") { ?>
    @media (min-width: 1300px) {
        .post-type-archive .sermon-container_inner, .post-type-archive .sermon-title-holder .sermon-title,
        .page-template .sermon-container_inner, .page-template .sermon-title-holder .sermon-title {
            max-width: <?php echo $asp_archive_sermon_content_width; ?>!important;
            margin: auto;
        }
    }
    <?php }
    if (!empty($asp_archive_sermon_content_width) && $asp_archive_sermon_content_width == "auto") { ?>
    @media (min-width: 1300px) {
        .post-type-archive .sermon-container_inner, .post-type-archive .sermon-title-holder .sermon-title {
            width: auto!important;
            max-width: none!important;
            margin: auto;
        }
    }
    <?php } ?>

    <?php // Single Sermon Content Width

    $asp_single_sermon_content_width = get_option('asp_single_sermon_content_width');
    if (!empty($asp_single_sermon_content_width) && $asp_single_sermon_content_width !== "auto") { ?>
    @media (min-width: 1300px) {
        .single-sermons .sermon-container_inner, .single-sermons .sermon-title-holder .sermon-title {
            max-width: <?php echo get_option('asp_single_sermon_content_width') ?>!important;
            margin: auto;
        }
    }
    <?php }
    if (!empty($asp_single_sermon_content_width) && $asp_single_sermon_content_width == "auto") { ?>
    @media (min-width: 1300px) {
        .single-sermons .sermon-container_inner, .single-sermons .sermon-title-holder .sermon-title {
            width: <?php echo get_option('asp_single_sermon_content_width') ?>!important;
            max-width: none!important;
            margin: auto;
        }
    }
    <?php } ?>

    <?php // Disable Sermon Title Holder

    $asp_design_disable_sermon_title = get_option('asp_design_disable_sermon_title');

    if (empty($$asp_design_disable_sermon_title)) { ?>
        .sermon-title-holder, .sermon-featured-image {
            display: <?php echo $asp_design_disable_sermon_title ?>!important;
        }
    <?php } ?>

    <?php // Sermon Title Background Image

    $asp_design_sermon_image= get_option('asp_design_sermon_image');

    if (!empty($asp_design_sermon_image)) { ?>
        .sermon-title-holder {
            background-image: url('<?php echo get_option('asp_design_sermon_image') ?>')!important;
        }
    <?php } ?>

    <?php // Disable Sermon Title Background Image

    $disable_sermon_title_image = get_option('asp_design_disable_sermon_title_image');

    if (!empty($disable_sermon_title_image)) { ?>
        .sermon-title-holder {
            background-image: none!important;
        }
        .sermon-featured-image,.sermon-featured-image:after {
            visibility: hidden!important;
        }
        .sermon-title {
            visibility: visible!important;
        }
    <?php } ?>

    <?php // Enables Single Sermon Sidebar

    $enable_sermon_sidebar = get_option('asp_single_sermon_enable_sidebar');

    if (empty($enable_sermon_sidebar)) { ?>
        .asp-column1 {
            width: 100%;
            display: block;
            vertical-align: text-top;
        }
        .asp-column2 {
            display: none;
        }
        @media (min-width: 1400px) {
            .asp-column1 {
                padding-left: 25px;
                padding-right: 25px!important;
                width: auto!important;
            }
        }
        @media (min-width: 1200px) and (max-width: 1400px) {
            .asp-column1 {
                padding-left: 25px;
                padding-right: 25px!important;
                width: auto!important;
            }
        }
        @media (min-width: 1100px) and (max-width: 1200px) {
            .asp-column1 {
                padding-left: 25px;
                padding-right: 25px!important;
                width: auto!important;
            }
        }
    <?php } ?>

    <?php // Related Sermons Design Settings

    $asp_related_sermons = get_option('asp_single_sermon_related_sermons');

    if (empty($asp_related_sermons)) { ?>
        .sermon-wrapper .sermon-comments {
          	display: block;
          	padding-bottom: 25px;
          	border-bottom: 1px solid #e9e5de;
        }
    <?php } ?>

    <?php // Title Padding Design Settings

    $asp_title_padding = get_option('asp_design_title_padding');

    if (!empty($asp_title_padding)) { ?>
       .sermon-wrapper .sermon-title-holder .sermon-title {
           padding: <?php echo get_option('asp_design_title_padding') ?> 0px!important;
           z-index: 1;
           position: relative;
       }
    <?php } else { ?>
      .sermon-wrapper .sermon-title-holder .sermon-title {
          padding: 10px 0px!important;
          z-index: 1;
          position: relative;
      }
    <?php } ?>

    <?php // Title Design Settings

    $asp_heading_h1_color = get_option('asp_design_heading_h1_color');
    $asp_heading_h1_size = get_option('asp_design_heading_h1_size');
    $asp_heading_h1_height = get_option('asp_design_heading_h1_height');
    $asp_heading_h1_weight = get_option('asp_design_heading_h1_weight');

    if (!empty($asp_heading_h1_color) || !empty($asp_heading_h1_size) || !empty($asp_heading_h1_height) || !empty($asp_heading_h1_weight)) { ?>
    .sermon-wrapper .sermon-title-holder .sermon-title h1 {
        <?php if (!empty($asp_heading_h1_color)) { ?> color: <?php echo get_option('asp_design_heading_h1_color') ?>!important; <?php } ?>
        <?php if (!empty($asp_heading_h1_size)) { ?> font-size: <?php echo get_option('asp_design_heading_h1_size') ?>px!important; <?php } ?>
        <?php if (!empty($asp_heading_h1_height)) { ?> line-height: <?php echo get_option('asp_design_heading_h1_height') ?>px!important; <?php } ?>
        <?php if (!empty($asp_heading_h1_weight)) { ?> font-weight: <?php echo get_option('asp_design_heading_h1_weight') ?>!important; <?php } ?>
    }
    <?php } ?>

    @media (max-width: 780px) {
        .sermon-wrapper .sermon-title-holder .sermon-title h1 {
            font-size: 1.5em !important;
            line-height: 1.5em !important;
        }
    }

    <?php // Background Design Settings

    $asp_design_body_color = get_option('asp_design_body_color');

    if (!empty($asp_design_body_color)) { ?>
        .sermon-wrapper {
            <?php if (!empty($asp_design_body_color)) { ?> background-color: <?php echo $asp_design_body_color ?>!important; <?php } ?>
        }
    <?php } ?>

    <?php // Element Design Settings

    $asp_design_element_background = get_option('asp_design_element_background');

    if (!empty($asp_design_element_background)) { ?>
        .asp-archive-container .asp-series-top-holder,
        .asp-archive-container .asp-speaker-top-holder,
        .sermon-filter-error p,
        .asp-sermon-archive-single-list {
            <?php if (!empty($asp_design_element_background)) { ?> background-color: <?php echo $asp_design_element_background ?>!important; <?php } ?>
        }
    <?php } ?>


    /* Hide Archive Filter */

    <?php
    $asp_hide_filtering = get_option('asp_archive_hide_filtering');

    if ( !empty($asp_hide_filtering) || $asp_hide_filtering = 'none') { ?>
    .sermon-filter-holder.hide-filter-bar {
        display: none !important;
    }
    <?php } ?>


    /* Archive Sermon Title Styling */

    <?php
    $asp_design_archive_title_color = get_option('asp_design_archive_title_color');
    $asp_design_archive_title_size = get_option('asp_design_archive_title_size');
    $asp_design_archive_title_height = get_option('asp_design_archive_title_height');
    $asp_design_archive_title_weight = get_option('asp_design_archive_title_weight');

    if (!empty($asp_design_archive_title_color) || !empty($asp_design_archive_title_size) || !empty($asp_design_archive_title_height) || !empty($asp_design_archive_title_weight)) { ?>
        .sermon-archive-single .sermon-title h2 a,
        .asp-sermon-archive-single-list .asp-sermon-title-list h2 a,
        .asp-sermon-archive-single-list .asp-sermon-title-list h2,
        .asp-sermon-archive-single-list .asp-sermon-title-list h2 a,
        .asp-sermon-archive-single-list .asp-sermon-title-list h2 {
            <?php if (!empty($asp_design_archive_title_color)) { ?> color: <?php echo $asp_design_archive_title_color ?>!important; <?php } ?>
            <?php if (!empty($asp_design_archive_title_size)) { ?> font-size: <?php echo $asp_design_archive_title_size ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_archive_title_height)) { ?> line-height: <?php echo $asp_design_archive_title_height ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_archive_title_weight)) { ?> font-weight: <?php echo $asp_design_archive_title_weight ?>!important; <?php } ?>
        }
    <?php } ?>

    <?php // Excerpt Styling

    $asp_design_excerpt_color = get_option('asp_design_excerpt_color');
    $asp_design_excerpt_size = get_option('asp_design_excerpt_size');
    $asp_design_excerpt_height = get_option('asp_design_excerpt_height');
    $asp_design_excerpt_weight = get_option('asp_design_excerpt_weight');

    if (!empty($asp_design_excerpt_color) || !empty($asp_design_excerpt_size) || !empty($asp_design_excerpt_height) || !empty($asp_design_excerpt_weight)) { ?>
        .sermon-archive-holder .sermon-archive-single .sermon-master-content p,
        .sermon-archive-holder .sermon-archive-single .sermon-master-content a {
            <?php if (!empty($asp_design_excerpt_color)) { ?> color: <?php echo $asp_design_excerpt_color ?>!important; <?php } ?>
            <?php if (!empty($asp_design_excerpt_size)) { ?> font-size: <?php echo $asp_design_excerpt_size ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_excerpt_height)) { ?> line-height: <?php echo $asp_design_excerpt_height ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_excerpt_weight)) { ?> font-weight: <?php echo $asp_design_excerpt_weight ?>!important; <?php } ?>
        }
    <?php } ?>

    <?php // Archive Sermon Details Styling

    $asp_design_archive_details_color = get_option('asp_design_archive_details_color');
    $asp_design_archive_details_link_color = get_option('asp_design_archive_details_link_color');
    $asp_design_archive_details_size = get_option('asp_design_archive_details_size');
    $asp_design_archive_details_height = get_option('asp_design_archive_details_height');
    $asp_design_archive_details_weight = get_option('asp_design_archive_details_weight');

    if (!empty($asp_design_archive_details_color) || !empty($asp_design_archive_details_size) || !empty($asp_design_archive_details_height) || !empty($asp_design_archive_details_weight)) { ?>
        .sermon-archive-holder .sermon-archive-details > div p,
        .sermon-archive-holder .sermon-media > div p,
        .asp-sermon-archive-single-list .asp-sermon-archive-bottom-list > div p,
        .asp-sermon-archive-single-list .asp-sermon-archive-top-list > div:not(.asp-sermon-title-list) p {
            <?php if (!empty($asp_design_archive_details_color)) { ?> color: <?php echo get_option('asp_design_archive_details_color') ?>!important; <?php } ?>
            <?php if (!empty($asp_design_archive_details_size)) { ?> font-size: <?php echo get_option('asp_design_archive_details_size') ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_archive_details_height)) { ?> line-height: <?php echo get_option('asp_design_archive_details_height') ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_archive_details_weight)) { ?> font-weight: <?php echo get_option('asp_design_archive_details_weight') ?>!important; <?php } ?>
        }
    <?php }

    if (!empty($asp_design_archive_details_link_color) || !empty($asp_design_archive_details_size) || !empty($asp_design_archive_details_height)) { ?>
        .sermon-archive-holder .sermon-archive-details > div a,
        .sermon-archive-holder .sermon-media > div a,
        .asp-sermon-archive-single-list .asp-sermon-archive-bottom-list > div a,
        .asp-sermon-archive-single-list .asp-sermon-archive-top-list > div:not(.asp-sermon-title-list) a {
            <?php if (!empty($asp_design_archive_details_link_color)) { ?> color: <?php echo $asp_design_archive_details_link_color ?>!important; <?php } ?>
    		    <?php if (!empty($asp_design_archive_details_size)) { ?> font-size: <?php echo $asp_design_archive_details_size ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_archive_details_height)) { ?> line-height: <?php echo $asp_design_archive_details_height ?>px!important; <?php } ?>
        }
    <?php }

    if (!empty($asp_design_archive_details_link_color)) { ?>
    	  .sermon-archive-holder .sermon-archive-single .sermon-master-content a,
    		.sermon-archive-single .sermon-archive-bible-passage a {
    			<?php if (!empty($asp_design_archive_details_link_color)) { ?> color: <?php echo $asp_design_archive_details_link_color ?>!important; <?php } ?>
        }
    <?php } ?>

    <?php // Single Sermon Title Styling

    $asp_design_sermon_title_color = get_option('asp_design_sermon_title_color');
    $asp_design_sermon_title_size = get_option('asp_design_sermon_title_size');
    $asp_design_sermon_title_height = get_option('asp_design_sermon_title_height');
    $asp_design_sermon_title_weight = get_option('asp_design_sermon_title_weight');

    if (!empty($asp_design_sermon_title_color) || !empty($asp_design_sermon_title_size) || !empty($asp_design_sermon_title_height) || !empty($asp_design_sermon_title_weight)) { ?>
        .sermon-wrapper .sermon-info .sermon-title h2  {
            <?php if (!empty($asp_design_sermon_title_color)) { ?> color: <?php echo $asp_design_sermon_title_color ?>!important; <?php } ?>
            <?php if (!empty($asp_design_sermon_title_size)) { ?> font-size: <?php echo $asp_design_sermon_title_size ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_sermon_title_height)) { ?> line-height: <?php echo $asp_design_sermon_title_height ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_sermon_title_weight)) { ?> font-weight: <?php echo $asp_design_sermon_title_weight ?>!important; <?php } ?>
        }
    <?php } ?>

    <?php // Single Sermon Details Styling

    $asp_design_sermon_details_text_color = get_option('asp_design_sermon_details_text_color');
    $asp_design_sermon_details_link_color = get_option('asp_design_sermon_details_link_color');
    $asp_design_sermon_details_size = get_option('asp_design_sermon_details_size');
    $asp_design_sermon_details_height = get_option('asp_design_sermon_details_height');
    $asp_design_sermon_details_weight = get_option('asp_design_sermon_details_weight');

    if (!empty($asp_design_sermon_details_text_color) || !empty($asp_design_sermon_details_size) || !empty($asp_design_sermon_details_height) || !empty($asp_design_sermon_details_weight)) { ?>
        .sermon-wrapper .sermon-info .sermon-header-details > div,
        .sermon-wrapper .sermon-info .sermon-header-details > div p {
            <?php if (!empty($asp_design_sermon_details_text_color)) { ?> color: <?php echo $asp_design_sermon_details_text_color ?>!important; <?php } ?>
            <?php if (!empty($asp_design_sermon_details_size)) { ?> font-size: <?php echo $asp_design_sermon_details_size ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_sermon_details_height)) { ?> line-height: <?php echo $asp_design_sermon_details_height ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_sermon_details_weight)) { ?> font-weight: <?php echo $asp_design_sermon_details_weight ?>!important; <?php } ?>
        }
    <?php }

    if (!empty($asp_design_sermon_details_link_color)) { ?>
        .sermon-wrapper .sermon-info .sermon-header-details > div a,
        .single-sermons .asp-sermon-archive-button,
        .asp-sermon-navigation .asp-previous-title,
        .asp-sermon-navigation .asp-next-title,
        .asp-sermon-navigation .asp-next-sermon-arrow,
        .asp-sermon-navigation .asp-prev-sermon-arrow,
        .sermon-wrapper .asp-social-share-holder a,
        .asp-related-sermons-holder .sermon-related-single .sermon-series a,
        .single-sermons .asp-bible-passage-holder a  {
            <?php if (!empty($asp_design_sermon_details_link_color)) { ?> color: <?php echo $asp_design_sermon_details_link_color ?>!important; <?php } ?>
        }
    <?php } ?>

    <?php // Single Sermon Paragraph Styling

    $asp_design_sermon_paragraph_color = get_option('asp_design_sermon_paragraph_color');
    $asp_design_sermon_paragraph_size = get_option('asp_design_sermon_paragraph_size');
    $asp_design_sermon_paragraph_height = get_option('asp_design_sermon_paragraph_height');
    $asp_design_sermon_paragraph_weight = get_option('asp_design_sermon_paragraph_weight');

    if (!empty($asp_design_sermon_paragraph_color) || !empty($asp_design_sermon_paragraph_size) || !empty($asp_design_sermon_paragraph_height) || !empty($asp_design_sermon_paragraph_weight)) { ?>
        .sermon-container .asp-column1 .sermon-main-content p,
        .sermon-container .sermon-info .sermon-header-details {
            <?php if (!empty($asp_design_sermon_paragraph_color)) { ?> color: <?php echo $asp_design_sermon_paragraph_color ?>!important; <?php } ?>
            <?php if (!empty($asp_design_sermon_paragraph_size)) { ?> font-size: <?php echo $asp_design_sermon_paragraph_size ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_sermon_paragraph_height)) { ?> line-height: <?php echo $asp_design_sermon_paragraph_height ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_sermon_paragraph_weight)) { ?> font-weight: <?php echo $asp_design_sermon_paragraph_weight ?>!important; <?php } ?>
        }
    <?php } ?>

    <?php // Single Sermon Details Styling

    $asp_design_sermon_details_color = get_option('asp_design_sermon_details_color');

    if (!empty($asp_design_filter_dropdown_text_color)) { ?>
        .sermon-details .details-sermon-speaker a,
        .sermon-details .details-sermon-speaker p,
        .sermon-details .sermon-soundcloud a,
        .sermon-details .sermon-mp4-file a,
        .sermon-details .sermon-pdf-file a,
        .sermon-details .sermon-bulletin-file a {
            <?php if (!empty($asp_design_sermon_details_color)) { ?> color: <?php echo $asp_design_sermon_details_color ?>!important; <?php } ?>
        }
    <?php } ?>

    <?php // Filter Bar Styling

    $asp_design_filter_dropdown_text_color = get_option('asp_design_filter_dropdown_text_color');
    $asp_design_filter_dropdown_text_color_hover = get_option('asp_design_filter_dropdown_text_color_hover');
    $asp_design_filter_dropdown_border = get_option('asp_design_filter_dropdown_border');
    $asp_design_filter_dropdown_border_hover = get_option('asp_design_filter_dropdown_border_hover');
    $asp_design_filter_dropdown_border_width = get_option('asp_design_filter_dropdown_border_width');
    $asp_design_filter_button_text_color = get_option('asp_design_filter_button_text_color');
    $asp_design_filter_button_text_color_hover = get_option('asp_design_filter_button_text_color_hover');
    $asp_design_filter_button_background = get_option('asp_design_filter_button_background');
    $asp_design_filter_button_background_hover = get_option('asp_design_filter_button_background_hover');
    $asp_design_filter_button_border = get_option('asp_design_filter_button_border');
    $asp_design_filter_button_border_hover = get_option('asp_design_filter_button_border_hover');
    $asp_design_filter_button_border_width = get_option('asp_design_filter_button_border_width');
    $asp_design_filter_button_border_radius = get_option('asp_design_filter_button_border_radius');

    if (!empty($asp_design_filter_dropdown_text_color) || !empty($asp_design_filter_dropdown_border) || !empty($asp_design_filter_dropdown_border_width)) { ?>
        .asp-archive-filter select,
        .asp-archive-filter .sermon-search-container .asp-filter-search,
        .asp-archive-filter .sermon-date-container .asp-filter-date {
            <?php if (!empty($asp_design_filter_dropdown_text_color)) { ?> color: <?php echo $asp_design_filter_dropdown_text_color ?>!important; <?php } ?>
            <?php if (!empty($asp_design_filter_dropdown_border)) { ?> border-color: <?php echo $asp_design_filter_dropdown_border ?>!important; <?php } ?>
            <?php if (!empty($asp_design_filter_dropdown_border_width)) { ?> border-width: <?php echo $asp_design_filter_dropdown_border_width ?>px!important; <?php } ?>
        }
    <?php }

    if (!empty($asp_design_filter_dropdown_text_color)) { ?>
        .asp-archive-filter .sermon-search-container ::placeholder,
        .asp-archive-filter .sermon-date-container ::placeholder,
        .asp-archive-filter .sermon-search-container:before,
        .asp-archive-filter .sermon-date-container .sermon-cancel-icon {
            <?php if (!empty($asp_design_filter_dropdown_text_color)) { ?> color: <?php echo $asp_design_filter_dropdown_text_color ?>!important; <?php } ?>
            <?php if (!empty($asp_design_filter_dropdown_text_color)) { ?> fill: <?php echo $asp_design_filter_dropdown_text_color ?>!important; <?php } ?>
        }
    <?php }

    if (!empty($asp_design_filter_dropdown_text_color_hover) || !empty($asp_design_filter_dropdown_border_hover)) { ?>
        .asp-archive-filter select:hover,
        .asp-archive-filter .sermon-search-container .asp-filter-search:hover,
        .asp-archive-filter .sermon-date-container .asp-filter-date:hover {
            <?php if (!empty($asp_design_filter_dropdown_text_color_hover)) { ?> color: <?php echo $asp_design_filter_dropdown_text_color_hover ?>!important; <?php } ?>
            <?php if (!empty($asp_design_filter_dropdown_border_hover)) { ?> border-color: <?php echo $asp_design_filter_dropdown_border_hover ?>!important; <?php } ?>
        }
    <?php }

    if (!empty($asp_design_filter_dropdown_text_color_hover)) { ?>
        .asp-archive-filter .sermon-search-container:hover ::placeholder,
        .asp-archive-filter .sermon-date-container:hover ::placeholder,
        .asp-archive-filter .sermon-search-container:hover::before,
        .asp-archive-filter .sermon-date-container:hover .sermon-cancel-icon {
            <?php if (!empty($asp_design_filter_dropdown_text_color_hover)) { ?> color: <?php echo $asp_design_filter_dropdown_text_color_hover ?>!important; <?php } ?>
            <?php if (!empty($asp_design_filter_dropdown_text_color_hover)) { ?> fill: <?php echo $asp_design_filter_dropdown_text_color_hover ?>!important; <?php } ?>
        }
    <?php }

    if (!empty($asp_design_filter_button_text_color) || !empty($asp_design_filter_button_background) || !empty($asp_design_filter_button_border) || !empty($asp_design_filter_button_border_width) || !empty($asp_design_filter_button_border_radius)) { ?>
        .asp-archive-filter input[type="submit"] {
            <?php if (!empty($asp_design_filter_button_text_color)) { ?> color: <?php echo $asp_design_filter_button_text_color ?>!important; <?php } ?>
            <?php if (!empty($asp_design_filter_button_background)) { ?> background-color: <?php echo $asp_design_filter_button_background ?>!important; <?php } ?>
            <?php if (!empty($asp_design_filter_button_border)) { ?> border-color: <?php echo $asp_design_filter_button_border ?>!important; <?php } ?>
            <?php if (!empty($asp_design_filter_button_border_width)) { ?> border-width: <?php echo $asp_design_filter_button_border_width ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_filter_button_border_width || $asp_design_filter_button_border_radius == 0)) { ?> border-radius: <?php echo $asp_design_filter_button_border_radius ?>px!important; <?php } ?>
        }
    <?php }

    if (!empty($asp_design_filter_button_text_color_hover) || !empty($asp_design_filter_button_background_hover) || !empty($asp_design_filter_button_border_hover)) { ?>
        .asp-archive-filter input[type="submit"]:hover {
            <?php if (!empty($asp_design_filter_button_text_color_hover)) { ?> color: <?php echo $asp_design_filter_button_text_color_hover ?>!important; <?php } ?>
            <?php if (!empty($asp_design_filter_button_background_hover)) { ?> background-color: <?php echo $asp_design_filter_button_background_hover ?>!important; <?php } ?>
            <?php if (!empty($asp_design_filter_button_border_hover)) { ?> border-color: <?php echo $asp_design_filter_button_border_hover ?>!important; <?php } ?>
        }
    <?php }

    if (!empty($asp_design_filter_dropdown_text_color)) { ?>
        .asp-archive-filter .sermon-field-container label {
            <?php if (!empty($asp_design_filter_dropdown_text_color)) { ?> color: <?php echo $asp_design_filter_dropdown_text_color ?>!important; <?php } ?>
        }
    <?php } ?>

    <?php  // Pagination Button Styling

    $asp_design_pagination_text_color = get_option('asp_design_pagination_text_color');
    $asp_design_pagination_text_color_hover = get_option('asp_design_pagination_text_color_hover');
    $asp_design_pagination_text_size = get_option('asp_design_pagination_text_size');
    $asp_design_pagination_text_height = get_option('asp_design_pagination_text_height');
    $asp_design_pagination_text_weight = get_option('asp_design_pagination_text_weight');
    $asp_design_pagination_text_padding = get_option('asp_design_pagination_text_padding');
    $asp_design_pagination_background = get_option('asp_design_pagination_background');
    $asp_design_pagination_background_hover = get_option('asp_design_pagination_background_hover');
    $asp_design_pagination_border = get_option('asp_design_pagination_border');
    $asp_design_pagination_border_hover = get_option('asp_design_pagination_border_hover');
    $asp_design_pagination_border_width = get_option('asp_design_pagination_border_width');
    $asp_design_pagination_border_radius = get_option('asp_design_pagination_border_radius');

    if (!empty($asp_design_pagination_text_color) || !empty($asp_design_pagination_text_size) || !empty($asp_design_pagination_text_height) || !empty($asp_design_pagination_text_weight) || !empty($asp_design_pagination_text_padding) || !empty($asp_design_pagination_background) || !empty($asp_design_pagination_border) || !empty($asp_design_pagination_border_width) || !empty($asp_design_pagination_border_radius)) { ?>
        .asp-sermon-pagination a,
        .asp-load-more-button,
        .asp-series-load-more .asp-series-shortcode-load-more,
        .asp-series-pagination a {
            <?php if (!empty($asp_design_pagination_text_color)) { ?> color: <?php echo $asp_design_pagination_text_color ?>!important; <?php } ?>
            <?php if (!empty($asp_design_pagination_text_size)) { ?> font-size: <?php echo $asp_design_pagination_text_size ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_pagination_text_height)) { ?> line-height: <?php echo $asp_design_pagination_text_height ?>px!important; height: <?php echo $asp_design_pagination_text_height ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_pagination_text_weight)) { ?> font-weight: <?php echo $asp_design_pagination_text_weight ?>!important; <?php } ?>
            <?php if (!empty($asp_design_pagination_text_padding)) { ?> padding-left: <?php echo $asp_design_pagination_text_padding ?>px!important; padding-right: <?php echo $asp_design_pagination_text_padding ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_pagination_background)) { ?> background-color: <?php echo $asp_design_pagination_background ?>!important; <?php } ?>
            <?php if (!empty($asp_design_pagination_border)) { ?> border-color: <?php echo $asp_design_pagination_border ?>!important; <?php } ?>
            <?php if (!empty($asp_design_pagination_border_width)) { ?> border-width: <?php echo $asp_design_pagination_border_width ?>px!important; <?php } ?>
            <?php if (!empty($asp_design_pagination_border_radius)) { ?> border-radius: <?php echo $asp_design_pagination_border_radius ?>px!important; <?php } ?>
        }
    <?php }

    if (!empty($asp_design_pagination_text_color_hover) || !empty($asp_design_pagination_background_hover) || !empty($asp_design_pagination_border_hover)) { ?>
        .asp-sermon-pagination a:hover,
        .asp-load-more-button:hover,
        .asp-series-load-more .asp-series-shortcode-load-more:hover,
        .asp-series-pagination a:hover {
            <?php if (!empty($asp_design_pagination_text_color_hover)) { ?> color: <?php echo $asp_design_pagination_text_color_hover ?>!important; <?php } ?>
            <?php if (!empty($asp_design_pagination_background_hover)) { ?> background-color: <?php echo $asp_design_pagination_background_hover ?>!important; <?php } ?>
            <?php if (!empty($asp_design_pagination_border_hover)) { ?> border-color: <?php echo $asp_design_pagination_border_hover ?>!important; <?php } ?>
        }
    <?php } ?>

    </style>

<?php }
add_action( 'wp_head', 'asp_dynamic_css' );


// Pro Version Unlock Message

function asp_pro_version_settings_message() {
    if (!is_plugin_active('advanced-sermons-pro/advanced-sermons-pro.php') ) { ?>
        <style type="text/css">
            .asp-pro-version,.asp-pro-version p,.asp-pro-version th{color:#fff!important}.asp-pro-version.asp-meta-box{padding-left:15px!important}.asp-pro-version.asp-meta-box:before{margin-left:-15px!important;margin-top:-10px!important}.asp-pro-version{background-color:#1a2733f2;pointer-events:none!important}.asp-pro-version:before{content:"Buy Pro version to unlock this feature";background-color:#2f3e4d;color:#fff!important;display:block!important;width:auto;overflow:hidden!important;margin-left:-35px;text-align:center;padding:11px 0;margin-top:-7px;font-size:13px!important}
        </style>
    <?php }
}
add_action( 'admin_head', 'asp_pro_version_settings_message' );
