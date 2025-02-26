=== Ayah of the Day Wordpress Widget ===
Contributors: Hassan Jahangiry
Donate link: http://cyberia.ir/ayah-of-the-day/
Tags: Quran,Islam, Ayah,Verse,Muslim,Widget,Religious
Requires at least: 2.0
Tested up to: 2.7
Stable tag: 1.0

It displays translation of a verse from Holy Quran(Muslim's holy book) on your blog sidebar.

== Description ==

Ayah of the Day displays daily translation of a verse(Ayah) from Holy Quran(Muslim's holy book).
You can choose between English and Farsi translation and even use it in your non-widgetized theme!

Also you can customize colors,size,margins,etc using "ayahstyle" class.(a little CSS knowledge is required!)

Ayah of the Day uses <a href="http://www.parsquran.com/eng/">Pars Quran's</a> script code.

Let me know if you have any suggestion or comment:
http://www.cyberia.ir/ayah-of-the-day/

== Screenshots ==

You could find some screenshots at http://www.cyberia.ir/ayah-of-the-day/

== Installation ==

While doing the installation procedure, it is recommended to go through all the steps first before viewing the output. If you don't, you'll get nasty error messages.

= For those with Sidebar Widget compatible themes =

1. Upload `ayah-of-the-day.php` to the `/wp-content/plugins` directory
2. Activate the plugin through the 'Plugins' menu in WordPress backend
3. Go to 'Design' menu, then to 'Widgets' or 'Presentation' then 'Sidebar widgets' for WP 2.2 older versions.
4. Add Ayah of the Day widget to your sidebar.
5. Save your changes.


= For those without Sidebar Widget =

1. Upload `ayah-of-the-day.php` to the `/wp-content/plugins` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Open your themes `ayah-of-the-day.php` file if you have one and add 
 
 <?php if (function_exists('print_ayah_of_the_day'))  {
          print_ayah_of_the_day('en'); }
 ?>
 
4. Save changes.


= Upgrading =

- Disable the Ayah of the Day plugin
- Delete ayah-of-the-day.php from your server
- Download and unzip the new file(s) into the plugins dir
- Enable the Ayah of the Day plugin