<?php
/*
* Plugin Name: autometa
* Description: It reproduces metadata information and it generates taxonomy clouds and comment and search forms to publications simply via shortcodes.
* Version: 2.2
* Author: JorgeAmVF
* Author URI: https://profiles.wordpress.org/jorgeamvf/
* License: GPL2
 
autometa is developed by JorgeAmVF in order to improve the quality of Quaestio.org
and it is freely provided with the intent to help other developers to fulfill
their needs. 
 
autometa is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
autometa is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with autometa. If not, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html.
*/

// [titul] = publication title
function autometa_publication_title() {
	$am_titul = '<span id="titul" class="autometa">' . get_the_title() . '</span>';
	return $am_titul;
} 
add_shortcode( "titul", "autometa_publication_title" );

// [titulink] = publication link
function autometa_publication_link() {
	$am_titulink = '<span id="titulink" class="autometa"><a href="' . get_permalink() . '">' . get_the_title() . '</a></span>';
	return $am_titulink;
} 
add_shortcode( "titulink", "autometa_publication_link" );

// [autua] = author name
function autometa_author_name() {
	$am_autua = '<span id="autua" class="autometa">' . get_the_author() . '</span>';
	return $am_autua;
}
add_shortcode( "autua", "autometa_author_name" );

// [autualink] = author link
function autometa_author_link() {
	$am_autualink = '<span id="autualink" class="autometa">' . get_the_author_link() . '</span>';
	return $am_autualink;
}
add_shortcode( "autualink", "autometa_author_link" );

// [autuaguest] = guest link
function autometa_guest_link() {
	$am_autuaguest = '<span id="autuaguest" class="autometa">' . get_the_author_posts_link() . '</span>';
	return $am_autuaguest;
}
add_shortcode( "autuaguest", "autometa_guest_link" );

// [dated] = publication date
function autometa_publication_date() {
	$am_dated = '<span id="dated" class="autometa">' . get_the_date() . '</span>';
	return $am_dated;
}
add_shortcode( "dated", "autometa_publication_date" );

// [urlug] = URL slug
function autometa_url_slug() {
	$am_urlug = '<span id="urlug" class="autometa">' . get_permalink() . '</span>';
	return $am_urlug;
}
add_shortcode( "urlug", "autometa_url_slug" );

// [urlink] = URL permalink
function autometa_url_permalink() {
	$am_urlink = '<span id="urlink" class="autometa">' . get_post_permalink() . '</span>';
	return $am_urlink;
}
add_shortcode( "urlink", "autometa_url_permalink" );

// [urlinked] = URL link
function autometa_url_link() {
	$am_urlinked = '<span id="urlinked" class="autometa"><a href="' . get_permalink() . '">' . get_permalink() . '</a></span>';
	return $am_urlinked;
}
add_shortcode( "urlinked", "autometa_url_link" );

// [thumb] = featured image
function autometa_featured_image() {
	$am_thumb = '<span id="thumb" class="autometa">' . get_the_post_thumbnail() . '</span>';
	return $am_thumb;
}
add_shortcode( "thumb", "autometa_featured_image" );

// [sumus] = publication excerpt
function autometa_publication_excerpt() {
	$am_sumus = '<span id="sumus" class="autometa">' . get_the_excerpt() . '</span>';
	return $am_sumus;
}
add_shortcode( "sumus", "autometa_publication_excerpt" );

// [cats] = (post) categories
function autometa_post_categories( $atts, $content = null ) {
	global $post;
	$am_cats = '<span id="cats" class="autometa">' .get_the_category_list( $separator = ' ', $post->ID ) . '</span>';
	return $am_cats;
}
add_shortcode( "cats", "autometa_post_categories" );

// [tags] = (post) tags
function autometa_post_tags( $atts, $content = null ) {
	global $post;
	$am_tags = '<span id="tags" class="autometa">' . get_the_term_list( $post->ID, 'post_tag', $separator = ' ' ) . '</span>';
	return $am_tags;
}
add_shortcode( "tags", "autometa_post_tags" );

// [catag] = (post) categories & tags
function autometa_post_taxonomies( $echo = false ) {
	if ( function_exists( 'wp_tag_cloud') )
		$am_catag  = '<span id="catag" class="autometa">' . wp_tag_cloud( array(
			'number' => 0,
			'orderby' => 'count',
			'order' => 'RAND',
			'taxonomy' => array(
				'post_tag',
				'category'
			),
		) ) . '</span>';
	return $am_catag;
}
add_shortcode( "catag", "autometa_post_taxonomies" );

// [pfcats] = (portfolio) categories
function autometa_portfolio_categories( $atts, $content = null ) {
	global $post;
	$am_pfcats = '<span id="pfcats" class="autometa">' . get_the_term_list( $post->ID, 'project-type', $separator = ' ' ) . '</span>';
	return $am_pfcats;
}
add_shortcode( "pfcats", "autometa_portfolio_categories" );

// [pfatts] = (portfolio) attributes
function autometa_portfolio_attributes ( $atts, $content = null ) {
	global $post;
	$am_pfatts = '<span id="pfatts" class="autometa">' . get_the_term_list( $post->ID, 'project-attributes', $separator = ' ' ) . '</span>';
	return $am_pfatts;
}
add_shortcode( "pfatts", "autometa_portfolio_attributes" );

// [folio] = (portfolio) categories & attributes
function autometa_portfolio_taxonomies ( $echo = false ) {
	if ( function_exists( 'wp_tag_cloud' ) )
		$am_folio = '<span id="folio" class="autometa">' . wp_tag_cloud( array( 
			'number' => 0,
			'orderby' => 'count',
			'order' => 'RAND',
			'taxonomy' => array(
				'project-type',
				'project-attributes'
			),
		) ) . '</span>';
	return $am_folio;
}
add_shortcode( "folio", "autometa_portfolio_taxonomies" );

// [woocats] = (product) categories
function autometa_product_categories( $atts, $content = null ) {
	global $post;
	$am_woocats = '<span id="woocats" class="autometa">' . get_the_term_list( $post->ID, 'product_cat', $separator = ' ' ) . '</span>';
	return $am_woocats;
}
add_shortcode( "woocats", "autometa_product_categories" );

// [wootags] = (product) tags
function autometa_product_tags( $atts, $content = null ) {
	global $post;
	$am_wootags = '<span id="woocats" class="autometa">' . get_the_term_list( $post->ID, 'product_tag', $separator = ' ' ) . '</span>';
	return $am_wootags;
}
add_shortcode( "wootags", "autometa_product_tags" );

// [woodo] = (product) categories & tags
function autometa_product_taxonomies( $echo = false ) {
	if ( function_exists( 'wp_tag_cloud' ) )
		 $am_woodoo = '<span id="woodo" class="autometa">' . wp_tag_cloud( array( 
			'number' => 0,
			'orderby' => 'count',
			'order' => 'RAND',
			'taxonomy' => array(
				'product_tag',
				'product_cat'
			),
		 ) ) . '</span>';
	return $am_woodo;
}
add_shortcode( "woodo", "autometa_product_taxonomies" );

// [tagcloud] = categories & tags (post, product, portfolio)
function autometa_taxonomy_cloud( $echo = false ) {
	if ( function_exists( 'wp_tag_cloud' ) )
		$am_tagcloud = '<span id="tagcloud" class="autometa">' . wp_tag_cloud( array(
			  'number' => 0,
			  'orderby' => 'count',
			  'order' => 'RAND',
			  'taxonomy' => array(
				  'post_tag',
				  'category',
				  'project-type',
				  'project-attributes',
				  'product_tag',
				  'product_cat'
			  ),
		  ) ) . '</span>';
	return $am_tagcloud;
}
add_shortcode( "tagcloud", "autometa_taxonomy_cloud" );

// [cloud] = categories & tags (post, product, portfolio)
function autometa_cloud( $echo = false ) {
	if ( function_exists( 'wp_tag_cloud' ) )
		$am_cloud = '<span id="cloud" class="autometa">' . wp_tag_cloud( array(
			'number' => 49,
			'orderby' => 'count',
			'order' => 'RAND',
			'taxonomy' => array(
				'post_tag',
				'category',
				'project-type',
				'project-attributes',
				'product_tag',
				'product_cat'
			),
		) ) . '</span>';
	return $am_cloud;
}
add_shortcode( "cloud", "autometa_cloud" );

// [ments] = comment list
function autometa_comment_list( $args, $comments ) {
	$comments = get_comments( array(
		'order' => 'ASC',
		'status' => 'approve'
	) );
	$am_ments = '<span id="ments" class="autometa">' . wp_list_comments( array(
		'walker' => new autometa_ments_Walker_Comment(),
		'echo' => 1,
		'per_page' => 0,
		'type' => 'comment'
	),
		$comments
	) . '</span>';
	return wp_list_comments();
}
add_shortcode( "ments", "autometa_comment_list" );

// [recents] = recent list
function autometa_recent_list( $args, $comments ) {
	$comments = get_comments( array(
		'order' => 'DESC',
		'status' => 'approve'
	) );
	$am_recents = '<span id="recents" class="autometa">' . wp_list_comments( array(
		'walker' => new autometa_ments_Walker_Comment(),
		'echo' => 1,
		'per_page' => 3,
		'reverse_top_level' => 0,
		'type' => 'comment'
	),
		 $comments
	) . '</span>';
	return $am_recents;
}
add_shortcode( "recents", "autometa_recent_list" );

/**
 * Comment API: Walker_Comment class
 *
 * @package WordPress
 * @subpackage Comments
 * @since 4.4.0
 */

/**
 * Core walker class used to create an HTML list of comments.
 *
 * @since 2.7.0
 *
 * @see Walker
 */
class autometa_ments_Walker_Comment extends Walker {

	/**
	 * What the class handles.
	 *
	 * @since 2.7.0
	 * @access public
	 * @var string
	 *
	 * @see Walker::$tree_type
	 */
	public $tree_type = 'comment';

	/**
	 * Database fields to use.
	 *
	 * @since 2.7.0
	 * @access public
	 * @var array
	 *
	 * @see Walker::$db_fields
	 * @todo Decouple this
	 */
	public $db_fields = array ('parent' => 'comment_parent', 'id' => 'comment_ID');

	/**
	 * Starts the list before the elements are added.
	 *
	 * @since 2.7.0
	 * @access public
	 *
	 * @see Walker::start_lvl()
	 * @global int $comment_depth
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Optional. Depth of the current comment. Default 0.
	 * @param array  $args   Optional. Uses 'style' argument for type of HTML list. Default empty array.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1;

		switch ( $args['style'] ) {
			case 'div':
				break;
			case 'ol':
				$output .= '<ol class="children">' . "\n";
				break;
			case 'ul':
			default:
				$output .= '<ul class="children">' . "\n";
				break;
		}
	}

	/**
	 * Ends the list of items after the elements are added.
	 *
	 * @since 2.7.0
	 * @access public
	 *
	 * @see Walker::end_lvl()
	 * @global int $comment_depth
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Optional. Depth of the current comment. Default 0.
	 * @param array  $args   Optional. Will only append content if style argument value is 'ol' or 'ul'.
	 *                       Default empty array.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1;

		switch ( $args['style'] ) {
			case 'div':
				break;
			case 'ol':
				$output .= "</ol><!-- .children -->\n";
				break;
			case 'ul':
			default:
				$output .= "</ul><!-- .children -->\n";
				break;
		}
	}

	/**
	 * Traverses elements to create list from elements.
	 *
	 * This function is designed to enhance Walker::display_element() to
	 * display children of higher nesting levels than selected inline on
	 * the highest depth level displayed. This prevents them being orphaned
	 * at the end of the comment list.
	 *
	 * Example: max_depth = 2, with 5 levels of nested content.
	 *     1
	 *      1.1
	 *        1.1.1
	 *        1.1.1.1
	 *        1.1.1.1.1
	 *        1.1.2
	 *        1.1.2.1
	 *     2
	 *      2.2
	 *
	 * @since 2.7.0
	 * @access public
	 *
	 * @see Walker::display_element()
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $element           Comment data object.
	 * @param array      $children_elements List of elements to continue traversing. Passed by reference.
	 * @param int        $max_depth         Max depth to traverse.
	 * @param int        $depth             Depth of the current element.
	 * @param array      $args              An array of arguments.
	 * @param string     $output            Used to append additional content. Passed by reference.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];
		$id = $element->$id_field;

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );

		/*
		 * If at the max depth, and the current element still has children, loop over those
		 * and display them at this level. This is to prevent them being orphaned to the end
		 * of the list.
		 */
		if ( $max_depth <= $depth + 1 && isset( $children_elements[$id]) ) {
			foreach ( $children_elements[ $id ] as $child )
				$this->display_element( $child, $children_elements, $max_depth, $depth, $args, $output );

			unset( $children_elements[ $id ] );
		}

	}

	/**
	 * Starts the element output.
	 *
	 * @since 2.7.0
	 * @access public
	 *
	 * @see Walker::start_el()
	 * @see wp_list_comments()
	 * @global int        $comment_depth
	 * @global WP_Comment $comment
	 *
	 * @param string     $output  Used to append additional content. Passed by reference.
	 * @param WP_Comment $comment Comment data object.
	 * @param int        $depth   Optional. Depth of the current comment in reference to parents. Default 0.
	 * @param array      $args    Optional. An array of arguments. Default empty array.
	 * @param int        $id      Optional. ID of the current comment. Default 0 (unused).
	 */
	public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;

		if ( !empty( $args['callback'] ) ) {
			ob_start();
			call_user_func( $args['callback'], $comment, $args, $depth );
			$output .= ob_get_clean();
			return;
		}

		if ( ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) && $args['short_ping'] ) {
			ob_start();
			$this->ping( $comment, $depth, $args );
			$output .= ob_get_clean();
		} elseif ( 'html5' === $args['format'] ) {
			ob_start();
			$this->html5_comment( $comment, $depth, $args );
			$output .= ob_get_clean();
		} else {
			ob_start();
			$this->comment( $comment, $depth, $args );
			$output .= ob_get_clean();
		}
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @since 2.7.0
	 * @access public
	 *
	 * @see Walker::end_el()
	 * @see wp_list_comments()
	 *
	 * @param string     $output  Used to append additional content. Passed by reference.
	 * @param WP_Comment $comment The current comment object. Default current comment.
	 * @param int        $depth   Optional. Depth of the current comment. Default 0.
	 * @param array      $args    Optional. An array of arguments. Default empty array.
	 */
	public function end_el( &$output, $comment, $depth = 0, $args = array() ) {
		if ( !empty( $args['end-callback'] ) ) {
			ob_start();
			call_user_func( $args['end-callback'], $comment, $args, $depth );
			$output .= ob_get_clean();
			return;
		}
		if ( 'div' == $args['style'] )
			$output .= "</div><!-- #comment-## -->\n";
		else
			$output .= "</li><!-- #comment-## -->\n";
	}

	/**
	 * Outputs a pingback comment.
	 *
	 * @since 3.6.0
	 * @access protected
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment The comment object.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function ping( $comment, $depth, $args ) {
		$tag = ( 'div' == $args['style'] ) ? 'div' : 'li';
?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( '', $comment ); ?>>
			<div class="comment-body">
				<?php _e( 'Pingback:' ); ?> <?php comment_author_link( $comment ); ?> <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
<?php
	}

	/**
	 * Outputs a single comment.
	 *
	 * @since 3.6.0
	 * @access protected
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function comment( $comment, $depth, $args ) {
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag; ?> <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?> id="comment-<?php comment_ID(); ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
			<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			<?php
				/* translators: %1$s is type of comment, %2$s is link to the post */
				printf( __( '%1s on %2$s' ),
					sprintf( '<cite class="fn"><b>%1s</b></cite>', get_comment_author_link( $comment ) ),
					sprintf( '<a href="' . get_comment_link() . '"><b><i>%2s</i></b></a>', get_the_title( $comment->comment_post_ID ) )
				);
			?>
		</div>
		<?php if ( '0' == $comment->comment_approved ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ) ?></em>
		<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
			<?php
				/* translators: 1: comment date, 2: comment time */
				printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '&nbsp;&nbsp;', '' );
			?>
		</div>

		<?php comment_text( $comment, array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

		<?php
		comment_reply_link( array_merge( $args, array(
			'add_below' => $add_below,
			'depth'     => $depth,
			'max_depth' => $args['max_depth'],
			'before'    => '<div class="reply">',
			'after'     => '</div>'
		) ) );
		?>

		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
<?php
	}

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @since 3.6.0
	 * @access protected
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			<?php
				/* translators: %1$s is type of comment, %2$s is link to the post */
				printf( __( '%1s on %2$s' ),
					sprintf( '<cite class="fn"><b>%1s</b></cite>', get_comment_author_link( $comment ) ),
					sprintf( '<a href="' . get_comment_link() . '"><b><i>%2s</i>/<b></a>', get_the_title( $comment->comment_post_ID ) )
				);
			?>
					</div><!-- .comment-author -->

					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php
									/* translators: 1: comment date, 2: comment time */
									printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
								?>
							</time>
						</a>
						<?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-metadata -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

				<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>'
				) ) );
				?>
			</article><!-- .comment-body -->
<?php
	}
}

// [forma] = comment form
function autometa_comment_form( $args, $post_id ) {
	$post_id = get_the_ID();
	$am_forma = '<span id="forma" class="autometa">' . comment_form() . '</span>';
	return $am_forma;
}
add_shortcode( "forma", "autometa_comment_form" );

// [loupe] = search form
function autometa_search_form() {
	$am_loupe = '<span id="loupe" class="autometa">' . get_search_form() . '</span>';	
	return $am_loupe;
}
add_shortcode( "loupe", "autometa_search_form" );

// [nowon] = current time
function autometa_current_time() {
	$am_nowon = current_time( 'H:i:s' );
	return $am_nowon;
}
add_shortcode( "nowon", "autometa_current_time" );

// [nowadays] = current date
function autometa_current_date() {
	$am_nowadays = current_time( 'd M Y' );
	return $am_nowadays;
}
add_shortcode( "nowadays", "autometa_current_date" );
?>
