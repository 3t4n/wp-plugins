<?php
/**
 * Getting Started
 *
 * @package CAMPUS_DIRECTORY
 * @since WPAS 5.3
 */
if (!defined('ABSPATH')) exit;
add_action('campus_directory_getting_started', 'campus_directory_getting_started');
/**
 * Display getting started information
 * @since WPAS 5.3
 *
 * @return html
 */
function campus_directory_getting_started() {
	global $title;
	list($display_version) = explode('-', CAMPUS_DIRECTORY_VERSION);
?>
<style>
.about-wrap img{
max-height: 200px;
}
div.comp-feature {
    font-weight: 400;
    font-size:20px;
}
.edition-com {
    display: none;
}
.green{
color: #008000;
font-size: 30px;
}
#nav-compare:before{
    content: "\f179";
}
#emd-about .nav-tab-wrapper a:before{
    position: relative;
    box-sizing: content-box;
padding: 0px 3px;
color: #4682b4;
    width: 20px;
    height: 20px;
    overflow: hidden;
    white-space: nowrap;
    font-size: 20px;
    line-height: 1;
    cursor: pointer;
font-family: dashicons;
}
#nav-getting-started:before{
content: "\f102";
}
#nav-release-notes:before{
content: "\f348";
}
#nav-resources:before{
content: "\f118";
}
#nav-features:before{
content: "\f339";
}
#emd-about .embed-container { 
	position: relative; 
	padding-bottom: 56.25%;
	height: 0;
	overflow: hidden;
	max-width: 100%;
	height: auto;
	} 

#emd-about .embed-container iframe,
#emd-about .embed-container object,
#emd-about .embed-container embed { 
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	}
#emd-about ul li:before{
    content: "\f522";
    font-family: dashicons;
    font-size:25px;
 }
#gallery {
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
#gallery .gallery-item {
	margin-top: 10px;
	margin-right: 10px;
	text-align: center;
        cursor:pointer;
}
#gallery img {
	border: 2px solid #cfcfcf; 
height: 405px; 
width: auto; 
}
#gallery .gallery-caption {
	margin-left: 0;
}
#emd-about .top{
text-decoration:none;
}
#emd-about .toc{
    background-color: #fff;
    padding: 25px;
    border: 1px solid #add8e6;
    border-radius: 8px;
}
#emd-about h3,
#emd-about h2{
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0.6em;
    margin-left: 0px;
}
#emd-about p,
#emd-about .emd-section li{
font-size:18px
}
#emd-about a.top:after{
content: "\f342";
    font-family: dashicons;
    font-size:25px;
text-decoration:none;
}
#emd-about .toc a,
#emd-about a.top{
vertical-align: top;
}
#emd-about li{
list-style-type: none;
line-height: normal;
}
#emd-about ol li {
    list-style-type: decimal;
}
#emd-about .quote{
    background: #fff;
    border-left: 4px solid #088cf9;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    margin-top: 25px;
    padding: 1px 12px;
}
#emd-about .tooltip{
    display: inline;
    position: relative;
}
#emd-about .tooltip:hover:after{
    background: #333;
    background: rgba(0,0,0,.8);
    border-radius: 5px;
    bottom: 26px;
    color: #fff;
    content: 'Click to enlarge';
    left: 20%;
    padding: 5px 15px;
    position: absolute;
    z-index: 98;
    width: 220px;
}
</style>

<?php add_thickbox(); ?>
<div id="emd-about" class="wrap about-wrap">
<div id="emd-header" style="padding:10px 0" class="wp-clearfix">
<div style="float:right"><img src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/campusdir-logo-250x150.gif"; ?>"></div>
<div style="margin: .2em 200px 0 0;padding: 0;color: #32373c;line-height: 1.2em;font-size: 2.8em;font-weight: 400;">
<?php printf(__('Welcome to Campus Directory Community %s', 'campus-directory') , $display_version); ?>
</div>

<p class="about-text">
<?php printf(__("Thanks for activating Campus Directory!", 'campus-directory') , $display_version); ?>
</p>
<div style="display: inline-block;"><a style="height: 50px; background:#ff8484;padding:10px 12px;color:#ffffff;text-align: center;font-weight: bold;line-height: 50px; font-family: Arial;border-radius: 6px; text-decoration: none;" href="https://emdplugins.com/plugin-pricing/campus-directory-wordpress-plugin-pricing/?pk_campaign=campus-directory-upgradebtn&amp;pk_kwd=campus-directory-resources"><?php printf(__('Upgrade Now', 'campus-directory') , $display_version); ?></a></div>
<div style="display: inline-block;margin-bottom: 20px;"><a style="height: 50px; background:#f0ad4e;padding:10px 12px;color:#ffffff;text-align: center;font-weight: bold;line-height: 50px; font-family: Arial;border-radius: 6px; text-decoration: none;" href="https://campusdirpro.emdplugins.com//?pk_campaign=campus-directory-buybtn&amp;pk_kwd=campus-directory-resources"><?php printf(__('Visit Pro Demo Site', 'campus-directory') , $display_version); ?></a></div>
<?php
	$tabs['getting-started'] = __('Getting Started', 'campus-directory');
	$tabs['release-notes'] = __('Release Notes', 'campus-directory');
	$tabs['resources'] = __('Resources', 'campus-directory');
	$tabs['features'] = __('Features', 'campus-directory');
	$active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'getting-started';
	echo '<h2 class="nav-tab-wrapper wp-clearfix">';
	foreach ($tabs as $ktab => $mytab) {
		$tab_url[$ktab] = esc_url(add_query_arg(array(
			'tab' => $ktab
		)));
		$active = "";
		if ($active_tab == $ktab) {
			$active = "nav-tab-active";
		}
		echo '<a href="' . esc_url($tab_url[$ktab]) . '" class="nav-tab ' . esc_attr($active) . '" id="nav-' . esc_attr($ktab) . '">' . esc_html($mytab) . '</a>';
	}
	echo '</h2>';
?>
<?php echo '<div class="tab-content" id="tab-getting-started"';
	if ("getting-started" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<div style="height:25px" id="rtop"></div><div class="toc"><h3 style="color:#0073AA;text-align:left;">Quickstart</h3><ul><li><a href="#gs-sec-182">Live Demo Site</a></li>
<li><a href="#gs-sec-259">Need Help?</a></li>
<li><a href="#gs-sec-260">Learn More</a></li>
<li><a href="#gs-sec-258">Installation, Configuration & Customization Service</a></li>
<li><a href="#gs-sec-131">Campus Directory Community Introduction</a></li>
<li><a href="#gs-sec-1">How to create your first person profile</a></li>
<li><a href="#gs-sec-136">Campus Directory Pro - Best Campus Directory and Course catalog for Higher Education Institutions</a></li>
<li><a href="#gs-sec-133">EMD CSV Import Export Extension helps you get your data in and out of WordPress quickly, saving you ton of time</a></li>
<li><a href="#gs-sec-132">EMD Advanced Filters and Columns Extension for finding what's important faster</a></li>
<li><a href="#gs-sec-137">EMD Active Directory/LDAP Extension helps bulk import and update Campus Directory data from LDAP</a></li>
<li><a href="#gs-sec-144">EMD vCard Extension</a></li>
</ul></div><div class="quote">
<p class="about-description">The secret of getting ahead is getting started - Mark Twain</p>
</div>
<div id="gs-sec-182"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Live Demo Site</div><div class="changelog emd-section getting-started-182" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>Feel free to check out our <a target="_blank" href="https://campusdircom.emdplugins.com/?pk_campaign=campus-directory-gettingstarted&pk_kwd=campus-directory-livedemo">live demo site</a> to learn how to use Campus Directory Community starter edition. The demo site will always have the latest version installed.</p>
<p>You can also use the demo site to identify possible issues. If the same issue exists in the demo site, open a support ticket and we will fix it. If a Campus Directory Community feature is not functioning or displayed correctly in your site but looks and works properly in the demo site, it means the theme or a third party plugin or one or more configuration parameters of your site is causing the issue.</p>
<p>If you'd like us to identify and fix the issues specific to your site, purchase a work order to get started.</p>
<p><a target="_blank" style="
    padding: 16px;
    background: coral;
    border: 1px solid lightgray;
    border-radius: 12px;
    text-decoration: none;
    color: white;
    margin: 10px 0;
    display: inline-block;" href="https://emdplugins.com/expert-service-pricing/?pk_campaign=campus-directory-gettingstarted&pk_kwd=campus-directory-livedemo">Purchase Work Order</a></p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-259"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Need Help?</div><div class="changelog emd-section getting-started-259" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>There are many resources available in case you need help:</p>
<ul>
<li>Search our <a target="_blank" href="https://emdplugins.com/support">knowledge base</a></li>
<li><a href="https://emdplugins.com/kb_tags/campus-directory" target="_blank">Browse our Campus Directory Community articles</a></li>
<li><a href="https://docs.emdplugins.com/docs/campus-directory-community-documentation" target="_blank">Check out Campus Directory Community documentation for step by step instructions.</a></li>
<li><a href="https://emdplugins.com/emdplugins-support-introduction/" target="_blank">Open a support ticket if you still could not find the answer to your question</a></li>
</ul>
<p>Please read <a href="https://emdplugins.com/questions/what-to-write-on-a-support-ticket-related-to-a-technical-issue/" target="_blank">"What to write to report a technical issue"</a> before submitting a support ticket.</p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-260"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Learn More</div><div class="changelog emd-section getting-started-260" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>The following articles provide step by step instructions on various concepts covered in Campus Directory Community.</p>
<ul><li>
<a target="_blank" href="https://docs.emdplugins.com/docs/campus-directory-community-documentation/#article430">Concepts</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/campus-directory-community-documentation/#article464">Quick Start</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/campus-directory-community-documentation/#article431">Working with People</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/campus-directory-community-documentation/#article432">Standards</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/campus-directory-community-documentation/#article433">Forms</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/campus-directory-community-documentation/#article434">Administration</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/campus-directory-community-documentation/#article437">Creating Shortcodes</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/campus-directory-community-documentation/#article436">Screen Options</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/campus-directory-community-documentation/#article435">Localization(l10n)</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/campus-directory-community-documentation/#article438">Customizations</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/campus-directory-community-documentation/#article439">Glossary</a>
</li></ul>
</div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-258"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Installation, Configuration & Customization Service</div><div class="changelog emd-section getting-started-258" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>Get the peace of mind that comes from having Campus Directory Community properly installed, configured or customized by eMarket Design.</p>
<p>Being the developer of Campus Directory Community, we understand how to deliver the best value, mitigate risks and get the software ready for you to use quickly.</p>
<p>Our service includes:</p>
<ul>
<li>Professional installation by eMarket Design experts.</li>
<li>Configuration to meet your specific needs</li>
<li>Installation completed quickly and according to best practice</li>
<li>Knowledge of Campus Directory Community best practices transferred to your team</li>
</ul>
<p>Pricing of the service is based on the complexity of level of effort, required skills or expertise. To determine the estimated price and duration of this service, and for more information about related services, purchase a work order.  
<p><a target="_blank" style="
    padding: 16px;
    background: coral;
    border: 1px solid lightgray;
    border-radius: 12px;
    text-decoration: none;
    color: white;
    margin: 10px 0;
    display: inline-block;" href="https://emdplugins.com/expert-service-pricing/?pk_campaign=campus-directory-gettingstarted&pk_kwd=campus-directory-livedemo">Purchase Work Order</a></p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-131"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Campus Directory Community Introduction</div><div class="changelog emd-section getting-started-131" style="margin:0;background-color:white;padding:10px"><div class="emd-yt" data-youtube-id="IitttAiuPwc" data-ratio="16:9">loading...</div><div class="sec-desc"><p>Watch Campus Directory Community introduction video to learn about the plugin features and configuration.</p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-1"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">How to create your first person profile</div><div class="changelog emd-section getting-started-1" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><div class="entry-content"><p>To create person records in the admin area:
</p><ol>
  <li>Log in to your Administration Panel.</li>
  <li>Click the 'People' tab.</li>
  <li>Click the 'Add New' sub-tab or the “Add New” button in the person list page.</li>
  <li>Start filling in your person fields. You must fill all required fields. All required fields have red star after their labels.</li>
  <li>As needed, set person taxonomies and relationships. All required relationships or taxonomies must be set.</li>
  <li>When you are ready, click Publish. If you do not have publish privileges, the "Submit for Review" button is displayed.</li>
  <li>After the submission is completed, the person status changes to "Published".</li></ol>
</div></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-136"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Campus Directory Pro - Best Campus Directory and Course catalog for Higher Education Institutions</div><div class="changelog emd-section getting-started-136" style="margin:0;background-color:white;padding:10px"><div id="gallery"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-136" href="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/montage_campusdir_pro_1102.png"; ?>"><img src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/montage_campusdir_pro_1102.png"; ?>"></a></div></div><div class="sec-desc"><p>Powerful and easy to use unified information repository integrating people, publications, courses and locations for higher education intitutions.</p><div style="margin:25px"><a href="https://emdplugins.com/plugins/campus-directory-wordpress-plugin/?pk_campaign=campus-dir-pro-buybtn&pk_kwd=campus-directory-resources"><img style="width: 154px;" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/button_buy-now.png"; ?>"></a></div></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-133"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">EMD CSV Import Export Extension helps you get your data in and out of WordPress quickly, saving you ton of time</div><div class="changelog emd-section getting-started-133" style="margin:0;background-color:white;padding:10px"><div id="gallery"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-133" href="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/campusdir_operations_large.png"; ?>"><img src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/campusdir_operations_large.png"; ?>"></a></div></div><div class="sec-desc"><p>EMD CSV Import Export Extension helps bulk import, export, update entries from/to CSV files. You can also reset(delete) all data and start over again without modifying database. The export feature is also great for backups and archiving old or obsolete data.</p>
<p><a href="https://emdplugins.com/plugin-features/campus-directory-importexport-addon/?pk_campaign=emdimpexp-buybtn&pk_kwd=campus-directory-resources"><img style="width: 154px;" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/button_buy-now.png"; ?>"></a></p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-132"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">EMD Advanced Filters and Columns Extension for finding what's important faster</div><div class="changelog emd-section getting-started-132" style="margin:0;background-color:white;padding:10px"><div id="gallery"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-132" href="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/campusdir_operations_large.png"; ?>"><img src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/campusdir_operations_large.png"; ?>"></a></div></div><div class="sec-desc"><p>EMD Advanced Filters and Columns Extension for Campus Directory Community edition helps you:</p><ul><li>Filter entries quickly to find what you're looking for</li><li>Save your frequently used filters so you do not need to create them again</li><li>Sort entry columns to see what's important faster</li><li>Change the display order of columns </li>
<li>Enable or disable columns for better and cleaner look </li><li>Export search results to PDF or CSV for custom reporting</li></ul><div style="margin:25px"><a href="https://emdplugins.com/plugin-features/campus-directory-smart-search-and-columns-addon/?pk_campaign=emd-afc-buybtn&pk_kwd=campus-directory-resources"><img style="width: 154px;" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/button_buy-now.png"; ?>"></a></div></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-137"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">EMD Active Directory/LDAP Extension helps bulk import and update Campus Directory data from LDAP</div><div class="changelog emd-section getting-started-137" style="margin:0;background-color:white;padding:10px"><div class="emd-yt" data-youtube-id="onWfeZHLGzo" data-ratio="16:9">loading...</div><div class="sec-desc"><p>EMD Active Directory/LDAP Extension helps bulk importing and updating Campus Directory data by visually mapping LDAP fields. The imports/updates can scheduled on desired intervals using WP Cron.</p>
<p><a href="https://emdplugins.com/plugin-features/campus-directory-microsoft-active-directoryldap-addon/?pk_campaign=emdldap-buybtn&pk_kwd=campus-directory-resources"><img style="width: 154px;" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/button_buy-now.png"; ?>"></a></p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-144"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">EMD vCard Extension</div><div class="changelog emd-section getting-started-144" style="margin:0;background-color:white;padding:10px"><div class="emd-yt" data-youtube-id="HqRnwYB-VV8" data-ratio="16:9">loading...</div><div class="sec-desc"><p>Provides ability to download profile information as vCard - file format standard for electronic business cards</p>
<div style="margin:25px"><a href="https://emdplugins.com/plugin-features/campus-directory-vcard-addon/?pk_campaign=emd-vcard-buybtn&pk_kwd=campus-directory-resources"><img style="width: 154px;" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/button_buy-now.png"; ?>"></a></div></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px">

<?php echo '</div>'; ?>
<?php echo '<div class="tab-content" id="tab-release-notes"';
	if ("release-notes" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<p class="about-description">This page lists the release notes from every production version of Campus Directory Community.</p>

<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.9.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1545" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
WordPress dashboard accordions issue on setting and glossary pages due to changes in core code on WP 6.7.1</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.8.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1522" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Add sanitization and fix CSRF vulnerability</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1521" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Translation to one textdomain</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1520" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 6.5</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.7.7 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1474" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Html tags getting removed from the bio text</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.7.6 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1459" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 6.2</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1455" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 6.1</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.7.5 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1436" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
XSS issues in the WordPress admin area</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1435" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 5.9.2 and PHP 8</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.7.4 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1374" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 5.8.1</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.7.3 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1284" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 5.7</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.7.2 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1213" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
multi-select form component missing scroll bars when the content overflows its fixed height.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.7.1 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1164" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 5.5.1</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1163" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
updates to translation strings and libraries</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1162" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added version numbers to js and css files for caching purposes</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.7.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1095" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
updates and improvements to libraries</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1094" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added previous and next buttons for the edit screens of people</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.6.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1008" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Emd templates</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1007" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
updates and improvements to form library</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1006" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added support for Emd Custom Field Builder when upgraded to premium editions</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.5.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-950" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Session cleanup workflow by creating a custom table to process records.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-949" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added Emd form builder support.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-948" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Cleaned up unnecessary code and optimized the library file content.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.4.1 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-890" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Misc updates for better compatibility and stability</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.4.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-848" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Emd templating system to match modern web standards</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-847" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Created a new shortcode page which displays all available shortcodes. You can access this page under the plugin settings.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.3.5 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-770" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Misc updates for better compatibility and stability</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.3.4 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-742" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
library updates for better stability and compatibility</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.3.3 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-664" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Moved web fonts to local storage - you can still get them from CDN using your functions.php if you need to.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.3.1 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-543" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
New photos can not be uploaded after upgrade to 1.3.0</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.3.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-539" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Library updates</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-538" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Performance improvements</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-537" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Advisor, support staff names are sorted alphabetically for easier connections</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-536" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Ability to set file upload size, types and the uploadable file count from the plugin settings</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.2.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-295" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Updated codemirror libraries for custom CSS and JS options in plugin settings</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-294" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
PHP 7 compatibility</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-293" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added custom JavaScript option in plugin settings under Tools tab</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.1.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-221" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added support for EMD Active Directory/LDAP extension</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-220" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
WP Sessions security vulnerability</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">1.0.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Initial Release</h3>
<div ></a>* We're proud to release the initial version of Campus Directory community edition</div></div></div><hr style="margin:30px 0">
<?php echo '</div>'; ?>
<?php echo '<div class="tab-content" id="tab-resources"';
	if ("resources" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Extensive documentation is available</div><div class="emd-section changelog resources resources-2" style="margin:0;background-color:white;padding:10px"><div style="height:40px" id="gs-sec-2"></div><div id="gallery" class="wp-clearfix"></div><div class="sec-desc"><a href="https://docs.emdplugins.com/docs/campus-directory-community-documentation">Campus Directory Community Documentation</a></div></div><div style="margin-top:15px"><a href="#ptop" class="top">Go to top</a></div><hr style="margin-top:40px"><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">How to customize Campus Directory Community</div><div class="emd-section changelog resources resources-135" style="margin:0;background-color:white;padding:10px"><div style="height:40px" id="gs-sec-135"></div><div id="gallery" class="wp-clearfix"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-135" href="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/campusdir_settings_large.png"; ?>"><img src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/campusdir_settings_large.png"; ?>"></a></div></div><div class="sec-desc"><p><strong><span class="dashicons dashicons-arrow-up-alt"></span> Watch the customization video to familiarize yourself with the customization options. </strong>. The video shows one of our plugins as an example. The concepts are the same and all our plugins have the same settings.</p>
<p>Campus Directory Community is designed and developed using <a href="https://wpappstudio.com">WP App Studio (WPAS) Professional WordPress Development platform</a>. All WPAS plugins come with extensive customization options from plugin settings without changing theme template files. Some of the customization options are listed below:</p>
<ul>
	<li>Enable or disable all fields, taxonomies and relationships from backend and/or frontend</li>
        <li>Use the default EMD or theme templating system</li>
	<li>Set slug of any entity and/or archive base slug</li>
	<li>Set the page template of any entity, taxonomy and/or archive page to sidebar on left, sidebar on right or no sidebar (full width)</li>
	<li>Hide the previous and next post links on the frontend for single posts</li>
	<li>Hide the page navigation links on the frontend for archive posts</li>
	<li>Display or hide any custom field</li>
	<li>Display any sidebar widget on plugin pages using EMD Widget Area</li>
	<li>Set custom CSS rules for all plugin pages including plugin shortcodes</li>
</ul>
<div class="quote">
<p>If your customization needs are more complex, you’re unfamiliar with code/templates and resolving potential conflicts, we strongly suggest you to <a href="https://emdplugins.com/open-a-support-ticket/?pk_campaign=campus-directory-hireme-custom&ticket_topic=pre-sales-questions">hire us</a>, we will get your site up and running in no time.
</p>
</div></div></div><div style="margin-top:15px"><a href="#ptop" class="top">Go to top</a></div><hr style="margin-top:40px"><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">How to resolve theme related issues</div><div class="emd-section changelog resources resources-134" style="margin:0;background-color:white;padding:10px"><div style="height:40px" id="gs-sec-134"></div><div id="gallery" class="wp-clearfix"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-134" href="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/emd_templating_system.png"; ?>"><img src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/emd_templating_system.png"; ?>"></a></div></div><div class="sec-desc"><p>If your theme is not coded based on WordPress theme coding standards, does have an unorthodox markup or its style.css is messing up how Campus Directory Community pages look and feel, you will see some unusual changes on your site such as sidebars not getting displayed where they are supposed to or random text getting displayed on headers etc. after plugin activation.</p>
<p>The good news is Campus Directory Community plugin is designed to minimize theme related issues by providing two distinct templating systems:</p>
<ul>
<li>The EMD templating system is the default templating system where the plugin uses its own templates for plugin pages.</li>
<li>The theme templating system where Campus Directory Community uses theme templates for plugin pages.</li>
</ul>
<p>The EMD templating system is the recommended option. If the EMD templating system does not work for you, you need to check "Disable EMD Templating System" option at Settings > Tools tab and switch to theme based templating system.</p>
<p>Please keep in mind that when you disable EMD templating system, you loose the flexibility of modifying plugin pages without changing theme template files.</p>
<p>If none of the provided options works for you, you may still fix theme related conflicts following the steps in <a href="https://docs.emdplugins.com/docs/campus-directory-community-documentation">Campus Directory Community Documentation - Resolving theme related conflicts section.</a></p>

<div class="quote">
<p>If you’re unfamiliar with code/templates and resolving potential conflicts, <a href="https://emdplugins.com/open-a-support-ticket/?pk_campaign=raq-hireme&ticket_topic=pre-sales-questions"> do yourself a favor and hire us</a>. Sometimes the cost of hiring someone else to fix things is far less than doing it yourself. We will get your site up and running in no time.</p>
</div></div></div><div style="margin-top:15px"><a href="#ptop" class="top">Go to top</a></div><hr style="margin-top:40px">
<?php echo '</div>'; ?>
<?php echo '<div class="tab-content" id="tab-features"';
	if ("features" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<h3>The Essential Campus Resource: Campus Directory Starter Edition (Free)</h3>
<p>Explore the full list of features available in the the latest version of Campus Directory. Click on a feature title to learn more.</p>
<table class="widefat features striped form-table" style="width:auto;font-size:16px">
<tr><td><a href="https://emdplugins.com/campus-directory-set-advisors-and-support-staff?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/rgb.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-set-advisors-and-support-staff?pk_campaign=campus-directory-com&pk_kwd=getting-started">Connect Students with Advisors & Staff in the Directory</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-a-central-directory?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/employeedirectory.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-a-central-directory?pk_campaign=campus-directory-com&pk_kwd=getting-started">Your Campus at Your Fingertips with the Central Directory</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-responsive-mobile-friendly?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/responsive.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-responsive-mobile-friendly?pk_campaign=campus-directory-com&pk_kwd=getting-started">From Desktops to Phones: The Directory Adapts to Your Needs</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-customize-to-your-needs?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/settings.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-customize-to-your-needs?pk_campaign=campus-directory-com&pk_kwd=getting-started">No Coding Required: Effortless Branding for Your Campus Directory</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-beautiful-profile-pages?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/profile-page.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-beautiful-profile-pages?pk_campaign=campus-directory-com&pk_kwd=getting-started">Tell Your Story with Feature-Rich Profile Pages</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-ensure-accurate-and-up-to-date-information-in-all-platforms?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/integrators.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-ensure-accurate-and-up-to-date-information-in-all-platforms?pk_campaign=campus-directory-com&pk_kwd=getting-started">Streamline academic data synchronization processes</a></td><td> - Add-on</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-smart-search-addon?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/zoomin.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-smart-search-addon?pk_campaign=campus-directory-com&pk_kwd=getting-started">Unlock Quick Info Access with Campus Directory's Smart Search</a></td><td> - Add-on (included both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-csv-import-export-addon?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/csv-impexp.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-csv-import-export-addon?pk_campaign=campus-directory-com&pk_kwd=getting-started">Unleash Data Power: Import, Export & Manage Your Directory Seamlessly</a></td><td> - Add-on (included both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-microsoft-active-directory-ldap-addon?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/active-directory.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-microsoft-active-directory-ldap-addon?pk_campaign=campus-directory-com&pk_kwd=getting-started">Automate Staff & Faculty Data with Active Directory Integration</a></td><td> - Add-on</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-vcard-addon?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/vcard.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-vcard-addon?pk_campaign=campus-directory-com&pk_kwd=getting-started">Effortless vCard Sharing from Campus Directory Profiles</a></td><td> - Add-on</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-easy-alphabetical-search-people?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/alpha-search.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-easy-alphabetical-search-people?pk_campaign=campus-directory-com&pk_kwd=getting-started">Effortless Search & Navigation with the Directory</a></td><td> - Premium feature (included in both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-give-more-responsibilities-to-your-staff?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/empower-users.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-give-more-responsibilities-to-your-staff?pk_campaign=campus-directory-com&pk_kwd=getting-started">Assign Roles & Expand Functionality</a></td><td> - Premium feature (included in both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-beautiful-multiple-views?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/multiple-view.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-beautiful-multiple-views?pk_campaign=campus-directory-com&pk_kwd=getting-started">Engage Users with Stunning Directory Layouts</a></td><td> - Premium feature (included in both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-drag-drop-ordering?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/dd.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-drag-drop-ordering?pk_campaign=campus-directory-com&pk_kwd=getting-started">Drag & Drop for Intuitive Directory Organization</a></td><td> - Premium feature (included in both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-add-custom-fields-to-your-search-forms?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/form-fields.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-add-custom-fields-to-your-search-forms?pk_campaign=campus-directory-com&pk_kwd=getting-started">Customize Fields & Streamline Directory Searches</a></td><td> - Premium feature (included in both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-easy-to-use-widgets?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/video-folder.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-easy-to-use-widgets?pk_campaign=campus-directory-com&pk_kwd=getting-started">Publish Updates with Flexible Directory Widgets</a></td><td> - Premium feature (Included in both Pro and Enterprise. Enterprise has more powerful features.)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-self-service-faculty-and-students?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/profile-update.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-self-service-faculty-and-students?pk_campaign=campus-directory-com&pk_kwd=getting-started">Faculty & Students Update Bios & Backgrounds with Ease</a></td><td> - Premium feature (included in both Pro and Enterprise)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-find-classroom-and-office-locations-easily?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/venues.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-find-classroom-and-office-locations-easily?pk_campaign=campus-directory-com&pk_kwd=getting-started">Your Campus Compass: Find Classrooms, Offices & People with the Directory</a></td><td> - Premium feature (Included in Enterprise only)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-display-custom-lists?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/multiple-view.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-display-custom-lists?pk_campaign=campus-directory-com&pk_kwd=getting-started">Create Custom Lists with the Visual Shortcode Builder</a></td><td> - Premium feature (Included in both Pro and Enterprise. Enterprise has more powerful features.)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-academic-course-catalog?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/engagement.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-academic-course-catalog?pk_campaign=campus-directory-com&pk_kwd=getting-started">Beyond Listings: A User-Friendly Course Catalog Enhances Learning</a></td><td> - Premium feature (Included in Enterprise only)</td></tr>
<tr><td><a href="https://emdplugins.com/campus-directory-find-publications-with-pinpoint-accuracy?pk_campaign=campus-directory-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo CAMPUS_DIRECTORY_PLUGIN_URL . "assets/img/bookshelf.png"; ?>"></a></td><td><a href="https://emdplugins.com/campus-directory-find-publications-with-pinpoint-accuracy?pk_campaign=campus-directory-com&pk_kwd=getting-started">ind Research & Collaborate Through Accessible Publications</a></td><td> - Premium feature (Included in Enterprise only)</td></tr>
</table>
<?php echo '</div>'; ?>
<?php echo '</div>';
}
