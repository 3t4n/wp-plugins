<?php
add_action( 'init','bpsfw_save_option');
function bpsfw_save_option() {
    if( current_user_can('administrator') ) { 

    	global $bpsfw_comman, $wp_roles;
    	$user_roles = $wp_roles->get_names();
    	$user_roles['guest']="Guest";

        if(isset($_REQUEST['bpsfw_private_store']) && $_REQUEST['bpsfw_private_store'] == 'bpsfw_save_option'){
        	if ( isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'build_save_action') ) {
                $isecheckbox = array(
                    'bpsfw_disble_price_addtocartbutton',
                    'bpsfw_include_p_categories',
                    'bpsfw_include_p_tags',
                    'bpsfw_approve_registration',
                    'bpsfw_account_disale_email',
                    'bpsfw_account_approve_email',
                    'bpsfw_admin_email',
                    'bpsfw_user_regi_email_notification'
                );

                foreach ($isecheckbox as $key_isecheckbox => $value_isecheckbox) {
                    if(!isset($_REQUEST['bpsfw_comman'][$value_isecheckbox])){
                        $_REQUEST['bpsfw_comman'][$value_isecheckbox] ='no';
                    }
                }

               	if(isset($user_roles)){
               		foreach ($user_roles as $user_roles_key => $user_roles_value) {
               			if(isset($_REQUEST['bpsfw_select2'][$user_roles_key])){
                   			$bpsfw_select2 = BPSFW_recursive_sanitize_text_field($_REQUEST['bpsfw_select2'][$user_roles_key]);
	            			update_option('wg_combo_'.$user_roles_key, $bpsfw_select2, 'yes');
	            		}else{
	            			update_option('wg_combo_'.$user_roles_key, '', 'yes');
	            		}

	            		if(isset($_REQUEST['bpsfw_cats_select2'][$user_roles_key])){
		                   	$bpsfw_cats_select2 = BPSFW_recursive_sanitize_text_field($_REQUEST['bpsfw_cats_select2'][$user_roles_key]);
	        				update_option('wg_cats_select2_'.$user_roles_key, $bpsfw_cats_select2, 'yes');
						}else{
		            		update_option('wg_cats_select2_'.$user_roles_key, '', 'yes');
						}

						if(isset($_REQUEST['bpsfw_tags_select2'][$user_roles_key])){
		                   	$bpsfw_tags_select2 = BPSFW_recursive_sanitize_text_field($_REQUEST['bpsfw_tags_select2'][$user_roles_key]);
	        				update_option('bpsfw_tags_select2_'.$user_roles_key, $bpsfw_tags_select2, 'yes');
						}else{
		            		update_option('bpsfw_tags_select2_'.$user_roles_key, '', 'yes');
						}

						if(isset($_REQUEST['wg_pags_select2'][$user_roles_key])){
		                   	$wg_pags_select2 = BPSFW_recursive_sanitize_text_field($_REQUEST['wg_pags_select2'][$user_roles_key]);
	        				update_option('wg_pags_select2_'.$user_roles_key, $wg_pags_select2, 'yes');
						}else{
		            		update_option('wg_pags_select2_'.$user_roles_key, '', 'yes');
						}

						if(isset($_REQUEST['bpsfw_redirect_url'][$user_roles_key])){
							$bpsfw_redirect_url = sanitize_text_field($_REQUEST['bpsfw_redirect_url'][$user_roles_key]);
							update_option('bpsfw_redirect_url_'.$user_roles_key, $bpsfw_redirect_url, 'yes');
						}else{
							update_option('bpsfw_redirect_url_'.$user_roles_key, '', 'yes');
						}

						if(isset($_REQUEST['bpsfw_prod_redirect_url'][$user_roles_key])){
							$bpsfw_prod_redirect_url = sanitize_text_field($_REQUEST['bpsfw_prod_redirect_url'][$user_roles_key]);
							update_option('bpsfw_prod_redirect_url_'.$user_roles_key, $bpsfw_prod_redirect_url, 'yes');
						}else{
							update_option('bpsfw_prod_redirect_url_'.$user_roles_key, '', 'yes');
						}
               		}
                }

				if(isset($_REQUEST['bpsfw_form_bg_image'])){
                   	$bpsfw_form_bg_image = BPSFW_recursive_sanitize_text_field( $_REQUEST['bpsfw_form_bg_image']);
    				update_option('bpsfw_form_bg_image', $bpsfw_form_bg_image, 'yes');
				}else{
            		update_option('bpsfw_form_bg_image', '', 'yes');
				}
     
                foreach ($_REQUEST['bpsfw_comman'] as $key_bpsfw_comman => $value_bpsfw_comman) {
                    update_option($key_bpsfw_comman, sanitize_text_field($value_bpsfw_comman), 'yes');
                }
                 
                wp_redirect( admin_url( '/admin.php?page=private-store&message=success' ) );
                exit;     
            }else{
            	 wp_die('Security check failed.');
            }
        }
    }
}
add_action( 'wp_ajax_nopriv_wg_product_ajax','BPSFW_product_ajax');
add_action( 'wp_ajax_wg_product_ajax','BPSFW_product_ajax');
add_action( 'wp_ajax_nopriv_wg_cats_ajax','BPSFW_cats_ajax');
add_action( 'wp_ajax_wg_cats_ajax','BPSFW_cats_ajax');
add_action( 'wp_ajax_nopriv_wg_tags_ajax','BPSFW_tags_ajax');
add_action( 'wp_ajax_wg_tags_ajax','BPSFW_tags_ajax');
add_action( 'wp_ajax_nopriv_wg_pages_ajax','BPSFW_pages_ajax');
add_action( 'wp_ajax_wg_pages_ajax','BPSFW_pages_ajax');
function BPSFW_product_ajax() {
	if ( ! isset( $_GET['nonce'] ) || ! wp_verify_nonce( $_GET['nonce'], 'bpsfw_ajax_nonce' ) ) {
        wp_die( 'Security check failed. Nonce is invalid.' );
    }
    $return = array();
    $post_types = array( 'product','product_variation');
    $search_results = new WP_Query( array( 
        's'=> sanitize_text_field($_GET['q']),
        'post_status' => 'publish',
        'post_type' => $post_types,
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => '_stock_status',
                'value' => 'instock',
                'compare' => '=',
            )
        )
    ));

    if( $search_results->have_posts() ) :
       	while( $search_results->have_posts() ) : $search_results->the_post();   
          	$productc = wc_get_product( $search_results->post->ID );
          	if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
				$title = $search_results->post->post_title;
				$price = $productc->get_price_html();
				$return[] = array( $search_results->post->ID, $title, $price);   
          	}
       	endwhile;
    endif;
    echo json_encode( $return );
    die;
}

function BPSFW_cats_ajax() {
	if ( ! isset( $_GET['nonce'] ) || ! wp_verify_nonce( $_GET['nonce'], 'bpsfw_ajax_nonce' ) ) {
	    wp_die( 'Security check failed. Nonce is invalid.' );
	}
		$return = array();

	$product_categories = get_terms( ['taxonomy' => 'product_cat'] );

	if( !empty($product_categories) ){
	    foreach ($product_categories as $key => $category) {
	        $category->term_id;
	        $title = ( mb_strlen( $category->name ) > 50 ) ? mb_substr( $category->name, 0, 49 ) . '...' : $category->name;
	        $return[] = array( $category->term_id, $title );
	    }
	}

	echo json_encode( $return );
	die;
}

function BPSFW_tags_ajax() {
	if ( ! isset( $_GET['nonce'] ) || ! wp_verify_nonce( $_GET['nonce'], 'bpsfw_ajax_nonce' ) ) {
	    wp_die( 'Security check failed. Nonce is invalid.' );
	}
		$return = array();

		$args = array(
	    'number'     => '',
	    'orderby'    => '',
	    'order'      => '',
	    'hide_empty' => '',
	    'include'    => ''
	);

	$product_tags = get_terms( 'product_tag', $args );

	if( !empty($product_tags) ){
	    foreach ($product_tags as $key => $tag) {
	        $tag->term_id;
	        $title = ( mb_strlen( $tag->name ) > 50 ) ? mb_substr( $tag->name, 0, 49 ) . '...' : $tag->name;
	        $return[] = array( $tag->term_id, $title );
	    }
	}

	echo json_encode( $return );
	die;
}

function BPSFW_pages_ajax() {
	if ( ! isset( $_GET['nonce'] ) || ! wp_verify_nonce( $_GET['nonce'], 'bpsfw_ajax_nonce' ) ) {
	    wp_die( 'Security check failed. Nonce is invalid.' );
	}
		$return = array();

	$pages = get_pages();

	if( !empty($pages) ){
	    foreach ($pages as $key => $page) {
	        $page->ID;
	        $title = $page->post_title;
	        $return[] = array( $page->ID, $title );
	    }
	}

	echo json_encode( $return );
	die;
}
function BPSFW_recursive_sanitize_text_field( $array ) {
	if (is_array($array) || is_object($array)){
        foreach ( $array as $key => &$value ) {
            if ( is_array( $value ) ) {
                $value = BPSFW_recursive_sanitize_text_field($value);
            }else{
                $value = sanitize_text_field( $value );
            }
        }
	}
    return $array;

}