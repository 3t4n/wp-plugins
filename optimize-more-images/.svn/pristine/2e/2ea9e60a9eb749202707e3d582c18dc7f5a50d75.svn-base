<div class="opm_img-input-group show-hide-group show-hide-container pt-24 pb-0">
   <div class="opm_img-input">
      <input class="opm_img-toggle opm_img-toggle-light main-toggle show-hide" data-show-hide="1" id="use_img_cdn" name="use_img_cdn" value="1" type="checkbox"
      <?php checked(opm_img_field_setting( 'use_img_cdn'), 1, true) ?>/>
      <label class="opm_img-toggle-btn" for="use_img_cdn"></label>
      <label class="toggle-label" for="use_img_cdn">
         <?php _e('Enable', 'opm_img') ?>
      </label>
      <div class="opm_img-help flex-full-width pt-8 pb-0 pl-2">
      <?php _e('Enable CDN for images. *useful to decrease our server load', 'opm_img') ?>
   </div>
   </div>
   
   <div class="opm_img-spacer"></div>
   
   <div id="" class="show-hide-content padding-left-0 pb-15 mb-15 border-bottom-light">
	   
	   <div class="flex">
	   
	      <div class="flex grid-col-2 pt-0">
	          
	         <div class="opm_img-input-group pb-10 w-60">
                <label class="title-label pt-13"><?php _e('Your CDN URL', 'opm_img') ?></label>
                <div class="opm_img-input">
                    <input type="text" name="img_cdn_url" placeholder="<?php _e( 'e.g.: cdn.domain.com or cdn.domain.com/img' ); ?>" class="custom-input" value="<?php echo opm_img_field_setting('img_cdn_url') ?>" />
                </div>
                <div class="opm_img-help flex-full-width pt-4 pb-0" style="padding-left: 2px;">
                  <?php _e('Your cdn url without http/https', 'opm_img') ?>
               </div>
            </div>
	
	         <div class="opm_img-input-group pt-0 pb-0 flex-full-width">
                <div class="field-title pt-0 pb-18 pl-2">
        			Exclude List
        		</div>
        		<div class="opm_img-input flex-full-width mb-15">
        			<textarea placeholder="<?php _e( 'e.g.: logo.png&#13;&#10;critical-image.jpg&#13;&#10;other-critical-image.png&#13;&#10;*one per line' ); ?>" class="textarea-custom" rows="9" name="img_cdn_exclude_list"><?php echo opm_img_field_setting('img_cdn_exclude_list') ?></textarea>
        		</div>
        		<div class="opm_img-help flex-full-width pt-0 pb-0 pl-0 super-hide">
                        <?php _e('*image url string', 'opm_img') ?>
                </div>
             </div>
	
	         <div class="opm_img-input-group toggle-group pt-0 pb-0 pl-6"><!-- start input toggle group -->
                
                <div class="flex flex-center mb-10">
        		<input class="opm_img-toggle opm_img-toggle-light main-toggle" data-revised="1" id="img_cdn_quality" name="img_cdn_quality" value="1" type="checkbox"
        		<?php checked(opm_img_field_setting( 'img_cdn_quality'), 1, true) ?>/>
        		<label class="opm_img-toggle-btn" for="img_cdn_quality"></label>
        		<label class="toggle-label pt-0 pb-0" for="img_cdn_quality" style="margin-left:-1.35em">
        		    <?php _e('CDN Image Quality', 'opm') ?>
        		</label>
        		</div>
        		
        		<div class="opm_img-help pt-4 pb-10 pl-2">
                    <?php _e('Enable if your image cdn supports on the fly image compression and the param is after the img url', 'opm_img') ?>
                </div>
        
        		<div class="sub-fields pl-0"><!-- start of sub fields container -->
    	
            	<div class="opm_img-input-group pt-0 pb-8 w-60">
            	    
            		<div class="field-title pt-8 pb-10 pl-2">
            			Compression Quality
            		</div>
            		
            		<div class="opm_img-input w-70">
                        <input type="text" name="img_cdn_compression_quality" class="custom-input" value="<?php echo opm_img_field_setting('img_cdn_compression_quality') ?>" />
                    </div>
                    <div class="opm_img-help flex-full-width pt-6 pb-0 pl-2">
                        <?php _e('Eg: ?q=70, ?quality=50', 'opm_img') ?>
                    </div>
                    
            	</div><!-- end quality -->   
            	
            	</div><!-- end of sub fields container -->
    		
            </div><!-- end input toggle group -->
     
		  
      
      </div><!-- end parent col  -->
   
   </div>
   
</div>