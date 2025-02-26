=== Energ1zer ===
Contributors: frankquebec
Donate link: http://yipp.ca
Tags: shortcode rich text edit layout responsive design thumbnails rounded
Requires at least: 3.5.1
Tested up to: 6.3.1
Stable tag: 1.1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Energ1zer allows you to render elements from posts/pages to dynamic elements in other pages, such as the featured images.
It also brings shortcodes to do various things to speed up web development.

== Description ==

By Activating this plugin you get automatically these Features turned on:

*   permanent line breaks in pages using [br] shortcode so your design doesn't break
*   wordpress wont add &lt;p&gt;&lt;/p&gt; and &lt;br/&gt; automatically when you add line-feeds (configurable)
*   new pages options added at bottom of page

You can quickly generate these with [energ1zer markups]:

*   automatic rounded pictures thumbnails (bubbles)
*   rounded thumbnails (bubbles) can be made grayscale
*   insert an horizontal line: [energ1zer liner=&quot;2&quot; color=&quot;#909090&quot; width=&quot;400px&quot;]
*   insert &lt;br/&gt;: [br]
*   age in year since a date: [age since="01-Jan-1996"]
*   image galleries

When you do a nice design for a client, you want this design to stay in place. 
This plugin allows to insert shortcodes such as [br] to have permanent line breaks in your post. 

For untranslatable content (like sliders or other widget), energ1zer will append classes to your body element and this CSS to your pages:

body.en .show-fr,
body.en_US .show-fr {
	display:none;
}
body.fr .show-en,
body.fr_FR .show-en,
body.fr_CA .show-en {
	display:none;
}

Then you have to add the local to your body class. Hint: in PHP it is with: get_locale()

For example in 7host theme you would edit header.php like this :

    $class = shost_body_classes();
+   $class[] = get_locale();
    $img = shost_bg_img();
    ?&gt;
    &lt;body id="top" &lt;?php body_class( $class ); ?&gt; data-image="&lt;?php echo $img ?&gt;"&gt;


You can now do conditional content like this

&lt;div class=&quot;show-en&quot;&gt;How are you doing?&lt;/div&gt;
&lt;div class=&quot;show-fr&quot;&gt;Comment allez-vous?&lt;/div&gt;


[energ1zer post="1620" display="all"]

== Installation ==

This section describes how to install the plugin and get it working.

See the Support section for howtos.

== Usage ==

To create a full-width banner like on http://yipp.ca/

1) Upload a large image using the standard wordpress upload.
2) Get the link of the image, for example http://yipp.ca/wp-content/uploads/2016/12/banner-15deg.jpg
3) Insert this code in your post:
&lt;div class="fullwidth energ1zerFullWidth"&gt;[energ1zer-imgcover img="http://yipp.ca/wp-content/uploads/2016/12/banner-15deg.jpg" height="400" position="left 30%"]&lt;/div&gt;
Info: The division makes your banner that breaks out of your page layout and margins. You might or might not need it depending on your theme. The [energ1zer-imgcover img="..." height="..." position="..."] shortcode will render the banner with correct CSS style. Modify the "height" and "position" attributes to your need.

To create a round picture on any page from a post's featured image


[energ1zer liner="#76a6e3" height="8" margin="0 0 20px 0"][energ1zer_bubble postID="972" float="left" margin="10px 30px 60px 0"]
<h2 class="inlineTitleBlue"><a title="Naître et grandir en harmonie" href="/conference/naitre-grandir-en-harmonie/">Naître et grandir en harmonie</a></h2>
<span style="color: #993300;">[br]</span>
La voix et la musique sont des atouts majeurs dans le développement de l’être dès la période prénatale. Comment la voix, cet outil accessible à tous, peut-elle permettre à l'enfant dès son plus jeune âge, voire dès sa conception, un développement optimal qui l'accompagnera tout au long de sa vie ?<span style="color: #993300;">[br]</span><span style="color: #993300;">[br]</span>


= Using The WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Search for 'energ1zer'
3. Click 'Install Now'
4. Activate the plugin on the Plugin dashboard

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `energ1zer.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download `energ1zer.zip`
2. Extract the `energ1zer` directory to your computer
3. Upload the energ1zer` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard



== Support ==

= How to create masonry ? =



== Frequently Asked Questions ==

= What about the rounded thumbnails, how does it works? Do I have to do some processing to my images before uploading? =

There is no special processing needed. If you want to re-center the part that is in the circle - that is re-position it - you can use Wordpress built-in function to re-position the thumbnail.

= Why are you so awesome at making plugins =

Thank you. It is just something you get born with. ... seriously I appologize for the early version and poor documentation of this plugin it is just a side-project but with time I hope it will become a swiss army knife for wordpress development and reducing the amount of plugin needed to create interesting pages for both developers and users.


== Screenshots ==

N/A

== Changelog ==

= 1.1 =
Added galleries

= 1.0 =
First version


