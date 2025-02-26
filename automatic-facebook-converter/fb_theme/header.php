<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
 
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
 <?php fbac_color_options('blue'); ?>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
 
    <?php wp_head(); ?>
 
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'fbac-wordpress-facebook' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'fbac-wordpress-facebook' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>
 
<body>
<div id="wrapper" class="hfeed">
    <div id="header">
        <div id="masthead">
 
           <div id="branding"><?php if(get_option('fbac_use_custom_header') == 'true'){fbac_custom_header(); } else { ?>
           <div id="cool-bg" style="/*width: 345px;*/">
            <div id="white-area"> <?php if(get_option('fbac_branding_image_url') != '') { ?><img src="<?php echo get_option('fbac_branding_image_url'); ?>" style="float:right; height: 56px; width:200px;" /> <?php }?>
                <div id="blog-title"><span><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></span></div>
<?php if ( is_home() || is_front_page() ) { ?>
                    <h1 id="blog-description"><?php bloginfo( 'description' ) ?></h1>
<?php } else { ?>
                    <div id="blog-description"><?php bloginfo( 'description' ) ?></div>
<?php } ?>
 </div><!-- #cool-bg -->
            </div><!-- #white-area --> <?php } //if fbac_use_custom_header else
?>
            </div><!-- #branding -->
            <div id="access">
           <!-- <div class="skip-link"><a href="#content" title="<?php _e( 'Skip to content', 'fbac-wordpress-facebook' ) ?>"><?php _e( 'Skip to content', 'fbac-wordpress-facebook' ) ?></a></div> -->

        </div><!-- #access -->
 
        </div><!-- #masthead -->      <div class="fbac-menu">  <?php if(get_option('fbac_use_custom_menu')=='true'){  fbac_menu();}
else {wp_nav_menu( 'sort_column=menu_order&container_class=menu-header' ); }
?>
 </div> 
    </div><!-- #header -->
 
    <div id="main">
