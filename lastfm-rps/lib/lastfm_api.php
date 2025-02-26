<?php
require_once "lastfm_utils.php";

class LastFMAPI
{
    private $apiKey = "2f1a09f6bb6c9d4a89c67c7a7805a215";
    private $baseUrl = "http://ws.audioscrobbler.com/";
    private $user, $utils;

    function __construct($username)
    {
        $this->user = $username;
        $this->utils = new LastFMUtils();
        /*update_option("lastfm_recent_scrobbles_{$this->user}", false);
        update_option("lastfm_recent_scrobbles_expire_{$this->user}", false);*/
    }

    public function getUserInfo($cache_enabled = false)
    {
        $refreshNeeded = true;
        if($cache_enabled){
            $refreshNeeded = false;
            $recentExpires = get_option("lastfm_recent_scrobbles_expire_{$this->user}");
            if(!$recentExpires || $recentExpires < time()){
                $refreshNeeded = true;
            }
        }else{
            $refreshNeeded = true;
        }
        if(!$refreshNeeded) {
            $userData = get_option("lastfm_rps_userdata_{$this->user}");
            return json_decode($userData);
        } else {
            $url = $this->baseUrl . "/2.0/?method=user.getinfo&user={$this->user}&api_key={$this->apiKey}&format=json";
            $data = $this->utils->fetch($url);
            if ($data && !property_exists($data, "error")) {
                $data->user->image = $this->getLargeImage($data->user->image);
                if($data->user->image == null) {
                    $data->user->image = plugin_dir_url( __FILE__ ) . "../assets/noart.gif";
                }
                update_option("lastfm_rps_userdata_{$this->user}", json_encode($data));
                return $data;
            } else {
                echo $data->message;
                return "";
            }
        }
    }

    public function getUserScrobbles($cache_enabled, $cache_duration)
    {
        $refreshNeeded = true;
        if($cache_enabled){
            $refreshNeeded = false;
            $recentScrobbles = get_option("lastfm_recent_scrobbles_{$this->user}");
            $recentExpires = get_option("lastfm_recent_scrobbles_expire_{$this->user}");
            if ($recentScrobbles && $recentExpires) {
                if ($recentExpires < time()) {
                    $refreshNeeded = true;
                }
            } else {
                $refreshNeeded = true;
            }
        }
        if ($refreshNeeded) {
            $url = $this->baseUrl . "/2.0/?method=user.getrecenttracks&user={$this->user}&api_key={$this->apiKey}&format=json";
            $data = $this->utils->fetch($url);
            if ($data && !property_exists($data, "error")) {
                $data = $this->normalize($data);
                update_option("lastfm_recent_scrobbles_{$this->user}", json_encode($data));
                update_option("lastfm_recent_scrobbles_expire_{$this->user}", time() + $cache_duration);
                return $data;
            } else {
                echo $data->message;
                return "";
            }
        } else {
            return json_decode($recentScrobbles, true);
        }
    }

    public function normalize($data)
    {
        $normalized = [];
        foreach ($data->recenttracks->track as $track) {
            $normalized[] = [
                "artist" => $track->artist->{"#text"},
                "album" => $track->album->{"#text"},
                "track" => $track->name,
                "artisturl" => explode("_", $track->url)[0],
                "albumurl" => explode("_", $track->url)[0] . urlencode($track->album->{"#text"}),
                "url" => $track->url,
                "image" => $this->getTrackImage($track),
                "date" => property_exists($track, "date") ? $track->date->uts : "NOW"
            ];
        }
        return $normalized;
    }

    public function getTrackImage($track)
    {
        $min = $this->getSmallestImage($track->image);
        if ($min == null) {
            $min = $this->getArtistImage($track->artist->{"#text"});
            if ($min == null) {
                $min = plugin_dir_url( __FILE__ ) . "../assets/noart.gif";
            }
        }
        return $min;
    }

    public function getSmallestImage($images)
    {
        $images = json_decode(json_encode($images), true);
        $imagesizes = array_column($images, "size");
        if (count($imagesizes)) {
            foreach (["medium", "large", "extralarge"] as $size) {
                if (in_array($size, $imagesizes)) {
                    $image = array_values(array_filter($images, function ($d) use ($size) {
                        return $d["size"] === $size;
                    }));
                    if (count($image)) return $image[0]["#text"];
                }
            }
        }
        return null;
    }

    public function getLargeImage($images)
    {
        $images = json_decode(json_encode($images), true);
        $imagesizes = array_column($images, "size");
        if (count($imagesizes)) {
            foreach (["large", "extralarge"] as $size) {
                if (in_array($size, $imagesizes)) {
                    $image = array_values(array_filter($images, function ($d) use ($size) {
                        return $d["size"] === $size;
                    }));
                    if (count($image)) return $image[0]["#text"];
                }
            }
        }
        return null;
    }

    public function getArtistImage($artist)
    {
        $url = $this->baseUrl . "/2.0/?method=artist.getInfo&artist=".urlencode($artist)."&api_key={$this->apiKey}&format=json";
        $data = $this->utils->fetch($url);
        if ($data && !property_exists($data, "error")) {
            return !empty(trim($this->getSmallestImage($data->artist->image))) ? $this->getSmallestImage($data->artist->image) : null;
        }
        return null;
    }

    public function getAlbumImage($artist, $album)
    {
        $url = $this->baseUrl . "/2.0/?method=album.getInfo&artist=".urlencode($artist)."&album=".urlencode($album)."&api_key={$this->apiKey}&format=json";
        $data = $this->utils->fetch($url);
        if ($data && !property_exists($data, "error")) {
            return !empty(trim($this->getSmallestImage($data->album->image))) ? $this->getSmallestImage($data->album->image) : null;
        }
        return null;
    }
}

?>