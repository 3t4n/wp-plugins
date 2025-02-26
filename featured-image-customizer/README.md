### Featured Image Customizer

Contributors: krasenslavov
Donate Link: https://krasenslavov.com/hire-krasen/
Tags: featured image, customizer, custom featured images, Gutenberg, multisite
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.2
Stable tag: 1.0.8
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Generate and create custom featured images on the fly with 100+ brand logos.

## DESCRIPTION

Generate and create custom featured images on the fly with 100+ brand logos.

_Featured Image Customizer_ is a utility plugin that can help you generate and create custom featured images on the fly from over 100+ brand logos.

Currently, the plugin has only one available layout, `logo + logo,` and you can select background color, but we will add more templates soon.

https://www.youtube.com/embed/djjQ0rd90U4

## USAGE

The process is simple. All you need to do is:

1. click on the **New featured image** button
2. select _brand logs_ (from the list with available ones) + _Conjunction_
3. select the background color for your featured image
4. preview and set your newly generated featured images

All custom featured images are created following WordPress standard way; & are available on the _Media Library_ page + have all the thumbnails generated along with them.

In addition, you can go to **Settings > Media** page manage plugin available options.

You can always contact us and use the plugin [**Support Tab**](https://wordpress.org/support/plugin/featured-image-customizer/) for additional help.

## FEATURES

The features for the plugin are somewhat limited at this moment, but it is fully functional, and you can still use it to generate custom featured images with brand logos and icons.

* You can select _Logo 1 + Conjunction + Logo 2_ and generate custom featured images with user-selected backgrounds.
* It works on both **Classic and Gutenberg** block editors.
* It has support and is tested with **WordPress multisite**.
* All featured images follow the standard WordPress method, _have thumbnails and are visible in the Media Library_.

**Available Social & Brand Logos**

[See all available social & brand logos!](https://krasenslavov.com/wp-content/uploads/sites/3/2022/01/logos-alpha-0.1.png)

**Advanced Options**

_Currently, all advanced options are pre-defined and cannot be modified. Once we get out of the alpha version, we will enable and implement them._

Below is the list with all the pre-defined and static options.

* Source - _Self-hosted API_
* File Name - _generated using the post slug_
* Canvas - _800x600px_
* Logo(s) Size - _150x150px_
* Font Family (conjunction) - _Fira Code_
* Font Size (conjunction) - _64px_

**User Settings**

The plugin doesn't have its dedicated settings page, but you can go **Settings > Media** and scroll down the page to see all the available options.

* You can _enable/disable_ where you can use the plugin; available types are _Posts & Pages_.
* You can also remove all the locally stored brand and icon images from your server by confirming the action. **This will NOT delete any of the previously generated featured photos.**

## DETAILED DOCUMENTATION

Additional information with step-by-step setup, usage, demos, and support can be found on the [**Krasen Slavov**](https://krasenslavov.com/) website.

## FEATURED IMAGE CUSTOMIZER PRO

As of yet, this plugin doesn't have a commercial version available.

## FREQUENTLY ASKED QUESTIONS

Use the [**Support Tab**](https://wordpress.org/support/plugin/featured-image-customizer/) on this page to post your requests and questions.

All tickets are usually addressed within 24 hours.

If your request is an add-on feature, we will add it to the plugin wish-list and consider implementing it in the next major version.

### Does it work on Gutenberg?

The **Featured Image** button is available on Classic and Guttenberg Block editors inside the featured image meta box.

### Does it support Custom Post Types?

No, at the moment, the plugin only supports Posts and Pages, which can be managed within the  **Settings > Media** page.

_However, We plan to add CPT & WooCommerce support soon._

### Can we make Advanced Options dynamic?

We plan to have a different layout in our subsequent releases of the plugin (not only the `logo + logo` default template).

Once we clear all the layouts, we will start to enable some of the advanced options and make them dynamic so you can additionally customize your featured images.

### Does it support multisite?

Yes, the plugin is tested and works on WordPress multisite.

### Do you store any files locally?

All brand logos are loaded from 3rd party API. We store the logos you use most on your server locally to save bandwidth.

You have the option to delete all locally store files manually at any time by going to **Settings > Media** and scrolling down to the **Feature Image Customizer** settings.

### Can you add new logos by request?

Yes, please use our contact form on the [**Krasen Slavov**](https://krasenslavov.com/) website.

We also have in store many more logos that will be added in the future versions of the plugin.

### Do you offer additional support if I encounter any issues?

Yes, you can contact us by using the contact form @ [**Krasen Slavov**](https://krasenslavov.com/) website.

## SCREENSHOTS

1. screenshot-1.(png)
2. screenshot-2.(png)
3. screenshot-3.(png)
4. screenshot-4.(png)
4. screenshot-5.(png)

## INSTALLATION

The plugin installation process is standard and easy to follow. Please let us know if you have any difficulties with the installation.

= Standard Installation =

1. Visit **Plugins > Add New**.
2. Search for **Featured Image Customizer**.
3. Install and activate the **Featured Image Customizer** plugin.

= Manual Installation =

1. Upload the entire `featured-image-customizer` directory to the `/wp-content/plugins/` directory.
2. Visit **Plugins**.
3. Activate the **Featured Image Customizer** plugin.

= After Activation =

1. Click on the **Settings** link on the main Plugin page or go to **Featured Image Customizer** from the main Admin menu.

## CHANGELOG

= 1.0.8 =

- Update - Performance and optimization compatibility

= 1.0.7 =

- Update - Update `.fic-notice` styles
- Update - Re-arrange the plugin options secton under Media
- Update - Point `fic_rating_notice_dismiss` to the plugin options page
- Fix - Enable New Featured Image in the classic editor
- Fix - Minor typos and text changes

= 1.0.6 =

- New - Revisit `/assets` folder and change the structure for `dev/dist` scripts and styles 
- Fix - `file_get_contents()` is discouraged. Use `wp_remote_get()` for remote URLs instead.

= 1.0.5 =

- Update - Compatibility check with WordPress 6.7
- Update - Compatibility check with PHP 8.3
- Update - Language file (.pot) header text
- Update - Change license files to use GPLv3
- Fix - `json_encode()` is discouraged. Use `wp_json_encode()` instead
- Fix -  Use isset() or empty() to check the index exists before using it
- Fix - Not unslashed before sanitization. Use wp_unslash() or similar
- Fix - All output should be run through an escaping function (see the Security sections in the WordPress Developer Handbooks)

= 1.0.0 =

- New - Realease for the first stable version.

= 0.2.0 =

- New - Added 100 mixed logos and icons with size 150x150px
- New - Enabled user-defined custom background selection for feature images
- Fix - Get rid of the Clearbit API and start using our API
- Fix - Fixed `Settings > Media` error when nothing is selected

= 0.1.0 =

- New - Initial release (beta) and first commit into the WordPress.org SVN.

## UPGRADE NOTICE

_None_