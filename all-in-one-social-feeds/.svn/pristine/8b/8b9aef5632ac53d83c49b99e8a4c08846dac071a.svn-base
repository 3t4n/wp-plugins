
<div class="all-in-one">
	<div class="container"> 
		<ul class="tabs">
		<?php if(get_option('netgo_fb_enable') == 'y'){ ?>
			<li class="aiosf-facebook"><a href="#tab1">FB</a></li>
		<?php } ?>
		
		<?php if(get_option('netgo_tw_enable') == 'y'){ ?>
			<li class="aiosf-twitter"><a href="#tab2">TW</a></li>
		<?php } ?>
		
		<?php if(get_option('netgo_ins_enable') == 'y'){ ?>
			<li class="aiosf-instagram"><a href="#tab3">In</a></li>
		<?php } ?>
		
		<?php if(get_option('netgo_pi_enable') == 'y'){ ?>
			<li class="aiosf-pintrest"><a href="#tab4">Pi</a></li> 
		<?php } ?>
		
		<?php if(get_option('netgo_yt_enable') == 'y'){ ?>
			<li class="aiosf-youtube"><a href="#tab5">YT</a></li> 
		<?php } ?> 
		</ul> 
		
		<div class="tab_container">
			<?php if(get_option('netgo_fb_enable') == 'y'){ ?>
				<div id="tab1" class="tab_content">
					<h4>FaceBook</h4>
					<div class="fb-feeds">
						<?php 
						require_once AIOSF_INCLUDE_DIR."/fb/facebook.php";
						require_once AIOSF_PAGE_DIR."/default/fb.php"; ?>
					</div>	  
				</div>
			<?php } ?> 
			
			<?php if(get_option('netgo_tw_enable') == 'y'){ ?>
				<div id="tab2" class="tab_content">
					<h4>Twitter</h4>
					<div class="tw-feeds">
						<?php 
						require_once AIOSF_INCLUDE_DIR."/tw/twitter.php";
						require_once AIOSF_PAGE_DIR."/default/tw.php"; ?>
					</div>
				</div>
			<?php } ?> 
			
			<?php if(get_option('netgo_ins_enable') == 'y'){ ?>
			<div id="tab3" class="tab_content"> 
				<h4>Instagram</h4>
				<div class="ins-feeds">
					<?php 
					require_once AIOSF_INCLUDE_DIR."/in/instagram.php";
					require_once AIOSF_PAGE_DIR."/default/in.php"; ?>
				</div>
			</div>
			<?php } ?> 
			
			<?php if(get_option('netgo_pi_enable') == 'y'){ ?>
			<div id="tab4" class="tab_content">
				<h4>Pinterest</h4>
				<div class="pin-feeds">
					<?php 
					require_once AIOSF_INCLUDE_DIR."/pi/pinterest.php";
					require_once AIOSF_PAGE_DIR."/default/pi.php"; ?>
				</div>
			</div>
			<?php } ?> 
			
			<?php if(get_option('netgo_yt_enable') == 'y'){ ?>
			<div id="tab5" class="tab_content">
				<h4>YouTube</h4>
				<div class="yt-video">
					<?php 
					require_once AIOSF_INCLUDE_DIR."/yt/youtube.php";
					require_once AIOSF_PAGE_DIR."/default/yt.php"; ?>
				</div>
			</div>
			<?php } ?>  
			
		</div> 
	</div>				  
</div>