<?php

namespace SeoThatMatters;
use function SeoThatMatters\plugin_instance;

?>

<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-body-header">
	<h2><?php _e('Meta Tags', SEOTM_PREFIX) ?></h2>
</div>

<div class="flex gap-2 mt-10">
    
	<!-- start seo meta -->
    
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-full-width mb-15">
	    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
		<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" id="seotm_use_seo_meta" value="1" name="seotm_use_seo_meta" <?php checked(plugin_field_setting('seotm_use_seo_meta'), 1, true) ?> type="checkbox"/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_seo_meta"></label><label class="toggle-label" for="seotm_use_seo_meta"><?php _e('Add SEO Meta Tags'); ?></label> 
	    </div>
	    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
		<?php _e('Add meta description tag to satisfy Google spiders', SEOTM_PREFIX) ?>
	    </div>
	</div>
	
	<!-- start social meta -->
	
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group show-hide-group flex-full-width pb-10">
    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
        <input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light main-toggle show-hide" data-show-hide="1" id="seotm_use_social_meta" name="seotm_use_social_meta" value="1" type="checkbox"
            <?php checked(plugin_field_setting( 'seotm_use_social_meta'), 1, true) ?>/>
        <label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_social_meta"></label>
        <label class="toggle-label pl-4" for="seotm_use_social_meta">
                <?php _e('Add Social Media Tags', SEOTM_PREFIX) ?>
        </label>
        <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
                <?php _e('Add social media metas for Facebook & Twitter', SEOTM_PREFIX) ?>
        </div>
            
    </div>
    <div id="" class="show-hide-content padding-left-0 pb-0">
        <div class="flex grid-col-2 pt-10 pb-6">
            
            
			<!-- start Default Facebook image -->
            <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-50">
                    
                <div class="custom-header">
                    <h2><?php _e('Default Facebook Image', SEOTM_PREFIX) ?></h2>
                </div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group">
					<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
						<input class="w-100" placeholder="<?php _e( 'if leave empty, the first image of each page/post will be use' ); ?>" type="text" id="seotm_default_fb_img" name="seotm_default_fb_img" value="<?php echo esc_html(plugin_field_setting('seotm_default_fb_img')) ?>">
					</div>
				</div>
                <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help custom">
                	<?php _e('Recommended size: 1200x630px', SEOTM_PREFIX) ?>
				</div>
            </div>
            <!-- end Default Facebook image -->
			
			<!-- start Default twitter Image -->
            <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-50">
                    
                <div class="custom-header">
                    <h2><?php _e('Default twitter Image', SEOTM_PREFIX) ?></h2>
                </div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group">
					<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
						<input class="w-100" placeholder="<?php _e( 'if leave empty, the first image of each page/post will be use' ); ?>" type="text" id="seotm_default_twitter_img" name="seotm_default_twitter_img" value="<?php echo esc_html(plugin_field_setting('seotm_default_twitter_img')) ?>">
					</div>
				</div>
                <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help custom">
                	<?php _e('Aspect ratio 2:1. Recommended size: 1200x600px.', SEOTM_PREFIX) ?>
				</div>
            </div>
            <!-- end Default twitter Image -->
            
			            
         </div> <!-- end flex grid container -->
    </div><!-- end show-hide-content -->
    </div><!-- end social meta -->
    
    <div class="flex gap-2 pt-0">
	<!-- start custom_title markup -->
    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-">
	    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
		<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" id="seotm_use_custom_title" value="1" name="seotm_use_custom_title" <?php checked(plugin_field_setting('seotm_use_custom_title'), 1, true) ?> type="checkbox"/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_custom_title"></label><label class="toggle-label" for="seotm_use_custom_title"><?php _e('Custom Search Engine & Social Media Title'); ?></label> 
	    </div>
	    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
		<p class="mt-0 mb-5" style="font-size:inherit;padding-right:1.5em;line-height:1.6">
			<?php _e('Use WordPress native post meta fields to use different titles for search engines & social media. Simply add new post meta field named "seoTitle" for search engine title, "twitterTitle" for twitter title, and/or "ogTitle" for other social media titles, then add the custom title to the value field. <em>*see <a href="https://wordpress.org/plugins/seo-that-matters/#faq-header" target="_blank" rel="nofollow">plugin\'s FAQ</a></em>', SEOTM_PREFIX) ?>
			</p>
	    </div>
	</div>
	<!-- end custom_title markup -->
	</div>
	

</div>