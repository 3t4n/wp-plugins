<?php
// PAGINA OPCIONES UX/UI
if(!function_exists('wp_get_current_user')) { include(ABSPATH . "wp-includes/pluggable.php"); }

function pymseo_opciones_ux(){
	?>
	<h2>Buscador</h2>
		<table class="form-table">
			<tr>
				<td>
					<label for="pymseoUXSearchRedirect"><input type="checkbox" name="pymseoUXSearchRedirect" <?php echo get_option('pymseoUXSearchRedirect')?'checked="checked" ':''; ?>/></label><?php _e('If there is only one search, redirect automatically to the result','pymseo'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for="pymseoUXSearchUrlRewrite"><input type="checkbox" name="pymseoUXSearchUrlRewrite" <?php echo get_option('pymseoUXSearchUrlRewrite')?'checked="checked" ':''; ?>/></label><?php _e('Change ?s=search_term to a permanent link /search/search_term ','pymseo'); ?>
				</td>
			</tr>
			<tr>
				<td><label for="pymseoUXSearchChangingNumberResultsPage"><input type="number" min="1" max="99" name="pymseoUXSearchChangingNumberResultsPage" value="<?php if (empty("pymseoUXSearchChangingNumberResultsPage")) {echo get_option('posts_per_page');}else{echo get_option('pymseoUXSearchChangingNumberResultsPage');}?>" /></label> <?php _e('Changing the number of results per page. min: 1 - max: 99','pymseo'); ?></td>
			</tr>
		</table>

		<h2><?php _e('Category','pymseo'); ?></h2>
		<table class="form-table">
		<tr>
			<td><label for="pymseoUXRemoveSlugCategory"><input type="checkbox" name="pymseoUXRemoveSlugCategory" <?php echo get_option('pymseoUXRemoveSlugCategory')?'checked="checked" ':''; ?>/></label><?php _e('Remove slug /category/','pymseo'); ?></td>
		</tr>
		</table>
		<h2><?php _e('Accessibility','pymseo'); ?></h2>
		<table class="form-table">
			<tr>
				<td><label for="pymseoUXAddMetaViewport"><input type="checkbox" name="pymseoUXAddMetaViewport" <?php echo get_option('pymseoUXAddMetaViewport')?'checked="checked" ':''; ?>/></label><?php _e('Add metatag viewport','pymseo'); ?></td>
			</tr>
		</table>
		<h2><?php _e('Others','pymseo'); ?></h2>
		<table class="form-table">
			<tr>
				<td><label for="pymseoDeletePoweredWordpress"><input type="checkbox" name="pymseoDeletePoweredWordpress" <?php echo get_option('pymseoDeletePoweredWordpress')?'checked="checked" ':''; ?>/></label><?php _e('Delete Powered by Wordpress','pymseo'); ?></td>
				<td><label for="pymseoDeleteThemeLink"><input type="checkbox" name="pymseoDeleteThemeLink" <?php echo get_option('pymseoDeleteThemeLink')?'checked="checked" ':''; ?>/></label><?php _e('Delete Theme Link','pymseo'); ?></td>
				
			</tr>
		</table>


	<h2><?php _e('RSS','pymseo');?></h2>
	<table class="form-table">
			<tr>
				<td><label for="pymseoUXDisableRSSFeeds"><input type="checkbox" name="pymseoUXDisableRSSFeeds" id="botonpymseoUXDisableRSSFeeds" <?php echo get_option('pymseoUXDisableRSSFeeds')?'checked="checked" ':''; ?>/></label><?php _e('Disable RSS Feeds','pymseo'); ?></td>
            </tr>
			<tr>
				<td><label for="pymseoUXRSSAddImageFeatured"><input type="checkbox" name="pymseoUXRSSAddImageFeatured" id="botonpymseopymseoUXRSSAddImageFeatured" <?php echo get_option('pymseoUXRSSAddImageFeatured')?'checked="checked" ':''; ?>/></label><?php _e('Add featured image in RSS Feed publications','pymseo'); ?></td>	
		</tr>
	</table>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Delay posts from appearing in wordPress RSS feed','pymseo'); ?></th>
			<td><select name="pymseoUXDDelayPostsFromAppearing" id="botonpymseoUXDDelayPostsFromAppearing" disabled>
					<option value="0"<?php echo get_option('pymseoUXDDelayPostsFromAppearing') == '0' ? ' selected="selected"' : '';?>><?php _e('none','pymseo');?></option>
					<option value="10"<?php echo get_option('pymseoUXDDelayPostsFromAppearing') == '10' ? ' selected="selected"' : '';?>><?php _e('10 minutes','pymseo');?></option>
					<option value="30"<?php echo get_option('pymseoUXDDelayPostsFromAppearing') == '30' ? ' selected="selected"' : '';?>><?php _e('30 minutes','pymseo');?></option>
					<option value="60"<?php echo get_option('pymseoUXDDelayPostsFromAppearing') == '60' ? ' selected="selected"' : '';?>><?php _e('1 hour','pymseo');?></option>
					<option value="120"<?php echo get_option('pymseoUXDDelayPostsFromAppearing') == '120' ? ' selected="selected"' : '';?>><?php _e('2 hours','pymseo');?></option>
					<option value="720"<?php echo get_option('pymseoUXDDelayPostsFromAppearing') == '720' ? ' selected="selected"' : '';?>><?php _e('12 hours','pymseo');?></option>
					<option value="1440"<?php echo get_option('pymseoUXDDelayPostsFromAppearing') == '1440' ? ' selected="selected"' : '';?>><?php _e('1 day','pymseo');?></option>
					<option value="2880"<?php echo get_option('pymseoUXDDelayPostsFromAppearing') == '2880' ? ' selected="selected"' : '';?>><?php _e('2 days','pymseo');?></option>
					<option value="10080"<?php echo get_option('pymseoUXDDelayPostsFromAppearing') == '10080' ? ' selected="selected"' : '';?>><?php _e('1 week','pymseo');?></option>
				</select>
			</td>
		</tr>
	</table>
<?php
}
?>