=== Animate Your Content ===
Contributors: fides-it
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7AHC5YEQ8Y2TG
Tags: animation, animated, css3, cool, special effect, fadein, slide, fly-in, rotate
Requires at least: 2.1
Tested up to: 3.8.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Animate Your Content plugin

== Description ==

The animate your content plugin makes it possible to animate existing html by placing shortcodes around content.

[Watch Some EXAMPLES Here With Code Samples](http://www.fides-it.nl/animate-content-plugin/)

= Features =

* fly blocks from the left/right/top/bottom of your screen
* different bouncing effects can be configured
* rotate a block of text and/or images with any rotation angle
* set total elapsed time of animation per animation element
* set delay from start per animation element
* set animation effects on container element, any nested elements will inherit the effects from the container.
* set 'delay_increment' on animation set, which automatically adds an incremental delay on any child elements


== Installation ==

1. Install and activate this plugin
1. Place shortcodes in your content as described below.

To get started, look at the [examples with code samples on my site](http://www.fides-it.nl/animate-content-plugin/).


= Shortcode Installation Example =


[animation-set style="<css style>" class="<css class>" id="<unique id>" <animation-options>]

  [animation-element] .. your content here .. [/animation-element]

  [animation-element] .. your content here .. [/animation-element]

[/animation-set]

= HTML shortcode attributes =

Any attributes placed on an `animation-set` will be automatically applied to any nested `animation-element`s. It is however possible to override an `animation-set` attribute per `animation-element`.

The html attributes `style` and `class` can be used on both `animation-set` and `animation-element`. The `id` attribute can only be used on an `animation-set`.

= Animation shortcode attributes =
* `effect` : one of ( slide_from_left , slide_from_right , slide_from_top , slide_from_bottom , fade_in , rotate ). No default and thus a required field.
* `time` : the total elapsed time of the animation in seconds. Fractions are allowed. Default is 2.0 seconds.
* `delay` : the delay in seconds (fractions allowed) after which the animation must start. Default is 0.
* `rotation` : rotation angle in degrees. Example: 360. Only used for effect `rotate`.
* `ease` : defines the method used to make a block of content bounce against the far edge of the animation. Possible values are described on [this page](http://api.greensock.com/js/com/greensock/easing/package-detail.html). Examples are 'Bounce.easeIn', 'Cubic.easeOut', 'Elastic.easeInOut', etc.
* `delay_increment` : this attribute is only allowed on an `animation-set` element. It defines the incremental delay in seconds (fractions allowed) that must be added to each subsequent child `animation-element`. The default value is 0.


= Example =
* Text flying in from the top, left, right and bottom of the screen.
* Each animation takes 3 seconds.


[animation-set ease="Bounce.easeIn" time="3"]
  [animation-element effect="slide_from_top"]Hello World (from top)![/animation-element]
  [animation-element effect="slide_from_left"]Hello World (from left)![/animation-element]
  [animation-element effect="slide_from_right"]Hello World (from right)![/animation-element]
  [animation-element effect="slide_from_bottom"]Hello World (from bottom)![/animation-element]
[/animation-set]

= Example =

* Images flying in from the left, with half a sec delay in between.
* Each animation takes 1.5 seconds.
* The container DIV gets a css class attribute for custom styling purposes.


[animation-set effect="slide_from_left" time="1.5" ease="Bounce.easeIn" delay_increment="0.5" class="myCssClass"]
  [animation-element]<img src="myImage.jpg">[/animation-element]
  [animation-element]<img src="myImage.jpg">[/animation-element]
  [animation-element]<img src="myImage.jpg">[/animation-element]
  [animation-element]<img src="myImage.jpg">[/animation-element]
[/animation-set]


= Example =
* Text rotates 360 degrees in 1.5 seconds.

[animation-set effect="rotate" time="1.5" rotation="360"]
  [animation-element]Hello World[/animation-element]
[/animation-set]

= Example =
* Fade in the page title and afterwards, fade in the content below the title
* Total animation time is 1.5 seconds

[animation-set effect="fade_in"]
  [animation-element time="1.5"]<h1>My Page Title</h1>[/animation-element]
  [animation-element time="1.5" delay="1.5"]
      <p>Here is some more content that will be faded in later</p>
      <p>Enjoy</p>
  [/animation-element]

[/animation-set]

== Frequently Asked Questions ==

= Can I add a question to this FAQ? =

Yes, please send me a message via www.fides-it.nl/contact :)

== Screenshots ==

-

== Upgrade Notice ==

-

== Changelog ==

* v1.0 - Maiden voyage






















