<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      
function hfc_css() {
  
// ====================================== HTML Settings ================================>

	$hfc_options_trigger = get_theme_mod('hfc_options_trigger', 'no');
	 $hfc_basic_fontcolor_1_trigger = get_theme_mod('hfc_basic_fontcolor_1_trigger', 'no');
	 $hfc_h1_fontcolor_2a_trigger = get_theme_mod('hfc_h1_fontcolor_2a_trigger', 'no');
	 $hfc_h2_fontcolor_2b_trigger = get_theme_mod('hfc_h2_fontcolor_2b_trigger', 'no');
	 $hfc_h3_fontcolor_2c_trigger = get_theme_mod('hfc_h3_fontcolor_2c_trigger', 'no');
	 $hfc_h4_fontcolor_2d_trigger = get_theme_mod('hfc_h4_fontcolor_2d_trigger', 'no');
	 $hfc_h5_fontcolor_2e_trigger = get_theme_mod('hfc_h5_fontcolor_2e_trigger', 'no');
	 $hfc_h6_fontcolor_2f_trigger = get_theme_mod('hfc_h6_fontcolor_2f_trigger', 'no');

	 $hfc_links_fontcolor_3_trigger = get_theme_mod('hfc_links_fontcolor_3_trigger', 'no');
	 $hfc_linkhover_fontcolor_4_trigger = get_theme_mod('hfc_linkhover_fontcolor_4_trigger', 'no');
	 $hfc_nav_a_fontcolor_5_trigger = get_theme_mod('hfc_nav_a_fontcolor_5_trigger','no');
	 $hfc_nav_ahover_fontcolor_6_trigger = get_theme_mod('hfc_nav_ahover_fontcolor_6_trigger','no');
	 $hfc_subnav_a_fontcolor_7_trigger = get_theme_mod( 'hfc_subnav_a_fontcolor_7_trigger','no' );
	 $hfc_subnav_ahover_fontcolor_8_trigger = get_theme_mod( 'hfc_subnav_ahover_fontcolor_8_trigger', 'no' );
	 $hfc_btn_fontcolor_9_trigger = get_theme_mod( 'hfc_btn_fontcolor_9_trigger','no' );
	 $hfc_btn_hover_fontcolor_10_trigger = get_theme_mod( 'hfc_btn_hover_fontcolor_10_trigger','no' );
	 $hfc_footer_fontcolor_11_trigger = get_theme_mod( 'hfc_footer_fontcolor_11_trigger','no' );
	 $hfc_footer_heading_fontcolor_12_trigger = get_theme_mod( 'hfc_footer_heading_fontcolor_12_trigger','no' ); 
?>	
<style>

<?php   if ( $hfc_basic_fontcolor_1_trigger == "yes" ) { $hfc_basic_fontcolor_1 = get_theme_mod('hfc_basic_fontcolor_1', '#444444'); ?>
	
    body, div, p, span, i, li{ 
         color: <?php echo esc_html( $hfc_basic_fontcolor_1 ); ?> !important;
    } <?php } else{ } 


        if ( $hfc_h1_fontcolor_2a_trigger == "yes" ) { $hfc_h1_fontcolor_2a = get_theme_mod('hfc_h1_fontcolor_2a', '#666666'); ?>

    h1{ 
        color: <?php echo esc_html( $hfc_h1_fontcolor_2a ); ?> !important;
    } <?php } else{ }


        if ( $hfc_h2_fontcolor_2b_trigger == "yes" ) { $hfc_h2_fontcolor_2b = get_theme_mod('hfc_h2_fontcolor_2b', '#666666'); ?>

    h2{ 
        color: <?php echo esc_html( $hfc_h2_fontcolor_2b ); ?> !important;
    } <?php } else{ }


        if ( $hfc_h3_fontcolor_2c_trigger == "yes" ) { $hfc_h3_fontcolor_2c = get_theme_mod('hfc_h3_fontcolor_2c', '#666666'); ?>

    h3{ 
        color: <?php echo esc_html( $hfc_h3_fontcolor_2c ); ?> !important;
    } <?php } else{ }

        if ( $hfc_h4_fontcolor_2d_trigger == "yes" ) { $hfc_h4_fontcolor_2d = get_theme_mod('hfc_h4_fontcolor_2d', '#666666'); ?>

    h4{ 
        color: <?php echo esc_html( $hfc_h4_fontcolor_2d ); ?> !important;
    } <?php } else{ }

        if ( $hfc_h5_fontcolor_2e_trigger == "yes" ) { $hfc_h5_fontcolor_2e = get_theme_mod('hfc_h5_fontcolor_2e', '#666666'); ?>

    h5{ 
        color: <?php echo esc_html( $hfc_h5_fontcolor_2e ); ?> !important;
    } <?php } else{ }


        if ( $hfc_h6_fontcolor_2f_trigger == "yes" ) { $hfc_h6_fontcolor_2f = get_theme_mod('hfc_h6_fontcolor_2f', '#666666'); ?>

    h6{ 
        color: <?php echo esc_html( $hfc_h6_fontcolor_2f ); ?> !important;
    } <?php } else{ }


    	 if ( $hfc_links_fontcolor_3_trigger == "yes" ) { $hfc_links_fontcolor_3 = get_theme_mod('hfc_links_fontcolor_3', '#cccccc'); ?>

    a, a:visited, a.active{ 
        color: <?php echo esc_html( $hfc_links_fontcolor_3 ); ?> !important;
    } <?php } else{ } 

    	 if ( $hfc_linkhover_fontcolor_4_trigger == "yes" ) { $hfc_linkhover_fontcolor_4 = get_theme_mod('hfc_linkhover_fontcolor_4', '#aaaaaa'); ?>
    	 
    a:hover{ 
            color: <?php echo esc_html( $hfc_linkhover_fontcolor_4 ); ?> !important;
    } <?php } else{ } 

    	 if ( $hfc_nav_a_fontcolor_5_trigger == "yes" ) { $hfc_nav_a_fontcolor_5 = get_theme_mod('hfc_nav_a_fontcolor_5', '#aaaaaa'); ?>

    header nav li.menu-item a, 
    header nav li.menu-item a:visited{ 
        color: <?php echo esc_html( $hfc_nav_a_fontcolor_5 ); ?> !important;
    } <?php } else{ } 
        
    	 if ( $hfc_nav_ahover_fontcolor_6_trigger == "yes" ) { $hfc_nav_ahover_fontcolor_6 = get_theme_mod('hfc_nav_ahover_fontcolor_6', '#aaaaaa'); ?>

    header nav li.menu-item a:hover, 
    header nav li.menu-item a.active,
    header nav li.menu-item a.focused{ 
         color: <?php echo esc_html( $hfc_nav_ahover_fontcolor_6 ); ?> !important;
    } <?php } else{ } 
        
    	 if ( $hfc_subnav_a_fontcolor_7_trigger == "yes" ) { $hfc_subnav_a_fontcolor_7 = get_theme_mod('hfc_subnav_a_fontcolor_7', '#aaaaaa'); ?>

    header nav li.menu-item .sub-menu li a,
    header nav li.menu-item .sub-menu li a:visited{ 
        color: <?php echo esc_html( $hfc_subnav_a_fontcolor_7 ); ?> !important;
    } <?php } else{ } 
        
    	 if ( $hfc_subnav_ahover_fontcolor_8_trigger == "yes" ) { $hfc_subnav_ahover_fontcolor_8 = get_theme_mod('hfc_subnav_ahover_fontcolor_8', '#aaaaaa'); ?>

    header nav li.menu-item .sub-menu li a:hover,
    header nav li.menu-item .sub-menu li a.active,
    header nav li.menu-item .sub-menu li a.focused{ 
        color: <?php echo esc_html( $hfc_subnav_ahover_fontcolor_8 ); ?> !important;
    } <?php } else{ } 
        
    	 if ( $hfc_btn_fontcolor_9_trigger == "yes" ) { $hfc_btn_fontcolor_9 = get_theme_mod('hfc_btn_fontcolor_9', '#aaaaaa'); ?>

    button, .btn, input[type='submit']{ 
        color: <?php echo esc_html( $hfc_btn_fontcolor_9 ); ?> !important;
    } <?php } else{ } 
        
    	 if ( $hfc_btn_hover_fontcolor_10_trigger == "yes" ) { $hfc_btn_hover_fontcolor_10 = get_theme_mod('hfc_btn_hover_fontcolor_10', '#aaaaaa'); ?>

    button:hover, .btn:hover, input[type='submit']:hover{ 
        color: <?php echo esc_html( $hfc_btn_hover_fontcolor_10 ); ?> !important;
    } <?php } else{ } 
        
    	 if ( $hfc_footer_fontcolor_11_trigger == "yes" ) { $hfc_footer_fontcolor_11 = get_theme_mod('hfc_footer_fontcolor_11', '#aaaaaa'); ?>

    footer, #footer, .footer, .widget, footer p, #footer p, footer li, #footer li{ 
        color: <?php echo esc_html( $hfc_footer_fontcolor_11 ); ?> !important;
    } <?php } else{ } 
        
    	 if ( $hfc_footer_heading_fontcolor_12_trigger == "yes" ) { $hfc_footer_heading_fontcolor_12 = get_theme_mod('hfc_footer_heading_fontcolor_12', '#aaaaaa'); ?>

    footer h1, footer h2, footer h3, footer h4, footer h5, footer h6,
    #footer h1, #footer h2, #footer h3, #footer h4, #footer h5, #footer h6,
    .footer h1, .footer h2, .footer h3, .footer h4, .footer h5, .footer h6, 
    .widget h1, .widget h2, footer h3, .widget h4, .widget h5, .widget h6{ 
        color: <?php echo esc_html( $hfc_footer_heading_fontcolor_12 ); ?> !important;
    } <?php } else{ } 
        
?>	
</style>
<?php  
  
}

add_action('wp_head', 'hfc_css');
?>