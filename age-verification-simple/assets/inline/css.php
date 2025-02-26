<?php defined('ABSPATH') or die(); ?>

@keyframes _<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-scale_in {
	0% {
		transform: scale(0.97);
		opacity: 0;
	}
	100% {
		transform: scale(1);
		opacity: 1;
	}
}

html, body {
	pointer-events: none !important;
}

<?php if ($SETTINGS["popup_settings"]["page_block_scroll"]) { ?>
html, body {
	overflow: hidden !important;
}
<?php } ?>

body > *:not(#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-container) {
	-webkit-user-select: none !important;
	-moz-user-select: none !important;
	-ms-user-select: none !important;
	user-select: none !important;
}

<?php if ($SETTINGS["popup_settings"]["page_blur"]) { ?>
body > *:not(#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-container) {
	filter: blur(<?php print_r($SETTINGS["popup_settings"]["page_blur_value"]); ?>);
}
<?php if ($SETTINGS["popup_settings"]["page_blur_performance"]) { ?>
body *:not(#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-container) {
	animation: none !important;
	transition: none !important;
}
<?php } ?>
<?php } ?>

._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-wrap {
	
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	width: 100%;
	height: 100%;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	overflow: hidden;
	pointer-events: auto !important;
	
	<?php if ($SETTINGS["popup_settings"]["popup_outer_background"] !=='' ) { ?>
	background: <?php print_r($SETTINGS["popup_settings"]["popup_outer_background"]); ?>;
	<?php } ?>
	
	<?php if ($SETTINGS["popup_settings"]["popup_z_index"] !=='' ) { ?>
	z-index: <?php print_r($SETTINGS["popup_settings"]["popup_z_index"]); ?>;
	<?php } else { ?>
	z-index: 999999999;
	<?php } ?>
	
	<?php if ($SETTINGS["popup_settings"]["popup_text_color"] !=='' ) { ?>
	color: <?php print_r($SETTINGS["popup_settings"]["popup_text_color"]); ?>;
	fill: <?php print_r($SETTINGS["popup_settings"]["popup_text_color"]); ?>;
	<?php } ?>
	
}

._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-wrap * {
	
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	
}

._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup {
	
	position: relative;
	display: flex;
	flex-direction: column;
	justify-content: center;
/*	padding: 25px 15px;
	margin: 10px;*/
	border-radius: 3px;
	max-width: 100%;
	max-height: 100%;
	overflow: hidden auto;
	scrollbar-width: thin;
	
	<?php if ($SETTINGS["popup_settings"]["popup_width"] !=='' ) { ?>
	width: <?php print_r($SETTINGS["popup_settings"]["popup_width"]); ?>;
	<?php } else { ?>
	width: 400px;
	<?php } ?>
	
	box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.3);
	
	<?php if ($SETTINGS["popup_settings"]["popup_background"] !=='' ) { ?>
	background: <?php print_r($SETTINGS["popup_settings"]["popup_background"]); ?>;
	<?php } ?>
	
	-webkit-animation-duration: .2s;
	animation-duration: .2s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
	animation-delay: .2s;
	-webkit-animation-delay: .2s;
	animation-name: _<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-scale_in;
	-webkit-animation-name: _<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-scale_in;
	
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup:before {
	
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	
	background-repeat: no-repeat;
	background-size: cover;
	
	<?php if ($SETTINGS["popup_settings"]["popup_background_image"] !=='' ) { ?>
	background-image: url(<?php print_r($SETTINGS["popup_settings"]["popup_background_image"]); ?>);
	<?php } ?>
	
	<?php if ($SETTINGS["popup_settings"]["popup_background_image_blur_value"] !=='' ) { ?>
	filter: blur(<?php print_r($SETTINGS["popup_settings"]["popup_background_image_blur_value"]); ?>);
	margin-top: -<?php print_r($SETTINGS["popup_settings"]["popup_background_image_blur_value"]); ?>;
	margin-right: -<?php print_r($SETTINGS["popup_settings"]["popup_background_image_blur_value"]); ?>;
	margin-bottom: 0px;
	margin-left: -<?php print_r($SETTINGS["popup_settings"]["popup_background_image_blur_value"]); ?>;
	<?php } ?>
	
	z-index: 2;
	
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup:after {
	
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	
	<?php if ($SETTINGS["popup_settings"]["popup_background"] !=='' ) { ?>
	background: <?php print_r($SETTINGS["popup_settings"]["popup_background"]); ?>;
	<?php } ?>
	
	z-index: 3;
	
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-content {
	
	z-index: 6;
	
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup .h1,
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup .h2,
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup .h3,
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup h1,
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup h2,
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup h3
{
	margin-top: 10px;
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup .h1:first-child,
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup .h2:first-child,
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup .h3:first-child,
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup h1:first-child,
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup h2:first-child,
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup h3:first-child
{
	margin-top: 0px;
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-description {
	
	flex-grow: 1;
	font-size: 14px;
	padding: 25px 15px;
	margin: 10px;
	line-height: normal;
	
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-description > *:last-child {
	
	margin-bottom: 0 !important;
	
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-btns-wrap {
	
	display: flex;
	justify-content: center;
	align-items: center;
	/*margin-top: 20px;*/
	
	padding: 25px 15px;
	background: rgba(255, 255, 255, 0.025);
	width: 100%;
	
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-btn {
	
	position: relative;
	border-radius: 3px;
	border: none;
	background: transparent;
	outline: none;
	
	display: inline-flex;
	flex-grow: 0;
	flex-shrink: 0;
	max-width: 100%;
	list-style: none;
	width: 40%;
	flex-grow: 1;
	justify-content: center;
	align-items: center;
	
	transition: 200ms background-color ease, 200ms color ease, 200ms opacity ease;
	
	cursor: pointer;
	-webkit-user-select: none !important;
	-moz-user-select: none !important;
	-ms-user-select: none !important;
	user-select: none !important;
	
	padding: 5px 12px;
	max-width: 100%;
/*	min-height: 34px;
	min-width: 34px;*/
	height: 36px;
	margin: 0px 10px;
	opacity: 0.6;
	color: #bbb;
	fill: #bbb;
	text-transform: uppercase;
	font-size: 13px;
	letter-spacing: 0.2px;
	font-weight: bold;
	
	background: rgba(255,255,255,0.02);
	/*background: rgb(48, 54, 61);*/
	
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-btn:hover {
	
	opacity: 1;
	
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-btn_apply {
	
	/*background: #36c48e;*/
	border-bottom: 2px solid #36c48e;
	
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-btn_deny {
	
	/*background: #dc2e2e;*/
	border-bottom: 2px solid #dc2e2e;
	
}

._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-wait {
	
	opacity: 1;
	
	
}

<?php if ($SETTINGS["custom_css"] !=='' ) { ?>
<?php print_r($SETTINGS["custom_css"]); ?>
<?php } ?>

/* AC_LOADER mini */
@keyframes _<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-AC_rotate {
100% {
	-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
}
}
@keyframes _<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-AC_dash {
0% {
	stroke-dasharray: 1,200;
	stroke-dashoffset: 0;
}
50% {
	stroke-dasharray: 89,200;
	stroke-dashoffset: -35;
}
100% {
	stroke-dasharray: 89,200;
	stroke-dashoffset: -124;
}
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-wrap_a, ._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-spinner {
	pointer-events: none;
	-webkit-pointer-events: none;
	-moz-user-select: none;
	-webkit-user-select: none;
	user-select: none;
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-wrap_a {
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	overflow: hidden;
	z-index: 9;
	margin: 0 auto;
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-spinner {
	
	display: flex;
	align-items: center;
	justify-content: center;
	width: 36px;
	max-width: 100%;
	
	width: 100%;
	height: inherit;
	padding: inherit;
	
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-spinner svg {
	position: relative;
/*	width: 100%;
	height: 100%;*/
	width: 90%;
	height: 90%;
	-webkit-animation: _<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-AC_rotate 2s linear infinite;
	animation: _<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-AC_rotate 2s linear infinite;
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-spinner circle {
	stroke-dasharray: 1,200;
	stroke-dashoffset: 0;
	-webkit-animation: _<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-AC_dash 1.5s ease-in-out infinite;
	animation: _<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-AC_dash 1.5s ease-in-out infinite;
	stroke-linecap: round;
	stroke-width: 5px;
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-hide_content > * {
	opacity: 0 !important;
	pointer-events: none !important;
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-hide_content > ._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-spinner {
	opacity: 1 !important;
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-hide_content > * {
	opacity: 0 !important;
	pointer-events: none !important;
	-webkit-user-select: none !important;
	-moz-user-select: none !important;
	-ms-user-select: none !important;
	user-select: none !important;
	color: transparent !important;
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-hide_content > ._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-spinner {
	opacity: 1 !important;
}
._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-wait {
	pointer-events: none !important;
	-webkit-user-select: none !important;
	-moz-user-select: none !important;
	-ms-user-select: none !important;
	user-select: none !important;
}
