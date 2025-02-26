<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       piclaunch.com/pinq
 * @since      1.0.0
 *
 * @package    Picalunchpinq
 * @subpackage Picalunchpinq/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap" style="float: left; width: 70%;">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <h2 class="nav-tab-wrapper">PINQ Setup</h2>

    <form method="post" name="pinq_options" action="options.php">

    <?php
        //Grab all options
        $options = get_option($this->plugin_name);

        // Cleanup
        $pinqID = $options['pinqID'];
        $pinqIDFrame = $options['pinqIDFrame'];
        $pageup = $options['pageup'];
        $pinqheight = $options['pinqheight'];
        $pinqwidth = $options['pinqwidth'];
        $pinqframeCSS  = $options['pinqframeCSS'];
        $pinqframeDivclass  = $options['pinqframeDivclass'];
         $pinqframeDivclassPre  = $options['pinqframeDivclassPre'];
          $pinqframeDivclassPost  = $options['pinqframeDivclassPost'];
        $precontent  = $options['precontent'];
        $postcontent  = $options['postcontent'];
        $pageupbefore   = $options['pageupbefore'];  
        $debug   = $options['debug'];   

        if($debug == 1) {print_r($options); echo "<br />";}

                
      

    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>


      <div  class="container" >
      <div class="row" style=" border-bottom: thick solid #00b7f9;">
        <div class="span6" style="font-size: 20px;margin-left: 1px;color: #28bbf0;font-weight: bolder; ">
          <a href="http://piclaunch.com/pinq/" rel="home"><img src="http://piclaunch.com/pinq/images/pinq.png" alt="Piclaunch PINQ" style="width:150px;vertical-align: middle;padding-right: 10px;margin-bottom: 0.75em;border-right: thick solid #00b7f9"> Inquiry Management solution  
          </a>
         
         <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-mention-button twitter-mention-button-rendered twitter-tweet-button" style="position: static; visibility: visible; width: 133px; height: 20px;" title="Twitter Tweet Button" src="http://platform.twitter.com/widgets/tweet_button.d7c36168330549096322ed9760147cf7.en.html#dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fpiclaunch.com%2Fpinq%2F&amp;screen_name=piclaunch&amp;size=m&amp;time=1510593489908&amp;type=mention" data-screen-name="piclaunch"></iframe><script async="" src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
      </div>


 		<fieldset>
            <p>Please register on Piclaunch <a href="http://www.piclaunch.com/pinq/">PINQ IMS</a> , get the PINQ ID and enter it here. OR Enter the email address you want to get eamil to.
              (You May scorll to END Of this PAGE You will find the Piclaunch <a href="http://www.piclaunch.com/pinq/">PINQ IMS</a>  Loaded to register)</p>
            <legend class="screen-reader-text"><span><?php esc_attr_e('PINQ ID: ', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-pinqID" name="<?php echo $this->plugin_name; ?>[pinqID]" value="<?php if(!empty($pinqID)) echo $pinqID; ?>"/>
        </fieldset>
 

        <!-- Check if need to display on PAGE  -->
    <fieldset>
    	<p>Select this option if you wants to display CONTACT US form on other page in your site:</p>
        <legend class="screen-reader-text">
            <span>Want to Use Stand alone Page for Coantact US</span>
        </legend>
        <label for="<?php echo $this->plugin_name;?>-pageup">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-pageup" name="<?php echo $this->plugin_name; ?>[pageup]" value="1" <?php checked($pageup, 1); ?> />
            <span><?php esc_attr_e('Show on below PAGE', $this->plugin_name); ?></span>
        </label>
    </fieldset>   
	<!-- check pre and post content choice -->
	 	  <fieldset>
    	<p>Choose this option, if you want your form to be displayed on before the Current content of the page it's loading on:</p>
        <legend class="screen-reader-text">
            <span>Before the content of the page.</span>
        </legend>
        <label for="<?php echo $this->plugin_name;?>-pageupbefore">
           <input type="checkbox" id="<?php echo $this->plugin_name;?>-pageupbefore" name="<?php echo $this->plugin_name; ?>[pageupbefore]" value="1" <?php 
           checked($pageupbefore, 1); ?> />
            <span><?php esc_attr_e('Show form before the main Content of the PAGE', $this->plugin_name); ?></span>
        </label>
    </fieldset>   

   
   	<fieldset>	 	
   		<p>Select the "Contact Us"  Page, or where you want to display the contact us form:</p> 
        <legend class="screen-reader-text"><span><?php esc_attr_e('Select the "Contact Us"  Page: ', $this->plugin_name); ?></span></legend>
	 	<input type="label" class="regular-text" id="<?php echo $this->plugin_name; ?>-pinqIDFrame" name="<?php echo $this->plugin_name; ?>[pinqIDFrame]" value="<?php if(!empty($pinqIDFrame)) echo $pinqIDFrame; ?>"/>	
	   <?php wp_dropdown_pages(); ?>
	</fieldset>

<!-- Setting for width height div clss and Extra CSS -->
		<fieldset>
	    	<p>Set the  height and width  of the PAGE Form:</p>
	        <legend class="screen-reader-text">
	            <span>Set width and Height</span>
	        </legend>
	          <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-pinqheight" name="<?php echo $this->plugin_name; ?>[pinqheight]" 
	          value="<?php if(!empty($pinqheight)) echo $pinqheight; ?>"/> <span><?php esc_attr_e('Enter Height (leave it balnk if not sure)', $this->plugin_name); ?></span>
	    </fieldset>
	    <fieldset>	    	
	        <legend class="screen-reader-text">
	            <span>Set width</span>
	        </legend>
	          <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-pinqwidth" name="<?php echo $this->plugin_name; ?>[pinqwidth]" 
	          value="<?php if(!empty($pinqwidth)) echo $pinqwidth; ?>"/> <span><?php esc_attr_e('Enter Width (leave it balnk if not sure)', $this->plugin_name); ?></span>

	    </fieldset>

	    <fieldset>	    	
	        <legend class="screen-reader-text">
	            <span>Set extra CSS for your Frame on the page:</span>
	        </legend>
	          <input type="text" class="regular-text" id="<?php echo $this->plugin_name;?>-pinqframeCSS" name="<?php echo $this->plugin_name; ?>[pinqframeCSS]" 
	          value="<?php if(!empty($pinqframeCSS)) echo $pinqframeCSS; ?>"/> <span><?php esc_attr_e('Enter CSS (leave it balnk if not sure)[eg. background-color: aliceblue;     margin-left: 25%; ] ', $this->plugin_name); ?></span></br>

	    </fieldset>
	    	    <fieldset>	    	
	        <legend class="screen-reader-text">
	            <span>Frame Div class</span>
	        </legend>
	          <input type="text" class="regular-text" id="<?php echo $this->plugin_name;?>-pinqframeDivclass" name="<?php echo $this->plugin_name; ?>[pinqframeDivclass]" 
	          value="<?php if(!empty($pinqframeDivclass)) echo $pinqframeDivclass; ?>"/> <span><?php esc_attr_e('Enter Frame Div class (leave it balnk if not sure)', $this->plugin_name); ?></span>
	    </fieldset>

<!-- Setting for Pre and POST From content -->
</br>
        <fieldset>   
            <p><b>Set the content to be shown before /After  the Contact us page shown:</b></p>     
          <legend class="screen-reader-text">
              <span>Before Form content Div class</span>
          </legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name;?>-pinqframeDivclassPre" name="<?php echo $this->plugin_name; ?>[pinqframeDivclassPre]" 
            value="<?php if(!empty($pinqframeDivclassPre)) echo $pinqframeDivclassPre; ?>"/> <span><?php esc_attr_e('Before Form content Div class (leave it balnk if not sure)', $this->plugin_name); ?></span>
      </fieldset>
		<fieldset>
	    	
	        <legend class="screen-reader-text">
	            <span>Set Before from content (leave it balnk if not sure)</span>
	        </legend>
	         <!--  <input type="text" class="regular-text" id="<?php echo $this->plugin_name;?>-precontent" name="<?php echo $this->plugin_name; ?>[precontent]" value="<?php if(!empty($precontent)) echo $precontent; ?>"/>  -->

              <span><?php esc_attr_e('Set content shown on the Top of the From (leave it balnk if not sure)', $this->plugin_name); ?></span>
              <?php
                $contentpre = $precontent;
                $settingspre = array(
                            'textarea_name' => $this->plugin_name.'[precontent]',
                            'media_buttons' => false,
                            'textarea_rows' => 5,
                            'editor_height' => 10,
                            'tinymce' => array(
                                'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
                                    'bullist,blockquote,|,justifyleft,justifycenter' .
                                    ',justifyright,justifyfull,|,link,unlink,|' .
                                    ',spellchecker,wp_fullscreen,wp_adv'
                                    )
                                 );
               wp_editor( $contentpre, 'precontent', $settingspre);
              echo " <br />";
               ?>
	    </fieldset>


    
      <fieldset>        
          <legend class="screen-reader-text">
              <span>After Form content Div class</span>
          </legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name;?>-pinqframeDivclassPost" name="<?php echo $this->plugin_name; ?>[pinqframeDivclassPost]" 
            value="<?php if(!empty($pinqframeDivclassPost)) echo $pinqframeDivclassPost; ?>"/> <span><?php esc_attr_e('Enter After form content Div class (leave it balnk if not sure)', $this->plugin_name); ?></span>
      </fieldset>

	    <fieldset>	    	
	        <legend class="screen-reader-text">
	            <span>Set After from content (leave it balnk if not sure)</span>
	        </legend>
	          <!--<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-postcontent" name="<?php echo $this->plugin_name; ?>[postcontent]" 
	          value="<?php if(!empty($postcontent)) echo $postcontent; ?>"/> --> 
              <span><?php esc_attr_e('Set content shown on the bottom of the From (leave it balnk if not sure)', $this->plugin_name); ?></span>
               <?php
                $contentpost = $postcontent;
                $settingspost= array(
                            'textarea_name' => $this->plugin_name.'[postcontent]',
                            'media_buttons' => false,
                            'textarea_rows' => 5,
                            'editor_height' => 10,
                            'tinymce' => array(
                                'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
                                    'bullist,blockquote,|,justifyleft,justifycenter' .
                                    ',justifyright,justifyfull,|,link,unlink,|' .
                                    ',spellchecker,wp_fullscreen,wp_adv'
                                    )
                                 );
               wp_editor( $contentpost, 'postcontent', $settingspost);
              
               ?>

	    </fieldset>



        <!-- Debug code -->
        <fieldset>
                <p>Having issues, turn the Debug on in ADMIN Only area.</p>
                <legend class="screen-reader-text"><span><?php esc_attr_e('Debug Only: ', $this->plugin_name); ?></span></legend>
                <label for="<?php echo $this->plugin_name;?>-debug">
                   <input type="checkbox" id="<?php echo $this->plugin_name;?>-pageupbefore" name="<?php echo $this->plugin_name; ?>[debug]" value="1" <?php 
                   checked($debug, 1); ?> />
                    <span><?php esc_attr_e('Debug Only in Admin', $this->plugin_name); ?></span>
                </label>
            </fieldset>
	<!-- SAVE CALL -->
 	<?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
    </form>
  
</div>
<div class="wrapright" style="float: right; width: 28%;">
  

  <iframe src="https://www.youtube-nocookie.com/embed/kbVp9nXHGKI" frameborder="0" allowfullscreen style="
    padding-top: 200px;
    border: 10px;
    width: 80%;
    height: 200px;">     
    </iframe>
     <p>Why PINQ</p>
 </br>

 

    <iframe src="https://www.youtube-nocookie.com/embed/KktScAQ8Fw0" frameborder="0" allowfullscreen style="
    padding-top: 50px;
    border: 10px;
    width: 80%;
    height: 200px;">     
    </iframe>
    <p>PINQ Inquiry Management: WordPress Plugin DEMO</p>
  </br>


<iframe src="https://www.youtube-nocookie.com/embed/VsiJ9KtX-wk" frameborder="0" allowfullscreen style="
    padding-top: 50px;
    border: 10px;
    width: 80%;
    height: 200px;">     
    </iframe>
<p>PINQ Inquiry Management: service Demo</p>

 
</div>

  <iframe src="http://piclaunch.com/pinq/" height="600" width="100%"></iframe>


<!--<script type='text/javascript' src='website-scripts.js'></script> -->

<script type="text/javascript">

	function <?php echo $this->plugin_name; ?>readID() {
	var e = document.getElementById("page_id");		
	var ee = document.getElementById("<?php echo $this->plugin_name; ?>-pinqIDFrame");
	ee.value = e.options[e.selectedIndex].value;
	}

	document.getElementById('page_id').onclick = function() { <?php echo $this->plugin_name; ?>readID() };



   function <?php echo "my" . $this->plugin_name . "cpf"; ?>() {
    
   var b1 = document.getElementById("cpf");
   if (b1.className == "wrap-embed-contact-form"){
   b1.className = b1.className.replace("wrap-embed-contact-form","").trim();   
   b1.className = b1.className.replace("","wrap-embed-contact-form show-widget").trim();} 
   else {
   b1.className = "wrap-embed-contact-form";
   }
}

</script>
