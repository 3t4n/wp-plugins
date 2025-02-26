<?php
$galleries = array(
	array(
		'title' => 'jQuery Gallery Viewer',
		'js'	=> 'jqGalView',
		'css' => addslashes('
#bsg .gvContainer{
	width:600px;
	height:356px;
	background:url({BSGPATH}/img/bg_main.jpg);
	overflow:hidden;
	position:relative;
}
#bsg .gvContainer .gvHolder{
	position:absolute;
	top:0;
	left:0;
	margin-left:0;
	margin-top:0;
}
#bsg .gvHeader{
	width:600px;
	background:url({BSGPATH}/img/bg_top.jpg);
	color:#fff;
	font:bold 11px Geneva, Arial, Helvetica, sans-serif;
	height:44px;
	position:relative;
}
#bsg .gvHeader span{
	color:#fff;
	font:bold 20px/44px Verdana, Arial, Helvetica, sans-serif;
	padding-left:35px;
}
#bsg .gvFooter{
	width:600px;
	background: url({BSGPATH}/img/bg_bot.jpg);
	color:#fff;
	font:bold 11px Geneva, Arial, Helvetica, sans-serif;
	height:20px;
	text-align:center;
}
#bsg .gvFooter .gvLinks{
	padding:0px auto;
	padding-top:3px;
}
#bsg .gvFooter a{
	padding:0 10px;
	width:15px;
	background:#CCCCCC;
	color:#666666;
}
#bsg .gvFooter a:hover{
	background:#fff;
	color:#666666;
}
#bsg .gvHeader strong{
	padding-left:10px;
	font:bold 11px/20px Geneva, Arial, Helvetica, sans-serif;
}
#bsg .gvHeader a.gvFullSizeText{
	position:absolute;
	right:0;
	top:0;
	display:none;
	font:bold 10px/20px Verdana, Arial, Helvetica, sans-serif;
	color:#fff;
	width:120px;
	text-align:right;
	padding-right:5px;
}
#bsg .gvContainer .gvItem{
	width:116px;
	text-align:center;
	vertical-align:middle;
	height:85px;
	position:relative;
	float:left;
	border:1px solid #6E8D2B;
	margin:1px;
	overflow:hidden;
}
/*stupid ie6 fix*/
* html #bsg .gvContainer .gvItem {
	margin-left: 0;
	margin-right: 2px;
}
#bsg .gvContainer .gvItem .gvOpen{
	position:absolute;
	top:0;
	left:0;
	height:15px;
	width:116px;
	font:bold 8px/15px Verdana, Arial, Helvetica, sans-serif;
	color:#6E8D2B;
	background:#C1FD3E ;
	border-bottom:1px solid #6E8D2B;
	text-align:right;
	text-transform:uppercase;
}
#bsg .gvContainer .gvItem img{
	position:absolute;
	top:0;
	left:0;
	padding:0;
	margin:0;
	margin-left:0;
	margin-top:0;border:none;
	cursor:pointer;
}
#bsg .gvImgContainer{
	position:absolute;
	top:0;
	left:0;
	width:600px;
	height:356px;
	display:none;
	overflow:hidden;
	background:url({BSGPATH}/img/bg_main.jpg);
}
#bsg .gvImgContainer .gvDescText{
	width:400px;
	position:absolute;
	bottom:0;
	left:50%;
	margin-left:-200px;
	font:11px/15px Verdana, Arial, Helvetica, sans-serif;
	color:#6E8D2B;
	background:#C1FD3E ;
	border:1px solid #6E8D2B;
	border-bottom:none;
	display:none;	
	padding:3px;	
}
#bsg .gvImgContainer img{border:none;padding:0;margin:0;
	cursor:pointer;
	display:none;}
#bsg .gvLoader{
	background:url({BSGPATH}/img/loadingAnimation.gif);
	width:42px;
	height:42px;
	position:absolute;
	left:50%;
	top:50%;
	margin-left:-21px;
	margin-top:-21px;
	display:none;
}
#bsg .gvLoaderMini{
	background:url({BSGPATH}/img/loadingAnimation.gif);
	width:42px;
	height:42px;
	position:absolute;
	left:50%;
	top:50%;
	margin-left:-21px;
	margin-top:-21px;
}
		'),
		'example' => 'http://benjaminsterling.com/?p=6',
		'params' => '{"parameters":[{"param":"openTxt","desc":"The text you want to have shown when you hover over a thumbnail"},{"param":"backTxt","desc":"The text that gets append to the full images title attribute to give a hint for the user to click to return to the thumbnails"},  {"param":"goFullSizeTxt","desc":"The text that gets appended after the alt text when the full sized image is being view and will allow the user to view the resized full image in a new browser window or in the modal box"},  {"param":"title","desc":"Set to null by default and will allow you to add a title to gallery if not already set in a title tag of the parent element of the thumbnail group"}]}',
		'framework' => 'jQuery'
	),
	
	array(
		'title' => 'jQuery Gallery Viewer II',
		'js'	=> 'jqGalViewII',
		'css' => addslashes('
#bsg .gvIIContainer{
	width:629px;
	position:relative;
	background:#000;
	padding:10px 0 10px 10px;
	border:10px solid #fff;
}
#bsg .gvIIContainer .gvIIImgContainer{
	width:619px;
	height:385px;
	position:relative;
	overflow:hidden;
	margin-bottom:10px;
}
#bsg .gvIIContainer .gvIIImgContainer .gvIILoader{
	background: url({BSGPATH}/ajax-loader.gif) no-repeat center center;
	width:619px;
	height:385px;
	display:none;
}
#bsg .gvIIContainer .gvIIHolder{
	position:relative;
	height:207px;
	width:619px;
	overflow:auto;
}
#bsg .gvIIContainer .gvIIHolder .gvIIArrow{
/*
	background:url(/experiments/jqGalViewII/common/img/arrow.png);
	width:20px;
	height:28px;
	position:absolute;
	margin-left:-15px;
	margin-top:-28px;
	z-index:99;
*/
}
#bsg .gvIIContainer .gvIIHolder .gvIIItem{
	float:left;
	height:55px;
	width:72px;
	border:5px solid #fff;
	margin:2px;
	position:relative;
	overflow:hidden;
}
#bsg .gvIIContainer .gvIIHolder .gvIIItem .gvIIFlash{
	background:#fff;
	position:absolute;
	top:0;
	left:0;
	height:55px;
	width:72px;
	cursor:pointer;
}
#bsg .gvIIContainer .gvIIHolder .gvIIItem img{
	position:absolute;
	top:0;
	left:0;
	padding:0;
	margin:0;
	margin-left:0;
	margin-top:0;
	border:none;
	cursor:pointer;
}
		'),
		'example' => 'http://benjaminsterling.com/?p=14',
		'params' => '',
		'framework' => 'jQuery'
	),
	
	array(
		'title' => 'jQuery jqGalScroll Plugin',
		'js'	=> 'jqGalScroll',
		'css' => addslashes('
#bsg .jqGSContainer{
	position:relative;
	background:#fff;
	padding:20px;
	width:494px;
}
#bsg .jqGSContainer .jqGSImgContainer{
}
#bsg .jqGSContainer .jqGSImgContainer ul{
	padding:0;
	margin:0;
	position:relative;
	list-style:none;
}
#bsg .jqGSContainer .jqGSImgContainer ul li{
	padding:0;
	margin:0;
	position:relative;
	margin-top:0;
	margin-bottom:0px;
}
#bsg .jqGSContainer .jqGSImgContainer ul li .jqGSLoader{
	background:url({BSGPATH}/ajax-loader.gif) no-repeat center center;
	width:100%;
	height:100%;
	position:absolute;
}
#bsg .jqGSContainer .jqGSImgContainer ul li img{
	position:absolute;
	top:50%;
	left:50%;
}
#bsg .jqGSContainer .jqGSImgContainer ul li .jqGSTitle{
	background:#000;
	position:absolute;
	right:0px;
	top:0px;
	padding:3px;
	color:#fff;
	width:300px;
}
#bsg .jqGSContainer .jqGSPagination{
	padding:10px;
}
#bsg .jqGSContainer .jqGSPagination ul{
	padding:0;
	margin:0;
	list-style:none;
}
#bsg .jqGSContainer .jqGSPagination ul li{
	padding:0;
	margin:0;
	float:left;
	padding-right:1px;
	text-align:center;
	padding-bottom:1px;
}
#bsg .jqGSContainer .jqGSPagination ul li a{
	padding:2px 0px;
	background:#eaeaea;
	text-decoration:none;
	display:block;
	width:20px;
	font:10px Verdana, Arial, Helvetica, sans-serif;
}
#bsg .jqGSContainer .jqGSPagination ul li a:hover{
	background:#000;
	color:#fff;
}
		'),
		'example' => 'http://benjaminsterling.com/?p=8',
		'params' => '{"parameters":[{"param":"speed","desc":"fast, slow, 1000, ext.."},{"param":"height","desc":"the default height of your wrapper"},{"param":"width","desc":"the default width of your wrapper"},{"param":"titleOpacity","desc":"the opacity of your title bar (if present)"}]}',
		'framework' => 'jQuery'
	),
	
	array(
		'title' => 'cycle',
		'js'	=> 'cycle',
		'css' => addslashes ('
.pics {
	height:232px;
	margin:0pt;
	overflow:hidden;
	padding:0pt;
	width:232px;
}
.pics img {
	background-color:#EEEEEE;
	border:1px solid #CCCCCC;
	height:200px;
	left:0pt;
	padding:15px;
	top:0pt;
	width:200px;
}

#theBSGGallery{
	position:relative;
	height:auto;
	list-style:none;
	padding:0;
	margin:0;
	border:none;
}

#theBSGGallery a{
	border:none;
	padding:0;
	margin:0;
}

#theBSGGallery li{
	border:none;
	padding:0;
	margin:0;
	height:auto;
	border:none;
}
		'),
		'example' => 'http://www.malsup.com/jquery/cycle/',
		'params' => '{"parameters":[{"param":"fx","desc":"one of: fade, shuffle, zoom, slideX, slideY, scrollUp/Down/Left/Right"},{"param":"timeout","desc":"milliseconds between slide transitions (0 to disable auto advance) "},{"param":"speed","desc":"speed of the transition (any valid fx speed value) "},{"param":"speedIn","desc":"speed of the `in` transition "},{"param":"speedOut","desc":"peed of the `out` transition"},{"param":"easing","desc":"easing method for both in and out transitions "},{"param":"easeIn","desc":"easing for `in` transition "},{"param":"easeOut","desc":"easing for `out` transition "},{"param":"shuffle","desc":"coords for shuffle animation, ex: { top:15, left: 200 } "},{"param":"animIn","desc":"properties that define how the slide animates in "},{"param":"animOut","desc":"properties that define how the slide animates out "},{"param":"height","desc":"container height "},{"param":"sync","desc":"true if in/out transitions should occur simultaneously "},{"param":"random","desc":"true for random, false for sequence (not applicable to shuffle fx)"},{"param":"fit","desc":"force slides to fit container "},{"param":"pause","desc":"true to enable `pause on hover` "},{"param":"autostop","desc":"true to end slideshow after X transitions (where X == slide count) "},{"param":"delay","desc":"additional delay (in ms) for first transition (hint: can be negative)}; "}]}',
		'framework' => 'jQuery'
	),
	
	array(
		'title' => 'Thickbox',
		'js'	=> 'thickbox',
		'css' => addslashes ('
/*/* ----------------------------------------------------------------------------------------------------------------*/
/* ---------->>> global settings needed for thickbox <<<-----------------------------------------------------------*/
/* ----------------------------------------------------------------------------------------------------------------*/
*{padding: 0; margin: 0;}
/* ----------------------------------------------------------------------------------------------------------------*/
/* ---------->>> thickbox specific link and font settings <<<------------------------------------------------------*/
/* ----------------------------------------------------------------------------------------------------------------*/
#TB_window {
  font: 12px Arial, Helvetica, sans-serif;
  color: #333333;
}
#TB_secondLine {
  font: 10px Arial, Helvetica, sans-serif;
  color:#666666;
}
#TB_window a:link {color: #666666;}
#TB_window a:visited {color: #666666;}
#TB_window a:hover {color: #000;}
#TB_window a:active {color: #666666;}
#TB_window a:focus{color: #666666;}
/* ----------------------------------------------------------------------------------------------------------------*/
/* ---------->>> thickbox settings <<<-----------------------------------------------------------------------------*/
/* ----------------------------------------------------------------------------------------------------------------*/
#TB_overlay {
  position: fixed;
  z-index:100;
  top: 0px;
  left: 0px;
  height:100%;
  width:100%;
}
.TB_overlayMacFFBGHack {background: url({BSGPATH}/macFFBgHack.png) repeat;}
.TB_overlayBG {
  background-color:#000;
  filter:alpha(opacity=75);
  -moz-opacity: 0.75;
  opacity: 0.75;
}
* html #TB_overlay { /* ie6 hack */
     position: absolute;
     height: expression(document.body.scrollHeight > document.body.offsetHeight ? document.body.scrollHeight : document.body.offsetHeight + \'px\');
}
#TB_window {
  position: fixed;
  background: #ffffff;
  z-index: 102;
  color:#000000;
  display:none;
  border: 4px solid #525252;
  text-align:left;
  top:50%;
  left:50%;
}
* html #TB_window { /* ie6 hack */
position: absolute;
margin-top: expression(0 - parseInt(this.offsetHeight / 2) + (TBWindowMargin = document.documentElement && document.documentElement.scrollTop || document.body.scrollTop) + \'px\');
}
#TB_window img#TB_Image {
  display:block;
  margin: 15px 0 0 15px;
  border-right: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
  border-top: 1px solid #666;
  border-left: 1px solid #666;
}
#TB_caption{
  height:25px;
  padding:7px 30px 10px 25px;
  float:left;
}
#TB_closeWindow{
  height:25px;
  padding:11px 25px 10px 0;
  float:right;
}
#TB_closeAjaxWindow{
  padding:7px 10px 5px 0;
  margin-bottom:1px;
  text-align:right;
  float:right;
}
#TB_ajaxWindowTitle{
  float:left;
  padding:7px 0 5px 10px;
  margin-bottom:1px;
}
#TB_title{
  background-color:#e8e8e8;
  height:27px;
}
#TB_ajaxContent{
  clear:both;
  padding:2px 15px 15px 15px;
  overflow:auto;
  text-align:left;
  line-height:1.4em;
}
#TB_ajaxContent.TB_modal{
  padding:15px;
}
#TB_ajaxContent p{
  padding:5px 0px 5px 0px;
}
#TB_load{
  position: fixed;
  display:none;
  height:13px;
  width:208px;
  z-index:103;
  top: 50%;
  left: 50%;
  background:url({BSGPATH}/loadingAnimation.gif) no-repeat center center;
  margin: -6px 0 0 -104px; /* -height/2 0 0 -width/2 */
}
* html #TB_load { /* ie6 hack */
position: absolute;
margin-top: expression(0 - parseInt(this.offsetHeight / 2) + (TBWindowMargin = document.documentElement && document.documentElement.scrollTop || document.body.scrollTop) + \'px\');
}
#TB_HideSelect{
  z-index:99;
  position:fixed;
  top: 0;
  left: 0;
  background-color:#fff;
  border:none;
  filter:alpha(opacity=0);
  -moz-opacity: 0;
  opacity: 0;
  height:100%;
  width:100%;
}
* html #TB_HideSelect { /* ie6 hack */
     position: absolute;
     height: expression(document.body.scrollHeight > document.body.offsetHeight ? document.body.scrollHeight : document.body.offsetHeight + \'px\');
}
#TB_iframeContent{
  clear:both;
  border:none;
  margin-bottom:-1px;
  margin-top:1px;
  _margin-bottom:1px;
}
		'),
		'example' => 'http://jquery.com/demo/thickbox/',
		'params' => '',
		'framework' => 'jQuery'
	),
	
	array(
		'title' => 'Light Box',
		'js'	=> 'lightBox',
		'css' => addslashes ('
#jquery-overlay {
	position: absolute;
	top: 0;
	left: 0;
	z-index: 90;
	width: 100%;
	height: 500px;
}
#jquery-lightbox {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	z-index: 100;
	text-align: center;
	line-height: 0;
}
#jquery-lightbox a img { border: none; }
#lightbox-container-image-box {
	position: relative;
	background-color: #fff;
	width: 250px;
	height: 250px;
	margin: 0 auto;
}
#lightbox-container-image { padding: 10px; }
#lightbox-loading {
	position: absolute;
	top: 40%;
	left: 0%;
	height: 25%;
	width: 100%;
	text-align: center;
	line-height: 0;
}
#lightbox-nav {
	position: absolute;
	top: 0;
	left: 0;
	height: 100%;
	width: 100%;
	z-index: 10;
}
#lightbox-container-image-box > #lightbox-nav { left: 0; }
#lightbox-nav a { outline: none;}
#lightbox-nav-btnPrev, #lightbox-nav-btnNext {
	width: 49%;
	height: 100%;
	zoom: 1;
	display: block;
}
#lightbox-nav-btnPrev { 
	left: 0; 
	float: left;
}
#lightbox-nav-btnNext { 
	right: 0; 
	float: right;
}
#lightbox-container-image-data-box {
	font: 10px Verdana, Helvetica, sans-serif;
	background-color: #fff;
	margin: 0 auto;
	line-height: 1.4em;
	overflow: auto;
	width: 100%;
	padding: 0 10px 0;
}
#lightbox-container-image-data {
	padding: 0 10px; 
	color: #666; 
}
#lightbox-container-image-data #lightbox-image-details { 
	width: 70%; 
	float: left; 
	text-align: left; 
}	
#lightbox-image-details-caption { font-weight: bold; }
#lightbox-image-details-currentNumber {
	display: block; 
	clear: left; 
	padding-bottom: 1.0em;	
}			
#lightbox-secNav-btnClose {
	width: 66px; 
	float: right;
	padding-bottom: 0.7em;	
}
		'),
		'example' => 'http://leandrovieira.com/projects/jquery/lightbox/',
		'params' => '',
		'framework' => 'jQuery'
	)
);
/**
,
	
	array(
		'title' => 'Light Box',
		'js'	=> 'lightbox',
		'css' => addslashes ('

		'),
		'example' => 'http://leandrovieira.com/projects/jquery/lightbox/',
		'params' => '',
		'framework' => 'jQuery'
	)
*/
?>