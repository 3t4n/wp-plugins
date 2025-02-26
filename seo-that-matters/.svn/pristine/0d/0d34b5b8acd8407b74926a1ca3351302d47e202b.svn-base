<?php

namespace SeoThatMatters;
use function SeoThatMatters\plugin_instance;

?>

<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-body-header">
	<h2><?php _e('Robots.txt', SEOTM_PREFIX) ?></h2>
</div>

<!-- start robots txt -->
<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group show-hide-group flex-full-width mt-10 pb-15 relative">
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
		<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light main-toggle show-hide" data-show-hide="1" id="seotm_use_robots" name="seotm_use_robots" value="1" type="checkbox"
			<?php checked(plugin_field_setting( 'seotm_use_robots'), 1, true) ?>/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_robots"></label>
		<label class="toggle-label pl-4" for="seotm_use_robots">
		<?php _e('Change Robots.txt Content', SEOTM_PREFIX) ?>
		</label>
		<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
			<?php _e('Use this plugin to control your virtual robots.txt content', SEOTM_PREFIX) ?>
		</div>
	</div>
	<div id="" class="show-hide-content padding-left-0 mb-12">
	    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
			<em><span class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help custom"><?php _e('*Re-save your permalinks to see immediate change', SEOTM_PREFIX) ?></span></em>
		</div>
		<div class="flex grid-col-2 pt-24 mt-10 pb-0i">
			<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-50">
				<!-- start robots.txt content -->
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pb-8">
					<?php _e('Your robots.txt content:', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group">
					<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
						<textarea class="textarea-custom" style="white-space:normal" rows="10" name="seotm_use_robots_content" placeholder="<?php echo esc_attr__( 'e.g.:&#13;&#10;&#13;&#10;User-agent: *&#13;&#10;Disallow: /author/&#13;&#10;Disallow: /wp-admin/&#13;&#10;Allow: /wp-admin/admin-ajax.php&#13;&#10;Sitemap: https://yourdomain.com.sitemap.xml&#13;&#10;Sitemap: https://yourdomain.com.sitemap_images.xml' ); ?>"><?php echo plugin_field_setting('seotm_use_robots_content') ?></textarea>
					</div>
					<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
					    <a href="<?php echo bloginfo('url') . '/robots.txt'; ?>" target="_blank">Check your robots.txt</a>.
					</div>
				</div>
				<!-- end robots.txt content -->
			</div>
			<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-50">
			</div>
		</div>
		<!-- end flex grid container -->
	</div>
	<!-- end show-hide-content -->
</div>
<!-- end robots txt -->