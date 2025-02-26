=== AP Twig Bridge ===
Contributors: v-media
Tags: template. twig, symfony
Requires at least: 3.3
Tested up to: 3.3
Stable tag: 1.0

AP Twig Bridge makes it possible to create templates for Wordpress using Twig template engine.

== Description ==

AP Twig Bridge is a bridge between Wordpress and Twig. Wordpress is a great system mainly because of its simplicity,
but it is a headache to create templates for it. PHP-mess is not good for creating templates, that's why
there are different template engines. Twig is a new powerful template engine developed by <a href="http://fabien.potencier.org/">Fabien Potencier</a>. 
It has very clear and simple syntax, inspired by Django and Jinja. So, if you ever thought of using some templating engine in Wordpress, try this plugin.
For now this plugin has a limited support for Wordpress API, but I'm going to develop it further.

= Your Feedback Matters =

Bugs to report? Feature requests? Criticism? New ideas? We want to hear from
you! Do not hesitate. Get in touch with us and share your views.

== Installation ==

1. Get an archive with the most recent version of AP Twig Bridge.
1. Uncompress the `ap-twigbridge` directory from the archive to your `wp-content/plugins` directory.
1. Activate the plugin in the administration panel.
1. Copy `twigbridge` from `wp-content/plugins/ap-twigbridge/themes` to `wp-content/themes`
1. Activate AP Twig Bridge theme in the administration panel.

== Frequently Asked Questions ==

= What PHP version does this plugin support? =

This plugin should support php > 5.3.0, but is tested only on php 5.3.8.

= How do I start creating my theme? =

You can directly edit files in `twigbridge` theme folder (don't forget to copy it to your `wp-content/themes` directory). You can use functions.php to add some hooks or to load text domain.
You must have at least these files: style.css, index.php (must contain php-code to display the template, please check the example), header.php, footer.php, searchform.php.
All twig files must be in `wp-content/themes/yourthemefolder/Twig`. At least `index.html.twig` must exist.

= How do I create a special template for a page? =

Check please `links.php` and `archives.php` about how the php-file should look like. Create a similar file with the name you want (e.g. special.php). Then
you just create a `special.html.twig` file and write all the code you need there.

= Your plugin lacks some Wordpress functions. How can I add them? =

Yes, I know, that I didn't include many Wordpress API function, because initially this plugin was just a proff of concept. Actually, you can add the functions you need
to APBridge_TwigExtension module yourself, but your changes will be overwritten next time you update the plugin to a new version. So, creating your own extension
will be the best way to add the functions you need. You can do it in `index.php` this way: `$twigBridge->getTwig()->addExtension(new YourExtensionClass())`.
It must be called befor template rendering, of course. You can use `APBridge_TwigExtension` class as an example. Also you can write to me about the functions you need,
so that I could include them in future versions.

= Is there an easy way to contact the developer of this plugin? =

Of course there is. Visit <a href="http://artprima.cz/">ArtPrima.cz</a> in order to find our e-mail address and other contacts.

== Changelog ==

= 1.0 =
* Initial release.
