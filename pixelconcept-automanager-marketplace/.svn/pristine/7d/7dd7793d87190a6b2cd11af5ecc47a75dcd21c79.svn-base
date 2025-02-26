<?php

function pxc_amm_sm_createxml($settings) {
    $settings = $settings ? $settings : pxc_amm_getsettings();
    $urls = pxc_amm_sm_list_urls('', $settings);

    $result = "<?xml version=\"1.0\"?>\n<urlset>\n";

    foreach ($url as $urls){

        $link = "\t<url "
                . " loc=''"
                . " lastmod=''"
                . " changefreq=''"
                . " priority=''"
                . " />\n";

        $result .= $link;
    }

    $result .= "</urlset>\n";

    return $result;
}

function pxc_amm_sm_list_pages() {

    $result = array();

    foreach (PXC_AMM_NEEDLES as $needle) {
        $query = new WP_Query(array('s' => '[' . $needle . ']'));
        if ($query->have_posts() ) { 
            foreach ($query->posts as $post) {
                $result[] = $post;
            }
        }
    }

    return $result;
}

function pxc_amm_sm_list_urls($targetpage_url, $settings) {

    $targetpages = pxc_amm_sm_list_pages();

    $settings = $settings ? $settings : pxc_amm_getsettings();
    $vehicles = pxc_amm_sm_list_vehicles($settings);

    $result = [];

    if (substr($targetpage_url, strlen($targetpage_url) - 1, 1) != '/') {
        $targetpage_url .= '/';
    }

    foreach ($vehicles as $vehicle) {

        $url = pxc_amm_sm_build_location_for_vehicle($settings, $vehicle);
        $url = $targetpage_url . "#!/vehicles/" .$vehicle->id . "/" . $url;

        $item = array(
            'id' => $vehicle->id,
            'manufacturer' => $vehicle->manufacturer->name,
            'model' => $vehicle->model->name,
            'extension' => $vehicle->modelExtension,
            'images' => [],
            'location' => $url
        );

        foreach ($vehicle->mediaItems as $media) {
            $item['images'][] = array(
                'src' => $media->downloadUrl,
                'title' => isset($media->description) ? $media->description : ''
            );
        }

        $result[] = $item;
    }

    return $result;
}

function pxc_amm_sm_list_vehicles($settings){

    $count = pxc_amm_sm_api_count_vehicles($settings);
    $result = [];

    $take = 25;
    for ($skip = 0; $skip < $count; $skip += $take)
    {
        $result = array_merge($result, pxc_amm_sm_api_list_vehicles_page($settings, $skip, $take));
    }

    return $result;
}

function pxc_amm_sm_build_location_for_vehicle($settings, $vehicle) {

    $result = '{manufacturer}-{model}-{paintColor}';
    foreach ($vehicle as $n => $v) {
        if (is_string($v) || is_numeric($v)) {
            $result = str_replace('{' . $n . '}', $v, $result);
        } else if (is_object($v)) { // for id-name pairs
            foreach ($v as $n2 => $v2) {
                if ($n2 == 'name') {
                    $result = str_replace('{' . $n . '}', $v2, $result);
                }
            }
        }
    }
    
    // do some escaping
    $result = str_replace(" ", "+", $result);
    $result = str_replace("/", ",s", $result);

    return $result;
}

function pxc_amm_sm_api_count_vehicles($settings) {
    $response = pxc_amm_sm_api_query($settings, "vehicles/count", null);
    return $response;
}

function pxc_amm_sm_api_list_vehicles_page($settings, $skip, $take) {
    $response = pxc_amm_sm_api_query($settings, "vehicles", "skip=" . $skip . "&take=" . $take);
    $content = json_decode($response);

    return $content->items;
}

function pxc_amm_sm_api_query($settings, $path, $queryargs) {
    if (!$settings["apikey"]) {
        return false;
    }

    $uri = $settings["apiurl"] . $path . "?apikey=" . $settings["apikey"];
    if ($queryargs) {
        $uri .= "&" . $queryargs;
    }

    $result = file_get_contents($uri);
    
    return $result;
}