<?php

//Add Public CSS/JS

function lmlm_add_public_css_js() {
    global $lmlm_options;
	
    //Add CSS to header
	wp_enqueue_style( 'lamlim-button', LMLM_CSS_URL . 'lamlim-button.css' );
   
   
    if  ( $lmlm_options['button_style'] == 'user_selected' && is_single()) {
        //Fire off Lamlim's lamlimha.js
   		wp_enqueue_script( 'lamlim-button-user-selects-image', LMLM_JS_URL . 'lamlim-button-user-selects-image.js', array( 'jquery' ) );
     
    }
    
        
        
}

add_action( 'wp_enqueue_scripts', 'lmlm_add_public_css_js' );

//Add Custom CSS

function lmlm_add_custom_css() {
    global $lmlm_options;
    
    $custom_css = trim( $lmlm_options['custom_css'] );
    
	if ( !empty( $custom_css ) ) {
        echo "\n" . '<style type="text/css">' . "\n" . $custom_css . "\n" . '</style>' . "\n";
	}
}

add_action( 'wp_head', 'lmlm_add_custom_css' );

//Function for rendering "Lamlim" button base html

function lmlm_button_base( $post_url, $image_url, $description, $count_layout, $always_show_count ) {
    global $lmlm_options;
	
    $html="<a href=\"javascript:var ipinsite='%D9%84%D9%85%D9%84%D9%85',ipinsiteurl='http://lamlim.com/';(function(){if(window.ipinit!==undefined){ipinit();}else{document.body.appendChild(document.createElement('script')).src='http://lamlim.com/wp-content/themes/ipinpro/js/ipinit.js';}})();\"><img src=\"http://lamlim.com/wp-content/uploads/2014/08/lamlimha.png\" /></a>";
    return $html;
    
//    $btn_class = '';
//    $btn_img_url = '';
//
//    //Specify no-iframe class for all but Stock button
//    if ( ( $lmlm_options['button_style'] != 'image_selected' ) || (bool)$lmlm_options['use_custom_img_btn'] ) {
//        $btn_class .= 'lamlim-button-no-iframe';
//    }
//    
//   
//    //Default non-sprite button image url from Lamlim
//    $btn_img_url = LMLM_IMAGES_URL. 'lamlimha.png';
//    
//    
//    
//    //User selects image (default)
//    //$lmlm_options['button_style'] == 'user_selects_image' (or blank)
//    
//    $btn_class .= ' lamlim-button-user-selects-image';
//    
//	
//	$inner_btn_html = '<img alt="'. __('Lamlim','lmlm') .'" border="0" src="' . $btn_img_url . '" width="48px" height="21px" title="' . __('Add this page to your board at lamlim.com','lmlm').'" />';
//	$full_btn_html = '';
//    
//    //Link href always needs all the parameters in it for the count bubble to work
//    $link_href = 'http://lamlim.com/?q=node/add/pin&url=' . rawurlencode( $post_url ) . '&media=' . rawurlencode( $image_url ) . 
//        '&title='. rawurlencode( $description );
//	
//	//Full link html with attributes
//	
//    $link_html = '<a target="_blanck" href="' . $link_href . '" ' . '" class="' . $btn_class . '" rel="nobox" ' . '>' . $inner_btn_html . '</a>';
//    $full_btn_html = $link_html;
//		
//    return $full_btn_html;
}

//Button HTML to render

function lmlm_button_html() {
    global $lmlm_options;
	global $post;
    $postID = $post->ID;
    
    //Use featured image if specified (also not blank and Pro only)
    $featured_img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'full' );
    $featured_img_url = $featured_img_array[0];
    
    //Set post url to current post if still blank
    if ( empty( $post_url ) ) { $post_url = get_permalink( $postID ); }
    
    //Set image url to first image if still blank
    if ( empty( $image_url ) ) {
        //Get url of img and compare width and height
        $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
        $first_img = $matches [1] [0];
        $image_url = $first_img;
    }
    
    //Set description to post title if still blank
    if ( empty( $description ) ) { $description = get_the_title( $postID ); }
    
	
    $base_btn = lmlm_button_base( $post_url, $image_url, $description, $count_layout, $always_show_count );
    
    $align='center';
	if($lmlm_options['align']==0){
		$align='right';
	}else if($lmlm_options['align']==1){
		$align='center';
	}else if($lmlm_options['align']==2){
		$align='left';
	}
	
    return '<div class="lamlim-btn-wrapper" style="text-align:'.$align.'">' . $base_btn . '</div>';
    
}

//Share Bar HTML to render (pass through button unless Pro)

function lmlm_sharebar_html() {
    global $lmlm_options;
	global $post;
    $postID = $post->ID;
   
        return lmlm_button_html();
    
}

//Render share bar on pages with regular content

function lmlm_render_content( $content ) 
{
    global $lmlm_options;
 	global $post;    
	$postID = $post->ID;

    //Determine if button displayed on current page from main admin settings
    if (
        ( is_home() && ( (bool)$lmlm_options['display_home_page'] ) ) ||
        ( is_front_page() && ( (bool)$lmlm_options['display_front_page'] ) ) ||
		( is_single() && ( (bool)$lmlm_options['display_posts'] ) ) ||
        ( is_page() && ( (bool)$lmlm_options['display_pages'] ) && !is_front_page() ) ||
        
        //archive pages besides categories (tag, author, date, search)
        //http://codex.wordpress.org/Conditional_Tags
        ( is_archive() && ( (bool)$lmlm_options['display_archives'] ) && 
            ( is_tag() || is_author() || is_date() || is_search() ) 
        )
	//is_single() || is_page() || is_home()
	//(is_page() && !is_front_page() )
	
       ) {
        if ( (bool)$lmlm_options['display_above_content'] ) {
            $content = lmlm_sharebar_html( $postID ) . $content;
        }
        if ( (bool)$lmlm_options['display_below_content'] ) {
            $content .= '<br>' . lmlm_sharebar_html( $postID );
        }
    }	
	 
	//Determine if displayed on Category on the base of category edit Screen Option
	/*if ( is_archive() && ( (bool)$lmlm_options['display_archives'] ) ) {
		$tag_extra_fields = get_option( LMLM_CATEGORY_FIELDS );
		$category_ids = get_all_category_ids();
		foreach( $category_ids as $term_id ) {					 
			if( !$tag_extra_fields[$term_id]['checkbox'] ) {
				
				if( is_category($term_id) ) {
					if ( (bool)$lmlm_options['display_above_content'] ) {
						$content = lmlm_sharebar_html( $postID ) . $content;
					}
					if ( (bool)$lmlm_options['display_below_content'] ) {
						$content .= lmlm_sharebar_html( $postID );
					}
				}
			}				
		}
	}*/
    
	return $content;
}

add_filter( 'the_content', 'lmlm_render_content' );

//Render share bar on pages with excerpts if option checked

function lmlm_render_content_excerpt( $content ) {
    global $lmlm_options;
    global $post;
	$postID = $post->ID;
	
	
    if ( $lmlm_options['display_on_post_excerpts'] ) {
        //if (
        //    ( is_home() && ( $lmlm_options['display_home_page'] ) ) ||
        //    ( is_front_page() && ( $lmlm_options['display_front_page'] ) )           
        //   ) {
            if ( $lmlm_options['display_above_content'] ) {
                $content = lmlm_sharebar_html( $postID ) . $content;
            }
            if ( $lmlm_options['display_below_content'] ) {
                $content .= lmlm_sharebar_html( $postID );
            }
        //}   
	
		//Determine if displayed on Category on the base of category edit Screen Option
		/*if( is_archive() && ( $lmlm_options['display_archives'] ) ) {
				
            $tag_extra_fields = get_option( LMLM_CATEGORY_FIELDS );
            $category_ids = get_all_category_ids();
            foreach( $category_ids as $term_id ) {                     
                if( !$tag_extra_fields[$term_id]['checkbox'] ) {                            
                    
                    if(is_category($term_id)) {	
                        if ( $lmlm_options['display_above_content'] ) {
                            $content = lmlm_sharebar_html( $postID ) . $content;
                        }
                        if ( $lmlm_options['display_below_content'] ) {
                            $content .= lmlm_sharebar_html( $postID );
                        }
                    }
                }
            }
		}*/
	}
    
	return $content;
}

add_filter( 'the_excerpt', 'lmlm_render_content_excerpt' );

?>
