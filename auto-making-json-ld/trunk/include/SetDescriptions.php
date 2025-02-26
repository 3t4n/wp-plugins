<?php

if (!function_exists('amJL_description_start')){
    function amJL_description_start(){
        echo "\n<!-- *************************** -->\n";
        echo "<!-- auto making JSON-LD (START) -->\n";
    }
}

if(!function_exists('amJL_description_end')){
    function amJL_description_end(){
        echo "<!-- auto making JSON-LD (END) -->\n";
        echo "<!-- ************************* -->\n";
    }
}