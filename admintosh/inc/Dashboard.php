<?php
namespace Admintosh\Inc;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */
 
 class Dashboard
{

    /**
     * Start up
     */
    public function __construct()
    {
      
    add_action( 'wp_before_admin_bar_render', [ $this, 'dashboard_style' ] );

    }

    public function dashboard_style() {
        $opt = get_option( ADMINTOSH_OPTION_NAME );
        $topBarBgColor = !empty( $opt['adminbar_bg_color'] ) ? 'background: '.esc_attr( $opt['adminbar_bg_color'] ).';' : '';
        $topBarLinkHovBgColor = !empty( $opt['adminbar_link_hv_bg_color'] ) ? 'background: '.esc_attr( $opt['adminbar_link_hv_bg_color'] ).';' : '';
        $topBarLinkHovColor = !empty( $opt['adminbar_link_hv_color'] ) ? 'color: '.esc_attr( $opt['adminbar_link_hv_color'] ).' !important;' : '';
        $topBarTextColor = !empty( $opt['adminbar_text_color'] ) ? 'color: '.esc_attr( $opt['adminbar_text_color'] ).';' : '';
        $topBarLinkColor = !empty( $opt['adminbar_link_color'] ) ? 'color: '.esc_attr( $opt['adminbar_link_color'] ).' !important;' : '';
        $topBarlogo    = !empty( $opt['top_bar_logo'] ) ? 'background-image: url('.esc_url( $opt['top_bar_logo'] ).') !important;background-repeat: no-repeat;background-size: contain;background-position: center center;' : '';
        $tbLogoWidth   = !empty( $opt['tb_logo_width'] ) ?  'width:'.esc_attr( $opt['tb_logo_width'] ).'px;' : 'width:100px;';
        $tbLogoHeight  = !empty( $opt['tb_logo_height'] ) ? 'height:'.esc_attr( $opt['tb_logo_height'] ).'px;' : 'height:32px;';
        $tbLogoMargin  = adtosh_settings_margin( $opt, 'tb_logo_margin' );
        
        //
        $adminMenubgColor = !empty( $opt['admin_menu_bg_color'] ) ? 'background: '.esc_attr( $opt['admin_menu_bg_color'] ).' !important;' : '';
        $adminMenuHovBgColor = !empty( $opt['admin_menu_hov_bg_color'] ) ? 'background: '.esc_attr( $opt['admin_menu_hov_bg_color'] ).' !important;' : '';
        $adminMenuTextColor = !empty( $opt['admin_menu_text_color'] ) ? 'color: '.esc_attr( $opt['admin_menu_text_color'] ).' !important;' : '';
        $adminMenuHovLinkColor = !empty( $opt['admin_menu_hov_link_color'] ) ? 'color: '.esc_attr( $opt['admin_menu_hov_link_color'] ).' !important;' : '';
        $adminSubMenubgColor = !empty( $opt['admin_menu_sub_bg_color'] ) ? 'background: '.esc_attr( $opt['admin_menu_sub_bg_color'] ).' !important;' : '';
        $adminMenuSubLinkColor = !empty( $opt['admin_menu_sub_link_color'] ) ? 'color: '.esc_attr( $opt['admin_menu_sub_link_color'] ).' !important;' : '';
        ?>
        <style type="text/css">
            /***** Top Bar *******/
            <?php if( !empty( $topBarlogo ) ): ?>
            #wpadminbar #wp-admin-bar-wp-logo > .ab-item {
                <?php echo esc_attr( $topBarlogo.$tbLogoWidth.$tbLogoHeight.$tbLogoMargin ); ?>
            }
            @media screen and (max-width: 782px) {
                #wpadminbar #wp-admin-bar-wp-logo > .ab-item {
                    height: 46px;
                    min-width: 240px;
                }
            }
            #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
                background-position: 0 0;
                color:rgba(0, 0, 0, 0);
                content: "";
                
            }
            <?php endif; ?>
            #wpadminbar {
                <?php echo esc_attr( $topBarBgColor.$topBarTextColor ); ?>
            }
            #wpadminbar .ab-empty-item, 
            #wpadminbar a.ab-item, 
            #wpadminbar>#wp-toolbar span.ab-label, 
            #wpadminbar>#wp-toolbar span.noticon {
                <?php echo esc_attr( $topBarLinkColor ); ?>
            }
            #wpadminbar #adminbarsearch:before, 
            #wpadminbar .ab-icon:before, 
            #wpadminbar .ab-item:before {
                <?php echo esc_attr( $topBarLinkColor ); ?>
            }
            #wpadminbar .quicklinks .ab-sub-wrapper .menupop.hover>a, 
            #wpadminbar .quicklinks .menupop ul li a:focus, 
            #wpadminbar .quicklinks .menupop ul li a:focus strong, 
            #wpadminbar .quicklinks .menupop ul li a:hover, 
            #wpadminbar .quicklinks .menupop ul li a:hover strong, 
            #wpadminbar .quicklinks .menupop.hover ul li a:focus,
            #wpadminbar .quicklinks .menupop.hover ul li a:hover,
            #wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:focus,
            #wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:hover,
            #wpadminbar li #adminbarsearch.adminbar-focused:before, 
            #wpadminbar li .ab-item:focus .ab-icon:before, 
            #wpadminbar li .ab-item:focus:before, 
            #wpadminbar li a:focus .ab-icon:before, 
            #wpadminbar li.hover .ab-icon:before, 
            #wpadminbar li.hover .ab-item:before, 
            #wpadminbar li:hover #adminbarsearch:before, 
            #wpadminbar li:hover .ab-icon:before, 
            #wpadminbar li:hover .ab-item:before, 
            #wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus, 
            #wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover,
            #wpadminbar:not(.mobile)>#wp-toolbar a:focus span.ab-label, 
            #wpadminbar:not(.mobile)>#wp-toolbar li:hover span.ab-label, 
            #wpadminbar>#wp-toolbar li.hover span.ab-label {
                <?php echo esc_attr( $topBarLinkHovColor ); ?>
            }
            
            #wpadminbar .menupop .ab-sub-wrapper, 
            #wpadminbar .shortlink-input,
            #wpadminbar .quicklinks .menupop ul.ab-sub-secondary, #wpadminbar .quicklinks .menupop ul.ab-sub-secondary .ab-submenu,
            #wpadminbar .ab-top-menu>li.hover>.ab-item, 
            #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, 
            #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item, 
            #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus {
                <?php echo esc_attr( $topBarLinkHovBgColor.$topBarLinkHovColor ); ?>
            }
            /**** Sidebar  ****/
            #adminmenu,
            #adminmenuback, 
            #adminmenuwrap {
                <?php echo esc_attr( $adminMenubgColor ); ?>
            }
            #adminmenu li.menu-top:hover, 
            #adminmenu li.opensub>a.menu-top, 
            #adminmenu li>a.menu-top:focus,
            #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, 
            #adminmenu .wp-menu-arrow, 
            #adminmenu .wp-menu-arrow div, 
            #adminmenu li.current a.menu-top, 
            #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu {
                <?php echo esc_attr( $adminMenuHovBgColor.$adminMenuHovLinkColor ); ?>
            }
            #adminmenu li a:focus div.wp-menu-image:before, 
            #adminmenu li.opensub div.wp-menu-image:before, 
            #adminmenu li:hover div.wp-menu-image:before,
            #adminmenu .current div.wp-menu-image:before, 
            #adminmenu .wp-has-current-submenu div.wp-menu-image:before, 
            #adminmenu a.current:hover div.wp-menu-image:before, 
            #adminmenu a.wp-has-current-submenu:hover div.wp-menu-image:before, 
            #adminmenu li.wp-has-current-submenu a:focus div.wp-menu-image:before, 
            #adminmenu li.wp-has-current-submenu.opensub div.wp-menu-image:before, 
            #adminmenu li.wp-has-current-submenu:hover div.wp-menu-image:before,
            #adminmenu .wp-submenu a:focus, 
            #adminmenu .wp-submenu a:hover, 
            #adminmenu a:hover, 
            #adminmenu li.menu-top>a:focus {
                <?php echo esc_attr( $adminMenuHovLinkColor ); ?>
            }

            #adminmenu div.wp-menu-image:before,
            #adminmenu a {
                <?php echo esc_attr( $adminMenuTextColor ); ?>
            }
            #adminmenu .wp-submenu {
                <?php echo esc_attr( $adminSubMenubgColor ); ?>
            }
            #adminmenu .wp-submenu a {
                <?php echo esc_attr( $adminMenuSubLinkColor ); ?>
            }
       </style>
    <?php }




	
}



  