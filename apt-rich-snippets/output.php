<?php 

add_action("the_content", "aptmicrodata_append_content_box"); 
function aptmicrodata_append_content_box($content) {
    
    global $post;
    
    $microDataType = get_post_meta($post->ID, 'aptmicrodata_microdata_type');

    if($microDataType[0] != '' || $microDataType[0] != 'none') {

        $box = '';
        
        wp_enqueue_script('aptmicrodata_style', '/wp-content/plugins/APTRichSnippets/style.css');

        if($microDataType[0] == 'review') {

            $box = aptmicrodata_build_review_box();
            
        } elseif($microDataType[0] == 'event') {
            
            $box = aptmicrodata_build_event_box();
            
        } elseif($microDataType[0] == 'music') {
            
            $box = aptmicrodata_build_music_box();
            
        }
        
        $content = $content.$box;
        
    }
    
    return $content;
}

function aptmicrodata_build_review_box() {
    
    global $post, $aptmicrodata_box_top, $aptmicrodata_box_bottom;
    
    $itemReviewed = get_post_meta($post->ID, 'aptmicrodata_review_itemreviewed');
    $itemSummary = get_post_meta($post->ID, 'aptmicrodata_review_summary');
    $rating = get_post_meta($post->ID, 'aptmicrodata_review_rating');
    $author = get_the_author($post->ID);
    $dateReviewed = get_the_date('', $post->ID);
    $dateReviewedFormated = get_the_date('Y-m-d', $post->ID);

    $box = $aptmicrodata_box_top.'
                <div itemscope itemtype="http://data-vocabulary.org/Review">
                    <span itemprop="aptmicrodataDontShow" class="aptmicrodataDontShow">'.$dateReviewedFormated.'</span>    
                    <span itemprop="itemreviewed">'.$itemReviewed[0].'</span><br />
                    Reviewed by <span itemprop="reviewer">'.$author.'</span> on
                    <time itemprop="dtreviewed" datetime="'.$dateReviewedFormated.'">'.$dateReviewed.'</time>. <br />
                    <span itemprop="summary">'.$itemSummary[0].'</span> <br />
                    
                    Star rating: <div class="aptmicrodataStarRating"><span itemprop="rating" class="aptmicrodataDontShow">'.$rating[0].'</span>';
                    
                    $numberStars = (int) $rating[0];
                    for($x=1; $x <= $numberStars; $x++) {
                        
                        $box .= '<div class="aptmicrodataStar"></div>';

                    }
                    
                    if(strpos($rating[0], '.')) {
                        
                        $box .= '<div class="aptmicrodataHalfStar"></div>';
                        
                    }
                    
                    $box .= '</div>';
    
    if(current_user_can( 'manage_options' )) {
        
        $box .= '<br /><a href="http://www.google.com/webmasters/tools/richsnippets?url='.get_permalink($post->ID).'" class="aptmicrodataTestSnippet">Test rich snippet</a>';
        
    }
    
    $box .= "</div>$aptmicrodata_box_bottom";
    
    return $box;
}

function aptmicrodata_build_event_box() {
    
    global $post, $aptmicrodata_box_top, $aptmicrodata_box_bottom;
    
    $eventSummary = get_post_meta($post->ID, 'aptmicrodata_event_summary');
    $eventLocation = get_post_meta($post->ID, 'aptmicrodata_event_location');
    $eventStartDate = get_post_meta($post->ID, 'aptmicrodata_event_start_date');
    $eventEndDate = get_post_meta($post->ID, 'aptmicrodata_event_end_date');
    $eventType = get_post_meta($post->ID, 'aptmicrodata_event_type');
    $dateReviewed = get_the_date('', $post->ID);
    $dateReviewedFormated = get_the_date('Y-m-d', $post->ID);

    $box = $aptmicrodata_box_top.'
                <div itemscope itemtype="http://data-vocabulary.org/Event">
                    <span itemprop="aptmicrodataDontShow" class="aptmicrodataDontShow">'.$dateReviewedFormated.'</span>
                    <span itemprop="summary">'.$eventSummary[0].'</span> <br />';
                    if( $eventStartDate[0] != $eventEndDate[0]) {
                        $box .= '<time itemprop="startDate" datetime="'.$eventStartDate[0].'">'.$eventStartDate[0].'</time> — 
                        <time itemprop="endDate" datetime="'.$eventEndDate[0].'">'.$eventEndDate[0].'</time>  <br />';
                    } else {
                      $box .= '<time itemprop="startDate" datetime="'.$eventStartDate[0].'">'.$eventStartDate[0].'</time>';  
                    }
                  $box .=  '<span itemprop="location" itemscope itemtype="http://data-vocabulary.org/​Organization">
                        <span itemprop="name">'.$eventLocation[0].'</span>
                     </span> <br />
                     Category: <span itemprop="eventType">'.$eventType[0].'</span>
                ';
    if(current_user_can( 'manage_options' )) {
        
        $box .= '<br /><a href="http://www.google.com/webmasters/tools/richsnippets?url='.get_permalink($post->ID).'" class="aptmicrodataTestSnippet">Test rich snippet</a>';
        
    }
    
    $box .= "</div>$aptmicrodata_box_bottom";
    
    return $box;
}

function aptmicrodata_build_music_box() {
    
   global $post, $aptmicrodata_box_top, $aptmicrodata_box_bottom;
   
   $musicName = get_post_meta($post->ID, 'aptmicrodata_music_name');
   $musicSummary = get_post_meta($post->ID, 'aptmicrodata_music_summary');
   $album = get_post_meta($post->ID, 'aptmicrodata_music_album');
   
   //Tracks
   $track1Name = get_post_meta($post->ID, 'aptmicrodata_music_track_1_name');
   $track1Link = get_post_meta($post->ID, 'aptmicrodata_music_track_1');
   $track1Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_1');
   
   $track2Name = get_post_meta($post->ID, 'aptmicrodata_music_track_2_name');
   $track2Link = get_post_meta($post->ID, 'aptmicrodata_music_track_2');
   $track2Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_2');
   
   $track3Name = get_post_meta($post->ID, 'aptmicrodata_music_track_3_name');
   $track3Link = get_post_meta($post->ID, 'aptmicrodata_music_track_3');
   $track3Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_3');
   
   $track4Name = get_post_meta($post->ID, 'aptmicrodata_music_track_4_name');
   $track4Link = get_post_meta($post->ID, 'aptmicrodata_music_track_4');
   $track4Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_4');
   
   $track5Name = get_post_meta($post->ID, 'aptmicrodata_music_track_5_name');
   $track5Link = get_post_meta($post->ID, 'aptmicrodata_music_track_5');
   $track5Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_5');
   
   $track6Name = get_post_meta($post->ID, 'aptmicrodata_music_track_6_name');
   $track6Link = get_post_meta($post->ID, 'aptmicrodata_music_track_6');
   $track6Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_6');
   
   $track7Name = get_post_meta($post->ID, 'aptmicrodata_music_track_7_name');
   $track7Link = get_post_meta($post->ID, 'aptmicrodata_music_track_7');
   $track7Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_7');
   
   $track8Name = get_post_meta($post->ID, 'aptmicrodata_music_track_8_name');
   $track8Link = get_post_meta($post->ID, 'aptmicrodata_music_track_8');
   $track8Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_8');
   
   $track9Name = get_post_meta($post->ID, 'aptmicrodata_music_track_9_name');
   $track9Link = get_post_meta($post->ID, 'aptmicrodata_music_track_9');
   $track9Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_9');
   
   $track10Name = get_post_meta($post->ID, 'aptmicrodata_music_track_10_name');
   $track10Link = get_post_meta($post->ID, 'aptmicrodata_music_track_10');
   $track10Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_10');
   
   $track11Name = get_post_meta($post->ID, 'aptmicrodata_music_track_11_name');
   $track11Link = get_post_meta($post->ID, 'aptmicrodata_music_track_11');
   $track11Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_11');
   
   $track12Name = get_post_meta($post->ID, 'aptmicrodata_music_track_12_name');
   $track12Link = get_post_meta($post->ID, 'aptmicrodata_music_track_12');
   $track12Duration = get_post_meta($post->ID, 'aptmicrodata_music_duration_12');
   
   $dateReviewed = get_the_date('', $post->ID);
   $dateReviewedFormated = get_the_date('Y-m-d', $post->ID);
   
   $box = $aptmicrodata_box_top.'
            <div itemscope itemtype="http://schema.org/MusicGroup">
                <span itemprop="name">'.$musicName[0].'</span> <br />';   
   
            if(!empty($track1Name) && !empty($track1Link)) {
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track1Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track1Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track1Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            }
            
            if(!empty($track2Name) && !empty($track2Link)) {
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track2Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track2Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track2Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            }

            if(!empty($track3Name) && !empty($track3Link)) {
                
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track3Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track3Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track3Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            } 
            
            if(!empty($track4Name) && !empty($track4Link)) {
                
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track4Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track4Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track4Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            } 
            
            if(!empty($track5Name) && !empty($track5Link)) {
                
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track5Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track5Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track5Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            } 
            
            if(!empty($track6Name) && !empty($track6Link)) {
                
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track6Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track6Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track6Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            } 
            
            if(!empty($track7Name) && !empty($track7Link)) {
                
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track7Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track7Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track7Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            } 
            
            if(!empty($track8Name) && !empty($track8Link)) {
                
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track8Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track8Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track8Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            } 

            if(!empty($track9Name) && !empty($track9Link)) {
                
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track9Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track9Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track9Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            } 
            
            if(!empty($track10Name) && !empty($track10Link)) {
                
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track10Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track10Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track10Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            } 
            
            if(!empty($track11Name) && !empty($track11Link)) {
                
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track11Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track11Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track11Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            } 
            
            if(!empty($track12Name) && !empty($track12Link)) {
                
                $box .= '<div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
                $box .= 'Track name: <span itemprop="name">'.$track12Name[0].'</span><br />';
                $box .= 'Album: <span itemprop="inAlbum">'.$album.'</span><br />';
                $box .= 'Duration: <span itemprop="duration" content="PT6M33S">'.$track12Duration.'</span><br />';
                $box .= '<span itemprop="url" class="aptmicrodataDontShow">'.get_permalink($post->ID).'</span>';  
                $box .= '<a href="'.$track12Link[0].'" itemprop="audio">Play</a><br /><br />';
                $box .= '</div>';
                
            } 
          
            
   if(current_user_can( 'manage_options' )) {
        
        $box .= '<br /><a href="http://www.google.com/webmasters/tools/richsnippets?url='.get_permalink($post->ID).'" class="aptmicrodataTestSnippet">Test rich snippet</a>';
        
    }
    
    $box .= "</div>$aptmicrodata_box_bottom";
   
   return $box;
    
}

function aptmicrodata_style()  
{ 
    
    echo "<style>";
        echo "
        .aptmicrodatabox {
            display: ".get_option('aptmicrodata_display').";
            background: ".get_option('aptmicrodata_background').";
            padding: ".get_option('aptmicrodata_padding').";
            border: ".get_option('aptmicrodata_border').";    
            color: ".get_option('aptmicrodata_text').";
            width: ".get_option('aptmicrodata_width').";    
        }
        
        .aptmicrodatabox a{
        
            color: ".get_option('aptmicrodata_link').";
            text-decoration: none;

        }
        
        .aptmicrodataTestSnippet {
            font-size: 10px;
            padding-top: 10px;
        }
        
        .aptmicrodataStarRating {
            
            border
            border: 0;
            padding: 0;
            margin: 0;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;

        }
        
        .aptmicrodataStarRating {
        
            width: 120px;
            
        }
        
        .aptmicrodataStar {
        
            width: 24px;
            height: 24px;
            background-image:url('http://localhost/wordpress/wp-content/plugins/APTRichSnippets/star_24.png');
            float: left;
        }
        
        .aptmicrodataHalfStar {
        
            width: 24px;
            height: 24px;
            background-image:url('http://localhost/wordpress/wp-content/plugins/APTRichSnippets/star_half_24.png');
            float: left;
        }
        
        .aptmicrodataDontShow {
            
            display: none;

        }

        ";
    echo "</style>";
    
}
add_action("wp_head", "aptmicrodata_style");

?>
