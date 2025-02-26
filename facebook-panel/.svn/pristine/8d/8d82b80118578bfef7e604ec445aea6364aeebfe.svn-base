<?php header("Content-type: text/css"); ?>

<?php

//	VARIABLES 
	
	$panelBgColor			= 'whiteSmoke';
	$panelFont			= 'helvetica, tahoma, verdana, sans-serif';
	$panelFontSize		= '12px';
	$panelHeadheight	= '60px';
	
	$dockBgColorFrom	= '#f2f7fd';
	$dockBgColorTo		= '#b6c1d5';
	$dockBorderColor	= '#9ca8be';
	
	$maxZIndex			= 2147483645; // FB iFrame has z-index=10000 // absolute maximum is 2147483645
?>



	/*------------------------------ resets -------------------------------*/
	div#cnd-root{
		margin				: none;
		border				: none;
		padding				: none;
		background			: none;
		background-color	: none;
	}
	div#cnd-root *{
		width				: auto;
		height				: auto;
		
		margin				: none;
		border				: none;
		padding				: none;
		background			: none;
		background-color	: none;

		font				: inherit;
		font-size			: inherit;
		font-family			: inherit;
		color				: inherit;
		line-height			: inherit;
		font-weight			: inherit;
		text-decoration 	: inherit;
	}
	div#cnd-root * > img{
		vertical-align 		: text-top;
		float				: none;
		margin				: 0;
	}

	
	/*------------------------------ dock -------------------------------*/
	div#cnd-dock{
		
		position			: fixed;
		top					: 33%;
		left				: -1px;
		
		background			: <?php echo $dockBgColorTo ?>;
		background			: -webkit-gradient(linear, left top, left bottom, from(<?php echo $dockBgColorFrom ?>), to(<?php echo $dockBgColorTo ?>));
		background			: -moz-linear-gradient(top, <?php echo $dockBgColorFrom ?>, <?php echo $dockBgColorTo ?>);
		filter				: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $dockBgColorFrom ?>', endColorstr='<?php echo $dockBgColorTo ?>');

		border				: 1px solid <?php echo $dockBorderColor ?>;
		border-radius		: 0 6px 6px 0;
		
		-webkit-box-shadow	: 1px 1px 2px rgba(0, 0, 0, 0.25);
		-moz-box-shadow		: 1px 1px 2px rgba(0, 0, 0, 0.25);
		box-shadow			: 1px 1px 2px rgba(0, 0, 0, 0.25);
		
		opacity				: .5;
		-webkit-transition	: opacity .3s ease;
		-moz-transition		: opacity .3s ease;
		-webkit-transition	: padding .1s ease;
		-moz-transition		: padding .1s ease;
		padding				: 8px;
		cursor				: pointer;
		
		z-index				: <?php echo $maxZIndex-1 ?>;
	}
	div#cnd-dock:hover{
		opacity				: 1.0;
		padding				: 15px;
	}
	div#cnd-dock > .cnd-icon{
		display				: inline;
		margin				: none;
	}
	div#cnd-dock .cnd-dock-arrow{
		display				: block;
		position			: absolute;
		right				: 3px;
		bottom				: 3px;
	}
	div#cnd-dock .cnd-dock-arrow > *{
		height				: 1px;
		float				: right;
		clear				: both;

		background			: #7792bf;
		border-left			: 1px solid #55709d;
		border-right		: 1px solid #f2f7fd;
	}
	div#cnd-dock .cnd-dock-arrow > .cnd-1{
		width:0px;
	}
	div#cnd-dock .cnd-dock-arrow > .cnd-2{
		width:1px;
	}
	div#cnd-dock .cnd-dock-arrow > .cnd-3{
		width:2px;
	}
	div#cnd-dock .cnd-dock-arrow > .cnd-4{
		width:3px;
	}
	div#cnd-dock .cnd-dock-arrow > .cnd-5{
		width:4px;
	}
	div#cnd-dock .cnd-dock-arrow > .cnd-6{
		width		: 5px;
		background	: #f2f7fd;
		border-left	: 1px solid #f2f7fd;
	}


/*------------------------------ panel ---------------------------*/

	div#cnd-panel{
		display				: none;
		position			: fixed;
		top					: 0px;
		left				: -1px;
		height				: 100%;
		z-index				: <?php echo $maxZIndex ?>;
		
/		padding-right		:1px;
		
		background			: <?php echo $panelBgColor ?>;
		font-family			: <?php echo $panelFont ?>;
		font-size			: <?php echo $panelFontSize ?>;
	}
	
	div#cnd-panel iframe{
//		display				: -webkit-box;
	}
	div#cnd-panel .cnd-head{
		display				: block;
		position			: absolute;
		top					: 0px;
		left				: 0px;
		right				: 0px;
		height				: <?php echo $panelHeadheight ?>;
	}
	div#cnd-panel .cnd-body{
		display				: block;
		position			: absolute;
		left				: 0px;
		right				: 0px;
		top					: <?php echo $panelHeadheight ?>;
		bottom				: 0px;
/		overflow			: scroll;
	}
	
	
	div#cnd-panel > .cnd-head{
		color				: #5e5e77;
		text-shadow			: 1px 1px 1px rgba(255, 255, 255, 0.8);
		background			: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,0)), to(rgba(183,191,212,.5)));
		background			: rgba(183,191,212,.5);
		background			: -webkit-gradient(linear, left top, left bottom, from(<?php echo $dockBgColorFrom ?>), to(<?php echo $dockBgColorTo ?>));
		background			: -moz-linear-gradient(top, <?php echo $dockBgColorFrom ?>, <?php echo $dockBgColorTo ?>);
		filter				: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $dockBgColorFrom ?>', endColorstr='<?php echo $dockBgColorTo ?>');
		overflow			: hidden;
	}
	div#cnd-panel .cnd-heading{
		margin-top			: 5px;
		margin-left			: 10px;
	}
	div#cnd-panel .cnd-heading em{
		text-style			: none;
		display				: inline;
	}
	div#cnd-panel > .cnd-head > .cnd-heading{
		padding				: 15px 10px;
		font-size			: 17px;
		white-space			: nowrap;
	}
	div#cnd-panel > .cnd-head > .cnd-heading > em{
		font-weight			: bold;
		padding-right		: 3px;
	}
	div#cnd-panel > .cnd-head > .cnd-button.cnd-close{
		position			: absolute;
		right				: 5px;
		top					: 0px;
		padding				: 3px 3px 10px 3px;
		
		font-size			: 18px;
		
		opacity				: .5;
		-webkit-transition	: all .2s ease;
		
		cursor				: pointer;
	}
	div#cnd-panel > .cnd-head > .cnd-button.cnd-close:hover{
		opacity				: 1;
		padding-right		: 8px;
	}


	div#cnd-panel > .cnd-body{
	}
	div#cnd-panel > .cnd-body > .fb-like{
	}
	div#cnd-panel > .cnd-body > .fb-comments{
	}
	div#cnd-panel > .cnd-body{
/		overflow-y			: auto;
	}
	
	div#cnd-panel > .cnd-shadow{
		position			: absolute;
		right				: 0px;
		top					: 0px;
		bottom				: 0px;
		width				: 8px;
	}

	div#cnd-panel,
	div#cnd-panel > .cnd-body{
	}
	div#cnd-panel.expanded,
	div#cnd-panel.expanded > .cnd-body{
	}

	div#cnd-panel.collapsed iframe{
		margin-left			: -1000px;
	}
	
	
/* --------------------- scrollbar style -------------------------- */

	div#cnd-panel ::-webkit-scrollbar {
		width					: 8px;
	}

	div#cnd-panel ::-webkit-scrollbar-track {
		border-radius			: 10px;
		background-color		: rgba(0,0,0,0.1);
		-webkit-box-shadow		: inset 0 0 6px rgba(0,0,0,0.3);
	}

	div#cnd-panel ::-webkit-scrollbar-thumb {
		border-radius			: 10px;
		background				: -webkit-gradient(linear, left top, right top, from(rgba(0,0,0,0.1)), to(rgba(0,0,0,0.3)));
		border					: 1px solid rgba(0,0,0,0.1);
	}
