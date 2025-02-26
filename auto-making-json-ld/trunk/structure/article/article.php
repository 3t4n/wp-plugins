<?php

//=====[ Article ]=====//
add_theme_support( 'custom-logo' ); 

if(!function_exists('amJL_article')){
  function amJL_article(){
    
    if(is_home()){ return; }

    global $post;
    $post_data = $post;
    $query_obj = get_queried_object();
    $category = get_the_category();
    $author_data = get_userdata( $post_data->post_author );
    $post_thumb = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
    $logo_id = get_theme_mod( 'custom_logo' ); 
    $logo_image = wp_get_attachment_image_src( $logo_id , 'full' );
    $https = filter_input(INPUT_SERVER, 'HTTPS'); 
    $permalink = ( (isset($https) && $https !== '') ? "http://" : "https://") .sanitize_text_field(filter_input(INPUT_SERVER, 'HTTP_HOST')) . sanitize_text_field(filter_input(INPUT_SERVER, 'REQUEST_URI'));
    $payload["@context"] = "http://schema.org/";
    $payload["@type"] = "BlogPosting";

    $get_cat = get_categories();
    foreach($get_cat as $val) {
      $category_list_id[$val->cat_ID]= $val->name;
    }
    (int)$catNumber = count($category_list_id);

    $catIDURL = array();
    for((int)$i=1; $i<=$catNumber; $i++){
      $catIDURL["cat_ID_{$i}"] = "thumb_url_{$i}";
    }

    for((int)$i=1; $i<=10; $i++){
      ${"url".$i} = get_option('url'.$i);
    }
    
    if (is_single()) {

      $post_url = get_permalink();
      $payload["headline"] = $query_obj->post_title." - ".get_bloginfo('name');
      $payload["description"] = get_the_excerpt();
      $payload["dataPublished"] = get_the_date(DATE_ISO8601);
      $payload["dataModified"] = get_the_modified_date(DATE_ISO8601);
      $payload["mainEntityOfPage"] = array(
          "@type" => "WebPage",
          "@id" => $post_url
      );
      if( $post_thumb ){
        $payload["image"] = $post_thumb;
      }
      $payload["ArticleSection"] = $category[0]->cat_name;
      
    }

    if( is_category() ){

      foreach($catIDURL as $ID => $thumb){
        if( $category[0]->term_id === (int)get_option($ID)){
          $cat_image = get_option($thumb);
        }
      }

      $cat_description = strip_tags(category_description( $category[0]->cat_ID ));
      $payload["headline"] = $category[0]->cat_name." - ".get_bloginfo('name');
      $payload["description"] = $cat_description;
      $payload["dataPublished"] = get_the_date(DATE_ISO8601);
      $payload["dataModified"] = get_the_modified_date(DATE_ISO8601);
      $payload["mainEntityOfPage"] = array(
        "@type" => "WebPage",
        "@id" => get_category_link($category[0]->term_id)
      );
      $payload["image"] = $cat_image;
    }

    if( is_page() && !is_front_page() ){

      $the_id = get_queried_object_id();
      $payload["headline"] = $query_obj->post_title;
      $payload["description"] = get_the_excerpt();
      $payload["dataPublished"] = get_the_date(DATE_ISO8601);
      $payload["dataModified"] = get_the_modified_date(DATE_ISO8601);
      $payload["mainEntityOfPage"] = array(
        "@type" => "WebPage",
        "@id" => get_page_link($the_id)
      );
      if($post_thumb) $payload["image"] = $post_thumb;
    }

    if( is_front_page() ){
      $the_id = get_queried_object_id();
      $payload["headline"] = get_bloginfo('name')." - ".get_bloginfo( 'description' );
      $payload["description"] = get_the_excerpt();
      $payload["dataPublished"] = get_the_date(DATE_ISO8601);
      $payload["dataModified"] = get_the_modified_date(DATE_ISO8601);
      $payload["mainEntityOfPage"] = array(
        "@type" => "WebPage",
        "@id" => get_page_link($the_id)
      );
      if($post_thumb) $payload["image"] = $post_thumb;
    }
    
    if ( is_author() ) {
      $author_data = get_userdata($post_data->post_author);

      $payload["headline"] = $query_obj->post_title." - ".get_bloginfo('name');
      $payload["description"] = get_the_excerpt();
      $payload["dataPublished"] = get_the_date(DATE_ISO8601);
      $payload["dataModified"] = get_the_modified_date(DATE_ISO8601);
      $payload["mainEntityOfPage"] = array(
        "@type" => "WebPage",
        "@id" => $post_url
      );
      if($post_thumb) $payload["image"] = $post_thumb;
    }

    // author info
    $payload["author"] = array(
      "@type" => "Person",
      "name" => $author_data->display_name
    );

    for((int)$i=1; $i<=10; $i++){
      if(${"url".$i}) $payload["author"]["url"][] = ${"url".$i};
    }
    
    // publisher info
    $payload["publisher"] = array(
      "@type" => "Organization",
      "name" => get_bloginfo('name')
    );

    if($logo_image === true && count($logo_image) > 0){
      $size = getimagesize($logo_image[0]);
      if(cout($size) > 0){
        $logo_width = $size[0];
        $logo_height = $size[1];
        $payload["publisher"]["logo"] = array(
          "@type" => "ImageObject",
          "url" => $logo_image[0],
          "width" => $logo_width,
          "height" => $logo_height
        );
      } 
    }


    $article_check = (int)get_option('article_check');
    if($article_check === 1){
      echo "<!-- Article -->\n";
      echo '<script type="application/ld+json">'."\n";
      echo json_encode($payload,  JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
      echo "\n</script>\n\n";
    }
  }
}

add_action('wp_head','amJL_article', 1);