<?php

require_once("../../../../wp-config.php");
global $fueto_options;

$proxy = 0;

if (!empty($_GET["sp"]) && $_GET["sp"] == 1)
{
    $proxy = 1;
}

fueto_socialproxy( get_bloginfo( 'wpurl' ), $proxy );
?>