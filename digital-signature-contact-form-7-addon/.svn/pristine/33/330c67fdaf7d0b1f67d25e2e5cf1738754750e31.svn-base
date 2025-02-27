<?php
// Silence is golden
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}



//load steps from separate file
$steps = esig_load_template(__DIR__ . '/cf7-esign-about-steps');

$about_options = array(
    'pluginName'        => 'Contact Form 7',
    'setupVidImage'     => plugins_url('../assets/images/getting-started-video-thumb.jpg', __FILE__),
    'setupVidURL'       => 'https://www.youtube.com/embed/oUQKP6i-ukU?&autoplay=1&rel=0&theme=light&hd=1&autohide=1&showinfo=0&color=white&showinfo=0?TB_iframe=true&width=700&height=540',
    'stepContent'       => $steps
);

do_action("esig_admin_notices"); 

require_once( __DIR__ . '/core-about.php' );

esig_generate_about_page ( $about_options );


//unset vars which have no use elsewhere
unset($steps);
unset($about_options);