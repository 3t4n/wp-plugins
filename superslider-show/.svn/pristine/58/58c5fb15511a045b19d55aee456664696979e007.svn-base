<?php
/*
Copyright 2008 daiv Mowbray

This file is part of superslider-show

superslider-show is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

superslider-show is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Fancy Categories; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
	/**
   * Should you be doing this?
   */ 	
   
	if ( !current_user_can('manage_options') ) {
		// Apparently not.
		die( __( 'ACCESS DENIED: Your don\'t have permission to do this.', 'superslider-show' ) );
		}
		if (isset($_POST['set_defaults']))  {
			check_admin_referer('ssShow_options');
			/**/$ssShow_OldOptions = array(
				'ss_shortcode' => "slideshow",
				'show_shortcode' => "true",	
				'id' => "",
				'load_moo' => "on",
				'css_load' => "default",		
				'css_theme' => "default",
				'show_class' => "",
				'href'	=>	"",
				'show_type' => "default",
				'image_size' => "medium",
				'pop_size'	=>	"large",
				'first_slide' => "0",
				'limit' =>  "50",
				'zoom' => "25",
				'pan' => "25, 75",
				'color' => "#fff",
				'height' => "400",
				'width' => "450",
				'clear'	=>	"both",
				'center' => "true",
				'resize' => "true",
				'linked' => "lightbox",
				'fast' => "false",
				'captions' => "true",
				'caption_title' => "post_title",
				'caption_text' => "image_description",
				'caption_link' => "image_title",
				'caption_link_text' => "",
				
				'overlap' => "true",
				'thumbnails' => "true",
				'mouseover'	=> "false",
				'mythumbon' => "on",
				'thumbsize' => "thumbnail",
				'mythumb_height' => "80",
				'mythumb_width' => "80",
				'thumbcrop' => "on",
				'myslide_height' => "360",
				'myslide_width' => "480",
				'myslide_crop' => "off",
				'paused' => "false",
				'random' => "false",
				'loop' => "true",
				'loader' => "true",
				'delay' => "4000",
				'controller' => "true",
				'exclude'	=> "",
				'duration' => "1200",
				'trans_type' => "sine",
				'trans_inout' => "out",
				
				'accesskeys'=> "",//'first': 'shift + left', 'prev': 'left', 'pause': 'p', 'next': 'right', 'last': 'shift + right' 
				'replace' => "",

				'lightbox_add' => "on",
				'squeeze_width' => "600",
				'squeeze_height' => "450",
				'lightbox_type' => "Lightbox",
				'recent_limit' => "1",
				'delete_options' => 'false');//end array
			
			update_option('ssShow_options', $ssShow_OldOptions);

			$ssShow_newOptions = get_option('ssShow_options');
				
			echo '<div id="message" class="updated fade"><p><strong>' . __( 'SuperSlider-Show Default Options reloaded.', 'superslider-show' ) . '</strong></p></div>';

		}
		elseif (isset($_POST['action']) && $_POST['action'] == 'update' ) {
			
			check_admin_referer('ssShow_options'); // check the nonce
					// If we've updated settings, show a message
			echo '<div id="message" class="updated fade"><p><strong>' . __( 'SuperSlider-Show Options saved.', 'superslider-show' ) . '</strong></p></div>';
			
			$ssShow_newOptions = array(			
				'ss_shortcode' 	=> $_POST['op_shortcode'],
				'show_shortcode' => isset($_POST['op_shortcodeshow']) ? $_POST["op_shortcodeshow"] : "",
				'load_moo' => isset($_POST['op_load_moo']) ? $_POST["op_load_moo"] : "",
				'css_load'		=> $_POST['op_css_load'],
				'css_theme'		=> $_POST["op_css_theme"],
				'show_type'		=> $_POST["op_show_type"],
				'href'			=> $_POST["op_href"],
				'image_size'	=> $_POST["op_image_size"],
				'pop_size'		=> $_POST["op_pop_size"],
				'first_slide'	=> $_POST["op_first_slide"],
				'limit'	        => $_POST["op_limit"],
				'zoom'			=> $_POST["op_zoom"],
				'pan'			=> $_POST["op_pan"],
				'color'			=> $_POST["op_color"],
				'height'		=> $_POST["op_height"],
				'width'			=> $_POST["op_width"],
				'clear'			=> $_POST["op_clear"],
				'center'		=> $_POST["op_center"],
				'resize'		=> $_POST["op_resize"],
				'linked'		=> $_POST["op_linked"],
				'fast'			=> $_POST["op_fast"],
				'captions'		=> $_POST["op_captions"],
				'caption_title'		=> $_POST["op_caption_title"],
				'caption_text'		=> $_POST["op_caption_text"],
				'caption_link'		=> $_POST["op_caption_link"],
				'caption_link_text'=> $_POST["op_caption_link_text"],

				'overlap'		=> $_POST["op_overlap"],
				'thumbnails'	=> $_POST["op_thumbnails"],
				'mouseover'		=> $_POST["op_mouseover"],
				'mythumbon' => isset($_POST['op_mythumbon']) ? $_POST["op_mythumbon"] : "",
				'thumbsize'		=> $_POST["op_thumbsize"],
				'mythumb_height'=> $_POST["op_mythumb_height"],
				'mythumb_width'	=> $_POST["op_mythumb_width"],
				'thumbcrop'		=> $_POST["op_thumbcrop"],
				
				'accesskeys'	=> $_POST["op_accesskeys"],
				'replace'	    => $_POST["op_replace"],
				
				'myslide_height'=> $_POST["op_myslide_height"],
				'myslide_width' => $_POST["op_myslide_width"],
				'myslide_crop' => isset($_POST['op_slidecrop']) ? $_POST["op_slidecrop"] : "",
				
				'paused'		=> $_POST["op_paused"],
				'random'		=> $_POST["op_random"],
				'loop'			=> $_POST["op_loop"],
				'loader'		=> $_POST["op_loader"],
				'delay'			=> $_POST["op_delay"],
				'controller'	=> $_POST["op_controller"],
				'duration'		=> $_POST["op_duration"],
				'trans_type'	=> $_POST["op_trans_type"],
				'trans_inout'	=> $_POST["op_trans_inout"],			

				'lightbox_add' => isset($_POST['op_lightbox_add']) ? $_POST["op_lightbox_add"] : "",
				'squeeze_width' => $_POST["op_squeeze_width"],
				'squeeze_height' =>$_POST["op_squeeze_height"],
				'lightbox_type'	=> $_POST["op_lightbox_type"],
				'recent_limit'	=> $_POST["op_recent_limit"],
				'delete_options' => isset($_POST['op_delete_options']) ? $_POST["op_delete_options"] : ""
			);	

		update_option('ssShow_options', $ssShow_newOptions);
		update_option('minithumb_size_w', $ssShow_newOptions['mythumb_width'] );
		update_option('minithumb_size_h', $ssShow_newOptions['mythumb_height'] );
		if ($ssShow_newOptions['thumbcrop'] == 'on') $c = '1'; else  
		$c = '0';
		update_option('minithumb_crop', $c);
		
		update_option('slideshow_size_w', $ssShow_newOptions['myslide_width'] );
		update_option('slideshow_size_h', $ssShow_newOptions['myslide_height'] );
		if ($ssShow_newOptions['myslide_crop'] == 'on') $c = '1'; else  
		$c = '0';
		update_option('slideshow_crop', $c);

		// from here		
		}elseif (isset($_POST['proaction']) && $_POST['proaction'] == 'updatepro' ) {
			
			check_admin_referer('ssPro_options'); // check the nonce
					// If we've updated settings, show a message
			echo '<div id="message" class="updated fade"><p><strong>' . __( 'superslider Pro Options saved.', 'superslider' ) . '</strong></p></div>';
			
			
			$ssPro_newOptions = array(				
				'pro_code' => isset($_POST['op_pro_code']) ? $_POST["op_pro_code"] : ""
				);
			update_option('ssPro_options', $ssPro_newOptions);
	
		}

	$ssPro_newOptions = get_option('ssPro_options'); 
	$ispro = '';
	if($ssPro_newOptions['pro_code'] == "We are all beautiful creative people")$ispro = true;


	$ssShow_newOptions = get_option('ssShow_options');   

	/**
	*	Let's get some variables for multiple instances
	*/
    $checked = ' checked="checked"';
    $selected = ' selected="selected"';
	$site = get_option('siteurl'); 
	$plugin_name = 'superslider-show';
	
	    global $wp_version;    
        // is not version 3+
         if (version_compare($wp_version, "2.9.9", "<")) {
            $size_names = array('thumbnail' => 'thumbnail', 'medium' => 'medium', 'large' => 'large', 'full' => 'full',);
            if (function_exists('add_theme_support')) $size_names['post-thumbnail'] = 'post-thumbnail'; 
            if (class_exists("ssShow")) { $size_names['slideshow'] = 'slideshow'; $size_names['minithumb'] = 'minithumb';}
            if (class_exists("ssExcerpt")) $size_names['excerpt'] = 'excerpt'; 
            if (class_exists("ssPnext")) $size_names['prenext'] = 'prenext'; 

 /*
    * This is where you'd add any other image sizes for pre WP 3.0
    */      
       } else {    
            $size_names =  get_intermediate_image_sizes();// this only works with WP version 3+
//var_dump($size_names);
            $size_names[] = 'full'; // adds original / full sized image to list
       }
?>

<div class="wrap">
   <div class="ss_column1">
   
<form name="ssShow_options" method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
<!-- possible auto save options : action="options.php" , bellow, update-options as nonce -->
<?php if ( function_exists('wp_nonce_field') )
		wp_nonce_field('ssShow_options'); echo "\n"; ?>
		
<div style="">
<a href="http://superslider.daivmowbray.com/">
<img src="<?php echo WP_CONTENT_URL ?>/plugins/superslider-show/admin/img/logo_superslider.png" style="margin-bottom: -15px;padding: 20px 20px 0px 20px;" alt="SuperSlider Logo" width="52" height="52" border="0" /></a>
  <h2 style="display:inline; position: relative;">SuperSlider-Show Options</h2>
 </div><br style="clear:both;" />
 
 <script type="text/javascript">
// <![CDATA[
jQuery(document).ready(function ($) {

	$(function() {
        $( "#ssslider" ).tabs({ active: 1 });
    });
});	
// ]]>
</script>
 
<div id="ssslider" class="ui-tabs">
    <ul id="ssnav" class="ui-tabs-nav">
        <li <?php if ($this->base_over_ride != "on") { 
  		 echo '';
  		} else {
  		echo 'style="display:none;"';
  		}?>	class="ui-state-default" ><a href="#fragment-1"><span>Appearance</span></a></li>
        <li class="ui-tabs-selected"><a href="#fragment-2"><span>Shortcode</span></a></li>
        <li class="ui-state-default"><a href="#fragment-5"><span>General</span></a></li>
        <li class="ui-state-default"><a href="#fragment-3"><span>Transitions</span></a></li>
        <li class="ui-state-default"><a href="#fragment-4"><span>Images</span></a></li>
        <li class="ui-state-default"><a href="#fragment-6"><span>Thumbnails</span></a></li>
        <li class="ui-state-default"><a href="#fragment-7"><span>Captions</span></a></li>
        <li class="ui-state-default"><a href="#fragment-8"><span>Lightbox</span></a></li>
        <li class="ui-state-default"><a href="#fragment-9"><span>Advanced</span></a></li>
        <li <?php if ($this->base_over_ride != "on") { 
  		 echo '';
  		} else {
  		echo 'style="display:none;"';
  		}?>	class="ss-state-default" ><a href="#fragment-10"><span>File storage</span></a></li>
  		
    </ul>
    <div id="fragment-1" class="ss-tabs-panel">
 	<div <?php if ($this->base_over_ride != "on") { 
  		 echo '';
  		} else {
  		echo 'style="display:none;"';
  		}?>	
	>
	<h3 class="title">SlideShow Appearance</h3>
	
		<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- Theme options start -->  	
		<legend><b><?php _e(' Themes',$plugin_name); ?>:</b></legend>
	
	<table width="100%" cellpadding="10" align="center">
	<tr>
		<td width="25%" align="center" valign="top"><img src="<?php echo WP_CONTENT_URL ?>/plugins/superslider-show/admin/img/default.png" alt="default" border="0" width="110" height="25" /></td>
		<td width="25%" align="center" valign="top"><img src="<?php echo WP_CONTENT_URL ?>/plugins/superslider-show/admin/img/blue.png" alt="blue" border="0" width="110" height="25" /></td>
		<td width="25%" align="center" valign="top"><img src="<?php echo WP_CONTENT_URL ?>/plugins/superslider-show/admin/img/black.png" alt="black" border="0" width="110" height="25" /></td>
		<td width="25%" align="center" valign="top"><img src="<?php echo WP_CONTENT_URL ?>/plugins/superslider-show/admin/img/custom.png" alt="custom" border="0" width="110" height="25" /></td>
	</tr>
	<tr>
		<td><label for="op_css_theme1">
			 <input type="radio"  name="op_css_theme" id="op_css_theme1"
			 <?php if($ssShow_newOptions['css_theme'] == "default") echo $checked; ?> value="default" />
			</label>
		</td>
		<td> <label for="op_css_theme2">
			 <input type="radio"  name="op_css_theme" id="op_css_theme2"
			 <?php if($ssShow_newOptions['css_theme'] == "blue") echo $checked; ?> value="blue" />
			 </label>
  		</td>
		<td><label for="op_css_theme3">
			 <input type="radio"  name="op_css_theme" id="op_css_theme3"
			 <?php if($ssShow_newOptions['css_theme'] == "black") echo $checked; ?> value="black" />
			 </label>
  		</td>
		<td> <label for="op_css_theme4">
			 <input type="radio"  name="op_css_theme" id="op_css_theme4"
			 <?php if($ssShow_newOptions['css_theme'] == "custom") echo $checked; ?> value="custom" />
			</label>
     </td>
	</tr>
	<tr>
		<td>1row 150px thumbs bellow.</td>
		<td>1row 50px thumbs bellow.</td>
		<td>2column 150px thumbs left side.</td>
		<td>1column 150px thumbs right side.</td>
	</tr>
	</table>
     <br /><span class="setting-description"><?php _e('  Choose a theme for your SlideShow.  Set for thumbs at 150px, you can edit the css files to suit your needs. ',$plugin_name); ?></span>
    
  </fieldset>
  </div>
</div><!--  close frag 1-->
 
 

	<div id="fragment-2" class="ss-tabs-panel">
	<h3 class="title">SlideShow Shortcode</h3>
		
				<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- Theme options start -->  
   <legend><b><?php _e(' Shortcode',$plugin_name); ?>:</b></legend>
		 <ul style="list-style-type: none;">
		 	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
    	
    	<label for="op_shortcodegal">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['ss_shortcode'] == "gallery") echo $checked; ?> name="op_shortcode" id="op_shortcodegal" value="gallery" /> 
    		<?php _e('Use gallery as your shortcode.',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_shortcodeslide">
     		<input type="radio" 
     		<?php if($ssShow_newOptions['ss_shortcode'] == "slideshow") echo $checked; ?>  name="op_shortcode" id="op_shortcodeslide" value="slideshow" />
     		<?php _e(' Use the default slideshow as your shortcode.',$plugin_name); ?>
     		</label>


     	  <br /><span class="setting-description"><?php _e('  By setting this to slideshow, you can keep your default WordPress galleries. You must then add the [slideshow] shortcode to your page or post. Gallery options will not interfeer with slideshow, nor will slideshow options interfeer with gallery. ',$plugin_name); ?></span>
   			
    		</li>
		 	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
    	
    	<label for="op_shortcodeshowon">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['show_shortcode'] == "true") echo $checked; ?> name="op_shortcodeshow" id="op_shortcodeshowon" value="true" /> 
    		<?php _e('SlideShow shortcode metabox in post screen is turned on.',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_shortcodeshowoff">
     		<input type="radio" 
     		<?php if($ssShow_newOptions['show_shortcode'] == "false") echo $checked; ?>  name="op_shortcodeshow" id="op_shortcodeshowoff" value="false" />
     		<?php _e(' Off, not displayed on post / page screen.',$plugin_name); ?>
     		</label><br />
     		<span class="setting-description">
     		<?php _e('By turning this off the SlideShow shortcode metabox will not be available on your post screen, short code will still work. ',$plugin_name); ?>
     		</span>
    		</li>
		 </ul>
	</fieldset>
		<a href="#show_info_folder" class="ss_tool" style="padding: 2px 8px;"><?php _e(' shortcode sample: ? ',$plugin_name); ?></a>
    <div id ="show_info_folder" class="info_box" style="display:none;">
                       <h3><?php _e('shortcode sample info ',$plugin_name); ?></h3>
                        <?php _e('basic: [gallery ]',$plugin_name); ?><br />
                        <?php _e('complex: [gallery id="12, 23, 34" show_type="flash" image_size="medium" pop_size="large" first="3" color="#1b1b1b, #ffffff, #666666, #999999" height="330" width="480" delay="2400" duration="1200" linked="image" captions="true" overlap="true" thumbnails="true" thumbsize="minithumb" random="true" loop="true" loader="true" controller="true" center="true" resize="true" clear="both" ]',$plugin_name); ?>
                        </div>

</div><!--  close frag 2-->
		
	<div id="fragment-3" class="ss-tabs-panel">
	<h3 class="title">Transition Options</h3>
		
		<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- SLideshow options start -->
   <legend><b><?php _e(' Personalize Transitions',$plugin_name); ?>:</b></legend>
   <ul style="list-style-type: none;">
     
    <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
    <label for="op_show_type"><?php _e(' Slideshow transition style.',$plugin_name); ?></label>
    <select name="op_show_type" id="op_show_type">
		 <option <?php if($ssShow_newOptions['show_type'] == "default") echo $selected; ?> id="op_show_type1" value='default'> default</option>
		 <option <?php if($ssShow_newOptions['show_type'] == "kenburns") echo $selected; ?> id="op_show_type2" value='kenburns'> kenburns</option>
		 <option <?php if($ssShow_newOptions['show_type'] == "push") echo $selected; ?> id="op_show_type3" value='push'> push</option>
		 <option <?php if($ssShow_newOptions['show_type'] == "fold") echo $selected; ?> id="op_show_type4" value='fold'> fold</option>
		 <option <?php if($ssShow_newOptions['show_type'] == "flash") echo $selected; ?> id="op_show_type5" value='flash'> flash</option><!--
		 <option <?php if($ssShow_newOptions['show_type'] == "shrink") echo $selected; ?> id="op_show_type6" value='shrink'> shrink</option>-->
	</select>
   
     </li>
     
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_trans_type"><?php _e(' Transition type',$plugin_name); ?>:   </label>  
		 <select name="op_trans_type" id="op_trans_type">
			 <option <?php if($ssShow_newOptions['trans_type'] == "sine") echo $selected; ?> id="sine" value='sine'> sine</option>
			 <option <?php if($ssShow_newOptions['trans_type'] == "elastic") echo $selected; ?> id="elastic" value='elastic'> elastic</option>
			 <option <?php if($ssShow_newOptions['trans_type'] == "bounce") echo $selected; ?> id="bounce" value='bounce'> bounce</option>
			 <option <?php if($ssShow_newOptions['trans_type'] == "back") echo $selected; ?> id="back" value='back'> back</option>
			 <option <?php if($ssShow_newOptions['trans_type'] == "expo") echo $selected; ?> id="expo" value='expo'> expo</option>
			 <option <?php if($ssShow_newOptions['trans_type'] == "circ") echo $selected; ?> id="circ" value='circ'> circ</option>
			 <option <?php if($ssShow_newOptions['trans_type'] == "quad") echo $selected; ?> id="quad" value='quad'> quad</option>
			 <option <?php if($ssShow_newOptions['trans_type'] == "cubic") echo $selected; ?> id="cubic" value='cubic'> cubic</option>
			 <option <?php if($ssShow_newOptions['trans_type'] == "linear") echo $selected; ?> id="linear" value='linear'> linear</option>
			</select><br />
		<label for="op_trans_inout"><?php _e(' Transition action.',$plugin_name); ?></label>
		<select name="op_trans_inout" id="op_trans_inout">
			 <option <?php if($ssShow_newOptions['trans_inout'] == "in") echo $selected; ?> id="in" value='in'> in</option>
			 <option <?php if($ssShow_newOptions['trans_inout'] == "out") echo $selected; ?> id="out" value='out'> out</option>
			 <option <?php if($ssShow_newOptions['trans_inout'] == "in:out") echo $selected; ?> id="inout" value='in:out'> in:out</option>     
		</select>
		<span class="setting-description"><?php _e(' IN is the beginning of transition. OUT is the end.',$plugin_name); ?></span>
     </li><!-- //'quad:in:out'sine:out, elastic:out, bounce:out, expo:out, circ:out, quad:out, cubic:out, linear:out, -->    
     
	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		 <label for="op_delay"><?php _e(' Slide viewing time'); ?>:
		 <input type="text" class="span-text" name="op_delay" id="op_delay" size="6" maxlength="6"
		 value="<?php echo ($ssShow_newOptions['delay']); ?>" /></label> 
		 <span class="setting-description"><?php _e('  In milliseconds, ie: 1000 = 1 second, (default 4000)',$plugin_name); ?></span>
	</li>
      
      <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		 <label for="op_duration"><?php _e(' Transition time '); ?>:
		 <input type="text" class="span-text" name="op_duration" id="op_duration" size="6" maxlength="6"
		 value="<?php echo ($ssShow_newOptions['duration']); ?>" /></label> 
		 <span class="setting-description"><?php _e('  In milliseconds, ie: 1000 = 1 second, (default 1500)',$plugin_name); ?></span>
	</li>
      
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_zoom"><?php _e('Kenburns Slideshow zoom '); ?>:
		 <input type="text" class="span-text" name="op_zoom" id="op_zoom" size="20" maxlength="20"
		 value="<?php echo ($ssShow_newOptions['zoom']); ?>" /></label> 
		 <span class="setting-description"><?php _e('  For Kenburns transition, zoom amount, (default 25)',$plugin_name); ?></span><br />
	 	<small>An integer, or range of integers as an array, from 0 to 100 that zooms the slide 1x to 2x of the size of the slideshow. If you use an array of numbers, be sure to seperate them with commas.</small>
	 </li>
     
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_pan"><?php _e('Kenburns Slideshow pan '); ?>:
		 <input type="text" class="span-text" name="op_pan" id="op_pan" size="20" maxlength="20"
		 value="<?php echo ($ssShow_newOptions['pan']); ?>" /></label> 
		 <span class="setting-description"><?php _e(' For Kenburns, this is the pan start and finish. (default 25, 75)',$plugin_name); ?></span><br />
		<small>An integer, or range of integers as an array, from 0 to 100 that pans the slide 0% to 100% of it's overflow. If you use an array of numbers, be sure to seperate them with commas.</small>
	</li> 
	<!-- -->
		<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_color"><?php _e(' Flash Slide colors '); ?>:
		 <input type="text" class="span-text" name="op_color" id="op_color" size="8" maxlength="150"
		 value="<?php echo ($ssShow_newOptions['color']); ?>" /></label> 
		 <span class="setting-description"><?php _e(' For flashing from  a color to the image',$plugin_name); ?></span>
		<br /><small>color - (default #FFF) A single color: #cdcdcd, or an array of colors: #fff, #000, #dedede, #cdcdcd. <!-- string or array: or an array of colors: ["#FFF", "#000"], which are applied incrementally to the slides in the show.-->
		</small>
	</li> 
			
		
     </ul>
  </fieldset>

		<p><?php _e('These options are global. You can modify most options within your individual post by adding options to the shortcode, as viewed in the shortcode example.',$plugin_name); ?>
		</p>
		<p><?php _e('You can further edit and or modify your image transitions, captions transitions, controller transitions, loading icon transitions and thumbnail transitions by editing your chosen css file. All css is commented explaining which class does what.',$plugin_name); ?></p>
</div><!--  close frag 3-->


<div id="fragment-4" class="ss-tabs-panel">
	<h3 class="title">Image Options</h3>
		<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- Theme options start -->  
   <legend><b><?php _e(' Slide Images',$plugin_name); ?>:</b></legend>
		 <ul style="list-style-type: none;">

		 	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
				<label for="op_image_size"><?php _e(' Slideshow Image size to use.',$plugin_name); ?></label>
				<select name="op_image_size" id="op_image_size">
					 <option <?php if($ssShow_newOptions['image_size'] == "thumbnail") echo $selected; ?> id="op_image_size1" value='thumbnail'> thumbnail</option>
					 <option <?php if($ssShow_newOptions['image_size'] == "medium") echo $selected; ?> id="op_image_size2" value='medium'> medium</option>
					 <option <?php if($ssShow_newOptions['image_size'] == "slideshow") echo $selected; ?> id="op_image_size3" value='slideshow'>custom slideshow</option>
					 <option <?php if($ssShow_newOptions['image_size'] == "large") echo $selected; ?> id="op_image_size4" value='large'> large</option>
					 <option <?php if($ssShow_newOptions['image_size'] == "full") echo $selected; ?> id="op_image_size5" value='full'> full</option>
				</select>
				<br /><span class="setting-description"><?php _e(' Which image size to set as default for all slide shows. Overrides the gallery size defined in WordPress insert gallery window.',$plugin_name); ?></span>
			</li>
			
			
			 <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
				
				<label for="op_centeron">
					<input type="radio" 
					<?php if($ssShow_newOptions['center'] == "true") echo $checked; ?> name="op_center" id="op_centeron" value="true" /> 
					<?php _e(' Image centered on (default).',$plugin_name); ?>
					</label>
					<br />
				<label for="op_centeroff">
					<input type="radio" 
					<?php if($ssShow_newOptions['center'] == "false") echo $checked; ?>  name="op_center" id="op_centeroff" value="false" />
					<?php _e(' Image centered off.',$plugin_name); ?>
					</label>
			
		 </li>
		 <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		 <label for="op_resize"><?php _e(' Slideshow image resizing.',$plugin_name); ?></label>
			 <select name="op_resize" id="op_resize">
				 <option <?php if($ssShow_newOptions['resize'] == "true") echo $selected; ?> id="op_resize1" value='true'> true</option>
				 <option <?php if($ssShow_newOptions['resize'] == "false") echo $selected; ?> id="op_resize2" value='false'> false</option>
				 <option <?php if($ssShow_newOptions['resize'] == "length") echo $selected; ?> id="op_resize3" value='length'> length</option>
				 <option <?php if($ssShow_newOptions['resize'] == "width") echo $selected; ?> id="op_resize4" value='width'> width</option>
			</select>
			 <br /><span class="setting-description"><?php _e(' True will scale the image to fit your viewing area based on the shortest side. Length will scale to fit the longest side of the image. Width will scale to fit the shortest side of the image',$plugin_name); ?></span>
			
		</li>
		 <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
			
				<label for="op_overlapon">
					<input type="radio" 
					<?php if($ssShow_newOptions['overlap'] == "true") echo $checked; ?> name="op_overlap" id="op_overlapon" value="true" /> 
					<?php _e(' Overlap images in transition (default).',$plugin_name); ?>
					</label>
					<br />
				<label for="op_overlapoff">
					<input type="radio" 
					<?php if($ssShow_newOptions['overlap'] == "false") echo $checked; ?>  name="op_overlap" id="op_overlapoff" value="false" />
					<?php _e(' Prevent image overlap.',$plugin_name); ?>
					</label>
				
		 
		</li>
		<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
			<h3>Custom Image Creation</h3>
			
            <label for="op_myslide_width"><?php _e(' custom image width '); ?>:
                     <input type="text" class="span-text" name="op_myslide_width" id="op_myslide_width" size="3" maxlength="6"
                     value="<?php $size_w = get_option('slideshow_size_w'); if($size_w) { echo $size_w;} else {echo $ssShow_newOptions[myslide_width];} ?> " />
                     </label> 
                     <span class="setting-description"><?php _e('px, ',$plugin_name); ?></span>
            
            <label for="op_myslide_height"><?php _e(' custom image height '); ?>:
                     <input type="text" class="span-text" name="op_myslide_height" id="op_myslide_height" size="3" maxlength="6"
                     value="<?php $size_h = get_option('slideshow_size_h'); if($size_h) { echo $size_h;} else {echo $ssShow_newOptions[myslide_height];} ?>" />
                     </label> 
                     <span class="setting-description"><?php _e('px, ',$plugin_name); ?></span>
             <label for="op_slidecrop">
                    <input type="checkbox" 
                    <?php if( get_option('slideshow_crop') == "1") echo $checked; ?>  name="op_slidecrop" id="op_slidecrop" />
                    <?php _e(' custom image cropped.',$plugin_name); ?></label> 
                    <br /><span class="setting-description"><?php _e(' Slideshow plugin creates a custom size image (when you upload an image) You can define the size and use it here.<br />
                    (These image settings are also available on the <a href="options-media.php">media settings page</a>).',$plugin_name); ?></span>
                    
     		</label>
     </li>
		 </ul>
	</fieldset>
</div><!--  close frag 4-->

	

<div id="fragment-5" class="ss-tabs-panel">
	<h3 class="title">General Options</h3>
		
		<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- SLideshow options start -->
   <legend><b><?php _e(' Personalize your SlideShow',$plugin_name); ?>:</b></legend>
   <ul style="list-style-type: none;">
		 
		 <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		 <label for="op_first_slide"><?php _e(' Starting slide '); ?>:
			 <input type="text" class="span-text" name="op_first_slide" id="op_first_slide" size="2" maxlength="2"
			 value="<?php echo ($ssShow_newOptions['first_slide']); ?>" /></label> 
			 <span class="setting-description"><?php _e('  Which slide should be the first? the count starts at 0. (default 0)',$plugin_name); ?></span>
		 </li>		 
		 <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		 <label for="op_limit"><?php _e(' Maxinum number of slides per show'); ?>:
			 <input type="text" class="span-text" name="op_limit" id="op_limit" size="3" maxlength="3"
			 value="<?php echo ($ssShow_newOptions['limit']); ?>" /></label> 
			 <span class="setting-description"><?php _e('  How many slides should we add? Set a limit to prevent runaway image loading. (default 50)',$plugin_name); ?></span>
		 </li>
		 
		<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		 <label for="op_height"><?php _e(' Slideshow height '); ?>:
			 <input type="text" class="span-text" name="op_height" id="op_height" size="6" maxlength="6"
			 value="<?php echo ($ssShow_newOptions['height']); ?>" /></label> 
			 <span class="setting-description"><?php _e('px, this is the viewing area',$plugin_name); ?></span>
		 </li>     
		 <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		 <label for="op_width"><?php _e(' Slideshow width '); ?>:
			 <input type="text" class="span-text" name="op_width" id="op_width" size="6" maxlength="6"
			 value="<?php echo ($ssShow_newOptions['width']); ?>" /></label> 
			 <span class="setting-description"><?php _e('px, this is the viewing area',$plugin_name); ?></span>
		 </li>
		  <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		 <label for="op_clear"><?php _e(' Insert a clearing break :',$plugin_name); ?></label>
			 <select name="op_clear" id="op_clear">
				 <option <?php if($ssShow_newOptions['clear'] == "") echo $selected; ?> id="op_clear1" value=''> off</option>
				 <option <?php if($ssShow_newOptions['clear'] == "right") echo $selected; ?> id="op_clear2" value='right'> right</option>
				 <option <?php if($ssShow_newOptions['clear'] == "left") echo $selected; ?> id="op_clear3" value='left'> left</option>
				 <option <?php if($ssShow_newOptions['clear'] == "both") echo $selected; ?> id="op_clear4" value='both'> both</option>
			</select>
			  <span class="setting-description"><?php _e(' after the show to clear the next html item.',$plugin_name); ?></span>
			
		</li>
		<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		
			<label for="op_controlleron">
				<input type="radio" 
				<?php if($ssShow_newOptions['controller'] == "true") echo $checked; ?> name="op_controller" id="op_controlleron" value="true" /> 
				<?php _e(' Controller on (default).',$plugin_name); ?>
				</label>
				<br />
			<label for="op_controlleroff">
				<input type="radio" 
				<?php if($ssShow_newOptions['controller'] == "false") echo $checked; ?>  name="op_controller" id="op_controlleroff" value="false" />
				<?php _e(' off.',$plugin_name); ?>
				</label>
				
		</li>
	  <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

    	<label for="op_mouseoveron">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['mouseover'] == "true") echo $checked; ?> name="op_mouseover" id="op_mouseoveron" value="true" /> 
    		<?php _e(' Mouseover stop slides on.',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_mouseoveroff">
     		<input type="radio" 
     		<?php if($ssShow_newOptions['mouseover'] == "false") echo $checked; ?>  name="op_mouseover" id="op_mouseoveroff" value="false" />
     		<?php _e(' off.',$plugin_name); ?>
     		</label>
			<br /><span class="setting-description"><?php _e('  Your slideshow will pause while the users mouse is over the images. If you use this option, turn the controller off, also if using popover, the show will start when image is popped.',$plugin_name); ?>
     	 </span>
	 
	</li>
     
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

    	<label for="op_pausedoff">
     		<input type="radio" 
     		<?php if($ssShow_newOptions['paused'] == "false") echo $checked; ?>  name="op_paused" id="op_pausedoff" value="false" />
     		<?php _e(' Starts activated (default).',$plugin_name); ?>
     		</label>

     		<br />
    	<label for="op_pausedon">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['paused'] == "true") echo $checked; ?> name="op_paused" id="op_pausedon" value="true" /> 
    		<?php _e(' Paused at start.',$plugin_name); ?>
    		</label>

    </li>
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

    	<label for="op_randomon">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['random'] == "true") echo $checked; ?> name="op_random" id="op_randomon" value="true" /> 
    		<?php _e(' Random image order on.',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_randomoff">
     		<input type="radio" 
     		<?php if($ssShow_newOptions['random'] == "false") echo $checked; ?>  name="op_random" id="op_randomoff" value="false" />
     		<?php _e(' off (default).',$plugin_name); ?>
     		</label>

    </li>
     
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

    	<label for="op_loopon">
    	   <input type="radio" 
    		<?php if($ssShow_newOptions['loop'] == "true") echo $checked; ?> name="op_loop" id="op_loopon" value="true" /> 
    		<?php _e(' Loop image group from end to start (default).',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_loopoff">
     		<input type="radio" 
     		<?php if($ssShow_newOptions['loop'] == "false") echo $checked; ?>  name="op_loop" id="op_loopoff" value="false" />
     		<?php _e(' Looping of image group off.',$plugin_name); ?>
     		</label>

    </li>
     
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

    	<label for="op_loaderon">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['loader'] == "true") echo $checked; ?> name="op_loader" id="op_loaderon" value="true" /> 
    		<?php _e(' Show loading graphic while loading (default).',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_loaderoff">
     		<input type="radio" 
     		<?php if($ssShow_newOptions['loader'] == "false") echo $checked; ?>  name="op_loader" id="op_loaderoff" value="false" />
     		<?php _e(' No loading graphic.',$plugin_name); ?>
     		</label>
    	</li> 
    </ul>
  	</fieldset>

</div> <!-- close frag 5 -->


<div id="fragment-6" class="ss-tabs-panel">
	<h3 class="title">Thumbnails</h3>
		<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;">
   			<legend><b><?php _e(' Thumb Options'); ?>:</b></legend>
		<ul style="list-style-type: none;">
	
	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

    	<label for="op_thumbnailson">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['thumbnails'] == "true") echo $checked; ?> name="op_thumbnails" id="op_thumbnailson" value="true" /> 
    		<?php _e(' Slideshow thumbnails on (default).',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_thumbnailsoff">
     		<input type="radio" 
     		<?php if($ssShow_newOptions['thumbnails'] == "false") echo $checked; ?>  name="op_thumbnails" id="op_thumbnailsoff" value="false" />
     		<?php _e(' Slideshow thumbnails off.',$plugin_name); ?>
     		</label>

    </li>
     
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

    	<label for="op_faston">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['fast'] == "true") echo $checked; ?> name="op_fast" id="op_faston" value="true" /> 
    		<?php _e(' Thumbnail click, jumps to new image.',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_fastoff">
     		<input type="radio" 
     		<?php if($ssShow_newOptions['fast'] == "false") echo $checked; ?>  name="op_fast" id="op_fastoff" value="false" />
     		<?php _e(' Thumbnail click transitions to new image (default).',$plugin_name); ?>
     		</label>

    </li>
	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
	 <label for="op_thumbsize"><?php _e(' Thumbnail size to use :',$plugin_name); ?></label>
		 <select name="op_thumbsize" id="op_thumbsize">
			 <option <?php if($ssShow_newOptions['thumbsize'] == "minithumb") echo $selected; ?> id="op_thumbsize2" value='minithumb'> minithumb</option>
			 <option <?php if($ssShow_newOptions['thumbsize'] == "thumbnail") echo $selected; ?> id="op_thumbsize1" value='thumbnail'> default system thumbnail</option>
			 <option <?php if($ssShow_newOptions['thumbsize'] == "medium") echo $selected; ?> id="op_thumbsize3" value='medium'> medium</option>
			 <option <?php if($ssShow_newOptions['thumbsize'] == "buttons") echo $selected; ?> id="op_thumbsize4" value='buttons'> buttons</option>
		</select>
		  <span class="setting-description"><?php _e(' ',$plugin_name); ?></span>
		
	</li>
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <span class="setting-description"><?php _e('The SuperSlider-Show plugin can create additional mini thumbnails. <br />This happens upon image upload. So to create minithumbs for previously uploaded images you would need to install the <a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" >Regenerate thumnails plugin</a>.',$plugin_name); ?></span>
     <br />
     </li>
      <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
    	<label for="op_mythumbon">
    	<input type="checkbox" 
    	<?php if($ssShow_newOptions['mythumbon'] == "on") echo $checked; ?> name="op_mythumbon" id="op_mythumbon" />
    	<?php _e(' Turn new mini thumbnail size creation on.',$plugin_name); ?></label>
    </li>

		<li><label for="op_mythumb_width"><?php _e(' Mini Thumbnail width '); ?>:
			 <input type="text" class="span-text" name="op_mythumb_width" id="op_mythumb_width" size="3" maxlength="6"
			 value="<?php $size_w = get_option('minithumb_size_w'); if($size_w) { echo $size_w;} else {echo $ssShow_newOptions[mythumb_width];} ?>" /></label> 
			 <span class="setting-description"><?php _e('px, ',$plugin_name); ?></span>
     <label for="op_mythumb_height"><?php _e(' Mini Thumbnail height '); ?>:
			 <input type="text" class="span-text" name="op_mythumb_height" id="op_mythumb_height" size="3" maxlength="6"
			 value="<?php $size_h = get_option('minithumb_size_h'); if($size_h) { echo $size_h;} else {echo $ssShow_newOptions[mythumb_height];}  ?>" /></label> 
			 <span class="setting-description"><?php _e('px, ',$plugin_name); ?></span>
     <label for="op_thumbcrop">
     		<input type="checkbox" 
     		<?php if(get_option('minithumb_crop') == "1") echo $checked; ?>  name="op_thumbcrop" id="op_thumbcrop" />
     		<?php _e(' Thumbnail cropped.',$plugin_name); ?>
     		</label>
     <br /><span class="setting-description"><?php _e('(These image settings are also available on the <a href="options-media.php">Media Settings page</a>).',$plugin_name); ?></span>
     </li>
		</ul></fieldset>
		
</div><!-- close frag 6 -->

<div id="fragment-7" class="ss-tabs-panel">
	<h3 class="title">Captions</h3>
		
		<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- SLideshow options start -->
   <legend><b><?php _e(' Personalize your Captions',$plugin_name); ?>:</b></legend>
   <ul style="list-style-type: none;">
   
        <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

    	<label for="op_captionson">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['captions'] == "true") echo $checked; ?> name="op_captions" id="op_captionson" value="true" /> 
    		<?php _e(' Image captions on (default).',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_captionsoff">
     		<input type="radio" 
     		<?php if($ssShow_newOptions['captions'] == "false") echo $checked; ?>  name="op_captions" id="op_captionsoff" value="false" />
     		<?php _e(' off.',$plugin_name); ?>
     		</label>

    </li>
    
    <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
				<label for="op_caption_title"><?php _e(' Caption title to use.',$plugin_name); ?></label>
				<select name="op_caption_title" id="op_caption_title">
					 <option <?php if($ssShow_newOptions['caption_title'] == "image_title") echo $selected; ?> id="op_caption_title1" value='image_title'> image title</option>
					 <option <?php if($ssShow_newOptions['caption_title'] == "image_caption") echo $selected; ?> id="op_caption_title2" value='image_caption'> image caption</option>
					 <option <?php if($ssShow_newOptions['caption_title'] == "post_title") echo $selected; ?> id="op_caption_title3" value='post_title'> post title</option>
					 <option <?php if($ssShow_newOptions['caption_title'] == "post_category") echo $selected; ?> id="op_caption_title4" value='post_category'> post category name</option>
					 <option <?php if($ssShow_newOptions['caption_title'] == "none") echo $selected; ?> id="op_caption_title5" value='none'> NONE</option>
				</select>
				<br /><span class="setting-description"><?php _e('The caption title is set into an h2 tag, which info do you want to use?',$plugin_name); ?></span>
	</li>
    <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
				<label for="op_caption_text"><?php _e(' Caption text to use.',$plugin_name); ?></label>
				<select name="op_caption_text" id="op_caption_text">
					 <option <?php if($ssShow_newOptions['caption_text'] == "image_title") echo $selected; ?> id="op_caption_text1" value='image_title'> image title</option>
					 <option <?php if($ssShow_newOptions['caption_text'] == "image_caption") echo $selected; ?> id="op_caption_text2" value='image_caption'> image caption</option>
					 <option <?php if($ssShow_newOptions['caption_text'] == "image_description") echo $selected; ?> id="op_caption_text3" value='image_description'>image description</option>
					 <option <?php if($ssShow_newOptions['caption_text'] == "post_title") echo $selected; ?> id="op_caption_text4" value='post_title'> post title</option>
					 <option <?php if($ssShow_newOptions['caption_text'] == "post_excerpt") echo $selected; ?> id="op_caption_text5" value='post_excerpt'> post excerpt</option>
					 <!---->
					 <option <?php if($ssShow_newOptions['caption_text'] == "none") echo $selected; ?> id="op_caption_text6" value='none'> NONE</option>
				</select>
				<br /><span class="setting-description"><?php _e(' The caption text is the regular text which follows the title within the image caption.',$plugin_name); ?></span>
	</li>
	 <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
    	<label for="op_caption_link"><?php _e(' Text to use in the caption link.',$plugin_name); ?></label>
				<select name="op_caption_link" id="op_caption_link" >
					 <option <?php if($ssShow_newOptions['caption_link'] == "image_title") echo $selected; ?> id="op_caption_link1" value='image_title'> image title</option>
					 <option <?php if($ssShow_newOptions['caption_link'] == "image_caption") echo $selected; ?> id="op_caption_link2" value='image_caption'> image caption</option>
					 <option <?php if($ssShow_newOptions['caption_link'] == "image_description") echo $selected; ?> id="op_caption_link3" value='image_description'>image description</option>
					 <option <?php if($ssShow_newOptions['caption_link'] == "post_title") echo $selected; ?> id="op_caption_link4" value='post_title'> post title</option>
					 <option <?php if($ssShow_newOptions['caption_link'] == "none") echo $selected; ?> id="op_caption_link5" value='none'> NONE</option>
					 <option <?php if($ssShow_newOptions['caption_link'] == "custom_link_text") echo $selected; ?> id="op_caption_link6" value='custom_link_text'> Personalize</option>
				</select>
				<br />
				<span class="setting-description"><?php _e('Select personalize and add your own link text here : ',$plugin_name); ?></span>
				<input type="text" class="span-text" name="op_caption_link_text" id="op_caption_link_text" size="20" maxlength="100"
			 value="<?php echo ($ssShow_newOptions['caption_link_text']); ?>" /></label> 
			 
				<br /><span class="setting-description"><?php _e(' Which text source would you like to use for the end link within the captions?',$plugin_name); ?></span>
	</li>
</ul></fieldset>
		
</div><!-- close frag 7 -->   

<div id="fragment-8" class="ss-tabs-panel">
	<h3 class="title">Image Links Lightbox Popovers</h3>
	<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- Header files options start -->
   	<legend><b><?php _e(' Image Linking Options'); ?>:</b></legend>
  	<ul style="list-style-type: none;">
  		<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		 <label for="op_href"><?php _e(' Show links to '); ?>:
			 <input type="text" class="span-text" name="op_href" id="op_href" size="30" maxlength="150"
			 value="<?php echo ($ssShow_newOptions['href']); ?>" /></label> 
			 
			 <br /><span class="setting-description"><?php _e('  Add a global link destination for all slides. Image linked option bellow needs to be off. (http://www.yercoolsite.com)',$plugin_name); ?></span>
		 </li>
  	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

    	<label for="op_linkedon">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['linked'] == "attach") echo $checked; ?> name="op_linked" id="op_linkedon" value="attach" /> 
    		<?php _e(' Image linked to attachment.',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_linkedparent">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['linked'] == "parent") echo $checked; ?> name="op_linked" id="op_linkedparent" value="parent" /> 
    		<?php _e(' Image linked to parent.',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_linkedlight">
    		<input type="radio" 
    		<?php if($ssShow_newOptions['linked'] == "lightbox") echo $checked; ?> name="op_linked" id="op_linkedlight" value="lightbox" /> 
    		<?php _e(' Image linked to lightbox. (default)',$plugin_name); ?>
    		</label>
    		<br />
    	<label for="op_linkedoff">
     		<input type="radio"
     		<?php if($ssShow_newOptions['linked'] == "false") echo $checked; ?>  name="op_linked" id="op_linkedoff" value="false" />
     		<?php _e(' Image linked off.',$plugin_name); ?>
     		</label>

      <br /><span class="setting-description"><?php _e('  Turn on if the main slideshow image should be linked to either the Wordpress attachment page, the Image parent page or a lightbox popover. ',$plugin_name); ?></span>
   
    </li>
	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
				<label for="op_pop_size"><?php _e(' Popover Image size to use.',$plugin_name); ?></label>
				
				<select name="op_pop_size" id="op_pop_size">   
                 <?php foreach ( $size_names as $size ) { ?>
                <option <?php if($ssShow_newOptions['pop_size'] == "$size") echo $selected; ?>  value='<?php echo $size; ?>'><?php echo $size; ?></option>
                <?php }?>     
                </select>
				<span class="setting-description"><?php _e(' Which image size to set as default for Popovers with light boxes.',$plugin_name); ?></span>
			</li>
	
    <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
    	<label for="op_lightbox_add">
    	<input type="checkbox" name="op_lightbox_add" id="op_lightbox_add"
    	<?php if($ssShow_newOptions['lightbox_add'] == "on") echo $checked; ?> />
    	<?php _e(' Add built in SuperSlider lightbox .',$plugin_name); ?></label>
    	 <br /><span class="setting-description"><?php _e('  If you want to link to a lightbox popover, and you don\'t have the lightbox plugin installed. This will install for the slideshow only. ',$plugin_name); ?></span>
   
	</li>
	<li>
	   <p><?php _e(' Select which Lightbox plugin you would like to use. Included with SuperSlider-Show. (auto install for slide show only) May conflict with other lightbox plugins',$plugin_name); ?></p>
	</li>
	
    <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">          
    	<label for="op_lightbox_type1">
			<input type="radio" name="op_lightbox_type" id="op_lightbox_type1"
			<?php if($ssShow_newOptions['lightbox_type'] == "Lightbox") echo $checked; ?> value="Lightbox" />
			<?php _e('Base lightbox for pop over ',$plugin_name); ?></label><br />
			<span class="setting-description"><?php _e('  Base lightbox will not scale your image to fit inside of the window. It has a close button and a title, but no description nor previous / next image buttons. ',$plugin_name); ?></span>
   		<br />
   	</li>	
   	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		<label for="op_lightbox_type2">
			<input type="radio" name="op_lightbox_type"  id="op_lightbox_type2"
			<?php if($ssShow_newOptions['lightbox_type'] == "SqueezeBox") echo $checked; ?> value="SqueezeBox" />
			<?php _e(' SqueezeBox for pop over.',$plugin_name); ?></label>
				 <label for="op_squeeze_width"><?php _e(' box max width '); ?>:
				 <input type="text" class="span-text" name="op_squeeze_width" id="op_squeeze_width" size="3" maxlength="6"
				 value="<?php echo ($ssShow_newOptions['squeeze_width']); ?>" />px</label> 
				 <label for="op_squeeze_height"><?php _e(' box max height '); ?>:
				 <input type="text" class="span-text" name="op_squeeze_height" id="op_squeeze_height" size="3" maxlength="6"
				 value="<?php echo ($ssShow_newOptions['squeeze_height']); ?>" />px</label> 
				 <br />
			<span class="setting-description"><?php _e('  SqueezeBox will scale your image to fit inside of the window. It has a close button but no title / description nor previous / next image buttons. ',$plugin_name); ?></span>
		</li>
    <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">    	
    	<label for="op_lightbox_type3">
			<input type="radio" name="op_lightbox_type" id="op_lightbox_type3"
			<?php if($ssShow_newOptions['lightbox_type'] == "Slimbox") echo $checked; ?> value="Slimbox" />
			<?php _e(' Slimbox for pop over.',$plugin_name); ?></label> <br />
			<span class="setting-description"><?php _e('Recomended since you have the superslider-slimbox plugin installed.',$plugin_name); ?>
   </li>
    
    <li>   <p><?php _e('You may consider getting the <a href="http://superslider.daivmowbray.com/downloadsuperslider/superslider-slimbox-download">SuperSlider-slimbox plugin</a>. For pop overs. Avoid conflicts and works with site images and SuperSlider-Show',$plugin_name); ?> </p> 	
	</li>
    </ul>
     </fieldset>
     
</div><!-- close frag7 -->



<div id="fragment-9" class="ss-tabs-panel">
	<h3 class="title">Advanced</h3>
    	<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;">
   			<legend><b><?php _e(' Advanced Options'); ?>:</b></legend>
  		 <ul style="list-style-type: none;">
  		<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
    	<label for="op_accesskeys"><?php _e(' Change accesskeys '); ?>:
			 <input type="text" class="span-text" name="op_accesskeys" id="op_accesskeys" size="60" maxlength="350"
			 value="<?php echo stripslashes($ssShow_newOptions['accesskeys']); ?>" /></label> 
	        <p>The default is: 'first': 'shift + left', 'prev': 'left', 'pause': 'p', 'next': 'right', 'last': 'shift + right'</p>
	   </li>
   
        <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
        <label for="op_replace"><?php _e(' Change thumbnail extension '); ?>:
        <input type="text" class="span-text" name="op_replace" id="op_replace" size="60" maxlength="350"
			 value="<?php echo ($ssShow_newOptions['replace']); ?>" /></label> 
            <p>The default is: 't', you could set this to _thumb, then your thumbs need to be named "image_thumb.jpg". This only works with the fromfolder option</p>
    </li>
    <li>
    <label for="op_recent_limit"><?php _e(' Limit recent number of posts per category '); ?>:
				 <input type="text" class="span-text" name="op_recent_limit" id="op_recent_limit" size="3" maxlength="6"
				 value="<?php echo ($ssShow_newOptions['recent_limit']); ?>" />posts will be selected from each category when using the shortcode: [gallery id="recent"]</label> 
    </li>
    </ul>
     </fieldset>

</div><!-- close frag8 -->



<div id="fragment-10" class="ss-tabs-panel">
	<h3 class="title">File Storage</h3>
	<div
<?php if ($this->base_over_ride != "on") { 
  		 echo '';
  		} else {
  		echo 'style="display:none;"';
  		}?> 
	>

	<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;">
   			<legend><b><?php _e(' Loading Options'); ?>:</b></legend>
  		 <ul style="list-style-type: none;">
  		<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
    	<label for="op_load_moo">
    	<input type="checkbox" 
    	<?php if($ssShow_newOptions['load_moo'] == "on") echo $checked; ?> name="op_load_moo" id="op_load_moo" />
    	<?php _e(' Load Mootools 1.4.5 into your theme header.',$plugin_name); ?></label>
    	<p><?php _e(' If your theme or any other plugin loads the mootools 1.4.5 javascript framework into your file header, you can deactivate it here.',$plugin_name); ?></p>
	</li>
	
    <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

    	<label for="op_css_load1">
			<input type="radio" name="op_css_load" id="op_css_load1"
			<?php if($ssShow_newOptions['css_load'] == "default") echo $checked; ?> value="default" />
			<?php _e(' Load css from default location. superslider-show plugin folder.',$plugin_name); ?></label><br />
    	<label for="op_css_load2">
			<input type="radio" name="op_css_load"  id="op_css_load2"
			<?php if($ssShow_newOptions['css_load'] == "pluginData") echo $checked; ?> value="pluginData" />
			<?php _e(' Load css from plugin-data folder, see side note. (Recommended)',$plugin_name); ?></label><br />
       <label for="op_css_load3">
			<input type="radio" name="op_css_load"  id="op_css_load3"
			<?php if($ssShow_newOptions['css_load'] == "theme") echo $checked; ?> value="theme" />
			<?php _e(' Load css from your theme folder.',$plugin_name); ?></label><br />
		<label for="op_css_load4">
			<input type="radio" name="op_css_load"  id="op_css_load4"
			<?php if($ssShow_newOptions['css_load'] == "off") echo $checked; ?> value="off" />
			<?php _e(' Don\'t load css, manually add to your theme css file.',$plugin_name); ?></label>
        <p><?php _e(' Via ftp, move the folder named plugin-data from this plugin folder into your wp-content folder. This is recomended to avoid over writing any changes you make to the css files when you update this plugin.',$plugin_name); ?>
		</p>
    </li>
    </ul>
     </fieldset>
     
		<div valign="top">
        
		
		</div>
	</div>
	
</div><!-- close frag 9 -->
</div><!--  close tabs -->
<p>
<label for="op_delete_options">
		      <input type="checkbox" <?php if($ssShow_newOptions['delete_options'] == "true") echo $checked; ?> value="true" name="op_delete_options" id="op_delete_options" />
		      <?php _e('Remove options. '); ?></label>	
		 <br /><span class="setting-description"><?php _e('Select to have the plugin options removed from the data base upon deactivation.'); ?></span>
		 <br />
</p>
<p class="submit">
		<input type="submit" class="button" name="set_defaults" value="<?php _e(' Reload Default Options',$plugin_name); ?> &raquo;" />
		<input type="submit" id="update4" class="button-primary" value="<?php _e(' Update options',$plugin_name); ?> &raquo;" />
		<input type="hidden" name="action" id="action" value="update" />
 	</p>
 </form>
 
</div><!-- close column1 -->


<div class="ss_column2">

<?php if( $ispro !== true) { ?>

	<div class="ss_donate ss_admin_box"> 
		<h2><span class="promo"><?php _e('Spread the Word!', $plugin_name); ?></span></h2>
		<p><?php _e('Want to help make this plugin even better? All donations are used to improve and maintain this plugin, so donate $5, $10, $20 or $50! We\'ll both be glad you did. Thanx. ', $plugin_name); ?></p>
       <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="N2F3EUVHPYY5G">
            <input type="image" class="paypal_button" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
       </form>
       
       
       <p><?php _e('Better yet, if you would like to join the exclusive pro members club,', $plugin_name); ?> <a href="http://superslider.daivmowbray.com/superslider-pro/"><?php _e('learn more'); ?></a><?php _e('or upgrade now!'); ?> </p>
       <h2><span class="promo">SuperSlider Pro</span></h2>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="83HF3CEUD4976">
			<input type="image" class="paypal_button" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>

       <p><?php _e('Or if you find this plugin useful you could :'); ?></p><ul>
       	<li><a href="http://wordpress.org/extend/plugins/<?php echo $plugin_name; ?>/"><?php _e('Rate the plugin 5 stars on WordPress.org', $plugin_name); ?></a></li>
       	<li><a href="http://superslider.daivmowbray.com/superslider/<?php echo $plugin_name; ?>/"><?php _e('Blog about it &amp; link to the plugin page', $plugin_name); ?></a></li>
       	<li><a href="http://wordpress.org/support/view/plugin-reviews/<?php echo $plugin_name; ?>"><?php _e('Post a glowing review on WordPress.org, that would be really nice.', $plugin_name); ?></a></li>
       	<li><a href="http://amzn.com/w/2GUXZ71357NX9"><?php _e('or buy me a gift from my wishlist ...', $plugin_name); ?></a></li></ul>
       
    </div>
    <div class="ss_admin_box" id="sitereview">
		<h2><?php _e('Improve your Site!', $plugin_name); ?></h2>
		<p><?php _e('Don\'t know where to start? Order a ', $plugin_name); ?><a href="http://superslider.daivmowbray.com/services/website-review/#order"><?php _e('website review', $plugin_name); ?></a> from SuperSlider!
		<a href="http://superslider.daivmowbray.com/services/website-review/"> Read more ... </a></p>	
	</div>

 
	<div class="ss_admin_box" id="support">
		<h2><?php _e('Need support?', $plugin_name); ?></h2>
		<p><?php _e('If you are having problems with this plugin, please talk about them in the', $plugin_name); ?> <a href="http://wordpress.org/support/plugin/<?php echo $plugin_name; ?>/">Support forums</a>.</p>	
		</div>

 <?php 
 } else { ?>
	
		<div class="ss_donate ss_admin_box"> <h2><span class="promo">SuperSlider Pro</span></h2> </div>
	<div class="ss_admin_box" id="support">
		<h2><?php _e('Need support?', $plugin_name); ?></h2>
		<p><?php _e('If you are having problems with this plugin, please contact me directly via this contact form', $plugin_name); ?><br /><a href="http://superslider.daivmowbray.com/pro-support/">Pro Support</a>.</p>	
		</div>
<?php }?>

	<h2><?php _e('More SuperSlider Plugins', $plugin_name); ?></h2>
	<p><?php _e('There are 11 different SuperSlider plugins. All are free to use. Take a minute and learn what each one can do for you. They save you time and money, while making a better web site.', $plugin_name); ?></p>
	 <div class="ss_plugins_list
	 <?php if (class_exists('ssBase') && class_exists('ssShow') &&  class_exists('ssMenu') && class_exists('ssMenu') && class_exists('ssImage') && class_exists('ssExcerpt') && class_exists('ssMediaPop') && class_exists('perpost_code') && class_exists('ssPnext') && class_exists('ss_postsincat_widget') && class_exists('ssLogin') && class_exists('ssSlim')) { echo "all-installed" ; } ?>
	 "> 
	 
		<div class="ss_plugin <?php if (class_exists('ssBase')) { echo "installed"; }else{ echo "not_installed";} ?>"><p>
		<a href="http://wordpress.org/extend/plugins/superslider/" title="visit this plugin at WordPress.org to learn more">SuperSlider</a>	
		<a href="#ss_tips_info" class="ss_tool" style="padding: 2px 8px;"> info ?  </a><br />
		<a href="plugin-install.php?tab=search&s=superslider&plugin-search-input=Search+Plugins" class="ss_more" title="View this plugin on your plugin install page">View on your Plugin Install page</a></p>
		<div id ="ss_tips_info" class="info_box" style="display:none;">
		<p>SuperSlider base, is a global admin plugin for all SuperSlider plugins and comes stocked full of eye candy in the form of modules.</p>
		</div></div>
		
		<div class="ss_plugin <?php if (class_exists('ssShow')) { echo "installed"; }else{ echo "not_installed";} ?>"><p>
		<a href="http://wordpress.org/extend/plugins/superslider-show/" title="visit this plugin at WordPress.org to learn more">SuperSlider-Show</a>
		<a href="#show_tips_info" class="ss_tool" style="padding: 2px 8px;"> info ?  </a><br />
		<a href="plugin-install.php?tab=search&s=superslider-show&plugin-search-input=Search+Plugins" class="ss_more" title="View this plugin on your plugin install page">View on your Plugin Install page</a></p>
		<div id ="show_tips_info" class="info_box" style="display:none;">
		<p>SuperSlider-Show is your Animated slideshow plugin with automatic thumbnail list inclusion. This slideshow uses javascript to replace your gallery with a Slideshow. Highly configurable, theme based design, css based animations, automatic minithumbnail creation. Shortcode system on post and page screens to make each slideshow unique.</p>
		</div></div>
		
		<div class="ss_plugin <?php if (class_exists('ssMenu')) { echo "installed"; }else{ echo "not_installed";} ?>"><p>
		<a href="http://wordpress.org/extend/plugins/superslider-menu/" title="visit this plugin at WordPress.org to learn more">SuperSlider-Menu</a>		
		<a href="#show_tips_info" class="ss_tool" style="padding: 2px 8px;"> info ?  </a><br />
		<a href="plugin-install.php?tab=search&s=superslider-menu&plugin-search-input=Search+Plugins" class="ss_more" title="View this plugin on your plugin install page">View on your Plugin Install page</a></p>
		<div id ="show_tips_info" class="info_box" style="display:none;">
		<p>SuperSlider-Show is your Animated slideshow plugin with automatic thumbnail list inclusion. This slideshow uses javascript to replace your gallery with a Slideshow. Highly configurable, theme based design, css based animations, automatic minithumbnail creation. Shortcode system on post and page screens to make each slideshow unique.</p>
		</div></div>
		
		<div class="ss_plugin <?php if (class_exists('ssImage')) { echo "installed"; }else{ echo "not_installed";} ?>"><p>
		<a href="http://wordpress.org/extend/plugins/superslider-image/" title="visit this plugin at WordPress.org to learn more">SuperSlider-Image</a>
		<a href="#image_tips_info" class="ss_tool" style="padding: 2px 8px;"> info ?  </a><br />
		<a href="plugin-install.php?tab=search&s=superslider-image&plugin-search-input=Search+Plugins" class="ss_more" title="View this plugin on your plugin install page">View on your Plugin Install page</a></p>
		<div id ="image_tips_info" class="info_box" style="display:none;">
		<p>Take control your photos and image display. Can add a randomly selected image to any post without an image. Provides a shortcode for adding a photo or image to your post. Provides an easy way to change image properties globally. At the click of a button all post size images can be changed from thumbnail size image to medium size image or any available image size.</p>
		</div></div>
		
		<div class="ss_plugin <?php if (class_exists('ssExcerpt')) { echo "installed"; }else{ echo "not_installed";} ?>"><p>
		<a href="http://wordpress.org/extend/plugins/superslider-excerpt/" title="visit this plugin at WordPress.org to learn more">SuperSlider-Excerpt</a>
		<a href="#excerpt_tips_info" class="ss_tool" style="padding: 2px 8px;"> info ?  </a><br />
		<a href="plugin-install.php?tab=search&s=superslider-excerpt&plugin-search-input=Search+Plugins" class="ss_more" title="View this plugin on your plugin install page">View on your Plugin Install page</a></p>
		<div id ="excerpt_tips_info" class="info_box" style="display:none;">
		<p>SuperSlider-Excerpts automatically adds thumbnails wherever you show excerpts (archive page, feed... etc). Mouseover image will then Morph its properties, (controlled with css) You can pre-define the automatic creation of excerpt sized excerpt-nails.(New image size created, upon image upload).</p>
		</div></div>
		
		<div class="ss_plugin <?php if (class_exists('ssMediaPop')) { echo "installed"; }else{ echo "not_installed";} ?>"><p>
		<a href="http://wordpress.org/extend/plugins/superslider-media-pop/" title="visit this plugin at WordPress.org to learn more">SuperSlider-Media-Pop</a>	
		<a href="#media_tips_info" class="ss_tool" style="padding: 2px 8px;"> info ?  </a><br />
		<a href="plugin-install.php?tab=search&s=superslider-media-pop&plugin-search-input=Search+Plugins" class="ss_more" title="View this plugin on your plugin install page">View on your Plugin Install page</a></p>
		<div id ="media_tips_info" class="info_box" style="display:none;">
		<p>Soda pop for your media. Take control of your media. Access all size versions of your uploaded image for insert. SuperSlider-Media-Pop adds numerous image enhancements to your admin panels. Displays all attached files to this post/page in post listing screen. It adds image sizes to the Upload/Insert image screen, making all image sizes available to be inserted and adding to the image link field options. Insert any image size and link to any image size.</p>
		</div></div>
		
		<div class="ss_plugin <?php if (class_exists('perpost_code')) { echo "installed"; }else{ echo "not_installed";} ?>"><p>
		<a href="http://wordpress.org/extend/plugins/superslider-perpost-code/" title="visit this plugin at WordPress.org to learn more">SuperSlider-Perpost-Code</a>
		<a href="#code_tips_info" class="ss_tool" style="padding: 2px 8px;"> info ?  </a><br />
		<a href="plugin-install.php?tab=search&s=superslider-perpost-code&plugin-search-input=Search+Plugins" class="ss_more" title="View this plugin on your plugin install page">View on your Plugin Install page</a></p>
		<div id ="code_tips_info" class="info_box" style="display:none;">
		<p>Write css and javascript code directly on your post edit screen on a per post basis. Meta boxes provide a quick and easy way to enter custom code to each post. It then loads the code into your frontend theme header if the post has custom code. You may also display your custom code directly into your post with the custom_css or custom_js shortcode.</p>
		</div></div>
		
		<div class="ss_plugin <?php if (class_exists('ssPnext')) { echo "installed"; }else{ echo "not_installed";} ?>"><p>
		<a href="http://wordpress.org/extend/plugins/superslider-previousnext-thumbs/" title="visit this plugin at WordPress.org to learn more">SuperSlider-Previousnext-Thumbs</a>
		<a href="#pnext_tips_info" class="ss_tool" style="padding: 2px 8px;"> info ?  </a><br />
		<a href="plugin-install.php?tab=search&s=superslider-previousnext-thumbs&plugin-search-input=Search+Plugins" class="ss_more" title="View this plugin on your plugin install page">View on your Plugin Install page</a></p>
		<div id ="pnext_tips_info" class="info_box" style="display:none;">
		<p>Superslider-previousnext-thumbs is a previous-next post, thumbnail navigation creator. Works specifically on the single post pages. Animated rollover controlled with css and from the plugin options page. Can create custom image sizes. Automaitcally insert before or after post content or both. Or you can manually insert into your single post theme file.</p>
		</div></div>
		
		<div class="ss_plugin <?php if (class_exists('ss_postsincat_widget')) { echo "installed"; }else{ echo "not_installed";} ?>"><p>
		<a href="http://wordpress.org/extend/plugins/superslider-postsincat/" title="visit this plugin at WordPress.org to learn more">SuperSlider-Postsincat</a>
		<a href="#pinc_tips_info" class="ss_tool" style="padding: 2px 8px;"> info ?  </a><br />
		<a href="plugin-install.php?tab=search&s=superslider-postsincat&plugin-search-input=Search+Plugins" class="ss_more" title="View this plugin on your plugin install page">View on your Plugin Install page</a></p>
		<div id ="pinc_tips_info" class="info_box" style="display:none;">
		<p>This widget dynamically creates a list of posts from the active category. Displaying the first image and title. It will display the first image in your post as a thumbnail,it looks first for an attached image, then an embedded image then if it finds the image, it grabs the thumbnail version. Oh, and by the way, it's an animated vertical scroller, way cool.</p>
		</div></div>
		
		<div class="ss_plugin <?php if (class_exists('ssLogin')) { echo "installed"; }else{ echo "not_installed";} ?>"><p>
		<a href="http://wordpress.org/extend/plugins/superslider-login/" title="visit this plugin at WordPress.org to learn more">SuperSlider-Login</a>
		<a href="#login_tips_info" class="ss_tool" style="padding: 2px 8px;"> info ?  </a><br />
		<a href="plugin-install.php?tab=search&s=superslider-login&plugin-search-input=Search+Plugins" class="ss_more" title="View this plugin on your plugin install page">View on your Plugin Install page</a></p>
		<div id ="login_tips_info" class="info_box" style="display:none;">
		<p>A tabbed slide in login panel. Theme based, animated, automatic user detection.</p>
		</div></div>
		
		<div class="ss_plugin <?php if (class_exists('ssSlim')) { echo "installed"; }else{ echo "not_installed";} ?>"><p>
		<a href="http://superslider.daivmowbray.com/superslider/superslider-slimbox/" title="visit this plugin at WordPress.org to learn more">SuperSlider-Slimbox</a>
		<a href="#slim_tips_info" class="ss_tool" style="padding: 2px 8px;"> info ?  </a><br />
		<a href="plugin-install.php?tab=search&s=superslider-slimbox&plugin-search-input=Search+Plugins" class="ss_more" title="View this plugin on your plugin install page">View on your Plugin Install page</a></p>
		<div id ="slim_tips_info" class="info_box" style="display:none;">
		<p>Another pop over light box. Theme based, animated, automatic linking, autoplay show built with slimbox2 , uses mootools 1.4.5 java script</p>
		</div></div>
	
		<br style="clear:both;" />
	 </div>
 <h3><?php _e('Services', $plugin_name); ?></h3>
		<p><?php _e('Custom plugins, custom themes, custom solutions: I\'ve been developing WordPress Themes and plugins for many years. If you need a custom solution or simply some help with your set up I am avaiable at reasonable rates. ', $plugin_name); ?><a href="http://www.daivmowbray.com/contact"><?php _e('Just send a note to me, Daiv Mowbray, through this contact form', $plugin_name); ?></a>.</p>

<?php  if( $ispro !== true) { ?>

	<div class="promo_code_form" style="text-align: center;">
	<form name="ssPro_options" method="post" action="<?php //echo $_SERVER['REQUEST_URI'] ?>">
	<?php if ( function_exists('wp_nonce_field') )
		wp_nonce_field('ssPro_options'); echo "\n"; 
		?>
    		<label for="op_pro_code">
               <input type="text" class="span-text" name="op_pro_code" id="op_pro_code" size="30" maxlength="200"
			 value="<?php echo ($ssPro_newOptions['pro_code']); ?>" />
               <br /> <?php _e('Enter your SuperSlider Pro code.',$plugin_name); ?></label>	
    <p class="margin-top: 5px;">
	
		<input type="submit" id="updatePro" class="button-primary" value="<?php _e('Enter',$plugin_name); ?> &raquo;" />
		<input type="hidden" name="proaction" id="proaction" value="updatepro" />
		
 	</p>
 	</form>
 	</div>
<?php  } ?> 

</div><!-- close column2   --> 
</div><!-- close wrap to here --> 

<?php
	echo "";
?>