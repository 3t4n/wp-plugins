=== Plugin Name ===
Contributors: Submone
Tags: ad, ads, advertisement, affiliate, affiliate marketing, amazon, ecommerce, internet-marketing, link, links, marketing, monetization, revenue, shortcode, matt wolfe
Requires at least: 3.0
Tested up to: 3.7.1
Stable tag: 1.1
Version: 1.1

Pull data from any Amazon product page using only the product's ASIN number and automatically embed your amazon affiliate link.

== Description ==

Pull the title, author, description, and image from any Amazon product page using only the product's ASIN number. Simply place a small shortcode on a page or post with the Amazon ASIN and this plugin will pull in all of the data from Amazon. The plugin will automatically embed your amazon affiliate link in to the image and the title of the product. This makes it very simple to easily promote Amazon products on your blog.

Now with support for Amazon in 6 countries (US, Canada, UK, Germany, France, Japan).

== Installation ==

1. Upload the `amazon-plugin` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Click on the "Amazon Scraper" link in the left sidebar of your WordPress dashboard
4. Enter your Amazon API key from aws.amazon.com
5. Enter your Amazon secret key from aws.amazon.com
6. Enter your amazon associate ID
7. Choose the country you are promoting Amazon products for
8. Use the shortcode [azr-link asin="AMAZON ASIN #"] anywhere on your blog (replace AMAZON ASIN with the actual ASIN)
9. Make your page or post live and look at all the info it pulled in

== Frequently Asked Questions ==

= Where do I get an Amazon API and secret key? =

There's no cost to get an Amazon API key. Simply go to http://aws.amazon.com and register for security credentials.

= What is the shortcode to display Amazon data? =

Use this shortcode: [azr-link asin="AMAZON ASIN #"] - Obviously replace AMAZON ASIN # with the ASIN number of the product you are promoting.

= Where do I find an Amazon ASIN #? =

Scroll down the Amazon product page until you see "product details". The ASIN number should be listed there. If you are promoting a print book, you can use the ISBN-10 number instead of the ASIN number.

= What if the data isn't displaying when I save the post? =

This is most commonly caused by invalid API keys or secret keys. Please double check the keys that you used… If that's not the problem, please double check that you've entered the shortcode correctly.

== Changelog ==

= 1.1 =
* Add the ability to select country (US, Canada, UK, Germany, France, Japan).
* Fixed "Missing Argument" error that some users were seeing.
* Validates whether server has proper SOAP extensions before allowing plugin use.
