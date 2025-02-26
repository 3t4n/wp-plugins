<h1>EndPost Options</h1>
<?php
$options = get_option('endpost_options');
// var_export($options);
$defaults = array (
	'html' => '<!-- Twitter Button -->
<a href="http://twitter.com/share" class="twitter-share-button" data-url="%url%" data-text="%post_title%" data-count="horizontal" data-via="henasraf">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

<!-- Facebook Button -->
<iframe src="http://www.facebook.com/plugins/like.php?href={url}&layout=button_count&show_faces=true&width=450&action=like&colorscheme=light&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>'
);
?>
<form method="post" action="options.php">
	<?php settings_fields('endpost'); ?>
	<input type="hidden" name="endpost_options[custom-settings]" value="true" />
	<table class="form-table">
		<tr valign="top"><th scope="row">The HTML to add to each post</th>
			<td><textarea type="text" name="endpost_options[html]" style="width:500px; height:200px;"><?=html_entity_decode($options['custom-settings'] ? $options['html'] : $defaults['html']); ?></textarea><br /><span class="description">
			<p>
			You may evaluate PHP code by enclosing it in ## and ##.<br />The code has to be returned in order to be displayed and has to end in a semicolon or braces.<br /><br />Example: <code>##if ($var) return "Yay!";##</code>
			</p>
			<b>Common tags are:</b>
			<p>
				%ID%,
				%url%,
				%post_title%,
				%comment_count%,
				[[url]] (URL encoded)
				[[post_date]] (time stamped),
				[[post_time]] (time stamped),
			</p>
			<b>More tags:</b>
			<p>
				%post_author%,
				%post_date%,
				%post_date_gmt%,
				%post_modified%,
				%post_modified_gmt%,
				%guid%,
				[[post_date_gmt]] (time stamped),
				[[post_time_gmt]] (time stamped),
				[[post_modified]] (time stamped),
				[[post_modified_gmt]] (time stamped),
				[[guid]] (URL encoded),
			</p>
			<p>
				%post_content%,
				%post_excerpt%,
				%post_status%,
				%comment_status%,
				%ping_status%,
				%post_password%,
				%post_name%,
				%to_ping%,
				%pinged%,
				%post_content_filtered%,
				%post_parent%,
				%menu_order%,
				%post_type%,
				%post_mime_type%,
				%filter%
			</span></td>
		</tr>
		<tr valign="top"><th scope="row">Show HTML on</th>
			<td>
				<input id="on-single-posts" type="checkbox"<?=!$options['custom-settings'] || $options['on-single-posts'] ? ' checked="checked"':'';?> name="endpost_options[on-single-posts]" />
				<label for="on-single-posts">Single posts</label>
				
				
				<input id="on-pages" type="checkbox"<?=!$options['custom-settings'] || $options['on-pages'] ? ' checked="checked"':'';?> name="endpost_options[on-pages]" />
				<label for="on-pages">Pages</label>
				
				
				<input id="on-the-loop" type="checkbox"<?=!$options['custom-settings'] || $options['on-the-loop'] ? ' checked="checked"':'';?> name="endpost_options[on-the-loop]" />
				<label for="on-the-loop">The Loop</label>
			</td>
		</tr>
	</table>
	<p class="submit">
	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	</p>
</form>