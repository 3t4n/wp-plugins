<?php

/**
 * Floating Sidebar Menu By Logics Buffer
 *
 * User Interface class which will contain
 */

class ssb_ui {

	public function icons() {
  global $ssb_menu; 

		// Show on
		if ( 
         ($ssb_menu['menu_show_on_pages'] && $ssb_menu['menu_show_on_pages'] && get_post_type() == 'page' && ! is_front_page())  ||
		     ( $ssb_menu['menu_show_on_posts'] && $ssb_menu['menu_show_on_posts'] && get_post_type() == 'post')   ||
		     ( $ssb_menu['menu_show_on_frontpage'] && $ssb_menu['menu_show_on_frontpage'] && is_front_page())  || 
         (!empty($ssb_menu['menu_show_on_cpt'] && in_array( get_post_type(), $ssb_menu['menu_show_on_cpt'])   ))) {

				?>
        <div id="ssb-container"
             class="ssb-btns-<?php echo $ssb_menu['menu_position']; ?> <?php if($ssb_menu['menu_disable_mobile']) { echo 'ssb-disable-on-mobile'; } ?> ">
        <div id="side_icon_hover" class="">

        <div id="ssb-btn" class="ssb_main_icon">
          <a href="#"><?php echo '<i class="'.$ssb_menu['menu_icon_main'].'"></i>' ?></a>																														
        </div>
       
        					
        <?php	$menu_font_title = $ssb_menu['stickymenu_title'];
				$menu_logo_url = $ssb_menu['menu_image_main']['url']; ?>
               
				<div id="inner_manu">					
					<div id="menu_title"><?php echo $menu_font_title;?></div>
					<div id="custom_menu_list">
						<?php
						$menu_array = $ssb_menu['stickymenu_items'];
						$menu_links = $ssb_menu['stickymenu_links'];
						
						$final_arr = array_combine($menu_array, $menu_links);
						foreach($final_arr as $menu_array=>$menu_links){									
						//foreach($menu_array as $menu_items){
						?>
						<div>
							<a href="<?php echo $menu_links; ?>">
							<?php 
							$trimmed_menuli = trim($menu_array);
							echo $trimmed_menuli;
							?>	 
							</a>
						</div>
						<?php
						} ?>
					</div>
					<div id="menu_logo_main"><img src="<?php echo $menu_logo_url;?>"></div>										
				</div>
							
        </div>
				
        </div>
				
				<?php 
				global $ssb_menu; 
				$menu_titlefontsize = $ssb_menu['title_font_family']['font-size'];
				$menu_titlefontweight = $ssb_menu['title_font_family']['font-weight'];
				$menu_titlefontfamily = $ssb_menu['title_font_family']['font-family'];				
        $menu_titlefontcolor = $ssb_menu['title_font_family']['color'];       
				$menu_title_align = $ssb_menu['title_font_family']['text-align'];				
				
				$menu_font_size = $ssb_menu['menu_font_styling']['font-size'];
				$menu_font_weight = $ssb_menu['menu_font_styling']['font-weight'];
				$menu_font_family = $ssb_menu['menu_font_styling']['font-family'];
        $menu_item_fontcolor = $ssb_menu['menu_font_styling']['color'];
				$menu_item_align = $ssb_menu['menu_font_styling']['text-align'];

        $menu_bg = $ssb_menu['menu_bg_main'];
        $menu_z_index = $ssb_menu['menu_zindex_s'];
				
				echo '<style> 
			
				#custom_menu_list a{
					display: block;
          color: '.$menu_item_fontcolor.' !important;
          font-family: '.$menu_font_family.';
          font-weight: '.$menu_font_weight.';
          font-size: '.$menu_font_size.';
          text-align: '.$menu_item_align.';
				}
				
				#menu_title{
					font-size: '.$menu_titlefontsize.';
          font-weight: '.$menu_titlefontweight.';
          font-family: '.$menu_titlefontfamily.';
          color: '.$menu_titlefontcolor.';
          text-align: '.$menu_title_align.';
				}				
				
        #ssb-container{
					background: '.$menu_bg.';
          z-index: '.$menu_z_index.';
				}
				</style>';?>
				
				<?php
			//}
		}

	}

}