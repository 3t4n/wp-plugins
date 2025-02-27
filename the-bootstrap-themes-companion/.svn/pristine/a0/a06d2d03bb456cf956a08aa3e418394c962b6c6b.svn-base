<?php
	/**
	 * Class for custom post type
	 */
	class The_Bootstrap_Themes_Companion_Posttype{

        function init()
		{   
			add_action( 'init', array( $this, 'the_bootstrap_theme_companion_register_posttype' ) );
		}

        function the_bootstrap_theme_companion_register_posttype() {
            register_post_type('tbtc_testimonials',
            array(
                'labels'      => array(
                    'name'          => __('Testimonials', 'tbthemes-companion'),
                    'singular_name' => __('Testimonial', 'tbthemes-companion'),
                ),
                    'public'      => true, 
                    'show_in_menu' => 'false',
                    'rewrite' => array('slug' => 'testimonials' ),
                    'has_archive'  => true,
                    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt')
            )
            );

            register_post_type('tbtc_teams',
            array(
                'labels'      => array(
                    'name'          => __('Teams', 'tbthemes-companion'),
                    'singular_name' => __('Teams', 'tbthemes-companion'),
                ),
                    'public'      => true, 
                    'show_in_menu' => 'false',
                    'rewrite' => array('slug' => 'teams' ),
                    'has_archive'  => true,
                    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt')
            )
            );

            register_post_type('tbtc_price',
            array(
                'labels'      => array(
                    'name'          => __('Price Table', 'tbthemes-companion'),
                    'singular_name' => __('Price Table', 'tbthemes-companion'),
                ),
                    'public'      => true,
                    'show_in_menu' => 'false', 
                    'menu_icon'           => 'dashicons-cart',

                    'rewrite' => array('slug' => 'price' ),
                    'has_archive'  => true,
                    'supports' => array( 'title', 'editor')
            )
            );
        }
    }
    
    $obj = new The_Bootstrap_Themes_Companion_Posttype;
	$obj->init();