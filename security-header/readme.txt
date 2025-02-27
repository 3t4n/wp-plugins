=== HTTP Security Header ===
Contributors: mohitgoyal1108  
Tags: http security, wordpress security, header security, content security policy, x-frame-options  
Requires at least: 5.0  
Tested up to: 6.7  
Requires PHP: 7.0  
Stable tag: 2.1  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  
Website: https://inspiredmonks.com  

Add essential HTTP security headers to protect your WordPress site from attacks and improve security.

== Description ==
Security headers are essential for protecting your WordPress website against common attacks, including cross-site scripting (XSS), clickjacking, content sniffing, and certificate transparency issues. The Security Header plugin provides an easy interface to enable or disable essential security headers with just a few clicks.

**Key Features:**
* HTTP Strict Transport Security (HSTS)
* X-Frame-Options (Prevents clickjacking)
* X-Content-Type-Options (Prevents MIME-type sniffing)
* Referrer-Policy (Controls the referrer header information)
* Content-Security-Policy (Mitigates various attacks like XSS)
* X-XSS-Protection (Prevents Cross-Site Scripting attacks)
* Permissions-Policy (Controls browser features such as microphone, camera, etc.)
* X-Permitted-Cross-Domain-Policies (Restricts cross-domain resource sharing)
* Expect-CT (Enforces certificate transparency)
* Feature-Policy (Controls resource loading for various browser features)
* Cross-Origin-Opener-Policy (Prevents cross-origin attacks by isolating browsing contexts)
* Cross-Origin-Resource-Policy (Restricts sharing of resources across different origins)

Easily toggle each security header from the WordPress admin panel to improve the security of your website without requiring manual code changes.

== Screenshots ==

1. **With Plugin**: Your website is secured with essential security headers.
   ![With Plugin](assets/screenshot-success.png)

2. **Without Plugin**: Your website is vulnerable to various security threats.
   ![Without Plugin](assets/screenshot-failed.png)

== Features ==

* Easy-to-use settings page
* Add or remove essential HTTP security headers with just a click
* Supports all major security headers to secure your website
* Helps mitigate a wide range of security vulnerabilities
* Compatible with all WordPress themes and plugins
* Each security header can be enabled/disabled independently

== Installation ==

1. Download the plugin and unzip the folder.
2. Upload the `security-header` folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.
4. Go to **Settings > Security Headers** to configure the plugin options.

== Frequently Asked Questions ==

= What security headers can I enable with this plugin? =
You can enable the following security headers:
- HTTP Strict Transport Security (HSTS)
- X-Frame-Options
- X-Content-Type-Options
- Referrer-Policy
- Content-Security-Policy (CSP)
- X-XSS-Protection
- Permissions-Policy
- X-Permitted-Cross-Domain-Policies
- Expect-CT
- Feature-Policy
- Cross-Origin-Opener-Policy (COOP)
- Cross-Origin-Resource-Policy (CORP)

= Does this plugin work with all themes? =
Yes, this plugin works with all WordPress themes, as it modifies the HTTP headers sent by your web server without affecting the content or styling of your site.

= Is coding knowledge required to use this plugin? =
No coding knowledge is required. The plugin provides a simple admin interface where you can enable or disable headers with just a click.

= Can this plugin interfere with my website's functionality? =
Security headers modify how browsers interpret and handle your site. In rare cases, they may interfere with some functionality (e.g., third-party embeds). The plugin allows you to easily disable any problematic headers.

= How do I know if the headers are working? =
You can use tools like [SecurityHeaders.com](https://securityheaders.com) or [web browser developer tools](https://developer.mozilla.org/en-US/docs/Tools) to inspect the HTTP headers and confirm that your settings are applied correctly.

= What should I do if a security header is causing an issue? =
If a specific header is interfering with your website or a third-party service, you can disable it from the **Settings > Security Headers** page. Each header is independently configurable, so you can toggle only the ones you need.

= Does this plugin affect website performance? =
Adding security headers generally has a minimal impact on performance. The headers are small in size and add a negligible amount of data to each request. This plugin only sets headers at the server level without altering front-end content or site functionality.

= Can I use this plugin on a multisite installation? =
Yes, the Security Header plugin is compatible with WordPress multisite installations. However, you’ll need to configure security headers individually for each site in the network.

= Will this plugin prevent all types of attacks? =
While security headers provide a robust layer of protection against specific attack vectors (e.g., XSS, clickjacking), they are not a complete security solution. Using this plugin in combination with other security practices, such as regular updates, strong passwords, and security plugins, is recommended.

= Are these headers compatible with all browsers? =
Most modern browsers support these headers, but certain headers may not be fully compatible with older browsers. You can check [browser compatibility](https://caniuse.com/) for each security header if needed.

= Does this plugin support custom settings for each header? =
Currently, this plugin provides standardized header values optimized for security. For advanced customizations, please reach out to the developer for additional options or custom development support.

= How do I uninstall the plugin, and what happens to the headers? =
To uninstall, simply deactivate and delete the plugin from the **Plugins** menu. All headers set by the plugin will be removed, restoring your website to its previous state.

= I found an issue or have a feature request. Where can I report it? =
We welcome feedback! Please contact us through [Inspired Monks Contact us](https://inspiredmonks.com/contact-us/) to report any issues or suggest new features.

== Changelog ==

= 2.1 =  
* Added support for Cross-Origin-Opener-Policy (COOP) and Cross-Origin-Resource-Policy (CORP) headers.
* Updated the plugin interface for improved user experience.
* Bug fixes and improvements.

= 2.0.3 =  
* Minor improvements and compatibility updates  

= 2.0.2 =  
* Updated plugin name to "HTTP Security Header"  
* Minor improvements and compatibility updates  

= 2.0.1 =
* Added new screenshots to demonstrate website security before and after using the plugin.
* Updated the settings page layout to use a modern div-based structure instead of a table.
* Applied styling to checkboxes for a sleek, modern look.
* Improved overall user interface and experience on the admin dashboard.
* Minor bug fixes and code optimizations.

= 2.0 =
* Added Feature-Policy header.
* Updated prefixes to improve compatibility and prevent conflicts.
* Added protection to prevent direct file access.

= 1.0 =
* Initial release with core security headers: HSTS, X-Frame-Options, X-Content-Type-Options, and more.
* Added support for `X-Permitted-Cross-Domain-Policies`, `Expect-CT`, and `Permissions-Policy` headers.
* Improved overall structure and security.
* Added `headers_sent()` checks to prevent "Headers already sent" errors.
* Added `isset()` checks to avoid "Undefined array key" warnings for uninitialized options.
* Enhanced security and stability.

== Upgrade Notice ==

= 2.1 =
Upgrade to the latest version for enhanced security features, including COOP and CORP header support.

== Other Notes ==

For more information or to get in touch with the developer, visit [Inspired Monks Website](https://inspiredmonks.com).