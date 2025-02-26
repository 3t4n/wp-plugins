<style>
	<?php if( $this->options['head_font'] == $this->options['para_font'] )  { ?>
	@import url(http://fonts.googleapis.com/css?family=<?php echo $this->options['head_font'] ?>);
	<?php }else{ ?>
	@import url(http://fonts.googleapis.com/css?family=<?php echo $this->options['head_font'] ?>|<?php echo $this->options['para_font'] ?>);
	<?php } ?>
	
	<?php if( isset( $this->options['head_font'] ) && $this->options['head_font'] != '' ) { ?>
	h1, h2, h3, h4, h5, h6{
		font-family: <?php echo $this->options['head_font']; ?>
	}
	<?php } ?>
	
	#wpwrap{
		<?php if( isset( $this->options['header_logo'] ) && $this->options['header_logo'] != '' ) { ?>
		background-image: url(<?php echo $this->options['header_logo']; ?>);
		background-attachment: fixed;
		background-size: cover;
		backface-visibility: visible; 
		background-position: 0 0;
		<?php } ?>
		<?php if( isset( $this->options['main_bg_col'] ) && $this->options['main_bg_col'] != '' ) { ?>
		background: <?php echo $this->options['main_bg_col']; ?>;
		<?php } ?>
	}
	
	.wp-core-ui .button, .wp-core-ui .button-secondary{
		<?php if( isset( $this->options['se_btn_color'] ) && $this->options['se_btn_color'] != '' ) { ?>
		background: <?php echo $this->options['se_btn_color']; ?>;
		box-shadow: 0 0 0 2px <?php echo $this->options['se_btn_color'] ?> inset, 0 0 1px rgba(0, 0, 0, 0);
		border: 1px solid <?php echo $this->options['se_btn_color'] ?>;
		<?php } ?>
		<?php if( isset( $this->options['se_btn_font_color'] ) && $this->options['se_btn_font_color'] != '' ) { ?>
		color: <?php echo $this->options['se_btn_font_color']; ?>;
		<?php } ?>
	}
	.wp-core-ui .button:hover, .wp-core-ui .button-secondary:hover{
		<?php if( isset( $this->options['se_btn_hover_color'] ) && $this->options['se_btn_hover_color'] != '' ) { ?>
		background: <?php echo $this->options['se_btn_hover_color']; ?>;
		box-shadow: 0 0 0 2px <?php echo $this->options['se_btn_font_hover_color']; ?> inset, 0 0 1px rgba(0, 0, 0, 0);
		<?php } ?>
		<?php if( isset( $this->options['se_btn_font_hover_color'] ) && $this->options['se_btn_font_hover_color'] != '' ) { ?>
		color: <?php echo $this->options['se_btn_font_hover_color']; ?>;
		<?php } ?>
	}
	
	.wp-core-ui .button-primary{
		<?php if( isset( $this->options['pr_btn_color'] ) && $this->options['pr_btn_color'] != '' ) { ?>
		background: <?php echo $this->options['pr_btn_color']; ?>;
		box-shadow: 0 0 0 2px <?php echo $this->options['pr_btn_color'] ?> inset, 0 0 1px rgba(0, 0, 0, 0);
		border: 1px solid <?php echo $this->options['pr_btn_color'] ?>;
		<?php } ?>
		<?php if( isset( $this->options['pr_btn_font_color'] ) && $this->options['pr_btn_font_color'] != '' ) { ?>
		color: <?php echo $this->options['pr_btn_font_color']; ?>;
		<?php } ?>
	}
	.wp-core-ui .button-primary:hover{
		<?php if( isset( $this->options['pr_btn_hover_color'] ) && $this->options['pr_btn_hover_color'] != '' ) { ?>
		background: <?php echo $this->options['pr_btn_hover_color']; ?>;
		box-shadow: 0 0 0 2px <?php echo $this->options['pr_btn_font_hover_color']; ?> inset, 0 0 1px rgba(0, 0, 0, 0);
		<?php } ?>
		<?php if( isset( $this->options['pr_btn_font_hover_color'] ) && $this->options['pr_btn_font_hover_color'] != '' ) { ?>
		color: <?php echo $this->options['pr_btn_font_hover_color']; ?>;
		<?php } ?>
	}
	
	h3.hndle{
		<?php if( isset( $this->options['wid_hd_bg'] ) && $this->options['wid_hd_bg'] != '' ) { ?>
		background: <?php echo $this->options['wid_hd_bg']; ?>;
		<?php } ?>
		<?php if( isset( $this->options['wid_hd_font_color'] ) && $this->options['wid_hd_font_color'] != '' ) { ?>
		color: <?php echo $this->options['wid_hd_font_color']; ?>;
		<?php } ?>
	}
	
	.handlediv{
		<?php if( isset( $this->options['wid_hd_font_color'] ) && $this->options['wid_hd_font_color'] != '' ) { ?>
		color: <?php echo $this->options['wid_hd_font_color']; ?>;
		<?php } ?>
	}
	
	.postbox, #welcome-panel{
		<?php if( isset( $this->options['wid_bg'] ) && $this->options['wid_bg'] != '' ) { ?>
		background: rgba( <?php echo $this->hex2rgb( $this->options['wid_bg'] ) ?>, <?php echo isset( $this->options['wid_bg_op'] ) && $this->options['wid_bg_op'] != '' ? $this->options['wid_bg_op']/10 : 1 ?> );
		<?php } ?>
		<?php if( isset( $this->options['wid_font_color'] ) && $this->options['wid_font_color'] != '' ) { ?>
		color: <?php echo $this->options['wid_font_color'] ?>;
		<?php } ?>
	}
	
	a{
		<?php if( isset( $this->options['link_color'] ) && $this->options['link_color'] != '' ) { ?>
		color: <?php echo $this->options['link_color']; ?>;
		<?php } ?>
	}
	
	strong .post-com-count span{
		<?php if( isset( $this->options['link_color'] ) && $this->options['link_color'] != '' ) { ?>
		background: <?php echo $this->options['link_color']; ?>;
		<?php } ?>
	}
	
	a:hover{
		<?php if( isset( $this->options['link_hover_color'] ) && $this->options['link_hover_color'] != '' ) { ?>
		color: <?php echo $this->options['link_hover_color']; ?>;
		<?php } ?>
	}
	
	.post-com-count:hover span{
		<?php if( isset( $this->options['link_hover_color'] ) && $this->options['link_hover_color'] != '' ) { ?>
		background: <?php echo $this->options['link_hover_color']; ?>;
		<?php } ?>
	}
	
	strong .post-com-count:after{
		<?php if( isset( $this->options['link_color'] ) && $this->options['link_color'] != '' ) { ?>
		border-top: 5px solid <?php echo $this->options['link_color']; ?>;
		<?php } ?>
	}
	
	.post-com-count:hover:after{
		<?php if( isset( $this->options['link_hover_color'] ) && $this->options['link_hover_color'] != '' ) { ?>
		border-top: 5px solid <?php echo $this->options['link_hover_color']; ?>;
		<?php } ?>
	}
	
	.ac_match, .subsubsub a.current{
		<?php if( isset( $this->options['link_cur_color'] ) && $this->options['link_cur_color'] != '' ) { ?>
		color: <?php echo $this->options['link_cur_color']; ?>;
		<?php } ?>
	}
	
	#adminmenu, #adminmenuback, #adminmenuwrap{
		<?php if( isset( $this->options['menu_bg_color'] ) && $this->options['menu_bg_color'] != '' ) { ?>
		background: rgba( <?php echo $this->hex2rgb( $this->options['menu_bg_color'] ) ?>, <?php echo isset( $this->options['menu_bg_op'] ) && $this->options['menu_bg_op'] != '' ? $this->options['menu_bg_op']/10 : 1 ?> );
		<?php } ?>
	}
	
	#adminmenu li.menu-top:hover, #adminmenu li.opensub > a.menu-top, #adminmenu li > a.menu-top:focus{
		<?php if( isset( $this->options['menu_hover_bg_color'] ) && $this->options['menu_hover_bg_color'] != '' ) { ?>
		background: <?php echo $this->options['menu_hover_bg_color'] ?>;
		<?php } ?>
	}
	#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu{
		<?php if( isset( $this->options['menu_active_bg_color'] ) && $this->options['menu_active_bg_color'] != '' ) { ?>
		background: <?php echo $this->options['menu_active_bg_color'] ?>;
		<?php } ?>
	}
	#collapse-button div:after{
		<?php if( isset( $this->options['menu_font_color'] ) && $this->options['menu_font_color'] != '' ) { ?>
		color: <?php echo $this->options['menu_font_color'] ?>;
		<?php } ?>
	}
	#adminmenu a, #adminmenu div.wp-menu-image:before{
		<?php if( isset( $this->options['menu_font_color'] ) && $this->options['menu_font_color'] != '' ) { ?>
		color: <?php echo $this->options['menu_font_color'] ?>;
		<?php } ?>
	}
	.js .meta-box-sortables .postbox .handlediv:before, .js .sidebar-name .sidebar-name-arrow:before{
		<?php if( isset( $this->options['menu_font_color'] ) && $this->options['menu_font_color'] != '' ) { ?>
		color: <?php echo $this->options['menu_font_color'] ?>;
		<?php } ?>
	}
	#adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu a:hover, #adminmenu li.menu-top > a:focus, #adminmenu li:hover div.wp-menu-image:before{
		<?php if( isset( $this->options['menu_hover_font_color'] ) && $this->options['menu_hover_font_color'] != '' ) { ?>
		color: <?php echo $this->options['menu_hover_font_color'] ?>;
		<?php } ?>
	}
	#collapse-menu:hover, #collapse-menu:hover #collapse-button div:after{
		<?php if( isset( $this->options['menu_hover_font_color'] ) && $this->options['menu_hover_font_color'] != '' ) { ?>
		color: <?php echo $this->options['menu_hover_font_color'] ?>;
		<?php } ?>
	}
	#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu, #adminmenu .current div.wp-menu-image:before, #adminmenu .wp-has-current-submenu div.wp-menu-image:before, #adminmenu a.current:hover div.wp-menu-image:before, #adminmenu a.wp-has-current-submenu:hover div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu:hover div.wp-menu-image:before{
		<?php if( isset( $this->options['menu_active_font_color'] ) && $this->options['menu_active_font_color'] != '' ) { ?>
		color: <?php echo $this->options['menu_active_font_color'] ?>;
		<?php } ?>
	}
	#adminmenu .wp-submenu{
		<?php if( isset( $this->options['submenu_bg_color'] ) && $this->options['submenu_bg_color'] != '' ) { ?>
		background: rgba( <?php echo $this->hex2rgb( $this->options['submenu_bg_color'] ) ?>, 0.9 );
		<?php } ?>
	}
	ul#adminmenu a.wp-has-current-submenu:after, ul#adminmenu>li.current>a.current:after{
		<?php if( isset( $this->options['submenu_bg_color'] ) && $this->options['submenu_bg_color'] != '' ) { ?>
		border-right-color: <?php echo $this->options['submenu_bg_color'] ?>; 
		<?php } ?>
	}
	#wpadminbar{
		<?php if( isset( $this->options['ad_bar_bg_color'] ) && $this->options['ad_bar_bg_color'] != '' ) { ?>
		background: <?php echo $this->options['ad_bar_bg_color'] ?>;
		<?php } ?>
	}
	
	div.updated{
		<?php if( isset( $this->options['up_ntc_bg'] ) && $this->options['up_ntc_bg'] != '' ) { ?>
		background: rgba( <?php echo $this->hex2rgb( $this->options['up_ntc_bg'] ) ?>, 0.9 );
		<?php } ?>
		<?php if( isset( $this->options['up_ntc_font'] ) && $this->options['up_ntc_font'] != '' ) { ?>
		color: <?php echo $this->options['up_ntc_font'] ?>;
		<?php } ?>
		<?php if( isset( $this->options['up_ntc_brd'] ) && $this->options['up_ntc_brd'] != '' ) { ?>
		border-left: 4px solid <?php echo $this->options['up_ntc_brd'] ?>;
		<?php } ?>
	}
	
	div.error{
		<?php if( isset( $this->options['err_ntc_bg'] ) && $this->options['err_ntc_bg'] != '' ) { ?>
		background: rgba( <?php echo $this->hex2rgb( $this->options['err_ntc_bg'] ) ?>, 0.9 );
		<?php } ?>
		<?php if( isset( $this->options['err_ntc_font'] ) && $this->options['err_ntc_font'] != '' ) { ?>
		color: <?php echo $this->options['err_ntc_font'] ?>;
		<?php } ?>
		<?php if( isset( $this->options['err_ntc_brd'] ) && $this->options['err_ntc_brd'] != '' ) { ?>
		border-left: 4px solid <?php echo $this->options['err_ntc_brd'] ?>;
		<?php } ?>
	}
	
	div.update-nag{
		<?php if( isset( $this->options['nag_ntc_bg'] ) && $this->options['nag_ntc_bg'] != '' ) { ?>
		background: rgba( <?php echo $this->hex2rgb( $this->options['nag_ntc_bg'] ) ?>, 0.9 );
		<?php } ?>
		<?php if( isset( $this->options['nag_ntc_font'] ) && $this->options['nag_ntc_font'] != '' ) { ?>
		color: <?php echo $this->options['nag_ntc_font'] ?>;
		<?php } ?>
		<?php if( isset( $this->options['nag_ntc_brd'] ) && $this->options['nag_ntc_brd'] != '' ) { ?>
		border-left: 4px solid <?php echo $this->options['nag_ntc_brd'] ?>;
		<?php } ?>
	}
	<?php if( isset( $this->options['font_col'] ) && $this->options['font_col'] != '' ) { ?>
	.form-table th, .form-wrap label, h1, h2, h3, h4, h5, h6, body, .rssSummary, .displaying-num, #wpfooter, .tablenav .displaying-num{
		color: <?php echo $this->options['font_col']; ?>;
	}
	<?php } ?>
</style>