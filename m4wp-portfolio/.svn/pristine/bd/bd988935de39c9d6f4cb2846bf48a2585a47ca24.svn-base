<?php

/**
 * The custom post type Portfolio data.
 *
 * @link       https://made4wp.com
 * @since      1.0.0
 * @package    M4WP Portfolio
 */

/**
 * The custom post type Portfolio data.
 *
 * @package    M4WP Portfolio
 */
class M4wp_Portfolio_Post_Type {

  /**
   * Return post type default arguments.
   *
   * @since 1.0.0
   *
   * @return array Post type default arguments.
   */
  public function default_args() {

    $labels = array(
      'name'               => __( 'Portfolio', 'm4wp-portfolio' ),
      'singular_name'      => __( 'Portfolio Item', 'm4wp-portfolio' ),
      'menu_name'          => _x( 'Portfolio', 'admin menu', 'm4wp-portfolio' ),
      'name_admin_bar'     => _x( 'Portfolio Item', 'add new on admin bar', 'm4wp-portfolio' ),
      'add_new'            => __( 'Add New Item', 'm4wp-portfolio' ),
      'add_new_item'       => __( 'Add New Portfolio Item', 'm4wp-portfolio' ),
      'new_item'           => __( 'Add New Portfolio Item', 'm4wp-portfolio' ),
      'edit_item'          => __( 'Edit Portfolio Item', 'm4wp-portfolio' ),
      'view_item'          => __( 'View Item', 'm4wp-portfolio' ),
      'all_items'          => __( 'All Portfolio Items', 'm4wp-portfolio' ),
      'search_items'       => __( 'Search Portfolio', 'm4wp-portfolio' ),
      'parent_item_colon'  => __( 'Parent Portfolio Item:', 'm4wp-portfolio' ),
      'not_found'          => __( 'No portfolio items found', 'm4wp-portfolio' ),
      'not_found_in_trash' => __( 'No portfolio items found in trash', 'm4wp-portfolio' ),
    );

    $supports = array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      // 'comments',
      // 'author',
      // 'custom-fields',
      'revisions',
    );

    $args = array(
      'labels'          => $labels,
      'supports'        => $supports,
      'public'          => true,
      'capability_type' => 'post',
      'rewrite'         => array( 'slug' => 'portfolio', ), // Permalinks format
      'menu_position'   => 5,
      'menu_icon'       => ( version_compare( $GLOBALS['wp_version'], '3.8', '>=' ) ) ? 'dashicons-portfolio' : false
    );

    return apply_filters( 'm4wp_portfolio_post_type_args', $args );

  }

  /**
   * Return post type updated messages.
   *
   * @since 1.0.0
   *
   * @return array Post type updated messages.
   */
  public function messages() {

    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages = array(
      0  => '', // Unused. Messages start at index 1.
      1  => __( 'Portfolio item updated.', 'm4wp-portfolio' ),
      2  => __( 'Custom field updated.', 'm4wp-portfolio' ),
      3  => __( 'Custom field deleted.', 'm4wp-portfolio' ),
      4  => __( 'Portfolio item updated.', 'm4wp-portfolio' ),
      /* translators: %s: date and time of the revision */
      5  => isset( $_GET['revision'] ) ? sprintf( __( 'Portfolio item restored to revision from %s', 'm4wp-portfolio' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
      6  => __( 'Portfolio item published.', 'm4wp-portfolio' ),
      7  => __( 'Portfolio item saved.', 'm4wp-portfolio' ),
      8  => __( 'Portfolio item submitted.', 'm4wp-portfolio' ),
      9  => sprintf(
        __( 'Portfolio item scheduled for: <strong>%1$s</strong>.', 'm4wp-portfolio' ),
        /* translators: Publish box date format, see http://php.net/date */
        date_i18n( __( 'M j, Y @ G:i', 'm4wp-portfolio' ), strtotime( $post->post_date ) )
      ),
      10 => __( 'Portfolio item draft updated.', 'm4wp-portfolio' ),
    );

    if ( $post_type_object->publicly_queryable ) {
      $permalink         = get_permalink( $post->ID );
      $preview_permalink = add_query_arg( 'preview', 'true', $permalink );

      $view_link    = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View portfolio item', 'm4wp-portfolio' ) );
      $preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview portfolio item', 'm4wp-portfolio' ) );

      $messages[1]  .= $view_link;
      $messages[6]  .= $view_link;
      $messages[9]  .= $view_link;
      $messages[8]  .= $preview_link;
      $messages[10] .= $preview_link;
    }

    return $messages;

  }

}
