<?php
function pxslider_update() { 
	$pxsxml_url = 'http://www.sketchthemes.com/sketch-updates/plugin-updates/px-slider-lite/px-slider-lite.xml';
	$pxsxml_txt = @simplexml_load_file($pxsxml_url);
	if($pxsxml_txt){
		$pxsxml_version = $pxsxml_txt->pxslider[0]->version;
		$pxsxml_htmldata = $pxsxml_txt->pxslider[0]->htmldata;
		$pxs_cur_version = pxs_get_version();
		?><?php if($pxsxml_htmldata){echo $pxsxml_htmldata;} ?><?php
	}
}
?>