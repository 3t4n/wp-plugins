=== Plugin Name ===
Contributors: mibrahim74
Donate link: http://www.clker.com/blog/category/gnuplot-plugin/
Tags: gnuplot, charts, graphs, plot, scientific, curves
Requires at least: 2.5
Tested up to: 2.6
Stable tag: 1.0

Embeds GNUPlot charts inside your Wordpress posts, without the need
for GNUPlot on your webhost.

== Description ==

GNUPlot plugin allows you to draw charts inside your wordpress
posts. The plugin will search the post for tags [gplot] and
[/gplot]. Any thing in between will be used as a GNUPlot script, and
resulting image will be placed in place of your tags.

The plugin communicates with a special version of GNUPlot hosted at
clker.com, which means that you don't need to have GNUPlot on your
system.

Not all the GNUPlot commands are allowed. All commands that will
result in execution, shell, reading or writing from the server are
disabled in the hosted version. The size of the chart is limited as
well to avoid excessive CPU usage.

After your plot is generated, the plugin caches the result locally in
wp-content/cache. You will need to make sure that this directory
exists and is writeable by your webserver.

== Installation ==

1. Unpack the plugin
1. Create a directory called 'cache' under 'wp-content'
1. Make sure this directory is writeable by your webserver
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Do I need GNUPlot on my system/webhost? =

No.

== Screenshots ==

1. A 3D output of two dougnuts
2. A sine wave curve

== Arbitrary section ==

== A brief Markdown Example ==

See [GNUPlot plugin examples](http://www.clker.com/blog/category/gnuplot-plugin/ "GNUPlot plugin examples") .
