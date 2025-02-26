<?php
// PAGINA OPCIONES WPO
if(!function_exists('wp_get_current_user')) { include(ABSPATH . "wp-includes/pluggable.php"); }

function pymseo_opciones_crawlbudget(){
	?>
	<h4><?php _e('The crawl budget is a combination of the crawl rate and crawl demand. The crawl budget is the number of URLs that the Googlebot can and wants to crawl','pymseo'); ?></h4>
	<hr />
	<h2><?php _e('Pages','pymseo'); ?></h2>
	<table class="form-table">
		<tr>
			<td ><label for="pymseoDisablePageTag"><input type="checkbox" name="pymseoDisablePageTag" <?php echo get_option('pymseoDisablePageTag')?'checked="checked" ':''; ?>/></label><?php _e('Remove tags | tag.php','pymseo'); ?></td>
			<td><label for="pymseoDisablePageAuthor"><input type="checkbox" name="pymseoDisablePageAuthor" <?php echo get_option('pymseoDisablePageAuthor')?'checked="checked" ':''; ?>/></label><?php _e('Remove author | author.php','pymseo'); ?></td>
			<td ><label for="pymseoDisablePageDate"><input type="checkbox" name="pymseoDisablePageDate" <?php echo get_option('pymseoDisablePageDate')?'checked="checked" ':''; ?>/></label><?php _e('Remove date | date.php','pymseo'); ?></td>
			<td></td>
		</tr>
</table>
<hr />
<h2><?php _e('Date','pymseo'); ?></h2>
<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Remove dates from posts X days','pymseo'); ?></th>
			<td><select name="pymseoWPORemoveDatexDays">
					<option value="0"<?php echo get_option('pymseoWPORemoveDatexDays') == '0' ? ' selected="selected"' : '';?>><?php _e('disabled','pymseo');?></option>
					<option value="10"<?php echo get_option('pymseoWPORemoveDatexDays') == '10' ? ' selected="selected"' : '';?>><?php _e('10 days','pymseo');?></option>
					<option value="20"<?php echo get_option('pymseoWPORemoveDatexDays') == '20' ? ' selected="selected"' : '';?>><?php _e('20 days','pymseo');?></option>
					<option value="30"<?php echo get_option('pymseoWPORemoveDatexDays') == '30' ? ' selected="selected"' : '';?>><?php _e('1 month','pymseo');?></option>
					<option value="60"<?php echo get_option('pymseoWPORemoveDatexDays') == '60' ? ' selected="selected"' : '';?>><?php _e('2 months','pymseo');?></option>
					<option value="91"<?php echo get_option('pymseoWPORemoveDatexDays') == '91' ? ' selected="selected"' : '';?>><?php _e('3 months','pymseo');?></option>
					<option value="182"<?php echo get_option('pymseoWPORemoveDatexDays') == '182' ? ' selected="selected"' : '';?>><?php _e('6 months','pymseo');?></option>
					<option value="274"<?php echo get_option('pymseoWPORemoveDatexDays') == '274' ? ' selected="selected"' : '';?>><?php _e('9 months','pymseo');?></option>
					<option value="365"<?php echo get_option('pymseoWPORemoveDatexDays') == '365' ? ' selected="selected"' : '';?>><?php _e('1 year','pymseo');?></option>
					<option value="730"<?php echo get_option('pymseoWPORemoveDatexDays') == '730' ? ' selected="selected"' : '';?>><?php _e('2 year','pymseo');?></option>
				</select>
			</td>
	</tr>
	</table>
<hr />
<h2><?php _e('Options','pymseo'); ?></h2>
<table class="form-table">
		<tr>
			<td colspan="2"><label for="pymseoWPOnoIndexPage404"><input type="checkbox" name="pymseoWPOnoIndexPage404" <?php echo get_option('pymseoWPOnoIndexPage404')?'checked="checked" ':''; ?>/></label><?php _e('noindex nofollow 404 error pages','pymseo'); ?></td>
		</tr>
	</table>
<?php 
}
?>