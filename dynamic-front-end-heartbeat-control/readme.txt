Dynamic Front-End Heartbeat Control
Requires at least: 5.5
Tested up to:      6.7
Requires PHP:      7.2
Stable tag:        1.2.9
License:           GPLv2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Tags:              performance, heartbeat, site health


An enhanced solution to optimize the performance of your WordPress website and automatically achieve the best Heartbeat API values.
 
== Description ==

Stabilize your website's load averages and enhance the browsing experience for visitors during high-traffic fluctuations. It works seamlessly and is compatible with most performance plugins available on the market. The plugin offers an efficient approach to dynamically control the front-end heartbeat, automatically determining the optimal settings for your website. By analyzing user usage, WordPress site assets, and server environment, it empowers your WordPress performance to achieve its full potential. Once activated, it immediately begins improving performance without any need for user intervention. It intelligently adjusts the heartbeat interval in real-time, adapting to the changing demands of your website. This dynamic control guarantees an optimized and efficient heartbeat system, resulting in improved overall performance and responsiveness.

For the best outcome it's recommended that you have a caching plugin installed as well as optimized pages(minified CSS, JavaScript, including optimized images). 

<strong>If you already have the plugin files on your device you can follow the steps:</strong>

Step 1: Login to your WordPress Dashboard.

Step 2: Click on "Plugins" on the left-hand side menu, then select "Add New".

Step 3: Click on the "Upload Plugin" button at the top of the page.

Step 4: Click on the "Choose File" button and browse to the location on your computer where the plugin file is saved. Select the plugin dynamic-heartbeat.zip file and click on "Open".

Step 5: Once the plugin file is uploaded, click on the "Install Now" button.

Step 6: After installation, click on the "Activate" button to activate the plugin.

Step 7: Once activated, the plugin will begin working right away. Allow a few visits on your pages to let the plugin fully determine the best heartbeat interval. Make sure you clear your cache after activation.

<strong>Additional important information:</strong>

- You can optimize your website's database by going to the WP Admin Dashboard > Settings > DFEHC and "Enable" the "Add manual database optimizations page" in the admin menu under the Database Optimization Area (Advanced section). This will add a page called Unclogger in your admin menu where you can manually choose database optimizations or set the Optimization Frequency from below for full database optimizations to run regularly. Press the Save Changes button after you choose these options. It's highly recommended that you back up your website before running database optimizations.
- The plugin will try to connect to the default localhost Redis port or Memcache. If you have a different path for object caching methods you can update them in the WP Admin Dashboard > Settings > DFEHC. In the event you don't have object cache enabled, the plugin will fall back and use regular cache automatically. 
- Some caching plugins offer manual heartbeat control. For the best outcome, make sure that you only have this plugin controlling your heartbeat intervals automatically. This plugin is designed to integrate with any other plugins you might have installed. Compatible with other services, enhancing overall heartbeat performance and ensuring that you can leverage all the benefits that other plugins and CDNs bring to your site.

== Changelog ==

= 1.2.9 =

* Minor updates on optimization features. 
* Minor improvements on compatibility for the upcoming major update.

= 1.2.8 =

* Added database optimization feature on the DFEHC settings page to help with database bloat and unoptimized or dead-end tables. 
* Minor improvements.

= 1.2.7 =

* Improved server load and response time retrieval functions to address potential issues on certain hosting environments where the functions might get blocked. Thanks to user Tom M for notifing this isssue. 

= 1.2.6 =

* Efficiency improvements.

= 1.2.5 =

* Performance improvements and bug fixes.
* Localized chart.js file

= 1.2.4 =

* Settings page update.

= 1.2.3 =

* Code structure upgrade.
* Added the ability to manually control back-end heartbeat as well as editor heartbeat intervals.
* Now you can adjust the resource priority from WP Admin Dashboard > Settings > DFEHC

= 1.2.2 =

* Efficiency improvements.

= 1.2.1 =

* Enhanced Unix server load detection.
* Added a new setting in the plugin's settings DFEHC page that allows users to completely disable the WordPress Heartbeat API. 

= 1.2.0 =

* Efficiency improvements.

= 1.1.9 =

* Improved object caching calling method.
* Other small code and visual adjustments.

= 1.1.8 =

* Added Heartbeat Health widget in the admin dashboard.
* Performance & security improvements.

= 1.1.6 =

* Small code improvements.

= 1.1.5 =

* Persistent Storage Support: Added support for Redis and Memcached as persistent storage options for efficient data handling and improved performance.
* Settings Page: Added a dedicated settings page to configure Redis and Memcached settings, providing flexibility in specifying server and port information. In the event the user does not have persistent storage support options, the plugin will fallback to regular caching. Update the settings only if they are needed from your WP Admin dashboard > Settings > DFEHC
* Improved Load-Based Recommendations: Calculate the recommended heartbeat interval based on server load average and response time to optimize performance
* Made various updates to improve compatibility with different server configurations and enhance overall performance.
* Improvements in error reporting.

= 1.1.4 =

* Reliability improvements.

= 1.1.3 =

* Implemented an asynchronous heartbeat determination feature, ensuring that the plugin operates seamlessly within any WordPress setup without compromising performance. By offloading the heartbeat calculation to a separate asynchronous process, the plugin remains non-invasive and minimizes any potential impact on the overall performance of your website.
* Small corrections and code minification.

= 1.1.2 =

* Fixed compatibility issues with some older versions of server-side programs.

= 1.1.1 =

* Minor corrections.
* Performance improvements.

= 1.1.0 =

* The plugin has undergone extensive improvements to ensure seamless integration and optimal performance across various WordPress configurations. With its new enhanced compatibility, it can seamlessly adapt to different themes, plugins, and hosting environments, providing a reliable solution for all types of WordPress websites.
* Added more complex reasoning behind determing the best recommended heartbeat inteval.
* Set the grounds for easier future updates.

= 1.0.8 =

* Added a new way of calculating heartbeat accuracy.
* Improved compatibility with shared hosting environments where users have no control over the server load.
* Hearbeat is now taken into account on pages that can only be accesible to visitors.
* Now caching the frequently used DOM elements to avoid unnecessary reselection and improve performance.
* Various realiability improvements.

= 1.0.5 =

* Updated heartbeat structure to incorporate heartbeat caching. Recommended heartbeat caching will automatically be disabled when it doesn't make sense anymore. For example the website is crowded.
