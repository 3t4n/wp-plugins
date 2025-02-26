<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      
function habc_css() {
  
// ====================================== HTML Settings ================================>

	 $habc_body_bg_color_1_trigger = get_theme_mod( 'habc_body_bg_color_1_trigger','no' );
	 $habc_header_bg_color_2_trigger = get_theme_mod( 'habc_header_bg_color_2_trigger','no' );
	 $habc_footer_bg_color_3_trigger = get_theme_mod( 'habc_footer_bg_color_3_trigger','no' );
	 $habc_nav_bg_color_4_trigger = get_theme_mod( 'habc_nav_bg_color_4_trigger','no' );
	 $habc_nav_li_hover_bg_color_5_trigger = get_theme_mod( 'habc_nav_li_hover_bg_color_5_trigger','no' );
	 $habc_nav_dropdown_bg_color_6_trigger = get_theme_mod( 'habc_nav_dropdown_bg_color_6_trigger','no' );
	 $habc_dd_li_hover_bg_color_7_trigger = get_theme_mod( 'habc_dd_li_hover_bg_color_7','no' );
	 $habc_btn_bg_color_8_trigger = get_theme_mod( 'habc_btn_bg_color_8_trigger','no' );
	 $habc_btn_hover_bg_color_9_trigger = get_theme_mod( 'habc_btn_hover_bg_color_9_trigger','no' );
	
 ?>  
<style>

<?php

    if ( $habc_body_bg_color_1_trigger == "yes" ) { $habc_body_bg_color_1 = get_theme_mod('habc_body_bg_color_1', '#FFF'); ?>
    
    body{ 
         background-color: <?php echo esc_html( $habc_body_bg_color_1 ); ?> !important;
    } <?php } else{ } 

   if ( $habc_header_bg_color_2_trigger == "yes" ) { $habc_header_bg_color_2 = get_theme_mod('habc_header_bg_color_2', '#FFF'); ?>
	
    header{ 
         background-color: <?php echo esc_html( $habc_header_bg_color_2 ); ?> !important;
    } <?php } else{ } 

 if ( $habc_footer_bg_color_3_trigger == "yes" ) { $habc_footer_bg_color_3 = get_theme_mod('habc_footer_bg_color_3', '#FFF'); ?>
	
    footer, #footer{ 
         background-color: <?php echo esc_html( $habc_footer_bg_color_3 ); ?> !important;
    } <?php } else{ } 

 if ( $habc_nav_bg_color_4_trigger == "yes" ) { $habc_nav_bg_color_4 = get_theme_mod('habc_nav_bg_color_4', '#FFF'); ?>
	
    nav{ 
         background-color: <?php echo esc_html( $habc_nav_bg_color_4 ); ?> !important;
    } <?php } else{ } 

if ( $habc_nav_li_hover_bg_color_5_trigger == "yes" ) { $habc_nav_li_hover_bg_color_5 = get_theme_mod( 'habc_nav_li_hover_bg_color_5','#FFF' );?>

	nav li:hover{
		background-color: <?php echo esc_html( $habc_nav_li_hover_bg_color_5 ); ?> !important;
	} <?php } else{ }

 if ( $habc_nav_dropdown_bg_color_6_trigger == "yes" ) { $habc_nav_dropdown_bg_color_6 = get_theme_mod('habc_nav_dropdown_bg_color_6', '#FFF'); ?>
	
    .sub-menu{ 
         background-color: <?php echo esc_html( $habc_nav_dropdown_bg_color_6 ); ?> !important;
    } <?php } else{ } 

 if ( $habc_dd_li_hover_bg_color_7_trigger == "yes" ) { $habc_dd_li_hover_bg_color_7 = get_theme_mod('habc_dd_li_hover_bg_color_7', '#FFF'); ?>
	
    .sub-menu li:hover{ 
         background-color: <?php echo esc_html( $habc_dd_li_hover_bg_color_7 ); ?> !important;
    } <?php } else{ } 


 if ( $habc_btn_bg_color_8_trigger == "yes" ) { $habc_btn_bg_color_8 = get_theme_mod('habc_btn_bg_color_8', '#FFF'); ?>
	
   button, .btn, input[type="submit"],
   .elementor-widget-button .elementor-button, .elementor-button{ 
         background-color: <?php echo esc_html( $habc_btn_bg_color_8 ); ?> !important;
    } <?php } else{ } 

 if ( $habc_btn_hover_bg_color_9_trigger == "yes" ) { $habc_btn_hover_bg_color_9 = get_theme_mod('habc_btn_hover_bg_color_9', '#FFF'); ?>
	
   button:hover, .btn:hover, input[type="submit"]:hover,
   .elementor-widget-button .elementor-button:hover, .elementor-button:hover{ 
         background-color: <?php echo esc_html( $habc_btn_hover_bg_color_9 ); ?> !important;
    } <?php } else{ } 


?>

</style>
<?php  
  
}

add_action('wp_head', 'habc_css');
?>