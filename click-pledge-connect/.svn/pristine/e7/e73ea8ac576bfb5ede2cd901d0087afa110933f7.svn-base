<?php

function cnpcf_formshelp() {
?>
<div class="logo"><a href="https://clickandpledge.com" target="_blank"><img src="<?php print plugins_url(); ?>/click-pledge-connect/images/logo-cp.png"></a></div>
<div class="instructions">
	<h2>Welcome to Click &amp; Pledge CONNECT</h2>
	<p>For quick start, follow these instructions</p>
	<ol>
		<li>Go to <a href="admin.php?page=cnp_formssettings">Settings</a> and add Click &amp; Pledge Account Number, Account GUID and Nickname. Account GUID can be found in your Click & Pledge CONNECT portal. Find out <a href="https://support.clickandpledge.com/s/article/how-to-locate-account-id--api-account-guid" target="_blank">how</a>.</li>
		<li>Once the Account information is added, additional item (Click & Pledge) will appear on the left menu that allows you to add <strong><a href="admin.php?page=cnp_formsdetails">Form</a></strong> and <strong><a href="admin.php?page=cnp_pledgetvchannelsdetails">pledgeTV</a><sup class="cnpc-regsymbol">&reg;</sup> Channel</strong> Groups.</li>
		<li>After saving the Group details,a new table will appear on the same page where you may select one or more forms/TVchannels from different campaigns.  <br><small><strong>Note:</strong> All campaigns and forms are retrieved from <a href="https://connect.clickandpledge.com/" target="_blank">Click &amp; Pledge CONNECT</a>.</small></li>
	</ol>
	<p>
		For step by step guide follow our manual <a href="https://manual.clickandpledge.com/WordPress-Connect-Plugin.html" target="_blank">here</a>.
	</p>
</div>
<div class="news" style="border-top:1px solid #d8d8d8;">
	<h2>Latest news from Click &amp; Pledge</h2>
	<?php
// this is the url of the rss feed that you want to display
$feed = 'https://forums.clickandpledge.com/external?type=rss2&nodeid=20'; //replace this with the RSS's URL
$xml = simplexml_load_file($feed);
// Iterate through feed items
if ($xml!=''){
	?>
	<ul>
	<?php
	$i = 0;
    foreach ($xml->channel->item as $item) {
        $i++;

        // Extract necessary fields from the feed
        $title = htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($item->description, ENT_QUOTES, 'UTF-8');
        $date = htmlspecialchars($item->pubDate, ENT_QUOTES, 'UTF-8');
        $user = htmlspecialchars($item->children('dc', true)->creator ?? '', ENT_QUOTES, 'UTF-8');
        $link = htmlspecialchars($item->link, ENT_QUOTES, 'UTF-8');

        // Display formatted output
        echo '<li>';
        echo '<h4 style="margin:5px 0;"><a href="' . $link . '" target="_blank">' . $title . '</a></h4>';
        echo ' - On <small>' . $date . '</small><br />' . $description;
        echo ' <a href="' . $link . '" target="_blank">Read More</a>';
        echo '</li>';

        // Stop after 6 items
        if ($i === 6) {
            break;
      
}
    }
}
?>
</ul>
</div>
<?php

}

?>
