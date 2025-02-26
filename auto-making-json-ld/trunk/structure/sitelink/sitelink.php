<?php

//サイトリンク検索ボックス
function amJL_search(){
  global $post;
  $https = filter_input(INPUT_SERVER, 'HTTPS');
  $permalink = ( isset($https) && $https !== '' ? "http://" : "https://") . "query." . sanitize_text_field(filter_input(INPUT_SERVER, "HTTP_HOST"));
  $sitelink_check = (int)get_option('sitelink_check');

  if( is_front_page() ){
    $search = array(
      "@context" => "https://schema.org",
      "@type"    => "WebSite",
      "name"     => "サイトリンク検索ボックス",
      "url"      => esc_url(home_url( '/' )),
      "potentialAction" => array(
        "@type" => "SearchAction",
        "target" => array(
          "@type" => "EntryPoint",
          "urlTemplate" => esc_url($permalink)."/search?s={search_term_string}",
        ),
        "query-input" => "required name=search_term_string",
      ),
    );

    if($sitelink_check === 1){
      echo "<!-- サイトリンク検索ボックス -->\n";
      echo '<script type="application/ld+json">'."\n";
      echo json_encode($search,  JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
      echo "\n".'</script>'."\n";
    }
  }
    
}

add_action('wp_head', 'amJL_search', 1);