<?php

@ require('../../../../wp-config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') )
	wp_die(__("You are not allowed to be here"));

global $wpdb;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Fanpage Connect Shortcodes</title>
<script type="text/javascript" src="<?php echo FPC_PLUGIN_URL; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo FPC_PLUGIN_URL; ?>/js/jquery-ui-1.8.13.custom.min.js"></script>
<!--[if IE]><script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/tags/m3/excanvas.compiled.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo FPC_PLUGIN_URL; ?>/js/farbtastic.js"></script>
<script type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>

<link rel="stylesheet" href="<?php echo get_option('siteurl'); ?>/wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css" />
<link rel="stylesheet" href="<?php echo FPC_PLUGIN_URL; ?>/css/smoothness/jquery-ui-1.8.13.custom.css" />
<link href="" rel="stylesheet" type="text/css" id="googleFontStyle">

<script language="javascript" type="text/javascript">
var $objColorPicker;

function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function insertText(fpcTxt){
	if(window.tinyMCE) {
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, fpcTxt);
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}

$(document).ready(function(){
	// set up tabs
	$( "#tabs" ).tabs();

	// set up accordion in the social tab
	$("#accordion").accordion({
		header: 'h3',
		clearStyle: true,
		autoHeight: false,
		fillSpace: true,
		collapsible: true,
		animated: false
	});

	// fill font size selector
	for(i=8; i < 71; i++){
		$("#fontSizeNum").append("<option>" + i + "</option>");
	}

	// fill the numDays select
	for(i=1; i < 91; i++){
		$("#numDays").append("<option>" + i + "</option>");
	}

	// set up events and color picker
	$("#fontText").change(function(){
		setGoogleFont();
	});

	$("#fontText").keyup(function(){
		setGoogleFont();
	});

	$("#fontName").change(function(){
		setGoogleFont();
	});

	$("#fontSizeNum").change(function(){
		setGoogleFont();
	});

	$("#fontColor").change(function(){
		setGoogleFont();
	});

	$("#fontColor").keyup(function(){
		$objColorPicker.setColor($(this).val());
	});

	$objColorPicker = $.farbtastic('#colorpicker', {width: 150, height: 150, callback: $("#fontColor")});
	$objColorPicker.setColor("#000000");
	$objColorPicker.linkTo(handleColor);

});

// handle color changes in the color picker
function handleColor(c){
	pickerHSL = $objColorPicker.hsl[2];
	$("#fontColor").
	css({ backgroundColor: c, color: (pickerHSL > 0.5 ? '#000' : '#fff') }).
	val(c).
	change();
}

// handle the real time preview of the font
function setGoogleFont(){
	fontName = '';
	if($('#fontName :selected').text() != ""){
		fontName = $("#fontName :selected").text();
		fontCSS = "http://fonts.googleapis.com/css?family="
		$("#googleFontStyle").attr("href",fontCSS+fontName.replace(" ","+"));
		$("#testFont").css("font-family",fontName);
	}
	if($("#fontText").val() != ""){
		$("#testFont").html($("#fontText").val());
	}
	if($("#fontSizeNum :selected").text() != ''){
		$("#testFont").css("font-size",$("#fontSizeNum :selected").text()+"px");
	}
	if($("#fontColor").val() != ''){
		$("#testFont").css("color",$("#fontColor").val());
	}
}

// insert the font shortcode into the editor
function insertFont(){
	txt = ' [font';
	if($("#fontName :selected").text() != ''){
		txt += ' face="' + $("#fontName :selected").text() + '"';
	}
	if($("#fontSizeNum :selected").text() != ''){
		txt += ' size="' + $("#fontSizeNum :selected").text() + '"';
	}
	if($("#fontColor").val() != ''){
		txt += ' color="' + $("#fontColor").val() + '"';
	}
	if($("#fontClass").val() != ''){
		txt += ' class="' + $("#fontClass").val() + '"';
	}
	txt += ']';
	if($("#fontText").val() != ''){
		txt += $("#fontText").val();
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

function teaser(){
	msg  = 'Sorry, this feature is only available in\n';
	msg += 'Fanpage Connect Pro.\n\n';
	msg += 'Vists www.FanpageConnect.com/pro\n';
	msg += 'for more details on how to unlock\n';
	msg += 'these powerful marketing features!';
	alert(msg);
	tinyMCEPopup.editor.execCommand('mceRepaint');
	tinyMCEPopup.close();
}
</script>

<style type="text/css">
/* quick tab height fix */
.ui-tabs .ui-tabs-panel {
    min-height: 370px;
}
#accordion h3 {
	font-weight: bold !important;
}
.ui-accordion .ui-accordion-content {
	padding: 8px !important;
}
#tabs-3 {
	padding-left: 8px !important;
	padding-right: 8px !important;
}
#firstSlide {
	min-height: 142px;
}
input,
select,
textarea {
	border: 1px solid #aaa;
}
.clearBoth {
	clear: both;
}
.floatLeft {
	float: left;
	margin-right: 12px;
}
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* google font styles */
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.optgroupLabel {
	font-weight: bold;
	font-style: normal;
	text-transform: normal;
	background-color: #2173dd;
	color: #fff;
}
option {
	background: none !important;
	background-color: #fff !important;
	color: #000 !important;
}
#testFont {
	padding: 6px;
	border: 1px solid #999;
	-moz-border-radius: 8px;
	border-radius: 8px;
	margin-top: 8px;
	height: 68px;
	overflow: auto;
}
#fontLeft {
	position: relative;
	float: left;
	margin-bottom: 8px;
}
#fontRight {
	position: relative;
	float: left;
	margin-left: 12px;
	margin-bottom: 8px;
}
#fontText {
	width: 182px;
	height: 44px;
}
#fontClass {
	width: 186px;
}
#fontColor {
	width: 70px;
}
#colorpicker {
	margin-left: 40px;
	margin-top: 8px;
}
.formDiv {
	margin-bottom: 12px;
}
.formDiv label {
	width: 28px;
	float: left;
	margin-right: 12px;
	font-weight: bold;
}
.longInsert {
	width: 182px !important;
}
#tabs-3 label {
	width: 95px !important;
	margin-right: 6px;
}
#tabs-4 label {
	width: 105px !important;
	margin-right: 6px;
}
#tabs-3 .formDiv,
#tabs-4 .formDiv {
	margin-bottom: 6px;
}
#fbBlog {
	margin-top: 13px;
}
#fbHide label {
	width: 70px !important;
}
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* fangate styles */
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.fangateImg{
	border:none;
	float:left;
	margin-right:8px;
}
</style>

<base target="_self" />
</head>
<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');">
<form>

	<div class="panel">

		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Fangate Control</a></li>
				<li><a href="#tabs-2">Google Fonts</a></li>
				<li><a href="#tabs-3">Social</a></li>
				<li><a href="#tabs-4">Blog</a></li>
				<li><a href="#tabs-5">Other</a></li>
			</ul>

			<div id="tabs-1">

					<div class="formDiv">
						<p>
						<a href="javascript:void(0)" onclick="insertUnLiked();">
							<img src="../img/not-liked-content.png" class="fangateImg">
						</a>
						<strong>Unliked Content</strong><br />
						This is content that will be seen by people who <strong>have not</strong> clicked the "like" button
						on your fan page.
						</p>
						<input type="button" id="insert" class="longInsert" value="Insert UnLiked Shortcode" onclick="insertUnLiked()">
					</div>
					<div class="formDiv">
						<p>
						<a href="javascript:void(0)" onclick="insertLiked();">
							<img src="../img/liked-content.png" class="fangateImg">
						</a>
						<strong>Liked Content</strong><br />
						This is content that will be seen by people who <strong>have</strong> clicked the "like" button
						on your fan page and are fans/followers of your fan page.
						</p>
						<input type="button" id="insert" class="longInsert" value="Insert Liked Shortcode" onclick="insertLiked()">
					</div>
					<div class="formDiv">
						<p>
						<a href="javascript:void(0)" onclick="insertAdmin();">
							<img src="../img/admin-content.png" class="fangateImg">
						</a>
						<strong>Admin Only Content</strong><br />
						This is content that will be seen only by people who are administrators of your fan page.<br />
						</p>
						<input type="button" id="insert" class="longInsert" value="Insert Admin Shortcode" onclick="insertAdmin()">
					</div>

			</div><!-- end fan gate control -->

			<div id="tabs-2">

					<div id="fontLeft">
						<div class="formDiv">
							<label for="fontText">Text</label>
							<textarea id="fontText" wrap="virtual"></textarea>
						</div>

						<div class="formDiv">
							<label for="fontName">Font</label>
							<select id="fontName" size="9">
								<option selected="selected"></option>
<optgroup class="optgroupLabel" label="Sans-Serif">
	<option>Abel</option>
	<option>Aclonica</option>
	<option>Actor</option>
	<option>Aldrich</option>
	<option>Allerta</option>
	<option>Allerta Stencil</option>
	<option>Amaranth</option>
	<option>Andika</option>
	<option>Anonymous Pro</option>
	<option>Antic</option>
	<option>Anton</option>
	<option>Arimo</option>
	<option>Bowlby One</option>
	<option>Bowlby One SC</option>
	<option>Buda</option>
	<option>Cabin</option>
	<option>Candal</option>
	<option>Cantarell</option>
	<option>Carme</option>
	<option>Carter One</option>
	<option>Coda</option>
	<option>Coda Caption</option>
	<option>Cousine</option>
	<option>Cuprum</option>
	<option>Days One</option>
	<option>Didact Gothic</option>
	<option>Dorsa</option>
	<option>Droid Sans</option>
	<option>Droid Sans Mono</option>
	<option>Francois One</option>
	<option>Geo</option>
	<option>Gruppo</option>
	<option>Hammersmith One</option>
	<option>Inconsolata</option>
	<option>Istok Web</option>
	<option>Josefin Sans</option>
	<option>Jura</option>
	<option>Kenia</option>
	<option>Lato</option>
	<option>Lekton</option>
	<option>Mako</option>
	<option>Marvel</option>
	<option>Metrophobic</option>
	<option>Michroma</option>
	<option>Molengo</option>
	<option>Muli</option>
	<option>News Cycle</option>
	<option>Nobile</option>
	<option>Numans</option>
	<option>Nunito</option>
	<option>Open Sans</option>
	<option>Open Sans Condensed</option>
	<option>Orbitron</option>
	<option>Oswald</option>
	<option>PT Sans</option>
	<option>PT Sans Caption</option>
	<option>PT Sans Narrow</option>
	<option>Paytone One</option>
	<option>Philosopher</option>
	<option>Play</option>
	<option>Podkova</option>
	<option>Puritan</option>
	<option>Quattrocento Sans</option>
	<option>Questrial</option>
	<option>Raleway</option>
	<option>Rosario</option>
	<option>Shanti</option>
	<option>Sigmar One</option>
	<option>Six Caps</option>
	<option>Snippet</option>
	<option>Syncopate</option>
	<option>Terminal Dosis Light</option>
	<option>Ubuntu</option>
	<option>Varela</option>
	<option>Varela Round</option>
	<option>Voltaire</option>
	<option>Wire One</option>
	<option>Yanone Kaffeesatz</option>
</optgroup>
<optgroup class="optgroupLabel" label="Serif">
	<option>Alice</option>
	<option>Alike</option>
	<option>Artifika</option>
	<option>Arvo</option>
	<option>Bentham</option>
	<option>Bevan</option>
	<option>Brawler</option>
	<option>Cardo</option>
	<option>Caudex</option>
	<option>Copse</option>
	<option>Corben</option>
	<option>Coustard</option>
	<option>Crimson Text</option>
	<option>Droid Serif</option>
	<option>EB Garamond</option>
	<option>Fanwood Text</option>
	<option>Gentium Basic</option>
	<option>Gentium Book Basic</option>
	<option>Goudy Bookletter 1911</option>
	<option>Holtwood One SC</option>
	<option>IM Fell DW Pica</option>
	<option>IM Fell DW Pica SC</option>
	<option>IM Fell Double Pica</option>
	<option>IM Fell Double Pica SC</option>
	<option>IM Fell English</option>
	<option>IM Fell English SC</option>
	<option>IM Fell French Canon</option>
	<option>IM Fell French Canon SC</option>
	<option>IM Fell Great Primer</option>
	<option>IM Fell Great Primer SC</option>
	<option>Josefin Slab</option>
	<option>Judson</option>
	<option>Kameron</option>
	<option>Kreon</option>
	<option>Lora</option>
	<option>Maiden Orange</option>
	<option>Merriweather</option>
	<option>Neuton</option>
	<option>OFL Sorts Mill Goudy TT</option>
	<option>Old Standard TT</option>
	<option>Ovo</option>
	<option>PT Serif</option>
	<option>PT Serif Caption</option>
	<option>Playfair Display</option>
	<option>Prociono</option>
	<option>Quattrocento</option>
	<option>Radley</option>
	<option>Rokkitt</option>
	<option>Tienne</option>
	<option>Tinos</option>
	<option>Ultra</option>
	<option>Unna</option>
	<option>Vidaloka</option>
	<option>Volkhov</option>
	<option>Vollkorn</option>
	<option>Yeseva One</option>
</optgroup>
<optgroup class="optgroupLabel" label="Handwriting">
	<option>Annie Use Your Telescope</option>
	<option>Architects Daughter</option>
	<option>Calligraffitti</option>
	<option>Cedarville Cursive</option>
	<option>Coming Soon</option>
	<option>Covered By Your Grace</option>
	<option>Crafty Girls</option>
	<option>Damion</option>
	<option>Dancing Script</option>
	<option>Dawning of a New Day</option>
	<option>Delius</option>
	<option>Delius Swash Caps</option>
	<option>Delius Unicase</option>
	<option>Give You Glory</option>
	<option>Gloria Hallelujah</option>
	<option>Homemade Apple</option>
	<option>Indie Flower</option>
	<option>Just Another Hand</option>
	<option>Just Me Again Down Here</option>
	<option>Kristi</option>
	<option>La Belle Aurore</option>
	<option>Leckerli One</option>
	<option>Love Ya Like A Sister</option>
	<option>Loved by the King</option>
	<option>Meddon</option>
	<option>Montez</option>
	<option>Neucha</option>
	<option>Nothing You Could Do</option>
	<option>Over the Rainbow</option>
	<option>Pacifico</option>
	<option>Patrick Hand</option>
	<option>Redressed</option>
	<option>Reenie Beanie</option>
	<option>Rochester</option>
	<option>Rock Salt</option>
	<option>Schoolbell</option>
	<option>Shadows Into Light</option>
	<option>Short Stack</option>
	<option>Sue Ellen Francisco</option>
	<option>Sunshiney</option>
	<option>Swanky and Moo Moo</option>
	<option>The Girl Next Door</option>
	<option>Vibur</option>
	<option>Waiting for the Sunrise</option>
	<option>Walter Turncoat</option>
	<option>Yellowtail</option>
	<option>Zeyada</option>
</optgroup>
<optgroup class="optgroupLabel" label="Display">
	<option>Abril Fatface</option>
	<option>Allan</option>
	<option>Asset</option>
	<option>Astloch</option>
	<option>Aubrey</option>
	<option>Bangers</option>
	<option>Bigshot One</option>
	<option>Black Ops One</option>
	<option>Cabin Sketch</option>
	<option>Cherry Cream Soda</option>
	<option>Chewy</option>
	<option>Comfortaa</option>
	<option>Crushed</option>
	<option>Expletus Sans</option>
	<option>Federo</option>
	<option>Fontdiner Swanky</option>
	<option>Forum</option>
	<option>Geostar</option>
	<option>Geostar Fill</option>
	<option>Goblin One</option>
	<option>Gravitas One</option>
	<option>Irish Grover</option>
	<option>Kelly Slab</option>
	<option>Kranky</option>
	<option>League Script</option>
	<option>Limelight</option>
	<option>Lobster</option>
	<option>Lobster Two</option>
	<option>Luckiest Guy</option>
	<option>Maven Pro</option>
	<option>MedievalSharp</option>
	<option>Megrim</option>
	<option>Miltonian</option>
	<option>Miltonian Tattoo</option>
	<option>Modern Antiqua</option>
	<option>Monofett</option>
	<option>Monoton</option>
	<option>Mountains of Christmas</option>
	<option>Nixie One</option>
	<option>Nova Cut</option>
	<option>Nova Flat</option>
	<option>Nova Mono</option>
	<option>Nova Oval</option>
	<option>Nova Round</option>
	<option>Nova Script</option>
	<option>Nova Slim</option>
	<option>Nova Square</option>
	<option>Passero One</option>
	<option>Permanent Marker</option>
	<option>Pompiere</option>
	<option>Rationale</option>
	<option>Ruslan Display</option>
	<option>Slackey</option>
	<option>Smokum</option>
	<option>Smythe</option>
	<option>Sniglet</option>
	<option>Special Elite</option>
	<option>Stardos Stencil</option>
	<option>Tangerine</option>
	<option>Tenor Sans</option>
	<option>Tulpen One</option>
	<option>UnifrakturCook</option>
	<option>UnifrakturMaguntia</option>
	<option>Unkempt</option>
	<option>VT323</option>
	<option>Wallpoet</option>
</optgroup>
							</select>
						</div>

						<div class="formDiv">
							<label for="fontSizeNum">Size</label>
							<select id="fontSizeNum">
								<option value="" selected="selected"></option>
							</select>
						</div>

						<div class="formDiv">
							<label for="fontClass">Class</label>
							<input type="text" id="fontClass">
						</div>

						<div class="formDiv">
							<input type="button" id="insert" value="Insert Font" onclick="insertFont();">
						</div>
					</div><!-- fontLeft -->

					<div id="fontRight">
						<div class="formDiv">
							<label for="fontSizeNum">Color</label>
							<input type="text" id="fontColor" name="fontColor" value="#000000" />
							<div id="colorpicker"></div>
						</div>
					</div><!-- fontRight -->

					<div style="clear:both"></div>

					<strong>Preview</strong>
					<div id="testFont">
						The Quick Brown Fox Jumped Over the Lazy Dog
					</div>

			</div><!-- end google fonts tab -->

			<div id="tabs-3">

				<div id="accordion">

					<h3><a href="#">Standard Like Button</a></h3>
					<div id="firstSlide">

						<div id="fbLikeLong">
							<div  class="formDiv">
								<img src="../img/fb-like-long.jpg">
							</div>
							<div  class="formDiv">
								<label for="likeFPURL">Fan Page URL</label>
								<input type="text" size="50" disabled="disabled">
							</div>
							<div class="formDiv floatLeft">
								<label for="likeWidth">Width</label>
								<input type="text" size="5" disabled="disabled">
							</div>
							<div class="formDiv floatLeft">
								<label for="likeFaces">Show Faces?</label>
								<input type="checkbox" disabled="disabled">
							</div>
							<div class="formDiv floatLeft">
								<label for="likeSend">Send Button?</label>
								<input type="checkbox" disabled="disabled">
							</div>
							<div class="formDiv clearBoth">
								<label for="likeClass">Class</label>
								<input type="text" size="16" disabled="disabled">
							</div>
							<div class="formDiv">
								<input type="button" id="insert" class="longInsert" value="Insert Like Button" onclick="teaser()">
							</div>
						</div>

					</div><!-- first slide -->

					<h3><a href="#">Short Like Button</a></h3>
					<div>

						<div id="fbLikeShort">
							<div class="formDiv">
								<img src="../img/fb-like-short.jpg">
							</div>
							<div class="formDiv">
								<label for="likeFPURLS">Fan Page URL</label>
								<input type="text" size="50" disabled="disabled">
							</div>
							<div class="formDiv">
								<label for="likeClassS">Class</label>
								<input type="text" size="16" disabled="disabled">
							</div>
							<div class="formDiv">
								<input type="button" id="insert" class="longInsert" value="Insert Short Like Button" onclick="teaser()">
							</div>
						</div>

					</div><!-- second slide -->

					<h3><a href="#">Send Button</a></h3>
					<div>

						<div id="fbSend">
							<div class="formDiv">
								<img src="../img/fb-send.jpg">
							</div>
							<div class="formDiv">
								<label for="sendFPURL">Fan Page URL</label>
								<input type="text" size="50" disabled="disabled">
							</div>
							<div class="formDiv">
								<label for="sendClass">Class</label>
								<input type="text" size="16" disabled="disabled">
							</div>
							<div class="formDiv">
								<input type="button" id="insert" class="longInsert" value="Insert Send Button" onclick="teaser()">
							</div>
						</div>

					</div><!-- third slide -->

					<h3><a href="#">Share Button</a></h3>
					<div>

						<div id="fbShare">
							<div class="formDiv">
								<img src="../img/fb-share1.jpg"> or <img src="../img/fb-share2.jpg">
							</div>
							<div class="formDiv">
								<label for="shareFPURL">Fan Page URL</label>
								<input type="text" size="50" disabled="disabled">
							</div>
							<div class="formDiv">
								<label for="shareClass">Class</label>
								<input type="text" class="16" disabled="disabled">
							</div>
							<div class="formDiv">
								<input type="button" id="insert" class="longInsert" value="Insert Share Button" onclick="teaser()">
							</div>
						</div>

					</div><!-- fourth slide -->

					<h3><a href="#">Multi-Friend Inviter</a></h3>
					<div>

						<div id="fbMFI">
							<div class="formDiv floatLeft">
								<label for="mfRows">Rows</label>
								<input type="text" size="10" disabled="disabled">
							</div>
							<div class="formDiv floatLeft">
								<label for="mfCols">Columns</label>
								<input type="text" size="10" disabled="disabled">
							</div>
							<div class="formDiv clearBoth">
								<label for="mfActionTxt">Action Text</label>
								<input type="text" value="Become a Fan - Invite Your Friends!" size="40" disabled="disabled">
							</div>
							<div class="formDiv">
								<label for="mfInviteTxt">Invite Text</label>
								<input type="text" value="Be a Fan!" size="40" disabled="disabled">
							</div>
							<div class="formDiv floatLeft">
								<label for="mfButtonTxt">Button Text</label>
								<input type="text" value="Fan" size="10" disabled="disabled">
							</div>
							<div class="formDiv floatLeft">
								<label for="mfBorder">Border?</label>
								<input type="checkbox" disabled="disabled">
							</div>
							<div class="formDiv clearBoth">
								<label for="mfPostURL">Post URL</label>
								<input type="text" disabled="disabled">
							</div>
							<div class="formDiv">
								<input type="button" id="insert" class="longInsert" value="Insert Multi-Friend Inviter" onclick="teaser()">
							</div>
						</div>

					</div><!-- fifth slide -->

				</div>

			</div><!-- end social tab -->

			<div id="tabs-4">

				<div id="fbComments">
					<div  class="formDiv">
						<strong>Facebook Comments</strong>
					</div>
					<div  class="formDiv">
						<img src="../img/fb-comments.jpg">
					</div>
					<div  class="formDiv floatLeft">
						<label for="numComments"># of Comments</label>
						<input type="text" size="10" disabled="disabled">
					</div>
					<div class="formDiv floatLeft">
						<label for="commentWidth" style="margin-right:-24px !important;">Width</label>
						<input type="text" size="10" disabled="disabled">
					</div>
					<div class="formDiv clearBoth">
						<input type="button" id="insert" class="longInsert" value="Insert Comments Shortcode" onclick="teaser()">
					</div>
				</div>

				<div id="fbBlog">
					<div  class="formDiv">
						<strong>Display Latest Posts</strong>
					</div>
					<div  class="formDiv floatLeft">
						<label for="blogCat">Category</label>
						<input type="text" size="10" disabled="disabled">
					</div>
					<div  class="formDiv floatLeft">
						<label for="blogType" style="margin-right:-24px !important;">Post Type</label>
						<input type="text" size="10" disabled="disabled">
					</div>
					<div class="formDiv clearBoth">
						<label for="blogNum"># of Posts</label>
						<input type="text" size="5" disabled="disabled">
					</div>
					<div class="formDiv floatLeft">
						<label for="blogDate">Show Date?</label>
						<input type="checkbox" disabled="disabled">
					</div>
					<div class="formDiv floatLeft">
						<label for="blogAuthor">Show Author?</label>
						<input type="checkbox" disabled="disabled">
					</div>
					<div class="formDiv clearBoth">
						<input type="button" id="insert" class="longInsert" value="Insert Post Shortcode" onclick="teaser()">
					</div>
				</div>

			</div><!-- end blog tab -->

			<div id="tabs-5">

				<div id="fbOptIn">
					<div  class="formDiv">
						<strong>Opt-In Shortcode</strong>
					</div>
					<div  class="formDiv">
						This will insert the short code that will display any content you place in the "Opt-In" box in the Fan Page Conenct settings.
					</div>
					<div class="formDiv">
						<input type="button" id="insert" class="longInsert" value="Insert Opt-In Shortcode" onclick="teaser()">
					</div>
				</div>

				<div id="fbHide">
					<div  class="formDiv">
						<strong>Hide Content After First Visit</strong>
					</div>
					<div class="formDiv floatLeft">
						<label for="uniqueID">Unique ID</label>
						<input type="text" size="10" disabled="disabled">
					</div>
					<div class="formDiv floatLeft">
						<label for="numDays">Hide for</label>
						<select disabled="disabled">
						</select> Days
					</div>
					<div class="formDiv clearBoth">
						<strong>Note:</strong> You <u>must</u> use a unique ID for each chunk of content you wish to hide after a user's first visit to your fan page.
					</div>
					<div class="formDiv clearBoth">
						<input type="button" id="insert" class="longInsert" value="Insert Hidden Content" onclick="teaser()">
					</div>
				</div>

			</div><!-- end other tab -->

		</div>

	</div><!-- panel -->

	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="Cancel" onclick="tinyMCEPopup.close();" />
		</div>
	</div><!-- mceActionPanel -->

</form>
</body>
</html>