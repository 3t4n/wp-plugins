<?php

if ( ! function_exists('is_plugin_inactive')) {
	require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
}

function insert_new_post($body, $title, $page){
	global $wpdb;

	$page_duplicate = array(
		'post_author' => 1,
		'post_date' => date('Y-m-d H:i:s'),
		'post_date_gmt' => date('Y-m-d H:i:s'),
		'post_content' => stripcslashes($body),
		'post_title' => wp_strip_all_tags($title),
		'post_name' => sanitize_title($title),
		'post_excerpt' => '',
		'post_status' => 'publish',
		'comment_status' => 'open',
		'ping_status' => 'open',
		'post_modified' => date('Y-m-d H:i:s'),
		'post_modified_gmt' => date('Y-m-d H:i:s'),
		'post_type' => 'page',
		'guid' => $page['guid'],
		'comment_count' => 0
	);

	$my_post_Format = array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');
	$wpdb->insert( $wpdb->prefix . 'posts', $page_duplicate);
	$new_page_id = 	$wpdb->insert_id;

	if($wpdb->last_error !== '') :
		$str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
		$query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );

		print "<div id='error'>
		<p class='wpdberror'><strong>WordPress database error:</strong> [$str]<br />
		<code>$query</code></p>
		</div>";

		die();

	endif;

	$query = "UPDATE ".$wpdb->prefix . 'posts'." SET post_content = replace(post_content, '\\\', '') WHERE ID = " . $new_page_id;
	$wpdb->query( $query );

	if($wpdb->last_error !== '') :
		$str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
		$query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );

		print "<div id='error'>
		<p class='wpdberror'><strong>WordPress database error:</strong> [$str]<br />
		<code>$query</code></p>
		</div>";

		die();

	endif;

	return $new_page_id;
}



	if(isset($_REQUEST['rs_duplacate_page']) && is_numeric($_REQUEST['rs_duplacate_page'])){
	rs_insert_duplicate_page_form($nation);
	}


function rs_insert_duplicate_page_form($nation){
	global $wpdb;
	$page = get_post( $_REQUEST['rs_duplacate_page'], 'ARRAY_A' );

	/* CHECK IF EXIST DUPLICATE PAGE */
	$duplicates_row = $wpdb->get_results( 'SELECT * FROM '. $wpdb->prefix . 'seo_multi_position WHERE page_id = ' . $page['ID'], 'ARRAY_A' );
	if( sizeof($duplicates_row) > 0 ){

		if(
			( $_POST['save'] == "Save Draft" || $_POST['save'] == "Salva bozza" )
			|| ( $_POST['action'] == 'editpost' && $_POST['original_post_status'] == 'draft' )
			|| ( $_POST['action'] == 'editpost' && $_POST['original_post_status'] == 'auto-draft' )
		){

			/* UPDATE */
			foreach ($duplicates_row as $duplicate_row ) {

				if( use_block_editor_for_post_type('post') == 1 ){
					// use gutenberg
					$_post = get_post($_POST['post_ID']);
					$post_title = $_post->post_title;
					$post_content = $_post->post_content;
				}else{
					$post_title = $_POST['post_title'];
					$post_content = $_POST['post_content'];
				}

				$count_occurrency_pv_title = substr_count($post_title, '[[termine]]');
				$count_occurrency_pv_content= substr_count($post_content, '[[termine]]');

				if( $count_occurrency_pv_title > 0 || $count_occurrency_pv_content > 0 ){

					/**
					* provinces PRESENTI
					**/

					//echo "provinces PRESENTI\n";
					//echo "sostituisco [[termine]] con ".$duplicate_row['province']."\n";

					$body_agg = str_replace("[[termine]]", $duplicate_row['province'], $post_content);
					$title_agg = str_replace("[[termine]]", $duplicate_row['province'], $post_title);
				}

				$page_val = array(
				'post_author' => 1,
				'post_date' => date('Y-m-d H:i:s'),
				'post_date_gmt' => date('Y-m-d H:i:s'),
				'post_content' => $body_agg,
				'post_title' => wp_strip_all_tags($title_agg),
				'post_name' => sanitize_title($title_agg),
				'post_excerpt' => '',
				'post_status' => 'publish',
				'comment_status' => 'open',
				'ping_status' => 'open',
				'post_modified' => date('Y-m-d H:i:s'),
				'post_modified_gmt' => date('Y-m-d H:i:s'),
				'post_type' => 'page',
				'guid' => $page['guid'],
				'comment_count' => 0
				);

				$wpdb->update($wpdb->prefix.'posts', $page_val, array('ID' => $duplicate_row['sub_page']));
				update_post_meta( $duplicate_row['sub_page'], '_wp_page_template', $_POST["page_template"] );

				/* WPML */
				if(is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ))
				{
					$args = array('element_id' => $duplicate_row['sub_page'], 'element_type' => 'page' );
					$language_info = (array)apply_filters( 'wpml_element_language_details', null, $args );
					$language_info['element_id'] = $duplicate_row['sub_page'];

					$wpdb->insert("{$wpdb->prefix}icl_translations", $language_info);
				}

				/* YOAST */
				$yoast_title = get_post_meta( $page['ID'], '_yoast_wpseo_title', true);
				$yoast_description = get_post_meta( $page['ID'], '_yoast_wpseo_metadesc', true);
				if($yoast_title != '')
			    {
				    $duplicated_yoast_title = str_replace("[[termine]]", $duplicate_row['province'], $yoast_title);
				    update_post_meta($duplicate_row['sub_page'], '_yoast_wpseo_title', $duplicated_yoast_title);
			    }

			    if($yoast_description != '')
			    {
				    $duplicated_yoast_description = str_replace("[[termine]]", $duplicate_row['province'], $yoast_description);
				    update_post_meta($duplicate_row['sub_page'], '_yoast_wpseo_metadesc', $duplicated_yoast_description);
			    }

				/* chek if theme is Enfold */

				if ((string)$_POST['enfold'] == "1"){

					$theme = wp_get_theme();
					if(version_compare($theme->version, '4.2.1') == 1)
					{
						AviaBuilder::set_alb_builder_status('active', $duplicate_row['sub_page'] );
						AviaBuilder::save_posts_alb_content($duplicate_row['sub_page'], $body_agg);
					}
					else
					{
						update_post_meta($duplicate_row['sub_page'], '_aviaLayoutBuilder_active', 'active');
						update_post_meta($duplicate_row['sub_page'], '_aviaLayoutBuilderCleanData', $body_pv);
					}


					$tree = ShortcodeHelper::build_shortcode_tree( $body_agg );
					update_post_meta( $duplicate_row['sub_page'], '_avia_builder_shortcode_tree', $tree );

					update_post_meta($duplicate_row['sub_page'], 'layout', $_POST['layout']);
					update_post_meta($duplicate_row['sub_page'], 'footer', $_POST['footer']);
					update_post_meta($duplicate_row['sub_page'], 'header_title_bar', $_POST['header_title_bar']);
					update_post_meta($duplicate_row['sub_page'], 'header_transparency', $_POST['header_transparency']);

				}
			}
		}
	}else{

		/* INSERT */
		if(
			( $_POST['save'] == "Save Draft" || $_POST['save'] == "Salva bozza" )
			|| ( $_POST['action'] == 'editpost' && $_POST['original_post_status'] == 'draft' )
			|| ( $_POST['action'] == 'editpost' && $_POST['original_post_status'] == 'auto-draft' )
		){

			$nations	= new $nation();
			$provinces = $nations->getProvinces();
			//valori di test
			//$provinces = array("AG" => "Agrigento", "AN" => "Ancona");
			/**
			* replace Province [[termine]]
			**/

			if( use_block_editor_for_post_type('post') == 1 ){
				// use gutenberg
				$_post = get_post($_POST['post_ID']);
				$post_title = $_post->post_title;
				$post_content = $_post->post_content;
			}else{
				$post_title = $_POST['post_title'];
				$post_content = $_POST['post_content'];
			}

			$count_occurrency_pv_title = substr_count($post_title, '[[termine]]');
			$count_occurrency_pv_content= substr_count($post_content, '[[termine]]');

			/**
			* BEGIN
			**/

			if( $count_occurrency_pv_title > 0 || $count_occurrency_pv_content > 0 ){

				/**
				* provinces PRESENTI
				**/
				$prv = '';

				//echo "provinces PRESENTI\n";
				foreach($provinces AS $pv){
					$prv = $prv .  $pv;
					//echo "CICLO LE PROVINCE\n";
					//echo "sostituisco [[termine]] con ".$pv."\n";

					$body_pv = str_replace("[[termine]]", $pv, $post_content);
					$title_pv = str_replace("[[termine]]", $pv, $post_title);

					$new_page_id = insert_new_post($body_pv, $title_pv, $page);
					add_post_meta( $new_page_id, '_wp_seo_mp_parent', $page['ID'] );
					add_post_meta( $new_page_id, '_wp_page_template', $_POST["page_template"] );

					/* WPML */
					if(is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ))
					{
						$args = array('element_id' => $new_page_id, 'element_type' => 'page' );
						$language_info = (array)apply_filters( 'wpml_element_language_details', null, $args );
						$language_info['element_id'] = $new_page_id;

						$wpdb->insert("{$wpdb->prefix}icl_translations", $language_info);
					}

					/* YOAST */
					$yoast_title = get_post_meta( $page['ID'], '_yoast_wpseo_title', true);
					$yoast_description = get_post_meta( $page['ID'], '_yoast_wpseo_metadesc', true);
					if($yoast_title != '')
					{
						$duplicated_yoast_title = str_replace("[[termine]]", $pv, $yoast_title);
						update_post_meta($new_page_id, '_yoast_wpseo_title', $duplicated_yoast_title);
					}

					if($yoast_description != '')
					{
						$duplicated_yoast_description = str_replace("[[termine]]", $pv, $yoast_description);
						update_post_meta($new_page_id, '_yoast_wpseo_metadesc', $duplicated_yoast_description);
					}

					/* check if theme is Enfold */
					if ((string)$_POST['enfold'] == "1"){

						$theme = wp_get_theme();
						if(version_compare($theme->version, '4.2.1') == 1)
						{
							AviaBuilder::set_alb_builder_status('active', $new_page_id );
							AviaBuilder::save_posts_alb_content($new_page_id, $body_pv);
						}
						else
						{
							update_post_meta($new_page_id, '_aviaLayoutBuilder_active', 'active');
							update_post_meta($new_page_id, '_aviaLayoutBuilderCleanData', $body_pv);
						}

						$tree = ShortcodeHelper::build_shortcode_tree( $body_pv );
						update_post_meta( $new_page_id, '_avia_builder_shortcode_tree', $tree );

						add_post_meta($new_page_id, 'layout', $_POST['layout']);
						add_post_meta($new_page_id, 'footer', $_POST['footer']);
						add_post_meta($new_page_id, 'header_title_bar', $_POST['header_title_bar']);
						add_post_meta($new_page_id, 'header_transparency', $_POST['header_transparency']);
					}

					$args = array(
						'page_id' => $page['ID'],
						'sub_page' => $new_page_id,
						'province' => $pv,
					);
					$my_post_Format = array('%s','%s','%s');
					$wpdb->insert( $wpdb->prefix . 'seo_multi_position', $args, $my_post_Format);
				}
			}
		}
 }  // riabilitare nel caso attivare update

}

function rs_delete_relation(){
	global $wpdb;

	if(isset($_REQUEST['delete_all']))
	{
		$args = array(
			'posts_status' => 'trash',
			'posts_per_page' => -1,
		);
		$posts = get_posts($args);

		foreach($posts as $post)
		{
			$wpdb->delete( $wpdb->prefix . 'seo_multi_position',  array( 'sub_page' => $post->ID ));
			$wpdb->delete( $wpdb->prefix . 'seo_multi_position',  array( 'page_id' => $post->ID ));
		}
	}

	if(is_numeric($_REQUEST['post']))
	{
		$p = $_REQUEST['post'];
		$wpdb->delete( $wpdb->prefix . 'seo_multi_position',  array( 'sub_page' => $p ));
		$wpdb->delete( $wpdb->prefix . 'seo_multi_position',  array( 'page_id' => $p ));
	}

	if(is_array($_REQUEST['post']))
	{
		foreach( $_REQUEST['post'] AS $p ){
			$wpdb->delete( $wpdb->prefix . 'seo_multi_position',  array( 'sub_page' => $p ));
			$wpdb->delete( $wpdb->prefix . 'seo_multi_position',  array( 'page_id' => $p ));
		}
	}

}


?>
