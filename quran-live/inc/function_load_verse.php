<?php
function qtm_quranlive_load(){
		$lang = sanitize_text_field($_POST['lang']);
		$cheikh = sanitize_text_field($_POST['cheikh']);
	echo Render_Quran_Live::load_sura_quran_live($sura=null, $lang, $cheikh);
	die();
}
function qtm_changelivesura(){
	if($_POST['sura']){
		$sura = sanitize_text_field($_POST['sura']);
		$lang = sanitize_text_field($_POST['lang']);
		$cheikh = sanitize_text_field($_POST['cheikh']);

		echo Render_Quran_Live::load_sura_quran_live($sura,$lang, $cheikh);		
	}
	die();
}
?>