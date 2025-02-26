<?php
require_once("../../../../wp-config.php");

if (!empty($_GET['txt']))
{
    $txt = trim($_GET['txt']);

    if (strlen($txt) >= 3)
    {
        global $fueto_options;
        
        $str = fueto_autocomplete($txt);
        $str = fueto_utf8($str);

        print_r($str);
    }
    
}
?>