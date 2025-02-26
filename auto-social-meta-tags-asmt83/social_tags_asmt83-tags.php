<?php
function asmt83_add_meta_tags(){
    $postId = get_the_ID();
    $excerptText = get_the_excerpt($postId);
    $pageTitle = get_the_title($postId);
    $thumbUrl = get_the_post_thumbnail_url($postId);
    $permaLink = get_permalink($postId);
    $ogType = get_post_meta($postId, "asmt83_og_type", true);
    $postTags = asmt83_get_post_tags($postId);
    $fbAppID = get_option('asmt83_fbAppId');
    
    if (!$excerptText){//If the post has no excerpt.
        $excerptText = get_bloginfo('description');
        asmt83_log("No excerpt, using description");
    }
    
    $pos = strpos($excerptText, "<");
    if ($pos > 0){//If the excerpt has the Continue reading link.
        $excerptText = substr($excerptText, 0, $pos - 1);
        asmt83_log("Exceprt Read more removed trimmed.");
    }
    
    if (!$ogType){//If the post doesn't have an og type selected
        $ogType = "article";
        asmt83_log("No post og:type, using article");
    }
    
    $isArchive = is_archive();
    $isFrontPage = is_front_page();
    if ($isArchive){//If not page, but category
        $pageTitle = get_the_archive_title();
        $excerptText = get_bloginfo('description');
        $ogType = "website";
        $permaLink = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    }
    else if ($isFrontPage){
        $pageTitle = get_bloginfo('name');
        $excerptText = get_bloginfo('description');
        $permaLink = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    }
    
    $excerptText = esc_attr($excerptText);
    $pageTitle = esc_attr($pageTitle);
    
    echo PHP_EOL;
    echo '<!--Social Meta Tags added by asmt83-->'.PHP_EOL;
    if (asmt83_not_empty($thumbUrl)){
        echo '<LINK rel="image_src" href="'.$thumbUrl.'">'.PHP_EOL;
        echo '<META property="og:image" content="'.$thumbUrl.'" >'.PHP_EOL;
        echo '<META property="twitter:image" content="'.$thumbUrl.'">'.PHP_EOL;
    }
    if (asmt83_not_empty($excerptText)){
        echo '<META name="description" content="'.$excerptText.'">'.PHP_EOL ;
        echo '<META property="og:description" content="'.$excerptText.'" >'.PHP_EOL;
    }
    if (asmt83_not_empty($postTags)){
        echo '<META name="keywords" content="'.$postTags.'">'.PHP_EOL;
    }
    echo '<META property="og:type" content="'.$ogType.'">'.PHP_EOL;
    echo '<META property="og:title" content="'.$pageTitle.'">'.PHP_EOL;
    echo '<META property="og:url" content="'.$permaLink.'">'.PHP_EOL;
    echo '<META property="twitter:card" content="'.$ogType.'">'.PHP_EOL;
    
    if (asmt83_not_empty($fbAppID)){
        echo '<META property="fb:app_id" content="'.$fbAppID.'">'.PHP_EOL;
    }
    
    echo PHP_EOL;
}

function asmt83_not_empty($someString){
    if (!$someString){
        return false;
    }
    return strlen($someString) > 0;
}

function asmt83_get_post_tags($postId){
    $posttags = get_the_tags($postId);
    $tagsstring = "";
    if ($posttags) {
        foreach($posttags as $tag) {
            $tagsstring = $tagsstring.$tag->name.",";
        }
    }
    return $tagsstring;
}

function asmt83_log($message){
    if (WP_DEBUG){
        error_log($message);
    }
}
?>
