<?php
/**
 * Plugin Name: Product Category
 * Description: Showcase your Product Categories on any Page or Post with different styles and settings.
 * Version: 1.5.0
 * Author: Kushang Tailor
 * Author URI: https://profiles.wordpress.org/kushang78/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.html
 * Requires Plugins: woocommerce
 *
 * @author Kushang Tailor
 * @package Product Category
 * @version 1.5.0
 */

if ( ! defined( 'PCW_PLUGIN_PATH' ) ) {
	define( 'PCW_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
	define( 'PCW_PLUGIN_VERSION', '1.5.0' );
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function pcb_block_product_category_block_init() {
	register_block_type( __DIR__ . '/includes/blocks/build' );
}
add_action( 'init', 'pcb_block_product_category_block_init' );

// Check required plugin is activated or not with Admin Notice.
require_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) :
	include PCW_PLUGIN_PATH . '/includes/widget/woo-product-category-widget.php';
	include PCW_PLUGIN_PATH . '/includes/shortcode/shortcode.php';
	include PCW_PLUGIN_PATH . '/includes/elementor-widget/elementor-pcw-widget.php';

	/**
	 * Admin success Notices.
	 *
	 * @since 1.0.0
	 */
	function pcw_success_notice_hook_activation() {
		set_transient( 'pcw_success_notice_hook', true, 5 );
	}
	register_activation_hook( __FILE__, 'pcw_success_notice_hook_activation' );
else :
	/**
	 * Admin error Notices.
	 *
	 * @since 1.0.0
	 */
	function pcw_error_notice() {
		?>
		<div class="error notice">
			<p><?php echo wp_kses_post( '<b>This following plugins are recommended <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce</a></b> Plugin is not install OR activated!. Please install OR activate this plugin to use product category plugin', 'product-category' ); ?></p>
		</div>
		<?php
	}
	add_action( 'admin_notices', 'pcw_error_notice' );
endif;

/**
 * Load Stylesheet with wp_enqueue_style.
 *
 * @since 1.0.0
 */
function pcw_enqueue_style() {
	wp_register_style( 'style', plugins_url( '/admin/css/style.css', __FILE__ ), array(), PCW_PLUGIN_VERSION );
	wp_enqueue_style( 'style' );

	wp_register_style( 'admin-style', plugins_url( '/admin/css/admin.css', __FILE__ ), array(), PCW_PLUGIN_VERSION );
	wp_enqueue_style( 'admin-style' );

	wp_register_style( 'responsive', plugins_url( '/admin/css/responsive.css', __FILE__ ), array(), PCW_PLUGIN_VERSION );
	wp_enqueue_style( 'responsive' );
}
add_action( 'init', 'pcw_enqueue_style' );

/**
 * Load Google Fonts.
 *
 * @since 1.0.0
 */
function pcw_add_google_fonts() {
	wp_enqueue_style( 'google_web_fonts', 'https://fonts.googleapis.com/css?family=Amaranth|Arvo|Bungee+Shade|Chango|Courgette|Great+Vibes|Josefin+Sans|Lato|Lobster|Marvel|Montserrat|Open+Sans|Oswald|Poppins|Raleway|Roboto|Salsa|Special+Elite|Titillium+Web|Trade+Winds', array(), PCW_PLUGIN_VERSION );
}
add_action( 'wp_enqueue_scripts', 'pcw_add_google_fonts' );

/**
 * Custom 'Settings' link.
 *
 * @since 1.0.0
 * @param array $links - Custom 'Settings' link.
 */
function pcw_settings_link( $links ) {
	$settings_link = '<a href="admin.php?page=pcw_slug">Settings</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

$plugin_path = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin_path", 'pcw_settings_link' );


/**
 * Load the language file.
 *
 * @since 1.0.0
 */
function load_plugin_product_category() {
	$domain  = 'product-category';
	$mo_file = WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . get_locale() . '.mo';

	load_textdomain( $domain, $mo_file );
	load_plugin_textdomain( $domain, false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}
add_action( 'init', 'load_plugin_product_category' );

/**
 * Added new GB category for Product Category.
 *
 * @param array $categories - Categories lists.
 * @since 1.5.0
 *
 * @return array
 */
function pcb_init_category( $categories ) {

	// Adding a new category.
	$categories[] = array(
		'slug'  => 'product-category-block',
		'title' => 'Product Category Block',
	);

	return $categories;
}
add_filter( 'block_categories_all', 'pcb_init_category' );

/**
 * Added new GB category for Product Category.
 *
 * @since 1.5.0
 */
function pcb_get_woo_categories() {

	$taxonomy     = 'product_cat';
	$orderby      = 'name';
	$show_count   = 0;
	$pad_counts   = 0;
	$hierarchical = 1;
	$title        = '';
	$empty        = 0;

	$args           = array(
		'taxonomy'     => $taxonomy,
		'orderby'      => $orderby,
		'show_count'   => $show_count,
		'pad_counts'   => $pad_counts,
		'hierarchical' => $hierarchical,
		'title_li'     => $title,
		'hide_empty'   => $empty,
	);
	$all_categories = get_categories( $args );
	wp_send_json( $all_categories );
	die;
}
add_action( 'wp_ajax_pcb_get_woo_categories', 'pcb_get_woo_categories' );
add_action( 'wp_ajax_nopriv_pcb_get_woo_categories', 'pcb_get_woo_categories' );

/**
 * Get attachment by filename.
 *
 * @param string $filename - File name.
 * @return WP_Post|null
 * @since 1.5.0
 */
function pcb_get_attachment_by_filename( $filename ) {
	$args = array(
		'post_type'      => 'attachment',
		'post_status'    => 'inherit',
		'meta_query'     => array(
			array(
				'key'     => '_wp_attached_file',
				'value'   => $filename,
				'compare' => 'LIKE',
			),
		),
		'posts_per_page' => 1,
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		return $query->posts[0];
	}

	return null;
}


/**
 * Admin Menus.
 *
 * @return void
 * @since 1.0.0
 */
function pcw_menu_page() {
	add_menu_page(
		__( 'product category', 'pcw' ),
		'Product Category',
		'edit_posts',
		'pcw_slug',
		'pcw_callback_function',
		'dashicons-category',
		60
	);
	add_submenu_page( 'pcw_slug', 'How to use?', 'How to use?', 'edit_posts', 'pcw_slug', 'pcw_callback_function' );
	add_submenu_page( 'pcw_slug', 'About Me', 'About', 'edit_posts', 'pcw_about', 'pcw_callback_function2' );
}
add_action( 'admin_menu', 'pcw_menu_page' );

/**
 * Callback function.
 *
 * @return void
 * @since 1.0.0
 */
function pcw_callback_function() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Unauthorized user' );
	}
	?>
	<div class="pcw-admin-content">
		<h1><?php echo esc_html( 'How to use?' ); ?></h1><br>
		<h2><?php echo esc_html( 'Four ways to use!' ); ?></h2>
		<div class="two-ways">
			<div class="tab">
				<button id="way1" class="tablinks" onclick="openTab(event, 'First')"><img src = "<?php echo esc_attr( plugins_url( '/images/siteorigin.svg', __FILE__ ) ); ?> " width="40px"><?php echo esc_html( 'Site Origin' ); ?></button>
				<button id="way2" class="tablinks" onclick="openTab(event, 'Second')"><img src = "<?php echo esc_attr( plugins_url( '/images/shortcode.svg', __FILE__ ) ); ?> " width="40px"><?php echo esc_html( 'Shortcode' ); ?></button>
				<button id="way3" class="tablinks" onclick="openTab(event, 'Third')"><img src = "<?php echo esc_attr( plugins_url( '/images/elementor.svg', __FILE__ ) ); ?> " width="40px"><?php echo esc_html( 'Elementor' ); ?></button>
				<button id="way4" class="tablinks" onclick="openTab(event, 'Fourth')"><img src = "<?php echo esc_attr( plugins_url( '/images/gutenberg.svg', __FILE__ ) ); ?> " width="40px"><?php echo esc_html( 'Gutenberg' ); ?></button>
			</div>
			<div id="First" class="tabcontent">
				<h3><?php echo esc_html( 'Using Product Category Widget in SiteOrigin' ); ?></h3>
				<p style="color: red;"><b><?php echo esc_html( 'Note: Required Site Origin Editor and Site Origin Widget Bundle!' ); ?></b></p>
				<ul class="right-content">
					<li>
						<span><?php echo esc_html( '1. Create New Page' ); ?></span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page1.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '2. Give name to that page (EX . Product Category)' ); ?></span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page2.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '3. Click on Add Widget Button (using of site origin editor)' ); ?></span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page3.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '4. In Search area type Product category, Select that widget' ); ?></span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page4.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '5. Click on Edit,' ); ?></span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page5.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '6. Finally Use it!' ); ?></span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page6.png', __FILE__ ) ); ?> ">
						<img class="img7" src = "<?php echo esc_attr( plugins_url( '/images/page7.png', __FILE__ ) ); ?> ">
						<img class="img8" src = "<?php echo esc_attr( plugins_url( '/images/page8.png', __FILE__ ) ); ?> ">
						<img src = "<?php echo esc_attr( plugins_url( '/images/page9.png', __FILE__ ) ); ?> ">
					</li>
				</ul>
			</div>

			<div id="Second" class="tabcontent">
				<h3>Using Shortcode</h3>
				<ul class="right-content">
					<li>
						<span><?php echo esc_html( 'The Full Shortcode see like this!' ); ?></span>
						<p style="color: red;"><b><?php echo esc_html( 'Copy this shortcode and use it!' ); ?></b></p>
						<div class="pre" id="short_code">
						<img onclick="CopyToClipboard('short_code')" class="icon" src = "<?php echo esc_attr( plugins_url( '/images/copy.png', __FILE__ ) ); ?> "></img>
						[PCW <b>number</b>="50" <b>columns</b>="5" <b>orderby</b>="name" <b>order</b>="ASC" <b>hide_empty</b>="1" <b>parent</b>="" <b>ids</b>="" <b>description</b>="false" <b>cat_image</b>="true" <b>font-size</b>="18px" <b>font-weight</b>="600" <b>font-family</b>="Josefin Sans" <b>letter-spacing</b>="2px" <b>color</b>="red"]
						</div>
						<p class="copied" style="margin: 0;"><?php echo esc_html( 'Copied' ); ?></p>
						<script>
						jQuery(".copied").css("display", "none");
						function CopyToClipboard(containerid) {
							if (document.selection) { 
								var range = document.body.createTextRange();
								range.moveToElementText(document.getElementById(containerid));
								range.select().createTextRange();
								document.execCommand("copy"); 
								jQuery(".copied").css("display", "none");
							} else if (window.getSelection) {
								var range = document.createRange();
								range.selectNode(document.getElementById(containerid));
								window.getSelection().addRange(range);
								document.execCommand("copy");
								//alert("text copied");
								jQuery(".copied").css("display", "inline-block");
							}}
						</script>
					</li>
					<li>
						<span><?php echo esc_html( 'All Shortcode Attributes' ); ?></span>
						<ol class="atts">
							<li><b>[</b> <?php echo esc_html( 'Number' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'This shortcode represents the number of categories.. ( EX. 10, 20, 30... )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Columns' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'This shortcode defines the number of columns categories are organized into. ( EX. 1, 2, 3, 4... max 6)' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Orderby' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'Set Orderby of Product categories as you want. ( EX. name, slug etc... )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Order' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'Set Order of Product categories like ascending or descending. ( EX. ASC, DESC. )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Hide_empty' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'This shortcode represents Set to 1 to hide categories with no products or 0 to show them ( EX. 0, 1. )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Parent' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'This shortcode represents Set to 0 to only display top-level categories. ( EX. null, 1. )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Ids' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'Enter Product category ids which you want to display. ( EX. 26, 31 etc... )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Description' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'Show & Hide Product category Description by value of true and false ( EX. true, false. )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Cat_Image' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'Show & Hide Product category Thumbnail image by value of true and false ( EX. true, false. )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Font-size' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'Set font size of product categories ( EX. 15px, 22px etc... )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Font-weight' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'Set font weight of product categories ( EX. 300, 600 etc... )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Font-family' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'Set font family of product categories ( EX. Arial, Montserrat etc... )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Letter-spacing' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'Set letter spacing of product categories ( EX. 1px, 3px etc... )' ); ?></p></br>

							<li><b>[</b> <?php echo esc_html( 'Color' ); ?> <b>]</b></li>
							<p><?php echo esc_html( 'Set color of product categories ( EX. red, yellow, blue etc... )' ); ?></p></br>
						</ol>
					</li>
				</ul>
			</div>

			<div id="Third" class="tabcontent">
				<h3><?php echo esc_html( 'Using Product Category Widget in Elementor' ); ?></h3>
				<p style="color: red;"><b><?php echo esc_html( 'Note: Required Elementor Editor.' ); ?></b></p>
				<ul class="right-content">
					<li>
						<span><?php echo esc_html( '1. Create New Page' ); ?></span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page1.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '2. Give name to that page (EX . Product Category)' ); ?></span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page10.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '3. Click on Edit with Elementor Button' ); ?></span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page11.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '4. In Search area type Product category, Select that widget' ); ?></span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page12.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '5. Finally Use it!' ); ?></span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page13.png', __FILE__ ) ); ?> ">
						<img src = "<?php echo esc_url( plugins_url( '/images/page14.png', __FILE__ ) ); ?> ">
					</li>
				</ul>
			</div>

			<div id="Fourth" class="tabcontent">
				<h3><?php echo esc_html( 'Using Gutenberg Block' ); ?></h3>
				<p style="color: red;"><b><?php echo esc_html( 'Note: Required Block Editor.' ); ?></b></p>
				<ul class="right-content">
					<li>
						<span><?php echo esc_html( '1. Create New Page' ); ?></span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page1.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '2. Give name to that page (EX . Product Category)' ); ?></span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page15.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '3. Click on Plus(+) Button' ); ?></span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page16.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '4. In Search area type Product Category Block, Select the Block' ); ?></span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page17.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span><?php echo esc_html( '5. Finally Use it with different settings!' ); ?></span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page18.png', __FILE__ ) ); ?> ">
					</li>
				</ul>
			</div>
		</div>
		<script type="text/javascript">
			function openTab(evt, cityName) {
			var i, tabcontent, tablinks;

			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}

			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}

			document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			document.getElementById("way1").click();
		</script>
	</div>
	<?php
}

/**
 * Admin Menus's function callback.
 *
 * @return void
 * @since 1.0.0
 */
function pcw_callback_function2() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Unauthorized user' );
	}
	?>
	<div class="pcw-admin-content-about">
		<div class="admin-about-text">
			<h1><?php echo esc_html( 'Welcome to Product Category 1.5' ); ?></h1>
			<p><?php echo esc_html( 'Design and Customize your product category page as per you need using multiple editors such as' ); ?> <strong>"<?php echo esc_html( 'SiteOrigin - Widget, Shortcode, Elementor - Widget, WP Page Bakery - Widget and Gutenberg Block' ); ?>"</strong> <?php echo esc_html( 'with Built-In different styles and settings.' ); ?><br><br>
				&#x25A3; <?php echo esc_html( 'Select and Set Categories' ); ?> <br>
				&#x25A3; <?php echo esc_html( 'Select font-size, font-weight, font-family, letter-spacing etc.' ); ?> <br>
				&#x25A3; <?php echo esc_html( 'Set Number of columns per row' ); ?> <br>
				&#x25A3; <?php echo esc_html( 'Set Number of Categories' ); ?> <br>
				&#x25A3; <?php echo esc_html( 'Set Order of Categories' ); ?> <br>
				&#x25A3; <?php echo esc_html( 'Set Colors and some styles' ); ?> <br>
				&#x25A3; <?php echo esc_html( 'Set Pagination' ); ?> <br>
				&#x25A3; <?php echo esc_html( 'Show & Hide the Category Thumbnail image' ); ?> <br>
				&#x25A3; <?php echo esc_html( 'Now, "Alt Tag" is available for the Category image' ); ?> <br>
				&#x25A3; <?php echo esc_html( 'Product category widget for Elementor' ); ?> <a href="admin.php?page=pcw_slug"><?php echo esc_html( 'Learn more' ); ?>..</a><br>
				&#x25A3; <strong><?php echo esc_html( 'New:' ); ?></strong> <?php echo esc_html( 'Gutenberg Product category block' ); ?> <a href="admin.php?page=pcw_slug"><?php echo esc_html( 'Learn more' ); ?>..</a><br>
			</p>
			<br>
		</div>
		<div class="admin-about-logo">
			<img src = "<?php echo esc_attr( plugins_url( '/images/logo.png', __FILE__ ) ); ?> ">
		</div>
		<div class="admin-about-wrap">
			<h2><?php echo esc_html( "What's New" ); ?></h2>
			<br>
			<span><?php echo esc_html( 'Introducing Product Category Block for Block Editor' ); ?></span>
			<div class="compatible-editor">
				<div class="editor-block">
					<img src = "<?php echo esc_attr( plugins_url( '/images/editor3.png', __FILE__ ) ); ?> ">
				</div>
				<div class="pcw-videos-container">
					<video id="pcw-video" width="520" height="300" controls autoplay>
						<source src="<?php echo esc_attr( plugins_url( '/images/pcw-video.webm', __FILE__ ) ); ?>" type="video/webm">
						<source src="<?php echo esc_attr( plugins_url( '/images/pcw-video.ogg', __FILE__ ) ); ?>" type="video/ogg">
						<?php echo esc_html( 'Your browser does not support the video tag.' ); ?>
					</video>
				</div>
			</div>
			<br>
		</div>
	</div>
	<script type="text/javascript">
		function pcwVideoPlay() {
			document.getElementById("pcw-video").play();
		}
		document.addEventListener("DOMContentLoaded", (event) => {
			setTimeout(pcwVideoPlay, 3000);
		});
	</script>
	<?php
}
