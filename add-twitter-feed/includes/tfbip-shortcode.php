<?php 


add_shortcode('icon_twitter_feed', 'tfbip_shortcode_function');

function tfbip_shortcode_function($atts, $content){

	extract( shortcode_atts( array( 'id' => null ) , $atts ) );

	$tfbip_select_feed_from = get_post_meta($id, '_tfbip_select_feed_from', true);

	if($tfbip_select_feed_from == 'username'){
		$tfbip_query = get_post_meta($id, '_tfbip_username', true);
	}
	if($tfbip_select_feed_from == 'hashtag'){
		$tfbip_query = get_post_meta($id, '_tfbip_hashtag', true);

	}

	$tfbip_number_of_tweets = get_post_meta($id, '_tfbip_number_of_tweets', true);
	$tfbip_select_style = get_post_meta($id, '_tfbip_select_style', true);
	$tfbip_display_photos_only = get_post_meta($id, '_tfbip_display_photos_only', true);
	$tfbip_caption_text_limit_vertical = get_post_meta($id, '_tfbip_caption_text_limit_vertical', true);
	$tfbip_vertical_show_hide_date = get_post_meta($id, '_tfbip_vertical_show_hide_date', true);
	$tfbip_vertical_show_hide_dp = get_post_meta($id, '_tfbip_vertical_show_hide_dp', true);
	$tfbip_vertical_show_hide_caption = get_post_meta($id, '_tfbip_vertical_show_hide_caption', true);
	$tfbip_caption_text_limit_blog = get_post_meta($id, '_tfbip_caption_text_limit_blog', true);
	$tfbip_blog_show_hide_date = get_post_meta($id, '_tfbip_blog_show_hide_date', true);
	$tfbip_blog_show_hide_dp = get_post_meta($id, '_tfbip_blog_show_hide_dp', true);
	$tfbip_blog_show_hide_caption = get_post_meta($id, '_tfbip_blog_show_hide_caption', true);
	$tfbip_no_of_columns_masonry = get_post_meta($id, '_tfbip_no_of_columns_masonry', true);
	$tfbip_caption_text_limit_masonry = get_post_meta($id, '_tfbip_caption_text_limit_masonry', ture);
	$tfbip_masonry_show_hide_date = get_post_meta($id, '_tfbip_masonry_show_hide_date', true);
	$tfbip_masonry_show_hide_dp = get_post_meta($id, '_tfbip_masonry_show_hide_dp', true);
	$tfbip_masonry_show_hide_caption = get_post_meta($id, '_tfbip_masonry_show_hide_caption', true);
	$tfbip_select_template = get_post_meta($id, '_tfbip_select_template', true);
	$tfbip_date_posted_lang = get_post_meta($id, '_tfbip_date_posted_lang', true);


	ob_start();

	if($tfbip_select_template == 'tfbip_template1'){
		if($tfbip_select_style == 'vertical'){
	?>

	<style>

		.social-feed-container-<?php echo $id; ?> .pull-left{

		<?php if($tfbip_vertical_show_hide_dp == '1'){echo 'display: none !important;';}?>
		}
		.social-feed-container-<?php echo $id; ?> .pull-right{

		<?php if($tfbip_vertical_show_hide_date == '1'){echo 'display: none !important;';}?>
		}
		.social-feed-container-<?php echo $id; ?> .text-wrapper{

		<?php if($tfbip_vertical_show_hide_caption == '1'){echo 'display: none !important;';}?>
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element .attachment{

		<?php if($tfbip_display_photos_only == '1'){echo 'display: none !important;';}?>
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element.hidden{
			background-color:red !important;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-left{
			float:left;
			margin-right: 10px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-right {
			margin-left: 10px;
			float: right;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element img {
			width: 100%;
			width: auto\9;
			height: auto;
			border: 0;  
			vertical-align: middle;
			-ms-interpolation-mode: bicubic;
			margin-bottom: 0px !important;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .attachment {
			vertical-align: middle;
			-ms-interpolation-mode: bicubic;
		}

		
		.social-feed-container-<?php echo $id; ?> .social-feed-element a {
			color: #0088cc !important;
			text-decoration: none;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element a:focus {
			outline: thin dotted #333 !important;
			outline: 5px auto -webkit-focus-ring-color;
			outline-offset: -2px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element a:hover,
		.social-feed-element a:active {
			outline: 0;
			color: #005580 !important;
			text-decoration: underline;
		}

		/* Text styles */
		.social-feed-container-<?php echo $id; ?> .social-feed-element small {
			font-size: 85%;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element strong {
			font-weight: bold;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element em {
			font-style: italic;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element p {
			margin: 0 0 10px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body > p{
			margin-bottom:4px;
			min-height:20px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text {
			margin: 0;
			overflow: hidden;
			text-overflow: ellipsis;
			-webkit-line-clamp: 5;
			-webkit-box-orient: vertical;
		}

		/* Message styles */
		.social-feed-container-<?php echo $id; ?> .social-feed-element,
		.social-feed-element .media-body {
			overflow: hidden;
			zoom: 1;
			*overflow: visible;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body .social-network-icon{
			margin-top: -3px;
			margin-right:5px;
			width:16px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body div{
			color:#666;
			line-height: 20px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element:first-child {
			margin-top: 0;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-object {
			display: block;
			width:48px;
			border-radius:50%;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-heading {
			margin: 0 0 5px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-list {
			margin-left: 0;
			list-style: none;
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element .muted {
			color: #999;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element a.muted:hover,
		.social-feed-element a.muted:focus {
			color: #808080;
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element{
			box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2);
			transition: 0.25s;
			-webkit-backface-visibility: hidden;
			margin:-1px;
			margin-top:25px !important;
			background-color: #fff;
			color: #333;
			text-align:left;
			font-size: 14px;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			line-height: 16px;
			width: 100% !important;
		}

		.social-feed-container-<?php echo $id; ?> {
			max-width: 500px !important;
			margin: 0 auto;
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element:hover{
			box-shadow: 0 0 20px 0 rgba(10, 10, 10, 0.4);
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element .content{
			padding:15px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .social-network-icon{
			opacity:0.7;
		}


		.social-feed-container-<?php echo $id; ?> .social-feed-element .author-title{
			color: #444;
			line-height: 1.5em;
			font-weight: bold !important;
		}

	</style>
<?php } }
if($tfbip_select_template == 'tfbip_template1'){
		if($tfbip_select_style == 'blog_style'){
	?>
<style>

		.social-feed-container-<?php echo $id; ?> .pull-left{

		<?php if($tfbip_blog_show_hide_dp == '1'){echo 'display: none !important;';}?>
		}
		.social-feed-container-<?php echo $id; ?> .pull-right{

		<?php if($tfbip_blog_show_hide_date == '1'){echo 'display: none !important;';}?>
		}
		.social-feed-container-<?php echo $id; ?> .text-wrapper{

		<?php if($tfbip_blog_show_hide_caption == '1'){echo 'display: none !important;';}?>
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element .attachment{

		<?php if($tfbip_display_photos_only == '1'){echo 'display: none !important;';}?>
		}
		/* Plugin styles */
		.social-feed-container-<?php echo $id; ?> .social-feed-element.hidden{
			background-color:red !important;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-left{
			float:left;
			margin-right: 10px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-right {
			margin-left: 10px;
			float: right;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element img {
			width: 100%;
			width: auto\9;
			height: auto;
			border: 0;  
			vertical-align: middle;
			-ms-interpolation-mode: bicubic;
			margin-bottom: 0px !important;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .attachment {
			vertical-align: middle;
			-ms-interpolation-mode: bicubic;
		}

		/* Link styles */
		.social-feed-container-<?php echo $id; ?> .social-feed-element a {
			color: #0088cc !important;
			text-decoration: none;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element a:focus {
			outline: thin dotted #333 !important;
			outline: 5px auto -webkit-focus-ring-color;
			outline-offset: -2px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element a:hover,
		.social-feed-element a:active {
			outline: 0;
			color: #005580 !important;
			text-decoration: underline;
		}

		/* Text styles */
		.social-feed-container-<?php echo $id; ?> .social-feed-element small {
			font-size: 85%;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element strong {
			font-weight: bold;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element em {
			font-style: italic;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element p {
			margin: 0 0 10px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body > p{
			margin-bottom:4px;
			min-height:20px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text {
			margin: 0;
			overflow: hidden;
			text-overflow: ellipsis;
			-webkit-line-clamp: 5;
			-webkit-box-orient: vertical;
		}

		/* Message styles */
		.social-feed-container-<?php echo $id; ?> .social-feed-element,
		.social-feed-element .media-body {
			overflow: hidden;
			zoom: 1;
			*overflow: visible;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body .social-network-icon{
			margin-top: -3px;
			margin-right:5px;
			width:16px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body div{
			color:#666;
			line-height: 20px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element:first-child {
			margin-top: 0;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-object {
			display: block;
			width:48px;
			border-radius:50%;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-heading {
			margin: 0 0 5px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .media-list {
			margin-left: 0;
			list-style: none;
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element .muted {
			color: #999;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element a.muted:hover,
		.social-feed-element a.muted:focus {
			color: #808080;
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element{
			box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2);
			transition: 0.25s;
			-webkit-backface-visibility: hidden;
			margin:-1px;
			margin-top:25px;
			background-color: #fff;
			color: #333;
			text-align:left;
			font-size: 14px;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			line-height: 16px;
			width: 100% !important;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element:hover{
			box-shadow: 0 0 20px 0 rgba(10, 10, 10, 0.4);
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element .content{
			padding:15px;
		}
		.social-feed-container-<?php echo $id; ?> .social-feed-element .social-network-icon{
			opacity:0.7;
		}


		.social-feed-container-<?php echo $id; ?> .social-feed-element .author-title{
			color: #444;
			line-height: 1.5em;
			font-weight: bold !important;
		}

	</style>

	<?php } } ?>

		<?php

if($tfbip_select_template == 'tfbip_template9'){
		if($tfbip_select_style == 'vertical'){
	?>

	<style>

	.social-feed-container-<?php echo $id; ?> .pull-left{

		<?php if($tfbip_vertical_show_hide_dp == '1'){echo 'display: none !important;';}?>
		}
		.social-feed-container-<?php echo $id; ?> .pull-right{

		<?php if($tfbip_vertical_show_hide_date == '1'){echo 'display: none !important;';}?>
		}
		.social-feed-container-<?php echo $id; ?> .text-wrapper{

		<?php if($tfbip_vertical_show_hide_caption == '1'){echo 'display: none !important;';}?>
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element .attachment{

		<?php if($tfbip_display_photos_only == '1'){echo 'display: none !important;';}?>
		}
		
.social-feed-container-<?php echo $id; ?> .social-feed-element.hidden{
    background-color:red !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-left{
    float:left;
    margin-right: 10px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-right {
    margin-left: 10px;
    float: right;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element img {
    width: 100%;
    width: auto\9;
    height: auto;
    border: 0;  
    vertical-align: middle;
    -ms-interpolation-mode: bicubic;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .attachment {
    vertical-align: middle;
    -ms-interpolation-mode: bicubic;
}

.social-feed-container-<?php echo $id; ?> .social-feed-element a {
    color: #795548 !important;
    text-decoration: none;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element a:focus {
    outline: thin dotted #333;
    outline: 5px auto -webkit-focus-ring-color;
    outline-offset: -2px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element a:hover,
.social-feed-element a:active {
    outline: 0;
    color: #005580;
    text-decoration: underline;
}


.social-feed-container-<?php echo $id; ?> .social-feed-element small {
    font-size: 85%;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element strong {
    font-weight: bold;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element em {
    font-style: italic;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element p {
    margin: 0 0 10px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body > p{
    margin-bottom:4px;
    min-height:20px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text {
    margin: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 5;
    -webkit-box-orient: vertical;
}


.social-feed-container-<?php echo $id; ?> .social-feed-element,
.social-feed-element .media-body {
    overflow: hidden;
    zoom: 1;
    *overflow: visible;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body .social-network-icon{
    margin-top: -3px;
    margin-right:5px;
    width:16px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body div{
    color:#fff;
    line-height: 20px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element:first-child {
    margin-top: 0;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-object {
    display: block;
    width:48px;
    border-radius:50%;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-heading {
    margin: 0 0 5px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-list {
    margin-left: 0;
    list-style: none;
}

.social-feed-container-<?php echo $id; ?> .social-feed-element .muted {
    color: #fff;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element a.muted:hover,
.social-feed-element a.muted:focus {
    color: #808080;
}

.social-feed-container-<?php echo $id; ?> .social-feed-element{
    box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2);
    transition: 0.25s;
    -webkit-backface-visibility: hidden;
    margin-top:25px;
    background-color: #00BCD4 !important;
    color: #333;
    text-align:left;
    font-size: 14px;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    line-height: 16px;
    width: 100% !important;
}

.social-feed-container-<?php echo $id; ?> {
			max-width: 500px !important;
			margin: 0 auto;
		}
.social-feed-container-<?php echo $id; ?> .social-feed-element:hover{
    box-shadow: 0 0 20px 0 rgba(10, 10, 10, 0.4);
}

.social-feed-container-<?php echo $id; ?> .social-feed-element .content{
    padding:15px;
    border: 2px solid #000;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .social-network-icon{
    opacity:0.7;
}


.social-feed-container-<?php echo $id; ?> .social-feed-element .author-title{
    color: #fff;
    line-height: 1.5em;
    font-weight: 500;  
}

	</style>

<?php } }

if($tfbip_select_template == 'tfbip_template9'){
		if($tfbip_select_style == 'blog_style'){
	?>
<style>

.social-feed-container-<?php echo $id; ?> .pull-left{

		<?php if($tfbip_blog_show_hide_dp == '1'){echo 'display: none !important;';}?>
		}
		.social-feed-container-<?php echo $id; ?> .pull-right{

		<?php if($tfbip_blog_show_hide_date == '1'){echo 'display: none !important;';}?>
		}
		.social-feed-container-<?php echo $id; ?> .text-wrapper{

		<?php if($tfbip_blog_show_hide_caption == '1'){echo 'display: none !important;';}?>
		}

		.social-feed-container-<?php echo $id; ?> .social-feed-element .attachment{

		<?php if($tfbip_display_photos_only == '1'){echo 'display: none !important;';}?>
		}
		
.social-feed-container-<?php echo $id; ?> .social-feed-element.hidden{
    background-color:red !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-left{
    float:left;
    margin-right: 10px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-right {
    margin-left: 10px;
    float: right;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element img {
    width: 100%;
    width: auto\9;
    height: auto;
    border: 0;  
    vertical-align: middle;
    -ms-interpolation-mode: bicubic;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .attachment {
    vertical-align: middle;
    -ms-interpolation-mode: bicubic;
}

.social-feed-container-<?php echo $id; ?> .social-feed-element a {
    color: #795548 !important;
    text-decoration: none;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element a:focus {
    outline: thin dotted #333;
    outline: 5px auto -webkit-focus-ring-color;
    outline-offset: -2px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element a:hover,
.social-feed-element a:active {
    outline: 0;
    color: #005580;
    text-decoration: underline;
}


.social-feed-container-<?php echo $id; ?> .social-feed-element small {
    font-size: 85%;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element strong {
    font-weight: bold;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element em {
    font-style: italic;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element p {
    margin: 0 0 10px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body > p{
    margin-bottom:4px;
    min-height:20px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text {
    margin: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 5;
    -webkit-box-orient: vertical;
}


.social-feed-container-<?php echo $id; ?> .social-feed-element,
.social-feed-element .media-body {
    overflow: hidden;
    zoom: 1;
    *overflow: visible;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body .social-network-icon{
    margin-top: -3px;
    margin-right:5px;
    width:16px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body div{
    color:#fff;
    line-height: 20px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element:first-child {
    margin-top: 0;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-object {
    display: block;
    width:48px;
    border-radius:50%;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-heading {
    margin: 0 0 5px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-list {
    margin-left: 0;
    list-style: none;
}

.social-feed-container-<?php echo $id; ?> .social-feed-element .muted {
    color: #fff;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element a.muted:hover,
.social-feed-element a.muted:focus {
    color: #808080;
}

.social-feed-container-<?php echo $id; ?> .social-feed-element{
    box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2);
    transition: 0.25s;
    -webkit-backface-visibility: hidden;
    margin-top:25px;
    background-color: #00BCD4 !important;
    color: #333;
    text-align:left;
    font-size: 14px;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    line-height: 16px;
    width: 100% !important;
}

.social-feed-container-<?php echo $id; ?> .social-feed-element:hover{
    box-shadow: 0 0 20px 0 rgba(10, 10, 10, 0.4);
}

.social-feed-container-<?php echo $id; ?> .social-feed-element .content{
    padding:15px;
    border: 2px solid #000;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .social-network-icon{
    opacity:0.7;
}


.social-feed-container-<?php echo $id; ?> .social-feed-element .author-title{
    color: #fff;
    line-height: 1.5em;
    font-weight: 500;  
}

	</style>
<?php } } ?>
	
	<div id="social-feed-container-<?php echo $id; ?>" class="social-feed-container-<?php echo $id; ?>">
	<div id="tfbip_reload">
	<img style="width: 45px;border-radius: 50%;" src="<?php echo plugins_url('images/reload.gif',__FILE__); ?>"> <br/> Loading...		
	</div>
	</div>
	<script>

	setTimeout(function(){

	var tfbip_query = '<?php echo $tfbip_query; ?>';
	var tfbip_number_of_tweets = '<?php echo $tfbip_number_of_tweets; ?>';
	var tfbip_vertical_show_hide_caption = '<?php echo $tfbip_vertical_show_hide_caption; ?>';
	var tfbip_caption_text_limit_vertical = '<?php echo $tfbip_caption_text_limit_vertical; ?>';
	var tfbip_caption_text_limit_blog = '<?php echo $tfbip_caption_text_limit_blog; ?>';
	var tfbip_caption_text_limit_masonry = '<?php echo $tfbip_caption_text_limit_masonry; ?>';
	var tfbip_date_posted_lang = '<?php echo $tfbip_date_posted_lang; ?>';





		jQuery(document).ready(function(){

			jQuery('.social-feed-container-<?php echo $id; ?>').socialfeed({
				twitter:{
				accounts: [tfbip_query],                     
				limit: tfbip_number_of_tweets,                                  
				consumer_key: 'DDWeMCGG2r1ZPV4rEqmmqbhPq',          
				consumer_secret: 'Ue93hc5ftyPMomjduoMcAZQOMeZWQNTFY8VfrjHNvWeSJ9Un1W'
				},
				<?php if($tfbip_select_style == 'vertical'){ ?>
					length: tfbip_caption_text_limit_vertical
					<?php } ?>
					<?php if($tfbip_select_style == 'blog_style'){ ?>
					length: tfbip_caption_text_limit_blog
					<?php } ?>
					<?php if($tfbip_select_style == 'masonry'){ ?>
					length: tfbip_caption_text_limit_masonry
					<?php } ?> ,
				
				show_media:true,
		
				<?php  if($tfbip_select_template == 'tfbip_template1'){ ?>
				template_html: '<div class="social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{{=it.id}}"> <div class="content"> <a class="pull-left" href="{{=it.author_link}}" target="_blank"> <img class="media-object" src="{{=it.author_picture}}"> </a> <div class="media-body"> <p> <i class="fa fa-{{=it.social_network}}"></i> <span class="author-title">{{=it.author_name}}</span> <span class="muted pull-right"> {{=it.time_ago}}</span> </p> <div class="text-wrapper"> <p class="social-feed-text">{{=it.text}} <a href="{{=it.link}}" target="_blank" class="read-button">read more</a></p> </div> </div> </div> {{=it.attachment}} </div> '
				<?php } ?>
				<?php  if($tfbip_select_template == 'tfbip_template9'){ ?>
				template_html: '<div class="social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{{=it.id}}"> <div class="content"> <a class="pull-left" href="{{=it.author_link}}" target="_blank"> <img class="media-object" src="{{=it.author_picture}}"> </a> <div class="media-body"> <p> <i class="fa fa-{{=it.social_network}}"></i> <span class="author-title">{{=it.author_name}}</span> <span class="muted pull-right"> {{=it.time_ago}}</span> </p> <div class="text-wrapper"> <p class="social-feed-text">{{=it.text}} <a href="{{=it.link}}" target="_blank" class="read-button">read more</a></p> </div> </div> </div> {{=it.attachment}} </div> '
				<?php } ?> ,
				
				date_format: "ll",
				date_locale: tfbip_date_posted_lang

				});
		});
			console.log(moment.locale(tfbip_date_posted_lang));

	jQuery('#tfbip_reload').remove();}, 500);
	</script>


	<?php

	return ob_get_clean();

	 } ?>