<?php

namespace SeoThatMatters;

header('Content-type: text/css');

$prefix = 'seotm';

?>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-input-group h2,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-input-group h3 {
	letter-spacing: .01em;
	color: #383838
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-toggle-arrow {
    width: 20px;
    height: 20px;
    position: relative;
    cursor: pointer;
    float: right;
    text-decoration: none;
    border-bottom: 0;
    box-shadow: none;
}
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-toggle-arrow:after,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-toggle-arrow:before {
    content: "";
    display: block;
    width: 13px;
    height: 4px;
    background: #0184ba;
    position: absolute;
    top: 5px;
    transition: transform 0.1s;
}
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-toggle-arrow:before {
    left: 0;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    transform: rotate(45deg);
}
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-toggle-arrow:after {
    transform: rotate(-45deg);
    right: 0;
}
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-toggle-arrow.active:before {transform: rotate(-45deg)}
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-toggle-arrow.active:after {transform: rotate(45deg)}
.<?php echo $prefix; ?>-content {width: 100% }

.<?php echo $prefix; ?>-content label.error {
    color: rgba(247, 46, 12, 0.87);
    margin-left: 10px;
}
.<?php echo $prefix; ?>-content input.error {
    border: 1px solid rgba(247, 46, 12, 0.87);
    box-shadow: inset 0 1px 2px rgba(247, 46, 12, 0.44);
}

[class*="show-hide-content"],
.<?php echo $prefix; ?>-content section {
    display: none;
}
.<?php echo $prefix; ?>-content section.current {
    display: block;
}
.<?php echo $prefix; ?>-content .sub-fields {
    padding-left: 30px;
}

.<?php echo $prefix; ?>-content .<?php echo $prefix; ?>-body-header,
.<?php echo $prefix; ?>-sidebar .<?php echo $prefix; ?>-body-header {
    padding: 16px 24px;
    border-bottom: 1px solid #f1f1f1;
}

.<?php echo $prefix; ?>-content .<?php echo $prefix; ?>-body-header {
	margin-bottom: 24px
}

.<?php echo $prefix; ?>-content .<?php echo $prefix; ?>-body-header h2,
.<?php echo $prefix; ?>-sidebar .<?php echo $prefix; ?>-body-header h2 {
    margin: 0 !important;
}
.<?php echo $prefix; ?>-content .<?php echo $prefix; ?>-body-main {
    padding: 24px;
}

.<?php echo $prefix; ?>-input-group .<?php echo $prefix; ?>-input { padding-bottom: 10px }
.sub-fields .<?php echo $prefix; ?>-input-group .<?php echo $prefix; ?>-input { padding-bottom: 0 }

.<?php echo $prefix; ?>-input-group .tab-login {
    position: relative;
}

.<?php echo $prefix; ?>-input-group .inline {
    display: inline-block;
}
.<?php echo $prefix; ?>-input-group .inline .<?php echo $prefix; ?>-input {
    display: inline-block;
    padding-right: 10px;
}

.<?php echo $prefix; ?>-help {
    font-size: calc(7.85px + (13.175 - 7.85) * ((100vw - 767px) / (1920 - 767)));
	letter-spacing: -0.0045em;
	color: #575757;
	color: #595959
}

.<?php echo $prefix; ?>-help .custom {
    font-size: calc(7.85px + (13.105 - 7.85) * ((100vw - 767px) / (1920 - 767)));
	letter-spacing: -0.0065em;
	font-style: italic;
	color: #787878
}

.<?php echo $prefix; ?>-help.custom {
    font-size: calc(7.35px + (13 - 7.35) * ((100vw - 767px) / (1920 - 767)));
	margin-top: -1px;
	color: #888
}

.<?php echo $prefix; ?>-form .<?php echo $prefix; ?>-menus-settings .<?php echo $prefix; ?>-input {
    padding-bottom: 0;
}
.<?php echo $prefix; ?>-form .<?php echo $prefix; ?>-menus-settings .toggle-label {
    padding-bottom: 5px;
    padding-top: 5px;
}
.<?php echo $prefix; ?>-admin_wrapper .sub-fields,
.<?php echo $prefix; ?>-admin_wrapper .<?php echo $prefix; ?>-input .toggle-label {
    padding-left: 0;
}
.<?php echo $prefix; ?>-input-group li,
.<?php echo $prefix; ?>-input-group li .<?php echo $prefix; ?>-input {
    padding: 0;
}
.<?php echo $prefix; ?>-input-group li label.toggle-label {
    padding-top: 5px;
    padding-bottom: 5px !important;
}
.<?php echo $prefix; ?>-toggle-wrapper ul ul {
    padding-left: 30px;
}
.<?php echo $prefix; ?>-toggle {
    display: none !important;
}
.<?php echo $prefix; ?>-toggle,
.<?php echo $prefix; ?>-toggle *,
.<?php echo $prefix; ?>-toggle + .<?php echo $prefix; ?>-toggle-btn,
.<?php echo $prefix; ?>-toggle:after,
.<?php echo $prefix; ?>-toggle :after,
.<?php echo $prefix; ?>-toggle:before,
.<?php echo $prefix; ?>-toggle :before {
    box-sizing: border-box;
}
.<?php echo $prefix; ?>-toggle + .<?php echo $prefix; ?>-toggle-btn::-moz-selection,
.<?php echo $prefix; ?>-toggle::-moz-selection,
.<?php echo $prefix; ?>-toggle ::-moz-selection,
.<?php echo $prefix; ?>-toggle:after::-moz-selection,
.<?php echo $prefix; ?>-toggle :after::-moz-selection,
.<?php echo $prefix; ?>-toggle:before::-moz-selection,
.<?php echo $prefix; ?>-toggle :before::-moz-selection {
    background: 0;
}
.<?php echo $prefix; ?>-toggle + .<?php echo $prefix; ?>-toggle-btn::selection,
.<?php echo $prefix; ?>-toggle::selection,
.<?php echo $prefix; ?>-toggle ::selection,
.<?php echo $prefix; ?>-toggle:after::selection,
.<?php echo $prefix; ?>-toggle :after::selection,
.<?php echo $prefix; ?>-toggle:before::selection,
.<?php echo $prefix; ?>-toggle :before::selection {
    background: 0;
}
.<?php echo $prefix; ?>-toggle + .<?php echo $prefix; ?>-toggle-btn {
    outline: 0;
	width: calc(16px + (26 - 16) * ((100vw - 767px) / (1920 - 767)));
    height: calc(8px + (13 - 8) * ((100vw - 767px) / (1920 - 767)));
    position: relative;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.<?php echo $prefix; ?>-toggle + .<?php echo $prefix; ?>-toggle-btn:after,
.<?php echo $prefix; ?>-toggle + .<?php echo $prefix; ?>-toggle-btn:before {
    position: relative;
    display: block;
    content: "";
    width: 50%;
    height: 100%;
}
.<?php echo $prefix; ?>-toggle + .<?php echo $prefix; ?>-toggle-btn:after {
    left: 0;
}
.<?php echo $prefix; ?>-toggle + .<?php echo $prefix; ?>-toggle-btn:before {
    display: none;
}
.<?php echo $prefix; ?>-toggle:checked + .<?php echo $prefix; ?>-toggle-btn:after {
    left: 50%;
}
.<?php echo $prefix; ?>-toggle-light + .<?php echo $prefix; ?>-toggle-btn {
    background: #9e9c9c;
    border-radius: 1em;
    padding: 1px;
    transition: all 0.4s ease;
}
.<?php echo $prefix; ?>-toggle-light + .<?php echo $prefix; ?>-toggle-btn:after {
    border-radius: 50%;
    background: #fefefe;
    transition: all 0.2s ease;
}
.<?php echo $prefix; ?>-toggle-light + .<?php echo $prefix; ?>-toggle-btn.disabled {
    background-color: hsla(0, 1%, 61.6%, 0.1882352941);
}
.<?php echo $prefix; ?>-toggle-light:checked + .<?php echo $prefix; ?>-toggle-btn.disabled {
    background-color: hsla(0, 1%, 61.6%, 0.1882352941);
}

.<?php echo $prefix; ?>-input-group label,
.<?php echo $prefix; ?>-input-group .toggle-label {
    font-weight: 700;
    display: inline-block;
    padding-left: calc(3.5px + (4.5 - 3.5) * ((100vw - 767px) / (1680 - 767)));
    padding-top: 9px;
    padding-bottom: 9px;
}

.<?php echo $prefix; ?>-input-group .grid label,
.<?php echo $prefix; ?>-input-group .grid .toggle-label {
	font-size: calc(8.5px + (14.05 - 8.5) * ((100vw - 767px) / (1920 - 767)));
	line-height: 0.715;
}

/* .grid .<?php echo $prefix; ?>-input-group .toggle-label, */
.<?php echo $prefix; ?>-input-group .grid .toggle-label {
	padding-top: 8.5px;
    padding-bottom: 8.5px;
}

.grid.misc .<?php echo $prefix; ?>-input-group .toggle-label {
	margin-left: clamp(2.5px, (100vw - 100vmin), 4px)
}

/*
.grid .<?php echo $prefix; ?>-toggle + .<?php echo $prefix; ?>-toggle-btn,
.<?php echo $prefix; ?>-input-group .grid .toggle-label {
	transform: scale(.9)
}
*/

.<?php echo $prefix; ?>-input-group .toggle-label.disabled {
    color: rgba(103, 102, 102, 0.44);
}


/* custom */

#adminmenu li[class*="<?php echo $prefix; ?>"] .wp-menu-name {
	font-weight: bold;
    font-size: .778rem;
    line-height: 1.4;
    -webkit-font-smoothing: antialiased;
}

body[class*="<?php echo $prefix; ?>"] #wpcontent a {
    transition-property: none;
    transition-duration: 0s;
}

body[class*="<?php echo $prefix; ?>"] h1.<?php echo $prefix; ?>-page_title {
	margin: 0;
	padding: 0
}

body[class*="<?php echo $prefix; ?>"] h1.<?php echo $prefix; ?>-page_title {
	font-weight: bold;
    font-size: 1.0285rem;
    font-size: calc(12.35px + (16.95 - 12.35) * ((100vw - 767px) / (1920 - 767)));
    padding: 0;
    padding-top: calc(0px + (2 - 0) * ((100vw - 767px) / (1920 - 767)));
    padding-bottom: calc(1px + (5 - 1) * ((100vw - 767px) / (1920 - 767)));
    padding-left: 0.035em;
    display: flex;
    align-items: center;
    letter-spacing: -0.015em;
    word-spacing: -0.075em;
}

.<?php echo $prefix; ?>-header {
    max-width: 90%;
    margin-left: 28.5px;
    margin-top: 1.785rem;
    margin-bottom: 1.5rem;
	gap: .5%
}

.<?php echo $prefix; ?>-page_title span {
    color: #fefefe;
    font-size: 54.25%;
    position: relative;
    line-height: 1.125;
    letter-spacing: -0.0055em;
    word-spacing: 0.025em;
    margin-left: 6px;
    margin-top: -3px;
    padding: 5px 9px;
    border-radius: 30px;
    -webkit-font-smoothing: antialiased;
    background-color: rgb(70 105 131 / 88%);
    box-shadow: inset 0 0 28px #52616c;
    transform: translate(0, -4.5px);
}

p.<?php echo $prefix; ?>-page_description {
	line-height: 1.05;
    margin: 0.365em 0 0.5em 0.05em;
    font-size: .925em;
	 font-size: .9em;
	color: #606060
}

.super-hide,
.<?php echo $prefix; ?>-wrapper .branding-toggled-off {
	display:none;
	overflow: hidden;
    clip: rect(0 0 0 0);
    width: 1px;
    height: 1px;
    margin: -1px;
    padding: 0;
    border: 0;
    position: absolute;
    top: -999vh;
    left: -999vw;
    content-visibility: hidden;
}

.<?php echo $prefix; ?>-wrapper {
    max-width: 100%;
    margin: 0;
	padding: 0 23px;
	display: flex;
	flex-wrap: wrap;
	margin-bottom: 1.25rem;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-content .<?php echo $prefix; ?>-body-wrapper {border:0}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-content .<?php echo $prefix; ?>-body-wrapper {
	border-left: 0;
	margin-bottom: 0;
    padding: 0 18px;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-content {
	padding-top: 1rem;
	padding-bottom: 1rem;
	min-height: 70.7vh;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .<?php echo $prefix; ?>-body-header,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-content .<?php echo $prefix; ?>-body-header,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-content .<?php echo $prefix; ?>-body-main {
	padding-left: 2px;
	padding-right: 4px;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-content .<?php echo $prefix; ?>-body-main {padding-bottom:10px}

.<?php echo $prefix; ?>-sidebar h2,
.<?php echo $prefix; ?>-wrapper .big-heder h2,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-body-header h2 {
    font-size: calc(9.5px + (14.125 - 9.5) * ((100vw - 767px) / (1920 - 767)));
}

.<?php echo $prefix; ?>-wrapper .custom-header h2 {
    font-size: calc(9.5px + (12.65 - 9.5) * ((100vw - 767px) / (1920 - 767)));
	margin: 0.8em 0
}

.<?php echo $prefix; ?>-wrapper .custom-header h3 {
    font-size: calc(8.5px + (12.245 - 8.5) * ((100vw - 767px) / (1920 - 767)));
	font-weight: normal;
	margin: 0.8em 0
}

.<?php echo $prefix; ?>-wrapper .navigation {
    padding-bottom: 2px;
	transition: all .7s cubic-bezier(.16,.68,.43,.99);
	display: flex;
}

.<?php echo $prefix; ?>-wrapper .navigation .nav li:first-child a.current,
.<?php echo $prefix; ?>-wrapper .navigation li a.current {
    color: #222;
    border-top: 4px solid #466983;
	position: relative;
    z-index: 2;
}

.<?php echo $prefix; ?>-wrapper .navigation li a {
    text-decoration: none;
    padding: 2.2vh 2em;
	padding: 2.2vh 1.735em;
	font-size: calc(6.5px + (12.125 - 6.5) * ((100vw - 767px) / (1920 - 767)));
    line-height: 16px;
    text-decoration: none;
    border-top: 1px solid #e9e9e9;
    color: #585858;
    font-weight: 600;
    box-shadow: none;
    margin: 0;
    text-transform: uppercase;
	min-width: 100%;
}

.<?php echo $prefix; ?>-wrapper .navigation,
.<?php echo $prefix; ?>-wrapper .navigation li a {
    border-top-left-radius: 12px;
}

.<?php echo $prefix; ?>-wrapper .navigation .nav li:first-child a {
	border-top: 0;
}

.<?php echo $prefix; ?>-wrapper .navigation .nav li:last-child a {
	border-bottom: 1px solid #e9e9e9;
}

.<?php echo $prefix; ?>-wrapper .navigation .small-padding li a {
	padding: 1.7vh 2.1em;
}

.<?php echo $prefix; ?>-wrapper .navigation {width: 13.5%}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form {
    position: relative;
	min-width: 67.25%;
    max-width: 67.25%;
	padding: 0 11px;
	border-left: 9px solid #f9f9f9;
    border-right: 9px solid #f9f9f9;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar {width: 19.25%}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar {
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .<?php echo $prefix; ?>-navigation li {
    display: inline-block;
    padding-bottom: calc(4px + (12 - 4) * ((100vw - 767px) / (1920 - 767)));
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .<?php echo $prefix; ?>-navigation li a {
    font-size: calc(7.85px + (13.85 - 7.85) * ((100vw - 767px) / (1920 - 767)));
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .<?php echo $prefix; ?>-navigation li a.current {
    background: #f5f5f5;
    color: #484848;
    border-left: 3px solid #808080;
}

body[class*="<?php echo $prefix; ?>"] #wpcontent {
	background-color: #fafcfe;
	background-color: #f7f7f7;
}

body[class*="<?php echo $prefix; ?>"] .title-label,
body[class*="<?php echo $prefix; ?>"] .toggle-label,
.<?php echo $prefix; ?>-input-group label {
	font-size: calc(8.5px + (13.875 - 8.5) * ((100vw - 767px) / (1920 - 767)));
	letter-spacing: -.00275em;
	word-spacing: -0.0275em;
	line-height: 1
}

.<?php echo $prefix; ?>-input-group .toggle-label.small {
    font-size: calc(8.5px + (13.445 - 8.5) * ((100vw - 767px) / (1920 - 767)));
    letter-spacing: -.00275em;
    word-spacing: -0.0275em;
    line-height: 1;
}

.<?php echo $prefix; ?>-input-group .sitemap-control-item .toggle-label {
    padding-top: 7.5px;
    padding-bottom: 7.5px;
	padding-left: 7.5px;
}

body[class*="<?php echo $prefix; ?>"] .<?php echo $prefix; ?>-save-settings {
    margin-top: auto;
	margin-bottom: 1.75rem;
    padding-left: 21px;
}

body[class*="<?php echo $prefix; ?>"] #wpcontent .<?php echo $prefix; ?>-form input.button.custom,
body[class*="<?php echo $prefix; ?>"] #wpcontent .<?php echo $prefix; ?>-save-settings input.button {
    background: #52616c;
    background: linear-gradient(183deg, #52616c, rgb(82 97 108 / 93%));
    font-size: calc(7.65px + (14.65 - 7.65) * ((100vw - 767px) / (1920 - 767)));
	transition: background .575s ease;
    color: #fff;
    padding: 4.75px 13.75px;
    border-radius: 5px;
	box-shadow: none;
	border: 0;
}

body[class*="<?php echo $prefix; ?>"] #wpcontent .<?php echo $prefix; ?>-form input.button.custom {
    padding: 4.5px 14.5px;
}

body[class*="<?php echo $prefix; ?>"] #wpcontent .<?php echo $prefix; ?>-save-settings input.button:hover,
body[class*="<?php echo $prefix; ?>"] #wpcontent .<?php echo $prefix; ?>-save-settings input.button:active,
body[class*="<?php echo $prefix; ?>"] #wpcontent .<?php echo $prefix; ?>-save-settings input.button:focus {
	background: linear-gradient(3deg, #52616c, rgb(82 97 108 / 88%));
	color: #fff;
	outline: 0!important;
}

.<?php echo $prefix; ?>-page_title img,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-page_title img {
    margin-right: 12px;
    width: 107px;
    height: auto;
}

.<?php echo $prefix; ?>-wrapper select {font-size:.775rem}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-toggle-light:checked+.<?php echo $prefix; ?>-toggle-btn {background:#466983}

.<?php echo $prefix; ?>-wrapper .pt-0 {padding-top:0}
.<?php echo $prefix; ?>-wrapper .pt-4 {padding-top:4px}
.<?php echo $prefix; ?>-wrapper .pt-6 {padding-top:6px}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .pt-8,
.<?php echo $prefix; ?>-wrapper .pt-8 {padding-top:8px}

.<?php echo $prefix; ?>-wrapper .pt-10 {padding-top:10px}
.<?php echo $prefix; ?>-wrapper .pt-12 {padding-top:12px}
.<?php echo $prefix; ?>-wrapper .pt-13 {padding-top:13px}
.<?php echo $prefix; ?>-wrapper .pt-15 {padding-top:15px}
.<?php echo $prefix; ?>-wrapper .pt-18 {padding-top:18px}
.<?php echo $prefix; ?>-wrapper .pt-20 {padding-top:20px}
.<?php echo $prefix; ?>-wrapper .pt-24 {padding-top:24px}


.<?php echo $prefix; ?>-wrapper .pb-0 {padding-bottom:0}
.<?php echo $prefix; ?>-wrapper .pb-4 {padding-bottom:4px}
.<?php echo $prefix; ?>-wrapper .pb-5 {padding-bottom:5px}

.<?php echo $prefix; ?>-wrapper .flex.grid-col-2.pb-6,
.<?php echo $prefix; ?>-wrapper .pb-6 {padding-bottom:6px}

.<?php echo $prefix; ?>-wrapper .flex.grid-col-2.pb-8,
.<?php echo $prefix; ?>-wrapper .pb-8 {padding-bottom:8px}

.<?php echo $prefix; ?>-wrapper .pb-10 {padding-bottom:10px}
.<?php echo $prefix; ?>-wrapper .pb-15 {padding-bottom:15px}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .pb-18,
.<?php echo $prefix; ?>-wrapper .pb-18 {padding-bottom:18px}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .pb-24,
.<?php echo $prefix; ?>-wrapper .pb-24 {padding-bottom:24px}

.<?php echo $prefix; ?>-wrapper .pl-6 {padding-left:6px}
.<?php echo $prefix; ?>-wrapper .pl-4 {padding-left:4px}
.<?php echo $prefix; ?>-wrapper .pl-2 {padding-left:2px}
.<?php echo $prefix; ?>-wrapper .pl-1 {padding-left:1px}
.<?php echo $prefix; ?>-wrapper .pl-0 {padding-left:0}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar li.mb-0,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .mb-0, .<?php echo $prefix; ?>-wrapper .mb-0 {margin-bottom:0px}
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .mb-3, .<?php echo $prefix; ?>-wrapper .mb-3 {margin-bottom:3px}
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .mb-5, .<?php echo $prefix; ?>-wrapper .mb-5 {margin-bottom:5px}
.<?php echo $prefix; ?>-wrapper .mb-7 {margin-bottom:7px!important}
.<?php echo $prefix; ?>-wrapper .mb-10 {margin-bottom:10px}
.<?php echo $prefix; ?>-wrapper .mb-15 {margin-bottom:15px}
.<?php echo $prefix; ?>-wrapper .mb-20 {margin-bottom:20px}
.<?php echo $prefix; ?>-wrapper .mb-24 {margin-bottom:24px}
.<?php echo $prefix; ?>-wrapper .mb-25 {margin-bottom:25px}
.<?php echo $prefix; ?>-wrapper .mb-27 {margin-bottom:27px}

.<?php echo $prefix; ?>-wrapper .mt-0 {margin-top:0!important}
.<?php echo $prefix; ?>-wrapper .mt-3 {margin-top:3px}
.<?php echo $prefix; ?>-wrapper .mt-5 {margin-top:5px}
.<?php echo $prefix; ?>-wrapper .mt-7 {margin-top:7px}
.<?php echo $prefix; ?>-wrapper .mt-10 {margin-top:10px}
.<?php echo $prefix; ?>-wrapper .mt-13 {margin-top:13px}
.<?php echo $prefix; ?>-wrapper .mt-15 {margin-top:15px}

.<?php echo $prefix; ?>-sidebar .mt-auto,
.<?php echo $prefix; ?>-wrapper .mt-auto {
	margin-top: auto!important;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .border-bottom-light,
.<?php echo $prefix; ?>-wrapper .border-bottom-light {
	border-bottom: 1px solid #f3f3f3;
}

.<?php echo $prefix; ?>-wrapper .border-top-light {
	border-top: 1px solid #f3f3f3;
}

.<?php echo $prefix; ?>-wrapper .flex,
.<?php echo $prefix; ?>-wrapper .d-flex {
	display: flex;
	flex-wrap: wrap;
	grid-column-gap: 3%;
	grid-row-gap: 10px;
}

.<?php echo $prefix; ?>-wrapper .flex-nowrap {
	flex-wrap: nowrap;
}

.<?php echo $prefix; ?>-wrapper .flex-center {
	place-items: center;
}

.<?php echo $prefix; ?>-wrapper .flex.grid-col-2{gap:2.25%;padding-bottom:12px;}
.<?php echo $prefix; ?>-wrapper .flex.grid-row-01{grid-row-gap:.125em}
.<?php echo $prefix; ?>-wrapper .flex.grid-row-05{grid-row-gap:.5em}
.<?php echo $prefix; ?>-wrapper .flex.grid-row-075{grid-row-gap:.75em}
.<?php echo $prefix; ?>-wrapper .flex.grid-row-2{grid-row-gap:2em}
.<?php echo $prefix; ?>-wrapper .flex.gap-2 { grid-column-gap: 2%; }
.<?php echo $prefix; ?>-wrapper .flex .flex-30{min-width:31.825%;max-width:31.825%}
.<?php echo $prefix; ?>-wrapper .flex .flex-33{min-width:33.5%;max-width:33.5%}
.<?php echo $prefix; ?>-wrapper .flex .flex-25{min-width:23.15%;max-width:23.15%}
.<?php echo $prefix; ?>-wrapper .flex .flex-20{min-width:18.175%;max-width:18.175%}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .flex .flex-30 input[type=text],.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .flex .flex-33 input[type=number],.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .flex .flex-33 input[type=text]{width:92%}

.<?php echo $prefix; ?>-wrapper .w-100{width:100%}
.<?php echo $prefix; ?>-wrapper .w-98{min-width:98%;max-width:98%}
.<?php echo $prefix; ?>-wrapper .w-97{min-width:97%;max-width:97%}
.<?php echo $prefix; ?>-wrapper .w-96{min-width:96%;max-width:96%}
.<?php echo $prefix; ?>-wrapper .w-94{min-width:94.5%;max-width:94.5%}
.<?php echo $prefix; ?>-wrapper .w-92{min-width:92%;max-width:92%}
.<?php echo $prefix; ?>-wrapper .w-90{width:90%}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .flex .flex-30 input[type=number],
.<?php echo $prefix; ?>-wrapper .w-87{min-width:87%;max-width:87%}
.<?php echo $prefix; ?>-wrapper .flex .flex-50,.<?php echo $prefix; ?>-wrapper .w-50{min-width:48.85%;max-width:48.85%}
.<?php echo $prefix; ?>-wrapper .flex .flex-60,.<?php echo $prefix; ?>-wrapper .w-60{min-width:60%;max-width:60%}
.<?php echo $prefix; ?>-wrapper .flex .flex-70,.<?php echo $prefix; ?>-wrapper .w-70{min-width:70%;max-width:70%}
.<?php echo $prefix; ?>-wrapper .flex .flex-80,.<?php echo $prefix; ?>-wrapper .w-80{min-width:80%;max-width:80%}

.<?php echo $prefix; ?>-wrapper .flex .flex-full-width,.<?php echo $prefix; ?>-wrapper .flex-full-width,.<?php echo $prefix; ?>-wrapper .flex.flex-full-width{min-width:99.9%;max-width:99.9%}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-content .flex .sub-fields,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-content .sub-fields.padding-left-0,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-content .sub-fields.pl-0 { padding-left: 0 }

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-input-group .flex li,.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-input-group .flex li .<?php echo $prefix; ?>-input{min-width:49%;max-width:49%}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-input-group .flex li:first-child{min-width:100%}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-menus-settings .<?php echo $prefix; ?>-toggle-arrow,
.<?php echo $prefix; ?>-wrapper .flex .<?php echo $prefix; ?>-toggle-arrow {
    top: 4px;
    right: 10px;
    transform: scale(.65);
    padding: .75em;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .flex .flex-20 input[type=text].w-100,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .flex .flex-25 input[type=text].w-100,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .flex .flex-30 input[type=text].w-100,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .flex .flex-50 input[type=number],
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .flex .flex-50 input[type=phone],
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .flex .flex-50 input[type=text],
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .flex .flex-50 input[type=url] {
    width: 100%;
}
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form input[type=number], 
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form input[type=phone],
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form input[type=text],
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form input[type=url],
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form textarea {
    font-size: calc(7.5px + (13.75 - 7.5) * ((100vw - 767px) / (1920 - 767)));
}

.flex .flex-50 a.<?php echo $prefix; ?>-upload {
    margin-top: .3rem;
    display: inline-flex;
    font-size: .785rem;
}

.<?php echo $prefix; ?>-spacer {
	display: flex;
    min-height: 1.25rem;
    min-width: 100%;
}

.<?php echo $prefix; ?>-spacer.<?php echo $prefix; ?>-spacer-large {min-height:1.55rem}
.<?php echo $prefix; ?>-spacer.<?php echo $prefix; ?>-spacer-medium-large {min-height:1rem}
.<?php echo $prefix; ?>-spacer.<?php echo $prefix; ?>-spacer-medium {min-height:.65rem}
.<?php echo $prefix; ?>-spacer.<?php echo $prefix; ?>-spacer-smaller {min-height:.45rem}
.<?php echo $prefix; ?>-spacer.<?php echo $prefix; ?>-spacer-small {min-height:.25rem}

.field-title {
    padding-top: 10px;
    text-decoration: underline;
    text-underline-position: under;
    font-size: 90%;
}

.<?php echo $prefix; ?>-notice {
    border-left-color: #29729e!important;
}

.<?php echo $prefix; ?>-notice {
    max-width: 98.05%;
    margin-left: 4px;
    margin-right: 0;
    margin-top: 12px;
    margin-bottom: -4px;
}

.<?php echo $prefix; ?>-wrapper select,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-select {
    height: 36px;
    width: 100%;
	min-width: 140px;
    padding: 3px 26px 3px 12px;
    margin-bottom: -3.5px;
    display: block;
	border-color: #ececec;
	opacity: .78
}

.<?php echo $prefix; ?>-plugin-wrapper {
	margin-left: -20px;
    font-family: verdana;
}

.<?php echo $prefix; ?>-wrapper .navigation,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar {
	background-color: #fefefe;
}

.<?php echo $prefix; ?>-wrapper .navigation ul {
	display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    list-style: none;
    margin: 0;
    padding: 0;
    width: 100%;
}

.<?php echo $prefix; ?>-wrapper .navigation li {
	display: flex;
	z-index: 1;
	margin: 0
}

.<?php echo $prefix; ?>-wrapper .navigation li a:active,
.<?php echo $prefix; ?>-wrapper .navigation li a:focus {
    outline: none !important;
    box-shadow: none;
}
.<?php echo $prefix; ?>-wrapper .navigation li a span {
    color: rgba(247, 46, 12, 0.87);
}

.show-hide-container {
    width: 56.5em;
    max-width: 98%;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar {
	display: flex;
	flex-direction: column
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar code {
    font-size: 11px;
    background: rgba(0,0,0,.06);
    margin: 0;
    /* border-radius: 28px; */
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar code.scroll {
    display: block;
    max-width: fit-content;
	white-space: nowrap;
    overflow: scroll;
}

::-webkit-scrollbar {
	height: 0;
	width: 0
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .code {
    font-size: calc(7.45px + (11.5 - 7.45) * ((100vw - 767px) / (1920 - 767)));
    background: rgba(0,0,0,.06);
    margin: 5px 0;
    display: flex;
    padding: 4.5px 6px;
    word-break: break-word;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar .brand,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar ul {
    font-size: calc(7.5px + (12.6 - 7.5) * ((100vw - 767px) / (1920 - 767)));
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar a {
	color: #52616c;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar ul {margin-left: 12px}
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar ul li {margin-bottom: 10px}
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-sidebar ul li:last-child {margin-bottom:0}

.list-disc { list-style: disc }
.list-sq { list-style: square }

.<?php echo $prefix; ?>-wrapper #import_file{
    position: relative;
    font-size: calc(8px + (14.5 - 8) * ((100vw - 767px) / (1920 - 767)));
    width: -webkit-fill-available;
	box-shadow: none;
    cursor: pointer;
    padding: 0;
    line-height: 1;
    background: transparent;
	border: 0;
}

.<?php echo $prefix; ?>-wrapper #import_file::-webkit-file-upload-button {
  visibility: hidden;
  width: 0;
}

.<?php echo $prefix; ?>-wrapper #import_file::before {
    content: '⬆  Upload File';
    display: inline-flex;
    font-weight: 700;
    font-size: calc(7.5px + (12.5 - 7.5) * ((100vw - 767px) / (1920 - 767)));
    line-height: 0;
    position: relative;
    width: fit-content;
    background: linear-gradient(283deg, #f9f9f9, transparent);
	transition: background .525s ease;
    border: 1px dashed #ccc;
    border-radius: 4px;
    padding: 18px 15.5px;
    outline: none;
    -webkit-user-select: none;
    cursor: pointer;
}

.<?php echo $prefix; ?>-wrapper #import_file:hover::before {
    background: linear-gradient(3deg, #f5f5f5, transparent);
	outline: 0!important,
    border-style: solid;
}

.<?php echo $prefix; ?>-form input[type="text"], .<?php echo $prefix; ?>-form input[type="url"], .<?php echo $prefix; ?>-form input[type="number"] {
    width: 50%;
    line-height: 32px;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .<?php echo $prefix; ?>-input-group .<?php echo $prefix; ?>-input input.small,
.<?php echo $prefix; ?>-input .wp-picker-container .button,
.<?php echo $prefix; ?>-input .wp-picker-container .button.wp-color-result .wp-color-result-text {
	border-color: #dedede
}

.<?php echo $prefix; ?>-form input[type=text].color-picker.wp-color-picker {
	/* margin-top: 5px */
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .<?php echo $prefix; ?>-input-group .<?php echo $prefix; ?>-input input.small {
	width: 6.3em;
    height: 33px;
    line-height: 30px;
    margin-top: -1px;
    margin-bottom: -1px
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form .<?php echo $prefix; ?>-input span.unit {
	font-size: calc(8px + (13 - 8) * ((100vw - 767px) / (1920 - 767)));
	margin-left: 0.35em;
    color: #707070
}

.<?php echo $prefix; ?>-input input.style-input {
    height: 36px;
    margin-top: -1px;
	margin-bottom: -2.5px
}

.<?php echo $prefix; ?>-input input.style-input,
.<?php echo $prefix; ?>-input textarea.style-textarea {
	margin-bottom: -7px
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form textarea,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form input {
	border: 1px solid #dedede;
	border: 1px solid #d0dbe1;
	border: 1px solid #d1dee5;
	padding: 2.5px 12px;
	min-height: 38.5px
}

.<?php echo $prefix; ?>-input-group .textarea-custom {
    width: 100%;
    padding: 10px 10px 10px 10px;
	white-space: nowrap;
}

.<?php echo $prefix; ?>-input textarea.style-textarea,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form input,
.<?php echo $prefix; ?>-input-group .textarea-custom {
	background-color: #fefefe;
	background-color: #d6dee3;
	/*
	border-color: #fff;
	border-color: #fafafa;
	border-color: #f8f8f8;
    background: #fbfbfb;
    box-shadow: inset 0 0 24px #f0f0f0;
    box-shadow: inset 0 0 32px #f6f6f6;
	background: #fefefe;
	border-color: #a0a0a0;
	*/
}

.<?php echo $prefix; ?>-input-group .textarea-custom::placeholder {
	white-space:pre-line!important; 
  	position:relative;
}

.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form input::placeholder,
.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-form input[type=text]::placeholder,
.<?php echo $prefix; ?>-input-group .textarea-custom::placeholder {
	line-height: 1.45;
	color: #808080
}

.<?php echo $prefix; ?>-sidebar u {
    text-underline-position: under;
}

.<?php echo $prefix; ?>-sidebar .br {
   display: flex;
   min-height: .25rem;
   min-width: 100%
}

label.required {
	position: relative
}

label.required:after {
	content: "*";
	color: #d63638;
    position: absolute;
    top: 8.75px;
    right: -10px;
}


.<?php echo $prefix; ?>-wrapper .<?php echo $prefix; ?>-body-header h2,
.<?php echo $prefix; ?>-wrapper .relative {position:relative}

.<?php echo $prefix; ?>-wrapper .bold {font-weight:600}
.<?php echo $prefix; ?>-wrapper .normal {font-weight: normal!important;}

.<?php echo $prefix; ?>-wrapper .grid { display: grid }

@media (min-width: 769px) {
	
	.<?php echo $prefix; ?>-wrapper .grid {
	
	}
	
	.<?php echo $prefix; ?>-wrapper .grid.col-2 {
		grid-template-columns: repeat(2, 1fr);
		grid-column-gap: 4%;
    	grid-row-gap: 2%;
	}

	.<?php echo $prefix; ?>-wrapper .grid.col-2.smaller {
    	max-width: 66%;
		grid-template-columns: repeat(2, 1fr);
		grid-column-gap: 3.3%;
		grid-row-gap: 0;
	}

	.<?php echo $prefix; ?>-wrapper .grid .span-2 {
		grid-column: span 2;
	}
	
	.<?php echo $prefix; ?>-wrapper .grid .span-3 {
		grid-column: span 3;
	}

	.<?php echo $prefix; ?>-wrapper .grid.col-3 {
		grid-template-columns: repeat(3, 1fr);
		grid-column-gap: 2.25%;
    	grid-row-gap: 5px;
	}
	
}

@media (min-width: 1025px) {
	
	.sitemap-control.<?php echo $prefix; ?>-input-group {
		position: absolute;
		top: 1px;
		right: calc(0.5px + (75 - 0.5) * ((100vw - 768px) / (1920 - 768)));
		/*
		top: 52px;
		left: calc(100.5px + (670 - 100.5) * ((100vw - 768px) / (1920 - 768)));
		*/
	}
	
}

';
?>