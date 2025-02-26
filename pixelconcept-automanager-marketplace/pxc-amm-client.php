<?php

function pxc_amm_apiclient_query($uri){
    $content = @file_get_contents($uri);
    if($content === FALSE) { 
        return null;
    }
    else {
        return @json_decode($content);
    }
}