<?php

class AIEA_Megamenu_Frontend {
	
	private static $_instance = null;
	
	public function __construct() {
		
		add_filter( 'nav_menu_item_title', [ $this, 'set_menu_icon' ], 90, 4 );
		
		add_filter( 'nav_menu_css_class', [ $this, 'set_mega_menu_class' ], 90, 4 );
		
		add_filter( 'walker_nav_menu_start_el', [ $this, 'set_elementor_content' ], 90, 4 );
		
	}
	
	public function set_menu_icon( $title, $menu_item, $args, $depth ){
		
		if( $depth === 0 ){
			$mm = get_post_meta( $menu_item->ID, '_menu_item_aiea_mega_menu', true ); 
			$mm = $mm ? json_decode( $mm, true ) : '';
			$menu_type = $mm && isset( $mm['menu_type'] ) ? $mm['menu_type'] : '';
			if( $menu_type == 'mega' ) {

				$icon = isset( $mm['icon'] ) ? $mm['icon'] : '';
				if( $icon ) {
					wp_enqueue_style( 'bootstrap-icons' );
					$title = '<i class="ai-menu-icon '. esc_attr( $icon ) .'"></i>' . $title;
				}
			}			
		}
		
		return $title;
		
    }
	
	public function set_mega_menu_class( $classes, $item, $args, $depth ){
		
		if( $depth === 0 ){
			$mm = get_post_meta( $item->ID, '_menu_item_aiea_mega_menu', true ); 
			$mm = $mm ? json_decode( $mm, true ) : '';
			$menu_type = $mm && isset( $mm['menu_type'] ) ? $mm['menu_type'] : '';
			if( $menu_type == 'mega' ) {
				$mega_menu = isset( $mm['mega_menu'] ) ? $mm['mega_menu'] : 'no';
				if( $mega_menu == 'yes' ) {
					$classes[] = 'has-ai-mega-menu';
				}
			}			
		}
		
		return $classes;
		
	}

	public function set_elementor_content( $item_output, $item, $depth, $args ){
		
		if( $depth === 0 ){
			$mm = get_post_meta( $item->ID, '_menu_item_aiea_mega_menu', true ); 
			$mm = $mm ? json_decode( $mm, true ) : '';
			$menu_type = $mm && isset( $mm['menu_type'] ) ? $mm['menu_type'] : '';
			if( $menu_type == 'mega' ) {	
				
				$mega_menu = isset( $mm['mega_menu'] ) ? $mm['mega_menu'] : 'no';
				if( $mega_menu == 'yes' ) {
					$builder_post_title = 'ai-megamenu-content-' . $item->ID;
					$builder_post = aiea_modules()->get_post_by_title( $builder_post_title, OBJECT, 'aiea_content' );
					$mega_menu_output = '';
					if ( $builder_post != null ) {
						$mega_width = isset( $mm['mega_width'] ) ? $mm['mega_width'] : '';
						$elementor = \Elementor\Plugin::instance();
						$mega_menu_output .= '<div class="ai-elementor-mega-menu" data-width="'. absint( $mega_width ) .'">';
						$mega_menu_output .= $elementor->frontend->get_builder_content_for_display( $builder_post->ID );
						$mega_menu_output .= '</div>';						
					}
					$item_output .= $mega_menu_output;
				}
				
			}			
		}
		
		return $item_output;
		
    }
	
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}
	
} AIEA_Megamenu_Frontend::instance();
