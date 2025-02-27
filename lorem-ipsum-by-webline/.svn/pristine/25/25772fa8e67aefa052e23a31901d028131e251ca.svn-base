<?php
	//load shortcode js and admin ajax
	add_action( 'admin_enqueue_scripts', 'lipsum_wli_wp_admin_style' );
	function lipsum_wli_wp_admin_style( $hook ) 
	{
		//Check if generator page
		if( $hook == 'toplevel_page_lorem-ipsum'|| $hook == 'settings_page_lorem-ipsum' ) {
			wp_enqueue_style( 'lipsum-wli-style', WLI_LOREM_URL. '/Public/assets/css/lorem-ipsum-wli-style.css' );
			wp_enqueue_script( 'create-shortcode-js',WLI_LOREM_URL.'/Public/assets/js/lorem-ipsum-wli-create-shortcode.js',array('jquery'), '', true );
			wp_enqueue_script( 'install-plugin-js',WLI_LOREM_URL.'/Public/assets/js/install-plugin-libw.js',array('jquery'), '', true );
			add_thickbox();
			wp_localize_script( 'create-shortcode-js', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
		}
	
		//Enqueue Admin notices CSS
		wp_enqueue_style( 'libw-admin-notices-css', WLI_LOREM_URL. '/Public/assets/css/libw-admin-notices.css' );
	}

	add_action('admin_menu','lipsum_wli_admin_menu');
	//Add action link method
	function lipsum_wli_admin_menu()
	{		
		add_options_page( 'Lorem Ipsum', 'Lorem Ipsum', 'manage_options', 'lorem-ipsum', 'lipsum_wli_options_page');
	}

	//register settings page
	add_action( 'admin_init', 'lipsum_wli_init' );
	function lipsum_wli_init() 
	{
		register_setting( 'my-settings-group', 'my-setting' );
		register_setting( 'my-settings-group', 'lipsum_wli_paragraphs' );
		register_setting( 'my-settings-group', 'lipsum_wli_length' );
		register_setting( 'my-settings-group', 'lipsum_wli_pt' );
		register_setting( 'my-settings-group', 'lipsum_wli_decorate' );
		register_setting( 'my-settings-group', 'lipsum_wli_links' );
		register_setting( 'my-settings-group', 'lipsum_wli_ul' );
		register_setting( 'my-settings-group', 'lipsum_wli_ol' );
		register_setting( 'my-settings-group', 'lipsum_wli_dl' );
		register_setting( 'my-settings-group', 'lipsum_wli_bq' );
		register_setting( 'my-settings-group', 'lipsum_wli_code' );
		register_setting( 'my-settings-group', 'lipsum_wli_headers' );
		register_setting( 'my-settings-group', 'lipsum_wli_ac' );
		register_setting( 'my-settings-group', 'lipsum_wli_pr' );
		
		
	}
	
	function lipsum_wli_options_page() 
	{
	?>
		<div class="wrap maindiv">
			<h2>Lorem Ipsum Shortcode Generator</h2>
			<?php li_general_section_callback(); ?>
				<hr>
				<form method="post" action="options.php">
				<?php settings_fields( 'my-settings-group' ); ?>
				<?php do_settings_sections( 'my-settings-group' ); ?>
				<div class="formside">
					<table class="form-table">
						<tbody>
							<tr>
								<th scope="row"><label>Number of paragraphs:</label></th>
								<td><input type="text" name="lipsum_wli_paragraphs"  id="lipsum_wli_paragraphs" maxlength="3" class="regular-text"  value="<?php if(get_option('lipsum_wli_paragraphs')){ echo get_option('lipsum_wli_paragraphs'); } else { echo '5'; } ?>" ></td>
							</tr>
							<tr>    			
								<th scope="row"><label>Paragraph length:</label></th>	
								<td><fieldset>
									<label><input type="radio" value="short" name="lipsum_wli_length" id="lipsum_wli_length" <?php if(get_option('lipsum_wli_length')=="short"){ echo 'checked'; } ?>  checked>Short</label><br>
									<label><input type="radio" value="medium" name="lipsum_wli_length" id="lipsum_wli_length"  <?php if(get_option('lipsum_wli_length')=="medium"){ echo 'checked'; } ?> >Medium</label><br>
									<label><input type="radio" value="long" name="lipsum_wli_length" id="lipsum_wli_length" <?php if(get_option('lipsum_wli_length')=="long"){ echo 'checked'; } ?> >Long</label><br>
									<label><input type="radio" value="verylong" name="lipsum_wli_length" id="lipsum_wli_length" <?php if(get_option('lipsum_wli_length')=="verylong"){ echo 'checked'; } ?> >Very Long</label>	
								</td></fieldset>
							</tr>
							<tr>    			
								<th scope="row"><label>Options of Lorem Ipsum:</label></th>
								<td><div class="wrap"><label><input type="checkbox" value="plaintext" name="lipsum_wli_pt"  id="lipsum_wli_pt" class="lipsum_wli_checkbox_plain" <?php if(get_option('lipsum_wli_pt')=="plaintext"){ echo 'checked'; } ?> >Plain Text ( If "<strong>Plain Text</strong>" is checked then all other options will be disabled )</label></div>
								
									<div class="wrap"><label><input type="checkbox" value="decorate" name="lipsum_wli_decorate" id="lipsum_wli_decorate"  class="lipsum_wli_checkbox_all" <?php if(get_option('lipsum_wli_decorate')=="decorate"){ echo 'checked'; } ?> >Add &lt;b&gt; and &lt;i&gt;-tags (<b>bold</b> and <i>italic</i>)</label></div>
									
									<div class="wrap"><label><input type="checkbox" value="link" name="lipsum_wli_links" id="lipsum_wli_links" class="lipsum_wli_checkbox_all" <?php if(get_option('lipsum_wli_links')=="link"){ echo 'checked'; } ?> >Add &lt;a&gt;-tags (<a href="#">links</a>)</label></div>
									
									<div class="wrap"><label><input type="checkbox" value="ul" name="lipsum_wli_ul" id="lipsum_wli_ul" class="lipsum_wli_checkbox_all" <?php if(get_option('lipsum_wli_ul')=="ul"){ echo 'checked'; } ?> >Add unordered lists</label></div>
									
									<div class="wrap"><label><input type="checkbox" value="ol" name="lipsum_wli_ol" id="lipsum_wli_ol" class="lipsum_wli_checkbox_all" <?php if(get_option('lipsum_wli_ol')=="ol"){ echo 'checked'; } ?> >Add numbered lists</label></div>
									
									<div class="wrap"><label><input type="checkbox" value="dl" name="lipsum_wli_dl" id="lipsum_wli_dl" class="lipsum_wli_checkbox_all" <?php if(get_option('lipsum_wli_dl')=="dl"){ echo 'checked'; } ?> >Add description lists</label></div>
									
									<div class="wrap"><label><input type="checkbox" value="bq" name="lipsum_wli_bq"  id="lipsum_wli_bq" class="lipsum_wli_checkbox_all" <?php if(get_option('lipsum_wli_bq')=="bq"){ echo 'checked'; } ?> >Add blockquotes</label></div>
									
									<div class="wrap"><label><input type="checkbox" value="code" name="lipsum_wli_code" id="lipsum_wli_code" class="lipsum_wli_checkbox_all" <?php if(get_option('lipsum_wli_code')=="code"){ echo 'checked'; } ?> >Add code samples (&lt;code&gt; and &lt;pre&gt;-tags)</label></div>
									
									<div class="wrap"><label><input type="checkbox" value="headers" name="lipsum_wli_headers" id="lipsum_wli_headers" class="lipsum_wli_checkbox_all" <?php if(get_option('lipsum_wli_headers')=="headers"){ echo 'checked'; } ?> >Add headers (&lt;h1&gt; through &lt;h6&gt;)</label></div>
									<div class="wrap"><label><input type="checkbox" value="allcaps" name="lipsum_wli_ac" id="lipsum_wli_ac" class="lipsum_wli_checkbox_all" <?php if(get_option('lipsum_wli_ac')=="allcaps"){ echo 'checked'; } ?> >Use ALL CAPS</label></div>
									
									<div class="wrap"><label><input type="checkbox" value="prude" name="lipsum_wli_pr" id="lipsum_wli_pr" class="lipsum_wli_checkbox_all" <?php if(get_option('lipsum_wli_pr')=="prude"){ echo 'checked'; } ?> >Prude version</label></div>
								</td>    						
							</tr>			
						</tbody>
					</table>
				</div>
				<div class="previeside">
					<table>
						<tr>
							<th scope="row" class="previewtext">Preview Text</th>
						</tr>
						<tr>
							<td><div id="lipsum_wli_preview_text" class="previewdiv"></div></td>
						</tr>
					</table>
				</div>	 
				<div class="shortcodediv">
					<table class="form-table">
						<tr>
							<th scope="row" ><h3>Dynamic Shortcode</h3></th>
							<td><div id="shortcode"></div></td>
						</tr>
						
						<tr>
							<td colspan='2'><h4 class="dynamicshortcode" >Please Copy This Shortcode and paste in editor where you want to display lorem ipsum content.</h4></td>
						</tr>
						
						<tr>
						<td>
						<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
						</td>
						</tr>
					</table>
					</form>
				</div>
		</div>
		<?php
		add_filter('admin_footer_text', 'li_admin_footer');
	}

	//For Preview display function
	function lipsum_wli_preview() {
		
		$paragraphs = $_POST['lipsum_wli_paragraph_number'];
		$length = $_POST['lipsum_wli_paragraph_length'];
		$decoration = isset($_POST['lipsum_wli_paragraph_decoration'])?$_POST['lipsum_wli_paragraph_decoration']:"";
		$links = isset($_POST['lipsum_wli_paragraph_links'])?$_POST['lipsum_wli_paragraph_links']:"";
		$unorder_list =isset($_POST['lipsum_wli_paragraph_unorder_list'])?$_POST['lipsum_wli_paragraph_unorder_list']:"";
		$order_list = isset($_POST['lipsum_wli_paragraph_order_list'])?$_POST['lipsum_wli_paragraph_order_list']:"";
		$description_list = isset($_POST['lipsum_wli_paragraph_description_list'])?$_POST['lipsum_wli_paragraph_description_list']:"";
		$blockquotes = isset($_POST['lipsum_wli_paragraph_blockquotes'])?$_POST['lipsum_wli_paragraph_blockquotes']:"";
		$code  = isset($_POST['lipsum_wli_paragraph_code'])?$_POST['lipsum_wli_paragraph_code']:"";
		$headers = isset($_POST['lipsum_wli_paragraph_headers'])?$_POST['lipsum_wli_paragraph_headers']:"";
		$capital = isset($_POST['lipsum_wli_paragraph_capital'])?$_POST['lipsum_wli_paragraph_capital']:"";
		$prude = isset($_POST['lipsum_wli_paragraph_prude'])?$_POST['lipsum_wli_paragraph_prude']:"";
		$text = isset($_POST['lipsum_wli_paragraph_plain_text'])?$_POST['lipsum_wli_paragraph_plain_text']:"";
		
		$url = "http://loripsum.net/api/$paragraphs/$length/$decoration/$links/$unorder_list/$order_list/$description_list/$blockquotes/$code/$headers/$capital/$prude/$text";
		$request = new WP_Http;
		$result = $request->request($url);
		$content = array();
		
		if (isset($result->errors)) {
			// display error message of some sort
		} else {
			$content = $result['body'];
		
		}
		echo $content;
		
		// Always die in functions echoing ajax content
		die();
	}
	add_action( 'wp_ajax_lipsum_wli_preview', 'lipsum_wli_preview' );
	add_action( 'wp_ajax_nopriv_lipsum_wli_preview', 'lipsum_wli_preview' );

	// General section callback function.
	function li_general_section_callback() {

		?>
		<div class="main-div">	

			<div class="div1">
				<div class="libw-plugin-cta-wrap">
					<h2 class="head">Thank you for downloading our plugin - Lorem Ipsum by Webline.</h2>
					<h2 class="head">We're here to help !</h2>
					<p>Our plugin comes with free, basic support for all users. We also provide plugin customization in case you want to customize our plugin to suit your needs.</p>
					<a href="https://www.weblineindia.com/contact-us.html?utm_source=WP-Plugin&utm_medium=Lorem%20Ipsum&By&Webline&utm_campaign=Free%20Support" target="_blank" class="button">Need help?</a>
					<a href="https://www.weblineindia.com/contact-us.html?utm_source=WP-Plugin&utm_medium=Lorem%20Ipsum&By&Webline&utm_campaign=Plugin%20Customization" target="_blank" class="button">Want to customize plugin?</a>
				</div>
				<div class="libw-plugin-cta-upgrade">
					<p class="note">Want to hire Wordpress Developer to finish your wordpress website quicker or need any help in maintenance and upgrades?</p>
					<a href="https://www.weblineindia.com/contact-us.html?utm_source=WP-Plugin&utm_medium=Lorem%20Ipsum&By&Webline&utm_campaign=Hire%20WP%20Developer" target="_blank" class="button button-primary">Hire now</a>
				</div>
			</div>

			<div class="div2">	
			<?php
			$all_plugins = get_plugins();
			if (!(isset($all_plugins['xml-sitemap-for-google/xml-sitemap-for-google.php']))) {
				?>
					<div class="libw-plugin-cta show-other-plugin" id="xml-plugin-banner">
						<h2 class="head">Want to Rank Higher on Google?</h2>
						<h3 class="head">Install <span>XML Sitemap for Google</span> Plugin</h3>
						<hr>
						<p>Our plugin comes with free, basic support for all users.</p>							
						<ul class="custom-bullet">
							<li>Easy Setup and Effortless Integration</li>	
							<li>Automatic Updates</li>	
							<li>Improve Search Rankings</li>	
							<li>SEO Best Practices</li>
							<li>Optimized for Performance</li>
						</ul>						
						<button id="open-install-libw" class="button-install">Install Plugin</button>
					</div>
				<?php 
			}
			?>
			</div>	
		</div>
		<?php
	}
	
	// Callback section on Admin Footer
	function li_admin_footer($footer_text)
		{
			$url = 'https://wordpress.org/support/plugin/lorem-ipsum-by-webline/reviews/?filter=5#new-post';
			$wpdev_url = 'https://www.weblineindia.com/wordpress-development.html?utm_source=WP-Plugin&utm_medium=Lorem%20Ipsum&By&Webline&utm_campaign=Footer%20CTA';
			$text = sprintf(
				wp_kses(
					'Please rate our plugin %1$s <a href="%2$s" target="_blank" rel="noopener noreferrer">&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="%3$s" target="_blank" rel="noopener">WordPress.org</a> to help us spread the word. Thank you from the <a href="%4$s" target="_blank" rel="noopener noreferrer">WordPress development</a> team at WeblineIndia.',
					array(
						'a' => array(
							'href' => array(),
							'target' => array(),
							'rel' => array(),
						),
					)
				),
				'<strong>"List Sub Pages"</strong>',
				$url,
				$url,
				$wpdev_url
			);
			return $text;
		}

?>