<?php
/**
 * Plugin Name: Thirteen Colors
 * Plugin URI: http://celloexpressions.com/plugins/thirteen-colors
 * Description: Customize the bold colors of the Twenty Thirteen Theme, directly within the customizer.
 * Version: 1.0
 * Author: Nick Halsey
 * Author URI: http://celloexpressions.com/
 * Tags: Twenty Thirteen, Colors, Customizer, Custom Colors, Theme Colors
 * License: GPL

=====================================================================================
Copyright (C) 2013 Nick Halsey

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with WordPress; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
=====================================================================================
*/

// only run if theme or parent theme is Twenty Thirteen
if ( substr(get_template_directory_uri(),-14) == 'twentythirteen' ) {
	// add all of the actions and filters

	// add color picker settings to the customizer
	add_action('customize_register','thirteen_colors_customizer_actions');
	
	// add integration with header generator to customizer's header image control
	add_action('customize_render_control_header_image','thirteen_colors_render_content');
	
	// add plugin output to the <head>
	add_action( 'wp_head', 'thirteen_colors_css');

	// update the editor stylesheet on customizer save
	add_action('customize_save_after','thirteen_colors_regen_editor_styles');

	// add an editor stylesheet that imports the custom colors
	add_filter( 'mce_css', 'plugin_mce_css' );
}


function thirteen_colors_customizer_actions( $wp_customize ) {
	// add settings for each color
	$wp_customize->add_setting( 'thirteen_colors_one' , array(
	    'default'     => '#f7f5e7',
	    'transport'   => 'refresh'
	) );
	$wp_customize->add_setting( 'thirteen_colors_two' , array(
	    'default'     => '#fbca3c',
	    'transport'   => 'refresh'
	) );
	$wp_customize->add_setting( 'thirteen_colors_three' , array(
	    'default'     => '#db572f',
	    'transport'   => 'refresh'
	) );
	$wp_customize->add_setting( 'thirteen_colors_four' , array(
	    'default'     => '#ed331c',
	    'transport'   => 'refresh'
	) );
	$wp_customize->add_setting( 'thirteen_colors_five' , array(
	    'default'     => '#bc360a',
	    'transport'   => 'refresh'
	) );
	$wp_customize->add_setting( 'thirteen_colors_six' , array(
	    'default'     => '#722d19',
	    'transport'   => 'refresh'
	) );
	$wp_customize->add_setting( 'thirteen_colors_seven' , array(
	    'default'     => '#220e10',
	    'transport'   => 'refresh'
	) );
	$wp_customize->add_setting( 'thirteen_colors_eight' , array(
	    'default'     => '#141412',
	    'transport'   => 'refresh'
	) );
	
	// add each color setting to the color section
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'thirteen_colors_1', array(
		'label'      => 'Color 1 (navbar, aside & link format, comments background; quote, status, audio, video format text)',
		'section'    => 'colors',
		'settings'   => 'thirteen_colors_one',
		'priority'	 => 0
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'thirteen_colors_2', array(
		'label'      => 'Color 2 (link hover, gallery & chat format background)',
		'section'    => 'colors',
		'settings'   => 'thirteen_colors_two',
		'priority'	 => 1
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'thirteen_colors_3', array(
		'label'      => 'Color 3 (audio & video format background, nav hover, buttons)',
		'section'    => 'colors',
		'settings'   => 'thirteen_colors_three',
		'priority'	 => 2
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'thirteen_colors_4', array(
		'label'      => 'Color 4 (paging links, alternate link color, button hover)',
		'section'    => 'colors',
		'settings'   => 'thirteen_colors_four',
		'priority'	 => 3
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'thirteen_colors_5', array(
		'label'      => 'Color 5 (primary link color)',
		'section'    => 'colors',
		'settings'   => 'thirteen_colors_five',
		'priority'	 => 4
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'thirteen_colors_6', array(
		'label'      => 'Color 6 (status format background, gallery & chat format links)',
		'section'    => 'colors',
		'settings'   => 'thirteen_colors_six',
		'priority'	 => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'thirteen_colors_7', array(
		'label'      => 'Color 7 (caption, video format meta text; nav hover/sub-menu, audio/video player, footer widgets, quote format background)',
		'section'    => 'colors',
		'settings'   => 'thirteen_colors_seven',
		'priority'	 => 6
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'thirteen_colors_8', array(
		'label'      => 'Color 8 (general text)',
		'section'    => 'colors',
		'settings'   => 'thirteen_colors_eight',
		'priority'	 => 7
	) ) );
}

function thirteen_colors_render_content() {
	$url = 'http://celloexpressions.com/random/wordpress-twenty-thirteen-header-generator/index.php';
	$colors = array (
		'bc' => substr(get_theme_mod('thirteen_colors_one'),1),
		'c0' => substr(get_theme_mod('thirteen_colors_two'),1),
		'c1' => substr(get_theme_mod('thirteen_colors_three'),1),
		'c2' => substr(get_theme_mod('thirteen_colors_four'),1),
		'c3' => substr(get_theme_mod('thirteen_colors_five'),1),
		'c4' => substr(get_theme_mod('thirteen_colors_six'),1),
		'c5' => substr(get_theme_mod('thirteen_colors_seven'),1)
		// eight should be very similar to seven, and almost black, so exclude it
	);
	$url = add_query_arg($colors,$url);
	
	echo '<p><a href="'.$url.'" target="_blank" id="thirteen-colors-header-link">Click here to generate a header image with your custom colors &raquo;</a></p>';
	echo '<p><small>(save changes & refresh <em>first</em> to update colors)</small></p>';
	echo '<p><a href="themes.php?page=custom-header">Then, upload your custom header here &raquo;</a></p>';
}

function thirteen_colors_css(){
    ?>
	<style type="text/css" id="thirteen-colors-css">
	/* Thirteen Colors CSS: Override all colors in Twenty Thirteen, merging from ~20 hues to 8 + grayscales */
		/* Color 1 */
		.nav-menu .sub-menu,.nav-menu .children{border-color:<?php echo get_theme_mod('thirteen_colors_one'); ?>}.attachment .hentry,.paging-navigation,.archive-header,.page-header,.error404 .page-wrapper,.site-footer,.navbar,.format-aside,.format-link,.comment-respond,.no-comments{background-color:<?php echo get_theme_mod('thirteen_colors_one'); ?>}.format-quote .entry-content,.format-quote .entry-meta,.format-status .entry-meta a,.format-status .entry-content,.single-format-status .author-description,.format-audio .entry-content a,.format-audio .entry-meta a,.format-audio .entry-content a:hover,.format-audio .entry-meta a:hover,.format-video .entry-content a,.format-video .entry-meta a,.format-video .entry-content a:hover,.format-video .entry-meta a:hover,.error404 .page-title:before{color:<?php echo get_theme_mod('thirteen_colors_one'); ?>}
		/* Color 2 */
		a:active,a:hover,.entry-title a:hover,.entry-content a:hover,.comment-content a:hover,.format-status .entry-meta a:hover,.navigation a:hover,.comment-meta a:hover,.widget a:hover,.format-status .entry-content a{color:<?php echo get_theme_mod('thirteen_colors_two'); ?>}.format-gallery,.format-chat,.paging-navigation a:hover .meta-nav,.hentry .mejs-controls .mejs-time-rail .mejs-time-current{background-color:<?php echo get_theme_mod('thirteen_colors_two'); ?>}
		/* Color 3 */
		ul.nav-menu ul a:hover,.nav-menu ul ul a:hover,.format-audio,.format-video,.toggled-on .nav-menu li a:hover,.toggled-on .nav-menu ul a:hover{background-color:<?php echo get_theme_mod('thirteen_colors_three'); ?>}button,input[type=submit],input[type=button],input[type=reset]{background:<?php echo get_theme_mod('thirteen_colors_three'); ?>;border:0;box-shadow:1px 1px 1px rgba(0,0,0,.5)}
		/* Color 4 */
		.format-status .entry-content .page-links a,.format-gallery .entry-content .page-links a,.format-chat .entry-content .page-links a,.format-quote .entry-content .page-links a,.page-links a,.paging-navigation .meta-nav{background:<?php echo get_theme_mod('thirteen_colors_four'); ?>}.format-status .entry-content .page-links a,.format-gallery .entry-content .page-links a,.format-chat .entry-content .page-links a,.format-quote .entry-content .page-links a,.page-links a{border-color:<?php echo get_theme_mod('thirteen_colors_four'); ?>}a,.format-link .entry-title,.attachment .entry-meta a,.attachment .entry-meta .edit-link:before,.attachment .full-size-link:before,.post-navigation,.author-link,.format-gallery .entry-content .page-links a:hover,.format-audio .entry-content .page-links a:hover,.format-status .entry-content .page-links a:hover,.format-video .entry-content .page-links a:hover,.format-chat .entry-content .page-links a:hover,.format-quote .entry-content .page-links a:hover,.page-links a:hover,.format-quote .entry-content a,.format-quote .entry-meta a,.format-quote .linked,.comment-reply-title small a:hover,.comment-form .required,a:visited,.site-footer .widget a{color:<?php echo get_theme_mod('thirteen_colors_four'); ?>}button:hover,button:focus,input[type=submit]:hover,input[type=button]:hover,input[type=reset]:hover,input[type=submit]:focus,input[type=button]:focus,input[type=reset]:focus{background:<?php echo get_theme_mod('thirteen_colors_four'); ?>;transition:.2s all cubic-bezier(.8,.1,.1,.5)}button:active,input[type=submit]:active,input[type=button]:active,input[type=reset]:active{background:<?php echo get_theme_mod('thirteen_colors_four'); ?>;text-shadow:1px 1px 1px rgba(0,0,0,.4);border:0;-webkit-transform:scale(.95);-ms-transform:perspective(500px) rotateY(20deg) scale(.95);transform:perspective(500px) rotateY(20deg) scale(.95)}
		/* Color 5 */
		.nav-menu .current_page_item>a,.nav-menu .current_page_ancestor>a,.nav-menu .current-menu-item>a,.nav-menu .current-menu-ancestor>a,.entry-meta a,.entry-meta a:hover,.entry-content a,.comment-content a,.format-link .entry-title a,.navigation a,.comment-author .fn,.comment-author .url,.comment-reply-link,.comment-reply-login,.widget a{color:<?php echo get_theme_mod('thirteen_colors_five'); ?>}::selection{background-color:<?php echo get_theme_mod('thirteen_colors_five'); ?>; color:#fff;}
		/* Color 6 */
		.format-chat .entry-meta a,.format-chat .entry-content a,.format-chat .chat .chat-timestamp,.format-gallery .entry-meta a,.format-gallery .entry-content a,.format-gallery .entry-title a:hover,.format-chat .entry-title a:hover{color:<?php echo get_theme_mod('thirteen_colors_six'); ?>}.format-status{background-color:<?php echo get_theme_mod('thirteen_colors_six'); ?>}
		/* Color 7 */
		.wp-caption .wp-caption-text,.entry-caption,.nav-menu li:hover>a,.nav-menu li a:hover,.format-video .entry-meta,.comment-reply-title small a{color:<?php echo get_theme_mod('thirteen_colors_seven'); ?>}.nav-menu .sub-menu,.nav-menu .children,.hentry .mejs-mediaelement,.hentry .mejs-container .mejs-controls,.site-footer .sidebar-container, .format-quote,.nav-menu li:hover > a, .nav-menu li a:hover{background:<?php echo get_theme_mod('thirteen_colors_seven'); ?>}
		/* Color 8 */
		body,.toggled-on .nav-menu li>ul a,.toggled-on .nav-menu li:hover>a,.toggled-on .nav-menu .children a,.site-header .home-link,.nav-menu li a,.entry-title a,input,textarea{color:<?php echo get_theme_mod('thirteen_colors_eight'); ?>}
		/* Grayscale (non-customizable) */
		.format-gallery .entry-content .page-links a:hover,.format-audio .entry-content .page-links a:hover,.format-status .entry-content .page-links a:hover,.format-video .entry-content .page-links a:hover,.format-chat .entry-content .page-links a:hover,.format-quote .entry-content .page-links a:hover,.page-links a:hover,.hentry .mejs-controls .mejs-time-rail .mejs-time-loaded,.hentry .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,.site,.attachment .entry-content,.post-navigation,.error404 .page-header{background:#fff}.site-header .search-field:focus{background-color:#fff;}.page-links a,.format-quote .entry-content cite a{border-color:#fff}button,input[type=submit],input[type=button],input[type=reset],.nav-menu li:hover>a,.nav-menu li a:hover,.format-status .entry-content .page-links a,.format-gallery .entry-content .page-links a,.format-chat .entry-content .page-links a,.format-quote .entry-content .page-links a,.page-links a,ul.nav-menu ul a,.nav-menu ul ul a,.format-quote .entry-content cite a,.site-footer .widget,.site-footer .widget-title,.site-footer .widget-title a,.site-footer .wp-caption-text,.toggled-on .nav-menu li a:hover,.toggled-on .nav-menu ul a:hover{color:#fff}.site{border-left-color:#f2f2f2;border-right-color:#f2f2f2}pre{background:#f5f5f5;color:#666}table{border-bottom:1px solid #ededed}td{border-top:1px solid #ededed}fieldset{border:1px solid silver}.widget{background-color:rgba(240,240,240,.7)}.blog .format-link:first-of-type, .single .format-link:first-of-type{box-shadow: inset 0 2px 2px rgba(140, 140, 140, 0.2);}button,input,textarea{border-color:#ccc}.comment-meta,.comment-meta a,.ping-meta,.comment-awaiting-moderation,.widget_rss .rss-date,.widget_rss li>cite{color:#a2a2a2}::-webkit-input-placeholder{color:#777}:-moz-placeholder{color:#777}::-moz-placeholder{color:#777}:-ms-input-placeholder{color:#777}.form-allowed-tags,.form-allowed-tags code,.site-footer,.site-footer a{color:#666}input:focus,textarea:focus,.site-header .search-field:focus{border-color:#666}.hentry .mejs-controls .mejs-time-rail .mejs-time-total,.hentry .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total{background:#595959}del{color:#333}
	</style>
    <?php
}

function thirteen_colors_regen_editor_styles() {
	$file = plugin_dir_path( __FILE__ ) . 'editor-style.css';
	$data = '.post-format-quote,.post-format-status,.post-format-audio a,.post-format-video a,.post-format-audio a:hover,.post-format-video a:hover{color:'.get_theme_mod('thirteen_colors_one').'}.post-format-aside,.post-format-link{background-color:'.get_theme_mod('thirteen_colors_one').'}a:active,a:hover,.post-format-status a{color:'.get_theme_mod('thirteen_colors_two').'}.post-format-gallery,.post-format-chat{background-color:'.get_theme_mod('thirteen_colors_two').'}.post-format-audio,.post-format-video{background-color:'.get_theme_mod('thirteen_colors_three').'}a:visited,a,.post-format-quote a{color:'.get_theme_mod('thirteen_colors_four').'}::selection{background-color:'.get_theme_mod('thirteen_colors_five').';}.post-format-chat a,.post-format-gallery a{color:'.get_theme_mod('thirteen_colors_six').'}.post-format-status{background-color:'.get_theme_mod('thirteen_colors_six').'}.wp-caption .wp-caption-text,.wp-caption-dd{color:'.get_theme_mod('thirteen_colors_seven').'}.post-format-quote{background-color:'.get_theme_mod('thirteen_colors_seven').'}body{color:'.get_theme_mod('thirteen_colors_eight').'}';
	file_put_contents( $file, $data );
}

function plugin_mce_css( $mce_css ) {
	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= plugins_url( 'editor-style.css', __FILE__ );

	return $mce_css;
}