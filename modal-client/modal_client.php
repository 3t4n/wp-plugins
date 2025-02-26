<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
	**Plugin Name: Modal Client
	**Description: Plugin para editar e inserir o modal para o cliente
	**Author: The Big Boss
	**Version: 1.1.0
*/

function modal_client_buttonShortCode(){
	$shortCode = '
	<input type="submit" value="'.esc_html(get_option("CTA_text")).'" class="btn secondary fluid contact-client">

	<div class="modal-client-container" data-modal="modal_1" style="display: none;">
		<div class="modal-client-header">
			<img src="'.esc_url(get_option("logo_url")).'">
			<div class="modal-client-header-title">
				<h3>'.esc_html(get_option("title-modal_1")).'</h3>
			</div>
			<a href="">X</a>
		</div>
		<div class="clear"></div>
		<div class="modal-client-content">
			<p>
				'.nl2br(esc_html(get_option("content-modal_1"))).'
			</p>
		</div>
		<div class="modal-client-options">
			<div class="modal-client-single-option">
				<a id="textlink1-modal_1" href="">'.esc_html(get_option("textlink1-modal_1")).'</a>
			</div>
			<div class="modal-client-single-option">
				<a id="textlink2-modal_1" href="">'.esc_html(get_option("textlink2-modal_1")).'</a>
			</div>
			<div class="modal-client-single-option">
				<a id="textlink3-modal_1" href="">'.esc_html(get_option("textlink3-modal_1")).'</a>
			</div>
		</div>
	</div>

	<div class="modal-client-container" data-modal="modal_2" style="display: none;">

		<div class="modal-client-header">
			<img src="'.esc_url(get_option("logo_url")).'">
			<div class="modal-client-header-title">
				<h3>'.esc_html(get_option("title-modal_2")).'</h3>
			</div>
			<a href="">X</a>
		</div>
		<div class="clear"></div>

		<div class="modal-client-options-2">
			<div class="modal-client-single-option">
				<a href="'.esc_url(get_option("link1-modal_2")).'">'.esc_html(get_option("textlink1-modal_2")).'</a>
			</div>
			<div class="modal-client-single-option">
				<a href="'.esc_url(get_option("link2-modal_2")).'">'.esc_html(get_option("textlink2-modal_2")).'</a>
			</div>
			<div class="modal-client-single-option">
				<a href="'.esc_url(get_option("link3-modal_2")).'">'.esc_html(get_option("textlink3-modal_2")).'</a>
			</div>
			<div class="modal-client-single-option">
				<a href="'.esc_url(get_option("link4-modal_2")).'">'.esc_html(get_option("textlink4-modal_2")).'</a>
			</div>
		</div>

		<div class="modal-client-content">
			<p>
				'.nl2br(esc_html(get_option("content-modal_2"))).'
			</p>
		</div>

	</div>

	<div class="modal-client-container" data-modal="modal_3" style="display: none;">

		<div class="modal-client-header">
			<img src="'.esc_url(get_option("logo_url")).'">
			<div class="modal-client-header-title">
				<h3>'.esc_html(get_option("title-modal_3")).'</h3>
			</div>
			<a href="">X</a>
		</div>
		<div class="clear"></div>

		<div class="modal-client-options">
			<div class="modal-client-single-option">
				<a href="'.esc_url(get_option("link1-modal_3")).'">'.esc_html(get_option("textlink1-modal_3")).'</a>
			</div>
			<div class="modal-client-single-option">
				<a href="'.esc_url(get_option("link2-modal_3")).'">'.esc_html(get_option("textlink2-modal_3")).'</a>
			</div>
			<div class="modal-client-single-option">
				<a href="'.esc_url(get_option("link3-modal_3")).'">'.esc_html(get_option("textlink3-modal_3")).'</a>
			</div>
		</div>

		<div class="modal-client-content">
			<p>
				'.nl2br(esc_html(get_option("content-modal_3"))).'
			</p>
		</div>
		<div class="clear"></div>

	</div>

	<div class="modal-client-container" data-modal="modal_4" style="display: none;">

		<div class="modal-client-header">

			<img src="'.esc_url(get_option("logo_url")).'">
			<div class="modal-client-header-title">
				<h3>'.esc_html(get_option("title-modal_4")).'</h3>
			</div>
			<a href="">X</a>
		</div>
		<div class="clear"></div>

		<div class="modal-client-content">
			<p>
				'.nl2br(esc_html(get_option("content-modal_4"))).'
			</p>
		</div>

		<div class="modal-client-options-3">
			<div class="modal-client-single-select-option">
				<input type="radio" name="Option">
				<p>'.esc_html(get_option("textOption1-modal_4")).'</p>
			</div>
			<div class="modal-client-single-select-option">
				<input type="radio" name="Option">
				<p>'.esc_html(get_option("textOption2-modal_4")).'</p>
			</div>
			<div class="modal-client-single-select-option">
				<input type="radio" name="Option">
				<p>'.esc_html(get_option("textOption3-modal_4")).'</p>
			</div>
			<div class="modal-client-single-select-option">
				<input type="radio" name="Option">
				<p>'.esc_html(get_option("textOption4-modal_4")).'</p>
			</div>
			<div class="modal-client-button">
				<a id="textlink1-modal_4" href="">'.esc_html(get_option("textlink1-modal_4")).'</a>
			</div>
			<div class="clear"></div>
		</div>

	</div>

	<div class="modal-client-container" data-modal="modal_5" style="display: none;">

		<div class="modal-client-header">
			<img src="'.esc_url(get_option("logo_url")).'">
			<div class="modal-client-header-title">
				<h3>'.esc_html(get_option("title-modal_5")).'</h3>
			</div>
			<a href="">X</a>
		</div>
		<div class="clear"></div>

		<div class="modal-client-content">
			<p>
				'.nl2br(esc_html(get_option("content1-modal_5"))).'
			</p>
		</div>

		<div class="modal-client-options-4">
			<div class="modal-client-single-option">
				<a href="'.esc_url(get_option("link1-modal_5")).'">'.esc_html(get_option("textlink1-modal_5")).'</a>
			</div>
			<div class="modal-client-single-option">
				<a href="'.esc_url(get_option("link2-modal_5")).'">'.esc_html(get_option("textlink2-modal_5")).'</a>
			</div>
		</div>

		<div class="modal-client-content">
			<p>
				'.nl2br(esc_html(get_option("content2-modal_5"))).'
			</p>
		</div>

	</div>

	<style type="text/css">
		.modal-client-container{
			padding: 15px;
			background-color: #f2f3f5;
			border-radius: 10px;
			width: 450px;
			font-family: Arial;
			position: fixed;
			transform: translate(-50%, -50%);
			z-index: 10;
			top: 50%;
			left: 50%;
		}

		.modal-client-header {
			display: flex;
			width: 100%;
			margin-bottom: 10px;
		}

		.modal-client-header img{
			max-width: 100%;
		}

		.modal-client-header-title{
			text-align: center;
			width: 80%;
		}

		.modal-client-header h3{
			font-size: 14px;
			color: #dd4237;
		}

		.modal-client-header a{
			color: #dbdadb;
			text-decoration: none;
			text-align: right;
			width: 10%;
			font-size: 16px;
		}

		.modal-client-content{
			margin-bottom: 13px;
		}

		.modal-client-content p{
			font-size: 13px;
			line-height: 16px;
			text-align: justify;
		}

		.modal-client-options, .modal-client-options-2{
			display: flex;
			flex-wrap: nowrap;
			margin-bottom: 13px;
		}

		.modal-client-options-3 {
			display: block;
		}

		.modal-client-single-option {
			width: 150px;
			background-color: #ffbc4a;
			padding: 10px;
			text-align: center;
			border-radius: 8px;
			margin-right: 10px;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

		.modal-client-options-2 .modal-client-single-option {
			width: 100px;
			padding: 5px;
		}

		.modal-client-options-4 {
			display: flex;
			padding: 0 40px;
			margin-bottom: 13px;
		}

		.modal-client-single-option a{
			text-decoration: none;
			color: #000;
			font-size: 13px;
			line-height: initial;
		}

		.modal-client-single-select-option {
			display: inline-flex;
			width: 100%;
			margin-bottom: 10px;
		}

		.modal-client-single-select-option p {
			margin: 0;
			margin-left: 10px;
			font-size: 12px;
		}

		.modal-client-single-select-option input[type="radio"] {
			height: 15px;
			width: 15px;
			border: 1px solid #000;
		}

		.modal-client-button{
			width: 150px;
			text-align: center;
			padding: 10px;
			border-radius: 8px; 
			background-color: #ffbc4a;
			float: right
		}

		.modal-client-button a{
			text-decoration: none;
			color: #000;
			font-size: 13px;
		}

		@media screen and (max-width: 768px){
			.modal-client-container { width: 300px; }
			.modal-client-options, .modal-client-options-2, .modal-client-options-4 { flex-wrap: wrap; display: block; padding: 0; }
			.modal-client-single-option { margin: 0 auto; width: 100%!important; margin-bottom: 10px; }
			.modal-client-options-2 .modal-client-single-option { padding: 10px; }
			.modal-client-button { width: 100%; margin-top: 10px; }
		}

		@media screen and (max-width: 425px){
			.modal-client-header img{
				max-width: 100%!important;
				width: auto;
			}
		}
	</style>

	<script type="text/javascript">

		document.querySelectorAll(".modal-client-header a").forEach(item => {
		  	item.addEventListener("click", event => {
		   		event.preventDefault();
				document.querySelectorAll(".modal-client-container").forEach(item => {
					item.style.display = "none";
				});
		  	});
		});

		document.querySelector(".contact-client").addEventListener("click", function(){
			document.querySelector("[data-modal=\'modal_1\']").style.display = "block";
		});

		document.querySelector("#textlink1-modal_1").addEventListener("click", function(event){
			event.preventDefault();

			document.querySelector("[data-modal=\'modal_1\']").style.display = "none";
			document.querySelector("[data-modal=\'modal_2\']").style.display = "block";
		});

		document.querySelector("#textlink2-modal_1").addEventListener("click", function(event){
			event.preventDefault();

			document.querySelector("[data-modal=\'modal_1\']").style.display = "none";
			document.querySelector("[data-modal=\'modal_3\']").style.display = "block";
		});

		document.querySelector("#textlink3-modal_1").addEventListener("click", function(event){
			event.preventDefault();

			document.querySelector("[data-modal=\'modal_1\']").style.display = "none";
			document.querySelector("[data-modal=\'modal_4\']").style.display = "block";
		});

		document.querySelector("#textlink1-modal_4").addEventListener("click", function(event){
			event.preventDefault();

			document.querySelector("[data-modal=\'modal_4\']").style.display = "none";
			document.querySelector("[data-modal=\'modal_5\']").style.display = "block";
		});

	</script>
	';
	return $shortCode;
}

add_shortcode('modal-client', 'modal_client_buttonShortCode');

function modal_client_addToMenu(){
	add_menu_page('Modal Client','Modal Client','manage_options','modal-client','modal_client_code_page', '', 200);
}

add_action('admin_menu', 'modal_client_addToMenu');

function modal_client_code_page(){

	if(array_key_exists('ctaText', $_POST)){
		$CTA_text = sanitize_text_field($_POST['CTA_text']);
		update_option('CTA_text', $CTA_text);
	}

	if(array_key_exists('logoURL', $_POST)){
		$logo_url = esc_url_raw($_POST['logo_url']);
		update_option('logo_url', $logo_url);
	}

	if(array_key_exists('modal_1', $_POST)){
		$title_modal_1 = sanitize_text_field($_POST['title-modal_1']);
		$content_modal_1 = sanitize_textarea_field($_POST['content-modal_1']);
		$textlink1_modal_1 = sanitize_text_field($_POST['textlink1-modal_1']);
		$textlink2_modal_1 = sanitize_text_field($_POST['textlink2-modal_1']);
		$textlink3_modal_1 = sanitize_text_field($_POST['textlink3-modal_1']);

		update_option('title-modal_1', $title_modal_1);
		update_option('content-modal_1', $content_modal_1);
		update_option('textlink1-modal_1', $textlink1_modal_1);
		update_option('textlink2-modal_1', $textlink2_modal_1);
		update_option('textlink3-modal_1', $textlink3_modal_1);
	}

	if(array_key_exists('modal_2', $_POST)){
		$title_modal_2 = sanitize_text_field($_POST['title-modal_2']);
		$content_modal_2 = sanitize_textarea_field($_POST['content-modal_2']);
		$textlink1_modal_2 = sanitize_text_field($_POST['textlink1-modal_2']);
		$textlink2_modal_2 = sanitize_text_field($_POST['textlink2-modal_2']);
		$textlink3_modal_2 = sanitize_text_field($_POST['textlink3-modal_2']);
		$textlink4_modal_2 = sanitize_text_field($_POST['textlink4-modal_2']);
		$link1_modal_2 = esc_url_raw($_POST['link1-modal_2']);
		$link2_modal_2 = esc_url_raw($_POST['link2-modal_2']);
		$link3_modal_2 = esc_url_raw($_POST['link3-modal_2']);
		$link4_modal_2 = esc_url_raw($_POST['link4-modal_2']);

		update_option('title-modal_2', $title_modal_2);
		update_option('content-modal_2', $content_modal_2 );
		update_option('textlink1-modal_2', $textlink1_modal_2);
		update_option('textlink2-modal_2', $textlink2_modal_2);
		update_option('textlink3-modal_2', $textlink3_modal_2);
		update_option('textlink4-modal_2', $textlink4_modal_2);
		update_option('link1-modal_2', $link1_modal_2);
		update_option('link2-modal_2', $link2_modal_2);
		update_option('link3-modal_2', $link3_modal_2);
		update_option('link4-modal_2', $link4_modal_2);
	}

	if(array_key_exists('modal_3', $_POST)){
		$title_modal_3 = sanitize_text_field($_POST['title-modal_3']);
		$content_modal_3 = sanitize_textarea_field($_POST['content-modal_3']);
		$textlink1_modal_3 = sanitize_text_field($_POST['textlink1-modal_3']);
		$textlink2_modal_3 = sanitize_text_field($_POST['textlink2-modal_3']);
		$textlink3_modal_3 = sanitize_text_field($_POST['textlink3-modal_3']);
		$link1_modal_3 = esc_url_raw($_POST['link1-modal_3']);
		$link2_modal_3 = esc_url_raw($_POST['link2-modal_3']);
		$link3_modal_3 = esc_url_raw($_POST['link3-modal_3']);

		update_option('title-modal_3', $title_modal_3);
		update_option('content-modal_3', $content_modal_3);
		update_option('textlink1-modal_3', $textlink1_modal_3);
		update_option('textlink2-modal_3', $textlink2_modal_3);
		update_option('textlink3-modal_3', $textlink3_modal_3);
		update_option('link1-modal_3', $link1_modal_3);
		update_option('link2-modal_3', $link2_modal_3);
		update_option('link3-modal_3', $link3_modal_3);
	}

	if(array_key_exists('modal_4', $_POST)){
		$title_modal_4 = sanitize_text_field($_POST['title-modal_4']);
		$content_modal_4 = sanitize_textarea_field($_POST['content-modal_4']);
		$textOption1_modal_4 = sanitize_text_field($_POST['textOption1-modal_4']);
		$textOption2_modal_4 = sanitize_text_field($_POST['textOption2-modal_4']);
		$textOption3_modal_4 = sanitize_text_field($_POST['textOption3-modal_4']);
		$textOption4_modal_4 = sanitize_text_field($_POST['textOption4-modal_4']);
		$textlink1_modal_4 = sanitize_text_field($_POST['textlink1-modal_4']);

		update_option('title-modal_4', $title_modal_4);
		update_option('content-modal_4', $content_modal_4);
		update_option('textOption1-modal_4', $textOption1_modal_4);
		update_option('textOption2-modal_4', $textOption2_modal_4);
		update_option('textOption3-modal_4', $textOption3_modal_4);
		update_option('textOption4-modal_4', $textOption4_modal_4);
		update_option('textlink1-modal_4', $textlink1_modal_4);
	}

	if(array_key_exists('modal_5', $_POST)){
		$title_modal_5 = sanitize_text_field($_POST['title-modal_5']);
		$content1_modal_5 = sanitize_textarea_field($_POST['content1-modal_5']);
		$content2_modal_5 = sanitize_textarea_field($_POST['content2-modal_5']);
		$textlink1_modal_5 = sanitize_text_field($_POST['textlink1-modal_5']);
		$textlink2_modal_5 = sanitize_text_field($_POST['textlink2-modal_5']);
		$link1_modal_5 = esc_url_raw($_POST['link1-modal_5']);
		$link2_modal_5 = esc_url_raw($_POST['link2-modal_5']);

		update_option('title-modal_5', $title_modal_5);
		update_option('content1-modal_5', $content1_modal_5);
		update_option('content2-modal_5', $content2_modal_5);
		update_option('textlink1-modal_5', $textlink1_modal_5);
		update_option('textlink2-modal_5', $textlink2_modal_5);
		update_option('link1-modal_5', $link1_modal_5);
		update_option('link2-modal_5', $link2_modal_5);
	}

	include_once 'modal_client_page.php';
	
}

?>