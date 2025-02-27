<?php
/*
Plugin Name: Widget Icon
Description: Enhance your website with 640+ icons designed for Twitter Bootstrap. Just select an icon and display it in any widget on your WordPress site.
Version: 1.1.3
Author: dFactory
Author URI: http://www.dfactory.eu/
Plugin URI: http://www.dfactory.eu/plugins/widget-icon/
License: MIT License
License URI: http://opensource.org/licenses/MIT

Widget Icon
Copyright (C) 2013, Digital Factory - info@digitalfactory.pl

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/


class Widget_Icon
{
	private $icons_elusive = array(
		'icon-move' => '&#xe074;',
		'icon-music' => '&#xe073;',
		'icon-network' => '&#xe072;',
		'icon-off' => '&#xe071;',
		'icon-ok' => '&#xe070;',
		'icon-ok-circle' => '&#xe06f;',
		'icon-ok-sign' => '&#xe06e;',
		'icon-paper-clip' => '&#xe06d;',
		'icon-paper-clip-alt' => '&#xe06c;',
		'icon-path' => '&#xe06b;',
		'icon-plus-sign' => '&#xe059;',
		'icon-print' => '&#xe058;',
		'icon-qrcode' => '&#xe057;',
		'icon-question' => '&#xe056;',
		'icon-question-sign' => '&#xe055;',
		'icon-quotes' => '&#xe054;',
		'icon-quotes-alt' => '&#xe053;',
		'icon-random' => '&#xe052;',
		'icon-record' => '&#xe051;',
		'icon-reddit' => '&#xe050;',
		'icon-refresh' => '&#xe04f;',
		'icon-screenshot' => '&#xe03f;',
		'icon-search' => '&#xe03e;',
		'icon-search-alt' => '&#xe03d;',
		'icon-share' => '&#xe03c;',
		'icon-share-alt' => '&#xe03b;',
		'icon-shopping-cart' => '&#xe03a;',
		'icon-shopping-cart-sign' => '&#xe039;',
		'icon-signal' => '&#xe038;',
		'icon-skype' => '&#xe037;',
		'icon-slideshare' => '&#xe036;',
		'icon-smiley' => '&#xe035;',
		'icon-th-large' => '&#xe023;',
		'icon-th-list' => '&#xe022;',
		'icon-thumbs-down' => '&#xe021;',
		'icon-thumbs-up' => '&#xe020;',
		'icon-time' => '&#xe01f;',
		'icon-time-alt' => '&#xe01e;',
		'icon-tint' => '&#xe01d;',
		'icon-torso' => '&#xe01c;',
		'icon-trash' => '&#xe01b;',
		'icon-trash-alt' => '&#xe01a;',
		'icon-tumblr' => '&#xe019;',
		'icon-w3c' => '&#xe00a;',
		'icon-warning-sign' => '&#xe009;',
		'icon-website' => '&#xe008;',
		'icon-website-alt' => '&#xe007;',
		'icon-wheelchair' => '&#xe006;',
		'icon-wordpress' => '&#xe005;',
		'icon-wrench' => '&#xe004;',
		'icon-wrench-alt' => '&#xe003;',
		'icon-youtube' => '&#xe002;',
		'icon-zoom-in' => '&#xe001;',
		'icon-zoom-out' => '&#xe000;',
		'icon-pause-alt' => '&#xe069;',
		'icon-pencil' => '&#xe068;',
		'icon-pencil-alt' => '&#xe067;',
		'icon-person' => '&#xe066;',
		'icon-phone' => '&#xe065;',
		'icon-phone-alt' => '&#xe064;',
		'icon-photo' => '&#xe063;',
		'icon-photo-alt' => '&#xe062;',
		'icon-picasa' => '&#xe061;',
		'icon-picture' => '&#xe060;',
		'icon-pinterest' => '&#xe05f;',
		'icon-plane' => '&#xe05e;',
		'icon-play-alt' => '&#xe05c;',
		'icon-play-circle' => '&#xe05b;',
		'icon-plus' => '&#xe05a;',
		'icon-remove' => '&#xe04e;',
		'icon-remove-circle' => '&#xe04d;',
		'icon-remove-sign' => '&#xe04c;',
		'icon-repeat' => '&#xe04b;',
		'icon-repeat-alt' => '&#xe04a;',
		'icon-resize-full' => '&#xe049;',
		'icon-resize-horizontal' => '&#xe048;',
		'icon-resize-small' => '&#xe047;',
		'icon-resize-vertical' => '&#xe046;',
		'icon-retweet' => '&#xe045;',
		'icon-reverse-alt' => '&#xe044;',
		'icon-road' => '&#xe043;',
		'icon-rss' => '&#xe042;',
		'icon-screen' => '&#xe041;',
		'icon-screen-alt' => '&#xe040;',
		'icon-smiley-alt' => '&#xe034;',
		'icon-speaker' => '&#xe033;',
		'icon-stackoverflow' => '&#xe032;',
		'icon-star' => '&#xe031;',
		'icon-star-alt' => '&#xe030;',
		'icon-star-empty' => '&#xe02f;',
		'icon-stop-alt' => '&#xe02b;',
		'icon-stumbleupon' => '&#xe02a;',
		'icon-tag' => '&#xe029;',
		'icon-tags' => '&#xe028;',
		'icon-tasks' => '&#xe027;',
		'icon-text-height' => '&#xe026;',
		'icon-text-width' => '&#xe025;',
		'icon-th' => '&#xe024;',
		'icon-twitter' => '&#xe018;',
		'icon-universal-access' => '&#xe017;',
		'icon-unlock' => '&#xe016;',
		'icon-unlock-alt' => '&#xe015;',
		'icon-upload' => '&#xe014;',
		'icon-user' => '&#xe013;',
		'icon-video' => '&#xe012;',
		'icon-video-alt' => '&#xe011;',
		'icon-video-chat' => '&#xe010;',
		'icon-view-mode' => '&#xe00f;',
		'icon-vimeo' => '&#xe00e;',
		'icon-vkontakte' => '&#xe10e;',
		'icon-volume-down' => '&#xe00d;',
		'icon-volume-off' => '&#xe00c;',
		'icon-volume-up' => '&#xe00b;',
		'icon-backward' => '&#xe0ab;',
		'icon-fast-backward' => '&#xe09a;',
		'icon-fast-forward' => '&#xe099;',
		'icon-forward' => '&#xe093;',
		'icon-play' => '&#xe05d;',
		'icon-step-backward' => '&#xe02e;',
		'icon-step-forward' => '&#xe02d;',
		'icon-briefcase' => '&#xe10d;',
		'icon-bullhorn' => '&#xe10c;',
		'icon-calendar' => '&#xe10b;',
		'icon-calendar-sign' => '&#xe10a;',
		'icon-address-book' => '&#xe0dd;',
		'icon-address-book-alt' => '&#xe0dc;',
		'icon-adjust' => '&#xe0db;',
		'icon-adult' => '&#xe0da;',
		'icon-align-center' => '&#xe0d9;',
		'icon-align-justify' => '&#xe0d8;',
		'icon-align-left' => '&#xe0d7;',
		'icon-align-right' => '&#xe0d6;',
		'icon-arrow-down' => '&#xe0d5;',
		'icon-arrow-left' => '&#xe0d4;',
		'icon-arrow-right' => '&#xe0af;',
		'icon-arrow-up' => '&#xe0ae;',
		'icon-asl' => '&#xe0ad;',
		'icon-asterisk' => '&#xe0ac;',
		'icon-ban-circle' => '&#xe0aa;',
		'icon-barcode' => '&#xe0d3;',
		'icon-behance' => '&#xe0d2;',
		'icon-bell' => '&#xe0d1;',
		'icon-blind' => '&#xe0d0;',
		'icon-blogger' => '&#xe0cf;',
		'icon-bold' => '&#xe0ce;',
		'icon-book' => '&#xe0f5;',
		'icon-bookmark' => '&#xe0f4;',
		'icon-bookmark-empty' => '&#xe0f3;',
		'icon-braille' => '&#xe0f2;',
		'icon-camera' => '&#xe0a9;',
		'icon-cc' => '&#xe0a8;',
		'icon-certificate' => '&#xe0a7;',
		'icon-check' => '&#xe0a6;',
		'icon-check-empty' => '&#xe0a5;',
		'icon-chevron-down' => '&#xe0a4;',
		'icon-chevron-left' => '&#xe0cd;',
		'icon-chevron-right' => '&#xe0cc;',
		'icon-chevron-up' => '&#xe0cb;',
		'icon-child' => '&#xe0ca;',
		'icon-circle-arrow-down' => '&#xe0c9;',
		'icon-circle-arrow-left' => '&#xe0c8;',
		'icon-circle-arrow-right' => '&#xe0f1;',
		'icon-circle-arrow-up' => '&#xe0f0;',
		'icon-cloud' => '&#xe0ef;',
		'icon-cloud-alt' => '&#xe0ee;',
		'icon-cog' => '&#xe109;',
		'icon-cog-alt' => '&#xe108;',
		'icon-cogs' => '&#xe107;',
		'icon-comment' => '&#xe106;',
		'icon-comment-alt' => '&#xe0a3;',
		'icon-compass' => '&#xe0a2;',
		'icon-compass-alt' => '&#xe0a1;',
		'icon-credit-card' => '&#xe0a0;',
		'icon-css' => '&#xe09f;',
		'icon-dashboard' => '&#xe09e;',
		'icon-delicious' => '&#xe0c7;',
		'icon-deviantart' => '&#xe0c6;',
		'icon-digg' => '&#xe0c5;',
		'icon-download' => '&#xe0c4;',
		'icon-download-alt' => '&#xe0c3;',
		'icon-dribble' => '&#xe0c2;',
		'icon-edit' => '&#xe0ed;',
		'icon-eject' => '&#xe0ec;',
		'icon-envelope' => '&#xe0eb;',
		'icon-envelope-alt' => '&#xe0ea;',
		'icon-error' => '&#xe105;',
		'icon-error-alt' => '&#xe104;',
		'icon-exclamation-sign' => '&#xe103;',
		'icon-eye-close' => '&#xe102;',
		'icon-eye-open' => '&#xe09d;',
		'icon-facebook' => '&#xe09c;',
		'icon-facetime-video' => '&#xe09b;',
		'icon-female' => '&#xe098;',
		'icon-file' => '&#xe0c1;',
		'icon-file-alt' => '&#xe0c0;',
		'icon-file-edit' => '&#xe0bf;',
		'icon-file-edit-alt' => '&#xe0be;',
		'icon-file-new' => '&#xe0bd;',
		'icon-file-new-alt' => '&#xe0bc;',
		'icon-film' => '&#xe0e9;',
		'icon-filter' => '&#xe0e8;',
		'icon-fire' => '&#xe0e7;',
		'icon-flag' => '&#xe0e6;',
		'icon-flag-alt' => '&#xe101;',
		'icon-flickr' => '&#xe100;',
		'icon-folder' => '&#xe0ff;',
		'icon-folder-close' => '&#xe0fe;',
		'icon-folder-open' => '&#xe097;',
		'icon-folder-sign' => '&#xe096;',
		'icon-font' => '&#xe095;',
		'icon-fontsize' => '&#xe094;',
		'icon-forward-alt' => '&#xe092;',
		'icon-foursquare' => '&#xe0bb;',
		'icon-friendfeed' => '&#xe0ba;',
		'icon-friendfeed-rect' => '&#xe0b9;',
		'icon-fullscreen' => '&#xe0b8;',
		'icon-gift' => '&#xe0b7;',
		'icon-github' => '&#xe0b6;',
		'icon-github-text' => '&#xe0e5;',
		'icon-glass' => '&#xe0e4;',
		'icon-glasses' => '&#xe0e3;',
		'icon-globe' => '&#xe0e2;',
		'icon-globe-alt' => '&#xe0fd;',
		'icon-googleplus' => '&#xe0fc;',
		'icon-graph' => '&#xe0fb;',
		'icon-graph-alt' => '&#xe0fa;',
		'icon-group' => '&#xe091;',
		'icon-group-alt' => '&#xe090;',
		'icon-guidedog' => '&#xe08f;',
		'icon-hand-down' => '&#xe08e;',
		'icon-hand-left' => '&#xe08d;',
		'icon-hand-right' => '&#xe08c;',
		'icon-hand-up' => '&#xe0b5;',
		'icon-hdd' => '&#xe0b4;',
		'icon-headphones' => '&#xe0b3;',
		'icon-hearing-impaired' => '&#xe0b2;',
		'icon-heart' => '&#xe0b1;',
		'icon-heart-alt' => '&#xe0b0;',
		'icon-heart-empty' => '&#xe0e1;',
		'icon-home' => '&#xe0e0;',
		'icon-home-alt' => '&#xe0df;',
		'icon-idea' => '&#xe0de;',
		'icon-idea-alt' => '&#xe0f9;',
		'icon-inbox' => '&#xe0f8;',
		'icon-inbox-alt' => '&#xe0f7;',
		'icon-inbox-box' => '&#xe0f6;',
		'icon-indent-left' => '&#xe08b;',
		'icon-indent-right' => '&#xe08a;',
		'icon-info-sign' => '&#xe089;',
		'icon-instagram' => '&#xe088;',
		'icon-iphone-home' => '&#xe087;',
		'icon-italic' => '&#xe086;',
		'icon-key' => '&#xe085;',
		'icon-laptop' => '&#xe084;',
		'icon-laptop-alt' => '&#xe083;',
		'icon-leaf' => '&#xe082;',
		'icon-linkedin' => '&#xe081;',
		'icon-list' => '&#xe080;',
		'icon-list-alt' => '&#xe07f;',
		'icon-lock' => '&#xe07e;',
		'icon-lock-alt' => '&#xe07d;',
		'icon-magnet' => '&#xe07c;',
		'icon-male' => '&#xe07b;',
		'icon-map-marker' => '&#xe07a;',
		'icon-map-marker-alt' => '&#xe079;',
		'icon-mic' => '&#xe078;',
		'icon-mic-alt' => '&#xe077;',
		'icon-minus' => '&#xe076;',
		'icon-minus-sign' => '&#xe075;',
		'icon-pause' => '&#xe06a;',
		'icon-fork' => '&#xe10f;',
		'icon-broom' => '&#xe110;',
		'icon-return-key' => '&#xe111;',
		'icon-lastfm' => '&#xe112;',
		'icon-livejournal' => '&#xe113;',
		'icon-myspace' => '&#xe114;',
		'icon-soundcloud' => '&#xe115;',
		'icon-viadeo' => '&#xe116;',
		'icon-spotify' => '&#xe117;',
		'icon-caret-left' => '&#xe119;',
		'icon-caret-up' => '&#xe02c;',
		'icon-caret-right' => '&#xe118;',
		'icon-caret-down' => '&#xe11a;',
		'icon-stop' => '&#xe11b;'
	);
	private $icons_font_awesome = array(
		'icon-glass' => '&#xf000;',
		'icon-music' => '&#xf001;',
		'icon-search' => '&#xf002;',
		'icon-envelope-alt' => '&#xf003;',
		'icon-heart' => '&#xf004;',
		'icon-star' => '&#xf005;',
		'icon-star-empty' => '&#xf006;',
		'icon-user' => '&#xf007;',
		'icon-film' => '&#xf008;',
		'icon-th-large' => '&#xf009;',
		'icon-th' => '&#xf00a;',
		'icon-th-list' => '&#xf00b;',
		'icon-ok' => '&#xf00c;',
		'icon-remove' => '&#xf00d;',
		'icon-zoom-in' => '&#xf00e;',
		'icon-zoom-out' => '&#xf010;',
		'icon-power-off' => '&#xf011;',
		'icon-off' => '&#xf011;',
		'icon-signal' => '&#xf012;',
		'icon-gear' => '&#xf013;',
		'icon-cog' => '&#xf013;',
		'icon-trash' => '&#xf014;',
		'icon-home' => '&#xf015;',
		'icon-file-alt' => '&#xf016;',
		'icon-time' => '&#xf017;',
		'icon-road' => '&#xf018;',
		'icon-download-alt' => '&#xf019;',
		'icon-download' => '&#xf01a;',
		'icon-upload' => '&#xf01b;',
		'icon-inbox' => '&#xf01c;',
		'icon-play-circle' => '&#xf01d;',
		'icon-rotate-right' => '&#xf01e;',
		'icon-repeat' => '&#xf01e;',
		'icon-refresh' => '&#xf021;',
		'icon-list-alt' => '&#xf022;',
		'icon-lock' => '&#xf023;',
		'icon-flag' => '&#xf024;',
		'icon-headphones' => '&#xf025;',
		'icon-volume-off' => '&#xf026;',
		'icon-volume-down' => '&#xf027;',
		'icon-volume-up' => '&#xf028;',
		'icon-qrcode' => '&#xf029;',
		'icon-barcode' => '&#xf02a;',
		'icon-tag' => '&#xf02b;',
		'icon-tags' => '&#xf02c;',
		'icon-book' => '&#xf02d;',
		'icon-bookmark' => '&#xf02e;',
		'icon-print' => '&#xf02f;',
		'icon-camera' => '&#xf030;',
		'icon-font' => '&#xf031;',
		'icon-bold' => '&#xf032;',
		'icon-italic' => '&#xf033;',
		'icon-text-height' => '&#xf034;',
		'icon-text-width' => '&#xf035;',
		'icon-align-left' => '&#xf036;',
		'icon-align-center' => '&#xf037;',
		'icon-align-right' => '&#xf038;',
		'icon-align-justify' => '&#xf039;',
		'icon-list' => '&#xf03a;',
		'icon-indent-left' => '&#xf03b;',
		'icon-indent-right' => '&#xf03c;',
		'icon-facetime-video' => '&#xf03d;',
		'icon-picture' => '&#xf03e;',
		'icon-pencil' => '&#xf040;',
		'icon-map-marker' => '&#xf041;',
		'icon-adjust' => '&#xf042;',
		'icon-tint' => '&#xf043;',
		'icon-edit' => '&#xf044;',
		'icon-share' => '&#xf045;',
		'icon-check' => '&#xf046;',
		'icon-move' => '&#xf047;',
		'icon-step-backward' => '&#xf048;',
		'icon-fast-backward' => '&#xf049;',
		'icon-backward' => '&#xf04a;',
		'icon-play' => '&#xf04b;',
		'icon-pause' => '&#xf04c;',
		'icon-stop' => '&#xf04d;',
		'icon-forward' => '&#xf04e;',
		'icon-fast-forward' => '&#xf050;',
		'icon-step-forward' => '&#xf051;',
		'icon-eject' => '&#xf052;',
		'icon-chevron-left' => '&#xf053;',
		'icon-chevron-right' => '&#xf054;',
		'icon-plus-sign' => '&#xf055;',
		'icon-minus-sign' => '&#xf056;',
		'icon-remove-sign' => '&#xf057;',
		'icon-ok-sign' => '&#xf058;',
		'icon-question-sign' => '&#xf059;',
		'icon-info-sign' => '&#xf05a;',
		'icon-screenshot' => '&#xf05b;',
		'icon-remove-circle' => '&#xf05c;',
		'icon-ok-circle' => '&#xf05d;',
		'icon-ban-circle' => '&#xf05e;',
		'icon-arrow-left' => '&#xf060;',
		'icon-arrow-right' => '&#xf061;',
		'icon-arrow-up' => '&#xf062;',
		'icon-arrow-down' => '&#xf063;',
		'icon-mail-forward' => '&#xf064;',
		'icon-share-alt' => '&#xf064;',
		'icon-resize-full' => '&#xf065;',
		'icon-resize-small' => '&#xf066;',
		'icon-plus' => '&#xf067;',
		'icon-minus' => '&#xf068;',
		'icon-asterisk' => '&#xf069;',
		'icon-exclamation-sign' => '&#xf06a;',
		'icon-gift' => '&#xf06b;',
		'icon-leaf' => '&#xf06c;',
		'icon-fire' => '&#xf06d;',
		'icon-eye-open' => '&#xf06e;',
		'icon-eye-close' => '&#xf070;',
		'icon-warning-sign' => '&#xf071;',
		'icon-plane' => '&#xf072;',
		'icon-calendar' => '&#xf073;',
		'icon-random' => '&#xf074;',
		'icon-comment' => '&#xf075;',
		'icon-magnet' => '&#xf076;',
		'icon-chevron-up' => '&#xf077;',
		'icon-chevron-down' => '&#xf078;',
		'icon-retweet' => '&#xf079;',
		'icon-shopping-cart' => '&#xf07a;',
		'icon-folder-close' => '&#xf07b;',
		'icon-folder-open' => '&#xf07c;',
		'icon-resize-vertical' => '&#xf07d;',
		'icon-resize-horizontal' => '&#xf07e;',
		'icon-bar-chart' => '&#xf080;',
		'icon-twitter-sign' => '&#xf081;',
		'icon-facebook-sign' => '&#xf082;',
		'icon-camera-retro' => '&#xf083;',
		'icon-key' => '&#xf084;',
		'icon-gears' => '&#xf085;',
		'icon-cogs' => '&#xf085;',
		'icon-comments' => '&#xf086;',
		'icon-thumbs-up-alt' => '&#xf087;',
		'icon-thumbs-down-alt' => '&#xf088;',
		'icon-star-half' => '&#xf089;',
		'icon-heart-empty' => '&#xf08a;',
		'icon-signout' => '&#xf08b;',
		'icon-linkedin-sign' => '&#xf08c;',
		'icon-pushpin' => '&#xf08d;',
		'icon-external-link' => '&#xf08e;',
		'icon-signin' => '&#xf090;',
		'icon-trophy' => '&#xf091;',
		'icon-github-sign' => '&#xf092;',
		'icon-upload-alt' => '&#xf093;',
		'icon-lemon' => '&#xf094;',
		'icon-phone' => '&#xf095;',
		'icon-unchecked' => '&#xf096;',
		'icon-check-empty' => '&#xf096;',
		'icon-bookmark-empty' => '&#xf097;',
		'icon-phone-sign' => '&#xf098;',
		'icon-twitter' => '&#xf099;',
		'icon-facebook' => '&#xf09a;',
		'icon-github' => '&#xf09b;',
		'icon-unlock' => '&#xf09c;',
		'icon-credit-card' => '&#xf09d;',
		'icon-rss' => '&#xf09e;',
		'icon-hdd' => '&#xf0a0;',
		'icon-bullhorn' => '&#xf0a1;',
		'icon-bell' => '&#xf0a2;',
		'icon-certificate' => '&#xf0a3;',
		'icon-hand-right' => '&#xf0a4;',
		'icon-hand-left' => '&#xf0a5;',
		'icon-hand-up' => '&#xf0a6;',
		'icon-hand-down' => '&#xf0a7;',
		'icon-circle-arrow-left' => '&#xf0a8;',
		'icon-circle-arrow-right' => '&#xf0a9;',
		'icon-circle-arrow-up' => '&#xf0aa;',
		'icon-circle-arrow-down' => '&#xf0ab;',
		'icon-globe' => '&#xf0ac;',
		'icon-wrench' => '&#xf0ad;',
		'icon-tasks' => '&#xf0ae;',
		'icon-filter' => '&#xf0b0;',
		'icon-briefcase' => '&#xf0b1;',
		'icon-fullscreen' => '&#xf0b2;',
		'icon-group' => '&#xf0c0;',
		'icon-link' => '&#xf0c1;',
		'icon-cloud' => '&#xf0c2;',
		'icon-beaker' => '&#xf0c3;',
		'icon-cut' => '&#xf0c4;',
		'icon-copy' => '&#xf0c5;',
		'icon-paperclip' => '&#xf0c6;',
		'icon-paper-clip' => '&#xf0c6;',
		'icon-save' => '&#xf0c7;',
		'icon-sign-blank' => '&#xf0c8;',
		'icon-reorder' => '&#xf0c9;',
		'icon-list-ul' => '&#xf0ca;',
		'icon-list-ol' => '&#xf0cb;',
		'icon-strikethrough' => '&#xf0cc;',
		'icon-underline' => '&#xf0cd;',
		'icon-table' => '&#xf0ce;',
		'icon-magic' => '&#xf0d0;',
		'icon-truck' => '&#xf0d1;',
		'icon-pinterest' => '&#xf0d2;',
		'icon-pinterest-sign' => '&#xf0d3;',
		'icon-google-plus-sign' => '&#xf0d4;',
		'icon-google-plus' => '&#xf0d5;',
		'icon-money' => '&#xf0d6;',
		'icon-caret-down' => '&#xf0d7;',
		'icon-caret-up' => '&#xf0d8;',
		'icon-caret-left' => '&#xf0d9;',
		'icon-caret-right' => '&#xf0da;',
		'icon-columns' => '&#xf0db;',
		'icon-sort' => '&#xf0dc;',
		'icon-sort-down' => '&#xf0dd;',
		'icon-sort-up' => '&#xf0de;',
		'icon-envelope' => '&#xf0e0;',
		'icon-linkedin' => '&#xf0e1;',
		'icon-rotate-left' => '&#xf0e2;',
		'icon-undo' => '&#xf0e2;',
		'icon-legal' => '&#xf0e3;',
		'icon-dashboard' => '&#xf0e4;',
		'icon-comment-alt' => '&#xf0e5;',
		'icon-comments-alt' => '&#xf0e6;',
		'icon-bolt' => '&#xf0e7;',
		'icon-sitemap' => '&#xf0e8;',
		'icon-umbrella' => '&#xf0e9;',
		'icon-paste' => '&#xf0ea;',
		'icon-lightbulb' => '&#xf0eb;',
		'icon-exchange' => '&#xf0ec;',
		'icon-cloud-download' => '&#xf0ed;',
		'icon-cloud-upload' => '&#xf0ee;',
		'icon-user-md' => '&#xf0f0;',
		'icon-stethoscope' => '&#xf0f1;',
		'icon-suitcase' => '&#xf0f2;',
		'icon-bell-alt' => '&#xf0f3;',
		'icon-coffee' => '&#xf0f4;',
		'icon-food' => '&#xf0f5;',
		'icon-file-text-alt' => '&#xf0f6;',
		'icon-building' => '&#xf0f7;',
		'icon-hospital' => '&#xf0f8;',
		'icon-ambulance' => '&#xf0f9;',
		'icon-medkit' => '&#xf0fa;',
		'icon-fighter-jet' => '&#xf0fb;',
		'icon-beer' => '&#xf0fc;',
		'icon-h-sign' => '&#xf0fd;',
		'icon-plus-sign-alt' => '&#xf0fe;',
		'icon-double-angle-left' => '&#xf100;',
		'icon-double-angle-right' => '&#xf101;',
		'icon-double-angle-up' => '&#xf102;',
		'icon-double-angle-down' => '&#xf103;',
		'icon-angle-left' => '&#xf104;',
		'icon-angle-right' => '&#xf105;',
		'icon-angle-up' => '&#xf106;',
		'icon-angle-down' => '&#xf107;',
		'icon-desktop' => '&#xf108;',
		'icon-laptop' => '&#xf109;',
		'icon-tablet' => '&#xf10a;',
		'icon-mobile-phone' => '&#xf10b;',
		'icon-circle-blank' => '&#xf10c;',
		'icon-quote-left' => '&#xf10d;',
		'icon-quote-right' => '&#xf10e;',
		'icon-spinner' => '&#xf110;',
		'icon-circle' => '&#xf111;',
		'icon-mail-reply' => '&#xf112;',
		'icon-reply' => '&#xf112;',
		'icon-github-alt' => '&#xf113;',
		'icon-folder-close-alt' => '&#xf114;',
		'icon-folder-open-alt' => '&#xf115;',
		'icon-expand-alt' => '&#xf116;',
		'icon-collapse-alt' => '&#xf117;',
		'icon-smile' => '&#xf118;',
		'icon-frown' => '&#xf119;',
		'icon-meh' => '&#xf11a;',
		'icon-gamepad' => '&#xf11b;',
		'icon-keyboard' => '&#xf11c;',
		'icon-flag-alt' => '&#xf11d;',
		'icon-flag-checkered' => '&#xf11e;',
		'icon-terminal' => '&#xf120;',
		'icon-code' => '&#xf121;',
		'icon-reply-all' => '&#xf122;',
		'icon-mail-reply-all' => '&#xf122;',
		'icon-star-half-full' => '&#xf123;',
		'icon-star-half-empty' => '&#xf123;',
		'icon-location-arrow' => '&#xf124;',
		'icon-crop' => '&#xf125;',
		'icon-code-fork' => '&#xf126;',
		'icon-unlink' => '&#xf127;',
		'icon-question' => '&#xf128;',
		'icon-info' => '&#xf129;',
		'icon-exclamation' => '&#xf12a;',
		'icon-superscript' => '&#xf12b;',
		'icon-subscript' => '&#xf12c;',
		'icon-eraser' => '&#xf12d;',
		'icon-puzzle-piece' => '&#xf12e;',
		'icon-microphone' => '&#xf130;',
		'icon-microphone-off' => '&#xf131;',
		'icon-shield' => '&#xf132;',
		'icon-calendar-empty' => '&#xf133;',
		'icon-fire-extinguisher' => '&#xf134;',
		'icon-rocket' => '&#xf135;',
		'icon-maxcdn' => '&#xf136;',
		'icon-chevron-sign-left' => '&#xf137;',
		'icon-chevron-sign-right' => '&#xf138;',
		'icon-chevron-sign-up' => '&#xf139;',
		'icon-chevron-sign-down' => '&#xf13a;',
		'icon-html5' => '&#xf13b;',
		'icon-css3' => '&#xf13c;',
		'icon-anchor' => '&#xf13d;',
		'icon-unlock-alt' => '&#xf13e;',
		'icon-bullseye' => '&#xf140;',
		'icon-ellipsis-horizontal' => '&#xf141;',
		'icon-ellipsis-vertical' => '&#xf142;',
		'icon-rss-sign' => '&#xf143;',
		'icon-play-sign' => '&#xf144;',
		'icon-ticket' => '&#xf145;',
		'icon-minus-sign-alt' => '&#xf146;',
		'icon-check-minus' => '&#xf147;',
		'icon-level-up' => '&#xf148;',
		'icon-level-down' => '&#xf149;',
		'icon-check-sign' => '&#xf14a;',
		'icon-edit-sign' => '&#xf14b;',
		'icon-external-link-sign' => '&#xf14c;',
		'icon-share-sign' => '&#xf14d;',
		'icon-compass' => '&#xf14e;',
		'icon-collapse' => '&#xf150;',
		'icon-collapse-top' => '&#xf151;',
		'icon-expand' => '&#xf152;',
		'icon-euro' => '&#xf153;',
		'icon-eur' => '&#xf153;',
		'icon-gbp' => '&#xf154;',
		'icon-dollar' => '&#xf155;',
		'icon-usd' => '&#xf155;',
		'icon-rupee' => '&#xf156;',
		'icon-inr' => '&#xf156;',
		'icon-yen' => '&#xf157;',
		'icon-jpy' => '&#xf157;',
		'icon-renminbi' => '&#xf158;',
		'icon-cny' => '&#xf158;',
		'icon-won' => '&#xf159;',
		'icon-krw' => '&#xf159;',
		'icon-bitcoin' => '&#xf15a;',
		'icon-btc' => '&#xf15a;',
		'icon-file' => '&#xf15b;',
		'icon-file-text' => '&#xf15c;',
		'icon-sort-by-alphabet' => '&#xf15d;',
		'icon-sort-by-alphabet-alt' => '&#xf15e;',
		'icon-sort-by-attributes' => '&#xf160;',
		'icon-sort-by-attributes-alt' => '&#xf161;',
		'icon-sort-by-order' => '&#xf162;',
		'icon-sort-by-order-alt' => '&#xf163;',
		'icon-thumbs-up' => '&#xf164;',
		'icon-thumbs-down' => '&#xf165;',
		'icon-youtube-sign' => '&#xf166;',
		'icon-youtube' => '&#xf167;',
		'icon-xing' => '&#xf168;',
		'icon-xing-sign' => '&#xf169;',
		'icon-youtube-play' => '&#xf16a;',
		'icon-dropbox' => '&#xf16b;',
		'icon-stackexchange' => '&#xf16c;',
		'icon-instagram' => '&#xf16d;',
		'icon-flickr' => '&#xf16e;',
		'icon-adn' => '&#xf170;',
		'icon-bitbucket' => '&#xf171;',
		'icon-bitbucket-sign' => '&#xf172;',
		'icon-tumblr' => '&#xf173;',
		'icon-tumblr-sign' => '&#xf174;',
		'icon-long-arrow-down' => '&#xf175;',
		'icon-long-arrow-up' => '&#xf176;',
		'icon-long-arrow-left' => '&#xf177;',
		'icon-long-arrow-right' => '&#xf178;',
		'icon-apple' => '&#xf179;',
		'icon-windows' => '&#xf17a;',
		'icon-android' => '&#xf17b;',
		'icon-linux' => '&#xf17c;',
		'icon-dribbble' => '&#xf17d;',
		'icon-skype' => '&#xf17e;',
		'icon-foursquare' => '&#xf180;',
		'icon-trello' => '&#xf181;',
		'icon-female' => '&#xf182;',
		'icon-male' => '&#xf183;',
		'icon-gittip' => '&#xf184;',
		'icon-sun' => '&#xf185;',
		'icon-moon' => '&#xf186;',
		'icon-archive' => '&#xf187;',
		'icon-bug' => '&#xf188;',
		'icon-vk' => '&#xf189;',
		'icon-weibo' => '&#xf18a;',
		'icon-renren' => '&#xf18b;'
	);
	private $defaults = array(
		'library' => 'elusive',
		'icon' => 'none',
		'icon_size' => 'standard',
		'place' => 'left',
		'padding_type' => 'pixel',
		'padding' => 10,
		'color_type' => 'inherit',
		'color' => '#000',
		'vertical_align' => 'inherit'
	);
	private $aligns = array('inherit', 'baseline', 'bottom', 'middle', 'sub', 'super', 'text-bottom', 'text-top', 'top');
	private $icon_sizes = array('standard', 'icon-large', 'icon-2x', 'icon-3x', 'icon-4x', 'icon-5x');
	private $paddings = array('pixel', 'percent');
	private $color_types = array('inherit', 'custom');
	private $places = array('left', 'right', 'before-widget', 'after-widget', 'before-title', 'after-title');
	private $libraries = array('elusive', 'font-awesome');


	public function __construct()
	{
		//actions
		add_action('plugins_loaded', array(&$this, 'load_textdomain'));
		add_action('in_widget_form', array(&$this, 'display_admin_widget_box_options'), 10, 3);
		add_action('admin_enqueue_scripts', array(&$this, 'admin_widgets_scripts_styles'));
		add_action('wp_enqueue_scripts', array(&$this, 'front_widgets_scripts_styles'));

		//filters
		add_filter('widget_display_callback', array(&$this, 'display_frontend_widgets'), 10, 3);
		add_filter('widget_update_callback', array(&$this, 'update_admin_widgets_options'), 10, 3);
		add_filter('plugin_row_meta', array(&$this, 'plugin_extend_links'), 10, 2);
		add_filter('plugin_action_links', array(&$this, 'plugin_settings_link'), 10, 2);
	}


	/**
	 * Loads text domain
	*/
	public function load_textdomain()
	{
		load_plugin_textdomain('widget-icon', FALSE, dirname(plugin_basename(__FILE__)).'/languages/');
	}


	/**
	 * Add links to Support Forum
	*/
	public function plugin_extend_links($links, $file) 
	{
		if(!current_user_can('install_plugins'))
			return $links;

		$plugin = plugin_basename(__FILE__);

		if($file == $plugin) 
		{
			return array_merge(
				$links,
				array(sprintf('<a href="http://www.dfactory.eu/support/forum/widget-icon/" target="_blank">%s</a>', __('Support', 'widget-icon')))
			);
		}

		return $links;
	}


	/**
	 * Add links to Widgets page
	*/
	function plugin_settings_link($links, $file) 
	{
		if(!is_admin() || !current_user_can('edit_theme_options'))
			return $links;

		static $plugin;

		$plugin = plugin_basename(__FILE__);

		if ($file == $plugin) 
		{
			$settings_link = sprintf('<a href="%s">%s</a>', admin_url('widgets.php'), __('Widgets', 'widget-icon'));
			array_unshift($links, $settings_link);
		}

		return $links;
	}


	/**
	 * Loads admin-side scripts and styles
	*/
	public function admin_widgets_scripts_styles($page)
	{
		if($page !== 'widgets.php')
        	return;

		wp_enqueue_script('widget-icon', plugins_url('js/widget-icon.js', __FILE__), array('wp-color-picker'));

		wp_enqueue_style('wp-color-picker');
		wp_enqueue_style('elusive-style', plugins_url('assets/elusive/css/elusive-webfont.css', __FILE__));
		wp_enqueue_style('font-awesome-style', plugins_url('assets/font-awesome/css/font-awesome.min.css', __FILE__));
		wp_enqueue_style('widget-icon-admin-style', plugins_url('css/widget-icon-admin.css', __FILE__));
	}


	/**
	 * Loads front-side scripts and styles
	*/
	public function front_widgets_scripts_styles($page)
	{
		global $wp_styles, $wp_scripts;

		wp_enqueue_style('elusive-style', plugins_url('assets/elusive/css/elusive-webfont.css', __FILE__));
		wp_enqueue_style('font-awesome-style', plugins_url('assets/font-awesome/css/font-awesome.min.css', __FILE__));
		wp_enqueue_style('widget-icon-front-style', plugins_url('css/widget-icon-front.css', __FILE__));
	}


	/**
	 * Displays widget box
	*/
	public function display_admin_widget_box_options($widget, $empty, $instance)
	{
		$icon = (isset($instance['wi_opt']['widget_icon']) ? $instance['wi_opt']['widget_icon'] : $this->defaults['icon']);
		$library = (isset($instance['wi_opt']['widget_library']) ? $instance['wi_opt']['widget_library'] : $this->defaults['library']);
		$place = (isset($instance['wi_opt']['widget_place']) ? $instance['wi_opt']['widget_place'] : $this->defaults['place']);
		$padding_type = (isset($instance['wi_opt']['widget_padding_type']) ? $instance['wi_opt']['widget_padding_type'] : $this->defaults['padding_type']);
		$padding = (isset($instance['wi_opt']['widget_padding']) ? $instance['wi_opt']['widget_padding'] : $this->defaults['padding']);
		$color_type = (isset($instance['wi_opt']['widget_color_type']) ? $instance['wi_opt']['widget_color_type'] : $this->defaults['color_type']);
		$color = (isset($instance['wi_opt']['widget_color']) ? $instance['wi_opt']['widget_color'] : $this->defaults['color']);
		$icon_size = (isset($instance['wi_opt']['widget_icon_size']) ? $instance['wi_opt']['widget_icon_size'] : $this->defaults['icon_size']);
		$vertical_align = (isset($instance['wi_opt']['widget_vertical_align']) ? $instance['wi_opt']['widget_vertical_align'] : $this->defaults['vertical_align']);

		$widget_color_type = $widget->get_field_name('widget_color_type');
		$widget_color_type_str = str_replace(array('][', ']', '['), '-', $widget_color_type);
		$widget_padding_type = $widget->get_field_name('widget_padding_type');
		$widget_padding_type_str = str_replace(array('][', ']', '['), '-', $widget_padding_type);
		$widget_library = $widget->get_field_name('widget_library');
		$widget_library_str = str_replace(array('][', ']', '['), '-', $widget_library);

		ksort($this->icons_elusive, SORT_STRING);
		ksort($this->icons_font_awesome, SORT_STRING);

		$icons_elusive = '
			<select id="'.$widget_library_str.'_elusive" name="'.($library === 'elusive' ? $widget->get_field_name('widget_icon') : '').'" class="widget-icon-selection widget-lib-elusive icons-elusive" '.($library !== 'elusive' ? ' style="display: none;"' : '').'>
				<option value="none" '.selected($icon, 'none', FALSE).'>'.__('-- none --', 'widget-icon').'</option>';

		foreach($this->icons_elusive as $name => $code)
		{
			$icons_elusive .= '
				<option value="'.$name.'" '.selected($icon, $name, FALSE).'>'.$code.'&nbsp;&nbsp;'.$name.'</option>';
		}

		$icons_elusive .= '
			</select>';

		$icons_font_awesome = '
			<select id="'.$widget_library_str.'_font-awesome" name="'.($library === 'font-awesome' ? $widget->get_field_name('widget_icon') : '').'" class="widget-icon-selection widget-lib-font-awesome icons-font-awesome" '.($library !== 'font-awesome' ? ' style="display: none;"' : '').'>
				<option value="none" '.selected($icon, 'none', FALSE).'>'.__('-- none --', 'widget-icon').'</option>';

		foreach($this->icons_font_awesome as $name => $code)
		{
			$icons_font_awesome .= '
				<option value="'.$name.'" '.selected($icon, $name, FALSE).'>'.$code.'&nbsp;&nbsp;'.$name.'</option>';
		}

		$icons_font_awesome .= '
			</select>';

		echo '
		<div class="widget-icon">
			<p class="label">'.__('Select icon library', 'widget-icon').'</p>
			<select id="'.$widget_library_str.'_lib" name="'.$widget->get_field_name('widget_library').'" class="widget-icon-library">
				<option value="elusive" '.selected($library, 'elusive', FALSE).'>'.__('Elusive', 'widget-icon').'</option>
				<option value="font-awesome" '.selected($library, 'font-awesome', FALSE).'>'.__('Font Awesome', 'widget-icon').'</option>
			</select>
			<p class="label">'.__('Select widget icon', 'widget-icon').'</p>
			'.$icons_elusive.$icons_font_awesome.'
			<p class="label">'.__('Select icon position', 'widget-icon').'</p>
			<select name="'.$widget->get_field_name('widget_place').'" class="widget-icon-place">
				<option value="left" '.selected($place, 'left', FALSE).'>'.__('left of the widget title', 'widget-icon').'</option>
				<option value="right" '.selected($place, 'right', FALSE).'>'.__('right of the widget title', 'widget-icon').'</option>
				<option value="after-widget" '.selected($place, 'after-widget', FALSE).'>'.__('after the widget', 'widget-icon').'</option>
				<option value="before-widget" '.selected($place, 'before-widget', FALSE).'>'.__('before the widget', 'widget-icon').'</option>
				<option value="after-title" '.selected($place, 'after-title', FALSE).'>'.__('after the title', 'widget-icon').'</option>
				<option value="before-title" '.selected($place, 'before-title', FALSE).'>'.__('before the title', 'widget-icon').'</option>
			</select>
			<p class="label">'.__('Icon padding', 'widget-icon').'</p>
			<input type="text" name="'.$widget->get_field_name('widget_padding').'" value="'.$padding.'" size="4" />
			<input id="'.$widget_padding_type_str.'_pixel" type="radio" name="'.$widget_padding_type.'" value="pixel" '.checked($padding_type, 'pixel', FALSE).' /> <label for="'.$widget_padding_type_str.'_pixel">'.__('px', 'widget-icon').'</label>
			<input id="'.$widget_padding_type_str.'_percent" type="radio" name="'.$widget_padding_type.'" value="percent" '.checked($padding_type, 'percent', FALSE).' /> <label for="'.$widget_padding_type_str.'_percent">'.__('%', 'widget-icon').'</label>
			<p class="label">'.__('Vertical align', 'widget-icon').'</p>
			<select name="'.$widget->get_field_name('widget_vertical_align').'">';

		foreach($this->aligns as $align)
		{
			echo '
				<option value="'.$align.'" '.selected($vertical_align, $align, FALSE).'>'.$align.'</option>';
		}

		echo '
			</select>
			<p class="label">'.__('Icon size', 'widget-icon').'</p>
			<select name="'.$widget->get_field_name('widget_icon_size').'">';

		foreach($this->icon_sizes as $size)
		{
			echo '
				<option value="'.$size.'" '.selected($icon_size, $size, FALSE).'>'.__($size, 'widget-icon').'</option>';
		}

		echo '
			</select>
			<p class="label">'.__('Icon color', 'widget-icon').'</p>
			<input class="wi_ct_inheir" id="'.$widget_color_type_str.'_inherit" type="radio" name="'.$widget_color_type.'" value="inherit" '.checked($color_type, 'inherit', FALSE).' /> <label for="'.$widget_color_type_str.'_inherit">'.__('inherit', 'widget-icon').'</label>
			<input class="wi_ct_custom" id="'.$widget_color_type_str.'_custom" type="radio" name="'.$widget_color_type.'" value="custom" '.checked($color_type, 'custom', FALSE).' /> <label for="'.$widget_color_type_str.'_custom">'.__('custom', 'widget-icon').'</label>
			<div id="'.$widget_color_type_str.'_div"'.($color_type === 'inherit' ? ' style="display: none;"' : '').'><input type="text" value="'.$color.'" class="widget-icon-color-picker" name="'.$widget->get_field_name('widget_color').'" data-default-color="'.$color.'" /></div>
		</div>';
	}


	/**
	 * Saves widget box
	*/
	public function update_admin_widgets_options($instance, $new_instance)
	{
		//nothing set?
		if(!isset($new_instance['widget_library'], $new_instance['widget_icon'], $new_instance['widget_place'], $new_instance['widget_padding'], $new_instance['widget_padding_type'], $new_instance['widget_icon_size'], $new_instance['widget_vertical_align'], $new_instance['widget_color_type'], $new_instance['widget_color']))
			unset($instance['wi_opt']);
		else
		{
			//library
			if(isset($new_instance['widget_library']) && in_array($new_instance['widget_library'], $this->libraries))
				$instance['wi_opt']['widget_library'] = $new_instance['widget_library'];
			else
				$instance['wi_opt']['widget_library'] = $this->defaults['library'];

			//icon
			if(isset($new_instance['widget_icon']))
				$instance['wi_opt']['widget_icon'] = sanitize_key($new_instance['widget_icon']);
			else
				$instance['wi_opt']['widget_icon'] = $this->defaults['icon'];

			//place
			if(isset($new_instance['widget_place']) && in_array($new_instance['widget_place'], $this->places))
				$instance['wi_opt']['widget_place'] = $new_instance['widget_place'];
			else
				$instance['wi_opt']['widget_place'] = $this->defaults['place'];

			//padding
			if(isset($new_instance['widget_padding']))
				$instance['wi_opt']['widget_padding'] = (int)$new_instance['widget_padding'];
			else
				$instance['wi_opt']['widget_padding'] = $this->defaults['padding'];

			//padding type
			if(isset($new_instance['widget_padding_type']) && in_array($new_instance['widget_padding_type'], $this->paddings))
				$instance['wi_opt']['widget_padding_type'] = $new_instance['widget_padding_type'];
			else
				$instance['wi_opt']['widget_padding_type'] = $this->defaults['padding_type'];

			//icon size
			if(isset($new_instance['widget_icon_size']) && in_array($new_instance['widget_icon_size'], $this->icon_sizes))
				$instance['wi_opt']['widget_icon_size'] = $new_instance['widget_icon_size'];
			else
				$instance['wi_opt']['widget_icon_size'] = $this->defaults['icon_size'];

			//vertical align
			if(isset($new_instance['widget_vertical_align']) && in_array($new_instance['widget_vertical_align'], $this->aligns))
				$instance['wi_opt']['widget_vertical_align'] = $new_instance['widget_vertical_align'];
			else
				$instance['wi_opt']['widget_vertical_align'] = $this->defaults['vertical_align'];

			//color type
			if(isset($new_instance['widget_color_type']) && in_array($new_instance['widget_color_type'], $this->color_types))
			{
				if(($instance['wi_opt']['widget_color_type'] = $new_instance['widget_color_type']) === 'custom')
				{
					//color
					if(isset($new_instance['widget_color']))
					{
						if(preg_match('/^#[a-f0-9]{6}$/', $new_instance['widget_color']) === 1)
							$instance['wi_opt']['widget_color'] = $new_instance['widget_color'];
					}
					else $instance['wi_opt']['widget_color'] = $this->defaults['color'];
				}
			}
			else $instance['wi_opt']['widget_color_type'] = $this->defaults['color_type'];
		}

		return $instance;
	}


	/**
	 * Manages front-end display of widgets
	*/
	public function display_frontend_widgets($instance, $widget_class, $args)
	{
		if(isset($instance['wi_opt']['widget_icon']) && $instance['wi_opt']['widget_icon'] !== 'none')
		{
			$color = ($instance['wi_opt']['widget_color_type'] === 'inherit' ? '' : 'color: '.$instance['wi_opt']['widget_color'].';');

			$padding = ($instance['wi_opt']['widget_padding'] !== 0 ? ($instance['wi_opt']['widget_place'] === 'right' ? 'padding-left: ' : 'padding-right: ').$instance['wi_opt']['widget_padding'].($instance['wi_opt']['widget_padding_type'] === 'percent' ? '%' : 'px').';' : '');

			$vertical_align = ' vertical-align: '.$instance['wi_opt']['widget_vertical_align'].';';

			$library = (isset($instance['wi_opt']['widget_library']) ? ($instance['wi_opt']['widget_library'] === 'font-awesome' ? 'font-awesome' : 'elusive') : 'elusive');

			$icon = ($instance['wi_opt']['widget_icon'] !== 'none' ? '<i style="'.$color.$padding.$vertical_align.'" class="'.$library.' '.$instance['wi_opt']['widget_icon'].($instance['wi_opt']['widget_icon_size'] !== 'standard' ? ' '.$instance['wi_opt']['widget_icon_size'] : '').'"></i>' : '');

			switch($instance['wi_opt']['widget_place'])
			{
				case 'left':
					$args['before_title'] = $args['before_title'].$icon;
					break;

				case 'right':
					$args['after_title'] = $icon.$args['after_title'];
					break;

				case 'before-widget':
					$args['before_widget'] = $icon.$args['before_widget'];
					break;

				case 'after-widget':
					$args['after_widget'] = $args['after_widget'].$icon;
					break;

				case 'before-title':
					$args['before_title'] = $icon.$args['before_title'];
					break;

				case 'after-title':
					$args['after_title'] = $args['after_title'].$icon;
					break;
			}

			$widget_class->widget($args, $instance);

			return FALSE;
		}

		else return $instance;
	}
}


$widget_icon = new Widget_Icon();
?>