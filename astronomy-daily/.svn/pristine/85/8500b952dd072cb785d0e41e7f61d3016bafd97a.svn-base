							=== Astronomy Daily ===
Contributors: fesovik
Tags: astronomy, content,  widget, shortcode, custom post type, image, nasa
Donate link: paypal.me/fesovik/10
Requires at least: 3.5
Tested up to: 4.7.2
License: GPLv2 or later

Astronomy Daily plugin lets you embed beautiful images from space to your blog/website along with a short content.

== Description ==
The plugin lets you embed beautiful astronomy images with it's respective description to your website or blog. This plugin uses the NASA's API to retrive th data of the Astronomy Picture of the day and it stores the data as posts as a custom post type. New images are added once a day when a request is fired to retrive the latest astronomy picture.
You can display the images using the Astronomy Daily widget from Appearance -> Widgets or use the [astro] shortcode such as:
[astro title="Astronomy Picture of the Day" count="1" size="post-thumbnail"]
The shortcode has three arguments:
- title (title of the widget)
- count (how many images to be displayed)
- size (the native WordPress image size you want to use for displaying the images).

== Installation ==
1. Extract the plugin to yourproject/wp-content/plugins.
2. Activate the plugin from WordPress dashboard.
3. Add the APOD widget from Appearance -> Widgets or use the shortcode [apod]
4. Enjoy the beautiful images

== Frequently Asked Questions ==
What is the interval witch new image is added?
The plugin publishes a new image every day when NASA releases the image of the day.
Do I need an API key from NASA?
No you don\'t, the plugin makes only one call per day and uses a demo key and you don't have to worry about API keys.
How are new images published?
The plugin works with wp_schedule_event() function and fires a daily event to get the latest NASA image.