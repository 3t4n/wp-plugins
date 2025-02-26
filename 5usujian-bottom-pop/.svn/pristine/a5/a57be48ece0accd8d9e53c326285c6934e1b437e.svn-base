<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function wysj_btpop_write_js(){
	$wyBtpopOptions = get_option("wysj_bt_pop_options");
	$label =  $wyBtpopOptions['formLabel'];
	$name =  $wyBtpopOptions['formName'];
	$type =  $wyBtpopOptions['formType'];
	$content =  $wyBtpopOptions['formContent'];
	$width =  $wyBtpopOptions['formWidth'];
	$required =  $wyBtpopOptions['required'];
	$wysj_btpop_jsfile = fopen(WYSJ_POP_UPLOADS_DIR."/5usujian-bottom-pop-custom.js", "w") or die("无法读取/写入文件，请确保文件/wp-content/uploads/5usujian-bottom-pop/5usujian-bottom-pop-custom.js有写入权限！");
	$wysj_btpop_js = "";

	$isClose = "";
	$wysj_btpop_js .= '
		jQuery(function() {
			jQuery(".wysj-bp-content").css("height", jQuery(".wysj-bp-content").height())'.$isClose.';
			jQuery(".wysj-bp-close").on("click", function(event) {
				if (jQuery(this).hasClass("wysj-bp-status-close")) {
					jQuery(this).removeClass("wysj-bp-status-close");
					jQuery(".wysj-bp-content").removeClass("wysj-bp-status-close");
				}else{
					jQuery(this).addClass("wysj-bp-status-close");
					jQuery(".wysj-bp-content").addClass("wysj-bp-status-close");
				}
			});';
	$wysj_btpop_js .= '
		});
	';

	fwrite($wysj_btpop_jsfile, $wysj_btpop_js);
	fclose($wysj_btpop_jsfile);
}

?>