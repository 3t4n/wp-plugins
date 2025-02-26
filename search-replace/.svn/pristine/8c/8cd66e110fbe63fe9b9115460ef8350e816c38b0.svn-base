<?php

/*

Plugin Name: Search and Replace

Plugin URI: http://www.info-d-74.com

Description: Search and replace into any pages and posts

Version: 1.36

Author: InfoD74

Author URI: http://www.info-d-74.com/en/shop

Text Domain: search-replace

Domain Path: /languages

*/



add_action( 'admin_menu', 'register_search_and_replace_menu' );

function register_search_and_replace_menu() {



	if(is_admin())

		add_menu_page('Search and Replace', 'Search and Replace', 'edit_pages', 'search-and-replace', 'search_and_replace',  esc_url(plugins_url( 'search-replace/images/icon.png' )), 30);



}



add_action('admin_print_styles', 'search_and_replace_css' );

   

function search_and_replace_css() {

	//die( print plugins_url('css/style.css', __FILE__));

    wp_enqueue_style( 'SearchAndReplaceFreeStylesheet', esc_url(plugins_url('css/style.css', __FILE__)) );

    //wp_enqueue_style( 'SearchAndReplaceStylesheet' );

}



function search_and_replace() {



	echo '<h1>'.esc_html(__('Search and replace', 'search-replace')).'</h1>';



	if(is_admin() && current_user_can('manage_options'))

	{



		//on traite les données sousmises

		

		if(sizeof($_POST) > 0)

		{

			check_admin_referer( 'search_replace' );



			global $wpdb;



			if(!empty($_POST['post']))

				$where[] = "post_type = 'post'";

			if(!empty($_POST['page']))

				$where[] = "post_type = 'page'";



			if(sizeof($where) == 0)

			{

				echo '<h2>'.esc_html(__('You must select at least one type of content!', 'search-replace')).'</h2>';

			}

			else

			{



				$where_query = implode(' OR ', $where);



				$search = stripslashes_deep($_POST['s']);

				$replace = stripslashes_deep($_POST['r']);



				$query = $wpdb->prepare( 

						"UPDATE ".$wpdb->posts."

						 SET post_excerpt = REPLACE(post_excerpt, %s, %s),

						 post_content = REPLACE(post_content, %s, %s),

						 post_title = REPLACE(post_title, %s, %s)

						 WHERE ".$where_query,

					     $search, $replace, $search, $replace, $search, $replace

				);



				$res = $wpdb->query( 

					$query

				);



				echo '<h2>'.esc_html(__('Done!', 'search-replace')).' '.sprintf( esc_html(__('%d rows were changed', 'search-replace')), (int)$res).'</h2>';



			}



		}



		include(plugin_dir_path( __FILE__ ) . 'templates/form.php');

	}

	else

		esc_html_e('Denied ! You must be admin.', 'search-replace');



}



function search_and_replace_textdomain() {

    load_plugin_textdomain( 'search-replace', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

}

add_action( 'plugins_loaded', 'search_and_replace_textdomain' );



?>