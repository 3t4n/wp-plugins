# Degree of Difficulty for Sensei

Contributors: opendsi
Tags: sensei, lms, course, difficulty, tags, sensei
Requires at least: 3.9
Tested up to: 4.8.2
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Sensei LMS add-on to set and display the degree of difficulty of a course.

## Description

Courses will have a new tag to set their Degree of Difficulty. You can choose between 3 predefined options: Beginner, Intermediate and Advanced.
You can add, edit or remove your own degrees of difficulty by going to "Courses > Degrees of Difficulty" from the menu.

Upload and display an image (or icons, pictograms) for your degree of difficulty (thanks to John James Jacoby and his [WP Term Images](https://wordpress.org/plugins/wp-term-images/) plugin!).

Degrees of Difficulty can be displayed by your theme using the `dds_get_sensei_course_degrees_of_difficulty()` function.


## Installation

Installing "Degree of Difficulty for Sensei" can be done either by searching for "Degree of Difficulty for Sensei" via the "Plugins > Add New" screen in your WordPress dashboard, or by using the following steps:

1. Download the plugin via WordPress.org
2. Upload the ZIP file through the 'Plugins > Add New > Upload' screen in your WordPress dashboard
3. Activate the plugin through the 'Plugins' menu in WordPress


## Screenshots

1. Degree of Difficulty icons displayed next to the WooCommerce course product price.
2. Degree of Difficulty tooltip displayed when hovering the icon.
3. Degrees of Difficulty administration screen.
4. Edit a Degree of Difficulty.
5. Add a Degree of Difficulty to your Sensei course.


## Frequently Asked Questions

### Does this plugin depend on any others?

Yes. It depends on the [Sensei](https://woocommerce.com/products/sensei/) LMS plugin.


### Does this create new database tables?

No. There are no new database tables with this plugin.


### Does this load additional JS or CSS files ?

Yes. It loads the `term-image.css` and `term-image.js` files on the admin screens related to Degree of Difficulty.
Those files are loaded by the WP Term Images plugin which comes included.


### Can I add an icon to my degree of difficulty?

Yes. Click on the "Choose Image" button when adding or editing a Degree of Difficulty.

Sample icons are available in the `assets/images/` plugin folder.


### How do I display the degree of difficulty of a course?

The plugin comes with an helper function named `dds_get_sensei_course_degree_of_difficulty()`.
It accepts a Sensei course ID or a WooCommerce product ID as first argument.

Choose where you would like to display degrees of difficulty and make use of that function in your theme's `functions.php` file.
Here is a complete example to display the degree of difficulty next to the WooCommerce product price:

```php
/**
 * WooCommerce template:
 * Add Sensei course degree(s) of difficulty
 *
 * @uses dds_get_sensei_course_degrees_of_difficulty()
 */
function mytheme_woocommerce_sensei_course_degrees_of_difficulty() {
	global $product;

	// Check product has a Sensei course.
	// Get Sensei course where WooCommerce product ID === course_woocommerce_product.
	$product_id = $product->get_id();

	if ( ! function_exists( 'dds_get_sensei_course_degrees_of_difficulty' ) ) {
		return;
	}

	$is_woocommerce_product = true;

	/**
	 * Our course degrees of difficulty.
	 *
	 * @var array Array of arrays. Degree of difficulty array will provide id, name, slug & image_url.
	 */
	$degrees_of_difficulty = dds_get_sensei_course_degrees_of_difficulty( $product_id, $is_woocommerce_product );

	if ( ! $degrees_of_difficulty ) {
		return;
	}

	foreach ( (array) $degrees_of_difficulty as $difficulty ) {

		$classes = 'mytheme-difficulty ' . $difficulty['slug'];

		$title = 'Degree of Difficulty: ' . $difficulty['name'];
		?>
		<span class="mytheme-difficulty-wrapper">
			<span class="<?php esc_attr_e( $classes ); ?>" title="<?php esc_attr_e( $title ); ?>">
				<?php if ( $difficulty['image_url'] ) : ?>
					<img src="<?php esc_attr_e( $difficulty['image_url'] ); ?>" alt="<?php esc_attr_e( $title ); ?>" />
				<?php else : ?>
					<?php esc_html_e( $difficulty['name'] ); ?>
				<?php endif; ?>
			</span>
		</span>
		<?php
	}
}

/**
 * Add Sensei course degree(s) of difficulty after product price.
 *
 * woocommerce_template_single_price hook has priority 10
 */
add_action( 'woocommerce_single_product_summary', 'mytheme_woocommerce_sensei_course_degrees_of_difficulty', 15 );

/**
 * Add Sensei course degree(s) of difficulty after product price.
 *
 * woocommerce_template_loop_price hook has priority 10
 */
add_action( 'woocommerce_after_shop_loop_item_title', 'mytheme_woocommerce_sensei_course_degrees_of_difficulty', 15 );
```


### Is the plugin translated?

Yes. It is translated in French (fr_FR).
You will find the translation files in the `lang/` folder.
New translations are welcome at https://translate.wordpress.org/projects/wp-plugins/degree-of-difficulty-for-sensei


### Where can I get support?

https://wordpress.org/support/plugin/degree-of-difficulty-for-sensei/


## Changelog

### 1.0.1

* 2017-10-09
* Fix Add dds_ prefix to WP Term Images functions in case plugin already installed.
* Fix Add DDS_ prefix to WP Term Images classes in case plugin already installed.
* Dynamic slug Degree_of_Difficulty_for_Sensei()->slug in degree-of-difficulty-for-sensei-functions.php
* Add 2 new icon sets in assets/images/

### 1.0.0

* 2017-09-25
* Initial release
