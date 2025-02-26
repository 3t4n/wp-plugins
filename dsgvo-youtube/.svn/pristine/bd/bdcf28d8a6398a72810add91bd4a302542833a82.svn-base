<?php


//include css und js
add_action('wp_enqueue_scripts', 'cdsgvogdpryoutube_scripts');
function cdsgvogdpryoutube_scripts() {
    wp_register_style( 'cdsgvogdpryoutube', plugins_url('../css/jquery.fancybox.min.css', __FILE__ ));
	//wp_register_style( 'namespace', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css');
    wp_enqueue_style( 'cdsgvogdpryoutube' );
    wp_enqueue_script( 'cdsgvogdpryoutubescript', plugins_url('../js/jquery.fancybox.min.js', __FILE__), array( 'jquery' ) );
	//wp_enqueue_script( 'namespaceformyscript', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js', array( 'jquery' ) );
}

?>