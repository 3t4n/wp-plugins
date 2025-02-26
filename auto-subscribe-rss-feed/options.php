<?php
if ($_POST["feed"]<>"") {
	update_option("feedburner_url",$_POST["feed"]);
	echo '<div class="updated fade">Settings were saved</div>';
}
?>

<div class="wrap">
<?php if(function_exists('screen_icon')) screen_icon(); ?>
<h2>Auto Subscribe RSS Feed</h2>

<div class="updated fade">Thanks for using this plugin. Perhaps you want to know about the <a href="http://mr.hokya.com/auto-subscribe-rss-feed/" target="_blank">documentation</a> or make a <a href="http://mr.hokya.com/donate" target="_blank">donation</a></div>

<p><a href="http://mr.hokya.com/auto-subscribe-rss-feed/" target="_blank">Auto Subscribe RSS Feed</a> is a free plugin to automatically promote your Feed Subscription on your guest every they post a comment. This plugin uses <a href="http://www.feedburner.com/" target="_blank">FeedBurner</a> feed mail service. To activate and use this plugin, follow the quick steps below :</p>
<ol>
  <li>Make FeedBurner account.</li>
  <li>Burn your feed.</li>
  <li>Go to Publicize tab.</li>
  <li>Activate Mail Subscription service.</li>
  <li>Provide your feedburner URL below.</li>
  </ol>
<form method="post">
  <p>Your FeedBurner URL : 
    <input name="feed" value="<?php echo get_option("feedburner_url");?>" /> 
    (e.g. feeds.feedburner.com/<strong>xyz</strong> you just type <strong>xyz</strong>)</p>
<p>I hope  your feed subscriber will be multiplied then. For more documentation, please <a href="http://mr.hokya.com/auto-subscribe-rss-feed/" target="_blank">visit the author page</a>. </p>
<p><input type="submit" value="Save Changes" class="button-primary"/></p>
</form>
</div>
