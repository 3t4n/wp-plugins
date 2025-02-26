<?php

if ( !defined( 'ABSPATH' ) ) {
    return;
}

$QBTC_SLUG = 'quick-bulk-tags-creator';
$QBTC_TITLE = 'Quick Bulk Tags Creator';

add_action( 'admin_menu', 'qbtc_menu' );

/**
 * Add the options page to the settings menu
 * 
 * A callback function to the admin_menu event 
 *  
 * @version 0.1
 * @return  void
 ***/
function qbtc_menu() {
    
	global $QBTC_SLUG, $QBTC_TITLE;
	
	add_options_page( $QBTC_TITLE, $QBTC_TITLE, 'manage_options', $QBTC_SLUG, 'qbtc_render_options_page' );
    
}

/**
 * Render the options page
 *  
 * @version 0.1
 * @return  void
 ***/
function qbtc_render_options_page(){
	
	global $QBTC_TITLE;
	
	$filter_tags_file = file_get_contents('filter-tags.php', true);

	$data = array(
		'title' => $QBTC_TITLE,
		'filterTagsFile' => $filter_tags_file
	);

	wp_enqueue_script( 'ace-js', plugin_dir_url( __file__ ) . 'scripts/ace.js');
	wp_enqueue_script( 'options-page-js', plugin_dir_url( __file__ ) . 'scripts/options-page.js');
	
	wp_enqueue_style( 'options-page-css', plugin_dir_url( __file__ ) . 'css/options-page.css' );

	qbtc_render_tpl( 'templates/options-page.tpl', $data );
	
}



/**
 * Render a tpl file
 *   
 * @param   string $path tpl file path
 * @param   associative array $data
 * @version 0.1
 * @return  void
 ***/
function qbtc_render_tpl( $path, $data = array() ) {
    
    ob_start();
    include( $path );
    $output = ob_get_clean();
    echo $output;
    
}

/**
 * Append a settings link to the plugin actions links array
 * 
 * A callback function to the plugin_action_links filter event 
 *  
 * @param array $links
 * @version 0.1
 * @return  void
 ***/
function qbtc_add_settings_link( $links ) {
    
	global $QBTC_SLUG;
	
    $settings_link = "<a href='options-general.php?page=$QBTC_SLUG'>" . __( 'Settings' ) . '</a>';
    array_unshift( $links, $settings_link );
    
    return $links;
    
}

add_filter( "plugin_action_links_$QBTC_SLUG/$QBTC_SLUG.php", 'qbtc_add_settings_link' );


/**
 * Handle the form that is submitted by the bulk creator
 * 
 * A callback function to the wp_ajax_submit_form action
 *  
 * @version 0.1
 * @return  void
 ***/
function qbtc_form_submitted(){
	
	include_once('filter-tags.php');

	$tags = $_POST['tags'];
	// split tags by newlines - may contain entries like this [''] if the user entered extra newlines
	$tags = preg_split('/\r\n|\r|\n/', $tags);
	
		
	$splitPair = function($str){
		
		$trimSpace = function($str){
			return trim($str, ' ');
		};
		
		// trim the string pair
		$str = $trimSpace($str);
		$pair = explode(',', $str);
		
		// if there is only a a tag name then we set tag slug to be equal to tag name
		if (count($pair) === 1)
			$pair[1] = $pair[0];
		
		// trim each word in the pair after they were exploded(splitted)
		$pair = array_map($trimSpace, $pair);
		
		$pair = qbtc_filter_tags($pair);
		
		return $pair;
	};
	
	$tags = array_map($splitPair, $tags);
	$tags_not_added = array();
	$tagsAddedNum = 0;

	foreach ($tags as $pair) {
		$tagName = $pair[0];
		$tagSlug = $pair[1];
		if ($tagName !== '') {
			
			if(!term_exists( $tagName, 'post_tag' ) ) {
			  $args = array (
				'slug' => $tagSlug
			  );
			  wp_insert_term( $tagName , 'post_tag',$args );
			  $tagsAddedNum++;
			}
			else {
				array_push($tags_not_added, $pair);
			}
		}
	}
	
	$response = array(
		'tags_not_added' => $tags_not_added,
		'tagsAddedNum' => $tagsAddedNum
	);
		
	echo json_encode($response);
	wp_die();
}

add_action( 'wp_ajax_submit_form', 'qbtc_form_submitted' );


/**
 * Modifiy the edit-tags page for post tags taxonomies so it contains a link to the Quick Bulk Tags Creator settings page
 * 
 * A callback function to the post_tag_add_form_fields action
 *  
 * @version 0.1
 * @return  void
 ***/
function qbtc_modifiy_tags_page( ) {
	
	global $QBTC_SLUG;
	$link = "options-general.php?page=$QBTC_SLUG";
	
	echo "
		<script>
			jQuery(document).ready(function(){
				jQuery('#col-left .form-wrap h2').append(' or <a href=" . '"'  . $link  . '"'  . '>Add tags in bulk</a>' . "'" . ');
			});
		</script>
	';
    
}

add_action( "post_tag_add_form_fields", 'qbtc_modifiy_tags_page' );



