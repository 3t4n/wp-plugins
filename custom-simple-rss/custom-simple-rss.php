<?php
/**
/*
 * Plugin Name:   Custom Simple Rss
 * Plugin URI:    
 * Description:   A plugin to create a Custom Simple RSS Feed according to chosen parameters
 * Version:       2.1.4
 * Author:        Danny(Danikoo) Haggag 
 * Author URI:    http://www.danikoo.com
 * License: GPLv2 or later
 */


if ( is_admin() ){
    require_once dirname( __FILE__ ) . '/custom-simple-rss-admin.php';

    //============ create settings link at plugins page =================//
    function custom_simple_rss_plugin_action_links( $links, $file ) {
        if ( $file == plugin_basename( dirname(__FILE__).'/custom-simple-rss.php' ) ) {
            $links[] = '<a href="' . admin_url( 'admin.php?page=custom-simple-rss-admin-options' ) . '">'.__( 'Settings' ).'</a>';
            }
            return $links;
        }
        add_filter('plugin_action_links', 'custom_simple_rss_plugin_action_links', 10, 2);
}
 
function call_custom_simple_rss(){
   
    $custom_simple_rss_options = get_option('custom_simple_rss_options');
	if(is_array($custom_simple_rss_options)===false){
		//set defaults and return array 
		$custom_simple_rss_options = custom_simple_rss_set_defults();
	}
	//print_r($custom_simple_rss_options);
    $csrp_show_post_terms = $csrp_debug = $csrp_show_all_post_terms = null;
     
	extract($custom_simple_rss_options);
    $options['csrp_show_content'] = $csrp_show_content;
	$options['csrp_show_description'] = $csrp_show_description;
    $options['csrp_show_thumbnail'] = $csrp_show_thumbnail;
    $options['csrp_show_post_terms'] = $csrp_show_post_terms;
    $options['csrp_allowed_tags'] = $csrp_allowed_tags;
    $options['csrp_pubdate_date_format'] = $csrp_pubdate_date_format;
	/*
	=========================
	GET
	=========================
	*/	
	if( isset($_GET["csrp_debug"]) ) $csrp_debug = intval($_GET["csrp_debug"]);
    $options['csrp_debug'] = $csrp_debug;
    
	if( isset($_GET["csrp_key"]) ){
		$csrp_key = sanitize_text_field($_GET["csrp_key"]);	
	} else{
		$csrp_key =	'';
	}
	
	if($csrp_key!=$csrp_secret_key) {
			echo "csrp_key was not specified or is wrong";
			return;
	}
	
	if($csrp_allowed_tags=='' || empty($csrp_allowed_tags)){
		$csrp_allowed_tags = CUSTOM_SIMPLE_RSS_PLUGIN_ALLOWED_TAGS;
	}
    $options['csrp_allowed_tags'] = $csrp_allowed_tags;
	
	if( isset($_GET["csrp_show_meta"]) ) $csrp_show_meta = intval($_GET["csrp_show_meta"]);
    $options['csrp_show_meta'] = $csrp_show_meta;
    
	if( isset($_GET["csrp_cat"]) ) $csrp_cat = sanitize_text_field($_GET["csrp_cat"]);
	
	//$csrp_meta_value = $csrp_meta_key = "";
	if( isset($_GET["csrp_meta_key"]) ) $csrp_meta_key = sanitize_text_field($_GET["csrp_meta_key"]);
	if( isset($_GET["csrp_meta_value"]) ) $csrp_meta_value = sanitize_text_field($_GET["csrp_meta_value"]);
	
	if( isset($_GET["csrp_meta_compare"]) ){
		$csrp_meta_compare = sanitize_text_field($_GET["csrp_meta_compare"]);	
	}else{
		$csrp_meta_compare = '=';	
	} 
	if( isset($_GET["csrp_meta_type"]) ){
		$csrp_meta_type = sanitize_text_field($_GET["csrp_meta_type"]);	
	}else{
		$csrp_meta_type = 'CHAR';	
	} 	
	
	if( isset($_GET["csrp_orderby"]) ) $csrp_orderby = sanitize_text_field($_GET["csrp_orderby"]);
	if( isset($_GET["csrp_order"]) ) $csrp_order = sanitize_text_field($_GET["csrp_order"]);
	if( isset($_GET["csrp_tag"]) ) $csrp_tag = sanitize_text_field($_GET["csrp_tag"]);
	if( isset($_GET["csrp_author_name"]) ) $csrp_author_name = sanitize_text_field($_GET["csrp_author_name"]);
	if( isset($_GET["csrp_author"]) ) $csrp_author = sanitize_text_field($_GET["csrp_author"]);
	
    // since  2.1.3 - multiple post type
	if( isset($_GET["csrp_post_type"]) && $_GET["csrp_post_type"] != ''){
		$csrp_post_type = sanitize_text_field($_GET["csrp_post_type"]);
        $csrp_post_type = explode(',', preg_replace('/\s/', '', $csrp_post_type));       
	}
    
	#===================================================================
	// since  2.1.3 - multiple post status
    
	if( isset($_GET["csrp_post_status"]) && $_GET["csrp_post_status"] != '' ){
		$csrp_post_status = sanitize_text_field($_GET["csrp_post_status"]);
        $csrp_post_status = explode(',', preg_replace('/\s/', '', $csrp_post_status));
        
        // since  2.1.4 - Vulnerability  fix - do not allow private posts if csrp_key is empty
        if(empty($csrp_key)){
            foreach ($csrp_post_status as $csrp_post_status_key => $csrp_post_status_val) {
                if(strtolower($csrp_post_status_val) == 'private'){
                    unset($csrp_post_status[$csrp_post_status_key]);
                }
            }
        }
        $csrp_post_status = array_values($csrp_post_status);
        //if array is empty after check => set to default from settings
        if(empty($csrp_post_status)) $csrp_post_status = $custom_simple_rss_options['csrp_post_status'];        
	}

    #===================================================================
    
	if( isset($_GET["csrp_posts_per_page"]) ){
		$csrp_posts_per_page = intval($_GET["csrp_posts_per_page"]);	
	}
	if( isset($_GET["csrp_paged"]) ){
		$csrp_paged = intval($_GET["csrp_paged"]);	
	}	

	if( isset($_GET["csrp_post_parent"]) ){
        if($_GET["csrp_post_parent"]=="0") {
            $csrp_post_parent = "0";
        }else{
            $csrp_post_parent = intval($_GET["csrp_post_parent"]);   
        } 
	}    
    
    
	if( isset($_GET["csrp_date"]) ){
		$csrp_date = intval($_GET["csrp_date"]);	
	}
	if( isset($_GET["csrp_date_before"]) ){
		$csrp_date_before = sanitize_text_field($_GET["csrp_date_before"]);	
	}
	if( isset($_GET["csrp_date_before_type"]) ){
		$csrp_date_before_type = sanitize_text_field($_GET["csrp_date_before_type"]);	
	}	
	if( isset($_GET["csrp_date_after"]) ){
		$csrp_date_after = sanitize_text_field($_GET["csrp_date_after"]);	
	}
	if( isset($_GET["csrp_date_after_type"]) ){
		$csrp_date_after_type = sanitize_text_field($_GET["csrp_date_after_type"]);	
	}	
	if( isset($_GET["csrp_exclude_post_format"]) ){
		$csrp_exclude_post_format = sanitize_text_field($_GET["csrp_exclude_post_format"]);	
	}
	if( isset($_GET["csrp_tax_name"]) ){
		$csrp_tax_name = sanitize_text_field($_GET["csrp_tax_name"]);	
	}	
	if( isset($_GET["csrp_tax_term_id"]) ){
		$csrp_tax_term_id = sanitize_text_field($_GET["csrp_tax_term_id"]);	
	}
    
	if( isset($_GET["csrp_show_post_terms"]) ){
		$csrp_show_post_terms = sanitize_text_field($_GET["csrp_show_post_terms"]);
	}
    $options['csrp_show_post_terms'] = $csrp_show_post_terms;
    
    
	if( isset($_GET["csrp_show_thumbnail"]) ){
		$csrp_show_thumbnail = intval($_GET["csrp_show_thumbnail"]);
	}
    $options['csrp_show_thumbnail'] = $csrp_show_thumbnail;
    
	if( isset($_GET["csrp_thumbnail_size"]) ){
		$csrp_thumbnail_size = sanitize_text_field($_GET["csrp_thumbnail_size"]);
        if(strpos($csrp_thumbnail_size,'x')){
            $csrp_thumbnail_size = explode("x",$csrp_thumbnail_size);
        }
	}else{
        $csrp_thumbnail_size = 'thumbnail';
    }    
    $options['csrp_thumbnail_size'] = $csrp_thumbnail_size;
    
	if( isset($_GET["csrp_show_all_post_terms"]) ){
		$csrp_show_all_post_terms = intval($_GET["csrp_show_all_post_terms"]);
	}
    $options['csrp_show_all_post_terms'] = $csrp_show_all_post_terms;
	/*
	=======================
	args
	=========================
	*/
	$args = array(
		'post_type' => $csrp_post_type,
		'showposts' => $csrp_posts_per_page, 
		'post_status'=>$csrp_post_status,
		'ignore_sticky_posts' => true,
	);
	
	if( isset($csrp_cat) && $csrp_cat!='' ){
		$args['cat'] =  $csrp_cat;
	}
	if( isset($csrp_tag) && $csrp_tag!='' ){
		$args['tag'] =  $csrp_tag;
	}	
	if( isset($csrp_author) && $csrp_author!='' ){
		$args['author'] =  $csrp_author;
	}	
	if( isset($csrp_author_name) && $csrp_author_name!='' ){
		$args['author_name'] =  $csrp_author_name;
	}		
	if(  isset($csrp_orderby) && isset($csrp_order) ){
		$args['orderby'] =  $csrp_orderby;
		$args['order'] =  $csrp_order;
	}
	/*
	* since 2.1.3
	* meta value empty to get all posts with same key regardless of value
	*/
	if( isset($csrp_meta_key)  ){

		if( isset($csrp_meta_value) && $csrp_meta_value != '' ) {
			$args['meta_query'] = array(
				array(
					'key'     => $csrp_meta_key,
					'value'   => $csrp_meta_value,
					'compare' => $csrp_meta_compare,
					'type' => $csrp_meta_type,
				)
			);
		}else{
			//by any key where value not empty
			$args['meta_query'] = array(
				array(
					'key'     	=> $csrp_meta_key,
					'compare' 	=> '!=',
					'value'   	=> '',
					'type' 		=> $csrp_meta_type,
				)			
			);			
		}
	}
	if( isset($csrp_paged) && $csrp_paged!='' ){
		$args['paged'] =  $csrp_paged;
	}
    
	if( isset($csrp_post_parent) && $csrp_post_parent!='' ){
		$args['post_parent'] =  $csrp_post_parent;
	}
    
	if( isset($csrp_date) && $csrp_date==1 ){
		
		
		//post_modified_gmt/post_date_gmt
		if(!isset($csrp_date_after_type) || $csrp_date_after_type=='') $csrp_date_after_type = 'date';
		if(!isset($csrp_date_before_type) || $csrp_date_before_type=='') $csrp_date_before_type = 'date';
		
		$csrp_date_before_mode = "post_".$csrp_date_before_type."_gmt";
		$csrp_date_after_mode = "post_".$csrp_date_after_type."_gmt";
		
		if( isset($csrp_date_after) || isset($csrp_date_before) ){
			
			if( isset($csrp_date_after) ){
				$csrp_date_after_array = array(
						'column' => $csrp_date_after_mode,
						'after'  => $csrp_date_after,
					);	
			}
			if( isset($csrp_date_before) ){
				$csrp_date_before_array = array(
						'column' => $csrp_date_before_mode,
						'before' => $csrp_date_before,
					);
			}			
			
			$args['date_query'] = array($csrp_date_after_array,$csrp_date_before_array);
			
		}
		
	}	


	if( isset($csrp_exclude_post_format) && $csrp_exclude_post_format!='' ){
		$csrp_exclude_post_format_array = explode(",",$csrp_exclude_post_format);
		$args['tax_query'] = array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => $csrp_exclude_post_format_array,
					'operator' => 'NOT IN',
				)
			);
	}

	if( isset($csrp_tax_name) && !empty($csrp_tax_name) && isset($csrp_tax_term_id) && !empty($csrp_tax_term_id)){
		$csrp_tax_term_id_array = explode(",",$csrp_tax_term_id);
		$args['tax_query'] = array(
				array(
					'taxonomy' => $csrp_tax_name,
					'field' => 'term_id',
					'terms' => $csrp_tax_term_id_array,
					'operator' => 'IN',
				)
			);
	}
   
    $namespaces = array(
        "content" => "http://purl.org/rss/1.0/modules/content/",
		"wfw" => "http://wellformedweb.org/CommentAPI/",
		"dc" => "http://purl.org/dc/elements/1.1/",
		"atom" => "http://www.w3.org/2005/Atom",
		"sy" => "http://purl.org/rss/1.0/modules/syndication/",
		"slash" => "http://purl.org/rss/1.0/modules/slash/",
        "media" => "http://search.yahoo.com/mrss/",
        "wp" => "http://wordpress.org/export/1.2/",
        "excerpt" => "http://wordpress.org/export/1.2/excerpt/",
    );
    $options['namespaces'] = $namespaces;
    
    
    $csrp_feed_output = null;
    if($csrp_xml_type==0){
        $csrp_feed_output = csrp_build_xml_string($args,$options);
    }
    if($csrp_xml_type==1){
        $csrp_feed_output = csrp_build_xml_dom($args,$options);  
    }
    
    if($csrp_feed_output){
        header('Content-Type: text/xml; charset=utf-8');
        print($csrp_feed_output);         
    }else{
        header('Content-Type: text/xml; charset=utf-8');
        print('<?xml version="1.0" encoding="UTF-8"?><rss/>'); 
    }
   
    
   
 }
 
function csrp_build_xml_dom($args,$options){
	    
    extract($options);
    /*=================== the query ===================
    *=================================================*/
	$the_query = new WP_Query( $args );
    
    /*================ initiate DOM xml =======================*/
       
    $dom = new DOMDocument('1.0', 'UTF-8');    
    $drss = $dom->createElement("rss");
    $drss = $dom->appendChild($drss);

    foreach($namespaces as $name => $value){
        //add NS to dom
        $drss->setAttributeNS(
            'http://www.w3.org/2000/xmlns/', // xmlns namespace URI
            'xmlns:'.$name,
            $value
        );
    }
    
    $drss->setAttribute("version", "2.0");
    
    //add rss top elements in xml doms
    $dchannel = $dom->createElement("channel");
    $dchannel = $drss->appendChild($dchannel);
    $dchannel->appendChild($dom->createElement('title',get_bloginfo("name")));
    $dchannel->appendChild($dom->createElement('description',get_bloginfo("description")));
    $dchannel->appendChild($dom->createElement('link', get_home_url()));
    $dchannel->appendChild($dom->createElement('lastBuildDate',mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false)));
     //add debug data to dom xml
    if(isset($csrp_debug)&& $csrp_debug=='1') $dchannel->appendChild($dom->createElement('debug',json_encode($args)));
    
        /*============================================
        ================= THE LOOP ===================
        =============================================*/
    
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();		
				$post_id = get_the_ID();
				$the_post = get_post($post_id);
				/*
                 * $excerpt = $the_post->post_excerpt;
                 * since 2021 feb 04
                 * */    
				if($csrp_show_description == 1){
					add_filter('excerpt_more', 'custom_simple_rss_excerpt_more');
					$excerpt = get_the_excerpt($post_id); 					
				}
				if($csrp_show_description == 2){
					$excerpt = $the_post->post_excerpt;					
				}  
				if($csrp_show_description == 0){
					$excerpt = "";					
				}				
				$modified = $the_post->post_modified;
				$created = $the_post->post_date;
				$author_id = $the_post->post_author;
                $post_parent = $the_post->post_parent;
                $menu_order = $the_post->menu_order;
				$author = get_the_author_meta('display_name', $author_id );				
				$categories = get_the_category();
                
                switch ($csrp_pubdate_date_format) {
                    case "rfc":
                        $date_format =  'D, d M Y H:i:s O';
                        $pub_date = get_the_date( $date_format, $post_id );
                        break;
                    case "blog_date":
                        $date_format =  get_option( 'date_format' );
                        $pub_date = get_the_date( $date_format, $post_id );
                        break;
                    case "blog_date_time":
                        $date_format =  get_option( 'date_format' ).' '.get_option('time_format');
                        $pub_date = get_the_date( $date_format, $post_id );
                        break;
                    case "universal_rfc":
                        $pub_date = mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true , $post_id ), false );
                        break;                     
                    default:
                        $date_format =  'D, d M Y H:i:s O';
                        $pub_date = get_the_date( $date_format, $post_id );
                }                

				$collection = null;
                $taxonomies = null;
                $csrp_show_post_terms_array = null;
                
                
                //thmbnail
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), $options['csrp_thumbnail_size'],false );
				if($thumb){
                    $thumb_url = $thumb[0];
                    $thumb_width = $thumb[1];
                    $thumb_height = $thumb[2];                    
                }else{
                    $thumb_url = $thumb_width = $thumb_height = "";
                }

                $thumb_type = get_post_mime_type(get_post_thumbnail_id($post_id));
				
                //content un filtered
				if($csrp_show_content==1){
					$the_content = get_the_content($post_id);
				}
                
                //content filtered
				if($csrp_show_content==2){
					$the_content = apply_filters('the_content',get_the_content($post_id));
					//$the_content = apply_filters('the_content_feed', $the_content);
					//clear content from trash
					/* version 1.6.5 - allowed tags from options */
					$allowed_tags = $csrp_allowed_tags;
					$the_content = htmlspecialchars_decode($the_content,ENT_NOQUOTES);
					$the_content = strip_tags($the_content,$allowed_tags);
					$the_content = preg_replace("/\r?\n/", "", $the_content);
					$the_content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $the_content);
					$the_content = preg_replace('/\s+/',' ',$the_content); //tabs
					$the_content = str_replace(array("\r\n", "\r", "\n", "\t"), ' ', $the_content);
				}               
                /*===================================
                 * cerate dom item element
                 * */
                $ditem = $dom->createElement("item");
                $ditem = $dchannel->appendChild($ditem);
                    
                    /*======================================
                     * insert top item elements
                     * */

                    //$ditem->appendChild($dom->createElement('title',get_the_title($post_id)));
                    $title = $dom->createElement("title");
                    $ditem->appendChild($title);
                    $title->appendChild(
                        $dom->createCDATASection(get_the_title($post_id))
                    );                    
                    //$ditem->appendChild($dom->createElement('link',get_permalink($post_id)));
                    $link = $dom->createElement("link");
                    $ditem->appendChild($link);
                    $link->appendChild(
                        $dom->createCDATASection(get_permalink($post_id))
                    );                     
                    $ditem->appendChild($dom->createElement('pubDate',$pub_date));
                    $ditem->appendChild($dom->createElementNS($namespaces["dc"],'dc:creator',$author));
                    $ditem->appendChild($dom->createElementNS($namespaces["dc"],'dc:identifier',$post_id));
                    $ditem->appendChild($dom->createElementNS($namespaces["dc"],'dc:modified',$modified));
                    
                    $dccreated = $dom->createElementNS($namespaces["dc"],"dc:created",$created);
                    $ditem->appendChild($dccreated);
                    $dccreated->setAttribute("unix", strtotime($created));                   
                    
                    
                    //$guid = $dom->createElement("guid",get_permalink($post_id));
                    $guid = $dom->createElement("guid");
                    $ditem->appendChild($guid);
                    $guid->setAttribute("isPermaLink", "true");
                    $guid->appendChild(
                        $dom->createCDATASection(get_permalink($post_id))
                    ); 
                    //add categories element
                    if($categories){
                        foreach($categories as $category) {
                            $ditem->appendChild($dom->createElement('category',$category->term_id));
                        }
                    } 
                                
                    $description = $dom->createElement("description");
                    $ditem->appendChild($description);
                    $description->appendChild(
                        $dom->createCDATASection($excerpt)
                    );
                    
                    //   
                    if($csrp_show_content!=0){

                        $content = $dom->createElement("content:encoded");
                        $ditem->appendChild($content);
                        $content->appendChild(
                            $dom->createCDATASection($the_content)
                        );
                    }
                    
                    //add tubmnial
                    if($csrp_show_thumbnail==1){

                        $enclosure = $dom->createElement("enclosure");
                        $ditem->appendChild($enclosure);
                        $enclosure->setAttribute("url", $thumb_url);
                        
                        $media_content = $dom->createElement("media:content");
                        $ditem->appendChild($media_content);
                        $media_content->setAttribute("url", $thumb_url);
                        $media_content->setAttribute("width", $thumb_width);
                        $media_content->setAttribute("height", $thumb_height);
                        $media_content->setAttribute("type", $thumb_type);
                    }                  
                    
                    if($csrp_show_meta==1){
                        $custom_fields = get_post_custom($post_id);
                        $dataset = null;

                        $ddataset = $dom->createElement("dc:dataset");
                        $ditem->appendChild($ddataset);                        
                        foreach ( $custom_fields as $key => $value ) {
                            $key = $dom->createElement($key);
                            $ddataset->appendChild($key);
                            $key->appendChild(
                                $dom->createCDATASection($value[0])
                            );                            
                        }
                        $key = $dom->createElement("post_parent");
                        $ddataset->appendChild($key);
                        $key->appendChild(
                            $dom->createCDATASection($post_parent));
                        
                        $key = $dom->createElement("menu_order");
                        $ddataset->appendChild($key);
                        $key->appendChild(
                            $dom->createCDATASection($menu_order));                         
                    }
    
                    /*
                     * since version 1.8 2017-11-21
                     * show taxonomy for post if csrp_show_post_terms=tax_name
                     * since version 2.0 2018-09-29
                     * support for DOM
                    */
                    if( isset($csrp_show_post_terms) && !empty($csrp_show_post_terms)){
                        $csrp_show_post_terms_array = explode(",",$csrp_show_post_terms);
                    }                    
                    if($csrp_show_post_terms_array){
                        
                        $dispartof = $dom->createElement("dc:isPartOf");
                        $ditem->appendChild($dispartof);                    
                        
                        foreach($csrp_show_post_terms_array as $taxonomy){
                            $terms = wp_get_post_terms( $post_id, $taxonomy, array("fields" => "all") );
                            if(!empty($terms)){
                                //print_r($terms);
                                if ( ! is_wp_error( $terms ) ) {
                                    foreach($terms as $term){
                                        
                                        //add tax to dom 
                                        $dtaxonomy = $dom->createElement($taxonomy);
                                        $dispartof->appendChild($dtaxonomy);
                                        
                                        $dterm_id = $dom->createElement("term_id");
                                        $dtaxonomy->appendChild($dterm_id);
                                        $dterm_id->appendChild(
                                            $dom->createCDATASection($term->term_id)
                                        );
                                        
                                        $dterm_name = $dom->createElement("name");
                                        $dtaxonomy->appendChild($dterm_name);
                                        $dterm_name->appendChild(
                                            $dom->createCDATASection($term->name)
                                        );
        
                                        $dterm_slug = $dom->createElement("slug");
                                        $dtaxonomy->appendChild($dterm_slug);
                                        $dterm_slug->appendChild(
                                            $dom->createCDATASection($term->slug)
                                        );                                
                                        
                                    }   
                                }
                            }
                        }                     
                    }
                    /*
                     * future feature 
                     * since version 2.0.8 2019-08-07
                     * show wp meta data
                     * 
                    $wp_status = $dom->createElement("wp:status");
                    $wp_status->appendChild(
                        $dom->createCDATASection($the_post->post_status)
                    );                    
                    $ditem->appendChild($wp_status);
                    */
                    
			} // end loop
		} else {
			// no posts found
		}			
	/* Restore original Post Data */
    wp_reset_postdata();
    return $dom->saveXML();
        
} 

function csrp_build_xml_string($args,$options){
	    
    extract($options);
    
    /*=================== the query ===================
    *=================================================*/
	$the_query = new WP_Query( $args );
    
    $namespaces_str = '';
    foreach($namespaces as $name => $value){
        $namespaces_str .=  'xmlns:'.$name.'="'.$value.'" ';
    }    
	$csrp_feed_current = '<?xml version="1.0" encoding="UTF-8"?>
	<rss version="2.0" '.$namespaces_str.' >';

    $csrp_feed_current .= '
		<channel>
		<title>'.get_bloginfo("name").'</title>
        <description>'.get_bloginfo("description").'</description>
        <link>'.get_home_url().'</link>
		<lastBuildDate>'.  mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false) .'</lastBuildDate>';
		$debug_data = array(
            'args' => $args,
            'options' => $options,
        );
		if(isset($csrp_debug)&& $csrp_debug=='1') $csrp_feed_current .=	'<debug>'.json_encode($debug_data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE).'</debug>';

		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();		
				$post_id = get_the_ID();
				$the_post = get_post($post_id);
                /* $excerpt = $the_post->post_excerpt;
                 * since 2021 feb 04
                 * */
  
				if($csrp_show_description == 1){
					add_filter('excerpt_more', 'custom_simple_rss_excerpt_more');
					$excerpt = get_the_excerpt($post_id); 				
				}
				if($csrp_show_description == 2){
					$excerpt = $the_post->post_excerpt;					
				}  
				if($csrp_show_description == 0){
					$excerpt = "";					
				}
				$modified = $the_post->post_modified;
				$created = $the_post->post_date;
				$author_id = $the_post->post_author;
                $menu_order  = $the_post->menu_order;
                $post_parent  = $the_post->post_parent;
                $post_status = $the_post->post_status;
				$author = get_the_author_meta('display_name', $author_id );				
				$categories = get_the_category();
                switch ($csrp_pubdate_date_format) {
                    case "rfc":
                        $date_format =  'D, d M Y H:i:s O';
                        $pub_date = get_the_date( $date_format, $post_id );
                        break;
                    case "blog_date":
                        $date_format =  get_option( 'date_format' );
                        $pub_date = get_the_date( $date_format, $post_id );
                        break;
                    case "blog_date_time":
                        $date_format =  get_option( 'date_format' ).' '.get_option('time_format');
                        $pub_date = get_the_date( $date_format, $post_id );
                        break;
                    case "universal_rfc":
                        $pub_date = mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true , $post_id ), false );
                        break;                    
                    default:
                        $date_format =  'D, d M Y H:i:s O';
                        $pub_date = get_the_date( $date_format, $post_id );
                }
				$collection = null;
                $taxonomies = null;
                $csrp_show_post_terms_array = null;
                $taxonomy_objects = null;
                
				if($categories){
					foreach($categories as $category) {
						$collection.= '<category>'.$category->term_id.'</category>';
						}
					}
                
                if( isset($csrp_show_post_terms) && !empty($csrp_show_post_terms)){
                    $csrp_show_post_terms_array = explode(",",$csrp_show_post_terms);
                }				
                
                if($csrp_show_post_terms_array){
                    foreach($csrp_show_post_terms_array as $taxonomy){
                       
                        $terms = wp_get_post_terms( $post_id, $taxonomy, array("fields" => "all") );
                        if(!empty($terms)){
                            //print_r($terms);
                            if ( ! is_wp_error( $terms ) ) {
                                foreach($terms as $term){
                                    $taxonomies.= "<$taxonomy>";
                                    $term_id = $term->term_id;
                                    $term_name = $term->name;
                                    $term_slug = $term->slug;
                                    $taxonomies.= "<term_id><![CDATA[$term_id]]></term_id><name><![CDATA[$term_name]]></name><slug><![CDATA[$term_slug]]></slug>";
                                    $taxonomies.= "</$taxonomy>";
                                }
                            }
                        }
                    }
                    
                }
                if($options['csrp_show_all_post_terms'] == 1){
                    $taxonomy_objects = get_object_taxonomies( $the_post );
                   
                    if($taxonomy_objects){
                        if ( ! is_wp_error( $taxonomy_objects ) ) {
                            //print_r($taxonomy_objects);
                            foreach($taxonomy_objects as $taxonomy_object){
                                //print_r($taxonomy_object);
                                //echo $taxonomy_object->name;
                                $terms = wp_get_post_terms( $post_id, $taxonomy_object, array("fields" => "all") );
                                //print_r($terms);    
                                if(!empty($terms)){
                                   
                                    if ( ! is_wp_error( $terms ) ) {
                                        foreach($terms as $term){
                                            //print_r($term);
                                            $taxonomies.= "<".$taxonomy_object.">";
                                            $term_id = $term->term_id;
                                            $term_name = $term->name;
                                            $term_slug = $term->slug;
                                            $taxonomies.= "<term_id><![CDATA[$term_id]]></term_id><name><![CDATA[$term_name]]></name><slug><![CDATA[$term_slug]]></slug>";
                                            $taxonomies.= "</".$taxonomy_object.">";
                                        }
                                    }
                                }
                            }
                        }                    
                    }                    
                }

                
				$custom_fields = get_post_custom($post_id);
				$dataset = null;
				foreach ( $custom_fields as $key => $value ) {
					$dataset.= "<".$key."><![CDATA[". $value[0] ."]]></".$key.">";
				}

                $dataset.= "<post_parent><![CDATA[". $post_parent ."]]></post_parent>";
                $dataset.= "<menu_order><![CDATA[". $menu_order ."]]></menu_order>";
                
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), $options['csrp_thumbnail_size'],false);
                //print_r($thumb);
				if($thumb){
					$thumb_url = $thumb['0'];
					$thumb_width = $thumb[1];
					$thumb_height = $thumb[2];					
				}else{
					$thumb_url = $thumb_width = $thumb_height = "";			
				}
                
				$thumb_type = get_post_mime_type(get_post_thumbnail_id($post_id));
                
				if($csrp_show_content==1){
					$the_content = get_the_content($post_id);
					//$the_content = $the_post->post_content;
					//$the_content = get_post_field('post_content',$post_id);
				}
				if($csrp_show_content==2){
					$the_content = apply_filters('the_content',get_the_content($post_id));
					//clear content from trash
					//$allowed_tags = "<img><a><b><strong><i><li><left><center><right><del><strike><ol><ul><u><sup><pre><code><sub><hr><h1><h2><h3><h4><h5><h6><big><small><font><p><br><span><div><script><video><audio><dd><dl><iframe>";
					/* version 1.6.5 - allowed tags from options */
					$allowed_tags = $csrp_allowed_tags;
					$the_content = htmlspecialchars_decode($the_content,ENT_NOQUOTES);
					$the_content = strip_tags($the_content,$allowed_tags);
					$the_content = preg_replace("/\r?\n/", "", $the_content);
					$the_content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $the_content);
					$the_content = preg_replace('/\s+/',' ',$the_content); //tabs
					$the_content = str_replace(array("\r\n", "\r", "\n", "\t"), ' ', $the_content);
					
				}
					
					$csrp_feed_current .='
					<item>
							<title><![CDATA['. get_the_title($post_id) .']]></title>
							<link><![CDATA['. get_permalink($post_id) .']]></link>
							<pubDate>'. $pub_date .'</pubDate>
							<dc:creator>'. $author .'</dc:creator>
							<dc:identifier>'.  $post_id .'</dc:identifier>
							<dc:modified>'. $modified .'</dc:modified>
							<dc:created unix="'. strtotime($created).'">'. $created .'</dc:created>
							<guid isPermaLink="true"><![CDATA['. get_permalink($post_id) .']]></guid>'
							.$collection.'
							<description><![CDATA['. $excerpt .']]></description>';
							if($csrp_show_content!=0){
								$csrp_feed_current .='<content:encoded><![CDATA['. $the_content .']]></content:encoded>';	
							}							
							if($csrp_show_thumbnail==1){
								$csrp_feed_current .='<enclosure url="'. esc_url($thumb_url) .'"/>';
                                $csrp_feed_current .='<media:content url="'.esc_url( $thumb_url) .'" height="'. $thumb_height .'" width="'. $thumb_width .'" type="'. $thumb_type .'"/>';
							}						
							if($csrp_show_meta==1){
								$csrp_feed_current .='<dc:dataset>'. $dataset .'</dc:dataset>';	
							}
                            /*
                             * since version 1.8 2017-11-21
                             * show taxonomy for post if csrp_show_post_terms=tax_name
                            */
							if($csrp_show_post_terms && $taxonomies){
								$csrp_feed_current .='<dc:isPartOf>'. $taxonomies .'</dc:isPartOf>';	
							}
                    /*
                     * future feature 
                     * since version 2.0.8 2019-08-07
                     * show wp meta data
                     * 		
                    $csrp_feed_current .='
                    <wp:status><![CDATA['. $post_status .']]></wp:status>';
                    */		
					$csrp_feed_current .='		
					</item>';

			}
		} else {
			// no posts found
		}			
		/* Restore original Post Data */
		wp_reset_postdata();
        
	$csrp_feed_current .='</channel></rss><!-- end of xml string -->';
    return $csrp_feed_current;
    
}

add_filter( 'query_vars', 'custom_simple_rss_query_vars' );
function custom_simple_rss_query_vars( $query_vars ){
    $query_vars[] = 'call_custom_simple_rss';
    return $query_vars;
}

add_action( 'parse_request', 'custom_simple_rss_parse_request' );
function custom_simple_rss_parse_request( $wp )
{
    if ( array_key_exists( 'call_custom_simple_rss', $wp->query_vars ) ) {
		$call_custom_simple_rss = $wp->query_vars['call_custom_simple_rss'];
		if($call_custom_simple_rss=='1') call_custom_simple_rss();
		die();
    }
}

register_activation_hook(__FILE__, 'custom_simple_rss_activation');
function custom_simple_rss_activation() {
	custom_simple_rss_set_defults();
}

register_deactivation_hook(__FILE__, 'custom_simple_rss_deactivation');
function custom_simple_rss_deactivation() {
	delete_option( 'custom_simple_rss_options' );
}

function custom_simple_rss_set_defults(){
		$custom_simple_rss_options	= array(
				'csrp_post_type'=> 'post',
				'csrp_post_status'=> 'publish',
				'csrp_posts_per_page'=> 10,
				'csrp_show_meta'=> 0,
				'csrp_show_thumbnail'=> 1,	
				'csrp_show_content'=> 1,
				'csrp_show_description'=> 1,
				'csrp_allowed_tags' => CUSTOM_SIMPLE_RSS_PLUGIN_ALLOWED_TAGS,
				'csrp_secret_key'=> '',
                'csrp_xml_type'=> 0, //0 = string, 1 = DOM
                'csrp_pubdate_date_format'=> 'rfc',
		);
		update_option('custom_simple_rss_options',$custom_simple_rss_options);
    return $custom_simple_rss_options;
}

function custom_simple_rss_excerpt_more( $more ) {
    return '';
}