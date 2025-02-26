<?php

/**
 * The Portfolio Taxonomy Tag data.
 *
 * @link       https://made4wp.com
 * @since      1.0.0
 * @package    M4WP Portfolio
 */

/**
 * The Portfolio Taxonomy Tag data.
 *
 * @package    M4WP Portfolio

 */
class M4wp_Portfolio_Taxonomy_Tag {

  /**
   * Return taxonomy default arguments.
   *
   * @since 1.0.0
   *
   * @return array Taxonomy default arguments.
   */
  public function default_args() {

    $labels = array(
      'name'                       => __( 'Portfolio Tags', 'm4wp-portfolio' ),
      'singular_name'              => __( 'Portfolio Tag', 'm4wp-portfolio' ),
      'menu_name'                  => __( 'Portfolio Tags', 'm4wp-portfolio' ),
      'edit_item'                  => __( 'Edit Portfolio Tag', 'm4wp-portfolio' ),
      'update_item'                => __( 'Update Portfolio Tag', 'm4wp-portfolio' ),
      'add_new_item'               => __( 'Add New Portfolio Tag', 'm4wp-portfolio' ),
      'new_item_name'              => __( 'New Portfolio Tag Name', 'm4wp-portfolio' ),
      'parent_item'                => __( 'Parent Portfolio Tag', 'm4wp-portfolio' ),
      'parent_item_colon'          => __( 'Parent Portfolio Tag:', 'm4wp-portfolio' ),
      'all_items'                  => __( 'All Portfolio Tags', 'm4wp-portfolio' ),
      'search_items'               => __( 'Search Portfolio Tags', 'm4wp-portfolio' ),
      'popular_items'              => __( 'Popular Portfolio Tags', 'm4wp-portfolio' ),
      'separate_items_with_commas' => __( 'Separate portfolio tags with commas', 'm4wp-portfolio' ),
      'add_or_remove_items'        => __( 'Add or remove portfolio tags', 'm4wp-portfolio' ),
      'choose_from_most_used'      => __( 'Choose from the most used portfolio tags', 'm4wp-portfolio' ),
      'not_found'                  => __( 'No portfolio tags found.', 'm4wp-portfolio' )
    );

    $args = array(
      'labels'            => $labels,
      'public'            => true,
      'show_in_nav_menus' => true,
      'show_ui'           => true,
      'show_tagcloud'     => true,
      'hierarchical'      => true,
      'rewrite'           => array( 'slug' => 'portfolio_tag' ),
      'show_admin_column' => true,
      'query_var'         => true,
    );

    return apply_filters( 'm4wp_portfolio_taxanomy_type_args', $args );

  }

}