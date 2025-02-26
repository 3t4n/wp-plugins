<?php

/**
 * If directly call exit the function
 */	
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
	}
/**
 * Activation the Plugin
 */
	function wp_media_count_run() {
	    add_option('wp_media_count_activation', true);
	}
/**
 * Include style CSS file
 */	
	function wp_media_count_stylesheet() 
	{
	    wp_enqueue_style( 'myCSS', plugins_url( 'style.css', __FILE__ ) );
	}
	add_action('admin_enqueue_scripts', 'wp_media_count_stylesheet');
	
/**
 * Get the media types and display the files count
 */		
	function wp_media_count_table() {
	
	   global $wpmc_size, $wpmc_total, $wpdb;	
	   $wpmc_jpeg_count = wpmc_jpeg($wpmc_size); 
	   $wpmc_png_count = wpmc_png($wpmc_size); 
	   $wpmc_webp_count = wpmc_webp($wpmc_size); 
	   $wpmc_ico_count = wpmc_ico($wpmc_size); 
	   $wpmc_pdf_count = wpmc_pdf($wpmc_size); 
	   $wpmc_docx_count = wpmc_docx($wpmc_size);  	
	   $wpmc_doc_count = wpmc_doc($wpmc_size);  	
	   $wpmc_csv_count = wpmc_csv($wpmc_size);
	   $wpmc_xls_count = wpmc_xls($wpmc_size);
	   $wpmc_text_count = wpmc_text($wpmc_size);
	   $wpmc_ppt_count = wpmc_ppt($wpmc_size);
	   $wpmc_pptx_count = wpmc_pptx($wpmc_size);
	   $wpmc_odt_count = wpmc_odt($wpmc_size);
	   $wpmc_zip_count = wpmc_zip($wpmc_size);
	   $wpmc_tar_count = wpmc_tar($wpmc_size);
	   $wpmc_psd_count = wpmc_psd($wpmc_size);
	   $wpmc_gif_count = wpmc_gif($wpmc_size);
	   $wpmc_svg_count = wpmc_svg($wpmc_size);
	   $wpmc_bmp_count = wpmc_bmp($wpmc_size);
	   $wpmc_tiff_count = wpmc_tiff($wpmc_size);
	   $wpmc_mp4_count = wpmc_mp4($wpmc_size);
	   $wpmc_mp3_count = wpmc_mp3($wpmc_size);
	   $wpmc_wav_count = wpmc_wav($wpmc_size);
	   $wpmc_mov_count = wpmc_mov($wpmc_size);
	   $wpmc_mkv_count = wpmc_mkv($wpmc_size);
	   $wpmc_ogg_count = wpmc_ogg($wpmc_size);
	   $wpmc_avi_count = wpmc_avi($wpmc_size);
	   $wpmc_gp3_count = wpmc_gp3($wpmc_size);
	   $wpmc_directory = get_home_path();
	   $wpmc_result = get_dirsize( $wpmc_directory );
	   $wpmc_toal_size = number_format( $wpmc_result / ( 1024 * 1024 ), 1 ) . ' MB'; 
	   $wpmc_total_images = wpmc_totalimages($wpmc_size);
        ?>

	   <div class="row">
	   <div class="container">
	   <div class="wp_media_count_head">
	   <h2> Media Library Count </h2> 
	   <div class="wp_media_counts">
   
	   <?php
	   echo "<table id='wp_media_count'> 
	  <tr>
	    <th>All Images Format</th>
	    <th>No.of Files </th>
	    </tr>
	   <tr>
	    <td> JPEG</td>
	    <td>{$wpmc_jpeg_count}</td>
	   </tr>
	   <tr>
	    <td> PNG</td>
	    <td>{$wpmc_png_count}</td>
	   </tr>
	   <tr>
	    <td>WEBP</td>
	    <td>{$wpmc_webp_count}</td>  
	   </tr>
	   <tr>
	    <td> GIF</td>
	    <td>{$wpmc_gif_count}</td>  
	   </tr>
	   <tr>
	    <td> PSD</td>
	    <td>{$wpmc_psd_count}</td>  
	   </tr>
	   <tr>
	   <tr>
	    <td>ICO </td>
	    <td>{$wpmc_ico_count}</td>  
	  </tr>
	  <tr>
	    <td>SVG</td>
	    <td>{$wpmc_svg_count}</td>  
	  </tr>
	    <tr>
	    <td>BMP</td>
	    <td>{$wpmc_bmp_count}</td>  
	   </tr>
	  <tr>
	    <td>TIFF</td>
	    <td>{$wpmc_tiff_count}</td>  
	   </tr>
	</table>

	<table id='wp_media_file_count'> 
	  <tr>
	    <th> All Files Format</th>
	    <th>No.of Files </th>
	  
	  </tr>
	 <tr>
	    <td> DOCX</td>
	    <td>{$wpmc_docx_count}</td>  
	  </tr>
	  <tr>
	    <td> DOC</td>
	    <td>{$wpmc_doc_count}</td>  
	  </tr>
	   <tr>
	    <td>CSV</td>
	    <td>{$wpmc_csv_count}</td>  
	  </tr>
	  <tr>
	    <td> XLS</td>
	    <td>{$wpmc_xls_count}</td>  
	  </tr>
	    <tr>
	    <td>TEXT</td>
	    <td>{$wpmc_text_count}</td>  
	  </tr>
	  <tr>
	   <td> PDF</td>
	    <td>{$wpmc_pdf_count}</td> 
	  </tr>
	   <tr>
	    <td>PPT</td>
	    <td>{$wpmc_ppt_count}</td>  
	  </tr>
	   <tr>
	    <td>PPTX</td>
	    <td>{$wpmc_pptx_count}</td>  
	  </tr>
	   <tr>
	    <td> ODT</td>
	    <td>{$wpmc_odt_count}</td>  
	  </tr>
	   <tr>
	    <td>ZIP</td>
	    <td>{$wpmc_zip_count}</td>  
	  </tr>
	     <tr>
	    <td>TAR</td>
	    <td>{$wpmc_tar_count}</td>  
	  </tr>
	  </table>

	    <table id='wp_media_audio_count'> 
	    <tr>
	    <th> Audio & Video File Format</th>
	    <th>No.of Files </th>
	     </tr>
	     <tr>
	    <td> MP4</td>
	    <td>{$wpmc_mp4_count}</td>  
	  </tr>
	  <tr>
	    <td> MP3</td>
	    <td>{$wpmc_mp3_count}</td>  
	  </tr>
	   <tr>
	    <td> WAV</td>
	    <td>{$wpmc_wav_count}</td>  
	  </tr>
	   <tr>
	    <td> MOV</td>
	    <td>{$wpmc_mov_count}</td>  
	  </tr>
  
	  <tr>
	    <td> MKV</td>
	    <td>{$wpmc_mkv_count}</td>  
	  </tr>
	    <tr>
	    <td> OGG</td>
	    <td>{$wpmc_ogg_count}</td>  
	  </tr>
	   <tr>
	    <td> AVI</td>
	    <td>{$wpmc_avi_count}</td>  
	  </tr>
	    <tr>
	    <td> 3GP</td>
	    <td>{$wpmc_gp3_count}</td>  
	  </tr>
	</table>


	<table id='wp_media_count_total_size'> 
	  <tr>
	    <th> Total No.of Media Files - {$wpmc_total_images}</th>
	    <th>Total Upload Media Size -  {$wpmc_toal_size}  </th>
	  </tr>
	</table>

	</div></div></div></div> <br>";

	?>
	<?php } 
	?>	


	<?php 

	function wpmc_jpeg($wpmc_size){ 
	 $query_jpeg_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'image/jpeg',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_jpeg = new WP_Query( $query_jpeg_args ); 
	 $wpmc_size = $query_jpeg->post_count; 
	 return $wpmc_size;
	}	
	
	function wpmc_png($wpmc_size){ 
	 $query_png_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'image/png',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_png = new WP_Query( $query_png_args ); 
	 $wpmc_size = $query_png->post_count; 
	 return $wpmc_size;
	}	

	function wpmc_webp($wpmc_size){ 
	 $query_webp_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'image/webp',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_webp = new WP_Query( $query_webp_args ); 
	 $wpmc_size = $query_webp->post_count; 
	 return $wpmc_size;
	}

	function wpmc_psd($wpmc_size){ 
	 $query_psd_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'image/vnd.adobe.photoshop',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_psd = new WP_Query( $query_psd_args ); 
	  $wpmc_size = $query_psd->post_count; 
	 return $wpmc_size;
	}

	function wpmc_gif($wpmc_size){ 
	 $query_gif_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'image/gif',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_gif = new WP_Query( $query_gif_args ); 
	  $wpmc_size = $query_gif->post_count; 
	 return $wpmc_size;
	}

	function wpmc_ico($wpmc_size){ 
	 $query_ico_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'image/vnd.microsoft.icon, image/x-icon',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_ico = new WP_Query( $query_ico_args ); 
	 $wpmc_size = $query_ico->post_count; 
	 return $wpmc_size;
	}

	function wpmc_svg($wpmc_size){ 
	 $query_svg_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'image/svg+xml',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_svg = new WP_Query( $query_svg_args ); 
	 $wpmc_size = $query_svg->post_count; 
	 return $wpmc_size;
	}

	function wpmc_bmp($wpmc_size){ 
	 $query_bmp_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'image/bmp',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_bmp = new WP_Query( $query_bmp_args ); 
	 $wpmc_size = $query_bmp->post_count; 
	 return $wpmc_size;
	}

	function wpmc_tiff($wpmc_size){ 
	 $query_tiff_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'image/tiff',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_tiff = new WP_Query( $query_tiff_args ); 
	 $wpmc_size = $query_tiff->post_count; 
	 return $wpmc_size;
	}

	 function wpmc_pdf($wpmc_size){ 
	 $query_pdf_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'application/pdf',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_pdf = new WP_Query( $query_pdf_args ); 
	 $wpmc_size = $query_pdf->post_count; 
	 return $wpmc_size;
	}

	function wpmc_docx($wpmc_size){ 
	 $query_docx_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_docx = new WP_Query( $query_docx_args ); 
	  $wpmc_size = $query_docx->post_count; 
	 return $wpmc_size;
	}
	function wpmc_doc($wpmc_size){ 
	 $query_doc_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'application/msword',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_doc = new WP_Query( $query_doc_args ); 
	  $wpmc_size = $query_doc->post_count; 
	 return $wpmc_size;

	}

	function wpmc_csv($wpmc_size){ 
	 $query_csv_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'text/csv',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_csv = new WP_Query( $query_csv_args ); 
	  $wpmc_size = $query_csv->post_count; 
	 return $wpmc_size;
	}

	function wpmc_xls($wpmc_size){ 
	 $query_xls_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'application/vnd.ms-excel',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_xls = new WP_Query( $query_xls_args ); 
	  $wpmc_size = $query_xls->post_count; 
	 return $wpmc_size;
	}

	function wpmc_text($wpmc_size){ 
	 $query_text_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'text/plain',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_text = new WP_Query( $query_text_args ); 
	 $wpmc_size = $query_text->post_count; 
	 return $wpmc_size;
	}

	function wpmc_ppt($wpmc_size){ 
	 $query_ppt_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'application/mspowerpoint, application/powerpoint, application/vnd.ms-powerpoint, application/x-mspowerpoint', 
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_ppt = new WP_Query( $query_ppt_args ); 
	  $wpmc_size = $query_ppt->post_count; 
	 return $wpmc_size;
	}

	function wpmc_pptx($wpmc_size){ 
	 $query_pptx_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'application/vnd.openxmlformats-officedocument.presentationml.presentation',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_pptx = new WP_Query( $query_pptx_args ); 
	  $wpmc_size = $query_pptx->post_count; 
	 return $wpmc_size;
	}

	function wpmc_odt($wpmc_size){ 
	 $query_odt_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'application/vnd.oasis.opendocument.text',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_odt = new WP_Query( $query_odt_args ); 
	  $wpmc_size = $query_odt->post_count; 
	 return $wpmc_size;
	}

	function wpmc_zip($wpmc_size){ 
	 $query_zip_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'application/zip',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_zip = new WP_Query( $query_zip_args ); 
	  $wpmc_size = $query_zip->post_count; 
	 return $wpmc_size;
	}

	function wpmc_tar($wpmc_size){ 
	 $query_tar_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'application/gzip',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_tar = new WP_Query( $query_tar_args ); 
	  $wpmc_size = $query_tar->post_count; 
	 return $wpmc_size;
	}

	function wpmc_mp4($wpmc_size){ 
	 $query_mp4_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'video/mp4',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_mp4 = new WP_Query( $query_mp4_args ); 
	  $wpmc_size = $query_mp4->post_count; 
	 return $wpmc_size;
	}

	function wpmc_mp3($wpmc_size){ 
	 $query_mp3_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'audio/mpeg',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_mp3 = new WP_Query( $query_mp3_args ); 
	  $wpmc_size = $query_mp3->post_count; 
	 return $wpmc_size;
	}

	function wpmc_wav($wpmc_size){ 
	 $query_wav_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'audio/wav',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_wav = new WP_Query( $query_wav_args ); 
	 $wpmc_size = $query_wav->post_count; 
	 return $wpmc_size;
	}

	function wpmc_mov($wpmc_size){ 
	 $query_mov_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'video/quicktime',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_mov = new WP_Query( $query_mov_args ); 
	 $wpmc_size = $query_mov->post_count; 
	 return $wpmc_size;
	}

	function wpmc_mkv($wpmc_size){ 
	 $query_mkv_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'video/x-matroska',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_mkv = new WP_Query( $query_mkv_args ); 
	 $wpmc_size = $query_mkv->post_count; 
	 return $wpmc_size;
	}

	function wpmc_ogg($wpmc_size){ 
	 $query_ogg_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'audio/ogg, video/ogg',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_ogg = new WP_Query( $query_ogg_args ); 
	 $wpmc_size = $query_ogg->post_count; 
	 return $wpmc_size;
	}

	function wpmc_avi($wpmc_size){ 
	 $query_avi_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'video/avi',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_avi = new WP_Query( $query_avi_args ); 
	 $wpmc_size = $query_avi->post_count; 
	 return $wpmc_size;
	}

	function wpmc_gp3($wpmc_size){ 
	 $query_gp3_args = array(
		    'post_type' => 'attachment',
		    'post_mime_type' =>'video/3gpp',
		    'post_status' => 'inherit',
		    'posts_per_page' => -1,
		    );
	 $query_gp3 = new WP_Query( $query_gp3_args ); 
	 $wpmc_size = $query_gp3->post_count; 
	 return $wpmc_size;
	}
	
	function wpmc_totalimages($wpmc_size){ 
	 $query_img_args = array(  
	    'post_type' => 'attachment',  
	    'post_status' => 'inherit',  
	    'posts_per_page' => -1,  
	    );      
	  $query_img = new WP_Query( $query_img_args );  
	  $wpmc_size = $query_img->post_count;
	 return $wpmc_size;
	}
?>

