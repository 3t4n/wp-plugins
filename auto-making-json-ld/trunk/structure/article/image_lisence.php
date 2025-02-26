<?php

//画像のライセンス
if (!function_exists('amJL_imageobject')){
  function amJL_imageobject(){
    global $post;
    $post_thumb = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
    $post_url = get_permalink();
    $category = get_the_category();

    $privacy = get_option('privacy');

    // get category ID, name and number
    $get_cat = get_categories();
    foreach($get_cat as $val) {
      $category_list_id[$val->cat_ID]= $val->name;
    }
    (int)$catNumber = count($category_list_id);

    $categoryID = array();
    for((int)$i=1; $i<=$catNumber; $i++)  $categoryID["cat_ID_{$i}"] = "thumb_url_{$i}";

    $payload["@context"] = "http://schema.org/";
    $payload["@type"] = "ImageObject";

    if( is_category()){
      foreach($categoryID as $ID => $thumb){
        if( $category[0]->term_id === (int)get_option($ID)) $cat_image = get_option($thumb);
      }
      $payload["contentUrl"] = $cat_image;
      $payload["license"] = get_category_link($category[0]->term_id);
    }else{
      $payload["contentUrl"] = $post_thumb;
      $payload["license"] = $post_url;
    }
    $payload["acquireLicensePage"] = $privacy;

    $payload += array(
      "creditText" => get_bloginfo('name'),
      "creator" => array(
        "@type" => "Organization",
        "name" => get_bloginfo('name')
      ),
      "copyrightNotice" => get_bloginfo('name')
    );
    
    $image_check = (int)get_option('image_check');
    if($image_check === 1 && amJL_check_url_existence($payload['contentUrl']) && $privacy !== ''){
      echo "<!-- 画像メタデータ -->\n";
      echo '<script type="application/ld+json">'."\n";
      echo json_encode($payload,  JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
      echo "\n</script>\n\n";
    }
    
  }
}

add_action('wp_head', 'amJL_imageobject', 1);