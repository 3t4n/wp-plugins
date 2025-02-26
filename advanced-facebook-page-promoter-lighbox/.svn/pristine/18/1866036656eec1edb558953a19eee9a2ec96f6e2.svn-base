<?php 
if(get_option('it_afbppl_app_showIn')){ $show_in = get_option('it_afbppl_app_showIn'); $showMeDefault=false; }else{ $show_in = array(); $showMeDefault=true;}
$itafbppl_current_pos = it_afbppl_frontend_imStandingOn();
if($itafbppl_current_pos == 'none'){ $ShowMe = false; }elseif(in_array($itafbppl_current_pos,$show_in)){ $showMe = true; }else{$showMe = false;}
if(get_option('it_afbppl_app_loggedin_user') == '1' && is_user_logged_in()) $showIfLoggedIn = false; else $showIfLoggedIn = true; 
if(($showMe || $showMeDefault) && $showIfLoggedIn):?>
<!--LIGHTBOX STARTED-->
	<div id="itfbppl_overlay" class="itfbppl_overlay" style="<?php if(get_option('it_afbppl_app_color_bg')) echo 'background:'.get_option('it_afbppl_app_color_bg').';';?>"  data-delay="<?php if(get_option('it_afbppl_app_lb_delay')) echo get_option('it_afbppl_app_lb_delay'); else echo 1000;?>" data-show-once="<?php if(get_option('it_afbppl_app_lb_in_day') =='1') echo 1; else echo 0;?>" data-close-overlay="<?php if(get_option('it_afbppl_app_lb_on_click') =='1') echo 1; else echo 0;?>">
	<div class="itfbppl_lightbox_outer">
		<div class="itfbppl_lightbox" style="<?php if(get_option('it_afbppl_app_width_lb')) echo 'max-width:'.((int)get_option('it_afbppl_app_width_lb')+30).'px;'; else echo 'max-width:450px;';?>">
			<a href="javascript:void(0);" class="itfbppl_overlay_close" style="<?php if(get_option('it_afbppl_app_color_bglb')) echo 'background-color:'.get_option('it_afbppl_app_color_bglb').'; color:'.get_option('it_afbppl_app_color_lb').';';?>">x Close</a>
			<div class="itfbppl_lightbox_title">
				<h2 class="itfbppl_lightbox_title_h2" style="<?php if(get_option('it_afbppl_app_color_bglb')) echo 'background:'.get_option('it_afbppl_app_color_bglb').'; color:'.get_option('it_afbppl_app_color_lb').'; border:1px solid '.get_option('it_afbppl_app_color_bglb').';';?>"><?php if( get_option('it_afbppl_title') ) echo esc_attr( get_option('it_afbppl_title') ); else echo 'Like Us On Facebook';?></h2>
			</div>
			<div class="itfbppl_lightbox_inner">
				<iframe src="https://www.facebook.com/plugins/page.php?href=<?php if(get_option('it_afbppl_fburl')) echo get_option('it_afbppl_fburl'); else echo 'https://www.facebook.com/infotheme';?>&tabs<?php if(get_option('it_afbppl_fbtab')) echo '='.get_option('it_afbppl_fbtab');?>&width=<?php if(get_option('it_afbppl_app_width_lb'))echo get_option('it_afbppl_app_width_lb'); else echo '420';?>&height=<?php if(get_option('it_afbppl_app_height_lb'))echo get_option('it_afbppl_app_height_lb'); else echo '214';?>&small_header=<?php if(get_option('it_afbppl_app_fb_sm_header') == '1') echo 'true'; else echo 'false';?>&adapt_container_width=true&hide_cover=<?php if(get_option('it_afbppl_app_fb_hide_cover') == '1') echo 'true'; else echo 'false';?>&show_facepile=<?php if(get_option('it_afbppl_app_fb_faces')) echo 'false'; else echo 'true';?>&appId=<?php if(get_option('it_afbppl_appid'))echo get_option('it_afbppl_appid'); else echo '1585193055132646';?>" width="<?php if(get_option('it_afbppl_app_width_lb'))echo get_option('it_afbppl_app_width_lb'); else echo '420';?>" height="<?php if(get_option('it_afbppl_app_height_lb')){ echo get_option('it_afbppl_app_height_lb'); }elseif(get_option('it_afbppl_app_fb_faces')){ echo '125';}else{ echo '214';}?>" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
			</div>
		</div>
		</div>
	</div>
<!--LIGHTBOX END-->
<?php endif;?>