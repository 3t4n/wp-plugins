<?php
// PAGINA OPCIONES WPO
if(!function_exists('wp_get_current_user')) { include(ABSPATH . "wp-includes/pluggable.php"); }

function pymseo_opciones_wpo(){
	?>
	<h2><?php _e('Performance','pymseo'); ?></h2>
	<table class="form-table">
		<tr>
			<td><label for="pymseoRemoveQueryString"><input type="checkbox" name="pymseoRemoveQueryString" <?php echo get_option('pymseoRemoveQueryString')?'checked="checked" ':''; ?> /></label>Remove Querystrings</td>
			<td><label for="pymseoRemoveJqueryMigrate"><input type="checkbox" name="pymseoRemoveJqueryMigrate" <?php echo get_option('pymseoRemoveJqueryMigrate')?'checked="checked" ':''; ?> />Remove Jquery Migrate</label></td>
		</tr>
		<tr>
			<td><label for="pymseoMoveScriptsFooter"><input type="checkbox" name="pymseoMoveScriptsFooter" <?php echo get_option('pymseoMoveScriptsFooter')?'checked="checked" ':''; ?> /></label>Move scripts head to footer</td>
			<td><label for="pymseoWPODeferScripts"><input type="checkbox" name="pymseoWPODeferScripts" <?php echo get_option('pymseoWPODeferScripts')?'checked="checked" ':''; ?> /></label>Apply defer to less jquery scripts</td>
		</tr>
		<tr>
			<td><label for="pymseoDisableHeartbeat"><input type="checkbox" name="pymseoDisableHeartbeat" <?php echo get_option('pymseoDisableHeartbeat')?'checked="checked" ':''; ?> /></label>Disable Heartbeat</td>
			<td><label for="pymseoDisableEmojis"><input type="checkbox" name="pymseoDisableEmojis" <?php echo get_option('pymseoDisableEmojis')?'checked="checked" ':''; ?> /></label>Disable Emojis</td>
		</tr>
		<tr>
			<td><label for="pymseoWPOGoogleFontSwap"><input type="checkbox" name="pymseoWPOGoogleFontSwap" <?php echo get_option('pymseoWPOGoogleFontSwap')?'checked="checked" ':''; ?> /></label>Enable Swap Google Fonts display</td>
			<td></td>
		</tr>
		
		
	</table>
	<hr>
	<h2>Minify</h2>
	<table class="form-table">
		<tr>
			<td><label for="pymseoWPOMinifyHTML"><input type="checkbox" id="botonpymseoWPOMinifyHTML" name="pymseoWPOMinifyHTML" <?php echo get_option('pymseoWPOMinifyHTML')?'checked="checked" ':''; ?>/></label>Minify HTML</td>
			<td><label for="pymseoWPOMinifyInlineJavaScript"><input type="checkbox" id="botonpymseoWPOMinifyInlineJavaScript" disabled name="pymseoWPOMinifyInlineJavaScript" <?php echo get_option('pymseoWPOMinifyInlineJavaScript')?'checked="checked" ':''; ?>/></label>Minify inline JavaScript</td>	
			<td><label for="pymseoWPORemoveCommentsHTML"><input type="checkbox" id="botonpymseoWPORemoveCommentsHTML" disabled name="pymseoWPORemoveCommentsHTML" <?php echo get_option('pymseoWPORemoveCommentsHTML')?'checked="checked" ':''; ?>/></label>Remove HTML, JavaScript and CSS comments</td><td></td>
		</tr>
	</table>
	<hr>
	<h2><?php _e('Browser cache','pymseo'); ?></h2>
<?php _e('Reduce server load and decrease response time by using the cache available in site visitors web browser.','pymseo'); ?>
	<table class="form-table">
		<tr>
			<td><label for="pymseoWPOActivarCacheNavegador"><input type="checkbox" name="pymseoWPOActivarCacheNavegador" <?php echo get_option('pymseoWPOActivarCacheNavegador')?'checked="checked" ':''; ?>/></label><?php _e('Enable gzip compression','pymseo'); ?></td>	
		</tr>
	</table>
	<hr>
	<h2><?php _e('Images','pymseo'); ?></h2>
		<table class="form-table">
			<tr>
				<td><label for="pymseoActiveLazyLoad"><input type="checkbox" name="pymseoActiveLazyLoad" <?php echo get_option('pymseoActiveLazyLoad')?'checked="checked" ':''; ?>/></label><?php _e('Active Lazy Load','pymseo'); ?></td>
			</tr>
			<tr>
				<th><?php _e('WordPress jpeg Quality','pymseo'); ?></th>
				<td><label for="pymseoWPOCompresionImagenes"><input type="number" min="0" max="100" size="4" name="pymseoWPOCompresionImagenes" value="<?php if (empty("pymseoUXSearchChangingNumberResultsPage")) {echo get_option('posts_per_page');}else{echo get_option('pymseoWPOCompresionImagenes');}?>" /></label> <?php _e('Controls the quality of the generated image sizes for every uploaded image.','pymseo'); ?></td>
			</tr>
		</table>
	<hr />
	<h2><?php _e('CDN','pymseo'); ?></h2>
	<table class="form-table">
		<tr>
			<td><label for="pymseoCDNEnable"><input type="checkbox" name="pymseoCDNEnable" id="botonpymseoCDNEnable" <?php echo get_option('pymseoCDNEnable')?'checked="checked" ':''; ?>/></label><?php _e('Enable CDN','pymseo'); ?></td>	
		</tr>
		<tr>
			<td><label for="pymseoCDNTypeFileCss"><input type="checkbox" name="pymseoCDNTypeFileCss" id="botonpymseoCDNTypeFileCss" <?php echo get_option('pymseoCDNTypeFileCss')?'checked="checked" ':''; ?>/></label><?php _e('Enable css','pymseo'); ?></td>	
			<td><label for="pymseoCDNTypeFileJs"><input type="checkbox" name="pymseoCDNTypeFileJs" id="botonpymseoCDNTypeFileJs" <?php echo get_option('pymseoCDNTypeFileJs')?'checked="checked" ':''; ?>/></label><?php _e('Enable js','pymseo'); ?></td>
			<td><label for="pymseoCDNTypeFileImages"><input type="checkbox" name="pymseoCDNTypeFileImages" id="botonpymseoCDNTypeFileImages" <?php echo get_option('pymseoCDNTypeFileImages')?'checked="checked" ':''; ?>/></label><?php _e('Enable images','pymseo'); ?></td>
			<td><label for="pymseoCDNTypeFileVideo"><input type="checkbox" name="pymseoCDNTypeFileVideo" id="botonpymseoCDNTypeFileVideo" <?php echo get_option('pymseoCDNTypeFileVideo')?'checked="checked" ':''; ?>/></label><?php _e('Enable video','pymseo'); ?></td>
		</tr>
	</table>
	<table class="form-table">
		<tr>
			<th><?php _e('CDN URL','pymseo'); ?></th>
			<td><label for="pymseoCDNHosts"><input type="text" placeholder="" name="pymseoCDNHosts" id="botonpymseoCDNHosts" disabled size="55" value="<?php echo get_option('pymseoCDNHosts') ?>" /></label> <?php _e('example https://cdn.domain.com','pymseo'); ?></td>
		</tr>
</table>
<?php 
}
?>