<?php
  
if (!defined('ABSPATH')) exit;

//---- Video ----
if ('amJL_video'){
  function amJL_video(){
    
    global $post;

    $API = get_option('API');

    $videoUrl = array();
    (int)$count = 0;
    for((int)$i=1; $i<5; $i++){
      $video_id = get_post_meta($post->ID, "video_id{$i}", true);
      if($video_id){
        $youtube_url = "https://www.youtube.com/watch?v={$video_id}";

        // send request
        $status = wp_remote_head($youtube_url);

        if (!is_wp_error($response)) {
          $status = wp_remote_retrieve_response_code($response);

          if ($status === 200) {
              $videoUrl[$count][] = "https://www.youtube.com/watch?v={$video_id}";
              $videoUrl[$count][] = "https://www.googleapis.com/youtube/v3/videos?part=id,snippet,contentDetails,statistics,player,topicDetails,recordingDetails&id={$video_id}&key={$API}";
              $videoUrl[$count][] = "https://www.youtube.com/embed/{$video_id}";
              $count++;
          }
        } 
      }
    }

    for((int)$i = 1; $i <= $count; $i++){
      ${"ch".$i} = file_get_contents($videoUrl[$i-1][1]);
      ${"json".$i} = mb_convert_encoding(${"ch".$i}, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
      ${"metas".$i} = json_decode( ${"json".$i}, true );
    }

    if($count > 0){
      $amJL_video = array(
        "@context" => "https://schema.org",
        "@type" => "ItemList",
      );

      if($count === 1){
        if($metas1["items"][0]["snippet"]["description"] === ""){
          $description = $metas1["items"][0]["snippet"]["title"]."の概要";
        }else{
          $description = $metas1["items"][0]["snippet"]["description"];
        }

        $amJL_video = array(
          "@context" => "https://schema.org",
          "@type" => "VideoObject",
          "name" => $metas1["items"][0]["snippet"]["title"],
          "url" => $videoUrl[0][0],
          "description" => $description
        );

        if($metas1["items"][0]["snippet"]["thumbnails"]["default"]["url"])$amJL_video["thumbnailUrl"][] = $metas1["items"][0]["snippet"]["thumbnails"]["default"]["url"];
        if($metas1["items"][0]["snippet"]["thumbnails"]["medium"]["url"])$amJL_video["thumbnailUrl"][] = $metas1["items"][0]["snippet"]["thumbnails"]["medium"]["url"];
        if($metas1["items"][0]["snippet"]["thumbnails"]["high"]["url"])$amJL_video["thumbnailUrl"][] = $metas1["items"][0]["snippet"]["thumbnails"]["high"]["url"];
        if($metas1["items"][0]["snippet"]["thumbnails"]["standard"]["url"])$amJL_video["thumbnailUrl"][] = $metas1["items"][0]["snippet"]["thumbnails"]["standard"]["url"];
        if($metas1["items"][0]["snippet"]["thumbnails"]["maxres"]["url"])$amJL_video["thumbnailUrl"][] = $metas1["items"][0]["snippet"]["thumbnails"]["maxres"]["url"];

        $amJL_video += array(
          "uploadDate" => $metas1["items"][0]["snippet"]["publishedAt"],
          "duration" => $metas1["items"][0]["contentDetails"]["duration"],
          "embedUrl" => $videoUrl[0][2],
          "interactionStatistic" => array(
              "@type" => "InteractionCounter",
              "interactionType" => array("@type" => "WatchAction"),
              "userInteractionCount" => (int)$metas1["items"][0]["statistics"]["viewCount"]
          ),
        );

      }else{
        for((int)$i = 1; $i <= $count; $i++){
          $meta = ${"metas".$i};
          
          if($meta["items"][0]["snippet"]["description"] === ""){
            $description = $meta["items"][0]["snippet"]["title"]."の概要";
          }else{
            $description = $meta["items"][0]["snippet"]["description"];
          }

          ${"thumbnail".$i} = array();

          if($meta["items"][0]["snippet"]["thumbnails"]["default"]["url"])${"thumbnail".$i}[] = $meta["items"][0]["snippet"]["thumbnails"]["default"]["url"];
          if($meta["items"][0]["snippet"]["thumbnails"]["medium"]["url"])${"thumbnail".$i}[] = $meta["items"][0]["snippet"]["thumbnails"]["medium"]["url"];
          if($meta["items"][0]["snippet"]["thumbnails"]["high"]["url"])${"thumbnail".$i}[] = $meta["items"][0]["snippet"]["thumbnails"]["high"]["url"];
          if($meta["items"][0]["snippet"]["thumbnails"]["standard"]["url"])${"thumbnail".$i}[] = $meta["items"][0]["snippet"]["thumbnails"]["standard"]["url"];
          if($meta["items"][0]["snippet"]["thumbnails"]["maxres"]["url"])${"thumbnail".$i}[] = $meta["items"][0]["snippet"]["thumbnails"]["maxres"]["url"];
          
          $amJL_video["itemListElement"][] = array(
            "@type" => "VideoObject",
            "position" => $i,
            "name" => $meta["items"][0]["snippet"]["title"],
            "url" => $videoUrl[$i-1][0],
            "description" => $description
          );

          for((int)$l = 0; $l < count(${"thumbnail".$i}); $l++ ){
            $amJL_video["itemListElement"][$i-1]["thumbnailUrl"][] = ${"thumbnail".$i}[$l];
          }

          $amJL_video["itemListElement"][$i-1] += array(
            "uploadDate" => $meta["items"][0]["snippet"]["publishedAt"],
            "duration" => $meta["items"][0]["contentDetails"]["duration"],
            "embedUrl" => $videoUrl[$i-1][2],
            "interactionStatistic" => array(
              "@type" => "InteractionCounter",
              "interactionType" => array("@type" => "WatchAction"),
              "userInteractionCount" => (int)$meta["items"][0]["statistics"]["viewCount"]
            ),
          );

        }
      }
    }

    $video_check = (int)get_option('video_value');
    if($API && $count > 0 && $video_check === 1){
      echo "<!-- Video -->\n";
      echo '<script type="application/ld+json">'."\n";
      echo wp_json_encode($amJL_video);
      echo "\n".'</script>'."\n";
    }
      
  }
}

add_action('wp_head', 'amJL_video', 1);