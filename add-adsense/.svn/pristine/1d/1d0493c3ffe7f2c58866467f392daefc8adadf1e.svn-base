<?php
/**
 * Plugin Name: Add Adsense
 * Plugin URI: https://www.seosthemes.com/add-adsense/
 * Contributors: seosbg
 * Author: seosbg
 * Description: Add Adsense WordPress plugin allows you to add adsense fields in your theme.
 * Version: 1.2
 * License: GPL2
 */

add_action('admin_menu', 'add_adsense_menu');
function add_adsense_menu() {
    add_menu_page('Add Adsense', 'Add Adsense', 'administrator', 'add-adsense', 'add_adsense_settings_page', plugins_url('add-adsense/images/icon.png')
    );

    add_action('admin_init', 'add_adsense_register_settings');
}

function add_adsense_register_settings() {
    register_setting('add-adsense', 'add_adsense_top');
    register_setting('add-adsense', 'add_adsense_bottom');
}
				

				
/***************** This is inserted add at the footer *************************/
		
				add_action('wp_footer', 'add_adsense_footer');

				function add_adsense_footer() {
					$content = "<div class='add-adsense-bottom'>" . get_option('add_adsense_bottom') . "</div>";
				  echo $content;
				}

/***************** This is inserted add in the header posts *************************/

				function add_adsense_posts() {
					echo "<div class='add-adsense-top'>" . get_option('add_adsense_top') . "</div>"; }
					add_filter('the_content', 'add_adsense_content_posts');
					function add_adsense_content_posts($content) {
						if (is_single()) {
							$content .= add_adsense_posts();
						}
						return $content;
			}
			
function add_adsense_settings_page() {
?>

    <div class="wrap add-adsense">
		<h1><?php _e('Add Adsense', 'add-adsense'); ?></h1>
        <form action="options.php" method="post" role="form" name="add-adsense">
		
			<?php settings_fields( 'add-adsense' ); ?>
			<?php do_settings_sections( 'add-adsense' ); ?>
		
			<div>
				<a target="_blank" href="http://seosthemes.com/add-adsense/">
					<div class="btn s-red">
						 <?php _e('Buy', 'add-adsense'); echo ' <img class="ss-logo" src="' . plugins_url( 'images/logo.png' , __FILE__ ) . '" alt="logo" />';  _e(' Premium', 'add-adsense'); ?>
					</div>
				</a>
			</div>
			
			<!-- ------------------- Posts Adsense ------------------ -->
			
			<div class="form-group">
				<label><?php _e('All Posts Adsense: ', 'add-adsense'); ?></label>
				<textarea class="form-control"  rows="10" cols="100" name="add_adsense_top"><?php echo esc_html(get_option('add_adsense_top')); ?></textarea>
			</div>
			
			<!-- ------------------- Adsense Footer ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Adsense Footer: ', 'add-adsense'); ?></label>
				<textarea class="form-control"  rows="10" cols="100" name="add_adsense_bottom"><?php echo esc_html(get_option('add_adsense_bottom')); ?></textarea>
			</div>

``		<div class="cc-clr"></div>
		<div style="margin-top: 190px;"><?php submit_button(); ?></div>
			
		</form>	
	</div>
	
	<?php } 
	
	function add_adsense_language_load() {
		load_plugin_textdomain('add_adsense_language_load', FALSE, basename(dirname(__FILE__)) . '/languages');
	}
	add_action('init', 'add_adsense_language_load');
	
	/************************** CSS Code ****************************/

	function add_adsense_options_css() { ?>
			<style type="text/css">
			
				.add-adsense-top, .add-adsense-bottom {
					margin: 0 auto;
					display: inline-block;
					text-align: center;
					width: 100%;
					margin: 10px 0 10px 0;
				}
				
			</style>
		<?php
		}

	add_action('wp_head', 'add_adsense_options_css'); 
	
	function add_adsense_admin_options_css() { ?>	
			<style type="text/css">
				.add-adsense {
					width: 100%;
					display: block;
					clear: both;

				}
				
				.add-adsense label {
					font-weight: bold;
					padding: 0 0 20px;
					text-align: center;
				}
				
				.cc-clr {
					display: block;
					clear: both;
					content: "";
				}
				
				.add-adsense .form-group  {
					margin-top: 15px;
					width: 200px;
					height: auto;
					display: block;
				}
				
				 .add-adsense .form-group input {
					border-radius: 4px;
					padding: 10px;
				}

				.add-adsense  .s-red {
					background-color: #B70000 !important;
					border: 1px solid #6B0000 !important;
					display: block;
					clear: both;
					font-size: 40px;
					font-weight: 900;
					width: 100%;
					color: #fff;
					-webkit-transition: all 0.6s ease;
					-moz-transition: all 0.6s ease;
					-o-transition: all 0.6s ease;
					-ms-transition: all 0.6s ease;
					transition: all 0.6s ease;
					font-family: 'Montserrat', sans-serif;
					text-shadow: 2px 2px #333;
				}

				.add-adsense h2  {
					font-family: 'Montserrat', sans-serif;
					font-weight: 900;
					font-size: 20px;
				}

				.s-red:hover {
					background-color: red !important;
				}

				.add-adsense .btn {
					text-align: center;
					line-height: 80px;
				}

				.add-adsense  a {
					text-decoration: none;
				}

				.add-adsense h1 {
					font-size: 44px;
					padding: 30px 0 30px 0;
					text-align: center;
				}
				
				.add-adsense .ss-logo {
					position: relative;
					top: 12px;
					width: 60px;
					height: 60px;
				}
			</style>
	<?php } add_action('admin_head', 'add_adsense_admin_options_css'); 