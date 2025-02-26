=== Another Random Posts Widget ===
Contributors: dhoppe
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=1220480
Tags: widget, post, posts, random, random, sidebar
Requires at least: 3.0
Tested up to: 3.3
Stable tag: trunk

This Widget shows some random posts in the sidebar.

== Description ==

= Description =
This Widget shows some random posts in the sidebar. You can choose how many posts and what parts of the post should be shown. If you use this widget on a sidebar in single post view the current post will be excluded from the randomizing list of posts.

= Requirements =
* **This Widget requires PHP5!**
* WordPress 3.0 or higher

= In the Press =
* 3 "Must Have" WordPress Related Posts Plugins by SEO Design Solutions. [To the post &raquo;](http://www.seodesignsolutions.com/blog/wordpress-seo/3-must-have-related-posts-wordpress-seo-plugins/)

= Customizing the appearance =
If you want to customize the design you have to do the following:

* copy the *random-posts-widget.css* file (from the plug-in folder) to your theme directory
* copy the *random-posts-widget.php* file (from the plug-in folder) to your theme directory
* Now you can start customize the style of your widget until it fits your needs. Both files are well documented and easy to understand. The *random-posts-widget.php* builds the architecture. The *random-posts-widget.css* adds the style information. 

**Of course i can help you customizing your widget appearance** for a small fee. ;) Feel free to send me a mail or leave a comment in my blog.

= For developers =
If you want to use a customized template file outside the theme directory you can use the *random_posts_widget_template* filter. Just write a path to a file in the filter to bypass the template. Here is an example that shows how you can write a plugin which changes the template path to a file in the same directory.

<code>
Function bypass_template($template_file){
  /* the $template_file is the file which is currently set as template so
     you can also use the filter to read the current template file. 
  */
  return DirName(__FILE__) . '/my-template.php';
}
Add_Filter('random_posts_widget_template', 'bypass_template');
</code>

Analogical you can change the style sheet with the *random_posts_widget_style_sheet* filter. Here is an example:
<code>
Function bypass_style_sheet($css_file){
  /* the $css_file is the file (URL) which is currently set as style sheet so
     you can also use the filter to read the current css file. 
  */
  // Url to your CSS File
  return get_bloginfo('wpurl') . '/my-style.css';
}
Add_Filter('random_posts_widget_style_sheet', 'bypass_style_sheet');
</code>

= Questions =
If you have any questions you can leave a comment in my blog. But please think about this: I will not add features, write customizations or write tutorials for free. Please think about a donation. I'm a human and to write code is hard work.

= Language =
* This Plug-in is available in English.
* Diese Erweiterung ist in Deutsch verfügbar. ([Dennis Hoppe](http://dennishoppe.de/))
* Ce plug-in est disponible en français. ([Thomas Mur](http://creapage.net/))
* Deze plugin is beschikbaar in het Nederlands. ([WordPress Webshop](http://wpwebshop.com/))
* Detta tillägg är tillgängligt på svenska. ([Ove Kaufeldt](http://www.kaufeldt.com/))
* Questo plugin è disponibile in italiano. ([Andrea Bersi](http://www.andreabersi.com/))
* Este Plugin está disponível em Português. (Pedro Saraiva)
* Acest plugin este disponibil în limba Română. ([Anunturi Jibo](http://www.jibo.ro/))
* Этот плагин доступен на русском. ([Sergey Kasyan](http://pimpyoursite.ru/))
* Цей плагін доступний українською. ([Sergey Kasyan](http://pimpyoursite.ru/))
* Bu eklentinin Türkçe desteği bulunmaktadır. ([Ramerta Grup](http://ramerta.com/))
* Plugin ini tersedia dalam Bahasa Indonesia. ([Zhang Han](http://www.zhangjia.com/))

If you have translated this plug-in in your language feel free to send me the language file (.po file) via E-Mail with your name and this translated sentence: "This plug-in is available in %YOUR_LANGUAGE_NAME%." So i can add it to the plug-in.

You can find the *Translation.pot* file in the *language/* folder in the plug-in directory.

* Copy it.
* Rename it (to your language code).
* Translate everything.
* Send it via E-Mail to mail@DennisHoppe.de.
* Thats it. Thank you! =)


== Screenshots ==

1. Example front end screenshot with TwentyTen Theme
2. Back end Widget options

== Installation ==

Installation as usual.

1. Unzip and Upload all files to a sub directory in "/wp-content/plugins/".
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Go to Widgets and add the new Widget to a sidebar.
1. You like what you see?

== Changelog ==

= 1.1.11 =
* Added Indonesian translation by [Zhang Han](http://www.zhangjia.com/).

= 1.1.10 =
* Changes enqueue_style hook to "wp_print_styles"
* Added Exclude feature
* Added index files

= 1.1.9 =
* Added Turkish translation by [Ramerta Grup](http://ramerta.com/).

= 1.1.8 =
* Made the "by" in the template translateable.

= 1.1.7 =
* Updated language file handling
* Removed hardcoded style links
* Changed posts titles to "<h3>""s

= 1.1.6 =
* Added Romanian translation by [Anunturi Jibo](http://www.jibo.ro/).
* Added Russian translation by [Sergey Kasyan](http://pimpyoursite.ru/).
* Added Ukrainian translation by [Sergey Kasyan](http://pimpyoursite.ru/).

= 1.1.5 =
* Added Portuguese translation file by Pedro Saraiva.

= 1.1.4 =
* Added Italian translation by [Andrea Bersi](http://www.andreabersi.com/).

= 1.1.3 =
* Added Swedish translation by [Ove Kaufeldt](http://www.kaufeldt.com/).

= 1.1.2 =
* Added Dutch translation by [WordPress Webshop](http://wpwebshop.com/).

= 1.1.1 =
* Added French translation by [Thomas Mur](http://creapage.net/).

= 1.1 =
* Added template engine

= 1.0 =
* Everything works fine.