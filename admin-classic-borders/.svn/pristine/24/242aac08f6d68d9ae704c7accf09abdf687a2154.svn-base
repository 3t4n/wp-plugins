<?php
    header("Content-type: text/css; charset: UTF-8; X-Content-Type-Options: nosniff;");
    $prefix = '.acb_slider';
?>

/*! jQuery UI - v1.10.3 - 2013-11-26
* http://jqueryui.com
* Includes: jquery.ui.core.css, jquery.ui.slider.css, jquery.ui.theme.css
* To view and modify this theme, visit http://jqueryui.com/themeroller/?ffDefault=Verdana%2CArial%2Csans-serif&fwDefault=normal&fsDefault=1.1em&cornerRadius=4px&bgColorHeader=333333&bgTextureHeader=diagonals_thick&bgImgOpacityHeader=8&borderColorHeader=a3a3a3&fcHeader=eeeeee&iconColorHeader=bbbbbb&bgColorContent=f9f9f9&bgTextureContent=highlight_hard&bgImgOpacityContent=100&borderColorContent=cccccc&fcContent=222222&iconColorContent=222222&bgColorDefault=111111&bgTextureDefault=glass&bgImgOpacityDefault=40&borderColorDefault=777777&fcDefault=e3e3e3&iconColorDefault=ededed&bgColorHover=1c1c1c&bgTextureHover=glass&bgImgOpacityHover=55&borderColorHover=000000&fcHover=ffffff&iconColorHover=ffffff&bgColorActive=ffffff&bgTextureActive=flat&bgImgOpacityActive=65&borderColorActive=cccccc&fcActive=222222&iconColorActive=222222&bgColorHighlight=ffeb80&bgTextureHighlight=inset_hard&bgImgOpacityHighlight=55&borderColorHighlight=ffde2e&fcHighlight=363636&iconColorHighlight=4ca300&bgColorError=cd0a0a&bgTextureError=inset_hard&bgImgOpacityError=45&borderColorError=9e0505&fcError=ffffff&iconColorError=ffcf29&bgColorOverlay=aaaaaa&bgTextureOverlay=highlight_hard&bgImgOpacityOverlay=40&opacityOverlay=30&bgColorShadow=aaaaaa&bgTextureShadow=highlight_soft&bgImgOpacityShadow=50&opacityShadow=20&thicknessShadow=8px&offsetTopShadow=-8px&offsetLeftShadow=-8px&cornerRadiusShadow=8px
* Copyright 2013 jQuery Foundation and other contributors; Licensed MIT */

/* Edited by Andy Mercer to avoid a conflict with the WordPress Color Picker. I've added
 * a class prefix onto everything in the sheet, which keeps the rules from being applied
 * anywhere besides my own sliders. Anywhere includes the Color Picker, which solves the
 * problem. */

/* Layout helpers
----------------------------------*/
<?php echo $prefix; ?>.ui-helper-hidden {
	display: none;
}
<?php echo $prefix; ?>.ui-helper-hidden-accessible {
	border: 0;
	clip: rect(0 0 0 0);
	height: 1px;
	margin: -1px;
	overflow: hidden;
	padding: 0;
	position: absolute;
	width: 1px;
}
<?php echo $prefix; ?>.ui-helper-reset {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	line-height: 1.3;
	text-decoration: none;
	font-size: 100%;
	list-style: none;
}
<?php echo $prefix; ?>.ui-helper-clearfix:before,
<?php echo $prefix; ?>.ui-helper-clearfix:after {
	content: "";
	display: table;
	border-collapse: collapse;
}
<?php echo $prefix; ?>.ui-helper-clearfix:after {
	clear: both;
}
<?php echo $prefix; ?>.ui-helper-clearfix {
	min-height: 0; /* support: IE7 */
}
<?php echo $prefix; ?>.ui-helper-zfix {
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	position: absolute;
	opacity: 0;
	filter:Alpha(Opacity=0);
}

<?php echo $prefix; ?>.ui-front {
	z-index: 100;
}


/* Interaction Cues
----------------------------------*/
<?php echo $prefix; ?>.ui-state-disabled {
	cursor: default !important;
}



/* Misc visuals
----------------------------------*/

/* Overlays */
<?php echo $prefix; ?>.ui-widget-overlay {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
<?php echo $prefix; ?>.ui-slider {
	position: relative;
	text-align: left;
}
<?php echo $prefix; ?>.ui-slider .ui-slider-handle {
	position: absolute;
	z-index: 2;
	width: 1em;
	height: 1em;
	cursor: default;
	outline:0;
	cursor:ew-resize;
}
<?php echo $prefix; ?>.ui-slider .ui-slider-range {
	position: absolute;
	z-index: 1;
	font-size: .7em;
	display: block;
	border: 0;
	background-position: 0 0;
}

/* For IE8 - See #6727 */
<?php echo $prefix; ?>.ui-slider.ui-state-disabled .ui-slider-handle,
<?php echo $prefix; ?>.ui-slider.ui-state-disabled .ui-slider-range {
	filter: inherit;
}

<?php echo $prefix; ?>.ui-slider-horizontal {
	height: .6em;
}
<?php echo $prefix; ?>.ui-slider-horizontal .ui-slider-handle {
	top: -.3em;
	margin-left: -.6em;
}
<?php echo $prefix; ?>.ui-slider-horizontal .ui-slider-range {
	top: 0;
	height: 100%;
}
<?php echo $prefix; ?>.ui-slider-horizontal .ui-slider-range-min {
	left: 0;
}
<?php echo $prefix; ?>.ui-slider-horizontal .ui-slider-range-max {
	right: 0;
}

/* Component containers
----------------------------------*/
<?php echo $prefix; ?>.ui-widget {
	font-family: Verdana,Arial,sans-serif;
	font-size: 1.1em;
}
<?php echo $prefix; ?>.ui-widget .ui-widget {
	font-size: 1em;
}
<?php echo $prefix; ?>.ui-widget input,
<?php echo $prefix; ?>.ui-widget select,
<?php echo $prefix; ?>.ui-widget textarea,
<?php echo $prefix; ?>.ui-widget button {
	font-family: Verdana,Arial,sans-serif;
	font-size: 1em;
}
<?php echo $prefix; ?>.ui-widget-content {
	border: 1px solid rgb(180,180,180);
	background: #f9f9f9 url(images/ui-bg_highlight-hard_100_f9f9f9_1x100.png) 50% top repeat-x;
	color: #222222;
}
<?php echo $prefix; ?>.ui-widget-content a {
	color: #222222;
}
<?php echo $prefix; ?>.ui-widget-header {
	border: 1px solid #a3a3a3;
	background: #333333 url(images/ui-bg_diagonals-thick_8_333333_40x40.png) 50% 50% repeat;
	color: #eeeeee;
	font-weight: bold;
}
<?php echo $prefix; ?>.ui-widget-header a {
	color: #eeeeee;
}

/* Interaction states
----------------------------------*/
<?php echo $prefix; ?>.ui-state-default,
<?php echo $prefix; ?>.ui-widget-content .ui-state-default,
<?php echo $prefix; ?>.ui-widget-header .ui-state-default {
	border: 1px solid #777777;
	background: #111111 url(images/ui-bg_glass_40_111111_1x400.png) 50% 50% repeat-x;
	font-weight: normal;
	color: #e3e3e3;
}
<?php echo $prefix; ?>.ui-state-default a,
<?php echo $prefix; ?>.ui-state-default a:link,
<?php echo $prefix; ?>.ui-state-default a:visited {
	color: #e3e3e3;
	text-decoration: none;
}
<?php echo $prefix; ?>.ui-state-hover,
<?php echo $prefix; ?>.ui-widget-content .ui-state-hover,
<?php echo $prefix; ?>.ui-widget-header .ui-state-hover,
<?php echo $prefix; ?>.ui-state-focus,
<?php echo $prefix; ?>.ui-widget-content .ui-state-focus,
<?php echo $prefix; ?>.ui-widget-header .ui-state-focus {
	border: 1px solid #000000;
	background: #1c1c1c url(images/ui-bg_glass_55_1c1c1c_1x400.png) 50% 50% repeat-x;
	font-weight: normal;
	color: #ffffff;
}
<?php echo $prefix; ?>.ui-state-hover a,
<?php echo $prefix; ?>.ui-state-hover a:hover,
<?php echo $prefix; ?>.ui-state-hover a:link,
<?php echo $prefix; ?>.ui-state-hover a:visited {
	color: #ffffff;
	text-decoration: none;
}
<?php echo $prefix; ?>.ui-state-active,
<?php echo $prefix; ?>.ui-widget-content .ui-state-active,
<?php echo $prefix; ?>.ui-widget-header .ui-state-active {
	border: 1px solid #cccccc;
	background: #ffffff url(images/ui-bg_glass_55_1c1c1c_1x400.png) 50% 50% repeat-x;
	font-weight: normal;
	color: #222222;
}
<?php echo $prefix; ?>.ui-state-active a,
<?php echo $prefix; ?>.ui-state-active a:link,
<?php echo $prefix; ?>.ui-state-active a:visited {
	color: #222222;
	text-decoration: none;
}

/* Interaction Cues
----------------------------------*/
<?php echo $prefix; ?>.ui-state-highlight,
<?php echo $prefix; ?>.ui-widget-content .ui-state-highlight,
<?php echo $prefix; ?>.ui-widget-header .ui-state-highlight {
	border: 1px solid #ffde2e;
	background: #ffeb80 url(images/ui-bg_inset-hard_55_ffeb80_1x100.png) 50% bottom repeat-x;
	color: #363636;
}
<?php echo $prefix; ?>.ui-state-highlight a,
<?php echo $prefix; ?>.ui-widget-content .ui-state-highlight a,
<?php echo $prefix; ?>.ui-widget-header .ui-state-highlight a {
	color: #363636;
}
<?php echo $prefix; ?>.ui-state-error,
<?php echo $prefix; ?>.ui-widget-content .ui-state-error,
<?php echo $prefix; ?>.ui-widget-header .ui-state-error {
	border: 1px solid #9e0505;
	background: #cd0a0a url(images/ui-bg_inset-hard_45_cd0a0a_1x100.png) 50% bottom repeat-x;
	color: #ffffff;
}
<?php echo $prefix; ?>.ui-state-error a,
<?php echo $prefix; ?>.ui-widget-content .ui-state-error a,
<?php echo $prefix; ?>.ui-widget-header .ui-state-error a {
	color: #ffffff;
}
<?php echo $prefix; ?>.ui-state-error-text,
<?php echo $prefix; ?>.ui-widget-content .ui-state-error-text,
<?php echo $prefix; ?>.ui-widget-header .ui-state-error-text {
	color: #ffffff;
}
<?php echo $prefix; ?>.ui-priority-primary,
<?php echo $prefix; ?>.ui-widget-content .ui-priority-primary,
<?php echo $prefix; ?>.ui-widget-header .ui-priority-primary {
	font-weight: bold;
}
<?php echo $prefix; ?>.ui-priority-secondary,
<?php echo $prefix; ?>.ui-widget-content .ui-priority-secondary,
<?php echo $prefix; ?>.ui-widget-header .ui-priority-secondary {
	opacity: .7;
	filter:Alpha(Opacity=70);
	font-weight: normal;
}
<?php echo $prefix; ?>.ui-state-disabled,
<?php echo $prefix; ?>.ui-widget-content .ui-state-disabled,
<?php echo $prefix; ?>.ui-widget-header .ui-state-disabled {
	opacity: .35;
	filter:Alpha(Opacity=35);
	background-image: none;
}
<?php echo $prefix; ?>.ui-state-disabled .ui-icon {
	filter:Alpha(Opacity=35); /* For IE8 - See #6059 */
}

/* Misc visuals
----------------------------------*/

/* Corner radius */
<?php echo $prefix; ?> .ui-corner-all,
<?php echo $prefix; ?> .ui-corner-top,
<?php echo $prefix; ?> .ui-corner-left,
<?php echo $prefix; ?> .ui-corner-tl {
	border-top-left-radius: 4px;
}
<?php echo $prefix; ?> .ui-corner-all,
<?php echo $prefix; ?> .ui-corner-top,
<?php echo $prefix; ?> .ui-corner-right,
<?php echo $prefix; ?> .ui-corner-tr {
	border-top-right-radius: 4px;
}
<?php echo $prefix; ?> .ui-corner-all,
<?php echo $prefix; ?> .ui-corner-bottom,
<?php echo $prefix; ?> .ui-corner-left,
<?php echo $prefix; ?> .ui-corner-bl {
	border-bottom-left-radius: 4px;
}
<?php echo $prefix; ?> .ui-corner-all,
<?php echo $prefix; ?> .ui-corner-bottom,
<?php echo $prefix; ?> .ui-corner-right,
<?php echo $prefix; ?> .ui-corner-br {
	border-bottom-right-radius: 4px;
}