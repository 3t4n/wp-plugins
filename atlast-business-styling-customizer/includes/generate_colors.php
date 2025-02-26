<?php
// Prevent direct file access.
if (!defined('ABSPATH')) {
    die();
}
/**
 * Generate the CSS
 *
 * Generate the color CSS and inline it!
 *
 * @package    Absc
 * @subpackage Absc/includes
 * @author     ArchimidisM <info@archimidismertzanos.me>
 */

if (!function_exists('absc_return_the_colors')):
    function absc_return_the_colors()
    {

        $allNewCSS = array();
        $prefix = 'absc_';
        /*
         * Table containing the top bar styles.
         */
        $asbc_top_bar_styles = array(
            '.topbar-area { background:' => sanitize_hex_color(get_theme_mod($prefix . 'top_bar_bg_color', '')),
            '.topbar-area:not(a){color: ' => sanitize_hex_color(get_theme_mod($prefix . 'top_bar_txt_color', '')),
            '.topbar-area a{color: ' => sanitize_hex_color(get_theme_mod($prefix . 'top_bar_links_color', '')),
            '.topbar-area a:hover{color:' => sanitize_hex_color(get_theme_mod($prefix . 'top_bar_links_hover_color', ''))
        );
        $asbc_header_styles = array(
            '#header { background:' => sanitize_hex_color(get_theme_mod($prefix . 'header_bg_color', '')),
            '.site-title a { color:' => sanitize_hex_color(get_theme_mod($prefix . 'header_title_color', '')),
            '.site-title a:hover { color:' => sanitize_hex_color(get_theme_mod($prefix . 'header_title_hover_color', '')),
            '.site-tagline { color:' => sanitize_hex_color(get_theme_mod($prefix . 'header_tagline_color', '')),
            '#header ul { color:' => sanitize_hex_color(get_theme_mod($prefix . 'header_menu_item_color', '')),
            '#header ul li a:hover { color:' => sanitize_hex_color(get_theme_mod($prefix . 'header_menu_item_hover_color', '')),
            '#header ul li.current-menu-item { border-color:  ' => sanitize_hex_color(get_theme_mod($prefix . 'header_menu_current_item_border', '')),
            '#header ul li:hover > .sub-menu { background:  ' => sanitize_hex_color(get_theme_mod($prefix . 'header_menu_submenu_bg_color', '')),
            '#header ul li .sub-menu li a { color:  ' => sanitize_hex_color(get_theme_mod($prefix . 'header_menu_submenu_link_color', '')),
            '#header ul li .sub-menu li a:hover { background:  ' => sanitize_hex_color(get_theme_mod($prefix . 'header_menu_submenu_link_hover_bg_color', '')),
            '#header ul li .sub-menu li a:hover { color:  ' => sanitize_hex_color(get_theme_mod($prefix . 'header_menu_submenu_link_hover_txt_color', '')),
        );
        $asbc_header_image_styles = array(
            '.header-image-container .header-texts h2 { color:' => sanitize_hex_color(get_theme_mod($prefix . 'header_txt_color', '')),
            '.header-image-container .header-texts a { background:' => sanitize_hex_color(get_theme_mod($prefix . 'header_button_bg_color', '')),
            '.header-image-container .header-texts a:hover { background:' => sanitize_hex_color(get_theme_mod($prefix . 'header_button_bg_hover_color', '')),
            '.header-image-container .header-texts a { color:' => sanitize_hex_color(get_theme_mod($prefix . 'header_button_txt_color', '')),
            '.header-image-container .header-texts a:hover { color:' => sanitize_hex_color(get_theme_mod($prefix . 'header_button_txt_hover_color', '')),
        );

        $asbc_home_about_styles = array(
            '#home-about-section { background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_about_bg_color', '')),
            '#home-about-section h2.section-title{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_about_title_color', '')),
            '#home-about-section h3.section-subtitle{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_about_subtitle_color', '')),
            '#home-about-section .section-title:before,#home-about-section .section-title:after{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_about_title_border_color', '')),
            '.about-section-content{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_about_txt_color', '')),
            '.home-services{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_services_bg_color', '')),
            '.home-services h2.section-title{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_services_title_color', '')),
            '.home-services h3.section-subtitle{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_services_subtitle_color', '')),
            '.home-services .section-title:before,.home-services .section-title:after{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_services_title_border_color', '')),
            '.home-services .front-single-service .service-icon{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_services_icon_color', '')),
            '.home-services .front-single-service:hover{ border-left-color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_services_border_color', '')),
            '.home-projects{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_projects_bg_color', '')),
            '.home-projects h2.section-title{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_projects_title_color', '')),
            '.home-projects h3.section-subtitle{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_projects_subtitle_color', '')),
            '.home-projects .section-title:before,.home-projects .section-title:after{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_projects_title_border_color', '')),
            '.project-details a{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_projects_prj_title_link_color', '')),
            '.project-details a:hover{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_projects_prj_title_link_hover_color', '')),
            '.home-gallery{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_gallery_bg_color', '')),
            '.home-gallery h2.section-title{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_gallery_title_color', '')),
            '.home-gallery h3.section-subtitle{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_gallery_subtitle_color', '')),
            '.home-gallery .section-title:before,.home-services .section-title:after{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_gallery_title_border_color', '')),
            '.home-team{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_team_bg_color', '')),
            '.home-team h2.section-title{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_team_title_color', '')),
            '.home-team h3.section-subtitle{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_team_subtitle_color', '')),
            '.home-team .section-title:before,.home-services .section-title:after{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_team_title_border_color', '')),
            '.single-team-item a{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_team_member_link_color', '')),
            '.single-team-item a:hover{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_team_member_link_hover_color', '')),
            '.home-team .single-team-item p{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_team_job_title_color', '')),
            '.home-testimonials{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_testimonials_bg_color', '')),
            '.home-testimonials h2.section-title{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_testimonials_title_color', '')),
            '.home-testimonials h3.section-subtitle{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_testimonials_subtitle_color', '')),
            '.home-testimonials .section-title:before,.home-testimonials .section-title:after{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_testimonials_title_border_color', '')),
            '.single-testimonial-item{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_testimonials_single_bg_color', '')),
            '.single-testimonial-item p{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_testimonials_single_text_color', '')),
            '.single-testimonial-item h4 a{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_testimonials_single_name_color', '')),
            '.single-testimonial-item h4 a:hover{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_testimonials_single_name_hover_color', '')),
            '.home-blog{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_blog_bg_color', '')),
            '.home-blog h2.section-title{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_blog_title_color', '')),
            '.home-blog h3.section-subtitle{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_blog_subtitle_color', '')),
            '.home-blog .section-title:before,.home-services .section-title:after{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'home_blog_title_border_color', '')),
            '.single-blog-item .blog-item-contents .date{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_blog_item_meta_color', '')),
            '.single-blog-item h4{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_blog_item_title_color', '')),
            '.single-blog-item .blog-item-contents a:hover span{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'home_blog_item_icon_hover_color', '')),
        );

        $asbc_single_postpage_styles = array(
            '.major-title{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'single_postpage_major_bg_color', '')),
            '.major-title{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'single_postpage_major_txt_color', '')),
            '.atlast-breadcrumb{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'single_postpage_breadcrump_bg_color', '')),
            '.breadcrumb .breadcrumb-item:not(:last-child) a{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'single_postpage_breadcrump_link_color', '')),
            '.breadcrumb .breadcrumb-item{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'single_postpage_breadcrump_txt_color', '')),
            'article h1, article h2,article h3 , article h4, article h5, article h6{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'single_postpage_headings_color', '')),
            'article p{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'single_postpage_body_color', '')),
            'article a{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'single_postpage_link_color', '')),
            'article a:hover{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'single_postpage_link_hover_color', '')),
        );

        $asbc_default_button_styles = array(
            '.widget_search input[type=submit]{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'button_search_bg_color', '')),
            '.widget_search input[type=submit]{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'button_search_txt_color', '')),
            '.widget_search input[type=submit]{ border-color:' => sanitize_hex_color(get_theme_mod($prefix . 'button_search_border_color', '')),
            '.widget_search input[type=submit]:hover{ background:' => sanitize_hex_color(get_theme_mod($prefix . 'button_search_bg_hover_color', '')),
            '.widget_search input[type=submit]:hover{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'button_search_txt_hover_color', '')),
            '.widget_search input[type=submit]:hover{ border-color:' => sanitize_hex_color(get_theme_mod($prefix . 'button_search_border_hover_color', '')),
            '.comment-reply-link, .pagination-link, .read-more-link{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'button_txt_color', '')),
            '.comment-reply-link, .pagination-link, .read-more-link{ background-color:' => sanitize_hex_color(get_theme_mod($prefix . 'button_bg_color', '')),
            '.comment-reply-link, .pagination-link, .read-more-link{ border-color:' => sanitize_hex_color(get_theme_mod($prefix . 'button_border_color', '')),
            '.comment-reply-link:hover, .pagination-link:hover, .read-more-link:hover{ color:' => sanitize_hex_color(get_theme_mod($prefix . 'button_txt_hover_color', '')),
            '.comment-reply-link:hover, .pagination-link:hover, .read-more-link:hover{ background-color:' => sanitize_hex_color(get_theme_mod($prefix . 'button_bg_hover_color', '')),
            '.comment-reply-link:hover, .pagination-link:hover, .read-more-link:hover{ border-color:' => sanitize_hex_color(get_theme_mod($prefix . 'button_border_hover_color', '')),
        );
        $asbc_widget_styles = array(
            '.widget-area h3 {color: ' => sanitize_hex_color(get_theme_mod($prefix . 'widget_title_color', '')),
            '.widget p ,.widget:not(a) , widget:not(.widget-title)  {color: ' => sanitize_hex_color(get_theme_mod($prefix . 'widget_txt_color', '')),
            '.widget-container ul li a  {color: ' => sanitize_hex_color(get_theme_mod($prefix . 'widget_link_color', '')),
            '.widget-container ul li a:hover {color: ' => sanitize_hex_color(get_theme_mod($prefix . 'widget_link_hover_color', '')),
        );

        $asbc_footer_widget_styles = array(
            '.footer-area {background: ' => sanitize_hex_color(get_theme_mod($prefix . 'footer_area_bg_color', '')),
            '.footer-widget-title{color: ' => sanitize_hex_color(get_theme_mod($prefix . 'footer_widget_title_color', '')),
            '.footer-widget p {color: ' => sanitize_hex_color(get_theme_mod($prefix . 'footer_widget_txt_color', '')),
            '.footer-widget ul li a {color: ' => sanitize_hex_color(get_theme_mod($prefix . 'footer_widget_link_color', '')),
            '.footer-widget ul li a:hover {color: ' => sanitize_hex_color(get_theme_mod($prefix . 'footer_widget_link_hover_color', '')),
        );

        $asbc_copyright_styles = array(
            '#copyright {background: ' => sanitize_hex_color(get_theme_mod($prefix . 'copyright_bg_color', '')),
            '#copyright {color: ' => sanitize_hex_color(get_theme_mod($prefix . 'copyright_txt_color', '')),
            '#copyright a {color: ' => sanitize_hex_color(get_theme_mod($prefix . 'copyright_link_color', '')),
            '#copyright a:hover{color: ' => sanitize_hex_color(get_theme_mod($prefix . 'copyright_link_hover_color', '')),
        );



        // Footer, Widgets , STRIP CSS


        /*
         * Clearing the null or empty properties
         */
        $top_bar_styles = array_filter($asbc_top_bar_styles);
        $header_styles = array_filter($asbc_header_styles);
        $header_images_styles = array_filter($asbc_header_image_styles);
        $home_about_styles = array_filter($asbc_home_about_styles);
        $single_postpage_styles = array_filter($asbc_single_postpage_styles);
        $default_button_styles = array_filter($asbc_default_button_styles);
        $sidebar_styles = array_filter($asbc_widget_styles);
        $footer_sidebar_styles = array_filter($asbc_footer_widget_styles);
        $copyright_styles = array_filter($asbc_copyright_styles);

        $allNewCSS[] = $top_bar_styles;
        $allNewCSS[] = $header_styles;
        $allNewCSS[] = $header_images_styles;
        $allNewCSS[] = $home_about_styles;
        $allNewCSS[] = $single_postpage_styles;
        $allNewCSS[] = $default_button_styles;
        $allNewCSS[] = $sidebar_styles;
        $allNewCSS[] = $footer_sidebar_styles;
        $allNewCSS[] = $copyright_styles;

        $totalArray = array_filter($allNewCSS);


        if (empty($totalArray)) :
            return false;
        else:
            return $allNewCSS;
        endif;

    }

endif;