# Add multiple products to cart via url for Woocommerce #
**Contributors:** alvsconcelos  
**Donate link:** https://www.paypal.com/donate/?hosted_button_id=UUF8HHCVQNG6G  
**Tags:** woocommerce, cart, products, add-to-cart, url  
**Requires at least:** 5.0  
**Tested up to:** 6.7.1  
**Requires PHP:** 7.4  
**Stable tag:** 1.0  
**License:** GPLv3 or later  
**License URI:** https://www.gnu.org/licenses/gpl-3.0.html  

Add multiple products to WooCommerce cart with native add-to-cart parameters.

## Description ##

This plugin allows adding multiple **simple** (not variable or grouped) products to the WooCommerce cart using URL parameters. While WooCommerce natively supports adding a single product to the cart via a URL parameter like `add-to-cart=product_id&quantity=quantity`, this plugin extends that functionality to support multiple products in a single URL.

### How it works:
- **URL Format:** `?add-to-cart=product_id:quantity,product_id:quantity,product_id:quantity`
- **Single Quantity:** If the quantity is not specified (eg. `?add-to-cart=product_id,product_id:quantity`), the product is added with a quantity of 1.

### Examples:
- Adding multiple products with specific quantities:
`example.com/cart/?add-to-cart=12:2,34:1,56:5`
- Adding multiple products with default quantity:
`example.com/cart/?add-to-cart=12,34:2,56`

## Installation ##

This section describes how to install the plugin and get it working.

1. Upload `add-multiple-product-wc-cart.zip` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Use the provided URL format to add multiple products to the cart.

## Frequently Asked Questions ##

### How do I add multiple products to the cart? ###

Use the URL format: `?add-to-cart=product_id:quantity,product_id:quantity`

### What happens if I don't specify a quantity? ###

If no quantity is specified, the product will be added with a quantity of 1.

## Screenshots ##

### 1. Example of URL format with multiple products. ###
![Example of URL format with multiple products.](http://ps.w.org/add-multiple-products-to-cart-via-url-for-woocommerce/assets/screenshot-1.png)


## Changelog ##

### 1.0 ###
* Initial release.

## Upgrade Notice ##

### 1.0 ###
Initial release of the plugin. Adds support for adding multiple **simple** (not variable or grouped) products to the WooCommerce cart via URL parameters.
