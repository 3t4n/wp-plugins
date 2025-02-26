=== Automatik Blog ===
Contributors: automatik
Tags: rest-api, content publishing, articles, images, categories
Requires at least: 5.0
Tested up to: 6.6.2
Requires PHP: 7.0
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A plugin for integration with Automatik Blog, allowing automated publishing of SEO-optimized articles via REST API.

== Description ==

Automatik Blog plugin extends the WordPress REST API by providing custom endpoints for publishing articles, updating posts, uploading images, and managing categories. It is designed to facilitate integration between WordPress and the Automatik Blog application, allowing seamless content management and automated publishing of SEO-optimized articles.

**Features:**

- Publish articles via custom REST API endpoints.
- Update existing posts and pages.
- Upload and manage images.
- Create and manage categories.
- Retrieve posts, pages, authors, tags, and categories.
- Secure API access with unique authorization codes.

== Installation ==

1. Upload the `automatik-blog` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Navigate to 'Settings' > 'Automatik Blog' to generate and configure your unique authorization code in the app.

== Frequently Asked Questions ==

= How do I generate the authorization code? =

After activating the plugin, go to 'Settings' > 'Automatik Blog' in your WordPress dashboard to generate your unique authorization code and link with https://automatikblog.com

= Is the plugin secure? =

Yes, the plugin requires a unique authorization code for all API requests, ensuring secure access to your WordPress site.

== Changelog ==

= 1.0.0 =
* Initial release.
* Added endpoints for publishing articles, updating posts, uploading images, and managing categories.

= 1.0.1 =
* Minor fixes and improvements.

= 1.0.2 =
* Minor fixes and improvements.

== Upgrade Notice ==

= 1.0.0 =
Initial release of Automatik Blog plugin.

== License ==

This plugin is licensed under the GPLv2 or later.

Copyright (C) 2024 Automatik Blog

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; version 2 of the License, or any later version.
