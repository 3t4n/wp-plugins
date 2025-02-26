=== Announcement Banner ===
Contributors: agehman
Plugin Name: Announcement Banner
Donate link: https://www.minddnd.com/
Tags: announcement, banner, notification, bar, notice
Requires at least: 4.7
Tested up to: 6.0
Stable tag: 1.2
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display a banner at the top or bottom of your WordPress site.  

== Description ==

The Announcement Banner plugin displays a notification banner at the top or bottom of your website. The settings page allows the user to set the banner to either fixed or relative position, choose background and text color, make the text linkable, toggle the banner on and off, add a close button, and even add custom CSS. 


== Installation ==

1. Install the Announcement Banner plugin either via the WordPress plugin directory, or by uploading the files to the /wp-content/plugins/ directory. 
2. Activate the plugin in the Plugins page in WordPress. 
3. The Settings page for Announcement Banner can be found in the admin menu under Settings > Announcement Banner. 


== Announcement Banner Features ==

* Choose the background color and text color of the announcement banner.
* Display the banner at the top or bottom of the page in fixed or relative position. 
* Add an optional ‘Close’ button to the banner. 
* Close Button Duration setting that keeps the banner closed for a custom number of days.
* Set a fixed banner height in pixels.
* Custom message including HTML tags.  
* Link the entire banner text (optional)
* Toggle the banner on and off. 
* Add your own custom CSS. 


== Plugin Settings ==

* Show Announcement Banner - Turn the Announcement Banner on (Yes) and off (No) as needed. The banner will be off by default when installed. 
* Announcement Banner Position -The fixed setting will pin the banner to the top of the screen. It will stay pinned to the top even when scrolling. Relative will keep the banner in its normal position and it will scroll with the page.
* Announcement Banner Placement - The default Announcement Banner placement is at the top.
* Background Color and Text Color - This field will accept Hex code (Ex: #000000) or supported color name (Ex: black). Default background color is white. (#FFF)  Default text color is dark gray. (#333)
* Banner Height - Add a fixed height in pixels to the banner.  
* Top Padding - Add top padding the body element when the Announcement Banner is displayed. This can be useful when the banner is set to position: fixed.
* Close Button - The close button will hide the banner on click. The button will appear on the right side of the banner. 
* Close Button Duration - Set the amount of days the banner until the banner reappears after the user clicks the close button. 
* Announcement Banner Message - Enter your text for your announcement. HTML is allowed. 
* Make Message a Link? - Make the full text of the announcement banner message a link. 
* Link URL - URL for the message link. This will only work if Make Message a Link setting is set to Yes. 
* Custom CSS - Add your own custom CSS. 


== Frequently Asked Questions ==

=  Announcement Banner Doesn’t Show Up =

Check the Show Announcement Banner setting and make sure it is set to “Yes.” The Announcement Banner is off by default. If the banner is on, check to see that you have set some text in the Announcement Banner Message field. 

=  Announcement Banner is at the bottom even though I have Announcement Banner Placement set to top =

Check for any Javascript errors in the console. There may be a conflict. 

=  The WordPress Admin bar is hiding part of my banner when I have it set to fixed at the top=

Try adding the following to the Custom CSS field:

.admin-bar.minddnd-wa-announcement-fixed-top .minddnd-wa-announcement-wrap {
  top: 32px;
}

@media only screen and (max-width: 782px) {
  .admin-bar.minddnd-wa-announcement-fixed-top  .minddnd-wa-announcement-wrap {
    top: 46px;
  }
}


== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is stored in the /assets directory.
2. This is the second screen shot

== Changelog ==

= 1.0.0 =
* This is the initial version.

= 1.0.1 =
* Fixed issue with relative position at the bottom of the page when close button is enabled.  

= 1.1.0 =
* Added close button duration optional setting to prevent banner from reappearing for a set number of days after a uses closes the banner. 

= 1.2.0 =
* Added box-sizing:border-box to prevent banner from extending outside the viewport on themes without a universal box-sizing: border-box value setting. 

== Upgrade Notice ==

= 1.0 =
Upgrade notices describe the reason a user should upgrade.  No more than 300 characters.