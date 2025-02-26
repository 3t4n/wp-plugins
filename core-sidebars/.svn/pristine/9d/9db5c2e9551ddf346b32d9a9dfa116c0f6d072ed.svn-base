-----------------------------------------------------------------
The Basics
-----------------------------------------------------------------
Plugin Name: Core Sidebars
Plugin URL: http://www.nexterous.com/scripts/coresidebars.php
Description: A plugin that enables you to have dedicated content and/or widget sidebar 
for each specific page or post. For example, on a featured blog post you may want to 
place additional contact while on a calendar page you might want to place a calender 
widget or some text events or both.
Version: 1.0.0
Author: Daniel
Author URL: http://www.nexterous.com

-----------------------------------------------------------------
License: GNU General Public License
Check out a full copy of the license at http://wordpress.org/about/gpl/
-----------------------------------------------------------------

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
-----------------------------------------------------------------	
Note: 
-----------------------------------------------------------------	

By using this script, you are at your own risk. By using it, you 
agree to not hold me responsible for any errors or damages.

ALSO:
This plugin is ONLY for Wordpress 2.5+. It will not work with lower 
versions and may in fact corrupt the data in older versions. Please 
stay up to date with both Wordpress and this plugin.

-----------------------------------------------------------------
Instructions: 
-----------------------------------------------------------------

1. Upload the directory /core-sidebars/ into your Wordpress directory 
under /wp-content/plugins/

2. Open your adminstration panel and go to Plugins and activate 
it by clicking Activate next to the description of Core Sidebars.

3. You are now able to begin using the plugin. Go to the Manage menu 
to edit a post or a page or write a new page or post. Either way, you will find 
a new meta box entitled "Sidebars and Widgets". Click to open and then you will 
find the two boxes to enter your content. HTML is allowed in the content box.

4. To include the data in the function, delete everything inside your 
sidebar.php except for your style container. Now, using add this PHP 
code by customizing it to your needs.

/* Code for Core Sidebars */

$sboptions = array(
			'order' => 'title-content-widgets', // the order of the features, you may omit any but you need at least one to run the code
			'before_title' => '<h2>', // What to add before the sidebar title
			'after_title' => '</h2>', // What to add after the sidebar title
			'before_content' => '<div id="sidebarcontent">',  // What to add before the sidebar content
			'after_content' => '</div>'); // What to add after the sidebar content
		coresidebar($sboptions);
		
/* End of Code for Core Sidebars*/
		
-----------------------------------------------------------------
Enable Widget Support:
-----------------------------------------------------------------

Widget support is enabled by default and you do not have to add 
any code. The only recommended change is that you go to your template's 
functions.php file and remove any coding containing a function 
similar to the one below.

/* Code to remove */

if ( function_exists('register_sidebar') )
    register_sidebar();

/* End of code to remove */

-----------------------------------------------------------------
Note:
-----------------------------------------------------------------

When using this plugin instead of Page Sidebars, this plugin will 
overwrite any of the widget configurations previously used. Also, 
do NOT use this script with Page Sidebars as it will lead to 
compatibility issues.

-----------------------------------------------------------------
Security Notice:
-----------------------------------------------------------------

The plugin takes all reasonable measures to protect its user and 
its files. Input to the database is sanitized and Wordpress takes 
care of all permission related issues. Please keep up with the 
latest version of the plugin. If there are any security issues, 
please report them on my website or contact me at my site. 

-----------------------------------------------------------------
Change Log:
-----------------------------------------------------------------

v.1.0.0 (Feature Changes from Page Sidebars)
	- Initial release script
	- Combined page sidebars plugin with new feature of posts as well
	- Improved widget handling/support from Page Sidebars
	- Only for Wordpress 2.5 (new functions/actions used)
	- Added action for when posts are deleted
	- Added support for widgets by default without any code editing
	- Add function to call specific sidebar
	- Improved overall coding and engine
	
-----------------------------------------------------------------
Credits:
-----------------------------------------------------------------

http://scompt.com/
	- Tutorial on editing the page/post managing screen
		(http://scompt.com/archives/2007/10/20/adding-custom-columns-to-the-wordpress-manage-posts-screen)
	- Manage Pages Custom Columns Plugin  
		(http://scompt.com/projects/manage-pages-custom-columns-in-wordpress)
	
-----------------------------------------------------------------
Thank you for using Core Sidebars.
-----------------------------------------------------------------