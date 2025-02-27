<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.streamweasels.com
 * @since      1.0.0
 *
 * @package    Streamweasels_Wall_Pro
 * @subpackage Streamweasels_Wall_Pro/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php

$options            = get_option('swti_options');
$layout             = ( isset( $args['layout'] ) ? $args['layout'] : $options['swti_layout'] ); 
$optionsWall        = get_option('swti_options_wall');
$tileColumnCount    = ( isset( $optionsWall['swti_wall_column_count'] ) ? $optionsWall['swti_wall_column_count'] : '4' );
$tileColumnCount    = ( isset( $args['wall-column-count'] ) ? $args['wall-column-count'] : $tileColumnCount );
$tileColumnSpacing  = ( isset( $optionsWall['swti_wall_column_spacing'] ) ? $optionsWall['swti_wall_column_spacing'] : '10' );
$tileColumnSpacing  = ( isset( $args['wall-column-spacing'] ) ? $args['wall-column-spacing'] : $tileColumnSpacing );
$titleMarkup        = '';
$subtitleMarkup     = '';
if (sti_fs()->can_use_premium_code()) {
    $tileLayout         = ( isset( $args['tile-layout'] ) ? $args['tile-layout'] : $options['swti_tile_layout'] );
    $embedChat          = ( isset( $args['embed-chat'] ) ? $args['embed-chat'] : $options['swti_embed_chat'] );
    $hoverEffect        = ( isset( $args['hover-effect'] ) ? $args['hover-effect'] : $options['swti_hover_effect'] );
    $title 				= ( isset( $args['title'] ) ? $args['title'] : $options['swti_title'] );
    $subtitle 			= ( isset( $args['subtitle'] ) ? $args['subtitle'] : $options['swti_subtitle'] );
    $embedTitlePosition = ( isset( $args['title-position'] ) ? $args['title-position'] : $options['swti_embed_title_position'] );
    $showTitleTop       = ($embedTitlePosition == 'top' ? '<div class="cp-streamweasels__title"></div>' : '');
    $showTitleBottom    = ($embedTitlePosition == 'bottom' ? '<div class="cp-streamweasels__title"></div>' : '');
    $maxWidth           = ( isset( $args['max-width'] ) ? $args['max-width'] : $options['swti_max_width'] );
} else {
    $tileLayout         = 'detailed';
    $embedChat          = 0;
    $hoverEffect        = 'play';
    $title 				= '';
    $subtitle 			= '';
    $embedTitlePosition = '';
    $showTitleTop       = '';
    $showTitleBottom    = '';
    $maxWidth           = '1440';
}

if ($title !== '') {
    $titleMarkup = '<h2 class="cp-streamweasels__heading">'.$title.'</h2>';
}
if ($subtitle !== '') {
    $subtitleMarkup = '<h3 class="cp-streamweasels__subheading">'.$subtitle.'</h3>';
}

echo    '<div class="cp-streamweasels cp-streamweasels--'.$uuid.' cp-streamweasels--'.$layout.'" data-uuid="'.$uuid.'">
            <div class="cp-streamweasels__inner" style="'.(($maxWidth !== 'none') ? 'max-width:'.$maxWidth.'px' : '').'">
                '.$titleMarkup.'
                '.$subtitleMarkup.'
                <div class="cp-streamweasels__loader">
                    <div class="spinner-item"></div>
                    <div class="spinner-item"></div>
                    <div class="spinner-item"></div>
                    <div class="spinner-item"></div>
                    <div class="spinner-item"></div>
                </div>
                '.$showTitleTop.'
                <div class="cp-streamweasels__player cp-streamweasels__player--'.($embedChat ? 'video-with-chat' : 'video').'"></div>
                '.$showTitleBottom.'
                <div class="cp-streamweasels__offline-wrapper"></div>
                <div class="cp-streamweasels__streams cp-streamweasels__streams--'.$tileLayout.' cp-streamweasels__streams--hover-'.$hoverEffect.'" style="'.(($tileColumnSpacing) ? 'grid-gap:'.$tileColumnSpacing.'px;' : '').(($tileColumnCount) ? 'grid-template-columns:'.'repeat('.$tileColumnCount.',minmax(100px,1fr))' : '').'"></div>
            </div>
        </div>';