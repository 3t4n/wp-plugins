<?php
/*
Plugin: Security Captcha
URL: http://0x90.com.ar
Descripcion: Security Captcha es un sistema para prevenir spam de cualquier tito, tanto por personas como por scripts creados por personas. 
Autor: 0x90 Security Labs!
Version: 1.1
*/
$id=$_GET['id']; 
switch ($id) 
 { 
    case 1: 
    //Start reload IMG
    header("Content-type: image/png");
    header("Content-length: 1331");
    echo base64_decode(
'iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAGX'.
'RFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABNVJ'.
'REFUeNqclXuIVFUcx7/n3MfM3Lszu87suuOjxNXV1keFuCgSEW'.
'gaBIYsBmFgRUH/RP1jf/RHfwRhaRDlH60FElQoEVSUUX8kUmY+'.
't1ZdNd0F3W3bHWfnsTt35r7OPaffzJRGRtSey7kPzuFzfr/v73'.
'GZUgqzGU9sWPBbqSpyE2NTG1pTzA36NBRGBDruSWGmEoBjluPu'.
'7kzq3YPv37soa5/0Q5nWoKDTNCBoRrMHx91C1Jnh2Pf2i6t77k'.
'wO1CDvaCxw1niwuhTf7X0oslgVuiYb09AluB5BYxFYfZ+SDDKE'.
'CgVEoOC5Ug2PqnDzIw/FdJ1jKlfA3sGvC19cLd+3dKl1ucwjTa'.
'/TFZN87YqFiJgHLS4Awwc0j6ZGR5u0geIgqoA7DdToWQ1YW+eS'.
'WOX6WbjVAKau4VljQSYwvFPnx8TGUx/7p/XZSpEOL6JcCCFmIh'.
'TLsqHp4zpLfumwH+jVbIDL135BPnUXxNQADLK2rY0ksRNAy1wS'.
'M02WW2Q1zVACPnnjlpEg60NXwa0BATmRKwKJgGCeadSZDXBQLi'.
'CcKSK4MQW91YQbxmBJHRonmDmHpGmloFDMeUCqZCC8BGQshVTi'.
'VwQViRLFgdN5B0pcDa3Q3tn9J1hSijCuYNNXKmPj0LeVG3OTAY'.
'ldAMOgdrsQ3DJak4mN65foGTmCMJL4oGTKgR3imZGn3UF89AeY'.
'awx6HZoEYm1tuF4undv5efjgv2l8fFfawcJ1Oq/VcCDnSv+trv'.
'6x4QHR/lzqKVo+2wRzCIPgpmWS2Vnmt49PPnZ5+7h32mlftjgZ'.
'e/XIZ2hERwgElG7WypWkTpqhpRt7zhyOYm9uG8zVRlfpoVyrz9'.
'HabmosJRyNa5LFLC+IzefRC+H2rcu3xY6MfRWypRlsjC2DSTHR'.
'Ka1s7qD/KIMohurkoX73WKu2d7lh7QqqNaiIYFqT2bj5AuMGtx'.
'yHgvVaYro3XLGBT7MJ5PxJ9V72QyD7Nx16gHbKmfrrld1de7rL'.
'04lKpYKIUl8FzS0NcL4sj+al2fUS9zbPyfbwocljaEk8AL/i6L'.
'1v9BQYZzpj7Ca30bakihTlSIqZpZCaTqlUhhiiNecvYNlqa09e'.
'Ortl4ZZt/JMLBzC3sxN5O4+++x/lum2mrYQFi1lU4joiJeEpDx'.
'Ui+J4LMemlR/yryOeLUCWCVXGrV2x6vlfOW9PLrlw7AZmlIuhU'.
'4Ck6tYMj1qKDx8hGkyymPhLS5ZPPruuhVnFRrfiYGavBH40QHQ'.
'c6jBRyB6dZw+LacCGcmDdqZuwsvKKLgIQKQh9eEMC3qfHYAUTC'.
'RxQnLBWJVIIKkDLEp/VaBEG2cEEFRAdrzcJrSrGJuas+PXTsp2'.
'TfejthUl7lZcOlTLYd+RsTUtm0MU5ZQR3A4CYVVARTELAOdwTC'.
'aQkpFHwzRDyM35KiHpjtazA/p7WeN7euTUcmWeT6KDtT0cwFp0'.
'Tlx/65TFQzkgrN/xDd6lvHvpnouAmuj5cfNtL7L5vnenb0LuDU'.
'Ii4OnPONpBG3ew0wremfotJvXOR/FNCsUUNwyGJHIaIulwnaMb'.
'R/uPkHeX3rIvSt0/HK4bAYN/3uH/tPXMGMghaaTBYYqt9H9cT/'.
'X+O2fnz9knD1LF99at+Zn7tWL56HZpcCG2cIdpb+M/h3AQYANk'.
'VI+jP6NlwAAAAASUVORK5CYII='.
'');
//End Reload IMG
        break;     
    default: 
header("Expires: Mon, 23 Jul 1993 05:00:00 GMT");
header("Last-Modified: Mon, 23 Jul 1993 05:00:00 GMT");// HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);// HTTP/1.0
header("Pragma: no-cache");
header("Content-type: image/png");

$str = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

session_start();
session_unregister("secret");
$_SESSION['secret'] = md5($str);

$switch = rand(1, 4);

if($switch==1) {
	$r = rand(57, 62);
	$g = rand(122, 128);
	$b = rand(217, 223);
}
if($switch==2) { 
	$r = rand(207, 213);
	$g = rand(97, 103);
	$b = rand(97, 103);
}
if($switch==3) {
	$r = rand(27, 33);
	$g = rand(192, 198);
	$b = rand(47, 53);
}
if($switch==4) {
	$r = rand(187, 193);
	$g = rand(187, 193);
	$b = rand(17, 23);
}

$img = @imagecreatefrompng('imagen_' . $switch . '.png');

$canvas = imagecreatetruecolor( 96, 24);
imagecopyresampled($canvas, $img, 0, 0, 0, 0, 96, 24, 63, 18);

$col = imagecolorallocate($img, $r, $g, $b);
imagestring($img, 14, 5, 1, $str, $col);

$dst = imagecreatetruecolor( 96, 24);
imagecopyresampled($dst, $img, 0, 0, 0, 0, 96, 24, 63, 18);

$offset = rand(0, 30);
$graph = true;
for($i = 1; $i <= 96; $i++) {
	
	if( $offset > 0 && !$graph ) {
		$offset--;
	}
	else {
		$graph = true;
	}
	
	if( $offset < 30 && $graph ) {
		$offset++;
	}
	else {
		$graph = false;
	}
	
	$sin = sin($offset * 6) * 2;
	
	imagecopy($canvas, $dst, $i, 4 + $sin, $i, 4, 3, 16);
}

$col2 = imagecolorallocate($canvas, $r, $g, $b);
imagerectangle($canvas, 0, 0, 95, 23, $col2);
imagepng($canvas);
imagedestroy($canvas);
        break; 
 } 
?>