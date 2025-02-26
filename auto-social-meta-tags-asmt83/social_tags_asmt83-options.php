<?php 
	function asmt83_register_settings() {
	   add_option('asmt83_fbAppId', '');
	   register_setting('asmt83_opts', 'asmt83_fbAppId', 'myplugin_callback' );
	}

	function asmt83_options_page_menu() {
	  add_options_page('Auto-Social Meta Tags Options', 'Auto-Social Meta Tags', 'manage_options', 'asmt83', 'asmt83_option_page');
	}

	function asmt83_option_page(){
	?>
		<diV class="wrap">
			<h1>Auto-Social Meta Tags</h1>
			<h4>by Migue0583</h4>
			<form method="post" action="options.php">
				 <?php settings_fields( 'asmt83_opts' ); ?>		  
				   <table>
					  <tr valign="top">
						  <th scope="row"><label for="asmt83_fbAppId">Facebook App ID</label></th>
						  <td><input type="text" id="asmt83_fbAppId" name="asmt83_fbAppId" value="<?php echo get_option('asmt83_fbAppId'); ?>" /></td>
					  </tr>
					  <tr>
						<th></th>
						<td>
							If you have a Facebook Application and you know your App ID, place in the corresponding field.
							If your don't have one, it's ok, leave the field empty. 
							Facebook tags extractor will complain, but will work.
							You don't need the app secret key and should never give it to strangers.
						</td>
					  </tr>
				  </table>
				   <?php  submit_button(); ?>
				  <hr>
				  <div>
				  	<h3>What does this plugin do?</h3>
					This plugin adds social meta tags automatically on posts, 
					pages and other parts of a WordPress site by using existing 
					characteristics, like the excerpt, tags and featured image.
					<ul>
						<li><b>LINK image_src</b></li>
						<li><b>META twitter:image</b></li>
						<li><b>META og:image</b></li>
					</ul>
					If the page or post has an excerpt, it adds the following tags. If there 
					is not, it will take the blog's tagline/about.<br>
					<ul>
						<li><b>META description</b></li>
						<li><b>META og:description</b></li>
					</ul>					
					Using the page's or post's title adds:
				 	<ul>
						<li><b>META og:title</b></li>
					</ul>	
					Using the post's tags adds the following. If there are none, 
					the tag is not added. Pages do not have tags.
				 	<ul>
						<li><b>META keywords</b></li>
					</ul>	
					To add the type tags it needs a custom option in the post or page that you have to set. If
					the option is absent, it adds the value 'article'.
				 	<ul>
						<li><b>META og:type</b></li>
						<li><b>META twitter:card</b></li>
					</ul>	
					Using the post or page's permalink (URL) adds: 
				 	<ul>
						<li><b>META og:url</b></li>
					</ul>	
					Using the Facebook App Id introduced here, it adds: 
				 	<ul>
						<li><b>META fb:app_id</b></li>
					</ul>
					That's it. It is a short plugin for meta tags, but it does the work.
				  </div>
			</form>
		</div>
	<?php
}?>