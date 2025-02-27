=== Easy restaurant menu manager ===
Tags: restaurant menu, food menu, restaurant, menus
Requires at least: 4.0
Donate link: https://www.paypal.me/nikelschubert/6.00EUR
Tested up to: 6.6
Requires PHP: 5.3
Stable tag: 1.9.1
License: GPLv3

Restaurant Menu Plugin to effortlessly manage restaurant menus. Delegate uploads: user solely for menu uploads.

== Description ==
Restaurant Menu Plugin lets you easily manage your restaurant menus online in just minutes. Designed with employee-friendliness in mind, this plugin includes a user role specifically for uploading restaurant menus as PDFs or other file types. It allows you or authorized staff to upload and manage food and drink menus on your site effortlessly. Menu links can be embedded using a shortcode or the raw link.

Documentation: [https://beautiful-wp.com/documentation/](https://beautiful-wp.com/documentation/)

= Key Features =
1. The upload area is completely separate from the other admin settings, staff can be given permission to upload menus without any risk.
2. Support for Gutenberg Blocks
3. SEO and User friendly: Links are stable -> you can change the menu name, but the link to the menu stays the same.
4. Unlimited menus supported with premium add-on: [beautiful-wp.com](https://beautiful-wp.com/wordpress-plugin/easy-pdf-restaurant-menu-upload-food-menu/). The basic version supports lunch menu and a main menu.
5. Links to menus can be placed everywhere in wordpress: you get shortcodes for the links.
6. Linktext can easily be changed in the shortcode. 
7. Multilanguage support.
8. Add a descriptive text for the menu uploader with instructions.
9. Optional redirect to Menu Upload Page, after login.

The menus can be uploaded under Media > Easy Menu Upload.

With this plugin you can leave the restaurant menu upload to your employee. The file type is fixed and if the employee does have the user role **Restaurant Menu Uploader** he can only upload the food menus, nothing else.


== Frequently Asked Questions ==

= How can I change the link to the menu for Gutenberg Blocks? =
Plese see documentation here: [https://beautiful-wp.com/documentation/gutenberg-blocks-how-to/](https://beautiful-wp.com/documentation/gutenberg-blocks-how-to/)


== Screenshots ==

1. Menu upload for admins
2. Settings for admins
3. Menu upload for role "Restaurant Menu Uploader"

== Installation ==
Just install this plugin and go to Media > Easy Menu Upload to upload the menu files.

= Shortcodes =

You can refer to the menus everywhere in wordpress with the following shortcodes:
**To get ready to use html link**
**For Lunch:** [nsc_eprm_menu_link restaurant_menu_type="lunch" linktext="Lunch menu"]
**For general menu:** [nsc_eprm_menu_link restaurant_menu_type="general" linktext="General Menu"]
You can change the text of "linktext" as you like.
Both will return a html link ready for usage, with the text of the defined "linktext" value.
**to get file url**
[nsc_eprm_menu_file_url restaurant_menu_type="lunch" cachebuster=true]


If you use the premium add-on and have more link types you get the shortcode for the required food menu in the upload section.

= New user role =

This Plugin also adds a new role: **Restaurant Menu Uploader**. User with this role can only upload the restaurant menu and see the dashboard, so perfect for any employee.

== Changelog ==

= 1.9.1 =
- FIX: Adding caching headers to new link structure.

= 1.9.0 =
- BREAKING CHANGE: Filename is now "menu-<TYPE>.<EXTENSION>", before it was "example-page-menu-<TYPE>.<EXTENSION>". Files are migrated automatically, but please double check if everything runs smoothly. SEO redirects are NOT created automatically.
- NEW: added option to wrap shortcode link in p-tag.
- NEW: added option to add rel=nofollow
- NEW: added option to prevent files from being indexed

= 1.8.0 =
- NEW: added setting for using original filename in download link.
- REFACTOR: minor code clean ups

= 1.7.1 =
- Shows now the original file name. 

= 1.7.0 =
- Improvement: If you provide no link text in the shortcode only the filename will be displayed. Before the whole http link was shown. Which was a bit too much. 

= 1.6.0 =
- FIX: critical security fix
- Refactor: added capability only for upload

= 1.5.2 =
- Improvement: added shortcode nsc_eprm_menu_file_url to get the pure url of the file. To be more flexible.

= 1.5.1 =
- Bugfix: error in older php versions

= 1.5.0 =
- Improvenment: added support for Gutenberg Blocks

= 1.4.0 =

- Improvement: unused files are now deleted
- Improvement: added support for multiple menu types with premium add-on: [beautiful-wp.com](https://beautiful-wp.com/wordpress-plugin/easy-pdf-restaurant-menu-upload-food-menu/)
- minor fixes and refactorings.

= 1.3.2 =

- Improvement: added an id to the shortcode links, for better customizing possibilities.

= 1.3.1 =

- fixed a notice message.

= 1.3 =

- **IMPORTANT** After Upgrade to 1.3 you have to assign the User Role "Restaurant Menu Uploader" to all affected users again.
- **Moved Admin Page** Page for uploading the menus is now under "Media > Easy PDF Menu"
- Renamed User Role "Manage Restaurant Menu" to "Restaurant Menu Uploader"
- Role "Restaurant Menu Uploader" has no access to the Media Library anymore.
- Only Role "Restaurant Menu Uploader" is redirected to upload page after login. Redirect all is optional now.
- Role "Restaurant Menu Uploader" works now, even if woocommerce is installed.
- made uploaded file clickable in admin for instant validation.
- ability to write custom text for the menu uploader.
- Introduced a cache buster for files, to make sure that always the newest version is downloaded.
- a lot under the hood.

= 1.2 =

- shows the uploaded filename of the current menu which is live.
- clean up of settings area
- bug fix

= 1.1.2 =

- xss fixes

= 1.1.1 =

- minor bug fixes

= 1.1 =

- made shortcodes more clear in admin.

= 1.0 =

- first Version
