<?php
/*
Plugin Name: Floating Menu
Version: 1.0.1
Plugin URI: https://logicsbuffer.com/floating-menu-wordpress-plugin/
Description: Highly Customizeable Floating menu Creator.
Author: Logics Buffer & WebNem
Author URI: http://logicsbuffer.com
Text Domain: logics-buffer
Domain Path: logicsBuffer
License: GPL v3
*/

/**
 * Required plugin files
 */
require_once 'ssb-main.php';
require_once 'ssb-ui.php';

/*
add_action('init', 'icons_init');
function icons_init() {
    add_shortcode('show_icons', 'icons_menu');
}
*/

add_action('init', 'icons_shortcode_init');
function icons_shortcode_init() {
    add_shortcode('show_icons_raw', 'icons_menu_raw');
}


function icons_menu_raw($atts) {
	global $ssb_menu;
	$ssb_buttons   = get_option( 'ssb_buttons' );
	$ssb_settings  = get_option( 'ssb_settings' );
	$ssb_showoncpt = get_option( 'ssb_showoncpt' );
	$btns_order = explode( '&', str_replace( 'sort=', '', $ssb_buttons['btns_order'] ) );
	ob_start();
				?>

                <div id="ssb-container_raw"
                  class="<?php
      				     //echo ( isset( $ssb_settings['btn_pos'] ) && $ssb_settings['btn_pos'] == 'left' ) ? 'ssb-btns-left' : 'ssb-btns-right';
      				    // echo ( isset( $ssb_settings['btn_disable_mobile'] ) ) ? ' ssb-disable-on-mobile' : '';
      				     //echo ( isset( $this->settings['btn_anim'] ) && $this->settings['btn_anim'] == 'slide' ) ? ' ssb-anim-slide' : '';
      				     //echo ( isset( $ssb_settings['btn_anim'] ) && $ssb_settings['btn_anim'] == 'icons' ) ? ' ssb-anim-icons' : '';
      				  ?>">

						<?php
						// Buttons loop + ordering
						foreach ( $btns_order AS $btn_key => $btn_id ) {
							?>
						<?php
						}
						?>
						<?php
						$menu_font_title = $ssb_menu['stickymenu_title'];
						$menu_logo_url = $ssb_menu['menu_image_main']['url'];

							?>

                  <li class="ssb-share-btn-raw">
									<div id="inner_manu_raw" style="background: <?php echo $ssb_menu['menu_bg'];?> ; ">
										<div id="menu_title_shortcode" class="menu_title"><?php echo $menu_font_title;?></div>

                  <div id="menu_inner_raw">
                    <ul class="custom_menu_list">

										<?php
										$menu_array = $ssb_menu['stickymenu_items'];
										$menu_links = $ssb_menu['stickymenu_links'];
                    $menu_logo_href = $ssb_menu['menu_logourl'];
										$final_arr = array_combine($menu_array, $menu_links);

										foreach($final_arr as $menu_array=>$menu_links){
										?>
										<li>

											<a href="<?php echo $menu_links; ?>">
											<?php
											$trimmed_menuli = trim($menu_array);
											echo $trimmed_menuli;
											?>
											</a>
										</li>
										<?php
										} ?>
										</ul>

										<div class="menu_logo_main"><a style="box-shadow: none;" href="<?php echo $menu_logo_href;?>"><img style="box-shadow: none;" class="logo_image_size" src="<?php echo $menu_logo_url;?>"></a></div>
                  </div>
									</div>
                      </li>

							<?php
						?>
                    </ul>
                </div>
				<?php
				global $ssb_menu;

				$menu_titlefontsize = $ssb_menu['title_font_family']['font-size'];
				$menu_titlefontweight = $ssb_menu['title_font_family']['font-weight'];
				$menu_titlefontfamily = $ssb_menu['title_font_family']['font-family'];
				$menu_titlefontcolor = $ssb_menu['title_font_family']['color'];
				$menu_titlealign = $ssb_menu['title_font_family']['text-align'];

				//print_r($ssb_menu['title_font_family']);

				$menu_font_size = $ssb_menu['menu_font_styling']['font-size'];
				$menu_font_weight = $ssb_menu['menu_font_styling']['font-weight'];
				$menu_font_family = $ssb_menu['menu_font_styling']['font-family'];
				$menu_item_fontcolor = $ssb_menu['menu_font_styling']['color'];
				$menu_bg = $ssb_menu['menu_bg_main'];
				$logo_width = $ssb_menu['logo_dimensions']['width'];
				$logo_height = $ssb_menu['logo_dimensions']['height'];
				$logo_units = $ssb_menu['logo_dimensions']['units'];
        		$menu_items_hover = $ssb_menu['menu_items_hover'];
        		$menu_itemsalign = $ssb_menu['menu_font_styling']['text-align'];

        echo '<style>
        .logo_image_size{
					width: '.$logo_width.';
				}
        .logo_image_size{
					height: '.$logo_height.';
				}

        .custom_menu_list li a:hover{
					color: '.$menu_items_hover.' !important;
				}
        .custom_menu_list li a{
					font-size: '.$menu_font_size.';
				}

				.custom_menu_list li a{
					font-weight: '.$menu_font_weight.';
				}

				.custom_menu_list li a{
					font-family: '.$menu_font_family.';
				}

				.custom_menu_list li a{
					color: '.$menu_item_fontcolor.' !important;
				}
				.menu_title{
					font-size: '.$menu_titlefontsize.';
				}
				.menu_title{
					text-align: '.$menu_titlealign.';
				}
				ul.custom_menu_list li{
					text-align: '.$menu_itemsalign.';
				}

				.menu_title{
					font-weight: '.$menu_titlefontweight.';
				}

				.menu_title{

					font-family: '.$menu_titlefontfamily.';

				}

				.menu_title{

					color: '.$menu_titlefontcolor.';

				}

				div#inner_manu {
					background: '.$menu_bg.';
				}

				div#inner_manu_raw {
					background: '.$menu_bg.';
					padding:10px;
				}
				div#ssb-container {
					background: '.$menu_bg.';
				}


				</style>';?>

				<?php

	return ob_get_clean();
}





/**
 * Plugin Activation
 */
function ssb_activate() {

	$ssb_options = get_option( 'ssb_settings' );

	$default_options = array(
		'show_on_frontpage' => 1,
		'show_on_posts' => 1,
		'show_on_pages' => 1
	);

	$new_settings = array_merge($ssb_options, $default_options);

	update_option( 'ssb_settings', $new_settings );

	/** @var  $default_options_showoncpt intializing empty array */
	$default_options_showoncpt = array();
	/** @var  $registered_cpts getting registered CPTs */
	$registered_cpts = get_post_types(array('_builtin' => false), 'objects');
	foreach ($registered_cpts as $registered_cpt){

		$default_options_showoncpt[] = $registered_cpt->name;

	}

	update_option('ssb_showoncpt', $default_options_showoncpt);

}

register_activation_hook( __FILE__, 'ssb_activate' );


/**
 * SSB Instance
 */
$sm = new sm_main;
