=== Dessky Snippets ===
Contributors: dessky
Tags: code snippets, snippet, snippets, code snippets plugin, wp snippets, snippet plugin, snippets plugin, code snippet, custom snippet, snippets, code, php, functions, custom functions, custom php, php code, dessky
Requires at least: 3.9
Tested up to: 6.7.2
Stable tag: trunk
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Add your custom PHP code snippet from WordPress admin.


== Description ==

This is a lightweight and simple plugin that gives you the ability to easily add your custom PHP code from WordPress admin.

No need for editing functions.php file any more, you can easily add new PHP code with this plugin.

It's really useful in case of any theme update, because your custom PHP code will never be overwritten even if you upgrade or switch your theme.

This plugin was developed by [Dessky Team](https://dessky.com/).

Dessky Team does not provide support for the Dessky Snippets on the WordPress.org forums. In order to get support or make a suggestion from a Dessky Team you will have to Join Our Open Community and [Start a Discussion](https://discuss.dessky.org/t/dessky-snippets).

[DISCUSS WITH THE DESSKY TEAM](https://discuss.dessky.org/t/dessky-snippets)

[JOIN OUR OPEN COMMUNITY](https://discuss.dessky.org/t/dessky-snippets): The purpose of this open community is to have a collective place where the community can help each other, and we can get some feedback to improve Dessky Snippets as well. Joining the community is also a great way to connect with like-minded people and share your experience.

You can also [GET THE PREMIUM SUPPORT](https://dessky.me/)

[User Documentation](https://dessky.org/): Although Dessky Snippets is already easy to set up, we’ve put together tutorials, guides, and some knowledge bases to help you set up and get started with it.

I have further questions, how do I contact you?

Please fill up the [contact form](https://dessky.com/contact/) and we would be more than happy to assist.


= Features =

* Validate the entered code for fatal errors (basic validation)
* Checkbox for disabling the custom functions
* Syntax highlighting (by CodeMirror)
* Line numbers

= Credits =

[CodeMirror](https://codemirror.net/) is an open-source project shared under the [MIT license](https://codemirror.net/LICENSE).

Dessky Snippets is based on the 'My Custom Functions' plugin developed by [Arthur Gareginyan](https://profiles.wordpress.org/arthur-gareginyan/).

Scissors graphic is made by [Appzgear](http://www.flaticon.com/authors/appzgear) and it is licensed under [Creative Commons BY 3.0](http://creativecommons.org/licenses/by/3.0/).

Code graphic is made by [Freepik](http://www.freepik.com) and it is licensed under [Creative Commons BY 3.0](http://creativecommons.org/licenses/by/3.0/).


== Installation ==
Install "Dessky Snippets" just as you would any other WordPress Plugin.

After installation, a "`Dessky Snippets`" menu item will appear under the "`Appearance`" section. It will lead you to a page where you can add your custom PHP code.

== Frequently Asked Questions ==
= Q. Will this plugin work on my WordPress.COM website? =
A. Sorry, this plugin is available for use only on self-hosted (WordPress.org) websites.

= Q. Does this plugin require theme modifications? =
A. Absolutely not. This plugin is added/configured entirely from the WordPress Admin section.

= Q. How does it work? =
A. Just place your PHP code into the textfield and click "Save Changes". Example of PHP code:
`function MyAwesomeFunction() {

    // Content of my awesome function

}`

= Q. On the plugin settings page, an error message appears. What could be wrong? =
A. Here are a few of the most likely causes of the error message:

1. You make a syntax error in the code that you have entered. Check the syntax of your code and try again.
2. You have entered function with a name that is already occupied by another function. Use a unique name for your function.
3. You are trying to overwrite an existing function (of WordPress, theme, or plugin). Instead, use filters and hooks.

= Q. What to do if this plugin caused the white screen? =
A. It may be that a custom code that you've entered caused the error and white screen of death. If this happened then do the following.

Go to plugin folder (in `wp-content/plugins/dessky-snippets/`). Rename the "`START`" file to "`STOP`". Then you may go to plugin settings page and edit your entered custom code. After editing, just rename the "`STOP`" file that you renamed before back to "`START`".


== Changelog ==

= 1.1 =
* Various improvements.

= 1.0 =
* Initial release.
