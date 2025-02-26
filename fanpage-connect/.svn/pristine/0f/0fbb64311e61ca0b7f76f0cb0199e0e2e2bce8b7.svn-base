<?php
global $wp_filter;
global $post;
?>
<link rel="stylesheet" href="<?php echo FPC_PLUGIN_URL; ?>/css/fpc-admin.css" type="text/css" media="screen" />
<style>
dt { font-weight: bold;}
</style>
<div class="wrap" style="max-width:950px !important;">

	<a href="http://www.fanpageconnect.com/" target="_blank">
		<img src="<?php echo FPC_PLUGIN_URL; ?>/img/fbconnect-logo.png" style="border:none;margin:8px 0px 4px 0px;">
	</a>

	<div id="fpc-fb-like">
		<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.fanpageconnect.com%2Ffanpage-connect%2F&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowTransparency="true"></iframe>
	</div>

	<div class="dbx-content">

		<h2>Fanpage Connect Usage</h2>

		<h3>Setting up Your Facebook Pages &amp; Apps</h3>
		<div id="fpc-accordion1">

			<h4><a href="#">How Fanpage Connect Works with Facebook</a></h4>
			<div>
				<p>
					 <b>Facebook Fan Pages</b> are very simliar to those <a href="http://en.wikipedia.org/wiki/Matryoshka_doll" target="_blank">Russian nested dolls</a>.
					 A <b>Fan Page</b>, above all, holds the page timeline. That's pretty boring. We want to reach our customers, so we need better stuff, like pages.
					 Luckily, <b>Fan Pages</b> can also hold any number of
					 <b><a href="https://developers.facebook.com/docs/appsonfacebook/pagetabs/" target="_blank">Page Tabs</a></b>. <b>Page Tabs</b> are basically the placeholder
					 for <b><a href="https://developers.facebook.com/apps/" target="_blank">Facebook Apps</a></b>.
				 </p>
				 <p>
					 Ok, almost done - stick with me here. <b>Facebook Apps</b> are the bridge between your
					 <b>Fan Page</b> and custom tab content that is hosted on your site. <b>Facebook Apps</b> not only point the <b>Page Tabs</b> to your pages, but they also pass along very important
					 information between facebook and your pages. Information like when somebody likes your page, comments, sends a link, and other things like that.
					 This is the good stuff that lets us build highly interactive and viral <b>Fan Pages</b>!
				</p>
				<p>
					Last but not least, your <b>Fanpage Connect</b> powered pages not only format your pages to fit nicely in the <b>Page Tab</b> frame, it can interact seemlesly with the
					<b>Facebook App</b> to read and use the info it's passing along. They can also bring the power of over
					<a href="http://www.wordpress.org/plugins" target="_blank">26,917 plugins</a> to bear with the simplicity of the WordPress
					editor to help you create some very powerful pages for your <b>Fan Pages</b>.
				</p>
				<p>
					Ready to start? Ok, we're going to bounce around between Facebook and your blog, but we'll keep things as simple as possible. We can get your
					<b>Page Tab</b> up and running in just six steps, and if you keep facebook and your blog open in different browser windows/tabs it makes it much easier.
					Let's begin!
				</p>
			</div>

			<h4><a href="#">1. Create Your Fan Page In Facebook</a></h4>
			<div>
			<p>
				The first thing you'll need to do is create a <b><a href="http://www.facebook.com/about/pages" target="_blank">Fan Page</a></b> if you haven't already.
				Simply follow the prompts to create your page. Once you've selected the type of page you're creating, you'll have three more steps to follow to finish your page creation.
			</p>
			<p>
				In Step one, you'll need to select "Yes" on the radio buttons to continue, but you can skip adding the other info for now if you need to. You can always go back and update that info later.
			</p>
			</div>

			<h4><a href="#">2. Create Your Facebook App</a></h4>
			<div>
			<p>
				Next up, you'll need to head over to the Developer Center to create your <a href="https://developers.facebook.com/apps/" target="_blank">Facebook App</a>.
				Again, just create the app, add the name of your app, enter the Captcha code, and your app is created. At this point, you're only concerned with the
				<b>App ID</b> and the <b>App Secret</b>. We'll need those for the next step.
			</p>
			</div>

			<h4><a href="#">3. Create Your FPC App in WordPress</a></h4>
			<div>
			<p>
				We're assuming you've registered <b>Fanpage Connect</b>, so head over and create a <a href="post-new.php?post_type=fpc-app" target="_blank">New App</a>.
				Here, you'll add a name for your app, and you may want to name it something related to your page for easier use later. If you've got the agency license of
				<b>Fanpage Connect</b> and are hosting pages for clients, you may want to name the app after your clients' fan pages for easier management.
			</p>
			<p>
				At this point, we're only concerned with the App Basics. Copy the App ID and the App Secret from the <b>Facebook App</b> you just created and paste them in the
				settings. If you have the URL of your Fan Page, you can add it at this time as well. Publish your App, and let's move on to creating your <b>Fanpage Connect</b> page.
			</p>
			</div>

			<h4><a href="#">4. Create Your FPC Page in WordPress</a></h4>
			<div>
			<p>
				Now you can create a <a href="post-new.php?post_type=fpc-fanpage" target="_blank">New FPC Page</a>. Again, we're just worried about the basics, so add a title
				and then open the Facebook Page Settings. Here, select the FPC App you just created as the app to use, or another app if you've already created others.
			</p>
			<p>
				Publish the page and then copy the URL of your new page.
			</p>
			</div>

			<h4><a href="#">5. Update Your Facebook App With Your FPC Page URL</a></h4>
			<div>
			<p>
				Ok, we're in the home stretch! Now we need to head back to the <a href="https://developers.facebook.com/apps/" target="_blank">Facebook App</a> screen.
				Click the <b>Edit App</b> button, and where it says <b>"Page Tab"</b>, you'll want to add the <b>Page Tab Name</b> and add paste the URL of your newly created
				FPC Page in the <b>Page Tab URL</b> box.
			</p>
			<p>
				If you have a secure certificae installed on your site, you'll also want to add the secure URL (https) of your FPC Page to the <b>Secure Page Tab URL</b>
				as well. This is important, as Facebook users logged in securely won't be able to see your tab if it doesn't have a secur eURL as well. Sorry, Facebook can
				really suck sometimes. If you need a secure certificate, you can get really cheap ones at the
				<a href='https://www.thesslstore.com?btoken=VueCLNslOYHR5lYlkUFLIV77ra0xr5AuAaTyCTRv%2bvw%3d' target="_blank" title="Secure Your Fanpage">The SSL Store</a>.
				You can get a Rapid SSL certificate free for 30 days or $11.99/yr. That's cheap!
			</p>
			<p>
				To finish up, add your base domain to the <b>App Domains</b> box, disable <b>Sandbox Mode</b>, then save the changes. One last step!
			</p>
			</div>

			<h4><a href="#">6. Add the Page Tab to Your Fan Page</a></h4>
			<div>
			<p>
				Ok, head back to your blog and <a href="edit.php?post_type=fpc-app" target="_blank">edit the FPC App</a> you just created. See the giant blue button that
				says <b>"Add App to Facebook"</b>? Click it. Follow the prompts to add your <b>Facebook App/Page Tab</b> to your <b>Fan Page</b> and you're done! Now just
				browse to your page and you'll see the newly created tab. Click it, and you'll be looking at your Fanpage Connect powered tab. Congrats!
			</p>
			<p>
				Ok, the more detailed aspects of Apps, Pages and shortcodes will be covered in the rest of the help file, so keep reading to see just what Fanpage Connect can
				really do...
			</p>
			</div>
		</div>

		<h3>Fanpage Connect App Settings</h3>
		<div id="fpc-accordion2">

			<h4><a href="#">Facebook App Basics</a></h4>
			<div>
				<h5>Facebook App ID &amp; App Secret</h5>
				<p>
					The App ID (and App Secret) are what Facebook requires in order for the page to know when it's been liked, when a comment has been made, or do any
					number of things. Without the App ID and Secret, your pages will be "dumb" pages incapable of interacting with Facebook. You can get your App ID and
					App Secret in your <a href="https://developers.facebook.com/apps/" target="_blank">Developer's App Page</a> on Facebook.
				</p>
				<h5>App Language</h5>
				<p>
					This will set which language your <a href="http://developers.facebook.com/docs/plugins/" target="_blank">social plugins</a> will be in.
					Default is US English.
				</p>
				<h5>Facebook Page URL</h5>
				<p>
					Enter the URL of your fanpage (http://www.facebook.com/your_page_name).
					If you want to bypass the timeline (desireable) and send users directly to a particular tab of your page, enter the URL of the tab
					(http://www.facebook.com/your_page_name?v=app_123456789). When a Facebook user likes your page, comments on that tab, or sends the link to another
					user, this is the link that gets used. This is powerful viral mojo!
				</p>
				<h5>Facebook Page Admins</h5>
				<p>
					In order to edit and moderate comments on the page, you'll need to enter the ID of any Facebook users who have access to the page.
					Enter a comma delimited list of Facebook IDs of your page admins. Need your ID?
					Click <a href="http://developers.facebook.com/tools/explorer/" target="_blank">here</a>. To add other users as pag eadmins, head to your page and
					click "Edit Page", then select "Manage Admin Roles". From there, you can add your friends or other users as administrators.
				</p>
				<h5>Add App to Facebook</h5>
				<p>
					Once you've created your Facebook Page and Facebook App, you'll need to add the App/Page Tab to your Fan Page.
					If you've entered the App ID and App Secret, the button will be enabled, and clicking it will launch the Add Page Tab dialog on Facebook.
					From there, just follow the prompts.
				</p>
			</div>

			<h4><a href="#">Widget Options</a></h4>
			<div>
				<h5>Number of Widgets for the App</h5>
				<p>
				<a href="widgets.php" target="_blank">Widget Areas</a> are also known as Sidebars. Fanpage Connect allows you to create up to 6 widget areas/sidebars
				per FPC App. What this means is that for any FPC Page you create under an app, you can use any combination of that app's siderbars in your
				fan page header, footer and sidebar. This allows unprecedented layout control beyond what most themes can do!
				</p>
				<h5>Base Widget Name</h5>
				<p>
				This is a human readable name for your App's sidebars. When you go to add widgets to the sidebars, you'll want to have a recognizable siebar name.
				You should name the sidebars simliar to the app's name for easy management.
				</p>
			</div>

			<h4><a href="#">Miscellaneous Options</a></h4>
			<div>
				<h5>Link Luv</h5>
				<p>
					If you decide to give us "link luv", a small link to FanpageConnect.com will be placed in the footer of your Fan Pages. We appreciate it!
					Be sure to combine Link Luv with your <a href="http://pfriedl70.reseller.hop.clickbank.net/" target="_blank">ClickBank ID</a> to make
					affiliate commissions off your fan page traffic.
				</p>
				<h5>ClickBank ID</h5>
				<p>
					See above. Having Link Luv enabled with a valid <a href="http://pfriedl70.reseller.hop.clickbank.net/" target="_blank">ClickBank ID</a>
					will automatically format the link so that you can make an affiliate commission should someone click the footer attribution and then
					buy their own copy of Fanpage Connect. If you need a ClickBank ID, click
					<a href="http://pfriedl70.reseller.hop.clickbank.net/" target="_blank">here</a>.
				</p>
			</div>

			<h4><a href="#">Filter Removal Options</a></h4>
			<div>
				<p>
					Most of the time, you don't need to tinker with these options. However, you may find that a particular plugin is adding content or
					modifying your existing content in a way that you don't want. For example: SexyBookmarks adds social sharing buttons to your content.
					While great for your blog, it doesn't exactly work for a fan page.
				</p>
				<p>
					Check the items you wish to DISABLE. If you don't know what the filter in question does, then it may be best to leave it alone!
				</p>
				<p>
					Suggested filters to disable (if they're available in your WP install):
					<ul>
					<li>noindex</li>
					<li>feed_links</li>
					<li>feed_links_extra</li>
					<li>rsd_link</li>
					<li>rel_canonical</li>
					<li>wp_shortlink_wp_head</li>
					<li>wp_admin_bar_header</li>
					<li>_admin_bar_bump_cb</li>
					<li>wp_admin_bar_render</li>
					</ul>
				</p>
			</div>
		</div>

		<h3>Fanpage Connect Page Settings</h3>
		<div id="fpc-accordion3">

			<h4><a href="#">Facebook Page Settings</a></h4>
			<div>
				<h5>Facebook App to Use</h5>
				<p>
					This is what ties your fan page to your app, which lets you use fan gates, like buttons, and all the social plugins Facebook offers. Select the
					app you want this page associated with, and it'll inherit the settings from the app. An app must be selected for your pages to work properly, otherwise
					they act as standard web pages.
				</p>
				<h5>Rediect on Like</h5>
				<p>
					This option allows you to enable "Fan Gating". This is a method where you can present a call to action to like the page in order to get additional
					content, like a video, report, coupon or download. Selecting <b>No Redirect</b> makes the page act like a normal fan page, where selecting other
					published fan pages or adding a custom URL will redirect to that page when a user likes the fan page.
				</p>
				<p>
					<b>Note:</b> With fan gating enabled, the user will <u>always</u> be redirected to the target page once they've liked the page. You will also not
					want to use the Lightbox Gate option if you're going to use a redirect. One or the other is good.
				</p>
			</div>
			<h4><a href="#">One Click Opt-In Settings</a></h4>
			<div>
				<h5>Email System</h5>
				<p>
					You can currently select between <a href="http://www.fanpageconnect.com/go/aweber" target="_blank">Aweber</a> and
					<a href="http://www.fanpageconnect.com/go/mailchimp" target="_blank">MailChimp</a>. GetResponse is coming soon!
					Depending on your choice, you'll be presented with some options for that email system.
				</p>
				<h5>Success Redirect</h5>
				<p>
					When the user opts in to your list, the'll be redirected to this URL
				</p>
				<h5>Abort Redirect</h5>
				<p>
					Should the user deny your app access to their email and/or publish permissions, they'll get redirected to this URL. If the allow email and
					deny publish permissions, they'll setill get redirected to the success URL.
				</p>
				<h5>Post to Timeline</h5>
				<p>
					Here you can decide whether or not you want to post a message to the user's timeline once they opt-in.
				</p>
				<h5>Message, Link &amp; Picture</h5>
				<p>
					This information is used to post a message to the user's timeline once they've opted into your list.
				</p>
				<p>
					<b>Note:</b> One Click Opt-In Settings work in conjunction with the [oneclickoptin] shortcode. One can not work without the other!
				</p>
			</div>
			<h4><a href="#">Open Graph Settings</a></h4>
			<div>
				<p>
					According to Facebook <em>"The Graph API is a simple HTTP-based API that gives access to the Facebook social graph, uniformly representing objects
					in the graph and the connections between them. Most other APIs at Facebook are based on the Graph API"</em>. Basically, it helps identify
					your page in Facebook complete with a site title, thumbnail and category and helps users find you when searching Facebook.
				<h5>Title</h5>
				<p>
					Easy enough - this is the title of your page. If left blank, it uses the title of the fan page you created.
				</p>
				<h5>Type</h5>
				<p>
					Also self explanatory. Just select the category/niche this page targets.
				</p>
				<h5>Site Image URL</h5>
				<p>
					This is a thumbnail that will be used when users send or share your page link, or post a comment on their wall. Make this image at least 50x50 pixels,
					and consider making it eye catching since it shows up in news feeds. This will help gain traffic to your page!
				</p>
			</div>
			<h4><a href="#">Menu Options</a></h4>
			<div>
				<h5>Use Menu in Page</h5>
				<p>
					This option allows you to enable/disable the use of WordPress custom menus in your pages. As fanpages are geared more towards social marketing, don't fall
					into the trap of trying to duplicate your site on facebook. Smaller menus and more focus on the social marketing aspect are the rule here.
				</p>
				<h5>Menu to Use</h5>
				<p>
					You can select what menu to diplsay on each page, and you can use unlimited menus. To create these menus, you'll want to head to the
					<a href="nav-menus.php" target="_blank">Menu</a> option. While you can link to your website based pages, it's best to link to other fan pages.
					<b>Note:</b> to get the FPC Pages to show up as an option in the menu editor, you may have to click "Screen Options" and select "FPC Pages".
				</p>
				<h5>Display Menu</h5>
				<p>
					Here you can decide whether you want to show your menu all the time, or only after the page is liked. If you're using the page as a fan gate or you
					want to limit access to subpages until they've liked the page, select "When Page is Liked".
				</p>
			</div>
			<h4><a href="#">Layout &amp; CSS Options</a></h4>
			<div>
				<h5>Header Content</h5>
				<p>
					To add any content at all to the page header, put the content in this box. It can include any HTML (text, images, etc).
				</p>
				<h5>Footer Content</h5>
				<p>
					To add any content at all to the page footer, put the content in this box. It can include any HTML (text, images, etc).
				</p>
				<h5>Header/Sidebar/Footer Widget</h5>
				<p>
					If you created any widgetized areas in your app, you'll be able to select where to display them here. The visual guide will show you how the layout
					will change based on your selection. To add widgets to your widgetized areas, <a href="widgets.php?widgets=fpc" target="_blank">click here</a>.
				</p>
				<h5>Custom CSS Link/Custom CSS</h5>
				<p>
					If you've created some custom CSS for your pages, you can enter the link to the CSS file here. You can also add inline CSS to the page by pasting it in the
					Custom CSS box.
				</p>
				<h5>Custom Template</h5>
				<p>
					Fanpage Connect come preloaded with some nice, premade templates. Here, you can apply that template to the page and click "preview" to see how that page will
					look once you publish it.
				</p>
			</div>
			<h4><a href="#">Miscellaneous Options</a></h4>
			<div>
				<h5>Custom/Opt-In Form Code</h5>
				<p>
					Here, you can insert any content you may want to add to the page that may be too complex for the WordPress editor (javascript, custom HTML, signup forms).
					This content is inserted anywhere in the page by using the <b>[custom]</b> shortcode.
				</p>
				<h5>Display Comments</h5>
				<p>
					If you're using the comments shortcode, you can decide whether to show the comments on pages all the time, or only when the page has been liked. <b>Note:</b>
					If you have "Allow Comments" enabled in the Discussion meta box, then Fanpage Connect will display the Facebook comments social plugin. So enable
					comments or use the shortcode, but it's best to not use both.
				</p>
				<h5>Link Control</h5>
				<p>
					Links in Fan Pages can look awful weird inside the Facebook iFrame. If you have links to other pages on your site, "add to cart"
					buttons or forms that post to other pages, then you may want to have those links pop into a new window.
				</p>
				<p>
					Enabling these options in your page will automatically force forms and links into a new window. The code is smart though - it ignores
					links with jQuery events, onclick/onmousedown/onmouseup events, links to in-page anchor tags, custom menu items, and forms with no action attributes.
				</p>
				<h5>Page/iFrame Control</h5>
				<p>
					By default, fan pages will redirect a user to the Facebook tab if opened outside the facebook environment. Check this box will allow the pages
					to be viewed outside the page tab. However, we can't guarantee how they'll act if viewed outside the iFrame.
				</p>
			</div>
			<h4><a href="#">Adding Fanpage Shortcodes</a></h4>
			<div>
				<h5>FPC Codes</h5>
				<p>
					Fanpage Connect gives you access to over twenty shortcodes, all with verying paramters. We can't expect you to remember them all, so we made an
					easy to use interface to help out. Just click the "FPC Codes" button next to the "Add Media" button and go nuts!
				</p>
				<p>
					Don't know what shortcodes are? The WordPress Codex has a very good, very short
					<a href="http://codex.wordpress.org/Shortcode" target="_blank" title="What are shortcodes?">explanation</a>.
				</p>
			</div>
			<h4><a href="#">Adding Action Graphics</a></h4>
			<div>
				<h5>FPC Graphics</h5>
				<p>
					Here, you have access to a ton of marketing graphcis for use in your pages - arrows, checkmarks, action phrases, etc. Just click the "FPC Graphics" button
					to select and insert your graphics right into the page editor.
				</p>
			</div>
		</div>

		<h3>Fanpage Connect Shortcodes <a href="http://codex.wordpress.org/Shortcode" target="_blank" title="What are shortcodes?">(?)</a></h3>
		<h3>FanGates</h3>
		<div id="fpc-accordion4">
			<h4><a href="#">fbnotliked</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fbnotliked]Unliked content goes here[/fbnotliked]<br>
					<b>Parameters:</b> n/a<br>
					<b>Description:</b> When a non-logged in user or a logged in user visits your page and hasn't liked it yet, this content will be displayed.
					The content isn't rendered to the page if a user has liked the page. Used with <b>[fbliked]</b>, you can create simple fan gates by offering
					limited content with a message to "Like to read more", or whole secitons of content like opt-in forms, downloads, or videos once the user's
					liked the page. There is no limit to the number of <b>[fbnotliked]</b> areas you can have in a page or what content can be in those areas.
				</p>
			</div>
			<h4><a href="#">fbliked</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fbliked]Liked content goes here[/fbliked]<br>
					<b>Parameters:</b> n/a<br>
					<b>Description:</b> When a logged in facebook user likes your page, this content will be displayed. The content isn't rendered to the page
					if a user's not logged in or they haven't liked the page. Used with <b>[fbnotliked]</b>, you can create simple fan gates by offering
					limited content with a message to "Like to read more", or whole secitons of content like opt-in forms, downloads, or videos once the user's
					liked the page. There is no limit to the number of <b>[fbliked]</b> areas you can have in a page or what content can be in those areas.
				</p>
			</div>
			<h4><a href="#">fblightboxgate</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fblightboxgate]Lightbox teaser content goes here[/fblightboxgate]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>overlay</dt>
						<dd>Enter any hex value to set the color of the lightbox overlay layer</dd>
						<dt>background</dt>
						<dd>Enter any hex value for the color of the lightbox window</dd>
						<dt>border</dt>
						<dd>Any valid border css declaration</dd>
						<dt>width/height</dt>
						<dd>Dimensions of the lightbox in px or em.</dd>
						<dt>class</dt>
						<dd>Any CSS class name of the lightbox.</dd>
						<dt>style</dt>
						<dd>Any inline CSS style for the lightbox. This will override any other settings for background, border or dimensions.
					</dl>
					<b>Description:</b> When activated, the Lightbox can be a very powerful motivator to get users to like your page. Non-logged in users and logged
					in users that haven't liked your page yet will see your page content, but it will be overlayed by an opaque layer, with a content box on top of that.
					The lightbox content should include a call to action to like the page, but it can include a video, graphics, or any content at all. Once the user has
					liked the page, the fan page is exposed and the lightbox no longer shows.<br><br>
					<b>Note:</b> LightBox Gate options are not yet fully implemented - those are slated for a post-release update.
				</p>
			</div>
			<h4><a href="#">fbadmin</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fbadmin]Admin only content goes here[/fbadmin]<br>
					<b>Parameters:</b> n/a<br>
					<b>Description:</b> This content will only render to the screen when a page admin is viewing the page. No other users will ever see this content.
					Useful for in-page notes, pending content, etc.
				</p>
			</div>
		</div>
		<h3>Social Plugins &amp; Viral Karma!</h3>
		<div id="fpc-accordion5">
			<h4><a href="#">fblike</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fblike]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>fanpage</dt>
						<dd>Any URL. Default is the fan page URL.</dd>
						<dt>width</dt>
						<dd>Width of the like box</dd>
						<dt>send</dt>
						<dd>True/false - if true, it adds a send button to the like box</dd>
						<dt>faces</dt>
						<dd>True/false - if true, shows profile pictures of friends who've liked the page</dd>
						<dt>layout</dt>
						<dd>Standard/button_count/box_count - standard is the standard like layout. button_count is a smaller, horizontal version. box_count displays
						 a compact vertical like box.</dd>
						<dt>class</dt>
						<dd>The CSS class of the like box container.</dd>
					</dl>
				</p>
			</div>
			<h4><a href="#">fblikeshort</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fblike]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>fanpage</dt>
						<dd>Any URL. Default is the fan page URL.</dd>
						<dt>class</dt>
						<dd>The CSS class of the like box container.</dd>
					</dl>
					This shortcode creates a customized, short like button with the box count, faces and send buttons hidden.
				</p>
			</div>
			<h4><a href="#">fbkarmablock</a></h4>
			<div>
				<p>
					<b>Usage:</b> [karmablock]KarmaBlock Content Here[/karmablock]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>id</dt>
						<dd>An alphanumeric ID. If not set, the default ID is "fb-karma-blockN" where N an incrementing number starting at 0.</dd>
					</dl>
					This is some awesome mojo to make your pages viral. You can put any content in the Karma Block, like a download button, opt-in form, video,
					coupon, special discount buy button; whatever. That content will remain hidden until a user either posts a link to their timeline using
					our original PostKarma, posts a comment with the Karma options enabled, or sends the page link to a friend with the Karma options enabled.
					<br><br>
					<b>Note:</b> When using KarmaBlock, you must have either Facebook Comments, Send Button, or PostKarma enabled. Instead of redirecting, set the
					target as the ID of the KarmaBlock, starting with the pound sign "#". For example, if you name the KarmaBlock "discountCoupon", you'd be set
					the target "#discountCoupon" - just like targeting with CSS or jQuery.
				</p>
			</div>
			<h4><a href="#">fbkarma</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fbkarma]PostKarma Content Here[/fbkarma]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>url</dt>
						<dd>The link that will be posted to the user's wall Default is your Fan Page URL.</dd>
						<dt>dest</dt>
						<dd>Where the user will be taken after successfully posting on their wall - this will be where they'll claim their reward. This can be a URL or an ID of a KarmaBlock</dd>
						<dt>name</dt>
						<dd>The Name of the link that gets posted on their wall.</dd>
						<dt>desc</dt>
						<dd>A short description of the link being posted (your pitch to get users clicking on the link goes here).</dd>
						<dt>pic</dt>
						<dd>URL to an image that depicts the site, product or thing you're promoting. 50x50 pixels is the least you shuold use.</dd>
						<dt>target</dt>
						<dd>How to redirect the user after posting. Values can be "_top", "_blank" or empty. A value of "_top" will force the destination page in
						the same window, "_blank" will pop the link into a new window, and an empty value will redirect inside the iFrame.</dd>
					</dl>
					One of the <u>most viral</u> tools available, you can ask users to post a link to their wall in order to get a reward - an eBook, download, anything.
					That post gets seen by their friends, which drives more traffic and gets more likes.
					<br><br>
					<b>Note 1:</b> The shortcode content can be text or an image. The shortcode will automatically add a link to pop the Facebook post dialog. There should
					be no other links in the PostKarma content.
					<br><br>
					<b>Note 2:</b> To use PostKarma with KarmaBlock, you must set the
					target as the ID of the KarmaBlock. For example, if you name the KarmaBlock "discountCoupon", you'd be set
					the target to "discountCoupon".
				</p>
			</div>
			<h4><a href="#">fbcomments</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fbcomments]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>num</dt>
						<dd>The number of comments to have visible.</dd>
						<dt>dest</dt>
						<dd>Where the user will be taken after successfully commenting - this will be where they'll claim their reward. This can be a URL or an ID of a KarmaBlock</dd>
						<dt>target</dt>
						<dd>How to redirect the user after posting. Values can be "_top", "_blank" or empty. A value of "_top" will force the destination page in
						the same window, "_blank" will pop the link into a new window, and an empty value will redirect inside the iFrame.</dd>
					</dl>
					In its basic form, this allows your users to comment on your site. With CommentKarma enabled, you can ask users to post a comment in order to get a reward - an eBook, download, anything.
					That comment gets seen by their friends, which drives more traffic and gets more likes, more comments.
					<br><br>
					<b>Note 1:</b> To use CommentKarma with KarmaBlock, you must set the
					target as the ID of the KarmaBlock. For example, if you name the KarmaBlock "discountCoupon", you'd be set
					the target to "discountCoupon".
					<br><br>
					<b>Note 2:</b> CommentKarma only works with the fbcomments shortcode. Enabling comments in your FPC page will display the basic Facebook Comments plugin.
				</p>
			</div>
			<h4><a href="#">fbsend</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fbsend]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>fanpage</dt>
						<dd>The URL of the page you want the user to send to a friend.</dd>
						<dt>class</dt>
						<dd>The CSS class of the send button container.</dd>
						<dt>dest</dt>
						<dd>Where the user will be taken after successfully sending the link - this will be where they'll claim their reward. This can be a URL or an ID of a KarmaBlock</dd>
						<dt>target</dt>
						<dd>How to redirect the user after sending. Values can be "_top", "_blank" or empty. A value of "_top" will force the destination page in
						the same window, "_blank" will pop the link into a new window, and an empty value will redirect inside the iFrame.</dd>
					</dl>
					In its basic form, this allows your users to send a page link or other URL to their friends. With SendKarma enabled, you can ask users to send a link in order to get a reward - an eBook, download, anything.
					That send gets to their friends, which drives more traffic and gets more likes, more comments, more sends.
					<br><br>
					<b>Note 1:</b> To use SendKarma with KarmaBlock, you must set the
					target as the ID of the KarmaBlock. For example, if you name the KarmaBlock "discountCoupon", you'd be set
					the target to "discountCoupon".
					<br><br>
					<b>Note 2:</b> SendKarma is currently broken. Sorry, this is Facebook's doing. There is an open bug reported on the send function not triggering the proper event we need
					to know if a link was sent. It *will* work, and hopefully soon!
				</p>
			</div>
			<h4><a href="#">fbshare</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fbshare]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>fanpage</dt>
						<dd>The URL of the page you want the user to share.</dd>
						<dt>text</dt>
						<dd>The button text. Defaults to "Share on Facebook".</dd>
						<dt>class</dt>
						<dd>The CSS class of the share button container.</dd>
					</dl>
					This puts a Facebook styled share button on your page. Users can then share your link on their timeline.
				</p>
			</div>
			<h4><a href="#">fbtweets</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fbtweets]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>id</dt>
						<dd>The Widget ID to pull from Twitter.</dd>
						<dt>user</dt>
						<dd>The Twitter handle you're inerting into the page.</dd>
						<dt>theme</dt>
						<dd>Sets the theme of the widget. Light/Dark are the options, and Light is default.</dd>
						<dt>border/link</dt>
						<dd>Here you can set custom colors for the widget board and links to match your page. Use a hex encoded color.</dd>
						<dt>width/height</dt>
						<dd>Sets the dimensions of the widget.</dd>
						<dt>chrome</dt>
						<dd>Used to disable widget headers, footers, scrollbars, etc.</dd>
						<dt>class</dt>
						<dd>CSS class name of the widget container.</dd>
						<dt>style</dt>
						<dd>Any inline style you want to apply to the widget container.</dd>
					</dl>
					This puts the latest tweets from a specified Twitter Widget in your fan page. To set up your Twitter Widget,
					<a href="https://twitter.com/settings/widgets" target="_blank">head here</a>.
				</p>
			</div>
			<h4><a href="#">googleplus1</a></h4>
			<div>
				<p>
					<b>Usage:</b> [googleplus1]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>size</dt>
						<dd>Sets the size of the google+ button.</dd>
						<dt>count</dt>
						<dd>Enable/disable the Plus 1 count display on the button.</dd>
					</dl>
					This puts the Google+ button on your fan page.
				</p>
			</div>
		</div>
		<h3>Blog Shortcodes</h3>
		<div id="fpc-accordion6">
			<h4><a href="#">fbposts</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fbposts]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>cat</dt>
						<dd>Post category to pull from your blog - optional.</dd>
						<dt>type</dt>
						<dd>Post type to pull from your blog - optional.</dd>
						<dt>num</dt>
						<dd>Post type to pull from your blog - optional.</dd>
						<dt>excerpts/showdate/showauthor</dt>
						<dd>Enable post meta. 1/0. Default is 0.</dd>
					</dl>
					Here, you can insert a list of your latest blog posts. This helps tie your fan page to your website.
				</p>
			</div>
			<h4><a href="#">fbrss</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fbrss]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>rss</dt>
						<dd>URL of the RSS feed.</dd>
						<dt>num</dt>
						<dd>Post type to pull from your blog - optional.</dd>
						<dt>class</dt>
						<dd>CSS class name of the rss container.</dd>
						<dt>style</dt>
						<dd>Any inline style you want to apply to the rss container.</dd>
					</dl>
					While you can certainly use this to pull in your own feed from your website, this shortcode allows you to pull in an RSS feed from any source.
				</p>
			</div>
		</div>
		<h3>Google Fonts &amp; Other</h3>
		<div id="fpc-accordion7">
			<h4><a href="#">font</a></h4>
			<div>
				<p>
					<b>Usage:</b> [font]Your custom Googlefied text goes here[/font]<br>
					<b>Parameters:</b> see shortcode window<br>
					This shortcode can insert any one of over five hundred Google web fonts in your page. The interface should be very self explanatory
					and gives you realtime updates to see what your text will look like. Using good typography just doesn't get any easier!
				</p>
			</div>
			<h4><a href="#">oneclickoptin</a></h4>
			<div>
				<p>
					<b>Usage:</b> [oneclickoptin]Your Call to Action Button or Opt-in text goes here[/oneclickoptin]<br>
					<b>Parameters:</b>n/a<br>
					to your email list using their Facebook credentials - increasing your conversion rate.<br><br>
					Depending on your settings, they'll be asked for their email and permission to publish to their timeline. When they accept, they get automatically added
					to your <a href="http://www.fanpageconnect.com/go/aweber" target="_blank">Aweber</a> or <a href="http://www.fanpageconnect.com/go/mailchimp" target="_blank">MailChimp</a>
					list, your viral message gets posted to their timeline for their friends to see, and they get redirected to your "thank you" page.
					<b>Note:</b> You <u>must</u> have the One Click Opt-In Settings completed in your Fan Page options for this to work.
				</p>
			</div>
			<h4><a href="#">custom</a></h4>
			<div>
				<p>
					<b>Usage:</b> [custom]<br>
					<b>Parameters:</b> n/a<br>
					This shortcode allows you to insert complex code or HTML into your fan pages via a shortcode. That content can be an
					<a href="http://www.fanpageconnect.com/go/aweber" target="_blank">Aweber</a>, <a href="http://www.fanpageconnect.com/go/mailchimp" target="_blank">MailChimp</a>, or other
					opt-in form, custom javascript, or anything else that may have a hard time in the WordPress editor.
					<br><br>
					To use the shortcode, insert your custom content into the text box in the fan page's Miscellaneous Options area. Then use the
					shortcode <b>[custom]</b> anywhere in the page. That content will then be inserted when the page renders.
				</p>
			</div>
			<h4><a href="#">qrcode</a></h4>
			<div>
				<p>
					<b>Usage:</b> QR Code Generator<br>
					<b>Parameters:</b> n/a<br>
					QR codes are extremely powerful. Users can scan these square "barcodes" to view content - facebook link shares, events,
					contact information, affiliate links, links to coupons, all manner of things. Since Facebook doesn't have mobile tabs for fan pages, this is
					the next best thing to mobile pages. Get your users to scan the QR code with their phones to "go mobile"!
					<br><br>
					To insert QR codes, simpley click the FPC Shortcodes button and select "QR Codes" from the shortcode category menu. A few clicks, and you've got a QR.
				</p>
			</div>
			<h4><a href="#">fbhide</a></h4>
			<div>
				<p>
					<b>Usage:</b> [fbhide]Content to Hide After The First Visit Here[/fbhide]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>id</dt>
						<dd>Unique ID for the content to hide.</dd>
						<dt>days</dt>
						<dd>Number of days you want the content to stay hidden after the first visit.</dd>
					</dl>
					If you want to offer a "One Time Offer" on your fan page, or only show content once after a user sees the page, just create
					a unique ID for the content to hide, then select the number of days to hid that content. Once the user sees the content, future
					visits will hide that content for the number of days you select. This works by setting a cookie in the user's browser that expires
					after the set number of days.
				</p>
			</div>
			<h4><a href="#">showthis</a></h4>
			<div>
				<p>
					<b>Usage:</b> [showthis]Content to Show After the Date Here[/showthis]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>on</dt>
						<dd>The date on which to display the content.</dd>
					</dl>
					This shortcode works well for launches or any time sensitive content. You can create your content in advance, and it won't display until the specified date.
					You can use this shortcode in conjunction with <b>expirethis</b> to bracket when you want to show <u>and</u> expire the
					content.
					<br><br>
					Example: [showthis on="2014/1/1"][expirethis after="2014/1/1"]This is a one day sale![/expirethis][/showthis] would
					show the content on January 1st of 2014, then hide it on January 2nd.
				</p>
			</div>
			<h4><a href="#">expirethis</a></h4>
			<div>
				<p>
					<b>Usage:</b> [expirethis]Content to Hide After the Date Here[/expirethis]<br>
					<b>Parameters:</b><br>
					<dl>
						<dt>after</dt>
						<dd>The date after which to hide the content.</dd>
					</dl>
					This shortcode works well for launches or any time sensitive content. You can create your content in advance, and it won't display until the specified date.
					You can use this shortcode in conjunction with <b>showthis</b> to bracket when you want to show <u>and</u> expire the
					content.
					<br><br>
					Example: [expirethis after="2014/1/1"][showthis on="2014/1/1"]This is a one day sale![/showthis][/expirethis] would
					show the content on January 1st of 2014, then hide it on January 2nd.
				</p>
			</div>
		</div>
		<div style="clear:both;"></div>
		<h3>Need More Help?</h3>
		<p>
			Be sure to <a href="http://www.fanpageconnect.com" target="_blank">visit the website</a> for training videos, free custom templates and fan page tab icons.
		</p>

		<h4>Fanpage Connect plugin by <a href="http://www.fanpageconnect.com" target="_blank">FanpageConnect</a>.  Copyright <?php echo date('Y'); ?> Pat Friedl, Christopher Friedl &amp; Bryan Batson</h4>

	</div><!-- dbx-content -->

</div><!-- wrap -->
<div style="clear:both;">&nbsp;</div>
<script>
jQuery(document).ready(function() {
	var options = {
		heightStyle: "content",
		collapsible: true,
		active: false
	}
	jQuery("#wpfooter").remove();
	jQuery(".dbx-content h5").css({margin: '-0.25em 0 0.5em','font-size':'0.95em'});
	jQuery(".dbx-content p").css({margin: '0.25em 0 1em'});
	for(i = 1; i < 8; i++){
		jQuery("#fpc-accordion"+i).accordion(options);
	}
});
</script>