<?php
  function insertQrCode($atts) {
    extract(shortcode_atts(array(
                'content' => '',
                'alt' => '',
                'size' => ''
                    ), $atts));
	$current_uri = '.urlencode(get_permalink( $post->ID )). ';

    if (empty($content) && $content !== 0) {
        $content = urlencode($current_uri);
    } else {
        $content = urlencode(strip_tags(trim($content)));
    }
	if (empty($alt) && $alt !==0) {
	  $alt="QR Code";
	} else {
	  $alt = strip_tags(trim($alt));
        }
        
        if (empty($size) && $size !==0) {
	  $size = "150px";
	} else {
	  $size = strip_tags(trim($size));
	}
        
         if (empty($align) && $align !==0) {
	  $align = "right";
	} else {
	  $align = strip_tags(trim($align));
	}
       
         if (empty($class) && $class !==0) {
	  $class = "";
	} else {
	  $class = strip_tags(trim($class));
	}
        
    $output = "";
    $image = 'https://chart.googleapis.com/chart?chs=' . $size . 'x' . $size . '&cht=qr&chld=H|1&chl=' . $content;    
    $output = $preoutput . '<img style="float:right" src="' . $image . '" alt="' . $alt . '" width="' . $size . '" height="' . $size . '"' . $align . $class . ' />';    
    return $output;
  }
  function showQrCode($QRCode) {
   if(is_singular()) {
	    $image = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chld=H|5&chl=http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
	   $QRCode.= '<img style="float:right;" src="' . $image . '" alt="QR Code" width="150px" height="150px" />'; 
	    }
   return $QRCode;
}  
  add_shortcode('qrcode', 'insertQrCode');
  add_filter ('the_content', 'showQrCode');  

  function apiqr_settings_options() {	
  /*	if (isset($_POST['apiqr-uninstall']) && check_admin_referer('apiqr-uninstall')) {
	$url_uninstall = wp_nonce_url(admin_url('plugins.php?action=deactivate&plugin=wp-qrcode/wp-api-qrcode.php&plugin_status=all&paged=1'),'wp-qrcode/wp-api-qrcode.php');} */
	
?>
	<style type="text/css">
		.button {width: auto!important;color:#005fa1}
		#validation {border-top: 1px solid #dfdfdf;padding: 10px 0}#message{background:red;font-size:2em}
		p{font:300 14px/1.625em 'Helvetica Neue', Helvetica, Arial, sans-serif;color:#575757;word-wrap:break-word;-webkit-font-smoothing: subpixel-antialiased;-webkit-text-stroke: 0.15px}.notice{border:1px dotted :#eee;font-size: 1.3em;border-radius: 10px}.aligncenter{text-algin:center;border: 1px}
		a{color:#005fa1;text-decoration:none}
	</style>
	<div class="wrap" id="apiqr-settings">
		<div id="icon-options-general" class="icon32"><br></div>		
		<h2><?php echo 'API QRCode Generator Wordpress'; ?></h2>
		<div class="notice">
						  <h1>Welcome</h1>
						  <p>Thank you for using API QRCode Generator.</p>						

						<p>If you find this plugin useful, please consider <big>rating</big> this <a href="http://wordpress.org/extend/plugins/api-qrcode-generator/" target="_blnak">plugin on WordPress.org</a></p>
						</div>
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="post-body-content">
					<div id="namediv" class="stuffbox">
						<h3 class="hndle"><?php _e('How To','apiqr'); ?></h3>
						<div class="inside">
						<article>
							<h2>About API QRCode Generator</h2>
							<p>Use this QRCode Generate wordpress plugin to create a image QRCode on any site of your Wordpress installation. This plugin is ofered freely by <strong>QRCode Generator API Online</strong> [ <a href="http://qrcode.jar.io" target="_blank" >qrcode.jar.io</a> ]. <br /> Absolutely free. </p>
							
							If you find this plugin useful, please <big>rating</big> this <a href="http://wordpress.org/extend/plugins/api-qrcode-generator/" target="_blnak">plugin on WordPress.org</a></p>
							
							<h2>How to use it</h2>
							<p>Use a shortcode in your posts to insert dynamic, customizable posts, pages, images, or attachments based on categories and tags.</p>							
							
							<p>The shortcode <tt>[qrcode]</tt> within your site to generate a qr code including the URL of the current site.</p>
  
							<p>Use the following short code to generate a indivdual QRCODE with any text content:<br /><tt>[qrcode content="text" alt="text" class="text" size="150px"]</tt> </p>	
						
							<h2>Support and Contact</h2>
                          <p> The support is free for questions, suggestions or any. To report bugs, request help or suggest features, visit <a href="http://qrcode.jar.io" target="_blank">http://qrcode.jar.io/blog/</a></p>
						  <p><a class="button" href="https://profiles.wordpress.org/jweblog">Profile Wordpress</a>  <a class="button" href="https://plus.google.com/110178154031024345919/" target="_blank">Google++ Plugin</a></p>						  
						   <small><tt>By <a href="https://profiles.wordpress.org/jweblog" target="_blank">Jeblog</a> jweblog@hotmail.com Feb, 2015. <a href="http://qrcode.jar.io" target="_blank">http://qrcode.jar.io</a></tt></small>
					</article>
						</div>
					</div>
				</div>
				<div id="postbox-container-1" class="postbox-container">
					<div id="side-sortables" class="meta-box-sortables ui-sortable">
						<div class="postbox">
							<h3 class="hndle"><?php _e('Status','apiqr'); ?></h3>
							<div class="inside">
								<p><?php _e('Plugin is Enable','apiqr');?>.</p>
									<!-- form method="post" action="< ?php echo $_SERVER["REQUEST_URI"]; ?>">
									< ?php wp_nonce_field('apiqr-uninstall');?>
									<input type="submit" value="< ?php _e('Uninstall now','apiqr');?>" class="button" name="apiqr-uninstall"/>
								</form -->						
						
							</div>
						</div>
						<div class="inside">						
						 <h2>Next Update</h2>
						 <p><tt> Next update is preview for: April 15, 2015</tt></p>
						 <p><img class="aligncenter" src="<?php echo plugin_dir_url(__FILE__); ?>qrcode.png" width="150" height="150"></p>
						 </div>
					</div>
				</div>
				<br class="clear">
			</div>
		</div>
	</div>
<?php
}
	