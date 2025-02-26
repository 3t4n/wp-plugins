### Media Library Recovery - Restore Lost Image Files

Contributors: krasenslavov, developry
Donate Link: https://krasenslavov.com/hire-krasen/
Tags: media, media library, recovery, uploads, restore
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.2
Stable tag: 1.6.3
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

A tool to restore and recover images from your `wp-content/uploads` folder after database resets or failures, ensuring your media library is rebuilt quickly.

## DESCRIPTION

A tool to restore and recover images from your `wp-content/uploads` folder after database resets or failures, ensuring your media library is rebuilt quickly.

https://www.youtube.com/embed/JRsaCsaF-k4

[**Media Library Recovery**](https://bit.ly/3IHRaTb) helps restore existing image files from the uploads folder and reinsert them into the WordPress database properly.

You can recover individual image files or use the filters and navigation in the custom **Media Explorer** to streamline the process.

## USAGE

Once the plugin is uploaded and activated:

1. Navigate to **Media > Media Recovery** in the main menu to open the **Media Explorer**.
2. Use the options to show or hide existing image files already found in your server and database.

Here are the steps to use [**Media Library Recovery**](https://bit.ly/3IHRaTb):

1. Open the **Media Explorer**.
2. Select the image files you want to recover.
3. Click the **Media Recovery...** button and wait for the images to rebuild.
4. Go to **Media > Media Recovery** to confirm the images were recovered successfully.

**Note:** The plugin **does not upload or overwrite any images on the server**. It only scans for image files in the default WordPress uploads folder.

## FEATURES & LIMITATIONS

The [**Media Library Recovery**](https://bit.ly/3IHRaTb) plugin allows you to:

- Restore and recover images after database failure or reset if the files are still on your server.
- Quickly rebuild your Media Library with the custom **Media Explorer**.
- Hide existing image files already in the Media Library.
- Display unique icons for **existing**, **recoverable**, **selected**, and **unavailable** image files for easy recovery management.

### Known Issues and Limitations

- Original image files with dimensions in their file names (e.g., `icon-128x128.png`) won't appear in the Media Explorer.
- You can recover a maximum of **10 images** at a time.
- Image file sizes must not exceed **2MB** to avoid exceeding the `max_execution_time` on most servers.

## DETAILED DOCUMENTATION

Find step-by-step setup guides, usage instructions, demos, videos, and insights on the [**Media Library Recovery Pro**](https://mediarecoveryplugin.com/help) page.

## MEDIA LIBRARY RECOVERY PRO

If you're using the free version from WordPress.org and want Pro features, you can purchase the premium version on the [**Media Library Recovery Pro**](https://bit.ly/3IHRaTb) website.

Here are some features included in the Pro version:

- Support for **all media types**, not just images.
- Customize the default `wp-content/uploads` path.
- Recover **unlimited files** at once.
- **WordPress Multisite** compatibility.
- Built-in **uploads backup folder** feature.
- Enhanced performance for managing larger files and faster recovery.
- Pro media file explorer with advanced **search, filter, and sort** options.
- **Priority support** and updates for one year.

## FREQUENTLY ASKED QUESTIONS

Visit the [**Support**](https://wordpress.org/support/plugin/wp-media-recovery/) page to share your questions or requests.

We usually respond to tickets within a few days.

Feature requests are added to our wish list and considered for future updates.

### Will I get duplicate files?

No, the plugin won't duplicate or overwrite existing image files.

### Does it work with WordPress Multisite?

The free version doesn't support WordPress Multisite. For multisite compatibility, check out [**Media Library Recovery Pro**](https://bit.ly/3IHRaTb).

### Which folders are scanned for lost media?

The free version scans only the default `wp-content/uploads` folder. To scan custom upload folders, use [**Media Library Recovery Pro**](https://bit.ly/3IHRaTb).

### Can I recover all media files?

The free version only restores and rebuilds images. For support with more file types, check out [**Media Library Recovery Pro**](https://bit.ly/3IHRaTb).

### Do you offer additional support or customization?

Yes, feel free to send your request via the [**Media Library Recovery Pro**](https://bit.ly/3IHRaTb) website.

## SCREENSHOTS

Below are screenshots showing how to access and use the plugin in WordPress.

1. screenshot-1.(png)
2. screenshot-2.(png)
3. screenshot-3.(png)
4. screenshot-4.(png)
5. screenshot-5.(png)

## INSTALLATION

The plugin installation is easy and straightforward. Let us know if you run into any issues.

= Installation from WordPress =

1. Go to **Plugins > Add New**.
2. Search for **Media Library Recovery**.
3. Install and activate the plugin.
4. Click **Settings** or go to **Media Recovery** in the menu.

= Manual Installation =

1. Upload the `wp-media-recovery` folder to `/wp-content/plugins/`.
2. Go to **Plugins**.
3. Activate the **Media Library Recovery** plugin.
4. Click **Settings** or navigate to **Media Recovery** in the menu.

= After Activation =

1. Select the images to recover and click **Media Recovery...**.
2. Go to **Media > Library** to view the restored images.

## CHANGELOG

= 1.6.3 =

- Update - Development env setup and CSS assets updates

= 1.6.2 =

- Update - Revise all plugin text and translators
- Update - Replace all `str_replace( '\\', '/', '')` with `wp_normalize_path()`
- Fix - CSS adjustments and fixes

= 1.6.1 =

- Update - Performance and optimization compatibility

= 1.6.0 =

- New - Add compact mode toggle under settings option
- Update - Compatibility check with WordPress 6.7
- Update - Language file (.pot)
- Update - Language file (.pot) header text
- Update - Change license files to use GPLv3

**Check out the complete changelog on our [**Media Library Recovery**](https://bit.ly/3IHRaTb) website.**

## UPGRADE NOTICE

Upgrade to [**Media Library Recovery Pro**](https://bit.ly/3IHRaTb) for advanced features, unlimited recovery, and priority support!
