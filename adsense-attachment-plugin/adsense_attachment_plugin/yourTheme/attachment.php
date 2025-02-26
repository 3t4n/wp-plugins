<?php 
 $size = $_GET['size'];
 if ($size == 'xxl') {
 	$niz = null;
 	include "attachment/large_image.php";
 } else { 
 	include "attachment/thumbnail.php";
 }

?>