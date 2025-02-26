<?php 

add_filter('the_content', 'wts_filter_content');
function wts_filter_content( $content ){
	global $post;
	if( get_post_type($post->ID) == 'tip' && is_single() ){
		$content = wts_generate_tip( $post->ID );
	}
	return $content;
}


add_filter( 'manage_edit-tip_columns', 'wtb_edit_movie_columns' ) ;
function wtb_edit_movie_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'author' => __( 'Author' ),
		'tip_category' => __( 'Category' ),
		'date' => __( 'Date' ),
		'ID' => __( 'ID' ),
		//'votes' => __( 'Number of Votes' ),
		'shortcode' => __( 'Shortcode' ),
	);

	return $columns;
}


add_action( 'manage_tip_posts_custom_column', 'wtb_manage_tip_columns', 10, 2 );

function wtb_manage_tip_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'votes' :
			if( get_post_meta( $post_id, 'votes', true ) != '' ){
				echo get_post_meta( $post_id, 'votes', true );
			}else{
				echo '0';
			}
			break;
		case 'ID' :
			echo $post_id;
			break;

		case 'tip_category' :
			$terms = wp_get_post_terms( $post_id, 'tip_category' );
			$out = array();
			foreach( $terms as $single_term ){
				$out[] = $single_term->name;
			}
			echo implode(',', $out);
			break;	
			
		case 'shortcode':
			echo '[single_tip id="'.$post_id.'"]';
			break;
		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}

add_action('wp_head', 'wtb_add_font');
function wtb_add_font(){
echo "<link href='http://fonts.googleapis.com/css?family=Cabin+Sketch' rel='stylesheet' type='text/css'>";
}

function ubl_add_tinymce() {
     
    global $typenow;
    if(!in_array($typenow, array('post', 'page'))) return ;
    add_filter( 'mce_external_plugins', 'ubl_add_tinymce_plugin' );
    add_filter( 'mce_buttons', 'ubl_add_tinymce_button' );
     
}
 
// inlcude the js for tinymce
function ubl_add_tinymce_plugin( $plugin_array ) {
 
    $plugin_array['ubl_location'] = plugins_url( '/editor_plugin.js.php', __FILE__ );
    return $plugin_array;
     
}
 
// Add the button key for address via JS
function ubl_add_tinymce_button( $buttons ) { 
    array_push( $buttons, 'shortcodes' );
    return $buttons;
     
}
 
add_action( 'admin_head', ubl_add_tinymce );


add_action('admin_footer', 'wts_add_cont');
function wts_add_cont(){
	echo '
	<div class="tw-bs" id="fake_body"></div>
	';
}

?>