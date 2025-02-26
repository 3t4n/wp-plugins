=== AHAX ===
Contributors: veloper
Tags: ajax, ahax, theme, plugin, development, action, bind, JavaScript, public, dependancy
Requires at least: 2.8
Tested up to: 3.1
Stable tag: 1.0

A plugin that provides easier access to AJAX functionality within plugins and themes.

== Description ==

AHAX is a drop-in solution that allows theme or plug-in developers to take advantage of a very simple and streamlined way of making AJAX requests.

The goal of this plugin is to  make the process of setting up an AJAX request simple as possible.

This plugin centers AJAX requests around an "action." This action is "bound" to a function (handler) on the back-end and called to from front-end via a custom JavaScript class method -- this process is demonstrated below.

= Back-End =
    ahax::bind( 'get_random_number', 'generate_number' );
    function generate_number($output) {
        $max = abs( ( int ) $_POST['max'] );
        $output = mt_rand( 0 , ( $max <= 1000 ? $max : 1000 ) );
        return $output;
    }
= Front-End =
    var ahax = new AHAX();
    ahax.post( 'get_random_number', { max : 1000 }, function( response ) {
        jQuery( '#ahax_number' ).html( response );
    });

= Website =
http://dan.doezema.com/2011/04/ahax-wordpress-plugin

= Author =
[Daniel Doezema](http://dan.doezema.com)

== Installation ==

1. Upload `ahax` plugin directory to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Where can I get more information on AHAX? =

There is an extensive blog post -- with a live example -- located here: http://dan.doezema.com/2011/04/ahax-wordpress-plugin
