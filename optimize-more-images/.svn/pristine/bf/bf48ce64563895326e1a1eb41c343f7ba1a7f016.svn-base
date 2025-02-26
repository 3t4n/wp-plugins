<div class="opm_img-input-group show-hide-group show-hide-container pt-24 pb-0">
 <div class="opm_img-input">
  <input class="opm_img-toggle opm_img-toggle-light main-toggle show-hide" data-show-hide="1" id="enable_preload_featured_imgs" name="enable_preload_featured_imgs" value="1" type="checkbox" <?php checked(opm_img_field_setting( 'enable_preload_featured_imgs'), 1, true) ?> />
  <label class="opm_img-toggle-btn" for="enable_preload_featured_imgs"></label>
  <label class="toggle-label" for="enable_preload_featured_imgs">
   <?php _e('Enable', 'opm_img') ?>
  </label>
  <div class="opm_img-help flex-full-width pt-8 pb-0 pl-2">
   <?php _e('Automatically preload featured images. useful if we set each page/post featured image as our hero / above the fold image', 'opm_img') ?>
  </div>
 </div>

 <div class="opm_img-spacer"></div>

 <div id="" class="show-hide-content padding-left-0 pb-15 mb-15 border-bottom-light">
     
    <div class="flex">

      <div class="flex grid-col-2 pt-8">
    
       <!-- start front page -->
       <div class="opm_img-input-group flex-50 pb-0">
        <div class="opm_img-input">
         <input class="opm_img-toggle opm_img-toggle-light" id="preload_featured_img_front_page" value="1" name="preload_featured_img_front_page" <?php checked(opm_img_field_setting('preload_featured_img_front_page'), 1, true) ?> type="checkbox" />
         <label class="opm_img-toggle-btn" for="preload_featured_img_front_page"></label><label class="toggle-label" for="preload_featured_img_front_page"><?php _e('Homepage'); ?></label>
        </div>
        <div class="opm_img-help">
         <?php _e('Preload featured image on homepage', 'opm_img') ?>
        </div>
       </div>
       <!-- end front page -->
    
       <!-- start single post -->
       <div class="opm_img-input-group flex-50 pb-0">
        <div class="opm_img-input">
         <input class="opm_img-toggle opm_img-toggle-light" id="preload_featured_img_single_post" value="1" name="preload_featured_img_single_post" <?php checked(opm_img_field_setting('preload_featured_img_single_post'), 1, true) ?> type="checkbox" />
         <label class="opm_img-toggle-btn" for="preload_featured_img_single_post"></label><label class="toggle-label" for="preload_featured_img_single_post"><?php _e('Single Post'); ?></label>
        </div>
        <div class="opm_img-help">
         <?php _e('Preload featured image on single post', 'opm_img') ?>
        </div>
       </div>
       <!-- end single post -->
       
        <!-- start extra pages -->
               <div class="opm_img-input-group flex-50">
    		    <div class="opm_img-input">
    		        <input class="opm_img-toggle opm_img-toggle-light" id="preload_featured_img_pages" value="1" name="preload_featured_img_pages" <?php checked(opm_img_field_setting('preload_featured_img_pages'), 1, true) ?> type="checkbox"/>
    		        <label class="opm_img-toggle-btn" for="preload_featured_img_pages"></label><label class="toggle-label" for="preload_featured_img_pages"><?php _e('Pages'); ?></label> 
    		    </div>
    		    <div class="opm_img-help">
    		        <?php _e('Preload featured image on pages except homepage', 'opm_img') ?>
    		    </div>
    	      </div>
    	         <!-- end extra pages -->
       
       <?php if( class_exists( 'WooCommerce' ) ): ?> <!-- check if WooCommerce plugin active -->
       <!-- start single product pages -->
       <div class="opm_img-input-group flex-50">
        <div class="opm_img-input">
         <input class="opm_img-toggle opm_img-toggle-light" id="preload_featured_img_product_pages" value="1" name="preload_featured_img_product_pages" <?php checked(opm_img_field_setting('preload_featured_img_product_pages'), 1, true) ?> type="checkbox" />
         <label class="opm_img-toggle-btn" for="preload_featured_img_product_pages"></label><label class="toggle-label" for="preload_featured_img_product_pages"><?php _e('Product Pages'); ?></label>
        </div>
        <div class="opm_img-help">
         <?php _e('Preload featured image on woocommerce product pages', 'opm_img') ?>
        </div>
       </div>
       <!-- end single product pages -->
       <?php endif; ?> <!-- end checking if WooCommerce plugin active -->
       <!-- end first row -->
    </div>

   <div class="opm_img-spacer"></div>
  </div>

 </div>

</div>