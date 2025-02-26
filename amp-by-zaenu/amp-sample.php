<?php
$konten='';
$konten.= '
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<!doctype html>
<html amp>
  <head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <title><?php the_title();?></title>
    <link rel="canonical" href="<?php the_permalink(); ?>">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	<link rel="shortcut icon" href="<?php echo get_option("zaenu_icon");?>">
	<meta name="description" content="<?php echo wp_strip_all_tags( amp_by_zaenu__cuplikan(140), true ); ?>" />
	<meta property="og:type" content="Article"/>
	<meta property="og:title" content="<?php the_title(); ?>"/>
	<meta property="og:url" content="<?php the_permalink(); ?>"/>
	<meta property="og:description" content="<?php echo wp_strip_all_tags( amp_by_zaenu__cuplikan(140), true ); ?>"/>
	<meta property="og:image" content="<?php $gambar = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );if( has_post_thumbnail() ) {?><?php echo $gambar;};?>" />
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<style amp-custom>
	/* Generic styling */
amp-img.alignright  { float: right; margin: 0 0 1em 1em; }
amp-img.alignleft   { float: left; margin: 0 1em 1em 0; }
amp-img.aligncenter { display: block; margin-left: auto; margin-right: auto; }
.alignright  { float: right; }
.alignleft   { float: left; }
.aligncenter { display: block; margin-left: auto; margin-right: auto; text-align: center; }
.wp-caption.alignleft  { margin-right: 1em; }
.wp-caption.alignright { margin-left: 1em; }

.amp-gambar{display:block;width:150px;height:auto;margin:10px auto 0;}
.amp-gambar img{max-width:100%;height:auto;}
.amp-wp-enforced-sizes {
	/** Our sizes fallback is 100vw, and we have a padding on the container; the max-width here prevents the element from overflowing. **/
	max-width: 100%;
}

table {
    display: table;
    margin: 0 auto 40px;
    width: 100%;
}
table > tbody > *:nth-child(2n+1) {
    background: #eee;
}
.amp-wp-content, .amp-wp-title-bar div {
			max-width: 600px;
	margin: 0 auto;
	}
td {
    border: medium none;
    display: table-cell;
    margin: 0;
    padding: 5px 10px;
}
@font-face {
	font-family: "Roboto", sans-serif;
}

h1,h2,h3,h4,h5,h6, span,p,a, input {
	-webkit-font-smoothing: antialiased;
	text-rendering: geometricPrecision;
}

body {
	font-family: "Roboto", sans-serif;
	font-size: 18px;
	line-height: 1.6;
	color: #000;
	background-color: #fff;
	min-width: 300px;
	margin: auto;
	padding-bottom: 10px;
	position: relative;
}

body > div {
	margin: 0 auto;
	max-width: 620px;
}

div[fallback] p {
	font-family: "Roboto", sans-serif;
	font-size: 14px;
	margin: 0 5px;
}
p.wp-caption-text{display:none;}
.amp-wp-content {
	padding: 16px 0;
	overflow-wrap: break-word;
	word-wrap: break-word;
	font-weight: 400;
	color: #000;
}

.amp-wp-meta {
	margin-top:4px;
	margin-bottom: 4px;
}

p,
ol,
ul,
figure {
	margin: 0 0 24px 0;
}

p, blockquote {
	font-family: "Roboto", sans-serif;
	font-size: 18px;
	line-height: 26px;
	letter-spacing: -0.3px;
}

a {
	text-decoration: none;
	color: black;
}
a:hover,
a:active,
a:focus {
	color: #33bbe3;
}

nav.amp-wp-title-bar,
.wp-caption-text {
	font-family: "Roboto", sans-serif;
	font-size: 15px;
}

/* Meta */
ul.amp-wp-meta {
	padding: 24px 0 0 0;
	margin: 0 0 24px 0;
}

ul.amp-wp-meta li {
	list-style: none;
	display: inline-block;
	margin: 0;
	line-height: 24px;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	max-width: 300px;
}

ul.amp-wp-meta li:before {
	content: "\2022";
	margin: 0 8px;
}

ul.amp-wp-meta li:first-child:before {
	display: none;
}


/* *** */

.amp-wp-meta,
.amp-wp-meta a {
	color: #000;
}

.amp-wp-meta .screen-reader-text {
	/* from twentyfifteen */
	clip: rect(1px, 1px, 1px, 1px);
	height: 1px;
	overflow: hidden;
	position: absolute;
	width: 1px;
}

.amp-wp-posted-on {
	display: inline-block;
}

.amp-wp-byline amp-img {
	border-radius: 50%;
	border: 0;
	background: #f3f6f8;
	position: relative;
	top: 6px;
	margin-right: 6px;
}

/* Titlebar */

nav.amp-wp-title-bar {
	background: #0a89c0;
	padding: 0 16px;
}

nav.amp-wp-title-bar div {
	line-height: 54px;
	color: #fff;
}

nav.amp-wp-title-bar a {
	color: #fff;
	text-decoration: none;
}

nav.amp-wp-title-bar .amp-wp-site-icon {
	/** site icon is 32px **/
	float: left;
	margin: 11px 8px 0 0;
	border-radius: 50%;
}


/* Captions */

.wp-caption-text {
	padding: 8px 16px;
	font-style: italic;
}

/* Quotes */


blockquote {
	padding: 16px 16px 16px 30px;
	margin: 8px 0 40px 0;
}

/* Poetry related */

blockquote p {
	font-size: 18px;
	line-height: 25px;
	margin: 0;
	padding: 0;
	text-indent: 1em;
}

blockquote p:last-child {
	margin-bottom: 0;
}

/* Other Elements */

amp-iframe {
	margin-bottom: 15px;
}

amp-iframe.omniture {
	margin-bottom: 0;
	display: block;
}


amp-carousel {
	background: #000;
}

amp-carousel {
	background: #000;
	margin: 25px 0;
}

amp-iframe,
amp-youtube,
amp-instagram,
amp-vine {
	background: #f3f6f8;
}

.amp-wp-iframe-placeholder {
	background: #f3f6f8 url( <?php echo $zaenu_icon; ?> ) no-repeat center 40%;
	background-size: 48px 48px;
	min-height: 48px;
}

header {
	text-align: center;
	max-width: 98%;
	margin: 0 1%;
}

h1, h2, h3, h4 {
	margin:  0;
	padding: 0;
}

h1 {
	margin: 5px 20px 2px;
	font-size: 30px;
	font-family: "Roboto", sans-serif;
	font-weight: normal;
	text-transform: uppercase;
	line-height: 34px;
	font-variant-ligatures: none;
	color: #000;
}

h4.rubric {
	display: inline-block;
	color: #df3531;
	font-family: "Roboto", sans-serif;
	font-size:  12px;
	font-weight: normal;
	line-height: 18px;
	letter-spacing: 0.8px;
	margin-bottom: 8px;
	font-variant-ligatures: none;
}

div.post h4.rubric {
	color: #000000;
}

span.pub-date,
span.circulated-on,
span.the-date {
	display: block;
	color: black;
	font-family: "Roboto", sans-serif;
	font-size: 12px;
	font-weight: normal;
	line-height: 18px;
	text-transform: uppercase;
	letter-spacing: 0.8px;
	margin-top: 6px;
}

div.post span.the-date {
	color: black;
	margin-top: 12px;
}

h2.dek {
	font-family: "Roboto", sans-serif;
	text-transform: none;
	font-weight: 300;
	font-size: 16px;
	line-height: 18px;
	font-style: italic;
	padding-bottom: 0;
	margin:5px 20px 0px;
}

h2 {
	font-family: "Roboto", sans-serif;
	font-size: 17px;
	font-weight: bold;
	line-height: 17px;
	font-weight: 700;
	padding-bottom: 15px;
	text-transform: uppercase;
}

div.author-list {
	color: #121212;
	font-family: "Roboto", sans-serif;
	font-weight: bold;
	font-size: 18px;
	line-height:   14px;
	margin-top:    12px;
	margin-bottom: 30px;
	display: inline-block;
	letter-spacing: 0;
	-webkit-font-smoothing: antialiased;
	text-rendering: geometricPrecision;
}

span.amp-wp-author {

}

.byline amp-img {
	border-radius: 50%;
	border: 0;
	background: #f3f6f8;
	position: relative;
	top: 6px;
	margin-right: 6px;
}

/* Titlebar */

nav.title-bar {
	background: #000000;
	padding: 0 16px;
	box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.15);
}

nav.title-bar div {
	height: 50px;
	color: #fff;
	overflow: hidden;
}

nav.title-bar svg {
	fill: #fff;
	height: 18px;
	margin: 16px auto 2px auto;
	width: 300px;
	display: block;
}

p {
	margin-left: 20px;
	margin-right: 20px;
}


p a {
	text-decoration: underline;
}

/* AMP Access Messages */

section.meter-fixed{
	position: fixed;
	top:   auto;
	left:  10px;
	right: 10px;
	bottom:  0;
	padding: 0;
	z-index: 10;
	max-width: 440px;
	margin: 0 auto;
}

div.meter-barrier {
	height: 220px;
	background-color: #f5f4f3; /* Gray */
	border-radius: 6px 6px 0 0;
	box-shadow: 0px 2px 8px 5px rgba(0, 0, 0, 0.15);
	padding: 0;
	display: block;
	font-family: "Roboto", sans-serif;
	font-size: 16px;
	color: black;
	text-align: center;
}

a.meter-btn-dismiss {
	margin: 6px 6px 10px 10px;
	background-color: black;
	color: white;
	display: inline-block;
	width: 24px;
	height: 24px;
	line-height: 23px;
	border-radius: 12px;
	font-size: 24px;
	position: absolute;
	right: 0;
	top: 0;
}

a.meter-btn-box {
	border: 2px solid white;
	color: white;
	font-size: 12px;
	padding: 5px 8px 4px 8px;
	text-transform: uppercase;
	font-weight: 400;
	letter-spacing: 1px;
	margin: auto 4px;
}

a.meter-btn-line {
	border-bottom: 2px solid white;
	color: white;
	font-size: 12px;
	padding: 6px 0 0 0;
	text-transform: uppercase;
	font-weight: 400;
	letter-spacing: 1px;
}

h3.meter-message-title {
	font-size: 12px;
	text-align: center;
	line-height: 36px;
	border-bottom: 1px solid #d3d3d3;
	font-weight: 500;
	background-color: white;
	color: black;
	border-radius: 6px 6px 0 0;
}

p.meter-message-main {
	margin: 16px 14px 0 14px;
	height: 60px;
	position: relative;
	vertical-align: middle;
	text-align: left;

	line-height: 1.5em;
	font-size:   18px;
}

p.meter-message-main a:visited,
p.meter-message-main a {
	text-decoration: none;
	color: black;
}

p.meter-message-main span {
	display: block;
	margin-bottom: 4px;
}

p.meter-message-main span small {
	font-size: 14px;
}

p.meter-message-main span:nth-child(2) {
	color: #0099cc;
}

div.meter-barrier-footer {
	background-color: #f5f4f3;
	border-top: 1px solid #d3d3d3;
	width: 100%;
	height: 45px;
	color: black;
	position: absolute;
	bottom: 0;
	font-size: 14px;
	line-height: 42px;
	text-align: right;
}

div.meter-barrier-footer a {
	color: black;
	margin-right: 15px;
}

div.meter-barrier-sign-in {
	display: inline-block;
}

div.meter-barrier-sign-in a {
	color: black;
	text-decoration: underline;
}

/* iPhone 5 only */

@media (max-width: 320px) {

	h3.meter-message-title {
		font-size: 12px;
		text-align: left;
		text-indent: 12px;
	}

	h3.meter-message-title span {
		display:none;
	}

	p.meter-message-main {
		font-size:   20px;
		line-height: 26px;
		margin-top:  24px;
	}

	p.meter-message-main span small {
		font-size: 14px;
	}

}

/* Notification within article text */

.meter-notif {
	margin: 50px 15px;
	text-align: center;
	font-size:  18px;
	font-family: "Roboto", sans-serif;
}

.meter-notif-link a {
	text-decoration: underline;
}

/* Featured Image */

figure.featured-image figcaption {
	margin: 12px 16px;
}

.caption { /* this is used by all embedded items with captions*/
	color: black;
	font-style: italic;
	font-size: 16px;
	line-height: 18px;
	text-align: left;
	margin: 10px 10px 10px 15px;
	display: block;
}

.caption-text {
	padding-bottom: 5px;
	display: block;
}

.credit {
	display: block;
	margin-top: 3px;
	color: #9a9a9a;
	font-family: "Roboto", sans-serif;
	font-style: normal;
	text-align: left;
	font-size: 11px;
	line-height: 11px;
	text-transform: uppercase;
}

.hideFromView {
	height:  1px;
	width:   1px;
	margin: -1px;
	padding: 0;
	border:  0;
	clip: rect(0 0 0 0);
	overflow: hidden;
	position: absolute;
}

/* Inline image */

figure.aligncenter amp-img {
	text-align: center;
	margin: 0 auto;
}

/* Article Text */

.descender:first-letter {
	font-family: "Roboto", sans-serif;
	font-size: 54px;
	font-weight: bold;
	line-height: 30px;
	margin-right: 15px;
	margin-top: 11px;
	display: block;
	float: left;
}

/* Embedded */

/* Audio */

div.inline-audio {
	height: 40px;
	margin: 25px 10px 5px 10px;
	position: relative;
	text-align: center;
	display: block;
}

amp-audio {
	width: 100%;
}

amp-audio audio {
	background-color: black;
}


amp-vimeo,
amp-vine,
amp-twitter,
amp-youtube,
amp-soundcloud {
	margin-bottom: 20px;
}

div.inline-media {
	width: 320px;
	margin: 0 auto;
}

div.inline-media .media-type-caption {
	text-transform: uppercase;
}

div.inline-media span.media-type-caption,
div.inline-media span.caption-text {
	display: inline-block;
}

figcaption.caption {
	color: black;
	font-style: italic;
	font-size: 14px;
	line-height: 18px;
	text-align: left;
}

figcaption.caption .media-type {
	color: #df3331;
	font-size: 13px;
	line-height: 13px;
	font-family: "Roboto", sans-serif;
	font-style: normal;
	font-weight: 700;
	padding-right: 2px;
	text-transform: uppercase;
}

/* Credit in slideshows */
span.copyright {
	color: #9a9a9a;
	font-family: "Roboto", sans-serif;
	font-size: 12px;
	font-style: normal;
	font-weight: 700;
	text-transform: uppercase;
	line-height: 12px;
	padding-right: 2px;
	padding-left: 2px;
}


/* Cartoon */

figure.cartoon-image {
	width: 90%;
	margin: 30px 5%
}

figure.cartoon-image figcaption,
figure.cartoon-image .caption {
	margin-top: 8px;
	color: black;
	font-style:  italic;
	font-family: Times, Georgia, serif;
	font-size:   18px;
	line-height: 20px;
	text-align:  center;
}

/* Footer */

footer {
	color: #232323;
	font-family: "Roboto", sans-serif;
	font-size:   12px;
	line-height: 12px;
	font-weight: 500;
	display: block;
	text-align: center;
	border-top: 1px solid #ccc;
	padding-top: 10px;
	margin-bottom: 20px;
}

#site-links {
	margin-bottom: 12px
}

#site-links a {
	padding-left: 8px
}

.red {
	color: #df3331;
}

/* Hide */

.social-hover {
	display: none;
}

/* Forced over-rides */

.amp-wp-enforced-sizes {
	/* margin: 0 auto;*/ /* Why? Centered Instagram embed */
}

/* Ads */

div.ad {
	text-align: center;
	display: inline-block;
	border: 0px;
	border-top:    1px solid #CCC;
	border-bottom: 1px solid #CCC;
	padding-top: 11px;
	padding-bottom: 16px;
	margin: 0px;
	margin-left: 16px;
	margin-right: 16px;
	margin-bottom: 20px;
	display: block;
}

div.ad:before {
	position: relative;
	content: "Advertisement";
	display: block;
	padding-bottom: 10px;
	text-align: left;
	text-transform: uppercase;
	font-size: 10px;
	font-family: "Roboto", sans-serif;
	line-height: 10px;
	width: 100%;
}

/* Related Stories */

div.related_stories {
	padding-top: 10px;
	margin-left: 16px;
	margin-right: 16px;
	text-align: center;
}


div.related_stories div.story {
	border-bottom: 1px solid #efefef;
	margin: 0 auto;
	margin-bottom: 15px;
	padding-bottom: 10px;
	max-width: 320px;
}

div.related_stories div.story:last-child {
	border-bottom:  0;
}

div.related_stories h2 {
	font-family: "Roboto", sans-serif;
	font-size: 22px;
	font-weight: normal;
	line-height: 26px;
	padding-bottom: 4px;
	    margin: 7px 16px 0 16px;
}

div.related_stories h3 {
	color: #232323;
	font-family: "Roboto", sans-serif;
	font-weight: bold;
	font-size: 16px;
	line-height: 18px;
	margin-top: 3px;
	margin-bottom: 6px;
}

div.related_stories h4 {
	color: #df3331;
	font-family: "Roboto", sans-serif;
	font-size: 12px;
	font-weight: normal;
	margin-top: 8px;
}

div.related_stories h5 {
	font-family: "Roboto", sans-serif;
	font-size:     24px;
	line-height:   24px;
	font-weight:   700;
	margin-top:    16px;
	margin-bottom: 20px;
	text-align: center;
	text-transform: uppercase;
	color: #6b6b6b;
}

/* Carousel / Gallery / Slideshow */

.carousel {
	background: #fff;
	margin: 10px 0;
	padding-bottom: 50px;
}

.carousel.hide-captions {
	padding-bottom: 0px;
}

.carousel .slide {
}

/* Is a Cartoon slideshow... */
.carousel .issue-cartoons .caption {
	text-align: center;
	font-style: italic;
	font-size: 16px;
}

.carousel .slide > amp-img {
/*	max-height: 420px; */
}

.carousel .slide > amp-img > img {
	object-fit: contain;
	max-height: 315px;
	bottom: auto;
}

.carousel .caption {
	position: absolute;
	bottom: 0;
	left:   0;
	right:  0;
	padding: 8px;
/*	max-height: 30%; */
	font-size: 14px;
	line-height: 22px;
	background: #fff;
	min-height: 100px;
}
.carousel amp-fit-text {
	margin: 0 10px;
	font-style: italic;
}

.carousel amp-fit-text  span.copyright {
	display: block;
	margin: 8px;
	color: #9a9a9a;
	font-family: "Roboto", sans-serif;
	font-style: normal;
	text-align:  right;
	font-size:   12px;
	line-height: 12px;
	text-transform: uppercase;
}

.narrow {
	width: 33%;
	margin-bottom: 25px;
}

/* Poetry */

div.poetry p {
	margin-bottom: 28px;
	padding: 0;
}

div.poetry p > span {
	display: block;
	text-indent: -1em;
	margin-left: 1em;
}

div.poetry p span.indent1 {
	margin-left: 5em;
}

/* Share Tools */

.social-module {
	overflow: hidden;
	position: relative;
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);

	padding: 0;
	margin: 30px 0;
	padding-bottom: 15px;
}

.social-module ul.options {
	padding: 0;
	text-align: center;
	margin: 0;
	padding: 0;
	text-align: center;
}

.social-module ul,
.social-module li {
	list-style: none
}

.social-module .option {
	background-color: #df3531;
	margin: 0 6px;
	transition: -webkit-transform 0.7s cubic-bezier(0.19, 1, 0.22, 1);
	transition: transform 0.7s cubic-bezier(0.19, 1, 0.22, 1);
	position: relative;
	overflow: hidden;
	width: 40px;
	height: 40px;
	display: inline-block;
	border-radius: 22px;
}

.social-module .option a,.social-module .expand .container {
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
	-webkit-align-items: center;
	-ms-flex-align: center;
	align-items: center;
	-webkit-justify-content: center;
	-ms-flex-pack: center;
	justify-content: center;
	position: absolute;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	z-index: 10
}

.social-module .option .icon {
	width: 45%
}

.social-module .whatsapp {
	background-color: #25d366;
}

.social-module .fb-messenger {
	background-color: #0084ff;
}

.social-module .facebook {
	background-color: #3c5a99;
}

.social-module .twitter {
	background-color: #55acce;
}

.social-module .pinterest {
	background-color: #bd081c;
}

.social-module .print {
	background-color: #878787;
}

.social-module .email {
	background-color: #818181;
}

.social-module .tumblr {
	background-color: #37465d;
}

.social-module .google {
	background-color: #dd4b39;
}

.social-module .linkedin {
	background-color: #007bb6;
}

/*	Author Footer */

.author-masthead {
	text-align: center;
	font-size: 17px;
	padding-bottom: 14px;
	margin-bottom:  20px;
	line-height: 22px;
	font-style: italic;
}

.author-masthead amp-img,
.author-masthead img {
	width: 90px;
	margin: 0 auto 10px auto;
}

.author-masthead p {
	font-size: 16px;
	overflow: hidden;
	text-overflow: ellipsis;
	display: -webkit-box;
	-webkit-box-orient: vertical;
	-webkit-line-clamp: 6;
}

p img{
	max-width:100%;
	height:auto;
}

.author-masthead a.more-link {
	font-family: "Roboto", sans-serif;
	font-size: 13px;
	line-height: 15px;
	font-weight: normal;
	text-transform: uppercase;
	text-decoration: none;
	font-style: normal;
	margin-left: 8px;
}

/* CM Unit in Footer */

#promote-today-app {
	margin: 0 10px 18px 10px;
}

#promote-today-app amp-img{
	max-width: 400px;
	margin: 0 auto;
}

/* Hide this content on AMP */
.amp-hide {
	display: none;
}
	</style>
  </head>
  <body>
  <nav class="title-bar">
		<div>
			<a href="<?php  bloginfo("url"); ?>" class="amp-gambar">
				<amp-img role="button" tabindex="0" height="36" width="150" src="<?php echo get_option("zaenu_logo")?>" >
				</amp-img>
			</a>
		</div>
	</nav>
	<div class="amp-wp-content post ">
		<header>
				<h1 class="amp-wp-title">This is sample data, please setup your preference first in <a style="color:red;" href="<?php echo admin_url();?>options-general.php?page=amp_by_zaenu_setting">Settings Page</a><br/></h1>
				<h1 class="amp-wp-title"><?php the_title(); ?></h1>
			<div class="amp-wp-meta">
				<h4 class="amp-wp-tax-category rubric"><?php the_author(); ?>,</h4>
					<div class="amp-wp-posted-on">
						<time datetime="<?php	the_time("Y-m-d");?>">
							<span class="the-date" title="Published <?php	the_time("Y-m-d");?>"><?php	the_time("d F Y");?></span>
						</time>
					</div>
				</div>
		</header>
		<?php if( has_post_thumbnail() ) {?>
		<figure class="featured-image">
			<amp-img src="<?php echo $gambar;?>" srcset="<?php echo $gambar;?> 280w, <?php echo $gambar;?> 320w, <?php echo $gambar;?> 1200w" width=500 height=300 layout="responsive"></amp-img>
		</figure>
		<?php };?>
		<div amp-access="">
			<?php $where = 3;
						$content = apply_filters("the_content", get_the_content());
						$content = explode("</p>", $content);
						for ($i = 0; $i <count($content); $i++) {
							if ($i == $where) {}
							echo $content[$i] . "</p>";
							};?>
		</div>
		<div class="social-module">
				<ul class="options">
					<li class="option facebook">
						<a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
							<svg class="icon" version="1.1" id="logo-fb" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="156.5 249.1 295.7 296.3" enable-background="new 156.5 249.1 295.7 296.3" xml:space="preserve"><path fill="#ffffff" d="M429.7,249.1H179.4c-9,0-22.9,13.9-22.9,22.9v250.3c0,9,13.9,22.9,22.9,22.9h135.3V430.5H276 V386h38.7v-32.9c0-38.3,23.5-59.3,57.7-59.3c16.4,0,30.3,1.3,34.5,1.6v39.9H383c-18.7,0-22.2,8.7-22.2,21.9V386h44.1l-5.8,44.8 h-38.7v114.7h68.9c9,0,22.9-13.9,22.9-22.9V272C452.9,263,438.7,249.1,429.7,249.1z"/></svg>
						</a>
					</li>
					<li class="option twitter">
						<a class="twitter" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>?mbid=amp&text=<?php the_title(); ?>&url=<?php the_permalink(); ?>?mbid=amp_tw" target="_blank">
							<svg class="icon" version="1.1" id="logo-twitter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="153 274.6 305.4 248.7" enable-background="new 153 274.6 305.4 248.7" xml:space="preserve"><g><path fill="#ffffff" d="M458.4,304.2c-11.3,4.8-23.2,8.4-36.1,10c12.9-7.7,22.9-20,27.7-34.8c-12.2,7.1-25.4,12.6-39.9,15.1 c-11.6-12.2-27.7-20-45.7-20c-34.8,0-62.8,28-62.8,62.8c0,4.8,0.6,9.7,1.6,14.2c-52.2-2.6-98.2-27.4-129.2-65.4 c-5.5,9.3-8.4,20-8.4,31.6c0,21.9,11,40.9,28,52.2c-10.3-0.3-20-3.2-28.3-7.7c0,0.3,0,0.6,0,0.6c0,30.3,21.6,55.7,50.2,61.5 c-5.2,1.3-11,2.3-16.4,2.3c-4.2,0-8.1-0.3-11.9-1c8.1,24.8,31.2,43.2,58.6,43.5c-21.6,16.7-48.6,26.7-77.9,26.7 c-5.2,0-10-0.3-14.8-1c27.7,17.7,60.9,28.3,96.3,28.3c115.3,0,178.4-95.7,178.4-178.4c0-2.6,0-5.5-0.3-8.1 C439.4,327.7,450,316.8,458.4,304.2L458.4,304.2z"/></g></svg>
						</a>
					</li>
					<li class="option whatsapp">
						<a class="whatsapp" href="whatsapp://send?text=<?php the_permalink(); ?>?mbid=amp_wa" target="_blank">
							<svg class="icon" version="1.1" id="logo-whats-app" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="90px" height="90px" viewBox="0 0 90 90" xml:space="preserve"><g><path fill="#ffffff" d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522 c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982 c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537 c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938 c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537 c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333 c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882 c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977 c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344 c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223 C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z"/></g></svg>
						</a>
					</li>
					<li class="option fb-messenger">
						<a class="fb-messenger" href="http://fb-messenger//share:?&message=<?php the_title(); ?>&share_link_url=<?php the_permalink(); ?>?mbid=amp_fbm" target="_blank">
							<svg class="icon" version="1.1" id="logo-fb-messenger" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#ffffff" d="M4.5,24.002c-0.083,0-0.167-0.021-0.242-0.063C4.099,23.851,4,23.684,4,23.502v-3.44c-2.545-2.186-4-5.292-4-8.56    c0-6.341,5.383-11.5,12-11.5s12,5.159,12,11.5s-5.383,11.5-12,11.5c-1.537,0-3.032-0.275-4.448-0.817l-2.787,1.741 C4.684,23.977,4.592,24.002,4.5,24.002z M12,1.002c-6.065,0-11,4.71-11,10.5c0,3.046,1.392,5.94,3.818,7.941 C4.933,19.539,5,19.68,5,19.829V22.6l2.235-1.397c0.136-0.085,0.306-0.099,0.454-0.039c1.367,0.556,2.817,0.838,4.311,0.838    c6.065,0,11-4.71,11-10.5S18.065,1.002,12,1.002z"/><path fill="#ffffff" d="M4.5,15.002c-0.153,0-0.304-0.07-0.401-0.201c-0.149-0.199-0.129-0.477,0.047-0.653l6-6    c0.184-0.186,0.48-0.196,0.679-0.026l3.238,2.775l5.197-2.835c0.218-0.119,0.491-0.06,0.64,0.14 c0.149,0.199,0.129,0.477-0.047,0.653l-6,6c-0.185,0.185-0.481,0.195-0.679,0.026l-3.238-2.775l-5.197,2.835 C4.664,14.982,4.582,15.002,4.5,15.002z M10,11.002c0.117,0,0.233,0.041,0.325,0.121l3.148,2.698l3.218-3.217l-2.452,1.337    c-0.181,0.099-0.408,0.076-0.564-0.06l-3.148-2.698l-3.218,3.217l2.452-1.337C9.835,11.022,9.918,11.002,10,11.002z"/></svg>
						</a>
					</li>
					<li class="option email">
						<a class="email" href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php echo get_the_excerpt(); ?>" target="_blank">
							<svg class="icon" version="1.1" id="logo-email" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="156 305 298 193.6" enable-background="new 156 305 298 193.6" xml:space="preserve"><g>	<polygon fill="#ffffff" points="305,438.8 453.8,305.2 156.2,305.2"/><polygon fill="#ffffff" points="454.2,334.8 454.2,468.8 379.4,401.8"/><polygon fill="#ffffff" points="156.2,334.8 156.2,468.8 230.9,401.8"/><polygon fill="#ffffff" points="305,465.9 247.4,416.6 156.2,498.8 453.8,498.8 363,416.6"/></g></svg>
						</a>
					</li>
				</ul>
			</div>
	</div>
	<footer>
		<div id="copyright" data-property="dc:rights">&copy; <span data-property="dc:dateCopyrighted">2017</span> <span data-property="dc:publisher"><?php  bloginfo("name"); ?></span></div>
	</footer>
  </body>
</html>
<?php endwhile; endif;?>';?>