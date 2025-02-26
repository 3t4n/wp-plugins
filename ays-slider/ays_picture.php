<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
   header('Content-Type: image/jpeg');
   include('ays_pictureClass.php');
   $image = new AysSimpleResizeImage();
   $image->load($_GET['url']);
   if(isset($_GET['width']) and isset($_GET['height']))
   	{
   		if( $_GET['width'] / $image->getWidth() < $_GET['height'] / $image->getHeight())
			{
   				$image->resizeToWidth($_GET['width']);
			}
		else
			{
   				$image->resizeToHeight($_GET['height']);
			}
   	}
	else
	{
		if(isset($_GET['width']))
			{
   				$image->resizeToWidth($_GET['width']);
			}
		else
			{
   				$image->resizeToHeight($_GET['height']);
			}
	}
   $image->output();
?>
