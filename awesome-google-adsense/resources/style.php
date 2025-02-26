<style>
<?php 
	$img_p = WP_PLUGIN_URL.'/awesome-google-adsense/resources/img';
?>
.wrap {
	font-size:0.8em;
}
.aga_box{
	padding:0;
	border:1px solid #dbdbdb;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	-moz-box-shadow:3px 3px 5px #ccc;
	-webkit-box-shadow:3px 3px 5px #ccc;
	box-shadow:3px 3px 5px #ccc;
	padding-bottom:15px;
	margin-bottom:25px;
	margin-top:25px;
}
.aga_box .inside{
	padding: 0 15px;
}
.aga_box .inside .margin{
	padding: 0 15px;
}
.aga_box h3{
	width:100%;
	background: url(<?php echo $img_p; ?>/box_header_background.jpg) repeat-x top left;
	height:28px;
	margin:0px;
	font-size:16px;
}
.aga_box h3 span{
	padding: 3px 0 0 10px;
	display:block;
	text-shadow:1px 1px 1px #fff,-1px -1px 0px #fff;
	color:#08a4c7;
	font-weight:normal;
}
.aga_box .inside h4{
	color:#ff0084;
	font-size:14px;
}
.aga_box .inside .field_label{
	color:#0073ea;
	font-size:12px;
}
.aga_box .inside .explain{
	font-size:10px;
	color:#666;
	margin-left:2px;
	padding:3px;
}
.aga_box .inside table tr td{
	padding:15px;
}
.aga_box .inside table tr td table tr td{
	padding:3px;
}
.button_aga{
	padding:4px 6px 8px 6px !important;
	background: #5CA2E8; /* old browsers */
	background: -moz-linear-gradient(top, #5CA2E8 0%, #0073EA 100%); /* firefox */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#5CA2E8), color-stop(100%,#0073EA)); /* webkit */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5CA2E8', endColorstr='#0073EA',GradientType=0 ); /* ie */
	border:solid 1px #0073ea !important;
	border-radius: 0px !important;
	-moz-border-radius: 4px !important;
	-webkit-border-radius: 4px !important;
	color:#fff !important;
	font-size: 11px;
	font-weight:700;
	height:24.2px;
	line-height:14px;
	cursor:pointer;
}
.submit{
	color:#ff0084;
	font-weight:bold;
	font-size:12px;
}
</style>