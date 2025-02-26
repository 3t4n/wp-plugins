<?php
/**
 * Taxonomy API: Walker_Category_Checklist class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */

/**
 * Core walker class to output an unordered list of category checkbox input elements.
 *
 * @since 2.5.1
 *
 * @see Walker
 * @see wp_category_checklist()
 * @see wp_terms_checklist()
 */
class Collapsing_Category_List_Walker_Category_Checklist extends Walker {
	public $tree_type = 'category';
	public $db_fields = array ('parent' => 'parent', 'id' => 'term_id'); //TODO: decouple this

	/**
	 * Starts the list before the elements are added.
	 *
	 * @see Walker:start_lvl()
	 *
	 * @since 2.5.1
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of category. Used for tab indentation.
	 * @param array  $args   An array of arguments. @see wp_terms_checklist()
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
    $admin_form_options = get_option( 'collapsingCategoryListAPF_CreatePage');
    
    $data = '';
    $num_depth = $depth - 2;
    $limit_cat = $admin_form_options['section_limit_categories_selected'];
    $more_levels_key = 'section_limit_categories_selected_section_more_levels__' . $num_depth . '_level__' . $num_depth;
    if (is_array($admin_form_options) && array_key_exists($more_levels_key, $admin_form_options)) {
      $num_categories_key = 'section_limit_categories_selected_section_more_levels__' . $num_depth . '_num_subcats__' . $num_depth;
      $data = ' data-num-cats="' . $admin_form_options[$num_categories_key] . '"';
    }
    
    if ($depth == 0 && $limit_cat['num_categories_selected']) {
      $data = ' data-num-cats="' . $limit_cat['num_categories_selected'] . '"';
    }
    elseif ($depth == 1 && $limit_cat['num_subcategories_selected']) {
      $data = ' data-num-cats="' . $limit_cat['num_categories_selected'] . '"';
    }
      
		$indent = str_repeat("\t", $depth);
		$output .= "$indent<ul class='children'$data>\n";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @see Walker::end_lvl()
	 *
	 * @since 2.5.1
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of category. Used for tab indentation.
	 * @param array  $args   An array of arguments. @see wp_terms_checklist()
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	/**
	 * Start the element output.
	 *
	 * @see Walker::start_el()
	 *
	 * @since 2.5.1
	 *
	 * @param string $output   Passed by reference. Used to append additional content.
	 * @param object $category The current term object.
	 * @param int    $depth    Depth of the term in reference to parents. Default 0.
	 * @param array  $args     An array of arguments. @see wp_terms_checklist()
	 * @param int    $id       ID of the current term.
	 */
	public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
    $admin_form_options = get_option( 'collapsingCategoryListAPF_CreatePage');

		if ( empty( $args['taxonomy'] ) ) {
			$taxonomy = 'category';
		} else {
			$taxonomy = $args['taxonomy'];
		}

		if ( $taxonomy == 'category' ) {
			$name = 'post_category';
		} else {
			$name = 'tax_input[' . $taxonomy . ']';
		}

		$args['popular_cats'] = empty( $args['popular_cats'] ) ? array() : $args['popular_cats'];
		$class = in_array( $category->term_id, $args['popular_cats'] ) ? ' class="popular-category"' : '';

		$args['selected_cats'] = empty( $args['selected_cats'] ) ? array() : $args['selected_cats'];

		if ( ! empty( $args['list_only'] ) ) {
			$aria_cheched = 'false';
			$inner_class = 'category';

			if ( in_array( $category->term_id, $args['selected_cats'] ) ) {
				$inner_class .= ' selected';
				$aria_cheched = 'true';
			}

			/** This filter is documented in wp-includes/category-template.php */
			$output .= "\n" . '<li' . $class . '>' .
				'<div class="' . $inner_class . '" data-term-id=' . $category->term_id .
				' tabindex="0" role="checkbox" aria-checked="' . $aria_cheched . '">' .
				esc_html( apply_filters( 'the_category', $category->name ) ) . '</div>';
		} else {
      $type = 'checkbox';
      $limit_cat = $admin_form_options['section_limit_categories_selected'];
      
      $num_depth = $depth - 2;
      $num_categories = 0;
      $more_levels_key = 'section_limit_categories_selected_section_more_levels__' . $num_depth . '_level__' . $num_depth;
      if (is_array($admin_form_options) && array_key_exists($more_levels_key, $admin_form_options)) {
        $num_categories_key = 'section_limit_categories_selected_section_more_levels__' . $num_depth . '_num_subcats__' . $num_depth;
        $num_categories = ' data-num-cats="' . $admin_form_options[$num_categories_key] . '"';
      }

      if (($depth == 0 && 
              $limit_cat['num_categories_selected'] == 1) || 
              ($depth > 1 && $num_categories == 1) || 
              ($depth == 1 && $limit_cat['num_subcategories_selected'] == 1)) {
        if ($category->parent != 0) {
          $type = 'checkbox';
        }
        else {
          $type = 'radio';
        }
      }
      elseif ($num_categories) {
        $type = 'checkbox';
      }
      
			/** This filter is documented in wp-includes/category-template.php */
			$output .= "\n<li id='{$taxonomy}-{$category->term_id}'$class>" .
				'<label class="selectit"><input value="' . $category->term_id . '" type="'.$type.'" name="'.$name.'[]" id="in-'.$taxonomy.'-' . $category->term_id . '"' .
        'data-parent="' . $category->parent . '"' .
				checked( in_array( $category->term_id, $args['selected_cats'] ), true, false ) .
				disabled( empty( $args['disabled'] ), false, false ) . ' /> ' .
				esc_html( apply_filters( 'the_category', $category->name ) ) . '</label>';
		}
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @see Walker::end_el()
	 *
	 * @since 2.5.1
	 *
	 * @param string $output   Passed by reference. Used to append additional content.
	 * @param object $category The current term object.
	 * @param int    $depth    Depth of the term in reference to parents. Default 0.
	 * @param array  $args     An array of arguments. @see wp_terms_checklist()
	 */
	public function end_el( &$output, $category, $depth = 0, $args = array() ) {
		$output .= "</li>\n";
	}
}
