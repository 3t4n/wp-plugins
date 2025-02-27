# Disable Login Language Switcher #

Contributors: ocean90  
Stable tag: 1.0.0  
Requires at least: 5.8  
Tested up to: 6.0  
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html  
Tags: language, login, i18n, clean

Removes the language dropdown from the login screen.

## Description ##

This plugin helps you to declutter your WordPress login screen by removing the language switcher which has been [introduced in WordPress 5.9](https://make.wordpress.org/core/2021/12/20/introducing-new-language-switcher-on-the-login-screen-in-wp-5-9/).

Removing the dropdown makes sense when you only have one additional language installed and don't intend to change back to English for example. In this case you can simply install and activate the plugin. There are no futher settings.

### What does this plugin do? ####

The plugin uses the default [WordPress Hooks API](https://developer.wordpress.org/plugins/hooks/) and disables the language selector with the following one-liner:


    add_filter( 'login_display_language_dropdown', '__return_false' );


## Changelog ##

### 1.0.0 ###
* Initial Release

## Screenshots ##

1. Before
2. After
