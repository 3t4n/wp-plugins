<?php
header('Content-Type: application/javascript');

$shisp_slider_easingList_js = array(
    'easeInBack',
    'easeInBounce',
    'easeInCirc',
    'easeInCubic',
    'easeInElastic',
    'easeInExpo',
    'easeInOutBack',
    'easeInOutBounce',
    'easeInOutCirc',
    'easeInOutCubic',
    'easeInOutElastic',
    'easeInOutExpo',
    'easeInOutQuad',
    'easeInOutQuart',
    'easeInOutQuint',
    'easeInOutSine',
    'easeInQuad',
    'easeInQuart',
    'easeInQuint',
    'easeInSine',
    'easeOutBack',
    'easeOutBounce',
    'easeOutCirc',
    'easeOutCubic',
    'easeOutElastic',
    'easeOutExpo',
    'easeOutQuad',
    'easeOutQuart',
    'easeOutQuint',
    'easeOutSine',
    'linear',
    'swing',
);

$shisp_uid            = $_GET['slideruid'];
$shisp_ease           = in_array($_GET['ease'],$shisp_slider_easingList_js) ? strval($_GET['ease']) : 'easeInOutExpo';
$shisp_speed          = isset($_GET['speed']) ? intval($_GET['speed']) : 1000;
$shisp_duration       = isset($_GET['duration']) ? intval($_GET['duration']) : 5000;
$shisp_autoplay       = ($_GET['autoplay'] == 1) ? intval($_GET['autoplay']) : 0 ;
$shisp_transition     = in_array($_GET['transition'],array('up', 'down','left', 'right','fade')) ? strval($_GET['transition']) : 'up';
$shisp_navtype        = in_array($_GET['navtype'],array('list', 'controls','both', 'none')) ? strval($_GET['navtype']) : 'controls';
$shisp_includefooter  = ($_GET['includefooter'] == 1) ? intval( $_GET['includefooter'] ) : 0 ;

$shisp_slider_js = <<<JS

    jQuery(document).ready(function($){
        $('#$shisp_uid').billboard({
            ease: "$shisp_ease", // animation ease of transitions
            speed: $shisp_speed, // duration of transitions in milliseconds
            duration: $shisp_duration, // time between slide changes
            autoplay: $shisp_autoplay, // whether slideshow should play automatically
            loop: true, // whether slideshow should loop (only applies if autoplay is true)
            transition: "$shisp_transition", // "fade", "up", "down", "left", "right"
            navType: "$shisp_navtype", // "controls", "list", "both" or "none"
            styleNav: false, // applies default styles to nav
            includeFooter: $shisp_includefooter, // show/hide footer (contains caption and nav)
            autosize: true, // attempts to detect slideshow size automatically
            resize: false, // attempts to detect each slide's size automatically
            stretch: true// stretch images to fill container
        });
    });

JS;

echo $shisp_slider_js;