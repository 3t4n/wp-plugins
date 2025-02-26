=== Advanced Custom Fields: Shopify Collection Field ===
Contributors: Aaron Warner
Tags: Shopify, Advanced Custom Fields, ACF
Requires at least: 3.6.0
Tested up to: 4.9.0
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This ACF field will let you select a collection from your Shopify Store. Useful for building a site shared between Wordpress and Shopify.

== Description ==

This ACF field will let you select a collection from your Shopify Store. Useful for building a site shared between Wordpress and Shopify.

Before use make sure you have guzzle installed within your WordPress theme.
See: http://docs.guzzlephp.org/en/stable/overview.html

Once the ACF field has been added, the Shopify store details have been given, and a collection has been selected you will then be able to access the collections ID when get_field('NAME_OF_FIELD') is called.

1. Open the WordPress file where you'd like to make use of the selected Shopify collection (front-page.php for example).
2. Store the collection ID into a variable by calling get_field('NAME_OF_FIELD'); In this case we'll use $selected_collection_id as our variable name;
1. Store the return of get_field_object('NAME_OF_FIELD'); into a variable. In this case lets use $selected_collection_field as our variable name.
2. Store the Shopify store base URL into a variable by calling $base_url = $selected_collection_field['shopify_store_base_url'];
3. Store the Shopify API Password into a variable by calling $api_pw = $selected_collection_field['shopify_store_api_pw'];

You can then use this ID, base URL and API paassword to make API requests to your store in whichever way you wish.
Some good examples of useage are:

- Display a block links on your WordPress homepage with the collection title and image
- Display the most recent/popular products from a selected collection on your WordPress site
- Display products from a particular collection on a related WordPress blog post

= Compatibility =

This ACF field type is compatible with:
* ACF 5

== Installation ==

1. Copy the `acf-shopify-collection` folder into your `wp-content/plugins` folder
2. Activate the Shopify Collection plugin via the plugins admin page
3. Create a new field via ACF and select the Shopify Collection type
4. Read the description above for usage instructions

== Changelog ==

= 1.0.0 =
* Initial Release.