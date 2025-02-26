<?php
while(!is_file('wp-load.php')){
  if(is_dir('../')){ chdir('../'); }
  else die('Could not find wp-load.php.');
}
require_once('wp-load.php');
// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') )
	wp_die(__("You are not allowed to be here"));
global $wpdb;
?>
<!DOCTYPE html>
<html>
<head>
<title>Fanpage Connect Shortcodes</title>
<script src="//code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!--<script type="text/javascript" src="<?php echo includes_url('js/jquery/ui/jquery.ui.datepicker.min.js'); ?>"></script>-->
<script type="text/javascript" src="<?php echo FPC_PLUGIN_URL; ?>/js/colpick.js"></script>
<link rel="stylesheet" href="<?php echo FPC_PLUGIN_URL; ?>/css/colpick.css">
<link rel='stylesheet' href='<?php echo FPC_SITE_URL; ?>/wp-admin/load-styles.php?c=1&amp;dir=ltr&amp;load=buttons,wp-admin&amp;ver=3.6.1'>
<link href="" rel="stylesheet" type="text/css" id="googleFontStyle">

<script language="javascript" type="text/javascript">
function insertText(fpcTxt){
	if(parent.tinyMCE) {
		parent.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, fpcTxt);
		parent.eval('tb_remove()');
	}
	return;
}

function insertImg(img){
	if(parent.tinyMCE) {
		parent.tinyMCE.execInstanceCommand('content', 'mceInsertRawHTML', false, img);
		parent.eval('tb_remove()');
	}
	return;
}

function teaser(){
	msg  = 'Sorry, this feature is only available in\n';
	msg += 'Fanpage Connect Pro.\n\n';
	msg += 'Visit www.FanpageConnect.com/pro\n';
	msg += 'for more details on how to unlock\n';
	msg += 'these powerful marketing features!';
	alert(msg);
}

jQuery(document).ready(function(){

	jQuery('#category-selector').on('change',function(){
		jQuery('.option-panel.shown').removeClass('shown').hide();
		jQuery('#'+jQuery(this).val()).fadeIn().addClass('shown');
	});

	jQuery('#karmaID, #uniqueID').on('keyup keydown keypress focus blur',function(){
		$this = jQuery(this);
		startVal = $this.val().toLowerCase().replace(/[^0-9a-zA-Z-_ ]+/g, "");
		firstChar = startVal.charCodeAt(0);
		if(firstChar >= 48 && firstChar <= 57){
			startVal = startVal.substring(1);
		}
		$this.val(startVal.replace(/[^0-9a-zA-Z-_]+/g, "-"));
	});

	jQuery("#fontStyle").change(function(){
		theList = jQuery("#"+jQuery(this).val());
		jQuery("#fontName").html('<option selected="selected"></option>' + theList.html());
	});

	// fill font size selector
	fontSizeSel = jQuery("#fontSizeNum");
	fontLHSel = jQuery("#fontLHNum");
	for(i=8; i < 71; i++){
		fontSizeSel.append("<option>" + i + "</option>");
		fontLHSel.append("<option>" + i + "</option>");
	}

	// fill the numDays select
	for(i=1; i < 91; i++){
		jQuery("#numDays").append("<option>" + i + "</option>");
	}

	// set up events and color picker
	jQuery("#fontText, #fontSizeEm, #fontLHEm").on('focus blur change keyup',function(){
		setGoogleFont();
	});

	jQuery("#fontName, #fontSizeNum, #fontLHNum").on('focus blur change', function(){
		setGoogleFont();
	});

	jQuery('#colorpicker').colpick({
		flat:true,
		layout: 'rgbhex',
		submit:0,
		colorScheme:'dark',
		livePreview: true,
		color: '000000',
		onChange:function(hsb,hex,rgb,fromSetColor) {
			jQuery("#fontColor").val('#'+hex);
			setGoogleFont();
		}
	});

	jQuery('#fbTwAColor').colpick({
		submit: 0,
		layout:'hex',
		colorScheme:'dark',
		onChange:function(hsb,hex,rgb,fromSetColor) {
			jQuery("#fbTwAColor").val(hex);
		},
		onShow:function(cp){
			thePicker = jQuery('#'+cp.id);
			elPos = jQuery('#fbTwAColor').offset();
			elH = jQuery('#fbTwAColor').outerHeight();
			elW = jQuery('#fbTwAColor').outerWidth();
			pickT = elPos.top+elH-thePicker.outerHeight();
			pickL = elPos.left+elW
			thePicker.css({top: pickT, left: pickL});
		}
	}).keyup(function(){
		jQuery(this).colpickSetColor(this.value);
	});
	jQuery('#fbTwBColor').colpick({
		submit: 0,
		layout:'hex',
		colorScheme:'dark',
		onChange:function(hsb,hex,rgb,fromSetColor) {
			jQuery("#fbTwBColor").val(hex);
		},
		onShow:function(cp){
			thePicker = jQuery('#'+cp.id);
			elPos = jQuery('#fbTwBColor').offset();
			elH = jQuery('#fbTwBColor').outerHeight();
			elW = jQuery('#fbTwBColor').outerWidth();
			pickT = elPos.top+elH-thePicker.outerHeight();
			pickL = elPos.left+elW
			thePicker.css({top: pickT, left: pickL});
		}
	}).keyup(function(){
		jQuery(this).colpickSetColor(this.value);
	});

	// QR Code functionality
	jQuery('#qr-type').on('change',function(){
		jQuery('.qr.shown').removeClass('shown').hide();
		jQuery('#'+jQuery(this).val()).fadeIn().addClass('shown');
		renderQR();
	});

	jQuery('.qr input[type=tel]').on('keyup keydown keypress focus blur',function(){
		$this = jQuery(this);
		$thisVal = $this.val();
		$thisVal = $thisVal.replace(/[^0-9-+ \(\)]+/g, "");
		$this.val($thisVal);
	});

	jQuery('.qr input, .qr textarea, #qr-size-custom').on('onchange keyup keydown keypress focus blur',function(){
		renderQR();
	});

	jQuery('#qr-size').on('click mouseup mousedown onchange focus blur',function(){
		renderQR();
	});

});

// render the QR code
var qrData = '';
var qrType = '';
function renderQR(){
	qrURL  = '//chart.apis.google.com/chart?cht=qr&chld=M|1&chs=';
	qrParm = '&chl=';
	qrCustom = jQuery('#qr-size-custom').val();
	qrType = jQuery('#qr-type').val();

	if(Number(qrCustom) && qrCustom >= 50 && qrCustom <= 500){
		qrSize = qrCustom+'x'+qrCustom;
	} else{
		qrSize = jQuery('#qr-size').val();
	}
	switch(qrType){
		case 'qrtweet':
			if(jQuery.trim(jQuery('#qr-tweet').val()) != ''){
				//qrData  = 'http://twitter.com/home?status=';
				//qrData  = 'https://mobile.twitter.com/home?status=';
				//qrData += encodeURIComponent(jQuery.trim(jQuery('#qr-tweet').val()));
			}
			break;
		case 'qrtweetshare':
			if(jQuery.trim(jQuery('#qr-tweettxt').val()) != ''){
				qrData  = 'http://twitter.com/share?text=';
				qrData += encodeURIComponent(jQuery.trim(jQuery('#qr-tweettxt').val()));
				qrData += '&url=';
				qrData += encodeURIComponent(jQuery.trim(jQuery('#qr-tweetlnk').val()));
			}
			break;
		case 'qrfbshare':
			if(jQuery.trim(jQuery('#qr-fbsharelnk').val()) != ''){
				qrData  = 'http://facebook.com/sharer.php';
				/*
				qrData += '?s=100&p[title]=';
				qrData += encodeURIComponent(jQuery.trim(jQuery('#qr-fbsharetitle').val()));
				qrData += '&p[summary]=';
				qrData += encodeURIComponent(jQuery.trim(jQuery('#qr-fbsharesum').val()));
				qrData += '&p[url]=';
				*/
				qrData += '?u=';
				qrData += encodeURIComponent(jQuery.trim(jQuery('#qr-fbsharelnk').val()));
			}
			break;
		case 'qrtext':
			qrData = jQuery.trim(jQuery('#qr-text').val());
			break;
		case 'qremail':
			qrData = (jQuery.trim(jQuery('#qr-email').val()) != '')? 'mailto:'+jQuery.trim(jQuery('#qr-email').val()) : '';
			break;
		case 'qrphone':
			qrData = (jQuery.trim(jQuery('#qr-phone').val()) != '')? 'tel:'+jQuery.trim(jQuery('#qr-phone').val()) : '';
			break;
		case 'qrurl':
			qrData = jQuery.trim(jQuery('#qr-url').val());
			break;
		case 'qrsms':
			if(jQuery.trim(jQuery('#qr-sms-phone').val()) == '' && jQuery.trim(jQuery('#qr-sms-txt').val()) == ''){
				qrData = '';
			} else {
				qrData = 'SMSTO:';
				qrData += jQuery.trim(jQuery('#qr-sms-phone').val());
				qrData += ':';
				qrData += jQuery.trim(jQuery('#qr-sms-text').val());
			}
			break;
		case 'qrcontact':
			qrData  = 'BEGIN:VCARD\nVERSION:3.0\n';
			if(jQuery('#qr-clname').val() != '' || jQuery('#qr-cfname').val() != ''){
				qrData += 'N:'+jQuery('#qr-clname').val()+';'+jQuery('#qr-cfname').val()+'\n';
			}
			qrData += (jQuery('#qr-corg').val() != '')? 'ORG:'+jQuery('#qr-corg').val()+'\n' : '';
			qrData += (jQuery('#qr-ctitle').val() != '')? 'TITLE:'+jQuery('#qr-ctitle').val()+'\n' : '';
			qrData += (jQuery('#qr-ccell').val() != '')? 'TEL;TYPE=CELL:'+jQuery('#qr-ccell').val()+'\n' : '';
			qrData += (jQuery('#qr-cphone').val() != '')? 'TEL:'+jQuery('#qr-cphone').val()+'\n' : '';
			qrData += (jQuery('#qr-cfax').val() != '')? 'TEL;TYPE=FAX:'+jQuery('#qr-cfax').val()+'\n' : '';
			qrData += (jQuery('#qr-cemail').val() != '')? 'EMAIL;TYPE=INTERNET:'+jQuery('#qr-cemail').val()+'\n' : '';
			qrData += (jQuery('#qr-curl').val() != '')? 'URL:'+jQuery('#qr-curl').val()+'\n' : '';
			if(
				jQuery('#qr-caddr').val() != '' || jQuery('#qr-ccity').val() != '' ||
				jQuery('#qr-cstate').val() != '' || jQuery('#qr-czip').val() != '' ||
				jQuery('#qr-ccountry').val()
				){
				qrData += 'ADR:;;'+jQuery('#qr-caddr').val()+';'+jQuery('#qr-ccity').val()+';';
				qrData += jQuery('#qr-cstate').val()+';'+jQuery('#qr-czip').val()+';'+jQuery('#qr-ccountry').val()+'\n';
			}
			qrData += 'END:VCARD';
			break;
	}
	if(qrData && qrData.length > 0){
		qrCodeImg = qrURL+qrSize+qrParm+encodeURIComponent(qrData);
		jQuery('#qr-img').attr('src',qrCodeImg);
	} else {
		jQuery('#qr-img').removeAttr('src');
	}
}

// handle the real time preview of the font
function setGoogleFont(){
	fontName = '';
	if(jQuery('#fontName :selected').text() != ""){
		fontName = jQuery("#fontName :selected").text();
		fontCSS = "http://fonts.googleapis.com/css?family="
		jQuery("#googleFontStyle").attr("href",fontCSS+fontName.replace(" ","+"));
		jQuery("#testFont").css("font-family",fontName);
	}
	if(jQuery("#fontText").val() != ""){
		jQuery("#testFont").html(jQuery("#fontText").val());
	}
	if(jQuery("#fontSizeEm").val() != ''){
		jQuery("#testFont").css("font-size",jQuery("#fontSizeEm").val()+"em");
	} else if(jQuery("#fontSizeNum :selected").text() != ''){
		jQuery("#testFont").css("font-size",jQuery("#fontSizeNum :selected").text()+"px");
	}
	if(jQuery("#fontLHEm").val() != ''){
		jQuery("#testFont").css("line-height",jQuery("#fontLHEm").val()+"em");
	} else if(jQuery("#fontLHNum :selected").text() != ''){
		jQuery("#testFont").css("line-height",jQuery("#fontLHNum :selected").text()+"px");
	}
	if(jQuery("#fontColor").val() != ''){
		jQuery("#testFont").css("color",jQuery("#fontColor").val());
	}
}

// insert the font shortcode into the editor
function insertFont(){
	txt = ' [font';
	if(jQuery("#fontName :selected").text() != ''){
		txt += ' face="' + jQuery("#fontName :selected").text() + '"';
	}
	if(jQuery("#fontSizeEm").val() != ''){
		txt += ' size="' + jQuery("#fontSizeEm").val() + 'em"';
	} else if(jQuery("#fontSizeNum :selected").text() != ''){
		txt += ' size="' + jQuery("#fontSizeNum :selected").text() + 'px"';
	}
	if(jQuery("#fontLHEm").val() != ''){
		txt += ' lineheight="' + jQuery("#fontLHEm").val() + 'em"';
	} else if(jQuery("#fontLHNum :selected").text() != ''){
		txt += ' lineheight="' + jQuery("#fontLHNum :selected").text() + 'px"';
	}
	if(jQuery("#fontColor").val() != ''){
		txt += ' color="' + jQuery("#fontColor").val() + '"';
	}
	if(jQuery("#fontClass").val() != ''){
		txt += ' class="' + jQuery("#fontClass").val() + '"';
	}
	txt += ']';
	if(jQuery("#fontText").val() != ''){
		txt += jQuery("#fontText").val();
	} else {
		txt += 'Insert Your Custom Font Text Here';
	}
	txt += '[/font] ';
	insertText(txt);
}

// insert fbnotliked shortcode
function insertUnLiked(){
	txt  = ' [fbnotliked]';
	txt += 'Insert Your "UNLIKED" Content Here';
	txt += '[/fbnotliked] ';
	insertText(txt);
}

// insert fbliked shortcode
function insertLiked(){
	txt  = ' [fbliked]';
	txt += 'Insert Your "LIKED" Content Here';
	txt += '[/fbliked] ';
	insertText(txt);
}

// insert fbadmin shortcode
function insertAdmin(){
	txt  = ' [fbadmin]';
	txt += 'Insert Your "ADMIN ONLY" Content Here';
	txt += '[/fbadmin] ';
	insertText(txt);
}

// insert fblightboxgate shortcode
function insertLightbox(){
	teaser();
}

// insert long like button
function insertLikeLong(){
	teaser();
}

// insert short like button
function insertLikeShort(){
	teaser();
}

// insert send button
function insertSend(){
	teaser();
}

// insert share
function insertShare(){
	teaser();
}

// insert comments shortcode
function insertComments(){
	teaser();
}

// insert blog posts
function insertPosts(){
	txt  = ' [fbposts';
	txt += (jQuery("#blogCat").val() != '')? ' cat="' + jQuery("#blogCat").val() + '"' : '';
	txt += (jQuery("#blogType").val() != '')? ' type="' + jQuery("#blogType").val() + '"' : '';
	txt += (jQuery("#blogNum").val() != '')? ' num="' + jQuery("#blogNum").val() + '"' : '';
	txt += (jQuery("#blogExcerpts").is(':checked'))? ' excerpts="1"' : '';
	txt += (jQuery("#blogDate").is(':checked'))? ' showdate="1"' : '';
	txt += (jQuery("#blogAuthor").is(':checked'))? ' showauthor="1"' : '';
	txt += '] ';
	insertText(txt);
}

// insert opt-in shortcode
function insertOptIn(){
	teaser();
}

// insert hide code
function insertHide(){
	teaser();
}

function insertGP1(){
	teaser();
}

function insertShow(){
	teaser();
}

function insertExpire(){
	teaser();
}

function insertFBK(){
	teaser();
}

function insertKB(){
	teaser();
}

function insertTweets(){
	teaser();
}

function insertRSS(){
	teaser();
}

function insertQRCode(){
	teaser();
}
</script>

<style type="text/css">
textarea,
input[type="text"],
input[type="password"],
input[type="file"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="url"],
select,
#testFont {
    background-color: #FFFFFF;
    color: #333333;
    border-radius: 3px 3px 3px 3px;
    border-style: solid;
    border-width: 1px;
    border-color: #777;
}
textarea, input, select {
    margin: 1px;
    padding: 3px;
}
a, input[type="text"], input[type="password"], input[type="number"], input[type="search"], input[type="email"], input[type="url"], select, textarea, div {
    outline: 0 none;
}
input[type="text"], input[type="password"], input[type="number"], input[type="search"], input[type="email"], input[type="url"], textarea {
    -moz-box-sizing: border-box;
}

.fangateImg{
	border:none;
	float:left;
	margin-right:8px;
}
.button-primary {
	background-color: #21759B;
	background-image: linear-gradient(to bottom, #2A95C5, #21759B);
	border-color: #21759B #21759B #1E6A8D;
	box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset;
	color: #FFFFFF;
	text-decoration: none;
	text-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    -moz-box-sizing: border-box;
    border-radius: 3px 3px 3px 3px;
    border-style: solid;
    border-width: 1px;
    cursor: pointer;
    display: inline-block;
    margin: 0;
    white-space: nowrap;
}
.button-large {
	text-align: center !important;
	height: 30px !important;
	line-height: 28px !important;
	padding: 0 12px 2px !important;
    font-size: 12px !important;
    float:right;
    min-width:210px;
    margin: 8px 0px;
}
.button-large:after {
   content: ".";
   opacity: 0;
   display: block;
   height: 1px;
   clear: both;
}
.panel-header {
 	background-color: #515151;
 	padding: 10px 0px;
 	margin: 0 auto;
 	text-align: center;
 	box-shadow: 0px 2px 2px rgba(0,0,0,0.6);
 	position: fixed;
 	top: 0;
 	width: 100%;
 	color: #fff;
 	text-shadow: -1px -1px rgba(0,0,0,0.7);
 	font-weight: bold;
 	font-size: 16px;
 	z-index: 100;
}
.option-panel {
	padding: 10px;
	padding-top: 46px;
	display: none;
	font-size: 14px;
}
.option-panel>div {
	margin-bottom: 8px;
	clear:both;
}
#category-selector {
	font-size: 14px;
	font-weight: bold;
}
label {
	font-weight: bold;
	padding-right: 4px;
}
h3{
    background-color: #ddd;
    margin: 8px 0 8px -10px;
    padding: 6px 0 6px 20px;
    width: 100%;
    clear:both;
}
.label-td {
	min-width: 175px;
}
.formDiv,
.option-panel {
	clear:both;
}
#testFont {
    border: 1px solid #CCCCCC;
    height: 100px;
    margin-top: 12px;
    overflow: scroll;
    padding: 10px;
    width: 436px;
}
td {
	display: table-cell;
	vertical-align: top;
	padding: 4px 0px;
}
#fontText {
	height: 65px;
	width: 436px;
}
.fontlist {
	display: none;
}
#fontStyle {
	position: relative;
	top: -71px;
}
.twChrome {
	width: 40%;
	margin-right: 4%;
	float: left;
}
.qr {
	display: none;
	position: relative;
	z-index: 10;
}
.qr .label-td {
	min-width: 120px;
}
#qrdetails{
	position: relative;
	z-index: 10;
	padding-bottom: 4px;
	border-bottom: 1px solid #444;
	margin-bottom: 10px;
}
#qr-result {
	float:right;
	position: absolute;
	right: 10px;
	z-index: 5;
	margin-top: 34px;
}
#qr-img {
	cursor: pointer;
}
.shown {
	display: block;
}
</style>

<base target="_self">
</head>
<!--<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');">-->
<body>
<form>

	<div class="panel-header">
		Shortcode Category&nbsp;
		<select id="category-selector">
			<option value="panel-1" selected>Fangate Control</option>
			<option value="panel-2">Social</option>
			<option value="panel-3">Blog</option>
			<option value="panel-4">Google Fonts</option>
			<option value="panel-6">QR Codes</option>
			<option value="panel-5">Other</option>
		</select>
	</div>

	<div id="panel-1" class="option-panel shown">

		<div class="formDiv">
			<p>
			<a href="javascript:void(0)" onclick="insertUnLiked();">
				<img src="<?php echo FPC_PLUGIN_URL; ?>/img/not-liked-content.png" class="fangateImg">
			</a>
			<strong>Unliked Content</strong><br>
			This is content that will be seen by people who <strong>have not</strong> clicked the "like" button
			on your fan page.
			</p>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert UnLiked Shortcode" onclick="insertUnLiked()">
		</div>
		<div class="formDiv">
			<p>
			<a href="javascript:void(0)" onclick="insertLiked();">
				<img src="<?php echo FPC_PLUGIN_URL; ?>/img/liked-content.png" class="fangateImg">
			</a>
			<strong>Liked Content</strong><br>
			This is content that will be seen by people who <strong>have</strong> clicked the "like" button
			on your fan page and are fans/followers of your fan page.
			</p>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Liked Shortcode" onclick="insertLiked()">
		</div>
		<div class="formDiv">
			<p>
			<a href="javascript:void(0)" onclick="insertLightbox();">
				<img src="<?php echo FPC_PLUGIN_URL; ?>/img/lightbox-gate.png" class="fangateImg">
			</a>
			<strong>Lightbox Gate</strong><br>
			This shortcode creates a lightbox effect on your page for users who haven't liked the page yet.
			</p>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert &quot;Lightbox Gate&quot; Shortcode" onclick="insertLightbox()">
		</div>
		<div class="formDiv">
			<p>
			<a href="javascript:void(0)" onclick="insertAdmin();">
				<img src="<?php echo FPC_PLUGIN_URL; ?>/img/admin-content.png" class="fangateImg">
			</a>
			<strong>Admin Only Content</strong><br>
			This is content that will be seen only by people who are administrators of your fan page.<br>
			</p>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Admin Shortcode" onclick="insertAdmin()">
		</div>

	</div><!-- end fan gate control -->

	<div id="panel-2" class="option-panel">
		<h3>Standard Like Button</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="likeFPURL">Fan Page URL</label></td>
					<td>
						<input type="text" id="likeFPURL" size="50">
						<p>Leave blank to use the fanpage's permalink URL, or the tab's URL if you have it set in the App settings.</p>
					</td>
				</tr>
				<tr>
					<td><label for="likeLayout">Layout</label></td>
					<td>
						<select id="likeLayout">
						<option value="">standard</option>
						<option value="button_count">button_count</option>
						<option value="box_count">box_count</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="likeFaces">Show Faces?</label></td>
					<td><input type="checkbox" id="likeFaces"></td>
				</tr>
				<tr>
					<td><label for="likeSend">Send Button?</label></td>
					<td><input type="checkbox" id="likeSend"></td>
				</tr>
				<tr>
					<td><label for="likeWidth">Width</label></td>
					<td><input type="text" id="likeWidth" size="5"></td>
				</tr>
					<td><label for="likeClass">Class</label></td>
					<td><input type="text" id="likeClass" size="16"></td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Like Button" onclick="insertLikeLong()">
		</div>

		<h3>Short Like Button</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="likeFPURLS">Fan Page URL</label></td>
					<td><input type="text" id="likeFPURLS" size="50"></td>
				</tr>
				<tr>
					<td><label for="likeClassS">Class</label></td>
					<td><input type="text" id="likeClassS" size="16"></td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Short Like Button" onclick="insertLikeShort()">
		</div>

		<h3>KarmaBlock</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="karmaID">Name of KarmaBlock:</label></td>
					<td>
						<input type="text" id="karmaID" value="" size="32" maxlength="32">
						<p>
							KarmaBlocks can be used to create blocks of hidden content that are revealed as a reward (good karma) if a user posts to their wall,
							comments on your page, or sends the page link to other users. See the
							<a href="<?php echo admin_url('admin.php?page=fpc-help',''); ?>" target="_top">help file</a> for more info.
						</p>
					</td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert KarmaBlock" onclick="insertKB()">
		</div>

		<h3>PostKarma (formerly FBKarma)</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="fbkURL">URL to Post:</label></td>
					<td><input type="text" id="fbkURL" value="" size="40"></td>
				</tr>
				<tr>
					<td><label for="fbkDest">Reward URL:</label></td>
					<td><input type="text" id="fbkDest" value="" size="40"></td>
				</tr>
				<tr>
					<td><label for="fbkTarg">Target:</label></td>
					<td>
						<select id="fbkTarg">
						<option value="">Facebook iFrame</option>
						<option value="_top">Parent Window</option>
						<option value="_blank">New Window</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="fbkName">Name:</label></td>
					<td><input type="text" id="fbkName" value="" size="10"></td>
				</tr>
				<tr>
					<td><label for="fbkDesc">Description:</label></td>
					<td><input type="text" id="fbkDesc" value="" size="40" maxlength="255"></td>
				</tr>
				<tr>
					<td><label for="fbkImg">Image URL:</label></td>
					<td><input type="text" id="fbkImg" value="" size="40"></td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert FB Karma" onclick="insertFBK()">
		</div>

		<h3>Send Button</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="sendFPURL">Fan Page URL</label></td>
					<td><input type="text" id="sendFPURL" size="50"></td>
				</tr>
				<tr>
					<td><label for="sendClass">Class</label></td>
					<td><input type="text" id="sendClass" size="16"></td>
				</tr>
				<tr>
					<td colspan="2"><b>SendKarma Options (optional)</b></td>
				</tr>
				<tr>
					<td><label for="sendKarmaURL">SendKarma URL/ID</label></td>
					<td>
						<input type="text" id="sendKarmaURL" size="50">
						<p>
							Enter a URL or the ID of a "Karma Block" (#name-of-block).
							A URL will redirect after the user sends the link, whils the ID of a Karma Block will display that block.
						</p>
					</td>
				</tr>
				<tr>
					<td><label for="sendKarmaTarget">SendKarma URL Target</label></td>
					<td>
						<select id="sendKarmaTarget">
							<option value="">Facebook iFrame</option>
							<option value="_top">Parent Window</option>
							<option value="_blank">New Window</option>
						</select>
					</td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Send Button" onclick="insertSend()">
		</div>

		<h3>Facebook Comments</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="numComments"># of Comments</label></td>
					<td><input type="text" id="numComments" size="10"></td>
				</tr>
				<tr>
					<td><label for="commentWidth" style="margin-right:-24px !important;">Width</label></td>
					<td><input type="text" id="commentWidth" size="10"></td>
				</tr>
				<tr>
					<td colspan="2"><b>CommentKarma Options (optional)</b></td>
				</tr>
				<tr>
					<td><label for="commentKarmaURL">CommentKarma URL/ID</label></td>
					<td>
						<input type="text" id="commentKarmaURL" size="50">
						<p>
							Enter a URL or the ID of a "Karma Block" (#name-of-block).
							A URL will redirect after the user sends the link, whils the ID of a Karma Block will display that block.
						</p>
					</td>
				</tr>
				<tr>
					<td><label for="commentKarmaTarget">SendKarma URL Target</label></td>
					<td>
						<select id="commentKarmaTarget">
							<option value="">Facebook iFrame</option>
							<option value="_top">Parent Window</option>
							<option value="_blank">New Window</option>
						</select>
					</td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Comments Shortcode" onclick="insertComments()">
		</div>

		<h3>Share Button</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="shareFPURL">Fan Page URL</label></td>
					<td><input type="text" id="shareFPURL" size="50"></td>
				</tr>
				<tr>
					<td><label for="shareText">Button Text</label></td>
					<td><input type="text" id="shareText" class="16"></td>
				</td>
				<tr>
					<td><label for="shareClass">Class</label></td>
					<td><input type="text" id="shareClass" class="16"></td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Share Button" onclick="insertShare()">
		</div>

		<h3>Google + One</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="gp1Size">Size:</label></td>
					<td>
						<select id="gp1Size">
							<option value="">Standard</option>
							<option value="small">Small</option>
							<option value="medium">Medium</option>
							<option value="tall">Tall</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="gp1Count">Show Count?</label></td>
					<td><input type="checkbox" id="gp1Count" checked="checked"></td>
				</tr>
				<tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Google + One Button" onclick="insertGP1()">
		</div>

		<h3>Latest Tweets</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="fbTwID">Widget ID:</label></td>
					<td>
						<input type="text" id="fbTwID" value="">
						<p>Twitter's gone all snooty and now we have to use "Widgets"! Create and get your
						<a href="https://twitter.com/settings/widgets" target="_blank">Widget ID here</a>.</p>
					</td>
				</tr>
				<tr>
					<td class="label-td"><label for="fbTwUser">User ID:</label></td>
					<td>
						<input type="text" id="fbTwUser" value="">
					</td>
				</tr>
				<tr>
					<td><label for="fbTwTheme">Theme:</label></td>
					<td>
						<select id="fbTwTheme">
						<option value="light" selected>Light</option>
						<option value="dark">Dark</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="fbTwAColor">Link Color:</label></td>
					<td>
						#<input type="text" id="fbTwAColor" size="7" maxlength="6">
					</td>
				</tr>
				<tr>
					<td><label for="fbTwBColor">Border Color:</label></td>
					<td>
						#<input type="text" id="fbTwBColor" size="7" maxlength="6">
					</td>
				</tr>
				<tr>
					<td><label for="fbTwWidth">Width/Height:</label></td>
					<td>
						<input type="text" id="fbTwWidth" size="4" maxlength="3"> / <input type="text" id="fbTwHeight" size="4" maxlength="3">
					</td>
				</tr>
				<tr>
					<td><label for="fbTwWidth">Chrome:</label></td>
					<td>
						<div class="twChrome">
							<input type="checkbox" value="1" id="fbTwNoHeader"> <label for="fbTwNoHeader">No Header</label>
						</div>
						<div class="twChrome">
							<input type="checkbox" value="1" id="fbTwNoFooter"> <label for="fbTwNoFooter">No Footer</label>
						</div>
						<div class="twChrome">
							<input type="checkbox" value="1" id="fbTwNoScrollbar"> <label for="fbTwNoScrollbar">No Scrollbars</label>
						</div>
						<div class="twChrome">
							<input type="checkbox" value="1" id="fbTwTransparent"> <label for="fbTwTransparent">Transparent BG</label>
						</div>
						<div style="clear:both;"></div>
					</td>
				</tr>
				<tr>
					<td><label for="fbTwLimit">Tweet Limit:</label></td>
					<td>
						<select id="fbTwLimit">
						<option value="" selected></option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						</select>
						<p>Careful, this sets the number of tweets to show, overriding any height you might set! More info
						<a href="https://dev.twitter.com/docs/embedded-timelines" target="_blank">here...</a></p>
					</td>
				</tr>
				<tr>
					<td><label for="fbTweetClass">Container Class:</label></td>
					<td><input type="text" id="fbTweetClass" value=""></td>
				</tr>
				<tr>
					<td><label for="fbTweetStyle">Inline Style:</label></td>
					<td><input type="text" id="fbTweetStyle" value=""></td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Tweets" onclick="insertTweets()">
		</div>

		<p><em>For Help on the extremely viral Karma options, see the <a href="<?php echo admin_url('admin.php?page=fpc-help',''); ?>" target="_top">help file</a>!</em></p>

	</div><!-- end social tab -->

	<div id="panel-3" class="option-panel">
		<h3>Display Latest Posts</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="blogCat">Category</label></td>
					<td><input type="text" id="blogCat" size="10"></td>
				</tr>
				<tr>
					<td><label for="blogType">Post Type</label></td>
					<td><input type="text" id="blogType" size="10"></td>
				</tr>
				<tr>
					<td><label for="blogNum"># of Posts</label></td>
					<td><input type="text" id="blogNum" size="5"></td>
				</tr>
				<tr>
					<td><label for="blogExcerpts">Show Excerpts?</label></td>
					<td><input type="checkbox" id="blogExcerpts"></td>
				</tr>
				<tr>
					<td><label for="blogDate">Show Date?</label></td>
					<td><input type="checkbox" id="blogDate"></td>
				</tr>
				<tr>
					<td><label for="blogAuthor">Show Author?</label></td>
					<td><input type="checkbox" id="blogAuthor"></td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Post Shortcode" onclick="insertPosts()">
		</div>
		<h3>Display RSS Feed (ANY Feed!)</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="rssURL">Feed URL</label></td>
					<td><input type="text" id="rssURL" size="40"></td>
				</tr>
				<tr>
					<td><label for="rssNum"># of Posts</label></td>
					<td><input type="text" id="rssNum" size="5"></td>
				</tr>
				<tr>
					<td><label for="rssClass">Container Class:</label></td>
					<td><input type="text" id="rssClass" value=""></td>
				</tr>
				<tr>
					<td><label for="rssStyle">Inline Style:</label></td>
					<td><input type="text" id="rssStyle" value=""></td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert RSS Shortcode" onclick="insertRSS()">
		</div>
	</div><!-- end blog tab -->

	<div id="panel-4" class="option-panel">
		<h3>Google Fonts!</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="fontText">Text</label></td>
					<td><textarea id="fontText" wrap="virtual"></textarea></td>
				</tr>
				<tr>
					<td><label for="fontName">Font</label></td>
					<td>
						<select id="fontStyle">
							<option value="sans-serif">Sans-Serif</option>
							<option value="serif">Serif</option>
							<option value="handwriting">Handwriting</option>
							<option value="display">Display</option>
						</select>

						<select id="fontName" size="5">
							<option selected="selected"></option>
							<?php include(FPC_PLUGIN_DIR.'/util/fonts/google-fonts-sans-serif.php'); ?>
						</select>

						<div id="sans-serif" class="fontlist"><?php include(FPC_PLUGIN_DIR.'/util/fonts/google-fonts-sans-serif.php'); ?></div>
						<div id="serif" class="fontlist"><?php include(FPC_PLUGIN_DIR.'/util/fonts/google-fonts-serif.php'); ?></div>
						<div id="handwriting" class="fontlist"><?php include(FPC_PLUGIN_DIR.'/util/fonts/google-fonts-handwriting.php'); ?></div>
						<div id="display" class="fontlist"><?php include(FPC_PLUGIN_DIR.'/util/fonts/google-fonts-display.php'); ?></div>

					</td>
				</tr>
				<tr>
					<td><label for="fontSizeNum">Size &amp; Line Height</label></td>
					<td>
						<select id="fontSizeNum">
						<option value="" selected="selected"></option>
						</select><b>px</b> or
						<input type="text" id="fontSizeEm" value="" size="4"><b>em</b>
						<select id="fontLHNum">
						<option value="" selected="selected"></option>
						</select><b>px</b> or
						<input type="text" id="fontLHEm" value="" size="4"><b>em</b>
					</td>
				</tr>
				<tr>
					<td><label for="fontClass">Class</label></td>
					<td><input type="text" id="fontClass"></td>
				</tr>
				<tr>
					<td><label for="fontSizeNum">Color</label></td>
					<td>
						<input type="hidden" id="fontColor" name="fontColor" value="#000000">
						<div id="colorpicker"></div>
					</td>
				</tr>
				<tr>
					<td><strong>Preview</strong></td>
					<td>
						<div id="testFont">The Quick Brown Fox Jumped Over the Lazy Dog</div>
					</td>
				</tr>
			</table>
			<input type="button" class="button button-primary button-large" id="insert" value="Insert Google Font" onclick="insertFont();">
		</div>
	</div><!-- end google fonts tab -->


	<div id="panel-5" class="option-panel">

		<h3>Optin-In/Custom Code Shortcode</h3>
		<div>
			<p>
				This will insert the short code that will display any content you place in the "Opt-In" box in the Fan Page Conenct settings.
			</p>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Opt-In Shortcode" onclick="insertOptIn()">
		</div>

		<h3>Hide Content After First Visit</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="uniqueID">Unique ID</label></td>
					<td><input type="text" id="uniqueID" value="" size="32" maxlength="32"></td>
				</tr>
				<tr>
					<td><label for="numDays">Hide for</label></td>
					<td>
						<select id="numDays"></select> Day(s)
						<p>
						<strong>Note:</strong> You <u>must</u> use a unique ID for each chunk of content you wish to hide after a user's first visit to your fan page.
						</p>
					</td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Hidden Content" onclick="insertHide()">
		</div>

		<h3>Show Content After Date</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="showDate">Date</label></td>
					<td><input type="text" id="showDate" size="10"> (yyyy/mm/dd)</td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Show Content" onclick="insertShow()">
		</div>

		<h3>Hide Content After Date</h3>
		<div>
			<table>
				<tr>
					<td class="label-td"><label for="expireDate">Date</label></td>
					<td><input type="text" id="expireDate" size="10"> (yyyy/mm/dd)</td>
				</tr>
			</table>
			<input type="button" id="insert" class="button button-primary button-large" value="Insert Expire Content" onclick="insertExpire()">
		</div>

	</div><!-- end other tab -->

	<div id="panel-6" class="option-panel" style='position: relatvie;'>

		<h3>QR Codes</h3>
		<div>

			<div id="qr-result">
				<img src="" id="qr-img">
			</div>

			<div id="qrdetails">
				<b>Type:</b>
				<select id="qr-type">
					<option value="qrfbshare" selected>FB Share</option>
					<!--<option value="qrtweet" selected>Tweet Status</option>-->
					<option value="qrtweetshare">Tweet Share</option>
					<option value="qrtext">Text</option>
					<option value="qremail">Email</option>
					<option value="qrphone">Phone</option>
					<option value="qrurl">URL</option>
					<option value="qrsms">SMS</option>
					<option value="qrcontact">Contact</option>
					<option value="qrevent">Event</option>
				</select>
				<b>Size:</b>
				<select id="qr-size">
					<option value="120x120" selected>Small</option>
					<option value="200x200">Medium</option>
					<option value="300x300">Large</option>
				</select>
				<b>Custom:</b>
				<input id="qr-size-custom" type="text" size="4" maxlength="3">
				<input type="button" id="insert" class="button button-primary button-large" style="margin-top:-3px !important;" value="Insert QR Code" onclick="insertQRCode()">
			</div>

			<div id="qrfbshare" class="qr shown">
				<label for="qr-fbsharetitle">Share on Facebook</label>
				<table>
					<!--
					<tr>
						<td class="label-td"><label for="qr-fbsharetitle">Title</label></td>
						<td><input type="text" id="qr-fbsharetitle" maxlength="60"></td>
					</tr>
					<tr>
						<td class="label-td"><label for="qr-fbsharesum">Summary</label></td>
						<td><input type="text" id="qr-fbsharesum" maxlength="160" size="36"></td>
					</tr>
					-->
					<tr>
						<td class="label-td"><label for="qr-fbsharelnk">Link</label></td>
						<td><input type="text" id="qr-fbsharelnk" maxlength="160" size="36"></td>
					</tr>
				</table>
				<p>
					You can share any type of URL.
					A link to a coupon image, a marketing video on youtube, your affiliate link to a product, or even a link to your app on the iTunes
					or Google Play store are all possible.
				</p>
			</div>

			<!--
			<div id="qrtweet" class="qr">
				<table>
					<tr>
						<td class="label-td"><label for="qr-tweet">Tweet</label></td>
						<td><input type="text" id="qr-tweet" placeholder="Any text can go here with a link and a #hashtag!" maxlength="140" size="36"></td>
					</tr>
				</table>
			</div>
			-->

			<div id="qrtweetshare" class="qr">
				<label for="qr-tweettxt">Share on Twitter</label>
				<table>
					<tr>
						<td class="label-td"><label for="qr-tweettxt">Text</label></td>
						<td><input type="text" id="qr-tweettxt" placeholder="Any text can go here with a link and a #hashtag!" maxlength="100" size="36"></td>
					</tr>
					<tr>
						<td><label for="qr-tweetlnk">Link</label></td>
						<td><input type="text" id="qr-tweetlnk" placeholder="Any text can go here with a link and a #hashtag!" maxlength="120" size="36"></td>
					</tr>
				</table>
				<p>
					You can share any type of URL.
					A link to a coupon image, a marketing video on youtube, your affiliate link to a product, or even a link to your app on the iTunes
					or Google Play store are all possible.
				</p>
			</div>

			<div id="qrtext" class="qr">
				<table>
					<tr>
						<td class="label-td"><label for="qr-text">Text</label></td>
						<td><textarea id="qr-text" placeholder="Any text can go here."></textarea></td>
					</tr>
				</table>
			</div>
			<div id="qremail" class="qr">
				<table>
					<tr>
						<td class="label-td"><label for="qr-email">Email Address</label></td>
						<td><input type="email" id="qr-email" placeholder="you@yoursite.com"></td>
					</tr>
				</table>
			</div>
			<div id="qrphone" class="qr">
				<table>
					<tr>
						<td class="label-td"><label for="qr-phone">Phone Number</label></td>
						<td><input type="tel" id="qr-phone" placeholder="+1 (123) 555-1234"></td>
					</tr>
				</table>
			</div>
			<div id="qrurl" class="qr">
				<table>
					<tr>
						<td class="label-td"><label for="qr-url">URL</label></td>
						<td>
							<input type="text" id="qr-url" placeholder="http://www.yoursite.com">

						</td>
					</tr>
				</table>
				<p>
					You can use any type of URL.<br>
					A link to a coupon image, your twitter page or a marketing video on youtube, your affiliate link to a product, or
					even a link to your app on the iTunes or Google Play store are all possible.
				</p>
			</div>
			<div id="qrsms" class="qr">
				<strong>SMS</strong>
				<table>
					<tr>
						<td class="label-td"><label for="qr-sms-phone">Phone Number</label></td>
						<td><input type="tel" id="qr-sms-phone" placeholder="+1 (123) 555-1234"></td>
					</tr>
					<tr>
						<td><label for="qr-sms-text">Text</label></td>
						<td><input type="text" id="qr-sms-text" placeholder="ur txt msg here :)" maxlength="160"></td>
					</tr>
				</table>
			</div>
			<div id="qrcontact" class="qr">
				<strong>Contact</strong>
				<table>
					<tr>
						<td class="label-td"><label for="qr-cfname">First Name</label></td>
						<td><input type="text" id="qr-cfname"></td>
					</tr>
					<tr>
						<td><label for="qr-clname">Last Name</label></td>
						<td><input type="text" id="qr-clname"></td>
					</tr>
					<tr>
						<td><label for="qr-corg">Organization</label></td>
						<td><input type="text" id="qr-corg"></td>
					</tr>
					<tr>
						<td><label for="qr-ctitle">Title</label></td>
						<td><input type="text" id="qr-ctitle"></td>
					</tr>
					<tr>
						<td><label for="qr-cemail">Email</label></td>
						<td><input type="email" id="qr-cemail" placeholder="you@yoursite.com"></td>
					</tr>
					<tr>
						<td><label for="qr-cphone">Phone</label></td>
						<td><input type="tel" id="qr-cphone" placeholder="+1 (123) 555-1234"></td>
					</tr>
					<tr>
						<td><label for="qr-ccell">Cell Phone</label></td>
						<td><input type="tel" id="qr-ccell" placeholder="+1 (123) 555-1234"></td>
					</tr>
					<tr>
						<td><label for="qr-cfax">Fax</label></td>
						<td><input type="tel" id="qr-cfax" placeholder="+1 (123) 555-1234"></td>
					</tr>
					<tr>
						<td><label for="qr-caddr">Street</label></td>
						<td><input type="text" id="qr-caddr"></td>
					</tr>
					<tr>
						<td><label for="qr-czip">Postcode/Zip</label></td>
						<td><input type="text" id="qr-czip"></td>
					</tr>
					<tr>
						<td><label for="qr-ccity">City</label></td>
						<td><input type="text" id="qr-ccity"></td>
					</tr>
					<tr>
						<td><label for="qr-cstate">Region/State</label></td>
						<td><input type="text" id="qr-cstate"></td>
					</tr>
					<tr>
						<td><label for="qr-ccountry">Country</label></td>
						<td><input type="text" id="qr-ccountry"></td>
					</tr>
					<tr>
						<td><label for="qr-curl">URL</label></td>
						<td><input type="text" id="qr-curl"></td>
					</tr>
				</table>
			</div>

			<div id="qrevent" class="qr">
				<b><em>Coming Soon!</em></b><br>
				Imagine, being able to share a launch date or time for a webinar. Yup, it's coming!
			</div>

		</div>

	</div><!-- end qr code tab -->

</form>
</body>
</html>