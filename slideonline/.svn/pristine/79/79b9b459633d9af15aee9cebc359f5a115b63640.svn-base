<?php
function slideonline_ui_settings_page()
{
	global $slideonline_options;

	?><div class="wrap">


	<div id="icon-options-general" class="icon32"></div>
	<h2>SlideOnline Options</h2>
	

	<?php if ( false !== $_REQUEST['updated'] ) : ?>
	<div><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>
			
			
<div class="metabox-holder has-right-sidebar">
		
		<div class="inner-sidebar">
	<!--
			<div class="postbox">
				<h3><span>Metabox 1</span></h3>
				<div class="inside">
					<p>Hi, I'm metabox 1!</p>
				</div>
			</div>
 
			<div class="postbox">
				<h3><span>Metabox 2</span></h3>
				<div class="inside">
					<p>Hi, I'm metabox 2!</p>
				</div>
			</div>
 -->
 				
			<div class="postbox">
				<h3><span>SlideOnline.com</span></h3>
				<div class="inside">
					<p>Create a free account at <a href="http://slideonline.com/user/signup/?utm_source=wp&utm_medium=link&utm_campaign=slideonlinewpplugin" target="_blank">SlideOnline.com</a></p>
				</div> <!-- .inside -->
			</div>
			
			<div class="postbox">
				<h3><span>More Resources</span></h3>
				<div class="inside">
					<ul style="list-style:square; margin-left: 20px;">
						<li><a href="http://wordpress.org/extend/plugins/slideonline/">SlideOnline for WordPress Plugin Website</a></li>
						<li><a href="http://slideonline.com/">SlideOnline.com Website</a></li>
						
					</ul>
					
					<p>If this plugin is useful for your needs, please can you take a moment to <a href="http://wordpress.org/support/view/plugin-reviews/slideonline" target="_blank">rate this plugin here</a>? Thank you</p> 
				</div> <!-- .inside -->
			</div>
			
			<!-- ... more boxes ... -->
 
		</div> <!-- .inner-sidebar -->
 
		<div id="post-body">
			<div id="post-body-content">

				<div class="postbox">
					<h3><span>Settings</span></h3>
					<div class="inside">
					
					<form method="post" action="options.php">
				  
						<?php $options = get_option('slideonline_options', $slideonline_options); // var_dump($options); ?>
						<?php settings_fields('slideonline_options'); ?>
						<?php //do_settings_fields( 'slideonline_options' ); ?>
						<table class="form-table">
						<tr valign="top"><th scope="row">Width</th>
						<td><input type="text" name="slideonline_options[default_width]" value="<?php echo $options['default_width']; ?>" class="regular-text" /> Default: 580</td>
						</tr>
						<tr valign="top"><th scope="row">Height</th>
						<td><input type="text" name="slideonline_options[default_height]" value="<?php echo $options['default_height']; ?>" class="regular-text"/> Default: 400</td>
						</tr>
						<tr valign="top"><th scope="row">CSS Classname</th>
						<td><input type="text" name="slideonline_options[class]" value="<?php echo $options['class']; ?>" /></td>
						</tr>
						<!--
						<tr valign="top"><th scope="row">Show author credits</th>
						<td><input name="slideonline_options[author_credits]" type="checkbox" value="1" <?php checked('1', $options['author_credits']); ?> /></td>
						</tr>
						-->
						</table>
						<p class="submit">
						<input type="submit" class="button-primary" name="Submit" value="<?php _e('Save Changes') ?>" />
						</p>
					</form>
					
					</div> <!-- .inside -->
				</div>
 
				<div class="postbox">
					<h3><span>How to Use</span></h3>
					<div class="inside">
						<h4>Quick Instructions</h4>
						<p>Use the following short code in your post: <pre>[slideonline id="913"]</pre></p>
						<h4>Detailed Instructions</h4>
						<p>To embed your presentations copy the Embed code from <a href="http://slideonline.com/?utm_source=wp&utm_medium=link&utm_campaign=slideonlinewpplugin" target="_blank">SlideOnline.com</a> into your blog post.</p>
						<p>If you need to embed a PowerPoint or PDF presentation into your blog, you can create a free account at SlideOnline.com and then upload your presentation file. The presentation will be converted to an online version and then you can grab an Embed code. Use the WordPress Embed code that looks like:
						<pre>[slideonline id="913"]</pre>. Alternatively you can configure the following parameters:<br/>
						Parameters
						<ul>
							<li><em>id</em> (required): The presentation ID</li>
							<li><em>width</em> (optional)</li>
							<li><em>height</em> (optional)</li>
							<li><em>title</em> (optional)</li>
						</ul>
						
					</div> <!-- .inside -->
				</div>

 
 
			</div> <!-- #post-body-content -->
		</div> <!-- #post-body -->
 
	</div> <!-- .metabox-holder -->	
	
	
	
</div>
<?php

}