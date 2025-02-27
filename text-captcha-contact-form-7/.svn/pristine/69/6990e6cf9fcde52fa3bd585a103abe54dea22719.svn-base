<?php

	
	$width = 200;
	$height = 50;
	$font_size = 14;
	$font = "./Verdana.ttf";
	$font = realpath($font);
	$chars_length = 6;

	$captcha_characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	$image = imagecreatetruecolor($width, $height);
	$bg_color = imagecolorallocate($image, 144, 0, 0);
	$font_color = imagecolorallocate($image, 255, 255, 255);
	imagefilledrectangle($image, 0, 0, $width, $height, $bg_color);

	//background random-line
	$vert_line = round($width/20);
	$color = imagecolorallocate($image, 255, 255, 255);
	for($i=0; $i < $vert_line; $i++) {
		imageline($image, rand(0,$width), rand(0,$height), rand(0,$height), rand(0,$width), $color);
	}

	$xw = ($width/$chars_length);
	$x = 0;
	$font_gap = $xw/2-$font_size/2;
	$digit = '';
	for($i = 0; $i < $chars_length; $i++) {
		$letter = $captcha_characters[rand(0, strlen($captcha_characters)-1)];
		$digit .= $letter;
		if ($i == 0) {
			$x = 0;
		}else {
			$x = $xw*$i;
		}
		imagettftext($image, $font_size, rand(-20,20), $x+$font_gap, rand(22, $height-5), $font_color, $font, $letter);
	}

    $cookie_name = "cf7_captchainput_";
    setcookie($cookie_name,'', time() -3600, "/");
    setcookie($cookie_name, md5($digit), time() + (1200 * 30), "/"); 
	// display image
	header('Content-Type: image/png');
	imagepng($image);
	imagedestroy($image);
?>
