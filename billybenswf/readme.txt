=== BillyBenSWF ===
Contributors: Billyben
Tags: SWF, flash, Embed, include, flashvar, attributes, parameter, easy
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=legendreben%40hotmail%2efr&item_name=BillyBen%20Ringt%20WordPress%20Widget&no_shipping=0&no_note=1&tax=0&currency_code=EUR&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8
Requires at least: 2.8.1
Tested up to: 3.1.3
Stable tag: 1.1.0

Simple shortcode for swf/flash embedding. Autodetect original size. Can set size, object id+class, flashvar, attributes and parameter.

== Description ==


Here is a simple shortcode to include swf in your articles. You just have to give the address of the image (absolute or something that approximates to be relative), and the swf is inserted in your article to its own dimensions. Of course you can change these dimensions through the shortcode. You can also provide flashvars and change the parameters and attributes of the object. You can specify an id and/or class for the html object created.

It use swfObject2 (javascript) for swf embedding in the html page. 
  
**Requirements** 
  
It require Javascript enabled, php 4 (not sure).

You can also visit <a href="http://asblog.etherocliquecite.eu/?page_id=738&lang=en">Plugin Page</a>  

== Installation ==

1. Upload the "BillyBenSWF.zip" file. 
2. Unzip the content
3. Copy the "BillyBenSWF" folder to your wordpress pluging folder
4. Activate the plugin through the "Plugins" menu in WordPress  
That's all, use then shortcode in your post.

== Frequently Asked Questions ==

= I can't embed Twice the same swf ? =
Solution : provide a différent "id" for each one by the id shortcode parameter. It happens beacause the flash object id is build by default with the swf name.

Please Ask! <a href="http://asblog.etherocliquecite.eu/?page_id=738&lang=en">Plugin Page</a> or <a href="http://asblog.etherocliquecite.eu/?page_id=612/billyben-swf/">Plugin forum</a> 


== Screenshots ==

== Changelog ==

= 1.1.0 =
* add option page to set default values (default folder, default minimal FP version, default default content)
* french traduction... (of the option page)
* help & about page

= 1.0.2=  
* small copy/paste mistake.... (fix incompatibility with BillyBenRing...)

= 1.0.1=  
* add minimum flash player version parameter

= 1.0.0=  
* Shortcode enable for swf embed

== Options description == 
or visit <a href="http://asblog.etherocliquecite.eu/?page_id=738&lang=en">Plugin Page</a> 

eg, swf URL : http://www.monsite.com/wp-content/uploads/2011/09/monSWF.swf

Define default settings to the option page. Default folder is the basis for relative url. However, if default folder is "http://www.mysite.com/wp-content/uploads/2011/09/"
and you want access to "http://www.mysite.com/wp-content/mySWF/myswf.swf", you can write : "wp-content/mySWF/myswf.swf".

= ShortCode Simple use=

The parameter to provide to the shortcode is \“movie\“, and accept differents url :

[BB_SWF movie="http://www.monsite.com/wp-content/uploads/2011/09/monSWF.swf"] 

[BB_SWF movie="/wp-content/uploads/2011/09/monSWF.swf"] 

[BB_SWF movie="wp-content/uploads/2011/09/monSWF.swf"] 

[BB_SWF movie="/uploads/2011/09/monSWF.swf"] 

[BB_SWF movie="uploads/2011/09/monSWF.swf"]


If the url is not absolute, it always will point to the directory "http://www.monsite.com/wp-content/, you just have to complete.

This also works if the wordpress installation directory is not the root of your site, eg:

“http://www.monsite.com/monWP/wp-content/"

To insert a swf from another domain, or some other directory than wp-content, just provide an absolute url.

= General Settings=

1/ You can provide a width and height for the swf by the parameters width and height.

[BB_SWF movie="uploads/2011/09/monSWF.swf" width="200" height="300"]

If one of these two parameters is missing it will be automatically adjusted to the original swf size.

2/ You can also specify an id and a class to the object inserted, so you can play with css, by the parameters id et class :

[BB_SWF movie="uploads/2011/09/monSWF.swf" id="monSwfId" class="swfClassEmbed"]

If the id is not specified, it is automatically set to: “bbSWFId"+name of the swf

3/ You can specify the minimm flash player version by the "minfp" parameter :

[BB_SWF movie="uploads/2011/09/monSWF.swf" minfp="10.0.0"]

By default it's set to 9.0.0

= FlashVar =

You can provide flash vars to the imported swf by the parameter"flashvar“. Different pairs name/value must be separated by the caracter “&" or “|". Pairs name/value could be of the form name1=value1 or name1:value1.

[BB_SWF movie="uploads/2011/09/monSWF.swf" flashvar="name1=value1&name2:value2|name4=value4"]

= Advanced Settings =

**1/ Changing Attributes**

You can modify attributes by the parameter “attributes“, pairs name/value must be separated by the caracter “&" or “|" or “,", and associated by “=" ou “:".

[BB_SWF movie="uploads/2011/09/monSWF.swf" attributes="name1=value1&name2:value2|name3=value3,name4=value4"]

for example, to change the alignment of the object:

[BB_SWF movie="uploads/2011/09/monSWF.swf" attributes="align:left"]

**2/ Changing parameters**

VYou can modify parameter by “params“, pairs name/value must be separated by the caracter “&" or “|" or “,", and associated by “=" ou “:".

For example for a transparent swf (we play on the wmode) and scripts access modification :

[BB_SWF movie="uploads/2011/09/monSWF.swf" params="wmode:transparent&allowscriptaccess=always"]

In short, you can edit all the usual parameters.