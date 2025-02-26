<?php

namespace SeoThatMatters;
use function SeoThatMatters\plugin_instance;

?>

<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-body-header">
	<h2><?php _e('Miscellaneous', SEOTM_PREFIX) ?></h2>
</div>

<div class="flex gap-2 mt-10">

    <!-- start img_alt_tex -->
        
    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-30 pb-4">
    	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
        	<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" id="seotm_use_img_alt_text" value="1" name="seotm_use_img_alt_text" <?php checked(plugin_field_setting('seotm_use_img_alt_text'), 1, true) ?> type="checkbox"/>
        	<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_img_alt_text"></label><label class="toggle-label" for="seotm_use_img_alt_text"><?php _e('Add Image Alt Tags'); ?></label> 
    	</div>
    	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
        	<?php _e('Add empty image alt tags dynamically', SEOTM_PREFIX) ?>
        </div>
    </div>
    	
    <!-- end img_alt_tex -->
	
	<!-- start x_default -->
        
    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-30 pb-4">
    	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
        	<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" id="seotm_use_x_default" value="1" name="seotm_use_x_default" <?php checked(plugin_field_setting('seotm_use_x_default'), 1, true) ?> type="checkbox"/>
        	<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_x_default"></label><label class="toggle-label" for="seotm_use_x_default"><?php _e('Add hreflang="x-default"'); ?></label> 
    	</div>
    	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
        	<?php _e('*not tested with multilang *<em><a href="https://www.searchenginejournal.com/how-googles-hreflang-x-default-enhances-website-navigation/486568/" target="_blank" rel="nofollow">benefits</a></em>', SEOTM_PREFIX) ?>
        </div>
    </div>
    	
    <!-- end x_default -->
    
    <!-- start disable_feeds -->
        
    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-30 pb-4">
    	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
        	<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" id="seotm_disable_feeds" value="1" name="seotm_disable_feeds" <?php checked(plugin_field_setting('seotm_disable_feeds'), 1, true) ?> type="checkbox"/>
        	<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_disable_feeds"></label><label class="toggle-label" for="seotm_disable_feeds"><?php _e('Disable Feeds'); ?></label> 
    	</div>
    	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
        	<?php _e('Prevent scrappers duplicate your content', SEOTM_PREFIX) ?>
        </div>
    </div>
    	
    <!-- end disable_feeds -->

</div>