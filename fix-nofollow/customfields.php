<?php
include("functions.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$c = explode("\n", get_option('fixnf_custom_fields'));
$max_per_page = 5000;
$current_page = isset($_REQUEST['pageno'])? $_REQUEST['pageno'] : 1;
$offset = ($current_page - 1) * $max_per_page;
$fixnf_data = scan_custom_fields($c, array('numberposts'=>$max_per_page, 'offset'=>$offset));

$total = $fixnf_data['total'];
$fixnf_data = $fixnf_data['links'];
$pagination = true;
$title = "External Links within Post Custom Fields";
include("display.php")
?>