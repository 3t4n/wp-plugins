<?php 

// http://www.tricksofit.com/2014/10/save-base64-encoded-image-to-file-using-php
function ReplaceImgSrcs_with_base64__ECFP($content) {
	$imgs = Grab_images_links_from_content__ECFP($content); $bases_data=array();
	foreach ($imgs as $imgUrl){
		//if linked image
		if ( substr($imgUrl,0,2) == '//' || substr($imgUrl,0,1) == '/' ||  substr($imgUrl,0,8) == 'https://' || substr($imgUrl,0,7) == 'http://' ) {
			$path = __DIR__ . '/temp_imgs';    if(!file_exists($path)) { mkdir($path, 0755, true); } 
			$imagename = get_filename_without_extension__ECFP(basename($imgUrl)).rand(1,111111);
			$res= save_image_on_local__ECFP($imgUrl, $path, $imagename );
				//$new_img_name_1 = $new_img_name.'__.jpg';
				//Convert_Images_To_JPG__ECFP($new_img_name ,$new_img_name_1, 90);
			$ext = $res['extns']; 
			$existing_img_name	= $path.'/'.$imagename.'.'.$ext;
			$new_extension		='jpg';  //pathinfo($existing_img_name, PATHINFO_EXTENSION);
			$new_extension_mime ='jpeg';  //pathinfo($existing_img_name, PATHINFO_EXTENSION);
			$new_filename		= $path.'/'.$imagename.'.'.	$new_extension;
			convertImageIntoJPG__ECFP($existing_img_name,  $new_filename, 80);
			resize_image__ECFP($new_filename, $new_filename, 500, 500);
			$new_each_cont= file_get_contents($new_filename) ;
			$base64_IMG = 'data:image/' . $new_extension_mime . ';base64,' . base64_encode($new_each_cont);
			
			//delete temp imgs
			if( !empty($existing_img_name) && file_exists($existing_img_name))	unlink($existing_img_name);
			if( !empty($new_filename) && file_exists($new_filename))			unlink($new_filename);
		}
		//if embedded image
		elseif( substr($imgUrl,0,5) == 'data:') {
			$base64_IMG = $imgUrl;
		}
		$content= str_replace( array('src=\''.$imgUrl.'\'', 'src="'.$imgUrl.'"',),  'src="'.$base64_IMG.'"', $content);     $bases_data[]=$base64_IMG;
	}
	return $content;
}

function save_image_on_local__ECFP($imgPath,$save_path,$imagename){
		if		(substr($imgPath,0,2) == '//' ){$imgPath = 'http:'.$imgPath; }
		elseif	(substr($imgPath,0,1) == '/' )	{$imgPath = 'http://'.$_SERVER['HTTP_HOST']; }
		
		//===========final check=========//
		//if remote file
		if (  substr($imgPath,0,8) == 'https://' || substr($imgPath,0,7) == 'http://' ){ 
			if (class_exists('finfo')) {
				$opts = array(	  
					'http'=>array('method'=>"GET",  'header'=>"Accept-language: en\r\n" . "Cookie: foo=bar\r\n")	
				); 
				$context = stream_context_create($opts);
				$each_cont=file_get_contents($imgPath, false, $context);   $file_info = new finfo(FILEINFO_MIME_TYPE); $mime_type = $file_info->buffer($each_cont);
			}
			else{
				$remot=get_remote_data__ECFP($imgPath,false, true);
				$each_cont	= $remot['data'];  $mime_type = $remot['info']['content_type'];
			}
		}
		//if local file
		else{
			$each_cont = file_get_contents($imgPath);
				$mime_type = pathinfo($imgPath, PATHINFO_EXTENSION);
		}
		$extension = basename($mime_type);
		$save_path_full=$save_path. '/'.$imagename.'.'.$extension;
		file_put_contents($save_path_full, $each_cont);
		return array('pathh'=>$save_path_full, 'extns'=> $extension, 'contt'=>$each_cont);
}


		
		
function Grab_images_links_from_content__ECFP($content){  	preg_match_all('/\<img(.*?)src\=[\'\"](.*?)[\'\"]/si',$content,$new);	return $new[2]; }

// quality is a value from 0 (worst) to 100 (best)
function convertImageIntoJPG__ECFP($originalImage, $output_location, $quality){
	$imageTmp=GetCreatedImageFromAnytype__ECFP($originalImage);
    imagejpeg($imageTmp,$output_location , $quality);
    imagedestroy($imageTmp);
	return $output_location;
}

		function Convert_Images_To_JPG__ECFP($originalImage, $outputImage, $quality){
			// jpg, png, gif or bmp?
			$ext = get_file_extension__ECFP($originalImage); 
			if (preg_match('/jpg|jpeg/i',$ext))		$imageTmp=imagecreatefromjpeg($originalImage);
			else if (preg_match('/png/i',$ext))		$imageTmp=imagecreatefrompng($originalImage);
			else if (preg_match('/gif/i',$ext))		$imageTmp=imagecreatefromgif($originalImage);
			else if (preg_match('/bmp/i',$ext))		$imageTmp=imagecreatefrombmp($originalImage);
			else
				return 0;

			// quality is a value from 0 (worst) to 100 (best)
			imagejpeg($imageTmp, $outputImage, $quality);
			imagedestroy($imageTmp);
			return 1;
		}


//if save location is set to false, then name will be FILENAME+"__resized"
function resize_image__ECFP($file_location, $save_location, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file_location);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height)	{ $width = ceil($width-($width*abs($r-$w/$h)));   } 
		else 					{ $height = ceil($height-($height*abs($r-$w/$h)));  }
        $newwidth = $w;      $newheight = $h;
    } 
	else {
        if ($w/$h > $r) { $newwidth = $h*$r;    $newheight = $h;  } 
		else 			{ $newheight = $w/$r;   $newwidth = $w;   }
    }
    $src = imagecreatefromjpeg($file_location);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		
	if($save_location==false) {  dirname($file_location).'/'.get_filename_without_extension__ECFP($file_location).'__RESIZED.'.get_file_extension__ECFP($file_location); }
	imagejpeg($dst, $save_location , 90);
    return array('resource'=>$dst,'filepath'=>$save_location);
}
 

function get_file_extension__ECFP($patth){$x=parse_url($patth);  return pathinfo($x['path'] , PATHINFO_EXTENSION); } 
function get_filename_without_extension__ECFP ($file_location){return pathinfo($file_location, PATHINFO_FILENAME); } 


function RotateImg__ECFP($IMGpathh){
	$source_img = imagecreatefromstring(file_get_contents($IMGpathh));
	$rotated_img = imagerotate($source_img, 90, 0); // rotate with angle 90 here
	$imageSave = imagejpeg($rotated_img, $IMGpathh, 90);
	imagedestroy($source_img);
}

function GetCreatedImageFromAnytype__ECFP($filepath){
    $ext = get_file_extension__ECFP($filepath); 
	if (preg_match('/jpg|jpeg/i',$ext))        $imageTmp=imagecreatefromjpeg($filepath);
    else if (preg_match('/png/i',$ext))        $imageTmp=imagecreatefrompng($filepath);
    else if (preg_match('/gif/i',$ext))        $imageTmp=imagecreatefromgif($filepath);
    else if (preg_match('/bmp/i',$ext))        $imageTmp=imagecreatefrombmp($filepath);
    else  return 0;
	return $imageTmp;
	
}

		
		
	
	




function get_remote_data__ECFP($url, $post_paramtrs=false,               $return_full_array=false) { $c = curl_init();curl_setopt($c, CURLOPT_URL, $url); curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); if($post_paramtrs){curl_setopt($c, CURLOPT_POST,TRUE); curl_setopt($c, CURLOPT_POSTFIELDS, "var1=bla&".$post_paramtrs );} curl_setopt($c, CURLOPT_SSL_VERIFYHOST,false);    curl_setopt($c, CURLOPT_SSL_VERIFYPEER,false); curl_setopt($c, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0");  curl_setopt($c, CURLOPT_COOKIE, 'CookieName1=Value;'); curl_setopt($c, CURLOPT_MAXREDIRS, 10);  $follow_allowed= ( ini_get('open_basedir') || ini_get('safe_mode')) ? false:true; if ($follow_allowed){curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1);} curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 9); curl_setopt($c, CURLOPT_REFERER, $url);  curl_setopt($c, CURLOPT_TIMEOUT, 60); curl_setopt($c, CURLOPT_AUTOREFERER, true);  curl_setopt($c, CURLOPT_ENCODING, 'gzip,deflate'); $data=curl_exec($c);$status=curl_getinfo($c);curl_close($c); preg_match('/(http(|s)):\/\/(.*?)\/(.*\/|)/si', $status['url'],$link);  $data=preg_replace('/(src|href|action)=(\'|\")((?!(http|https|javascript:|\/\/|\/)).*?)(\'|\")/si','$1=$2'.$link[0].'$3$4$5', $data);   $data=preg_replace('/(src|href|action)=(\'|\")((?!(http|https|javascript:|\/\/)).*?)(\'|\")/si','$1=$2'.$link[1].'://'.$link[3].'$3$4$5', $data);  if($status['http_code']==301 || $status['http_code']==302) { if (!$follow_allowed){  if(empty($redirURL)){if(!empty($status['redirect_url'])){$redirURL=$status['redirect_url'];}}  if(empty($redirURL)){preg_match('/(Location:|URI:)(.*?)(\r|\n)/si', $data, $m);    if (!empty($m[2])){ $redirURL=$m[2]; } }  if(empty($redirURL)){preg_match('/moved\s\<a(.*?)href\=\"(.*?)\"(.*?)here\<\/a\>/si',$data,$m); if (!empty($m[1])){ $redirURL=$m[1]; } }  if(!empty($redirURL)){$t=debug_backtrace(); return call_user_func( $t[0]["function"], trim($redirURL), $post_paramtrs);} } } elseif ( $status['http_code'] != 200 ) { $data = "ERRORCODE22 with $url!!<br/>Last status codes:".json_encode($status)."<br/><br/>Last data got:$data";} return ( $return_full_array ? array('data'=>$data,'info'=>$status) : $data);}

?>