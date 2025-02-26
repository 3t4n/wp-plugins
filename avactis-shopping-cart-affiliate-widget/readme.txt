=== Plugin Name ===
Contributors: avactis
Tags: SEO friendly shopping cart, ecommerce, e-commerce, shopping cart, affiliate, affiliate widget, store, estore, shop, webshop, wordperss ecommerce, online shop, Paypal shopping cart, sell digital products
Requires at least: 2.0.2
Tested up to: 3.5.1
Stable tag: 1.5

The extension Avactis Shopping Cart Widget for WordPress allows you integrate your online store to your blog.

== Description ==

The extension Avactis Shopping Cart Widget for WordPress allows you integrate your online store to your blog.

We have tried to make installing as easy and trouble-free as possible. However, if you wish to report a problem or need assistance with installing or using this extension, please contact our technical support department:

http://www.avactis.com/contact-avactis-support
== Installation ==

Follow these steps to install "Widget for WordPress" extension to your Avactis store:

*Avactis integration instructions*

1. Create a new folder on your computer.

2. Extract the contents of avactis-shopping-cart-affiliate-widget.1.5.zip archive to the 
   new folder. 
   
3. In the new folder, you will find "files_for_Avactis.zip", extract it. You will see:
       * "avactis-themes" folder
       * "patches" folder
   
   The folder named "patches" contains a "wp_support.patch" patch for your 
   Avactis store's system files.
   
   The folder "avactis-themes" contains the new skin for Avactis storefront which will be 
   shown inside your Wordpress site.
   
4. Launch your favorite FTP client application and connect to the site
   running your Avactis store.

5. Open "avactis-themes" folder on the remote site.

6. Copy the "wp" folder from your computer (it is located within 
   "avactis-themes" folder) to the remote "avactis-themes" folder.
   When done, you should see the "wp" folder inside the
   "avactis-themes" folder on the remote site. 
   
7. Copy the file "wp_support.patch" from your computer (it is located
   within "patches" folder) to your remote site inside Avactis store's root folder 
   (where "avactis-system" and "avactis-themes" folders are located).
   
8. Then you should apply this uploaded patch. To perform this operation, you can use 
   the utility "patch" (http://ftp.gnu.org/gnu/patch/). It is available by default
   on most Unix and Linux servers. To run the patch command, either connect
   to the site via SSH, or use the PHPShell script (http://phpshell.sf.net/).

   Note: Place PHPShell script in the root of your Avactis store.

   8.1. To verify the correctness of the patch you need to run the utility 
        with the --dry-run key (which prevents any actual modifications):
 
        patch -p0 --dry-run -i wp_support.patch

        If you see error messages at this step, and are unsure how to fix it,
        please contact our technical support department:

        https://www.avactis.com/support.php

   8.2. If there are no errors during the dry run, you can safely run the command
        that performs actual file modifications:

        patch -p0 -i wp_support.patch
   
*WordPress integration instructions*

1. Open your WordPress admin zone and install the Avactis module there.

   Visit the WordPress admin zone -> "Plugins" and click the "Add new" button.
   Enter the keyword "Avactis" and click the "Search Plugins" button.

   You will see "Avactis Shopping Cart Widget" in the list.

   Click the "Install now" link to start the installation process.

2. Configure the Avactis module

   Visit the WordPress admin zone -> "Plugins" and click the "Settings" link in the 
   "Avactis Shopping Cart Widget" section.

   Enter the path to Avactis Shopping Cart (e.g. http://example.com/store) and the iFrame width 
   in pixels (760 is the default value) in the module settings and save your results.

3. Place the widget anywhere on your WordPress blog

   Open any WordPress page, switch the editor to HTML source mode and add the tag 
   "[Avactis shopping cart]" to the page where you want your online store. 
   Save your results.

   WordPress configuration is complete.

   If there are problems, please contact our technical support department: https://www.avactis.com/support.php

== Screenshots ==

1. Easy integration into existing Wordpress website
2. Easy integration into existing Wordpress design theme
3. Configuration screen
4. Configuration screen
5. Configuration screen

== Changelog ==

= 1.5 =
* Code and documentation improved

= 1.4 =
* Avactis integration was significantly improved

= 1.3 =
* Horizontal and Vertical layout options added
* Affiliate module improvements
* Code and documentation improvements

= 1.2 =
* Integration files for Avactis ('widget.js', 'widget.js.php' and '/widget') were added to this package
* Documentation improvements

= 1.1 =
* Affiliate function
* Support for Avactis 1.9.0 affiliate module
