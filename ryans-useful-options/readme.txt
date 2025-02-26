=== Ryan's Useful Options ===
Contributors: othellobloke
Tags: query strings, bootstrap, grid, purecss, is_child, user enumeration, disable author archives
Requires at least: 4.0
Tested up to: 5.5.1
Requires PHP: 5.3
Stable tag: 1.6.6

This plugin amongst other things adds a front end 'Delete', 'Edit', and 'Logout' buttons, with an option to remove attached media from deleted posts/pages, turns off self pingbacks, an option to remove styles from tag clouds, an option to clean up what's outputted from the wp_head function, the option to replace bundled jQuery with Google's latest hosted version, the option to disable user enumeration, the option to disable author archives, and the ability to protect a page and its ancestors through requiring user login by defining page slug of parent page.

Aside from the option to include Bootstrap Grid, it also automatically adds Bootstrap tables, forms, and button CSS to the front-end of this website without adding any typography or other styles included with Bootstrap, adds an "is_child()" function which you can use in your template.
== Description ==

This plugin amongst other things adds a front end 'Delete', 'Edit', and 'Logout' buttons, with an option to remove attached media from deleted posts/pages, turns off self pingbacks, an option to remove styles from tag clouds, an option to clean up what's outputted from the wp_head function, the option to replace bundled jQuery with Google's latest hosted version, the option to disable user enumeration, the option to disable author archives, and the ability to protect a page and its ancestors through requiring user login by defining page slug of parent page.

Aside from the option to include Bootstrap Grid, it also automatically adds Bootstrap tables, forms, and button CSS to the front-end of this website without adding any typography or other styles included with Bootstrap, adds an "is_child()" function which you can use in your template. Check below for is_child examples.


Checks if the current page, posting or category is somehow related to category or page ID 10.

is_child(10)

Checks just if the current element is a direct child of Example Category.

is_child(Example Category,false)

Checks if the current element (page) is somehow related to a page with the slug some-page.

is_child(some-page, 1)
== Installation ==

Just install from your WordPress "Plugins > Add New" screen and all will be well. Manual installation is very straightforward as well:

1. Upload the zip file and unzip it in the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to `Ryan's Useful Options` and enable the options you want.
