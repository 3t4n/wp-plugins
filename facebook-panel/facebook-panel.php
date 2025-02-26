<?php
/*
	Plugin Name: Facebook Panel | Comment, Like, and Share on Facebook
	Plugin URI: /
	Description: The Facebook Panel plugin sticks a Facebook icon to the left edge of the window, across every page of the site. When the icon is clicked, a panel comes sliding in featuring the official Facebook Like and Share buttons and Comments widget.

	Version: 1.0
	Author: Philippe Rutten
	Author URI: www.linkedin.com/in/philipperutten
	
	
	Copyright 2012 Philippe Rutten  (email : philippe.rutten@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


//	GET CURRENT PAGE ADDRESS
	function curPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	
	
//	LOAD FACEBOOK SDK ONTO WEBSITE
	function loadFbSdk(){
	
		?>
			<div id="fb-root"></div>
			<script>
				(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>
		<?
	}
	

//	LOAD PANEL UI AT THE END OF THE BODY
	function loadPanelUi(){
	
		$shadowUrl		= plugins_url('img/shadow.png',__FILE__);
		$dockIconUrl	= plugins_url('img/icon_facebook.png',__FILE__);
		$href			= curPageURL();
		
		
		$slideType 		= get_option('slide_type');
		if (!isset($slideType) || !$slideType) $slideType = 'under'; // accepts 'under' or 'over'
		
		$panelWidth		= get_option('panel_width');
		if (!isset($panelWidth) || !$panelWidth || $panelWidth <= 0) $panelWidth = 350; // accepts any numeric value as pixel width

		
		$slideSpeed		= 300;			// accepts any numeric value as milisecond duration
		$padding		= 10;			// appects any numeric value as pixel-width padding
		$fbFrameWidth	= $panelWidth - $padding*2;

		?>
			<div id="cnd-root">
				<div id="cnd-dock">
					<img class="cnd-icon" src="<?php echo $dockIconUrl ?>"/>
					<div class="cnd-dock-arrow">
						<div class="cnd-1"></div>
						<div class="cnd-2"></div>
						<div class="cnd-3"></div>
						<div class="cnd-4"></div>
						<div class="cnd-5"></div>
						<div class="cnd-6"></div>
					</div>
				</div>
				<div id="cnd-panel" style="overflow:visible;" data-width="<?php echo $panelWidth?>">
					<div class="cnd-head">
						<div class="cnd-button cnd-close">&laquo;</div>
						<div class="cnd-heading"><em>facebook</em> this</div>
					</div>
					<div class="cnd-body" style="overflow:visible;">
						
						<div class="fb-like" data-send="true" data-layout="standard" data-width="<?php echo $fbFrameWidth ?>" data-show-faces="false" data-action="like" data-colorscheme="light"></div>
						<div class="fb-comments" data-href="<?php echo $href ?>" data-num-posts="10" data-width="<?php echo $fbFrameWidth ?>" data-colorscheme="light" data-mobile="false"></div>
					</div>
					<div class="cnd-shadow" style="background:url('<?php echo $shadowUrl ?>')"><div></div></div>
				</div>
			</div>
			<style>
				.fb-like{
					display:block;
					position:absolute;
					top:0px;
					padding:<?php echo $padding ?>px;
				}
				.fb-comments{
					display:block;
					position:absolute;
					top:40px;
					bottom:0px;
					width:<?php echo $fbFrameWidth-10 ?>px !important;
					padding:<?php echo $padding ?>px;
					overflow:hidden;
				}
			</style>
			<script>
				;(function($){
					$(document).ready(function(){

						var pane = $('#cnd-panel').slideInPane({
							type		: '<?php echo $slideType?>',
							slideSpeed	: <?php echo $slideSpeed?>,
							width		: <?php echo $panelWidth?>
						});
						
						$('#cnd-dock, #cnd-panel .cnd-close').slideInPaneToggle(pane);
						
						$('.fb-comments')
							.mouseover(function(){
								$(this).css('overflow-y','auto')
							})
							.mouseout(function(){
								$(this).css('overflow-y','hidden')
							})
						;
					});
				}(jQuery));
			</script>
		<?
	}
	
	
//	ENQUEUE SCRIPTS
	function loadScripts(){
		wp_enqueue_style( 'fbPanel-css', plugins_url('css/style.php',__FILE__), false );
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script( 'jQuery-slideInPane', plugins_url('js/jquery-slideInPane.min.js',__FILE__), false );
	};

	
//	ADD ACTIONS TO FRONT-END HOOKS ONLY IF PLUGIN ACTIVATED
	$active = get_option('active');
	if (isset($active) && $active){
		add_action('wp_head', 'loadFbSdk');
		add_action('wp_footer', 'loadPanelUi');
		add_action('wp_enqueue_scripts', 'loadScripts');
	};
	
	
//	LOAD ADMIN PAGE AND MENU LINK
	function fbPanel_admin_page() {
		include('facebook-panel-admin.php');
	}  
	function fbPanel_menu_link() {
		add_menu_page("Facebook Panel", "Facebook Panel", 1, "Facebook Panel", "fbPanel_admin_page");  
	}  
	add_action('admin_menu', 'fbPanel_menu_link');  
?>