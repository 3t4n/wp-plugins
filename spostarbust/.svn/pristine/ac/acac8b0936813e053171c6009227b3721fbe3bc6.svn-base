<?php
$img_src = 'SPOSTARBUST-16x16.gif';
if (file_exists($img_src)) {
	$imageInfo = getimagesize($img_src);
	//print_r($imageInfo);
	header("Content-type: ".$imageInfo['mime']);
	$img = @imagecreatefromgif($img_src);
	imagegif($img);
	imagedestroy($img);
} else echo $img_src.' not found!';
?>
