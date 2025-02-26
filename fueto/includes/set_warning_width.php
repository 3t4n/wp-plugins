<?php

require_once("../../../../wp-config.php");

if( isset( $_GET['params'] ) )
{
    $elements = strip_tags($_GET['params']);
    fueto_set_warning($elements);
}
?>