<?php
require_once "lastfm_api.php";

class LastFMUserInterface
{
    private $userinfo, $scrobbles;

    public function form($instance)
    {
        require __DIR__ . "/../views/widget_form.php";
    }

    public function widget($args, $instance)
    {
        if(array_key_exists("user", $instance)){
            $LastFM = new LastFMAPI($instance["user"]);
            $this->userinfo = $LastFM->getUserInfo($instance["caching"]);
            $this->scrobbles = $LastFM->getUserScrobbles($instance["caching"], $instance["cache_duration"]);
            if(is_array($this->scrobbles)){
                require __DIR__ . "/../views/widget_ui.php";
            }
        } else {
            _e("Please define an username from widget configuration page.", "lastfmrps");
        }
    }

    public function showBadge($position, $instance){
        if($instance["badgeposition"] == $position){
            require __DIR__ . "/../views/widget_badge.php";
        }
    }

    public function showLogo($instance){
        switch($instance["color"]){
            case "red": return "<img src='". plugin_dir_url( __FILE__ ) . "../assets/logo_lastfm_red.png" ."' class='lastfm_rps_title_logo'>";
            case "black": return "<img src='". plugin_dir_url( __FILE__ ) . "../assets/logo_lastfm_black.png" ."' class='lastfm_rps_title_logo'>";
            case "white": return "<img src='". plugin_dir_url( __FILE__ ) . "../assets/logo_lastfm_white.png" ."' class='lastfm_rps_title_logo'>";
            default: return "<img src='". plugin_dir_url( __FILE__ ) . "../assets/logo_lastfm_red.png" ."' class='lastfm_rps_title_logo'>";
        }
    }

}

?>