<?php
    $i = 0;
    echo $instance["header_text"];
    $this->showBadge("top", $instance);
    foreach ($this->scrobbles as $scrobble) {
        if(++$i > $instance["size"]) break;
        extract($scrobble);
        $class = "lastfm_rps_track";
        if($date == "NOW") $class .= " lastfm_rps_playing_now";
        if($instance["position"] == "right") $class .= " lastfm_rps_track_right";
        echo "<div class='$class'><div class='lastfm_rps_image'>";
        echo "<a href='{$url}' target='_blank'><img src='{$image}'></a>";
        echo "</div><div class='lastfm_rps_track_info'>";
        echo "<div class='lastfm_rps_title'><a href='{$url}' target='_blank'>{$track}</a></div>";
        echo "<div class='lastfm_rps_artist'><a href='{$artisturl}' target='_blank'>" . $artist . "</a></div>";
        echo "<div class='lastfm_rps_album'><a href='{$albumurl}' target='_blank'>" . $album . "</a></div>";
        if($date == "NOW")
            echo "<div class='lastfm_rps_time'>" . __( 'Playing Now', 'lastfmrps' ) . "</div>";
        else
            echo "<div class='lastfm_rps_time'>" . sprintf( __( '%s ago', 'lastfmrps' ), human_time_diff( +$date ) ) . "</div>";
        echo "</div></div>";
    }
    $this->showBadge("bottom", $instance);
    echo $instance["footer_text"];
?>