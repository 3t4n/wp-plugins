<?php
include("functions.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$exclude = get_option("fixnf_exclude_urls");
$exclude = explode("\n", $exclude);

$fixnf_data = scan_posts(array(), $exclude);
$title = "External Links within Post Content";
include("display.php")
?>
