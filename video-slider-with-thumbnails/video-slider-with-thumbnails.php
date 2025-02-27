<?php
/*
 * Plugin Name: Video Slider With Thumbnails
 * Plugin URI:http://www.i13websolution.com/wordpress-video-slider-plugin-pro.html
 * Author URI:http://www.i13websolution.com
 * Description:This is beautiful responsive video slider plugin.Add any number of images,video from admin panel.your video slider will be ready within few min. 
 * Author:I Thirteen Web Solution 
 * Version:1.0
 * Text Domain:video-slider-with-thumbnails
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

$dir = plugin_dir_path( __FILE__ );
$dir=str_replace("\\","/",$dir);
if(!class_exists('vgwt_resize')){
    require_once($dir.'classes/vgwt.class.Images.php');
}
add_filter ( 'widget_text', 'do_shortcode' );
add_action ( 'admin_menu', 'vgwt_responsive_gallery__add_admin_menu' );

register_activation_hook ( __FILE__, 'vgwt_install_responsive_gallery' );
add_action ( 'wp_enqueue_scripts', 'vgwt_responsive_gallery__load_styles_and_js' );
add_shortcode ( 'vgwt_print_responsive_video_slider_with_thumbnail', 'vgwt_print_responsive_video_slider_with_thumbnail_func' );
add_action ( 'admin_notices', 'vgwt_responsive_gallery__admin_notices' );

add_action( 'wp_ajax_vgwt_check_file_exist_gallery', 'vgwt_check_file_exist_gallery_callback' );
add_action( 'wp_ajax_vgwt_get_youtube_info_gallery', 'vgwt_get_youtube_info_gallery_callback' );
add_action( 'wp_ajax_vgwt_get_metacafe_info_gallery', 'vgwt_get_metacafe_info_gallery_callback' );

add_action('wp_ajax_vgwt_get_grid_data_gallery', 'vgwt_get_grid_data_gallery_callback');
add_action('wp_ajax_nopriv_vgwt_get_grid_data_gallery', 'vgwt_get_grid_data_gallery_callback');
add_action('plugins_loaded', 'vgwt_lang_for_responsive_video_thumbnail_gallery');

function vgwt_lang_for_responsive_video_thumbnail_gallery() {
            
            load_plugin_textdomain( 'video-slider-with-thumbnails', false, basename( dirname( __FILE__ ) ) . '/languages/' );
    }

function vgwt_save_image_remote($url,$saveto){
    
    $raw = wp_remote_retrieve_body( wp_remote_get( $url ) );
    
    if(file_exists($saveto)){
        @unlink($saveto);
    }
    $fp = @fopen($saveto,'x');
    @fwrite($fp, $raw);
    @fclose($fp);
}



function vgwt_get_youtube_info_gallery_callback(){
  
         if(isset($_POST) and is_array($_POST) and  isset($_POST['url'])){
        

                $retrieved_nonce = '';

               if (isset($_POST['vNonce']) and $_POST['vNonce'] != '') {

                   $retrieved_nonce = $_POST['vNonce'];
               }
               if (!wp_verify_nonce($retrieved_nonce, 'vNonce')) {


                   wp_die('Security check fail');
               }

        
                $vid=sanitize_text_field($_POST['vid']);
                $url=$_POST['url']; 
            	
                $output=  wp_remote_retrieve_body( wp_remote_get( $url ) ); 

                $output=json_decode($output);
                

 
                $return=array();
                if(is_object($output)){
                   
                 $return['title']=sanitize_text_field($output->title);
                 $return['thumbnail_url']=sanitize_text_field($output->thumbnail_url);
                 
                 
               }
                
          echo json_encode($return);
          exit;
        
    }
    
}
function vgwt_check_file_exist_gallery_callback() {
	
	if(isset($_POST) and is_array($_POST) and  isset($_POST['url'])){

                
               $retrieved_nonce = '';

                if (isset($_POST['vNonce']) and $_POST['vNonce'] != '') {

                    $retrieved_nonce = $_POST['vNonce'];
                }
                    if (!wp_verify_nonce($retrieved_nonce, 'vNonce')) {


                    wp_die('Security check fail');
                }
                
                $response = wp_remote_get(sanitize_text_field($_POST['url']));
                $httpCode = wp_remote_retrieve_response_code( $response );
		
		echo trim((string)$httpCode);die;
		
	}
	//echo die;
	
}

function vgwt_i13_get_http_response_code_gallery($url) {
    $headers = @get_headers($url);
    return @substr($headers[0], 9, 3);
}

function vgwt_get_metacafe_info_gallery_callback() {
    
       if (isset($_POST) and is_array($_POST) and isset($_POST['url'])) {

        $retrieved_nonce = '';

        if (isset($_POST['vNonce']) and $_POST['vNonce'] != '') {

            $retrieved_nonce = $_POST['vNonce'];
        }
        if (!wp_verify_nonce($retrieved_nonce, 'vNonce')) {


            wp_die('Security check fail');
        }
        
        $videoUrl = trim(sanitize_text_field($_POST['url']));
        $pattern = "#(?<=watch/).*?(?=/)#";
        preg_match($pattern, $videoUrl, $matches, PREG_OFFSET_CAPTURE, 3);
        $vid = 0;
        if ($matches and is_array($matches)) {

            $vid = sanitize_text_field($matches[0][0]);
        }

        $pattern_title = "#(?<=$vid/).*?(?=/)#";
        preg_match($pattern_title, $videoUrl, $matches_title, PREG_OFFSET_CAPTURE, 3);

        $title_img = '';
        if ($matches_title and is_array($matches_title)) {

            $title_img = sanitize_text_field($matches_title[0][0]);
        }

        
        $trimed_vid=substr($vid, 0, -3);
        $trimed_vid=$trimed_vid.'000';
        //$imgUrl = "http://cdn.metacafe.com/thumb/{$vid}/0/6/videos/0/6/{$title_img}.jpg";
        $imgUrl = "http://cdn.metacafe.com/contents/videos_screenshots/{$trimed_vid}/{$vid}/400x225/3.jpg";
        
        if(vgwt_i13_get_http_response_code_gallery($imgUrl)!=200){
             $imgUrl = "http://cdn.metacafe.com/contents/videos_screenshots/{$trimed_vid}/{$vid}/400x225/1.jpg";
             if(vgwt_i13_get_http_response_code_gallery($imgUrl)!=200){
                 
                 $imgUrl = "http://cdn.metacafe.com/contents/videos_screenshots/{$trimed_vid}/{$vid}/180x135/3.jpg";
                 if(vgwt_i13_get_http_response_code_gallery($imgUrl)!=200){
                     
                      $imgUrl = "http://cdn.metacafe.com/contents/videos_screenshots/{$trimed_vid}/{$vid}/180x135/1.jpg";
                 }
                 
             }
            
        }
        
        
        $videoInfo = wp_remote_retrieve_body( wp_remote_get( $videoUrl ) ); 
        
        $doc = new DomDocument;

        $doc->validateOnParse = false;

        $doc->loadHTML($videoInfo);
        
        $xpath = new DOMXPath($doc);
        $title='';
        $classname="mc-media-info";
        $nodes = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]/h1");
         if(sizeof($nodes)>0){
                foreach($nodes as $nd){
                    $title= $nd->textContent;
                    break;
                }
         }
         
       
        

      

        $returnArray = array('vid' => $vid, 'HdnMediaSelection' => $imgUrl, "videotitle" => $title, 'videotitleurl' => $videoUrl);
        $returnArray = json_encode($returnArray);
        echo $returnArray;
        die;
    }
    echo die;
}

function vgwt_responsive_gallery__admin_notices() {
	if (is_plugin_active ( 'video-slider-with-thumbnails/video-slider-with-thumbnails.php' )) {
		
		$uploads = wp_upload_dir ();
		$baseDir = $uploads ['basedir'];
		$baseDir = str_replace ( "\\", "/", $baseDir );
		$pathToImagesFolder = $baseDir . '/video-slider-with-thumbnails';
		
		if (file_exists ( $pathToImagesFolder ) and is_dir ( $pathToImagesFolder )) {
			
			if (! is_writable ( $pathToImagesFolder )) {
				echo "<div class='updated'><p>Video Slider With Thumbnail is active but does not have write permission on</p><p><b>" . $pathToImagesFolder . "</b> directory.Please allow write permission.</p></div> ";
			}
		} else {
			
			wp_mkdir_p ( $pathToImagesFolder );
			if (! file_exists ( $pathToImagesFolder ) and ! is_dir ( $pathToImagesFolder )) {
				echo "<div class='updated'><p>Video Slider With Thumbnail is active but plugin does not have permission to create directory</p><p><b>" . $pathToImagesFolder . "</b> .Please create video-slider-with-thumbnails directory inside upload directory and allow write permission.</p></div> ";
			}
		}
	}
}


function vgwt_responsive_gallery_gallery__add_admin_init() {
    
        
	$url = plugin_dir_url ( __FILE__ );
	
	wp_enqueue_style( 'admincss', plugins_url('/css/admincss.css', __FILE__) );
	wp_enqueue_style( 'video-slider-responsive', plugins_url('/css/video-slider-responsive.css', __FILE__) );
        wp_enqueue_script('jquery');         
        wp_enqueue_script("jquery-ui-core");
        wp_enqueue_script('jquery.timers-1.2-video-slider',plugins_url('/js/jquery.timers-1.2-video-slider.js', __FILE__));
        wp_enqueue_script('jquery.easing.1.3-video-slider',plugins_url('/js/jquery.easing.1.3-video-slider.js', __FILE__));
        wp_enqueue_script('video-gallery-js',plugins_url('/js/video-gallery-js.js', __FILE__));
        wp_enqueue_script('jquery.validate',plugins_url('/js/jquery.validate.js', __FILE__));
       
	
	
	vgwt_responsive_gallery__admin_scripts_init();
}

function vgwt_responsive_gallery__load_styles_and_js() {
	if (! is_admin ()) {
		
		wp_enqueue_style ( 'video-slider-responsive', plugins_url ( '/css/video-slider-responsive.css', __FILE__ ) );
		wp_enqueue_script ( 'jquery' );
		wp_enqueue_script ( 'jquery.timers-1.2-video-slider', plugins_url ( '/js/jquery.timers-1.2-video-slider.js', __FILE__ ) );
		wp_enqueue_script ( 'jquery.easing.1.3-video-slider', plugins_url ( '/js/jquery.easing.1.3-video-slider.js', __FILE__ ) );
		wp_enqueue_script ( 'video-gallery-js', plugins_url ( '/js/video-gallery-js.js', __FILE__ ) );
		
           }
}
function vgwt_install_responsive_gallery() {
    
	global $wpdb;
	$table_name = $wpdb->prefix . "e_gallery";
	$table_name2 = $wpdb->prefix . "e_gallery_settings";
	
        $charset_collate = $wpdb->get_charset_collate();
        
	$sql = "CREATE TABLE " . $table_name . " (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `media_type` varchar(10) NOT NULL,
        `image_name` varchar(500) NOT NULL,
        `title` varchar(500) NOT NULL,
        `morder` int(11) NOT NULL DEFAULT '0',
        `vtype` varchar(50) DEFAULT NULL,
        `vid` varchar(300) DEFAULT NULL,
        `videourl` varchar(1000) DEFAULT NULL,
        `embed_url` varchar(300) DEFAULT NULL,
        `HdnMediaSelection` varchar(300) NOT NULL,
        `createdon` datetime NOT NULL, 
        `slider_id` int(11) NOT NULL DEFAULT '1',
         PRIMARY KEY (`id`)
        ) $charset_collate ";

        
	require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta ( $sql );

        //delete_option('vgwt_video_slider_settings');
        $vgwt_video_slider_settings=array('transition_speed' => '1000',
            'transition_interval' => '4000',
            'show_panels' =>1,
            'show_panel_nav' =>1,
            'enable_overlays' => 0,
            'panel_width'=>550,
            'panel_height' => 400,
            'panel_animation' => 'fade',
            'panel_scale' => 'fit',
            'overlay_position'=> 'bottom',
            'start_frame'=>1,
            'show_filmstrip'=>1,
            'show_filmstrip_nav'=>0,
            'enable_slideshow'=>1,
            'autoplay'=>0,
            'filmstrip_position'=>'bottom',
            'frame_width'=>80,
            'frame_height'=>80,
            'frame_opacity'=>0.4,
            'frame_scale'=>'crop',
            'filmstrip_style'=>'scroll',
            'frame_gap'=>1,
            'show_captions'=>0,
            'show_infobar'=>0,
            'infobar_opacity'=>1
        );

        if( !get_option( 'vgwt_video_slider_settings' ) ) {

            update_option('vgwt_video_slider_settings',$vgwt_video_slider_settings);
        } 
        
	$uploads = wp_upload_dir ();
	$baseDir = $uploads ['basedir'];
	$baseDir = str_replace ( "\\", "/", $baseDir );
	$pathToImagesFolder = $baseDir . '/video-slider-with-thumbnails';
	wp_mkdir_p ( $pathToImagesFolder );
        
       
        
        
}
function vgwt_responsive_gallery__add_admin_menu() {
    
	$hook_suffix = add_menu_page ( __( 'Video Slider With Thumbnail','video-slider-with-thumbnails') , __ ( 'Video Slider With Thumbnail','video-slider-with-thumbnails' ), 'administrator', 'responsive_video_slider_with_thumbnail', 'vgwt_responsive_video_slider_with_thumbnail_admin_options_func' );
	$hook_suffix=add_submenu_page ( 'responsive_video_slider_with_thumbnail', __ ( 'Slider Settings','video-slider-with-thumbnails' ), __ ( 'Slider Settings','video-slider-with-thumbnails' ), 'administrator', 'responsive_video_slider_with_thumbnail', 'vgwt_responsive_video_slider_with_thumbnail_admin_options_func' );
	$hook_suffix_image=add_submenu_page ( 'responsive_video_slider_with_thumbnail', __ ( 'Manage Media','video-slider-with-thumbnails' ), __ ( 'Manage Media','video-slider-with-thumbnails' ), 'administrator', 'responsive_video_slider_with_thumbnail_media_management', 'vgwt_responsive_video_slider_with_thumbnail_media_management_func' );
	$hook_suffix_prev=add_submenu_page ( 'responsive_video_slider_with_thumbnail', __ ( 'Preview Video Slider','video-slider-with-thumbnails' ), __ ( 'Preview Video Slider','video-slider-with-thumbnails' ), 'administrator', 'responsive_video_slider_with_thumbnail_media_preview', 'vgwt_responsive_video_slider_with_thumbnail_media_preview_func' );
	
	add_action( 'load-' . $hook_suffix , 'vgwt_responsive_gallery_gallery__add_admin_init' );
	add_action( 'load-' . $hook_suffix_image , 'vgwt_responsive_gallery_gallery__add_admin_init' );
	add_action( 'load-' . $hook_suffix_prev , 'vgwt_responsive_gallery_gallery__add_admin_init' );
        
        vgwt_responsive_gallery__admin_scripts_init();
	
}


function vgwt_responsive_video_slider_with_thumbnail_admin_options_func(){



        if(isset($_POST['btnsave'])){

            if ( !check_admin_referer( 'action_image_add_edit','add_edit_image_nonce')){

                  wp_die('Security check fail'); 
              }

                
            $transition_speed=sanitize_text_field($_POST['transition_speed']); 
            $transition_speed=intval($transition_speed); 
           
            
            $transition_interval=sanitize_text_field($_POST['transition_interval']); 
            $transition_interval=intval($transition_interval); 
           
            $show_panel_nav=sanitize_text_field($_POST['show_panel_nav']); 
            $show_panel_nav=intval($show_panel_nav); 
           
            
            $panel_width=sanitize_text_field($_POST['panel_width']); 
            $panel_width=intval($panel_width); 
           
            $panel_height=sanitize_text_field($_POST['panel_height']); 
            $panel_height=intval($panel_height); 
           
            $panel_scale=sanitize_text_field($_POST['panel_scale']); 
           
            $show_filmstrip=sanitize_text_field($_POST['show_filmstrip']); 
            $show_filmstrip=intval($show_filmstrip); 
            
            $autoplay=sanitize_text_field($_POST['autoplay']); 
            $autoplay=intval($autoplay); 
            
            $frame_width=sanitize_text_field($_POST['frame_width']); 
            $frame_width=intval($frame_width); 
        
            
            $frame_height=sanitize_text_field($_POST['frame_height']); 
            $frame_height=intval($frame_height); 
        
            
            $frame_opacity=sanitize_text_field($_POST['frame_opacity']); 
            $frame_opacity=floatval($frame_opacity); 
        
            
            $frame_gap=sanitize_text_field($_POST['frame_gap']); 
            $frame_gap=intval($frame_gap); 
        
            $show_infobar=sanitize_text_field($_POST['show_infobar']); 
            $show_infobar=intval($show_infobar); 
        
            
            $infobar_opacity=sanitize_text_field($_POST['infobar_opacity']); 
            $infobar_opacity=floatval($infobar_opacity); 
        
            
            $start_frame=1; 
        
            
            $panel_animation=sanitize_text_field($_POST['panel_animation']); 
            $overlay_position=sanitize_text_field($_POST['overlay_position']); 
          
            $enable_overlays=sanitize_text_field($_POST['enable_overlays']); 
            $enable_overlays=intval($enable_overlays); 
        
            
            $show_captions=sanitize_text_field($_POST['show_captions']); 
            $show_captions=intval($show_captions); 
        
            
            $show_filmstrip_nav=sanitize_text_field($_POST['show_filmstrip_nav']); 
            $show_filmstrip_nav=intval($show_filmstrip_nav); 
        
            
            
            
            
            $options=array();
            $options['transition_speed']       =$transition_speed;
            $options['transition_interval']    =$transition_interval;
            $options['show_panel_nav']         =$show_panel_nav;
            $options['panel_width']            =$panel_width;
            $options['panel_height']           =$panel_height;
            $options['panel_scale']            =trim($panel_scale);
            $options['show_filmstrip']         =$show_filmstrip;
            $options['autoplay']               =$autoplay;
            $options['frame_width']            =$frame_width;
            $options['frame_height']           =$frame_height;
            $options['frame_opacity']          =$frame_opacity;
            $options['frame_scale']            ='crop';
            $options['filmstrip_style']        ='scroll';
            $options['frame_gap']              =$frame_gap;
            $options['show_infobar']           =$show_infobar;
            $options['infobar_opacity']        =$infobar_opacity;
            $options['start_frame']            =$start_frame;
            $options['panel_animation']        =trim($panel_animation);
            $options['overlay_position']       =trim($overlay_position);
            $options['filmstrip_position']     ='bottom';
            $options['enable_overlays']        =$enable_overlays;
            $options['show_captions']          =$show_captions;
            $options['show_filmstrip_nav']     =$show_filmstrip_nav;
     
            if($autoplay)
                $options['enable_slideshow']       =1;
            else   
                $options['enable_slideshow']       =0;

            $settings=update_option('vgwt_video_slider_settings',$options); 
            $wp_vgallery_thumbnail_msg=array();
            $wp_vgallery_thumbnail_msg['type']='succ';
            $wp_vgallery_thumbnail_msg['message']=__("Settings saved successfully",'video-slider-with-thumbnails');
            update_option('wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg);



        }  
        $settings=get_option('vgwt_video_slider_settings');
        
        

    ?>      
    <div style="width: 100%;">  
        <div style="float:left;width:100%;">
            <div class="wrap">
                 <table><tr><td><a href="https://twitter.com/FreeAdsPost" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @FreeAdsPost</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></td>
                        <td>
                            <a target="_blank" title="Donate" href="http://i13websolution.com/donate-wordpress_image_thumbnail.php">
                                <img id="help us for free plugin" height="30" width="90" src="<?php echo plugins_url( 'images/paypaldonate.jpg', __FILE__ );?>" border="0" alt="help us for free plugin" title="help us for free plugin">
                                </a>
                            </td>
                        </tr>
                    </table>
                    <div style="clear:both">
                       <span><h3 style="color: blue;"><a target="_blank" href="http://www.i13websolution.com/wordpress-video-slider-plugin-pro.html">UPGRADE TO PRO VERSION</a></h3></span>
                   </div> 
                <?php
                    $messages=get_option('wp_vgallery_thumbnail_msg'); 
                    $type='';
                    $message='';
                    if(isset($messages['type']) and $messages['type']!=""){

                        $type=$messages['type'];
                        $message=$messages['message'];

                    }  


                    if($type=='err'){ echo "<div class='errMsg'>"; echo $message; echo "</div>";}
                    else if($type=='succ'){ echo "<div class='succMsg'>"; echo $message; echo "</div>";}


                    update_option('wp_vgallery_thumbnail_msg', array());     
                ?>      


                <h2><?php echo __("Slider Settings",'video-slider-with-thumbnails');?></h2>
                <div id="poststuff">   
                    <div id="post-body" class="metabox-holder columns-2">
                        <div id="post-body-content" >
                                <form method="post" action="" id="scrollersettiings" name="scrollersettiings" >
                                    <div class="stuffbox" id="namediv" style="width:100%;">
                                        <h3><label for="link_name"><?php echo __("Settings",'video-slider-with-thumbnails');?></label></h3>
                                        <table cellspacing="0" class="form-list" cellpadding="10">
                                            <tbody>
                                              
                                                <tr>
                                                    <td class="label">
                                                        <label for="transition_speed"><?php echo __("Transition Speed",'video-slider-with-thumbnails');?> <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <input id="transition_speed" value="<?php echo intval($settings['transition_speed']); ?>" name="transition_speed"  class="input-text" type="text">           
                                                        <div style="clear:both"></div>
                                                        <div></div> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label">
                                                        <label for="transition_interval"><?php echo __("Transition Interval",'video-slider-with-thumbnails');?> <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <input id="transition_interval"  value="<?php echo intval($settings['transition_interval']); ?>" name="transition_interval"  class="input-text" type="text">            
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label">
                                                        <label for="show_panel_nav"><?php echo __("Show Slider Navigation arrows",'video-slider-with-thumbnails');?>  <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <select id="show_panel_nav" name="show_panel_nav" class="select">
                                                            <option value=""><?php echo __("Select",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(intval($settings['show_panel_nav'])==1):?> selected="selected" <?php endif;?>  value="1" ><?php echo __("Yes",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(intval($settings['show_panel_nav'])==0):?> selected="selected" <?php endif;?>  value="0"><?php echo __("No",'video-slider-with-thumbnails');?></option>
                                                        </select>            
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td class="label">
                                                        <label for="enable_overlays"><?php echo __("Show Slider image Caption",'video-slider-with-thumbnails');?>  <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <select id="enable_overlays" name="enable_overlays" class="select">
                                                            <option value=""><?php echo __("Select",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(intval($settings['enable_overlays'])==1):?> selected="selected" <?php endif;?>  value="1" ><?php echo __("Yes",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(intval($settings['enable_overlays'])==0):?> selected="selected" <?php endif;?>  value="0"><?php echo __("No",'video-slider-with-thumbnails');?></option>
                                                        </select>            
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label">
                                                        <label for="panel_width"><?php echo __("Slider Width",'video-slider-with-thumbnails');?> <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <input id="panel_width" value="<?php echo intval($settings['panel_width']); ?>" name="panel_width"  class="input-text" type="text">            
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label">
                                                        <label for="panel_height"><?php echo __("Slider Height",'video-slider-with-thumbnails');?><span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <input id="panel_height" value="<?php echo intval($settings['panel_height']); ?>"  name="panel_height"  class="input-text" type="text">            
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label">
                                                        <label for="panel_animation"><?php echo __("Slider Animation",'video-slider-with-thumbnails');?> <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <select id="panel_animation" name="panel_animation" class="select">
                                                            <option value=""><?php echo __("Select",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(esc_html($settings['panel_animation'])=='fade'):?> selected="selected" <?php endif;?> value="fade"><?php echo __("Fade",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(esc_html($settings['panel_animation'])=='crossfade'):?> selected="selected" <?php endif;?> value="crossfade" ><?php echo __("crossfade",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(esc_html($settings['panel_animation'])=='slide'):?> selected="selected" <?php endif;?> value="slide" ><?php echo __("Slide",'video-slider-with-thumbnails');?></option>
                                                        </select>  
                                                        <div style="clear:both"></div>
                                                        <div></div>          
                                                    </td>
                                                </tr>  
                                                <tr>
                                                    <td class="label">
                                                        <label for="panel_scale"><?php echo __("Slider Scale",'video-slider-with-thumbnails');?> <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <select id="panel_scale" name="panel_scale" class="select">
                                                            <option value=""><?php echo __("Select",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(esc_html($settings['panel_scale'])=='crop'):?> selected="selected" <?php endif;?> value="crop"><?php echo __("Crop",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(esc_html($settings['panel_scale'])=='fit'):?> selected="selected" <?php endif;?> value="fit" ><?php echo __("Fit",'video-slider-with-thumbnails');?></option>
                                                        </select>  
                                                        <div style="clear:both"></div>
                                                        <div></div>          
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label">
                                                        <label for="overlay_position"><?php echo __("Caption Position",'video-slider-with-thumbnails');?> <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <select id="overlay_position" name="overlay_position" class="select">
                                                            <option value=""><?php echo __("Select",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(esc_html($settings['overlay_position'])=='bottom'):?> selected="selected" <?php endif;?> value="bottom"><?php echo __("Bottom",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(esc_html($settings['overlay_position'])=='top'):?> selected="selected" <?php endif;?> value="top" ><?php echo __("Top",'video-slider-with-thumbnails');?></option>
                                                        </select>  
                                                        <div style="clear:both"></div>
                                                        <div></div>          
                                                    </td>
                                                </tr>
                                                

                                               


                                                <tr>
                                                    <td class="label">
                                                        <label for="show_filmstrip"><?php echo __("Show Thumbnail Gallery",'video-slider-with-thumbnails');?>  <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <select id="show_filmstrip" name="show_filmstrip" class="select">
                                                            <option value="">Select</option>
                                                            <option <?php if(intval($settings['show_filmstrip'])==1):?> selected="selected" <?php endif;?>  value="1" ><?php echo __("Yes",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(intval($settings['show_filmstrip'])==0):?> selected="selected" <?php endif;?>  value="0"><?php echo __("No",'video-slider-with-thumbnails');?></option>
                                                        </select> 
                                                        <div style="clear:both"></div>
                                                        <div></div>           
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label">
                                                        <label for="show_filmstrip_nav"><?php echo __("Show Thumbnail Gallery Navigation",'video-slider-with-thumbnails');?>  <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <select id="show_filmstrip_nav" name="show_filmstrip_nav" class="select">
                                                            <option value="">Select</option>
                                                            <option <?php if(intval($settings['show_filmstrip_nav'])==1):?> selected="selected" <?php endif;?>  value="1" ><?php echo __("Yes",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(intval($settings['show_filmstrip_nav'])==0):?> selected="selected" <?php endif;?>  value="0"><?php echo __("No",'video-slider-with-thumbnails');?></option>
                                                        </select> 
                                                        <div style="clear:both"></div>
                                                        <div></div>           
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="autoplay"><?php echo __("Auto Play",'video-slider-with-thumbnails');?>  <span class="required">*</span></label></td>
                                                    <td class="value">
                                                        <select id="autoplay" name="autoplay" class="select">
                                                            <option value="">Select</option>
                                                            <option <?php if(intval($settings['autoplay'])==1):?> selected="selected" <?php endif;?>  value="1" ><?php echo __("Yes",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(intval($settings['autoplay'])==0):?> selected="selected" <?php endif;?>  value="0"><?php echo __("No",'video-slider-with-thumbnails');?></option>
                                                        </select>   
                                                        <div style="clear:both;margin-top: 10px"><?php echo __("Recommend to set 'no' if you have video in list",'video-slider-with-thumbnails');?> </div>
                                                        <div></div>         
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="label">
                                                        <label for="frame_width"><?php echo __("Thumbnail Width",'video-slider-with-thumbnails');?> <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <input id="frame_width" value="<?php echo intval($settings['frame_width']); ?>" name="frame_width" value="80" class="input-text" type="text">            
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label">
                                                        <label for="frame_height"><?php echo __("Thumbnail Height",'video-slider-with-thumbnails');?> <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <input id="frame_height" value="<?php echo intval($settings['frame_height']); ?>" name="frame_height"  class="input-text" type="text">            
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label">
                                                        <label for="frame_opacity"><?php echo __("Thumbnail Opacity",'video-slider-with-thumbnails');?> <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <input id="frame_opacity" value="<?php echo floatval($settings['frame_opacity']); ?>" name="frame_opacity"  class="input-text" type="text">           
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td class="label">
                                                        <label for="frame_gap"><?php echo __("Thumbnail Gap",'video-slider-with-thumbnails');?> <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <input id="frame_gap" value="<?php echo intval($settings['frame_gap']); ?>" name="frame_gap"  class="input-text" type="text">            
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="show_infobar"><?php echo __("Show Infobar",'video-slider-with-thumbnails');?>  <span class="required">*</span></label></td>
                                                    <td class="value">
                                                        <select id="show_infobar" name="show_infobar" class=" select">
                                                            <option value="">Select</option>
                                                            <option <?php if(intval($settings['show_infobar'])==1):?> selected="selected" <?php endif;?>  value="1"><?php echo __("Yes",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(intval($settings['show_infobar'])==0):?> selected="selected" <?php endif;?>  value="0" ><?php echo __("No",'video-slider-with-thumbnails');?></option>
                                                        </select>            
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr>
                                                <tr style="display: none;">
                                                    <td class="label"><label for="show_captions"><?php echo __("Show Thumbnail Image Caption",'video-slider-with-thumbnails');?>  <span class="required">*</span></label></td>
                                                    <td class="value">
                                                        <select id="show_captions" name="show_captions" class=" select">
                                                            <option <?php if(intval($settings['show_captions'])==0):?> selected="selected" <?php endif;?>  value="0" ><?php echo __("No",'video-slider-with-thumbnails');?></option>
                                                            <option <?php if(intval($settings['show_captions'])==1):?> selected="selected" <?php endif;?>  value="1"><?php echo __("Yes",'video-slider-with-thumbnails');?></option>
                                                        </select>            
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label">
                                                        <label for="infobar_opacity"><?php echo __("Infobar Opacity",'video-slider-with-thumbnails');?> <span class="required">*</span></label>
                                                    </td>
                                                    <td class="value">
                                                        <input id="infobar_opacity" value="<?php echo floatval($settings['infobar_opacity']); ?>" name="infobar_opacity"  class="input-text" type="text">            
                                                        <div style="clear:both"></div>
                                                        <div></div>
                                                    </td>
                                                </tr>  
                                                <tr>
                                                    <td class="label">
                                                        
                                                        <?php wp_nonce_field('action_image_add_edit','add_edit_image_nonce'); ?>
                                                        <input type="submit"  name="btnsave" id="btnsave" value="<?php echo __("Save Changes",'video-slider-with-thumbnails');?>" class="button-primary">    

                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>                                    
                                    </div>

                                </form>
                                <script type="text/javascript">

                                    var $n = jQuery.noConflict();  
                                    $n(document).ready(function() {

                                            $n("#scrollersettiings").validate({
                                                    rules: {
                                                        name: {
                                                            required:true,
                                                            maxlength:250
                                                        }, 
                                                        transition_speed: {
                                                            required:true,
                                                            number:true,
                                                            maxlength:10
                                                        },transition_interval: {
                                                            required:true,
                                                            number:true,
                                                            maxlength:10
                                                        },show_panel_nav: {
                                                            required:true, 
                                                        },enable_overlays: {
                                                            required:true, 
                                                        },
                                                        panel_width:{
                                                            required:true,  
                                                            number:true,
                                                            maxlength:10

                                                        },
                                                        panel_height:{
                                                            required:true,
                                                            number:true,
                                                            maxlength:10  
                                                        },
                                                        panel_animation:{
                                                            required:true,
                                                        },
                                                        panel_scale:{
                                                            required:true
                                                        },
                                                        overlay_position:{
                                                            required:true
                                                        },
                                                        show_filmstrip:{
                                                            required:true

                                                        },show_filmstrip_nav:{
                                                            required:true

                                                        },autoplay:{
                                                            required:true

                                                        },filmstrip_position:{
                                                            required:true

                                                        },frame_width:{
                                                            required:true,
                                                            number:true,
                                                            maxlength:10  
                                                        },frame_height:{
                                                            required:true,
                                                            number:true,
                                                            maxlength:10  
                                                        }
                                                        ,frame_opacity:{
                                                            required:true,
                                                            number:true,
                                                            maxlength:10  
                                                        }
                                                        ,frame_gap:{
                                                            required:true,
                                                            number:true,
                                                            maxlength:10  

                                                        },show_infobar:{
                                                            required:true

                                                        },show_captions:{
                                                            required:true

                                                        },infobar_opacity:{
                                                            required:true,
                                                            number:true,
                                                            maxlength:10  
                                                        }

                                                    },
                                                    errorClass: "image_error",
                                                    errorPlacement: function(error, element) {
                                                        error.appendTo( element.next().next());
                                                    } 


                                            })
                                    });

                                </script> 

                            </div>
                            <div id="postbox-container-1" class="postbox-container" > 

                            <div class="postbox"> 
                                <h3 class="hndle"><span></span>Access All Themes In One Price</h3> 
                                <div class="inside">
                                    <center><a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=11715_0_1_10" target="_blank"><img border="0" src="<?php echo plugins_url( 'images/300x250.gif', __FILE__ );?>" width="250" height="250"></a></center>

                                    <div style="margin:10px 5px">

                                    </div>
                                </div></div>
                            <div class="postbox"> 
                                <h3 class="hndle"><span></span>Ultimate Social Media Plugin. Now share content across social media platforms easily with Ultimate Social Media Plugin</h3> 

                                <div class="inside">
                                     <center><a href="http://www.shareasale.com/r.cfm?b=594704&u=675922&m=25608&urllink=&afftrack=" target="_blank"><img src="<?php echo plugins_url( 'images/300x250.png', __FILE__ );?>" width="250" height="250" border="0"></a></center>
                                    <div style="margin:10px 5px">
                                    </div>
                                </div></div>
                            
                             <div class="postbox"> 
                                <h3 class="hndle"><span></span><?php echo __('Speed Test For Your WP','responsive-filterable-portfolio');?></h3> 
                                <div class="inside">
                                    <center><a href="http://shareasale.com/r.cfm?b=875645&amp;u=675922&amp;m=41388&amp;urllink=&amp;afftrack=" target="_blank">
                                            <img src="<?php echo plugins_url( 'images/300x250-wp-eng.png', __FILE__ );?>" width="250" height="250" border="0">
                                        </a></center>
                                    <div style="margin:10px 5px">
                                    </div>
                                </div></div>

                        </div> 
                       <div class="clear"></div>
                    </div>                                              

                </div>  
            </div>      
        </div>



        <div class="clear"></div></div>  
    <?php
    } 
    

function vgwt_responsive_video_slider_with_thumbnail_media_management_func() {
	$action = 'gridview';
	global $wpdb;
	
	if (isset ( $_GET ['action'] ) and $_GET ['action'] != '') {
		
		$action = trim ( sanitize_text_field($_GET ['action'] ));
                
                if(isset($_GET['order_by'])){
        
                    if(sanitize_sql_orderby($_GET['order_by'])){
                        $order_by=trim($_GET['order_by']); 
                    }
                    else{
                        
                        $order_by=' id ';
                    }
                 }

                 if(isset($_GET['order_pos'])){

                    $order_pos=trim(sanitize_text_field($_GET['order_pos'])); 
                 }

                 $search_term_='';
                 if(isset($_GET['search_term'])){

                    $search_term_='&search_term='.urlencode(sanitize_text_field($_GET['search_term']));
                 }
	}
        
         $search_term_='';
        if(isset($_GET['search_term'])){

           $search_term_='&search_term='.urlencode(sanitize_text_field($_GET['search_term']));
        }
	?>

        <?php
	if (strtolower ( $action ) == strtolower ( 'gridview' )) {
		
		$wpcurrentdir = dirname ( __FILE__ );
		$wpcurrentdir = str_replace ( "\\", "/", $wpcurrentdir );
		
		$uploads = wp_upload_dir ();
		$baseurl = $uploads ['baseurl'];
		$baseurl .= '/video-slider-with-thumbnails/';
		?> 
            <div class="wrap">
                
                 <table><tr><td><a href="https://twitter.com/FreeAdsPost" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @FreeAdsPost</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></td>
                        <td>
                            <a target="_blank" title="Donate" href="http://i13websolution.com/donate-wordpress_image_thumbnail.php">
                                <img id="help us for free plugin" height="30" width="90" src="<?php echo plugins_url( 'images/paypaldonate.jpg', __FILE__ );?>" border="0" alt="help us for free plugin" title="help us for free plugin">
                                </a>
                            </td>
                        </tr>
                    </table>
                    <div style="clear:both">
                       <span><h3 style="color: blue;"><a target="_blank" href="http://www.i13websolution.com/wordpress-video-slider-plugin-pro.html">UPGRADE TO PRO VERSION</a></h3></span>
                   </div> 
		<style type="text/css">
                .pagination {
                        clear: both;
                        padding: 20px 0;
                        position: relative;
                        font-size: 11px;
                        line-height: 13px;
                }

                .pagination span, .pagination a {
                        display: block;
                        float: left;
                        margin: 2px 2px 2px 0;
                        padding: 6px 9px 5px 9px;
                        text-decoration: none;
                        width: auto;
                        color: #fff;
                        background: #555;
                }

                .pagination a:hover {
                        color: #fff;
                        background: #3279BB;
                }

                .pagination .current {
                        padding: 6px 9px 5px 9px;
                        background: #3279BB;
                        color: #fff;
                }
                </style>
		<!--[if !IE]><!-->
		<style type="text/css">
                    @media only screen and (max-width: 800px) {
                            /* Force table to not be like tables anymore */
                            #no-more-tables table, #no-more-tables thead, #no-more-tables tbody,
                                    #no-more-tables th, #no-more-tables td, #no-more-tables tr {
                                    display: block;
                            }

                            /* Hide table headers (but not display: none;, for accessibility) */
                            #no-more-tables thead tr {
                                    position: absolute;
                                    top: -9999px;
                                    left: -9999px;
                            }
                            #no-more-tables tr {
                                    border: 1px solid #ccc;
                            }
                            #no-more-tables td {
                                    /* Behave  like a "row" */
                                    border: none;
                                    border-bottom: 1px solid #eee;
                                    position: relative;
                                    padding-left: 50%;
                                    white-space: normal;
                                    text-align: left;
                            }
                            #no-more-tables td:before {
                                    /* Now like a table header */
                                    position: absolute;
                                    /* Top/left values mimic padding */
                                    top: 6px;
                                    left: 6px;
                                    width: 45%;
                                    padding-right: 10px;
                                    white-space: nowrap;
                                    text-align: left;
                                    font-weight: bold;
                            }

                            /*
                                            Label the data
                                            */
                            #no-more-tables td:before {
                                    content: attr(data-title);
                            }
                    }
                    </style>
		<!--<![endif]-->

                <?php
		$messages = get_option ( 'wp_vgallery_thumbnail_msg' );
		$type = '';
		$message = '';
		if (isset ( $messages ['type'] ) and $messages ['type'] != "") {
			
			$type = $messages ['type'];
			$message = $messages ['message'];
		}
		
		if ($type == 'err') {
			echo "<div class='errMsg'>";
			echo $message;
			echo "</div>";
		} else if ($type == 'succ') {
			echo "<div class='succMsg'>";
			echo $message;
			echo "</div>";
		}
		
		update_option ( 'wp_vgallery_thumbnail_msg', array () );
		?>

                  <div id="poststuff" >
                    <div id="post-body" class="metabox-holder columns-2">
                        <div style="" id="post-body-content" >
				<div class="icon32 icon32-posts-post" id="icon-edit">
					<br>
				</div>
				<h2>
					<?php echo __('Media','video-slider-with-thumbnails');?><a class="button add-new-h2" href="admin.php?page=responsive_video_slider_with_thumbnail_media_management&action=addedit&sliderid=<?php echo $sliderId; ?>"><?php echo __('Add New','video-slider-with-thumbnails');?></a>
				</h2>
				<br />

				<form method="POST"
					action="admin.php?page=responsive_video_slider_with_thumbnail_media_management&action=deleteselected&sliderid=<?php echo $sliderId; ?>"
					id="posts-filter" onkeypress="return event.keyCode != 13;">
					<div class="alignleft actions">
						<select name="action_upper" id="action_upper">
							<option selected="selected" value="-1"><?php echo __('Bulk Actions','video-slider-with-thumbnails');?></option>
							<option value="delete"><?php echo __('delete','video-slider-with-thumbnails');?></option>
						</select> <input type="submit" value="<?php echo __('Apply','video-slider-with-thumbnails');?>"
							class="button-secondary action" id="deleteselected"
							name="deleteselected" onclick="return confirmDelete_bulk();">
					</div>
                                      <?php
                                        

                                             $setacrionpage='admin.php?page=responsive_video_slider_with_thumbnail_media_management';

                                             if(isset($_GET['order_by']) and $_GET['order_by']!=""){
                                               $setacrionpage.='&order_by='.sanitize_text_field($_GET['order_by']);   
                                             }

                                             if(isset($_GET['order_pos']) and $_GET['order_pos']!=""){
                                              $setacrionpage.='&order_pos='.sanitize_text_field($_GET['order_pos']);   
                                             }

                                             $seval="";
                                             if(isset($_GET['search_term']) and $_GET['search_term']!=""){
                                              $seval=trim(sanitize_text_field($_GET['search_term']));   
                                             }

                                         ?>
					<br class="clear">
                                                    <?php
							global $wpdb;
                                                        $settings=get_option('vgwt_video_slider_settings'); 
							
							if (! is_array ( $settings )) {
								
								$wp_vgallery_thumbnail_msg = array ();
								$wp_vgallery_thumbnail_msg ['type'] = 'err';
								$wp_vgallery_thumbnail_msg ['message'] = __('No such video slider found.','video-slider-with-thumbnails');
								update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
								$location = 'admin.php?page=responsive_video_slider_with_thumbnail';
								echo "<script type='text/javascript'> location.href='$location';</script>";
								exit ();
							}
							
                                                        
                                                        $order_by='id';
                                                        $order_pos="asc";

                                                        if(isset($_GET['order_by']) and sanitize_sql_orderby($_GET['order_by'])!==false){

                                                           $order_by=trim($_GET['order_by']); 
                                                        }

                                                        if(isset($_GET['order_pos'])){

                                                           $order_pos=trim(sanitize_text_field($_GET['order_pos'])); 
                                                        }
                                                         $search_term='';
                                                        if(isset($_GET['search_term'])){

                                                           $search_term= sanitize_text_field($_GET['search_term']);
                                                        }

                                                        $query = "SELECT * FROM " . $wpdb->prefix . "e_gallery ";
                                                        if($search_term!=''){
                                                           $query.=" where id like '%$search_term%' or title like '%$search_term%' "; 
                                                        }

                                                        $order_by=sanitize_text_field($order_by);
                                                        $order_pos=sanitize_text_field($order_pos);

                                                        $query.=" order by $order_by $order_pos";
                                                        

                                                        $rows = $wpdb->get_results ( $query ,'ARRAY_A' );
                                                        $rowCount = sizeof ( $rows );
                                                                       
							?>
                                            
                                            <div style="padding-top:5px;padding-bottom:5px">
                                                <b><?php echo __( 'Search','video-slider-with-thumbnails');?> : </b>
                                                  <input type="text" value="<?php echo $seval;?>" id="search_term" name="search_term">&nbsp;
                                                  <input type='button'  value='<?php echo __( 'Search','video-slider-with-thumbnails');?>' name='searchusrsubmit' class='button-primary' id='searchusrsubmit' onclick="SearchredirectTO();" >&nbsp;
                                                  <input type='button'  value='<?php echo __( 'Reset Search','video-slider-with-thumbnails');?>' name='searchreset' class='button-primary' id='searchreset' onclick="ResetSearch();" >
                                            </div>  
                                            <script type="text/javascript" >
                                               var $n = jQuery.noConflict();   
                                                $n('#search_term').on("keyup", function(e) {
                                                       if (e.which == 13) {
                                                  
                                                           SearchredirectTO();
                                                       }
                                                  });   
                                             function SearchredirectTO(){
                                               var redirectto='<?php echo $setacrionpage; ?>';
                                               var searchval=jQuery('#search_term').val();
                                               redirectto=redirectto+'&search_term='+jQuery.trim(encodeURIComponent(searchval));  
                                               window.location.href=redirectto;
                                             }
                                            function ResetSearch(){

                                                 var redirectto='<?php echo $setacrionpage; ?>';
                                                 window.location.href=redirectto;
                                                 exit;
                                            }
                                            </script>            
                                             <div id="no-more-tables">
						<table cellspacing="0" id="gridTbl" class="table-bordered table-striped table-condensed cf wp-list-table widefat">
							<thead>
								<tr>
									<th class="manage-column column-cb check-column" scope="col"><input type="checkbox"></th>
									 <?php if($order_by=="id" and $order_pos=="asc"):?>
                                                                               
                                                                            <th><a href="<?php echo $setacrionpage;?>&order_by=id&order_pos=desc<?php echo $search_term_;?>"><?php echo __('Id','video-slider-with-thumbnails');?><img style="vertical-align:middle" src="<?php echo plugins_url('/images/desc.png', __FILE__); ?>"/></a></th>
                                                                            <?php else:?>
                                                                                <?php if($order_by=="id"):?>
                                                                            <th><a href="<?php echo $setacrionpage;?>&order_by=id&order_pos=asc<?php echo $search_term_;?>"><?php echo __('Id','video-slider-with-thumbnails');?><img style="vertical-align:middle" src="<?php echo plugins_url('/images/asc.png', __FILE__); ?>"/></a></th>
                                                                                <?php else:?>
                                                                                    <th><a href="<?php echo $setacrionpage;?>&order_by=id&order_pos=asc<?php echo $search_term_;?>"><?php echo __('Id','video-slider-with-thumbnails');?></a></th>
                                                                                <?php endif;?>    
                                                                            <?php endif;?>  
                                                                         <?php if($order_by=="media_type" and $order_pos=="asc"):?>
                                                                               
                                                                            <th><a href="<?php echo $setacrionpage;?>&order_by=media_type&order_pos=desc<?php echo $search_term_;?>"><?php echo __('Media Type','video-slider-with-thumbnails');?><img style="vertical-align:middle" src="<?php echo plugins_url('/images/desc.png', __FILE__); ?>"/></a></th>
                                                                            <?php else:?>
                                                                                <?php if($order_by=="media_type"):?>
                                                                            <th><a href="<?php echo $setacrionpage;?>&order_by=media_type&order_pos=asc<?php echo $search_term_;?>"><?php echo __('Media Type','video-slider-with-thumbnails');?><img style="vertical-align:middle" src="<?php echo plugins_url('/images/asc.png', __FILE__); ?>"/></a></th>
                                                                                <?php else:?>
                                                                                    <th><a href="<?php echo $setacrionpage;?>&order_by=media_type&order_pos=asc<?php echo $search_term_;?>"><?php echo __('Media Type','video-slider-with-thumbnails');?></a></th>
                                                                                <?php endif;?>    
                                                                            <?php endif;?>  
								            
									
                                                                        <?php if($order_by=="title" and $order_pos=="asc"):?>

                                                                             <th><a href="<?php echo $setacrionpage;?>&order_by=title&order_pos=desc<?php echo $search_term_;?>"><?php echo __('Title','video-slider-with-thumbnails');?><img style="vertical-align:middle" src="<?php echo plugins_url('/images/desc.png', __FILE__); ?>"/></a></th>
                                                                        <?php else:?>
                                                                            <?php if($order_by=="title"):?>
                                                                        <th><a href="<?php echo $setacrionpage;?>&order_by=title&order_pos=asc<?php echo $search_term_;?>"><?php echo __('Title','video-slider-with-thumbnails');?><img style="vertical-align:middle" src="<?php echo plugins_url('/images/asc.png', __FILE__); ?>"/></a></th>
                                                                            <?php else:?>
                                                                                <th><a href="<?php echo $setacrionpage;?>&order_by=title&order_pos=asc<?php echo $search_term_;?>"><?php echo __('Title','video-slider-with-thumbnails');?></a></th>
                                                                            <?php endif;?>    
                                                                        <?php endif;?>  
									<th><span></span></th>
									  <?php if($order_by=="morder" and $order_pos=="asc"):?>
                                                                               
                                                                            <th><a href="<?php echo $setacrionpage;?>&order_by=morder&order_pos=desc<?php echo $search_term_;?>"><?php echo __('Display Order','video-slider-with-thumbnails');?><img style="vertical-align:middle" src="<?php echo plugins_url('/images/desc.png', __FILE__); ?>"/></a></th>
                                                                            <?php else:?>
                                                                                <?php if($order_by=="morder"):?>
                                                                            <th><a href="<?php echo $setacrionpage;?>&order_by=morder&order_pos=asc<?php echo $search_term_;?>"><?php echo __('Display Order','video-slider-with-thumbnails');?><img style="vertical-align:middle" src="<?php echo plugins_url('/images/asc.png', __FILE__); ?>"/></a></th>
                                                                                <?php else:?>
                                                                                    <th><a href="<?php echo $setacrionpage;?>&order_by=morder&order_pos=asc<?php echo $search_term_;?>"><?php echo __('Display Order','video-slider-with-thumbnails');?></a></th>
                                                                                <?php endif;?>    
                                                                            <?php endif;?>  
								            
                                                                           
									  <?php if($order_by=="createdon" and $order_pos=="asc"):?>
                                                                               
                                                                            <th><a href="<?php echo $setacrionpage;?>&order_by=createdon&order_pos=desc<?php echo $search_term_;?>"><?php echo __('Published On','video-slider-with-thumbnails');?><img style="vertical-align:middle" src="<?php echo plugins_url('/images/desc.png', __FILE__); ?>"/></a></th>
                                                                            <?php else:?>
                                                                                <?php if($order_by=="createdon"):?>
                                                                            <th><a href="<?php echo $setacrionpage;?>&order_by=createdon&order_pos=asc<?php echo $search_term_;?>"><?php echo __('Published On','video-slider-with-thumbnails');?><img style="vertical-align:middle" src="<?php echo plugins_url('/images/asc.png', __FILE__); ?>"/></a></th>
                                                                                <?php else:?>
                                                                                    <th><a href="<?php echo $setacrionpage;?>&order_by=createdon&order_pos=asc<?php echo $search_term_;?>"><?php echo __('Published On','video-slider-with-thumbnails');?></a></th>
                                                                                <?php endif;?>    
                                                                            <?php endif;?>  
								                         
									
									<th><span><?php echo __('Edit','video-slider-with-thumbnails');?></span></th>
									<th><span><?php echo __('Delete','video-slider-with-thumbnails');?></span></th>
								</tr>
							</thead>

							<tbody id="the-list">
                                                            <?php
								if (count ( $rows ) > 0) {
									
									global $wp_rewrite;
									$rows_per_page = 15;
									
									$current = (isset($_GET ['paged'])) ? intval(sanitize_text_field($_GET ['paged'])) : 1;
									$pagination_args = array (
											'base' => @add_query_arg ( 'paged', '%#%' ),
											'format' => '',
											'total' => ceil ( sizeof ( $rows ) / $rows_per_page ),
											'current' => $current,
											'show_all' => false,
											'type' => 'plain' 
									);
									
									$start = ($current - 1) * $rows_per_page;
									$end = $start + $rows_per_page;
									$end = (sizeof ( $rows ) < $end) ? sizeof ( $rows ) : $end;
									$delRecNonce = wp_create_nonce('delete_image');
									for($i = $start; $i < $end; ++ $i) {
										
										$row = $rows [$i];
										
										$id = $row ['id'];
										$editlink = "admin.php?page=responsive_video_slider_with_thumbnail_media_management&action=addedit&id=$id";
										$deletelink = "admin.php?page=responsive_video_slider_with_thumbnail_media_management&action=delete&id=$id&nonce=$delRecNonce";
										
										$outputimgmain = $baseurl . $row ['image_name'].'?rand='.  rand(0, 5000);
										?>
                                                                        <tr valign="top">
                                                                            <td class="alignCenter check-column" data-title="Select Record"><input
                                                                                    type="checkbox" value="<?php echo $row['id'] ?>"
                                                                                    name="thumbnails[]"></td>
                                                                            <td data-title="<?php echo __('Id','video-slider-with-thumbnails');?>" class="alignCenter"><?php echo intval($row['id']); ?></td>
                                                                            <td data-title="Video Type" class="alignCenter"><div>
                                                                                            <strong><?php echo $row['media_type']; ?> <?php if($row['media_type']=='video'):?> - <?php echo esc_html($row['vtype']);?><?php endif;?> </strong>
                                                                                    </div></td>
                                                                               <td data-title="<?php echo __('Title','video-slider-with-thumbnails');?>" class="alignCenter">
                                                                               <div>
                                                                                            <strong><?php echo esc_html($row['title']); ?></strong>
                                                                                    </div></td>
                                                                            <td class="alignCenter"><img src="<?php echo esc_url($outputimgmain); ?>" style="width: 100px" height="100px" /></td>
                                                                            <td data-title="<?php echo __('Display Order','video-slider-with-thumbnails');?>" class="alignCenter"><?php echo intval($row['morder']); ?></td>
                                                                            <td data-title="<?php echo __('Published On','video-slider-with-thumbnails');?>" class="alignCenter"><?php echo esc_html($row['createdon']); ?></td>
                                                                            <td data-title="<?php echo __('Edit','video-slider-with-thumbnails');?>" class="alignCenter"><strong><a href='<?php echo esc_url($editlink); ?>' title="<?php echo __('Edit','video-slider-with-thumbnails');?>"><?php echo __('Edit','video-slider-with-thumbnails');?></a></strong></td>
                                                                            <td data-title="<?php echo __('Delete','video-slider-with-thumbnails');?>" class="alignCenter"><strong><a href='<?php echo esc_url($deletelink); ?>' onclick="return confirmDelete();" title="<?php echo __('Delete','video-slider-with-thumbnails');?>"><?php echo __('Delete','video-slider-with-thumbnails');?></a> </strong></td>
                                                                    </tr>
                                                                    <?php
                                                                            }
                                                                    } else {
                                                                            ?>
                                                                    <tr valign="top" class=""
                                                                            id="">
                                                                            <td colspan="9" data-title="<?php echo __('No Record','video-slider-with-thumbnails');?>" align="center"><strong><?php echo __('No Video Slider Found','video-slider-with-thumbnails');?></strong></td>
                                                                    </tr>
                                                                 <?php
								}
								?>      
                                                        </tbody>
						</table>
					</div>
                                         <?php
							if (sizeof ( $rows ) > 0) {
								echo "<div class='pagination' style='padding-top:10px'>";
								echo paginate_links ( $pagination_args );
								echo "</div>";
							}
							?>
                                         <br />
					<div class="alignleft actions">
						<select name="action" id="action_bottom">
							<option selected="selected" value="-1"><?php echo __('Bulk Actions','video-slider-with-thumbnails');?></option>
							<option value="delete"><?php echo __('Delete','video-slider-with-thumbnails');?></option>
						</select> 
                                               <?php wp_nonce_field('action_settings_mass_delete', 'mass_delete_nonce'); ?>
                                                <input type="submit" value="<?php echo __('Apply','video-slider-with-thumbnails');?>"
							class="button-secondary action" id="deleteselected"
							name="deleteselected" onclick="return confirmDelete_bulk();">
					</div>

				</form>
				<script type="text/JavaScript">

                            function  confirmDelete_bulk(){
                                            var topval=document.getElementById("action_bottom").value;
                                            var bottomVal=document.getElementById("action_upper").value;

                                            if(topval=='delete' || bottomVal=='delete'){


                                                var agree=confirm("<?php echo __('Are you sure you want to delete selected media ?','video-slider-with-thumbnails');?>");
                                                if (agree)
                                                    return true ;
                                                else
                                                    return false;
                                            }
                                     }
                                     
                            function  confirmDelete(){
                             var agree=confirm("<?php echo __('Are you sure you want to delete this media ?','video-slider-with-thumbnails');?>");
                             if (agree)
                                 return true ;
                            else
                                return false;
                            }
                        </script>
                        </div>
                        <div id="postbox-container-1" class="postbox-container" > 

                            <div class="postbox"> 
                                <h3 class="hndle"><span></span>Access All Themes In One Price</h3> 
                                <div class="inside">
                                    <center><a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=11715_0_1_10" target="_blank"><img border="0" src="<?php echo plugins_url( 'images/300x250.gif', __FILE__ );?>" width="250" height="250"></a></center>

                                    <div style="margin:10px 5px">

                                    </div>
                                </div></div>
                            <div class="postbox"> 
                                <h3 class="hndle"><span></span>Backup, Copy, Clone, Move or Restore your WordPress website with Backup Breeze, Support Dropbox, Amazon S3, Google Drive, FTP</h3> 

                                <div class="inside">
                                    <center><a href="http://www.shareasale.com/r.cfm?b=594678&u=675922&m=25608&urllink=&afftrack=" title="Backup, Copy, Clone, Move or Restore your WordPress website with Backup Breeze" target="_blank"><img src="<?php echo plugins_url( 'images/img__backup.jpg', __FILE__ );?>" width="250" height="250" border="0"></a></center>
                                    <div style="margin:10px 5px">
                                    </div>
                                </div></div>

                        </div>
                        <br class="clear">
			</div>
			<div style="clear: both;"></div>
                    <?php $url = plugin_dir_url(__FILE__); ?>


                </div>
		<h3><?php echo __('To print this video slider into WordPress Post/Page use below code','video-slider-with-thumbnails');?></h3>
		<input type="text"
			value='[vgwt_print_responsive_video_slider_with_thumbnail] '
			style="width: 400px; height: 30px"
			onclick="this.focus(); this.select()" />
		<div class="clear"></div>
		<h3><?php echo __('To print this video slider into WordPress theme/template PHP files use below code','video-slider-with-thumbnails');?></h3>
                <?php
		$shortcode = '[vgwt_print_responsive_video_slider_with_thumbnail]';
		?>
                <input type="text"
			value="&lt;?php echo do_shortcode('<?php echo htmlentities($shortcode, ENT_QUOTES); ?>'); ?&gt;"
			style="width: 400px; height: 30px"
			onclick="this.focus(); this.select()" />
            </div>    
		<div class="clear"></div>
                <?php
	} else if (strtolower ( $action ) == strtolower ( 'addedit' )) {
		$url = plugin_dir_url ( __FILE__ );
		$vNonce = wp_create_nonce('vNonce');
		?><?php
		if (isset ( $_POST ['btnsave'] )) {
			
                       if (!check_admin_referer('action_image_add_edit', 'add_edit_image_nonce')) {

                            wp_die('Security check fail');
                        }
			$uploads = wp_upload_dir ();
			$baseDir = $uploads ['basedir'];
			$baseDir = str_replace ( "\\", "/", $baseDir );
			$pathToImagesFolder = $baseDir . '/video-slider-with-thumbnails';
			
                        if(isset($_POST['media_type']) and $_POST['media_type']=='video'){
                        
                        $media_type=trim(sanitize_text_field($_POST['media_type']));    
			$vtype = trim (sanitize_text_field( $_POST ['vtype'] )) ;
			$videourl = trim (sanitize_text_field($_POST ['videourl'] ));
			
			$vid = uniqid ( 'vid_' );
			$embed_url='';
			if ($vtype == 'youtube') {
				// parse
				
				$parseUrl = @parse_url ( $videourl );
				if (is_array ( $parseUrl )) {
					
					$queryStr = $parseUrl ['query'];
					parse_str ( $queryStr, $array );
					if (is_array ( $array ) and isset ( $array ['v'] )) {
						
						$vid = $array ['v'];
					}
				}
				
			    $embed_url="//www.youtube.com/embed/$vid";	
			}
			
			else if ($vtype == 'metacafe') {

                        $pattern = "#(?<=watch/).*?(?=/)#";
                        preg_match($pattern, $videourl, $matches, PREG_OFFSET_CAPTURE, 3);
                        $vid = 0;
                        if ($matches and is_array($matches)) {

                            $vid = $matches[0][0];
                        }

                        
                        $embed_url = $videourl;
                        $embed_url=  str_replace("/watch/", "/embed/", $embed_url);
                        
                         }
			else if($vtype=='dailymotion'){
				
                                
                               
                                $pos = strpos($videourl, '/video/');
                                $vid=0;
                                if ($pos !== false){
                                    
                                    $vid=substr($videourl, $pos+strlen('/video/'));
                                    
                                }
                              
				
                              $embed_url="//www.dailymotion.com/embed/video/$vid";
                                
                                
				
			}
                       
			
			
			$HdnMediaSelection = trim(sanitize_text_field($_POST ['HdnMediaSelection']));
			$videotitle = trim ( sanitize_text_field($_POST ['title'] )) ;
			$video_order = intval(trim ( sanitize_text_field($_POST ['morder'] )));
			
			if ($video_order == "" or $video_order == null)
				$video_order = 0;
			
			
			
			$videotitle = str_replace("'","’",$videotitle);
			$videotitle = str_replace('"', '&quot;', $videotitle);
			
                        $videourl=trim ( sanitize_text_field($_POST ['videourl'] )) ;
			
		
			$location = "admin.php?page=responsive_video_slider_with_thumbnail_media_management";
				// edit save
                        
			if (isset ( $_POST ['videoid'] )) {
				
				try {
						
						$videoidEdit=intval(sanitize_text_field($_POST ['videoid']));
						if (trim ( $_POST ['HdnMediaSelection'] ) != '') {
                                                    
                                                        $query = "SELECT * FROM " . $wpdb->prefix . "e_gallery WHERE id=$videoidEdit";
                                                        $myrow = $wpdb->get_row($query);
                                                        
                                                        $settings=get_option('vgwt_video_slider_settings');
                                                        $imageheight = intval($settings ['imageheight']);
                                                        $imagewidth = intval($settings ['imagewidth']);
                                                        
                                                          if (is_object($myrow)) {

                                                            $image_name = $myrow->image_name;
                                                            $imagetoDel = $pathToImagesFolder . '/' . $image_name;
                                                            $pInfo = pathinfo($myrow->HdnMediaSelection);
                                                            $pInfo2 = pathinfo($imagetoDel);
                                                            $ext = $pInfo2 ['extension'];

                                                            @unlink($imagetoDel);
                                                            @unlink($pathToImagesFolder . '/' . $pInfo2['filename']. '_' . $imageheight . '_' . $imagewidth . '.' . $ext);
                                                        }
							$pInfo = pathinfo ( $HdnMediaSelection );
							$ext = $pInfo ['extension'];
							$imagename = uniqid("vid_") .".". $ext;
							$imageUploadTo = $pathToImagesFolder . '/' . $imagename;
                                                        
                                                   	@copy ( $HdnMediaSelection, $imageUploadTo );
                                                        if(!file_exists($imageUploadTo)){
                                                         vgwt_save_image_remote($HdnMediaSelection,$imageUploadTo);
                                                        }
                                                        
                                                     
						}
							
						$query = "update " . $wpdb->prefix . "e_gallery
						set media_type='$media_type', vtype='$vtype',vid='$vid',embed_url='$embed_url',image_name='$imagename',HdnMediaSelection='$HdnMediaSelection',
						title='$videotitle',videourl='$videourl', morder=$video_order  where id=$videoidEdit";
							
						//echo $query;die;
						$wpdb->query ( $query );
							
						$wp_vgallery_thumbnail_msg = array ();
						$wp_vgallery_thumbnail_msg ['type'] = 'succ';
						$wp_vgallery_thumbnail_msg ['message'] = __('Video updated successfully.','video-slider-with-thumbnails');
						update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
					} catch ( Exception $e ) {
							
						$wp_vgallery_thumbnail_msg = array ();
										$wp_vgallery_thumbnail_msg ['type'] = 'err';
										$wp_vgallery_thumbnail_msg ['message'] = __('Error while adding video','video-slider-with-thumbnails');
						update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
						}

				
				
                                
                                
			} else {
				
				$createdOn = date ( 'Y-m-d h:i:s' );
                                if (function_exists ( 'date_i18n' )) {

                                        $createdOn = date_i18n ( 'Y-m-d' . ' ' . get_option ( 'time_format' ), false, false );
                                        if (get_option ( 'time_format' ) == 'H:i')
                                                $createdOn = date ( 'Y-m-d H:i:s', strtotime ( $createdOn ) );
                                        else
                                                $createdOn = date ( 'Y-m-d h:i:s', strtotime ( $createdOn ) );
                                }
				
				try {
					
					if (trim ( $_POST ['HdnMediaSelection'] ) != '') {
						$pInfo = pathinfo ( $HdnMediaSelection );
						$ext = $pInfo ['extension'];
						$imagename = uniqid("vid_") . ".".$ext;
						$imageUploadTo = $pathToImagesFolder . '/' . $imagename;
						@copy ( $HdnMediaSelection, $imageUploadTo );
                                                 if(!file_exists($imageUploadTo)){
                                                   vgwt_save_image_remote($HdnMediaSelection,$imageUploadTo);
                                                 }
					}
					
					$query = "INSERT INTO " . $wpdb->prefix . "e_gallery 
                                		(media_type,image_name,title,morder,
                                                vtype,vid,videourl,embed_url,HdnMediaSelection,createdon) 
                                                VALUES ('$media_type','$imagename','$videotitle','$video_order',
                                                        '$vtype','$vid','$videourl','$embed_url','$HdnMediaSelection', '$createdOn')";

					
					$wpdb->query ( $query );
					
                                        
                                      

					$wp_vgallery_thumbnail_msg = array ();
					$wp_vgallery_thumbnail_msg ['type'] = 'succ';
					$wp_vgallery_thumbnail_msg ['message'] = __('New video added successfully.','video-slider-with-thumbnails');
					update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
				} catch ( Exception $e ) {
					
					$wp_vgallery_thumbnail_msg = array ();
					$wp_vgallery_thumbnail_msg ['type'] = 'err';
					$wp_vgallery_thumbnail_msg ['message'] = __('Error while adding video','video-slider-with-thumbnails');
					update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
				}
				
				
			}
                        
                   }
                   else if(isset($_POST['media_type']) and $_POST['media_type']=='image'){
                            
                        $vid = uniqid ( 'vid_' );
                        $media_type=trim(sanitize_text_field($_POST['media_type']));   
                        $HdnMediaSelection = trim ( sanitize_text_field($_POST ['HdnMediaSelection_image'] ));
			$mtitle = trim ( sanitize_text_field($_POST ['title'] )) ;
			$morder = intval(trim ( sanitize_text_field($_POST ['morder'] )));
			
               	
			if ($morder == "" or $morder == null)
				$morder = 0;
			
			
			$mtitle = str_replace("'","’",$mtitle);
			$mtitle = str_replace('"', '&quot;', $mtitle);
			
			
			
			$location = "admin.php?page=responsive_video_slider_with_thumbnail_media_management";
				// edit save
			if (isset ( $_POST ['imageid'] )) {
				
				try {
						
						$videoidEdit=intval(sanitize_text_field($_POST ['imageid']));
						if (trim ( $_POST ['HdnMediaSelection_image'] ) != '') {
                                                        
                                                        $query = "SELECT * FROM " . $wpdb->prefix . "e_gallery WHERE id=$videoidEdit";
                                                        $myrow = $wpdb->get_row($query);
                                                        
                                                        $settings=get_option('vgwt_video_slider_settings'); 
						        $imageheight = intval($settings ['imageheight']);
                                                        $imagewidth = intval($settings ['imagewidth']);
                                                        
                                                          if (is_object($myrow)) {

                                                            $image_name = $myrow->image_name;
                                                            $imagetoDel = $pathToImagesFolder . '/' . $image_name;
                                                            $pInfo = pathinfo($myrow->HdnMediaSelection);
                                                            $pInfo2 = pathinfo($imagetoDel);
                                                            $ext = $pInfo2 ['extension'];

                                                            @unlink($imagetoDel);
                                                            @unlink($pathToImagesFolder . '/' . $pInfo2['filename']. '_' . $imageheight . '_' . $imagewidth . '.' . $ext);
                                                        }
                                                        
                                                    
							$pInfo = pathinfo ( $HdnMediaSelection );
							$ext = $pInfo ['extension'];
							$imagename = uniqid("vid_").".". $ext;
							$imageUploadTo = $pathToImagesFolder . '/' . $imagename;
                                                        
                                                        @copy ( $HdnMediaSelection, $imageUploadTo );
                                                        if(!file_exists($imageUploadTo)){
                                                         vgwt_save_image_remote($HdnMediaSelection,$imageUploadTo);
                                                        }
                                                        
                                                        
						}
							
						$query = "update " . $wpdb->prefix . "e_gallery
						set media_type='$media_type',image_name='$imagename',HdnMediaSelection='$HdnMediaSelection',
						title='$mtitle', morder=$morder where id=$videoidEdit";
							
						//echo $query;die;
						$wpdb->query ( $query );
							
						$wp_vgallery_thumbnail_msg = array ();
						$wp_vgallery_thumbnail_msg ['type'] = 'succ';
						$wp_vgallery_thumbnail_msg ['message'] = __('Image updated successfully.','video-slider-with-thumbnails');
						update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
					} catch ( Exception $e ) {
							
						$wp_vgallery_thumbnail_msg = array ();
										$wp_vgallery_thumbnail_msg ['type'] = 'err';
										$wp_vgallery_thumbnail_msg ['message'] = __('Error while adding image','video-slider-with-thumbnails');
						update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
						}

				
				
			} else {
				
				$createdOn = date ( 'Y-m-d h:i:s' );
                                if (function_exists ( 'date_i18n' )) {

                                        $createdOn = date_i18n ( 'Y-m-d' . ' ' . get_option ( 'time_format' ), false, false );
                                        if (get_option ( 'time_format' ) == 'H:i')
                                                $createdOn = date ( 'Y-m-d H:i:s', strtotime ( $createdOn ) );
                                        else
                                                $createdOn = date ( 'Y-m-d h:i:s', strtotime ( $createdOn ) );
                                }
				
				try {
					
					if (trim ( $_POST ['HdnMediaSelection_image'] ) != '') {
						$pInfo = pathinfo ( $HdnMediaSelection );
						$ext = $pInfo ['extension'];
						$imagename = uniqid("vid_").".". $ext;
						$imageUploadTo = $pathToImagesFolder . '/' . $imagename;
						
                                                @copy ( $HdnMediaSelection, $imageUploadTo );
                                                if(!file_exists($imageUploadTo)){
                                                 vgwt_save_image_remote($HdnMediaSelection,$imageUploadTo);
                                                }
					}
					
					$query = "INSERT INTO " . $wpdb->prefix . "e_gallery 
                                		(media_type,image_name,title,morder,
                                                HdnMediaSelection,createdon) 
                                                VALUES ('$media_type','$imagename','$mtitle','$morder','$HdnMediaSelection', '$createdOn')";

					
					$wpdb->query ( $query );
					
					$wp_vgallery_thumbnail_msg = array ();
					$wp_vgallery_thumbnail_msg ['type'] = 'succ';
					$wp_vgallery_thumbnail_msg ['message'] = __('New image added successfully.','video-slider-with-thumbnails');
					update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
				} catch ( Exception $e ) {
					
					$wp_vgallery_thumbnail_msg = array ();
					$wp_vgallery_thumbnail_msg ['type'] = 'err';
					$wp_vgallery_thumbnail_msg ['message'] = __('Error while adding image','video-slider-with-thumbnails');
					update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
				}
				
				
			}
                       
                          
                       
                   }
                   

                    
                    echo "<script type='text/javascript'> location.href='$location';</script>";
                    exit ();
                   
                   
		} else {
			
			$uploads = wp_upload_dir ();
			$baseurl = $uploads ['baseurl'];
			$baseurl .= '/video-slider-with-thumbnails/';
			?>
         <div style="float: left; width: 100%;">
	       <div class="wrap">
                
                 <table><tr><td><a href="https://twitter.com/FreeAdsPost" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @FreeAdsPost</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></td>
                        <td>
                            <a target="_blank" title="Donate" href="http://i13websolution.com/donate-wordpress_image_thumbnail.php">
                                <img id="help us for free plugin" height="30" width="90" src="<?php echo plugins_url( 'images/paypaldonate.jpg', __FILE__ );?>" border="0" alt="help us for free plugin" title="help us for free plugin">
                                </a>
                            </td>
                        </tr>
                    </table>
                    <div style="clear:both">
                       <span><h3 style="color: blue;"><a target="_blank" href="http://www.i13websolution.com/wordpress-video-slider-plugin-pro.html">UPGRADE TO PRO VERSION</a></h3></span>
                   </div>    
	    	<?php
		    	if (isset ( $_GET ['id'] ) and $_GET ['id'] > 0) {
				
				$id = intval(sanitize_text_field($_GET ['id']));
				$query = "SELECT * FROM " . $wpdb->prefix . "e_gallery WHERE id=$id";
				
				$myrow = $wpdb->get_row ( $query );
				
				if (is_object ( $myrow )) {
					
					$media_type =  esc_html($myrow->media_type);
					$vtype =  esc_html($myrow->vtype) ;
					$title =  esc_html($myrow->title);
					$image_name = esc_html($myrow->image_name);
					$HdnMediaSelection = esc_url($myrow->HdnMediaSelection);
					$videotitle = esc_html($myrow->title);
					$videourl=esc_url($myrow->videourl);
					$video_order = intval($myrow->morder);
					
					
					
				}
				?>
	         <h2><?php echo __('Update Media','video-slider-with-thumbnails');?></h2><?php
			} else {
				
				$media_type = '';
                                $vtype = '';
                                $title = '';
                                $image_name = '';
                                $video_url = '';
                                $HdnMediaSelection = '';
                                $videotitle = '';
                                $videourl='';
                                $video_order = '';
                                
				?>
                 <h2><?php echo __('Add Media','video-slider-with-thumbnails');?></h2>
                   <?php } ?>
                   <br />
					<div id="poststuff">
						<div id="post-body" class="metabox-holder columns-2">
							<div id="post-body-content">
                                                            
                                                            <div class="stuffbox" id="mediatype" style="width: 100%">
                                                                            <h3>
                                                                                    <label for="link_name"><?php echo __('Media Type','video-slider-with-thumbnails');?> (<span
                                                                                            style="font-size: 11px; font-weight: normal"><?php echo __('Choose Media Type','video-slider-with-thumbnails');?></span>)
                                                                                    </label>
                                                                            </h3>
                                                                            <div class="inside">
                                                                                    <div>
                                                                                            <input type="radio" value="image" name="media_type_p" <?php if($media_type=='image'): ?> checked='checked' <?php endif;?> style="width: 15px" id="type_image" /><?php echo __('Image','video-slider-with-thumbnails');?>&nbsp;&nbsp;
                                                                                            <input type="radio" value="video" name="media_type_p" <?php if($media_type=='video'): ?> checked='checked' <?php endif;?> style="width: 15px" id="type_video" /><?php echo __('Video','video-slider-with-thumbnails');?>&nbsp;&nbsp; 
                                                                                            

                                                                                    </div>
                                                                                    <div style="clear: both"></div>
                                                                                    <div></div>
                                                                                    <div style="clear: both"></div>
                                                                                    <br />

                                                                            </div>

                                                                        <script>
                                                                           var $n = jQuery.noConflict();   
                                                                           
                                                                           $n(document).ready(function() {
                                                                                 $n("input[name = 'media_type_p']").click(function(){
                                                                                    var radioValue = $n("input[name='media_type_p']:checked").val();
                                                                                    if(radioValue=='video'){

                                                                                        $n("#addvideo").show(500);
                                                                                        $n("#addimage_").hide(500);
                                                                                        $n("#addlink_").hide(500);
                                                                                      
                                                                                    }
                                                                                    else if(radioValue=='image'){

                                                                                       $n("#addvideo").hide(500);
                                                                                       $n("#addimage_").show(500);
                                                                                       $n("#addlink_").hide(500);
                                                                                    }
                                                                                   
                                                                                });
                                                                                
                                                                                 <?php if(isset($_GET['id']) and (int) intval(sanitize_text_field($_GET['id']))>0):?>
                                                                                
                                                                                    <?php if($media_type=='video') :?>
                                                                                        $n("#type_video").trigger('click');
                                                                                      
                                                                                    <?php elseif($media_type=='image'):?>
                                                                                        $n("#type_image").trigger('click');
                                                                                    <?php endif;?>    

                                                                                 <?php endif;?>  
                                                                                
                                                                             });   
                                                                             
                                                                              
                                                                         </script>       
                                                                    </div>
                                                                    <form method="post" action="" id="addvideo" name="addvideo" enctype="multipart/form-data" style="display:none">
                                                                    
                                                                        <input type="hidden" name="media_type" id="media_type" value="video" />
									<div class="stuffbox" id="videoinfo_div_1" style="width: 100%;">
										<h3>
											<label for="link_name"><?php echo __('Video Information','video-slider-with-thumbnails');?> 
											</label>
										</h3>
										<div class="inside">
											<div>
												<input type="radio" value="youtube" name="vtype"
													<?php if($vtype=='youtube'): ?> checked='checked' <?php endif;?> style="width: 15px" id="type_youtube" /><?php echo __('Youtube','video-slider-with-thumbnails');?>&nbsp;&nbsp;
                                                                                    	        <input <?php if($vtype=='metacafe'): ?> checked='checked' <?php endif;?> type="radio" value="metacafe" name="vtype"
													style="width: 15px" id="type_metacafe" /><?php echo __('Metacafe','video-slider-with-thumbnails');?>&nbsp;&nbsp;
												<input <?php if($vtype=='dailymotion'): ?> checked='checked' <?php endif;?> type="radio" value="dailymotion" name="vtype"
													style="width: 15px" id="type_DailyMotion" /><?php echo __('DailyMotion','video-slider-with-thumbnails');?>&nbsp;&nbsp;
                                                                                                
                                                                                               
											</div>
											<div style="clear: both"></div>
											<div></div>
											<div style="clear: both"></div>
											<br />
											<div id='vurl_' >
                                                                                            <b><?php echo __('Video Url','video-slider-with-thumbnails');?></b> <input style="width:98%" type="text" id="videourl"  tabindex="1"  name="videourl" value="<?php echo $videourl; ?>">
                                                                                            
											</div>
                                                                                        
                                                                                        
											<div style="clear: both"></div>
											<div></div>
											<div style="clear: both"></div>
										</div>
                                                                              
									</div>
									<div class="stuffbox" id="videoinfo_div_2" style="width: 100%;">
										<h3>
											<label for="link_name"><?php echo __('Video Thumbnail Information','video-slider-with-thumbnails');?></label>
										</h3>
										<div class="inside" id="fileuploaddiv">
                                                                                <?php if ($image_name != "") { ?>
                                                                                        <div>
												<b><?php echo __('Current Image','video-slider-with-thumbnails');?>: </b>
												<br/>
												<img id="img_disp" name="img_disp"
													src="<?php echo $baseurl . $image_name; ?>" />
											</div>
                                                                                <?php }else{ ?>      
                                                                                            <img
												src="<?php echo plugins_url('/images/no-img.jpeg', __FILE__); ?>"
												id="img_disp" name="img_disp" />
                                                           
                                                                                     <?php } ?>
                                                                                         <br /> <a href="javascript:;" class="niks_media"
												id="videoFromExternalSite"  ><b><?php echo __('Click Here to get video information and thumbnail','video-slider-with-thumbnails');?><span id='fromval'> From <?php echo $vtype;?></span>
											</b></a>&nbsp;<img
												src="<?php echo plugins_url('/images/ajax-loader.gif', __FILE__); ?>"
												style="display: none" id="loading_img" name="loading_img" />
											<div style="clear: both"></div>
											<div></div>
											<div class="uploader">
												 <b style="margin-left: 50px;" id='or__'>OR</b>
												<div style="clear: both; margin-top: 15px;"></div>
                                                                                                
                                                                                                        <a
													href="javascript:;" class="niks_media" id="myMediaUploader"><b><?php echo __('Click Here to upload video poster','video-slider-with-thumbnails');?></b></a>
                                              
                                                                                                    <br /> <br />
												<div>
													<input id="HdnMediaSelection" name="HdnMediaSelection" type="hidden" value="<?php echo $HdnMediaSelection;?>" />
												</div>
												<div style="clear: both"></div>
												<div></div>
												<div style="clear: both"></div>

												<br />
											</div>
                                                                                        
                                                                                     
                                                                                <script>
                                                                                        
                                                                                   
                                                                                    function GetParameterValues(param,str) {
                                                                                      var return_p='';  
                                                                                      var url = str.slice(str.indexOf('?') + 1).split('&');
                                                                                      for (var i = 0; i < url.length; i++) {
                                                                                            var urlparam = url[i].split('=');
                                                                                            if (urlparam[0] == param) {
                                                                                             return_p= urlparam[1];
                                                                                            }
                                                                                        }
                                                                                        return return_p;
                                                                                    }

                                                                                   

                                                                                    function UrlExists(url, cb){
                                                                                        $n.ajax({
                                                                                            url:      url,
                                                                                            dataType: 'text',
                                                                                            type:     'GET',
                                                                                            complete:  function(xhr){
                                                                                                if(typeof cb === 'function')
                                                                                                   cb.apply(this, [xhr.status]);
                                                                                            }
                                                                                        });
                                                                                    }

                                                                                    function getDailyMotionId(url) {
                                                                                        var m = url.match(/^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/);
                                                                                        if (m !== null) {
                                                                                            if(m[4] !== undefined) {
                                                                                                return m[4];
                                                                                            }
                                                                                            return m[2];
                                                                                        }
                                                                                        return null;
                                                                                    }


                                                                                    $n(document).ready(function() {


                                                                                    $n("input:radio[name=vtype]").click(function() {

                                                                                            
                                                                                            var value = $n(this).val();
                                                                                            $n("#fromval").html(" from " + value);
                                                                                            
                                                                                            if(value=='html5'){
                                                                                                
                                                                                                $n("#vurl_").hide();
                                                                                                $n("#vhtml5").show();
                                                                                                $n("#videoFromExternalSite").hide();
                                                                                                $n("#or__").hide();
                                                                                            }
                                                                                            else{
                                                                                                
                                                                                                 $n("#vurl_").show();
                                                                                                 $n("#vhtml5").hide();
                                                                                                 $n("#videoFromExternalSite").show();
                                                                                                 $n("#or__").show();
                                                                                            }
                                                                                    });

                                                                                    $n("#videoFromExternalSite").click(function() {


                                                                                    var videoService = $n('input[name="vtype"]:checked').length;
                                                                                            var videourlVal = $n.trim($n("#videourl").val());
                                                                                            var flag = true;
                                                                                            if (videourlVal == '' && videoService == 0){

                                                                                    alert('Please select video site.\nPlease enter video url.');
                                                                                            $n("input:radio[name=vtype]").focus();
                                                                                            flag = false;

                                                                                    }
                                                                                    else if (videoService == 0){

                                                                                    alert('Please select video site.');
                                                                                            $n("input:radio[name=vtype]").focus();
                                                                                            flag = false;
                                                                                    }
                                                                                    else if (videourlVal == ''){

                                                                                    alert('Please enter video url.');
                                                                                            $n("#videourl").focus();
                                                                                            flag = false;
                                                                                    }

                                                                                    if (flag){

                                                                                        setTimeout(function() {
                                                                                                 $n("#loading_img").show();   
                                                                                                }, 100);

                                                                                            var selectedRadio = $n('input[name=vtype]');
                                                                                            var checkedValueRadio = selectedRadio.filter(':checked').val();
                                                                                            if (checkedValueRadio == 'youtube') {
                                                                                            var vId = GetParameterValues('v', videourlVal);
                                                                                            if(vId!=''){


                                                                                             var tumbnailImg='https://img.youtube.com/vi/'+vId+'/maxresdefault.jpg';

                                                                                             var data = {
                                                                                                                'action': 'vgwt_check_file_exist_gallery',
                                                                                                                'url': tumbnailImg,
                                                                                                                'vNonce':'<?php echo $vNonce; ?>'
                                                                                                        };

                                                                                                        $n.post(ajaxurl, data, function(response) {



                                                                                                      var youtubeJsonUri='https://www.youtube.com/oembed?url=https://www.youtube.com/watch%3Fv='+vId+'&format=json';
                                                                                                       var data_youtube = {
                                                                                                                'action': 'vgwt_get_youtube_info_gallery',
                                                                                                                'url': youtubeJsonUri,
                                                                                                                'vid':vId,
                                                                                                                 'vNonce':'<?php echo $vNonce; ?>'
                                                                                                        };

                                                                                                      $n.post(ajaxurl, data_youtube, function(data) {

                                                                                                       data = $n.parseJSON(data);

                                                                                                       if(typeof data =='object'){    
                                                                                                               if(typeof data =='object'){ 

                                                                                                                    if(data.title!='' && data.title!=''){
                                                                                                                        $n("#title").val(data.title); 
                                                                                                                    }
                                                                                                                   
                                                                                                                    if(response=='404' && data.thumbnail_url!=''){
                                                                                                                         tumbnailImg=data.thumbnail_url;
                                                                                                                    }
                                                                                                                    else{
                                                                                                                         tumbnailImg='https://img.youtube.com/vi/'+vId+'/0.jpg';
                                                                                                                     }

                                                                                                                    $n("#img_disp").attr('src', tumbnailImg);
                                                                                                                    $n("#HdnMediaSelection").val(tumbnailImg);
                                                                                                                    $n("#loading_img").hide();

                                                                                                               }

                                                                                                            }
                                                                                                           $n("#loading_img").hide();
                                                                                                       })  


                                                                                                        });

                                                                                            }
                                                                                            else{
                                                                                                alert('Could not found such video');
                                                                                                $n("#loading_img").hide();
                                                                                            }
                                                                                        }
                                                                                        
                                                                                        else if(checkedValueRadio == 'metacafe'){

                                                                                                 $n("#loading_img").show();
                                                                                                 var data = {
                                                                                                                'action': 'vgwt_get_metacafe_info_gallery',
                                                                                                                'url': videourlVal,
                                                                                                                'vNonce':'<?php echo $vNonce; ?>'
                                                                                                        };

                                                                                                        $n.post(ajaxurl, data,function(response) {

                                                                                                                obj = $n.parseJSON(response);	
                                                                                                            $n("#HdnMediaSelection").val(obj.HdnMediaSelection);
                                                                                                            $n("#title").val($n.trim(obj.videotitle));
                                                                                                            $n("#img_disp").attr('src', obj.HdnMediaSelection);
                                                                                                            $n("#loading_img").hide();
                                                                                                });	  


                                                                                        } 
                                                                                        else if(checkedValueRadio == 'dailymotion'){

                                                                                                var vid=getDailyMotionId(videourlVal);	
                                                                                                var apiUrl='https://api.dailymotion.com/video/'+vid+'?fields=description,id,thumbnail_720_url,title';
                                                                                                $n.getJSON( apiUrl, function( data ) {
                                                                                                         if(typeof data =='object'){    


                                                                                                                 $n("#HdnMediaSelection").val(data.thumbnail_720_url);	
                                                                                                                 $n("#title").val($n.trim(data.title));
                                                                                                                 $n("#img_disp").attr('src', data.thumbnail_720_url);
                                                                                                                 $n("#loading_img").hide();
                                                                                                         }	 
                                                                                                         $n("#loading_img").hide(); 
                                                                                                })	


                                                                                                 $n("#loading_img").hide();
                                                                                        }          

                                                                                        $n("#loading_img").hide();
                                                                                    }

                                                                                     setTimeout(function() {
                                                                                                 $n("#loading_img").hide();   
                                                                                         }, 2000);

                                                                                    });
                                                                                            //uploading files variable
                                                                                            
                                                                                  
                                                                                 
                                                                                    
                                                                                  
                                                                                  
                                                                                  var custom_file_frame;
                                                                                  $n("#myMediaUploader").click(function(event) {
                                                                                    event.preventDefault();
                                                                                            //If the frame already exists, reopen it
                                                                                            if (typeof (custom_file_frame) !== "undefined") {
                                                                                    custom_file_frame.close();
                                                                                    }

                                                                                    //Create WP media frame.
                                                                                    custom_file_frame = wp.media.frames.customHeader = wp.media({
                                                                                    //Title of media manager frame
                                                                                    title: "WP Media Uploader",
                                                                                            library: {
                                                                                            type: 'image'
                                                                                            },
                                                                                            button: {
                                                                                            //Button text
                                                                                            text: "Set Image"
                                                                                            },
                                                                                            //Do not allow multiple files, if you want multiple, set true
                                                                                            multiple: false
                                                                                    });
                                                                                            //callback for selected image
                                                                                            custom_file_frame.on('select', function() {

                                                                                        var attachment = custom_file_frame.state().get('selection').first().toJSON();
                                                                                        var validExtensions = new Array();
                                                                                        validExtensions[1] = 'jpg';
                                                                                        validExtensions[2] = 'jpeg';
                                                                                        validExtensions[3] = 'png';
                                                                                        validExtensions[4] = 'gif';
                                                                                       
                                                                                        var inarr = parseInt($n.inArray(attachment.subtype, validExtensions));
                                                                                          if (inarr > 0 && attachment.type.toLowerCase() == 'image'){

                                                                                            var titleTouse = "";
                                                                                            var imageDescriptionTouse = "";
                                                                                             if ($n.trim(attachment.title) != ''){

                                                                                                 titleTouse = $n.trim(attachment.title);
                                                                                            }
                                                                                            else if ($n.trim(attachment.caption) != ''){

                                                                                                titleTouse = $n.trim(attachment.caption);
                                                                                            }

                                                                                            if ($n.trim(attachment.description) != ''){

                                                                                               imageDescriptionTouse = $n.trim(attachment.description);
                                                                                            }
                                                                                            else if ($n.trim(attachment.caption) != ''){

                                                                                            imageDescriptionTouse = $n.trim(attachment.caption);
                                                                                            }

                                                                                           // $n("#videotitle").val(titleTouse);
                                                                                          //  $n("#video_description").val(imageDescriptionTouse);

                                                                                            if (attachment.id != ''){

                                                                                                      $n("#HdnMediaSelection").val(attachment.url);
                                                                                                      $n("#img_disp").attr('src', attachment.url);

                                                                                                }

                                                                                            }
                                                                                            else{

                                                                                              alert("<?php echo __('Invalid image selection.','video-slider-with-thumbnails');?>");
                                                                                            }
                                                                                            //do something with attachment variable, for example attachment.filename
                                                                                            //Object:
                                                                                            //attachment.alt - image alt
                                                                                            //attachment.author - author id
                                                                                            //attachment.caption
                                                                                            //attachment.dateFormatted - date of image uploaded
                                                                                            //attachment.description
                                                                                            //attachment.editLink - edit link of media
                                                                                            //attachment.filename
                                                                                            //attachment.height
                                                                                            //attachment.icon - don't know WTF?))
                                                                                            //attachment.id - id of attachment
                                                                                            //attachment.link - public link of attachment, for example ""http://site.com/?attachment_id=115""
                                                                                            //attachment.menuOrder
                                                                                            //attachment.mime - mime type, for example image/jpeg"
                                                                                            //attachment.name - name of attachment file, for example "my-image"
                                                                                            //attachment.status - usual is "inherit"
                                                                                            //attachment.subtype - "jpeg" if is "jpg"
                                                                                            //attachment.title
                                                                                            //attachment.type - "image"
                                                                                            //attachment.uploadedTo
                                                                                            //attachment.url - http url of image, for example "http://site.com/wp-content/uploads/2012/12/my-image.jpg"
                                                                                            //attachment.width
                                                                                            });
                                                                                            //Open modal
                                                                                            custom_file_frame.open();
                                                                                      });
                                                                                    })
                                                                                 </script>
										</div>
									</div>
                                                                        <div class="stuffbox" id="namediv" style="width: 100%">
										<h3>
											<label for="link_name"><?php echo __('Video Title','video-slider-with-thumbnails');?> 
											</label>
										</h3>
										<div class="inside">
											<div>
												<input type="text" id="title" tabindex="1" size="30" name="title" value="<?php echo $videotitle; ?>">
											</div>
											<div style="clear: both"></div>
											<div></div>
											<div style="clear: both"></div>
										</div>
									</div>
									
									
									<div class="stuffbox" id="namediv" style="width: 100%">
										<h3>
											<label for="link_name"> Order (<span
												style="font-size: 11px; font-weight: normal"><?php _e('Media order will used in grid display order'); ?></span>)
											</label>
										</h3>
										<div class="inside">
											<div>
												<input type="text" id="morder" size="30"
													name="morder" value="<?php echo $video_order; ?>"
													style="width: 50px;">
											</div>
											<div style="clear: both"></div>
											<div></div>
											<div style="clear: both"></div>

										</div>
									</div>

									
                                                                        <?php if (isset($_GET['id']) and (int) intval(sanitize_text_field($_GET['id'])) > 0) { ?> 
										 <input type="hidden" name="videoid" id="videoid" value="<?php echo (int) intval(sanitize_text_field($_GET['id'])); ?>">
                                                                         <?php
										}
										?>
                                                                            <?php wp_nonce_field('action_image_add_edit', 'add_edit_image_nonce'); ?>      
                                                                            <input type="submit"
										onclick="" name="btnsave" id="btnsave" value="<?php echo __('Save Changes','video-slider-with-thumbnails');?>"
										class="button-primary">&nbsp;&nbsp;<input type="button"
										name="cancle" id="cancle" value="<?php echo __('Cancel','video-slider-with-thumbnails');?>"
										class="button-primary"
										onclick="location.href = 'admin.php?page=responsive_video_slider_with_thumbnail_media_management'">

								</form>
                                                                   <form method="post" action="" id="addimage_" name="addimage_" enctype="multipart/form-data" style="display:none">
                                                                    
                                                                        <input type="hidden" name="media_type" id="media_type" value="image" />
									 <div class="stuffbox" id="image_info" style="width: 100%;">
										<h3>
											<label for="link_name"><?php echo __('Image Information','video-slider-with-thumbnails');?></label>
										</h3>
										<div class="inside" id="fileuploaddiv">
                                                                                <?php if ($image_name != "") { ?>
                                                                                        <div>
												<b><?php echo __('Current Image','video-slider-with-thumbnails');?> : </b>
												<br/>
												<img id="img_disp_img" name="img_disp_img"
													src="<?php echo esc_url($baseurl . $image_name); ?>" />
											</div>
                                                                                <?php }else{ ?>      
                                                                                            <img
												src="<?php echo plugins_url('/images/no-image-selected.png', __FILE__); ?>"
												id="img_disp_img" name="img_disp_img" />
                                                           
                                                                                     <?php } ?>
                                                                                         <img
												src="<?php echo plugins_url('/images/ajax-loader.gif', __FILE__); ?>"
												style="display: none" id="loading_img" name="loading_img" />
											<div style="clear: both"></div>
											<div></div>
											<div class="uploader">
												
												<div style="clear: both; margin-top: 15px;"></div>
                                                                                                        <a
													href="javascript:;" class="niks_media" id="myMediaUploader_image"><b><?php echo __('Click Here to upload Image','video-slider-with-thumbnails');?></b></a>
                                                                                                    <br /> <br />
												<div>
                                                                                                 <input id="HdnMediaSelection_image" name="HdnMediaSelection_image" type="hidden" value="<?php echo $HdnMediaSelection;?>" />
												</div>
												<div style="clear: both"></div>
												<div></div>
												<div style="clear: both"></div>

												<br />
											</div>
                                                                                </div>
                                                                            
                                                                            <script>
                                                                                 //uploading files variable
                                                                                  var custom_file_frame;
                                                                                  $n("#myMediaUploader_image").click(function(event) {
                                                                                    event.preventDefault();
                                                                                            //If the frame already exists, reopen it
                                                                                   if (typeof (custom_file_frame) !== "undefined") {
                                                                                    custom_file_frame.close();
                                                                                    }

                                                                                    //Create WP media frame.
                                                                                    custom_file_frame = wp.media.frames.customHeader = wp.media({
                                                                                    //Title of media manager frame
                                                                                    title: "WP Media Uploader",
                                                                                            library: {
                                                                                            type: 'image'
                                                                                            },
                                                                                            button: {
                                                                                            //Button text
                                                                                            text: "Set Image"
                                                                                            },
                                                                                            //Do not allow multiple files, if you want multiple, set true
                                                                                            multiple: false
                                                                                    });
                                                                                            //callback for selected image
                                                                                            custom_file_frame.on('select', function() {

                                                                                        var attachment = custom_file_frame.state().get('selection').first().toJSON();
                                                                                        var validExtensions = new Array();
                                                                                        validExtensions[1] = 'jpg';
                                                                                        validExtensions[2] = 'jpeg';
                                                                                        validExtensions[3] = 'png';
                                                                                        validExtensions[4] = 'gif';
                                                                                       
                                                                                        var inarr = parseInt($n.inArray(attachment.subtype, validExtensions));
                                                                                          if (inarr > 0 && attachment.type.toLowerCase() == 'image'){

                                                                                            var titleTouse = "";
                                                                                            var imageDescriptionTouse = "";
                                                                                             if ($n.trim(attachment.title) != ''){

                                                                                                 titleTouse = $n.trim(attachment.title);
                                                                                            }
                                                                                            else if ($n.trim(attachment.caption) != ''){

                                                                                                titleTouse = $n.trim(attachment.caption);
                                                                                            }

                                                                                            if ($n.trim(attachment.description) != ''){

                                                                                               imageDescriptionTouse = $n.trim(attachment.description);
                                                                                            }
                                                                                            else if ($n.trim(attachment.caption) != ''){

                                                                                            imageDescriptionTouse = $n.trim(attachment.caption);
                                                                                            }

                                                                                            $n("#addimage_ #title").val(titleTouse);
                                                                                          
                                                                                            if (attachment.id != ''){

                                                                                                      $n("#HdnMediaSelection_image").val(attachment.url);
                                                                                                      $n("#img_disp_img").attr('src', attachment.url);

                                                                                                }

                                                                                            }
                                                                                            else{

                                                                                              alert("<?php echo __('Invalid image selection.','video-slider-with-thumbnails');?>");
                                                                                            }
                                                                                            //do something with attachment variable, for example attachment.filename
                                                                                            //Object:
                                                                                            //attachment.alt - image alt
                                                                                            //attachment.author - author id
                                                                                            //attachment.caption
                                                                                            //attachment.dateFormatted - date of image uploaded
                                                                                            //attachment.description
                                                                                            //attachment.editLink - edit link of media
                                                                                            //attachment.filename
                                                                                            //attachment.height
                                                                                            //attachment.icon - don't know WTF?))
                                                                                            //attachment.id - id of attachment
                                                                                            //attachment.link - public link of attachment, for example ""http://site.com/?attachment_id=115""
                                                                                            //attachment.menuOrder
                                                                                            //attachment.mime - mime type, for example image/jpeg"
                                                                                            //attachment.name - name of attachment file, for example "my-image"
                                                                                            //attachment.status - usual is "inherit"
                                                                                            //attachment.subtype - "jpeg" if is "jpg"
                                                                                            //attachment.title
                                                                                            //attachment.type - "image"
                                                                                            //attachment.uploadedTo
                                                                                            //attachment.url - http url of image, for example "http://site.com/wp-content/uploads/2012/12/my-image.jpg"
                                                                                            //attachment.width
                                                                                            });
                                                                                            //Open modal
                                                                                            custom_file_frame.open();
                                                                                      });
                                                                                    
                                                                                 </script>
                                                                        </div>
                                                                
                                                                        <div class="stuffbox" id="namediv" style="width: 100%">
										<h3>
											<label for="link_name"><?php echo __('Image Title','video-slider-with-thumbnails');?> 
											</label>
										</h3>
										<div class="inside">
											<div>
												<input type="text" id="title" tabindex="1" size="30" name="title" value="<?php echo $videotitle; ?>">
											</div>
											<div style="clear: both"></div>
											<div></div>
											<div style="clear: both"></div>
										</div>
									</div>
									
                                                                        
									<div class="stuffbox" id="namediv" style="width: 100%">
										<h3>
											<label for="link_name"><?php echo __('Order','video-slider-with-thumbnails');?>  (<span
												style="font-size: 11px; font-weight: normal"><?php echo __('Media order will used in grid display order','video-slider-with-thumbnails');?></span>)
											</label>
										</h3>
										<div class="inside">
											<div>
												<input type="text" id="morder" size="30"
													name="morder" value="<?php echo $video_order; ?>"
													style="width: 50px;">
											</div>
											<div style="clear: both"></div>
											<div></div>
											<div style="clear: both"></div>

										</div>
									</div>

									
                                                                        <?php if (isset($_GET['id']) and intval(sanitize_text_field($_GET['id'])) > 0) { ?> 
										 <input type="hidden" name="imageid" id="imageid" value="<?php echo intval(sanitize_text_field($_GET['id'])); ?>">
                                                                         <?php
										}
										?>
                                                                            <?php wp_nonce_field('action_image_add_edit', 'add_edit_image_nonce'); ?>      
                                                                            <input type="submit"
										onclick="" name="btnsave" id="btnsave" value="<?php echo __('Save Changes','video-slider-with-thumbnails');?>"
										class="button-primary">&nbsp;&nbsp;<input type="button"
										name="cancle" id="cancle" value="<?php echo __('Cancel','video-slider-with-thumbnails');?>"
										class="button-primary"
										onclick="location.href = 'admin.php?page=responsive_video_slider_with_thumbnail_media_management'">

								</form>
                                                                   <form method="post" action="" id="addlink_" name="addlink_" enctype="multipart/form-data" style="display:none">
                                                                    
                                                                        <input type="hidden" name="media_type" id="media_type" value="link" />
									 <div class="stuffbox" id="image_info" style="width: 100%;">
										<h3>
											<label for="link_name"><?php echo __('Image Information','video-slider-with-thumbnails');?></label>
										</h3>
										<div class="inside" id="fileuploaddiv">
                                                                                <?php if ($image_name != "") { ?>
                                                                                        <div>
												<b><?php echo __('Current Image','video-slider-with-thumbnails');?>: </b>
												<br/>
												<img id="img_disp_link" name="img_disp_link"
													src="<?php echo esc_url($baseurl . $image_name); ?>" />
											</div>
                                                                                <?php }else{ ?>      
                                                                                            <img
												src="<?php echo plugins_url('/images/no-image-selected.png', __FILE__); ?>"
												id="img_disp_link" name="img_disp_link" />
                                                           
                                                                                     <?php } ?>
                                                                                         <img
												src="<?php echo plugins_url('/images/ajax-loader.gif', __FILE__); ?>"
												style="display: none" id="loading_img" name="loading_img" />
											<div style="clear: both"></div>
											<div></div>
											<div class="uploader">
												
												<div style="clear: both; margin-top: 15px;"></div>
                                                                                                        <a href="javascript:;" class="niks_media" id="myMediaUploader_link"><b><?php echo __('Click Here to upload Image','video-slider-with-thumbnails');?></b></a>
                                                                                                    <br /> <br />
												<div>
                                                                                                 <input id="HdnMediaSelection_link" name="HdnMediaSelection_link" type="hidden" value="<?php echo $HdnMediaSelection;?>" />
												</div>
												<div style="clear: both"></div>
												<div></div>
												<div style="clear: both"></div>

												<br />
											</div>
                                                                                </div>
                                                                            
                                                                            <script>
                                                                                 //uploading files variable
                                                                                  var custom_file_frame;
                                                                                  $n("#myMediaUploader_link").click(function(event) {
                                                                                    event.preventDefault();
                                                                                            //If the frame already exists, reopen it
                                                                                   if (typeof (custom_file_frame) !== "undefined") {
                                                                                    custom_file_frame.close();
                                                                                    }

                                                                                    //Create WP media frame.
                                                                                    custom_file_frame = wp.media.frames.customHeader = wp.media({
                                                                                    //Title of media manager frame
                                                                                    title: "WP Media Uploader",
                                                                                            library: {
                                                                                            type: 'image'
                                                                                            },
                                                                                            button: {
                                                                                            //Button text
                                                                                            text: "Set Image"
                                                                                            },
                                                                                            //Do not allow multiple files, if you want multiple, set true
                                                                                            multiple: false
                                                                                    });
                                                                                            //callback for selected image
                                                                                            custom_file_frame.on('select', function() {

                                                                                        var attachment = custom_file_frame.state().get('selection').first().toJSON();
                                                                                        var validExtensions = new Array();
                                                                                        validExtensions[0] = 'jpg';
                                                                                        validExtensions[1] = 'jpeg';
                                                                                        validExtensions[2] = 'png';
                                                                                        validExtensions[3] = 'gif';
                                                                                       
                                                                                        var inarr = parseInt($n.inArray(attachment.subtype, validExtensions));
                                                                                          if (inarr > 0 && attachment.type.toLowerCase() == 'image'){

                                                                                            var titleTouse = "";
                                                                                            var imageDescriptionTouse = "";
                                                                                             if ($n.trim(attachment.title) != ''){

                                                                                                 titleTouse = $n.trim(attachment.title);
                                                                                            }
                                                                                            else if ($n.trim(attachment.caption) != ''){

                                                                                                titleTouse = $n.trim(attachment.caption);
                                                                                            }

                                                                                            if ($n.trim(attachment.description) != ''){

                                                                                               imageDescriptionTouse = $n.trim(attachment.description);
                                                                                            }
                                                                                            else if ($n.trim(attachment.caption) != ''){

                                                                                            imageDescriptionTouse = $n.trim(attachment.caption);
                                                                                            }

                                                                                            $n("#addlink_ #title").val(titleTouse);
                                                                                         
                                                                                            if (attachment.id != ''){

                                                                                                      $n("#HdnMediaSelection_link").val(attachment.url);
                                                                                                      $n("#img_disp_link").attr('src', attachment.url);

                                                                                                }

                                                                                            }
                                                                                            else{

                                                                                              alert("<?php echo __('Invalid image selection.','video-slider-with-thumbnails');?>");
                                                                                            }
                                                                                            //do something with attachment variable, for example attachment.filename
                                                                                            //Object:
                                                                                            //attachment.alt - image alt
                                                                                            //attachment.author - author id
                                                                                            //attachment.caption
                                                                                            //attachment.dateFormatted - date of image uploaded
                                                                                            //attachment.description
                                                                                            //attachment.editLink - edit link of media
                                                                                            //attachment.filename
                                                                                            //attachment.height
                                                                                            //attachment.icon - don't know WTF?))
                                                                                            //attachment.id - id of attachment
                                                                                            //attachment.link - public link of attachment, for example ""http://site.com/?attachment_id=115""
                                                                                            //attachment.menuOrder
                                                                                            //attachment.mime - mime type, for example image/jpeg"
                                                                                            //attachment.name - name of attachment file, for example "my-image"
                                                                                            //attachment.status - usual is "inherit"
                                                                                            //attachment.subtype - "jpeg" if is "jpg"
                                                                                            //attachment.title
                                                                                            //attachment.type - "image"
                                                                                            //attachment.uploadedTo
                                                                                            //attachment.url - http url of image, for example "http://site.com/wp-content/uploads/2012/12/my-image.jpg"
                                                                                            //attachment.width
                                                                                            });
                                                                                            //Open modal
                                                                                            custom_file_frame.open();
                                                                                      });
                                                                                    
                                                                                 </script>
                                                                        </div>
                                                                
                                                                        <div class="stuffbox" id="namediv" style="width: 100%">
										<h3>
											<label for="link_name"><?php echo __('Link Title','video-slider-with-thumbnails');?> (<span style="font-size: 11px; font-weight: normal"><?php echo __('Used into Caption','video-slider-with-thumbnails');?></span>)
											</label>
										</h3>
										<div class="inside">
											<div>
												<input type="text" id="title" tabindex="1" size="30" name="title" value="<?php echo $videotitle; ?>">
											</div>
											<div style="clear: both"></div>
											<div></div>
											<div style="clear: both"></div>
										</div>
									</div>
									
                                                                    
									<div class="stuffbox" id="namediv" style="width: 100%">
										<h3>
											<label for="link_name"> <?php echo __('Order','video-slider-with-thumbnails');?> (<span
												style="font-size: 11px; font-weight: normal"><?php echo __('Media order will used in grid display order','video-slider-with-thumbnails');?></span>)
											</label>
										</h3>
										<div class="inside">
											<div>
												<input type="text" id="morder" size="30"
													name="morder" value="<?php echo $video_order; ?>"
													style="width: 50px;">
											</div>
											<div style="clear: both"></div>
											<div></div>
											<div style="clear: both"></div>

										</div>
									</div>
                                                                        <div class="stuffbox" id="namediv" style="width: 100%">
										<h3>
											<label><?php echo __('Open Link In New Tab?','video-slider-with-thumbnails');?> (<span
												style="font-size: 11px; font-weight: normal"><?php echo __('Open Link In New Tab ?','video-slider-with-thumbnails');?></span>)
											</label>
										</h3>
										<div class="inside">
											<table>
												<tr>
													<td>
														<div>
															<input type="checkbox" id="open_title_link_in"
																size="30" name="open_title_link_in" value=""
																<?php
																	if ($open_title_link_in == true) {
																		echo "checked='checked'";
																	}
																	?>
																style="width: 20px;">&nbsp;<?php echo __('Open Link In New Tab ?','video-slider-with-thumbnails');?>
														</div>
														<div style="clear: both"></div>
														<div></div>
													</td>
												</tr>
											</table>
											<div style="clear: both"></div>
										</div>
									</div>
                                                                        <?php if (isset($_GET['id']) and (int) intval(sanitize_text_field($_GET['id'])) > 0) { ?> 
										 <input type="hidden" name="linkid" id="linkid" value="<?php echo (int) intval(sanitize_text_field($_GET['id'])); ?>">
                                                                         <?php
										}
										?>
                                                                            <?php wp_nonce_field('action_image_add_edit', 'add_edit_image_nonce'); ?>      
                                                                            <input type="submit"
										onclick="" name="btnsave" id="btnsave" value="<?php echo __('Save Changes','video-slider-with-thumbnails');?>"
										class="button-primary">&nbsp;&nbsp;<input type="button"
										name="cancle" id="cancle" value="<?php echo __('Cancel','video-slider-with-thumbnails');?>"
										class="button-primary"
										onclick="location.href = 'admin.php?page=responsive_video_slider_with_thumbnail_media_management'">

								</form>
								<script type="text/javascript">

                                                                    var $n = jQuery.noConflict();
                                                                    $n(document).ready(function() {

                                                                     $n.validator.setDefaults({ 
                                                                         ignore: [],
                                                                         // any other default options and/or rules
                                                                     });

                                                                     $n("#addvideo").validate({
                                                                     rules: {
                                                                     videotitle: {
                                                                     required:true,
                                                                             maxlength: 200
                                                                     },
                                                                             vtype: {
                                                                             required:true

                                                                             },
                                                                             videourl: {
                                                                                required: function(element) {
                                                                                   return $n("#type_html5").is(':checked')==0;
                                                                                    },
                                                                                   maxlength: 500
                                                                             },
                                                                             HdnMediaSelection:{
                                                                               required:true  
                                                                             },
                                                                             videotitleurl: {

                                                                             /*url:true,*/
                                                                              maxlength: 500
                                                                             },
                                                                             morder:{
                                                                                digits:true,
                                                                                maxlength:15
                                                                             },
                                                                             html5_vid: {
                                                                                required: function(element) {
                                                                                    
                                                                                   return $n("#type_html5").is(':checked')==1;
                                                                                 }

                                                                           }
                                                                             
                                                                            
                                                                            },
                                                                             errorClass: "image_error",
                                                                             errorPlacement: function(error, element) {
                                                                             error.appendTo(element.parent().next().next());
                                                                             }, messages: {
                                                                                 HdnMediaSelection: "Please select video thumbnail or Upload by wordpress media uploader.",

                                                                             }

                                                                         })
                                                                         
                                                                         
                                                                           $n("#addimage_").validate({
                                                                            rules: {
                                                                             HdnMediaSelection_image:{
                                                                               required:true  
                                                                             },
                                                                             
                                                                             morder:{
                                                                                digits:true,
                                                                                maxlength:15
                                                                             }
                                                                            
                                                                           
                                                                            },
                                                                             errorClass: "image_error",
                                                                             errorPlacement: function(error, element) {
                                                                             error.appendTo(element.parent().next().next());
                                                                             }, messages: {
                                                                                 HdnMediaSelection: "Please select image thumbnail or Upload by wordpress media uploader.",

                                                                             }

                                                                         })
                                                                           $n("#addlink_").validate({
                                                                            rules: {
                                                                             HdnMediaSelection_link:{
                                                                               required:true  
                                                                             },
                                                                           
                                                                             morder:{
                                                                                digits:true,
                                                                                maxlength:15
                                                                             }
                                                                            },
                                                                             errorClass: "image_error",
                                                                             errorPlacement: function(error, element) {
                                                                             error.appendTo(element.parent().next().next());
                                                                             }, messages: {
                                                                                 HdnMediaSelection: "Please select link thumbnail or Upload by wordpress media uploader.",

                                                                             }

                                                                         
                                                                         
                                                                       })
                                                                           
                                                                         
                                                                     });
                                                                     
                                                                   
                                                                 </script>

							</div>
                                                        <div id="postbox-container-1" class="postbox-container" > 
					
					          <div class="postbox"> 
					              <h3 class="hndle"><span></span>Access All Themes In One Price</h3> 
					              <div class="inside">
					                  <center><a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=11715_0_1_10" target="_blank"><img border="0" src="<?php echo plugins_url( 'images/300x250.gif', __FILE__ );?>" width="250" height="250"></a></center>
					
					                  <div style="margin:10px 5px">
					
					                  </div>
					              </div></div>
					          <div class="postbox"> 
					              <h3 class="hndle"><span></span>Best WordPress Themes</h3> 
					              
					              <div class="inside">
                                                          <center><a atarget="_blank" href="https://mythemeshop.com/?ref=nik_gandhi007"><img src="<?php echo plugins_url( 'images/300x250.png', __FILE__ );?>" width="250" height="250" border="0"></a></center>
					                  <div style="margin:10px 5px">
					                  </div>
					              </div></div>
					
					      </div> 
						</div>
					</div>
				</div>
			</div>
<?php
		}
	} else if (strtolower ( $action ) == strtolower ( 'delete' )) {
		
             $retrieved_nonce = '';

              if(isset($_GET['nonce']) and $_GET['nonce']!=''){

                  $retrieved_nonce=$_GET['nonce'];

              }
              if (!wp_verify_nonce($retrieved_nonce, 'delete_image' ) ){


                  wp_die('Security check fail'); 
              }

		$uploads = wp_upload_dir ();
		$baseDir = $uploads ['basedir'];
		$baseDir = str_replace ( "\\", "/", $baseDir );
		$pathToImagesFolder = $baseDir . '/video-slider-with-thumbnails';
		
		
		
		$location = "admin.php?page=responsive_video_slider_with_thumbnail_media_management";
		$deleteId = (int) intval(sanitize_text_field($_GET ['id']));
		
		try {
			
			$query = "SELECT * FROM " . $wpdb->prefix . "e_gallery WHERE id=$deleteId ";
			$myrow = $wpdb->get_row ( $query );
			$settings=get_option('vgwt_video_slider_settings'); 
                        $imageheight = intval($settings ['imageheight']);
                        $imagewidth = intval($settings ['imagewidth']);

			if (is_object ( $myrow )) {
				
                             
				$image_name = $myrow->image_name;
				$wpcurrentdir = dirname ( __FILE__ );
				$wpcurrentdir = str_replace ( "\\", "/", $wpcurrentdir );
				$imagetoDel = $pathToImagesFolder . '/' . $image_name;
                                $pInfo = pathinfo ( $myrow->HdnMediaSelection );
                                $pInfo2 = pathinfo ( $imagetoDel );
                                $ext = $pInfo2 ['extension'];
						
				@unlink ( $imagetoDel );
                                @unlink($pathToImagesFolder.'/'.$pInfo2['filename'] . '_'.$imageheight.'_'.$imagewidth.'.'.$ext);
				
				$query = "delete from  " . $wpdb->prefix . "e_gallery where id=$deleteId  ";
				$wpdb->query ( $query );
				
				$wp_vgallery_thumbnail_msg = array ();
				$wp_vgallery_thumbnail_msg ['type'] = 'succ';
				$wp_vgallery_thumbnail_msg ['message'] =  __('Video deleted successfully.','video-slider-with-thumbnails');
				update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
			}
		} catch ( Exception $e ) {
			
			$wp_vgallery_thumbnail_msg = array ();
			$wp_vgallery_thumbnail_msg ['type'] = 'err';
			$wp_vgallery_thumbnail_msg ['message'] =  __('Error while deleting video.','video-slider-with-thumbnails');
			update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
		}
		
		echo "<script type='text/javascript'> location.href='$location';</script>";
		exit ();
	} else if (strtolower ( $action ) == strtolower ( 'deleteselected' )) {
		
                if(!check_admin_referer('action_settings_mass_delete','mass_delete_nonce')){

                        wp_die('Security check fail'); 
                  }

		
		$location = "admin.php?page=responsive_video_slider_with_thumbnail_media_management";
		
		if (isset ( $_POST ) and isset ( $_POST ['deleteselected'] ) and (sanitize_text_field($_POST ['action']) == 'delete' or sanitize_text_field($_POST ['action_upper']) == 'delete')) {
			
			$uploads = wp_upload_dir ();
			$baseDir = $uploads ['basedir'];
			$baseDir = str_replace ( "\\", "/", $baseDir );
			$pathToImagesFolder = $baseDir . '/video-slider-with-thumbnails';
			
			if (sizeof ( $_POST ['thumbnails'] ) > 0) {
				
				$deleteto = sanitize_text_field($_POST ['thumbnails']);
				$implode = implode ( ',', $deleteto );
				
				try {
					
					foreach ( $deleteto as $img ) {
						
                                                $img=intval($img);
						$query = "SELECT * FROM " . $wpdb->prefix . "e_gallery WHERE id=$img";
						$myrow = $wpdb->get_row ( $query );
                                                
                                                $settings=get_option('vgwt_video_slider_settings'); 
                                                $imageheight = $settings ['imageheight'];
                                                $imagewidth = $settings ['imagewidth'];

						
						if (is_object ( $myrow )) {
							
							$image_name = $myrow->image_name ;
							$wpcurrentdir = dirname ( __FILE__ );
							$wpcurrentdir = str_replace ( "\\", "/", $wpcurrentdir );
							$imagetoDel = $pathToImagesFolder . '/' . $image_name;
							
                                                        $pInfo = pathinfo ( $myrow->HdnMediaSelection );
                                                        $pInfo2 = pathinfo ( $imagetoDel );
                                                        $ext = $pInfo2 ['extension'];
							
                                                        @unlink ( $imagetoDel );
                                                        @unlink($pathToImagesFolder.'/'.$pInfo2['filename'] . '_'.$imageheight.'_'.$imagewidth.'.'.$ext);
				
							
							$query = "delete from  " . $wpdb->prefix . "e_gallery where id=$img ";
							$wpdb->query ( $query );
							
							$wp_vgallery_thumbnail_msg = array ();
							$wp_vgallery_thumbnail_msg ['type'] = 'succ';
							$wp_vgallery_thumbnail_msg ['message'] = __('selected videos deleted successfully.','video-slider-with-thumbnails');
							update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
						}
					}
				} catch ( Exception $e ) {
					
					$wp_vgallery_thumbnail_msg = array ();
					$wp_vgallery_thumbnail_msg ['type'] = 'err';
					$wp_vgallery_thumbnail_msg ['message'] = __('Error while deleting videos.','video-slider-with-thumbnails');
					update_option ( 'wp_vgallery_thumbnail_msg', $wp_vgallery_thumbnail_msg );
				}
				
				echo "<script type='text/javascript'> location.href='$location';</script>";
				exit ();
			} else {
				
				echo "<script type='text/javascript'> location.href='$location';</script>";
				exit ();
			}
		} else {
			
			echo "<script type='text/javascript'> location.href='$location';</script>";
			exit ();
		}
	}
}


function vgwt_responsive_video_slider_with_thumbnail_media_preview_func(){

        global $wpdb;
        
        $settings=get_option('vgwt_video_slider_settings');         

        $location="admin.php?page=responsive_video_slider_with_thumbnail_media_preview"; 
        
        $uploads = wp_upload_dir ();
        $baseDir = $uploads ['basedir'];
        $baseDir = str_replace ( "\\", "/", $baseDir );
        $pathToImagesFolder = $baseDir . '/video-slider-with-thumbnails';
        
        $baseurl=$uploads['baseurl'];
        $baseurl.='/video-slider-with-thumbnails/';


    ?>     
               
    <div style="">  
        <div style="">
            <div class="wrap">
                 <table><tr><td><a href="https://twitter.com/FreeAdsPost" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @FreeAdsPost</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></td>
                        <td>
                            <a target="_blank" title="Donate" href="http://i13websolution.com/donate-wordpress_image_thumbnail.php">
                                <img id="help us for free plugin" height="30" width="90" src="<?php echo plugins_url( 'images/paypaldonate.jpg', __FILE__ );?>" border="0" alt="help us for free plugin" title="help us for free plugin">
                                </a>
                            </td>
                        </tr>
                    </table>
                    <div style="clear:both">
                       <span><h3 style="color: blue;"><a target="_blank" href="http://www.i13websolution.com/wordpress-video-slider-plugin-pro.html">UPGRADE TO PRO VERSION</a></h3></span>
                   </div> 
                <h2><?php __('Slider Preview','video-slider-with-thumbnails');?></h2>
                <br>

                <?php
                    $wpcurrentdir=dirname(__FILE__);
                    $wpcurrentdir=str_replace("\\","/",$wpcurrentdir);


                ?>
                
                <?php $slider_id_html=time().rand(0,5000);?>
                <?php if(is_array($settings)){?>
                    <div id="poststuff">
                        <div id="post-body" class="metabox-holder columns-2">
                            <div id="post-body-content">
                                <div style="clear: both;"></div>
                                <?php $url = plugin_dir_url(__FILE__);  ?>
                                <div id="divSliderMain_admin" style="max-width:<?php echo intval($settings['panel_width']);?>px;">
                                    <ul id="<?php echo $slider_id_html;?>">
                                        <?php
                                            global $wpdb;
                                            $query="SELECT * FROM ".$wpdb->prefix."e_gallery  order by morder,createdon desc";
                                            $rows=$wpdb->get_results($query,'ARRAY_A');

                                            if(count($rows) > 0){
                                                foreach($rows as $row){

                                                        
                                                        $imageheight=intval($settings['panel_height']);
                                                        $imagewidth=intval($settings['panel_width']);
                                                        $imagename=$row['image_name'];
                                                        $imageUploadTo=$pathToImagesFolder.'/'.$imagename;
                                                        $imageUploadTo=str_replace("\\","/",$imageUploadTo);
                                                        $pathinfo=pathinfo($imageUploadTo);
                                                        $filenamewithoutextension=$pathinfo['filename'];
                                                        $outputimg="";
                                                        $media_type=esc_html($row['media_type']);
                                                        $vtype=esc_html($row['vtype']);

                                                        $video_url = esc_url($row ['videourl']);
                                                        $Url_vid = @parse_url($row ['videourl']);

                                                         $relend = '';
                                                         $flag=false;
                                                            if (isset($Url_vid['query']) and $Url_vid['query'] != '') {


                                                                parse_str($Url_vid['query'], $get_array);
                                                                if(is_array($get_array) and sizeof($get_array)>0){

                                                                   foreach($get_array as $k=>$v){

                                                                       if($flag==false){

                                                                           $flag=true;
                                                                           $relend.="?$k=$v";
                                                                       }
                                                                       else{

                                                                           $relend.="&$k=$v";

                                                                       }


                                                                   } 


                                                                }



                                                            }

                                                        $embed_url=esc_url($row['embed_url']).$relend;    
                                                        if($settings['panel_scale']=='fit'){

                                                             $outputimg = esc_url($baseurl.$imagename);

                                                        }else{

                                                            list($width, $height) = getimagesize(esc_url($pathToImagesFolder."/".$row['image_name']));
                                                            if($width<$imagewidth){
                                                                $imagewidth=$width;
                                                            }

                                                            if($height<$imageheight){

                                                                $imageheight=$height;
                                                            }

                                                            $imagetoCheck=$pathToImagesFolder.'/'.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.$pathinfo['extension'];
                                                            $imagetoCheckSmall=$pathToImagesFolder.'/'.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.strtolower($pathinfo['extension']);

                                                            if(file_exists($imagetoCheck)){

                                                                 $outputimg = $baseurl.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.$pathinfo['extension'];

                                                              }
                                                            else if(file_exists($imagetoCheckSmall)){
                                                                $outputimg = $baseurl.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.strtolower($pathinfo['extension']);
                                                            }
                                                            else{

                                                                if(file_exists($pathToImagesFolder."/".$row['image_name'])){

                                                                    
                                                                    $resizeObj = new vgwt_resize($pathToImagesFolder."/".$row['image_name']); 
                                                                    $resizeObj -> resizeImage($imagewidth, $imageheight, "exact"); 
                                                                    $resizeObj -> saveImage($pathToImagesFolder."/".$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.$pathinfo['extension'], 100); 
                                                                    //$outputimg = plugin_dir_url(__FILE__)."imagestoscroll/".$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.$pathinfo['extension'];

                                                                     if(file_exists($imagetoCheck)){
                                                                        $outputimg = $baseurl.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.$pathinfo['extension'];
                                                                    }
                                                                    else if(file_exists($imagetoCheckSmall)){
                                                                        $outputimg = $baseurl.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.strtolower($pathinfo['extension']);
                                                                    }

                                                                }else{

                                                                    $outputimg = esc_url($baseurl.$imagename);
                                                                }   

                                                            }

                                                        }   

                                                        


                                                    ?>         
                                                    <li><img data-poster="<?php echo esc_url($outputimg);?>"  data-vurl="<?php echo esc_url($embed_url);?>"   data-vtype='<?php echo $vtype;?>'  data-media="<?php echo $media_type;?>" src="<?php echo esc_url($outputimg);?>"  <?php if(trim($row['title'])!=''):?> title="<?php echo trim(esc_html($row['title']));?>" <?php else:?> title=" " <?php endif;?>  data-description=""   /></li> 

                                                    <?php }?>      

                                            <?php }?>   
                                    </ul>
                                    
                                </div>

                                <script type="text/javascript">

                                    $j= jQuery.noConflict();
                                    $j(document).ready(function() {

                                            <?php $galRandNo=rand(0,13313); ?> 
                                            var galleryItems<?php echo $galRandNo;?>;
                                            $j(function(){
                                                    galleryItems<?php echo $galRandNo;?> = $j("#<?php echo $slider_id_html;?>");

                                                    var galleryItemDivs = $j('#divSliderMain_admin');

                                                    galleryItems<?php echo $galRandNo;?>.each(function (index, item){
                                                            item.parent_data = $j(item).parent("#divSliderMain_admin");
                                                    });



                                                    galleryItemDivs.each(function(index, item){   
                                                            $j("ul",this).galleryViewV({

                                                                    transition_speed:<?php echo intval($settings['transition_speed']);?>,         //INT - duration of panel/frame transition (in milliseconds)
                                                                    transition_interval:<?php echo intval($settings['transition_interval']);?>,         //INT - delay between panel/frame transitions (in milliseconds)
                                                                    easing:'swing',                 //STRING - easing method to use for animations (jQuery provides 'swing' or 'linear', more available with jQuery UI or Easing plugin)
                                                                    show_panels:'true',
                                                                    show_panel_nav:<?php echo (intval($settings['show_panel_nav'])==1)?'true':'false' ;?>,             //BOOLEAN - flag to show or hide panel navigation buttons
                                                                    enable_overlays:<?php echo (intval($settings['enable_overlays'])==1)?'true':'false' ;?>,             //BOOLEAN - flag to show or hide panel overlays
                                                                    show_overlays:<?php echo (intval($settings['enable_overlays'])==1)?'true':'false' ;?>,             //BOOLEAN - flag to show or hide frame captions    
                                                                    panel_width:<?php echo intval($settings['panel_width']);?>,                 //INT - width of gallery panel (in pixels)
                                                                    panel_height:<?php echo intval($settings['panel_height']);?>,                 //INT - height of gallery panel (in pixels)
                                                                    panel_animation:'<?php echo esc_html($settings['panel_animation']);?>',         //STRING - animation method for panel transitions (crossfade,fade,slide,none)
                                                                    panel_scale: '<?php echo esc_html($settings['panel_scale']);?>',             //STRING - cropping option for panel images (crop = scale image and fit to aspect ratio determined by panel_width and panel_height, fit = scale image and preserve original aspect ratio)
                                                                    overlay_position:'<?php echo esc_html($settings['overlay_position']);?>',     //STRING - position of panel overlay (bottom, top)
                                                                    pan_images:'false',                //BOOLEAN - flag to allow user to grab/drag oversized images within gallery
                                                                    pan_style:'drag',                //STRING - panning method (drag = user clicks and drags image to pan, track = image automatically pans based on mouse position
                                                                    start_frame:'<?php echo intval($settings['start_frame']);?>',                 //INT - index of panel/frame to show first when gallery loads
                                                                    show_filmstrip:<?php echo (intval($settings['show_filmstrip'])==1)?'true':'false' ;?>,             //BOOLEAN - flag to show or hide filmstrip portion of gallery
                                                                    show_filmstrip_nav:<?php echo (intval($settings['show_filmstrip_nav'])==1)?'true':'false' ;?>,         //BOOLEAN - flag indicating whether to display navigation buttons
                                                                    enable_slideshow:<?php echo (intval($settings['enable_slideshow'])==1)?'true':'false' ;?>,            //BOOLEAN - flag indicating whether to display slideshow play/pause button
                                                                    autoplay:<?php echo (intval($settings['autoplay'])==1)?'true':'false' ;?>,                //BOOLEAN - flag to start slideshow on gallery load
                                                                    show_captions:<?php echo (intval($settings['show_captions'])==1)?'true':'false' ;?>,             //BOOLEAN - flag to show or hide frame captions                                                                       
                                                                    filmstrip_style: '<?php echo esc_html($settings['filmstrip_style']);?>',         //STRING - type of filmstrip to use (scroll = display one line of frames, scroll filmstrip if necessary, showall = display multiple rows of frames if necessary)
                                                                    filmstrip_position:'<?php echo esc_html($settings['filmstrip_position']);?>',     //STRING - position of filmstrip within gallery (bottom, top, left, right)
                                                                    frame_width:<?php echo intval($settings['frame_width']);?>,                 //INT - width of filmstrip frames (in pixels)
                                                                    frame_height:<?php echo intval($settings['frame_height']);?>,                 //INT - width of filmstrip frames (in pixels)
                                                                    frame_opacity:<?php echo floatval($settings['frame_opacity']);?>,             //FLOAT - transparency of non-active frames (1.0 = opaque, 0.0 = transparent)
                                                                    frame_scale: 'crop',             //STRING - cropping option for filmstrip images (same as above)
                                                                    frame_gap:<?php echo intval($settings['frame_gap']);?>,                     //INT - spacing between frames within filmstrip (in pixels)
                                                                    show_infobar:<?php echo (intval($settings['show_infobar'])==1)?'true':'false' ;?>,                //BOOLEAN - flag to show or hide infobar
                                                                    infobar_opacity:<?php echo floatval($settings['infobar_opacity']);?>,               //FLOAT - transparency for info bar
                                                                    link_newwindow: true,
                                                                    filmstrip_size:10,
                                                                    clickable:false
                                                                    

                                                            });     

                                                    }); 

                                            });

                                         
                                          
                                                
                                            //
                                            // Resize the image gallery
                                            //
                                            var oldsize_w<?php echo $galRandNo;?>=<?php echo intval($settings['panel_width']);?>;
                                            var oldsize_h<?php echo $galRandNo;?>=<?php echo intval($settings['panel_height']);?>;

                                            function resizegallery<?php echo $galRandNo;?>(){
                                                if(galleryItems<?php echo $galRandNo;?>==undefined){return;}
                                                galleryItems<?php echo $galRandNo;?>.each(function (index, item){
                                                        var $parent = item.parent_data;

                                                        // width based on parent?
                                                        <?php if((esc_html($settings['filmstrip_position'])=='left' or esc_html($settings['filmstrip_position'])=='right') and esc_html($settings['show_filmstrip'])==1):?>
                                                           var width = ($parent.innerWidth());//2 times 5 pixels margin     
                                                        <?php else:?>
                                                            var width = ($parent.innerWidth()-10);//2 times 5 pixels margin
                                                        <?php endif;?>    
                                                        
                                                        
                                                        var height = ($parent.innerHeight()-10);//2 times 5 pixels margin
                                                        if(oldsize_w<?php echo $galRandNo;?>==width){
                                                            
                                                          //  return;
                                                        }
                                                        oldsize_w<?php echo $galRandNo;?>=width;
                                                        
                                                        thumbfactor = width/(<?php echo intval($settings['panel_width']);?>-10);
                                                        
                                                        var resizeToHeight=width/3*2;
                                                        if(resizeToHeight><?php echo intval($settings['panel_height']);?>){
                                                            resizeToHeight=<?php echo intval($settings['panel_height']);?>;  
                                                        }
                                                        
                                                        
                                                        
                                                        $j(item).resizeGalleryView_video(
                                                            <?php if((esc_html($settings['filmstrip_position'])=='left' or esc_html($settings['filmstrip_position']=='right')) and intval($settings['show_filmstrip'])==1):?>width-(<?php echo intval($settings['frame_width']);?>*thumbfactor)-10,<?php else:?> width,<?php endif;?>
                                                            resizeToHeight, <?php echo intval($settings['frame_width']);?>*thumbfactor, <?php echo intval($settings['frame_height']);?>*thumbfactor);

                                                });
                                            }

                                            var inited<?php echo $galRandNo;?>=false;

                                            function onresize<?php echo $galRandNo;?>(){  
                                                resizegallery<?php echo $galRandNo;?>();
                                                inited<?php echo $galRandNo;?>=true;
                                            }


                                            $j(window).resize(onresize<?php echo $galRandNo;?>);
                                            $j( document ).ready(function() {
                                                    onresize<?php echo $galRandNo;?>();
                                            }); 

                                    });  
                                </script>      
                            </div>
                        </div>      
                    </div>  
                    <div class="clear"></div>
                </div>

                <h3><?php echo __('To print this slider into WordPress Post/Page use below code','video-slider-with-thumbnails');?></h3>
                <input type="text" value='[vgwt_print_responsive_video_slider_with_thumbnail] ' style="width: 400px;height: 30px" onclick="this.focus();this.select()" />
                <div class="clear"></div>
                <h3><?php echo __('To print this slider into WordPress theme/template PHP files use below code','video-slider-with-thumbnails');?></h3>
                <?php
                    $shortcode='[vgwt_print_responsive_video_slider_with_thumbnail]';
                ?>
                <input type="text" value="&lt;?php echo do_shortcode('<?php echo htmlentities($shortcode, ENT_QUOTES); ?>'); ?&gt;" style="width: 400px;height: 30px" onclick="this.focus();this.select()" />
                <div class="clear"></div>

                <?php }?>
        </div>      
    </div>
    <?php }
    

    
function vgwt_print_responsive_video_slider_with_thumbnail_func($atts){

        global $wpdb;
        $settings=get_option('vgwt_video_slider_settings');          
        $rand_Numb=uniqid('gallery_slider');
        $wpcurrentdir=dirname(__FILE__);
        $wpcurrentdir=str_replace("\\","/",$wpcurrentdir);
        $url = plugin_dir_url(__FILE__);
        
        $uploads = wp_upload_dir ();
        $baseDir = $uploads ['basedir'];
        $baseDir = str_replace ( "\\", "/", $baseDir );
        $pathToImagesFolder = $baseDir . '/video-slider-with-thumbnails';

        $baseurl=$uploads['baseurl'];
        $baseurl.='/video-slider-with-thumbnails/';
        
        ob_start();
    ?><!-- vgwt_print_responsive_video_slider_with_thumbnail_func --><div id="divSliderMain_admin_<?php echo $rand_Numb;?>" style="max-width:<?php echo $settings['panel_width'];?>px;">
        <ul id="<?php echo $rand_Numb;?>">
            <?php
                global $wpdb;
                $query="SELECT * FROM ".$wpdb->prefix."e_gallery  order by morder,createdon desc";
                $rows=$wpdb->get_results($query,'ARRAY_A');

                  if(count($rows) > 0){
                      
                      foreach($rows as $row){

                                                        
                                        $imageheight=intval($settings['panel_height']);
                                        $imagewidth=intval($settings['panel_width']);
                                        $imagename=$row['image_name'];
                                        $imageUploadTo=$pathToImagesFolder.'/'.$imagename;
                                        $imageUploadTo=str_replace("\\","/",$imageUploadTo);
                                        $pathinfo=pathinfo($imageUploadTo);
                                        $filenamewithoutextension=$pathinfo['filename'];
                                        $outputimg="";
                                        $media_type=esc_html($row['media_type']);
                                        $vtype=esc_html($row['vtype']);

                                        $video_url = esc_url($row ['videourl']);
                                        $Url_vid = @parse_url($row ['videourl']);

                                         $relend = '';
                                         $flag=false;
                                            if (isset($Url_vid['query']) and $Url_vid['query'] != '') {


                                                parse_str($Url_vid['query'], $get_array);
                                                if(is_array($get_array) and sizeof($get_array)>0){

                                                   foreach($get_array as $k=>$v){

                                                       if($flag==false){

                                                           $flag=true;
                                                           $relend.="?$k=$v";
                                                       }
                                                       else{

                                                           $relend.="&$k=$v";

                                                       }


                                                   } 


                                                }



                                            }

                                        $embed_url=esc_url($row['embed_url']).$relend;    
                                        if($settings['panel_scale']=='fit'){

                                             $outputimg = esc_url($baseurl.$imagename);

                                        }else{

                                            list($width, $height) = getimagesize(esc_url($pathToImagesFolder."/".$row['image_name']));
                                            if($width<$imagewidth){
                                                $imagewidth=$width;
                                            }

                                            if($height<$imageheight){

                                                $imageheight=$height;
                                            }

                                            $imagetoCheck=$pathToImagesFolder.'/'.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.$pathinfo['extension'];
                                            $imagetoCheckSmall=$pathToImagesFolder.'/'.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.strtolower($pathinfo['extension']);

                                            if(file_exists($imagetoCheck)){

                                                 $outputimg = $baseurl.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.$pathinfo['extension'];

                                              }
                                            else if(file_exists($imagetoCheckSmall)){
                                                $outputimg = $baseurl.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.strtolower($pathinfo['extension']);
                                            }
                                            else{

                                                if(file_exists($pathToImagesFolder."/".$row['image_name'])){


                                                    $resizeObj = new vgwt_resize($pathToImagesFolder."/".$row['image_name']); 
                                                    $resizeObj -> resizeImage($imagewidth, $imageheight, "exact"); 
                                                    $resizeObj -> saveImage($pathToImagesFolder."/".$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.$pathinfo['extension'], 100); 
                                                    //$outputimg = plugin_dir_url(__FILE__)."imagestoscroll/".$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.$pathinfo['extension'];

                                                     if(file_exists($imagetoCheck)){
                                                        $outputimg = $baseurl.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.$pathinfo['extension'];
                                                    }
                                                    else if(file_exists($imagetoCheckSmall)){
                                                        $outputimg = $baseurl.$filenamewithoutextension.'_'.$imageheight.'_'.$imagewidth.'.'.strtolower($pathinfo['extension']);
                                                    }

                                                }else{

                                                    $outputimg = esc_url($baseurl.$imagename);
                                                }   

                                            }

                                        }   




                                    ?>         
                                    <li><img data-poster="<?php echo esc_url($outputimg);?>"  data-vurl="<?php echo esc_url($embed_url);?>"   data-vtype='<?php echo $vtype;?>'  data-media="<?php echo $media_type;?>" data-target="<?php echo $row['open_link_in'];?>" <?php if(trim($row['custom_link'])!=''):?> data-href="<?php echo $row['custom_link'];?>" <?php else:?> data-href="" <?php endif;?> src="<?php echo $outputimg;?>"  <?php if(trim($row['title'])!=''):?> title="<?php echo trim($row['title']);?>" <?php else:?> title=" " <?php endif;?>  <?php if(trim($row['image_description'])!=''):?> data-description="<?php echo trim($row['image_description']);?>" <?php else:?> data-description="" <?php endif;?>  data-description=""  /></li> 

                                    <?php } ?>  

                    <?php }?>   
        </ul>
    </div>
    <script type="text/javascript">

        $j= jQuery.noConflict();
        $j(document).ready(function() {


                <?php $galRandNo=rand(0,13313); ?> 
                var galleryItems<?php echo $galRandNo;?>;
                $j(function(){
                        galleryItems<?php echo $galRandNo;?> = $j("#<?php echo $rand_Numb;?>");

                        var galleryItemDivs = $j('#divSliderMain_admin_<?php echo $rand_Numb;?>');

                        galleryItems<?php echo $galRandNo;?>.each(function (index, item){
                                item.parent_data = $j(item).parent("#divSliderMain_admin_<?php echo $rand_Numb;?>");
                        });

                        galleryItemDivs.each(function(index, item){

                                $j("ul",this).galleryViewV({

                                        transition_speed:<?php echo intval($settings['transition_speed']);?>,         //INT - duration of panel/frame transition (in milliseconds)
                                        transition_interval:<?php echo intval($settings['transition_interval']);?>,         //INT - delay between panel/frame transitions (in milliseconds)
                                        easing:'swing',                 //STRING - easing method to use for animations (jQuery provides 'swing' or 'linear', more available with jQuery UI or Easing plugin)
                                        show_panels:'true',
                                        show_panel_nav:<?php echo (intval($settings['show_panel_nav'])==1)?'true':'false' ;?>,             //BOOLEAN - flag to show or hide panel navigation buttons
                                        enable_overlays:<?php echo (intval($settings['enable_overlays'])==1)?'true':'false' ;?>,             //BOOLEAN - flag to show or hide panel overlays
                                        show_overlays:<?php echo (intval($settings['enable_overlays'])==1)?'true':'false' ;?>,             //BOOLEAN - flag to show or hide frame captions    
                                        panel_width:<?php echo intval($settings['panel_width']);?>,                 //INT - width of gallery panel (in pixels)
                                        panel_height:<?php echo intval($settings['panel_height']);?>,                 //INT - height of gallery panel (in pixels)
                                        panel_animation:'<?php echo esc_html($settings['panel_animation']);?>',         //STRING - animation method for panel transitions (crossfade,fade,slide,none)
                                        panel_scale: '<?php echo esc_html($settings['panel_scale']);?>',             //STRING - cropping option for panel images (crop = scale image and fit to aspect ratio determined by panel_width and panel_height, fit = scale image and preserve original aspect ratio)
                                        overlay_position:'<?php echo esc_html($settings['overlay_position']);?>',     //STRING - position of panel overlay (bottom, top)
                                        pan_images:'false',                //BOOLEAN - flag to allow user to grab/drag oversized images within gallery
                                        pan_style:'drag',                //STRING - panning method (drag = user clicks and drags image to pan, track = image automatically pans based on mouse position
                                        start_frame:'<?php echo intval($settings['start_frame']);?>',                 //INT - index of panel/frame to show first when gallery loads
                                        show_filmstrip:<?php echo (intval($settings['show_filmstrip'])==1)?'true':'false' ;?>,             //BOOLEAN - flag to show or hide filmstrip portion of gallery
                                        show_filmstrip_nav:<?php echo (intval($settings['show_filmstrip_nav'])==1)?'true':'false' ;?>,         //BOOLEAN - flag indicating whether to display navigation buttons
                                        enable_slideshow:<?php echo (intval($settings['enable_slideshow'])==1)?'true':'false' ;?>,            //BOOLEAN - flag indicating whether to display slideshow play/pause button
                                        autoplay:<?php echo (intval($settings['autoplay'])==1)?'true':'false' ;?>,                //BOOLEAN - flag to start slideshow on gallery load
                                        show_captions:<?php echo (intval($settings['show_captions'])==1)?'true':'false' ;?>,             //BOOLEAN - flag to show or hide frame captions                                                                       
                                        filmstrip_style: '<?php echo esc_html($settings['filmstrip_style']);?>',         //STRING - type of filmstrip to use (scroll = display one line of frames, scroll filmstrip if necessary, showall = display multiple rows of frames if necessary)
                                        filmstrip_position:'<?php echo esc_html($settings['filmstrip_position']);?>',     //STRING - position of filmstrip within gallery (bottom, top, left, right)
                                        frame_width:<?php echo intval($settings['frame_width']);?>,                 //INT - width of filmstrip frames (in pixels)
                                        frame_height:<?php echo intval($settings['frame_height']);?>,                 //INT - width of filmstrip frames (in pixels)
                                        frame_opacity:<?php echo floatval($settings['frame_opacity']);?>,             //FLOAT - transparency of non-active frames (1.0 = opaque, 0.0 = transparent)
                                        frame_scale: 'crop',             //STRING - cropping option for filmstrip images (same as above)
                                        frame_gap:<?php echo intval($settings['frame_gap']);?>,                     //INT - spacing between frames within filmstrip (in pixels)
                                        show_infobar:<?php echo (intval($settings['show_infobar'])==1)?'true':'false' ;?>,                //BOOLEAN - flag to show or hide infobar
                                        infobar_opacity:<?php echo floatval($settings['infobar_opacity']);?>,               //FLOAT - transparency for info bar
                                        link_newwindow: true,
                                        filmstrip_size:10,
                                        clickable:false
                                });

                        }); 


                      

                        //
                        // Resize the image gallery
                        //

                        var oldsize_w<?php echo $galRandNo;?>=<?php echo intval($settings['panel_width']);?>;
                        var oldsize_h<?php echo $galRandNo;?>=<?php echo intval($settings['panel_height']);?>;

                        function resizegallery<?php echo $galRandNo;?>(){
                            if(galleryItems<?php echo $galRandNo;?>==undefined){return;}
                            galleryItems<?php echo $galRandNo;?>.each(function (index, item){
                                    var $parent = item.parent_data;

                                    // width based on parent?
                                                        <?php if((esc_html($settings['filmstrip_position'])=='left' or esc_html($settings['filmstrip_position'])=='right') and intval($settings['show_filmstrip'])==1):?>
                                                           var width = ($parent.innerWidth());//2 times 5 pixels margin     
                                                        <?php else:?>
                                                            var width = ($parent.innerWidth()-10);//2 times 5 pixels margin
                                                        <?php endif;?>    
                                                        
                                                        
                                                        var height = ($parent.innerHeight()-10);//2 times 5 pixels margin
                                                        if(oldsize_w<?php echo $galRandNo;?>==width){
                                                            
                                                          //  return;
                                                        }
                                                        oldsize_w<?php echo $galRandNo;?>=width;
                                                        
                                                        thumbfactor = width/(<?php echo intval($settings['panel_width']);?>-10);
                                                        
                                                        var resizeToHeight=width/3*2;
                                                        if(resizeToHeight><?php echo intval($settings['panel_height']);?>){
                                                            resizeToHeight=<?php echo intval($settings['panel_height']);?>;  
                                                        }
                                                        
                                                        
                                                        
                                                        $j(item).resizeGalleryView_video(
                                                            <?php if((esc_html($settings['filmstrip_position'])=='left' or esc_html($settings['filmstrip_position'])=='right') and intval($settings['show_filmstrip'])==1):?>width-(<?php echo intval($settings['frame_width']);?>*thumbfactor)-10,<?php else:?> width,<?php endif;?>
                                                            resizeToHeight, <?php echo intval($settings['frame_width']);?>*thumbfactor, <?php echo intval($settings['frame_height']);?>*thumbfactor);

                            });
                        }

                        var inited<?php echo $galRandNo;?>=false;

                        function onresize<?php echo $galRandNo;?>(){  
                            resizegallery<?php echo $galRandNo;?>();
                            inited<?php echo $galRandNo;?>=true;
                        }


                        $j(window).resize(onresize<?php echo $galRandNo;?>);
                        $j( document ).ready(function() {
                                onresize<?php echo $galRandNo;?>();
                        }); 

                });   


        });


    </script><!-- end vgwt_print_responsive_video_slider_with_thumbnail_func --><?php
        $output = ob_get_clean();
        return $output;
}
    

function vgwt_e_gallery_get_wp_version() {
	global $wp_version;
	return $wp_version;
}

// also we will add an option function that will check for plugin admin page or not
function vgwt_responsive_gallery__is_plugin_page() {
	$server_uri = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	
	foreach ( array ('responsive_video_slider_with_thumbnail_media_management','responsive_video_slider_with_thumbnail'
	) as $allowURI ) {
		if (stristr ( $server_uri, $allowURI ))
			return true;
	}
	return false;
}

// add media WP scripts
function vgwt_responsive_gallery__admin_scripts_init() {
    
	if (vgwt_responsive_gallery__is_plugin_page ()) {
		// double check for WordPress version and function exists
		if (function_exists ( 'wp_enqueue_media' ) && version_compare ( vgwt_e_gallery_get_wp_version (), '3.5', '>=' )) {
			// call for new media manager
			wp_enqueue_media ();
		}
		wp_enqueue_style ( 'media' );
                 wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_script( 'wp-color-picker' );
                
	}
}

   function vgwt_remove_extra_p_tags($content){

        if(strpos($content, 'vgwt_print_responsive_video_slider_with_thumbnail_func')!==false){
        
            
            $pattern = "/<!-- vgwt_print_responsive_video_slider_with_thumbnail_func -->(.*)<!-- end vgwt_print_responsive_video_slider_with_thumbnail_func -->/Uis"; 
            $content = preg_replace_callback($pattern, function($matches) {


               $altered = str_replace("<p>","",$matches[1]);
               $altered = str_replace("</p>","",$altered);
              
                $altered=str_replace("&#038;","&",$altered);
                $altered=str_replace("&#8221;",'"',$altered);
              

              return @str_replace($matches[1], $altered, $matches[0]);
            }, $content);

              
            
        }
        
        $content = str_replace("<p><!-- vgwt_print_responsive_video_slider_with_thumbnail_func -->","<!-- vgwt_print_responsive_video_slider_with_thumbnail_func -->",$content);
        $content = str_replace("<!-- end vgwt_print_responsive_video_slider_with_thumbnail_func --></p>","<!-- end vgwt_print_responsive_video_slider_with_thumbnail_func -->",$content);
        
        
        return $content;
  }

  add_filter('widget_text_content', 'vgwt_remove_extra_p_tags', 999);
  add_filter('the_content', 'vgwt_remove_extra_p_tags', 999);
?>