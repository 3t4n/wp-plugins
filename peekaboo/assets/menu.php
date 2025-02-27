<style>
#peekaboo_settings h3 {color:#666; font-weight:100; font-family:Georgia, "Times New Roman", Times, serif; font-size:16px}
#peekaboo_settings hr { border:0; border-top:1px solid #ccc; height:1px; }
</style>
<div id="peekaboo_settings" class="wrap">

	<div class="icon32" id="icon-options-general"><br></div>

	<h2>Peekaboo Settings</h2>

	<?php if (!empty($status)): ?>
	<div class="<?php echo $status['error'] ? 'error' : 'updated'; ?> fade" id="message"><p><strong><?php echo $status['message']; ?></strong></p></div>
	<?php endif; ?>


    <h3>Quick Start Guide</h3>

    <p>This plugin allows you to show and hide specific portions of content within a post or page. Visitors can then use custom show/hide links to show or hide the portions you've defined. The plugin enables a few WordPress shortcodes: <code>[peekaboo]</code>, <code>[peekaboo_link]</code> and <code>[peekaboo_content]</code>, to learn more read the <a href="http://farinspace.com/wordpress-peekaboo-plugin/" target="_blank">extended documentation</a>, otherwise here is a quick overview:</p>

    <p>Use <code>[peekaboo_content]</code> ... <code>[/peekaboo_content]</code> to wrap content that you want to initially hide. Remember, you must use an opening <code>[peekaboo_content]</code> at the begining of the content you want initially hidden and a closing <code>[/peekaboo_content]</code> at the end of the content.</p>

	<p>After you've wrapped a piece of content, you need to create a show/hide link. To do this you will use <code>[peekaboo]</code> or <code>[peekaboo_link]</code> ... <code>[/peekaboo_link]</code> before or after the wrapped content. The <code>[peekaboo]</code> shortcode does not need to be closed.</p>

	<p>To give a peekaboo link context, you will need to give it and it's corresponding wrapped content a name. Use the <code>name</code> parameter on both the <code>[peekaboo name="foo"]</code> and the <code>[peekaboo_content name="foo"]</code>  ... <code>[/peekaboo_content]</code> shortcodes. Using the <code>name</code> parameter will link a wrapped content block to a show/hide link.</p>

	<p>I want to see an <a href="#" onclick="jQuery(this).parent().next().toggle(); return false;">example</a> of how to use it ...</p>

<div style="display:none; background-color:#efefef; padding:15px; -moz-border-radius:10px; -webkit-border-radius:10px;">
<pre>
[peekaboo onshow="Click to hide all" onhide="Click to show all"]

CONTENT

[peekaboo name="foo"]

[peekaboo_content name="foo"]
	CONTENT
[/peekaboo_content]

CONTENT

CONTENT

[peekaboo name="bar" onshow="Click to hide" onhide="Click to show"]

or you can also [peekaboo_link name="bar"]click here[/peekaboo_link] to view the contents

[peekaboo_content name="bar"]
	CONTENT
[/peekaboo_content]

CONTENT

[peekaboo name="foobar" start="visible"]

[peekaboo_content name="foobar" start="visible"]
	CONTENT
[/peekaboo_content]
</pre>
</div>

	<br/>
	<hr/>

	<h3>Default Onhide and Onshow Text</h3>
	
	<p>When using the <code>[peekaboo]</code> shortcode, this is the default text that will be used for the show/hide links in the <code>onhide</code> and <code>onshow</code> link states.</p>

	<!--<p><strong>Tip:</strong> If you need to include brackets in your text, you must use the equivelant HTML entities: [ = <code>&amp;#91;</code> and ] = <code>&amp;#93;</code></p>-->

	<p><strong>Tip:</strong> If you need to set default <code>onhide</code> and <code>onshow</code> text on a per-post basis you can use the <code>peekaboo_onshow_text</code> and <code>peekaboo_onhide_text</code> custom fields.</p>
	
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<?php echo $nonce; ?>

	<table class="form-table">
	<tbody>
	<tr valign="top">
		<th style="width:40px;"><code>onhide</code></th><?php $n = 'onhide_text'; ?>
		<td><input style="width:99%" type="text" name="<?php echo $option_name . '[' . $n . ']'; ?>" value="<?php if (isset($option[$n]) AND '' != $option[$n]) echo $option[$n]; ?>"></td>
	</tr>
	<tr valign="top">
		<th style="width:40px;"><code>onshow</code></th><?php $n = 'onshow_text'; ?>
		<td><input style="width:99%" type="text" name="<?php echo $option_name . '[' . $n . ']'; ?>" value="<?php if (isset($option[$n]) AND '' != $option[$n]) echo $option[$n]; ?>"></td>
	</tr>
	</tbody>
	</table>

	<br/>
	<hr/>

	<h3>Functional Options</h3>

	<p>The functional options listed here will change the plugin's behavior globally. If you need to change behavior on a per-post basis, use the custom fields where specified.</p>

	<table class="form-table">
	<tbody>
	<tr valign="top">
		<th style="width:60px;"><?php $n = 'collapse_all'; ?>
		<select name="<?php echo $option_name . '[' . $n . ']'; ?>" style="width:60px;">
			<option value="no"<?php if (isset($option[$n]) AND 'no' == $option[$n]) echo ' selected="selected"'; ?>>No</option>
			<option value="yes"<?php if (isset($option[$n]) AND 'yes' == $option[$n]) echo ' selected="selected"'; ?>>Yes</option>
		</select>
		</th>
		<td>Collapse all other content when showing the selected portion of content. <br/><strong>Tip:</strong> Use the <code>peekaboo_collapse_all</code> custom field with a value of "yes" or "no".</td>
	</tr>
	</tbody>
	</table>

	<p class="submit"><input type="submit" value="Save Changes" class="button-primary" name="Submit"></p>

	</form>

	<hr/>

    <p>I really like this plugin, I'll <a title="Rate Peekaboo Plugin" href="http://wordpress.org/extend/plugins/peekaboo/#rate-response" target="_blank"><strong>rate it 5</strong></a> on the WordPress Plugin Directory.</p>


</div>