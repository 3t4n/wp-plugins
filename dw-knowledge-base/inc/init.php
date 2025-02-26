<?php
$dwkb_options = get_option( 'dwkb_options' );

if ( ! empty( $dwkb_options ) )  {
	if ( $dwkb_options['slug'] && $dwkb_options['slug'] != '' ) {
		define( 'DWKB_SLUG', $dwkb_options['slug'] );
	} else {
		define( 'DWKB_SLUG', 'knowledgebase' );
	}

	if ( isset( $dwkb_options['menu_name'] ) ) {
		define( 'DWKB_MENU_NAME', $dwkb_options['menu_name'] );
	} else {
		define( 'DWKB_MENU_NAME', 'Knowledge Base' );
	}

	if ( isset( $dwkb_options['comment'] ) ) {
		define( 'DWKB_COMMENT', $dwkb_options['comment'] );
	} else {
		define( 'DWKB_COMMENT', 'off' );
	}

	if ( isset( $dwkb_options['breadcrumbs'] ) ) {
		define( 'DWKB_BREACUMBS', $dwkb_options['breadcrumbs'] );
	} else {
		define( 'DWKB_BREACUMBS', 'on' );
	}

	if ( isset( $dwkb_options['search'] ) ) {
		define( 'DWKB_SEARCH', $dwkb_options['search'] );
	} else {
		define( 'DWKB_SEARCH', 'on' );
	}

	if ( isset( $dwkb_options['index_page'] ) ) {
		define( 'DWKB_INDEX', $dwkb_options['index_page'] );
	} else {
		define( 'DWKB_INDEX', '' );
	}

} else {
	define( 'DWKB_SLUG', 'knowledgebase' );
	define( 'DWKB_MENU_NAME', 'Knowledge Base' );
	define( 'DWKB_COMMENT', 'on' );
	define( 'DWKB_BREACUMBS', 'on' );
	define( 'DWKB_SEARCH', 'on' );
	define( 'DWKB_INDEX', '' );
}

add_filter( 'comments_open', 'dwkb_comments_status', 10, 2 );

function dwkb_comments_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if ( DWKB_COMMENT == 'off' && is_singular( 'dwkb' ) ) {
		$open = false;
	}
	return $open;
}


function reset_content( $args ) {
	global $wp_query, $post;
	if ( isset( $wp_query->post ) ) {
		$dummy = wp_parse_args( $args, array(
			'ID'                    => $wp_query->post->ID,
			'post_status'           => $wp_query->post->post_status,
			'post_author'           => $wp_query->post->post_author,
			'post_parent'           => $wp_query->post->post_parent,
			'post_type'             => $wp_query->post->post_type,
			'post_date'             => $wp_query->post->post_date,
			'post_date_gmt'         => $wp_query->post->post_date_gmt,
			'post_modified'         => $wp_query->post->post_modified,
			'post_modified_gmt'     => $wp_query->post->post_modified_gmt,
			'post_content'          => $wp_query->post->post_content,
			'post_title'            => $wp_query->post->post_title,
			'post_excerpt'          => $wp_query->post->post_excerpt,
			'post_content_filtered' => $wp_query->post->post_content_filtered,
			'post_mime_type'        => $wp_query->post->post_mime_type,
			'post_password'         => $wp_query->post->post_password,
			'post_name'             => $wp_query->post->post_name,
			'guid'                  => $wp_query->post->guid,
			'menu_order'            => $wp_query->post->menu_order,
			'pinged'                => $wp_query->post->pinged,
			'to_ping'               => $wp_query->post->to_ping,
			'ping_status'           => $wp_query->post->ping_status,
			'comment_status'        => $wp_query->post->comment_status,
			'comment_count'         => $wp_query->post->comment_count,
			'filter'                => $wp_query->post->filter,

			'is_404'                => false,
			'is_page'               => false,
			'is_single'             => false,
			'is_archive'            => false,
			'is_tax'                => false,
			) );
} else {
	$dummy = wp_parse_args( $args, array(
		'ID'                    => -1,
		'post_status'           => 'private',
		'post_author'           => 0,
		'post_parent'           => 0,
		'post_type'             => 'page',
		'post_date'             => 0,
		'post_date_gmt'         => 0,
		'post_modified'         => 0,
		'post_modified_gmt'     => 0,
		'post_content'          => '',
		'post_title'            => '',
		'post_excerpt'          => '',
		'post_content_filtered' => '',
		'post_mime_type'        => '',
		'post_password'         => '',
		'post_name'             => '',
		'guid'                  => '',
		'menu_order'            => 0,
		'pinged'                => '',
		'to_ping'               => '',
		'ping_status'           => '',
		'comment_status'        => 'open',
		'comment_count'         => 0,
		'filter'                => 'raw',

		'is_404'                => false,
		'is_page'               => false,
		'is_single'             => false,
		'is_archive'            => false,
		'is_tax'                => false,
		) );
}
		// Bail if dummy post is empty
if ( empty( $dummy ) ) {
	return;
}
		// Set the $post global
$post = new WP_Post( (object ) $dummy );
setup_postdata( $post );
		// Copy the new post global into the main $wp_query
$wp_query->post       = $post;
$wp_query->posts      = array( $post );

		// Prevent comments form from appearing
$wp_query->post_count = 1;
$wp_query->is_404     = $dummy['is_404'];
$wp_query->is_page    = $dummy['is_page'];
$wp_query->is_single  = $dummy['is_single'];
$wp_query->is_archive = $dummy['is_archive'];
$wp_query->is_tax     = $dummy['is_tax'];

}


function dwkb_load_template( $template ){
	// $template_folder = trailingslashit( get_template_directory() );
	$template_path = DWKB_DIR.'templates/front/';

	if ( is_singular( 'dwkb' ) ) {
		ob_start();
		include $template_path.'single-dwkb.php';

		$content = ob_get_contents();

		ob_end_clean();

		global $post;

		reset_content( array(
			'post_author'    => 0,
			'post_content'   => $content,
			'post_type'      => 'dwkb',
			'is_single'      => true,
			) );
		remove_all_filters( 'the_content' );
		return dwkb_get_template( 'page.php' );
	}

	if ( is_tax( 'dwkb_category' ) || is_tax( 'dwkb_tag' ) || is_post_type_archive( 'dwkb' ) ) {
		ob_start();
		include $template_path.'archive-dwkb.php';
		$content = ob_get_contents();
		ob_end_clean();

		global $post;
		if ( is_post_type_archive( 'dwkb' ) ) {
			reset_content( array(
			'post_title'     => get_the_archive_title(),
			'post_author'    => 0,
			'post_content'   => $content,
			'is_archive'     => true,
			) );

		} else {
			reset_content( array(
			'ID'             => $post->ID,
			'post_title'     => get_the_archive_title(),
			'post_author'    => 0,
			'post_date'      => $post->post_date,
			'post_content'   => $content,
			'post_status'    => $post->post_status,
			'is_tax'       => true,
			) );
		}

		remove_all_filters( 'the_content' );
		return dwkb_get_template( 'page.php' );

	}

	return $template;
}
add_filter( 'template_include', 'dwkb_load_template' );

function dwkb_get_template( $template = false ) {
	$templates = apply_filters( 'dwkb_get_template', array(
		'single-dwkb',
		'single.php',
		'page.php',
		'index.php',
	) );

	if ( isset( $template ) && file_exists( trailingslashit( get_template_directory() ) . $template ) ) {
		return trailingslashit( get_template_directory() ) . $template;
	}

	$old_template = $template;
	foreach ( $templates as $template ) {
		if ( $template == $old_template ) {
			continue;
		}
		if ( file_exists( trailingslashit( get_template_directory() ) . $template ) ) {
			return trailingslashit( get_template_directory() ) . $template;
		}
	}
	return false;
}

function dwkb_shortcode( $atts ) {
	ob_start();
	$return_string = require DWKB_DIR.'templates/front/index-dwkb-default.php';
	$return_string = ob_get_clean();
	wp_reset_query();
	return $return_string;
}

add_action('init', 'register_dwkb_shortcodes');
function register_dwkb_shortcodes(){
	add_shortcode( 'dwkb', 'dwkb_shortcode' );
}


add_action('admin_menu', 'dwkb_plugin_menu');
function dwkb_plugin_menu() {
	add_submenu_page( 'edit.php?post_type=dwkb', 'Settings', 'Settings', 'manage_options', 'dwkb_options', 'wp_dwkb_settings');
}

function wp_dwkb_settings(){
	?>
	<div class="wrap cmb2-options-page ">
		<h2><?php echo DWKB_MENU_NAME; ?> Setting</h2>
		<?php
		cmb2_metabox_form( 'dwkb_options', 'dwkb_options' );
		?>
	</div>
	<?php
}

function dwkb_set_article_views( $postID ) {
	$count_key = 'dwkb_post_views_count';
	$count = get_post_meta( $postID, $count_key, true );

	if ( $count == '' ){
		$count = 1;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '1' );
	} else {
		$count++;
		update_post_meta( $postID, $count_key, $count );
	}
}

function dwkb_get_article_views( $postID ) {
	$count_key = 'dwkb_post_views_count';
	$count = get_post_meta( $postID, $count_key, true );
	if ( ! $count ) {
		$count = 0;
	}
	return $count;
}

function dwkb_set_article_vote( $postID, $vote ) {

	$count_key = 'dwkb_post_vote_'.$vote.'_count';
	$count = get_post_meta( $postID, $count_key, true );

	if ( $count == '' ){
		$count = 1;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '1' );
	} else {
		$count++;
		update_post_meta( $postID, $count_key, $count );
	}
}


function dwkb_get_article_vote( $postID, $vote ) {
	$count_key = 'dwkb_post_vote_'.$vote.'_count';
	$count = get_post_meta( $postID, $count_key, true );
	if ( ! $count ) {
		$count = 0;
	}
	return $count;
}

function dwkb_include_for_author( $where ){
	if ( is_author() ) {
		$where = str_replace( ".post_type = 'post'", ".post_type in ('post', 'dwkb')", $where );
	}
	return $where;
}
add_filter( 'posts_where', 'dwkb_include_for_author' );

add_filter( 'manage_edit-dwkb_columns', 'dwkb_edit_columns' );
function dwkb_edit_columns($columns){
    $columns = array(
        'cb'		=> 	"<input type=\"checkbox\" />",
        'title' 	=> 	__( 'Title', 'dwkb' ),
        'author' => 	__( 'Author', 'dwkb' ),
        'dwkb_cat' 		=> 	__( 'Category', 'dwkb' ),
        'dwkb_tag' 		=> 	__( 'Tags', 'dwkb' ),
        'dwkb_comments' 	=> 	__('Comments', 'dwkb' ),
        'dwkb_views' 	=> 	__( 'Views', 'dwkb' ),
        'dwkb_date' 		=> 	__( 'Date', 'dwkb')
    );
    return $columns;
}

add_action( 'manage_pages_custom_column',  'dwkb_custom_columns' );
function dwkb_custom_columns( $column ){
    global $post;
    switch ( $column ) {
        case "title":
            the_title();
        break;
        case "author":
            the_author();
        break;
        case "dwkb_cat":
            echo get_the_term_list( $post->ID, 'dwkb_category' , ' ' , ', ' , '' );
        break;
        case "dwkb_tag":
            echo get_the_term_list( $post->ID, 'dwkb_tag' , ' ' , ', ' , '' );
        break;
        case "dwkb_comments":
            comments_number( __('No Comments','dwkb'), __('1 Comment','dwkb'), __('% Comments','dwkb') );
        break;
        case "dwkb_views":
            $views = get_post_meta( $post->ID, 'dwkb_post_views_count', true );
            if ( $views ) {
                echo $views .__(' Views', 'dwkb');
            }
        break;
        case "dwkb_date":
            the_date();
        break;
    }
}


function dwkb_action_vote() {

	$result = array(
		'error_code'    => 'authorization',
		'error_message' => __( 'Are you cheating, huh?', 'dwkb' ),
	);


	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( $_POST['nonce'] ), '_dwkb_vote_nonce' ) ) {
		wp_send_json_error( $result );
	}


	if ( ! isset( $_POST[ 'post_id' ] ) ) {
		$result['error_code']       = 'missing vote';
		$result['error_message']    = __( 'What article are you looking for?', 'dwkb' );
		wp_send_json_error( $result );
	}

	$post_id = sanitize_text_field( $_POST[ 'post_id' ] );
	$vote = sanitize_text_field( $_POST['vote'] );
	if ( isset( $_COOKIE['voted'] ) ) {
		if ( in_array( $post_id, $_COOKIE['voted'] ) ) {
   		$data['voted'] = 'voted';
   		$data['vote'] = $vote;
	 	} else {
	 		$data['voted'] = 'thanks';
	 		dwkb_set_article_vote( $post_id, $vote );
	 		$data['count'] = dwkb_get_article_vote( $post_id, $vote );
	 		$data['vote'] = $vote;
	 		setcookie( 'voted['.$post_id.']', $post_id );
	 	}

	} else {
		$data['voted'] = 'thanks';
 		dwkb_set_article_vote( $post_id, $vote );
 		$data['count'] = dwkb_get_article_vote( $post_id, $vote );
 		$data['vote'] = $vote;
 		setcookie( 'voted['.$post_id.']', $post_id );
	}


	wp_send_json_success( $data );

}
add_action( 'wp_ajax_dwkb-action-vote', 'dwkb_action_vote' );
add_action( 'wp_ajax_nopriv_dwkb-action-vote', 'dwkb_action_vote' );

function dwkb_suggest_for_search(){
		if ( ! isset( $_POST['nonce'])  ) {
			wp_send_json_error( array( array(
				'error' => 'sercurity',
				'message' => __( 'Are you cheating huh?', 'dwkb' )
			) ) );
		}
		check_ajax_referer( '_dwkb_filter_nonce', 'nonce' );

		if ( ! isset( $_POST['title'] ) ) {
			wp_send_json_error( array( array(
				'error' => 'empty title',
				'message' => __( 'Search query is empty', 'dwkb' ),
			) ) );
		}

		$status = 'publish';
		$search = sanitize_text_field( $_POST['title'] );
		$args_query = array(
			'post_type'			=> 'dwkb',
			'posts_per_page'	=> 6,
			'post_status'		=> $status,
		);
		preg_match_all( '/#\S*\w/i', $search, $matches );
		if ( $matches && is_array( $matches ) && count( $matches ) > 0 && count( $matches[0] ) > 0 ) {
			$args_query['tax_query'][] = array(
				'taxonomy' => 'dwkb_tag',
				'field' => 'slug',
				'terms' => $matches[0],
				'operator'  => 'IN',
			);
			$search = preg_replace( '/#\S*\w/i', '', $search );
		}
		$args_query['s'] = $search;
		$query = new WP_Query( $args_query );
		if ( ! $query->have_posts() ) {
			global $current_search;
			$current_search = $search;
			add_filter( 'posts_where' , array( $this, 'posts_where_suggest' ) );
			unset( $args_query['s'] );
			$query = new WP_Query( $args_query );
			remove_filter( 'posts_where' , array( $this, 'posts_where_suggest') );
		}
		$results = array();
		if ( $query->have_posts() ) {
			$html = '';
			while ( $query->have_posts() ) {
				$query->the_post();
				$results[] = array(
					'title' => get_post_field( 'post_title', get_the_ID() ),
					'url' => get_permalink( get_the_ID() )
				);
			}
			wp_reset_query();
			wp_send_json_success( $results );
		} else {
			wp_reset_query();
			wp_send_json_error( array( array( 'error' => 'not found', 'message' => __( 'Search query is empty', 'dwkb' ) ) ) );
		}
	}


add_action( 'wp_ajax_dwkb-auto-suggest-search-result', 'dwkb_suggest_for_search' );
add_action( 'wp_ajax_nopriv_dwkb-auto-suggest-search-result', 'dwkb_suggest_for_search' );
