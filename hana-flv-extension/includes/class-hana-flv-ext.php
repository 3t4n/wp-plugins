<?php

class hana_flv_ext{


	function hana_flv_ext(){
		$this->__construct();
	}
	
	function __construct(){ 
		
		$this->set_up_hana_ext();
	
	}
	
	function set_up_hana_ext(){
		//add_action("admin_print_scripts", array( &$this, 'js_libs' ));
		if (strpos($_SERVER['REQUEST_URI'], 'post.php') || strpos($_SERVER['REQUEST_URI'], 'post-new.php') || strpos($_SERVER['REQUEST_URI'], 'page-new.php') || strpos($_SERVER['REQUEST_URI'], 'page.php')) {
		
			//wp_enqueue_script only works  in => 'init'(for all), 'template_redirect'(for only public) , 'admin_print_scripts' for admin only
			if (function_exists('wp_enqueue_script')) {
				wp_enqueue_script( 'hana_flv_ext', HFE_url.'/js/hana_ext.js', '', 1.0  );
			}

		}	
		
		add_action( 'admin_init', array( &$this, 'hana_flv_extension_add_meta_boxes' ) );
		add_action( 'save_post', array( &$this, 'hana_flv_extension_meta_box_save_data' ), 1, 2 );
		
	}
	
	function js_libs(){
		wp_enqueue_script( 'hana_flv_ext', HFE_url.'/js/hana_ext.js', '', 1.0  );
	}
	
	function hana_flv_extension_add_meta_boxes(){
		
	    add_meta_box( 
	        'hana_flv_extension_meta_box',
	        __( 'Add an FLV'),
	        array( &$this, 'hana_flv_extension_meta_box' ),
	        'post' ,
	        'side',
	        'high'
	    );	
	    
	    add_meta_box( 
	        'hana_flv_extension_meta_box',
	        __( 'Add an FLV'),
	        array( &$this, 'hana_flv_extension_meta_box' ),
	        'page' ,
	        'side',
	        'high'
	    );	
	    	    		
	}	
	
	function hana_flv_extension_meta_box(){ 
	
		global $post; ?>
		
		<style type="text/css">
			#hana_flv_extension_meta_box label{
    clear: both;
    float: left;
    font-size: 10px;
    margin: 5px 0 7px;
    width: 100%;				
			}
			#hana_flv_extension_meta_box input[type="text"], #hana_flv_extension_meta_box select{
				width:58%;
			}
		</style>
		
		<label>Video(required)</label>
		<input type='text' size='15' name='video' id="hana_video_url_sidebar" value="<?php echo get_post_meta($post->ID, 'video', true) ?>"/><input type='button' class='button' value='Upload' onClick='uploadFlv_sidebar();' /></label>
		<label>Description</label>
		<input type='text' name='description' size='15' value="<?php echo get_post_meta($post->ID, 'description', true) ?>"/>			
		<label>Flash Player:</label>
		<select name="player">
		<option value="1" <?php if (get_post_meta($post->ID, 'player', true) == '1' ) print "selected"; ?> >1. OS FLV player (GPL)</option>
		<option value="2" <?php if (get_post_meta($post->ID, 'player', true) == '2' ) print "selected"; ?> >2. Flow Player 2 (GPL)</option>
		<option value="3" <?php if (get_post_meta($post->ID, 'player', true) == '3' ) print "selected"; ?> >3. FLV Player Maxi (CC, MPL1.1)</option>
		<option value="4" <?php if (get_post_meta($post->ID, 'player', true) == '4' ) print "selected"; ?> >4. Flow Player 3 (GPL)</option>
		
		</select>
		<label>Width</label>
		<input type='text' name="width" value="<?php echo get_post_meta($post->ID, 'width', true);?>" size='4' maxlength='4' /> 
		<label>Height</label>
		<input type='text' name="height" value="<?php echo get_post_meta($post->ID, 'height', true);?>" size='4' maxlength='4' /> 
		<label>AutoLoad</label>
		<select name="autoload">
		<option value="true" <?php if ( get_post_meta($post->ID, 'autoload', true) == 'true' ) print "selected"; ?> >true</option>
		<option value="false" <?php if ( get_post_meta($post->ID, 'autoload', true) == 'false' ) print "selected"; ?> >false</option>
		</select>
	
		<label>AutoPlay</label>
		<select name="autoplay">
		<option value="true" <?php if ( get_post_meta($post->ID, 'autoplay', true) == 'true' ) print "selected"; ?> >true</option>
		<option value="false" <?php if ( get_post_meta($post->ID, 'autoplay', true) == 'false' ) print "selected"; ?> >false</option>
		</select>

		<label>Play Loop</label>
		<select name="loop">
		<option value="true" <?php if ( get_post_meta($post->ID, 'loop', true) == 'true' ) print "selected"; ?> >true</option>
		<option value="false" <?php if ( get_post_meta($post->ID, 'loop', true) == 'false' ) print "selected"; ?> >false</option>
		</select>

		<label>Auto Rewind</label>
		<select name="autorewind">
		<option value="true" <?php if ( get_post_meta($post->ID, 'autorewind', true) == 'true' ) print "selected"; ?> >true</option>
		<option value="false" <?php if ( get_post_meta($post->ID, 'autorewind', true) == 'false' ) print "selected"; ?> >false</option>
		</select>			

		<label>Click URL</label>
		<input type='text' name='clickurl' size='15' value="<?php echo get_post_meta($post->ID, 'clickurl', true); ?>" />			

		<label>Click Target _self (same) , _blank (new window)</label>
		<input type='text' name='clicktarget' size='10' value="<?php echo get_post_meta($post->ID, 'clicktarget', true); ?>" />			

		<label>Splash Image URL</label>
		<input type='text' name='splashimage' size='15' id="hana_splash_image_url_sidebar" value="<?php echo get_post_meta($post->ID, 'splashimage', true); ?>" /><input type='button' class='button' value='Upload' onClick='uploadImage_sidebar();' />			
					
	<?php }
	
	function hana_flv_extension_meta_box_save_data( $post_id, $post ) {
		//begin taken directly from http://codex.wordpress.org/Function_Reference/add_meta_box
		
		// verify if this is an auto save routine. 
		// If it is our form has not been submitted, so we dont want to do anything
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return;
		
		// verify this came from the our screen and with proper authorization,
		// because save_post can be triggered at other times
		
		//if ( !wp_verify_nonce( $_POST['chimppress_campaign_headers_nonce'], plugin_basename( __FILE__ ) ) )
			//return;
			
		//[...]
		
		// OK, we're authenticated: we need to find and save the data
		
		$hana_ext_meta_data['video'] =  $_POST['video'] ;
		$hana_ext_meta_data['description'] =  $_POST['description'] ;
		$hana_ext_meta_data['player'] =  $_POST['player'] ;
		$hana_ext_meta_data['width'] =  $_POST['width'] ;
		$hana_ext_meta_data['height'] =  $_POST['height'] ;
		$hana_ext_meta_data['autoload'] =  $_POST['autoload'] ;
		$hana_ext_meta_data['autoplay'] =  $_POST['autoplay'] ;
		$hana_ext_meta_data['loop'] =  $_POST['loop'] ;
		$hana_ext_meta_data['autorewind'] =  $_POST['autorewind'] ;
		$hana_ext_meta_data['clickurl'] =  $_POST['clickurl'] ;
		$hana_ext_meta_data['clicktarget'] =  $_POST['clicktarget'] ;
		$hana_ext_meta_data['splashimage'] =  $_POST['splashimage'] ;
				
	    foreach ($hana_ext_meta_data as $key => $value) { // Cycle through the $hana_ext_meta_data array!
	        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
	        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
	            update_post_meta($post->ID, $key, $value);
	        } else { // If the custom field doesn't have a value
	            add_post_meta($post->ID, $key, $value);
	        }
	        //echo $key." - " . $value."<br>";
	        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	    }
	    
	}

}
	
?>