=== 2mee Human Hologram Player ===

Contributors: agneya2001, gerardallan
Tags: 2mee, human hologram player, holocapsule, holopush, appear2me
Initial version: 0.0.3
License: GPLv2 or later
Requires at least: 5.0
Tested up to: 5.9
Stable tag: 1.0.0

The world's first human hologram instant messaging platform for mobile and web.

== Description ==

90% of all messages fail to register with the target audience because they don’t stand out from the visual noise and clutter. Even standard video messaging. 
[2mee’s])(https://www.2mee.com) Instant Human Hologram Messaging is an extraordinarily powerful communications tool.

It automatically cuts the person out from the background, removing the visual clutter, and places them in the familiar context of your phone or website so that they dominate the screen.
No distractions. Just pure engagement and attention to the message. Absolute attention guaranteed.

== Installation ==

Upload the 2mee human hologram messaging plugin to your wordpress website, then activate the plugin. You will then need to login to the 2mee platform and go to settings.
In settings you will be able to gather your WebID, once you have your WebID enter this in the wordpress plugin.
In the WordPress settings, you can also control the default position of the 2mee human hologram player.
This will enable Global and page specific messages on all the pages. To fine tune for specific page use shortcodes as

__Fixed messages__:
   You can display fixed messages using a button press or load it in an iframe. 
   
  * For placing a button use the following shortcode:

    `[hologram message_name="mesg_name" type="button" button_text="Press Me" link="https://2mee.com" class="btn btn-info"]`
        mesg_name is the name of the HoloCapsule
        type=button indicates a button  
        button_text, this field will customize the button text 
        class parameter is provided to further customize the iframe using css
        link is a url that will open up if the viewer click on the playing message.


  * For an iframe, i.e inplace message, use the following:

    `[hologram message_name="mesg_name" type="inplace"  class="iframe class"]`
        mesg_name is the name of the HoloCapsule
        type=inplace indicates a iframe to play the message in place  
        class parameter is provided to further customize the iframe using css


__Global and Topic-specific messages__:
 
 Global messages are enabled by default on each page, use of global=false disables the global message for that page only. Position of these shortcode tags do not matter much but preferably place them
 in place that is easier to locate and manage.

 * Default: Plays all global messages and page-specific messages

    `[hologram global="true"]`

 * Following plays all default messages and also messages corresponding to "women", "red" and "cap" topics. For more on topics refer to 2mee documentation. 

    `[hologram global="true" topics="women,red,cap"]`
 
 * Following disables all default messages.
  
    `[hologram global="false"]`
 
 * Following disables all default messages and only allow topics messages for topics mentioned in topics field.
 
    `[hologram global="false" topics="women,red,cap"]`
    
For more information check out [docs](https://docs.2mee.com/documentation/wordpress)

 == Frequently Asked Questions == 
 
 FAQ: coming soon
 
== Upgrade Notice == 

 = 1.0.0 =
 
  Changes to readme

 = 0.0.3 =
 
  Changes to readme
  
 = 0.0.1 =
 
  Initial submission

== Screenshots == 

1. Screenshot-one Caption
2. Screenshot-two Caption



== Changelog ==

 = 0.0.1 =

    * Initial submission to wordpress plugin directory on 18 November 2020.
    
 = 0.0.2 =

    * readme.txt changes

 = 0.0.3 =

    * readme.txt changes
    
 = 1.0.0 =

    * wordpress version udate
    * stable, tested
    