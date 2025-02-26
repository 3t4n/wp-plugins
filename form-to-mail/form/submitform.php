<?php
add_action('wp_ajax_ftm_form_submit', 'ftm_form_submit');
add_action('wp_ajax_nopriv_ftm_form_submit', 'ftm_form_submit');
function ftm_form_submit() {
	$form_submit = new ftmSubmit();
	$form_submit->postform();
}