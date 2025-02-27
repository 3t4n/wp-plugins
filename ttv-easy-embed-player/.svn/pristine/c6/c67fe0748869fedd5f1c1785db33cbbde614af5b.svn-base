<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.streamweasels.com
 * @since      1.0.0
 *
 * @package    Streamweasels_Player_Pro
 * @subpackage Streamweasels_Player_Pro/public/partials
 */
?>

<?php
$options            = get_option('swti_options');
$optionsPlayer      = get_option('swti_options_player');
$layout             = ( isset( $args['layout'] ) ? $args['layout'] : $options['swti_layout'] ); 
$welcomeBgColour    = ( isset( $optionsPlayer['swti_player_welcome_bg_colour'] ) ? $optionsPlayer['swti_player_welcome_bg_colour'] : '#fff' );	
$welcomeBgColour    = ( isset( $args['player-welcome-bg-colour'] ) ? $args['player-welcome-bg-colour'] : $welcomeBgColour );	
$welcomeLogo        = ( isset( $optionsPlayer['swti_player_welcome_logo'] ) ? $optionsPlayer['swti_player_welcome_logo'] : '' );	
$welcomeLogo        = ( isset( $args['player-welcome-logo'] ) ? $args['player-welcome-logo'] : $welcomeLogo );	
$welcomeImage       = ( isset( $optionsPlayer['swti_player_welcome_image'] ) ? $optionsPlayer['swti_player_welcome_image'] : '' );	
$welcomeImage       = ( isset( $args['player-welcome-image'] ) ? $args['player-welcome-image'] : $welcomeImage );	
$welcomeText        = ( isset( $optionsPlayer['swti_player_welcome_text']  ) ? $optionsPlayer['swti_player_welcome_text']  : '' );	
$welcomeText        = ( isset( $args['player-welcome-text'] ) ? $args['player-welcome-text'] : $welcomeText );	
$welcomeText2       = ( isset( $optionsPlayer['swti_player_welcome_text_2'] ) ? $optionsPlayer['swti_player_welcome_text_2'] : '' );	
$welcomeText2       = ( isset( $args['player-welcome-text-2'] ) ? $args['player-welcome-text-2'] : $welcomeText2 );	
$welcomeTextColour  = ( isset( $optionsPlayer['swti_player_welcome_text_colour'] ) ? $optionsPlayer['swti_player_welcome_text_colour'] : '' );	
$welcomeTextColour  = ( isset( $args['player-welcome-text-colour'] ) ? $args['player-welcome-text-colour'] : $welcomeTextColour );	
$playerStreamPos    = ( isset( $optionsPlayer['swti_player_stream_position'] ) ? $optionsPlayer['swti_player_stream_position'] : 'left' );	
$playerStreamPos    = ( isset( $args['player-stream-list-position'] ) ? $args['player-stream-list-position'] : $playerStreamPos );	
if (sti_fs()->can_use_premium_code()) {
    $tileLayout         = ( isset( $args['tile-layout'] ) ? $args['tile-layout'] : $options['swti_tile_layout'] );
    $hoverEffect        = ( isset( $args['hover-effect'] ) ? $args['hover-effect'] : $options['swti_hover_effect'] );
    $title 				= ( isset( $args['title'] ) ? $args['title'] : $options['swti_title'] );
    $subtitle 			= ( isset( $args['subtitle'] ) ? $args['subtitle'] : $options['swti_subtitle'] );
    $embedChat          = ( isset( $args['embed-chat'] ) ? $args['embed-chat'] : $options['swti_embed_chat'] );
    $embedTitlePosition = ( isset( $args['title-position'] ) ? $args['title-position'] : $options['swti_embed_title_position'] );
    $showTitleTop       = ($embedTitlePosition == 'top' ? '<div class="cp-streamweasels__title"></div>' : '');
    $showTitleBottom    = ($embedTitlePosition == 'bottom' ? '<div class="cp-streamweasels__title"></div>' : '');
    $maxWidth           = ( isset( $args['max-width'] ) ? $args['max-width'] : $options['swti_max_width'] );		
} else {
    $tileLayout         = 'detailed';
    $hoverEffect        = 'none';
    $title 				= '';
    $subtitle 			= '';
    $embedChat          = 0;
    $embedTitlePosition = '';
    $showTitleTop       = '';
    $showTitleBottom    = '';
    $maxWidth           = '1440';
}

$showStreamsLeft    = (($playerStreamPos == '' || $playerStreamPos == 'none' || $playerStreamPos == 'left') ? '<div class="cp-streamweasels__streams cp-streamweasels__streams--'.$tileLayout.' cp-streamweasels__streams--hover-'.$hoverEffect.' cp-streamweasels__streams--position-'.$playerStreamPos.'"></div>' : '');
$showStreamsRight   = ($playerStreamPos == 'right' ? '<div class="cp-streamweasels__streams cp-streamweasels__streams--'.$tileLayout.' cp-streamweasels__streams--hover-'.$hoverEffect.' cp-streamweasels__streams--position-'.$playerStreamPos.'"></div>' : '');

$welcomeMarkup = '';
$welcomeTitleMarkup = '';
$loadingMarkup = '';

if ($welcomeText !== '' || $welcomeText2 !== '') {
    $welcomeTitleMarkup = 	'<div class="cp-streamweasels__welcome-text  cp-streamweasels__welcome-text--'.($welcomeLogo ? 'with-logo' : 'no-logo').'">'.
                                ($welcomeText ? '<p class="cp-streamweasels__welcome-text--line-1" style="color:'.$welcomeTextColour.'">'.$welcomeText.'</p>' : ''). 
                                ($welcomeText2 ? '<p class="cp-streamweasels__welcome-text--line-2" style="color:'.$welcomeTextColour.'">'.$welcomeText2.'</p>' : '').
                            '</div>';
}

$welcomeMarkup =	'<div class="cp-streamweasels__welcome">'.
                        ($welcomeImage ? '<img src="'.$welcomeImage.'">' : '').
                        '<div class="cp-streamweasels__welcome-wrapper">'.
                            ($welcomeLogo ? '<img src="'.$welcomeLogo.'">' : '').
                            $welcomeTitleMarkup.
                        '</div>'.
                    '</div>';

if ($welcomeText == '' && $welcomeText2 == '' && $welcomeLogo == '') {
    $loadingMarkup =	'<div class="cp-streamweasels__loader">
                            <div class="spinner-item"></div>
                            <div class="spinner-item"></div>
                            <div class="spinner-item"></div>
                            <div class="spinner-item"></div>
                            <div class="spinner-item"></div>
                        </div>';
}


echo    '<div class="cp-streamweasels cp-streamweasels--'.$uuid.' cp-streamweasels--'.$layout.'" data-uuid="'.$uuid.'">
            <div class="cp-streamweasels__inner" style="'.(($maxWidth !== 'none') ? 'max-width:'.$maxWidth.'px' : '').'">
                '.$showTitleTop.'
                <div class="cp-streamweasels__inner-wrapper">
                    <div class="cp-streamweasels__player-wrapper">
                        '.$showStreamsLeft.'
                        <div class="cp-streamweasels__player cp-streamweasels__player--position-'.$playerStreamPos.' cp-streamweasels__player--'.($embedChat ? 'video-with-chat' : 'video').'" style="'.(($welcomeBgColour) ? 'background-color:'.$welcomeBgColour.';' : '').'">
                            '.$loadingMarkup.'
                            <div class="cp-streamweasels__offline-wrapper">
                                '.$welcomeMarkup.'
                            </div>							
                        </div>
                        '.$showStreamsRight.'
                    </div>
                </div>
                '.$showTitleBottom.'
            </div>
        </div>';