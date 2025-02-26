<?php

if (!defined('ABSPATH')) exit;

if (!function_exists('amJL_howto')){
    function amJL_howto(){
        global $post;

        $howto_check = (int)get_option("howto_check");
        $API = get_option("API");
        $supply_number = (int)get_post_meta($post->ID, "supply_number", true);
        $tool_number = (int)get_post_meta($post->ID, "tool_number", true);
        $step_number = (int)get_post_meta($post->ID, "step_number", true);

        $total_name = get_post_meta($post->ID, "howto_name", true);
        $total_image = get_post_meta($post->ID, "howto_image", true);
        $total_time = "PT".get_post_meta($post->ID, "howto_time", true)."M";
        $total_video = get_post_meta($post->ID, "total_video", true);

        //+++++[ Howto basic ]+++++//
        $amjl_howto = array(
            "@context"  => "https://schema.org",
            "@type"     => "HowTo",
            "name"      => $total_name
        );

        if (amJL_check_url_existence($total_image)){
            $amjl_howto["image"] = array(
                "@type"     => "ImageObject",
                "url"       => $total_image
            );
            $image_size = getimagesize($total_image);
            if($image_size){
                $amjl_howto["image"] += array(
                    "height"    => absint($image_size[1]),
                    "width"     => absint($image_size[0])
                );
            }
        }

        if(get_post_meta($post->ID, "howto_time", true))    $amjl_howto["totalTime"] = $total_time;

        //+++++[ Video ]+++++//
        if($total_video && $API){
            // $video_url = "https://www.youtube.com/watch?v={$total_video}";
            $video_api = "https://www.googleapis.com/youtube/v3/videos?part=id,snippet,contentDetails,statistics,player,topicDetails,recordingDetails&id={$total_video}&key={$API}";

            if(amJL_check_url_existence($video_api)){
                $video_embed = "https://www.youtube.com/embed/{$total_video}";

                $video = file_get_contents($video_api);
                $json = mb_convert_encoding($video, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                $video_meta = json_decode( $json, true );

                $video_name = $video_meta["items"][0]["snippet"]["title"];

                if(!$video_meta["items"][0]["snippet"]["description"]){
                    $video_description = $video_name."の概要";
                }else{
                    $video_description = $video_meta["items"][0]["snippet"]["description"];
                }

                if($video_meta["items"][0]["snippet"]["thumbnails"]["default"]["url"])$video_thumb = $video_meta["items"][0]["snippet"]["thumbnails"]["default"]["url"];

                $video_uploaded = $video_meta["items"][0]["snippet"]["publishedAt"];

                $video_time = $video_meta["items"][0]["contentDetails"]["duration"];

                $amjl_howto += array(
                    "@type"         => "VideoObject",
                    "name"          => $video_name,
                    "description"   => $video_description,
                    "thumbnailUrl"  => $video_thumb,
                    "contentUrl"    => $video_url,
                    "embedUrl"      => $video_embed,
                    "uploadDate"    => $video_uploaded,
                    "duration"      => $video_time
                );
            }
        }

        //+++++[ Supply & Tool ]+++++//
        for((int)$i=1; $i<=$supply_number; $i++){
            $supply = get_post_meta($post->ID, "supply_{$i}" , true);
            if($supply){
                $amjl_howto["supply"][] = array(
                    "@type" => "HowToSupply",
                    "name"  => $supply
                );
            }
        }

        for((int)$i=1; $i<=$tool_number; $i++){
            $tool = get_post_meta($post->ID, "tool_{$i}" , true);
            if($tool){
                $amjl_howto["tool"][] = array(
                    "@type" => "HowToTool",
                    "name"  => $tool
                );
            }
        }

        //+++++[ Cost ]+++++//
        $cost_passage = get_post_meta($post->ID, "howto_cost_passage", true);
        $cost = get_post_meta($post->ID, "howto_cost", true);
        if($cost){
            $amjl_howto += array(
                "estimatedCost" => array(
                    "@type"     => "MonetaryAmount",
                    "currency"  => $cost_passage,
                    "value"     => $cost
                )
            );
        }

        //+++++[ Step ]+++++//
        for((int)$i=1; $i<=$step_number; $i++){
            $step_name = get_post_meta($post->ID, "step_name_{$i}" , true);
            $step_text = get_post_meta($post->ID, "step_text_{$i}" , true);
            $step_image = get_post_meta($post->ID, "step_image_{$i}" , true);
            $step_url = get_post_meta($post->ID, "step_url_{$i}" , true);

            $amjl_howto["step"][] = array(
                "@type" => "HowToStep"
            );

            if($step_name)$amjl_howto["step"][$i-1]["name"] = $step_name;

            $amjl_howto["step"][$i-1]["text"] = $step_text;
            if(amJL_check_url_existence($step_image)){
                $image_size = getimagesize($step_image);
                if($image_size){
                    $amjl_howto["step"][$i-1]["image"][] = array(
                        "@type"     => "ImageObject",
                        "url"       => $step_image,
                        "height"    => absint($image_size[1]),
                        "width"     => absint($image_size[0])
                    );
                }else{
                    $amjl_howto["step"][$i-1]["image"] = $step_image;
                }
            }

            $amjl_howto["step"][$i-1]["url"] = $step_url;

        }

        if($howto_check === 1 && $total_name){
            echo "<!-- ハウツー（HowTo） -->\n";
            echo '<script type="application/ld+json">'."\n";
            echo wp_json_encode($amjl_howto);
            echo "\n".'</script>'."\n";
        }

    }
}

add_action('wp_head', 'amJL_howto', 1);