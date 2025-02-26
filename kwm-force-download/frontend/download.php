<?php
add_action('template_redirect','kwm_force_download');
function kwm_force_download() {
	
	$arrayUrl = explode('/', $_SERVER['REQUEST_URI']);

	$options = get_option('kwm_force_download');
		
	$kwmurlDownload = 'downloads';
	if($options['urlDownload'] != ''){
		$kwmurlDownload = $options['urlDownload'];
	}

	if(in_array($kwmurlDownload, $arrayUrl) && is_numeric(end($arrayUrl)) == 1){
		
		if(is_numeric(end($arrayUrl)) == 1){
			//o id da imagem
			$idImage = end($arrayUrl);
		}

		if ($idImage) {
			$urlTheImage = wp_get_attachment_metadata($idImage);

			if($urlTheImage == true){
				
				$urlArquivo =  ABSPATH.'wp-content/uploads/'.$urlTheImage['file'];
				
				if(is_file($urlArquivo)){
					
					$mime_types = array(//images
										'.png'	=> 'image/png',
										'.jpe'	=> 'image/jpeg',
										'.jpeg' => 'image/jpeg',
										'.jpg'	=> 'image/jpeg',
										'.gif'	=> 'image/gif',
										'.bmp'	=> 'image/bmp',
										'.ico'	=> 'image/vnd.microsoft.icon',
										'.tiff' => 'image/tiff',
										'.tif'	=> 'image/tiff',
										'.svg'	=> 'image/svg+xml',
										'.svgz' => 'image/svg+xml',
										//arquvios de programa geral
										'.flv' => 'video/x-flv',
										'.mp4' => 'video/mp4',
										'.m3u8' => 'application/x-mpegURL',
										'.ts' => 'video/MP2T',
										'.3gp' => 'video/3gpp',
										'.mov' => 'video/quicktime',
										'.avi' => 'video/x-msvideo',
										'.wmv' => 'video/x-ms-wmv',
										//videos
										'.pdf' => 'application/pdf',
										'.swf' => 'application/x-shockwave-flash',
										'.torrent' => 'application/x-bittorrent',
										'.zip' => 'application/zip',
										'.rar' => 'application/x-rar-compressed',
										'.docm' => 'application/vnd.ms-word.document.macroenabled.12',
										'.dotm' => 'application/vnd.ms-word.template.macroenabled.12',
										'.potm' => 'application/vnd.ms-powerpoint.template.macroenabled.12',
										'.docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
										'.dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
										'.obd' => 'application/x-msbinder',
										'.thmx' => 'application/vnd.ms-officetheme',
										'.onetoc' => 'application/onenote',
										'.mdb' => 'application/x-msaccess',
										'.asf' => 'video/x-ms-asf',
										'.exe' => 'application/x-msdownload',
										'.cil' => 'application/vnd.ms-artgalry',
										'.cab' => 'application/vnd.ms-cab-compressed',
										'.ims' => 'application/vnd.ms-ims',
										'.application' => 'application/x-ms-application',
										'.clp' => 'application/x-msclip',
										'.mdi' => 'image/vnd.ms-modi',
										'.eot' => 'application/vnd.ms-fontobject',
										'.xls' => 'application/vnd.ms-excel',
										'.xlam' => 'application/vnd.ms-excel.addin.macroenabled.12',
										'.xlsb' => 'application/vnd.ms-excel.sheet.binary.macroenabled.12',
										'.xltm' => 'application/vnd.ms-excel.template.macroenabled.12',
										'.xlsm' => 'application/vnd.ms-excel.sheet.macroenabled.12',
										'.chm' => 'application/vnd.ms-htmlhelp',
										'.psd' => 'image/vnd.adobe.photoshop'
										);
					
					$extension = strrchr(basename($urlArquivo), "." );
					$type = 'image/jpeg';
					if(isset($mime_types[$extension]))
					{
						$type = $mime_types[$extension];
						header("Content-type: $type",true,200);
					    header("Content-Disposition: attachment; filename=".basename($urlArquivo));
					    header("Pragma: no-cache");
					    header("Expires: 0");
					    readfile($urlArquivo);
					}
				}else{
					exit();
				}
	    	}else{
	    		global $wp_query;
			    $wp_query->set_404();
			    status_header(404);
	    	}
	  	}
  	}
}

?>