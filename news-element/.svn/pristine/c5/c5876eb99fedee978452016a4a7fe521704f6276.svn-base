<?php

use Elementor\Plugin as Elementor;

class News_Element_Nav_Walker extends Walker_Nav_Menu {
  
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$indent         = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$icon = '';

		$class_names = $value = '';
		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		if ( $depth == 1 ) {
			$output .= $indent . '<li' . $value . $class_names . '>';
		} else {
			$output .= $indent . '<li' . $value . $class_names . '>';
		}

		$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes  .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes  .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes  .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$description = ! empty( $item->description ) ? '<span>' . esc_attr( $item->description ) . '</span>' : '';

		$item_output = $args->before;

		if(in_array('menu-item-has-children', $classes )) {
			$icon = '<i aria-hidden="true" class="drop-icon bi-chevron-down"></i>';
		}
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $description . $args->link_after;
		$item_output .= '</a>'.$icon;
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}
