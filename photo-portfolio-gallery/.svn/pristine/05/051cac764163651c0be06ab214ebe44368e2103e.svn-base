<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<style>
#web_pace_portfolio_container_<?php echo $portfolioID; ?> ul#portfolio-filter {
<?php if( $portfolioposition == 'on' ): ?> text-align: center;
<?php endif; ?>
}

#web_pace_portfolio_container_<?php echo $portfolioID; ?> ul#portfolio-filter li {
<?php if( $portfolioposition == 'on' ): ?> float: none;
<?php endif; ?>
}

#web_pace_portfolio_container_<?php echo $portfolioID; ?> ul#portfolio-filter a {
    display: inline-block;
    color: #<?php echo esc_html($photo_gallery_get_options['photo_gallery_ht_view7_filter_button_font_color']); ?>;
    background-color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_filter_button_background_color']; ?>;
    padding: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_filter_button_padding']; ?>px;
    border-radius: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_filter_button_radius']; ?>px;
    -moz-border-radius: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_filter_button_radius']; ?>px;
    -webkit-border-radius: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_filter_button_radius']; ?>px;
}

#web_pace_portfolio_container_<?php echo $portfolioID; ?> ul#portfolio-filter li.current a {
    color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_filter_button_font_active_color']; ?> !important;
    background-color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_filter_button_bg_color_active']; ?> !important;
}

#web_pace_portfolio_container_<?php echo $portfolioID; ?> ul#portfolio-filter li.current a:hover {
    color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_filter_button_font_active_color']; ?> !important;
    background-color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_filter_button_bg_color_active']; ?> !important;
}

#web_pace_portfolio_container_<?php echo $portfolioID; ?> ul#portfolio-filter a:hover {
    color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_filter_button_font_hover_color']; ?>;
    background-color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_filter_button_background_hover_color']; ?>;
}

#web_pace_portfolio_container_<?php echo $portfolioID; ?> #web-pace-container-loading-overlay_<?php echo $portfolioID; ?> {
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 1;
    background: url(<?php echo PHOTO_PORTFOLIO_IMAGES_URL.'/loading/loading-'.$portfolioLoadingIconype.'.svg'; ?>) center top;
    background-repeat: no-repeat;
    background-size: 60px auto;
<?php if($portfolioShowLoading != 'on') echo 'display:none'; ?>
}

#web_pace_portfolio_container_<?php echo $portfolioID; ?> #web_pace_portfolio_content_<?php echo $portfolioID; ?> {
<?php if($portfolioShowLoading == 'on'): ?> opacity: 0;
<?php endif; ?>
}

#web_pace_portfolio_container_<?php echo $portfolioID; ?> {
    position: relative;
    display: inline-block;
    width: 100%;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .wagwep-container {
<?php if ( $portfolioShowFiltering != 'on' ): ?> display: none;
<?php endif; ?>
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> ul.og-grid {
    padding: 0;
<?php if( $portfolioposition == 'on' ): ?> text-align: center;
<?php endif; ?>
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-grid > li {
    width: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_width'] + 2*$photo_gallery_get_options['photo_gallery_ht_view7_element_border_width']; ?>px;
    height: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_height'] + 2*$photo_gallery_get_options['photo_gallery_ht_view7_element_border_width']; ?>px;
<?php $margin = $photo_gallery_get_options['photo_gallery_ht_view7_element_margin']; ?> margin: <?php echo $margin; ?>px <?php echo $margin/2; ?>px 0 <?php echo $margin/2; ?>px;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-grid > li > a {
    width: 100%;
    height: 100%;
    overflow: hidden;
    box-shadow: none;
    max-height: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_height'] + 2*$photo_gallery_get_options['photo_gallery_ht_view7_element_border_width']; ?>px;
    border: solid #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_border_color']; ?> <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_border_width']; ?>px;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-grid li > a > img {
<?php if( $photo_gallery_get_options['photo_gallery_ht_view7_image_behaviour'] == 'resize'): ?> width: 100%;
    height: 100%;
<?php endif;?> max-width: none;
    max-height: none;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-grid > li > a > figure > span {
    padding: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_title_padding_top_bottom']; ?>px 0;
    margin: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_title_margin_top']; ?>px 20px 20px 20px;
    color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_title_font_color']; ?>;
    border-bottom: solid #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_title_border_color']; ?> <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_title_border_width']; ?>px;
    font-size: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_title_font_size']; ?>px;
    text-align: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_title_align']; ?>;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-grid > li .og-pointer {
    border-bottom-color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_expand_block_background_color']; ?>;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-grid > li > a > figure {
    background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($photo_gallery_get_options['photo_gallery_ht_view7_element_overlay_background_color_'],2));
				$overlay_opacity=$photo_gallery_get_options["photo_gallery_ht_view7_element_overlay_opacity"]/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$overlay_opacity.') ';
	?>;
    margin: 0;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander {
    width: <?php echo $photo_gallery_get_options[ 'photo_gallery_ht_view7_expand_width' ]; ?>%;
    background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($photo_gallery_get_options['photo_gallery_ht_view7_expand_block_background_color'],2));
				$expand_opacity=$photo_gallery_get_options["photo_gallery_ht_view7_expand_block_opacity"]/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$expand_opacity.') ';
	?>;
<?php if( $portfolioposition == 'on' ): ?> left: 50%;
    transform: translateX(-50%);
<?php else: ?> left: 0;
<?php endif; ?>
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander .elastislide-wrapper {
    background-color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_thumbnail_bg_color']; ?>;
<?php if( $photo_gallery_get_options['photo_gallery_ht_view7_thumbnail_block_box_shadow'] == 'on'): ?> box-shadow: inset 0 0 10px #000;
    -moz-box-shadow: inset 0 0 10px #000;
    -webkit-box-shadow: inset 0 0 10px #000;
<?php endif; ?>
    margin-bottom: 25px;
    height: 100px;
    box-sizing: content-box;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander ul.elastislide-list {
    padding: 0;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander ul.elastislide-list li {
    margin: 0 2% 5px 1%;
    max-width: none !important;
    max-height: none !important;
    width: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_thumbnail_width']; ?>px !important;
    height: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_thumbnail_height']; ?>px !important;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander ul.elastislide-list li > a > img {
    width: 100%;
    height: 100%;
    max-width: none;
    max-height: none;
    border: 2px solid #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_thumbnail_bg_color']; ?>px;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander ul.elastislide-list li > a > img.selected {
    border: 2px solid #999999;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander ul.elastislide-list li > a {
    width: 100%;
    height: 100%;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander .og-details a.link-button {
    font-size: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_expand_block_button_font_size']; ?>px;
    color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_expand_block_button_text_color']; ?>;
    background-color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_expand_block_button_background_color']; ?>;
    box-shadow: none;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander .og-details a.link-button:hover {
    color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_expand_block_description_font_hover_color']; ?>;
    background: -webkit-gradient(
        linear, left top, left bottom,
        from(#<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_expand_block_button_background_hover_color']; ?>),
        to(#<?php echo photo_gallery_adjust_brightness($photo_gallery_get_options['photo_gallery_ht_view7_expand_block_button_background_hover_color'],-50);?>));
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander .og-expander-inner {
    display: inline-block;
    width: 100%;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander .og-details p {
    font-size: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_expand_block_description_font_size']; ?>px;
    color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_expand_block_description_font_color']; ?>;
    text-align: <?php echo $photo_gallery_get_options['photo_gallery_ht_view7_expand_block_description_text_align']; ?>;
    margin: 0;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander .og-close {
    z-index: 999;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander .og-details {
    float: right;
    height: auto;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-expander .og-details h3 {
    color: #<?php echo $photo_gallery_get_options['photo_gallery_ht_view7_element_title_font_color']; ?>;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-fullimg {
    height: 100%;
    float: left;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-fullimg img {
    margin-bottom: 25px;
    width: 100%;
}

#web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-fullimg iframe {
    width: 100%;
    border: none;
    height: 82%!important;
}

@media (max-width: 767px){
    #web_pace_portfolio_content_<?php echo $portfolioID; ?> .og-fullimg {
        height: auto;
    }
}

</style >