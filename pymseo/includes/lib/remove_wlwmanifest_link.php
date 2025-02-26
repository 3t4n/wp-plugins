<?php
// REMOVE wlwmanifest Link
// <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="/wp-includes/wlwmanifest.xml" /> 
remove_action( 'wp_head', 'wlwmanifest_link');
?>