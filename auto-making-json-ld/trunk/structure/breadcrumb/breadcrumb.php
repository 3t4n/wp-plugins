<?php

//=====[ Breadcrumb List ]=====//
function amJL_breadcrumb() {
 
  if( is_admin() || is_front_page() || is_home() ){ return; }
   
  $position  = 1;
  $query_obj = get_queried_object();
  $https = filter_input(INPUT_SERVER, 'HTTPS');
  $permalink = ( isset($https) && $https !== '' ) ? "http://" : "https://" . sanitize_text_field(filter_input(INPUT_SERVER, "HTTP_HOST")) . sanitize_text_field(filter_input(INPUT_SERVER, "REQUEST_URI"));
   
  global $post;
  $author_data = get_userdata( $post->post_author );
   
  $BreadcrumbList = array(
    "@context"        => "http://schema.org",
    "@type"           => "BreadcrumbList",
    "name"            => "パンくずリスト",
    "itemListElement" => array(
      array(
        "@type"    => "ListItem",
        "position" => $position++,
        "name" => get_bloginfo('name')." - ".get_bloginfo('description'),
        "item"  =>  home_url('/')
      )
    ),
  );

  if( is_page() ) {
  
    $ancestors   = get_ancestors( $query_obj->ID, 'page' );
    $ancestors_r = array_reverse($ancestors);
    if ( count( $ancestors_r ) != 0 ) {
      foreach ($ancestors_r as $key => $ancestor_id) {
        $ancestor_obj = get_post($ancestor_id);
        $BreadcrumbList['itemListElement'][] = array(
          "@type"    => "ListItem",
          "position" => $position++,
          "name" => $ancestor_obj->post_title,
          "item"  =>  get_the_permalink($ancestor_obj->ID),
        );
      }
    }
  
    $BreadcrumbList['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "name" => $query_obj->post_title,
      "item"  => $permalink,
    );
  
  } elseif( is_post_type_archive() ) {
  
    $BreadcrumbList['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "name" => $query_obj->label,
      "item"  =>  get_post_type_archive_link( $query_obj->name ),
    );
  
  } elseif( is_tax() || is_category() ) {
  
    if ( !is_category() ) {
      $post_type = get_taxonomy( $query_obj->taxonomy )->object_type[0];
      $pt_obj    = get_post_type_object( $post_type );
      $BreadcrumbList['itemListElement'][] = array(
        "@type"    => "ListItem",
        "position" => $position++,
        "name" => $pt_obj->label,
        "item"  =>  get_post_type_archive_link($pt_obj->name)
      );
    }
  
    $ancestors   = get_ancestors( $query_obj->term_id, $query_obj->taxonomy );
    $ancestors_r = array_reverse($ancestors);
    foreach ($ancestors_r as $key => $ancestor_id) {
      $BreadcrumbList['itemListElement'][] = array(
        "@type"    => "ListItem",
        "position" => $position++,
        "name" =>  get_cat_name($ancestor_id),
        "item"  =>  get_term_link($ancestor_id, $query_obj->taxonomy)
      );
    }
  
    $BreadcrumbList['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "name" =>  $query_obj->name,
      "item"  =>  get_term_link($query_obj)
    );
  
  } elseif( is_single() ) {
  
    $the_id        = $query_obj->ID;
    $the_post_type = $query_obj->post_type;
    $post_title    = apply_filters( 'the_title', $query_obj->post_title );
    $the_tax = 'category';

    $terms = get_the_terms( $the_id, $the_tax );

    if ( $terms !== false ) {

      $child_terms = [];
      $parents_list = [];

      foreach ( $terms as $the_term ) {
        if ( $the_term->parent !== 0 ) {
            $parents_list[] = $the_term->parent;
        }
      }

      foreach ( $terms as $the_term ) {
        if ( ! in_array( $the_term->term_id, $parents_list, true ) ) {
            $child_terms[] = $the_term;
        }
      }

      $the_term = $child_terms[0];

      if ( $the_term->parent !== 0 ) {

        $parent_array = array_reverse( get_ancestors( $the_term->term_id, $the_tax ) );

        foreach ( $parent_array as $parent_id ) {
          $parent_term = get_term( $parent_id, $the_tax );
          $parent_link = get_term_link( $parent_id, $the_tax );
          $parent_name = $parent_term->name;

          $BreadcrumbList['itemListElement'][] = array(
            "@type"    => "ListItem",
            "position" => $position++,
            "name"     => $parent_name,
            "item"     => $parent_link
          );
        }
      }

      $term_link = get_term_link( $the_term->term_id, $the_tax );
      $term_name = $the_term->name;

      $BreadcrumbList['itemListElement'][] = array(
        "@type"    => "ListItem",
        "position" => $position++,
        "name"     => $term_name,
        "item"     => $term_link
        );
    }
  
    $BreadcrumbList['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "name" =>  $query_obj->post_title,
      "item"  => $permalink,
    );
  
  } elseif( is_404() ) {
  
    $BreadcrumbList['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "name" => "404 Not found",
      "item"  => $permalink,
    );
  
  } elseif( is_search() ) {
  
    $BreadcrumbList['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "name" => "「" . get_search_query(). "」の検索結果",
      "item"  => $permalink,
    );
  
  }elseif( is_tag() ){
    
    $tag = get_the_tags();
    $BreadcrumbList['itemListElement'][] = array(
      "@type" => "ListItem",
      "position" => $position++,
      "name" => $tag[0]->name,
      "item" => get_category_link($tag[0]->term_id)
    );
  
  }elseif( is_date() ){
  
    $y = get_the_time('Y');
    $month = get_query_var( 'monthnum' );
    $day   = get_query_var( 'day' );

    if( $day !== 0){
      $BreadcrumbList['itemListElement'][] = array(
        "@type" => "ListItem",
        "position" => $position++,
        "name" => (int)$y . '年',
        "item" => get_year_link( $y )
      );
      $BreadcrumbList['itemListElement'][] = array(
        "@type" => "ListItem",
        "position" => $position++,
        "name" => (int)$month . '月',
        "item" => get_month_link( $y, $month )
      );
      $BreadcrumbList['itemListElement'][] = array(
        "@type" => "ListItem",
        "position" => $position++,
        "name" => (int)$day . '日',
        "item" => get_day_link( $y, $month, $day)
      );

    }elseif( $month !== 0 ){
      $BreadcrumbList['itemListElement'][] = array(
        "@type" => "ListItem",
        "position" => $position++,
        "name" => (int)$y . '年',
        "item" => get_year_link($y)
      );
      $BreadcrumbList['itemListElement'][] = array(
        "@type" => "ListItem",
        "position" => $position++,
        "name" => (int)$month . '月',
        "item" => get_month_link($y, $month)
      );

    }else{
      $BreadcrumbList['itemListElement'][] = array(
        "@type" => "ListItem",
        "position" => $position++,
        "name" => (int)$y . '年',
        "item" => get_year_link( $y )
      );
    }
    
  }elseif ( is_author() ) {
    $BreadcrumbList['itemListElement'][] = array(
      "@type" => "ListItem",
      "position" => $position++,
      "name" => $author_data->display_name. "の執筆記事",
      "item" => $post_url
    );
  }
  
  $BLcheck = (int)get_option('breadcrumb_check');
  if($BLcheck === 1){
    echo "<!-- パンくずリスト -->\n";
    echo '<script type="application/ld+json">'."\n";
    echo json_encode($BreadcrumbList,  JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE)."\n";
    echo "</script>\n";
  }
  
}

add_action('wp_head', 'amJL_breadcrumb', 1);