<?php

if (!defined('ABSPATH')) exit;

function awar_admin_enqueue() {
	// style
	wp_enqueue_style( 
		'awar_css_admin_menu', 
		plugin_dir_url( __FILE__ ) . 'css/admin-menu.css', 
		[], 
		AWAR_ENQUEUE_CACHE
	);

	// picker style provided by WordPress
	wp_enqueue_style( 'wp-color-picker' );

	// script
	wp_enqueue_script( 
		'awar_js_admin_menu', 
		plugin_dir_url( __FILE__ ) . 'js/admin-menu.js', 
		NULL, 
		AWAR_ENQUEUE_CACHE, 
		true
	);

	wp_enqueue_script('wp-color-picker');
}

add_action('admin_enqueue_scripts', 'awar_admin_enqueue');


function awar_create_menu() {
	add_menu_page(
		'AWEOS Age-Popup', 
		'AWEOS Age-Popup',
		'administrator', 
		__FILE__, 
		'awar_admin_menu' 
	);

	add_action( 'admin_init', 'awar_register_setting' );
}

add_action('admin_menu', 'awar_create_menu');

function awar_register_setting() {
	awar_admin_menu_register_settings();
}

function awar_admin_menu() {
?>

<div class="wrap">	
	<?php awar_admin_menu_print_headlines() ?>

	<style>
	.awar-admin-category-list li {
		float: left;
		margin: 0 20px 20px 0;
	}
	</style>

	<form method="post" action="options.php">

	    <?php settings_fields( 'awar-number-group' ); ?>
	    <?php do_settings_sections( 'awar-number-group' ); ?>

	    <table>
	        <tr>
				<td scope="row">
					<strong>Categories</strong>
					<br>You can activate and remove the age restriction by clicking on a category below
				</td>
	    	</tr>
	    	<tr>
				<td>
					<input type="hidden" name="awar-woo-categories" class="awar-woo-categories-content" value="<?php echo get_option("awar-woo-categories") ?>">
					<ul class="awar-admin-category-tags">
						<?php 
						$categories = get_categories([
							'taxonomy' => 'product_cat',
						]);

						foreach ($categories as $category) {
							$slug = $category->slug;
							$name = $category->name;
							$id = $category->term_id;
							?>
							<li>
								<p data-slug="<?php echo $slug ?>">
									<?php echo $name ?>
									<a href="<?php echo get_category_link($id) ?>" target="_blank">
										Visit
									</a>
								</p>
							</li>
							<?php
						}

						?>
					</ul>
		        </td>
		    </tr>
			<tr>
				<td scope="row">
					If you want to change the texts, you can do that here (try our auto-translation)
				<td>
			</tr>
			
			<?php awar_admin_menu_print_options() // from helpler.php ?>

			<tr>
				<td scope="row">
					<p><strong>Auto Translation</strong><br></p>
					<button class="awar-translate-en">Auto Translate - EN</button>
					<button class="awar-translate-de">Auto Translate - DE</button>
				</td>
			</tr>
			<tr>
				<td class="awar-clean-database-texts">
					<p><strong>Database</strong></p>
					<p><strong>Your settings for this plugin will be removed from the database</strong></p>
				</td>
			</tr>
			<tr> 
				<td>
					<span class="awar-clean-database awar-btn-danger">Delete the settings</span>	
				</td>
			</tr>
			<tr> 
				<td>
					<span class="awar-reset-database awar-btn-danger">Reset the settings</span>	
				</td>
			</tr>
	    </table>

	    <?php submit_button(); ?>

	</form>
</div>
<?php }