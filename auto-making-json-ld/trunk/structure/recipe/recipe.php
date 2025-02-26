<?php

//---- Recipe ----
if (!function_exists('amJL_Recipe')){
  function amJL_Recipe(){
    global $post;
    $post_data = $post;
    $author_data = get_userdata( $post_data->post_author );

    $recipe_check = (int)get_option('recipe_check');
    $title = get_post_meta($post->ID, 'title', true);
    $preptime = get_post_meta($post->ID, 'preptime', true);
    $cooktime = get_post_meta($post->ID, 'cooktime', true);
    $recipe_category = get_post_meta($post->ID, 'recipe_category', true);
    $calory = get_post_meta($post->ID, 'calory', true);
    $keyword = get_post_meta($post->ID, 'keyword', true);
    $description = get_post_meta($post->ID, 'description', true);
    $image = get_post_meta($post->ID, 'image', true);
    $totaltime = (int)$preptime + (int)$cooktime;
    $area = get_post_meta($post->ID, 'area', true);
    $recipe_number = (int)get_post_meta($post->ID, 'ingredient_number', true);
    $howto_number = (int)get_post_meta($post->ID, 'howto_number', true);

    for((int)$i=1; $i<=$recipe_number; $i++){
      ${"ingredient".$i} = get_post_meta($post->ID, "ingredient{$i}", true);
    }
    for((int)$i=1; $i<=$howto_number; $i++){
      ${"howto".$i} = get_post_meta($post->ID, "howto{$i}", true);
    }

    $RecipeList = array(
      "@context" => "https://schema.org/",
      "@type" => "Recipe",
      "name" => $title,
      "image" => array($image),
      "author" => array(
        "@type" => "Person",
        "name" => $author_data->display_name
      ),
      "datePublished" => get_the_date(DATE_ISO8601),
      "description" => $description,
      "recipeCuisine" => $area,
      "preptime" => "PT".(int)$preptime."M",
      "cooktime" => "PT".(int)$cooktime."M",
      "totaltime" => "PT".(int)$totaltime."M",
      "keywords" => $keyword,
      "recipeCategory" => $recipe_category,
      "nutrition" => array(
        "@type" => "NutritionInformation",
        "calories" => (int)$calory." calories"
      ),
    );

    for((int)$i=1; $i<=$recipe_number; $i++){
      if(${"ingredient".$i})$RecipeList["recipeIngredient"][] = ${"ingredient".$i};
    }
    
    for((int)$i=1; $i<=$howto_number; $i++){
      if(${"howto".$i}){
        $RecipeList["recipeInstructions"][] = array(
          "@type" => "HowToStep",
          "text" => ${"howto".$i}
        );
      }
    }

    $API = get_option('API');
    $recipe_video_id = get_post_meta($post->ID, 'recipe_video', true);
    if($recipe_video_id && $API){

      $youtube_url = "https://www.youtube.com/watch?v={$recipe_video_id}";
      if (amJL_check_url_existence($youtube_url)){
        $recipe_video_API = "https://www.googleapis.com/youtube/v3/videos?part=id,snippet,contentDetails,statistics,player,topicDetails,recordingDetails&id={$recipe_video_id}&key={$API}";
        $recipe_oembed = "https://www.youtube.com/embed/{$recipe_video_id}";

        $chs = file_get_contents($recipe_video_API);
        $json = mb_convert_encoding($chs, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $recipe_meta = json_decode( $json, true );

        if(!$recipe_meta["items"][0]["snippet"]["description"]){
          $description = $recipe_meta["items"][0]["snippet"]["title"]."の概要";
        }else{
          $description = $recipe_meta["items"][0]["snippet"]["description"];
        }

        $RecipeList["video"] = array(
            "@type" => "VideoObject",
            "name" => $recipe_meta["items"][0]["snippet"]["title"],
            "description" => $description
        );

        if($recipe_meta["items"][0]["snippet"]["thumbnails"]["default"]["url"])$RecipeList["video"]["thumbnailUrl"][] = $recipe_meta["items"][0]["snippet"]["thumbnails"]["default"]["url"];
        if($recipe_meta["items"][0]["snippet"]["thumbnails"]["medium"]["url"])$RecipeList["video"]["thumbnailUrl"][] = $recipe_meta["items"][0]["snippet"]["thumbnails"]["medium"]["url"];
        if($recipe_meta["items"][0]["snippet"]["thumbnails"]["high"]["url"])$RecipeList["video"]["thumbnailUrl"][] = $recipe_meta["items"][0]["snippet"]["thumbnails"]["high"]["url"];
        if($recipe_meta["items"][0]["snippet"]["thumbnails"]["standard"]["url"])$RecipeList["video"]["thumbnailUrl"][] = $recipe_meta["items"][0]["snippet"]["thumbnails"]["standard"]["url"];
        if($recipe_meta["items"][0]["snippet"]["thumbnails"]["maxres"]["url"])$RecipeList["video"]["thumbnailUrl"][] = $recipe_meta["items"][0]["snippet"]["thumbnails"]["maxres"]["url"];

        $RecipeList["video"] += array(
          "embedUrl" => $recipe_oembed,
          "uploadDate" => $recipe_meta["items"][0]["snippet"]["publishedAt"],
          "duration" => $recipe_meta["items"][0]["contentDetails"]["duration"],
          "interactionStatistic" => array(
            "@type" => "InteractionCounter",
            "interactionType" => array("@type" => "WatchAction"),
            "userInteractionCount" => (int)$recipe_meta["items"][0]["statistics"]["viewCount"]
          ),
        );

      }

    }

    if($title !== '' && $recipe_check === 1){
      echo "<!-- Recipe（レシピ） -->\n";
      echo '<script type="application/ld+json">'."\n";
      echo json_encode($RecipeList, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
      echo "\n".'</script>'."\n";
    }

  }
}

add_action('wp_head', 'amJL_Recipe', 1);