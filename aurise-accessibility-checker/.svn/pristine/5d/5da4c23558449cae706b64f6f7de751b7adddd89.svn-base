=== WebYes WP Accessibility Checker – Easily Discover ADA & WCAG Compliance Gaps ===
Contributors: webtoffee
Donate link: https://webyes.com/
Tags: accessible, a11y, wcag, ada, Section 508
Requires at least: 5.0.0
Tested up to: 6.6
Stable tag: 1.0.3
Requires PHP: 5.4
License: GPLv3 or higher
License URI: https://www.gnu.org/licenses/gpl-3.0.html

WebYes is an accessibility checker that helps WordPress site owners and developers improve their website’s accessibility. It scans your webpage and highlights WCAG and ADA violations directly on the frontend, making them easy to identify and fix.

== Description ==

WebYes is an **accessibility checker** that helps **WordPress** site owners and developers improve their website’s accessibility. It scans your webpage and highlights **WCAG** and **ADA** violations directly on the frontend, making them easy to identify and fix.

== Key Features ==

Here’s what the WebYes plugin can do:

- Highlights headings and flags incorrect heading order for better structure.
- Identifies elements with poor contrast and suggests improvements.
- Flags ambiguous links and encourages more descriptive alternatives.
- Detects input fields missing labels to ensure accessibility.
- Annotates images without alt text to enhance screen reader support.
- Simulates screen reader output by letting users hover over elements.

**Note:** The Screen Reader Wand (screen reader simulation) is an experimental feature and may not function perfectly at all times.

== Why Use the WebYes Plugin? ==

WebYes makes accessibility checks quick and easy. **It shows issues right on your website, so you know exactly where to make adjustments**.
To fix the issue, you can simply right-click the annotated element, select Inspect Element, and update the code or attributes. Everything is done right on your site - no need to switch to external tools or visit third-party web apps.

== Limitations and Advanced Solutions ==

The WebYes plugin highlights only the most common accessibility gaps. However, it should be noted that no automated tool, including WebYes, can identify every issue or fully guarantee compliance with ADA and WCAG standards.

For a **deeper accessibility audit**, try the [WebYes app](https://app.webyes.com/) - our advanced, free website audit and monitoring tool. The app evaluates your website against all WCAG guidelines, offering deeper and more comprehensive accessibility insights.

== Frequently Asked Questions ==

= How do I use it? =
Simply install/activate the plugin and view the frontend of your WordPress website! The widget will appear as a small, black block with a pair of white sunglasses fixed to the bottom-left of your browser. Click on the widget to open its menu for the different types of tools you can use.

= Who can see the testing widget? =
By default, the widget will only appear for WordPress administrators, so your site's viewers will not see the widget.

= How does it work? =
This plugin uses an accessibility visualization toolkit called [tota11y](https://blog.khanacademy.org/tota11y-an-accessibility-visualization-toolkit/).

= Can I turn it off if I don't have access to the plugin page? =
Yes! You can turn it on or off from the settings screen under **Settings > Accessibility Checker**. It is the first setting labled **Enabled**

= How can I enable this for my editors? =
On the settings screen under **Settings > Accessibility Checker**, you can edit the text field for **Allowed User Roles** to be something like `administrator,editor` to allow users with the editor role to see the widget when it's enabled. This also works for custom user roles too. The default value is set to `administrator` and is inclusive of super admins for multisite installations.

= How can I make it so it's only enabled if `WP_DEBUG` is set to true? =
On the settings screen under **Settings > Accessibility Checker**, simply toggle the setting for **Debug Mode** to on and save your settings.

= Can I set these settings using constant variables in my wp-config.php? =
Yes! Whether you want to force all websites in a multisite installation to use the same settings or easily push settings from one installation to another, you can do so with these constant variables.


    define('AURISE_ACCESSIBILITY_CHECKER_ENABLED', true); // Display the widget for allowed roles
    define('AURISE_ACCESSIBILITY_CHECKER_ALLOWED_ROLES', 'administrator'); // Comma-separated list of user roles allowed to see the widget
    define('AURISE_ACCESSIBILITY_CHECKER_DEBUG_MODE', true); // If true, only show the widget to the allowed user roles when WP_DEBUG is also set to true

= Does WebYes guarantee full ADA and WCAG compliance? =
While WebYes identifies many common accessibility gaps, complete compliance may require additional manual checks beyond automated tools.

= How do I fix the issues detected by WebYes? =
Right-click on the annotated elements, select **Inspect Element**, and adjust the code or attributes to resolve the issue directly on your website.

= Will the plugin slow down my website? =
No, WebYes does not load anything on the frontend for your website visitors, ensuring it has zero impact on your site’s speed or performance.

== Installation ==

There are three (3) ways to install my plugin: automatically, upload, or manually.

= Install Method 1: Automatic Installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don't need to leave your web browser.

1. Log in to your WordPress dashboard.
1. Navigate to **Plugins > Add New**.
1. Where it says "Keyword" in a dropdown, change it to "Author"
1. In the search form, type `TessaWatkinsLLC` (results may begin populating as you type but my plugins will only show when the full name is there)
1. Once you've found my plugin in the search results that appear, click the **Install Now** button and wait for the installation process to complete.
1. Once the installation process is completed, click the **Activate** button to activate it.

= Install Method 2: Upload via WordPress Admin =

This method involves is a little more involved. You don't need to leave your web browser, but you'll need to download and then upload the files yourself.

1. [Download my plugin](https://wordpress.org/plugins/aurise-accessibility-checker/) from WordPress.org; it will be in the form of a zip file.
1. Log in to your WordPress dashboard.
1. Navigate to **Plugins > Add New**.
1. Click the **Upload Plugin** button at the top of the screen.
1. Select the zip file from your local file system that was downloaded in step 1.
1. Click the **Install Now** button and wait for the installation process to complete.
1. Once the installation process is completed, click the **Activate** button to activate it.

= Install Method 3: Manual Installation =

This method is the most involved as it requires you to be familiar with the process of transferring files using an SFTP client.

1. [Download my plugin](https://wordpress.org/plugins/aurise-accessibility-checker/) from WordPress.org; it will be in the form of a zip file.
1. Unzip the contents; you should have a single folder named `aurise-accessibility-checker`.
1. Connect to your WordPress server with your favorite SFTP client.
1. Copy the folder from step 2 to the `/wp-content/plugins/` folder in your WordPress directory. Once the folder and all of its files are there, installation is complete.
1. Now log in to your WordPress dashboard.
1. Navigate to **Plugins > Installed Plugins**. You should now see my plugin in your list.
1. Click the **Activate** button under my plugin to activate it.

== Screenshots ==

1. Close-up of the tota11y widget
2. Screenshot of author's homepage with a red arrow drawn over to point to the widget fixed to the bottom left of the browser window
3. Screenshot of the author's homepage with the tota11y widget menu opened showing the available features to test: headings, contrast, link text, labels, image alt-text, landmarks and screen reader wand (experimental)
4. Screenshot of the author's homepage with the headings feature enabled. The screenshot is annotated with a red circle over the headings option in the menu showing it is checked and red arrows pointing to the headings summary along with the display of headings on the page itself that match the indented list in the summary tab.
5. Screenshot of the author's homepage with the contrast feature enabled. The screenshot is annotated with a red circle over the contrast option in the menu showing it is checked and red arrows pointing to the contrast ratio calcuations that appear around various elements. A calcuation in green shows that it passes validation while one in red shows it fails.
6. Screenshot of the author's homepage with the landmarks feature enabled. The screenshot is annotated with a red circle over the landmarks option in the menu showing it is checked and red circles around the yellow labels displaying landmarks discovered on the webpage.
7. An animated GIF image showing the author's homepage with the screen reader wand enabled. The looping GIF image shows a cursor moving around the page, showing how a blue box highlights various elements on the page while it also displays the screen-reader friendly text from that element in the bottom right box.
8. Screenshot of the settings screen in the WordPress backend. It shows the default settings where "Enabled" is turned on, "Allowed User Roles" is set to "administrator" and "Debug Mode" is turned off.

== Upgrade Notice ==

= 1.0.3 =

Important Update: Aurise Accessibility Checker is Now WebYes WP Accessibility Checker!

What This Means for You:

No Action Required – All your settings and data will remain exactly as they are.
Improved Features and Support – As WebYes WP Accessibility Checker, we’re dedicated to bringing new enhancements and faster support to ensure your website’s accessibility compliance.
Same Great Functionality – The plugin will work just as you expect, with no disruptions.


== Changelog ==

= 1.0.3 =
**Release Date: November 6, 2024**
* Minor UI optimizations.

= 1.0.2 =
**Release Date: August 31, 2024**

* Marked compatible with WordPress core 6.6.
* Updated tota11y's broken link to one that isn't broken.

= 1.0.1 =
**Release Date: April 20, 2024**

* Update: Utilized the new feature to defer load the script in the footer.
* Marked compatible with WordPress core 6.5.

= 1.0.0 =
**Release Date: February 15, 2023**

* First release to the official WordPress plugin repository!