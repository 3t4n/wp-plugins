=== AMP Sidebar Hamburger Menu ===
Contributors: jamesosborne
Tags: amp-sidebar, amp sidebar, navigation menu, navbar, amp navigation, hamburger dropdown, dropdown navigation menu
Requires at least: 4.0
Tested up to: 5.5.3
Stable tag: 1.2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

If you're using a WordPress theme that is not AMP compatible you may find your JavaScript based navigation menu isn't working. This plugin provides you with an easy to implement fix. 

It works in both AMP and non AMP, using an optional jz-sidebar shortcode or a code snippet into your existing hamburger menu.

If you're using the <a href=”https://wordpress.org/plugins/amp/”>official AMP plugin</a> there are options to  display the button on AMP URLs only, and it works in reader mode without having to add a shortcode or place a snippet. Install, active and check your AMP URLs. 

If you're using AMP in transitional or standard mode check the FAQ's below, or follow the instructions in the settings tab after installing. 

<strong>Features: </strong>

<ul>
	<li>Easy to setup</li>
	<li>Works in AMP and non AMP</li>
	<li>Fast load, optimal performing</li>
	<li>Unlimited hamburger toggle color options</li>
	<li>Options for rending in desktop and mobile</li>
	<li>Bloatware free, non intrusive</li>
<li>Completely free </li>
</ul>

== Installation ==
<strong>Using The WordPress Dashboard</strong>

1. Install as a typical WordPress plugin (from the WordPress repository or via a file upload)
2. Activate the plugin through the 'Plugins' menu in WordPress
3. After activating the plugin you'll see a "AMP sidebar" menu within the “Settings” tab
4. Insert the shortcode via a page builder using <pre><b>[jz-sidebar]</b></pre>or insert into your theme files using 
<pre><code><?php echo do_shortcode('[jz-sidebar]'); ?></code></pre>

Note: If you prefer to use your existing navigation menus button simply add the following attributes to your navigation button:
<pre><code><?php echo do_shortcode('[jz-navbarattribute]'); ?></code></pre>
<i>Note: You should perform the above using a child theme, so any changes don't get overwritten. As an alternative to the shortcode above if you wish to add the attributes directly into your navigation menu you can apply the below attribute into your existing button:</i><br/>
<pre><code>on="tap:sidenav.open" role="button" tabindex="0" </code></pre>


<br />

== Frequently Asked Questions ==

= How does it work? =
After assigning a menu to the newly created "AMP Sidebar" location there are different ways to apply the navigation menu. One method is to use a <b>shortcode</b> to into your favourite code editor (or widgets as of WordPress 4.9). 
<pre><code>[jz-sidebar]</code></pre>

If you wish to place the shortcode <b>into your theme templates</b> you can do so by adding the below, wherever you choose. For best results find the location of your existing hamburger menu, and apply the following:
<pre><code><?php echo do_shortcode('[jz-sidebar]'); ?></code></pre>

If you want to use your <b>existing hamburger menu</b> for AMP URLs and use this plugin the below can be added as an attribute to your existing button. Please backup your site first:
<pre><code>
<?php echo do_shortcode('[jz-navbarattribute]'); ?>
</code></pre>

= Can I use my existing themes navigation button / hamburger menu? =
Sure, you'll need to add the below code snippet in between your button markup. If you’re unable to locate your themes navigation menu button check with your theme developer. You simply need to add the below in as an attribute to your existing button. 
<pre><code>
<?php echo do_shortcode('[jz-navbarattribute]'); ?>
</code></pre>

= I don't know where to place it in my theme files? =
If you’re unsure where to place the data attribute to use with your existing navigation menu check with your theme developer. 

Bear in mind this plugin may not be required at all if your theme supports AMP. So be sure to ask your theme developer if they have AMP compatibility plans first. 

= Should I use a child theme? =
Using a child theme is highly recommended. You never know when things go wrong. In addition to safeguarding against mishaps theme updates won’t overwrite your additions.

= Should I perform a backup first? =
Of course, performing regular backups is general best practice. I don't take any responsibility for site issues due to misconfiguration, or shortcode misplacement. 

= Can I use this plugin for my non AMP site? =
Good question - yes, you can. If you are looking to use this for your non AMP site you should select the “AMP & Canonical” option from the configuration settings. You’ll need to place the shortcode or navigation menu attributes into your theme files (preferably via a child theme)

= I'm using AMP in reader mode, where do I apply the code snippet or shortcode? = 
If using the AMP plugin in reader mode you are making use of the AMP plugins classic templates. The hard work is all done, simply install and activate the plugin before checking your reader mode AMP urls. 

<i>One thing to note when using reader mode, the amp-sidebar hamburger menu will not be added to your non AMP urls until you place the shortcode into your child themes templates. The “AMP & Canonical” option is redundant, unless of course you decide to add the shortcode to your theme. </i>

= Can I use it to replace my existing WordPress menu? =
Sure, but you’ll have to locate your existing navigation menu and replace it with this hamburger menu. Note that this plugin only offers a hamburger menu. There is no support for a horizontal dropdown menu. 

= I don’t like the styling, how do I change it? =
You can apply CSS as you would normally, to your active themes style.css file,your themes “custom CSS” field, or preferably a custom plugin. 

= It's not working, what can I do? = 
Perform the following checks or considerations:
<ol>
<li><b>Are you viewing from mobile?</b> </li>
<li><b>Did you assign your menu to the AMP sidebar menu location?</b> </li>
<li><b>Did you place the shortcode into a visible part of your site?</b> </li>
<li><b>Did you tick the checkbox in your menus screen?</b> If you’ve set the option to display the hamburger menu in AMP URLs only make sure you're checking from an actual AMP url. You can use the <a href=”https://chrome.google.com/webstore/detail/ampinspect/igdigflifnjnhooafgglmeefikobalhk?hl=en”>AMPinspect Chrome extension</a> to view your AMP URLs, or the AMP plugins preview, admin bar link.</li> 
<li><b>Did you insert the shortcode/navigation snippet in the correct place?</b> If you added a shortcode to your content (ie. widgets) are you sure that widget appears on the URL you are checking? If you added a shortcode to your theme files directly you will need to ensure it’s correctly placed. Feel free to open a support topic if you have any problems. </li>
<li><b>Did you insert the AMP button code snippet into the correct theme button?</b> You may be using a complex theme, with different menus based on different devices.</li> 
<li><b>Are you using the correct theme?</b> When adding code snippets to your theme templates do you have that template active? If using a child theme you may need to add the code snippet to your parent theme, depending on how you setup your child theme.</li> 
<li><b>Check your defined menu colour!</b> By default the navigation/hamburger menu button is a light black colour. This might not suit your site/menu background if also black. A black menu on a black ground = invisible! </li>
</ol>

= I love it, do you have any other tips for my AMP site? =
If you’ve just got your navigation menu working in your non compatible theme (via this plugin) be sure to also check whether your search button is working, along with your back to top button. If your back to top isn’t working it may be JavaScript based, checkout <a href=”https://wordpress.org/plugins/css-only-back-to-top-button/#installation”>this solution</a>. We’ll have a search box plugin released soon. 

If you manage to get your incompatible site working it would be great to hear from you. Share a review with your site URL, or get your AMP site listed on the plugins website <a href=”https://amp-wp.org/showcases/”>showcase.</a> 

= Where can I download the AMP plugin? =
You can checkout the plugin on the <a href="https://wordpress.org/plugins/amp/">WordPress repository</a>. Alternatively visit the plugin website, <a href=”http://www.amp-wp.org”>www.amp-wp.org</a>. If you can’t configure as expected leave a support question for the team to assist. Don’t be one of those guys leaving a review without having raised a support topic. 

= Where can I find out more about AMP? 
The best place to find out more is amp.dev. Other useful resources below:
- <a href="http://www.amp-wp.org">www.amp-wp.org</a>: The official plugin website. 
- <a href="https://www.youtube.com/channel/UCXPBsjgKKG2HqsKBhWA4uQw">The AMP Channel</a> on YouTube
- <a href="https://amphtml.slack.com">AMP</a> on Slack



== Screenshots ==

1. Settings Screen
2. Example button

== Changelog ==

= 1.0 =
* Initial release

= 1.1.0 =
* Corrected plugin link and minor changes
 
= 1.2.0 =
* Improved reader mode position
* Removed duplicate option call 
* Modified text and added styling to sidebar message which appears when users don't assign a menu 
* Changes to the way the plugin uses amp-components when the AMP plugin is inactive
 
