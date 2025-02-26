<?php
function wysj_btpop_write_css(){
	$wyBtpopOptions = get_option("wysj_bt_pop_options");
	$wysj_btpop_cssfile = fopen(WYSJ_POP_UPLOADS_DIR."/5usujian-bottom-pop-custom.css", "w") or die("无法读取/写入文件，请确保文件/wp-content/uploads/5usujian-bottom-pop/5usujian-bottom-pop-custom.css有写入权限！");
	$wysj_btpop_style = "";
	$wysj_btpop_style .= "#wysj-bottom-pop .wysj-bp-close{";
	$wysj_btpop_style .= "background-image:url(".$wyBtpopOptions['closeimg'].");";
	$wysj_btpop_style .= "}";

	if ( isset($wyBtpopOptions['modelimg']) && $wyBtpopOptions['modelimg'] != '') {
		$wysj_btpop_style .= "#wysj-bottom-pop{";
		$wysj_btpop_style .= "background:url(".$wyBtpopOptions['modelimg'].") left top repeat; background-color:none;";
		$wysj_btpop_style .= "}";
	}
	if ( isset($wyBtpopOptions['adimgOut']) && $wyBtpopOptions['adimgOut'] != '') {
		$wysj_btpop_style .= "#wysj-bottom-pop{";
		$wysj_btpop_style .= "bottom:-".$wyBtpopOptions['adimgOut']."px;";
		$wysj_btpop_style .= "}";
		$wysj_btpop_style .= "#wysj-bottom-pop .wysj-bp-wrap{";
		$wysj_btpop_style .= "top:-".$wyBtpopOptions['adimgOut']."px;";
		$wysj_btpop_style .= "}";
	}

	if ( isset($wyBtpopOptions['contentWidth']) && $wyBtpopOptions['contentWidth'] != '') {
		$wysj_btpop_style .= "#wysj-bottom-pop .wysj-bp-wrap{";
		$wysj_btpop_style .= "width:".$wyBtpopOptions['contentWidth']."px;";
		$wysj_btpop_style .= "}";
	}
	if ( isset($wyBtpopOptions['mobile']) && $wyBtpopOptions['mobile'] == 'disable'){
		$wysj_btpop_style .= "@media screen and (max-width: 451px){";
		$wysj_btpop_style .= "#wysj-bottom-pop{display:none;}";
		$wysj_btpop_style .= "}";
	}
	if ( isset($wyBtpopOptions['submitBgColor']) && $wyBtpopOptions['submitBgColor'] != ''){
		$wysj_btpop_style .= "#wysj-bottom-pop .wysj-bp-button{";
		$wysj_btpop_style .= "background-color:".$wyBtpopOptions['submitBgColor'].";";
		$wysj_btpop_style .= "color:".$wyBtpopOptions['submitFontColor']." !important;";

		$wysj_btpop_style .= "}";
	}
	if ( isset($wyBtpopOptions['repair']) && $wyBtpopOptions['repair'] != ''){
		$wysj_btpop_style .= "body{";
		$wysj_btpop_style .= "padding-bottom:".$wyBtpopOptions['repair']."px !important;";
		$wysj_btpop_style .= "}";
	}
	//嵌入式
	if( isset($wyBtpopOptions['type']) && $wyBtpopOptions['type'] == 'inside' ){
		$wysj_btpop_style .= "#wysj-bottom-pop, #wysj-bottom-pop .wysj-bp-content{background-color:transparent;}";
		
	}
	fwrite($wysj_btpop_cssfile, $wysj_btpop_style);
	fclose($wysj_btpop_cssfile);
}

?>