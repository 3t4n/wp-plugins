<?php

 error_reporting(E_ERROR | E_WARNING | E_PARSE);
function admonpedidosservientrega_descargarStickerZip(){
 include "Utilidades.php";
 include "ServiciosWeb.inc";
 

$Guias=admonpedidosservientrega_SanitizeArrays(isset($_POST["Guias"]) ? (array) $_POST["Guias"] : array());

  
  
      
          $nombreZip="etiquetas".date('YmdHis').".zip";
		  
     	  //$zip = new PclZip('stickers/'.$nombreZip );
		  touch(dirname(__FILE__).'/stickers/'.$nombreZip);
		  $zip=new ZipArchive();
		  $zip->open(dirname(__FILE__).'/stickers/'.$nombreZip,ZipArchive::CREATE);
     	  
		  
		  
     	  $archivos="";
     	  for($i=0;$i<count($Guias);$i++)
          {
            if(empty($Guias[$i])) continue;
            $archivos=dirname(__FILE__).'/stickers/'.$Guias[$i].'sticker.pdf';
            
			
			
            $zip->addFile($archivos,$Guias[$i].'sticker.pdf');    
          }
         
     	 
		  $pathDownload=plugin_dir_url(__FILE__).'stickers/';
		  
		 
     	  
		   
          
		
		  $zip->close();
		  
		?>  
         <a href='<?php echo esc_url($pathDownload.$nombreZip) ?>' class='btn btn-rounded'> Descargar ZIP</a>
 <?php                
     }