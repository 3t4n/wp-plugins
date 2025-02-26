<?php /*
Plugin Name: Clipboard
Version: 1.0.0
Plugin URI: 
Description:Copying text to the clipboard shouldn't be hard.  it should be easy that's why we create this plugin.
Author: Hassanal S. Aguam
Author URI: http://hash-webservices.com/  
License: GPL v3
Text Domain: Clipboard
*/

// ENQUEE FOR THE  OF THE Clipboard
function clipboard_scripts_enquee() {   
    wp_enqueue_script( 'clipboard.min', plugin_dir_url( __FILE__ ) . 'js/clipboard.min.js', array('jquery') );
    wp_enqueue_script( 'c_scripts', plugin_dir_url( __FILE__ ) . 'js/c_scripts.js', array('jquery') );
}
add_action('wp_footer', 'clipboard_scripts_enquee');


function clipboard_admin_scripts() {
	wp_enqueue_style( 'clipboard_admin',  plugin_dir_url( __FILE__ ) . 'css/clipboard_admin.css' );
    wp_enqueue_script( 'clipboard.min.js',plugin_dir_url( __FILE__ ) .'js/clipboard.min.js', array('jquery') );
    wp_enqueue_script( 'slcm.js',plugin_dir_url( __FILE__ ) .'js/c_scripts.js', array('jquery') );
}

add_action( 'admin_head', 'clipboard_admin_scripts' );

function clipboard_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'clipboard_wp_admin_style' );


add_action('admin_menu', 'clipboard_adminSetup');

function clipboard_adminSetup(){
        add_menu_page( 'Clipboard Demo', 'Clipboard Demo', 'manage_options', 'Clipboard-plugin', 'clipboard_init' );
}
 
function clipboard_init(){ ?>
<h2 class = "title-clipboard">This is how to use the plugin.</h2>
	<table class = "clip">
			<tr>
					<td><input id="foo" value="https://github.com/zenorocha/clipboard.js.git"></td>
					<td><button class="btn" data-clipboard-target="#foo">Copy to clipboard</button></td>
					<td><textarea placeholder="Paste here"></textarea></td>
						<td>	<-- Target -->
							  <p class = "data-demo">
									&lt;input id="foo" value="https://github.com/zenorocha/clipboard.js.git">
							</p>
								<-- Trigger -->
							<p class = "data-demo">
								&lt;button class="btn" data-clipboard-target="#foo"&gt;
								   Copy to clipboard
								&lt;/button&gt;
							</p>
					</td>
			</tr>
		<tr>
			<td>
				<textarea id="bar">Mussum ipsum cacilds...</textarea>
				
			</td>

			<td>
				<button class="btn" data-clipboard-action="cut" data-clipboard-target="#bar">
				    Cut to clipboard
				</button>
			</td>
			

			<td><textarea placeholder="Paste here"></textarea></td>

			<td class = "democlipboard">
				<-- Target --><br/>
				<p class = "data-demo">
				&lt;textarea id="bar"&gt;Mussum ipsum cacilds...&lt;/textarea&gt; <br/>
				</p>
				<br/>
				<-- Trigger --> <br/>
				<p class = "data-demo">
					&lt;button class="btn" data-clipboard-action="cut" data-clipboard-target="#bar"&gt; <br/>
					    Cut to clipboard <br/>
					&lt;/button&gt;
				</p>

				
			</td>
		</tr>
	</table>
	<br>
	<p class = "authors"><strong>Author:</strong> Hassanal S. Aguam <a href = "http://hash-webservices.com/" target="_blank">hash-webservices.com</a></p>
<?php }
